<div class="ibox-content">
    <div class="row">
        <form method="post" enctype="multipart/form-data">
            <div class="col-sm-6 b-r">
                <h3 class="m-t-none m-b">Tambah Produk</h3>

                <?php foreach($produk as $produk): ?>
                <div class="form-group"><label>Nama Produk</label> <input value="<?= $produk['nama_produk'] ?>"  name="nama_produk" type="text" placeholder="Nama Produk" class="form-control"></div>
                <div class="form-group"><label>Deskripsi</label> <input value="<?= $produk['deskripsi'] ?>" name="deskripsi" type="text" placeholder="Deskripsi Produk" class="form-control"></div>
            </div>
            <div class="col-sm-6">
                <div class="form-group"><label>Harga</label> <input value="<?= $produk['harga'] ?>" name="harga" type="number" placeholder="Harga" class="form-control"></div>
                <div class="form-group"><label>Stock</label> <input value="<?=  $produk['stock'] ?>" name="stock" type="number" placeholder="Stock" class="form-control"></div>
                <div class="form-group">
                <select class="form-control" id="cars" name="kategori">
                        <?php foreach ($kategori as $kategori) : ?>
                            <option <?= $kategori['nama_produk']==$produk['kategori'] ? 'selected' : '' ?> value="<?= $kategori['nama_produk'] ?>"><?= $kategori['nama_produk'] ?></option>
                        <?php endforeach ?>
                    </select>

                </div>

                <div class="form-group"><label>Gambar</label><span class="input-group-addon btn btn-default btn-file"><input type="file" name="image"></span></div>

                <?php endforeach ?>

                <div>
                    <button class="btn btn-sm btn-primary pull-right m-t-n-xs" type="submit" name="submit"><strong>Simpan</strong></button>
                    <div class="i-checks"><label> <input type="radio" checked="" value="Dingin" name="es"> <i></i> Dingin </label></div>
                    <div class="i-checks"><label> <input type="radio" value="Hangat" name="es"> <i></i> Hangat </label></div>
                  </div>
            </div>
        </form>
    </div>
</div>