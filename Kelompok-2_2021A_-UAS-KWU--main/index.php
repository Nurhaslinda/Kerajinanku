<?php
require_once 'koneksi.php';
$kon = new Koneksi();
?>
<!doctype html>
<html lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Kerajinanku</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="manifest" href="site.webmanifest">
    <link rel="shortcut icon" type="image/x-icon" href="pembeli/assets/img/logo/logo.png">

    <!-- CSS here -->
    <link rel="stylesheet" href="pembeli/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="pembeli/assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="pembeli/assets/css/flaticon.css">
    <link rel="stylesheet" href="pembeli/assets/css/slicknav.css">
    <link rel="stylesheet" href="pembeli/assets/css/animate.min.css">
    <link rel="stylesheet" href="pembeli/assets/css/magnific-popup.css">
    <link rel="stylesheet" href="pembeli/assets/css/fontawesome-all.min.css">
    <link rel="stylesheet" href="pembeli/assets/css/themify-icons.css">
    <link rel="stylesheet" href="pembeli/assets/css/slick.css">
    <link rel="stylesheet" href="pembeli/assets/css/nice-select.css">
    <link rel="stylesheet" href="pembeli/assets/css/style.css">
</head>


<header>
    <!-- Header Start -->
    <div class="header-area">
        <div class="main-header header-sticky">
            <div class="container-fluid">
                <div class="menu-wrapper">
                    <!-- Logo -->
                    <div class="logo">
                        <a href="index.html"><img src="pembeli/assets/img/logo/logo.png" alt="" style="width: 125px;"></a>
                    </div>
                    <!-- Main-menu -->
                    <div class="main-menu d-none d-lg-block">
                        <nav>
                            <ul id="navigation">
                                <li><a href="index.php"><b>Beranda</b></a></li>
                                <li><a class="nav-link" href="#produk"><b>Produk</b></a></li>
                                <li><a class="nav-link" href="#tentang"><b>Tentang</b></a></li>
                                <li><a class="nav-link" href="#kontak"><b>Kontak</b></a></li>

                            </ul>
                        </nav>
                    </div>
                    <!-- Header Right -->
                    <div class="header-right main-menu d-lg-block">
                        <nav>
                            <ul id="navigation">
                                <li><a href="opsi_login.html" style="margin-top: 10px;"><b>Daftar</b></a></li>
                                <li><a href="opsi_login.html"><button class="btn_3"><b>Login</b></button></a></li>
                            </ul>
                        </nav>
                    </div>
                </div>
                <!-- Mobile Menu -->
                <div class="col-12">
                    <div class="mobile_menu d-block d-lg-none"></div>
                </div>
            </div>
        </div>
    </div>
    <!-- Header End -->
</header>
<!--? slider Area Start -->
<div class="slider-area ">
    <div class=" slider-height2 d-flex align-items-center">
        <div class="container">
            <div class="row">
                <div class="col-xl-8 col-lg-8 col-md-8 col-sm-8">
                    <div class="hero__caption">
                        <h1 data-animation="fadeInLeft" data-delay=".4s" data-duration="2000ms">Kerajinanku</h1>
                        <p data-animation="fadeInLeft" data-delay=".7s" data-duration="2000ms">Hasil karya produk kerajinan unik langsung dari pembuatnya di seluruh Indonesia.</p>
                        <!-- Hero-btn -->
                        <div class="hero__btn" data-animation="fadeInLeft" data-delay=".8s" data-duration="2000ms">
                            <a href="pembeli/daftar.php" class="btn_1">Daftar Sekarang!</a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
