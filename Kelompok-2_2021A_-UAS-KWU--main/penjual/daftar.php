<?php
@session_start();
require '../koneksi.php';
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
  <!-- forms CSS
		============================================ -->
  <link rel="stylesheet" href="css/form/all-type-forms.css">
  <!-- style CSS
		============================================ -->
  <link rel="stylesheet" href="style.css">
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

  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12"></div>
      <div class="col-md-4 col-md-4 col-sm-4 col-xs-12">
        <div class="hpanel" style="margin-top: 50px; margin-bottom: 50px;">
          <div class="panel-body">
            <div class="logo-pro">
              <center><img class="main-logo" src="img/logo/logo.png" alt="Logo Kerajinanku" style="width: 200px; "></center>
            </div>
            <form action="daftar_proses.php" method="POST" id="loginForm" enctype="multipart/form-data">
            <div class="form-group">
                <label class="control-label" for="namapemilik" style="margin-top: 15px;">Foto Toko</label>
                <input type="file" required="" name="fototoko" id="fototoko" class="form-control">
              </div>
              <div class="form-group">
                <label class="control-label" for="namapemilik" style="margin-top: 15px;">Nama Pemilik</label>
                <input type="text" required="" name="namapemilik" id="namapemilik" class="form-control">
              </div>
              <div class="form-group">
                <label class="control-label" for="user">Username</label>
                <input type="text" required="" name="username" id="username" class="form-control">
              </div>
              <div class="form-group">
                <label class="control-label" for="email" style="margin-top: 15px;">Email</label>
                <input type="email" required="" name="email" id="email" class="form-control">
              </div>
              <div class="form-group">
                <label class="control-label" for="alamat" style="margin-top: 15px;">Alamat</label>
                <textarea required="" name="alamat" id="alamat" class="form-control"></textarea>
              </div>
              <div class="form-group">
                <label class="control-label" for="password">Password</label>
                <input type="password" required="" name="password" id="password" class="form-control">
              </div>
              <button class="btn btn-block loginbtn" style="color: black; border: 2px solid black; background-color: #fff; border-radius: 20px;">Daftar</button>
              <p style="text-align: center; margin-top: 15px;">Sudah Punya Akun?<a href="login.php" style="color: rgb(117, 26, 202);"> Login disini</a></p>
            </form>

          </div>
        </div>
      </div>
      <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12"></div>
    </div>

  </div>
  <!-- <div class="footer-copyright-area" style="margin-top: auto ;">
      <div class="container-fluid">
          <div class="row">
              <div class="col-12">
                  <div class="footer-copy-right">
                      <p>Copyright © 2023 Kerajinanku,</a> All rights reserved.</p>
                  </div>
              </div>
          </div>
      </div>
  </div> -->

  <!-- jquery
		============================================ -->
  <script src="js/vendor/jquery-1.11.3.min.js"></script>
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
  <!-- tab JS
		============================================ -->
  <script src="js/tab.js"></script>
  <!-- icheck JS
		============================================ -->
  <script src="js/icheck/icheck.min.js"></script>
  <script src="js/icheck/icheck-active.js"></script>
  <!-- plugins JS
		============================================ -->
  <script src="js/plugins.js"></script>
  <!-- main JS
		============================================ -->
  <script src="js/main.js"></script>
</body>

</html>