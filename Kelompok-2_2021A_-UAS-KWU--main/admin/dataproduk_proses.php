<?php
session_start();
include "../koneksi.php";
$kon = new Koneksi();

$aksi = @$_REQUEST['aksi'];

switch ($aksi) {
	case 'tambah':
	$idproduk = addslashes(@$_POST['idproduk']);
	$idtoko = addslashes(@$_SESSION['toko_id']);
	$nama =  addslashes(@$_POST['nama']);
	$stok =  addslashes(@$_POST['stok']);
	$harga =  addslashes(@$_POST['harga']);
	$detail =  addslashes(@$_POST['detail']);
	$status =  addslashes(@$_POST['status']);

#-- Upload Foto produk

$tumbnail_awal = @$_FILES['fototumbnail']['tmp_name'];
$tumbnail_tujuan = uniqid().@$_FILES['fototumbnail']['name'];

#-- Simpan gambar pada folder 'foto', jika belum ada maka buat saja
if(!file_exists('foto')){
    mkdir('foto');
}
move_uploaded_file($tumbnail_awal, 'foto/' . $tumbnail_tujuan);

$produk1_awal = @$_FILES['fotoproduk1']['tmp_name'];
$produk1_tujuan = uniqid().@$_FILES['fotoproduk1']['name'];

#-- Simpan gambar pada folder 'foto', jika belum ada maka buat saja
if(!file_exists('foto')){
    mkdir('foto');
}
move_uploaded_file($produk1_awal, 'foto/' . $produk1_tujuan);

$produk2_awal = @$_FILES['fotoproduk2']['tmp_name'];
$produk2_tujuan = uniqid().@$_FILES['fotoproduk2']['name'];

#-- Simpan gambar pada folder 'foto', jika belum ada maka buat saja
if(!file_exists('foto')){
    mkdir('foto');
}
move_uploaded_file($produk2_awal, 'foto/' . $produk2_tujuan);

#-- Tambah data pada tabel
$abc = $kon->kueri("INSERT INTO produk(produk_id, produk_nama, produk_stok, produk_harga, produk_detail, produk_status, produk_gambartumbnail, produk_gambar1, produk_gambar2, toko_id) VALUES ('$idproduk' , '$nama', '$stok', '$harga', '$detail', '$status', 'foto/$tumbnail_tujuan', 'foto/$produk1_tujuan', 'foto/$produk2_tujuan', '$idtoko')") ;

if ($abc == true) {
	echo "<script>alert('Tambah Data Sukses');</script>";
}else{
	echo "<script>alert('Tambah Data Gagal');</script>";
}
break;

case 'hapus':
	$id = @$_REQUEST['tid'];

	$yo = $kon->kueri("SELECT produk_gambartumbnail, produk_gambar1, produk_gambar2 FROM produk WHERE produk_id = '$id' ");
	$data = $kon->hasil_data($yo);
	if (file_exists($data['foto'])) {
		unlink($data['foto']);
	}
	$abc = $kon->kueri("DELETE FROM produk WHERE produk_id = '$id' ");
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
	$stok =  addslashes(@$_POST['stok']);
	$harga =  addslashes(@$_POST['harga']);
	$detail =  addslashes(@$_POST['detail']);
	$status =  addslashes(@$_POST['status']);

	$cekfoto = @$_POST['cbcek'];

	if ($cekfoto == 'GANTI1') {
		$tumbnail_temp = @$_FILES['fototumbnail']['tmp_name'];
		$tumbnail_tujuan = uniqid() . @$_FILES['fototumbnail']['name'];

		if (move_uploaded_file($tumbnail_temp, "foto/" . $tumbnail_tujuan) == TRUE) {

			$yo = $kon->kueri("SELECT produk_gambartumbnail FROM produk WHERE produk_id = '$idx' ");
			$data = $kon->hasil_data($yo);
			if (file_exists($data['foto'])) {
				unlink($data['foto']);
			}
		}

		$abc = $kon->kueri("UPDATE produk SET produk_gambartumbnail = 'foto/$tumbnail_tujuan' WHERE produk_id = '$idx' ");
	}

	if ($cekfoto == 'GANTI2') {
		$produk1_temp = @$_FILES['fotoproduk1']['tmp_name'];
		$produk1_tujuan = uniqid() . @$_FILES['fotoproduk1']['name'];

		if (move_uploaded_file($produk1_temp, "foto/" . $produk1_tujuan) == TRUE) {

			$yo = $kon->kueri("SELECT produk_gambar1 FROM produk WHERE produk_id = '$idx' ");
			$data = $kon->hasil_data($yo);
			if (file_exists($data['foto'])) {
				unlink($data['foto']);
			}
		}

		$abc = $kon->kueri("UPDATE produk SET produk_gambar1 = 'foto/$produk1_tujuan' WHERE produk_id = '$idx' ");
	}

	if ($cekfoto == 'GANTI3') {
		$produk2_temp = @$_FILES['fotoproduk2']['tmp_name'];
		$produk2_tujuan = uniqid() . @$_FILES['fotoproduk2']['name'];

		if (move_uploaded_file($produk2_temp, "foto/" . $produk2_tujuan) == TRUE) {

			$yo = $kon->kueri("SELECT produk_gambar2 FROM produk WHERE produk_id = '$idx' ");
			$data = $kon->hasil_data($yo);
			if (file_exists($data['foto'])) {
				unlink($data['foto']);
			}
		}

		$abc = $kon->kueri("UPDATE produk SET produk_gambar2 = 'foto/$produk2_tujuan' WHERE produk_id = '$idx' ");
	}
	
	// panggil kueri
	$abc = $kon->kueri("UPDATE produk SET produk_nama = '$nama', produk_stok = '$stok', produk_harga = '$harga', produk_detail = '$detail', produk_status = '$status' WHERE produk_id = '$idx' ");
	if ($abc == TRUE) {
		echo "<script>alert('Edit data sukses.');</script>";
	} else {
		echo "<script>alert('Edit data gagal.');</script>";
	}
	break;
}
?>
<meta http-equiv="refresh" content="0;URL=dataproduk.php" />