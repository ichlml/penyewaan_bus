<section class="sectoin">
    <div class="section-body">
        <div class="card card-primary">
        <div class="card-header"> Penyewaan</div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped" id="tabel1">
                    <thead>
                        <tr>
                        <th>#</th>
                            <th>Nama Penyewa</th>
                            <th>Nama Kendaraan</th>
                            <th>No Polisi</th>
                            <th>Jenis</th>
                            <th>Merk</th>
                            <th>Keterangan</th>
                            <th>Harga</th>
                            <th>Tanggal Pinjam</th>
                            <th>Tanggal Selesai</th>
                            <th>Total Harga</th>
                            <th>#</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                        $no = 1;
                        foreach($data as $key){
                    ?>
                        <tr>
                            <td><?=$no++?></td>
                            <td><?=$key->nama_user?></td>
                            <td><?=$key->nama_kendaraan?></td>
                            <td><?=$key->nopol?></td>
                            <td><?=$key->jenis?></td>
                            <td><?=$key->merk?></td>
                            <td><?=$key->keterangan?></td>
                            <td>Rp. <?=number_format($key->harga, 2)?></td>
                            <td><?=$key->tgl_pinjam?></td>
                            <td><?=$key->tgl_selesai?></td>
                            <td>Rp. <?= number_format($key->total_harga, 2)?></td>
                            <td>
                            <button title="Konfirmasi Sewa" type="button" id="konfrim" class="btn btn-success btn-sm btn-block" 
                                    data-toggle="modal" 
                                    data-target="#Detail"
                                    data-id = "<?=$key->id_penyewaan?>"
                                    data-user = "<?=$key->nama_user?>"
                                    data-nama = "<?=$key->nama_kendaraan?>"
                                    data-jenis = "<?=$key->jenis?>"
                                    data-merk = "<?=$key->merk?>"
                                    data-harga = "<?=$key->harga?>"
                                    data-tgl_sewa = "<?=$key->tgl_sewa?>"
                                    data-tgl_pinjam = "<?=$key->tgl_pinjam?>"
                                    data-tgl_selesai = "<?=$key->tgl_selesai?>"
                                    data-tujuan = "<?=$key->tujuan?>"
                                    data-jam = "<?=$key->jam?>"
                                    data-lama = "<?=$key->lama_pinjam?>"
                                    data-total = "<?=$key->total_harga?>"
                                    data-total = "<?=$key->foto_bukti?>"
                                    ><i class="fas fa-check"></i></button>
                                <a href="<?=base_url('penyewaan_a/unAcc/'.$key->id_penyewaan)?>" title="Tolak" class="btn btn-block btn-danger btn-sm"><i class="fas fa-times"></i></a>
                            </td>
                        </tr>
                    <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
        </div>
    </div>
</section>

<!-- Modal Pesan-->
<div class="modal fade" id="Detail" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Data Pemesanan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="<?= base_url('penyewaan_a/accSewa')?>" method="post">
            <div class="form-group">
                <label for="">Nama User</label>
                <input type="text" name="nama_user" id="nama_user" class="form-control" readonly>
            </div>
            <div class="form-group">
                <label for="">Nama Kendaraan</label>
                <input type="hidden" id="id_penyewaan" name="id_penyewaan" class="form-control" readonly>
                <input type="text" id="nm_kendaraan" name="nama_kendaraan" class="form-control" readonly>
            </div>
            <div class="form-group">
                <label for="">Jenis</label>
                <input type="text" name="jenis" id="jenis" class="form-control" readonly>
            </div>
            <div class="form-group">
                <label for="">Merk</label>
                <input type="text" name="merk" id="merk" class="form-control" readonly>
            </div>
            <div class="form-group">
                <label for="">Harga per Hari</label>
                <input type="text" name="harga" id="harga" class="form-control" readonly>
            </div>
            <div class="form-group">
                <label for="">Tanggal Sewa</label>
                <input type="text" name="tgl_sewa" id="tgl_sewa" class="form-control">
            </div>
            <div class="form-group">
                <label for="">Tanggal Keberangkatan</label>
                <input type="text" name="tgl_pinjam" id="tgl_pinjam" class="form-control">
            </div>
            <div class="form-group">
                <label for="">Tanggal Selesai</label>
                <input type="text" name="tgl_selesai" readonly id="tgl_selesai" class="form-control" value="" >
            </div>
            <div class="form-group">
                <label for="">Tujuan</label>
                <input type="text" name="tujuan" readonly id="tujuan" class="form-control" value="" >
            </div>
            <div class="form-group">
                <label for="">Jam Keberangkatan</label>
                <input type="time" name="jam" readonly id="jam" class="form-control" value="" >
            </div>
            <div class="form-group">
                <label for="">Lama Hari</label>
                <input type="int" name="lama" id="lama" readonly class="form-control" value="" readonly>
            </div>
            <div class="form-group">
                <label for="">Total</label>
                <input type="int" name="total_harga" id="total_harga" class="form-control" value="" readonly >
            </div>
            <div class="form-group">
                <label for="">Bukti Pembayaran</label><br>
                <?php if ($key->foto_bukti == null) { ?>
                    <p><strong>Menunggu Pembayaran</strong></p>
                <?php }elseif ($key->foto_bukti != null) { ?>
                    <img src="<?=base_url('images/invoice/'.$key->foto_bukti)?>" height="500" width="450" alt="Bukti Pembayaran">
                <?php } ?>
            </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
        <button type="submit" class="btn btn-primary">Konfirmasi</button>
      </div>
        </form>
      </div>
    </div>
  </div>
</div>

<script>
    $(document).ready(function() {
        $(document).on('click','#konfrim', function() {
            var id = $(this).data('id');
            var user = $(this).data('user');
            var nama = $(this).data('nama');
            var jenis = $(this).data('jenis');
            var merk = $(this).data('merk');
            var harga = $(this).data('harga');
            var tgl_sewa = $(this).data('tgl_sewa');
            var tgl_a = $(this).data('tgl_pinjam');
            var tgl_b = $(this).data('tgl_selesai');
            var tujuan = $(this).data('tujuan');
            var jam = $(this).data('jam');
            var lama = $(this).data('lama');
            var total = $(this).data('total');
            // console.log(id);
            $('#id_penyewaan').val(id);
            $('#nama_user').val(user);
            $('#nm_kendaraan').val(nama);
            $('#jenis').val(jenis);
            $('#merk').val(merk);
            $('#harga').val(harga);
            $('#tgl_sewa').val(tgl_sewa);
            $('#tgl_pinjam').val(tgl_a);
            $('#tgl_selesai').val(tgl_b);
            $('#tujuan').val(tujuan);
            $('#jam').val(jam);
            $('#lama').val(lama);
            $('#total_harga').val(total);
        });
    })
</script>