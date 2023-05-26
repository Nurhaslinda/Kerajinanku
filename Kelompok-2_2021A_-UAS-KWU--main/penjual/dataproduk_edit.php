<?php
@session_start();
require_once '../koneksi.php';
$kon = new Koneksi();
$idtoko = @$_SESSION['toko_id'];
$idproduk = @$_REQUEST['id'];
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
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- Bootstrap CSS
		============================================ -->
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/font-awesome.min.css">
    <!-- nalika Icon CSS
		============================================ -->
    <link rel="stylesheet" href="css/nalika-icon.css">
    <!-- owl.carousel CSS
		============================================ -->
    <link rel="stylesheet" href="css/owl.carousel.css">
    <link rel="stylesheet" href="css/owl.theme.css">
    <link rel="stylesheet" href="css/owl.transitions.css">
    <!-- animate CSS
		============================================ -->
    <link rel="stylesheet" href="css/animate.css">
    <!-- normalize CSS
		============================================ -->
    <link rel="stylesheet" href="css/normalize.css">
    <!-- meanmenu icon CSS
		============================================ -->
    <link rel="stylesheet" href="css/meanmenu.min.css">
    <!-- main CSS
		============================================ -->
    <link rel="stylesheet" href="css/main.css">
    <!-- morrisjs CSS
		============================================ -->
    <link rel="stylesheet" href="css/morrisjs/morris.css">
    <!-- mCustomScrollbar CSS
		============================================ -->
    <link rel="stylesheet" href="css/scrollbar/jquery.mCustomScrollbar.min.css">
    <!-- metisMenu CSS
		============================================ -->
    <link rel="stylesheet" href="css/metisMenu/metisMenu.min.css">
    <link rel="stylesheet" href="css/metisMenu/metisMenu-vertical.css">
    <!-- calendar CSS
		============================================ -->
    <link rel="stylesheet" href="css/calendar/fullcalendar.min.css">
    <link rel="stylesheet" href="css/calendar/fullcalendar.print.min.css">
    <!-- style CSS
		============================================ -->
    <link rel="stylesheet" href="style.css">
    <!-- modals CSS
		============================================ -->
    <link rel="stylesheet" href="css/modals.css">
    <!-- forms CSS
		============================================ -->
    <link rel="stylesheet" href="css/form/all-type-forms.css">
    <!-- responsive CSS
		============================================ -->
    <link rel="stylesheet" href="css/responsive.css">
    <!-- modernizr JS
		============================================ -->
    <script src="js/vendor/modernizr-2.8.3.min.js"></script>
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
                $que = $kon->kueri("SELECT * FROM toko WHERE toko_id = '$idtoko'");
                $hasil = $kon->hasil_data($que);
                ?>
                <div class="profile-dtl">
                    <a href="#"><img src="<?= $hasil['toko_foto']; ?>" alt="" /></a>
                    <h2><?php echo $hasil['toko_pemilik'] ?></h2>
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
                                <li><a title="Inbox" href="datapesanan.php"><span class="mini-sub-pro">Data Pesanan</span></a></li>
                                <li><a title="View Mail" href="datareview.php"><span class="mini-sub-pro">Data Review</span></a></li>
                                <li><a title="Compose Mail" href="datatoko.php"><span class="mini-sub-pro">Data Toko</span></a></li>
                                <li class="active" style="background-color: #E7DAD4;" style=" color: #000000;"><a title="Pdf Viewer" href="dataproduk.php"><span class="mini-sub-pro" style=" color: #000000;">Data Produk</span></a></li>
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
                                                <li><a href="datapesanan.php">Data Pesanan</a>
                                                </li>
                                                <li><a href="datareview.php">Data Review</a>
                                                </li>
                                                <li><a href="datatoko.php">Data Toko</a>
                                                </li>
                                                <li><a href="dataproduk.php">Data Produk</a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li><a data-toggle="collapse" data-target="#others" href="#">Pesan <span class="admin-project-icon nalika-icon nalika-down-arrow"></span></a>
                                            <ul id="others" class="collapse dropdown-header-top">
                                                <li><a href="semuapesan.php">Semua Pesan</a></li>
                                                <li><a href="sampah.php">Sampah</a></li>
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
                                            <h2>Edit Data Produk</h2>
                                            <p>Silahkan Isi Form Edit Produk</p>
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
                                                $abc = $kon->kueri("SELECT * FROM produk WHERE produk_id = '$idproduk' ");
                                                $data = $kon->hasil_data($abc);
                                                ?>
                                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                    <div class="all-form-element-inner">
                                                        <form action="dataproduk_proses.php" method="POST" enctype="multipart/form-data">
                                                            <input type="hidden" name="aksi" id="aksi" value="edit" />
                                                            <input type="hidden" name="hid" id="hid" value="<?php echo $data['produk_id']; ?>" />
                                                            <div class="form-group-inner">
                                                                <div class="row">
                                                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                                        <div class="sparkline12-hd" style="margin-bottom: 25px;">
                                                                            <div class="main-sparkline12-hd">
                                                                                <h3>Isi Data Produk</h3>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                                        <div class="input-group mg-b-pro-edt ts-forms">
                                                                            <span class="input-group-addon"><i class="icon nalika-edit" aria-hidden="true"></i> Nama</span>
                                                                            <input type="text" id="nama" name="nama" class="form-control" placeholder="Nama Produk" value="<?php echo $data['produk_nama']; ?>">
                                                                        </div>
                                                                        <div class="input-group mg-b-pro-edt ts-forms">
                                                                            <span class="input-group-addon"><i class="icon nalika-favorites" aria-hidden="true"></i> Stok</span>
                                                                            <input type="text" id="stok" name="stok" class="form-control" placeholder="Stok" value="<?php echo $data['produk_stok']; ?>">
                                                                        </div>
                                                                        <div class="input-group mg-b-pro-edt ts-forms">
                                                                            <span class="input-group-addon"><i class="icon nalika-new-file" aria-hidden="true"></i> Status</span>
                                                                            <div class="form-select-list">
                                                                                <select class="form-control custom-select-value" id="status" name="status">
                                                                                    <option value="Ada" <?php if ($data['produk_status'] == 'Ada') echo "selected"; ?>>Ada</option>
                                                                                    <option value="Habis" <?php if ($data['produk_status'] == 'Habis') echo "selected"; ?>>Habis</option>
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                                        <div class="input-group mg-b-pro-edt ts-forms">
                                                                            <span class="input-group-addon"><i class="fa fa-usd" aria-hidden="true"></i> Harga</span>
                                                                            <input type="text" id="harga" name="harga" class="form-control" placeholder="Harga" value="<?php echo $data['produk_harga']; ?>">
                                                                        </div>
                                                                        <div class="input-group mg-b-pro-edt ts-forms" style="margin-bottom: 25px;">
                                                                            <span class="input-group-addon"><i class="icon nalika-favorites-button" aria-hidden="true"></i> Detail</span>
                                                                            <textarea class="form-control" id="detail" name="detail" placeholder="Detail Produk" style="height: 70px;"><?php echo $data['produk_detail']; ?></textarea>
                                                                        </div>
                                                                    </div>

                                                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin-bottom: 15px;">
                                                                        <div class="sparkline12-hd">
                                                                            <div class="main-sparkline12-hd">
                                                                                <h3>Upload Gambar Produk</h3>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                                        <div class="col-lg-4">
                                                                            <div class="pro-edt-img" style="border: 1px solid #cccccc; max-width: 100%; width: 220px; height: 200px; display: flex; align-items: center; justify-content: center;">
                                                                                <img src="<?php echo $data['produk_gambartumbnail']; ?>" alt="" style="width: 170px; height: 150px;" id="fototumbnail" />
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-lg-8">
                                                                            <div class="row">
                                                                                <div class="col-lg-12">
                                                                                    <div class="product-edt-pix-wrap">
                                                                                        <div class="mg-b-pro-edt file-upload-inner ts-forms">
                                                                                            <div class="input-group">
                                                                                                <span class="input-group-addon"> <input type="checkbox" name="cbcek" id="cbcek" value="GANTI1" onclick="javascript: if(this.checked==true){
                                                                                                    document.getElementById('fototumbnail').style.display='none';
                                                                                                    }else{
                                                                                                    document.getElementById('fototumbnail').style.display='block'; }" /></span>
                                                                                                <div class="input append-small-btn">
                                                                                                    <div class="file-button">
                                                                                                        Upload
                                                                                                        <input type="file" id="fototumbnail" name="fototumbnail" onchange="document.getElementById('tumbnail').value = this.value;">
                                                                                                    </div>
                                                                                                </div>
                                                                                                <input type="text" id="tumbnail" placeholder="Centang jika foto mau diganti ">
                                                                                            </div>

                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                                        <div class="col-lg-4">
                                                                            <div class="pro-edt-img" style="border: 1px solid #cccccc; max-width: 100%; width: 220px; height: 200px; display: flex; align-items: center; justify-content: center;">
                                                                                <img src="<?php echo $data['produk_gambar1']; ?>" alt="" style="width: 170px; height: 150px;" id="fotoproduk1" />
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-lg-8">
                                                                            <div class="row">
                                                                                <div class="col-lg-12">
                                                                                    <div class="product-edt-pix-wrap">
                                                                                        <div class="mg-b-pro-edt file-upload-inner ts-forms">
                                                                                            <div class="input-group">
                                                                                                <span class="input-group-addon"> <input type="checkbox" name="cbcek" id="cbcek" value="GANTI2" onclick="javascript: if(this.checked==true){
                                                                                                    document.getElementById('fotoproduk1').style.display='none';
                                                                                                    }else{
                                                                                                    document.getElementById('fotoproduk1').style.display='block'; }" /></span>
                                                                                                <div class="input append-small-btn">
                                                                                                    <div class="file-button">
                                                                                                        Upload
                                                                                                        <input type="file" id="fotoproduk1" name="fotoproduk1" onchange="document.getElementById('produk1').value = this.value;">
                                                                                                    </div>
                                                                                                </div>
                                                                                                <input type="text" id="produk1" placeholder="Centang jika foto mau diganti ">
                                                                                            </div>

                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                                        <div class="col-lg-4">
                                                                            <div class="pro-edt-img" style="border: 1px solid #cccccc; max-width: 100%; width: 220px; height: 200px; display: flex; align-items: center; justify-content: center;">
                                                                                <img src="<?php echo $data['produk_gambar2']; ?>" alt="" style="width: 170px; height: 150px;" id="fotoproduk2" />
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-lg-8">
                                                                            <div class="row">
                                                                                <div class="col-lg-12">
                                                                                    <div class="product-edt-pix-wrap">
                                                                                        <div class="mg-b-pro-edt file-upload-inner ts-forms">
                                                                                            <div class="input-group">
                                                                                                <span class="input-group-addon"> <input type="checkbox" name="cbcek" id="cbcek" value="GANTI3" onclick="javascript: if(this.checked==true){
                                                                                                    document.getElementById('fotoproduk2').style.display='none';
                                                                                                    }else{
                                                                                                    document.getElementById('fotoproduk2').style.display='block'; }" /></span>
                                                                                                <div class="input append-small-btn">
                                                                                                    <div class="file-button">
                                                                                                        Upload
                                                                                                        <input type="file" id="fotoproduk2" name="fotoproduk2" onchange="document.getElementById('produk2').value = this.value;">
                                                                                                    </div>
                                                                                                </div>
                                                                                                <input type="text" id="produk2" placeholder="Centang jika foto mau diganti ">
                                                                                            </div>

                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="form-group-inner">
                                                                <div class="login-btn-inner">
                                                                    <div class="row">
                                                                        <div class="col-lg-3"></div>
                                                                        <div class="col-lg-12">
                                                                            <div class="login-horizental cancel-wp pull-left">
                                                                                <button class="btn btn-block " style="color: black; border: 2px solid black; background-color: #fff; border-radius: 20px; margin-top: 50px; width: 150px;" type="submit">Simpan</button>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </form>
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
            </div>
        </div>
        <div class="footer-copyright-area">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="footer-copy-right">
                            <p>Copyright © 2018 Kerajinanku, All rights reserved.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- jquery
		============================================ -->
    <script src="js/vendor/jquery-1.12.4.min.js"></script>
    <!-- bootstrap JS
		============================================ -->
    <script src="js/bootstrap.min.js"></script>
    <!-- wow JS
		============================================ -->
    <script src="js/wow.min.js"></script>
    <!-- price-slider JS
		============================================ -->
    <script src="js/jquery-price-slider.js"></script>
    <!-- meanmenu JS
		============================================ -->
    <script src="js/jquery.meanmenu.js"></script>
    <!-- owl.carousel JS
		============================================ -->
    <script src="js/owl.carousel.min.js"></script>
    <!-- sticky JS
		============================================ -->
    <script src="js/jquery.sticky.js"></script>
    <!-- scrollUp JS
		============================================ -->
    <script src="js/jquery.scrollUp.min.js"></script>
    <!-- mCustomScrollbar JS
		============================================ -->
    <script src="js/scrollbar/jquery.mCustomScrollbar.concat.min.js"></script>
    <script src="js/scrollbar/mCustomScrollbar-active.js"></script>
    <!-- metisMenu JS
		============================================ -->
    <script src="js/metisMenu/metisMenu.min.js"></script>
    <script src="js/metisMenu/metisMenu-active.js"></script>
    <!-- morrisjs JS
		============================================ -->
    <script src="js/sparkline/jquery.sparkline.min.js"></script>
    <script src="js/sparkline/jquery.charts-sparkline.js"></script>
    <!-- calendar JS
		============================================ -->
    <script src="js/calendar/moment.min.js"></script>
    <script src="js/calendar/fullcalendar.min.js"></script>
    <script src="js/calendar/fullcalendar-active.js"></script>
    <!-- plugins JS
		============================================ -->
    <script src="js/plugins.js"></script>
    <!-- main JS
		============================================ -->
    <script src="js/main.js"></script>
</body>

</html>