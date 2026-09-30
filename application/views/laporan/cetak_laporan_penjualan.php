<link rel="stylesheet" href="<?php echo base_url() ?>assets/vendors/mdi/css/materialdesignicons.min.css">
<link rel="stylesheet" href="<?php echo base_url() ?>assets/vendors/css/vendor.bundle.base.css">
<link rel="stylesheet" href="<?php echo base_url() ?>assets/css/style.css">
<link rel="shortcut icon" href="<?php echo base_url() ?>assets/images/favicon.ico" />
<link rel="stylesheet" href="<?php echo base_url() ?>assets/vendors/datatables/dataTables.bootstrap5.min.css">

<div class="row">
    <div class="col-12 grid-margin">
        <div class="card">
            <div class="card-body">
<h3 align="center" style="color:red;">Laporan Cetak Penjualan<br></h3>
<p align="center" style="color:black;">Laporan Penjualan Pelanggan - BelajarAplikasi.com<br></p><br><br>

<h4 align="center">
    Periode : <?= date('d-m-Y', strtotime($tanggal_mulai)) ?>
    s/d <?= date('d-m-Y', strtotime($tanggal_selesai)) ?>
</h4>

<table id="tabel-penjualan" class="table table-bordered" border="1" style="width:100%;">
<thead>
<tr class="warning" align="center" style="background: grey; color: white; font-weight: bold;">
<th scope="col">No</th>
<th scope="col">Kode Bayar</th>
<th scope="col">Tanggal</th>
<th scope="col">Nama Pelanggan</th>
<th scope="col">Nama Barang</th>
<th scope="col">Harga</th>
<th scope="col">Qty</th>
<th scope="col">Subtotal</th>
<th scope="col">Total</th>
</tr>
</thead>
<tbody>
<?php
$no = 1;
$total_bayar = 0;
if (isset($data['data']) && is_array($data['data'])) {
foreach ($data['data'] as $key => $value) {
    // $total_bayar += $list->subtotal;
?>
<tr class="active" align="center">
<td><?php echo $no; ?></td>
<td><?php echo $value['kd_pembayaran']; ?></td>
<td><?php echo $value['tanggal_pembayaran']; ?></td>
<td><?php echo $value['nama_pelanggan']; ?></td>
<td>
<?php foreach ($data['data'][$key]['data_barang'] as $keyDetail => $valueDetail) : ?>
<p><?= $valueDetail['nama_barang'] ?></p>
<?php endforeach; ?>
</td>
<td>
<?php foreach ($data['data'][$key]['data_barang'] as $keyDetail => $valueDetail) : ?>
<p>Rp <?= number_format($valueDetail['harga']) ?></p>
<?php endforeach; ?>
</td>
<td>
<?php foreach ($data['data'][$key]['data_barang'] as $keyDetail => $valueDetail) : ?>
<p><?= $valueDetail['qty'] ?></p>
<?php endforeach; ?>
</td>
<td>
<?php foreach ($data['data'][$key]['data_barang'] as $keyDetail => $valueDetail) : ?>
<p>Rp <?= number_format($valueDetail['qty'] * $valueDetail['harga']) ?></p>
<?php endforeach; ?>
</td>
<td>Rp <?= number_format($value['total_bayar']) ?></td>

</tr>
<?php $no++; } } ?>

<tr>
<td colspan="8" align="right" class="font-weight-bold">Total Penjualan :</td>
<td class="font-weight-bold text-center">Rp <?= isset($data['total_seluruh_laporan']) ? number_format($data['total_seluruh_laporan']) : 0 ?></td>
</tr>

</tbody>
</table>
</div>
</div>
</div>
</div>

<script>
var css = '@page { size: landscape; }',
head = document.head || document.getElementsByTagName('head')[0],
style = document.createElement('style');

style.type = 'text/css';
style.media = 'print';

if (style.styleSheet){
style.styleSheet.cssText = css;
} else {
style.appendChild(document.createTextNode(css));
}

head.appendChild(style);

window.print();
</script>
