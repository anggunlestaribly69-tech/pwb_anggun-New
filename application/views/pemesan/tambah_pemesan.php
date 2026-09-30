<div class="row">
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h3 align="left" style="color:red;">Halaman Tambah Pemesan<br></h3>
                <p align="left" style="color:black;">Tambah Data Pemesan - BelajarAplikasi.com<br></p>
                <hr>

                <?php if (validation_errors()) : ?>
                    <div class="alert alert-danger" role="alert">
                        <?php echo validation_errors(); ?>
                    </div>
                <?php endif; ?>

                <form method="post" action="<?php echo base_url('pemesan/tambah'); ?>">
                    <div class="form-group">
                        <label for="idpemesan">ID Pemesan</label>
                        <input type="text" class="form-control" id="idpemesan" name="idpemesan" placeholder="Contoh: PMS003" value="<?php echo set_value('idpemesan'); ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="nmpemesan">Nama Pemesan</label>
                        <input type="text" class="form-control" id="nmpemesan" name="nmpemesan" placeholder="Nama Lengkap Pemesan" value="<?php echo set_value('nmpemesan'); ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="alamat">Alamat</label>
                        <input type="text" class="form-control" id="alamat" name="alamat" placeholder="Alamat Pemesan" value="<?php echo set_value('alamat'); ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="email@contoh.com" value="<?php echo set_value('email'); ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="propinsi">Propinsi</label>
                        <input type="text" class="form-control" id="propinsi" name="propinsi" placeholder="Nama Propinsi" value="<?php echo set_value('propinsi'); ?>" required>
                    </div>

                    <input type="submit" name="submit" class="btn btn-gradient-primary me-2" value="SUBMIT">
                    <a href="<?php echo base_url('pemesan'); ?>" class="btn btn-danger">CANCEL</a>
                </form>
            </div>
        </div>
    </div>
</div>
