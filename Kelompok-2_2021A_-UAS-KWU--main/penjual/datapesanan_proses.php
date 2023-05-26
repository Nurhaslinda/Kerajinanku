<?php
session_start();
include "../koneksi.php";
$kon = new Koneksi();

$aksi = @$_REQUEST['aksi'];

switch ($aksi) {
	// case 'hapus':
	// 	$id = @$_REQUEST['tid'];

	// 	$abc = $kon->kueri("DELETE FROM transaksi WHERE transaksi_id = '$id' ");
	// 	$abc = $kon->kueri("DELETE FROM transaksi_detail WHERE transaksi_id = '$id' ");
	// 	if ($abc == TRUE) {
	// 		echo "<script>alert('Hapus Data Sukses');</script>";
	// 	} else {
	// 		echo "<script>alert('Hapus Data Gagal');</script>";
	// 	}
	// 	break;

	case 'edit':
		$idx = @$_POST['hid'];
		$id = addslashes(@$_POST['idtransdet']);
		$statuspembayaran =  addslashes(@$_POST['statuspembayaran']);
		$statuspesanan =  addslashes(@$_POST['statuspesanan']);

		// panggil kueri
		$abc = $kon->kueri("UPDATE transaksi_detail SET status_pembayaran = '$statuspembayaran', status_pesanan = '$statuspesanan' WHERE transaksi_detail_id = '$idx' ");
		if ($abc == TRUE) {
			echo "<script>alert('Edit data sukses.');</script>";
		} else {
			echo "<script>alert('Edit data gagal.');</script>";
		}
		break;
		die;
}
?>
<meta http-equiv="refresh" content="0;URL=datapesanan.php" />