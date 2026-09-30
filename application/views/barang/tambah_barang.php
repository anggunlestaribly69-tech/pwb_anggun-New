<div class="row">
<div class="col-md-12 grid-margin stretch-card">
<div class="card">
<div class="card-body">
<h3 align="left" style="color:red;">Halaman Tambah Barang<br></h3>
<p align="left" style="color:black;">Tambah Data Barang - BelajarAplikasi.com<br></p>
<hr>
<?php if(isset($upload_error)) echo '<div class="alert alert-danger">'.$upload_error.'</div>'; ?>
<form method="post" action="<?php echo base_url() ?>barang/tambah" enctype="multipart/form-data">
    <div class="form-group">
        <label for="kd_barang">Kode Barang</label>
        <input type="text" class="form-control" id="kd_barang" name="kd_barang" placeholder="Kode Barang">
    </div>
    <div class="form-group">
        <label for="exampleInputUsername1">Nama Barang</label>
        <input type="text" class="form-control" id="exampleInputUsername1" placeholder="Nama Barang" name="nama_barang" id="nama_barang">
    </div>
    <div class="form-group">
        <label for="exampleInputUsername1">Stok</label>
        <input type="text" class="form-control" id="exampleInputUsername1" placeholder="Stok" name="stok" id="stok">
    </div>
    <div class="form-group">
        <label for="exampleInputUsername1">Harga</label>
        <input type="text" class="form-control" id="exampleInputUsername1" placeholder="Harga" name="harga" id="harga">
    </div>
    <div class="form-group">
        <label for="exampleInputUsername1">Berat</label>
        <input type="text" class="form-control" id="exampleInputUsername1" placeholder="Berat" name="berat" id="berat">
    </div>
    <div class="form-group">
        <label for="exampleInputUsername1">Satuan</label>
        <input type="text" class="form-control" id="exampleInputUsername1" placeholder="Satuan" name="satuan" id="satuan">
    </div>
    <div class="form-group">
        <label for="exampleInputUsername1">Keterangan</label>
        <input type="text" class="form-control" id="exampleInputUsername1" placeholder="Keterangan" name="keterangan" id="keterangan">
    </div>
    <div class="form-group">
        <label for="exampleInputUsername1">Gambar</label>
        <input type="file" class="form-control" id="exampleInputUsername1" placeholder="Gambar" name="gambar" id="gambar">
    </div>

    <input type="submit" name="submit" class="btn btn-gradient-primary me-2" value="SUBMIT">
    <input type="reset" name="submit2" class="btn btn-danger" value="CANCEL">

</form>
</div>
</div>
</div>
</div>