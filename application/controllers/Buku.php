<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Buku extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_kategori', 'kat');
		$this->load->model('m_buku' , 'buku');
	}

	public function index()
	{
		if ($this->session->userdata('login') == TRUE) {

		$data['konten'] = "crud_buku";
		$data['list_kategori'] = $this->kat->tampil_kategori();
		$data['list_buku'] = $this->buku->tampil_buku();
		$this->load->view('template', $data);
		}
		else{
			redirect('user','refresh');
		}
		
	}

	public function create_buku()
	{
		if ($this->input->post('create')) {
			$this->form_validation->set_rules('judul_buku', 'Judul Buku', 'trim|required');
			$this->form_validation->set_rules('tahun', 'Tahun', 'trim|required|max_length[4]');
			$this->form_validation->set_rules('kategori', 'Kategori', 'trim|required');
			$this->form_validation->set_rules('harga', 'Harga', 'trim|required');
			$this->form_validation->set_rules('penerbit', 'Penerbit', 'trim|required');
			$this->form_validation->set_rules('penulis', 'Penulis', 'trim|required');
			$this->form_validation->set_rules('stok', 'Stok', 'trim|required');
			if ($this->form_validation->run() == TRUE) {
				$config['upload_path'] = './assets/cover/';
				$config['allowed_types'] = 'gif|jpg|png';
				$config['max_size']  = '100';
				$config['max_width']  = '1024';
				$config['max_height']  = '768';

				if ($_FILES['foto_cover']['name'] != "") {

					$this->load->library('upload', $config);

					if ( ! $this->upload->do_upload('foto_cover')){
						$this->session->set_flashdata('pesan', $this->upload->display_errors());
						redirect('buku','refresh');
					}
					else{
						if ($this->buku->simpan_buku($this->upload->data('file_name'))) {
							$this->session->set_flashdata('pesan', 'Berhasil Tambah Buku');
						}
						else{
							$this->session->set_flashdata('pesan', 'Gagal Tambah Buku');
						}
						redirect('buku','refresh');
					}
				}
				else{
					if ($this->buku->simpan_buku('')) {
						$this->session->set_flashdata('pesan', 'Berhasil Tambah Buku');
					}
					else{
						$this->session->set_flashdata('pesan', 'Gagal Tambah Buku');
					}
					redirect('buku','refresh');
				}

			} else {
				$this->session->set_flashdata('pesan', validation_errors());
				redirect('buku','refresh');
			}
		}
		else{
			$this->session->set_flashdata('pesan', 'Gagal');
			redirect('buku','refresh');
		}
	}

	public function edit_buku($kode)
	{
		$data = $this->buku->detail_buku($kode);
		echo json_encode($data);
	}

	public function buku_update()
	{
		if ($this->input->post('update')) {
			if ($_FILES['foto_cover']['name'] == '') {
				if ($this->buku->buku_update()) {
					$this->session->set_flashdata('pesan_list', 'Berhasil Update Buku');
					redirect('buku','refresh');
				}
				else{
					$this->session->set_flashdata('pesan_list', 'Gagal Update Buku');
					redirect('buku','refresh');
				}
			}

			else{
				$config['upload_path'] = './assets/cover/';
				$config['allowed_types'] = 'gif|jpg|png';
				$config['max_size']  = '1000';
				$config['max_width']  = '1024';
				$config['max_height']  = '768';

				$this->load->library('upload', $config);

				if ( ! $this->upload->do_upload('foto_cover')){
					$this->session->set_flashdata('pesan_list', $this->upload->display_errors());
					redirect('buku','refresh');
				}
				else{
					if ($this->buku->buku_update_foto($this->upload->data('file_name'))) {
						$this->session->set_flashdata('pesan_list', 'Berhasil Update Buku');
						redirect('buku','refresh');
					}
					else{
						$this->session->set_flashdata('pesan_list', 'Gagal Update Buku');
						redirect('buku','refresh');
					}
				}

			}
		}
	}

	public function hapus_buku($kode)
	{
		if ($this->buku->hapus_buku($kode)) {
			$this->session->set_flashdata('pesan_list', 'Berhasil Hapus Buku');
			redirect('buku','refresh');
		}
		else{
			$this->session->set_flashdata('pesan_list', 'Gagal Hapus Buku');
			redirect('buku','refresh');
		}
	}

}

/* End of file Buku.php */
/* Location: ./application/controllers/Buku.php */