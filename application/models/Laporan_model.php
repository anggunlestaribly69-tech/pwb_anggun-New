<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan_model extends CI_Model {

    function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function data_pembayaran() {
        $query = $this->db->query("SELECT pembayaran.kd_pembayaran, pembayaran.tanggal_pembayaran,
            pesanan.no_pesanan, pembayaran.bukti_transfer, pesanan.nama, pesanan.alamat, SUM(ada.qty *
            ada.harga) AS total, ekspedisi.ongkir
            FROM pembayaran, pesanan, pelanggan, ada, barang, ekspedisi
            WHERE pesanan.no_pesanan = pembayaran.no_pesanan
            AND pesanan.kd_pelanggan = pelanggan.kd_pelanggan
            AND pesanan.no_pesanan = ada.no_pesanan
            AND ada.kd_barang = barang.kd_barang
            AND ekspedisi.kd_ekspedisi = pesanan.kd_ekspedisi
            GROUP BY pembayaran.kd_pembayaran, pembayaran.tanggal_pembayaran, pesanan.no_pesanan,
            pembayaran.bukti_transfer, pesanan.nama, pesanan.alamat
            ORDER BY pembayaran.kd_pembayaran ASC");

        if($query->num_rows() > 0) {
            return $query->result();
        }
        return array();
    }

    public function get_pembayaran($no_pesanan = '') {
        $query = $this->db->query("SELECT ada.*, barang.*
            FROM ada, barang
            WHERE ada.kd_barang = barang.kd_barang
            AND ada.no_pesanan = '$no_pesanan'");

        if($query->num_rows() > 0) {
            return $query->result();
        }
        return array();
    }

    // Fungsi untuk laporan cetak penjualan
    public function laporan_cetak_penjualan($tanggal_mulai, $tanggal_selesai) {
        $dataArr = [];
        $this->db->select('*');
        $this->db->from('pesanan');
        $this->db->join('pembayaran', 'pembayaran.no_pesanan = pesanan.no_pesanan');
        $this->db->join('pelanggan', 'pelanggan.kd_pelanggan = pesanan.kd_pelanggan');
        $this->db->where('pembayaran.tanggal_pembayaran >=', $tanggal_mulai);
        $this->db->where('pembayaran.tanggal_pembayaran <=', $tanggal_selesai);
        $data = $this->db->get()->result_array();

        $total_seluruh_laporan = 0;
        foreach ($data as $key => $value) {
            $this->db->select('*');
            $this->db->from('ada');
            $this->db->join('barang', 'ada.kd_barang = barang.kd_barang');
            $this->db->where('ada.no_pesanan', $value['no_pesanan']);
            $data_barang = $this->db->get()->result_array();
            $data[$key]['data_barang'] = $data_barang;

            $total_bayar = 0;
            foreach ($data_barang as $keyDetail => $valueDetail) {
                $total_bayar += $valueDetail['qty'] * $valueDetail['harga'];
            }
            $data[$key]['total_bayar'] = $total_bayar;
            $total_seluruh_laporan += $total_bayar;
        }

        $dataArr = [
            'data' => $data,
            'total_seluruh_laporan' => $total_seluruh_laporan,
        ];

        return $dataArr;
    }
}
?>
