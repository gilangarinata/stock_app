<?php
// echo $outletj;die;
?>
<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">

                <div class="ibox-title">
                    <h5>Penjualan Terbanyak Berdasarkan Produk</h5> <br> <h5>Tanggal : <?php 
                    
                    $tgl="";$bln="";$thn="";
                    if(!empty($_POST['tanggal'])) {
                        $tgl=$_POST['tanggal'];
                     }else{
                         $tgl = "-";
                     }

                     if(!empty($_POST['bulan'])) {
                        $bln=$_POST['bulan'];
                     }else{
                         $bln = "-";
                     }

                     if(!empty($_POST['tahun'])) {
                        $thn=$_POST['tahun'];
                     }else{
                         $thn = "-";
                     }

                     echo $tgl."/".$bln."/".$thn;
                    
                    ?></h5>
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
                                        <td class="center"><?= str_replace("%20"," ", $produk[0][$i]) ?></td>
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


                        <div class="form-group" id="date">
                            <label class="font-normal">Tanggal</label>
                            <input type="number" name="tanggal" value="" class="select2_demo_1 form-control">
                        </div>

                        <div class="form-group" id="month">
                            <label class="font-normal">Bulan</label>
                            <select name="bulan" class="select2_demo_1 form-control">
                                <option value="0">Semua</option>
                                <option value="01">Januari</option>
                                <option value="02">Februari</option>
                                <option value="03">Maret</option>
                                <option value="04">April</option>
                                <option value="05">Mei</option>
                                <option value="06">Juni</option>
                                <option value="07">Juli</option>
                                <option value="08">Agustus</option>
                                <option value="09">September</option>
                                <option value="10">Oktober</option>
                                <option value="11">November</option>
                                <option value="12">Desember</option>

                            </select>
                        </div>

                        <div class="form-group" id="year">
                            <label class="font-normal">Tahun</label>
                            <input type="number" name="tahun" value="" class="select2_demo_1 form-control">
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
    function selectFilter(){
        $("#month").hide();
        $("#year").hide();
        $("#date").hide();

        $('#filter').change(function(){
            console.log("asdasdasd")
            $(this).find("option:selected").each(function(){
                var optionValue = $(this).attr("value");
                if(optionValue=="month"){
                    $("#month").show();
                    $("#year").show();
                    $("#date").show();
                }
                else{
                    $("#month").hide();
                    $("#year").hide();
                    $("#date").hide();
                }
            });
        });
    }

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