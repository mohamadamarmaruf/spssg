@extends('layouts_admin.admin_layout')

@section('content')
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-12">
        <div class="card mb-5">
          <div class="page-header-content header-elements-md-inline" style="background-color:	#354c7c;color:white">
            <div class="page-title d-flex" style="padding-top:1% !important;padding-bottom:1% !important;">
              <h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">Home</span> - Tambah Data
                Pengukuran
              </h4>
              <a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
            </div>

            {{-- <div class="header-elements d-none py-0 mb-3 mb-md-0">
              <div class="breadcrumb">
                <a href="/home" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a>
                <span class="breadcrumb-item active">Data Balita</span>
              </div>
            </div> --}}
          </div>
          <!-- notification -->
          @include('template.notification')

          <div class="col-md-12">
            <div class="text-left ml-3">
              <a href="{{ url('data-pengukuran') }}" class=" mt-3 mb-1 btn-sm btn btn-secondary p-0 pr-2 pl-2"
                style="background-color:#b0b8ce">
                Kembali
              </a>
            </div>

            <div class="card" style="border: none">
              {{-- <h5 class="card-header">Tambah Data Pengguna</h5> --}}

              <form action="{{ url('/data-pengukuran/add-process') }}" method="post" enctype="multipart/form-data"
                autocomplete="off">
                <div class="card-body">
                  {{ csrf_field() }}
                  <div class="row">
                    <div class="col-md-6 mb-3">
                      <label>NIK <span class="text-danger">*</span></label>
                      <select class="form-control select-search" name="nik_balita" required>
                        <option value="" selected disabled>Pilih</option>
                        @foreach ($user as $data)
                          <option value="{{ $data->nik }}">{{ $data->nik }} </option>
                        @endforeach
                      </select>
                    </div>
                    <div class="col-md-6 mb-3">
                      <label>Tanggal Pengukuran <span class="text-danger">*</span></label>
                      <input type="date" class="form-control" name="tgl_ukur" required>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-3 mb-3">
                      <label>Tinggi Badan <span class="text-danger">*</span></label>
                      <input type="number" step="any" class="form-control" name="tinggi_badan" required>
                    </div>
                    <div class="col-md-3 mb-3">
                      <label>Berat Badan <span class="text-danger">*</span></label>
                      <input type="number" step="any" class="form-control" name="berat_badan" required>
                    </div>
                    <div class="col-md-3 mb-3">
                      <label>Lingkar Kepala <span class="text-danger">*</span></label>
                      <input type="number" step="any" class="form-control" name="lingkar_kepala" required>
                    </div>
                    <div class="col-md-3 mb-3">
                      <label>Lingkar Lengan <span class="text-danger">*</span></label>
                      <input type="number" step="any" class="form-control" name="lingkar_lengan" required>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6 mb-3">
                      <label>Foto <span class="text-danger">*</span></label>
                      <input type="file" class="form-control" name="foto_balita" @error('image') is-invalid @enderror
                        id="selectImage">
                      <span class="text-danger"><small>Tipe gambar .jpg/ .png/ .jpeg</small></span>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6">
                      <img id="preview" src="#" alt="your image" class="mt-3"width="40%"
                        style="display:none;" />
                    </div>
                  </div>
                  <div class="text-end mb-3">
                    <button type="submit" class="btn btn-primary btn-sm float-right"> Simpan</button>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  {{-- <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.13.0/js/jquery.dataTables.js"></script> --}}
  <script>
    selectImage.onchange = evt => {
      preview = document.getElementById('preview');
      preview.style.display = 'block';
      const [file] = selectImage.files
      if (file) {
        preview.src = URL.createObjectURL(file)
      }
    }
  </script>
@endsection
