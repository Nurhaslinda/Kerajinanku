<?php
session_start();
include '../koneksi.php';
$kon = new Koneksi();

$username = @$_POST['username'];
$password = @$_POST['password'];
$abc = $kon->kueri("SELECT pembeli_id, pembeli_nama, pembeli_email, pembeli_username, pembeli_pass FROM pembeli WHERE (pembeli_username = '$username' OR pembeli_email = '$username') AND pembeli_pass = MD5('$password')");
$jumlah = $kon->jumlah_data($abc);

if ($jumlah == 0) {
	include 'login.php';
	echo "<script>alert('Login Gagal')</script>";
} else {
	$hasil = $kon->hasil_data($abc);
	$_SESSION['pembeli_id'] = $hasil['pembeli_id'];
	$_SESSION['username'] = $hasil['pembeli_email'];
	$_SESSION['username'] = $hasil['pembeli_username'];
	$_SESSION['nama'] = $hasil['pembeli_nama'];
	echo "<script>alert('Login Berhasil');</script>";
	include 'index.php';
}
