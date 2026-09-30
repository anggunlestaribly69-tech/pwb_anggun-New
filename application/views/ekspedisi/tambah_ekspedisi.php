<div class="row">
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h3 align="left" style="color:red;">Halaman Tambah Ekspedisi<br></h3>
                <p align="left" style="color:black;">Tambah Data Ekspedisi - BelajarAplikasi.com<br></p>
                <hr>

                <?php if (validation_errors()) : ?>
                    <div class="alert alert-danger" role="alert">
                        <?php echo validation_errors(); ?>
                    </div>
                <?php endif; ?>

                <form method="post" action="<?php echo base_url('ekspedisi/tambah'); ?>">
                    <div class="form-group">
                        <label for="kd_ekspedisi">Kode Ekspedisi</label>
                        <input type="text" class="form-control" id="kd_ekspedisi" name="kd_ekspedisi" placeholder="Contoh: EK002" value="<?php echo set_value('kd_ekspedisi'); ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="nama_ekspedisi">Nama Ekspedisi</label>
                        <input type="text" class="form-control" id="nama_ekspedisi" name="nama_ekspedisi" placeholder="Contoh: JNE, J&T, SiCepat, POS Indonesia" value="<?php echo set_value('nama_ekspedisi'); ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="tujuan">Tujuan</label>
                        <input type="text" class="form-control" id="tujuan" name="tujuan" placeholder="Contoh: Pangkalpinang, Jakarta, Bandung" value="<?php echo set_value('tujuan'); ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="ongkir">Ongkos Kirim (Rp)</label>
                        <input type="number" class="form-control" id="ongkir" name="ongkir" placeholder="Contoh: 25000" value="<?php echo set_value('ongkir'); ?>" required>
                    </div>

                    <input type="submit" name="submit" class="btn btn-gradient-primary me-2" value="SUBMIT">
                    <a href="<?php echo base_url('ekspedisi'); ?>" class="btn btn-danger">CANCEL</a>
                </form>
            </div>
        </div>
    </div>
</div>
