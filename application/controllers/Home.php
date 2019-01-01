<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_buku','buku');
		$this->load->model('m_kategori' , 'kat');
		$this->load->model('m_history', 'history');
	}

	public function index()
	{
		if ($this->session->userdata('login') == TRUE) {

		$data['kategori'] = count($this->kat->tampil_kategori());
		$data['buku'] = count($this->buku->tampil_buku());
		$data['transaksi'] = count($this->history->tampil_history());
		$data['konten'] = "home";
		$this->load->view('template', $data);
		}
		else{
			$this->session->set_flashdata('pesan', 'Anda Belum Login');
			redirect('user','refresh');
		}
	}

}

/* End of file Home.php */
/* Location: ./application/controllers/Home.php */