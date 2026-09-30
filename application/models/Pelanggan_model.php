<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pelanggan_model extends CI_Model {
    function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function data_pelanggan() {
        $query = $this->db->query("select * from pelanggan");
        if($query->num_rows() > 0) {
            return $query->result();
        }
        return array();
    }

    public function info_pelanggan($id) {
        $query = $this->db->query("select * from pelanggan where kd_pelanggan = ?", array($id));
        return $query->row();
    }
}
?>