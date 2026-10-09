<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengiriman extends CI_Controller {

    public function __construct() {
        parent::__construct();
        if (!$this->session->userdata('username')) {
            redirect(base_url('login'), 'refresh');
        }
        $this->load->model('Pengiriman_model');
        $this->load->model('General_model');
    }

    public function index() {
        $query = $this->Pengiriman_model->data_pengiriman();
        $data = array(
            'title' => 'Halaman Dashboard Administrator - Data Pengiriman',
            'isi'   => 'pengiriman/pengiriman_view',
            'data'  => $query
        );
        $this->load->view('layout/wrapper', $data);
    }

    public function tambah() {
        $this->form_validation->set_rules('kd_pembayaran', 'Kode Pembayaran', 'required');
        $this->form_validation->set_rules('tgl_pengiriman', 'Tanggal Pengiriman', 'required');
        $this->form_validation->set_rules('status_kirim', 'Status Pengiriman', 'required');

        if ($this->form_validation->run() === FALSE) {
            $data = array(
                'title'             => 'Tambah Data Pengiriman',
                'isi'               => 'pengiriman/tambah_pengiriman',
                'kd_pengiriman'     => $this->Pengiriman_model->buatkode(),
                'data_pembayaran'   => $this->Pengiriman_model->get_pembayaran_belum_kirim()
            );
            $this->load->view('layout/wrapper', $data);
        } else {
            $data = array(
                'kd_pengiriman'  => $this->input->post('kd_pengiriman'),
                'tgl_pengiriman' => $this->input->post('tgl_pengiriman'),
                'status_kirim'   => $this->input->post('status_kirim'),
                'kd_pembayaran'  => $this->input->post('kd_pembayaran')
            );
            $this->General_model->add_new('pengiriman', $data);
            redirect(base_url('pengiriman'));
        }
    }

    public function edit($id = '') {
        $this->form_validation->set_rules('tgl_pengiriman', 'Tanggal Pengiriman', 'required');
        $this->form_validation->set_rules('status_kirim', 'Status Pengiriman', 'required');

        if ($this->form_validation->run() === FALSE) {
            $data = array(
                'title'           => 'Edit Data Pengiriman',
                'isi'             => 'pengiriman/edit_pengiriman',
                'data'            => $this->Pengiriman_model->info_pengiriman($id),
                'kd_pengiriman'   => $id
            );
            $this->load->view('layout/wrapper', $data);
        } else {
            $kd_pengiriman = $this->input->post('kd_pengiriman');
            $data = array(
                'tgl_pengiriman' => $this->input->post('tgl_pengiriman'),
                'status_kirim'   => $this->input->post('status_kirim')
            );
            $where_data['kd_pengiriman'] = $kd_pengiriman;
            $this->General_model->edit_data('pengiriman', $data, $where_data);
            redirect(base_url('pengiriman'));
        }
    }

    public function delete($id = '') {
        $where_data['kd_pengiriman'] = $id;
        $this->General_model->delete_data('pengiriman', $where_data);
        redirect(base_url('pengiriman'));
    }
}
?>
