<?php 

class Buah extends CI_Controller{
	public function index()
	{
		$data['buah'] = $this->mb->tampil_data()->result();
		var_dump($data);
		// $this->load->view('templates/header', $data);
		// $this->load->view('templates/sidebar', $data);
		// $this->load->view('user/index', $data);
		// $this->load->view('templates/footer', $data);

		$this->lb->page('user/index', $data);
	} 

	public function tambah_aksi()
	{
		$nama_buah			= $this->input->post('nama_buah');
		$stock				= $this->input->post('stock');
		$harga				= $this->input->post('harga');
		

		$data = array(
			'nama_buah'		=>$nama_buah,
			'stock'			=>$stock,
			'harga'			=>$harga,
			
		);

		$this->mb->add_buah($data, 'tbl_buah');
		redirect('admin/index');
	}

	public function hapus ($id)
	{
		$where = array ('id_buah' => $id);
		$this->mb->hapus_buah($where, 'tbl_buah');
		redirect('admin/index');
	}

	public function edit($id){

		$where = array('id_buah' => $id);
		$data['buah'] = $this->mb->tampil_data($where)->row();

		$this->lp->page('edit', $data);
		// $this->load->view('templates/header');
		// $this->load->view('templates/sidebar');
		// $this->load->view('edit', $data);
		// $this->load->view('templates/footer');
	}
}

 ?>