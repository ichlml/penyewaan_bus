<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>SI|BUS - Penyewaan BUS</title>

   <!-- General CSS Files -->
    <link rel="stylesheet" href="<?=base_url('assets/bs/css/bootstrap.min.css')?>">
    <link rel="stylesheet" href="<?=base_url('assets/node_modules/@fortawesome/fontawesome-free/css/all.min.css')?>">

  <!-- CSS Libraries -->
  <link rel="stylesheet" href="<?=base_url()?>assets/node_modules/jqvmap/dist/jqvmap.min.css">
  <link rel="stylesheet" href="<?=base_url()?>assets/node_modules/weathericons/css/weather-icons.min.css">
  <link rel="stylesheet" href="<?=base_url()?>assets/node_modules/weathericons/css/weather-icons-wind.min.css">
  <link rel="stylesheet" href="<?=base_url()?>assets/node_modules/summernote/dist/summernote-bs4.css">
  <link rel="stylesheet" href="<?=base_url()?>assets/DataTables/datatables.min.css">

  <!-- Template CSS -->
  <link rel="stylesheet" href="<?=base_url()?>assets/assets/css/stylep.css">
  <link rel="stylesheet" href="<?=base_url()?>assets/assets/css/components.css">

  <link rel="stylesheet" href="<?=base_url()?>assets/node_modules/jquery-ui-dist/jquery-ui.min.css">
  <script src="<?=base_url()?>assets/node_modules/jquery/dist/jquery.min.js"></script>
</head>

<body class="layout-3">
  <div id="app">
    <div class="main-wrapper container-fluid">
      <div class="navbar fixed-top"></div>
      <nav class="navbar navbar-expand-lg main-navbar fixed bg-primary">
        <a href="base_url()" class="navbar-brand sidebar-gone-hide">SI|BUS</a>
        <div class="navbar-nav">
          <a href="#" class="nav-link sidebar-gone-show" data-toggle="sidebar"><i class="fas fa-bars"></i></a>
        </div>
        <div class="nav-collapse">
          <a class="sidebar-gone-show nav-collapse-toggle nav-link" href="#">
            <i class="fas fa-ellipsis-v"></i>
          </a>
          <ul class="navbar-nav">
            <li class="nav-item active"><a href="<?=base_url()?>" class="nav-link">Beranda</a></li>
            <!-- <li class="nav-item active"><a href="#" class="nav-link">Micro Bus</a></li>
            <li class="nav-item"><a href="#" class="nav-link">Medium Bus</a></li>
            <li class="nav-item"><a href="#" class="nav-link">Big Bus</a></li> -->
            <li class="nav-item active"><a href="<?=base_url('pengguna/ketentuan')?>" class="nav-link">Ketentuan</a></li>
          </ul>
        </div>
        <form class="form-inline ml-auto">
        </form>
        <ul class="navbar-nav navbar-right">
        <li class="">
        <?php 
          if($this->session->level == null){
        ?>
          <a href="<?=base_url('pengguna/keranjang')?>" class="nav-link nav-link-lg"><i class="fas fa-shopping-cart"></i></a>    
        <?php }else{?>
        </li>
          <a href="<?=base_url('pengguna/keranjang')?>" class="nav-link nav-link-lg"><i class="fas fa-shopping-cart"></i> <?=$countPesan?></a>    
      <?php } ?>
       <?php 
        if($this->session->level == null){
          ?>
      <li class="nav-item"> <a href="<?=site_url('pengguna/login')?>" class="nav-link"><i class="far fa-user"></i> Login</a></li>
        <?php }else{?>
          <li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
            <img alt="image" src="<?=base_url('assets')?>/assets/img/avatar/avatar-1.png" class="rounded-circle mr-1">
            <div class="d-sm-none d-lg-inline-block"><?= $this->session->nama_user?></div></a>
            <div class="dropdown-menu dropdown-menu-right">
              <div class="dropdown-title">Logged</div>
              <a href="<?=base_url('pengguna/settUser')?>" class="dropdown-item has-icon">
                <i class="fas fa-cog"></i> Settings
              </a>
              <a href="<?=base_url('pengguna/surat')?>" class="dropdown-item has-icon">
                <i class="fas fa-print"></i> Pernyataan
              </a>
              <div class="dropdown-divider"></div>
              <a href="<?= base_url('auth/logout_p')?>" class="dropdown-item has-icon text-danger">
                <i class="fas fa-sign-out-alt"></i> Logout
              </a>
            </div>
          </li>

        <?php } ?>
        </ul>
      </nav>

      <!-- Main Content -->
      
        <?= $contents ?>
      
      <footer class="main-footer">
        <div class="footer-left">
          Copyright &copy; 2020 <div class="bullet"></div> Design By M Ilham Khanafi
        <div class="footer-right">
          2.3.0
        </div>
      </footer>
    </div>
  </div>

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

  <!-- General JS Scripts -->
  <script src="<?=base_url('assets/bs/js/bootstrap.min.js')?>"></script>
  <script src="<?=base_url()?>assets/node_modules/popper.js/dist/popper.min.js"></script>
  <script src="<?=base_url('assets/node_modules/nicescroll/dist/jquery.nicescroll.min.js')?>"></script>
  <script src="<?= base_url('assets/node_modules/moment/min/moment.min.js')?>"></script>
  <script src="<?=base_url()?>assets/assets/js/stisla.js"></script>

  <!-- JS Libraies -->
  <script src="<?=base_url('assets')?>/node_modules/simpleweather/jquery.simpleWeather.min.js"></script>
  <script src="<?=base_url('assets')?>/node_modules/jquery-ui-dist/jquery-ui.min.js"></script>
  <script src="<?=base_url('assets')?>/node_modules/chart.js/dist/Chart.min.js"></script>
  <script src="<?=base_url('assets')?>/node_modules/jqvmap/dist/jquery.vmap.min.js"></script>
  <script src="<?=base_url('assets')?>/node_modules/jqvmap/dist/maps/jquery.vmap.world.js"></script>
  <script src="<?=base_url('assets')?>/node_modules/summernote/dist/summernote-bs4.js"></script>
  <script src="<?=base_url('assets')?>/node_modules/chocolat/dist/js/jquery.chocolat.min.js"></script>
  <script src="<?=base_url('assets')?>/DataTables/datatables.min.js"></script>

  <!-- Template JS File -->
  <script src="<?=base_url()?>assets/assets/js/scripts.js"></script>
  <script src="<?=base_url()?>assets/assets/js/custom.js"></script>

  <!-- Page Specific JS File -->
  <script src="<?=base_url()?>assets/sweet/dist/sweetalert2.all.min.js"></script>

  <!-- Template JS File -->
  <!-- <script src="../assets/js/scripts.js"></script>
  <script src="../assets/js/custom.js"></script> -->
</body>
</html>

<script>

</script>
