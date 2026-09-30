<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan extends CI_Controller {

    public function __construct() {
        parent::__construct();
        if (!$this->session->userdata('username')) {
            redirect(base_url('login'), 'refresh');
        }
        $this->load->model('Laporan_model');
    }

    public function index() {
        $this->laporan_view_form();
    }

    public function laporan_view_form(){
        $tanggal_mulai = $this->input->post('tanggal_mulai') ? $this->input->post('tanggal_mulai') : ($this->input->get('tanggal_mulai') ? $this->input->get('tanggal_mulai') : '2024-01-01');
        $tanggal_selesai = $this->input->post('tanggal_selesai') ? $this->input->post('tanggal_selesai') : ($this->input->get('tanggal_selesai') ? $this->input->get('tanggal_selesai') : date('Y-m-d'));

        $laporan_data = $this->Laporan_model->laporan_cetak_penjualan($tanggal_mulai, $tanggal_selesai);

        $data = array(
            'title'           => 'Halaman Dashboard Administrator - Laporan Penjualan',
            'isi'             => 'laporan/laporan_view_penjualan',
            'data'            => $laporan_data,
            'tanggal_mulai'   => $tanggal_mulai,
            'tanggal_selesai' => $tanggal_selesai
        );
        $this->load->view('layout/wrapper', $data);
    }

    public function cetak_laporan_penjualan() {
        $tanggal_mulai = $this->input->post('tanggal_mulai') ? $this->input->post('tanggal_mulai') : ($this->input->get('tanggal_mulai') ? $this->input->get('tanggal_mulai') : '2024-01-01');
        $tanggal_selesai = $this->input->post('tanggal_selesai') ? $this->input->post('tanggal_selesai') : ($this->input->get('tanggal_selesai') ? $this->input->get('tanggal_selesai') : date('Y-m-d'));

        $data['data'] = $this->Laporan_model->laporan_cetak_penjualan($tanggal_mulai, $tanggal_selesai);
        $data['tanggal_mulai'] = $tanggal_mulai;
        $data['tanggal_selesai'] = $tanggal_selesai;

        $this->load->view('laporan/cetak_laporan_penjualan', $data);
    }
}
?>
