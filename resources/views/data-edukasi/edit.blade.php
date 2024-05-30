@extends('layouts_admin.admin_layout')

@section('content')
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-12">
        <div class="card mb-5">
          <div class="page-header-content header-elements-md-inline" style="background-color:	#354c7c;color:white">
            <div class="page-title d-flex" style="padding-top:1% !important;padding-bottom:1% !important;">
              <h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">Home</span> - Ubah Data
                Edukasi
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
              <a href="{{ url('data-edukasi') }}" class=" mt-3 mb-1 btn-sm btn btn-secondary p-0 pr-2 pl-2"
                style="background-color:#b0b8ce">
                Kembali
              </a>
            </div>

            <div class="card" style="border: none">
              {{-- <h5 class="card-header">Tambah Data Pengguna</h5> --}}

              <form action="{{ url('/data-edukasi/edit-process') }}" method="post" autocomplete="off">
                <div class="card-body">
                  {{ csrf_field() }}
                  <input type="hidden" name="id" value="{{ $edukasi->id }}">
                  <div class="row">
                    <div class="col-md-6 mb-3">
                      <label>Bulan Pengukuran<span class="text-danger">*</span></label>
                      <select class="form-control" name="bulan_ukur" required>
                          <option value="" selected disabled>Pilih</option>
                          <option value="Januari" @if($edukasi->bulan_ukur == "Januari") selected @endif>Januari</option>
                          <option value="Februari" @if($edukasi->bulan_ukur == "Februari") selected @endif>Februari</option>
                          <option value="Maret" @if($edukasi->bulan_ukur == "Maret") selected @endif>Maret</option>
                          <option value="April" @if($edukasi->bulan_ukur == "April") selected @endif>April</option>
                          <option value="Mei" @if($edukasi->bulan_ukur == "Mei") selected @endif>Mei</option>
                          <option value="Juni" @if($edukasi->bulan_ukur == "Juni") selected @endif>Juni</option>
                          <option value="Juli" @if($edukasi->bulan_ukur == "Juli") selected @endif>Juli</option>
                          <option value="Agustus" @if($edukasi->bulan_ukur == "Agustus") selected @endif>Agustus</option>
                          <option value="September" @if($edukasi->bulan_ukur == "September") selected @endif>September</option>
                          <option value="Oktober" @if($edukasi->bulan_ukur == "Oktober") selected @endif>Oktober</option>
                          <option value="November" @if($edukasi->bulan_ukur == "November") selected @endif>November</option>
                          <option value="Desember" @if($edukasi->bulan_ukur == "Desember") selected @endif>Desember</option>
                      </select>
                    </div>
                    <div class="col-md-6 mb-3">
                      <label>Nama Balita <span class="text-danger">*</span></label>
                      <select class="form-control select-search" name="balita_id" required>
                        <option value="" selected disabled>Pilih</option>
                        @foreach ($rs_user as $data)
                          <option value="{{ $data->id }}"@if ($data->id === $edukasi->balita_id) selected @endif>
                            {{ $data->nama_balita }} </option>
                        @endforeach
                      </select>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12 mb-3">
                      <label>Pesan <span class="text-danger">*</span></label>
                      <input type="text" class="form-control" name="pesan" value="{{ $edukasi->pesan }}" required>
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
