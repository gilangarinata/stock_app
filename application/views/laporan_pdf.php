<pre>


<!DOCTYPE html>
<html>
<body>

<h2 style="text-align:center" >Susu Maktam</h2>

<?php foreach($alamat as $alamat): ?>
<h3 style="text-align:center" ><?= $alamat['alamat'] ?></h3>
<?php endforeach ?>

<br>
=====================================================================
<?php foreach($details as $details): ?>
<table>
  <tr>
    <th>Tanggal</th>
    <th>:</th>
    <th><?= $details['tanggal'] ?></th>
  </tr>
  <tr>
    <th>Nama Kasir</th>
    <th>:</th>
    <th><?= $details['nama'] ?></th>
  </tr>
  <tr>
    <th>Outlet</th>
    <th>:</th>
    <th><?= $details['outlet'] ?></th>
  </tr>
  <tr>
    <th>Shift</th>
    <th>:</th>
    <th><?= $details['shift'] ?></th>
  </tr>
</table>
<?php endforeach ?>


========================================================================

<table style="width:100%">
  <tr>
    <th>Nama Barang</th>
    <th>Jumlah</th> 
    <th>Harga</th>
    <th>Total</th>
  </tr>
  <?php $totals=0; foreach($data as $data): 
    $totals = $totals + $data['total'];
    ?>
  <tr>
    <td><?= $data['nama_produk'] ?></td>
    <td><?= $data['jumlah'] ?></td>
    <td><?= rupiah($data['harga']) ?></td>
    <td><?= rupiah($data['total']) ?></td>
  </tr>
  <?php endforeach ?>
</table>
<br><br>
============================================================

<h3>Grand Total : <?= rupiah($totals) ?> </h3>

</body>
</html>

 <?php 

function rupiah($angka){
	
	$hasil_rupiah = "Rp " . number_format($angka,2,',','.');
	return $hasil_rupiah;
 
}
//echo $dataku->nama;
// foreach($dataku as $data){
//     echo $data;
// }


?>
</pre>