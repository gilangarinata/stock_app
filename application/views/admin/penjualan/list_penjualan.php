<div class="wrapper wrapper-content animated fadeInRight">
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


                <?php
                    $outlets = array();
                    $totalPenjualanShift1 = array();
                    $totalPenjualanShift2 = array();
                    $modal = array();
                    $pengeluaran = array();

                    $totalModal = 0;
                    $totalPengeluaran = 0;
                    $pendapatan = 0;

                    $totalPajak = 0;
                    $totalDiskon = 0;


                    $i = 0;
                    $j = 0;
                    $k = 0;
                    $tanggal_now = "";

                    foreach($outlet as $outlet){
                        $outlets[$i] = $outlet['outlet'];
                        $i++;
                    }

                    for($i=0; $i<sizeof($outlets); $i++){
                        $totalPenjualanShift1[$i] = 0;
                        $totalPenjualanShift2[$i] = 0;
                        foreach($produk as $prd){
                            if(strcmp($prd["outlet"],$outlets[$i]) == 0 && $prd["shift"]=="1"){
                                $totalPenjualanShift1[$i] = $totalPenjualanShift1[$i] + (int)$prd['grand_total'];
                            }
                            if(strcmp($prd["outlet"],$outlets[$i]) == 0 && $prd["shift"]=="2"){
                                $totalPenjualanShift2[$i] = $totalPenjualanShift2[$i] + (int)$prd['grand_total'];
                            }
                        }                        
                    }

                    $array1 = [];
                    for($i=0; $i<sizeof($outlets); $i++){
                        $modal[$i] = 0;
                        $pengeluaran[$i] = 0;
                        foreach($modald as $mdl){
                            if(strcmp($mdl["outlet"],$outlets[$i]) == 0){
                                // foreach($array1 as $mdl2){
                                //     if($mdl['outlet'] == $mdl2['outlet']){
                                //         continue 2;
                                //     }
                                // }
                                array_push($array1, $mdl);
                                    $modal[$i] = (int)$mdl['modal'];
                                    $pengeluaran[$i] = (int)$mdl['pengeluaran'];
                            
                            }
                        }
                    }

                    foreach($modald as $mdl)
                    {
                        $tanggal_now = $mdl['tanggal_lengkap'] != null ? $mdl['tanggal_lengkap'] : "";
                    }

                    $array1 = [];
                    foreach($modald as $mdl)
                    {
                        foreach($array1 as $mdl2){
                            if($mdl['outlet'] == $mdl2['outlet']){
                                continue 2;
                            }
                        }
                        array_push($array1, $mdl);
                        $totalModal = $totalModal + (int)$mdl['modal'];
                        $totalPengeluaran = $totalPengeluaran + (int)$mdl['pengeluaran'];
                    }

                    foreach($produk as $prd)
                    {
                        $pendapatan = $pendapatan + (int)$prd['grand_total'];
                        $totalDiskon = $totalDiskon + (int)$prd['diskon'];
                        $totalPajak = $totalPajak + ((int)$prd['pajak'] / 100 * (int)$prd['total']);
                    }
                ?>



                <div class="ibox-content">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover">
                            <tbody>
                                <tr>
                                    <td>Tanggal</td>
                                    <td><?= $tanggal_now != null ? $tanggal_now : ""  ?></td>
                                </tr>
                                <tr>
                                    <td>Total Penjualan</td>
                                    <td><?= toRupiah($pendapatan) ?></td>
                                </tr>
                                <tr>
                                    <td>Total Modal</td>
                                    <td><?= toRupiah($totalModal) ?></td>
                                </tr>
                                <tr>
                                    <td>Total Pengeluaran</td>
                                    <td><?= toRupiah($totalPengeluaran) ?></td>
                                </tr>
                                <tr>
                                    <td>Total Pajak</td>
                                    <td><?= toRupiah($totalPajak) ?></td>
                                </tr>
                                <tr>
                                    <td>Total Diskon</td>
                                    <td><?= toRupiah($totalDiskon) ?></td>
                                </tr>
                                <tr>
                                    <td>Pendapatan</td>
                                    <td><?= toRupiah($pendapatan + $totalModal - $totalPajak - $totalDiskon ) ?></td>
                                </tr>
                            </tbody>


                        </table>
                    </div>
                </div>



                <div class="ibox-content">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover dataTables-example">
                            <thead>
                                <tr>
                                    <th>Outlet</th>
                                    <th>Total Penjualan Shift 1</th>
                                    <th>Total Penjualan Shift 2</th>
                                    <th>Modal</th>
                                    <th>Pengeluaran</th>
                                </tr>
                            </thead>
                            <tbody>

                            <?php $i = 0; foreach ($outlets as $outlet): ?>

                                    <tr class="gradeX">
                                        <td><?= $outlet ?></td>
                                        <td class="center"><?= $totalPenjualanShift1[$i] ?></td>
                                        <td class="center"><?= $totalPenjualanShift2[$i] ?></td>
                                        <td class="center"><?= $modal[$i] ?></td>
                                        <td class="center"><?= $pengeluaran[$i] ?></td>
                                    </tr>

                            <?php $i++; endforeach  ?>

                                <?php
                                function toRupiah($value)
                                {
                                    return "Rp." . number_format($value, 0, ".", ".");
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

                        <button type="submit" name="submit" class="btn btn-primary btn-sm"><i class="fa fa-shopping-cart"></i> Submit</button>

                    

                    </form>
                    </table>

                </div>
            </div>
        </div>
    </div>
</div>





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