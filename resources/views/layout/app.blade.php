<!DOCTYPE html>
<html lang="en">
    <head>
        <link rel="icon" type="image/x-icon" href="{{ asset('galeri.png') }}">
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Galeri</title>
        <link href="{{ asset('css/styles.css') }}" rel="stylesheet" />
        <script src="{{ asset('js/fa.js') }}" crossorigin="anonymous"></script>
        <style type="text/css">
            .table td {
                font-size: 13px;
            }

            .table th {
                font-size: 14px;
            }
            .btn {
                font-size: 11px;
            }
        </style>
    </head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <!-- Navbar Brand-->
            <a class="navbar-brand ps-3" href="{{ url('home') }}"> <img width="30px" src="{{ asset('galeri.png') }}"> Galeri</a>
            <!-- Sidebar Toggle-->
            <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
            <!-- Navbar Search-->
            {{-- <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
                <div class="input-group">
                    <input class="form-control" type="text" placeholder="Search for..." aria-label="Search for..." aria-describedby="btnNavbarSearch" />
                    <button class="btn btn-primary" id="btnNavbarSearch" type="button"><i class="fas fa-search"></i></button>
                </div>
            </form> --}}
            <!-- Navbar-->
            <ul class="navbar-nav d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i> {{ @user()->nama_lengkap }} </a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        {{-- <li><a class="dropdown-item" href="#!">Settings</a></li>
                        <li><a class="dropdown-item" href="#!">Activity Log</a></li>
                        <li><hr class="dropdown-divider" /></li> --}}
                        <li><a class="dropdown-item" href="{{ url('logout') }}">Logout</a></li>
                    </ul>
                </li>
            </ul>
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            @php
                                @$menu_aktif = Request::segment(1);
                            @endphp
                            <div class="sb-sidenav-menu-heading">Menu</div>
                            <a class="nav-link {{ @$menu_aktif == 'home' ? 'active' : '' }}" href="{{ url('home') }}">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Beranda
                            </a>
                            

                            {{-- <a class="nav-link {{ @$menu_aktif == 'koleksi_pribadi' ? 'active' : '' }}" href="{{ url('koleksi_pribadi') }}">
                                <div class="sb-nav-link-icon"><i class="fas fa-heart"></i></div>
                                Koleksi Pribadi
                            </a> --}}

                            
                            <a class="nav-link {{ @$menu_aktif == 'foto' ? 'active' : '' }}" href="{{ url('foto') }}">
                                <div class="sb-nav-link-icon"><i class="fas fa-file-image"></i></div>
                                Foto Saya
                            </a>

                            <a class="nav-link {{ @$menu_aktif == 'album' ? 'active' : '' }}" href="{{ url('album') }}">
                                <div class="sb-nav-link-icon"><i class="fas fa-bookmark"></i></div>
                                Album Saya
                            </a>

                            {{-- <a class="nav-link {{ @$menu_aktif == 'kategori_buku' ? 'active' : '' }}" href="{{ url('kategori_buku') }}">
                                <div class="sb-nav-link-icon"><i class="fas fa-bookmark"></i></div>
                                Kategori Buku
                            </a>


                            <a class="nav-link {{ @$menu_aktif == 'laporan' ? 'active' : '' }}" href="{{ url('laporan') }}">
                                <div class="sb-nav-link-icon"><i class="fas fa-file"></i></div>
                                Laporan
                            </a>
                            
                            <a class="nav-link {{ @$menu_aktif == 'peminjaman' ? 'active' : '' }}" href="{{ url('peminjaman') }}">
                                <div class="sb-nav-link-icon"><i class="fas fa-check-square"></i></div>
                                Peminjaman
                            </a>
                            
                            <a class="nav-link {{ @$menu_aktif == 'user' ? 'active' : '' }}" href="{{ url('user') }}">
                                <div class="sb-nav-link-icon"><i class="fas fa-user"></i></div>
                                User
                            </a> --}}
                            
                        </div>
                    </div>
{{--                     <div class="sb-sidenav-footer">
                        <div class="small">Logged in as:</div>
                        Start Bootstrap
                    </div> --}}
                </nav>
            </div>
            <div id="layoutSidenav_content" style="background-color: #f1f1f1; font-size:11px;">
                <main>
                    <div class="container-fluid px-4 ">
                        <br>
                        @yield('konten')
                    </div>
                </main>
{{--                 <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; Your Website 2023</div>
                            <div>
                                <a href="#">Privacy Policy</a>
                                &middot;
                                <a href="#">Terms &amp; Conditions</a>
                            </div>
                        </div>
                    </div>
                </footer> --}}
            </div>
        </div>
        <script src="{{ asset('js/jquery.min.js') }}" type="text/javascript"></script>
        <script src="{{ asset('js/bootstrap.bundle.min.js') }}" crossorigin="anonymous"></script>
        <script src="{{ asset('js/scripts.js') }}"></script>

        <link rel="stylesheet" type="text/css" href="{{ asset('css/datatable.css') }}" />
        <script src="{{ asset('js/jquery.dataTables.min.js') }}"></script>
        {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script> --}}
        {{-- <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script> --}}
        

        <script type="text/javascript">
            $("#data-tabel").DataTable();

            $(document).on('click', '.hapus_btn', function(){
                var id = $(this).attr('data-id');
                var result = confirm("Anda yakin Akan Menghapus Data Ini?");
                if (result) {
                    // document.theForm.submit();
                    $("#theForm_"+id).submit();
                }  
            });
        </script>
    </body>
</html>
