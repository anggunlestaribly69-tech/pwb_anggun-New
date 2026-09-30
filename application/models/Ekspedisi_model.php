<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ekspedisi_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function data_ekspedisi() {
        $query = $this->db->query("SELECT * FROM ekspedisi ORDER BY kd_ekspedisi ASC");
        if ($query->num_rows() > 0) {
            return $query->result();
        }
        return array();
    }

    public function info_ekspedisi($id) {
        $query = $this->db->query("SELECT * FROM ekspedisi WHERE kd_ekspedisi = ?", array($id));
        return $query->row();
    }
}
?>
