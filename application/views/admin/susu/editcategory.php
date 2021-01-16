<div class="ibox-content">
    <div class="row">
        <form method="post" enctype="multipart/form-data">
            <div class="col-sm-6 b-r">
                <h3 class="m-t-none m-b">Edit Kategori Susu</h3>
                <?php foreach($produk as $produk): ?>
                <div hidden class="form-group"><label></label> <input name="id" type="text" value="<?= $produk['id'] ?>" placeholder="Nama Kategori" class="form-control"></div>
                <div class="form-group"><label>Nama Kategori</label> <input name="nama_produk" type="text" value="<?= $produk['nama_produk'] ?>" placeholder="Nama Kategori" class="form-control"></div>
                <?php endforeach ?>
                <div>
                    <button class="btn btn-sm btn-primary pull-right m-t-n-xs" type="submit" name="submit"><strong>Simpan</strong></button>
                </div>
            </div>
        </form>
    </div>
    <br>
</div>