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
                        <h2>Form Pesan Antrian</h2>
                        <p></p>
                    </div>
                </div>
            </div>
            
            @if (session()->has('success'))
                <div class="alert alert-success alert-block">
                    <button type="button" class="close" data-dismiss="alert">×</button> 
                    <strong>{{ $message }}</strong>
                </div>
            @elseif($errors->any())
                <div class="alert alert-danger alert-block">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                    @foreach($errors->all() as $error) 
                        <ul>
                            <li> {{ $error }} </li>
                        </ul>
                    @endforeach
                </div>
            @endif

            <div class="row">
                <form action="{{ route('antrianPost') }}" method="POST">
                    @csrf
                    <div class="row form-group">
                        <label class="col-sm-4 control-label">Nama Lengkap</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" name="nama_pasien">
                        </div>
                    </div>
                    <div class="row form-group">
                        <label class="col-sm-4 control-label">Jenis Kelamin</label>
                        <div class="col-sm-8">
                            <input type="radio" name="jk" value="laki-laki"> Laki-laki
                            &nbsp;
                            <input type="radio" name="jk" value="perempuan"> Perempuan
                        </div>
                    </div>
                    <div class="row form-group">
                        <label class="col-sm-4 control-label">Usia</label>
                        <div class="col-sm-8">
                            <input type="number" name="umur" class="form-control">
                        </div>
                    </div>
                    <div class="row form-group">
                        <label class="col-sm-4 control-label">No Hp</label>
                        <div class="col-sm-8">
                            <input type="text" name="no_telp" class="form-control">
                        </div>
                    </div>
                    <div class="row form-group">
                        <label class="col-sm-4 control-label">Poli dan Dokter</label>
                        <div class="col-sm-8">
                            <select name="id_dokter">
                                <option value="">Pilih poli dan dokter</option>
                                @foreach($dokter as $data)
                                    <option value="{{ $data->id_dokter }}">
                                        {{ $data->nama_dokter }} - {{ $data->poli->nama_poli }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="row form-group">
                        <label class="col-sm-4 control-label">Tanggal</label>
                        <div class="col-sm-8">
                            <input type="date" min="{{ $now }}" name="tanggal" class="form-control">
                        </div>
                    </div>
                    <div style="margin-top: 50px;"></div>
                    <button type="submit" name="user" class="btn btn-info">Pesan sekarang</button>
                </form>
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