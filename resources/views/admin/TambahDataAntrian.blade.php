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
    <link rel="stylesheet" href="{{ url('assets/z/admin/css/cs-skin-elastic.css') }}">
    <link rel="stylesheet" href="{{ url('assets/z/admin/css/style.css') }}">
    <link rel="stylesheet" href="{{ url('lib/css/bootstrap-datetimepicker.min.css') }}">
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>

    <!-- <script type="text/javascript" src="https://cdn.jsdelivr.net/html5shiv/3.7.3/html5shiv.min.js"></script> -->

</head>
<body>
    <!-- Left Panel -->

    <aside id="left-panel" class="left-panel">
        <nav class="navbar navbar-expand-sm navbar-default">
            <div id="main-menu" class="main-menu collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li>
                        <a href="{{ url('admin/DashboardAdmin') }}">
                            <i class="menu-icon fa fa-laptop"></i>Dashboard 
                        </a>
                    </li>
                    <li class="menu-title">Data-Data</li><!-- /.menu-title -->
                    <li class="active">
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
                    <li>
                        <a href="{{ url('admin/rekamMedis') }}"><i class="menu-icon fa fa-file-text"></i>Rekam Medis</a>
                    </li>
                    <li>
                        <a href="{{ url('admin/blog_admin') }}"><i class="menu-icon fa fa-laptop"></i>Blog</a>
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
                    </div>

                    <div class="user-area dropdown float-right">
                        <a href="#" class="dropdown-toggle active" data-toggle="dropdown" 
                            aria-haspopup="true" aria-expanded="false">
                            {{session('nama_admin')}}
                            <img class="user-avatar rounded-circle" 
                                src="{{ url('assets/z/img/pp.png') }}" alt="User Avatar">
                        </a>

                        <div class="user-menu dropdown-menu">
                            <a class="nav-link" href="#"><i class="fa fa-power-off"></i>Logout</a>
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
                                <h1>Dashboard</h1>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-8">
                        <div class="page-header float-right">
                            <div class="page-title">
                                <ol class="breadcrumb text-right">
                                    <li>
                                        <a href="{{ url('admin/DashboardAdmin') }}">
                                            Dashboard
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ url('admin/dataAntrian') }}">
                                            Data Antrian
                                        </a>
                                    </li>
                                    <li class="active">Tambah Data Antrian</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="content">
            <div class="animated fadeIn">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <strong>Tambah Data Antrian </strong> 
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

                            <form action="{{ route('antrianPost') }}" method="post" class="form-horizontal">
                                {{csrf_field()}}
                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="select" class="form-control-label">Poli dan Dokter</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <select name="id_dokter" id="select" class="form-control">
                                            <option value="">Pilih Poli dan Dokter</option>
                                            @foreach($dokter as $data)
                                                <option value="{{ $data->id_dokter }}">
                                                    {{ $data->poli->nama_poli }} - {{ $data->nama_dokter }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="text-input" class="form-control-label">Nama Pasien</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <input type="text" id="nama_pasien" name="nama_pasien" 
                                            placeholder="Masukan Nama Pasien" class="form-control">
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="text-input" class="form-control-label">Jenis Kelamin</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <input type="radio" name="jk" value="laki-laki"> Laki-laki 
                                        &nbsp;
                                        <input type="radio" name="jk" value="perempuan"> Perempuan
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="text-input" class="form-control-label">Usia</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <input type="number" min="1" max="100" class="form-control" 
                                            id="nama_pasien" name="umur" placeholder="Masukan Usia">
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="text-input" class="form-control-label">No HP</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <input type="text" id="nama_pasien" name="no_telp" 
                                            placeholder="Masukan No HP" class="form-control">
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="email-input" class="form-control-label">Tanggal</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <input type="date" id="tanggal" name="tanggal" 
                                            class="form-control" min="{{ $now }}">
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="password-input" class="form-control-label">No Antrian</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <input type="text" id="no_antrian" name="no_antrian" 
                                            placeholder="Masukan No antrian" class="form-control">
                                    </div>
                                </div>
                                <div class="card-body">
                                    <button type="submit" class="btn btn-primary btn-sm" name="admin">
                                        <i class="fa fa-dot-circle-o"></i> Submit
                                    </button>
                                    <a href="{{url ('admin/dataAntrian')}}" class="btn btn-danger btn-sm">
                                        <i class="fa fa-ban"></i> Batal
                                    </a>
                                </div>
                            </form>
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
    <script src="{{ url('assets/z/admin/js/main.js') }}"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script src="{{ url('lib/js/bootstrap-datetimepicker.js') }}"></script>
</body>
</html>
