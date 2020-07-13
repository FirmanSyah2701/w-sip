<!doctype html>
<html class="no-js" lang="">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>SIPP</title>
        <meta name="description" content="Ela Admin - HTML5 Admin Template">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="apple-touch-icon" href="{{ url('assets/z/img/logopus4.png') }}">
        <link rel="shortcut icon" href="{{ url('assets/z/img/logopus4.png') }}">

        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/normalize.css@8.0.0/normalize.min.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/font-awesome@4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/lykmapipo/themify-icons@0.1.2/css/themify-icons.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/pixeden-stroke-7-icon@1.2.3/pe-icon-7-stroke/dist/pe-icon-7-stroke.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/3.2.0/css/flag-icon.min.css">
        <link rel="stylesheet" href="{{ url('assets/z/admin/css/cs-skin-elastic.css') }}">
        <link rel="stylesheet" href="{{ url('assets/z/admin/css/style.css') }}">
    </head>

    <body>
        <!-- Left Panel -->
        <aside id="left-panel" class="left-panel">
            <nav class="navbar navbar-expand-sm navbar-default">
                <div id="main-menu" class="main-menu collapse navbar-collapse">
                    <ul class="nav navbar-nav">
                        <li class="active">
                            <a href="{{ url('admin/DashboardAdmin') }}">
                                <i class="menu-icon fa fa-laptop"></i>Dashboard 
                            </a>
                        </li>
                        <li class="menu-title">Data-Data</li><!-- /.menu-title -->
                        <li>
                            <a href="{{ url('admin/dataAntrian') }}">
                                <i class="menu-icon fa fa-clipboard"></i>Data Antrian 
                            </a>
                        </li>
                        <li class="menu-item-has-children dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" 
                                aria-haspopup="true" aria-expanded="false"> 
                                <i class="menu-icon fa fa-table"></i>Tabel Data Akun
                            </a>
                            <ul class="sub-menu children dropdown-menu">
                                <li>
                                    <i class="fa fa-user"></i>
                                    <a href="{{ url('admin/dataDokter') }}">Dokter</a>
                                </li>
                                <li>
                                    <i class="fa fa-user"></i>
                                    <a href="{{ url('admin/dataPasien') }}">Pasien</a>
                                </li>
                            </ul>
                        </li>
                        <li class="menu-title">Bagian</li><!-- /.menu-title -->
                        <li>
                            <a href="{{ url('admin/poli') }}"><i class="menu-icon fa fa-list-alt"></i>Poli </a>
                        </li>
                        <li >
                            <a href="{{ url('admin/rekamMedis') }}"><i class="menu-icon fa fa-file-text"></i>Rekam Medis</a>
                        </li>
                        <li>
                            <a href="{{ url('admin/blog_admin') }}"><i class="menu-icon fa fa-laptop"></i>Blog</a>
                        </li>
                    </ul>
                </div><!-- /.navbar-collapse -->
            </nav>
        </aside>
        <!-- /#left-panel -->
        <!-- Right Panel -->
        <div id="right-panel" class="right-panel">
            <!-- Header-->
            <header id="header" class="header">
                <div class="top-left">
                    <div class="navbar-header">
                        <a class="navbar-brand" href="./">
                            <img src="{{ url('assets/z/img/logopus4.png') }}" alt="Logo">
                        </a>
                        <a class="navbar-brand hidden" href="./">
                            <img src="{{ url('assets/z/img/logopus4.png') }}" alt="Logo">
                        </a>
                        <a id="menuToggle" class="menutoggle"><i class="fa fa-bars"></i></a>
                    </div>
                </div>
                <div class="top-right">
                    <div class="header-menu">
                        <div class="header-left">
                            <button class="search-trigger">
                                <i class="fa fa-search"></i>
                            </button>
                            <div class="form-inline">
                                <form class="search-form">
                                    <input class="form-control mr-sm-2" type="text" 
                                        placeholder="Search ..." aria-label="Search">
                                    <button class="search-close" type="submit">
                                        <i class="fa fa-close"></i>
                                    </button>
                                </form>
                            </div>
                            <div class="user-area dropdown float-right">
                                <a href="#" class="dropdown-toggle active" data-toggle="dropdown" 
                                    aria-haspopup="true" aria-expanded="false">
                                    {{ session('nama_admin') }}
                                    <img class="user-avatar rounded-circle" 
                                        src="{{ url('assets/z/img/pp.png') }}" alt="User Avatar">
                                </a>

                                <div class="user-menu dropdown-menu">
                                    <a class="nav-link" href="/logoutAdmin"><i class="fa fa-power-off"></i>Logout</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </header>
            <!-- /#header -->
            <!-- Content -->
            <div class="content">
                <!-- Animated -->
                <div class="animated fadeIn">
                    <!-- Widgets  -->
                    <div class="row">
                        <div class="col-sm-6 col-lg-3">
                        <a href="{{url ('admin/dataPasien')}}">
                            <div class="card text-white bg-flat-color-1">
                                <div class="card-body">
                                    <div class="card-left pt-1 float-left">
                                        <h3 class="mb-0 fw-r">
                                            <span class="currency float-left mr-1"></span>
                                            <span class="count">{{ $pasien }}</span>
                                        </h3>
                                        <p class="text-light mt-1 m-0">Data Pasien</p>
                                    </div><!-- /.card-left -->

                                    <div class="card-right float-right text-right">
                                        <i class="icon fade-5 icon-lg pe-7s-users"></i>
                                    </div><!-- /.card-right -->

                                </div>

                            </div>
                        </div>
                        <!--/.col-->

                        <div class="col-sm-6 col-lg-3">
                        <a href="{{url ('admin/dataDokter')}}">
                            <div class="card text-white bg-flat-color-6">
                                <div class="card-body">
                                    <div class="card-left pt-1 float-left">
                                        <h3 class="mb-0 fw-r">
                                            <span class="currency float-left mr-1"></span>
                                            <span class="count">{{ $dokter }}</span>
                                        </h3>
                                        <p class="text-light mt-1 m-0">Data Dokter</p>
                                    </div><!-- /.card-left -->

                                    <div class="card-right float-right text-right">
                                    <i class="icon fade-5 icon-lg pe-7s-users"></i>
                                    </div><!-- /.card-right -->

                                </div>

                            </div>
                        </div>
                        <!--/.col-->

                        <div class="col-sm-6 col-lg-3">
                        <a href="{{url ('admin/dataAntrian')}}">
                            <div class="card text-white bg-flat-color-3">
                                <div class="card-body">
                                    <div class="card-left pt-1 float-left">
                                        <h3 class="mb-0 fw-r">
                                            <span class="count">{{ $antrian }}</span>
                                        </h3>
                                        <p class="text-light mt-1 m-0">Data Antrian</p>
                                    </div><!-- /.card-left -->

                                    <div class="card-right float-right text-right">
                                        <i class="icon fade-5 icon-lg pe-7s-browser"></i>
                                    </div><!-- /.card-right -->

                                </div>

                            </div>
                        </div>
                        <!--/.col-->

                        <div class="col-sm-6 col-lg-3">
                            <a href="{{url ('admin/poli')}}">
                            <div class="card text-white bg-flat-color-4">
                                <div class="card-body">
                                    <div class="card-left pt-1 float-left">
                                        <h3 class="mb-0 fw-r">
                                            <span class="count">{{ $poli }}</span>
                                        </h3>
                                        <p class="text-light mt-1 m-0">Data Poli</p>
                                    </div><!-- /.card-left -->

                                    <div class="card-right float-right text-right">
                                    <i class="icon fade-5 icon-lg pe-7s-browser"></i>
                                    </div><!-- /.card-right -->

                                </div>

                            </div>
                        </div>
                        <!--/.col-->

                        <div class="col-sm-6 col-lg-3">
                        <a href="{{url ('admin/blog_admin')}}">
                            <div class="card text-white bg-flat-color-2">
                                <div class="card-body">
                                    <div class="card-left pt-1 float-left">
                                        <h3 class="mb-0 fw-r">
                                            <span class="count">{{ $blog }}</span>
                                        </h3>
                                        <p class="text-light mt-1 m-0">Data Blog Kegiatan</p>
                                    </div><!-- /.card-left -->

                                    <div class="card-right float-right text-right">
                                    <i class="icon fade-5 icon-lg pe-7s-browser"></i>
                                    </div><!-- /.card-right -->

                                </div>

                            </div>
                        </div>
                    
                    <!--  /Traffic -->
                    <div class="clearfix"></div>
            
                <!-- /#add-category -->
                </div>
                <!-- .animated -->
            </div>
            <!-- /.content -->
            <div class="clearfix"></div>
            <!-- Footer -->
            <footer class="site-footer">
                <div class="footer-inner bg-white">
                    <div class="row">
                        <!--<div class="col-sm-6">
                            Copyright &copy; 2018 Ela Admin
                        </div>
                        <div class="col-sm-6 text-right">
                            Designed by <a href="https://colorlib.com">Colorlib</a>
                        </div>-->
                    </div>
                </div>
            </footer>
            <!-- /.site-footer -->
        </div>
        <!-- /#right-panel -->

        <!-- Scripts -->
        <script src="https://cdn.jsdelivr.net/npm/jquery@2.2.4/dist/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.4/dist/umd/popper.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/jquery-match-height@0.7.2/dist/jquery.matchHeight.min.js"></script>
        <script src="{{ url('assets/z/admin/js/main.js') }}"></script>

        <script src="https://cdn.jsdelivr.net/npm/jquery.flot@0.8.3/jquery.flot.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/flot-pie@1.0.0/src/jquery.flot.pie.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/flot-spline@0.0.1/js/jquery.flot.spline.min.js"></script>

        <script src="https://cdn.jsdelivr.net/npm/moment@2.22.2/moment.min.js"></script>

    </body>
</html>
