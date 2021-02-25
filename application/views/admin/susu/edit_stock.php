<div class="ibox-content">
    <div class="row">
        <form method="post" enctype="multipart/form-data">
            <div class="col-sm-6 b-r">
                <h3 class="m-t-none m-b">Edit Stock</h3>

                <?php 
                    $stockS = "";
                foreach($stock as $stock): 
                    $stockS = $stock["stock"];
                    ?>

                <?php endforeach ?>
                <div class="form-group"><label>Stock</label> <input value="<?= $stockS ?>" name="stock" type="text" placeholder="Deskripsi Produk" class="form-control"></div>
            </div>
            <button class="btn btn-sm btn-primary pull-right m-t-n-xs" type="submit" name="submit"><strong>Simpan</strong></button>
        </form>
    </div>

</div>