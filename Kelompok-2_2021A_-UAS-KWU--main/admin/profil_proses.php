<?php
session_start();
include "../koneksi.php";
$kon = new Koneksi();

$aksi = @$_REQUEST['aksi'];

switch ($aksi) {

case 'edit':
	$idx = @$_POST['hid'];
	$id = addslashes(@$_POST['id']);
	$nama =  addslashes(@$_POST['nama']);
	$user =  addslashes(@$_POST['user']);
	$email =  addslashes(@$_POST['email']);
	$nohp =  addslashes(@$_POST['nohp']);

	$cekfoto = @$_POST['cbcek'];

	if ($cekfoto == 'GANTI') {
		$admin_temp = @$_FILES['foto']['tmp_name'];
		$admin_tujuan = uniqid() . @$_FILES['foto']['name'];

		if (move_uploaded_file($admin_temp, "img/logo/".$admin_tujuan) == TRUE) {

			$yo = $kon->kueri("SELECT admin_foto FROM admin WHERE admin_id = '$idx' ");
			$data = $kon->hasil_data($yo);
			if (file_exists($data['img/logo'])) {
				unlink($data['img/logo']);
			}
		}

		$abc = $kon->kueri("UPDATE admin SET admin_foto = 'img/logo/$admin_tujuan' WHERE admin_id = '$idx' ");
	}

	// panggil kueri
	$abc = $kon->kueri("UPDATE admin SET admin_nama = '$nama', admin_username = '$user', admin_email = '$email', admin_hp = '$nohp' WHERE admin_id = '$idx' ");
	if ($abc == TRUE) {
		echo "<script>alert('Edit data sukses.');</script>";
	} else {
		echo "<script>alert('Edit data gagal.');</script>";
	}
	break;
}
?>
<meta http-equiv="refresh" content="0;URL=profil.php" />