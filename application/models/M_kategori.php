<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_kategori extends CI_Model {
	public function simpan_kategori()
	{
		$object = array(
			'nama_kategori' => $this->input->post('nama_kategori') 
			);

		return $this->db->insert('kategori', $object);
	}

	public function tampil_kategori()
	{
		return $this->db->get('kategori')->result();
	}

	public function detail_kategori($kode)
	{
		return $this->db->where('kode_kategori', $kode)
						->get('kategori')
						->row();
	}
	
	public function update_kategori()
	{
		$object = array('nama_kategori' => $this->input->post('nama_kategori'));
		return $this->db->where('kode_kategori', $this->input->post('kode_kategori'))
				 ->update('kategori', $object);
	}

	public function hapus_kategori($kode)
	{
		return $this->db->where('kode_kategori', $kode)
							   ->delete('kategori');
	}

}

/* End of file M_kategori.php */
/* Location: ./application/models/M_kategori.php */