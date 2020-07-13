<!doctype html>
<html class="no-js">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token"  content="{{ csrf_token() }}">
    <meta name="description" content="Sufee Admin - HTML5 Admin Template">
    <meta name="viewport"    content="width=device-width, initial-scale=1">
    <!-- title -->    
    <title>@yield('title')</title>
    <!-- css -->
    <link rel="stylesheet" href="{{url('assets/sufee/css/normalize.css')}}">
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <link rel="stylesheet" href="{{url('assets/sufee/css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{url('assets/sufee/css/themify-icons.css')}}">
    <link rel="stylesheet" href="{{url('assets/sufee/css/flag-icon.min.css')}}">
    <link rel="stylesheet" href="{{url('assets/sufee/css/cs-skin-elastic.css')}}">
    <link rel="stylesheet" href="{{url('assets/sufee/css/lib/datatable/dataTables.bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{url('assets/sufee/scss/style.css')}}">
    <link rel="stylesheet" href="{{url('assets/fancybox/jquery.fancybox.css')}}">
    <link rel="stylesheet" href="{{url('assets/sufee/css/hover.css')}}" >
    <link rel="stylesheet" href="{{url('assets/css/sweetalert2.min.css')}}" >

    <style>
        .table .thead-primary th {
            color: #fff;
            background-color: #6495ED;
            border-color: #6495ED; 
        }

        .myImg{
            margin:0 auto; 
        }
    </style>

