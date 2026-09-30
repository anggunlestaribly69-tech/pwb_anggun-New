<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pemesan_model extends CI_Model {
    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function data_pemesan() {
        $query = $this->db->query("SELECT * FROM pemesan");
        if ($query->num_rows() > 0) {
            return $query->result();
        }
        return array();
    }

    public function get_pemesan_by_id($id) {
        $query = $this->db->query("SELECT * FROM pemesan WHERE idpemesan = ?", array($id));
        return $query->row();
    }
}
