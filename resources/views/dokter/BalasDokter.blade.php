<!doctype html>
<html class="no-js" lang=""> <!--<![endif]-->
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
    <link rel="stylesheet" href="{{ url('assets/z/dokter/css/cs-skin-elastic.css') }}">
    <link rel="stylesheet" href="{{ url('assets/z/dokter/css/style.css') }}">
    <link rel="stylesheet" href="{{ url('lib/font-awesome-5/css/fontawesome-all.min.css')}}">
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <!-- <script type="text/javascript" src="https://cdn.jsdelivr.net/html5shiv/3.7.3/html5shiv.min.js"></script> -->

</head>
<body>
    <!-- Left Panel -->

    <aside id="left-panel" class="left-panel">
        <nav class="navbar navbar-expand-sm navbar-default">
            <div id="main-menu" class="main-menu collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li>
                        <a href="{{ url('dokter/DashboardDokter') }}">
                            <i class="menu-icon fa fa-laptop"></i>Dashboard 
                        </a>
                    </li>
                    <li class="menu-title">Data-Data</li><!-- /.menu-title -->
                    <li class="active">
                        <a href="{{ url('dokter/dataKonsultasi') }}">
                            <i class="menu-icon fa fa-clipboard"></i>Data Konsultasi 
                        </a>
                    </li>
                    <li>
                        <a href="{{ url('dokter/dataMedisPasien') }}">
                            <i class="menu-icon fa fa-user"></i>Data Medis Pasien 
                        </a>
                    </li>
                    
                </ul>
            </div><!-- /.navbar-collapse -->
        </nav>
    </aside><!-- /#left-panel -->

    <!-- Left Panel -->

    <!-- Right Panel -->

    <div id="right-panel" class="right-panel">

        <!-- Header-->
        <header id="header" class="header">
            <div class="top-left">
                <div class="navbar-header">
                    <a class="navbar-brand" href="{{ url('dokter/DashboardDokter') }}">
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
                        <button class="search-trigger"><i class="fa fa-search"></i></button>
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
                            {{session('nama_dokter')}}
                            <img class="user-avatar rounded-circle" 
                                src="{{ url('assets/z/img/pp.png') }}" alt="User Avatar">
                        </a>

                        <div class="user-menu dropdown-menu">
                            <a class="nav-link" href="/logoutDokter">
                                <i class="fa fa-power-off"></i>Logout
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </header><!-- /header -->
        <!-- Header-->

        <div class="breadcrumbs">
            <div class="breadcrumbs-inner">
                <div class="row m-0">
                    <div class="col-sm-4">
                        <div class="page-header float-left">
                            <div class="page-title">
                                <h1>Data Konsultasi</h1>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-8">
                        <div class="page-header float-right">
                            <div class="page-title">
                                <ol class="breadcrumb text-right">
                                    <li>
                                        <a href="{{ url('dokter/DashboardDokter') }}">
                                            Dashboard
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ url('dokter/dataKonsultasi') }}">
                                            Data Konsultasi
                                        </a> 
                                    </li>
                                    <li class="active">Balas Pertanyaan Konsultasi</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="content">
            <div class="animated fadeIn">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title">Data Konsultasi</strong>
                            </div>     
                            <div class="card-body card-block">
                                @if($errors->any())
                                    <div class="alert alert-danger alert-dismissible" role="alert">
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{$error}}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif

                                <form action="{{url('AksiBalasJawaban'.$datas->id_konsultasi) }}" 
                                    method="post" class="form-horizontal">
                                    @csrf
                                    @method('PUT')
                                    
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="text-input" class="badge badge-info">
                                                {{$datas->pasien->nama_pasien}}
                                            </label>
                                        </div>
                                        <div class="col-12 col-md-9"></div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="text-input" class="form-control-label">
                                                Pertanyaan Konsultasi
                                            </label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <input type="text" class="form-control" 
                                                value="{{$datas->konsul_pasien}}" ReadOnly>
                                        </div>
                                    </div>

                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="password-input" class=" form-control-label">
                                                Jawaban Konsultasi
                                            </label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            @if($datas->jawaban_dokter != '')
                                                <textarea type="text" id="jawaban_dokter" name="jawaban_dokter" 
                                                    placeholder="Masukan Jawaban" class="form-control" 
                                                    readonly>{{$datas->jawaban_dokter}}</textarea>
                                            @else
                                                <textarea type="text" id="jawaban_dokter" name="jawaban_dokter" 
                                                    placeholder="Masukan Jawaban" class="form-control"></textarea>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="card-body">
                                        @if($datas->jawaban_dokter == '')
                                        <button type="submit" class="btn btn-primary btn-sm">
                                            <i class="fa fa-dot-circle-o"></i> Balas
                                        @endif
                                        </button>
                                        <a href="{{url ('dokter/dataKonsultasi')}}" class="btn btn-danger btn-sm">
                                            <i class="fa fa-ban"></i> Batal
                                        </a>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- .animated -->
        </div><!-- .content -->


        <div class="clearfix"></div>

        <footer class="site-footer">
            <div class="footer-inner bg-white">
                <div class="row">
                    <div class="col-sm-6">
                        Copyright &copy; 2018 Ela Admin
                    </div>
                    <div class="col-sm-6 text-right">
                        Designed by <a href="https://colorlib.com">Kelompok 1</a>
                    </div>
                </div>
            </div>
        </footer>

    </div><!-- /#right-panel -->

    <!-- Right Panel -->

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@2.2.4/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.4/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-match-height@0.7.2/dist/jquery.matchHeight.min.js"></script>
    <script src="{{ url('assets/z/dokter/js/main.js') }}"></script>

    <script src="{{ url('assets/z/dokter/js/lib/data-table/datatables.min.js') }}"></script>
    <script src="{{ url('assets/z/dokter/js/lib/data-table/dataTables.bootstrap.min.js') }}"></script>
    <script src="{{ url('assets/z/dokter/js/lib/data-table/dataTables.buttons.min.js') }}"></script>
    <script src="{{ url('assets/z/dokter/js/lib/data-table/buttons.bootstrap.min.js') }}"></script>
    <script src="{{ url('assets/z/dokter/js/lib/data-table/jszip.min.js') }}"></script>
    <script src="{{ url('assets/z/dokter/js/lib/data-table/vfs_fonts.js') }}"></script>
    <script src="{{ url('assets/z/dokter/js/lib/data-table/buttons.html5.min.js') }}"></script>
    <script src="{{ url('assets/z/dokter/js/lib/data-table/buttons.print.min.js') }}"></script>
    <script src="{{ url('assets/z/dokter/js/lib/data-table/buttons.colVis.min.js') }}"></script>
    <script src="{{ url('assets/z/dokter/js/init/datatables-init.js') }}"></script>


    <script type="text/javascript">
        $(document).ready(function() {
          $('#bootstrap-data-table-export').DataTable();
      } );
  </script>

@include('sweet::alert')
</body>
</html>
