<div class="row">
<div class="col-md-12 grid-margin stretch-card">
<div class="card">
<div class="card-body">
<h3 align="left" style="color:red;">Halaman Edit Barang<br></h3>
<p align="left" style="color:black;">Edit Data Barang - BelajarAplikasi.com<br></p>
<hr>
<form name="form1" method="post" action="<?php echo base_url() ?>barang/edit/<?php echo $kd_barang ?>" enctype="multipart/form-data">
	<p><label>Kode Barang</label>
		<input type="text" class="form-control" name="kd_barang" value="<?php echo $kd_barang ?>" readonly="readonly"></p>
	<p><label>Nama Barang</label>
		<input type="text" class="form-control" name="nama_barang" value="<?php echo $data->nama_barang ?>"></p>
	<p><label>Stok</label>
		<input type="text" class="form-control" name="stok" value="<?php echo $data->stok ?>"></p>
	<p><label>Harga</label>
		<input type="text" class="form-control" name="harga" value="<?php echo $data->harga ?>"></p>
	<p><label>Satuan</label>
	<input type="text" class="form-control" name="satuan" value="<?php echo $data->satuan ?>"></p>
<p><label>Berat</label>
	<input type="text" class="form-control" name="berat" value="<?php echo $data->berat ?>"></p>

	<p><label>Keterangan</label>
		<input type="text" class="form-control" name="keterangan" value="<?php echo $data->keterangan ?>"></p>
	<p><label>Gambar</label>
	<input type="file" class="form-control" name="gambar" value="<?php echo $data->gambar ?>"></p>
	<p>
		<input type="submit" name="submit" value="EDIT">
		<input type="reset" name="submit2" value="BATAL">
	</p>
</form>
</div>
</div>
</div>
</div>
