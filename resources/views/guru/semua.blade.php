@extends('app.main_guru')

@section('container')
    {{-- <div class="card">
        <div class="d-flex align-items-end row">
            <div class="col-sm-7">
                <div class="card-body">
                    <h5 class="card-title text-primary">Selamat Datang, {{ auth()->user()->name }}</h5>
                    <p class="mb-4">
                        Apa yang akan kamu lakukan hari ini?
                </div>

            </div>
            <div class="col-sm-5 text-center text-sm-left">
                <div class="card-body pb-0 px-0 px-md-4">
                    <img src="../assets/img/illustrations/man-with-laptop-light.png" height="140" alt="View Badge User"
                        data-app-dark-img="illustrations/man-with-laptop-dark.png"
                        data-app-light-img="illustrations/man-with-laptop-light.png" />
                </div>
            </div>
        </div>
    </div>
    <br> --}}
    <div class="col-lg-12 col-md-4 order-1">
        <div class="row">
            <div class="col-lg-6 col-md-12 col-6 mb-4">
                <div class="card">
                    <div class="card-body">
                        <span class="fw-semibold d-block mb-1"></span>
                        
                        <a href="{{ url('/guru/laporan/harian') }}">
                            <h4 class="card-title mb-2">Laporan Harian Absensi</h4>
                            {{-- <small class="text-success fw-semibold"><i class="bx bx-up-arrow-alt"></i></small> --}}
                        </a>
                    </div>
                </div>
            </div>

            <div class="col-lg-6 col-md-12 col-6 mb-4">
                <div class="card">
                    <div class="card-body">
                        <span class="fw-semibold d-block mb-1"></span>
                        
                        <a href="{{ url('/guru/laporan/absensi') }}">
                            <h4 class="card-title mb-2">Laporan Rekap Absensi</h4>
                            {{-- <small class="text-success fw-semibold"><i class="bx bx-up-arrow-alt"></i></small> --}}
                        </a>
                    </div>
                </div>
            </div>

            {{-- <div class="col-lg-6 col-md-12 col-6 mb-4">
                <div class="card">
                    <div class="card-body">
                        <span class="fw-semibold d-block mb-1"></span>
                        
                        <a href="{{ url('/guru/laporan/absensi') }}">
                            <h4 class="card-title mb-2">Laporan Nilai Siswa</h4>
                          
                        </a>
                    </div>
                </div>
            </div> --}}


           


        @endsection
