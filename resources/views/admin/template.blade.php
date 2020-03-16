<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="au theme template">
    <meta name="author" content="Hau Nguyen">
    <meta name="keywords" content="au theme template">

    <!-- Title Page-->
    <title>@yield('title')</title>

    <!-- Fontfaces CSS-->
    <link href="{{url('lib/css/font-face.css')}}" rel="stylesheet" media="all">
    <link href="{{url('lib/font-awesome-4.7/css/font-awesome.min.css')}}" rel="stylesheet" media="all">
    <link href="{{url('lib/font-awesome-5/css/fontawesome-all.min.css')}}" rel="stylesheet" media="all">
    <link href="{{url('lib/mdi-font/css/material-design-iconic-font.min.css')}}" rel="stylesheet" media="all">

    <!-- Bootstrap CSS-->
    <link href="{{url('lib/bootstrap-4.1/bootstrap.min.css')}}" rel="stylesheet" media="all">

    <!-- lib CSS-->
    <link href="{{url('lib/animsition/animsition.min.css')}}" rel="stylesheet" media="all">
    <link href="{{url('lib/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css')}}" rel="stylesheet" media="all">
    <link href="{{url('lib/wow/animate.css')}}" rel="stylesheet" media="all">
    <link href="{{url('lib/css-hamburgers/hamburgers.min.css')}}" rel="stylesheet" media="all">
    <link href="{{url('lib/slick/slick.css')}}" rel="stylesheet" media="all">
    <link href="{{url('lib/select2/select2.min.css')}}" rel="stylesheet" media="all">
    <link href="{{url('lib/perfect-scrollbar/perfect-scrollbar.css')}}" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="{{url('lib/css/theme.css')}}" rel="stylesheet" media="all">

</head>

