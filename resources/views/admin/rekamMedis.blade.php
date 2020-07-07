<!doctype html>
<html class="no-js" lang=""> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Data Rekam Medis</title>
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
    {{-- <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.6.2/css/buttons.dataTables.min.css"> --}}
    <link rel="stylesheet" href="{{ url('assets/z/admin/css/cs-skin-elastic.css') }}">
    <link rel="stylesheet" href="{{ url('assets/z/admin/css/lib/datatable/dataTables.bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ url('assets/sufee/css/lib/datatable/buttons.dataTables.min.css') }}">
    <link rel="stylesheet" href="{{ url('assets/z/admin/css/style.css') }}">
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
                        <a href="{{ url('admin/DashboardAdmin') }}"><i class="menu-icon fa fa-laptop"></i>Dashboard </a>
                    </li>
                    <li class="menu-title">Data-Data</li><!-- /.menu-title -->
                    <li >
                        <a href="{{ url('admin/dataAntrian') }}"><i class="menu-icon fa fa-clipboard"></i>Data Antrian </a>
                    </li>
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-table"></i>Tabel Data Akun</a>
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
                        <a href="{{ url('admin/poli') }}">
                            <i class="menu-icon fa fa-list-alt"></i>Poli 
                        </a>
                    </li>
                    <li class="active">
                        <a href="{{ url('admin/rekamMedis') }}">
                            <i class="menu-icon fa fa-file-text"></i>Rekam Medis
                        </a>
                    </li>
                    <li>
                        <a href="{{ url('admin/blog_admin') }}">
                            <i class="menu-icon fa fa-laptop"></i>Blog
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
                        <div class="user-area dropdown float-right">
                            <a href="#" class="dropdown-toggle active" data-toggle="dropdown" 
                                aria-haspopup="true" aria-expanded="false">
                                {{session('nama_admin')}}
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
                                    <li><a href="#">Dashboard</a></li>
                                    <li class="active">Rekam Medis</li>
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
                        <div class="table-data__tool-right">
                            <a href="{{url ('admin/TambahRekamMedis')}}" class="btn btn-info">
                            <i class="fas fa-plus"></i> Tambah Data </a>
                        </div> 
                        <br>
                        @if(session()->has('alert'))
                            <div class="alert alert-danger">
                                <div>{{session()->has('alert')}}</div>
                            </div>
                        @elseif(session()->has('alert-success'))
                            <div class="alert alert-success">
                                <div>{{session()->has('alert-success')}}</div>
                            </div>
                        @endif
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title">Data Rekam Medis</strong>
                            </div>
                            <div class="card-body">
                                <table id="tbl" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Poli</th>
                                            <th>Tanggal</th>
                                            <th>Nama Pasien</th>
                                            <th>Keterangan</th>
                                            <th class="noExport">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $no=1;
                                        @endphp
                                        @foreach($datas as $medis)
                                            <tr>
                                                <td>{{$no++}}</td>
                                                <td>{{$medis->poli->nama_poli}}</td>
                                                <td>{{$medis->tanggal_berobat}}</td>
                                                <td>{{$medis->pasien->nama_pasien}}</td>
                                                <td>{{$medis->keterangan}}</td>
                                                <td>
                                                    <div>
                                                        <a href="{{ url('admin/UbahRekamMedis'.$medis->id_rekam_medis) }}" 
                                                            class="btn btn-warning btn-sm"  title="Edit">
                                                            <i class="fas fa-pencil-alt"></i>
                                                        </a> 
                                                        <a href="{{ url('HapusRekamMedis'.$medis->id_rekam_medis) }}" 
                                                            class="btn btn-danger btn-sm"  title="Hapus">
                                                            <i class="fas fa-trash-alt"></i>
                                                        </a>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
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
                        Designed by <a href="https://colorlib.com">Kelompok q</a>
                    </div>
                </div>
            </div>
        </footer>
    </div><!-- /#right-panel -->

    <!-- Right Panel -->
    @include('sweet::alert')
    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@2.2.4/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.4/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-match-height@0.7.2/dist/jquery.matchHeight.min.js"></script>
    <script src="{{ url('assets/z/admin/js/main.js') }}"></script>
    <script src="{{ url('assets/z/admin/js/lib/data-table/datatables.min.js') }}"></script>
    <script src="{{ url('assets/z/admin/js/lib/data-table/dataTables.bootstrap.min.js') }}"></script>
    <script src="{{ url('assets/z/admin/js/lib/data-table/dataTables.buttons.min.js') }}"></script>
    <script src="{{ url('assets/z/admin/js/lib/data-table/buttons.bootstrap.min.js') }}"></script>
    <script src="{{ url('assets/z/admin/js/lib/data-table/jszip.min.js') }}"></script>
    <script src="{{ url('assets/z/admin/js/lib/data-table/pdfmake.min.js') }}"></script>
    <script src="{{ url('assets/z/admin/js/lib/data-table/vfs_fonts.js') }}"></script>
    <script src="{{ url('assets/z/admin/js/lib/data-table/buttons.html5.min.js') }}"></script>
    <script src="{{ url('assets/z/admin/js/lib/data-table/buttons.print.min.js') }}"></script>
    <script src="{{ url('assets/z/admin/js/lib/data-table/buttons.colVis.min.js') }}"></script>
    <script src="{{ url('assets/z/admin/js/init/datatables-init.js') }}"></script>

    <script type="text/javascript">
        $(document).ready(function() {
            $('#tbl').DataTable({
                dom: 'Bfrtip',
                buttons: [
                    {
                        extend: 'excel', 
                        exportOptions: { columns: [ 0, 1, 2, 3, 4 ] }, 
                        className: 'btn-primary'
                    },
                    {
                        extend: 'pdf', 
                        exportOptions: { columns: [ 0, 1, 2, 3, 4 ] },
                        className: 'btn-primary'
                    }
                ]
            });
        });
    </script>

</body>
</html>