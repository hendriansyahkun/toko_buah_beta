<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Lib_page
{
	protected $ci;

	public function __construct()
	{
        $this->ci =& get_instance();
	}

	public function page($content, $data)
	{
		$data = [
			$this->ci->load->view('templates/header', $data),
			$this->ci->load->view('templates/sidebar', $data),
			$this->ci->load->view('templates/topbar', $data),
			$this->ci->load->view(''.$content, $data),
			$this->ci->load->view('templates/footer'),

		];
	}	

}

/* End of file Lib_page.php */
/* Location: ./application/libraries/Lib_page.php */
