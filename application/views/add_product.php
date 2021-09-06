<div class="row">
    <div class="col-lg-12">
        <div class="tabs-container">
            <ul class="nav nav-tabs">
                <li class="active"><a data-toggle="tab" href="#tab-0">Tambah Barang</a></li>
            </ul>
            <div class="tab-content">
            <div class="row">
                <div class="col-lg-12">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
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
                            <form method="post" enctype="multipart/form-data" class="form-horizontal">
                                <div class="form-group"><label class="col-sm-2 control-label">Nama Barang</label>
                                    <div class="col-sm-10"><input value="<?= $mode == "EDIT" ? $product['name'] : ''  ?>" required="" name="name" type="text" class="form-control"></div>
                                </div>
                                <div class="form-group"><label class="col-sm-2 control-label">Kode Barang</label>
                                    <div class="col-sm-10"><input value="<?= $mode == "EDIT" ? $product['code'] : ''  ?>" name="code" type="text" class="form-control"></div>
                                </div>
                                <div class="form-group"><label class="col-sm-2 control-label">Harga</label>
                                    <div class="input-group m-b"><span class="input-group-addon">Rp.</span> <input value="<?= $mode == "EDIT" ? $product['price'] : ''  ?>" required="" name="price" type="number" class="form-control"> <span class="input-group-addon">.00</span></div>
                                </div>
                                <div class="form-group"><label class="col-sm-2 control-label">Harga Jual</label>
                                    <div class="input-group m-b"><span class="input-group-addon">Rp.</span> <input value="<?= $mode == "EDIT" ? $product['sellPrice'] : ''  ?>" required="" name="sellPrice" type="number" class="form-control"> <span class="input-group-addon">.00</span></div>
                                </div>
                                <div class="form-group"><label class="col-sm-2 control-label">Stock</label>
                                    <div class="form-inline">
                                        <div class="col-sm-8"><input value="<?= $mode == "EDIT" ? $product['stock'] : '' ?>" required="" name="stock" type="number" step="any" class="form-control"></div>
                                        <select name="stock_type" class="form-select" aria-label="Default select example">
                                            <option <?= $mode == "EDIT" ? ($product['stock_type'] == "PCS" ? "selected" : "") : "selected" ?> value="PCS">Pcs</option>
                                            <option <?= $mode == "EDIT" ? ($product['stock_type'] == "KG" ? "selected" : "") : "" ?> value="KG">Kg</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group"><label class="col-sm-2 control-label">Distributor</label>
                                    <div class="col-sm-10"><input value="<?= $mode == "EDIT" ? $product['distributor'] : '' ?>" name="distributor" type="text" class="form-control"></div>
                                </div>
                                <div class="form-group"><label class="col-sm-2 control-label">Lokasi Barang</label>
                                    <div class="col-sm-10"><input value="<?= $mode == "EDIT" ? $product['address'] : '' ?>" name="address" type="text" class="form-control"></div>
                                </div>
                                <div class="form-group"><label class="col-sm-2 control-label">Foto 1</label>
                                <input hidden type="text" value="<?= $mode == "EDIT" ? $product['images1'] : '' ?>" name="images1">
                                    <span class="input-group-addon btn btn-default btn-file"><input type="file" name="myimage"></span>
                                </div>
                                <div class="form-group"><label class="col-sm-2 control-label">Foto 2</label>
                                    <input hidden type="text" value="<?= $mode == "EDIT" ? $product['images2'] : '' ?>" name="images2">                     
                                    <span class="input-group-addon btn btn-default btn-file"><input type="file" name="myimage2"></span>
                                </div>
                                <div class="form-group"><label class="col-sm-2 control-label">Foto 3</label>  
                                    <input hidden type="text" value="<?= $mode == "EDIT" ? $product['images3'] : '' ?>" name="images3">                              
                                    <span class="input-group-addon btn btn-default btn-file"><input type="file" name="myimage3"></span>
                                </div>
                                <div class="form-group"><label class="col-sm-2 control-label">Foto 4</label>
                                <input hidden type="text" value="<?= $mode == "EDIT" ? $product['images4'] : '' ?>" name="images4">                     
                                    <span class="input-group-addon btn btn-default btn-file"><input type="file" name="myimage4"></span>
                                </div>

                                <div" class="form-group">
                                    <div class="col-sm-4 col-sm-offset-2">
                                        <a href="<?= base_url() ?>dashboard/cancel"><button class="btn btn-white" type="button">Batal</button></a>
                                        <button class="btn btn-primary" type="submit" onclick="javascript:history.back(1)" name="submit">Simpan</button>
                                    </div>
                                </div>
                            </form>
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

var loadFile = function(event) {
    var x=document.createElement('img'),
        y=document.getElementById("form-group-images").appendChild(x);
   y.src = URL.createObjectURL(event.target.files[0]);
  y.width = '200';
  };

function activaTab(tab){
  $('.nav-tabs a[href="#tab-' + tab + '"]').tab('show');
};

var url_string = window.location.href;
var url = new URL(url_string);
var c = url.searchParams.get("c");

console.log(c);
activaTab(c);


    $(document).ready(function() {


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