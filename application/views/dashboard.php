<div class="row">
    <div class="col-lg-12">
        <div class="tabs-container">
            <ul class="nav nav-tabs">
                <li class="active"><a data-toggle="tab" href="#tab-0">Dashboard</a></li>
            </ul>
            <div class="tab-content">
                <div id="tab-0" class="tab-pane active">
                    <div class="panel-body">
                    <div class="input-group">
                        
                    <input id="search" type="text" class="form-control"> <span class="input-group-btn"> <button type="button" Onclick="setUrl(); return false;" class="btn btn-primary">Cari Barang
                                        </button> 
                                    </span></div>
                    <div>
                    <a href="<?= base_url() ?>dashboard/add_product"><button class="btn btn-primary" type="button"><i class="fa fa-plus"></i>&nbsp;&nbsp;Tambah Product</button></a>
                    </div>

                        <div class="ibox-content">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Kode</th>
                                            <th>Nama Produk</th>
                                            <th>Harga</th>
                                            <th>Harga Jual</th>
                                            <th>Stok</th>
                                            <th></th>
                                            <th>Distributor</th>
                                            <th>Lokasi Barang</th>
                                            <th>Terjual</th>
                                            <th>Foto</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i = 0;
                                        foreach ($products as $produk) : $i++; ?>
                                            <tr class="gradeX">
                                                <td><?= $i ?></td>
                                                <td><?= $produk['code'] ?></td>
                                                <td><?= $produk['name'] ?></td>
                                                <td><?= toRupiah($produk['price']) ?></td>
                                                <td class="center"><?= toRupiah($produk['sellPrice']) ?></td>
                                                <td class="center"><?= $produk['stock'] ?></td>
                                                <td class="center"><?= $produk['stock_type'] ?></td>
                                                <td class="center"><?= $produk['distributor'] ?></td>
                                                <td class="center"><?= $produk['address'] ?></td>
                                                <td class="center"><?= $produk['sold']?></td>
                                                <td class="center">
                                                    <a href="<?= base_url() ?>dashboard/gallery?product_id=<?= $produk['id'] ?>">
                                                        <img src="<?= base_url() . $produk['images1'] ?>" width="30px" height="50">
                                                    </a>
                                                </td>
                                                <td class="center">
                                                    <a href="<?= base_url() ?>dashboard/select_product?id=<?= $produk['id'] ?>"><button class="btn btn-primary" type="button"><i class="fa fa-money"></i>&nbsp;&nbsp;Pilih</button></a>
                                                    <a href="<?= base_url() ?>dashboard/edit_product?id=<?= $produk['id'] ?>"><button class="btn btn-warning" type="button"><i class="fa fa-edit"></i></button></a>
                                                    <a href="<?= base_url() ?>dashboard/delete_product/<?= $produk['id'] ?>"><button class="btn btn-danger" type="button"><i class="fa fa-trash"></i></button></a>
                                                    <a <?php 
            $username = $this->session->get_userdata('username');
            
            if(strpos($username['username'], 'admin') !== false){
                echo '';
            }else{
                echo 'style="display: none;"';
            }
    ?> href="<?= base_url() ?>dashboard/productdetail?product_id=<?= $produk['id'] ?>"><button class="btn btn-primary" type="button"><i class="fa fa-area-chart"></i></button></a>
                                                </td>
                                            </tr>
                                        <?php endforeach ?>
                                    </tbody>
                                </table>
                            </div>

                        </div>

                    </div>
                </div>

            </div>

            <?php
                function toRupiah($value)
                {
                    return number_format($value, 0, ",", ",");
                }
            ?>

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
        function setUrl() {
            window.location.href = 'https://localhost/stock/dashboard?q=' + document.getElementById('search').value;
        };



function requestFullScreen(element) {
    // Supports most browsers and their versions.
    var requestMethod = element.requestFullScreen || element.webkitRequestFullScreen || element.mozRequestFullScreen || element.msRequestFullScreen;

    if (requestMethod) { // Native full screen.
        requestMethod.call(element);
    } else if (typeof window.ActiveXObject !== "undefined") { // Older IE.
        var wscript = new ActiveXObject("WScript.Shell");
        if (wscript !== null) {
            wscript.SendKeys("{F11}");
        }
    }
}

document.querySelector('#search').addEventListener('keypress', function (e) {
    if (e.key === 'Enter') {
        setUrl()
    }
});

// var elem = document.getElementById("lalala"); // Make the body go full screen.
// requestFullScreen(elem);


function activaTab(tab){
  $('.nav-tabs a[href="#tab-' + tab + '"]').tab('show');
};

var url_string = window.location.href;
var url = new URL(url_string);
var c = url.searchParams.get("c");

console.log(c);
activaTab(c);

function getParameterByName(name, url = window.location.href) {
    name = name.replace(/[\[\]]/g, '\\$&');
    var regex = new RegExp('[?&]' + name + '(=([^&#]*)|&|#|$)'),
        results = regex.exec(url);
    if (!results) return null;
    if (!results[2]) return '';
    return decodeURIComponent(results[2].replace(/\+/g, ' '));
}

    $(document).ready(function() {

        document.getElementById('search').value = getParameterByName('q');


        $('.dataTables-example').DataTable({
            pageLength: 25,
            responsive: true,
            ordering: true,
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