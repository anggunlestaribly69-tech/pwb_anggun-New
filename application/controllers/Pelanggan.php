<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pelanggan extends CI_Controller {
    public function __construct() {
        parent::__construct();
        if (!$this->session->userdata('username')) {
            redirect(base_url('login'), 'refresh');
        }
        $this->load->model('Pelanggan_model');
        $this->load->model('General_model');
    }

    public function index() {
        $query = $this->Pelanggan_model->data_pelanggan();
        $data = array(
            'title' => 'Halaman Dashboard Administrator - Data Pelanggan',
            'isi'   => 'pelanggan/pelanggan_view',
            'data'  => $query
        );
        $this->load->view('layout/wrapper', $data);
    }

    public function edit($id = '') {
        $this->form_validation->set_rules('nama_pelanggan', 'Nama Pelanggan', 'required');
        $this->form_validation->set_rules('alamat_pelanggan', 'Alamat Pelanggan', 'required');
        $this->form_validation->set_rules('kota_pelanggan', 'Kota Pelanggan', 'required');
        $this->form_validation->set_rules('telp_pelanggan', 'Telpon Pelanggan', 'required');
        $this->form_validation->set_rules('email_pelanggan', 'Email Pelanggan', 'required|valid_email');

        if ($this->form_validation->run() === FALSE) {
            $data = array(
                'title'        => 'Edit Data Pelanggan',
                'isi'          => 'pelanggan/edit_pelanggan',
                'data'         => $this->Pelanggan_model->info_pelanggan($id),
                'kd_pelanggan' => $id
            );
            $this->load->view('layout/wrapper', $data);
        } else {
            $kd_pelanggan = $this->input->post('kd_pelanggan');
            $data = array(
                'nama_pelanggan'   => $this->input->post('nama_pelanggan'),
                'alamat_pelanggan' => $this->input->post('alamat_pelanggan'),
                'kota_pelanggan'   => $this->input->post('kota_pelanggan'),
                'telp_pelanggan'   => $this->input->post('telp_pelanggan'),
                'email_pelanggan'  => $this->input->post('email_pelanggan')
            );
            if ($this->input->post('password')) {
                $data['password'] = $this->input->post('password');
            }
            $where_data['kd_pelanggan'] = $kd_pelanggan;
            $this->General_model->edit_data('pelanggan', $data, $where_data);
            redirect(base_url('pelanggan'));
        }
    }

    public function delete($id = '') {
        $where_data['kd_pelanggan'] = $id;
        $this->General_model->delete_data('pelanggan', $where_data);
        redirect(base_url('pelanggan'));
    }
}
?>