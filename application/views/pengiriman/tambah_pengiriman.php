<div class="row">
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h3 align="left" style="color:red;">Halaman Tambah Pengiriman<br></h3>
                <p align="left" style="color:black;">Tambah Data Pengiriman Barang<br></p>
                <hr>

                <?php if (validation_errors()) : ?>
                    <div class="alert alert-danger" role="alert">
                        <?php echo validation_errors(); ?>
                    </div>
                <?php endif; ?>

                <form method="post" action="<?php echo base_url('pengiriman/tambah'); ?>">
                    <div class="form-group">
                        <label for="kd_pengiriman">Kode Pengiriman</label>
                        <input type="text" class="form-control" id="kd_pengiriman" name="kd_pengiriman" value="<?php echo $kd_pengiriman; ?>" readonly>
                    </div>
                    <div class="form-group">
                        <label for="kd_pembayaran">Pembayaran (Pesanan yang sudah dibayar)</label>
                        <select class="form-control" id="kd_pembayaran" name="kd_pembayaran" required>
                            <option value="">-- Pilih Pembayaran --</option>
                            <?php if (!empty($data_pembayaran)) {
                                foreach ($data_pembayaran as $pmb) { ?>
                                    <option value="<?php echo $pmb->kd_pembayaran; ?>"><?php echo $pmb->kd_pembayaran . ' - No Pesanan: ' . $pmb->no_pesanan . ' (' . $pmb->nama . ')'; ?></option>
                            <?php } } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="tgl_pengiriman">Tanggal Pengiriman</label>
                        <input type="date" class="form-control" id="tgl_pengiriman" name="tgl_pengiriman" value="<?php echo date('Y-m-d'); ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="status_kirim">Status Pengiriman</label>
                        <select class="form-control" id="status_kirim" name="status_kirim" required>
                            <option value="Sedang Dikirim">Sedang Dikirim</option>
                            <option value="Terkirim">Terkirim</option>
                        </select>
                    </div>

                    <input type="submit" name="submit" class="btn btn-gradient-primary me-2" value="SUBMIT">
                    <a href="<?php echo base_url('pengiriman'); ?>" class="btn btn-danger">CANCEL</a>
                </form>
            </div>
        </div>
    </div>
</div>
