<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>SPSSG</title>

  <!-- Global stylesheets -->
  <link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">
  <link href="../../../../global_assets/css/icons/icomoon/styles.min.css" rel="stylesheet" type="text/css">
  <link href="<?php echo e(asset('assets/css/bootstrap.min.css')); ?>" rel="stylesheet" type="text/css">
  <link href="<?php echo e(asset('assets/css/bootstrap_limitless.min.css')); ?>" rel="stylesheet" type="text/css">

  <link href="<?php echo e(asset('assets/css/layout.min.css')); ?>" rel="stylesheet" type="text/css">
  <link href="<?php echo e(asset('assets/css/components.min.css')); ?>" rel="stylesheet" type="text/css">
  <link href="<?php echo e(asset('assets/css/colors.min.css')); ?>" rel="stylesheet" type="text/css">
  <!-- /global stylesheets -->

  <!-- Core JS files -->
  <script src="../../../../global_assets/js/main/jquery.min.js"></script>
  <script src="../../../../global_assets/js/main/bootstrap.bundle.min.js"></script>
  <script src="../../../../global_assets/js/plugins/loaders/blockui.min.js"></script>
  <script src="../../../../global_assets/js/plugins/ui/ripple.min.js"></script>
  <!-- /core JS files -->
  <script src="../../../../global_assets/js/plugins/forms/selects/select2.min.js"></script>
  <script src="../../../../global_assets/js/demo_pages/form_select2.js"></script>

  <!-- Theme JS files -->
  <script src="../../../../global_assets/js/plugins/ui/prism.min.js"></script>
  <script src="https://kit.fontawesome.com/76f2dc9b0b.js" crossorigin="anonymous"></script>
  <script src="<?php echo e(asset('assets/js/app.js')); ?>"></script>
  <!-- /theme JS files -->
  <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script> -->
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap4.min.css">
  
  <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.12.0/js/jquery.dataTables.js"></script>

</head>

