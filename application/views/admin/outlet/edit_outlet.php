<div class="ibox-content">
    <div class="row">
        <form method="post" enctype="multipart/form-data">
            <div class="col-sm-6 b-r">
                <h3 class="m-t-none m-b">Edit Outlet</h3>

                <?php foreach($outlet as $outlet): ?>
                <div class="form-group"><label>Outlet</label> <input value="<?= $outlet['outlet'] ?>"  name="outlet" type="text" class="form-control"></div>
                <div class="form-group"><label>Passoword</label> <input value="<?= $outlet['password'] ?>"  name="password" type="text" class="form-control"></div>

                <?php endforeach ?>
            </div>
            <div class="col-sm-6">

                <div>
                    <button class="btn btn-sm btn-primary pull-right m-t-n-xs" type="submit" name="submit"><strong>Simpan</strong></button>
                  </div>
            </div>
        </form>
    </div>
</div>