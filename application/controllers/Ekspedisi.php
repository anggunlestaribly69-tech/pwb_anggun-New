<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ekspedisi extends CI_Controller {

    public function __construct() {
        parent::__construct();
        if (!$this->session->userdata('username')) {
            redirect(base_url('login'), 'refresh');
        }
        $this->load->model('Ekspedisi_model');
        $this->load->model('General_model');
    }

    public function index() {
        $query = $this->Ekspedisi_model->data_ekspedisi();
        $data = array(
            'title' => 'Halaman Dashboard Administrator - Data Ekspedisi',
            'isi'   => 'ekspedisi/ekspedisi_view',
            'data'  => $query
        );
        $this->load->view('layout/wrapper', $data);
    }

    public function tambah() {
        $this->form_validation->set_rules('kd_ekspedisi', 'Kode Ekspedisi', 'required|is_unique[ekspedisi.kd_ekspedisi]');
        $this->form_validation->set_rules('nama_ekspedisi', 'Nama Ekspedisi', 'required');
        $this->form_validation->set_rules('tujuan', 'Tujuan', 'required');
        $this->form_validation->set_rules('ongkir', 'Ongkir', 'required|numeric');

        if ($this->form_validation->run() === FALSE) {
            $data = array(
                'title' => 'Tambah Data Ekspedisi',
                'isi'   => 'ekspedisi/tambah_ekspedisi'
            );
            $this->load->view('layout/wrapper', $data);
        } else {
            $data = array(
                'kd_ekspedisi'   => $this->input->post('kd_ekspedisi'),
                'nama_ekspedisi' => $this->input->post('nama_ekspedisi'),
                'tujuan'         => $this->input->post('tujuan'),
                'ongkir'         => $this->input->post('ongkir')
            );
            $this->General_model->add_new('ekspedisi', $data);
            redirect(base_url('ekspedisi'));
        }
    }

    public function edit($id = '') {
        $this->form_validation->set_rules('nama_ekspedisi', 'Nama Ekspedisi', 'required');
        $this->form_validation->set_rules('tujuan', 'Tujuan', 'required');
        $this->form_validation->set_rules('ongkir', 'Ongkir', 'required|numeric');

        if ($this->form_validation->run() === FALSE) {
            $data = array(
                'title'        => 'Edit Data Ekspedisi',
                'isi'          => 'ekspedisi/edit_ekspedisi',
                'data'         => $this->Ekspedisi_model->info_ekspedisi($id),
                'kd_ekspedisi' => $id
            );
            $this->load->view('layout/wrapper', $data);
        } else {
            $kd_ekspedisi = $this->input->post('kd_ekspedisi');
            $data = array(
                'nama_ekspedisi' => $this->input->post('nama_ekspedisi'),
                'tujuan'         => $this->input->post('tujuan'),
                'ongkir'         => $this->input->post('ongkir')
            );
            $where_data['kd_ekspedisi'] = $kd_ekspedisi;
            $this->General_model->edit_data('ekspedisi', $data, $where_data);
            redirect(base_url('ekspedisi'));
        }
    }

    public function delete($id = '') {
        $where_data['kd_ekspedisi'] = $id;
        $this->General_model->delete_data('ekspedisi', $where_data);
        redirect(base_url('ekspedisi'));
    }
}
?>
