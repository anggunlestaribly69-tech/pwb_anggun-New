<div class="row">
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h3 align="left" style="color:red;">Halaman Tambah Pesanan Baru<br></h3>
                <p align="left" style="color:black;">Tambah Pesanan Pelanggan - BelajarAplikasi.com<br></p>
                <hr>

                <?php if (validation_errors()) : ?>
                    <div class="alert alert-danger" role="alert">
                        <?php echo validation_errors(); ?>
                    </div>
                <?php endif; ?>

                <form method="post" action="<?php echo base_url('pesanan/tambah'); ?>" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group mb-3">
                                <label for="no_pesanan" class="font-weight-bold">Nomor Pesanan</label>
                                <input type="text" class="form-control" id="no_pesanan" name="no_pesanan" value="<?php echo set_value('no_pesanan', $next_no); ?>" required>
                            </div>

                            <div class="form-group mb-3">
                                <label for="tanggal_pesanan" class="font-weight-bold">Tanggal Pesanan</label>
                                <input type="date" class="form-control" id="tanggal_pesanan" name="tanggal_pesanan" value="<?php echo set_value('tanggal_pesanan', date('Y-m-d')); ?>" required>
                            </div>

                            <div class="form-group mb-3">
                                <label for="nama_pelanggan" class="font-weight-bold">Nama Pelanggan</label>
                                <input type="text" class="form-control" id="nama_pelanggan" name="nama_pelanggan" placeholder="Masukkan Nama Pelanggan" value="<?php echo set_value('nama_pelanggan'); ?>" required>
                            </div>

                            <div class="form-group mb-3">
                                <label for="alamat" class="font-weight-bold">Alamat Pelanggan / Pengiriman</label>
                                <textarea class="form-control" id="alamat" name="alamat" rows="3" placeholder="Alamat lengkap pelanggan / pengiriman" required><?php echo set_value('alamat'); ?></textarea>
                            </div>

                            <div class="form-group mb-3">
                                <label for="telp" class="font-weight-bold">Nomor Telepon</label>
                                <input type="text" class="form-control" id="telp" name="telp" placeholder="08xxxxxxxxxx" value="<?php echo set_value('telp'); ?>" required>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group mb-3">
                                <label for="kd_ekspedisi" class="font-weight-bold">Pilih Jasa Ekspedisi</label>
                                <select class="form-control" id="kd_ekspedisi" name="kd_ekspedisi" required>
                                    <option value="">-- Pilih Ekspedisi --</option>
                                    <?php foreach ($list_ekspedisi as $e) : ?>
                                        <option value="<?php echo $e->kd_ekspedisi; ?>">
                                            <?php echo $e->nama_ekspedisi; ?> - <?php echo $e->tujuan; ?> (Ongkir: Rp <?= number_format($e->ongkir) ?>)
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>

                            <div class="form-group mb-3">
                                <label for="kd_barang" class="font-weight-bold">Pilih Produk / Barang</label>
                                <select class="form-control" id="kd_barang" name="kd_barang" required>
                                    <option value="">-- Pilih Barang --</option>
                                    <?php foreach ($list_barang as $b) : ?>
                                        <option value="<?php echo $b->kd_barang; ?>">
                                            <?php echo $b->kd_barang; ?> - <?php echo $b->nama_barang; ?> (Harga: Rp <?= number_format($b->harga) ?>)
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>

                            <div class="form-group mb-3">
                                <label for="qty" class="font-weight-bold">Jumlah Beli (Qty)</label>
                                <input type="number" min="1" class="form-control" id="qty" name="qty" value="<?php echo set_value('qty', '1'); ?>" required>
                            </div>

                            <div class="form-group mb-3">
                                <label for="status" class="font-weight-bold">Status Pesanan</label>
                                <select class="form-control" id="status" name="status">
                                    <option value="lunas" selected>Lunas</option>
                                    <option value="proses">Proses</option>
                                    <option value="selesai">Selesai</option>
                                    <option value="keranjang">Keranjang</option>
                                </select>
                            </div>

                            <div class="form-group mb-3">
                                <label for="bukti_transfer" class="font-weight-bold">Bukti Transfer (Opsional)</label>
                                <input type="file" class="form-control" id="bukti_transfer" name="bukti_transfer" accept="image/*">
                                <small class="text-muted">Biarkan kosong jika ingin menggunakan struk transfer bawaan.</small>
                            </div>

                            <div class="alert alert-info py-2">
                                <i class="mdi mdi-information-outline"></i> Pesanan yang ditambahkan akan otomatis saling terhubung (realtime) ke tabel <strong>Lihat Pembayaran</strong> dan <strong>Laporan Penjualan</strong>.
                            </div>
                        </div>
                    </div>

                    <hr>
                    <button type="submit" class="btn btn-gradient-primary me-2"><i class="mdi mdi-check"></i> SIMPAN PESANAN</button>
                    <a href="<?php echo base_url('pesanan'); ?>" class="btn btn-danger"><i class="mdi mdi-close"></i> BATAL</a>
                </form>
            </div>
        </div>
    </div>
</div>

