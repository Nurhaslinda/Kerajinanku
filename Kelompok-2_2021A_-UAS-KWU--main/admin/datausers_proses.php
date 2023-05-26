<?php
session_start();
include "../koneksi.php";
$kon = new Koneksi();

$aksi = @$_REQUEST['aksi'];

switch ($aksi) {
	case 'tambah':
	$idpembeli = addslashes(@$_POST['idpembeli']);
	$nama =  addslashes(@$_POST['nama']);
	$user =  addslashes(@$_POST['user']);
	$email =  addslashes(@$_POST['email']);
	$alamat =  addslashes(@$_POST['alamat']);
	$gender =  addslashes(@$_POST['gender']);

$pembeli_awal = @$_FILES['fotopembeli']['tmp_name'];
$pembeli_tujuan = uniqid().@$_FILES['fotopembeli']['name'];

#-- Simpan gambar pada folder 'foto', jika belum ada maka buat saja
if(!file_exists('../pembeli/foto')){
    mkdir('../pembeli/foto');
}
move_uploaded_file($pembeli_awal, '../pembeli/foto/' . $pembeli_tujuan);

#-- Tambah data pada tabel
$abc = $kon->kueri("INSERT INTO pembeli(pembeli_id, pembeli_nama, pembeli_username, pembeli_email, pembeli_alamat, pembeli_gender, pembeli_foto) VALUES ('$idpembeli' , '$nama', '$user', '$email', '$alamat', '$gender', '../pembeli/foto/$pembeli_tujuan')") ;

if ($abc == true) {
	echo "<script>alert('Tambah Data Sukses');</script>";
}else{
	echo "<script>alert('Tambah Data Gagal');</script>";
}
break;

case 'hapus':
	$id = @$_REQUEST['tid'];

	$yo = $kon->kueri("SELECT pembeli_foto FROM pembeli WHERE pembeli_id = '$id' ");
	$data = $kon->hasil_data($yo);
	if (file_exists($data['../pembeli/foto'])) {
		unlink($data['../pembeli/foto']);
	}
	$abc = $kon->kueri("DELETE FROM pembeli WHERE pembeli_id = '$id' ");
	if ($abc == TRUE) {
		echo "<script>alert('Hapus Data Sukses');</script>";
	} else {
		echo "<script>alert('Hapus Data Gagal');</script>";
	}
	break;

case 'edit':
	$idx = @$_POST['hid'];
	$id = addslashes(@$_POST['id']);
	$nama =  addslashes(@$_POST['nama']);
	$user =  addslashes(@$_POST['user']);
	$email =  addslashes(@$_POST['email']);
	$alamat =  addslashes(@$_POST['alamat']);
	$gender =  addslashes(@$_POST['gender']);

	$cekfoto = @$_POST['cbcek'];

	if ($cekfoto == 'GANTI') {
		$pembeli_temp = @$_FILES['fotopembeli']['tmp_name'];
		$pembeli_tujuan = uniqid() . @$_FILES['fotopembeli']['name'];

		if (move_uploaded_file($pembeli_temp, "../pembeli/foto/" . $pembeli_tujuan) == TRUE) {

			$yo = $kon->kueri("SELECT pembeli_foto FROM pembeli WHERE pembeli_id = '$idx' ");
			$data = $kon->hasil_data($yo);
			if (file_exists($data['foto'])) {
				unlink($data['foto']);
			}
		}

		$abc = $kon->kueri("UPDATE pembeli SET pembeli_foto = '../pembeli/foto/$pembeli_tujuan' WHERE pembeli_id = '$idx' ");
	}

	// panggil kueri
	$abc = $kon->kueri("UPDATE pembeli SET pembeli_nama = '$nama', pembeli_username = '$user', pembeli_email = '$email', pembeli_alamat = '$alamat', pembeli_gender = '$gender' WHERE pembeli_id = '$idx' ");
	if ($abc == TRUE) {
		echo "<script>alert('Edit data sukses.');</script>";
	} else {
		echo "<script>alert('Edit data gagal.');</script>";
	}
	break;
}
?>
<meta http-equiv="refresh" content="0;URL=datausers.php" />