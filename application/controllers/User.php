<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_user');

	}
	public function index()
	{
		if ($this->session->userdata('login') == FALSE) {
			$this->load->view('login');
		}
		else{
			$this->session->set_flashdata('notif', 'Anda Sudah Login');
			redirect('home','refresh');
			
		}
		
	}
	
	public function proses_login()
	{
		$this->form_validation->set_rules('username', 'Username', 'trim|required');
		$this->form_validation->set_rules('password', 'Password', 'trim|required');
		if ($this->form_validation->run() == TRUE) {
			if ($this->m_user->login()->num_rows()>0) {
				$data = $this->m_user->login()->row();

				$array = array(
					'login' => TRUE ,
					'kode_user' => $data->kode_user,
					'nama_user' => $data->nama_user,
					'username' => $data->username,
					'level' => $data->level
					);
				
				$this->session->set_userdata( $array );
				redirect('home','refresh');
			}
			else{
				$this->session->set_flashdata('pesan', 'Username atau Password Salah');
				redirect('user','refresh');
			}
		} else {
			$this->session->set_flashdata('pesan', validation_errors());
			redirect('user','refresh');
		}

	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect('user','refresh');
	}

}

/* End of file Login.php */
/* Location: ./application/controllers/Login.php */