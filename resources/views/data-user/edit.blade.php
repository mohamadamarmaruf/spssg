@extends('layouts_admin.admin_layout')

@section('content')
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-12">
        <div class="card mb-5">
          <div class="page-header-content header-elements-md-inline" style="background-color:	#354c7c;color:white">
            <div class="page-title d-flex" style="padding-top:1% !important;padding-bottom:1% !important;">
              <h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">Home</span> - Edit Data User
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
                      <input type="text" class="form-control" name="name" value="{{ $data->name }}" required>
                    </div>
                    <div class="col-md-6">
                      <div class="mb-3">
                        <label>Jenis Akun<span class="text-danger">*</span></label>
                        <select class="form-select select" id="role" name="role" required>
                          <option value="" selected disabled>Pilih</option>
                          <option value="admin" @if ($data->role == 'admin') selected @endif>Admin</option>
                          <option value="user" @if ($data->role == 'user') selected @endif>User</option>
                        </select>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6 mb-3">
                      <label>Username</label>
                      <input type="text" class="form-control" name="username" value="{{ $data->username }}" required>
                    </div>
                    <div class="col-md-6">
                      <div class="mb-3">
                        <label>No Kartu Keluarga</label>
                        <input type="text" class="form-control" name="no_kk" value="{{ $data->no_kk }}">
                      </div>
                    </div>
                  </div>


                  <div class="row">
                    <div class="col-md-6">
                      <div class="mb-3">
                        <label>Nama Posyandu </label>
                        <input type="text" class="form-control" name="nama_posyandu"
                          value="{{ $data->nama_posyandu }}">
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="mb-3">
                        <label>Kode Pos </label>
                        <input type="text" class="form-control" name="kode_pos" value="{{ $data->kode_pos }}">
                      </div>
                    </div>
                  </div>
                  <div class="text-right">
                    <button type="submit" class="ml-auto btn btn-primary float-end btn-sm">Simpan</button>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  @endsection
