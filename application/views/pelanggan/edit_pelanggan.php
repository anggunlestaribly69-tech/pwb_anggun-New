<div class="row">
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h3 align="left" style="color:red;">Halaman Edit Data Pelanggan<br></h3>
                <p align="left" style="color:black;">Edit Data Pelanggan - BelajarAplikasi.com<br></p>
                <hr>
                <form name="form1" method="post" action="<?php echo base_url('pelanggan/edit/'.$kd_pelanggan); ?>">
                    <p>
                        <label>Kode Pelanggan</label>
                        <input type="text" class="form-control" name="kd_pelanggan" value="<?php echo $kd_pelanggan; ?>" readonly="readonly">
                    </p>
                    <p>
                        <label>Nama Pelanggan</label>
                        <input type="text" class="form-control" name="nama_pelanggan" value="<?php echo isset($data->nama_pelanggan) ? $data->nama_pelanggan : ''; ?>" required>
                    </p>
                    <p>
                        <label>Alamat</label>
                        <input type="text" class="form-control" name="alamat_pelanggan" value="<?php echo isset($data->alamat_pelanggan) ? $data->alamat_pelanggan : ''; ?>" required>
                    </p>
                    <p>
                        <label>Kota</label>
                        <input type="text" class="form-control" name="kota_pelanggan" value="<?php echo isset($data->kota_pelanggan) ? $data->kota_pelanggan : ''; ?>" required>
                    </p>
                    <p>
                        <label>Telpon</label>
                        <input type="text" class="form-control" name="telp_pelanggan" value="<?php echo isset($data->telp_pelanggan) ? $data->telp_pelanggan : ''; ?>" required>
                    </p>
                    <p>
                        <label>Email</label>
                        <input type="email" class="form-control" name="email_pelanggan" value="<?php echo isset($data->email_pelanggan) ? $data->email_pelanggan : ''; ?>" required>
                    </p>
                    <p>
                        <label>Password (Kosongkan jika tidak diubah)</label>
                        <input type="password" class="form-control" name="password" placeholder="Masukkan password baru jika ingin mengubah">
                    </p>
                    <p>
                        <button type="submit" class="btn btn-primary me-2">EDIT</button>
                        <a href="<?php echo base_url('pelanggan'); ?>" class="btn btn-light">BATAL</a>
                    </p>
                </form>
            </div>
        </div>
    </div>
</div>
