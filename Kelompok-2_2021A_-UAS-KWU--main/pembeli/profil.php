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


<header>
    <!-- Header Start -->
    <div class="header-area">
        <div class="main-header header-sticky">
            <div class="container-fluid">
                <div class="menu-wrapper">
                    <!-- Logo -->
                    <div class="logo">
                        <a href="index.php"><img src="assets/img/logo/logo.png" alt="" style="width: 125px;"></a>
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

<main style="background-color: white;">

    <section class="blog_area section-padding">
        <div class="container">
            <div class="row">
                <?php
                $que = $kon->kueri("SELECT * FROM pembeli WHERE pembeli_id = '$idpembeli'");
                $hasil = $kon->hasil_data($que);
                ?>
                <div class="col-lg-8 mb-5 mb-lg-0">
                    <div class="blog_left_sidebar">
                        <article class="blog_item">
                            <div class="blog_item_img">
                                <img class="card-img rounded-0" src="assets/img/hero/background.png" alt="">
                                <div class="blog_item_date">
                                    <img src="<?= $hasil['pembeli_foto']; ?>" alt="Foto Profil" class="img-fluid" style="border-radius: 50%; width: 150px; height: 150px; max-width:100%; vertical-align:middle;">
                                </div>
                            </div>
                            <div class="blog_details">
                                <div class="row">
                                    <div class="col-lg-10">
                                        <div class="row">
                                                <div class="col-sm-12 mt-10 mb-10">
                                                    <label>
                                                        <h2>Nama Lengkap</h2>
                                                    </label>
                                                    <input type="text" required class="single-input" value="<?= $hasil['pembeli_nama']; ?>" disabled>
                                                </div>
                                                <div class="col-12 mt-10 mb-10">
                                                    <label>
                                                        <h2>Username</h2>
                                                    </label>
                                                    <input type="text" required class="single-input" value="<?= $hasil['pembeli_username']; ?>" disabled>
                                                </div>
                                                <div class="col-12 mt-10 mb-10">
                                                    <label>
                                                        <h2>Jenis Kelamin</h2>
                                                    </label>
                                                    <input type="text" required class="single-input" value="<?= $hasil['pembeli_gender']; ?>" disabled>
                                                </div>
                                                <div class="col-12 mt-10 mb-10">
                                                    <label>
                                                        <h2>Email</h2>
                                                    </label>
                                                    <input type="text" required class="single-input" value="<?= $hasil['pembeli_email']; ?>" disabled>
                                                </div>
                                                <div class="col-12 mt-10 mb-10">
                                                    <label>
                                                        <h2>No.Hp</h2>
                                                    </label>
                                                    <input type="text" required class="single-input" value="<?= $hasil['pembeli_hp']; ?>" disabled>
                                                </div>
                                                <div class="col-12 mt-10 mb-10">
                                                    <label>
                                                        <h2>Alamat</h2>
                                                    </label>
                                                    <textarea class="single-textarea" disabled><?= $hasil['pembeli_alamat']; ?></textarea>
                                                </div>
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </article>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="blog_right_sidebar">
                        <aside class="single_sidebar_widget newsletter_widget" style="background-color: whitesmoke;">
                            <h4 class="widget_title">Edit Data</h4>
                            <a href="profiledit.php?pembeli_id=<?= $hasil['pembeli_id'] ?>">
                                <button class="w-100 btn_1 "> <i class="fa fa-edit"></i> Edit Data</button>
                            </a>

                        </aside>
                        <aside class="single_sidebar_widget newsletter_widget" style="background-color: whitesmoke;">
                            <h4 class="widget_title">Logout</h4>
                            <a href="../logout.php"><button class="w-100 btn_1"> <i class="fa fa-power-off"></i> Logout</button></a>

                        </aside>
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