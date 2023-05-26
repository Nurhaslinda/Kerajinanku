<?php
@session_start();
require_once '../koneksi.php';
$kon = new Koneksi();
// $idtoko = @$_REQUEST['toko_id'];
// $idproduk = @$_REQUEST['produk_id'];
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
  <main style="background-color: #F0F0F0;">
    <!-- Hero Area Start-->
    <div class="popular-items section-padding">
      <div class="container">
        <!-- Section tittle -->
        <div class="row justify-content-center">
          <div class="col-xl-7 col-lg-8 col-md-10">
            <div class="section-tittle text-center">
              <h2>Checkout</h2>
              <hr style="width: 6cm; border: 2px solid #E8AEB1;">
            </div>
          </div>
        </div>
        <div class="tab-content" id="nav-tabContent" style="margin: -20px;">
          <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
            <div class="whole-wrap">
              <div class="container ml-20">
                <form method="POST">
                  <?php ?>
                  <div class="col-md-12">
                    <div class="section-top-border">
                      <div class="row mb-30">
                        <div class="col-md-12">
                          <h6 class="mb-30" style="font-weight: 800;">Metode Pengiriman</h6>
                        </div>
                        <div class="col-md-4">
                          <div class="d-flex">
                            <?php
                            $ongkir = $kon->kueri("SELECT * FROM ongkir");
                            while ($ambil = $ongkir->fetch(PDO::FETCH_ASSOC)) {
                            ?>
                              <div class="col-md-2">
                                <input type="radio" name="ongkir_id" value="<?= $ambil["ongkir_id"] ?>" required="required">
                              </div>
                              <div class="col-md-6">
                                <h6 class="ml-10"><?= $ambil['metode_pengiriman'] ?></h6>
                                <h6 class="ml-10">- Rp. <?= number_format($ambil['ongkir_harga'], 0, ',', '.') ?></h6>
                              </div>
                            <?php } ?>
                          </div>
                        </div>
                      </div>

                      <div class="row mb-30">
                        <div class="col-md-12">
                          <h6 class="mb-30" style="font-weight: 800;">Metode Pembayaran</h6>
                        </div>
                        <?php
                        $metodepembayaran = $kon->kueri("SELECT * FROM pembayaran");
                        while ($ambil = $metodepembayaran->fetch(PDO::FETCH_ASSOC)) {
                        ?>
                          <div class="col-md-4">
                            <div class="d-flex">
                              <div class="col-md-2">
                                <input type="radio" name="pembayaran_id" value="<?= $ambil["pembayaran_id"] ?>" required="required">
                              </div>
                              <div class="col-md-8">
                                <h6 class="ml-10"><?= $ambil['metode_pembayaran'] ?></h6>
                              </div>
                            </div>
                          </div>
                        <?php } ?>
                      </div>

                      <div class="row">
                        <?php $yo = $kon->kueri("SELECT * FROM pembeli WHERE pembeli_id = '$idpembeli'");
                        while ($hasil = $kon->hasil_data($yo)) { ?>
                          <div class="col-md-12">
                            <h6 class="mb-30" style="font-weight: 800;">Alamat Pengiriman</h6>
                          </div>
                          <div class="col-md-12">
                            <h6>
                              <?php echo $_SESSION['nama']; ?> | <?php echo $hasil['pembeli_hp'] ?></h6>
                          </div>
                          <div class="col-md-12 mb-30">
                            <h6><?php echo $hasil['pembeli_alamat'] ?></h6>
                          </div>
                        <?php } ?>
                      </div>

                      <div class="row mb-2" style="background-color: #FFF;">
                        <?php $total = 0;?>
                        <?php
                        foreach ($_SESSION["keranjang"] as $idproduk => $jumlah) :
                        ?>
                          <?php $yo = $kon->kueri("SELECT a.produk_nama, a.produk_gambartumbnail, a.produk_harga, 
                        b.toko_nama FROM produk a JOIN toko b ON a.toko_id = b.toko_id
                        WHERE produk_id = '$idproduk'");
                          $pecah = $yo->fetch(PDO::FETCH_ASSOC);
                          $subharga = $pecah["produk_harga"] * $jumlah;
                          ?>
                          <div class="col-md-2">
                            <img src="../penjual/<?php echo $pecah['produk_gambartumbnail']; ?>" alt="" class="img-fluid" style='width: 170px; height: 150px;'>
                          </div>
                          <div class="col-md-4">
                            <h6 class="mt-3 text-center" style="font-weight: 600;"><?php echo $pecah['produk_nama'] ?></h6>
                            <h6 class="mt-3 text-center" style="font-weight: 800; color: #E8AEB1;">Rp. <?= number_format($subharga, 0, ',', '.'); ?></h6>
                            <h6 class="mt-3 text-center" style="color: darkgray;">Jumlah : <?php echo $jumlah; ?></h6>
                          </div>
                        <?php $total+=$subharga ?>
                        <?php endforeach ?>
                      </div>
                    </div>
                    <div class="section-top-border text-right">
                      <h6 class="mb-20" style="font-weight: 800;">Sub-Total Produk : Rp. <?= number_format($subharga, 0, ',', '.'); ?></h6>
                      <h6 class="mb-20" style="font-weight: 800;">Total Produk : Rp. <?= number_format($total, 0, ',', '.'); ?></h6>
                      <button class="btn_1 mb-50" name="checkout">Checkout</button>
                    </div>
                  </div>
                </form>
                <?php
                if (isset($_POST["checkout"])) {
                  $idtrans = "TR" . date("YmdHis");
                  $idpembayaran = $_POST["pembayaran_id"];
                  $idongkir = $_POST["ongkir_id"];
                  $statusproduk = 'Sedang Diproses';
                  $statuspembayaran = 'Belum dikonfirmasi';

                  $a = $kon->kueri("SELECT * FROM ongkir WHERE ongkir_id ='$idongkir'");
                  $arrayongkir = $a->fetch(PDO::FETCH_ASSOC);
                  $tarif = $arrayongkir['ongkir_harga'];

                  $totalpembayaran = $total += $tarif;

                  $abc = $kon->kueri("INSERT INTO transaksi VALUES ('$idtrans', NOW(),'" . ($_SESSION['pembeli_id']) . "')");

                  foreach ($_SESSION["keranjang"] as $idproduk => $jumlah) {
                    $idtransdet = $idtrans.strtoupper(uniqid());
                    $xyz= $kon->kueri("INSERT INTO transaksi_detail
                    VALUES('$idtransdet','$jumlah', '$totalpembayaran','$tarif','$statusproduk','$statuspembayaran','$idtrans','$idproduk', '$idongkir', '$idpembayaran') ");
                  }

                  unset($_SESSION["keranjang"]);

                  echo"<script>alert('Pembelian Sukses');</script>";
                  echo"<script>location='order.php?pembeli_id=$idpembeli&transaksi_id=$idtrans';</script>";

                }
                ?>
              </div>
            </div>
          </div>

        </div>
      </div>
    </div>

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