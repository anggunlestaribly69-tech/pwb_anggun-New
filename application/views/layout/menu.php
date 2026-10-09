      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_sidebar.html -->
        <nav class="sidebar sidebar-offcanvas" id="sidebar">
          <ul class="nav">
            <li class="nav-item nav-profile">
              <a href="#" class="nav-link">
                <div class="nav-profile-image">
                  <img src="<?php echo base_url() ?>assets/images/faces/face1.jpg" alt="profile">
                  <span class="login-status online"></span>
                  <!--change to offline or busy as needed-->
                </div>
                <div class="nav-profile-text d-flex flex-column">
                  <span class="font-weight-bold mb-2"><?php echo $this->session->userdata('username') ? ucfirst($this->session->userdata('username')) : 'Admin'; ?></span>
                  <span class="text-secondary text-small"><?php echo $this->session->userdata('user_role') ? ucfirst($this->session->userdata('user_role')) : 'Administrator'; ?></span>
                </div>
                <i class="mdi mdi-bookmark-check text-success nav-profile-badge"></i>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="<?php echo base_url() ?>dashboard">
                <span class="menu-title">MENU</span>
                <i class="mdi mdi-home menu-icon"></i>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" data-bs-toggle="collapse" href="#menu-master" aria-expanded="false" aria-controls="menu-master">
                <span class="menu-title">MASTER</span>
                <i class="menu-arrow"></i>
                <i class="mdi mdi-crosshairs-gps menu-icon"></i>
              </a>
              <div class="collapse" id="menu-master">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item"> <a class="nav-link" href="<?php echo base_url() ?>pelanggan">Pelanggan</a></li>
                  <li class="nav-item"> <a class="nav-link" href="<?php echo base_url() ?>barang">Barang</a></li>
                  <li class="nav-item"> <a class="nav-link" href="<?php echo base_url() ?>pemesan">Pemesan</a></li>
                  <li class="nav-item"> <a class="nav-link" href="<?php echo base_url() ?>ekspedisi">Ekspedisi</a></li>
                </ul>
              </div>
            </li>
            <li class="nav-item">
              <a class="nav-link" data-bs-toggle="collapse" href="#menu-transaksi" aria-expanded="false" aria-controls="menu-transaksi">
                <span class="menu-title">TRANSAKSI</span>
                <i class="menu-arrow"></i>
                <i class="mdi mdi-crosshairs-gps menu-icon"></i>
              </a>
              <div class="collapse" id="menu-transaksi">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item"> <a class="nav-link" href="<?php echo base_url() ?>pesanan">Lihat Pesanan</a></li>
                  <li class="nav-item"> <a class="nav-link" href="<?php echo base_url() ?>lihat_pembayaran">Lihat Pembayaran</a></li>
                  <li class="nav-item"> <a class="nav-link" href="<?php echo base_url() ?>pengiriman">Data Pengiriman</a></li>
                </ul>
              </div>
            </li>
            <li class="nav-item">
              <a class="nav-link" data-bs-toggle="collapse" href="#menu-laporan" aria-expanded="false" aria-controls="menu-laporan">
                <span class="menu-title">LAPORAN</span>
                <i class="menu-arrow"></i>
                <i class="mdi mdi-crosshairs-gps menu-icon"></i>
              </a>
              <div class="collapse" id="menu-laporan">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item"> <a class="nav-link" href="<?php echo base_url() ?>Laporan/laporan_view_form">Laporan Penjualan</a></li>
                </ul>
              </div>
            </li>
 
          </ul>
        </nav>
        <!-- partial -->
        <div class="main-panel">
          <div class="content-wrapper">