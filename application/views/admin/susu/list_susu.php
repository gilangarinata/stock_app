<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>List Produk</h5>
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
                <a href="<?= base_url('admin/listsusu/create') ?>"><button class="btn btn-primary" type="button"><i class="fa fa-plus"></i>&nbsp;Tambah</button></a>
                    
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover dataTables-example">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Produk</th>
                                    <th>Deskripsi</th>
                                    <th>Harga</th>
                                    <th>Kategori</th>
                                    <th>Gambar</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 0;
                                foreach ($produk as $produk) : $i++; ?>
                                    <tr class="gradeX">
                                        <td><?= $i ?></td>
                                        <td><?= $produk['nama_produk'] ?> (<?= $produk['es'] ?>)</td>
                                        <td><?= $produk['deskripsi'] ?></td>
                                        <td class="center"><?= $produk['harga'] ?></td>
                                        <td class="center"><?= $produk['kategori'] ?></td>
                                        <td class="center"><img src="<?= base_url('assets/upload/product/') ?><?= $produk['gambar'] ?>" height="50" width="50"/></td>
                                        <td class="center">
                                            <a href="<?= base_url() ?>admin/listsusu/delete/<?= $produk['id'] ?>"><button class="btn btn-danger btn-circle btn-outline" type="button"><i class="fa fa-trash"></i></button></a>
                                            <a href="<?= base_url() ?>admin/listsusu/edit/<?= $produk['id'] ?>"><button class="btn btn-warning btn-circle btn-outline" type="button"><i class="fa fa-edit"></i></button></a>
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