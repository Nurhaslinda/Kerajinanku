<?php
@session_start();
require_once '../koneksi.php';
$kon = new Koneksi();
$idadmin = @$_SESSION['admin_id'];
$id = @$_REQUEST['admin_id'];
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
    <link rel="stylesheet" href="../penjual/css/bootstrap.min.css">
    <!-- Bootstrap CSS
		============================================ -->
    <link rel="stylesheet" href="../penjual/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
    <!-- nalika Icon CSS
		============================================ -->
    <link rel="stylesheet" href="../penjual/css/nalika-icon.css">
    <!-- owl.carousel CSS
		============================================ -->
    <link rel="stylesheet" href="../penjual/css/owl.carousel.css">
    <link rel="stylesheet" href="../penjual/css/owl.theme.css">
    <link rel="stylesheet" href="../penjual/css/owl.transitions.css">
    <!-- animate CSS
		============================================ -->
    <link rel="stylesheet" href="../penjual/css/animate.css">
    <!-- normalize CSS
		============================================ -->
    <link rel="stylesheet" href="../penjual/css/normalize.css">
    <!-- meanmenu icon CSS
		============================================ -->
    <link rel="stylesheet" href="../penjual/css/meanmenu.min.css">
    <!-- main CSS
		============================================ -->
    <link rel="stylesheet" href="../penjual/css/main.css">
    <!-- morrisjs CSS
		============================================ -->
    <link rel="stylesheet" href="../penjual/css/morrisjs/morris.css">
    <!-- mCustomScrollbar CSS
		============================================ -->
    <link rel="stylesheet" href="../penjual/css/scrollbar/jquery.mCustomScrollbar.min.css">
    <!-- metisMenu CSS
		============================================ -->
    <link rel="stylesheet" href="../penjual/css/metisMenu/metisMenu.min.css">
    <link rel="stylesheet" href="../penjual/css/metisMenu/metisMenu-vertical.css">
    <!-- calendar CSS
		============================================ -->
    <link rel="stylesheet" href="../penjual/css/calendar/fullcalendar.min.css">
    <link rel="stylesheet" href="../penjual/css/calendar/fullcalendar.print.min.css">
    <!-- style CSS
		============================================ -->
    <link rel="stylesheet" href="../penjual/style.css">
    <!-- responsive CSS
		============================================ -->
    <link rel="stylesheet" href="../penjual/css/responsive.css">
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
                <a href="index.html"><img class="main-logo" src="img/logo/logo.png" alt="" style="width: 100px;" /></a>
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
                                <li class="active" style="background-color: #E7DAD4;" style=" color: #000000;"><a title="Data Review" href="datareview.php"><span class="mini-sub-pro" style=" color: #000000;">Data Review</span></a></li>
                                <li><a title="Data Toko" href="datatoko.php"><span class="mini-sub-pro">Data Toko</span></a></li>
                                <li><a title="Data Produk" href="dataproduk.php"><span class="mini-sub-pro">Data Produk</span></a></li>
                                <li><a title="Data Pesanan" href="datapesanan.php"><span class="mini-sub-pro">Data Transaksi</span></a></li>
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
                        <a href="index.html"><img class="main-logo" src="img/logo/logo.png" alt="" style="width: 100px;" /></a>
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
                                        <li><a data-toggle="collapse" data-target="#data" href="#">Data<span class="admin-project-icon nalika-icon nalika-down-arrow"></span></a>
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
                                        <li><a data-toggle="collapse" data-target="#pesan" href="#">Pesan <span class="admin-project-icon nalika-icon nalika-down-arrow"></span></a>
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
        <div class="product-status mg-b-30">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="product-status-wrap" style="margin-top: 30px;">
                            <div class="row">
                                <h4>Data Review</h4>
                                <div class="breadcomb-report">
                                    <a href="laporan/laporandatareview.php"><button data-toggle="tooltip" title="Download Report" class="btn" style="color: white;"><i class="icon nalika-download"></i> Unduh Pdf</button></a>
                                </div>
                                <table>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Pembeli</th>
                                        <th>Nama Toko</th>
                                        <th>Produk</th>
                                        <th>Review</th>
                                        <th>Rating</th>
                                        <th colspan="2">Pengaturan</th>
                                    </tr>
                                    <?php
                                    $que = $kon->kueri("SELECT a.review_id, a.review_isi, a.review_rating, b.pembeli_id, b.pembeli_nama, c.produk_id, c.produk_nama, d.toko_id, d.toko_nama
                                    FROM review a JOIN pembeli b ON a.pembeli_id = b.pembeli_id JOIN produk c ON a.produk_id = c.produk_id 
                                    JOIN toko d ON a.toko_id = d.toko_id");
                                    $no = 1;
                                    $jumlah = $kon->jumlah_data($que);
                                    if ($jumlah == 0) {
                                        echo "<tr><td colspan=8>Data Kosong...</td></tr>";
                                    } else {
                                        while ($d = $kon->hasil_data($que)) {
                                            echo "<tr>";
                                            echo "<td>$no</td>";
                                            echo "<td>$d[pembeli_nama]</td>";
                                            echo "<td>$d[toko_nama]</td>";
                                            echo "<td>$d[produk_nama]</td>";
                                            echo "<td>$d[review_isi]</td>";
                                            echo "<td><i class='fa fa-star' style='color: #24CAA1;'>$d[review_rating]</td></i>";
                                            echo "<td><a href='datareview_edit.php?id=$d[review_id]'><button data-toggle='tooltip' title='Edit' class='pt-setting'><i class='fa fa-pencil-square-o' aria-hidden='true'></i></button></a></td>";
                                            echo "<td><a href='#' onclick=\"javascript: if(confirm('Apakah review dari" . addslashes($d['pembeli_nama']) . " untuk produk " . addslashes($d['produk_nama']) . " mau dihapus?')==true)
                                           {window.location.href='datareview_proses.php?aksi=hapus&tid=$d[review_id]'; } \"><button data-toggle='tooltip' title='Hapus' class='ds-setting'><i class='fa fa-trash-o' aria-hidden='true'></i></button></a></td>";
                                            echo "</td>";
                                            $no++;
                                        }
                                    }
                                    ?>

                                </table>
                                <!-- <div class="custom-pagination">
                                    <ul class="pagination">
                                        <li class="page-item"><a class="page-link" href="#">Previous</a></li>
                                        <li class="page-item"><a class="page-link" href="#">1</a></li>
                                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                                        <li class="page-item"><a class="page-link" href="#">Next</a></li>
                                    </ul>
                                </div> -->
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