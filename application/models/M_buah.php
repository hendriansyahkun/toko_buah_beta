<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_buah extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		//Load Dependencies

	}

	// public function login_data($where, $table)
	// {
	// 	return $this->db->get_where($table, $where);
	// }

	// List all your items
	public function tampil_data($where = null)
	{
		$this->db->select('*');
		$this->db->from('tbl_buah');

		if ($where != null) {
			$this->db->where($where);
		}

		return $this->db->get();
	}

	// Add a new item
	public function add_buah($data , $table)
	{
		$this->db->insert($table, $data);

		return $this->db->get($table);
	}

	//Update one item
	public function edit_data( $table, $where )
	{
		$this->db->get_where($table, $where);

		return $this->db->get();
	}

	// //Delete one item
	public function hapus_buah( $where, $table )
	{
		$this->db->where($where);
		$this->db->delete($table);

		return $this->db->get($table);
	}
}

/* End of file m_mahasiswa.php */
/* Location: ./application/models/m_mahasiswa.php */


 ?>