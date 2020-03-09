<div class="ibox-content">
    <div class="row">
        <form method="post" enctype="multipart/form-data">
            <div class="col-sm-6 b-r">
                <h3 class="m-t-none m-b">Tambah Kategori Susu</h3>

                <div class="form-group"><label>Nama Kategori</label> <input name="nama_produk" type="text" placeholder="Nama Kategori" class="form-control"></div>
                <div>
                    <button class="btn btn-sm btn-primary pull-right m-t-n-xs" type="submit" name="submit"><strong>Simpan</strong></button>
                </div>
            </div>
        </form>
    </div>
    <br>
    <div class="row">
    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover dataTables-example">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Kategori</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 0;
                                foreach ($produk as $produk) : $i++; ?>
                                    <tr class="gradeX">
                                        <td><?= $i ?></td>
                                        <td><?= $produk['nama_produk'] ?></td>
                                        <td class="center">
                                        <a href="<?= base_url() ?>admin/listsusu/deletecategory/<?= $produk['id'] ?>"><button class="btn btn-danger btn-circle btn-outline" type="button"><i class="fa fa-trash"></i></button></a>                                        </td>

                                    </tr>
                                <?php endforeach ?>
                            </tbody>
                        </table>
                    </div>

    </div>
</div>