<div class="row">
    <div class="col-lg-12">
        <div class="tabs-container">
            <ul class="nav nav-tabs">
                <li class="active"><a data-toggle="tab" href="#tab-1">Bulanan</a></li>
            </ul>
            <?php
            if (!function_exists('toRupiahs'))   {
                function toRupiahs($value)
                {
                    return "Rp. " . number_format((int)$value, 0, ".", ".");
                }
            }
            ?>
            <div class="tab-content">
                <div id="tab-1" class="tab-pane active">
                        <div class="panel-body">
                            <form method="post" enctype="multipart/form-data" class="form-horizontal">
                                <label class="font-normal">Bulan</label>
                                <div class="input-group date">
                                    <span class="input-group-addon"><i class="fa fa-calendar"></i></span><input id="month" name="month" type="number" class="form-control">
                                </div>
                                <label class="font-normal">Tahun</label>
                                <div class="input-group date">
                                    <span class="input-group-addon"><i class="fa fa-calendar"></i></span><input id="year" name="year" type="number" class="form-control">
                                </div>
                                <div" class="form-group">
                                    <div class="col-sm-4">
                                        <button class="btn btn-primary" type="submit" name="submit">Cari</button>
                                    </div>
                                </div>
                            </form>                            
                            <div class="ibox-content">
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered table-hover dataTables-example">
                                        <thead>
                                            <tr>
                                                <th>Barang</th>
                                                <th>Kode</th>
                                                <th>Bulan</th>
                                                <th>M1</th>
                                                <th>M2</th>
                                                <th>M3</th>
                                                <th>M4</th>
                                                <th>Omset</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php $i = 0;
                                                $omset = 0;
                                                $terjual = 0;
                                                $bulan = "";
                                                $name = "";
                                                $w1 = 0;
                                                $w2 = 0;
                                                $w3 = 0;
                                                $w4 = 0;
                                                $productCode = "";
                                        foreach ($monthly as $selling) : $i++; 
                                            $omset = $omset + $selling['totalPrice'];
                                            $terjual = $terjual + $selling['totalSold'];
                                            $name = $selling['product_name'];
                                            $productCode = $selling['product_code'];
                                            $bulan = $selling['month_s'] . "-" . $selling['year_s'];
                                            $date = $selling['date_s'];
                                            if($date > 0 && $date <= 7){
                                                $w1 = $w1 + $selling['totalSold'];
                                            }else if($date > 7 && $date <= 14){
                                                $w2 = $w2 + $selling['totalSold'];
                                            }else if($date > 14 && $date <= 21){
                                                $w3 = $w3 + $selling['totalSold'];
                                            }else{
                                                $w4 = $w4 + $selling['totalSold'];
                                            }
                                        ?>
                                        <?php endforeach ?>
                                        <tr class="gradeX">
                                                <td><?= $name ?></td>
                                                <td><?= $productCode ?></td>
                                                <td><?= $bulan ?></td>
                                                <td><?= $w1 ?></td>
                                                <td><?= $w2 ?></td>
                                                <td><?= $w3 ?></td>
                                                <td><?= $w4 ?></td>
                                                <td><?= toRupiahs($omset) ?></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>


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

<!-- Morris -->
<script src="js/plugins/morris/raphael-2.1.0.min.js"></script>
<script src="js/plugins/morris/morris.js"></script>

<!-- Morris demo data-->
<script src="/assets/js/morris-demo.js"></script>


<!-- Page-Level Scripts -->
<script>

function activaTab(tab){
  $('.nav-tabs a[href="#tab-' + tab + '"]').tab('show');
};

var url_string = window.location.href;
var url = new URL(url_string);
var c = url.searchParams.get("c");

console.log(c);
activaTab(c);


    $(document).ready(function() {
        $("#month").val("3121");

        // var error = "<?php echo $this->session->flashdata("state") ?>";

        // if (error != null) {
        //     if (error) {
        //         setTimeout(function() {
        //             toastr.options = {
        //                 closeButton: true,
        //                 progressBar: true,
        //                 showMethod: 'slideDown',
        //                 timeOut: 4000
        //             };
        //             toastr.success('Berhasil Hapus Data');
        //         }, 900);
        //     }
        // }

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