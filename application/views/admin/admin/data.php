
<section class="section">
    <div class="section-header"><h3>Data Admin</h3></div>
    <div class="section-body">
        <div class="card card-primary">
        <div class="card-header">
        <button type="button" name="tambah" class="btn btn-primary" data-toggle="modal" data-target="#tambahModal">
            Tambah Data Admin
        </button>
        </div>
        <div class="card-body">
            <div class="table-resposive">
                <table class="table table-striped" id="tabel1">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nama</th>
                            <th>Tempat Lahir</th>
                            <th>Tanggal Lahir</th>
                            <th>Alamat</th>
                            <th>Username</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                            $no = 1; 
                         foreach ($data as $key) { ?>
                        
                        <tr>
                            <td><?=$no++?></td>
                            <td><?=$key->nama_admin?></td>
                            <td><?=$key->tempat_lahir?></td>
                            <td><?=$key->tgl_lahir?></td>
                            <td><?=$key->alamat?></td>
                            <td><?=$key->user?></td>
                            <td> <br>
                            <button type="button" id="edit" class="btn btn-success btn-sm btn-block" 
                            data-toggle="modal" 
                            data-target="#editModal"
                            data-id="<?=$key->id_admin?>"
                            data-nama="<?=$key->nama_admin?>"
                            data-tempat_lahir="<?=$key->tempat_lahir?>"
                            data-tgl_lahir="<?=$key->tgl_lahir?>"
                            data-alamat="<?=$key->alamat?>"
                            data-user="<?=$key->user?>"
                            data-pass="<?=$key->pass?>"><i class="far fa-edit"></i></button>

                                <a href="<?= base_url('user/delAdmin/'.$key->id_admin)?>" title="Hapus" class="btn btn-sm btn-block btn-danger"><i class="far fa-trash-alt"></i></a> <br>
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
        <h5 class="modal-title" id="exampleModalScrollableTitle">Data Admin</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="<?= base_url('user/addAdmin')?>" method="post">
            <div class="form-group">
                <label for="">Nama</label>
                <input type="text" name="nama_admin" class="form-control" reauired autocomplete="off">
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
                <label for="">Username</label>
                <input type="text" name="user"  maxlenght="16" class="form-control" reauired autocomplete="off">
            </div>
            <div class="form-group">
                <label for="">Password</label>
                <input type="password" name="pass" maxlenght="16" class="form-control" reauired autocomplete="off">
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
        <h5 class="modal-title" id="exampleModalScrollableTitle">Data Admin</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="<?= base_url('user/editAdmin')?>" method="post">
            <div class="form-group">
                <label for="">Nama</label>
                <input type="hidden" name="id_admin" id="id_admin" class="form-control" reauired autocomplete="off">
                <input type="text" name="nama_admin" id="nama_admin" class="form-control" reauired autocomplete="off">
            </div>
            <div class="form-group">
                <label for="">Jenis Kelamin</label>
                <select name="jkel" id="jkel" class="form-control" required>
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
    function submit(x) {
        // console.log(x);
        if(x == 'tambah'){
            $('#tambah').show();
            $('#edit').hide();
        }else{
            $('#tambah').hide();
            $('#edit').show();
        }
    }

    $(document).ready(function() {
        $(document).on('click','#edit', function() {
            var id = $(this).data('id');
            var nama = $(this).data('nama');
            var tempat = $(this).data('tempat_lahir');
            var tgl = $(this).data('tgl_lahir');
            var almt = $(this).data('alamat');
            var user = $(this).data('user');
            var pass = $(this).data('pass');
            // console.log(nama);
            $('#id_admin').val(id);
            $('#nama_admin').val(nama);
            $('#tempat_lahir').val(tempat);
            $('#tgl_lahir').val(tgl);
            $('#alamat').val(almt);
            $('#user').val(user);
            $('#pass').val(pass);
        })
    })
</script>