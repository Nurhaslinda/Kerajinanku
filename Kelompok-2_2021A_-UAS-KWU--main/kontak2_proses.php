<?php
session_start();
include "koneksi.php";
$kon = new Koneksi();

$id = @$_POST['id'];
$nama = @$_POST['nama'];
$email = @$_POST['email'];
$subjek = @$_POST['subjek'];
$kontakpesan = @$_POST['kontakpesan'];

$abc = $kon->kueri("INSERT INTO kontak(kontak_id, kontak_nama, kontak_email, kontak_subjek, kontak_pesan, kontak_tanggal, admin_id) VALUES ('$id', '$nama', '$email', '$subjek', '$kontakpesan', NOW(), 1)");

if ($abc == true) {
    include 'index.php';
    echo "<script>alert('Kirim Pesan Berhasil');</script>";
} else {
    echo "<script>alert('Kirim Pesan Gagal');</script>";
    include 'index.php';
}


?>
<meta http-equiv="refresh" content="0;/>