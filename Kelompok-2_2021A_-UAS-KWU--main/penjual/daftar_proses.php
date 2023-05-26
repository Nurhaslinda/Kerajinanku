<?php
session_start();
include "../koneksi.php";
$kon = new Koneksi();

$id = @$_POST['id'];
$nama = @$_POST['namapemilik'];
$username = @$_POST['username'];
$email = @$_POST['email'];
$alamat = @$_POST['alamat'];
$password = @$_POST['password'];

#-- Upload Foto profil

$foto_awal = @$_FILES['fototoko']['tmp_name'];
$foto_tujuan = uniqid() . @$_FILES['fototoko']['name'];

#-- Simpan gambar pada folder 'foto', jika belum ada maka buat saja :D
if (!file_exists('foto')) {
    mkdir('foto');
}
move_uploaded_file($foto_awal, 'foto/'.$foto_tujuan);

$abc = $kon->kueri("INSERT INTO  toko(toko_id, toko_pemilik, toko_email, toko_username, toko_pemilik_alamat, toko_foto, toko_pass) VALUES 
('$id', '$nama', '$email', '$username', '$alamat', 'foto/$foto_tujuan' , MD5('$password'))");

if ($abc == true) {
    include 'login.php';
    echo "<script>alert('Daftar Berhasil');</script>";
} else {
    echo "<script>alert('Daftar Gagal');</script>";
    include 'daftar.php';
}


?>
<meta http-equiv="refresh" content="1;/>