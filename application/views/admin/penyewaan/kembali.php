<section class="sectoin">
    <div class="section-body">
        <div class="card card-primary">
        <div class="card-header"> Pengembalian</div>
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
                            <?php if ($key->status_sewa == 'pinjam') { ?>
                            
                            <button title="Konfirmasi Sewa" type="button" id="konfrim" class="btn btn-success btn-sm btn-block" 
                                    data-toggle="modal" 
                                    data-target="#Detail"
                                    data-id = "<?=$key->id_penyewaan?>"
                                    data-id_kenda = "<?=$key->id_kendaraan?>"
                                    data-user = "<?=$key->nama_user?>"
                                    data-nama = "<?=$key->nama_kendaraan?>"
                                    data-harga = "<?=$key->harga?>"
                                    data-tgl_pinjam = "<?=$key->tgl_pinjam?>"
                                    data-tgl_selesai = "<?=$key->tgl_selesai?>"
                                    ><i class="fas fa-check"></i></button>
                            <?php }elseif ($key->status_sewa == 'selesai') { ?>
                                <button disabled="disabled" class="btn btn-sm btn-info">selesai</button>
                            <?php } ?>
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
        <h5 class="modal-title" id="exampleModalLongTitle">Data Pengembalian</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="<?= base_url('penyewaan_a/accKembali')?>" method="post">
            <div class="form-group">
                <label for="">Nama User</label>
                <input type="text" name="nama_user" id="nama_user" class="form-control" readonly>
            </div>
            <div class="form-group">
                <label for="">Nama Kendaraan</label>
                <input type="hidden" id="id_penyewaan" name="id_penyewaan" class="form-control" readonly>
                <input type="hidden" id="id_kendaraan" name="id_kendaraan" class="form-control" readonly>
                <input type="text" id="nm_kendaraan" name="nama_kendaraan" class="form-control" readonly>
            </div>
            <div class="form-group">
                <label for="">Harga per Hari</label>
                <input type="text" name="harga" id="harga" class="form-control" readonly>
            </div>
            <div class="form-group">
                <label for="">Tanggal Pinjam</label>
                <input type="text" name="tgl_pinjam" id="tgl_pinjam" readonly class="form-control" >
            </div>
            <div class="form-group">
                <label for="">Tanggal Selesai Pinjam</label>
                <input type="text" name="tgl_selesai" readonly id="tgl_selesai" class="form-control" value="">
            </div>
            <div class="form-group">
                <label for="">Tanggal Kembali</label>
                <input type="text" name="tgl_kembali" id="tgl_kembali" class="form-control" value="<?= date('Y-m-d', time())?>" >
            </div>
            <div class="form-group">
                <label for="">Keterlambatan</label>
                <input type="number" min="0" readonly name="terlambat" id="terlambat" class="form-control" value="" >
            </div>
            <div class="form-group">
                <label for="">Denda</label>
                <input type="number" name="denda" id="denda" class="form-control" value="" readonly >
            </div>
      <div class="modal-footer">
        <button type="button" onclick="reset()" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
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
            var kenda = $(this).data('id_kenda');
            var user = $(this).data('user');
            var nama = $(this).data('nama');
            var harga = $(this).data('harga');
            var tgl_a = $(this).data('tgl_pinjam');
            var tgl_b = $(this).data('tgl_selesai');
            // console.log(id);
            $('#id_penyewaan').val(id);
            $('#id_kendaraan').val(kenda);
            $('#nama_user').val(user);
            $('#nm_kendaraan').val(nama);
            $('#harga').val(harga);
            $('#tgl_pinjam').val(tgl_a);
            $('#tgl_selesai').val(tgl_b);
        });

            $('#tgl_selesai').datepicker({dateFormat:'yy-mm-dd'});
            $('#tgl_kembali').datepicker({dateFormat:'yy-mm-dd'});
    
            // window.onload=function(){
                    $('#tgl_kembali').on('change', function() {

                    $(function() {
                    $( "#tgl_selesai" ).datepicker({ dateFormat: 'dd-mm-yy' });
                    $( "#tgl_kembali" ).datepicker({ dateFormat: 'dd-mm-yy' });
                
                    var start = $('#tgl_selesai').datepicker('getDate');
                    var end   = $('#tgl_kembali').datepicker('getDate');
                    var harga = $('#harga').val();
                    var days   = (end - start)/1000/60/60/24;
                    // console.log(harga);
                    if (days <= 0) {
                        $('#terlambat').val('0');
                        $('#denda').val('0');
                    }else{
                        $('#terlambat').val(days);
                        var persen = harga * 10 /100;
                        var denda = days * persen;
                        $('#denda').val(denda);
                    }
                    // console.log(denda);
                });
                            
                            });

        function reset() {
            $("[name='tgl_kembali']").val('');
            $("[name='denda']").val('');
            $("[name='terlambat']").val('');
        }
    })
</script>