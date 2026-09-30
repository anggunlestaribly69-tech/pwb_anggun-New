<div class="row">
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h3 align="left" style="color:red;">Halaman Edit Data Ekspedisi<br></h3>
                <p align="left" style="color:black;">Edit Data Ekspedisi - BelajarAplikasi.com<br></p>
                <hr>

                <?php if (validation_errors()) : ?>
                    <div class="alert alert-danger" role="alert">
                        <?php echo validation_errors(); ?>
                    </div>
                <?php endif; ?>

                <form method="post" action="<?php echo base_url('ekspedisi/edit/'.$kd_ekspedisi); ?>">
                    <div class="form-group">
                        <label for="kd_ekspedisi">Kode Ekspedisi</label>
                        <input type="text" class="form-control" id="kd_ekspedisi" name="kd_ekspedisi" value="<?php echo $kd_ekspedisi; ?>" readonly="readonly">
                    </div>
                    <div class="form-group">
                        <label for="nama_ekspedisi">Nama Ekspedisi</label>
                        <input type="text" class="form-control" id="nama_ekspedisi" name="nama_ekspedisi" value="<?php echo isset($data->nama_ekspedisi) ? $data->nama_ekspedisi : ''; ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="tujuan">Tujuan</label>
                        <input type="text" class="form-control" id="tujuan" name="tujuan" value="<?php echo isset($data->tujuan) ? $data->tujuan : ''; ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="ongkir">Ongkos Kirim (Rp)</label>
                        <input type="number" class="form-control" id="ongkir" name="ongkir" value="<?php echo isset($data->ongkir) ? $data->ongkir : ''; ?>" required>
                    </div>

                    <input type="submit" name="submit" class="btn btn-gradient-primary me-2" value="EDIT">
                    <a href="<?php echo base_url('ekspedisi'); ?>" class="btn btn-danger">CANCEL</a>
                </form>
            </div>
        </div>
    </div>
</div>
