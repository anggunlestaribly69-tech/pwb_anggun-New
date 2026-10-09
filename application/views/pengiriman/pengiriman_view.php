<div class="row">
    <div class="col-12 grid-margin">
        <div class="card">
            <div class="card-body">
                <h3 align="left" style="color:red;">Manajemen Data Pengiriman<br></h3>
                <p align="left" style="color:black;">Lihat Data Pengiriman Barang<br></p><br>
                <hr>

                <a href="<?php echo base_url('pengiriman/tambah'); ?>"><span class="badge badge-primary btn-sm">+ Tambah Data Pengiriman</span></a><br><br>

                <table id="tabel-akademik" class="table table-bordered" border="1" style="width:100%;">
                    <thead>
                        <tr class="warning" align="center" style="background: grey; color:white; font-weight: bold;">
                            <th scope="col" width="5%">No</th>
                            <th scope="col">Kode Pengiriman</th>
                            <th scope="col">Kode Pembayaran</th>
                            <th scope="col">No Pesanan</th>
                            <th scope="col">Nama Pemesan</th>
                            <th scope="col">Tanggal Pengiriman</th>
                            <th scope="col">Status Kirim</th>
                            <th scope="col" width="15%">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        if (!empty($data)) {
                            foreach ($data as $list) { ?>
                                <tr class="active" align="center">
                                    <td><?php echo $no; ?></td>
                                    <td><?php echo $list->kd_pengiriman; ?></td>
                                    <td><?php echo $list->kd_pembayaran; ?></td>
                                    <td><?php echo isset($list->no_pesanan) ? $list->no_pesanan : '-'; ?></td>
                                    <td><?php echo isset($list->nama) ? $list->nama : '-'; ?></td>
                                    <td><?php echo $list->tgl_pengiriman; ?></td>
                                    <td>
                                        <?php if ($list->status_kirim == 'Terkirim') { ?>
                                            <span class="badge badge-success"><?php echo $list->status_kirim; ?></span>
                                        <?php } else { ?>
                                            <span class="badge badge-warning"><?php echo $list->status_kirim; ?></span>
                                        <?php } ?>
                                    </td>
                                    <td>
                                        <a href="<?php echo base_url('pengiriman/edit/'.$list->kd_pengiriman); ?>">
                                            <span class="badge bg-warning">EDIT</span>
                                        </a>
                                        <a href="<?php echo base_url('pengiriman/delete/'.$list->kd_pengiriman); ?>" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
                                            <span class="badge bg-danger">DELETE</span>
                                        </a>
                                    </td>
                                </tr>
                            <?php 
                                $no++;
                            }
                        } else { ?>
                            <tr>
                                <td colspan="8" align="center">Data Pengiriman belum ada</td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
