<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pesanan_model extends CI_Model {
    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function data_pesanan() {
        $query = $this->db->query("SELECT pesanan.*, pelanggan.nama_pelanggan, ekspedisi.nama_ekspedisi, ekspedisi.ongkir FROM pesanan LEFT JOIN pelanggan ON pesanan.kd_pelanggan = pelanggan.kd_pelanggan LEFT JOIN ekspedisi ON pesanan.kd_ekspedisi = ekspedisi.kd_ekspedisi ORDER BY pesanan.no_pesanan DESC");
        if($query->num_rows() > 0) {
            return $query->result();
        }
        return array();
    }

    public function info_pesanan($no_pesanan) {
        $query = $this->db->query("SELECT pesanan.*, ada.kd_barang, ada.qty, ada.harga, pembayaran.kd_pembayaran, pembayaran.bukti_transfer, pembayaran.tanggal_pembayaran FROM pesanan LEFT JOIN ada ON pesanan.no_pesanan = ada.no_pesanan LEFT JOIN pembayaran ON pesanan.no_pesanan = pembayaran.no_pesanan WHERE pesanan.no_pesanan = ?", array($no_pesanan));
        return $query->row();
    }

    public function get_next_no_pesanan() {
        $query = $this->db->query("SELECT MAX(CAST(no_pesanan AS UNSIGNED)) AS max_no FROM pesanan");
        $row = $query->row();
        $next = ($row && $row->max_no) ? ($row->max_no + 1) : 1;
        return sprintf('%03d', $next);
    }

    public function get_pelanggan_list() {
        return $this->db->get('pelanggan')->result();
    }

    public function get_ekspedisi_list() {
        return $this->db->get('ekspedisi')->result();
    }

    public function get_barang_list() {
        return $this->db->get('barang')->result();
    }
}
?>
