<section class="section">
    <div class="section-header"><h3>Data Kendaraan</h3></div>
    <div class="section-body">
        <div class="card card-primary">
            <div class="card-header">
                <button type="button" name="tambah" class="btn btn-primary" data-toggle="modal" data-target="#tambahModal">
                    Tambah Data Kendaraan
                </button>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped" id="tabel1">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nopol</th>
                                <th>Nama</th>
                                <th>Jenis</th>
                                <th>CC</th>
                                <th>Merk</th>
                                <th>Keterangan</th>
                                <th>Harga per Malam</th>
                                <th>Foto</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $no=1;
                                foreach ($data as $key ) {
                                ?>
                            <tr>
                                <td><?=$no++?></td>
                                <td><?=$key->nopol?></td>
                                <td><?=$key->nama_kendaraan?></td>
                                <td><?=$key->jenis?></td>
                                <td><?=$key->cc?></td>
                                <td><?=$key->merk?></td>
                                <td><?=$key->keterangan?></td>
                                <td>Rp.<?=number_format($key->harga, 2)?></td>
                                <td><img src="<?=base_url('images/'.$key->foto)?>" alt="Foto Bus" width="70px"></td>
                                <td>
                                    <button type="button" id="edit" class="btn btn-success btn-sm btn-block" 
                                    data-toggle="modal"
                                    data-id="<?=$key->id_kendaraan?>"
                                    data-nopol="<?=$key->nopol?>"
                                    data-nama="<?=$key->nama_kendaraan?>"
                                    data-jenis="<?=$key->jenis?>"
                                    data-cc="<?=$key->cc?>"
                                    data-merk="<?=$key->merk?>"
                                    data-keterangan="<?=$key->keterangan?>"
                                    data-keterangan="<?=$key->harga?>"
                                    data-foto="<?=$key->foto?>"
                                    data-target="#editModal"><i class="far fa-edit"></i></button>

                                    <a href="<?= base_url('kendaraan/delKendaraan/'.$key->id_kendaraan)?>" title="Hapus" class="btn btn-sm btn-block btn-danger"><i class="far fa-trash-alt"></i></a>
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

<!-- Modal Tambah -->
<div class="modal fade" id="tambahModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalScrollableTitle">Data Kendaraan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="<?=base_url('kendaraan/addKendaraan')?>" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="">No Polisi</label>
                <input type="text" name="nopol" class="form-control" required autocomplete="off">
            </div>
            <div class="form-group">
                <label for="">Nama Kendaraan</label>
                <input type="text" name="nama_kendaraan" class="form-control" required autocomplete="off">
            </div>
            <div class="form-group">
                <label for="">Jenis</label>
                <select name="jenis"class="form-control">
                    <option value=""> ... </option>
                    <option value="Micro bus">Micro Bus</option>
                    <option value="Medium bus">Medium Bus</option>
                    <option value="Big bus">Big Bus</option>
                </select>
            </div>
            <div class="form-group">
                <label for="">CC</label>
                <input type="text" name="cc" class="form-control" required autocomplete="off">
            </div>
            <div class="form-group">
                <label for="">Merk</label>
                <input type="text" name="merk" class="form-control" required autocomplete="off">
            </div>
            <div class="form-group">
                <label for="">Harga per Malam</label>
                <input type="number" name="harga" class="form-control" required autocomplete="off">
            </div>
            <div class="form-group">
                <label for="">Keterangan</label>
                <textarea name="keterangan" cols="10" rows="5" class="form-control" required></textarea>
            </div>
            <div class="form-group">
                <label for="">Foto</label>
                <input type="file" name="foto" class="form-control" required autocomplete="off">
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
              <button type="submit" class="btn btn-primary">Simpan Data</button>
            </div>
        </form>
      </div>
    </div>
  </div>
</div>

<!-- Modal Edit -->
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalScrollableTitle">Data Kendaraan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="<?=base_url('kendaraan/editKendaraan')?>" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="">No Polisi</label>
                <input type="hidden" name="id_kendaraan" id="id" class="form-control" required autocomplete="off">
                <input type="text" name="nopol" id="nopol" class="form-control" required autocomplete="off">
            </div>
            <div class="form-group">
                <label for="">Nama Kendaraan</label>
                <input type="text" name="nama_kendaraan" id="nama_kendaraan" class="form-control" required autocomplete="off">
            </div>
            <div class="form-group">
                <label for="">Jenis</label>
                <select name="jenis"class="form-control">
                    <option value=""> ... </option>
                    <option value="Micro bus">Micro Bus</option>
                    <option value="Medium bus">Medium Bus</option>
                    <option value="Big bus">Big Bus</option>
                </select>
            </div>
            <div class="form-group">
                <label for="">CC</label>
                <input type="text" name="cc" id="cc" class="form-control" required autocomplete="off">
            </div>
            <div class="form-group">
                <label for="">Merk</label>
                <input type="text" name="merk" id="merk" class="form-control" required autocomplete="off">
            </div>
            <div class="form-group">
                <label for="">Harga per Malam</label>
                <input type="number" name="harga" id="harga" class="form-control" required autocomplete="off">
            </div>
            <div class="form-group">
                <label for="">Keterangan</label>
                <textarea name="keterangan" id="keterangan" cols="10" rows="5" class="form-control" required></textarea>
            </div>
            <div class="form-group">
                <label for="">Foto</label>
                <input type="file" name="foto" class="form-control" id="foto" required autocomplete="off">
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
              <button type="submit" class="btn btn-primary">Simpan Data</button>
            </div>
        </form>
      </div>
    </div>
  </div>
</div>

<script>
    $(document).ready(function() {
        $(document).on('click', '#edit', function() {
            var id = $(this).data('id');
            var nopol = $(this).data('nopol');
            var nama = $(this).data('nama');
            var jenis = $(this).data('jenis');
            var cc = $(this).data('cc');
            var merk = $(this).data('merk');
            var harga = $(this).data('harga');
            var keterangan = $(this).data('keterangan');
            var foto = $(this).data('foto');
            $('#id').val(id);
            $('#nopol').val(nopol);
            $('#nama_kendaraan').val(nama);
            $('#jenis').val(jenis);
            $('#cc').val(cc);
            $('#merk').val(merk);
            $('#harga').val(harga);
            $('#keterangan').val(keterangan);
            $('#foto').val(foto);
        })
    })
</script>