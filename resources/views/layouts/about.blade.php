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
    <header class="main_menu home_menu">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-12">
                    <nav class="navbar navbar-expand-lg navbar-light">
                        <a class="navbar-brand" href="{{ url('/') }}"> <img src="{{ url('assets/z/img/logopus2.png') }}" alt="logo"> </a>
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

    <!-- about us part start-->
    <section class="about_us single_about_padding">
        <div class="container">
            <div class="row justify-content-between align-items-center">
                <div class="col-md-6 col-lg-6">
                    <div class="about_us_img">
                        <img src="img/1.jpg" alt="">
                    </div>
                </div>
                <div class="col-md-6 col-lg-5">
                    <div class="about_us_text">
                        <h2>Puskesmas Plumbon Indramayu</h2>
                        <p>Website ini dibuat untuk mengenalkan Puskesmas Plumbon Indramayu kepada masyarakat luas.
                                 Berisi berbagai macam informasi terkait baik pelayanan maupun kegiatan yang ada di 
                                 Puskesmas Plumbon Indramayu.</p>
                        <p>Pada Puskesmas Plumbon Indramayu ini terdapat beberapa spesialis seperti spesialis anak, spesialis gizi,
                            spesialis umum, dan juga spesialis gigi.
                        </p>
                        <!--<a class="btn_2 " href="#">learn more</a>-->
                        <div class="banner_item">
                            <div class="single_item">
                                <img src="img/smile.svg" alt="">
                                <h5>Jujur</h5>
                            </div>
                            <div class="single_item">
                                <img src="img/smile-wink.svg" alt="">
                                <h5>Empati</h5>
                            </div>
                            <div class="single_item">
                                <img src="img/wink.svg" alt="">
                                <h5>Hangat</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- about us part end-->

    <!-- our depertment part start-->
    <section class="our_depertment section_padding">
        <div class="container">
            <div class="row justify-content-center text-center">
                <div class="col-xl-12">
                    <div class="depertment_content">
                        <div class="row justify-content-center">
                            <div class="col-xl-8">
                                <h2>Unit Pelayanan Kami</h2>
                                <div class="row">
                                    <div class="col-lg-6 col-sm-6">
                                        <div class="single_our_depertment">
                                            <span class="our_depertment_icon"><img src="img/baby-solid.svg"
                                                    alt=""></span>
                                            <h4>Spesialis Anak</h4>
                                            <p>Spesialis yang bertugas pada kesehatan fisik, mental, emosional, dan sosial anak-anak, 
                                            serta memonitor tumbuh kembang anak dan merencanakan intervensi untuk mendukung 
                                            tumbuh kembang dan memelihara kesehatan anak sejak mereka dilahirkan hingga menjadi remaja.
                                            </p>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-sm-6">
                                        <div class="single_our_depertment">
                                            <span class="our_depertment_icon"><img src="img/gizi1.png"
                                                    alt=""></span>
                                            <h4>Spesialis Gizi</h4>
                                            <p>Spesialis yang bertugas memberikan saran dan informasi kepada pasien tentang penatalaksanaan gizi dan masalah kesehatan, 
                                                terlibat dalam diagnosis dan pengobatan masalah kesehatan yang terkait gizi dan nutrisi.</p>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-sm-6">
                                        <div class="single_our_depertment">
                                            <span class="our_depertment_icon"><img src="img/tooth-solid.svg"
                                                    alt=""></span>
                                            <h4>Spesialis GIGI</h4>
                                            <p>Spesialis yang secara umum melakukan pemeriksaan gigi secara menyeluruh, mengambil rontgen gigi, 
                                                menyediakan saran pola makan, dan menjelaskan dampak dari pola makan yang tepat terhadap 
                                                kebersihan mulut, dan melaksanakan layanan pembersihan seperti pembersihan karies gigi.</p>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-sm-6">
                                        <div class="single_our_depertment">
                                            <span class="our_depertment_icon"><img src="img/users-solid.svg"
                                                    alt=""></span>
                                            <h4>Spesialis Umum</h4>
                                            <p>Spesialis pengobatan masalah kesehatan dan gejala umum yang dialami pasien, dan juga 
                                            berperan dalam memberikan pencegahan, diagnosis, dan penanganan awal, serta merujuk ke dokter spesialis jika diperlukan.
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- our depertment part end-->

    <!-- footer part start-->
    <footer class="footer-area">
        <div class="footer section_padding">
            <div class="container">
                <div class="row justify-content-between">
                    <div class="col-xl-2 col-md-4 col-sm-6 single-footer-widget">
                    <a href="{{ url('/') }}" class="footer_logo"> <img src="img/logopus.png" alt="#"> </a>
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