<?php
@session_start();
require_once '../koneksi.php';
$kon = new Koneksi();

// $idproduk = @$_REQUEST['produk_id'];
$id = @$_SESSION['pembeli_id'];
$idpembeli = @$_SESSION['pembeli_id'];


if(empty($_SESSION["keranjang"]) OR !isset($_SESSION["keranjang"]))
{
  echo"<script>alert('Keranjang Kosong.. Silahkan belanja dulu')</script>";
  echo"<script>location='produk.php';</script>";
}
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
              <h2>Keranjang Saya</h2>
              <hr style="width: 10cm; border: 2px solid #E8AEB1;">
            </div>
          </div>
        </div>
      </div>
    </div>
    <!--================Cart Area =================-->
    <section class="cart_area section_padding">
      <div class="container">
        <div class="cart_inner">
          <div class="table-responsive">
            <table class="table">
              <thead>
                <tr>
                  <th scope="col">
                    <h6>No.</h6>
                  </th>
                  <th scope="col">
                    <h6>Gambar Produk</h6>
                  </th>
                  <th scope="col">
                    <h6>Nama Produk</h6>
                  </th>
                  <th scope="col">
                    <h6>Toko</h6>
                  </th>
                  <th scope="col">
                    <h6>Harga</h6>
                  </th>
                  <th scope="col">
                    <h6>Jumlah</h6>
                  </th>
                  <th scope="col">
                    <h6>Total</h6>
                  </th>
                  <th scope="col">
                    <h6>Tindakan</h6>
                  </th>
                </tr>
              </thead>
              <tbody>
                <?php $nomor = 1; ?>
                <?php
                foreach ($_SESSION["keranjang"] as $idproduk => $jumlah) :
                ?>
                  <?php $yo = $kon->kueri("SELECT a.produk_nama, a.produk_gambartumbnail, a.produk_harga, b.toko_nama FROM produk a JOIN toko b ON a.toko_id = b.toko_id WHERE a.produk_id = '$idproduk'");
                  $pecah = $yo->fetch(PDO::FETCH_ASSOC);
                  $subharga = $pecah["produk_harga"] * $jumlah;
                  ?>
                  <tr>
                    <td><?= $nomor;?></td>
                    <td><img src="../penjual/<?= $pecah['produk_gambartumbnail']; ?>" style='width: 170px; height: 150px;'></td>
                    <td>
                      <h4 class="name"><?= htmlentities($pecah['produk_nama']); ?>
                    </td>
                    <td>
                      <h4 class="name"><?= htmlentities($pecah['toko_nama']); ?>
                    </td>
                    <td>
                      <h4 class="price"><i class="fas fa-indian-rupee-sign"></i>Rp. <?= number_format($pecah['produk_harga'], 0, ',', '.'); ?></h4>
                    </td>
                    <td><h4><?php echo $jumlah; ?></h4></td>
                    <td>
                      <h4 class="sub-total"><span><i class="fas fa-indian-rupee-sign"></i> Rp. <?= number_format($subharga, 0, ',', '.'); ?></span></h4>
                    </td>
                    <td>
                    <a href='hapus_keranjang.php?produk_id=<?php echo $idproduk ?>'><button class='btn-danger'><i class='fa fa-solid fa-trash'></i></button></a>
                    </td>
                  </tr>
              </tbody>
              <?php $nomor++; ?>
            <?php endforeach ?>
            </table>


            <div class="checkout_btn_inner" style="text-align: center; margin-bottom: 100px;">
            <a href="produk.php"><button type="button" class="btn_1 checkout_btn_1">Lanjut Belanja</button></a>
              <a href="checkout.php"><button type="button" class="btn_1 checkout_btn_1" style="margin-left: 100px;">Checkout</button></a>
            </div>
          </div>
        </div>
    </section>
    <!--================End Cart Area =================-->
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