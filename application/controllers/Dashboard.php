<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Dashboard extends CI_Controller {

    public function index()
    {
        if ($this->session->userdata('username')) {
            $data = array(
                'title' => 'Halaman Dashboard Administrator E-Commerce',
                'isi'   => 'dashboard/dashboard_view'
            );
            $this->load->view('layout/wrapper', $data);
        } else {
            redirect(base_url('login'), 'refresh');
        }
    }
}
?>