<main style="background-color: #F0F0F0;">
    <!-- Hero Area Start-->
    <div class="popular-items section-padding" id="produk">
        <div class="container">
            <!-- Section tittle -->
            <div class="row justify-content-center">
                <div class="col-xl-7 col-lg-8 col-md-10">
                    <div class="section-tittle text-center">
                        <h2>Produk Populer</h2>
                        <hr style="width: 10cm; border: 2px solid #E8AEB1;">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <section class="popular-items">
        <div class="container">

            <!-- Nav Card -->
            <div class="tab-content" id="nav-tabContent">
                <!-- card one -->
                <div class="tab-pane fade show active" id="nav-home" aria-labelledby="nav-home-tab">
                    <div class="row">
                        <?php $kos = $kon->kueri("SELECT * FROM produk a JOIN review b ON a.produk_id = b.produk_id WHERE b.review_rating >= 3 AND produk_status = 'Ada' ");
                        while ($hasil = $kon->hasil_data($kos)) { ?>
                            <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6">
                                <div class="single-popular-items mb-50 text-center">
                                    <div class="popular-img">
                                        <img src="penjual/<?php echo $hasil['produk_gambartumbnail']; ?>" alt="gambar produk" style="width: 400px; height: 370px;">
                                        <a href="pembeli/login.php">
                                            <div class="img-cap">
                                                <span>Beli Sekarang</span>
                                            </div>
                                        </a>
                                        <!-- <div class="favorit-items">
                                        <span class="flaticon-heart"></span>
                                    </div> -->
                                    </div>
                                    <div class="popular-caption">
                                        <h3><a href="pembeli/login.php"><?php echo $hasil['produk_nama'] ?></a></h3>
                                        <div class="rating" style="margin-bottom: 5px;">
                                            <i class="fa fa-star" style="color: #24CAA1;"> <?php echo $hasil['review_rating'] ?></i>
                                        </div>
                                        <h4 style="font-weight: 800; color: #E8AEB1;">Rp. <?php echo $hasil['produk_harga'] ?></h4>
                                    </div>
                                </div>
                            </div>
                        <?php
                        }
                        ?>
                        <!-- <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6">
                            <div class="single-popular-items mb-50 text-center">
                                <div class="popular-img">
                                    <img src="pembeli/assets/img/cangkir.jpg" alt="">
                                    <a href="pembeli/login.php">
                                        <div class="img-cap">
                                            <span>Beli Sekarang</span>

                                        </div>
                                    </a> -->
                        <!-- <div class="favorit-items">
                                        <span class="flaticon-heart"></span>
                                    </div> -->
                        <!-- </div>
                                <div class="popular-caption">
                                    <h3><a href="pembeli/login.php">Cangkir</a></h3>
                                    <div class="rating" style="margin-bottom: 5px;">
                                        <i class="fa fa-star" style="color: #24CAA1;"></i><i class="fa fa-star" style="color: #24CAA1;"></i><i class="fa fa-star" style="color: #24CAA1;"></i><i class="fa fa-star" style="color: #24CAA1;"></i>
                                    </div>
                                    <h4 style="font-weight: 800; color: #E8AEB1;">Rp 15.000</h4>
                                </div>
                            </div>
                        </div> -->
                        <!-- <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6">
                            <div class="single-popular-items mb-50 text-center">
                                <div class="popular-img">
                                    <img src="pembeli/assets/img/tas.jpg" alt="">
                                    <a href="pembeli/login.php">
                                        <div class="img-cap">
                                            <span>Beli Sekarang</span>
                                        </div>
                                    </a> -->
                        <!-- <div class="favorit-items">
                                        <span class="flaticon-heart"></span>
                                    </div> -->
                        <!-- </div>
                                <div class="popular-caption">
                                    <h3><a href="pembeli/login.php">Tas</a></h3>
                                    <div class="rating" style="margin-bottom: 5px;">
                                        <i class="fa fa-star" style="color: #24CAA1;"></i><i class="fa fa-star" style="color: #24CAA1;"></i><i class="fa fa-star" style="color: #24CAA1;"></i><i class="fa fa-star" style="color: #24CAA1;"></i>
                                    </div>
                                    <h4 style="font-weight: 800; color: #E8AEB1;">Rp 80.000</h4>
                                </div>
                            </div>
                        </div> -->
                    </div>
                </div>

            </div>
            <!-- End Nav Card -->
        </div>
    </section>
</main>

<div class="whole-wrap" id="tentang">
    <div class="container box_1170">
        <div class="section-top-border">
            <div class="row">
                <div class="col-md-6">
                    <img src="pembeli/assets/img/logo/logo.png" alt="" class="img-fluid">
                </div>
                <div class="col-md-6 mt-sm-20">
                    <div class="about-details">
                        <div class="container">
                            <div class="row">
                                <div class="about-details-cap mb-50 mt-50 ml-5">
                                    <h4>Kerajinanku</h4>
                                    <h5>Kerajinanku merupakan platform penjualan berbasis website yang digunakan untuk mewadahi hasil karya seni yang ada di Indonesia
                                        sebagai bukti nyata kita mencintai dan mendukung produk Indonesia.</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

