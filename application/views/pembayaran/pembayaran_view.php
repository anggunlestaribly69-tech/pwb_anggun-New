<div class="row">
    <div class="col-12 grid-margin">
        <div class="card">
            <div class="card-body">
                <h3 align="left" style="color:red;">Lihat Data Pembayaran<br></h3>
                <p align="left" style="color:black;">Lihat Data Pembayaran Pelanggan<br></p>
                <br>
                <hr>

                <div class="table-responsive">
                    <table id="tabel-akademik" class="table table-bordered table-striped" style="width:100%;">
                        <thead>
                            <tr class="warning text-center" style="background: grey; color:white; font-weight: bold;">
                                <th scope="col" width="4%">No</th>
                                <th scope="col">Kode Bayar</th>
                                <th scope="col">Tanggal Pembayaran</th>
                                <th scope="col">Nomor Pesanan</th>
                                <th scope="col">Nama Penerima</th>
                                <th scope="col">Alamat</th>
                                <th scope="col">Bukti Transfer</th>
                                <th scope="col">Ongkir</th>
                                <th scope="col">Total Bayar</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                        $no = 1;
                        if (!empty($data)) {
                            foreach ($data as $list) {
                                // Resolving image path
                                $img_url = '';
                                if (!empty($list->bukti_transfer)) {
                                    if (file_exists(FCPATH . 'bukti_transfer/' . $list->bukti_transfer)) {
                                        $img_url = base_url('bukti_transfer/' . $list->bukti_transfer);
                                    } else if (file_exists(FCPATH . '../pwb_anggun_frontend/bukti/' . $list->bukti_transfer)) {
                                        $img_url = base_url('../pwb_anggun_frontend/bukti/' . $list->bukti_transfer);
                                    } else if (file_exists(FCPATH . '../bukti_transfer/' . $list->bukti_transfer)) {
                                        $img_url = base_url('../bukti_transfer/' . $list->bukti_transfer);
                                    } else {
                                        $img_url = base_url('bukti_transfer/' . $list->bukti_transfer);
                                    }
                                }
                        ?>
                            <tr class="active text-center align-middle">
                                <td><?php echo $no; ?></td>
                                <td><span class="badge badge-dark"><?php echo $list->kd_pembayaran; ?></span></td>
                                <td><?php echo $list->tanggal_pembayaran; ?></td>
                                <td><strong><?php echo $list->no_pesanan; ?></strong></td>
                                <td><?php echo $list->nama; ?></td>
                                <td><?php echo $list->alamat; ?></td>
                                <td>
                                    <?php if (!empty($img_url) && !empty($list->bukti_transfer)) { ?>
                                        <a href="javascript:void(0);" onclick="showBuktiModal('<?php echo $img_url; ?>', '<?php echo $list->kd_pembayaran; ?>', '<?php echo $list->no_pesanan; ?>', '<?php echo addslashes($list->nama); ?>')">
                                            <img src="<?php echo $img_url; ?>" alt="Bukti Transfer <?php echo $list->kd_pembayaran; ?>" style="width: 55px; height: 55px; object-fit: cover; border-radius: 6px; border: 2px solid #007bff; box-shadow: 0 2px 4px rgba(0,0,0,0.1); cursor: pointer;" title="Klik untuk memperbesar">
                                        </a>
                                        <br>
                                        <a href="<?php echo $img_url; ?>" target="_blank" class="badge badge-info btn-xs mt-1" style="text-decoration:none;">Buka Full</a>
                                    <?php } else { ?>
                                        <span class="badge badge-secondary">Tidak Ada</span>
                                    <?php } ?>
                                </td>
                                <td>Rp.<?php echo number_format($list->ongkir); ?></td>
                                <td class="total font-weight-bold text-success">Rp.<?php echo number_format($list->total + $list->ongkir); ?></td>
                            </tr>
                        <?php 
                                $no++;
                            }
                        }
                        ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal Preview Bukti Transfer -->
<div class="modal fade" id="modalBuktiTransfer" tabindex="-1" aria-labelledby="modalBuktiLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title" id="modalBuktiLabel"><i class="mdi mdi-image"></i> Detail Bukti Transfer</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body text-center p-4">
                <div class="mb-3 text-start bg-light p-3 rounded">
                    <strong>Kode Pembayaran:</strong> <span id="modalKdPembayaran"></span> | 
                    <strong>No Pesanan:</strong> <span id="modalNoPesanan"></span> | 
                    <strong>Penerima:</strong> <span id="modalNama"></span>
                </div>
                <img id="modalImgBukti" src="" alt="Bukti Transfer" class="img-fluid rounded shadow" style="max-height: 500px; object-fit: contain;">
            </div>
            <div class="modal-footer">
                <a id="modalDownloadBtn" href="" target="_blank" class="btn btn-primary" download><i class="mdi mdi-download"></i> Buka / Unduh Gambar</a>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>

<script>
function showBuktiModal(imgUrl, kdPembayaran, noPesanan, nama) {
    document.getElementById('modalImgBukti').src = imgUrl;
    document.getElementById('modalKdPembayaran').textContent = kdPembayaran;
    document.getElementById('modalNoPesanan').textContent = noPesanan;
    document.getElementById('modalNama').textContent = nama;
    document.getElementById('modalDownloadBtn').href = imgUrl;
    
    var myModal = new bootstrap.Modal(document.getElementById('modalBuktiTransfer'));
    myModal.show();
}
</script>
