<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>@yield('title')</title>
    <meta name="description" content="Sufee Admin - HTML5 Admin Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">    
    <link rel="stylesheet" href="{{url('assets/sufee/css/normalize.css')}}">
    <link rel="stylesheet" href="{{url('assets/sufee/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{url('assets/sufee/css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{url('assets/sufee/css/themify-icons.css')}}">
    <link rel="stylesheet" href="{{url('assets/sufee/css/flag-icon.min.css')}}">
    <link rel="stylesheet" href="{{url('assets/sufee/css/cs-skin-elastic.css')}}">
    <link rel="stylesheet" href="{{url('assets/sufee/css/lib/datatable/dataTables.bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{url('assets/sufee/scss/style.css')}}">
    <link href="{{url('assets/fancybox/jquery.fancybox.css')}}" rel="stylesheet" />
    <link href="{{url('assets/sufee/css/hover.css')}}" rel="stylesheet" />
    <style>
      .table .thead-primary th {
        color: #fff;
        background-color: #6495ED;
        border-color: #6495ED; }
    </style>
    <!-- <script type="text/javascript" src="https://cdn.jsdelivr.net/html5shiv/3.7.3/html5shiv.min.js"></script> -->

</head>
<body>
    <!-- Left Panel -->
    @section('sidebar')
      <aside id="left-panel" class="left-panel">
        <nav class="navbar navbar-expand-sm navbar-default">
            <div class="navbar-header">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-menu" aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand" href="#">Admin</a>
                <a class="navbar-brand hidden" href="./">A</a>
            </div>

            <div id="main-menu" class="main-menu collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li>
                        <a href="{{ route('dashboard') }}"><i class="menu-icon fa fa-dashboard"></i> Dashboard</a>
                    </li>
                    <li><a href="{{ route('doctor.index') }}"><i class="menu-icon fa fa-user"></i> Daftar Dokter</a></li>          
                </ul>
            </div><!-- /.navbar-collapse -->
        </nav>
      </aside><!-- /#left-panel -->

      <div id="right-panel" class="right-panel">
        <!-- right panel-->
        <header id="header" class="header">
            <div class="header-menu">
                <div class="col-sm-7">
                    <a id="menuToggle" class="menutoggle pull-left"><i class="fa fa fa-tasks"></i></a>
                    <div class="header-left">
                    </div>
                </div>

                <div class="col-sm-5">
                    <div class="user-area dropdown float-right">
                        <a class="nav-link" href="#"><i class="fa fa-power"></i>Logout</a>
                    </div>
                </div>
            </div>
        </header>
      <!-- end right panel -->
    @show    
    @yield('content')          
    </div>

    <script src="{{url('assets/sufee/js/vendor/jquery-2.1.4.min.js')}}"></script>
    <script src="{{url('assets/sufee/js/popper.min.js')}}"></script>
    <script src="{{url('assets/sufee/js/plugins.js')}}"></script>
    <script src="{{url('assets/sufee/js/main.js')}}"></script>
    <script src="{{url('assets/sufee/js/dashboard.js')}}"></script>
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
    <script src="{{url('assets/fancybox/jquery.fancybox.js')}}"></script> 
    <script src="{{url('assets/js/jquery.js')}}"></script>
    <script type="text/javascript">
      $(function() {
        //    fancybox
          jQuery(".fancybox").fancybox();
      });

    </script>

    <script type="text/javascript">
        $(document).ready(function() {
          $('#bootstrap-data-table').DataTable();
        } );
    </script>
  
</body>
</html>