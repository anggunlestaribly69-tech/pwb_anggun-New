<?php
class Pembayaran_model extends CI_Model {
    function __construct() {
        $this->load->database();
    }

    public function data_pembayaran() {
        $query = $this->db->query("select pembayaran.kd_pembayaran,pembayaran.tanggal_pembayaran,pesanan.no_pesanan,pembayaran.bukti_transfer,pesanan.nama,pesanan.alamat,sum(ada.qty * ada.harga) as total,ekspedisi.ongkir from pembayaran,pesanan,pelanggan,ada,barang,ekspedisi where pesanan.no_pesanan=pembayaran.no_pesanan and pesanan.kd_pelanggan = pelanggan.kd_pelanggan and pesanan.no_pesanan=ada.no_pesanan and ada.kd_barang=barang.kd_barang and ekspedisi.kd_ekspedisi=pesanan.kd_ekspedisi GROUP BY pembayaran.kd_pembayaran,pembayaran.tanggal_pembayaran,pesanan.no_pesanan,pembayaran.bukti_transfer,pesanan.nama,pesanan.alamat ORDER BY pembayaran.kd_pembayaran ASC");
        if($query->num_rows() > 0) {
            return $query->result();
        }
        return array();
    }

    public function get_pembayaran($no_pesanan='') {
        $query = $this->db->query("SELECT * FROM ada, barang WHERE ada.kd_barang = barang.kd_barang AND ada.no_pesanan = '$no_pesanan'");
        if($query->num_rows() > 0) {
            return $query->result();
        }
        return array();
    }
}
?>
