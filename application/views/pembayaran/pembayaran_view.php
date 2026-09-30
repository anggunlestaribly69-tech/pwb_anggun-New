<div class="row">
    <div class="col-12 grid-margin">
        <div class="card">
            <div class="card-body">
<h3 align="left" style="color:red;">Lihat Data Pembayaran<br></h3>
<p align="left" style="color:black;">Lihat Data Pembayaran Pelanggan - BelajarAplikasi.com<br></p>
<br>
<hr>

<table id="tabel-akademik" class="table table-bordered" border="1" style="width:100%;">
<thead>
<tr class="warning" align="center" style="background: grey;color:white;font-weight: bold;">
<th scope="col">No</th>
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
$no= 1 ;
foreach ($data as $list) {
?>
<tr class="active" align="center">
<td><?php echo $no; ?></td>
<td><?php echo $list->kd_pembayaran; ?></td>
<td><?php echo $list->tanggal_pembayaran; ?></td>
<td><?php echo $list->no_pesanan; ?></td>
<td><?php echo $list->nama; ?></td>
<td><?php echo $list->alamat; ?></td>

<td><a href="<?php echo base_url()."../bukti_transfer/".$list->bukti_transfer; ?>" class="image-popup"><img style="width:40px;height:40px;" src="<?php echo base_url("../bukti_transfer/".$list->bukti_transfer) ?>" alt=""></a></td>
<td>Rp.<?php echo number_format($list->ongkir); ?></td>
<td class="total">Rp.<?php echo number_format($list->total + $list->ongkir); ?></td>

</tr>
<?php $no++;
}
?>
</tbody>
</table>
</div>
</div>
</div>
</div>
