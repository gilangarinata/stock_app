<div class="ibox-content">
    <div class="row">
        <form method="post" enctype="multipart/form-data">
            <div class="col-sm-6 b-r">
                <h3 class="m-t-none m-b">Tambah Produk Lain</h3>

                <div class="form-group"><label>Rasa</label> <input name="nama_produk" type="text" placeholder="Nama Produk" class="form-control"></div>
                <div class="form-group"><label>Deskripsi</label> <input name="deskripsi" type="text" placeholder="Deskripsi Produk" class="form-control"></div>
            </div>
            <div class="col-sm-6">
                <div class="form-group"><label>Harga</label> <input name="harga" type="number" placeholder="Harga" class="form-control"></div>
                <div class="form-group"><label>Kategori</label> <input value="produk lain" disabled name="kategori" type="text" placeholder="Kategori" class="form-control"></div>

                <div class="form-group"><label>Gambar</label><span class="input-group-addon btn btn-default btn-file"><input type="file" name="image"></span></div>

                <div>
                    <button class="btn btn-sm btn-primary pull-right m-t-n-xs" type="submit" name="submit"><strong>Simpan</strong></button>
                    <?php foreach ($kategori as $kategori) : ?>
                            
                                <div class="i-checks"><label> <input type="radio" checked="" value="<?= $kategori['nama_produk'] ?>" name="es"> <i></i> <?= $kategori['nama_produk'] ?> </label> <a href="<?= base_url() ?>admin/listproduklain/deletecategory/<?= $kategori['id'] ?>"><span class="badge badge-danger">x</span></a></div>
                    <?php endforeach ?>

                </div>
            </div>
        </form>
    </div>
</div>