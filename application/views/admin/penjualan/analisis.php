<?php
// echo $outletj;die;
?>
<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">

                <div class="ibox-title">
                    <h5>Penjualan Terbanyak Berdasarkan Produk</h5>
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



                <div class="ibox-content">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover dataTables-example">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Produk</th>
                                    <th>Jumlah Penjualan</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php for ($i = 0; $i < sizeof($produk[0]); $i++) : ?>
                                    <tr class="gradeX">
                                        <td><?= $i + 1 ?></td>
                                        <td class="center"><?= $produk[0][$i] ?></td>
                                        <td class="center"><?= $produk[1][$i] ?></td>
                                    </tr>
                                <?php endfor ?>

                                <?php
                                function toRupiah($value)
                                {
                                    return "" . number_format($value, 0, ".", ".");
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>

                    <div class="wrapper wrapper-content animated fadeInRight">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="ibox float-e-margins">
                                    <div class="ibox-content">
                                        <div>
                                            <canvas id="lineChart" height="200"></canvas>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>





                    <form method="post" enctype="multipart/form-data">
                        <div class="form-group" id="data_1">
                            <label class="font-normal">Outlet</label>

                            <select name="outlet" class="select2_demo_1 form-control">

                                <option value="all">Semua Outlet</option>

                                <?php foreach ($outletz as $outlet) : ?>
                                    <option <?= $outletj == $outlet['outlet'] ? "selected" : "" ?> value="<?= $outlet['outlet'] ?>"><?= $outlet['outlet'] ?></option>
                                <?php endforeach ?>
                            </select>
                        </div>

                        <table class="table table-striped table-bordered table-hover dataTables-example">

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

        <div class="col-lg-12">
            <div class="ibox float-e-margins">

                <div class="ibox-title">
                    <h5>Penjualan Terbanyak Beradsarkan Outlet</h5>
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



                <div class="ibox-content">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover dataTables-example">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Outlet</th>
                                    <th>Jumlah Penjualan</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php for ($i = 0; $i < sizeof($produk_outlet[0]); $i++) : ?>
                                    <tr class="gradeX">
                                        <td><?= $i + 1 ?></td>
                                        <td class="center"><?= $produk_outlet[0][$i] ?></td>
                                        <td class="center"><?= $produk_outlet[1][$i] ?></td>
                                    </tr>
                                <?php endfor ?>

                            </tbody>
                        </table>
                    </div>

                    <div class="wrapper wrapper-content animated fadeInRight">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="ibox float-e-margins">
                                    <div class="ibox-content">
                                        <div>
                                            <canvas id="lineChart2" height="200"></canvas>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>





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
<script src="<?= base_url() ?>assets/js/plugins/pace/pace.min.js"></script>

<!-- ChartJS-->
<!-- <script src="<?= base_url() ?>assets/js/demo/chartjs-demo.js"></script> -->


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



    $(function() {
        <?php
        $js_array = json_encode($produk[0]);
        $js_array2 = json_encode($produk[1]);


        echo "var labelz = " . $js_array . ";\n";
        echo "var dataz = " . $js_array2 . ";\n";
        ?>

        <?php
        $js_array = json_encode($produk_outlet[0]);
        $js_array2 = json_encode($produk_outlet[1]);


        echo "var labelz2 = " . $js_array . ";\n";
        echo "var dataz2 = " . $js_array2 . ";\n";
        ?>

        var lineData = {
            labels: labelz,
            datasets: [

                {
                    label: "Penjualan Berdasarkan Produk",
                    backgroundColor: 'rgba(26,179,148,0.5)',
                    borderColor: "rgba(26,179,148,0.7)",
                    pointBackgroundColor: "rgba(26,179,148,1)",
                    pointBorderColor: "#fff",
                    data: dataz
                }
            ]
        };

        var lineOptions = {
            responsive: true
        };


        var ctx = document.getElementById("lineChart").getContext("2d");
        new Chart(ctx, {
            type: 'line',
            data: lineData,
            options: lineOptions
        });

        //============================================================

        var lineData = {
            labels: labelz2,
            datasets: [

                {
                    label: "Penjualan Berdasarkan Outlet",
                    backgroundColor: 'rgba(26,179,148,0.5)',
                    borderColor: "rgba(26,179,148,0.7)",
                    pointBackgroundColor: "rgba(26,179,148,1)",
                    pointBorderColor: "#fff",
                    data: dataz2
                }
            ]
        };

        var lineOptions = {
            responsive: true
        };


        var ctx = document.getElementById("lineChart2").getContext("2d");
        new Chart(ctx, {
            type: 'line',
            data: lineData,
            options: lineOptions
        });



    });
</script>