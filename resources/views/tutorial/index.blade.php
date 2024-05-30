@extends('layouts_admin.admin_layout')

@section('content')
  <div class="container-xxl">
    <div class="row justify-content-center">
      <div class="col-lg-12">
        <div class="card mb-5">
          <div class="page-header-content header-elements-md-inline" style="background-color:	#354c7c;color:white">
            <div class="page-title d-flex" style="padding-top:1% !important;padding-bottom:1% !important;">
              <h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">Home</span> - Tutorial
              </h4>
              <a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
            </div>

            <div class="header-elements d-none py-0 mb-3 mb-md-0">
              <div class="breadcrumb">
                <a href="/home" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a>
                <span class="breadcrumb-item active">Tutorial</span>
              </div>
            </div>
          </div>
          <!-- notification -->
          @include('template.notification')

          <div class="col-md-12">
            <div class="card" style="border: none">
              <div class="card-header">
                <h4><b>CARA MENGUKUR ANAK USIA BAWAH DUA TAHUN (BADUTA) </b></h4>
              </div>
              <div class="col-md-12 d-flex justify-content-center">
                {{-- <iframe width="560" height="315" src="{{ asset('video/baduta.mp4') }}" allowfullscreen muted
                  frameborder="0"></iframe> --}}
                  <video width="560" height="315" controls>
                    <source src="video/baduta.mp4" type="video/mp4">
                  </video>
              </div>
              <div class="card-body">
                <h6><b>MENGUKUR BERAT BADAN</b></h6>
                <img src="{{ asset('img/baduta1.png') }}" class="rounded mx-auto d-block" alt="...">
                <p> Cara mengukur berat badan bayi 0-12 bulan menggunakan baby scale (dapat digunakan hingga anak di
                  bawah 2
                  tahun bila masih belum bisa berdiri atau rewel)<br>
                <ol>
                  <li>Letakkan timbangan pada posisi yang rata atau datar dan keras</li>
                  <li>Pastikan alat timbang menunjukkan angka “0.00” sebelum melakukan penimbangan dengan menekan tombol
                    on/off</li>
                  <li>Pastikan anak tidak menggunakan pakaian tebal, pampers, popok, selimut dll agar mendapatkan data
                    berat badan yang seakurat mungkin</li>
                  <li>Letakkan bayi ditengah timbangan, maka akan muncul angka berat badan bayi</li>
                  <li>Catat hasil penimbangan</li>
                </ol>
                </p>
                <img src="{{ asset('img/baduta2.png') }}" class="rounded mx-auto d-block" alt="...">
                <p>
                  Cara mengukur berat badan baduta menggunakan timbangan digital atau pegas dengan orang tua (jika baduta
                  rewel)
                <ol>
                  <li>Letakkan timbangan pada posisi yang rata atau datar dan keras</li>
                  <li>Pastikan alat timbang menunjukkan angka “00.00” sebelum melakukan penimbangan dengan menekan tombol
                    on/off untuk timbangan digital dan pastikan jarum timbangan menuju angka 0 untuk timbangan pegas</li>
                  <li>Pastikan anak tidak menggunakan pakaian tebal, pampers, popok, selimut dll agar mendapatkan data
                    berat badan yang seakurat mungkin</li>
                  <li>Ibu atau pengasuh diminta untuk menggendong bayi tanpa menggunakan selendang</li>
                  <li>Jika alat timbang menunjukkan angka “00.00” untuk timbangan digital dan jarum timbangan sudah menuju
                    angka 0 untuk timbangan pegas, mintalah ibu untuk berdiri di tengah tengah alat timbang dengan
                    menggendong sang bayi</li>
                  <li>Pastikan posisi badan ibu tegak, mata lurus ke depan, kaki tidak menekuk dan kepala tidak menunduk
                    ke bawah. Sebisa mungkin bayi dalam keadaan tenang saat ditimbang</li>
                  <li>Setelah ibu berdiri dengan benar, maka jarum angka menuju ke angka hasil penimbangan</li>
                  <li>Catat hasil penimbangan pertama</li>
                  <li>Ibu melakukan proses penimbangan yang sama tanpa menggendong bayi</li>
                  <li>Catat hasil penimbangan kedua</li>
                  <li>Untuk mengetahui hasil penimbangan berat badan bayi maka hasil penimbangan pertama dikurangi hasil
                    penimbangan kedua</li>
                </ol>
                </p>

                <h6><b>MENGUKUR PANJANG BADAN</b></h6>
                <img src="{{ asset('img/baduta-panjang.png') }}" class="rounded mx-auto d-block" alt="...">
                <p>
                  Cara Mengukur Panjang Badan Balita Menggunakan Infantometer
                <ol>
                  <li>Letakkan bayi di atas infantometer. Pastikan kepala bayi ada di headboard</li>
                  <li>Pengukuran panjang badan ini memerlukan 2 orang. Orang pertama memegang kepala bayi, memastikan
                    kepala bayi tegak lurus, dan memastikan bahu dan pantat menempel dengan papan</li>
                  <li>Orang kedua memastikan kaki lurus dengan menekan lutut dan mendorong footboard hingga menekan
                    telapak kaki</li>
                  <li>Catat hasil pengukuran dengan ketelitian 0.1cm</li>
                </ol>
                </p>
                <h6><b>MENGUKUR LINGKAR LENGAN ATAS</b></h6>
                <img src="{{ asset('img/baduta-lengan.png') }}" class="rounded mx-auto d-block" alt="...">
                <p>
                <ol>
                  <li>Pengukuran dilakukan sejajar dengan pandangan mata</li>
                  <li>Anak yang masih terlalu kecil bisa dipegang oleh ibu/pengasuh serta memintanya untuk menyingkap baju
                    yang menutupi lengan kiri anak atau lengan yang tidak aktif</li>
                  <li>Ukurlah titik tengan lengan atas sang anak dengan membagi dua jarak antara processus olecranon
                    (puncak lengan) dengan processus acromion (ujung siku)</li>
                  <li>Lingkarkan pita ukur pada titik tengah lengan anak. Pastikan bahwa pita benar-benar rata melingkari
                    lengan</li>
                  <li>Periksalah tekanan pita pada lengan anak, jangan terlalu kencang atau terlalu longgar</li>
                  <li>Lihat hasil pengukuran dan catat</li>
                </ol>
                </p>
                <h6><b>MENGUKUR LINGKAR KEPALA</b></h6>
                <img src="{{ asset('img/kepala-baduta.png') }}" class="rounded mx-auto d-block" alt="...">
                <p>
                <ol>
                  <li>Pengukur berada di samping anak</li>
                  <li>Semua aksesoris anak yang menempel di kepala harus dilepas dahulu agar tidak mengganggu pengukuran
                  </li>
                  <li>Melingkarkan pita pengukur melalui bagian paling menonjol di bagian kepala belakang (protuberantia
                    occipitalis) dan dahi (glabella) sehingga didapat diameter terbesar</li>
                  <li>Saat pengukuran sisi pita yang menunjukkan sentimeter berada di sisi dalam agar tidak meningkatkan
                    kemungkinan subjektivitas pengukur</li>
                  <li>Kencangkan pita, namun jangan sampai terlalu menekan kepala dan baca hasil pengukuran dengan
                    ketelitian 1 mm</li>
                </ol>
                </p>
              </div>

            </div>

          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
