@extends('layouts_admin.admin_layout')

@section('content')
  <style>
    .border-teal {
      border-color: #dddddd;
    }
  </style>
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-12">
        <div class="card mb-5">
          <div class="page-header-content header-elements-md-inline" style="background-color:	#354c7c;color:white">
            <div class="page-title d-flex" style="padding-top:1% !important;padding-bottom:1% !important;">
              <h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">Home</span> - Tambah Data Balita
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
              <a href="{{ url('data-balita') }}" class=" mt-3 mb-1 btn-sm btn btn-secondary p-0 pr-2 pl-2"
                style="background-color:#b0b8ce">
                Kembali
              </a>
            </div>

            <div class="card" style="border: none">
              {{-- <h5 class="card-header">Tambah Data Pengguna</h5> --}}

              <form action="{{ url('/data-balita/add-process') }}" method="post" autocomplete="off">
                <div class="card-body">
                  {{ csrf_field() }}
                  <div class="divider divider-dashed">
                    <div class="divider-text">
                      <strong> Data Utama (<span class="text-danger">* wajib diisi</span> )</strong>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6 mb-3">
                      <label>Nama <span class="text-danger">*</span></label>
                      <input type="text" class="form-control" name="nama_balita" required>
                    </div>
                    <div class="col-md-6 mb-3">
                      <label>Jenis Kelamin <span class="text-danger">*</span></label>
                      <select class="form-control select" name="jenis_kelamin" required>
                        <option value="" selected disabled>Pilih</option>
                        <option value="Perempuan">Perempuan</option>
                        <option value="Laki-laki">Laki-laki</option>
                      </select>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-3 mb-3">
                      <label>NIK <span class="text-danger">*</span></label>
                      <input type="text" class="form-control" name="nik" required>
                    </div>
                    <div class="col-md-3 mb-3">
                      <label>No Kartu Keluarga <span class="text-danger">*</span></label>
                      
                        <input type="text" class="form-control" name="no_kk_user" value="{{ $user->no_kk }}" readonly
                          required>
                     
                    </div>
                    <div class="col-md-6 mb-3">
                      <label>Tanggal Lahir <span class="text-danger">*</span></label>
                      <input type="date" class="form-control" name="tanggal_lahir" required>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6 mb-3">
                      <label>Nama Orang Tua <span class="text-danger">*</span></label>
                      <input type="text" class="form-control" name="nama_ortu" required>
                    </div>
                    <div class="col-md-6 mb-3">
                      <label>Kecamatan <span class="text-danger">*</span></label>
                      <input type="text" class="form-control" name="kecamatan" required>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6 mb-3">
                      <label>Desa <span class="text-danger">*</span></label>
                      <input type="text" class="form-control" name="desa" required>
                    </div>
                    <div class="col-md-2 mb-3">
                      <label>Rt <span class="text-danger">*</span></label>
                      <input type="text" class="form-control" name="rt" required>
                    </div>
                    <div class="col-md-2 mb-3">
                      <label>Rw <span class="text-danger">*</span></label>
                      <input type="text" class="form-control" name="rw" required>
                    </div>
                    <div class="col-md-2 mb-3">
                      <label>Kode Pos <span class="text-danger">*</span></label>
                      @if ($user->role == 'admin')
                        <input type="text" class="form-control" name="kode_pos" value="{{ $user->kode_pos }}" disabled
                          required>
                      @else
                        <select class="form-control select-search" name="kode_pos" required>
                          <option value="" selected disabled>Pilih</option>
                          @foreach ($rs_kode_pos as $data)
                            <option value="{{ $data->kode_pos }}">{{ $data->kode_pos }} </option>
                          @endforeach
                        </select>
                      @endif
                    </div>
                  </div>
                  {{-- <div class="divider mb-3">
                    <hr>
                    Data pendukung
                  </div> --}}
                  <div class="divider divider-dashed">
                    <div class="divider-text">
                      <strong>Data Pendukung</strong>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-4 mb-3">
                      <label>JKN BPJS</label>
                      <select class="form-control select" name="jkn_bpjs">
                        <option value="">Pilih</option>
                        <option value="Ya">Ya</option>
                        <option value="Tidak">Tidak</option>
                      </select>
                    </div>
                    <div class="col-md-4 mb-3">
                      <label>Air Bersih</label>
                      <select class="form-control select" name="air_bersih">
                        <option value="">Pilih</option>
                        <option value="Ya">Ya</option>
                        <option value="Tidak">Tidak</option>
                      </select>
                    </div>
                    <div class="col-md-4 mb-3">
                      <label>Jamban Sehat</label>
                      <select class="form-control select" name="jamban_sehat">
                        <option value="">Pilih</option>
                        <option value="Ya">Ya</option>
                        <option value="Tidak">Tidak</option>
                      </select>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-4 mb-3">
                      <label>Imunisasi</label>
                      <select class="form-control select" name="imunisasi">
                        <option value="">Pilih</option>
                        <option value="Ya">Ya</option>
                        <option value="Tidak">Tidak</option>
                      </select>
                    </div>
                    <div class="col-md-4 mb-3">
                      <label>Keluarga Merokok</label>
                      <select class="form-control select" name="keluarga_merokok">
                        <option value="">Pilih</option>
                        <option value="Ya">Ya</option>
                        <option value="Tidak">Tidak</option>
                      </select>
                    </div>
                    <div class="col-md-4 mb-3">
                      <label>Kecacingan</label>
                      <select class="form-control select" name="kecacingan">
                        <option value="">Pilih</option>
                        <option value="Ya">Ya</option>
                        <option value="Tidak">Tidak</option>
                      </select>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-4 mb-3">
                      <label>Riwayat Kehamilan </label>
                      <select class="form-control select" name="riwayat_kehamilan_ibu">
                        <option value="">Pilih</option>
                        <option value="Ya">Ya</option>
                        <option value="Tidak">Tidak</option>
                      </select>
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
    $(document).ready(function() {
      $('#table_id').DataTable();
    });
  </script>
@endsection
