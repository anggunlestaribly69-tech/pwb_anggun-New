<div class="row">
<div class="col-12 grid-margin">
<div class="card">
<div class="card-body">
<h3 align="left" style="color:red;">Manajemen Data Barang<br></h3>
<p align="left" style="color:black;">Lihat Data Barang - BelajarAplikasi.com<br></p><br>
<hr>
<a href="<?php echo base_url() ?>barang/tambah"><span class="badge badge-primary btn-sm">+ Tambah Data</span> </a><br><br>
<table id="tabel-akademik" class="table table-bordered" border="1">
<thead>
<tr class="warning" align="center" style="background: grey;color:white;font-weight: bold;">
<th scope="col" width="3%">No</th>
<th scope="col" width="10%">Gambar</th>
<th scope="col">Kode</th>
<th scope="col">Nama Barang</th>
<th scope="col">Stok</th>
<th scope="col">Harga</th>
<th scope="col">Berat</th>
<th scope="col">Satuan</th>
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
<td><img style="width:40px;height:40px;" src="<?php echo base_url("gambar/".$list->gambar); ?>" alt=""></td>
<td><?php echo $list->kd_barang; ?></td>
<td><?php echo $list->nama_barang; ?></td>
<td><?php echo $list->stok; ?></td>
<td><?php echo $list->harga; ?></td>
<td><?php echo $list->berat; ?></td>
<td><?php echo $list->satuan; ?></td>
<td>
<a href="<?php echo base_url() ?>barang/edit/<?php echo $list->kd_barang; ?>"><span class="badge bg-warning">EDIT</span></a>
<a href="<?php echo base_url() ?>barang/delete/<?php echo $list->kd_barang; ?>" onclick="return confirm('Hapus data ini?')"><span class="badge bg-danger">DELETE</span></a>
</td>
</tr>
<?php $no++;
    }
} else { ?>
<tr><td colspan="9" align="center">Belum ada data barang</td></tr>
<?php } ?>
</tbody>
</table>
</div>
</div>
</div>
</div>