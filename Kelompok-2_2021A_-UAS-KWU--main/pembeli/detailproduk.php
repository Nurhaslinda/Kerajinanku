<?php
@session_start();
require_once '../koneksi.php';
$kon = new Koneksi();
$idtoko = @$_REQUEST['toko_id'];
$idproduk = @$_REQUEST['produk_id'];
$id = @$_SESSION['pembeli_id'];
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
                                    <li><a href="index.php#tentang"><b>Tentang</b></a></li>
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
            <div class="container">

                <!-- Nav Card -->
                <div class="tab-content" id="nav-tabContent" style="margin: -20px;">
                    <!-- card one -->
                    <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                        <div class="whole-wrap">
                            <?php
                            $yo = $kon->kueri("SELECT * FROM produk a JOIN toko c ON a.toko_id = c.toko_id WHERE a.produk_id = '$idproduk' ");
                            while ($hasil = $kon->hasil_data($yo)) { ?>
                                <div class="container ml-20">
                                    <div class="col-md-12">
                                        <div class="section-top-border">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="row">
                                                        <div class="col-md-2">
                                                            <img src="../penjual/<?php echo $hasil['toko_foto'] ?>" alt="" class="img-fluid" style="border-radius: 30px;">
                                                        </div>
                                                        <div class="col-md-4 mt-20">
                                                            <h5 style="font-weight: 800;"><?php echo $hasil['toko_nama'] ?></h5>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="row mt-50">
                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                    <img src="../penjual/<?php echo $hasil['produk_gambartumbnail'] ?>" alt="" style="width: 470px; height: 450px;">
                                                </div>
                                                <div class="col-md-6">
                                                    <h2 class="mt-10" style="font-weight: 800;"><?php echo $hasil['produk_nama'] ?></h2>
                                                    <h5 class="mt-10" style="font-weight: 800; color: #E8AEB1;">Rp. <?= number_format($hasil['produk_harga'], 0, ',', '.'); ?></h5>
                                                    <h5 class="mt-10" style="color: rgb(0, 0, 0);">Detail : <br> <?php echo nl2br($hasil['produk_detail']) ?> </h5>
                                                    <div class="card_area" style="margin-top: 0px;">
                                                        <div class="product_count_area">
                                                            <h5>Stok : <?php echo $hasil['produk_stok'] ?></h5>
                                                        </div>
                                                    </div>

                                                    <form action="tambah_keranjang.php?produk_id=<?= $hasil['produk_id'] ?>" method="POST">
                                                        <div class="card_area" style="margin-top: 0px;">
                                                            <div class="product_count_area">
                                                                <div class="product_count d-inline-block" style="margin: 20px;">
                                                                    <input class="product_count_item input-number" id="jumlah" name="jumlah" type="number" value="1">
                                                                </div>
                                                            </div>
                                                        </div>
                                                </div>


                                                <div class="col-md-3" style="margin-top: 30px;">
                                                    <img src="../penjual/<?php echo $hasil['produk_gambar1'] ?>" alt="" style="width: 200px; height: 180px;">
                                                </div>

                                                <div class="col-md-3" style="margin-top: 30px;">
                                                    <img src="../penjual/<?php echo $hasil['produk_gambar2'] ?>" alt="" style="width: 200px; height: 180px;">
                                                </div>

                                            </div>
                                        </div>
                                        <div class="section-top-border text-right">
                                            <input type="submit" value="Masukkan ke Keranjang" class="btn_1 mb-50"></a>
                                        </div>
                                        </form>
                                    </div>
                                    <?php
                                    $rev = $kon->kueri("SELECT * FROM review a JOIN produk b ON a.produk_id = b.produk_id JOIN pembeli c ON a.pembeli_id = c.pembeli_id WHERE a.produk_id = '$idproduk' ");
                                    while ($hasil = $kon->hasil_data($rev)) {
                                    ?>
                                        <div class="row product-btn">
                                            <div class="properties__button">
                                                <!--Nav Button  -->
                                                <nav>
                                                    <div class="nav nav-tabs" id="nav-tab" role="tablist" style="margin-top: 50px;">
                                                        <a class="nav-item nav-link active" id="nav-home-tab" aria-controls="nav-home" aria-selected="true">
                                                            <h3>Review <i class="fa fa-star" style="color: #24CAA1;"> <?php echo $hasil['review_rating'] ?></i></h3>
                                                        </a>
                                                    </div>
                                                </nav>
                                                <!--End Nav Button  -->
                                            </div>
                                            <!-- Grid and List view -->
                                            <div class="grid-list-view">
                                            </div>
                                        </div>
                                        <div class="row mb-40 mt-20">
                                            <div class="col-md-6">
                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <img src="<?php echo $hasil['pembeli_foto'] ?>" alt="" class="img-fluid" style="border-radius: 100%; width:100px; height:100px;">
                                                    </div>
                                                    <div class="col-md-9">
                                                        <h6 style="font-weight: 800;"><?php echo $hasil['pembeli_nama'] ?></h6>
                                                        <i class="fa fa-star" style="color: #24CAA1;"></i><i class="fa fa-star" style="color: #24CAA1;"></i><i class="fa fa-star" style="color: #24CAA1;"></i><i class="fa fa-star" style="color: #24CAA1;"></i>
                                                        <p style="color: rgb(107, 107, 107);"><?php echo $hasil['review_isi'] ?></h5>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php } ?>
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
        <div class="footer-area footer-padding" style="padding: 20px; background-color: black;">
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