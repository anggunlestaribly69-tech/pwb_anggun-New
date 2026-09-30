<?php
class General_model extends CI_Model {
	public function __construct(){
		$this->load->database();
	}
	//Add new data
	public function add_new($table_name, $data) {
		$this->db->insert($table_name, $data);
	}

	public function edit_data($table_name, $data, $where) {
		$this->db->update($table_name, $data, $where);
	}

	public function delete_data($table_name, $where) {
		$this->db->delete($table_name, $where);
	}
	}

?>