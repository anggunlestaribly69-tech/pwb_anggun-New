<div class="row">
    <div class="col-12 grid-margin">
        <div class="card">

            <div class="card-body">
<h3 align="left" style="color:red;">Manajemen Data Pelanggan<br></h3>
<p align="left" style="color:black;">Lihat Data Pelanggan - BelajarAplikasi.com<br></p><br>
<hr>

<table id="tabel-akademik" class="table table-bordered" border="1" style="width:100%;">
<thead>
<tr class="warning" align="center" style="background: grey;color:white;font-weight: bold;">
<th scope="col">No</th>

<th scope="col">Nama Pelanggan</th>
<th scope="col">Alamat</th>
<th scope="col">Kota</th>
<th scope="col">Telpon</th>
<th scope="col">Email</th>
<th scope="col">Action</th>
</tr>
</thead>
<tbody>
<?php
$no = 1;
if (!empty($data)) {
    foreach ($data as $list) { ?>
<tr class="active" align="center">
<td><?php echo $no; ?></td>
<td><?php echo $list->nama_pelanggan; ?></td>
<td><?php echo $list->alamat_pelanggan; ?></td>
<td><?php echo $list->kota_pelanggan; ?></td>
<td><?php echo $list->telp_pelanggan; ?></td>
<td><?php echo $list->email_pelanggan; ?></td>
<td>
<a href="<?php echo base_url() ?>pelanggan/edit/<?php echo $list->kd_pelanggan; ?>"><span class="badge bg-warning">EDIT</span></a>
<a href="<?php echo base_url() ?>pelanggan/delete/<?php echo $list->kd_pelanggan; ?>" onclick="return confirm('Hapus data ini?')"><span class="badge bg-danger">DELETE</span></a>
</td>
</tr>
<?php $no++;
    }
} else { ?>
<tr><td colspan="7" align="center">Belum ada data pelanggan</td></tr>
<?php } ?>
</tbody>
</table>
</div>
</div>
</div>
</div>