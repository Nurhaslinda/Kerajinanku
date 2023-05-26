<?php
session_start();
include "../koneksi.php";
$kon = new Koneksi();

$aksi = @$_REQUEST['aksi'];

switch ($aksi) {
	case 'tambah':
	$idtoko = addslashes(@$_POST['idtoko']);
	$toko =  addslashes(@$_POST['toko']);
	$user =  addslashes(@$_POST['user']);
	$email =  addslashes(@$_POST['email']);
	$alamat =  addslashes(@$_POST['alamat']);
	$nama =  addslashes(@$_POST['nama']);
	$telp = addslashes(@$_POST['telp']);

$toko_awal = @$_FILES['fototoko']['tmp_name'];
$toko_tujuan = uniqid().@$_FILES['fototoko']['name'];

#-- Simpan gambar pada folder 'foto', jika belum ada maka buat saja
if(!file_exists('../penjual/foto')){
    mkdir('../penjual/foto');
}
move_uploaded_file($toko_awal, '../penjual/foto/' . $toko_tujuan);

#-- Tambah data pada tabel
$abc = $kon->kueri("INSERT INTO toko(toko_id, toko_pemilik, toko_username, toko_nama, toko_hp, toko_email, toko_alamat, toko_foto) VALUES ('$idtoko' , '$nama', '$user', '$toko', '$telp', '$email', '$alamat', '../penjual/foto/$toko_tujuan')") ;

if ($abc == true) {
	echo "<script>alert('Tambah Data Sukses');</script>";
}else{
	echo "<script>alert('Tambah Data Gagal');</script>";
}
break;

case 'hapus':
	$id = @$_REQUEST['tid'];

	$yo = $kon->kueri("SELECT toko_foto FROM toko WHERE toko_id = '$id' ");
	$data = $kon->hasil_data($yo);
	if (file_exists($data['../penjual/foto'])) {
		unlink($data['../penjual/foto']);
	}
	$abc = $kon->kueri("DELETE FROM toko WHERE toko_id = '$id' ");
	if ($abc == TRUE) {
		echo "<script>alert('Hapus Data Sukses');</script>";
	} else {
		echo "<script>alert('Hapus Data Gagal');</script>";
	}
	break;

case 'edit':
	$idx = @$_POST['hid'];
	$id = addslashes(@$_POST['id']);
	$toko =  addslashes(@$_POST['toko']);
	$user =  addslashes(@$_POST['user']);
	$email =  addslashes(@$_POST['email']);
	$alamat =  addslashes(@$_POST['alamat']);
	$nama =  addslashes(@$_POST['nama']);
	$telp = addslashes(@$_POST['telp']);

	$cekfoto = @$_POST['cbcek'];

	if ($cekfoto == 'GANTI') {
		$toko_temp = @$_FILES['fototoko']['tmp_name'];
		$toko_tujuan = uniqid() . @$_FILES['fototoko']['name'];

		if (move_uploaded_file($toko_temp, "../penjual/foto/" . $toko_tujuan) == TRUE) {

			$yo = $kon->kueri("SELECT toko_foto FROM toko WHERE toko_id = '$idx' ");
			$data = $kon->hasil_data($yo);
			if (file_exists($data['foto'])) {
				unlink($data['foto']);
			}
		}

		$abc = $kon->kueri("UPDATE toko SET toko_foto = '../penjual/foto/$toko_tujuan' WHERE toko_id = '$idx' ");
	}

	// panggil kueri
	$abc = $kon->kueri("UPDATE toko SET toko_nama = '$toko', toko_username = '$user', toko_email = '$email', toko_alamat = '$alamat', toko_pemilik = '$nama', toko_hp = '$telp' WHERE toko_id = '$idx' ");
	if ($abc == TRUE) {
		echo "<script>alert('Edit data sukses.');</script>";
	} else {
		echo "<script>alert('Edit data gagal.');</script>";
	}
	break;
}
?>
<meta http-equiv="refresh" content="0;URL=datatoko.php" />