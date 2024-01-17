<!DOCTYPE html>

<head>
    <meta charset="utf-8" />
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />
    <title>MAN 2 MUARO JAMBI</title>
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
    <link rel="stylesheet" href="{{ asset('assets') }}/vendor/libs/select2/select2.min.css"/>

</head>

<body>
    {{-- navBar --}}
    <div class="layout-wrapper layout-content-navbar">
        <div class="layout-container">
            {{-- aside admin --}}
            <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
                <div class="app-brand demo">
                    {{--  --}}
                </div>
                <div class="menu-inner-shadow"></div>
                <ul class="menu-inner py-1">
                    {{--  --}}
                    <li class="menu-item {{ Request::is('admin/beranda') ? 'active' : '' }}">
                        <a href="{{ route('admin.beranda') }}" class="menu-link">
                            <i class="menu-icon tf-icons bx bx-home-circle"></i>
                            <div data-i18n="Beranda">Beranda</div>
                        </a>
                    </li>

                    <li class="menu-item {{ Request::is('admin/user*') ? 'active' : '' }}">
                        <a href="{{ route('admin.user.index') }}" class="menu-link">
                            <i class="menu-icon tf-icons bx bx-user"></i>
                            <div data-i18n="Pengguna">Pengguna</div>
                        </a>
                    </li>

                    <li class="menu-item {{ Request::is('admin/siswa*') ? 'active' : '' }}">
                        <a href="{{ route('admin.siswa.index') }}" class="menu-link">
                            <i class="menu-icon tf-icons bx bx-user"></i>
                            <div data-i18n="Siswa">Siswa</div>
                        </a>
                    </li>

                    <li class="menu-item {{ Request::is('admin/mapel*') ? 'active' : '' }}">
                        <a href="{{ route('admin.mapel.index') }}" class="menu-link">
                            <i class="menu-icon tf-icons bx bx-book"></i>
                            <div data-i18n="Analytics">Mata Pelajaran</div>
                        </a>
                    </li>

                    <li class="menu-item  {{ Request::is('admin/kelas*') ? 'active' : '' }}">
                        <a href="{{ route('admin.kelas.index') }}" class="menu-link">
                            <i class="menu-icon tf-icons bx bx-detail"></i>
                            <div data-i18n="Analytics">Kelas</div>
                        </a>
                    </li>

                    {{-- <li class="menu-item">
                        <a href="/admin/user" class="menu-link">
                            <i class="menu-icon tf-icons bx bx-pulse"></i>
                            <div data-i18n="Analytics">Semester</div>
                        </a>
                    </li> --}}

                    <li class="menu-item {{ Request::is('admin/tahunajar*') ? 'active' : '' }}">
                        <a href="{{ route('admin.tahunajar.index') }}" class="menu-link">
                            <i class="menu-icon tf-icons bx bx-calendar"></i>
                            <div data-i18n="Analytics">Tahun Ajaran</div>
                        </a>
                    </li>

                    <li class="menu-item {{ Request::is('admin/jadwal*') ? 'active' : '' }}">
                        <a href="{{ route('admin.jadwal.index') }}" class="menu-link">
                            <i class="menu-icon tf-icons bx bx-circle"></i>
                            <div data-i18n="Analytics">Jadwal</div>
                        </a>
                    </li>

                    <li class="menu-item {{ Request::is('admin/laporan*') ? 'active' : '' }}">
                        <a href="/admin/laporan/absensi" class="menu-link">
                            <i class="menu-icon tf-icons bx bx-ghost"></i>
                            <div data-i18n="Analytics">Laporan</div>
                        </a>
                    </li>


                </ul>
            </aside>

            {{-- end aside admin --}}
            <div class="layout-page">
                <nav class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme"
                    id="layout-navbar">
                    <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none">
                        <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
                            <i class="bx bx-menu bx-sm"></i>
                        </a>
                    </div>

                    <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">
                        <ul class="navbar-nav flex-row align-items-center ms-auto">
                            {{-- user --}}
                            <li class="nav-item navbar-dropdown dropdown-user dropdown">
                                <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);"
                                    data-bs-toggle="dropdown">
                                    <div class="avatar avatar-online">
                                        <img src="{{ asset('assets') }}/img/avatars/8.png" alt
                                            class="w-px-40 h-auto rounded-circle" />
                                    </div>
                                </a>

                                <ul class="dropdown-menu dropdown-menu-end">
                                    <li>
                                        <a class="dropdown-item" href="#">
                                            <div class="d-flex">
                                                <div class="flex-shrink-0 me-3">
                                                    <div class="avatar avatar-online">
                                                        <img src="{{ asset('assets') }}/img/avatars/8.png" alt
                                                            class="w-px-40 h-auto rounded-circle" />
                                                    </div>
                                                </div>
                                                <div class="flex-grow-1">
                                                    <span
                                                        class="fw-semibold d-block">{{ auth()->user()->name }}</span>
                                                    <small class="text-muted">{{ auth()->user()->role }}</small>
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <div class="dropdown-divider"></div>
                                    </li>
                                    <li>
                                        <div class="dropdown-item">
                                            <form action="/logout" method="POST">
                                                @csrf
                                                <button type="submit" class="dropdown-item">
                                                    <i class="bx bx-power-off me-2"></i>
                                                    <span class="align-middle">Logout</span></button>
                                            </form>
                                        </div>
                                    </li>
                                </ul>
                            </li>
                            {{-- user --}}

                        </ul>
                    </div>
                </nav>
                {{-- /navBar --}}

                {{-- content --}}
                <div class="content-wrapper">
                    <div class="container-xxl flex-grow-1 container-p-y">
                        <div class="row">
                            <div class="col-lg-12 mb-5 order-0">
                                @yield('container')
                            </div>
                        </div>
                        <div class="content-backdrop fade"></div>
                    </div>
                </div>
            </div>
            <div class="layout-overlay layout-menu-toggle"></div>
        </div>
        {{-- /content --}}

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
        
        {{--  --}}
       

</body>

</html>
