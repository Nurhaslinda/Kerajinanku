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
		$gender =  addslashes(@$_POST['gender']);
		$alamat =  addslashes(@$_POST['alamat']);
		$nohp =  addslashes(@$_POST['nohp']);

		$cekfoto = @$_POST['cbcek'];

		if ($cekfoto == 'GANTI') {
			$foto_temp = @$_FILES['fotoprofil']['tmp_name'];
			$foto_tujuan = uniqid() . @$_FILES['fotoprofil']['name'];

			if (move_uploaded_file($foto_temp, "foto/" . $foto_tujuan) == TRUE) {

				$yo = $kon->kueri("SELECT pembeli_foto FROM pembeli WHERE pembeli_id = '$idx' ");
				$data = $kon->hasil_data($yo);
				if (file_exists($data['foto'])) {
					unlink($data['foto']);
				}
			}

			$abc = $kon->kueri("UPDATE pembeli SET pembeli_foto = 'foto/$foto_tujuan' WHERE pembeli_id = '$idx' ");
		}


		// panggil kueri
		$abc = $kon->kueri("UPDATE pembeli SET pembeli_nama = '$nama', pembeli_username = '$user', pembeli_email = '$email', pembeli_gender = '$gender', pembeli_alamat = '$alamat', pembeli_hp = '$nohp' WHERE pembeli_id = '$idx' ");
		if ($abc == TRUE) {
			echo "<script>alert('Edit data sukses.');</script>";
		} else {
			echo "<script>alert('Edit data gagal.');</script>";
		}
		break;
}
?>
<meta http-equiv="refresh" content="0;URL=profil.php" />