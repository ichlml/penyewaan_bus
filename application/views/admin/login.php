
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
      <div class="d-flex flex-wrap align-items-stretch">
        <div class="col-lg-4 col-md-6 col-12 order-lg-1 min-vh-100 order-2 bg-white">
          <div class="p-4 m-3">
            <img src="<?=base_url()?>images/Logo.jpeg" alt="logo" width="80" class="shadow-light rounded-circle mb-5 mt-2">
            <h4 class="text-dark font-weight-normal">Selamat Datang <span class="font-weight-bold">Administrator</span></h4>
            <p class="text-muted">Rental BUS PT Langsung Primaraya</p>
            <form method="POST" action="<?= base_url('auth/process')?>" class="needs-validation" novalidate="">
              <div class="form-group">
                <label for="email">Username</label>
                <input id="email" type="text" class="form-control" name="email" tabindex="1" required autofocus>
                <div class="invalid-feedback">
                  Masukan Username Anda
                </div>
              </div>

              <div class="form-group">
                <div class="d-block">
                  <label for="password" class="control-label">Password</label>
                </div>
                <input id="pass" type="password" class="form-control" name="pass" tabindex="2" required>
                <div class="invalid-feedback">
                Masukan password Anda
                </div>
              </div>

              <!-- <div class="form-group">
                <div class="custom-control custom-checkbox">
                  <input type="checkbox" name="remember" class="custom-control-input" tabindex="3" id="remember-me">
                  <label class="custom-control-label" for="remember-me">Remember Me</label>
                </div>
              </div> -->

              <div class="form-group text-right">
                <button type="submit" class="btn btn-primary btn-lg btn-icon icon-right" tabindex="4">
                  Login
                </button>
              </div>

              <!-- <div class="mt-5 text-center">
                Don't have an account? <a href="auth-register.html">Create new one</a>
              </div> -->
            </form>

            <div class="text-center mt-5 text-small">
              Copyright &copy; Ilham Khanafi
              <!-- <div class="mt-2">
                <a href="#">Privacy Policy</a>
                <div class="bullet"></div>
                <a href="#">Terms of Service</a>
              </div> -->
            </div>
          </div>
        </div>
        <div class="col-lg-8 col-12 order-lg-2 order-1 min-vh-100 background-walk-y position-relative overlay-gradient-bottom" data-background="<?= base_url('images/')?>caro_1.jpg">
          <div class="absolute-bottom-left index-2">
            <div class="text-light p-5 pb-2">
              <div class="mb-5 pb-3">
                <h1 class="mb-2 display-4 font-weight-bold">PT. Langsung Primaraya</h1>
                <h5 class="font-weight-normal text-muted-transparent">Getas Pejaten, Kec. Jati, Kab. Kudus  </h5>
              </div>
              <!-- Photo by <a class="text-light bb" target="_blank" href="https://unsplash.com/photos/a8lTjWJJgLA">Justin Kauffman</a> on <a class="text-light bb" target="_blank" href="https://unsplash.com">Unsplash</a> -->
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
