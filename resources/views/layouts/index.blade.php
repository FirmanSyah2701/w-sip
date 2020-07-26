<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>SIPP</title>
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
    <header class="main_menu home_menu">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-12">
                    <nav class="navbar navbar-expand-lg navbar-light">
                        <a class="navbar-brand" href="{{ url('/') }}"> 
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
                                <li class="nav-item">
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

    <!-- banner part start-->
    <section class="banner_part">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-5 col-xl-5">
                    <div class="banner_text">
                        <div class="banner_text_iner">
                            <h5>We are here for your care</h5>
                            <h1>Puskesmas Plumbon Indramayu</h1>
                            <p>Website ini dibuat untuk mengenalkan Puskesmas Plumbon Indramayu kepada masyarakat luas.
                                 Berisi berbagai macam informasi terkait baik pelayanan maupun kegiatan yang ada di 
                                 Puskesmas Plumbon Indramayu.</p>
                            <P> Pengunjung website ini juga dapat menggunakan fitur KONSULTASI untuk mengetahui 
                                 informasi terkait dengan penyakit, tindakan dan pengobatan tanpa perlu bertemu 
                                 dokter secara langsung. Kami akan usahakan membalas pertanyaan anda secepat mungkin.</P>
                            <a href="{{ route('showRegisterPasien') }}" class="btn_2">REGISTRASI</a>

                        </div>
                    </div>
                </div>
                <div class="col-lg-7">
                    <div class="banner_img">
                        <img src="{{ url('assets/z/img/Puskesmas.png') }}" alt="">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- banner part start-->

    <!-- about us part start-->
    
    <!-- about us part end-->

    <!-- feature_part start-->
    <section class="feature_part">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-8">
                    <div class="section_tittle text-center">
                        <h2>Pelayanan Kami</h2>
                    </div>
                </div>
            </div>
            <div class="row justify-content-between align-items-center">
                <div class="col-lg-3 col-sm-12">
                    <div class="single_feature">
                        <div class="single_feature_part">
                            <span class="single_feature_icon">
                                <img src="{{ url('assets/z/img/users-solid.svg') }}" alt=""></span>
                            <h4> UNIT PELAYANAN UMUM</h4>
                            <p> Pelayanan unit ini dilakukan setiap hari kerja. 
                                Pelayanan ini ditunjukan untuk pasien rawat jalan
                                tanpa adanya batasan usia. Bisa untuk orang dewasa, anak-anak, maupun lansia.
                            </p>
                        </div>
                    </div>
                    <div class="single_feature">
                        <div class="single_feature_part">
                            <span class="single_feature_icon">
                                <img src="{{ url('assets/z/img/gizi1.png') }}" alt="">
                            </span>
                            <h4>UNIT PELAYANAN GIZI</h4>
                            <p>Pelayanan unit ini dilakukan setiap hari kerja pada jam kerja. 
                                Ditujukan untuk pasien rawat jalan. 
                                Pelayanan dilakukan oleh petugas gizi klinis. 
                                Jadwal pelayanan unit ini juga sama dengan jadwal pelayanan unit pelayanan umum.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-12">
                    <div class="single_feature_img">
                        <img src="{{ url('assets/z/img/service.png') }}" alt="">
                    </div>
                </div>
                <div class="col-lg-3 col-sm-12">
                    <div class="single_feature">
                        <div class="single_feature_part">
                            <span class="single_feature_icon">
                                <img src="{{ url('assets/z/img/baby-solid.svg') }}" alt="">
                            </span>
                            <h4>UNIT PELAYANAN ANAK</h4>
                            <p>Pelayanan unit ini dilakukan setiap hari kerja. 
                                Pelayanan ini ditujukan pada pasien rawat jalan anak-anak diatas usia 5 tahun. 
                                Jadwal pelayanan unit ini juga sama dengan jadwal pelayanan unit pelayanan umum.
                            </p>
                        </div>
                    </div>
                    <div class="single_feature">
                        <div class="single_feature_part">
                            <span class="single_feature_icon">
                                <img src="{{ url('assets/z/img/tooth-solid.svg') }}" alt="">
                            </span>
                            <h4>UNIT PELAYANAN GIGI</h4>
                            <p>Pelayanan unit ini dilakukan setiap hari kerja pada jam kerja. 
                                Pelayanan ditujukan untuk pasien dengan masalah atau keluhan gigi. 
                                Jadwal pelayanan unit ini juga sama dengan jadwal pelayanan unit pelayanan umum.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    <!-- feature_part start-->

    <!-- our depertment part start-->
    
    <!-- our depertment part end-->

    <!--::doctor_part start::-->
    
    <!--::doctor_part end::-->

    <!--::regervation_part start::-->
    
    <!--::regervation_part end::-->

    <!--::blog_part start::-->
    
    <!--::blog_part end::-->

    <footer class="footer-area">
        <div class="footer section_padding">
            <div class="container">
                <div class="row justify-content-between">
                    <div class="col-xl-2 col-md-6 col-sm-6 single-footer-widget">
                    <a href="{{ url('/') }}" class="footer_logo"> <img src="{{ url('assets/z/img/logopus2.png') }}" alt="#"> </a>
                        <p>Puskesmas Plumbon Indramayu</p>
                        {{-- <div class="social_logo">
                            <a href="#"><i class="ti-facebook"></i></a>
                            <a href="#"> <i class="ti-twitter"></i> </a>
                            <a href="#"><i class="ti-instagram"></i></a>
                            <a href="#"><i class="ti-skype"></i></a>
                        </div> --}}
                    </div>
                    <div class="col-xl-8 col-sm-6 col-md-6 single-footer-widget">
                        <h4>Alamat</h4>
                        <ul>
                            <li class="justify-items-center">
                                Jl. Raya Jatibarang-Indramayu No.Km6, 
                                Plumbon, Kecamatan Indramayu, Kabupaten Indramayu, 
                                Provinsi Jawa Barat 45216
                            </li>
                        </ul>
                    </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="copyright_part">
            <div class="container">
                <div class="row align-items-center">
                    <p class="footer-text m-0 col-lg-8 col-md-12"><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                        Copyright &copy;
                        <script>document.write(new Date().getFullYear());</script> 
                        All rights reserved | This template is made by 
                        <a href="https://colorlib.com" target="_blank">Colorlib</a>
                            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                    </p>
                    <div class="col-lg-4 col-md-12 text-center text-lg-right footer-social">
                        {{-- <a href="#"><i class="ti-facebook"></i></a>
                        <a href="#"> <i class="ti-twitter"></i> </a>
                        <a href="#"><i class="ti-instagram"></i></a>
                        <a href="#"><i class="ti-skype"></i></a> --}}
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