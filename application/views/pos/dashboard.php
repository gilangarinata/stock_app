<div class="row">
    <div class="col-lg-12">
        <div class="tabs-container">
            <ul class="nav nav-tabs">
                <li class="active"><a data-toggle="tab" href="#tab-0"> Susu</a></li>
                <?php $i = 0;
                foreach ($kategoriproduklain as $kategori) : $i++ ?>
                    <li class=""><a data-toggle="tab" href="#tab-<?= $i ?>"><?= $kategori['nama_produk'] ?></a></li>
                <?php endforeach ?>

            </ul>
            <div class="tab-content">
                <div id="tab-0" class="tab-pane active">
                    <div class="panel-body">
                        <div class="ibox-content">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Produk</th>
                                            <th>Deskripsi</th>
                                            <th>Harga</th>
                                            <th>Stock</th>
                                            <th>Kategori</th>
                                            <th>Gambar</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i = 0;
                                        foreach ($susu as $produk) : $i++; ?>
                                            <tr class="gradeX">
                                                <td><?= $i ?></td>
                                                <td><?= $produk['nama_produk'] ?> (<?= $produk['es'] ?>)</td>
                                                <td><?= $produk['deskripsi'] ?></td>
                                                <td class="center"><?= $produk['harga'] ?></td>
                                                <td class="center"><?= $produk['stock'] ?></td>
                                                <td class="center"><?= $produk['kategori'] ?></td>
                                                <td class="center"><img src="<?= base_url('assets/upload/product/') ?><?= $produk['gambar'] ?>" height="50" width="50" /></td>
                                                <td class="center">
                                                    <a href="<?= base_url() ?>pos/pos/addproduksusu/<?= $produk['id'] ?>/<?= $produk['nama_produk'] ?>/<?= $produk['harga'] ?>/<?= $produk['kategori'] ?>/<?= $produk['es'] ?>"><button class="btn btn-primary" type="button"><i class="fa fa-money"></i>&nbsp;&nbsp;Pilih Produk</button></a>
                                                </td>

                                            </tr>
                                        <?php endforeach ?>
                                    </tbody>
                                </table>
                            </div>

                        </div>

                    </div>
                </div>

                <?php $j = 0;
                foreach ($kategoriproduklain as $kategori) : $j++ ?>
                    <div id="tab-<?= $j ?>" class="tab-pane">
                        <div class="panel-body">
                            <div class="ibox-content">
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered table-hover dataTables-example">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Nama Produk</th>
                                                <th>Deskripsi</th>
                                                <th>Harga</th>
                                                <th>Stock</th>
                                                <th>Kategori</th>
                                                <th>Gambar</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $i = 0;
                                            foreach ($produklain as $produk) : $i++; ?>

                                                <?php if ($produk['kategori'] == $kategori['nama_produk']) : ?>

                                                    <tr class="gradeX">
                                                        <td><?= $i ?></td>
                                                        <td><?= $produk['nama_produk'] ?></td>
                                                        <td><?= $produk['deskripsi'] ?></td>
                                                        <td class="center"><?= $produk['harga'] ?></td>
                                                        <td class="center"><?= $produk['stock'] ?></td>
                                                        <td class="center"><?= $produk['kategori'] ?></td>
                                                        <td class="center"><img src="<?= base_url('assets/upload/product/') ?><?= $produk['gambar'] ?>" height="50" width="50" /></td>
                                                        <td class="center">
                                                            <a href="<?= base_url() ?>pos/pos/addproduklain/<?= $produk['id'] ?>/<?= $produk['nama_produk'] ?>/<?= $produk['harga'] ?>/<?= $produk['kategori'] ?>"><button class="btn btn-primary" type="button"><i class="fa fa-money"></i>&nbsp;&nbsp;Pilih Produk</button></a>
                                                        </td>
                                                    </tr>
                                                <?php endif ?>
                                            <?php endforeach ?>
                                        </tbody>
                                    </table>
                                </div>

                            </div>
                        </div>
                    </div>

                <?php endforeach ?>
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