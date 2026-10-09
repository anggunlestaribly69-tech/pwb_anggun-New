<div class="row">
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h3 align="left" style="color:red;">Halaman Edit Pengiriman<br></h3>
                <p align="left" style="color:black;">Edit Data Pengiriman Barang<br></p>
                <hr>

                <?php if (validation_errors()) : ?>
                    <div class="alert alert-danger" role="alert">
                        <?php echo validation_errors(); ?>
                    </div>
                <?php endif; ?>

                <form method="post" action="<?php echo base_url('pengiriman/edit/'.$kd_pengiriman); ?>">
                    <input type="hidden" name="kd_pengiriman" value="<?php echo $data->kd_pengiriman; ?>">
                    <div class="form-group">
                        <label for="kd_pengiriman_display">Kode Pengiriman</label>
                        <input type="text" class="form-control" id="kd_pengiriman_display" value="<?php echo $data->kd_pengiriman; ?>" readonly>
                    </div>
                    <div class="form-group">
                        <label for="kd_pembayaran_display">Kode Pembayaran</label>
                        <input type="text" class="form-control" id="kd_pembayaran_display" value="<?php echo $data->kd_pembayaran; ?> - No Pesanan: <?php echo isset($data->no_pesanan) ? $data->no_pesanan : '-'; ?> (<?php echo isset($data->nama) ? $data->nama : '-'; ?>)" readonly>
                    </div>
                    <div class="form-group">
                        <label for="tgl_pengiriman">Tanggal Pengiriman</label>
                        <input type="date" class="form-control" id="tgl_pengiriman" name="tgl_pengiriman" value="<?php echo $data->tgl_pengiriman; ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="status_kirim">Status Pengiriman</label>
                        <select class="form-control" id="status_kirim" name="status_kirim" required>
                            <option value="Sedang Dikirim" <?php echo ($data->status_kirim == 'Sedang Dikirim') ? 'selected' : ''; ?>>Sedang Dikirim</option>
                            <option value="Terkirim" <?php echo ($data->status_kirim == 'Terkirim') ? 'selected' : ''; ?>>Terkirim</option>
                        </select>
                    </div>

                    <input type="submit" name="submit" class="btn btn-gradient-primary me-2" value="UPDATE">
                    <a href="<?php echo base_url('pengiriman'); ?>" class="btn btn-danger">CANCEL</a>
                </form>
            </div>
        </div>
    </div>
</div>
