<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kategori extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_kategori', 'kat');
	}

	public function index()
	{
		if ($this->session->userdata('login') == TRUE) {
		$data['konten'] = "crud_kategori";
		$data['list_kategori'] = $this->kat->tampil_kategori();
		$this->load->view('template', $data);
		}
		else{
			redirect('user','refresh');
		}
		
	}

	public function create_kategori()
	{
		if ($this->input->post('create')) {
			$this->form_validation->set_rules('nama_kategori', 'Nama Kategori', 'trim|required');
			if ($this->form_validation->run() == TRUE) {
				if ($this->kat->simpan_kategori()) {
					$this->session->set_flashdata('pesan', 'Create Kategori Berhasil');
					redirect('kategori','refresh');
				}
				else{
					$this->session->set_flashdata('pesan', 'Create Kategori Gagal');
					redirect('kategori','refresh');
				}
			} else {
				$this->session->set_flashdata('pesan', validation_errors());
				redirect('kategori','refresh');
			}
		}
	}

	public function edit_kategori($kode)
	{
		$data = $this->kat->detail_kategori($kode);
		echo json_encode($data);
	}

	public function kategori_update()
	{
		if ($this->input->post('update')) {
			if ($this->kat->update_kategori()) {
				$this->session->set_flashdata('pesan_list', 'Edit Berhasil');
				redirect('kategori','refresh');
			}
			else{
				$this->session->set_flashdata('pesan_list', 'Edit Gagal');
				redirect('kategori','refresh');
			}
		}
		else{
			$this->session->set_flashdata('pesan_list', 'Edit Gagal');
			redirect('kategori','refresh');
		}
	}

	public function hapus_kategori($kode)
	{
		if ($this->kat->hapus_kategori($kode)) {
			$this->session->set_flashdata('pesan_list', 'Berhasil Hapus');
				redirect('kategori','refresh');
		}
		else{
			$this->session->set_flashdata('pesan_list', 'Hapus Gagal');
				redirect('kategori','refresh');
		}
	}

}

/* End of file Kategori.php */
/* Location: ./application/controllers/Kategori.php */