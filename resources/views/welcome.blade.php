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
  <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css">
  <link href="{{ asset('assets/css/bootstrap_limitless.min.css') }}" rel="stylesheet" type="text/css">

  <link href="{{ asset('assets/css/layout.min.css') }}" rel="stylesheet" type="text/css">
  <link href="{{ asset('assets/css/components.min.css') }}" rel="stylesheet" type="text/css">
  <link href="{{ asset('assets/css/colors.min.css') }}" rel="stylesheet" type="text/css">
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
  <script src="{{ asset('assets/js/app.js') }}"></script>
  <!-- /theme JS files -->
  <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script> -->
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap4.min.css">
  {{-- <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">  --}}
  <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.12.0/js/jquery.dataTables.js"></script>

</head>


<body class="bg-slate-800">

  <!-- Page content -->
  <div class="page-content">

    <!-- Main content -->
    <div class="content-wrapper">
      <!-- Content area -->
      <div class="content d-flex justify-content-center align-items-center">

        <!-- Login card -->
        <form method="POST" class="login-form" action="{{ route('login') }}">
          @csrf

          <div class="card mb-0">

            <div class="card-body">
              <div class="text-center mb-3">
                <img width="30%" src="{{ asset('/img/image.png') }}">
                <h5 class="mb-0">SPSSG </h5>
                <span class="d-block text-muted">Selamat Datang</span>
              </div>

              <div class="form-group form-group-feedback form-group-feedback-left">
                <input type="text" name="username" value="{{ old('username') }}"
                  class="form-control @error('username') is-invalid @enderror" placeholder="Username">
                <div class="form-control-feedback">
                  <i class="icon-user text-muted"></i>
                </div>
                @error('username')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                @enderror
              </div>

              <div class="form-group form-group-feedback form-group-feedback-left">
                <input type="password" class="form-control @error('password') is-invalid @enderror"
                  placeholder="Password" name="password" required autocomplete="current-password">

                <div class="form-control-feedback">
                  <i class="icon-lock2 text-muted"></i>
                </div>
                @error('password')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                @enderror
              </div>
              <div class="form-group">
                <button type="submit" class="btn btn-primary btn-block">Masuk <i
                    class="icon-circle-right2 ml-2"></i></button>
              </div>
              <div class="text-center">
                <a href="{{ url('register') }}" class=" mt-3 mb-1 p-0 pl-1 pr-1 btn-md">
                  Buat Akun Baru</i>
                </a>
              </div>

            </div>
          </div>
        </form>
        <!-- /login card -->

      </div>
      <!-- /content area -->

    </div>
    <!-- /main content -->

  </div>
  <!-- /page content -->

</body>

</html>
