<?php 
session_start();
include '../koneksi.php';
$kon = new Koneksi();

$username = @$_POST['username'];
$password = @$_POST['password'];
$abc = $kon->kueri("SELECT  toko_id, toko_pemilik, toko_email, toko_username, toko_pass FROM toko WHERE ( toko_username = '$username' OR  toko_email = '$username') AND  toko_pass = MD5('$password')");
$jumlah = $kon->jumlah_data($abc);

if ($jumlah == 0) {
	include 'login.php';
	echo "<script>alert('Login Gagal')</script>";
}else{
	$hasil = $kon->hasil_data($abc);
	$_SESSION['toko_id'] = $hasil['toko_id'];
	$_SESSION['username'] = $hasil['toko_email'];
	$_SESSION['username'] = $hasil['toko_username'];
	$_SESSION['nama'] = $hasil['toko_pemilik'];
	echo "<script>alert('Login Berhasil');</script>";
	include 'index.php';
}
