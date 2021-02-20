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
                <a class="navbar-brand">Apotech.id</a>
            </div>

            <!-- MENU LINKS -->
            <div class="collapse navbar-collapse">
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="#top">Home</a></li>
                    <li><a href="#news">Artikel Kesehatan</a></li>
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
                                <h3>Selamat Datang</h3>
                                <h1>Apotech.id</h1>
                            </div>
                        </div>
                    </div>

                    <div class="item item-second">
                        <div class="caption">
                            <div class="col-md-offset-1 col-md-10">
                                <h3>Selamat Datang</h3>
                                <h1>Apotech.id</h1>
                            </div>
                        </div>
                    </div>

                    <div class="item item-third">
                        <div class="caption">
                            <div class="col-md-offset-1 col-md-10">
                                <h3>Selamat Datang</h3>
                                <h1>Apotech.id</h1>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- NEWS -->
    <section id="news" data-stellar-background-ratio="2.5">
        <div class="container">
            <div class="row">

                <div class="col-md-12 col-sm-12">
                    <!-- SECTION TITLE -->
                    <div class="section-title wow fadeInUp" data-wow-delay="0.1s">
                        <h2>Artikel Kesehatan</h2>
                    </div>
                </div>

                <div class="col-md-4 col-sm-6">
                    <!-- NEWS THUMB -->
                    <div class="news-thumb wow fadeInUp" data-wow-delay="0.4s">
                        <a href="news-detail.html">
                            <img src="{{asset('template_welcome/images/news-image1.jpg')}}" class="img-responsive"
                                alt="">
                        </a>
                        <div class="news-info">
                            <span>08 Maret 2021</span>
                            <h3><a href="news-detail.html">Beli Obat dan Vitamin Secara Online Meningkat di Masa
                                    Pandemi</a></h3>
                            <p>Sejak pandemi dan PSBB di Jakarta diberlakukan, permintaan obat dan vitamin mengalami
                                pelonjakkan yang signifikan.</p>
                        </div>
                    </div>
                </div>

                <div class="col-md-4 col-sm-6">
                    <!-- NEWS THUMB -->
                    <div class="news-thumb wow fadeInUp" data-wow-delay="0.6s">
                        <a href="news-detail.html">
                            <img src="{{asset('template_welcome/images/news-image2.jpg')}}" class="img-responsive"
                                alt="">
                        </a>
                        <div class="news-info">
                            <span>20 Februari 2021</span>
                            <h3><a href="news-detail.html">BPOM: 2.645 Tautan Pelapak Ilegal Jual Obat yang Diklaim
                                    Sembuhkan COVID-19</a></h3>
                            <p>Badan Pengawas Obat dan Makanan (BPOM) menemukan lebih dari 46 ribu tautan terkait obat
                                yang diklaim mampu menyembuhkan COVID-19.</p>
                        </div>
                    </div>
                </div>

                <div class="col-md-4 col-sm-6">
                    <!-- NEWS THUMB -->
                    <div class="news-thumb wow fadeInUp" data-wow-delay="0.8s">
                        <a href="news-detail.html">
                            <img src="{{asset('template_welcome/images/news-image3.jpg')}}" class="img-responsive"
                                alt="">
                        </a>
                        <div class="news-info">
                            <span>27 Januari 2021</span>
                            <h3><a href="news-detail.html">Hari Keselamatan Pasien Sedunia 2020: Penting Laporkan Efek
                                    Samping Obat</a></h3>
                            <p>Peringatan Hari Keselamatan Pasien Sedunia (World Patient Safety Day) 2020 hari ini, 17
                                September menggaungkan pesan soal pemahaman efek samping obat. Bahwa kesadaran
                                melaporkan efek samping obat penting dilakukan.</p>
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

                <div class="col-md-4 col-sm-4">
                    <div class="footer-thumb">
                        <h4 class="wow fadeInUp" data-wow-delay="0.4s">Contact Info</h4>
                        <p>Tugas Akhir Komsi 2021</p>

                        <div class="contact-info">
                            <p><i class="fa fa-phone"></i> 0253-8181</p>
                            <p><i class="fa fa-envelope-o"></i>apotech@id.com</a></p>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 col-sm-12 border-top">
                    <div class="col-md-4 col-sm-6">
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

</body>

</html>
