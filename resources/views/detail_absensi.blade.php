<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Rekap Absensi</title>
    {{--  --}}
    <meta name="description" content="" />
    <link rel="icon" type="image/x-icon" href="{{ asset('assets') }}/img/logoicon.ico" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
        rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('assets') }}/vendor/fonts/boxicons.css" />
    <link rel="stylesheet" href="{{ asset('assets') }}/vendor/css/core.css" class="template-customizer-core-css" />
    <link rel="stylesheet" href="{{ asset('assets') }}/vendor/css/theme-default.css"
        class="template-customizer-theme-css" />
    <link rel="stylesheet" href="{{ asset('assets') }}/css/demo.css" />
    <link rel="stylesheet" href="{{ asset('assets') }}/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />
    <link rel="stylesheet" href="{{ asset('assets') }}/vendor/libs/apex-charts/apex-charts.css" />
    <script src="{{ asset('assets') }}/vendor/js/helpers.js"></script>
    <script src="{{ asset('assets') }}/js/config.js"></script>
    <link rel="stylesheet" href="{{ asset('assets') }}/vendor/libs/select2/select2.min.css" />
    {{--  --}}
    <style>
        /* Menyesuaikan posisi untuk footer */
        .footer {
            /* position: fixed;
            bottom: 0; */
            width: 100%;
            text-align: right;
            padding: 10px;
        }
    </style>
</head>

<body style="background: white;">
    <div class="container-fluid">
        <div class="col-md-12">
            <h3 class="text-center">LAPORAN STATUS SISWA</h3>

            <div class="card-body">

           

                <div class="mb-0 mt-0">
                    <span style="display: inline-block; width: 120px;">Siswa :</span>
                    <p class="card-title" style="display: inline;">{{ $siswa->name }}</p>
                </div>

                <div class="mb-0 mt-0">
                    <span style="display: inline-block; width: 120px;">Kelas :</span>
                    <p class="card-title" style="display: inline;">{{ $jadwal->kelas?->name }}</p>
                </div>

                <div class="mb-0 mt-0">
                    <span style="display: inline-block; width: 120px;">Mata Pelajaran :</span>
                    <p class="card-title" style="display: inline;">{{ $jadwal->mapel?->name }}</p>
                </div>
            
           


            </div>
            <div class="table-responsive">
                <table class="table table-sm table-bordered" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Tanggal</th>
                            <th>Status</th>
                       
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($dataAbsensi as $absensi)
                            <tr>
                                <td>{{ $absensi->created_at->toDateString() }}</td>
                                <td>{{ $absensi->status }}</td>
                              
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="footer">
                {{-- <p>Tata Usaha</p> --}}
            </div>
        </div>
    </div>

    <script src="{{ asset('assets') }}/vendor/libs/jquery/jquery.js"></script>
    <script src="{{ asset('assets') }}/vendor/libs/popper/popper.js"></script>
    <script src="{{ asset('assets') }}/vendor/js/bootstrap.js"></script>
    <script src="{{ asset('assets') }}/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="{{ asset('assets') }}/vendor/js/menu.js"></script>
    <script src="{{ asset('assets') }}/vendor/libs/apex-charts/apexcharts.js"></script>
    <script src="{{ asset('assets') }}/js/main.js"></script>
    <script src="{{ asset('assets') }}/js/dashboards-analytics.js"></script>
    <script src="{{ asset('assets') }}/vendor/libs/select2/select2.full.min.js"></script>
    <script src="{{ asset('assets') }}/js/javascript-select2.js"></script>
</body>

</html>
