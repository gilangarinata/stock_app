<pre>
<!DOCTYPE html>
<html>
<style>
@page { margin: 16px; }
body { margin: 5px; }

</style>


<body style=" margin: 0; padding: 0;" >

<h5 style="text-align:left" >Susu Maktam</h5>

<?php
$size = 14;
?>

<?php foreach($alamat as $alamat): ?>
<p style="text-align:left; font-size : 12px;" ><?= $alamat['alamat'] ?></p>
<?php endforeach ?>


<?php foreach($details as $details): 
  $jumlah_bayar=$details['jumlah_bayar'];
  $kembali = $details['kembali'];
  $metode = $details['metode_pembayaran'];
  $pajak = $details['pajak'];
  $diskon = $details['diskon'];
  $grandtotal = $details['grand_total'];

  ?>

<font size="12">
  <table style="font-size: 10px;" >
  <tr>
    <td>Tanggal</td>
    <td>:</td>
    <td><?= $details['tanggal'] ?></td>
  </tr>
  <tr>
    <td>Nama Kasir</td>
    <td>:</td>
    <td><?= $details['nama'] ?></td>
  </tr>
  <tr>
    <td>Outlet</td>
    <td>:</td>
    <td><?= $details['outlet'] ?></td>
  </tr>
  <tr>
    <td>Shift</td>
    <td>:</td>
    <td><?= $details['shift'] ?></td>
  </tr>
  <tr>
    <td>Catatan</td>
    <td>:</td>
    <td><?= $details['catatan'] ?></td>
  </tr>
</table>

</font>
<?php endforeach ?>


----------------------
<font size="12">
<table style="font-size: 11px;">
  <tr>
    <td style="text-align: center; vertical-align: middle;">Nama Barang</td>
    <td style="text-align: center; vertical-align: middle;">Jumlah</td> 
    <td style="text-align: center; vertical-align: middle;">Harga</td>
    <td style="text-align: center; vertical-align: middle;">Total</td>
  </tr>
  <?php $totals=0; foreach($data as $data): 
    $totals = $totals + $data['total'];
    ?>
  <tr>
    <td style="text-align: left; vertical-align: middle;"><?= str_replace("%20"," ",$data['nama_produk']) ?></td>
    <td style="text-align: center; vertical-align: middle;"><?= $data['jumlah'] ?></td>
    <td style="text-align: center; vertical-align: middle;"><?= rupiah($data['harga']) ?></td>
    <td style="text-align: center; vertical-align: middle;"><?= rupiah($data['total']) ?></td>
  </tr>
  <?php endforeach ?>
</table>
<br><br>

  </font>
----------------------
<font size="12">
<table style="font-size: 10px;">
  <tr>
    <td>Total </td>
    <td>:</td>
    <td><?= rupiah($totals) ?></td>
  </tr>

  <tr>
    <td>Diskon </td>
    <td>:</td>
    <td>Rp. <?= rupiah($diskon) ?></td>
  </tr>

  <tr>
    <td>Pajak </td>
    <td>:</td>
    <td><?= rupiah($pajak) ?> %</td>
  </tr>

  <tr>
    <td>Grand Total </td>
    <td>:</td>
    <td><?= rupiah($grandtotal) ?></td>
  </tr>

  <tr>
    <td>Jumlah Bayar </td>
    <td>:</td>
    <td><?= rupiah($jumlah_bayar)." (".$metode.")" ?></td>
  </tr>

  <tr>
    <td>Kembali </td>
    <td>:</td>
    <td><?= rupiah($kembali)?></td>
  </tr>
</table>


</body>
</html>

 <?php 

function rupiah($angka){
	
	$hasil_rupiah = "  " . number_format($angka,0,',','.');
	return $hasil_rupiah;
 
}
//echo $dataku->nama;
// foreach($dataku as $data){
//     echo $data;
// }


?>
</font>
</pre>