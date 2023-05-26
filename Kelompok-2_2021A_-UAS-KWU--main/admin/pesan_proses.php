<?php
session_start();
include "../koneksi.php";
$kon = new Koneksi();

$aksi = @$_REQUEST['aksi'];

switch ($aksi) {
	
case 'hapus':
	$id = @$_REQUEST['tid'];

	$abc = $kon->kueri("DELETE FROM kontak WHERE kontak_id = '$id' ");
	if ($abc == TRUE) {
		echo "<script>alert('Hapus Data Sukses');</script>";
	} else {
		echo "<script>alert('Hapus Data Gagal');</script>";
	}
	break;

}
?>
<meta http-equiv="refresh" content="0;URL=semuapesan.php" />