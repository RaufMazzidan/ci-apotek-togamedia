<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_user extends CI_Model {
	public function login()
	{
		$username = $this->input->post('username');
		$password = $this->input->post('password');

		return $this->db->where('username' , $username)
						->where('password' , $password)
						->get('user');
	}
	

}

/* End of file M_login.php */
/* Location: ./application/models/M_login.php */