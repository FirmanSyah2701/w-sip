<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Sipp</title>
    <link rel="icon" href="{{ url('assets/z/img/logopus2.png') }}">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ url('assets/z/css/bootstrap.min.css') }}">
    <!-- animate CSS -->
    <link rel="stylesheet" href="{{ url('assets/z/css/animate.css') }}">
    <!-- owl carousel CSS -->
    <link rel="stylesheet" href="{{ url('assets/z/css/owl.carousel.min.css') }}">
    <!-- themify CSS -->
    <link rel="stylesheet" href="{{ url('assets/z/css/themify-icons.css') }}">
    <!-- flaticon CSS -->
    <link rel="stylesheet" href="{{ url('assets/z/css/flaticon.css') }}">
    <!-- magnific popup CSS -->
    <link rel="stylesheet" href="{{ url('assets/z/css/magnific-popup.css') }}">
    <!-- nice select CSS -->
    <link rel="stylesheet" href="{{ url('assets/z/css/nice-select.css') }}">
    <!-- swiper CSS -->
    <link rel="stylesheet" href="{{ url('assets/z/css/slick.css') }}">
    <!-- style CSS -->
    <link rel="stylesheet" href="{{ url('assets/z/css/style.css') }}">
</head>

<body>
    <!--::header part start::-->
    <header class="main_menu">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-12">
                    <nav class="navbar navbar-expand-lg navbar-light">
                        <a class="navbar-brand" href="index.html"> 
                            <img src="{{ url('assets/z/img/logopus2.png') }}" alt="logo"> 
                        </a>
                        <button class="navbar-toggler" type="button" data-toggle="collapse"
                            data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                            aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>

                        <div class="collapse navbar-collapse main-menu-item justify-content-center"
                            id="navbarSupportedContent">
                            <ul class="navbar-nav align-items-center">
                            <li class="nav-item active">
                                    <a class="nav-link" href="{{ url('/') }}">Beranda</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ url('about') }}">Tentang</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ url('dokter') }}">Dokter</a>
                                </li>
                                <li class="nav-item ">
                                    <a class="nav-link" href="{{ url('blog') }}">Blog Kegiatan</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('pesanAntrian') }}">Pesan Antrian</a> 
                                 </li>
                            </ul>
                        </div>
                        <a class="btn_2 d-none d-lg-block" href="{{ route('loginPasien') }}">LOGIN</a>
                    </nav>
                </div>
            </div>
        </div>
    </header>
    <!-- Header part end-->

    <!-- breadcrumb start-->
    
    <!-- breadcrumb start-->

    <!--::doctor_part start::-->
    <section class="doctor_part single_page_doctor_part">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-8">
                    <div class="section_tittle text-center">
                        <h2>Daftar Nama Dokter Puskesmas Plumbon Indramayu</h2>
                        <p></p>
                    </div>
                </div>
            </div>
            <div class="row">
            @foreach ($dokter as $dokter)
                <div class="col-sm-6 col-lg-3">
                    <div class="single_blog_item">
                        <div class="single_blog_img">
                            <img src="{{ asset('assets/img/dokter/'.$dokter->foto) }}" alt="doctor" height="300">
                        </div>
                        <div class="single_text">
                            <div class="single_blog_text">
                                <h3>{{$dokter->nama_dokter}}</h3>
                                <h4>Poli : {{$dokter->poli->nama_poli}}</h4>
                                <h4>Alamat : {{$dokter->alamat}}</h4>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
                
                
            </div>
        </div>
    </section>
    <!--::doctor_part end::-->

    <!--::regervation_part start::-->
    
    <!--::regervation_part end::-->

    <!-- footer part start-->
    <footer class="footer-area">
        <div class="footer section_padding">
            <div class="container">
                <div class="row justify-content-between">
                    <div class="col-xl-2 col-md-4 col-sm-6 single-footer-widget">
                    <a href="{{ url('/') }}" class="footer_logo"> <img src="{{ url('assets/z/img/logopus2.png') }}" alt="#"> </a>
                        <p>Puskesmas Plumbon Indramayu</p>
                        <div class="social_logo">
                            <a href="#"><i class="ti-facebook"></i></a>
                            <a href="#"> <i class="ti-twitter"></i> </a>
                            <a href="#"><i class="ti-instagram"></i></a>
                            <a href="#"><i class="ti-skype"></i></a>
                        </div>
                    </div>
                    <div class="col-xl-2 col-sm-6 col-md-4 single-footer-widget">
                        <h4>Alamat</h4>
                        <ul>
                            <li align="left">Jl. Raya Jatibarang-Indramayu No.Km6, Plumbon, Kec. Indramayu, Kabupaten Indramayu, 
                                Jawa Barat 45216</li>
                        </ul>
                    </div>
                    <div class="col-xl-2 col-sm-6 col-md-4 single-footer-widget">
                        <h4>Social Media</h4>
                        <ul>
                            <li><a href="#"><i class="ti-facebook"></i> Facebook</a></li>
                            <li><a href="#"><i class="ti-instagram"></i> Instagram</a></li>
                            <li><a href="#"><i class="ti-twitter"></i> Twitter </a></li>
                        </ul>
                    </div>
                    <div class="col-xl-3 col-sm-6 col-md-6 single-footer-widget">
                        <h4>Puskesmas</h4>
                        <p>Puskesmas Plumbon Indramayu</p>
                        <div class="form-wrap" id="mc_embed_signup">
                            <form target="_blank"
                                action="https://spondonit.us12.list-manage.com/subscribe/post?u=1462626880ade1ac87bd9c93a&amp;id=92a4423d01"
                                method="get" class="form-inline">
                                <input class="form-control" name="EMAIL" placeholder="Your Email Address"
                                    onfocus="this.placeholder = ''" onblur="this.placeholder = 'Your Email Address '"
                                    required="" type="email">
                                <button class="click-btn btn btn-default text-uppercase"> <i class="ti-angle-right"></i>
                                </button>
                                <div style="position: absolute; left: -5000px;">
                                    <input name="b_36c4fd991d266f23781ded980_aefe40901a" tabindex="-1" value=""
                                        type="text">
                                </div>

                                <div class="info"></div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="copyright_part">
            <div class="container">
                <div class="row align-items-center">
                    <p class="footer-text m-0 col-lg-8 col-md-12"><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                        Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="ti-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
                            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                    </p>
                    <div class="col-lg-4 col-md-12 text-center text-lg-right footer-social">
                        <a href="#"><i class="ti-facebook"></i></a>
                        <a href="#"> <i class="ti-twitter"></i> </a>
                        <a href="#"><i class="ti-instagram"></i></a>
                        <a href="#"><i class="ti-skype"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <!-- footer part end-->

    <!-- jquery plugins here-->
    <script src="{{ url('assets/z/js/jquery-1.12.1.min.js')}}"></script>
    <!-- popper js -->
    <script src="{{ url('assets/z/js/popper.min.js')}}"></script>
    <!-- bootstrap js -->
    <script src="{{ url('assets/z/js/bootstrap.min.js')}}"></script>
    <!-- owl carousel js -->
    <script src="{{ url('assets/z/js/owl.carousel.min.js')}}"></script>
    <script src="{{ url('assets/z/js/jquery.nice-select.min.js')}}"></script>
    <!-- contact js -->
    <script src="{{ url('assets/z/js/jquery.ajaxchimp.min.js')}}"></script>
    <script src="{{ url('assets/z/js/jquery.form.js')}}"></script>
    <script src="{{ url('assets/z/js/jquery.validate.min.js')}}"></script>
    <script src="{{ url('assets/z/js/mail-script.js')}}"></script>
    <script src="{{ url('assets/z/js/contact.js')}}"></script>
    <!-- custom js -->
    <script src="{{ url('assets/z/js/custom.js')}}"></script>
</body>

</html>