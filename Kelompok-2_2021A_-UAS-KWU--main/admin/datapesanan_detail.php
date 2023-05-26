<?php
@session_start();
require_once '../koneksi.php';
$kon = new Koneksi();
$idadmin = @$_SESSION['admin_id'];
$id = @$_REQUEST['admin_id'];
$idproduk = @$_REQUEST['produk_id'];
$toko = @$_REQUEST['toko_id'];
$idtrans = @$_REQUEST['id'];
?>
<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Kerajinanku</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- favicon
		============================================ -->
    <link rel="shortcut icon" type="image/x-icon" href="img/logo/logo.png">
    <!-- Google Fonts
		============================================ -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,700,900" rel="stylesheet">
    <!-- Bootstrap CSS
		============================================ -->
    <link rel="stylesheet" href="../penjual/../penjual/css/bootstrap.min.css">
    <!-- Bootstrap CSS
		============================================ -->
    <link rel="stylesheet" href="../penjual/../penjual/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/font-awesome.min.css">
    <!-- nalika Icon CSS
		============================================ -->
    <link rel="stylesheet" href="../penjual/../penjual/css/nalika-icon.css">
    <!-- owl.carousel CSS
		============================================ -->
    <link rel="stylesheet" href="../penjual/../penjual/css/owl.carousel.css">
    <link rel="stylesheet" href="../penjual/../penjual/css/owl.theme.css">
    <link rel="stylesheet" href="../penjual/../penjual/css/owl.transitions.css">
    <!-- animate CSS
		============================================ -->
    <link rel="stylesheet" href="../penjual/../penjual/css/animate.css">
    <!-- normalize CSS
		============================================ -->
    <link rel="stylesheet" href="../penjual/../penjual/css/normalize.css">
    <!-- meanmenu icon CSS
		============================================ -->
    <link rel="stylesheet" href="../penjual/../penjual/css/meanmenu.min.css">
    <!-- main CSS
		============================================ -->
    <link rel="stylesheet" href="../penjual/../penjual/css/main.css">
    <!-- morrisjs CSS
		============================================ -->
    <link rel="stylesheet" href="../penjual/../penjual/css/morrisjs/morris.css">
    <!-- mCustomScrollbar CSS
		============================================ -->
    <link rel="stylesheet" href="../penjual/../penjual/css/scrollbar/jquery.mCustomScrollbar.min.css">
    <!-- metisMenu CSS
		============================================ -->
    <link rel="stylesheet" href="../penjual/../penjual/css/metisMenu/metisMenu.min.css">
    <link rel="stylesheet" href="../penjual/../penjual/css/metisMenu/metisMenu-vertical.css">
    <!-- calendar CSS
		============================================ -->
    <link rel="stylesheet" href="../penjual/../penjual/css/calendar/fullcalendar.min.css">
    <link rel="stylesheet" href="../penjual/../penjual/css/calendar/fullcalendar.print.min.css">
    <!-- style CSS
		============================================ -->
    <link rel="stylesheet" href="../penjual/style.css">
    <!-- modals CSS
		============================================ -->
    <link rel="stylesheet" href="../penjual/../penjual/css/modals.css">
    <!-- forms CSS
		============================================ -->
    <link rel="stylesheet" href="../penjual/../penjual/css/form/all-type-forms.css">
    <!-- responsive CSS
		============================================ -->
    <link rel="stylesheet" href="../penjual/../penjual/css/responsive.css">
    <!-- modernizr JS
		============================================ -->
    <script src="../penjual/js/vendor/modernizr-2.8.3.min.js"></script>
</head>

