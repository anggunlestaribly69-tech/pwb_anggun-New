<div class="row">
    <div class="col-12 grid-margin">
        <div class="card">
            <div class="card-body">
                <h3 align="left" style="color:red;">Manajemen Data Ekspedisi<br></h3>
                <p align="left" style="color:black;">Lihat Data Ekspedisi - BelajarAplikasi.com<br></p><br>
                <hr>

                <a href="<?php echo base_url('ekspedisi/tambah'); ?>"><span class="badge badge-primary btn-sm">+ Tambah Data</span></a><br><br>

                <table id="tabel-akademik" class="table table-bordered" border="1" style="width:100%;">
                    <thead>
                        <tr class="warning" align="center" style="background: grey; color:white; font-weight: bold;">
                            <th scope="col" width="5%">No</th>
                            <th scope="col">Kode Ekspedisi</th>
                            <th scope="col">Nama Ekspedisi</th>
                            <th scope="col">Tujuan</th>
                            <th scope="col">Ongkos Kirim</th>
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
                                    <td><?php echo $list->kd_ekspedisi; ?></td>
                                    <td><?php echo $list->nama_ekspedisi; ?></td>
                                    <td><?php echo $list->tujuan; ?></td>
                                    <td>Rp.<?php echo number_format($list->ongkir); ?></td>
                                    <td>
                                        <a href="<?php echo base_url('ekspedisi/edit/'.$list->kd_ekspedisi); ?>">
                                            <span class="badge bg-warning">EDIT</span>
                                        </a>
                                        <a href="<?php echo base_url('ekspedisi/delete/'.$list->kd_ekspedisi); ?>" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
                                            <span class="badge bg-danger">DELETE</span>
                                        </a>
                                    </td>
                                </tr>
                            <?php 
                                $no++;
                            }
                        } else { ?>
                            <tr>
                                <td colspan="6" align="center">Data Ekspedisi belum ada</td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
