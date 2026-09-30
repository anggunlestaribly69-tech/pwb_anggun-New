<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pesanan extends CI_Controller {

    public function __construct() {
        parent::__construct();
        if (!$this->session->userdata('username')) {
            redirect(base_url('login'), 'refresh');
        }
        $this->load->model('Pesanan_model');
        $this->load->model('General_model');
        $this->load->model('Pelanggan_model');
        $this->load->model('Barang_model');
    }

    public function index() {
        $query = $this->Pesanan_model->data_pesanan();
        $data = array(
            'title' => 'Halaman Dashboard Administrator - Data Pesanan',
            'isi'   => 'pesanan/pesanan_view',
            'data'  => $query
        );
        $this->load->view('layout/wrapper', $data);
    }

    public function tambah() {
        $this->form_validation->set_rules('no_pesanan', 'Nomor Pesanan', 'required|is_unique[pesanan.no_pesanan]');
        $this->form_validation->set_rules('nama_pelanggan', 'Nama Pelanggan', 'required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');
        $this->form_validation->set_rules('telp', 'Nomor Telepon', 'required');
        $this->form_validation->set_rules('kd_ekspedisi', 'Ekspedisi', 'required');
        $this->form_validation->set_rules('kd_barang', 'Barang', 'required');
        $this->form_validation->set_rules('qty', 'Jumlah (Qty)', 'required|numeric|greater_than[0]');

        if ($this->form_validation->run() === FALSE) {
            $data = array(
                'title'          => 'Tambah Pesanan Baru',
                'isi'            => 'pesanan/tambah_pesanan',
                'next_no'        => $this->Pesanan_model->get_next_no_pesanan(),
                'list_pelanggan' => $this->Pesanan_model->get_pelanggan_list(),
                'list_ekspedisi' => $this->Pesanan_model->get_ekspedisi_list(),
                'list_barang'    => $this->Pesanan_model->get_barang_list()
            );
            $this->load->view('layout/wrapper', $data);
        } else {
            $no_pesanan         = $this->input->post('no_pesanan');
            $tanggal_pesanan    = $this->input->post('tanggal_pesanan') ? $this->input->post('tanggal_pesanan') : date('Y-m-d');
            $nama_pelanggan     = trim($this->input->post('nama_pelanggan') ? $this->input->post('nama_pelanggan') : $this->input->post('nama'));
            $alamat             = trim($this->input->post('alamat'));
            $telp               = trim($this->input->post('telp'));
            $kd_ekspedisi       = $this->input->post('kd_ekspedisi');
            $status             = $this->input->post('status') ? $this->input->post('status') : 'lunas';
            $kd_barang          = $this->input->post('kd_barang');
            $qty                = (int)$this->input->post('qty');

            // 1. Cek atau sesuaikan pelanggan ke database berdasarkan Nama Pelanggan
            $pelanggan = $this->db->get_where('pelanggan', array('nama_pelanggan' => $nama_pelanggan))->row();

            if ($pelanggan) {
                $kd_pelanggan_final = $pelanggan->kd_pelanggan;
            } else {
                // Buat data pelanggan baru jika belum ada di database
                $data_pelanggan_baru = array(
                    'nama_pelanggan'   => $nama_pelanggan,
                    'alamat_pelanggan' => $alamat,
                    'kota_pelanggan'   => 'Pangkalpinang',
                    'telp_pelanggan'   => $telp,
                    'email_pelanggan'  => strtolower(preg_replace('/[^a-zA-Z0-9]/', '', $nama_pelanggan)) . '@gmail.com',
                    'password'         => '123456'
                );
                $this->General_model->add_new('pelanggan', $data_pelanggan_baru);
                $new_id = $this->db->insert_id();
                $kd_pelanggan_final = $new_id ? $new_id : 1;
            }

            // 2. Simpan Data ke tabel pesanan
            $data_pesanan = array(
                'no_pesanan'      => $no_pesanan,
                'tanggal_pesanan' => $tanggal_pesanan,
                'nama'            => $nama_pelanggan,
                'alamat'          => $alamat,
                'telp'            => $telp,
                'status'          => $status,
                'kd_ekspedisi'    => $kd_ekspedisi,
                'kd_pelanggan'    => $kd_pelanggan_final
            );
            $this->General_model->add_new('pesanan', $data_pesanan);

            // 2. Ambil harga barang & simpan ke tabel ada (detail barang)
            $barang = $this->Barang_model->info_barang($kd_barang);
            $harga = $barang ? $barang->harga : 0;
            $data_ada = array(
                'no_pesanan' => $no_pesanan,
                'kd_barang'  => $kd_barang,
                'qty'        => $qty,
                'harga'      => $harga
            );
            $this->General_model->add_new('ada', $data_ada);

            // 3. Handle upload bukti transfer atau gunakan default
            $nama_bukti = 'PMB-001_Bukti Transfer 5.jpg';
            if (!empty($_FILES['bukti_transfer']['name'])) {
                $target_dir = './bukti_transfer/';
                if (!is_dir($target_dir)) {
                    @mkdir($target_dir, 0777, true);
                }
                $config_upload = array(
                    'upload_path'   => $target_dir,
                    'allowed_types' => 'gif|jpg|jpeg|png',
                    'max_size'      => 4096,
                    'file_name'     => 'PMB-' . $no_pesanan . '_' . time()
                );
                if (!isset($this->upload)) {
                    $this->load->library('upload', $config_upload);
                } else {
                    $this->upload->initialize($config_upload);
                }
                if ($this->upload->do_upload('bukti_transfer')) {
                    $nama_bukti = $this->upload->data('file_name');
                    // Salin ke root bukti_transfer jika diperlukan
                    if (is_dir('../bukti_transfer/')) {
                        @copy($target_dir . $nama_bukti, '../bukti_transfer/' . $nama_bukti);
                    }
                }
            }

            // 4. Simpan ke tabel pembayaran agar realtime connect ke Lihat Pembayaran & Laporan
            $q_bayar = $this->db->query("SELECT MAX(CAST(kd_pembayaran AS UNSIGNED)) as max_bayar FROM pembayaran");
            $row_bayar = $q_bayar ? $q_bayar->row() : null;
            $next_bayar = ($row_bayar && $row_bayar->max_bayar) ? ($row_bayar->max_bayar + 1) : 1;

            $data_pembayaran = array(
                'kd_pembayaran'      => (string)$next_bayar,
                'tanggal_pembayaran' => $tanggal_pesanan,
                'bukti_transfer'     => $nama_bukti,
                'no_pesanan'         => $no_pesanan
            );
            $this->General_model->add_new('pembayaran', $data_pembayaran);

            // Redirect ke halaman pesanan
            redirect(base_url('pesanan'));
        }
    }

    public function edit($id = '') {
        $this->form_validation->set_rules('nama', 'Nama Penerima', 'required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');
        $this->form_validation->set_rules('telp', 'Nomor Telepon', 'required');
        $this->form_validation->set_rules('status', 'Status', 'required');

        if ($this->form_validation->run() === FALSE) {
            $data = array(
                'title'          => 'Edit Data Pesanan',
                'isi'            => 'pesanan/edit_pesanan',
                'pesanan'        => $this->Pesanan_model->info_pesanan($id),
                'list_ekspedisi' => $this->Pesanan_model->get_ekspedisi_list(),
                'no_pesanan'     => $id
            );
            $this->load->view('layout/wrapper', $data);
        } else {
            $no_pesanan = $this->input->post('no_pesanan');
            $data_update = array(
                'nama'         => $this->input->post('nama'),
                'alamat'       => $this->input->post('alamat'),
                'telp'         => $this->input->post('telp'),
                'status'       => $this->input->post('status'),
                'kd_ekspedisi' => $this->input->post('kd_ekspedisi')
            );
            $where['no_pesanan'] = $no_pesanan;
            $this->General_model->edit_data('pesanan', $data_update, $where);
            redirect(base_url('pesanan'));
        }
    }

    public function delete($id = '') {
        $where_data['no_pesanan'] = $id;
        $this->General_model->delete_data('pesanan', $where_data);
        $this->General_model->delete_data('ada', $where_data);
        $this->General_model->delete_data('pembayaran', $where_data);
        redirect(base_url('pesanan'));
    }
}
?>