<body>
    <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->

    <div class="left-sidebar-pro">
        <nav id="sidebar" class="">
            <div class="sidebar-header">
                <a href="index.php"><img class="main-logo" src="img/logo/logo.png" alt="" style="width: 100px;" /></a>
            </div>
            <div class="nalika-profile">
                <?php
                $que = $kon->kueri("SELECT * FROM admin WHERE admin_id = '$idadmin'");
                $hasil = $kon->hasil_data($que);
                ?>
                <div class="profile-dtl">
                    <a href="#"><img src="<?= $hasil['admin_foto']; ?>" alt="Foto Admin" /></a>
                    <h2><?= $hasil['admin_nama']; ?></h2>
                </div>
            </div>
            <div class="left-custom-menu-adp-wrap comment-scrollbar">
                <nav class="sidebar-nav left-sidebar-menu-pro">
                    <ul class="metismenu" id="menu1">
                        <li>
                            <a href="index.php">
                                <i class="icon nalika-home icon-wrap"></i>
                                <span class="mini-click-non">Dashboard</span>
                            </a>
                        </li>
                        <li>
                            <a class="has-arrow" href="#" aria-expanded="false" class="active" style="background-color: #E7DAD4;"><i class="icon nalika-folder icon-wrap" style=" color: #000000;"></i> <span class="mini-click-non" style=" color: #000000;">Data</span></a>
                            <ul class="submenu-angle" aria-expanded="false">
                                <li><a title="Data Users" href="datausers.php"><span class="mini-sub-pro">Data Users</span></a></li>
                                <li><a title="View Mail" href="datareview.php"><span class="mini-sub-pro">Data Review</span></a></li>
                                <li><a title="Compose Mail" href="datatoko.php"><span class="mini-sub-pro">Data Toko</span></a></li>
                                <li><a title="Pdf Viewer" href="dataproduk.php"><span class="mini-sub-pro">Data Produk</span></a></li>
                                <li class="active" style="background-color: #E7DAD4;" style=" color: #000000;"><a title="Inbox" href="datapesanan.php"  style=" color: #000000;"><span class="mini-sub-pro">Data Transaksi</span></a></li>
                            </ul>
                        </li>
                        <li>
                            <a class="has-arrow" href="#" aria-expanded="false"><i class="icon nalika-mail icon-wrap"></i> <span class="mini-click-non">Pesan</span></a>
                            <ul class="submenu-angle" aria-expanded="false">
                                <li><a title="Semua Pesan" href="semuapesan.php"><span class="mini-sub-pro">Semua Pesan</span></a></li>
                            </ul>
                        </li>
                        <li><a href="../logout.php"><i class="icon nalika-unlocked icon-wrap"></i><span class="mini-click-non"> Log Out</span></a>
                    </ul>
                </nav>
            </div>
        </nav>
    </div>
    <!-- Start Welcome area -->
    <div class="all-content-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="logo-pro">
                        <a href="index.php"><img class="main-logo" src="img/logo/logo.png" alt="" style="width: 100px;" /></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="header-advance-area">
            <div class="header-top-area">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="header-top-wraper">
                                <div class="row">
                                    <div class="col-lg-1 col-md-0 col-sm-1 col-xs-12">
                                        <div class="menu-switcher-pro">
                                            <button type="button" id="sidebarCollapse" class="btn bar-button-pro header-drl-controller-btn btn-info navbar-btn">
                                                <i class="icon nalika-menu-task"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-7 col-sm-6 col-xs-12">
                                        <div class="header-top-menu tabl-d-n hd-search-rp">
                                            <div class="breadcome-heading">
                                                <form role="search" class="">
                                                    <input type="text" placeholder="Search..." class="form-control">
                                                    <a href=""><i class="fa fa-search"></i></a>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="col-lg-5 col-md-5 col-sm-12 col-xs-12">
                                        <div class="header-right-info">
                                            <ul class="nav navbar-nav mai-top-nav header-right-menu">
                                                <li class="nav-item">
                                                    <a href="#" data-toggle="dropdown" role="button" aria-expanded="false" class="nav-link dropdown-toggle">
                                                        <i class="icon nalika-user"></i>
                                                        <i class="icon nalika-down-arrow nalika-angle-dw"></i>
                                                    </a>
                                                    <ul role="menu" class="dropdown-header-top author-log dropdown-menu animated zoomIn" style="margin-left: -120px ; background-color:#000000;">
                                                        <li><a href="profil.php"><span class="icon nalika-user author-log-ic"></span> Profil</a>
                                                        </li>
                                                        <li><a href="../logout.php"><span class="icon nalika-unlocked author-log-ic"></span> Log Out</a>
                                                        </li>
                                                    </ul>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Mobile Menu start -->
            <div class="mobile-menu-area">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="mobile-menu">
                                <nav id="dropdown">
                                    <ul class="mobile-menu-nav">
                                        <li><a data-toggle="collapse" href="index.php">Dashboard <span class="admin-project-icon nalika-icon nalika-down-arrow"></span></a>
                                        </li>
                                        <li><a data-toggle="collapse" data-target="#demo" href="#">Data<span class="admin-project-icon nalika-icon nalika-down-arrow"></span></a>
                                            <ul id="demo" class="collapse dropdown-header-top">
                                                <li><a href="datausers.php">Data Users</a>
                                                </li>
                                                <li><a href="datareview.php">Data Review</a>
                                                </li>
                                                <li><a href="datatoko.php">Data Toko</a>
                                                </li>
                                                <li><a href="dataproduk.php">Data Produk</a>
                                                </li>
                                                <li><a href="datapesanan.php">Data Transaksi</a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li><a data-toggle="collapse" data-target="#others" href="#">Pesan <span class="admin-project-icon nalika-icon nalika-down-arrow"></span></a>
                                            <ul id="others" class="collapse dropdown-header-top">
                                                <li><a href="semuapesan.php">Semua Pesan</a></li>
                                            </ul>
                                        </li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Mobile Menu end -->
        </div>
        <div class="breadcome-area">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="breadcome-list">
                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                    <div class="breadcomb-wp">
                                        <div class="breadcomb-icon">
                                            <i class="icon nalika-home"></i>
                                        </div>
                                        <div class="breadcomb-ctn">
                                            <h2>Detail Pesanan</h2>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="product-status mg-b-30">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="product-status-wrap" style="margin-top: 30px;">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="sparkline12-list">
                                    <div class="sparkline12-graph">
                                        <div class="basic-login-form-ad">
                                            <div class="row">
                                                <?php
                                                $ambil = $kon->kueri("SELECT * FROM transaksi_detail a JOIN transaksi b ON a.transaksi_id = b.transaksi_id 
                                                JOIN pembeli c ON b.pembeli_id = c.pembeli_id JOIN produk d ON a.produk_id = d.produk_id
                                                JOIN pembayaran e ON a.pembayaran_id = e.pembayaran_id JOIN ongkir f ON a.ongkir_id = f.ongkir_id
                                                JOIN toko g ON d.toko_id = g.toko_id
                                                WHERE b.transaksi_id = '$idtrans'");
                                                while ($detail = $kon->hasil_data($ambil)) { ?>
                                                
                                    <section class="section-top-border">
                                        <div class="container box_1170">
                                            <div class="row mb-5">
                                                <div class="col-md-2">
                                                    <img src="../penjual/<?php echo $detail['produk_gambartumbnail']; ?>" alt="Foto Produk" class="img-fluid" style='width: 170px; height: 150px;'>
                                                   
                                                </div>
                                                <div class="col-md-4" style="background-color: #F0F0F0;">
                                                    <h4 class="mt-10 text-center" style="font-weight: 600;"><?php echo $detail['produk_nama'] ?></h4>
                                                    <h4 class="mt-10 text-center" style="font-weight: 800; color: #E8AEB1;">Rp<?= number_format($detail['produk_harga'], 0, ',', '.') ?></h4>
                                                    <h4 class="mt-10 text-center" style="color: darkgray;">Jumlah : <?php echo $detail['jumlah'] ?></h4>
                                                </div>
                                            </div>
                                            <h4 class="sample-text" style="margin-top: 50px;">
                                                <b>Nama Toko:</b> <?php echo $detail['toko_nama']; ?>
                                            </h4>
                                            <h4 class="sample-text">
                                                <b>Nama Pembeli:</b> <?php echo $detail['pembeli_nama']; ?>
                                            </h4>
                                            <h4 class="sample-text">
                                                <b>No. Hp :</b> <?php echo $detail['pembeli_hp'] ?>
                                            </h4>
                                            <h4 class="sample-text">
                                                <b>Alamat Pengiriman</b> : <?php echo $detail['pembeli_alamat'] ?>
                                            </h4>
                                            <h4 class="sample-text">
                                                <b>Metode Pengiriman : </b> <?php echo $detail['metode_pengiriman'] ?>
                                            </h4>
                                            <h4 class="sample-text">
                                                <b>Metode Pembayaran :</b> <?php echo $detail['metode_pembayaran'] ?>
                                            </h4>
                                            <h4 class="sample-text">
                                                <b>Waktu Pesanan : </b> <?php echo $detail['transaksi_tanggal'] ?>
                                            </h4>
                                            <h4 class="sample-text" style="color: rgb(117, 26, 202);">
                                                <b> Pembayaran :</b> <?php echo $detail['status_pembayaran'] ?>
                                            </h4>
                                            <h4 class="sample-text" style="color: rgb(117, 26, 202);">
                                                <b>Status Pesanan :</b> <?php echo $detail['status_pesanan'] ?>
                                            </h4>
                                            
                                        </div>
                                    </section>
                                    
                                    <hr>

                                    <div class="section-top-border">
                                        <h4 style="margin-left: 15px; font-weight: 800;">Ongkir : Rp<?= number_format($detail['ongkir_harga'], 0, ',', '.'); ?></h4>
                                        <h4 style="margin-left: 15px; font-weight: 800;">Total Pesanan : Rp<?= number_format ($detail['subtotal'], 0, ',', '.') ?></h4>
                                        <h4 style="margin-left: 15px; font-weight: 800;">No.Transaksi : <?php echo $detail['transaksi_id'] ?></h4>
                                        <h4 style="margin-left: 15px; font-weight: 800;">No.Transaksi Detail : <?php echo $detail['transaksi_detail_id'] ?></h4>
                                    <hr>

                                    </div>
                                                <?php } ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-copyright-area">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="footer-copy-right">
                            <p>Copyright © 2023 Kerajinanku, All rights reserved.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- jquery
		============================================ -->
    <script src="../penjual/js/vendor/jquery-1.12.4.min.js"></script>
    <!-- bootstrap JS
		============================================ -->
    <script src="../penjual/js/bootstrap.min.js"></script>
    <!-- wow JS
		============================================ -->
    <script src="../penjual/js/wow.min.js"></script>
    <!-- price-slider JS
		============================================ -->
    <script src="../penjual/js/jquery-price-slider.js"></script>
    <!-- meanmenu JS
		============================================ -->
    <script src="../penjual/js/jquery.meanmenu.js"></script>
    <!-- owl.carousel JS
		============================================ -->
    <script src="../penjual/js/owl.carousel.min.js"></script>
    <!-- sticky JS
		============================================ -->
    <script src="../penjual/js/jquery.sticky.js"></script>
    <!-- scrollUp JS
		============================================ -->
    <script src="../penjual/js/jquery.scrollUp.min.js"></script>
    <!-- mCustomScrollbar JS
		============================================ -->
    <script src="../penjual/js/scrollbar/jquery.mCustomScrollbar.concat.min.js"></script>
    <script src="../penjual/js/scrollbar/mCustomScrollbar-active.js"></script>
    <!-- metisMenu JS
		============================================ -->
    <script src="../penjual/js/metisMenu/metisMenu.min.js"></script>
    <script src="../penjual/js/metisMenu/metisMenu-active.js"></script>
    <!-- morrisjs JS
		============================================ -->
    <script src="../penjual/js/sparkline/jquery.sparkline.min.js"></script>
    <script src="../penjual/js/sparkline/jquery.charts-sparkline.js"></script>
    <!-- calendar JS
		============================================ -->
    <script src="../penjual/js/calendar/moment.min.js"></script>
    <script src="../penjual/js/calendar/fullcalendar.min.js"></script>
    <script src="../penjual/js/calendar/fullcalendar-active.js"></script>
    <!-- plugins JS
		============================================ -->
    <script src="../penjual/js/plugins.js"></script>
    <!-- main JS
		============================================ -->
    <script src="../penjual/js/main.js"></script>
</body>

</html>