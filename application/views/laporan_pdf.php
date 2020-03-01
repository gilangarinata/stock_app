<pre>
<!DOCTYPE html>
<html>
<body>

<h1 style="text-align:center" >Susu Maktam</h1>

<?php foreach($alamat as $alamat): ?>
<h2 style="text-align:center" ><?= $alamat['alamat'] ?></h2>
<?php endforeach ?>

<br>

<?php foreach($details as $details): 
  $jumlah_bayar=$details['jumlah_bayar'];
  $kembali = $details['kembali'];
  $metode = $details['metode_pembayaran'];

  ?>

<font size="28">
  <table>
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
</table>

</font>
<?php endforeach ?>


--------------------------------------------------------------
<font size="28">
<table style="widtd:100%;" >
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
    <td style="text-align: center; vertical-align: middle;"><?= $data['nama_produk'] ?></td>
    <td style="text-align: center; vertical-align: middle;"><?= $data['jumlah'] ?></td>
    <td style="text-align: center; vertical-align: middle;"><?= rupiah($data['harga']) ?></td>
    <td style="text-align: center; vertical-align: middle;"><?= rupiah($data['total']) ?></td>
  </tr>
  <?php endforeach ?>
</table>
<br><br>

  </font>
--------------------------------------------------------------
<font size="28">
<table>
  <tr>
    <td>Grand Total </td>
    <td>:</td>
    <td><?= rupiah($totals) ?></td>
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