<?php
date_default_timezone_set('Asia/Jakarta');
$jml = 0;
foreach ($jumlah_produk as $jumlah) :
    $jml = $jml + $jumlah['jumlah'];
endforeach
?>




<div class="row">
    <div class="col-md-9">

        <div class="ibox">
            <div class="ibox-title">
                <span class="pull-right">(<strong><?= $jml ?></strong>) items</span>
                <h5>Produk</h5>
            </div>
            <?php $i = 0;
            foreach ($cart as $cart) : ?>

                <div class="ibox-content">
                    <div class="table-responsive">
                        <table class="table shoping-cart-table">

                            <tbody>
                                <tr>
                                    <td width="90">
                                        <div class="cart-product-imitation">
                                            <img src="<?= base_url('assets/upload/product/') ?><?= $cart['gambar'] ?>" height="60" width="60" />

                                        </div>
                                    </td>
                                    <td class="desc">
                                        <h3>
                                            <a href="#" class="text-navy">
                                                <?= str_replace("%20"," ",$cart['nama_produk'])  ?> 
                                            </a>
                                        </h3>
                                        <p class="small">
                                            <?= $cart['deskripsi'] ?>
                                        </p>

                                        <div class="m-t-sm">

                                            <a href="<?= base_url() ?>pos/cart/cart/delete/<?= $cart['id'] ?>" class="text-muted"><i class="fa fa-trash"></i> Hapus Produk</a>
                                        </div>
                                    </td>

                                    <td id="harga<?= $i ?>">
                                        <?= $cart['harga'] ?>
                                    </td>
                                    <td width="65">
                                        <input readonly id="jumlah<?= $i ?>" onkeydown="realtimeFct()" onkeypress="realtimeFct()" onkeyup="realtimeFct()" type="text" value="<?= $cart['jumlah'] ?>" class="form-control">
                                    </td>
                                    <td>
                                        <h4 id="total_item<?= $i ?>">
                                            <?= $cart['total'] ?>
                                        </h4>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                </div>

            <?php $i++;
            endforeach ?>
            <div class="ibox-content">
                <a href="<?= base_url('pos/pos') ?>"><button class="btn btn-white"><i class="fa fa-arrow-left"></i> Kembali</button></a>

            </div>
        </div>

    </div>
    <div class="col-md-3">
    <form action="<?= base_url('pos/cart/cart/addcart') ?>" method="post" enctype="multipart/form-data">

        <div class="ibox">
            <div class="ibox-title">
                <h5>Pembayaran</h5>
            </div>
            <div class="ibox-content">
                <span>
                    Total
                </span>
                <input readonly="readonly" id="totalall" name="totalall" type="text" value="" class="form-control">


                <hr />
                <span class="text-muted small">

                    <span>
                        Metode Pembayaran
                    </span>
                    <select name="metode">
                        <option value="Cash">Cash</option>
                        <option value="Debit">Debit</option>
                    </select>


                    <hr />

                    <span>
                        Diskon (Rp)
                    </span>
                    <input id="diskon" name="diskon" type="number" onkeyup="diskonSat()" value="0" class="form-control">


                    <hr />

                    <span>
                        Pajak (%)
                    </span>
                    <input id="pajak" name="pajak" type="number" onkeyup="diskonSat()" value="<?= $this->session->userdata("pajak") != null ? $this->session->userdata("pajak") : "0" ?>" class="form-control">

                    <hr />

                    <span>
                        Grand Total
                    </span>
                    <input readonly="readonly" id="grandtotal" name="grand_total" type="number" onkeyup="pajakSat()" value="" class="form-control">


                    <hr />

                    <span>
                        Jumlah Bayar
                    </span>
                    <input id="jumlah_bayar" name="jumlah_bayar" type="number" onkeyup="kembaliSat()" value="" class="form-control">



                    <hr />

                    <span>
                        Kembali
                    </span>

                    <input readonly="readonly" id="kembali" name="kembali" type="number" value="" class="form-control">

                    <hr />



                    <span>
                        Tanggal
                    </span>
                    
                    <input readonly="readonly" id="tanggal" name="tanggal" type="text" value="<?= date("d/m/Y")." ".date("H:i:s") ?>" class="form-control">


                    <hr />

                    <span>
                        Nama Kasir
                    </span>
                    


                    <input name="nama" value="<?= $this->session->userdata("nama") ?>" type="text" class="form-control">
                    <hr />

                    <span>
                        Shift
                    </span>
                    
                    <select id="shift" name="shift">
                        <option value="1" <?= $this->session->userdata("shift") == 1 ? "selected" : "" ?>>1</option>
                        <option value="2" <?= $this->session->userdata("shift") == 2 ? "selected" : "" ?>>2</option>
                    </select>

                    <hr />

                    <span>
                        Catatan
                    </span>
                    <input name="catatan" type="text" onkeyup="" value="" class="form-control">

                    <hr />
                    <div id="modals">
                    <span>
                        Modal
                    </span>
                    
                    <input name="modal" value="0"  type="number" class="form-control">
                    <hr />
                    <span>
                        Pengeluaran
                    </span>
                    
                    <input name="pengeluaran"  value="0" type="number" class="form-control">
                
                    </div>

                    <hr />

                </span>
                <div class="m-t-sm">
                    <div class="btn-group">
                        <button type="submit" name="submit" class="btn btn-primary btn-sm"><i class="fa fa-shopping-cart"></i> Bayar</button>
                        <a href="<?= base_url('pos/pos') ?>" class="btn btn-white btn-sm"> Batal</a>
                    </div>
                </div>
            </div>
        </div>

            </form>

    </div>
</div>


<script src="<?= base_url() ?>assets/js/jquery-3.1.1.min.js"></script>
<script>
    var length = "<?= $i ?>";
    var totalall = 0;
    var grandTotal = 0;
    realtimeFct();        


    function realtimeFct() {
        var total = 0;

        for (var i = 0; i < length; i++) {
            var harga = $('#harga' + i).text();
            var a = $('#jumlah' + i).val();
            total = Number(a) * Number(harga);
            $('#total_item' + i).text(total);

            totalall = totalall + total;
        }
        $("#totalall").val(totalall);
        grandTotal = totalall + (totalall*(Number($("#pajak").val()))/100);
        $("#grandtotal").val(grandTotal);
    }

    selectFilter();
    function selectFilter(){
        

        var val = $('#shift option:selected').val();

        if(val=="2"){
            $("#modals").hide();
        }else{
            $("#modals").hide();
        }

        $('#shift').change(function(){
            $(this).find("option:selected").each(function(){
                var optionValue = $(this).attr("value");
                if(optionValue=="2"){
                    $("#modals").hide();
                }else{
                    $("#modals").hide();
                }
            });
        });
    }

    function kembaliSat(){
            var kembali = Number($("#jumlah_bayar").val())-(Number($("#grandtotal").val()))
            $("#kembali").val(kembali)
    }

    function diskonSat(){
            var diskon = (Number($("#diskon").val()))
            var pajak = totalall*(Number($("#pajak").val()))/100
            $("#grandtotal").val(totalall-diskon+pajak);
    }



</script>