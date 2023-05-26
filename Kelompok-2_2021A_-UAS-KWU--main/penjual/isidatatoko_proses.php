<?php
include "../koneksi.php";
$kon = new koneksi();
$aksi = @$_REQUEST['aksi'];

switch ($aksi) {
    // case 'tambah':
    //     $id = addslashes(@$_POST['id']);
    //     $nama = addslashes(@$_POST['nama']);
    //     $user =  addslashes(@$_POST['user']);
    //     $jenkel = addslashes(@$_POST['jenkel']);
    //     $usia =  @$_POST['usia'];
    //     $alamat =  addslashes(@$_POST['alamat']);
    //     $telp =  addslashes(@$_POST['telp']);
    //     $pass =  addslashes(@$_POST['pass']);

    //     #-- Upload Foto

    //     $foto_awal = @$_FILES['ffoto']['tmp_name'];
    //     $foto_tujuan = uniqid() . @$_FILES['ffoto']['name'];

    //     #-- Simpan gambar pada folder 'foto', jika belum ada maka buat saja :D
    //     if (!file_exists("foto")) {
    //         mkdir("foto");
    //     }
    //     move_uploaded_file($foto_awal, "foto/" . $foto_tujuan);

    //     // Panggil kueri (tambah data)
    //     $abc = $kon->kueri("INSERT INTO pelanggan (id_pelanggan, username, nama_pelanggan, jenis_kelamin, usia, alamat, telp, foto, pass) VALUES ('$id' ,'$user', '$nama', '$jenkel', '$usia', '$alamat', '$telp', 'foto/$foto_tujuan', MD5('$pass'))");

    //     if ($abc == TRUE) {

    //         echo "<script>alert('Tambah data sukses.');</script>";
    //     } else {
    //         echo "<script>alert('Tambah data gagal.')'</script>";
    //     }
    //     break;

    // case 'hapus':
    //     $id = @$_REQUEST['tid'];

    //     $yo = $kon->kueri("SELECT foto FROM pelanggan WHERE id_pelanggan = '$id' ");
    //     $data = $kon->hasil_data($yo);
    //     if (file_exists($data['foto'])) {
    //         unlink($data['foto']);
    //     }

    //     $abc = $kon->kueri("DELETE FROM pelanggan WHERE id_pelanggan = '$id' ");

    //     if ($abc == TRUE) {
    //         echo "<script>alert('Hapus data sukses.');</script>";
    //     } else {
    //         echo "<script>alert('Hapus data gagal');</script>";
    //     }
    //     break;

    case 'edit':
        $idx = @$_POST['hid'];
        $idtoko = addslashes(@$_POST['id']);
        $nama = addslashes(@$_POST['namatoko']);
        $nohp = addslashes(@$_POST['nohp']);
        $alamat = addslashes(@$_POST['alamat']);

        $cekfoto = @$_POST['cbcek'];

        if ($cekfoto == 'GANTI') {
            $foto_temp = @$_FILES['fototoko']['tmp_name'];
            $foto_tujuan = uniqid() . @$_FILES['fototoko']['name'];

            if (move_uploaded_file($foto_temp, "foto/" . $foto_tujuan) == TRUE) {

                $yo = $kon->kueri("SELECT toko_foto FROM toko WHERE toko_id = '$idx' ");
                $data = $kon->hasil_data($yo);
                if (file_exists($data['foto'])) {
                    unlink($data['foto']);
                }
            }
            $abc = $kon->kueri("UPDATE toko SET toko_foto = 'foto/$foto_tujuan' WHERE toko_id = '$idx' ");
        }
        $abc = $kon->kueri("UPDATE toko SET toko_nama = '$nama', toko_hp = '$nohp', toko_alamat = '$alamat' WHERE toko_id = '$idx' ");
        if ($abc == TRUE) {
            echo "<script>alert('Edit data sukses.');</script>";
        } else {
            echo "<script>alert('Edit data gagal.');</script>";
        }
        break;
}
?>
<meta http-equiv="refresh" content="0;URL=datatoko.php" />