<section class="section">
    <div class="section-header"><h3>Data Pengguna</h3></div>
    <div class="section-body">
        <div class="card card-primary">
            <div class="card-header">
            <button type="button" name="tambah" class="btn btn-primary" data-toggle="modal" data-target="#tambahModal">
                Tambah Data User
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
                                <th>User</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $no=1;
                                foreach ($data as $key) { ?>
                            <tr>
                                <td><?=$no++?></td>
                                <td><?=$key->nama_user?></td>
                                <td><?=$key->jkel?></td>
                                <td><?=$key->tempat_lahir?></td>
                                <td><?=$key->tgl_lahir?></td>
                                <td><?=$key->alamat?></td>
                                <td><?=$key->user?></td>
                                <td>
                                    <button type="button" id="edit" class="btn btn-success btn-sm btn-block" 
                                    data-toggle="modal" 
                                    data-target="#editModal"
                                    data-id="<?=$key->id_user?>"
                                    data-nik="<?=$key->nik?>"
                                    data-nama="<?=$key->nama_user?>"
                                    data-tempat_lahir="<?=$key->tempat_lahir?>"
                                    data-tgl_lahir="<?=$key->tgl_lahir?>"
                                    data-hp="<?=$key->no_hp?>"
                                    data-alamat="<?=$key->alamat?>"
                                    data-user="<?=$key->user?>"
                                    data-pass="<?=$key->pass?>"><i class="far fa-edit"></i></button>

                                    <a href="<?= base_url('user/delUser/'.$key->id_user)?>" title="Hapus" class="btn btn-sm btn-block btn-warning"><i class="far fa-trash-alt"></i></a>
                                    <a href="<?= base_url('user/surat/'.$key->id_user)?>" title="Cetak Surat Pernyataan" class="btn btn-sm btn-block btn-danger"><i class="fas fa-print"></i></a>
                                </td>
                            </tr>
                            <?php
                                }
                            ?>
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
        <h5 class="modal-title" id="exampleModalScrollableTitle">Data User</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="<?= base_url('user/addUser')?>" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="">NIK</label>
                <input type="number" min="0"  maxlength="19" name="nik" id="nik" class="form-control" reauired autocomplete="off">
            </div>
            <div class="form-group">
                <label for="">Nama</label>
                <input type="text" name="nama_user" class="form-control" reauired autocomplete="off">
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
                <label for="">Telp/HP</label>
                <input type="text" name="no_hp" class="form-control" reauired autocomplete="off">
            </div>
            <div class="form-group">
                <label for="">Alamat</label>
                <textarea name="alamat"  cols="10" rows="5" class="form-control" required></textarea>
            </div>
            <div class="form-group">
                <label for="">Foto KTP</label>
                <input type="file" name="ktp"  class="form-control" reauired>
            </div>
            <div class="form-group">
                <label for="">Username</label>
                <input type="text" name="user"  maxlenght="16" class="form-control" reauired autocomplete="off">
            </div>
            <div class="form-group">
                <label for="">Password</label>
                <input type="password" name="pass" maxlenght="16" class="form-control" reauired autocomplete="off">
            </div>
            <div class="list-group" id="list-tab" role="tablist">
                <a class="list-group-item list-group-item-action active" id="list-home-list" data-toggle="list" href="#list-home" role="tab" aria-controls="home">Pernyataan</a>
            </div>
            <div class="tab-content" id="nav-tabContent">
                <div class="tab-pane fade show active" id="list-home" role="tabpanel" aria-labelledby="list-home-list">
                        <input type="checkbox" name="p1" value="1"> Kecelakaan untuk korban meninggal akan mendapatkan santunan 50jt <br>
                        <input type="checkbox" name="p2" value="1"> Kecelakaan untuk korban luka-luka akan mendapatkan rawat inap sebesar 20jt <br>
                        <input type="checkbox" name="p3" value="1"> Kecelakaan untuk korban luka akan mendapatkan 500rb
                </div>
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
        <h5 class="modal-title" id="exampleModalScrollableTitle">Data User</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="<?= base_url('user/editUser')?>" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="">NIK</label>
                <input type="hidden" name="id_user" id="id_user" class="form-control" reauired autocomplete="off">
                <input type="number" min="0"  maxlength="19" name="nik" id="nik_d" class="form-control" reauired autocomplete="off">
            </div>
            <div class="form-group">
                <label for="">Nama</label>
                <input type="text" name="nama_user" id="nama_user" class="form-control" reauired autocomplete="off">
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
                <input type="date" name="tgl_lahir" id="tgl_lahir"  class="form-control" reauired autocomplete="off">
            </div>
            <div class="form-group">
                <label for="">Telp/HP</label>
                <input type="text" id="no_hp" name="no_hp"  class="form-control" reauired autocomplete="off">
            </div>
            <div class="form-group">
                <label for="">Alamat</label>
                <textarea name="alamat" id="alamat"  cols="10" rows="5" class="form-control" required></textarea>
            </div>
            <!-- <div class="form-group">
                <label for="">Foto KTP</label>
                <input type="file" id="foto_ktp" name="ktp"  class="form-control" autocomplete="off">
            </div>  -->
            <div class="form-group">
                <label for="">Username</label>
                <input type="text" name="user" id="user" maxlenght="16" class="form-control" reauired autocomplete="off">
            </div>
            <div class="form-group">
                <label for="">Password</label>
                <input type="password" name="pass" id="pass" maxlenght="16" class="form-control" reauired autocomplete="off">
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
              <button type="submit" name="ubah" id="ubah" class="btn btn-primary">Ubah Data</button>
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
            var nik = $(this).data('nik');
            var nama = $(this).data('nama');
            var tempat = $(this).data('tempat_lahir');
            var tgl = $(this).data('tgl_lahir');
            var hp = $(this).data('hp');
            var almt = $(this).data('alamat');
            var user = $(this).data('user');
            var pass = $(this).data('pass');
            // console.log(nama);
            $('#id_user').val(id);
            $('#nik_d').val(nik);
            $('#nama_user').val(nama);
            $('#tempat_lahir').val(tempat);
            $('#tgl_lahir').val(tgl);
            $('#no_hp').val(hp);
            $('#alamat').val(almt);
            $('#user').val(user);
            $('#pass').val(pass);
        })
    })
</script>