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
    <div class="content-wrapper mt-5">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-md-8">
            <div class="card">
              <div class="col-md-12 mt-3">
                <a href="{{ url('/') }}" class="btn-secondary btn-sm">
                  < Kembali</i>
                </a>
              </div>
              <div class="text-center m-3">
                <img width="20%" src="{{ asset('/img/image.png') }}">
                <h5 class="mb-0">DAFTAR AKUN </h5>
                <span class="d-block text-muted">SPSSG</span>
              </div>

              <!-- notification -->
              @include('template.notification')

              <div class="card-body">
                <form method="POST" action="{{ route('register') }}">
                  @csrf

                  <div class="row justify-content-center">
                    <div class="col-md-3 mb-3">
                      <label>Nama</label>
                    </div>
                    <div class="col-md-7">
                      <input type="text" class="form-control" name="name" required value="{{ old('name') }}">
                    </div>
                  </div>
                  <div class="row justify-content-center">
                    <div class="col-md-3 mb-3">
                      <label>No Kartu Keluarga</label>
                    </div>
                    <div class="col-md-7">
                      <input type="number" class="form-control @error('no_kk') is-invalid @enderror" name="no_kk"
                        value="{{ old('no_kk') }}" required>
                      @error('no_kk')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                      @enderror
                    </div>

                  </div>
                  <div class="row justify-content-center">
                    <div class="col-md-3 mb-3">
                      <label>Username</label>
                    </div>
                    <div class="col-md-7">
                      <input type="text" class="form-control" name="username" value="{{ old('username') }}"
                        required>
                    </div>
                  </div>
                  <div class="row justify-content-center">
                    <div class="col-md-3 mb-3">
                      <label>Password</label>
                    </div>
                    <div class="col-md-7">
                      <input type="password"class="form-control @error('password') is-invalid @enderror" name="password"
                        required>
                      @error('password')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                      @enderror
                    </div>
                  </div>

                  <div class="row mb-2 mt-3 justify-content-center">
                    <div class="col-md-10 text-right">
                      <button type="submit" class="btn btn-sm btn-primary">
                        {{ __('Register') }}
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
