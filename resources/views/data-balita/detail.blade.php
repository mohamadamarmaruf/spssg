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

  <div class="container-xl">
    <div class="row justify-content-center">
      <div class="col-lg-12">
        <div class="card mb-5">
          <div class="page-header-content header-elements-md-inline" style="background-color:	#354c7c;color:white">
            <div class="page-title d-flex" style="padding-top:1% !important;padding-bottom:1% !important;">
              <h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">Home</span> - Detail Data Balita
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

          <div class="col-md-12">
            <div class="text-left ml-3">
              <a href="{{ url('data-balita') }}" class=" mt-3 mb-1 btn-sm btn btn-secondary p-0 pr-2 pl-2"
                style="background-color:#b0b8ce">
                Kembali
              </a>
            </div>

            <div class="card" style="border: none">
              {{-- <h5 class="card-header">Tambah Data Pengguna</h5> --}}

              <div class="card-body">
                <div class="divider divider-dashed">
                  <div class="divider-text">
                    <strong> Data {{ ucwords($data->nama_balita) }}</strong>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6 mb-3">
                    <label>Nama </label>
                    <input type="text" class="form-control" value="{{ ucwords($data->nama_balita) }}" readonly>
                  </div>
                  <div class="col-md-6 mb-3">
                    <label>Jenis Kelamin </label>
                    @if ($data->jenis_kelamin == 0)
                      <input type="text" class="form-control" value="Perempuan" readonly>
                    @else
                      <input type="text" class="form-control" value="Laki - laki" readonly>
                    @endif
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-3 mb-3">
                    <label>NIK </label>
                    <input type="text" class="form-control" value="{{ $data->nik }}" readonly>
                  </div>
                  <div class="col-md-3 mb-3">
                    <label>No Kartu Keluarga </label>
                    <input type="text" class="form-control" value="{{ $data->no_kk }}" readonly>
                  </div>

                  <div class="col-md-6 mb-3">
                    <label>Tanggal Lahir </label>
                    <input type="text" class="form-control"
                      value="{{ \Carbon\Carbon::parse($data->tgl_lahir)->locale('id_ID')->translatedFormat('d F Y') }} " readonly>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-3 mb-3">
                    <label>Berat Lahir </label>
                    <input type="text" class="form-control" value="{{ $data->birth_weight }}" readonly>
                  </div>
                  <div class="col-md-3 mb-3">
                    <label>Panjang Lahir </label>
                    <input type="text" class="form-control" value="{{ $data->birth_length }}" readonly>
                  </div>

                  <div class="col-md-6 mb-3">
                    <label>Menyusui </label>
                    @if($data->breastfeeding == 1)
                    <input type="text" class="form-control"  value="Ya" readonly>
                      @else
                      <input type="text" class="form-control"   value="Tidak" readonly>
                      @endif
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6 mb-3">
                    <label>Nama Orang Tua </label>
                    <input type="text" class="form-control" value="{{ ucwords($data->nama_ortu) }}" readonly>
                  </div>
                  <div class="col-md-6 mb-3">
                    <label>Kecamatan </label>
                    <input type="text" class="form-control" value="{{ ucwords($data->kecamatan) }}" readonly>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6 mb-3">
                    <label>Desa </label>
                    <input type="text" class="form-control" value="{{ ucwords($data->desa) }}" readonly>
                  </div>
                  <div class="col-md-2 mb-3">
                    <label>Rt </label>
                    <input type="text" class="form-control" value="{{ $data->rt }}" readonly>
                  </div>
                  <div class="col-md-2 mb-3">
                    <label>Rw </label>
                    <input type="text" class="form-control" value="{{ $data->rw }}" readonly>
                  </div>
                  <div class="col-md-2 mb-3">
                    <label>Kode Pos </label>
                    <input type="text" class="form-control" value="{{ $data->kode_pos }}" readonly>
                  </div>
                </div>
                <div class="divider divider-dashed">
                  <div class="divider-text">
                    <strong> Data Pendukung</strong>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-4 mb-3">
                    <label>JKN BPJS</label>
                    <input type="text" class="form-control" value="{{ $data->jkn_bpjs }}" readonly>
                  </div>
                  <div class="col-md-4 mb-3">
                    <label>Air Bersih</label>
                    <input type="text" class="form-control" value="{{ $data->air_bersih }}" readonly>
                  </div>
                  <div class="col-md-4 mb-3">
                    <label>Jamban Sehat</label>
                    <input type="text" class="form-control" value="{{ $data->jamban_sehat }}" readonly>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-4 mb-3">
                    <label>Imunisasi</label>
                    <input type="text" class="form-control" value="{{ $data->imunisasi }}" readonly>
                  </div>
                  <div class="col-md-4 mb-3">
                    <label>Keluarga Merokok</label>
                    <input type="text" class="form-control" value="{{ $data->keluarga_merokok }}" readonly>
                  </div>
                  <div class="col-md-4 mb-3">
                    <label>Kecacingan</label>
                    <input type="text" class="form-control" value="{{ $data->kecacingan }}" readonly>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-4 mb-3">
                    <label>Riwayat Kehamilan </label>
                    <input type="text" class="form-control" value="{{ $data->riwayat_kehamilan_ibu }}" readonly>
                  </div>
                </div>
              </div>
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
