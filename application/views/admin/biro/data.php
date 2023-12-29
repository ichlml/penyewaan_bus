<section class="section">
    <div class="section-header">Data Biro</div>
    <div class="section-body">
        <div class="card card-primary">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped" id="tabel1">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nama Biro</th>
                                <th>Telp/HP</th>
                                <th>Alamat</th>
                                <th>Username</th>
                                <th>#</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                            $no = 1;
                            foreach ($data as $key) {
                        ?>
                            <tr>
                                <td><?=$no++?></td>
                                <td><?=$key->nama_user?></td>
                                <td><?=$key->no_hp?></td>
                                <td><?=$key->alamat?></td>
                                <td><?=$key->user?></td>
                                <td>
                                    <button type="button" id="edit" class="btn btn-success btn-sm btn-block" 
                                        data-toggle="modal" 
                                        data-target="#editModal"
                                        data-id="<?=$key->id_user?>"
                                        data-nama="<?=$key->nama_user?>"
                                        data-hp="<?=$key->no_hp?>"
                                        data-user="<?=$key->user?>"
                                        data-pass="<?=$key->pass?>"
                                        data-alamat="<?=$key->alamat?>"><i class="far fa-edit"></i></button>
                                    
                                    <a href="<?= base_url('user/delBiro/'.$key->id_user)?>" title="Hapus" class="btn btn-sm btn-block btn-danger"><i class="far fa-trash-alt"></i></a>
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

<!-- Modal Edit -->
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalScrollableTitle">Data Biro</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="<?= base_url('user/editBiro')?>" method="post">
            <div class="form-group">
                <label for="">Nama Biro Jasa</label>
                <input type="hidden" id="id_user" name="id_user" class="form-control" reauired autocomplete="off">
                <input type="text" id="nama_user" name="nama_user" class="form-control" reauired autocomplete="off">
            </div>
            <div class="form-group">
                <label for="">Telp/HP</label>
                <input type="text" id="no_hp" name="no_hp" class="form-control" reauired autocomplete="off">
            </div>
            <div class="form-group">
                <label for="">Alamat</label>
                <textarea id="alamat" name="alamat" cols="10" rows="5" class="form-control" required></textarea>
            </div>
            <div class="form-group">
                <label for="">Username</label>
                <input type="text" id="user" name="user"  maxlenght="16" class="form-control" reauired autocomplete="off">
            </div>
            <div class="form-group">
                <label for="">Password</label>
                <input type="password" id="pass" name="pass" maxlenght="16" class="form-control" reauired autocomplete="off">
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
        $(document).on('click', '#edit', function() {
            var id = $(this).data('id');
            var nama = $(this).data('nama');
            var hp = $(this).data('hp');
            var alamat = $(this).data('alamat');
            var user = $(this).data('user');
            var pass = $(this).data('pass');

            $('#id_user').val(id);
            $('#nama_user').val(nama);
            $('#no_hp').val(hp);
            $('#alamat').val(alamat);
            $('#user').val(user);
            $('#pass').val(pass);
        });
    })
</script>