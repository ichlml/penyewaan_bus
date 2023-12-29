<div class="main-content">
    <section class="section">
    <div class="section-body">
        <div class="card card-success">
            <div class="card-header"><h3>Informasi Pengguna</h3></div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-4">
                    <img alt="image" src="<?=base_url('assets')?>/assets/img/avatar/avatar-1.png" width="300">
                    </div>
                    <div class="col-md-8">
                        <form action="<?=base_url('pengguna/editUser')?>" method="post">
                            <div class="form-group">
                                <label for="">Nama</label>
                                <input type="hidden" name="id_user" value="<?= $data->id_user?>" class="form-control" reauired autocomplete="off">
                                <input type="text" name="nama_user" value="<?= $data->nama_user?>" class="form-control" reauired autocomplete="off">
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
                                <input type="text" name="tempat_lahir" id="tempat_lahir" class="form-control" value="<?= $data->tempat_lahir?>" reauired autocomplete="off">
                            </div>
                            <div class="form-group">
                                <label for="">Tanggal Lahir</label>
                                <input type="date" name="tgl_lahir" id="tgl_lahir"  class="form-control" reauired autocomplete="off" value="<?= $data->tgl_lahir?>">
                            </div>
                            <div class="form-group">
                                <label for="">Alamat</label>
                                <textarea name="alamat" id="alamat"  cols="10" rows="5" class="form-control" required><?= $data->alamat?></textarea>
                            </div>
                            <div class="form-group">
                                <label for="">Username</label>
                                <input type="text" name="user" id="user" maxlenght="16" class="form-control" reauired autocomplete="off" value="<?= $data->user?>">
                            </div>
                            <div class="form-group">
                                <label for="">Password</label>
                                <input type="password" name="pass" id="pass" maxlenght="16" class="form-control" reauired autocomplete="off" value="<?= $data->pass?>">
                            </div>
                            <button type="submit" class="btn btn-md btn-danger">Ubah Data</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </section>
</div>