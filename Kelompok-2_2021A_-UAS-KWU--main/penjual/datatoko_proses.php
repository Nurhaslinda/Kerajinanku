<?php
include "../koneksi.php";
$kon = new koneksi();
$aksi = @$_REQUEST['aksi'];

switch ($aksi) {
    case 'edit':
        $idx = @$_POST['hid'];
        $idtoko = addslashes(@$_POST['id']);
        $namapemilik = addslashes(@$_POST['nama']);
        $user = addslashes(@$_POST['user']);
        $email = addslashes(@$_POST['email']);
        $alamatpemilik = addslashes(@$_POST['alamatpemilik']);

        $abc = $kon->kueri("UPDATE toko SET toko_pemilik = '$namapemilik', toko_username = '$user', toko_email = '$email', toko_pemilik_alamat = '$alamatpemilik' WHERE toko_id = '$idx' ");
        if ($abc == TRUE) {
            echo "<script>alert('Edit data sukses.');</script>";
        } else {
            echo "<script>alert('Edit data gagal.');</script>";
        }
        break;


}
?>
<meta http-equiv="refresh" content="0;URL=datatoko.php" />