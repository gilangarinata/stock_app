<pre>


<!DOCTYPE html>
<html>
<body>

<h2>Struk Pembelian</h2>

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
    <td><?= $data['harga'] ?></td>
    <td><?= $data['total'] ?></td>
  </tr>
  <?php endforeach ?>
</table>
<br><br>
<h2>Grand Total : <?= $totals ?> </h2>

</body>
</html>

 <?php 

//echo $dataku->nama;
// foreach($dataku as $data){
//     echo $data;
// }


?>
</pre>