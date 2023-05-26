<?php
session_start();
include "../koneksi.php";
$kon = new Koneksi();

$id = @$_POST['id'];
$nama = @$_POST['nama'];
$username = @$_POST['username'];
$email = @$_POST['email'];
$nohp = @$_POST['nohp'];
$alamat = @$_POST['alamat'];
$password = @$_POST['password'];

#-- Upload Foto profil

$foto_awal = @$_FILES['fotoprofil']['tmp_name'];
$foto_tujuan = uniqid() . @$_FILES['fotoprofil']['name'];

#-- Simpan gambar pada folder 'foto', jika belum ada maka buat saja :D
if (!file_exists('foto')) {
    mkdir('foto');
}
move_uploaded_file($foto_awal, 'foto/'.$foto_tujuan);

$abc = $kon->kueri("INSERT INTO pembeli(pembeli_id, pembeli_nama, pembeli_email, pembeli_username, pembeli_alamat,pembeli_hp, pembeli_pass, pembeli_foto) VALUES ('$id', '$nama', '$email', '$username', '$alamat','$nohp', MD5('$password'), 'foto/$foto_tujuan')");

if ($abc == true) {
    include 'login.php';
    echo "<script>alert('Daftar Berhasil');</script>";
} else {
    echo "<script>alert('Daftar Gagal');</script>";
    include 'daftar.php';
}


?>
<meta http-equiv="refresh" content="1;/>