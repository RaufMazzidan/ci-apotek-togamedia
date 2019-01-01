<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_history extends CI_Model {

	public function tampil_history()
	{
		return $this->db->join('user', 'user.kode_user=transaksi.kode_user')->get('transaksi')->result();
	}
	public function trans($kode)
	{
		return $this->db
					->join('buku', 'buku.kode_buku=detail_transaksi.kode_buku')
					->get('detail_transaksi')
					->row();
	}

}

/* End of file M_history.php */
/* Location: ./application/models/M_history.php */