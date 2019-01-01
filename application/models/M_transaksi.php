<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_transaksi extends CI_Model {

	public function cek($kode)
	{
		$cek_stok = $this->db->where('kode_buku' , $kode)
							 ->get('buku')
							 ->row()
							 ->stok;
		if ($cek_stok == 0) {
			return 0;
		}
		else{
			return 1;
		}
	}

	public function check()
	{
		$cek = 1;

		for ($i=0; $i < count($this->cart->contents()) ; $i++) { 
			
			$stok = $this->db->where('kode_buku' , $this->input->post('kode_buku')[$i])
							 ->get('buku')
							 ->row()
							 ->stok;
			$qty = $this->input->post('qty')[$i];

			$sisa = $stok - $qty;

			if ($sisa < 0) {
				$tes = 0;
			 }else{
			 	$tes = 1;
			 }

			 $cek = $tes * $cek;				 

		}
		return $cek;
	}

	public function simpan_cart()
	{
		//KURANG STOK
		for ($i=0; $i < count($this->cart->contents()) ; $i++) { 
			
			$stok = $this->db->where('kode_buku' , $this->input->post('kode_buku')[$i])
							 ->get('buku')
							 ->row()
							 ->stok;
			$qty = $this->input->post('qty')[$i];
			$sisa = $stok - $qty;
			$data = array('stok' => $sisa);
			$this->db->where('kode_buku', $this->input->post('kode_buku')[$i])
					 ->update('buku', $data);
		}

		$object = array(
			'kode_user' => $this->session->userdata('kode_user'),
			'nama_pembeli' => $this->input->post('nama_pembeli'),
			'total' => $this->input->post('grandtotal'),
			'tanggal' => date('Y-m-d')
			);

		$this->db->insert('transaksi', $object);

		$tm_trans = $this->db->order_by('kode_transaksi', 'desc')
							 ->where('kode_user', $this->session->userdata('kode_user'))
							 ->limit(1)
							 ->get('transaksi')
							 ->row();

		for ($i=0; $i < count($this->input->post('rowid')) ; $i++) { 
			$hasil[] = array(
				'kode_transaksi' => $tm_trans->kode_transaksi, 
				'kode_buku' => $this->input->post('kode_buku')[$i], 
				'jumlah' => $this->input->post('qty')[$i], 
				);
		}
		$proses = $this->db->insert_batch('detail_transaksi', $hasil);

		if ($proses) {
			return $tm_trans->kode_transaksi;
		}
		else{
			return 0;
		}
	}
	
	public function detail_transaksi($kode)
	{
		return $this->db->where('kode_transaksi', $kode)
						->join('user', 'user.kode_user=transaksi.kode_user')
						->get('transaksi')
						->row();
	}

	public function detail_pembelian($kode)
	{
		return $this->db->where('kode_transaksi', $kode)
						->join('buku', 'buku.kode_buku=detail_transaksi.kode_buku')
						->join('kategori', 'kategori.kode_kategori=buku.kode_kategori')
						->get('detail_transaksi')
						->result();
	}

}

/* End of file M_transaksi.php */
/* Location: ./application/models/M_transaksi.php */