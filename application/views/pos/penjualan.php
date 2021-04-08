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





                <div class="ibox-content">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover dataTables-example">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Tanggal</th>
                                    <th>Shift</th>
                                    <th>Nama</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                function checkEquals($currentProduk){
                                    $isEqual = false;
                                    $count = 0;
                                    foreach ($produk as $produk){
                                        if($produk['tanggal'] == $currentProduk['tanggal']){
                                            if($produk['shift'] == $currentProduk['shift']){
                                                $count++;
                                            }
                                        }
                                    }
                                    
                                    if($count > 1){
                                        $isEqual = true;
                                    }else{
                                        $isEqual = false;
                                    }

                                    return $isEqual;
                                }
                                
                                
                                $i=0; foreach ($produk as $produk) : 
                                    if(checkEquals($produk)){
                                        continue;
                                    }
                                    
                                $i++;?>

                                    <tr class="gradeX">
                                        <td><?= $i ?></td>
                                        <td><?= $produk['tanggal'] ?></td>
                                        <td><?= $produk['shift'] ?></td>
                                    
                                        <td class="center"><?= $produk['kasir'] ?></td>
                                        <td> 
                                            <a href="<?= base_url() ?>pos/pos/detailpenjualan/<?= str_replace('/','-',$produk['tanggal']) ?>/<?= $produk['shift'] ?>">Open</a> 
                                         
                                            
                                        </td>

                                        <td>
                                        <a href="<?= base_url() ?>pos/pos/hapusPenjualan/<?= str_replace('/','-',$produk['tanggal']) ?>/<?= $produk['shift'] ?>">Delete</a>
                                        </td>
                                    </tr>
                                <?php endforeach ?>
             
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