<main style="background-color: #F0F0F0;" id="kontak">
    <section class="contact-section">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h2 class="contact-title">Kirim Pesan</h2>
                </div>
                <div class="col-lg-8">
                    <form class="form-contact contact_form" action="kontak2_proses.php" method="POST" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <input class="form-control valid" name="nama" id="nama" type="text" placeholder="Masukkan Nama Lengkap">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <input class="form-control valid" name="email" id="email" type="email" placeholder="Masukkan Email">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <input class="form-control" name="subjek" id="subjek" type="text" placeholder="Masukkan Subjek">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <textarea class="form-control w-100" name="kontakpesan" id="kontakpesan" cols="30" rows="9" placeholder=" Masukkan Pesan..."></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="form-group mt-3">
                            <button type="submit" class="btn_1" value="submit">Kirim</button>
                        </div>
                    </form>
                </div>
                <div class="col-lg-3 offset-lg-1">
                    <div class="media contact-info">
                        <span class="contact-info__icon"><i class="fa fa-home" style="color: black;"></i></span>
                        <div class="media-body">
                            <h3>Jl. Ketintang, Gayungan</h3>
                            <p>Kota Surabaya, Jawa Timur. 60231</p>
                        </div>
                    </div>
                    <div class="media contact-info">
                        <span class="contact-info__icon"><i class="fa fa-phone" style="color: black;"></i></span>
                        <div class="media-body">
                            <h3>081123452799</h3>
                            <p>Senin - Jumat, 08:00 - 16:00</p>
                        </div>
                    </div>
                    <div class="media contact-info">
                        <span class="contact-info__icon"><i class="fa fa-inbox" style="color: black;"></i></span>
                        <div class="media-body">
                            <h3>kerajinanku@gmail.com</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
<footer>
    <!-- Footer Start-->
    <div class="footer-area footer-padding" style="padding: 50px; background-color: black;">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-12">
                    <div class="text-center">
                        <p style="color: white;">Copyright &copy; 2023 Kerajinanku, All rights reserved</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer End-->
</footer>


<!-- JS here -->

<script src="pembeli/assets/js/vendor/modernizr-3.5.0.min.js"></script>
<!-- Jquery, Popper, Bootstrap -->
<script src="pembeli/assets/js/vendor/jquery-1.12.4.min.js"></script>
<script src="pembeli/assets/js/popper.min.js"></script>
<script src="pembeli/assets/js/bootstrap.min.js"></script>
<!-- Jquery Mobile Menu -->
<script src="pembeli/assets/js/jquery.slicknav.min.js"></script>

<!-- Jquery Slick , Owl-Carousel Plugins -->
<script src="pembeli/assets/js/owl.carousel.min.js"></script>
<script src="pembeli/assets/js/slick.min.js"></script>

<!-- One Page, Animated-HeadLin -->
<script src="pembeli/assets/js/wow.min.js"></script>
<script src="pembeli/assets/js/animated.headline.js"></script>

<!-- Scrollup, nice-select, sticky -->
<script src="pembeli/assets/js/jquery.scrollUp.min.js"></script>
<script src="pembeli/assets/js/jquery.nice-select.min.js"></script>
<script src="pembeli/assets/js/jquery.sticky.js"></script>
<script src="pembeli/assets/js/jquery.magnific-popup.js"></script>

<!-- contact js -->
<script src="pembeli/assets/js/contact.js"></script>
<script src="pembeli/assets/js/jquery.form.js"></script>
<script src="pembeli/assets/js/jquery.validate.min.js"></script>
<script src="pembeli/assets/js/mail-script.js"></script>
<script src="pembeli/assets/js/jquery.ajaxchimp.min.js"></script>

<!-- Jquery Plugins, main Jquery -->
<script src="pembeli/assets/js/plugins.js"></script>
<script src="pembeli/assets/js/main.js"></script>

</body>

</html>