<body class="animsition">
    @section('sidebar')
    <div class="page-wrapper">
        <!-- HEADER MOBILE-->
        <header class="header-mobile d-block d-lg-none">
            <div class="header-mobile__bar">
                <div class="container-fluid">
                    <div class="header-mobile-inner">
                        <a class="logo" href="index.html">
                            <h2 class="title-1">Admin</h2>
                        </a>
                        <button class="hamburger hamburger--slider" type="button">
                            <span class="hamburger-box">
                                <span class="hamburger-inner"></span>
                            </span>
                        </button>
                    </div>
                </div>
            </div>
            <nav class="navbar-mobile">
                <div class="container-fluid">
                    <ul class="navbar-mobile__list list-unstyled">
                        <li>
                            <a href="index.html">
                                <i class="fas fa-tachometer-alt"></i>Dashboard</a>
                        </li>
                        <li class="has-sub">
                            <a class="js-arrow" href="#">
                                <i class="far fa-check-square"></i>Forms</a>
                            <ul class="navbar-mobile-sub__list list-unstyled js-sub-list">
                                <li>
                                    <a href="login.html">Data Calon Pengurus</a>
                                </li>
                                <li>
                                    <a href="register.html">Data Perlombaan</a>
                                </li>
                            </ul>
                        </li>
                        <li class="has-sub">
                            <a class="js-arrow" href="#">
                                <i class="fas fa-copy"></i>Konten</a>
                            <ul class="navbar-mobile-sub__list list-unstyled js-sub-list">
                                <li>
                                    <a href="login.html">Informasi/Agenda</a>
                                </li>
                                <li>
                                    <a href="register.html">Galeri</a>
                                </li>
                                <li>
                                    <a href="register.html">Slider</a>
                                </li>
                            </ul>
                        </li>
                        <li class="has-sub">
                            <a class="js-arrow" href="#">
                                <i class="fas fa-desktop"></i>Validasi</a>
                            <ul class="navbar-mobile-sub__list list-unstyled js-sub-list">
                                <li>
                                    <a href="button.html">Validasi Informasi/Agenda</a>
                                </li>
                                <li>
                                    <a href="badge.html">Valdasi Galeri</a>
                                </li>
                            </ul>
                        </li>
                        <li class="has-sub">
                            <a class="js-arrow" href="#">
                                <i class="fas fa-table"></i>Akun</a>
                            <ul class="navbar-mobile-sub__list list-unstyled js-sub-list">
                                <li>
                                    <a href="register.html">Akun Admin</a>
                                </li>
                                <li>
                                    <a href="register.html">Akun Sosial Media</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        <!-- END HEADER MOBILE-->

        <!-- MENU SIDEBAR-->
        <aside class="menu-sidebar d-none d-lg-block">
            <div class="logo">
                <a href="#">
                    <h1 class="title-1">Admin</h1>
                </a>
            </div>
            <div class="menu-sidebar__content js-scrollbar1">
                <nav class="navbar-sidebar">
                    <ul class="list-unstyled navbar__list">
                        <li class="active has-sub">
                            <a href="index.html">
                                <i class="fas fa-tachometer-alt"></i>Dashboard</a>
                        </li>
                        <li class="has-sub">
                            <a class="js-arrow" href="#">
                                <i class="far fa-check-square"></i>Forms</a>
                            <ul class="list-unstyled navbar__sub-list js-sub-list">
                                <li>
                                    <a href="login.html">Data Calon Pengurus</a>
                                </li>
                                <li>
                                    <a href="register.html">Data Perlombaan</a>
                                </li>
                            </ul>
                        </li>
                        <li class="has-sub">
                            <a class="js-arrow" href="#">
                                <i class="fas fa-copy"></i>Konten</a>
                            <ul class="list-unstyled navbar__sub-list js-sub-list">
                                <li>
                                <a href="{{url('informasi')}}">Informasi/Agenda</a>
                                </li>
                                <li>
                                    <a href="register.html">Galeri</a>
                                </li>
                                <li>
                                    <a href="register.html">Slider</a>
                                </li>
                            </ul>
                        </li>
                        <li class="has-sub">
                            <a class="js-arrow" href="#">
                                <i class="fas fa-desktop"></i>Validasi</a>
                            <ul class="list-unstyled navbar__sub-list js-sub-list">
                                <li>
                                    <a href="button.html">Validasi Informasi/Agenda</a>
                                </li>
                                <li>
                                    <a href="badge.html">Validasi Galeri</a>
                                </li>
                            </ul>
                        </li>
                        <li class="has-sub">
                            <a class="js-arrow" href="#">
                                <i class="fas fa-users"></i>Akun</a>
                            <ul class="list-unstyled navbar__sub-list js-sub-list">
                                <li>
                                    <a href="register.html">Akun Admin</a>
                                </li>
                                <li>
                                    <a href="register.html">Akun Sosial Media</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </nav>
            </div>
        </aside>
        <!-- END MENU SIDEBAR-->
        @show

        @section('header')
        <!-- PAGE CONTAINER-->
        <div class="page-container">
            <!-- HEADER DESKTOP-->
            <header class="header-desktop">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="header-wrap">
                            <form class="form-header" action="" method="POST">
                                <input class="au-input au-input--xl" type="text" name="search" placeholder="Search for datas &amp; reports..." />
                                <button class="au-btn--submit" type="submit">
                                    <i class="zmdi zmdi-search"></i>
                                </button>
                            </form>
                            <div class="header-button">
                                <div class="account-wrap">
                                    <div class="account-item clearfix js-item-menu">
                                        <div class="image">
                                            <img src="{{url('lib/images/icon/avatar-01.jpg')}}" />
                                        </div>
                                        <div class="content">
                                            <a class="js-acc-btn" href="#">john doe</a>
                                        </div>
                                        <div class="account-dropdown js-dropdown">
                                            <div class="account-dropdown__body">
                                                <div class="account-dropdown__item">
                                                    <a href="#">
                                                        <i class="zmdi zmdi-account"></i>Account</a>
                                                </div>
                                                <div class="account-dropdown__item">
                                                    <a href="#">
                                                        <i class="zmdi zmdi-settings"></i>Setting</a>
                                                </div>
                                            </div>
                                            <div class="account-dropdown__footer">
                                                <a href="#">
                                                    <i class="zmdi zmdi-power"></i>Logout</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </header>
            <!-- HEADER DESKTOP-->
            @show

            <div class="container">
                @yield('content')
            </div>
            <!-- END PAGE CONTAINER-->
        </div>

    </div>

    <!-- Jquery JS-->
    <script src="{{url('lib/jquery-3.2.1.min.js')}}"></script>
    <!-- Bootstrap JS-->
    <script src="{{url('lib/bootstrap-4.1/popper.min.js')}}"></script>
    <script src="{{url('lib/bootstrap-4.1/bootstrap.min.js')}}"></script>
    <!-- lib JS       -->
    <script src="{{url('lib/slick/slick.min.js')}}">
    </script>
    <script src="{{url('lib/wow/wow.min.js')}}"></script>
    <script src="{{url('lib/animsition/animsition.min.js')}}"></script>
    <script src="{{url('lib/bootstrap-progressbar/bootstrap-progressbar.min.js')}}">
    </script>
    <script src="{{url('lib/counter-up/jquery.waypoints.min.js')}}"></script>
    <script src="{{url('lib/counter-up/jquery.counterup.min.js')}}">
    </script>
    <script src="{{url('lib/circle-progress/circle-progress.min.js')}}"></script>
    <script src="{{url('lib/perfect-scrollbar/perfect-scrollbar.js')}}"></script>
    <script src="{{url('lib/chartjs/Chart.bundle.min.js')}}"></script>
    <script src="{{url('lib/select2/select2.min.js')}}">
    </script>

    <!-- Main JS-->
    <script src="{{url('lib/js/main.js')}}"></script>

</body>
</html>
<!-- end document-->
