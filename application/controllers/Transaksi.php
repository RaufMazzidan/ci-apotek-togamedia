<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transaksi extends CI_Controller {
	public function __construct()
	{
		

		parent::__construct();
		$this->load->model('m_kategori', 'kat');
		$this->load->model('m_buku' , 'buku');
		$this->load->model('m_transaksi', 'trans');
	}

	public function index()
	{
		if ($this->session->userdata('login') == TRUE) {
			if ($this->session->userdata('level') == 'kasir') {

				$data['konten'] = "transaksi";
				$data['list_kategori'] = $this->kat->tampil_kategori();
				$data['list_buku'] = $this->buku->tampil_buku();
				$this->load->view('template', $data);
			}
			else{
				$this->session->set_flashdata('notif', 'Harap Login Dengan Akun Kasir');
				redirect('home','refresh');
			}
		}
		else{
			redirect('user','refresh');
		}
		
	}

	public function addcart($kode)
	{

		$cek_stok = $this->trans->cek($kode);


		if ($cek_stok == 0) {
			$this->session->set_flashdata('pesan', 'Stok Buku Habis');
			redirect('transaksi','refresh');
		}
		else{
			$detail = $this->buku->detail_buku($kode);

			$data = array(
				'id'      => $detail->kode_buku,
				'qty'     => 1,
				'price'   => $detail->harga,
				'name'    => $detail->judul_buku
				);

			$this->cart->insert($data);

			redirect('transaksi','refresh');
		}
	}

	public function hapus_cart($kode)
	{
		$data = array(
			'rowid'  => $kode,
			'qty'    => 0
			);

		$this->cart->update($data);
		$this->session->set_flashdata('pesan_list', 'Berhasil Hapus Cart');
		redirect('transaksi','refresh');
	}

	public function clearcart()
	{
		$this->cart->destroy();
		$this->session->set_flashdata('pesan_list', 'Berhasil Clear Cart');
		redirect('transaksi','refresh');
	}

	public function simpan()
	{
		if ($this->input->post('bayar')) {
			if ($this->cart->total() == null) {
				$this->session->set_flashdata('pesan_list', 'Anda Belum Menambahkan Cart');
				redirect('transaksi','refresh');
			}
			else{
			//Cek Stok
			$cek_stok = $this->trans->check();

			if ($cek_stok == 1) {
					//$this->form_validation->set_rules('nama_pembeli', 'Nama Pembeli', 'trim|required|');
				$this->form_validation->set_rules('uang_bayar', 'Uang', 'trim|required|greater_than_equal_to['.$this->cart->total().']');
				if ($this->form_validation->run() == TRUE) {
					$kode = $this->trans->simpan_cart();
					$data['nota'] = $this->trans->detail_transaksi($kode);
					$bayar = $this->input->post('uang_bayar');
					$total = $this->cart->total();
					if ($bayar < $total) {
						$this->session->set_flashdata('kembalian', 'Uang Anda Kurang ');
					}
					else{
						$kembalian = $bayar - $total;

						$this->session->set_flashdata('kembalian', $kembalian);
					}

					$this->cart->destroy();
					$this->load->view('cetak_nota', $data);
				}
				else{
					$this->session->set_flashdata('pesan_list', validation_errors());
					redirect('transaksi','refresh');
				}
			}
			else{
				$this->session->set_flashdata('pesan', 'Transaksi Gagal, Cek Stok Anda');
				redirect('transaksi','refresh');
			}
		}
	}
		else{
			for ($i=0; $i < count($this->input->post('rowid')); $i++) { 
				$data = array(
					'rowid' => $this->input->post('rowid')[$i],
					'qty'   => $this->input->post('qty')[$i]
					);
				
				$this->cart->update($data);
				
			}
			redirect('transaksi','refresh');
		}
		
	}

}

/* End of file Transaksi.php */
/* Location: ./application/controllers/Transaksi.php */