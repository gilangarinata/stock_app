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
                                    <th>Shift</th>
                                    <th>Nama Kasir</th>
                                    <th>Outlet</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 0; $total=0; $jumlahBayar=0; $kembali=0;
                                foreach ($produk as $produk) : $i++; 
                                    $total = $total + (int)$produk['total'];
                                    $jumlahBayar = $jumlahBayar + (int)$produk['jumlah_bayar'];
                                    $kembali = $kembali + (int)$produk['kembali'];

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
                                                    echo $ty.". ". str_replace("%20"," ",$nm[$r])  . " (" . $jumlah[$r] . ") " . $harga[$r] . "<br>";
                                                }
                                            }

                                            ?>

                                        </td>
                                        <td><?= $produk['total'] ?></td>
                                        <td class="center"><?= $produk['jumlah_bayar'] ?></td>
                                        <td class="center"><?= $produk['kembali'] ?></td>
                                        <td class="center"><?= $produk['metode_pembayaran'] ?></td>
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
                                    <td class="center"></td>
                                    <td class="center"></td>
                                    <td class="center"></td>
                                </tr>


                                <?php
                                function toRupiah($value)
                                {
                                    return "" . number_format($value, 0, ".", ".");
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>

                    <form method="post" enctype="multipart/form-data">
                        <div class="form-group" id="data_1">
                            <label class="font-normal">Tanggal</label>
                            <div class="input-group date">
                                <span class="input-group-addon"><i class="fa fa-calendar"></i></span><input name="tanggal" type="date" class="form-control" value="">
                            </div>
                        </div>

                        <table class="table table-striped table-bordered table-hover dataTables-example">
                            <tr>
                                <td>
                                    <div class="radio radio-info radio-inline">
                                        <input type="radio" id="inlineRadio1" value="1" name="shift1" checked="">
                                        <label for="inlineRadio1"> Shift 1 </label>
                                    </div>
                                </td>

                                <td>

                                </td>

                                <td>
                                    <div class="radio radio-inline">
                                        <input type="radio" id="inlineRadio2" value="2" name="shift1">
                                        <label for="inlineRadio2"> Shift 2 </label>
                                    </div>
                                </td>
                            </tr>

                            <tr>
                                <td>
                                    <button class="btn btn-sm btn-primary" type="submit" name="submit"><strong>Filter</strong></button>

                                </td>
                            </tr>

                    </form>
                    </table>

                </div>
            </div>
        </div>
</div>
    <!-- Mainly scripts -->
    <script src="<?= base_url() ?>assets/js/jquery-3.1.1.min.js"></script>
    <script src="<?= base_url() ?>assets/js/bootstrap.min.js"></script>
    <script src="<?= base_url() ?>assets/js/plugins/metisMenu/jquery.metisMenu.js"></script>
    <script src="<?= base_url() ?>assets/js/plugins/slimscroll/jquery.slimscroll.min.js"></script>

    <!-- Custom and plugin javascript -->
    <script src="<?= base_url() ?>assets/js/inspinia.js"></script>
    <script src="<?= base_url() ?>assets/js/plugins/pace/pace.min.js"></script>


    <!-- Mainly scripts -->
    <script src="<?= base_url() ?>assets/js/jquery-3.1.1.min.js"></script>
    <script src="<?= base_url() ?>assets/js/bootstrap.min.js"></script>
    <script src="<?= base_url() ?>assets/js/plugins/metisMenu/jquery.metisMenu.js"></script>
    <script src="<?= base_url() ?>assets/js/plugins/slimscroll/jquery.slimscroll.min.js"></script>

    <script src="<?= base_url() ?>assets/js/plugins/dataTables/datatables.min.js"></script>

    <!-- Custom and plugin javascript -->
    <script src="<?= base_url() ?>assets/js/inspinia.js"></script>
    <script src="<?= base_url() ?>js/plugins/pace/pace.min.js"></script>

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