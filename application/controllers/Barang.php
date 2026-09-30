<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Barang extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('Barang_model');
        $this->load->model('General_model');
    }

    function index() {
        $query = $this->Barang_model->data_barang();
        $data = array(
            'title' => 'Halaman Dashboard Administrator E-Commerce',
            'isi'   => 'barang/barang_view',
            'data'  => $query
        );
        $this->load->view('layout/wrapper', $data);
    }

    public function delete($id='') {
        $where_data['kd_barang'] = $id;
        $this->General_model->delete_data('barang', $where_data);
        redirect(base_url().'barang/');
    }

    public function tambah() {
        $this->form_validation->set_rules('kd_barang','Kode Barang','required');
        $this->form_validation->set_rules('nama_barang','Nama Barang','required');
        $this->form_validation->set_rules('stok','Stok','required');
        $this->form_validation->set_rules('harga','Harga','required');
        $this->form_validation->set_rules('berat','Berat','required');
        $this->form_validation->set_rules('satuan','Satuan','required');
        $this->form_validation->set_rules('keterangan','Keterangan','required');

        if ($this->form_validation->run() === FALSE) {
            $data = array(
                'title' => 'Menambah Barang',
                'isi'   => 'barang/tambah_barang'
            );
            $this->load->view('layout/wrapper', $data);
        } else {
            // Handle upload gambar
            $nama_gambar = '';
            if (!empty($_FILES['gambar']['name'])) {
                $config_upload = array(
                    'upload_path'   => './gambar/',
                    'allowed_types' => 'gif|jpg|jpeg|png',
                    'max_size'      => 2048,
                    'encrypt_name'  => TRUE
                );
                $this->load->library('upload', $config_upload);
                if ($this->upload->do_upload('gambar')) {
                    $nama_gambar = $this->upload->data('file_name');
                } else {
                    // Upload gagal, kembali ke form
                    $data = array(
                        'title'          => 'Menambah Barang',
                        'isi'            => 'barang/tambah_barang',
                        'upload_error'   => $this->upload->display_errors()
                    );
                    $this->load->view('layout/wrapper', $data);
                    return;
                }
            }

            $data = array(
                'kd_barang'   => $this->input->post('kd_barang'),
                'nama_barang' => $this->input->post('nama_barang'),
                'stok'        => $this->input->post('stok'),
                'harga'       => $this->input->post('harga'),
                'berat'       => $this->input->post('berat'),
                'satuan'      => $this->input->post('satuan'),
                'keterangan'  => $this->input->post('keterangan'),
                'gambar'      => $nama_gambar,
            );
            $this->General_model->add_new('barang', $data);
            redirect(base_url().'barang/');
        }
    }

    public function edit($id='') {
        $this->form_validation->set_rules('nama_barang','Nama Barang','required');
        $this->form_validation->set_rules('stok','Stok','required');
        $this->form_validation->set_rules('harga','Harga','required');
        $this->form_validation->set_rules('berat','Berat','required');
        $this->form_validation->set_rules('satuan','Satuan','required');
        $this->form_validation->set_rules('keterangan','Keterangan','required');

        if ($this->form_validation->run() === FALSE) {
            $data = array(
                'title'     => 'Edit Barang',
                'isi'       => 'barang/edit_barang',
                'data'      => $this->Barang_model->info_barang($id),
                'kd_barang' => $id
            );
            $this->load->view('layout/wrapper', $data);
        } else {
            $kd_barang = $this->input->post('kd_barang');
            $info_lama = $this->Barang_model->info_barang($kd_barang);

            // Handle upload gambar baru (opsional)
            $nama_gambar = $info_lama ? $info_lama->gambar : '';
            if (!empty($_FILES['gambar']['name'])) {
                $config_upload = array(
                    'upload_path'   => './gambar/',
                    'allowed_types' => 'gif|jpg|jpeg|png',
                    'max_size'      => 2048,
                    'encrypt_name'  => TRUE
                );
                $this->load->library('upload', $config_upload);
                if ($this->upload->do_upload('gambar')) {
                    $nama_gambar = $this->upload->data('file_name');
                }
            }

            $data = array(
                'nama_barang' => $this->input->post('nama_barang'),
                'stok'        => $this->input->post('stok'),
                'harga'       => $this->input->post('harga'),
                'berat'       => $this->input->post('berat'),
                'satuan'      => $this->input->post('satuan'),
                'keterangan'  => $this->input->post('keterangan'),
                'gambar'      => $nama_gambar,
            );
            $where_data['kd_barang'] = $kd_barang;
            $this->General_model->edit_data('barang', $data, $where_data);
            redirect(base_url().'barang/');
        }
    }
}
?>