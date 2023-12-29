<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Administrator - SI|BUS</title>

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
  <link rel="stylesheet" href="<?=base_url()?>assets/assets/css/style.css">
  <link rel="stylesheet" href="<?=base_url()?>assets/assets/css/components.css">

  <link rel="stylesheet" href="<?=base_url()?>assets/node_modules/jquery-ui-dist/jquery-ui.min.css">
  <script src="<?=base_url()?>assets/node_modules/jquery/dist/jquery.min.js"></script>
  
</head>

<body>
  <div id="app">
    <div class="main-wrapper">
      <div class="navbar-bg"></div>
      <nav class="navbar navbar-expand-lg main-navbar">
         <form class="form-inline mr-auto">
         
        </form> 
        <ul class="navbar-nav navbar-right">
          
          <li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
            <img alt="image" src="<?=base_url('assets')?>/assets/img/avatar/avatar-1.png" class="rounded-circle mr-1">
            <div class="d-sm-none d-lg-inline-block"><?=strtoupper($this->session->nama_admin)?></div></a>
            <div class="dropdown-menu dropdown-menu-right">
              <div class="dropdown-title">Logged</div>
              <div class="dropdown-divider"></div>
              <a href="<?=base_url('auth/logout')?>" class="dropdown-item has-icon text-danger">
                <i class="fas fa-sign-out-alt"></i> Logout
              </a>
            </div>
          </li>
        </ul>
      </nav>
      <div class="main-sidebar">
        <aside id="sidebar-wrapper">
          <div class="sidebar-brand">
            <a href="<?=base_url('admin')?>">SI|BUS</a>
          </div>
          <div class="sidebar-brand sidebar-brand-sm">
            <a href="<?=base_url('admin')?>">St</a>
          </div>
          <ul class="sidebar-menu">
              <li>
                <a class="nav-link" href="<?=base_url('admin')?>"><i class="fas fa-home"></i> <span>Home</span></a>
              </li>
              <li class="menu-header">Penyewaan</li>
              <li class="nav-item dropdown active">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-fire"></i><span>Data</span></a>
                <ul class="dropdown-menu">
                  <li class=""><a class="nav-link" href="<?=base_url('admin/data_pemesanan')?>"><i class="fas fa-sign-in-alt"></i> Penyewaan</a></li>
                  <li><a class="nav-link" href="<?=base_url('admin/data_pengembalian')?>"><i class="fas fa-sign-out-alt"></i> Pengembalian</a></li>
                </ul>
              </li>
              <li>
                <a class="nav-link" href="<?=base_url('admin/data_pembayaran')?>"><i class="fas fa-file-invoice-dollar"></i> <span>Pembayaran</span></a>
              </li>
              <li>
                <a class="nav-link" href="<?=base_url('admin/data_kendaraan')?>"><i class="fas fa-bus-alt"></i> <span>Data Kendaraan</span></a>
              </li>
              <li>
                <a class="nav-link" href="<?=base_url('admin/laporan')?>"><i class="far fa-id-card"></i> <span>Laporan</span></a>
              </li>
              <li class="menu-header">Users</li>
              <li class="nav-item dropdown">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-users"></i> <span>Data Users</span></a>
                <ul class="dropdown-menu">
                  <li><a class="nav-link" href="<?=base_url('admin/data_user')?>"><i class="fas fa-user-alt"></i> Data Penyewa</a></li>
                  <li><a class="nav-link" href="<?=base_url('admin/data_admin')?>"><i class="fas fa-user-tie"></i> Data Admin</a></li>
                </ul>
              </li>
              <li>
                <a class="nav-link" href="<?= base_url('admin/data_biro')?>"><i class="far fa-square"></i> <span>Data Biro</span></a>
              </li>
            </ul>

        </aside>
      </div>

      <!-- Main Content -->
      <div class="main-content">
        

          <?= $contents?>
        <!-- </section> -->
      </div>
      <footer class="main-footer">
        <div class="footer-left">
          Copyright &copy; 2020 <div class="bullet"></div> Design By Ilham Khanafi
        </div>
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
  <script src="<?=base_url('assets')?>/node_modules/jquery-ui-dist/jquery-ui.min.js"></script>
  <script src="<?=base_url('assets')?>/node_modules/simpleweather/jquery.simpleWeather.min.js"></script>
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
  <script src="<?=base_url()?>assets/assets/js/page/index-0.js"></script>
</body>
</html>

<script>
  $(document).ready( function () {
    $('#tabel1').DataTable();
  } );
</script>
