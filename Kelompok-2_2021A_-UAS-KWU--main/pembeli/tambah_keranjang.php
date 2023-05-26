<?php
session_start();
$idproduk = $_GET['produk_id'];

if(isset($_SESSION['keranjang'][$idproduk]))
{
    $_SESSION['keranjang'][$idproduk]+=1;
}else{
    $_SESSION['keranjang'][$idproduk] = 1;
}

// echo "<pre";
// print_r($_SESSION);
// echo"</pre>";

echo "<script>alert('Produk Telah Masuk Ke Keranjang Belanja');</script>";
echo "<script>location='keranjang.php';</script>";
?>