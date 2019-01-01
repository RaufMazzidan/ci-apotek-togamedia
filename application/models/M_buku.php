<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_buku extends CI_Model {
	public function simpan_buku($cover)
	{
		$judul = $this->input->post('judul_buku');
		$tahun = $this->input->post('tahun');
		$kategori = $this->input->post('kategori');
		$harga = $this->input->post('harga');
		$penerbit = $this->input->post('penerbit');
		$penulis = $this->input->post('penulis');
		$stok = $this->input->post('stok');

		if ($cover == '') {
			$object = array(
				'judul_buku' => $judul,
				'tahun' => $tahun, 
				'kode_kategori' => $kategori,
				'harga' => $harga,
				'penerbit' => $penerbit,
				'penulis' => $penulis,
				'stok' => $stok
				);
		}
		else{
			$object = array(
				'judul_buku' => $judul,
				'tahun' => $tahun, 
				'kode_kategori' => $kategori,
				'harga' => $harga,
				'penerbit' => $penerbit,
				'penulis' => $penulis,
				'stok' => $stok,
				'foto_cover' => $cover
				);
		}

		return $this->db->insert('buku', $object);;
	}
	
	public function tampil_buku()
	{
		return $this->db->join('kategori', 'kategori.kode_kategori=buku.kode_kategori')
						->get('buku')
						->result();	
	}
	public function detail_buku($kode)
	{
		return $this->db->where('kode_buku', $kode)
						->get('buku')
						->row();
	}

	public function buku_update()
	{
		$judul = $this->input->post('judul_buku');
		$tahun = $this->input->post('tahun');
		$kategori = $this->input->post('kategori');
		$harga = $this->input->post('harga');
		$penerbit = $this->input->post('penerbit');
		$penulis = $this->input->post('penulis');
		$stok = $this->input->post('stok');

		$object = array(
				'judul_buku' => $judul,
				'tahun' => $tahun, 	
				'kode_kategori' => $kategori,
				'harga' => $harga,
				'penerbit' => $penerbit,
				'penulis' => $penulis,
				'stok' => $stok
				);

		return $this->db->where('kode_buku' , $this->input->post('kode_buku'))->update('buku', $object);
	}

	public function buku_update_foto($cover)
	{
		$judul = $this->input->post('judul_buku');
		$tahun = $this->input->post('tahun');
		$kategori = $this->input->post('kategori');
		$harga = $this->input->post('harga');
		$penerbit = $this->input->post('penerbit');
		$penulis = $this->input->post('penulis');
		$stok = $this->input->post('stok');

		$object = array(
				'judul_buku' => $judul,
				'tahun' => $tahun, 	
				'kode_kategori' => $kategori,
				'harga' => $harga,
				'penerbit' => $penerbit,
				'penulis' => $penulis,
				'stok' => $stok,
				'foto_cover' => $cover
				);

		return $this->db->where('kode_buku' , $this->input->post('kode_buku'))->update('buku', $object);
	}

	public function hapus_buku($kode)
	{
		return $this->db->where('kode_buku', $kode)->delete('buku');
	}

}

/* End of file M_buku.php */
/* Location: ./application/models/M_buku.php */