<div class="row">
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h3 align="left" style="color:red;">Halaman Edit Pesanan<br></h3>
                <p align="left" style="color:black;">Edit Data Pesanan - BelajarAplikasi.com<br></p>
                <hr>

                <?php if (validation_errors()) : ?>
                    <div class="alert alert-danger" role="alert">
                        <?php echo validation_errors(); ?>
                    </div>
                <?php endif; ?>

                <form method="post" action="<?php echo base_url('pesanan/edit/'.$no_pesanan); ?>">
                    <div class="form-group mb-3">
                        <label for="no_pesanan" class="font-weight-bold">Nomor Pesanan</label>
                        <input type="text" class="form-control" id="no_pesanan" name="no_pesanan" value="<?php echo $no_pesanan; ?>" readonly="readonly">
                    </div>

                    <div class="form-group mb-3">
                        <label for="nama" class="font-weight-bold">Nama Penerima</label>
                        <input type="text" class="form-control" id="nama" name="nama" value="<?php echo isset($pesanan->nama) ? $pesanan->nama : ''; ?>" required>
                    </div>

                    <div class="form-group mb-3">
                        <label for="alamat" class="font-weight-bold">Alamat</label>
                        <textarea class="form-control" id="alamat" name="alamat" rows="3" required><?php echo isset($pesanan->alamat) ? $pesanan->alamat : ''; ?></textarea>
                    </div>

                    <div class="form-group mb-3">
                        <label for="telp" class="font-weight-bold">Nomor Telepon</label>
                        <input type="text" class="form-control" id="telp" name="telp" value="<?php echo isset($pesanan->telp) ? $pesanan->telp : ''; ?>" required>
                    </div>

                    <div class="form-group mb-3">
                        <label for="kd_ekspedisi" class="font-weight-bold">Ekspedisi</label>
                        <select class="form-control" id="kd_ekspedisi" name="kd_ekspedisi" required>
                            <?php foreach ($list_ekspedisi as $e) : ?>
                                <option value="<?php echo $e->kd_ekspedisi; ?>" <?php echo ($pesanan && $pesanan->kd_ekspedisi == $e->kd_ekspedisi) ? 'selected' : ''; ?>>
                                    <?php echo $e->nama_ekspedisi; ?> - <?php echo $e->tujuan; ?> (Rp <?= number_format($e->ongkir) ?>)
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="form-group mb-3">
                        <label for="status" class="font-weight-bold">Status Pesanan</label>
                        <select class="form-control" id="status" name="status">
                            <option value="lunas" <?php echo ($pesanan && $pesanan->status == 'lunas') ? 'selected' : ''; ?>>Lunas</option>
                            <option value="proses" <?php echo ($pesanan && $pesanan->status == 'proses') ? 'selected' : ''; ?>>Proses</option>
                            <option value="selesai" <?php echo ($pesanan && $pesanan->status == 'selesai') ? 'selected' : ''; ?>>Selesai</option>
                            <option value="keranjang" <?php echo ($pesanan && $pesanan->status == 'keranjang') ? 'selected' : ''; ?>>Keranjang</option>
                        </select>
                    </div>

                    <button type="submit" class="btn btn-gradient-primary me-2"><i class="mdi mdi-check"></i> SIMPAN PERUBAHAN</button>
                    <a href="<?php echo base_url('pesanan'); ?>" class="btn btn-danger"><i class="mdi mdi-close"></i> BATAL</a>
                </form>
            </div>
        </div>
    </div>
</div>
