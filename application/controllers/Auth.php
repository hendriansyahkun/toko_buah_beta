<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller 
{

	public function index()
	{
		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
		$this->form_validation->set_rules('password', 'Password', 'trim|required');

		if ($this->form_validation->run() == false) {
			$data['title'] = 'Laman Login';
			$this->load->view('templates/auth_header', $data);
			$this->load->view('auth/login');
			$this->load->view('templates/auth_footer');
		} else {
			// validasi sukses
			$this->_login();
		}
		
	}



	private function _login()
	{
		$email = $this->input->post('email');
		$password = $this->input->post('password');

		$user =  $this->db->get_where('user', ['email' => $email])->row_array();

			// user ada
		if ($user) {
			if($user['is_active'] == 1) {
				// cek pw
				if(password_verify($password, $user['password'])) {
					$data = [
						'email' => $user['email'],
						'role_id'=> $user['role_id'],
					];

					$this->session->set_userdata($data);
					if($user['role_id'] == 1) {
						redirect('admin');
					} else {
						redirect('user');
					}

				} else {
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
  				Password salah!
				</div>');
		redirect('auth');

				}


			} else {
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
  			Email belum diaktivasi
		</div>');
		redirect('auth');
			}
		} else {
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
  			Email tidak terdaftar!
		</div>');
		redirect('auth');
		}
	}


	public function registration()
	{

		$this->form_validation->set_rules('name', 'Name', 'required|trim');
		$this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[user.email]', [
				'is_unique' => 'Email ini sudah dipakai!'			
		]);
		$this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[3]|matches[password2]');
		$this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]', [
			'matches' => 'password tidak sama!',
			'min_length' => 'password terlalu pendek!'
		]);


		if( $this->form_validation->run() == false)
		{
		$data['title'] = 'Registrasi User';
		$this->load->view('templates/auth_header', $data);
		$this->load->view('auth/registration');
		$this->load->view('templates/auth_footer');
	} else {
		$data = [
			'name' => htmlspecialchars($this->input->post('name', true)),
			'email' => htmlspecialchars($this->input->post('email', true)),
			'image' => 'default.jpg',
			'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
			'role_id' => 2,
			'is_active' => 1,
			'date_created' => time()
		];

		$this->db->insert('user', $data);
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
  			Selamat akun berhasil didaftarkan. Silahkan login
		</div>');
		redirect('auth');
	}
	}



	public function logout()
	{
		$this->session->unset_userdata('email');
		$this->session->unset_userdata('role_id');


		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
  			Kamu berhasil Logout
		</div>');
		redirect('auth');
	}
}