</head>
<body>
    <!-- Left Panel -->
    @section('sidebar')
      <aside id="left-panel" class="left-panel">
        <nav class="navbar navbar-expand-sm navbar-default">
            <div class="navbar-header">
                <button class="navbar-toggler" type="button" data-toggle="collapse" 
                    data-target="#main-menu" aria-controls="main-menu" 
                    aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand" href="{{route('profilePasien')}}">Pasien</a>
                <a class="navbar-brand hidden" href="{{route('profilePasien')}}">P</a>
            </div>

            <div id="main-menu" class="main-menu collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li>
                        <a href="{{route('profilePasien')}}"> 
                            <i class="menu-icon fa fa-dashboard"></i>Profile
                        </a>
                    </li>
                    
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" 
                            aria-haspopup="true" aria-expanded="false"> 
                            <i class="menu-icon fa fa-laptop"></i> 
                            Daftar Berobat
                        </a>
                        <ul class="sub-menu children dropdown-menu">
                            <li>
                                <i class="fa fa-id-badge"></i>
                                <a href="{{route('ambilAntrian')}}">Pesan Antrian</a>
                            </li>
                            
                            <li>
                                <i class="fa fa-id-card-o"></i>
                                <a href="{{url('/pasien/lihat_no_antri', session('nama_pasien') )}}">
                                    Lihat no antrian
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" 
                            aria-haspopup="true" aria-expanded="false"> 
                            <i class="menu-icon fa fa-laptop"></i>Konsultasi
                        </a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="fa fa-id-badge"></i>
                                <a href="{{route('patientConsult')}}">Konsultasi</a>
                            </li>
                            <li>
                                <i class="fa fa-id-card-o"></i>
                                <a href="{{url('pasien/jawaban_konsultasi')}}">Jawaban Konsultasi</a>
                            </li>
                        </ul>
                    </li>         
                    
                    <li>
                        <a href="{{route('showRekamMedisById')}}"> 
                            <i class="menu-icon fa fa-dashboard"></i>Rekam Medis 
                        </a>
                    </li>
                </ul>
            </div><!-- /.navbar-collapse -->
        </nav>
      </aside><!-- /#left-panel -->

        <div id="right-panel" class="right-panel">
            <!-- right panel-->
            <header id="header" class="header">
                <div class="header-menu">
                    <div class="col-sm-7">
                        <a id="menuToggle" class="menutoggle pull-left">
                            <i class="fa fa fa-tasks"></i></a>
                        <div class="header-left"></div>
                    </div>

                    <div class="col-sm-5">
                        <div class="user-area dropdown float-right">
                            <a class="nav-link" href="{{route('logoutPasien')}}">
                                <i class="fa fa-power"></i>Logout
                            </a>
                        </div>
                    </div>
                </div>
            </header>
            <!-- end right panel -->
            @show    
            @yield('content')          
        </div>
    <script src="{{asset('js/app.js')}}"></script>
    <script src="{{url('assets/sufee/js/popper.min.js')}}"></script>
    <script src="{{url('assets/sufee/js/plugins.js')}}"></script>
    <script src="{{url('assets/sufee/js/main.js')}}"></script>
    <script src="{{url('assets/sufee/js/lib/data-table/datatables.min.js')}}"></script>
    <script src="{{url('assets/sufee/js/lib/data-table/dataTables.bootstrap.min.js')}}"></script>
    <script src="{{url('assets/sufee/js/lib/data-table/dataTables.buttons.min.js')}}"></script>
    <script src="{{url('assets/sufee/js/lib/data-table/buttons.bootstrap.min.js')}}"></script>
    <script src="{{url('assets/sufee/js/lib/data-table/jszip.min.js')}}"></script>
    <script src="{{url('assets/sufee/js/lib/data-table/pdfmake.min.js')}}"></script>
    <script src="{{url('assets/sufee/js/lib/data-table/vfs_fonts.js')}}"></script>
    <script src="{{url('assets/sufee/js/lib/data-table/buttons.html5.min.js')}}"></script>
    <script src="{{url('assets/sufee/js/lib/data-table/buttons.print.min.js')}}"></script>
    <script src="{{url('assets/sufee/js/lib/data-table/buttons.colVis.min.js')}}"></script>
    <script src="{{url('assets/sufee/js/lib/data-table/datatables-init.js')}}"></script>    
    <script src="{{url('assets/zebra/zebra_datepicker.js')}}"></script>    
    <script src="{{url('assets/fancybox/jquery.fancybox.js')}}"></script> 
    {{-- <script src="{{url('assets/js/sweetalert2.min.js')}}"></script>  --}}
    <script src="https://unpkg.com/sweetalert2@7.1.0/dist/sweetalert2.all.js"></script>
    
    <script>
        $('#bootstrap-data-table').dataTable();
    </script>

    <script>
        $(document).ready(function () {
            var frmAntrian = $('#frmAntrian');
            frmAntrian.submit(function (event) {
                event.preventDefault();

                $.ajax({
                    url: frmAntrian.attr('action'),
                    type: "POST",
                    data: frmAntrian.serialize(),
                    dataType: "json",
                    success: function( response ){
                        console.log(response);
                        if( response.error == 0 ){
                            swal(
                                'Success',
                                response.message,
                                'success'
                            ).then(OK => {
                                if(OK){
                                    window.location.href = "{{ route('liatAntrian') }}";
                                }
                            }); 
                        }else{
                            swal(
                                'Fail',
                                '' + response.message1 + '<br>' + response.message2,
                                'error'
                            ).then(OK => {
                                if(OK){
                                    window.location.href = "{{ route('ambilAntrian') }}";
                                }
                            });
                        }
                    }   
                });
            });

            var frmConsult = $('#frmConsult');
            frmConsult.submit(function (event) {
                event.preventDefault();

                $.ajax({
                    url: frmConsult.attr('action'),
                    type: "POST",
                    data: frmConsult.serialize(),
                    dataType: "json",
                    success: function( response ){
                        if( response.error == 0 ){
                            swal(
                                'Success',
                                response.message,
                                'success'
                            ).then(OK => {
                                if(OK){
                                    window.location.href = "{{ route('patientListConsult') }}";
                                }
                            }); 
                        }else{
                            swal(
                                'Fail',
                                '' + response.message1 + '<br>' + response.message2,
                                'error'
                            ).then(OK => {
                                if(OK){
                                    window.location.href = "{{ route('patientConsult') }}";
                                }
                            });
                        }
                    }   
                });
            });
        });
    </script>
</body>
</html>