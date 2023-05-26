<?php
@session_start();
require_once '../koneksi.php';
$kon = new Koneksi();
$pembeli = @$_REQUEST['pembeli_id'];
$idpembeli = @$_SESSION['pembeli_id'];
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
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/logo/logo.png">

    <!-- CSS here -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="assets/css/flaticon.css">
    <link rel="stylesheet" href="assets/css/slicknav.css">
    <link rel="stylesheet" href="assets/css/animate.min.css">
    <link rel="stylesheet" href="assets/css/magnific-popup.css">
    <link rel="stylesheet" href="assets/css/fontawesome-all.min.css">
    <link rel="stylesheet" href="assets/css/themify-icons.css">
    <link rel="stylesheet" href="assets/css/slick.css">
    <link rel="stylesheet" href="assets/css/nice-select.css">
    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body>
    <header>
        <!-- Header Start -->
        <div class="header-area">
            <div class="main-header header-sticky">
                <div class="container-fluid">
                    <div class="menu-wrapper">
                        <!-- Logo -->
                        <div class="logo">
                            <a href="index.html"><img src="assets/img/logo/logo.png" alt="" style="width: 125px;"></a>
                        </div>
                        <!-- Main-menu -->
                        <div class="main-menu d-none d-lg-block">
                            <nav>
                                <ul id="navigation">
                                    <li><a href="index.php"><b>Beranda</b></a></li>
                                    <li><a href="produk.php"><b>Produk</b></a></li>
                                    <li><a href="order.php"><b>Order</b></a></li>
                                    <li><a href="#tentang"><b>Tentang</b></a></li>
                                    <li><a href="#kontak"><b>Kontak</b></a></li>

                                </ul>
                            </nav>
                        </div>
                        <!-- Header Right -->
                        <div class="header-right">
                            <ul>
                                <li>
                                    <div class="nav-search search-switch">
                                        <span class="fa fa-search"></span>
                                    </div>
                                </li>
                                <li><a href="keranjang.php"><span class="fa fa-shopping-cart"></span></a> </li>
                                <li> <a href="profil.php"><span class="fa fa-user"></span></a></li>
                            </ul>
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
    <main style="background-color: #F0F0F0;">
        <section class="popular-items">
            <div class="col-lg-4">
                <div class="blog_right_sidebar">
                    <aside class="single_sidebar_widget search_widget">
                        <form action="#">
                            <div class="form-group">
                                <div class="input-group mb-3 ml-40">
                                    <input type="text" class="form-control" placeholder='Cari...' onfocus="this.placeholder = ''" onblur="this.placeholder = 'Cari...'">
                                    <div class="input-group-append">
                                        <button class="btns" type="button"><i class="ti-search"></i></button>
                                    </div>
                                </div>
                            </div>

                        </form>
                    </aside>
                </div>
            </div>
            <div class="container">
                <div class="row product-btn justify-content-between mb-40">
                    <div class="properties__button">
                        <!--Nav Button  -->
                        <nav>
                            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">
                                    <h3>Semua</h3>
                                </a>
                                <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">
                                    <h3>Populer</h3>
                                </a>
                            </div>
                        </nav>
                        <!--End Nav Button  -->
                    </div>
                    <!-- Grid and List view -->
                    <div class="grid-list-view">
                    </div>
                    <!-- Select items -->
                    <div class="select-this">
                        <form action="#">
                            <div class="select-itms">
                                <select name="select" id="select1">
                                    <option value="">Filter</option>
                                    <option value="">50 per page</option>
                                    <option value="">60 per page</option>
                                    <option value="">70 per page</option>
                                </select>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- Nav Card -->
                <div class="tab-content" id="nav-tabContent">
                    <!-- card one -->
                    <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                        <div class="row">
                            <?php $ko = $kon->kueri("SELECT * FROM produk WHERE produk_status = 'Ada'");
                            while ($hasil = $kon->hasil_data($ko)) { ?>
                                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6">
                                    <div class="single-popular-items mb-50 text-center">
                                        <div class="popular-img">
                                            <img src="../penjual/<?php echo $hasil['produk_gambartumbnail']; ?>" alt="gambar produk" style="width: 400px; height: 370px;">
                                            <a href="detailproduk.php?produk_id=<?= $hasil['produk_id'] ?>">
                                                <div class="img-cap">
                                                    <span>Beli Sekarang</span>
                                                </div>
                                            </a>
                                            <!-- <div class="favorit-items">
                                        <span class="flaticon-heart"></span>
                                    </div> -->
                                        </div>
                                        <div class="popular-caption">
                                            <h3><a href="detailproduk.php?produk_id=<?= $hasil['produk_id'] ?>"><?php echo $hasil['produk_nama'] ?></a></h3>
                                            
                                            <h4 style="font-weight: 800; color: #E8AEB1;">Rp. <?= number_format($hasil['produk_harga'], 0, ',', '.'); ?></h4>
                                        </div>
                                    </div>
                                </div>
                            <?php
                            }
                            ?>
                        </div>

                    </div>
                    <!-- Card two -->
                    <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                        <div class="row">
                            <?php $k = $kon->kueri("SELECT * FROM produk a JOIN review b ON a.produk_id = b.produk_id ORDER BY b.review_rating = 5 AND produk_status = 'Ada' DESC");
                            while ($hasil = $kon->hasil_data($k)) { ?>
                                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6">
                                    <div class="single-popular-items mb-50 text-center">
                                        <div class="popular-img">
                                            <img src="../penjual/<?php echo $hasil['produk_gambartumbnail']; ?>" alt="gambar produk" style="width: 400px; height: 370px;">
                                            <a href="detailproduk.php?produk_id=<?= $hasil['produk_id'] ?>">
                                                <div class="img-cap">
                                                    <span>Beli Sekarang</span>
                                                </div>
                                            </a>
                                            <!-- <div class="favorit-items">
                                        <span class="flaticon-heart"></span>
                                    </div> -->
                                        </div>
                                        <div class="popular-caption">
                                            <h3><a href="detailproduk.php?produk_id=<?= $hasil['produk_id'] ?>"><?php echo $hasil['produk_nama'] ?></a></h3>
                                            <div class="rating" style="margin-bottom: 5px;">
                                                <i class="fa fa-star" style="color: #24CAA1;"><?php echo $hasil['review_rating'] ?></i>
                                            </div>
                                            <h4 style="font-weight: 800; color: #E8AEB1;">Rp. <?= number_format($hasil['produk_harga'], 0, ',', '.'); ?></h4>
                                        </div>
                                    </div>
                                </div>
                            <?php
                            }
                            ?>
                        </div>

                    </div>
                </div>
                <!-- End Nav Card -->
            </div>
        </section>
    </main>
    <footer>
        <!-- Footer Start-->
        <div class="footer-area footer-padding" style="padding: 50px; background-color: black;">
            <div class="container">
                <!-- Footer bottom -->
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

    <script src="./assets/js/vendor/modernizr-3.5.0.min.js"></script>
    <!-- Jquery, Popper, Bootstrap -->
    <script src="./assets/js/vendor/jquery-1.12.4.min.js"></script>
    <script src="./assets/js/popper.min.js"></script>
    <script src="./assets/js/bootstrap.min.js"></script>
    <!-- Jquery Mobile Menu -->
    <script src="./assets/js/jquery.slicknav.min.js"></script>

    <!-- Jquery Slick , Owl-Carousel Plugins -->
    <script src="./assets/js/owl.carousel.min.js"></script>
    <script src="./assets/js/slick.min.js"></script>

    <!-- One Page, Animated-HeadLin -->
    <script src="./assets/js/wow.min.js"></script>
    <script src="./assets/js/animated.headline.js"></script>

    <!-- Scrollup, nice-select, sticky -->
    <script src="./assets/js/jquery.scrollUp.min.js"></script>
    <script src="./assets/js/jquery.nice-select.min.js"></script>
    <script src="./assets/js/jquery.sticky.js"></script>
    <script src="./assets/js/jquery.magnific-popup.js"></script>

    <!-- contact js -->
    <script src="./assets/js/contact.js"></script>
    <script src="./assets/js/jquery.form.js"></script>
    <script src="./assets/js/jquery.validate.min.js"></script>
    <script src="./assets/js/mail-script.js"></script>
    <script src="./assets/js/jquery.ajaxchimp.min.js"></script>

    <!-- Jquery Plugins, main Jquery -->
    <script src="./assets/js/plugins.js"></script>
    <script src="./assets/js/main.js"></script>

</body>

</html>