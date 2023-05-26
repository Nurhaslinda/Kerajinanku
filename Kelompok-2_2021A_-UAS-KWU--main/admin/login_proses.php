<?php 
session_start();
include '../koneksi.php';
$kon = new Koneksi();

$username = @$_POST['username'];
$password = @$_POST['password'];
$abc = $kon->kueri("SELECT admin_id, admin_nama, admin_email, admin_username, admin_pass FROM admin WHERE (admin_username = '$username' OR admin_email = '$username') AND admin_pass = MD5('$password')");
$jumlah = $kon->jumlah_data($abc);

if ($jumlah == 0) {
	include 'login.php';
	echo "<script>alert('Login Gagal')</script>";
}else{
	$hasil = $kon->hasil_data($abc);
	$_SESSION['admin_id'] = $hasil['admin_id'];
	$_SESSION['username'] = $hasil['admin_email'];
	$_SESSION['username'] = $hasil['admin_username'];
	$_SESSION['nama'] = $hasil['admin_nama'];
	echo "<script>alert('Login Berhasil');</script>";
	include 'index.php';
}
