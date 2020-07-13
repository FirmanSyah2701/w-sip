<!doctype html>
<html class="no-js" lang=""> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>SIPP</title>
    <meta name="description" content="Ela Admin - HTML5 Admin Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="{{ url('assets/z/img/logopus4.png') }}">
    <link rel="shortcut icon"    href="{{ url('assets/z/img/logopus4.png') }}">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/normalize.css@8.0.0/normalize.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/font-awesome@4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/lykmapipo/themify-icons@0.1.2/css/themify-icons.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/pixeden-stroke-7-icon@1.2.3/pe-icon-7-stroke/dist/pe-icon-7-stroke.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/3.2.0/css/flag-icon.min.css">
    <link rel="stylesheet" href="{{ url('assets/z/dokter/css/cs-skin-elastic.css') }}">
    <link rel="stylesheet" href="{{ url('assets/z/dokter/css/style.css') }}">
</head>

<body>
    <!-- Left Panel -->
    <aside id="left-panel" class="left-panel">
        <nav class="navbar navbar-expand-sm navbar-default">
            <div id="main-menu" class="main-menu collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li class="active">
                        <a href="{{ url('dokter/DashboardDokter') }}">
                            <i class="menu-icon fa fa-laptop"></i>Dashboard 
                        </a>
                    </li>
                    <li class="menu-title">Data-Data</li><!-- /.menu-title -->
                    <li >
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
    </aside>
    <!-- /#left-panel -->
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
                            &nbsp;
                            <img class="user-avatar rounded-circle" 
                                src="{{ url('assets/z/img/pp.png') }}" alt="User Avatar">
                        </a>

                        <div class="user-menu dropdown-menu">
                            <a class="nav-link" href="/logoutDokter"><i class="fa fa-power-off"></i>Logout</a>
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
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title">Profile</strong>
                                <button type="button" class="btn btn-primary pull-right btn-sm" 
                                data-toggle="modal" data-target="#edit-data{{ $datas->id_dokter }}" 
                                title="Edit Profile">
                                Ubah Akun
                            </button>
                            </div>
                            <div class="card-body">
                                @if($datas->foto != '')
                                    <img class="mx-auto d-block rounded-circle img-responsive" 
                                        width="260px" height="200px" 
                                        src="{{URL::to('/')}}/assets/img/product/{{ $datas->foto }}">
                                @endif
                                <div style="margin-top: 40px;"></div>
                                <div class="text-center"> Username: {{ $datas->username }} </div>
                                <div class="text-center"> Nama Lengkap: {{ $datas->nama_dokter }} </div>
                                <div class="text-center"> Poli: {{ $datas->poli->nama_poli }} </div>
                                <div class="text-center"> Jenis Kelamin: {{ $datas->jk }} </div>
                                <div class="text-center"> Nomer HP: {{ $datas->no_telp }} </div>
                                <div class="text-center"> Alamat: {{ $datas->alamat }} </div>
                            </div>
                        </div>
                    </div>
                <!--kk-->
                
                <!-- /Widgets -->
                <!--  Traffic  -->
                
                <!--  /Traffic -->
                <div class="clearfix"></div>
                <!-- Orders -->
                
                <!-- /.orders -->
                <!-- To Do and Live Chat -->
                
                <!-- /To Do and Live Chat -->
                <!-- Calender Chart Weather  -->
                
                <!-- /Calender Chart Weather -->
                <!-- Modal - Calendar - Add New Event -->
                
                <!-- /#event-modal -->
                <!-- Modal - Calendar - Add Category -->
                
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

    <!-- Modal Ubah Data  -->
    <div id="edit-data{{$datas->id_dokter}}" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <!-- konten modal-->
            <div class="modal-content">
                <!-- heading modal -->
                <div class="modal-header">
                    <h5 class="modal-title" id="mediumModalLabel">Ubah Akun</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <!-- body modal -->
                <div class="modal-body">
                    <form action="{{route('editProfile', $datas->id_dokter)}}" method="POST"
                        enctype="multipart/form-data" class="form-horizontal tasi-form">

                        @csrf
                        @method('PUT')
                        
                        @if($datas->foto != '')
                            <img class="mx-auto d-block img-responsive rounded-circle" 
                                width="260px" height="200px" 
                                src="{{URL::to('/')}}/assets/img/product/{{ $datas->foto }}">
                        @endif

                        <div style="margin-top: 40px;"></div>
                        <div class="row form-group">
                            <label class="col-sm-4 control-label">Username</label>
                            <div class="col-sm-8">                    
                                <input type="text" class="form-control" 
                                    name="username" value="{{ $datas->username }}">
                            </div>
                        </div>
                        
                        <div class="row form-group">
                            <label class="col-sm-4 control-label">Nama lengkap</label>
                            <div class="col-sm-8">                    
                                <input type="text" class="form-control" 
                                    name="nama_datas" value="{{ $datas->nama_dokter }}">
                            </div>
                        </div>

                        <div class="row form-group">
                            <label class="col-sm-4 control-label">Poli</label>
                            <div class="col-sm-8">                    
                                <select name="poli" class="form-control">
                                    <option value="{{ $datas->id_poli }}">
                                        {{ $datas->poli->nama_poli }}
                                    </option>
                                    @foreach($poli as $data)
                                        @if($datas->id_poli != $data->id_poli)
                                            <option value="{{ $data->id_poli }}">
                                                {{ $data->nama_poli }}
                                            </option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="row form-group">
                            <label class="col-sm-4 control-label">Nomer Telpon</label>
                            <div class="col-sm-8">                    
                                <input type="text" class="form-control" 
                                    name="no_telp" value="{{ $datas->no_telp }}">
                            </div>
                        </div>

                        <div class="row form-group">
                            <label class="col-sm-4 control-label">Alamat</label>
                            <div class="col-sm-8">                    
                                <textarea class="form-control" name="alamat">{{ $datas->alamat }}</textarea>
                            </div>
                        </div>

                        <div class="row form-group">
                            <label class="col-sm-4 control-label">Foto</label>
                            <div class="col-sm-8">                    
                                <input type="file" class="form-control" name="foto">
                                <small class="form-text text-muted">JPG|JPEG|PNG Max 2MB</small>
                                <input type="hidden" name="hidden_foto" value="{{ $datas->photo }}">
                            </div>
                        </div>

                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">
                                Simpan
                            </button>

                            <button type="button" class="btn btn-danger" data-dismiss="modal">
                                Batal
                            </button>
                        </div>             
                    </form>
                </div>        
            </div>
        </div>
    </div>
    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@2.2.4/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.4/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-match-height@0.7.2/dist/jquery.matchHeight.min.js"></script>
    <script src="{{ url('assets/z/dokter/js/main.js') }}"></script>
</body>
</html>
