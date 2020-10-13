<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller 
{

	public function index()
	{
		$data['title'] = 'Halaman Utama';
		$data['user'] = $this->db->get_where('user', ['email' => 
						$this->session->userdata('email')])->row_array();
		$data['buah'] = $this->mb->tampil_data()->result();
		

		$this->lp->page('user/index', $data);
 
	}

}