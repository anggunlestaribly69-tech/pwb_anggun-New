<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pemesan extends CI_Controller {

    public function __construct() {
        parent::__construct();
        if (!$this->session->userdata('username')) {
            redirect(base_url('login'), 'refresh');
        }
        $this->load->model('Pemesan_model');
        $this->load->model('General_model');
    }

    public function index() {
        $query = $this->Pemesan_model->data_pemesan();
        $data = array(
            'title' => 'Halaman Dashboard Administrator - Data Pemesan',
            'isi'   => 'pemesan/pemesan_view',
            'data'  => $query
        );
        $this->load->view('layout/wrapper', $data);
    }

    public function tambah() {
        $this->form_validation->set_rules('idpemesan', 'ID Pemesan', 'required');
        $this->form_validation->set_rules('nmpemesan', 'Nama Pemesan', 'required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('propinsi', 'Propinsi', 'required');

        if ($this->form_validation->run() === FALSE) {
            $data = array(
                'title' => 'Tambah Data Pemesan',
                'isi'   => 'pemesan/tambah_pemesan'
            );
            $this->load->view('layout/wrapper', $data);
        } else {
            $data = array(
                'idpemesan' => $this->input->post('idpemesan'),
                'nmpemesan' => $this->input->post('nmpemesan'),
                'alamat'    => $this->input->post('alamat'),
                'email'     => $this->input->post('email'),
                'propinsi'  => $this->input->post('propinsi')
            );
            $this->General_model->add_new('pemesan', $data);
            redirect(base_url('pemesan'));
        }
    }

    public function edit($id = '') {
        $this->form_validation->set_rules('nmpemesan', 'Nama Pemesan', 'required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('propinsi', 'Propinsi', 'required');

        if ($this->form_validation->run() === FALSE) {
            $data = array(
                'title'     => 'Edit Data Pemesan',
                'isi'       => 'pemesan/edit_pemesan',
                'data'      => $this->Pemesan_model->get_pemesan_by_id($id),
                'idpemesan' => $id
            );
            $this->load->view('layout/wrapper', $data);
        } else {
            $idpemesan = $this->input->post('idpemesan');
            $data = array(
                'nmpemesan' => $this->input->post('nmpemesan'),
                'alamat'    => $this->input->post('alamat'),
                'email'     => $this->input->post('email'),
                'propinsi'  => $this->input->post('propinsi')
            );
            $where_data['idpemesan'] = $idpemesan;
            $this->General_model->edit_data('pemesan', $data, $where_data);
            redirect(base_url('pemesan'));
        }
    }

    public function delete($id = '') {
        $where_data['idpemesan'] = $id;
        $this->General_model->delete_data('pemesan', $where_data);
        redirect(base_url('pemesan'));
    }
}
?>
