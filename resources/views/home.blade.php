@extends('layouts.app', ['has_bg' => true])

@section('content')
  <div class="jumbotron hero-element mb-0">
    <div class="hero-content">
      <h5>DAFTARKAN SEGERA DIRIMU DI</h5>
      <h1 class="font-weight-bold">SMK DARUL MUQOMAH</h1>
      <h5>PROGRAM KEAHLIAN: TEKNIK INFORMATIKA DAN OTOMOTIF</h5>

      <div class="d-flex">
        <button class="btn btn-sm btn-success green-primary mt-4">SELENGKAPNYA</button>
        <a style="text-shadow: none !important;" href="https://ppdb.smkdarulmuqomah.id"
          class="btn btn-sm btn-light mt-4 ml-3">DAFTAR</a>
        <a style="text-shadow: none !important;" href="/page/pilih-kelas" class="btn btn-sm btn-info mt-4 ml-3">IKUTI
          UJIAN</a>
      </div>
    </div>
  </div>

  <div class="container-fluid bg-white">
    <div class="row justify-content-center">
      <div class="col-md-3">
        <div class="fasility green-primary rounded shadow">
          <ul class="list-unstyled">
            <li class="fasility-item">
              <a href="" class="text-white text-center">
                <h2 class="icon"><i class="fas fa-desktop"></i></h2>
                <p class="fasility-text">Lab Computer</p>
              </a>
            </li>
            <li class="fasility-item">
              <a href="" class="text-white text-center">
                <h2 class="icon"><i class="fas fa-music"></i></h2>
                <p class="fasility-text">Studio Music</p>
              </a>
            </li>
            <li class="fasility-item">
              <a href="" class="text-white text-center">
                <h2 class="icon"><i class="fas fa-home"></i></h2>
                <p class="fasility-text">Ruang BKK</p>
              </a>
            </li>
          </ul>
        </div>
      </div>
      <div class="col-md-3">
        <div class="card">
          <div class="card-body descript-item">
            <h4 class="mb-4 font-weight-bold head-with-border">KELAS</h4>
            <img src="assets/img/class.jpg" alt="class" width="100%">
            <p class="mt-2">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Distinctio doloribus
              totam, neque necessitatibus explicabo</p>
            <a href="#" class="btn btn-sm btn-success green-primary">Selengkapnya</a>
          </div>
        </div>
      </div>
      <div class="col-md-3">
        <div class="card">
          <div class="card-body descript-item">
            <h4 class="mb-4 font-weight-bold head-with-border">PERPUS</h4>
            <img src="assets/img/class.jpg" alt="library" width="100%">
            <p class="mt-2">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Distinctio doloribus
              totam, neque necessitatibus explicabo</p>
            <a href="#" class="btn btn-sm btn-success green-primary">Selengkapnya</a>
          </div>
        </div>
      </div>
      <div class="col-md-3">
        <div class="card">
          <div class="card-body descript-item">
            <h4 class="mb-4 font-weight-bold head-with-border">KANTIN</h4>
            <img src="assets/img/class.jpg" alt="canteen" width="100%">
            <p class="mt-2">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Distinctio doloribus
              totam, neque necessitatibus explicabo</p>
            <a href="#" class="btn btn-sm btn-success green-primary">Selengkapnya</a>
          </div>
        </div>
      </div>
    </div>
    <hr class="ml-4 mr-4 mt-85">
  </div>

  <div class="container p-4">
    <div class="row justify-content-center border border-white border-lg p-2">
      <div class="col-md-10">
        <h4 class="text-white reg-with-us">Raih Impianmu Bersama Kami</h4>
      </div>
      <div class="col-md-2 text-center">
        <a class="btn btn-sm btn-light font-weight-bold">DAFTAR SEKARANG</a>
      </div>
    </div>
  </div>

  <div class="container-fluid bg-light">
    <div class="row justify-content-center">
      <div class="col-md-12">
        <h6>Mari Bergabung Bersama Kami!!</h6>
        <h4 class="mt-3 head-with-border font-weight-bold">EKSTRAKULIKULER</h4>
      </div>
    </div>

    <div class="container carousel">
      <div class="owl-carousel owl-theme">
        <div class="row">
          <div class="col-12">
            <div class="card m-2">
              <div class="card-body descript-item">
                <img src="assets/img/class.jpg" alt="class" width="100%">
                <h6 class="font-weight-bold mt-2 text-center">Paduan Suara</h6>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-12">
            <div class="card m-2">
              <div class="card-body descript-item">
                <img src="assets/img/class.jpg" alt="class" width="100%">
                <h6 class="font-weight-bold mt-2 text-center">Paduan Suara</h6>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-12">
            <div class="card m-2">
              <div class="card-body descript-item">
                <img src="assets/img/class.jpg" alt="class" width="100%">
                <h6 class="font-weight-bold mt-2 text-center">Paduan Suara</h6>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-12">
            <div class="card m-2">
              <div class="card-body descript-item">
                <img src="assets/img/class.jpg" alt="class" width="100%">
                <h6 class="font-weight-bold mt-2 text-center">Paduan Suara</h6>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-12">
            <div class="card m-2">
              <div class="card-body descript-item">
                <img src="assets/img/class.jpg" alt="class" width="100%">
                <h6 class="font-weight-bold mt-2 text-center">Paduan Suara</h6>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <hr class="mt-70">
  </div>

  <div class="container-fluid bg-white">
    <div class="row justify-content-center pb-4">
      <div class="col-md-6">
        <iframe src="https://www.youtube.com/embed/mGRqz2hO2NI" width="100%" frameborder="0" allowfullscreen></iframe>
      </div>
      <div class="col-md-6 description">
        <h4 class="head-with-border font-weight-bold">Tentang SMK Darul Muqomah</h4>
        <p align="justify">Pengelolaan Yayasan Pendidikan Islam pesantren Darul Muqomah Jember. SMK Darul Muqomah
          berlokasi di jalan Sultan Agung No. 2-4 Purwoasri Gumukmas Jember. SMK Darul Muqomah menggunakan kurikulum
          Pendidikan nasional dan kurikulum pesantren.</p>
      </div>
    </div>
  </div>

  <div class="container-fluid bg-white">
    <div class="row justify-content-center">
      <div class="col-md-4">
        <div class="card shadow">
          <div class="card-body">
            <h6 class="head-with-border font-weight-bold">Kegiatan</h6>
            <div class="row no-gutters mt-4	border-bottom	pb-3">
              <div class="col-md-4">
                <button class="btn outline-green-primary event-calendar pb-0">
                  <h5>17</h5>
                  <p>Aug, 2020</p>
                </button>
              </div>
              <div class="col-md-8 pt-2">
                <h6 class="event-title">Kemerdekaan Indonesia</h6>
                <p class="event-time"><i class="far fa-clock green-primary-text"></i> 8.00 WIB - 12.00 WIB</p>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="card shadow">
          <div class="card-body">
            <h6 class="head-with-border font-weight-bold">Pengumuman</h6>
            <div class="row no-gutters mt-4 border-bottom pb-4">
              <div class="col-12">
                <p class="event-time announce-date"><i class="far fa-clock green-primary-text"></i> 22 July, 2020</p>
                <h6 class="announce-text">Pengumpulan raport dan pengumuman kelas XI dan XII di SMK Darul Muqomah</h6>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="card shadow">
          <div class="card-body">
            <h6 class="head-with-border font-weight-bold">Berita Terbaru</h6>
            <div class="row no-gutters mt-4	border-bottom	pb-3">
              <div class="col-md-4 pr-1">
                <img src="assets/img/class.jpg" alt="" width="100%" height="100%">
              </div>
              <div class="col-md-8 pt-2 pl-1">
                <h6 class="event-title">Kemerdekaan Indonesia</h6>
                <p class="event-time"><i class="far fa-clock green-primary-text"></i> 20 Apr, 2020</p>
                <a href="" class="btn btn-sm btn-success green-primary float-right">Selengkapnya</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
