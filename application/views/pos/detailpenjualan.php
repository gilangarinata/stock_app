<div class="row">
<div class="col-lg-12">
            <div class="ibox float-e-margins">

                <div class="ibox-title">
                    <h5>List Penjualan</h5>
                    <div class="ibox-tools">
                        <a class="collapse-link">
                            <i class="fa fa-chevron-up"></i>
                        </a>
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                            <i class="fa fa-wrench"></i>
                        </a>
                        <ul class="dropdown-menu dropdown-user">
                            <li><a href="#">Config option 1</a>
                            </li>
                            <li><a href="#">Config option 2</a>
                            </li>
                        </ul>
                        <a class="close-link">
                            <i class="fa fa-times"></i>
                        </a>
                    </div>
                </div>

                <?php $arr = array();
                $nm = array();
                $harga = array();
                $jumlah = array();
                $shift;
                $a = 0;
                foreach ($cart as $cart) : ?>
                    <?php
                    $arr[$a] = $cart['cart_id'];
                    $nm[$a] = $cart['nama_produk'];
                    $harga[$a] = $cart['harga'];
                    $jumlah[$a] = $cart['jumlah'];
                    ?>
                <?php $a++;
                endforeach ?>





                <div class="ibox-content">
                
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover dataTables-example">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Tanggal</th>
                                    <th>Produk</th>
                                    <th>Total</th>
                                    <th>Jumlah Bayar</th>
                                    <th>Kembali</th>
                                    <th>Metode Pembayaran</th>
                                    <th>Diskon</th>
                                    <th>Pajak</th>
                                    <th>Grand Total</th>
                                    <th>Shift</th>
                                    <th>Nama Kasir</th>
                                    <th>Outlet</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 0; $total=0; $jumlahBayar=0; $kembali=0;

                                $totalPajak = 0;

                                $totalDiskon = 0;
                                $totalGrandTotal = 0;

                                foreach ($produk as $produk) : $i++; 
                                    $total = $total + (int)$produk['total'];
                                    $totalGrandTotal = $totalGrandTotal + (int)$produk['grand_total'];
                                    $totalPajak = $totalPajak + ((int)$produk['pajak'] * (int)$produk['total'] / 100);
                                    $totalDiskon = $totalDiskon + (int)$produk['diskon'];
                                    $jumlahBayar = $jumlahBayar + (int)$produk['jumlah_bayar'];
                                    $kembali = $kembali + (int)$produk['kembali'];
                                    $shift = $produk['shift'];
                                    $nama_produk = ""; ?>

                                    <tr class="gradeX">
                                        <td><?= $i ?></td>
                                        <td><?= $produk['tanggal'] ?></td>
                                        <td>
                                            <?php
                                            $ty = 0;
                                            for ($r = 0; $r < sizeof($arr); $r++) {
                                                if ($arr[$r] == $produk['cart_id']) {
                                                    $ty++;
                                                    $index = strpos($nm[$r],"(");
                                                    echo $ty.". ". str_replace("%20"," ",substr($nm[$r],0,$index))  . " (" . $jumlah[$r] . ")  @" . toRupiah($harga[$r])  . "<br>";
                                                }
                                            }

                                            ?>

                                        </td>
                                        <td><?= toRupiah($produk['total'])  ?></td>
                                        <td class="center"><?= toRupiah($produk['jumlah_bayar'])  ?></td>
                                        <td class="center"><?= toRupiah($produk['kembali'])  ?></td>
                                        <td class="center"><?= $produk['metode_pembayaran'] ?></td>
                                        <td class="center"><?= toRupiah($produk['diskon'])  ?></td>
                                        <td class="center"><?= toRupiah(((int)$produk['pajak'] * (int)$produk['total'] / 100))  ?></td>
                                        <td class="center"><?= toRupiah($produk['grand_total']) ?></td>
                                        <td class="center"><?= $produk['shift'] ?></td>
                                        <td class="center"><?= $produk['nama'] ?></td>
                                        <td class="center"><?= $produk['outlet'] ?></td>
                                    </tr>


                                <?php endforeach ?>

                                <tr  class="gradeX">
                                    <td><p style="color:white">100</p></td>
                                    <td><b>Total</></td>
                                    <td></td>
                                    <td><b><?= toRupiah($total) ?></b></td>
                                    <td class="center"><b><?= toRupiah($jumlahBayar) ?></b></td>
                                    <td class="center"><b><?= toRupiah($kembali) ?></b></td>
                                    <td class="center"></td>
                                    <td class="center"><b><?= toRupiah($totalDiskon) ?></b></td> 
                                    <td class="center"><b><?= toRupiah($totalPajak) ?></b></td>
                                    <td class="center"></td>
                                    <td class="center"></td>
                                    <td class="center"></td>
                                    <td class="center"></td>
                                </tr>


                                <?php
                                function toRupiah($value)
                                {
                                    return "Rp. " . number_format((int)$value, 0, ".", ".");
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                    <form method="post" enctype="multipart/form-data">
                    <table class="table table-striped table-bordered table-hover dataTables-example">
                            <thead>
                                <tr>
                                    <th>Grand Total</th>
                                    <th><?= toRupiah($totalGrandTotal) ?></th>
                                </tr>
                                
                                <?php $i = 0; foreach($modal as $modal): 
                                    $i++;
                                    if($i>1) break;

                                    ?>

                                <tr>
                                    <th>Pajak</th>
                                    <th><input disabled name="pajak" type="number" value="<?= $totalPajak   ?>" class="form-control"></th>
                                </tr>

                                <tr>
                                    <th>Diskon</th>
                                    <th><input disabled name="diskon" type="number" value="<?= $totalDiskon   ?>" class="form-control"></th>
                                </tr>

                        
                                <tr  <?= $produk['shift'] == '1' ? "hidden" : "" ?>>
                                    <th>Modal</th>
                                    <th><input name="modal" type="number" value="<?= $modal['modal']  ?>" class="form-control"></th>
                                </tr>

                                <tr <?= $produk['shift'] == '1' ? "hidden" : "" ?>>
                                    <th>Pengeluaran</th>
                                    <th><input name="pengeluaran" type="number" value="<?= $modal['pengeluaran']  ?>" class="form-control"></th>
                                </tr>

                                <tr>
                                    <th>Saldo</th>
                                    <th><?= toRupiah( $totalGrandTotal - (int)$totalDiskon - (int)$totalPajak + (($shift == "2" ? (int)$modal['modal'] : 0)  -  ($shift == "2" ? (int)$modal['pengeluaran'] : 0)))   ?></th>
                                </tr>

                                <tr>
                                    <th></th>
                                    <th>
                                        <?php
                                            echo $totalGrandTotal;
                                            echo "<br>";
                                            echo $totalDiskon;
                                            echo "<br>";
                                            echo $totalDiskon;
                                            echo "<br>";
                                            

                                        ?>  
                                    </th>
                                </tr>


                                <?php endforeach ?>
                            </thead>

                    </table>

                    <div class="m-t-sm" <?= $produk['shift'] == '1' ? "hidden" : "" ?> >
                    <div class="btn-group" >
                        <button  type="submit" name="submit" class="btn btn-primary btn-sm"><i class="fa fa-shopping-cart"></i> Simpan</button>
                    </div>
                </div>


                    </form>

                </div>
            </div>
        </div>
</div>
    <!-- Mainly scripts -->
    <!-- Page-Level Scripts -->
    <script>
        $(document).ready(function() {
            var error = "<?php echo $this->session->flashdata("state") ?>";

            if (error != null) {
                if (error) {
                    setTimeout(function() {
                        toastr.options = {
                            closeButton: true,
                            progressBar: true,
                            showMethod: 'slideDown',
                            timeOut: 4000
                        };
                        toastr.success('Berhasil Hapus Data');
                    }, 900);
                }
            }

            $('.dataTables-example').DataTable({
                pageLength: 25,
                responsive: true,
                dom: '<"html5buttons"B>lTfgitp',
                buttons: [{
                        extend: 'copy'
                    },
                    {
                        extend: 'csv'
                    },
                    {
                        extend: 'excel',
                        title: 'ExampleFile'
                    },
                    {
                        extend: 'pdf',
                        title: 'ExampleFile'
                    },

                    {
                        extend: 'print',
                        customize: function(win) {
                            $(win.document.body).addClass('white-bg');
                            $(win.document.body).css('font-size', '10px');

                            $(win.document.body).find('table')
                                .addClass('compact')
                                .css('font-size', 'inherit');
                        }
                    }
                ]

            });

        });
    </script>