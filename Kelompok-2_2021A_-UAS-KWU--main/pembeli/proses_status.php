<?php
include '../koneksi.php';
$kon = new koneksi();
// proses

$aksi = @$_REQUEST['aksi'];
$idproduk = @$_REQUEST['produk_id'];
$idtoko = @$_REQUEST['toko_id'];
$idtransaksi = @$_REQUEST['transaksi_id'];

switch ($aksi) {
  case 'batal':
    $kon->kueri("UPDATE transaksi_detail SET status_pesanan = 'Dibatalkan' WHERE transaksi_id = '$idtransaksi'");
    break;

    case 'batal':
      $kon->kueri("UPDATE transaksi_detail SET status_pesanan = 'Dibatalkan' WHERE transaksi_id = '$idtransaksi'");
      break;
  
}
?>
<meta http-equiv="refresh" content="0;URL=order.php" />