@extends('layouts_admin.admin_layout')

@section('content')
  <link rel="stylesheet" href="{{ asset('vendor/libs/apex-charts/apex-charts.css') }}" />
  <script src="{{ asset('vendor/libs/apex-charts/apexcharts.js') }}"></script>

  <div class="container-xxl">
    <div class="row justify-content-center">
      <div class="col-lg-12">
        <div class="card ">
          <div class="page-header-content header-elements-md-inline" style="background-color:	#354c7c;color:white">
            <div class="page-title d-flex" style="padding-top:1% !important;padding-bottom:1% !important;">
              <h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">Home
                  <a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
            </div>

            <div class="header-elements d-none py-0 mb-3 mb-md-0">
              <div class="breadcrumb">
                <a href="/home" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a>
              </div>
            </div>
          </div>
          <div class="col-md-12">
            <div class="card m-3" style="border: none">
              <h6>Selamat Datang {{ $user->name }}</h6>
            </div>
          </div>
        </div>
      </div>
    </div>
    @if ($role == 'admin')
      <div class="row">
        <div class="col-lg-12 order-0">
          <div class="card">
            <h5 class="card-header">
              Total Pengukuran pada Posyandu Tahun {{ date('Y') }}
            </h5>
            <div class="m-3" id="chart-rekapitulasi-nilai-lapangan">

            </div>
          </div>
        </div>
      </div>


      <div class="row">
        <div class="col-lg-12 order-0">
          <div class="card">
            <h5 class="card-header">
              Total Balita Terdaftar pada Posyandu Tahun {{ date('Y') }}
            </h5>

            <div class="m-3" id="chart-capaian-nilai-lapangan">

            </div>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-lg-12 order-0">
          <div class="card">
            <h5 class="card-header">
              Total Balita Stunting Tahun {{ date('Y') }}
            </h5>

            <div class="m-3" id="chart-balita-stunting">

            </div>
          </div>
        </div>
      </div>
    @endif
  </div>
  <script>
    var data = @json($arr_pengukuran_balita);
    // remove spinner
    $("#spinner-chart-rekapitulasi-nilai-lapangan").addClass('d-none');

    var options = {
      series: [{
        name: 'Total pengukuran',
        data: data.jumlah_balita
      }, ],
      chart: {
        type: 'bar',
        animations: {
          enabled: true,
          easing: 'easeinout',
          speed: 800,
          animateGradually: {
            enabled: true,
            delay: 800
          },
          dynamicAnimation: {
            enabled: true,
            speed: 800
          }
        },
        height: 300,
        toolbar: {
          tools: {
            download: false,
          }
        },
      },

      colors: ["#61b5f3"],
      plotOptions: {
        bar: {
          horizontal: false,
          columnWidth: '50%',
          endingShape: 'rounded',
          dataLabels: {
            orientation: 'vertical',
            position: 'center' // bottom/center/top
          }
        },
      },
      dataLabels: {
        enabled: true,
        offsetY: 20,
        formatter: function(val) {
          return val
        },
        style: {
          fontSize: '10px',
        },
      },
      stroke: {
        show: true,
        width: 2,
        colors: ['transparent']
      },
      xaxis: {
        categories: ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Des'],
      },
      yaxis: {
        title: {
          text: 'Jumlah pengukuran'
        },
        min: 0,
        max: 100
      },
      fill: {
        opacity: 1
      },
      tooltip: {
        y: {
          formatter: function(val) {
            return val
          }
        }
      }
    };
    // render
    document.addEventListener('DOMContentLoaded', function() {
      var chartRekapitulasiNilai = new ApexCharts(document.querySelector("#chart-rekapitulasi-nilai-lapangan"),
        options);
      chartRekapitulasiNilai.render();
    });
  </script>

  <!-- CAPAIAN NILAI -->
  <script>
    var capaian_data = @json($arr_jumlah_balita);
    // remove spinner
    $("#spinner-chart-capaian-nilai-lapangan").addClass('d-none');

    var capaian_options = {
      series: [{
        name: 'Jumlah',
        data: capaian_data.jumlah_balita
      }],
      chart: {
        type: 'line',
        animations: {
          enabled: true,
          easing: 'easeinout',
          speed: 800,
          animateGradually: {
            enabled: true,
            delay: 500
          },
          dynamicAnimation: {
            enabled: true,
            speed: 500
          }
        },
        height: 350,
        toolbar: {
          tools: {
            download: false,
            selection: false,
            zoom: false,
            zoomin: false,
            zoomout: false,
            pan: false,
            reset: false
          }
        },
      },

      colors: ["#0f2c64"],
      // plotOptions: {
      //   bar: {
      //     horizontal: false,
      //     columnWidth: '100%',
      //     endingShape: 'rounded',
      //     dataLabels: {
      //       orientation: 'vertical',
      //       position: 'center' // bottom/center/top
      //     }
      //   },
      // },
      dataLabels: {
        enabled: false,
        //   offsetY: 20,
        //   formatter: function(val) {
        //     return val + "%"
        //   },
        //   style: {
        //     fontSize: '10px',
        //   },
      },
      stroke: {
        curve: 'smooth',
        width: 1,
      },
      markers: {
        size: 3,
      },
      xaxis: {
        categories: ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Des'],
      },
      yaxis: {
        title: {
          text: 'Jumlah Anak'
        },
        min: 0,
        max: 100
      },
      fill: {
        opacity: 1
      },
      tooltip: {
        y: {
          formatter: function(val) {
            return val
          }
        }
      }
    };
    // render
    document.addEventListener('DOMContentLoaded', function() {
      var chartRekapitulasiNilai = new ApexCharts(document.querySelector("#chart-capaian-nilai-lapangan"),
        capaian_options);
      chartRekapitulasiNilai.render();
    });
  </script>

  <script>
    var data_stunting = @json($arr_pengukuran_balita_stunting);
    // remove spinner
    $("#spinner-chart-rekapitulasi-nilai-lapangan").addClass('d-none');

    var options_stunting = {
      series: [{
        name: 'Total balita',
        data: data_stunting.jumlah_balita
      }, ],
      chart: {
        type: 'bar',
        animations: {
          enabled: true,
          easing: 'easeinout',
          speed: 800,
          animateGradually: {
            enabled: true,
            delay: 800
          },
          dynamicAnimation: {
            enabled: true,
            speed: 800
          }
        },
        height: 300,
        toolbar: {
          tools: {
            download: false,
          }
        },
      },

      colors: ["#61b5f3"],
      plotOptions: {
        bar: {
          horizontal: false,
          columnWidth: '50%',
          endingShape: 'rounded',
          dataLabels: {
            orientation: 'vertical',
            position: 'center' // bottom/center/top
          }
        },
      },
      dataLabels: {
        enabled: true,
        offsetY: 20,
        formatter: function(val) {
          return val
        },
        style: {
          fontSize: '10px',
        },
      },
      stroke: {
        show: true,
        width: 2,
        colors: ['transparent']
      },
      xaxis: {
        categories: ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Des'],
      },
      yaxis: {
        title: {
          text: 'Jumlah balita'
        },
        min: 0,
        max: 100
      },
      fill: {
        opacity: 1
      },
      tooltip: {
        y: {
          formatter: function(val) {
            return val
          }
        }
      }
    };
    // render
    document.addEventListener('DOMContentLoaded', function() {
      var chartBalitaStunting = new ApexCharts(document.querySelector("#chart-balita-stunting"),
        options_stunting);
      chartBalitaStunting.render();
    });
  </script>
@endsection
