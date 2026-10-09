<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengiriman_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function data_pengiriman() {
        $query = $this->db->query("SELECT g.*, b.no_pesanan, b.bukti_transfer, p.nama, p.status 
            FROM pengiriman g 
            LEFT JOIN pembayaran b ON g.kd_pembayaran = b.kd_pembayaran 
            LEFT JOIN pesanan p ON b.no_pesanan = p.no_pesanan 
            ORDER BY g.kd_pengiriman DESC");
        if ($query->num_rows() > 0) {
            return $query->result();
        }
        return array();
    }

    public function info_pengiriman($id) {
        $query = $this->db->query("SELECT g.*, b.no_pesanan, b.bukti_transfer, p.nama, p.status 
            FROM pengiriman g 
            LEFT JOIN pembayaran b ON g.kd_pembayaran = b.kd_pembayaran 
            LEFT JOIN pesanan p ON b.no_pesanan = p.no_pesanan 
            WHERE g.kd_pengiriman = ?", array($id));
        return $query->row();
    }

    public function get_pembayaran_belum_kirim() {
        $query = $this->db->query("SELECT b.kd_pembayaran, b.no_pesanan, p.nama 
            FROM pembayaran b 
            LEFT JOIN pesanan p ON b.no_pesanan = p.no_pesanan 
            WHERE b.kd_pembayaran NOT IN (SELECT kd_pembayaran FROM pengiriman)
            AND p.status = 'Sudah Bayar'
            ORDER BY b.kd_pembayaran ASC");
        if ($query->num_rows() > 0) {
            return $query->result();
        }
        return array();
    }

    public function buatkode() {
        $query = $this->db->query("SELECT MAX(CAST(SUBSTRING(kd_pengiriman, 4) AS UNSIGNED)) AS max_id FROM pengiriman");
        if ($query->num_rows() > 0) {
            $result = $query->row();
            $kode = (int)$result->max_id + 1;
        } else {
            $kode = 1;
        }
        return "KRM" . str_pad($kode, 3, "0", STR_PAD_LEFT);
    }
}
?>
