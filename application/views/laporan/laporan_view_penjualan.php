<div class="row">
    <div class="col-12 grid-margin">
        <div class="card">
            <div class="card-body">
                <h3 align="left" style="color:red;">Laporan Penjualan<br></h3>
                <p align="left" style="color:black;">Lihat & Cetak Laporan Penjualan - BelajarAplikasi.com<br></p>
                <hr>

                <!-- Form Filter & Cetak -->
                <form id="form-laporan" method="post" action="<?php echo base_url('laporan/laporan_view_form'); ?>">
                    <div class="form-group row align-items-center mb-4">
                        <div class="col-md-2 col-12 mb-2">
                            <h5 class="mb-0 font-weight-bold">Periode :</h5>
                        </div>
                        <div class="col-md-4 col-12 mb-2">
                            <label for="tanggal_mulai" class="text-muted small">Tanggal Mulai</label>
                            <input type="date" value="<?php echo htmlspecialchars($tanggal_mulai); ?>" class="form-control" id="tanggal_mulai" name="tanggal_mulai" required>
                        </div>
                        <div class="col-md-4 col-12 mb-2">
                            <label for="tanggal_selesai" class="text-muted small">Tanggal Selesai</label>
                            <input type="date" value="<?php echo htmlspecialchars($tanggal_selesai); ?>" class="form-control" id="tanggal_selesai" name="tanggal_selesai" required>
                        </div>
                        <div class="col-md-2 col-12 mb-2 text-md-end">
                            <button type="submit" formaction="<?php echo base_url('laporan/laporan_view_form'); ?>" class="btn btn-gradient-info btn-sm me-1 mb-1">
                                <i class="mdi mdi-filter"></i> Filter
                            </button>
                            <button type="submit" formaction="<?php echo base_url('laporan/cetak_laporan_penjualan'); ?>" formtarget="_blank" class="btn btn-gradient-primary btn-sm mb-1">
                                <i class="mdi mdi-printer"></i> Cetak Laporan
                            </button>
                        </div>
                    </div>
                </form>

                <div class="alert alert-light border mb-4">
                    <strong>Periode Terpilih:</strong> <?php echo date('d-m-Y', strtotime($tanggal_mulai)); ?> s/d <?php echo date('d-m-Y', strtotime($tanggal_selesai)); ?>
                </div>

                <!-- Tabel Data Penjualan -->
                <table id="tabel-akademik" class="table table-bordered" border="1" style="width:100%;">
                    <thead>
                        <tr class="warning" align="center" style="background: grey; color: white; font-weight: bold;">
                            <th scope="col" width="4%">No</th>
                            <th scope="col">Kode Bayar</th>
                            <th scope="col">Tanggal</th>
                            <th scope="col">Nama Pelanggan</th>
                            <th scope="col">Nama Barang</th>
                            <th scope="col">Harga</th>
                            <th scope="col">Qty</th>
                            <th scope="col">Subtotal</th>
                            <th scope="col">Total Bayar</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        if (!empty($data['data']) && is_array($data['data'])) {
                            foreach ($data['data'] as $key => $value) {
                        ?>
                        <tr class="active" align="center">
                            <td><?php echo $no; ?></td>
                            <td><span class="badge bg-secondary"><?php echo $value['kd_pembayaran']; ?></span></td>
                            <td><?php echo $value['tanggal_pembayaran']; ?></td>
                            <td align="left"><?php echo isset($value['nama_pelanggan']) ? $value['nama_pelanggan'] : (isset($value['nama']) ? $value['nama'] : '-'); ?></td>
                            <td align="left">
                                <?php if (!empty($data['data'][$key]['data_barang'])) {
                                    foreach ($data['data'][$key]['data_barang'] as $keyDetail => $valueDetail) : ?>
                                        <p class="mb-1">• <?= $valueDetail['nama_barang'] ?></p>
                                    <?php endforeach;
                                } else { ?>
                                    <span class="text-muted">-</span>
                                <?php } ?>
                            </td>
                            <td>
                                <?php if (!empty($data['data'][$key]['data_barang'])) {
                                    foreach ($data['data'][$key]['data_barang'] as $keyDetail => $valueDetail) : ?>
                                        <p class="mb-1">Rp <?= number_format($valueDetail['harga']) ?></p>
                                    <?php endforeach;
                                } else { ?>
                                    <span class="text-muted">-</span>
                                <?php } ?>
                            </td>
                            <td>
                                <?php if (!empty($data['data'][$key]['data_barang'])) {
                                    foreach ($data['data'][$key]['data_barang'] as $keyDetail => $valueDetail) : ?>
                                        <p class="mb-1"><?= $valueDetail['qty'] ?></p>
                                    <?php endforeach;
                                } else { ?>
                                    <span class="text-muted">-</span>
                                <?php } ?>
                            </td>
                            <td>
                                <?php if (!empty($data['data'][$key]['data_barang'])) {
                                    foreach ($data['data'][$key]['data_barang'] as $keyDetail => $valueDetail) : ?>
                                        <p class="mb-1">Rp <?= number_format($valueDetail['qty'] * $valueDetail['harga']) ?></p>
                                    <?php endforeach;
                                } else { ?>
                                    <span class="text-muted">-</span>
                                <?php } ?>
                            </td>
                            <td class="font-weight-bold text-success">Rp <?= number_format($value['total_bayar']) ?></td>
                        </tr>
                        <?php 
                            $no++;
                            }
                        } else { ?>
                        <tr>
                            <td colspan="9" align="center" class="text-muted">Tidak ada data transaksi penjualan pada periode ini</td>
                        </tr>
                        <?php } ?>
                    </tbody>
                    <tfoot>
                        <tr style="background: #f8f9fa;">
                            <th colspan="8" class="text-end font-weight-bold" style="text-align: right;">Total Penjualan :</th>
                            <th class="font-weight-bold text-center text-primary" style="font-size: 1.1rem;">
                                Rp <?= isset($data['total_seluruh_laporan']) ? number_format($data['total_seluruh_laporan']) : 0 ?>
                            </th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>
