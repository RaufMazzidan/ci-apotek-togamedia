<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class KasirSetting extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		
		$this->load->model('m_kasirsetting' , 'kasir');
	}

	public function index()
	{
		if ($this->session->userdata('login') == TRUE) {
			if ($this->session->userdata('level') == 'admin') {

				$data['konten'] = "kasirsetting";
				$data['list_kasir'] = $this->kasir->tampil_kasir();
				$this->load->view('template', $data);
			}
			else{
				$this->session->set_flashdata('notif', 'Harap Login Dengan Akun Admin');
				redirect('home','refresh');
			}
		}
		else{
			$this->session->set_flashdata('pesan', 'Anda Belum Login');
			redirect('user','refresh');
		}
	}
	public function create_kasir()
	{
		if ($this->input->post('create')) {
			$this->form_validation->set_rules('nama_user', 'Nama User', 'trim|required');
			$this->form_validation->set_rules('username', 'Username', 'trim|required');
			$this->form_validation->set_rules('password', 'Password', 'trim|required');
			$this->form_validation->set_rules('level', 'Jabatan', 'trim|required');
			if ($this->form_validation->run() == TRUE) {
				if ($this->kasir->simpan_kasir()) {
					$this->session->set_flashdata('pesan', 'Create Kasir Berhasil');
					redirect('kasirsetting','refresh');
				}
				else{
					$this->session->set_flashdata('pesan', 'Create Kasir Gagal');
					redirect('kasirsetting','refresh');
				}
			} else {
				$this->session->set_flashdata('pesan', validation_errors());
				redirect('kasirsetting','refresh');
			}
		}
	}

	public function edit_kasir($kode)
	{
		$data = $this->kasir->detail_kasir($kode);
		echo json_encode($data);
	}

	public function kasir_update()
	{
		if ($this->input->post('update')) {
			if ($this->kasir->update_kasir()) {
				$this->session->set_flashdata('pesan_list', 'Edit Berhasil');
				redirect('kasirsetting','refresh');
			}
			else{
				$this->session->set_flashdata('pesan_list', 'Edit Gagal');
				redirect('kasirsetting','refresh');
			}
		}
		else{
			$this->session->set_flashdata('pesan_list', 'Edit Gagal');
			redirect('kasirsetting','refresh');
		}
	}

	public function hapus_kasir($kode)
	{
		if ($this->kasir->hapus_kasir($kode)) {
			$this->session->set_flashdata('pesan_list', 'Berhasil Hapus');
			redirect('kasirsetting','refresh');
		}
		else{
			$this->session->set_flashdata('pesan_list', 'Hapus Gagal');
			redirect('kasirsetting','refresh');
		}
	}

}

/* End of file KasirSetting.php */
/* Location: ./application/controllers/KasirSetting.php */