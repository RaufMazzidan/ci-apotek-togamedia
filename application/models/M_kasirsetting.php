<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_kasirsetting extends CI_Model {

	public function simpan_kasir()
	{
		$object = array(
			'nama_user' => $this->input->post('nama_user'),
			'username' => $this->input->post('username') ,
			'password' => $this->input->post('password') ,
			'level' => $this->input->post('level')  
			);

		return $this->db->insert('user', $object);
	}

	public function tampil_kasir()
	{
		return $this->db->where('level', 'kasir')->get('user')->result();
	}
		public function detail_kasir($kode)
	{
		return $this->db->where('kode_user', $kode)
						->get('user')
						->row();
	}

	public function update_kasir()
	{
		$object = array(
			'nama_user' => $this->input->post('nama_user'),
			'username' => $this->input->post('username'),
			'password' => $this->input->post('password'),
			'level' => $this->input->post('nama_user')
			);
		return $this->db->where('kode_user', $this->input->post('kode_user'))
				 ->update('user', $object);
	}

	public function hapus_kasir($kode)
	{
		return $this->db->where('kode_user', $kode)
							   ->delete('user');
	}


}

/* End of file M_kasirsetting.php */
/* Location: ./application/models/M_kasirsetting.php */