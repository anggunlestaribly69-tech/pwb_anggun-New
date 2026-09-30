<?php 
class Index extends CI_Controller{
	function __construct(){
		parent::__construct();
		}
 
 public function index(){
 	$data = array('title' => 'Halaman Dashboard Administrator - E-commerce',
		'isi' => 'dashboard/dashboard_view'
	);
$this->load->view('layout/wrapper', $data);
	}
}
?>