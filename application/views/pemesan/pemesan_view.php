<div class="row">
    <div class="col-12 grid-margin">
        <div class="card">
            <div class="card-body">
                <h3 align="left" style="color:red;">Manajemen Data Pemesan<br></h3>
                <p align="left" style="color:black;">Lihat Data Pemesan - BelajarAplikasi.com<br></p><br>
                <hr>

                <a href="<?php echo base_url() ?>pemesan/tambah"><span class="badge badge-primary btn-sm">+ Tambah Data</span></a><br><br>

                <table id="tabel-akademik" class="table table-bordered" border="1" style="width:100%;">
                    <thead>
                        <tr class="warning" align="center" style="background: grey; color:white; font-weight: bold;">
                            <th scope="col" width="5%">No</th>
                            <th scope="col">ID Pemesan</th>
                            <th scope="col">Nama Pemesan</th>
                            <th scope="col">Alamat</th>
                            <th scope="col">Email</th>
                            <th scope="col">Propinsi</th>
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
                                    <td><?php echo $list->idpemesan; ?></td>
                                    <td><?php echo $list->nmpemesan; ?></td>
                                    <td><?php echo $list->alamat; ?></td>
                                    <td><?php echo $list->email; ?></td>
                                    <td><?php echo $list->propinsi; ?></td>
                                    <td>
                                        <a href="<?php echo base_url() ?>pemesan/edit/<?php echo $list->idpemesan; ?>">
                                            <span class="badge bg-warning">EDIT</span>
                                        </a>
                                        <a href="<?php echo base_url() ?>pemesan/delete/<?php echo $list->idpemesan; ?>" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
                                            <span class="badge bg-danger">DELETE</span>
                                        </a>
                                    </td>
                                </tr>
                            <?php 
                                $no++;
                            }
                        } else { ?>
                            <tr>
                                <td colspan="7" align="center">Data Pemesan belum ada</td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
