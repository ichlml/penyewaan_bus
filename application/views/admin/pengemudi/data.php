<section class="section">
    <div class="section-header"><h3>Data Pengemudi</h3></div>
    <div class="section-body">
        <div class="card card-primary">
            <div class="card-header">
            <button type="button" name="tambah" class="btn btn-primary" data-toggle="modal" data-target="#tambahModal">
                Tambah Data Pengemudi
            </button>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped" id="tabel1">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nama</th>
                                <th>Jenis Kelamin</th>
                                <th>Tempat Lahir</th>
                                <th>Tanggal Lahir</th>
                                <th>Alamat</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                                $no=1;
                                foreach ($data as $key) {
                            ?>
                            <tr>
                                <td><?=$no++?></td>
                                <td><?=$key->nama_pengemudi?></td>
                                <td><?=$key->jkel?></td>
                                <td><?=$key->tempat_lahir?></td>
                                <td><?=$key->tgl_lahir?></td>
                                <td><?=$key->alamat?></td>
                                <td><?=$key->status_kawin?></td>
                                <td>
                                    <button type="button" id="edit" class="btn btn-success btn-sm btn-block" 
                                    data-toggle="modal" 
                                    data-target="#editModal"
                                    data-id="<?=$key->id_pengemudi?>"
                                    data-nama="<?=$key->nama_pengemudi?>"
                                    data-tempat_lahir="<?=$key->tempat_lahir?>"
                                    data-tgl_lahir="<?=$key->tgl_lahir?>"
                                    data-alamat="<?=$key->alamat?>"><i class="far fa-edit"></i></button>

                                    <a href="<?= base_url('user/delPengemudi/'.$key->id_pengemudi)?>" title="Hapus" class="btn btn-sm btn-block btn-danger"><i class="far fa-trash-alt"></i></a>
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
        <h5 class="modal-title" id="exampleModalScrollableTitle">Data Pengemudi</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="<?= base_url('user/addPengemudi')?>" method="post">
            <div class="form-group">
                <label for="">Nama</label>
                <input type="text" name="nama_pengemudi" class="form-control" reauired autocomplete="off">
            </div>
            <div class="form-group">
                <label for="">Jenis Kelamin</label>
                <select name="jkel"  class="form-control" required>
                    <option value=""> ... </option>
                    <option value="Laki-laki">Laki-laki</option>
                    <option value="Perempuan">Perempuan</option>
                </select>
            </div>
            <div class="form-group">
                <label for="">Tempat Lahir</label>
                <input type="text" name="tempat_lahir" class="form-control" reauired autocomplete="off">
            </div>
            <div class="form-group">
                <label for="">Tanggal Lahir</label>
                <input type="date" name="tgl_lahir"  class="form-control" reauired autocomplete="off">
            </div>
            <div class="form-group">
                <label for="">Alamat</label>
                <textarea name="alamat"  cols="10" rows="5" class="form-control" required></textarea>
            </div>
            <div class="form-group">
                <label for="">Status</label>
                <select name="status_kawin" id="status_kawin" class="form-control">
                    <option value=""> ... </option>
                    <option value="Belum Kawin">Belum Kawin</option>
                    <option value="Sudah Kawin">Sudah Kawin</option>
                </select>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
              <button type="submit" name="tambah" id="tambah" class="btn btn-primary">Simpan Data</button>
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
        <h5 class="modal-title" id="exampleModalScrollableTitle">Data Pengemudi</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="<?= base_url('user/editPengemudi')?>" method="post">
            <div class="form-group">
                <label for="">Nama</label>
                <input type="hidden" name="id_pengemudi" id="id_pengemudi" class="form-control" reauired autocomplete="off">
                <input type="text" name="nama_pengemudi" id="nama_pengemudi" class="form-control" reauired autocomplete="off">
            </div>
            <div class="form-group">
                <label for="">Jenis Kelamin</label>
                <select name="jkel"  class="form-control" required>
                    <option value=""> ... </option>
                    <option value="Laki-laki">Laki-laki</option>
                    <option value="Perempuan">Perempuan</option>
                </select>
            </div>
            <div class="form-group">
                <label for="">Tempat Lahir</label>
                <input type="text" name="tempat_lahir" id="tempat_lahir" class="form-control" reauired autocomplete="off">
            </div>
            <div class="form-group">
                <label for="">Tanggal Lahir</label>
                <input type="date" name="tgl_lahir" id="tgl_lahir" class="form-control" reauired autocomplete="off">
            </div>
            <div class="form-group">
                <label for="">Alamat</label>
                <textarea name="alamat" id="alamat" cols="10" rows="5" class="form-control" required></textarea>
            </div>
            <div class="form-group">
                <label for="">Status</label>
                <select name="status_kawin" id="status_kawin" class="form-control" required>
                    <option value=""> ... </option>
                    <option value="Belum Kawin">Belum Kawin</option>
                    <option value="Sudah Kawin">Sudah Kawin</option>
                </select>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
              <button type="submit" name="tambah" id="tambah" class="btn btn-primary">Simpan Data</button>
            </div>
        </form>
      </div>
    </div>
  </div>
</div>

<script>
    $(document).ready(function() {
        $(document).on('click','#edit', function() {
            var id = $(this).data('id');
            var nama = $(this).data('nama');
            var tempat = $(this).data('tempat_lahir');
            var tgl = $(this).data('tgl_lahir');
            var almt = $(this).data('alamat');
            
            // console.log(nama);
            $('#id_pengemudi').val(id);
            $('#nama_pengemudi').val(nama);
            $('#tempat_lahir').val(tempat);
            $('#tgl_lahir').val(tgl);
            $('#alamat').val(almt);
        })
    })
</script>