<body class="navbar-top">

  <!-- Main navbar -->
  <div class=" navbar navbar-expand-md navbar-dark bg-indigo fixed-top" style="background-color:#022954">
    <div class="navbar-brand">
      
      
      <h6 style="margin-bottom: 0px !important">SPSSG</h6>
      
    </div>

    <div class="d-md-none">
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-mobile">
        <i class="icon-tree5"></i>
      </button>
      <button class="navbar-toggler sidebar-mobile-main-toggle" type="button">
        <i class="icon-paragraph-justify3"></i>
      </button>
    </div>

    <div class="collapse navbar-collapse" id="navbar-mobile">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a href="#" class="navbar-nav-link sidebar-control sidebar-main-toggle d-none d-md-block">
            <i class="icon-paragraph-justify3"></i>
          </a>
        </li>
      </ul>

      <span class="navbar-text ml-md-3">
        <span class="badge badge-mark border-orange-300 mr-2"></span>
        <?php
        
        //ubah timezone menjadi jakarta
        date_default_timezone_set('Asia/Jakarta');
        
        //ambil jam dan menit
        $jam = date('H:i');
        //atur salam menggunakan IF
        if ($jam >= '00:00' && $jam < '10:00') {
            $salam = 'Pagi';
        } elseif ($jam >= '10:00' && $jam < '15:00') {
            $salam = 'Siang';
        } elseif ($jam >= '15:00' && $jam <= '18:00') {
            $salam = 'Sore';
        } elseif ($jam > '18:00') {
            $salam = 'Malam';
        }
        
        echo 'Hai! Selamat ' . $salam;
        
        ?>
      </span>

      <ul class="navbar-nav ml-auto">
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle pr-0" href="#" id="navbarDropdownMenuLink" role="button"
            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="icon-user" style="color:white"></i>
            <span style="color: white">
              <?php echo e(Auth::user()->name); ?> <span>
              </span>
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
            <a class="dropdown-item" href="<?php echo e(route('logout')); ?>"
              onclick="event.preventDefault();
                                               document.getElementById('logout-form').submit();">
              <?php echo e(__('Logout')); ?>

            </a>
            <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" style="display: none;">
              <?php echo csrf_field(); ?>
            </form>
          </div>
        </li>
      </ul>
    </div>



  </div>
  <!-- /main navbar -->


  <!-- Page content -->
  <div class="page-content">

    <!-- Main sidebar -->
    <div class="sidebar sidebar-light sidebar-main sidebar-expand-md">

      <!-- Sidebar mobile toggler -->
      <div class="sidebar-mobile-toggler text-center">
        <a href="#" class="sidebar-mobile-main-toggle">
          <i class="icon-arrow-left8"></i>
        </a>
        Navigation
        <a href="#" class="sidebar-mobile-expand">
          <i class="icon-screen-full"></i>
          <i class="icon-screen-normal"></i>
        </a>
      </div>
      <!-- /sidebar mobile toggler -->


      <!-- Sidebar content -->
      <div class="sidebar-content">

        <!-- User menu -->
        <div class="sidebar-user-material">
          <div class="sidebar-user-material-body">

          </div>


        </div>
        <!-- /user menu -->


        <!-- Main navigation -->
        <div class="card card-sidebar-mobile pt-4">
          <ul class="nav nav-sidebar" data-nav-type="accordion">

            <!-- Main -->


            <li class="nav-item">
              <a href="/home" class="nav-link">
                <i class="icon-home4"></i>
                <span>
                  Dashboard
                </span>
              </a>
            </li>
            <li class="nav-item">
              <a href="/tutorial-baduta" class="nav-link">
                <i class="icon-file-empty"></i>
                <span>
                  Tutorial Pengukuran Baduta
                </span>
              </a>
            </li>
            <li class="nav-item">
              <a href="/tutorial-balita" class="nav-link">
                <i class="icon-file-empty"></i>
                <span>
                  Tutorial Pengukuran Balita
                </span>
              </a>
            </li>
            <li class="nav-item">
              <a href="/data-balita" class="nav-link">
                <i class="icon-magazine"></i>
                <span>
                  Data Balita
                </span>
              </a>
            </li>
            <li class="nav-item">
              <a href="/data-edukasi" class="nav-link">
                <i class="icon-megaphone"></i>
                <span>
                  Data Edukasi
                </span>
              </a>
            </li>
            <li class="nav-item">
              <a href="/data-user" class="nav-link">
                <i class="icon-address-book"></i>
                <span>
                  Data Pengguna
                </span>
              </a>
            </li>
            <!-- /main -->


            <!-- /page kits -->

          </ul>
        </div>
        <!-- /main navigation -->

      </div>
      <!-- /sidebar content -->

    </div>
    <!-- /main sidebar -->


    <!-- Main content -->
    <div class="content-wrapper">

      <!-- Page header -->

      <!-- /page header -->


      <!-- Content area -->
      <div class="content" style="background-color: #f5f5f9 !important">


        <!-- Content area -->

        <?php echo $__env->yieldContent('content'); ?>


      </div>
      <!-- /content area -->


      <!-- Footer -->
      <div class="navbar navbar-expand-lg navbar-light">
        <div class="text-center d-lg-none w-100">
          <button type="button" class="navbar-toggler dropdown-toggle" data-toggle="collapse"
            data-target="#navbar-footer">
            <i class="icon-unfold mr-2"></i>
            Footer
          </button>
        </div>

        <div class="navbar-collapse collapse" id="navbar-footer">
          <span class="navbar-text">
            &copy; 2023
          </span>
        </div>
      </div>
      <!-- /footer -->

    </div>
    <!-- /main content -->

  </div>
  <!-- /page content -->

</body>

</html>
<?php /**PATH D:\laravel\spssg\resources\views/layouts_admin/admin_layout.blade.php ENDPATH**/ ?>