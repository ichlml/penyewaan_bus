<div class="main-content">
<section class="section">
    <div class="section-body">
        <div class="card card-warning">
        <div class="card-header">
            <h3>Panel Pembayaran</h3>
        </div>
        <div class="card-body">

        <?php if ($cekBukti == 0) { ?>

        <p style="color:red;"> <strong>
            A.N     : Muhammad ilham khanafi    | 
            No. Rek : 0310356603  |
            Bank    :  BCA |
            </strong></p>
            <form action="<?=base_url('penyewaan/buktiPembayaran')?>" method="post" enctype="multipart/form-data">
                <div class="row">
                    <input type="hidden" name="id_penyewaan" readonly class="form-control" value="<?= $data->id_penyewaan?>">
                    <input type="hidden" name="id_user" readonly class="form-control" value="<?= $data->id_user?>">
                    <div class="form-group col-md-3">
                        <label for="">Total Harga</label>
                        <input type="text" name="total_harga" readonly class="form-control" value="<?= $data->harga?>">
                    </div>            
                    <div class="form-group col-md-3">
                        <label for="">Upload Bukti Pembayaran</label>
                        <input type="file" name="foto" readonly class="form-control" required>
                    </div>            
                </div>
                    <button type="submit" class="btn btn-success btn-md">Kirim Bukti Pembayaran</button>
            </form>
        <?php }else{ ?>
            <strong><center>PEMBAYARAN BERHASIL <br> MENUNGGU KONFIRMASI ADMIN</center></strong>
        <?php } ?>
        </div>
        </div>
    </div>
</section>
</div>