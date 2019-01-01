<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class History_beli extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_history', 'history');
		$this->load->model('m_transaksi','trans');
	}

	public function index()
	{
		if ($this->session->userdata('login') == TRUE) {
	
		$data['konten'] = "history_beli";
		$data['history'] = $this->history->tampil_history();
		$this->load->view('template', $data);
		}
		else{
			redirect('user','refresh');
		}
	}

}

/* End of file History_beli.php */
/* Location: ./application/controllers/History_beli.php */