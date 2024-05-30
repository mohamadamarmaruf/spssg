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
  <script src="../../../../global_assets/js/plugins/forms/styling/uniform.min.js"></script>
  <!-- Theme JS files -->
  <script src="../../../../global_assets/js/plugins/ui/prism.min.js"></script>
  <script src="https://kit.fontawesome.com/76f2dc9b0b.js" crossorigin="anonymous"></script>
  <script src="<?php echo e(asset('assets/js/app.js')); ?>"></script>
  <!-- /theme JS files -->
  <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script> -->
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap4.min.css">
  
  <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.12.0/js/jquery.dataTables.js"></script>

</head>


<body class="bg-slate-800">

  <!-- Page content -->
  <div class="page-content">

    <!-- Main content -->
    <div class="content-wrapper mt-5">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-md-8">
            <div class="card">
              <div class="col-md-12 mt-3">
                <a href="<?php echo e(url('/')); ?>" class="btn-secondary btn-sm">
                  < Kembali</i>
                </a>
              </div>
              <div class="text-center m-3">
                <img width="20%" src="<?php echo e(asset('/img/image.png')); ?>">
                <h5 class="mb-0">DAFTAR AKUN </h5>
                <span class="d-block text-muted">SPSSG</span>
              </div>

              <!-- notification -->
              <?php echo $__env->make('template.notification', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

              <div class="card-body">
                <form method="POST" action="<?php echo e(route('register')); ?>">
                  <?php echo csrf_field(); ?>

                  <div class="row justify-content-center">
                    <div class="col-md-3 mb-3">
                      <label>Nama</label>
                    </div>
                    <div class="col-md-7">
                      <input type="text" class="form-control" name="name" required value="<?php echo e(old('name')); ?>">
                    </div>
                  </div>
                  <div class="row justify-content-center">
                    <div class="col-md-3 mb-3">
                      <label>No Kartu Keluarga</label>
                    </div>
                    <div class="col-md-7">
                      <input type="number" class="form-control <?php $__errorArgs = ['no_kk'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="no_kk"
                        value="<?php echo e(old('no_kk')); ?>" required>
                      <?php $__errorArgs = ['no_kk'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <span class="invalid-feedback" role="alert">
                          <strong><?php echo e($message); ?></strong>
                        </span>
                      <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>

                  </div>
                  <div class="row justify-content-center">
                    <div class="col-md-3 mb-3">
                      <label>Username</label>
                    </div>
                    <div class="col-md-7">
                      <input type="text" class="form-control" name="username" value="<?php echo e(old('username')); ?>"
                        required>
                    </div>
                  </div>
                  <div class="row justify-content-center">
                    <div class="col-md-3 mb-3">
                      <label>Password</label>
                    </div>
                    <div class="col-md-7">
                      <input type="password"class="form-control <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="password"
                        required>
                      <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <span class="invalid-feedback" role="alert">
                          <strong><?php echo e($message); ?></strong>
                        </span>
                      <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                  </div>

                  <div class="row mb-2 mt-3 justify-content-center">
                    <div class="col-md-10 text-right">
                      <button type="submit" class="btn btn-sm btn-primary">
                        <?php echo e(__('Register')); ?>

                      </button>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>


    </div>
    <!-- /main content -->

  </div>
  <!-- /page content -->

</body>

</html>
<?php /**PATH C:\Users\Mufti Adi\Documents\Project\spssg\resources\views/auth/register.blade.php ENDPATH**/ ?>