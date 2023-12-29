
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Sistem Penyewaan BUS - Login</title>

  <!-- General CSS Files -->
<link rel="stylesheet" href="<?= base_url('assets/node_modules/bootstrap/dist/css/bootstrap.min.css') ?>">
	<link rel="stylesheet" href="<?= base_url('assets/node_modules/@fortawesome/fontawesome-free/css/all.css') ?>"">
  <link rel="stylesheet" href="<?= base_url('assets/node_modules/jquery-ui-dist/jquery-ui.min.css') ?>"">

  <!-- CSS Libraries -->
  <link rel="stylesheet" href="<?=base_url()?>assets/node_modules/bootstrap-social/bootstrap-social.css">

  <!-- Template CSS -->
  <link rel="stylesheet" href="<?=base_url()?>assets/assets/css/style.css">
  <link rel="stylesheet" href="<?=base_url()?>assets/assets/css/components.css">

  <!-- sweetalert -->
  <script src="<?=base_url()?>assets/assets/jquery/jquery.min.js"></script>
</head>

<body>
  <div id="app">
    <section class="section">
      <div class="container mt-5">
        <div class="row">
          <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
            <div class="login-brand">
              <img src="<?=base_url()?>images/Logo.jpeg" class="rounded-circle" alt="logo" width="100" class="shadow-light">
            </div>

            <div class="card card-primary">
              <div class="card-header"><h4>Login</h4></div>

              <div class="card-body">
                <form method="POST" action="<?= base_url('auth/proses_p')?>" class="needs-validation" novalidate="">
                  <div class="form-group">
                    <label for="email">Username</label>
                    <input id="email" type="text" class="form-control" required name="email" tabindex="1" required autofocus>
                    <div class="invalid-feedback">
                      Masukan Username Anda
                    </div>
                  </div>

                  <div class="form-group">
                    <div class="d-block">
                    	<label for="password" class="control-label">Password</label>
                      <!-- <div class="float-right">
                        <a href="auth-forgot-password.html" class="text-small">
                          Forgot Password?
                        </a>
                      </div> -->
                    </div>
                    <input id="pass" type="password" class="form-control" name="pass" tabindex="2" required>
                    <div class="invalid-feedback">
                      Masukan Password Anda
                    </div>
                  </div>

                  <!-- <div class="form-group">
                    <div class="custom-control custom-checkbox">
                      <input type="checkbox" name="remember" class="custom-control-input" tabindex="3" id="remember-me">
                      <label class="custom-control-label" for="remember-me">Remember Me</label>
                    </div>
                  </div> -->

                  <div class="form-group">
                    <button type="submit" name="login" class="btn btn-primary btn-sm btn-block" tabindex="4">
                      Login
                    </button>
                  </div>
                </form>
                <button type="button" name="tambah" class="btn btn-info btn-sm btn-block" data-toggle="modal" data-target="#tambahModal">
                  Daftar Sekarang
                </button>
                <!-- <div class="text-center mt-4 mb-3">
                  <div class="text-job text-muted">Login With Social</div>
                </div> -->
                <!-- <div class="row sm-gutters">
                  <div class="col-6">
                    <a class="btn btn-block btn-social btn-facebook">
                      <span class="fab fa-facebook"></span> Facebook
                    </a>
                  </div>
                  <div class="col-6">
                    <a class="btn btn-block btn-social btn-twitter">
                      <span class="fab fa-twitter"></span> Twitter
                    </a>
                  </div>
                </div> -->

              </div>
            </div>
            <!-- <div class="mt-5 text-muted text-center">
              Don't have an account? <a href="auth-register.html">Create One</a>
            </div> -->
            <div class="simple-footer">
              Copyright &copy; M. Ilham Khanafi 2020
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
   
  
  <!-- General JS Scripts -->
  
   <script src="<?= base_url('assets/node_modules/popper.js/dist/popper.min.js') ?>"></script>
   <script src="<?= base_url('assets/node_modules/bootstrap/dist/js/bootstrap.min.js') ?>"></script>
  <script src="<?= base_url('assets/node_modules/jquery.nicescroll/dist/jquery.nicescroll.min.js') ?>"></script>
  <script src="<?= base_url('assets/node_modules/moment/min/moment.min.js')?>"></script>
  <!-- JS Libraies -->

  <!-- Template JS File -->
  <script src="<?=base_url()?>assets/assets/js/scripts.js"></script>
  <script src="<?=base_url()?>assets/assets/js/custom.js"></script>
  
  <script src="<?=base_url()?>assets/sweet/dist/sweetalert2.all.min.js"></script>
  <!-- Page Specific JS File -->
</body>
</html>
<?php if ($this->session->flashdata('failed')) {?>  
<script type="text/javascript">
    $(function(){
        swal.fire("Username Dan Password Salah", "Coba Cek kembali username dan password", "error");
    });
  </script>
<?php
}
?>

<!-- sweetalert -->
<?php if ($this->session->has_userdata('success')) {?>   
        <script type="text/javascript">
            $(function(){
                swal.fire("Success", "<?=$_SESSION['success']?>", "success");
            });
      </script>
    <?php }?>

    <?php if ($this->session->has_userdata('failed')) {?>
        <script type="text/javascript">
            $(function(){
                swal.fire("Failed","<?=$_SESSION['failed']?>","error");
            });
        </script>
    <?php }?>

    <?php if ($this->session->has_userdata('avaible')) {?>   
        <script type="text/javascript">
            $(function(){
                swal.fire("Info","<?=$_SESSION['avaible']?>","warning");
            });
        </script>
    <?php }?>

<!-- Modal Tambah -->
<div class="modal fade" id="tambahModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalScrollableTitle">Pendaftaran</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <nav>
        <div class="nav nav-tabs" id="nav-tab" role="tablist">
          <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-pengguna" role="tab" aria-controls="nav-home" aria-selected="true">Pengguna</a>
          <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-biro" role="tab" aria-controls="nav-profile" aria-selected="false">Biro Jasa</a>
        </div>
      </nav>
      <div class="tab-content" id="nav-tabContent">
        <div class="tab-pane fade show active" id="nav-pengguna" role="tabpanel" aria-labelledby="nav-home-tab">

            <form action="<?= base_url('pengguna/addUser')?>" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="">NIK</label>
                    <input type="number" min="0" maxlength="19" name="nik" class="form-control" reauired autocomplete="off">
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
                    <label for="">Username</label>
                    <input type="text" name="user"  maxlenght="16" class="form-control" reauired autocomplete="off">
                </div>
                <div class="form-group">
                    <label for="">Foto KTP</label>
                    <input type="file" name="ktp" class="form-control" reauired autocomplete="off">
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
        <div class="tab-pane fade" id="nav-biro" role="tabpanel" aria-labelledby="nav-profile-tab">

        <form action="<?= base_url('pengguna/addBiro')?>" method="post">
                <div class="form-group">
                    <label for="">Nama Biro Jasa</label>
                    <input type="text" name="nama_user" class="form-control" reauired autocomplete="off">
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
  </div>
</div>
