<?php
@session_start();
require_once '../koneksi.php';
$kon = new Koneksi();
$idtoko = @$_REQUEST['toko_id'];
$idproduk = @$_REQUEST['produk_id'];
$idtrans = @$_REQUEST['id'];
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
                                    <li><a href="index.php#kontak"><b>Kontak</b></a></li>
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
                <div class="row product-btn justify-content-between mb-40">
                    <div class="properties__button">
                        <!--Nav Button  -->
                        <nav>
                            <div class="nav nav-tabs" id="nav-tab" role="tablist" style="margin-top: 50px;">
                                <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">
                                    <h3>Detail Pesanan</h3>
                                </a>
                            </div>
                        </nav>
                        <!--End Nav Button  -->
                    </div>
                    <!-- Grid and List view -->
                    <div class="grid-list-view">
                    </div>

                </div>
                <!-- Nav Card -->
                <div class="tab-content" id="nav-tabContent" style="background-color:white; margin: -20px;">
                    <!-- card one -->
                    <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                        <div class="whole-wrap">
                            <div class="container ml-20">
                                <div class="col-md-12">
                                <?php $ambil = $kon->kueri("SELECT * FROM transaksi_detail a JOIN transaksi b ON a.transaksi_id = b.transaksi_id 
                                    JOIN pembeli c ON b.pembeli_id = c.pembeli_id JOIN produk d ON a.produk_id = d.produk_id
                                    JOIN pembayaran e ON a.pembayaran_id = e.pembayaran_id JOIN ongkir f ON a.ongkir_id = f.ongkir_id
                                    WHERE a.transaksi_id = '$_GET[id]'");
                                    while ($detail = $ambil->fetch(PDO::FETCH_ASSOC)) {
                                    ?>
                                    <section class="section-top-border">
                                        <div class="container box_1170">
                                            <div class="row mb-5">
                                                <div class="col-md-2">
                                                    <img src="../penjual/<?php echo $detail['produk_gambartumbnail']; ?>" alt="Foto Produk" class="img-fluid" style='width: 170px; height: 150px;'>
                                                   
                                                </div>
                                                <div class="col-md-4" style="background-color: #F0F0F0;">
                                                    <h6 class="mt-10 text-center" style="font-weight: 600;"><?php echo $detail['produk_nama'] ?></h6>
                                                    <h6 class="mt-10 text-center" style="font-weight: 800; color: #E8AEB1;">Rp<?= number_format($detail['produk_harga'], 0, ',', '.') ?></h6>
                                                    <h6 class="mt-10 text-center" style="color: darkgray;">Jumlah : <?php echo $detail['jumlah'] ?></h6>
                                                </div>
                                            </div>
                                            <p class="sample-text">
                                                <b>Nama :</b> <?php echo $_SESSION['nama']; ?>
                                            </p>
                                            <p class="sample-text">
                                                <b>No. Hp :</b> <?php echo $detail['pembeli_hp'] ?>
                                            </p>
                                            <p class="sample-text">
                                                <b>Email :</b> <?php echo $detail['pembeli_email'] ?>
                                            </p>
                                            <p class="sample-text">
                                                <b>Alamat Pengiriman</b> : <?php echo $detail['pembeli_alamat'] ?>
                                            </p>
                                            <p class="sample-text">
                                                <b>Metode Pengiriman : </b> <?php echo $detail['metode_pengiriman'] ?>
                                            </p>
                                            <p class="sample-text">
                                                <b>Metode Pembayaran :</b> <?php echo $detail['metode_pembayaran'] ?>
                                            </p>
                                            <p class="sample-text">
                                                <b>Waktu Pesanan : </b> <?php echo $detail['transaksi_tanggal'] ?>
                                            </p>
                                            <p class="sample-text" style="color: rgb(117, 26, 202);">
                                                <b> Pembayaran :</b> <?php echo $detail['status_pembayaran'] ?>
                                            </p>
                                            <p class="sample-text" style="color: rgb(117, 26, 202);">
                                                <b>Status Pesanan :</b> <?php echo $detail['status_pesanan'] ?>
                                            </p>
                                            
                                        </div>
                                    </section>
                                    
                                    <hr>

                                    <div class="section-top-border text-right">
                                        <h6 class="mb-20" style="font-weight: 800;">Ongkir : Rp<?= number_format($detail['ongkir_harga'], 0, ',', '.'); ?></h6>
                                        <h6 class="mb-20" style="font-weight: 800;">Total Pembayaran : Rp<?= number_format ($detail['subtotal'], 0, ',', '.') ?></h6>
                                        <h6 class="mb-20" style="font-weight: 800;">No.Transaksi : <?php echo $detail['transaksi_id'] ?></h6>
                                        <h6 class="mb-20" style="font-weight: 800;">No.Transaksi Detail : <?php echo $detail['transaksi_detail_id'] ?></h6>
                                        
                                        <button class="btn_1 mb-50">Batalkan Pesanan</button>
                                    <hr>

                                    </div>
                                    <?php } ?>
                                    
                                </div>

                            </div>
                        </div>
                    </div>
                    <!-- Card two -->

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

    <!-- Jquery Plugins, main Jquery -->
    <script src="./assets/js/plugins.js"></script>
    <script src="./assets/js/main.js"></script>


</body>

</html>