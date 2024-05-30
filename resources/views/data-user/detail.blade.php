@extends('layouts_admin.admin_layout')

@section('content')
  <style>
    .form-control:disabled,
    .form-control[readonly] {
      background-color: transparent;
      opacity: 1;
      border: none;
      padding-left: 0;
    }

    label {
      color: black;
      font-weight: bold;
    }


    .form-control:disabled:focus,
    .form-control[readonly]:focus {
      border: none;
      box-shadow: none;
    }
  </style>



  <div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-12">
        <div class="card mb-5">
          <div class="page-header-content header-elements-md-inline" style="background-color:	#354c7c;color:white">
            <div class="page-title d-flex" style="padding-top:1% !important;padding-bottom:1% !important;">
              <h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">Home</span> - Detail Data User
                {{ $data->name }}
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
            <div class="text-right">
              <a href="{{ url('data-user') }}" class=" mt-3 mb-1 btn-sm btn btn-secondary p-0 pr-2 pl-2"
                style="background-color:#b0b8ce">
                Kembali
              </a>
            </div>

            <div class="card" style="border: none">
              {{-- <h5 class="card-header">Tambah Data Pengguna</h5> --}}

              <form action="{{ url('/data-user/edit-process') }}" method="post" autocomplete="off">
                <div class="card-body">
                  {{ csrf_field() }}
                  <input type="hidden" name="id" value="{{ $data->id }}">
                  <div class="row">
                    <div class="col-md-6 mb-3">
                      <label>Nama</label>
                      <input type="text" class="form-control" name="name" value="{{ $data->name }}" readonly>
                    </div>
                    <div class="col-md-6">
                      <div class="mb-3">
                        <label>Jenis Akun<span class="text-danger">*</span></label>
                        <input class="form-control " id="role" value="{{ $data->role }}" name="role" readonly>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6 mb-3">
                      <label>Username</label>
                      <input type="text" class="form-control" name="username" value="{{ $data->username }}" readonly>
                    </div>
                    <div class="col-md-6">
                      <div class="mb-3">
                        <label>No Kartu Keluarga</label>
                        <input type="text" class="form-control" name="no_kk" value="{{ $data->no_kk }}"readonly>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6">
                      <div class="mb-3">
                        <label>Nama Posyandu </label>
                        <input type="text" class="form-control" name="nama_posyandu" value="{{ $data->nama_posyandu }}"
                          readonly>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="mb-3">
                        <label>Kode Pos </label>
                        <input type="text" class="form-control" name="kode_pos" value="{{ $data->kode_pos }}"
                          readonly>
                      </div>
                    </div>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  @endsection
