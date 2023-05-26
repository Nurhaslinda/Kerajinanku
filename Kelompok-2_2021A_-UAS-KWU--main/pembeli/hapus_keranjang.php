<?php
session_start();
$idproduk = $_GET["produk_id"];
unset($_SESSION["keranjang"][$idproduk]);

echo"<script>alert('Produk di Hapus');</script>";
echo"<script>location='keranjang.php';</script>";
?>