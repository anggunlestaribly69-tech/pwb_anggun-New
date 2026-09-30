<div class="row">
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h3 align="left" style="color:red;">Halaman Edit Data Pemesan<br></h3>
                <p align="left" style="color:black;">Edit Data Pemesan - BelajarAplikasi.com<br></p>
                <hr>

                <?php if (validation_errors()) : ?>
                    <div class="alert alert-danger" role="alert">
                        <?php echo validation_errors(); ?>
                    </div>
                <?php endif; ?>

                <form method="post" action="<?php echo base_url('pemesan/edit/'.$idpemesan); ?>">
                    <div class="form-group">
                        <label for="idpemesan">ID Pemesan</label>
                        <input type="text" class="form-control" id="idpemesan" name="idpemesan" value="<?php echo $idpemesan; ?>" readonly="readonly">
                    </div>
                    <div class="form-group">
                        <label for="nmpemesan">Nama Pemesan</label>
                        <input type="text" class="form-control" id="nmpemesan" name="nmpemesan" value="<?php echo isset($data->nmpemesan) ? $data->nmpemesan : ''; ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="alamat">Alamat</label>
                        <input type="text" class="form-control" id="alamat" name="alamat" value="<?php echo isset($data->alamat) ? $data->alamat : ''; ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" name="email" value="<?php echo isset($data->email) ? $data->email : ''; ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="propinsi">Propinsi</label>
                        <input type="text" class="form-control" id="propinsi" name="propinsi" value="<?php echo isset($data->propinsi) ? $data->propinsi : ''; ?>" required>
                    </div>

                    <input type="submit" name="submit" class="btn btn-gradient-primary me-2" value="EDIT">
                    <a href="<?php echo base_url('pemesan'); ?>" class="btn btn-danger">CANCEL</a>
                </form>
            </div>
        </div>
    </div>
</div>
