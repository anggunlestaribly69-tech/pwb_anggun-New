<?php
class Pembayaran extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('Pembayaran_model');
        $this->load->model('General_model');
        $this->load->model('Pesanan_model');
        $this->load->model('Pelanggan_model');
        $this->load->model('Barang_model');
    }

    function index() {
        if (!$this->session->userdata('username')) {
            redirect(base_url('login'), 'refresh');
            return;
        }
        $query = $this->Pembayaran_model->data_pembayaran();
        $data = array(
            'title' => 'Halaman Dashboard Administrator E-Commerce',
            'isi' => 'pembayaran/pembayaran_view',
            'data' => $query
        );
        $this->load->view('layout/wrapper', $data);
    }

    public function delete($id='') {
        if (!$this->session->userdata('username')) {
            redirect(base_url('login'), 'refresh');
            return;
        }
        $where_data['kd_pembayaran'] = $id;
        $this->General_model->delete_data('pembayaran', $where_data);
        //$this->General_model->delete_data('ada', $where_data);
        redirect(base_url().'pembayaran/');
    }
}
?>
