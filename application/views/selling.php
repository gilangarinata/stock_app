<div class="row">
    <div class="col-lg-12">
        <div class="tabs-container">
            <ul class="nav nav-tabs">
                <li class="active"><a data-toggle="tab" href="#tab-0">Harian</a></li>
                <li><a data-toggle="tab" href="#tab-1">Bulanan</a></li>
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
                <div id="tab-0" class="tab-pane active">
                    <div class="panel-body">
                    <div>
                        <div class="ibox-content">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Tanggal</th>
                                            <th>Nama Barang</th>
                                            <th>Terjual</th>
                                            <th>Total Harga</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i = 0;
                                        foreach ($sellings as $selling) : $i++; ?>
                                            <tr class="gradeX">
                                                <td><?= $i ?></td>
                                                <td><?= $selling['date'] ?></td>
                                                <td><?= $selling['product_name'] ?></td>
                                                <td><?= $selling['totalSold'] ?></td>
                                                <td><?= toRupiahs($selling['totalPrice']) ?></td>
                                            </tr>
                                        <?php endforeach ?>
                                    </tbody>
                                </table>
                            </div>

                        </div>

                    </div>
                </div>
                </div>

                <div id="tab-1" class="tab-pane">
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
                                        <button class="btn btn-primary" type="submit" name="submit">Simpan</button>
                                    </div>
                                </div>
                            </form>                            
                            <div class="ibox-content">
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered table-hover dataTables-example">
                                        <thead>
                                            <tr>
                                                <th>Bulan</th>
                                                <th>Terjual</th>
                                                <th>Omset</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php $i = 0;
                                                $omset = 0;
                                                $terjual = 0;
                                                $bulan = "";
                                        foreach ($monthly as $selling) : $i++; 
                                            $omset = $omset + $selling['totalPrice'];
                                            $terjual = $terjual + $selling['totalSold'];

                                            $bulan = $selling['month_s'] . "-" . $selling['year_s'];
                                        ?>
                                        <?php endforeach ?>
                                        <tr class="gradeX">
                                                <td><?= $bulan ?></td>
                                                <td><?= $terjual ?></td>
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