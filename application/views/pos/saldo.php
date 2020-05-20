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
                                    <th>Pendapatan</th>
                                    <th>Modal</th>
                                    <th>Pengeluaran</th>
                                    <th>Total</th>
                                    <th>Nama Kasir</th>

                                </tr>
                            </thead>
                            <tbody>

                            <?php 
                                $tanggalModal = array();
                                $tanggalProduk = array();
                                $totalProduk = array();
                                $modal = array();
                                $pengeluaran = array();
                                $nama = array();
                                $total = array();
                                $dt = array();
                                $s = 0;
                                $i= 0;


                                $p = 0;
                                foreach($saldo as $saldo) {
                                    $tanggalModal[$p] = $saldo['tanggal_lengkap'];
                                    $modal[$p] = $saldo['modal'];
                                    $pengeluaran[$p] = $saldo['pengeluaran'];
                                    $nama[$p] = $saldo['nama'];
                                    $p++;
                                }
                                $o = 0;
                                foreach($produk as $produk) {
                                    $tanggalProduk[$o] = substr($produk['tanggal'],0,10);
                                    $totalProduk[$o] = $produk['total'];
                                    $o++;
                                }



                                for($s=0; $s<sizeof($tanggalModal); $s++){
                                    $total[$s] = 0;
                                    for($i; $i<sizeof($tanggalProduk); $i++){
                                        if($tanggalProduk[$i]==$tanggalModal[$s]){
                                            $total[$s] = $total[$s] + (int)$totalProduk[$i];
                                        }
                                    }
                                }

                                

                            ?>


                            <?php 

                                for ($i=0; $i<sizeof($modal); $i++) : ; 
                                     ?>
                                    <tr class="gradeX">
                                        <td><?= $i+1 ?></td>
                                        <td><?= $tanggalModal[$i] ?></td>
                                        <td><?= toRupiah($total[$i]) ?></td>
                                        <td><?= toRupiah($modal[$i]) ?></td>
                                        <td><?= toRupiah($pengeluaran[$i]) ?></td>
                                        <td><?= toRupiah((int)$total[$i]+(int)$modal[$i]-$pengeluaran[$i]) ?></td>
                                        <td><?= $nama[$i] ?></td>
                                    </tr>
                                <?php endfor ?>


                                <?php
                                function toRupiah($value)
                                {
                                    return "Rp. " . number_format($value, 0, ".", ".");
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>

              
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