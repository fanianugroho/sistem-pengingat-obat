<!DOCTYPE html>
<html lang="en">

<head>

    <title>Apotech.id</title>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset('template/assets/images/APOTECH1.png')}}">
    <link rel="stylesheet" href="{{asset('template_welcome/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('template_welcome/css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('template_welcome/css/animate.css')}}">
    <link rel="stylesheet" href="{{asset('template_welcome/css/owl.carousel.css')}}">
    <link rel="stylesheet" href="{{asset('template_welcome/css/owl.theme.default.min.css')}}">

    <!-- MAIN CSS -->
    <link rel="stylesheet" href="{{asset('template_welcome/css/tooplate-style.css')}}">

</head>

<body id="top" data-spy="scroll" data-target=".navbar-collapse" data-offset="50">

    <!-- PRE LOADER -->
    <section class="preloader">
        <div class="spinner">
            <span class="spinner-rotate"></span>
        </div>
    </section>

    <!-- MENU -->
    <section class="navbar navbar-default navbar-static-top" role="navigation">
        <div class="container">
            <div class="navbar-header">
                <!-- lOGO TEXT HERE -->
                <!-- dark Logo text -->
                <img src="{{url('/')}}/template/assets/images/ApotechWelcome.png" />
            </div>

            <a class="navbar-brand">Apotech.id</a>
            <!-- MENU LINKS -->
            <div class="collapse navbar-collapse">
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="#top">Home</a></li>
                    <li><a href="#news">Layanan</a></li>
                    <li class="appointment-btn"><a href="login">Masuk</a></li>
                </ul>
            </div>
        </div>
    </section>

    <!-- HOME -->
    <section id="home" class="slider" data-stellar-background-ratio="0.5">
        <div class="container">
            <div class="row">
                <div class="owl-carousel owl-theme">
                    <div class="item item-first">
                        <div class="caption">
                            <div class="col-md-offset-1 col-md-10">
                                <h1>Apotech.id</h1>
                                <h3>Merupakan sebuah platform yang digunakan <br>untuk memantau dan mengelola obat
                                    pasien</h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </section>


    <section id="news" data-stellar-background-ratio="2.5">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-8">
                    <!-- NEWS THUMB -->
                    <div class="news-thumb wow fadeInUp" data-wow-delay="0.6s">
                        <div class="news-info">
                            <h2>Layanan Apotech.id</h2>
                            <p class="layanan-apotech">Website ini digunakan sebagai sistem informasi pengelolaan obat.
                            </p>
                        </div>
                        <div class="row row-centered">
                                <div class=" col-md-6 col-sm-4">
                            <img src="{{asset('template_welcome/images/info-obat.png')}}" alt="">
                            <h4 class="info-monitoring">Informasi Obat</h4>
                            <p class="desc-info-monitoring">Memuat informasi lengkap suatu obat</p>
                        </div>
                        <div class="col-md-6 col-sm-4">
                            <img src="{{asset('template_welcome/images/moni-obat.png')}}" alt="">
                            <h4 class="info-monitoring">Monitoring Obat</h4>
                            <p class="desc-info-monitoring">Memantau penggunaan obat pasien</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section id="news" data-stellar-background-ratio="2.5">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-8">
                    <!-- NEWS THUMB -->
                    <div class="news-thumb-2 wow fadeInUp" data-wow-delay="0.6s">

                        <div class="row row-centered"">
                            <h2 class=" h2-left-2">Pemasangan aplikasi<br>pengingat minum obat</h2>
                            <div class=" col-md-6 col-sm-4">
                                <img src="{{asset('template_welcome/images/lay-1.jpg')}}" alt="">
                            </div>

                            <div class="col-md-6 col-sm-4 bg-blue">
                                <div class="col-md-4 col-sm-4" style="padding-bottom: 0px;">
                                    <img src="{{asset('template_welcome/images/L1.png')}}" alt="">
                                </div>
                                <h4 class="step-title-L1">LANGKAH 1</h4>
                                <p class="step-desc-L1">Konsultasi penyakit bersama dokter rumah sakit
                                    atau puskesmas yang berkerja sama dengan Apotech.id </p>
                            </div>
                            <div class="col-md-6 col-sm-4">
                                <div class="col-md-4 col-sm-4" style="padding-bottom: 0px;">
                                    <img src="{{asset('template_welcome/images/L2.png')}}" alt="">
                                </div>
                                <h4 class="step-title">LANGKAH 2</h4>
                                <p class="step-desc">Apoteker akan memberikan obat dan
                                    resep yang tertempel pada bungkus obat</p>
                            </div>
                            <div class="col-md-6 col-sm-4">
                                <div class="col-md-4 col-sm-4" style="padding-bottom: 0px;">
                                    <img src="{{asset('template_welcome/images/L3.png')}}" alt="">
                                </div>
                                <h4 class="step-title">LANGKAH 3</h4>
                                <p class="step-desc">Pasien memasang aplikasi Apotech.id dan <b>Masuk</b> sebagai
                                    pasien,lalu memindai QR code yang terdapat pada resep obat yang sudah diberikan oleh
                                    apoteker</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="container">
        <div class="col-md-12 col-sm-8">
        </div>
    </div>
    <section id=" home" class="slider" data-stellar-background-ratio="0.5">
        <div class="container">
            <div class="row">
                <div class="owl-carousel owl-theme">
                    <div class="item item-second">
                        <div class="caption">
                            <div class="col-md-offset-1 col-md-10">
                                <h2 class="h2-left">Dapatkan penjadwalan minum<br>obatmu secara
                                    otomatis</h2>
                                <h3 class="h3-small">Pasang aplikasi Apotech.id yang diunduh melalui
                                    Google Play<br>Store.
                                    Minum obat secara rutin dan tepat waktu<br>akan membantu untuk
                                    memulihkan kesehatanmu.
                                </h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </section>

    <!-- FOOTER -->
    <footer data-stellar-background-ratio="5">
        <div class="container">
            <div class="row">
                <!-- <div class="col-md-4 col-sm-4">
                    <div class="footer-thumb">
                        <h4 class="wow fadeInUp" data-wow-delay="0.4s">Tautan</h4>
                        <div class="contact-info">
                            <p> Portofolio </p>
                            <p> Blog </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-4">
                    <div class="footer-thumb">
                        <h4 class="wow fadeInUp" data-wow-delay="0.4s">Layanan</h4>
                        <div class="contact-info">
                            <p> Kelola Pasien </p>
                            <p> Kelola Obat </p>
                        </div>
                    </div>
                </div> -->
                <div class="col-md-6 col-sm-8">
                    <div class="footer-thumb">
                        <h4 class="wow fadeInUp" data-wow-delay="0.4s">Hubungi Kami</h4>
                        <div class="contact-info">
                            <p><i class="fa fa-phone"></i> 0253-8181</p>
                            <p><i class="fa fa-envelope-o"></i>apotech@id.com</a></p>
                            <p><i class="fa fa-map-marker"></i>Depok, Sleman
                                Yogyakarta, Indonesia</a></p>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 col-sm-12 border-top">
                    <div class="col-md-6 col-sm-8">
                        <div class="copyright-text">
                            <p>Copyright &copy; 2021 Apotech.id</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <!-- SCRIPTS -->
    <script src="{{asset('template_welcome/js/jquery.js')}}"></script>
    <script src="{{asset('template_welcome/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('template_welcome/js/jquery.sticky.js')}}"></script>
    <script src="{{asset('template_welcome/js/jquery.stellar.min.js')}}"></script>
    <script src="{{asset('template_welcome/js/wow.min.js')}}"></script>
    <script src="{{asset('template_welcome/js/smoothscroll.js')}}"></script>
    <script src="{{asset('template_welcome/js/owl.carousel.min.js')}}"></script>
    <script src="{{asset('template_welcome/js/custom.js')}}"></script>
     });

</body>

</html>
