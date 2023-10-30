@extends('layouts_admin.admin_layout')

@section('content')
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-12">
        <div class="card mb-5">
          <div class="page-header-content header-elements-md-inline" style="background-color:	#354c7c;color:white">
            <div class="page-title d-flex" style="padding-top:1% !important;padding-bottom:1% !important;">
              <h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">Home</span> - Data Pengukuran
              </h4>
              <a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
            </div>

            <div class="header-elements d-none py-0 mb-3 mb-md-0">
              <div class="breadcrumb">
                <a href="/home" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a>
                <span class="breadcrumb-item active">Data Pengukuran</span>
              </div>
            </div>
          </div>
          <!-- notification -->
          @include('template.notification')

          <div class="col-md-12">
            <div class="card" style="border: none">
              <div class="text-right">
                <a href="{{ url('data-pengukuran/add') }}" class=" mt-3 mb-1 p-0 pl-1 pr-1 btn-sm btn btn-outline-info">
                  Tambah Data <i class="fa-solid fa-plus"></i>
                </a>
              </div>
              <div class="pt-2 pr-1 pl-1 table-responsive ">
                <table id="table_id" class="table  table-border table-hover datatable-scroll-y">
                  <thead>
                    <tr class="text-center">
                      <th width="5%">No</th>
                      <th>Nama</th>
                      <th>NIK</th>
                      <th>Tanggal Pengukuran</th>
                      <th width="20%">Tindakan</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($rs_ukur as $data)
                      <tr>
                        <td></td>
                        <td>{{ $data->nama_balita }} </td>
                        <td>{{ $data->nik }} </td>
                        <td>{{ $data->tgl_ukur }} </td>
                        <td>
                          <a href="{{ url('data-pengukuran/detail') }}/{{ $data->id }}"
                            class="btn btn-outline-success btn-sm p-0 pl-1 pr-1">Detail</a>
                          <a href="{{ url('data-pengukuran/edit') }}/{{ $data->id }}"
                            class="btn btn-outline-warning btn-sm p-0 pl-1 pr-1">Edit</a>
                          <a href="{{ url('data-pengukuran/delete') }}/{{ $data->id }}"
                            class="btn btn-outline-danger btn-sm p-0 pl-1 pr-1"
                            onclick="return confirm('Apakah anda ingin menghapus data {{ $data->nama_balita }} ?')">
                            Hapus</a>
                        </td>
                      </tr>
                    @endforeach
                  </tbody>
                </table>
                <br />
              </div>
            </div>

          </div>
        </div>
      </div>
    </div>
  </div>

  <script>
    $(document).ready(function() {
      var t = $('#table_id').DataTable({
        columnDefs: [{
          searchable: false,
          orderable: false,
          targets: 0,
        }, ],
        order: [
          [1, 'asc']
        ],
      });

      t.on('order.dt search.dt', function() {
        let i = 1;

        t.cells(null, 0, {
          search: 'applied',
          order: 'applied'
        }).every(function(cell) {
          this.data(i + '.');
          i++;
        });
      }).draw();
    });
  </script>
@endsection
