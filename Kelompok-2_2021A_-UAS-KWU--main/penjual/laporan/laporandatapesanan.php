<?php
session_start();
include '../../fpdf/fpdf.php';
include '../../koneksi.php';
$kon = new Koneksi();
$abc = new FPDF('L', 'mm', 'A4');
$abc->AddPage();

$que = $kon->kueri("SELECT * FROM toko WHERE toko_id ='".@$_SESSION['toko_id']."' ");

while ($hasil = $kon->hasil_data($que)) {
$abc->Image('../../penjual/'. $hasil['toko_foto'], 10, 5, 30, 20);
$abc->SetFont('Arial', 'B', '18');
$abc->Cell(0, 5, $hasil['toko_nama'], '0', '1', 'C', false);
$abc->SetFont('Arial', 'i', '8');
$abc->Cell(0, 5, 'Alamat: '.$hasil['toko_alamat'], '0', '1', 'C', false);
$abc->Cell(0, 5, 'Email: '.$hasil['toko_email'] . ' | No.Telp: '.$hasil['toko_hp'],'0', '1', 'C', false);
$abc->Ln(3);
$abc->Cell(280, 0.6, '', '0', '1', 'C', true);
$abc->Ln(5);
}
$abc->SetFont('Arial', 'B', 12);
$abc->Cell(50, 5, 'Laporan Data Pesanan', '0', '1', 'L', false);
$abc->Ln(3);

#-- Query dari tabel users
$abc->SetFont('Arial', 'B', 9);

$abc->SetXY(10, 45);
$abc->SetFillColor(50, 50, 50);
$abc->SetTextColor(255, 255, 255);
$abc->Cell(10, 5, 'No.', 1, 0, 'C', true);
$abc->Cell(45, 5, 'Nama Pembeli', 1, 0, 'C', true);
$abc->Cell(30, 5, 'No. Hp', 1, 0, 'C', true);
$abc->Cell(40, 5, 'Nama Produk', 1, 0, 'C', true);
$abc->Cell(40, 5, 'Kode Transaksi', 1, 0, 'C', true);
$abc->Cell(35, 5, 'Pengiriman', 1, 0, 'C', true);
$abc->Cell(30, 5, 'Pembayaran', 1, 0, 'C', true);
$abc->Cell(15, 5, 'Jumlah', 1, 0, 'C', true);
$abc->Cell(35, 5, 'Total', 1, 0, 'C', true);
$abc->Ln(5);


$xyz = $kon->kueri("SELECT * FROM transaksi_detail a JOIN transaksi b ON a.transaksi_id = b.transaksi_id 
JOIN pembeli c ON b.pembeli_id = c.pembeli_id JOIN produk d ON a.produk_id = d.produk_id
JOIN pembayaran e ON a.pembayaran_id = e.pembayaran_id JOIN ongkir f ON a.ongkir_id = f.ongkir_id 
JOIN toko g ON d.toko_id = g.toko_id
WHERE d.toko_id ='".@$_SESSION['toko_id']."'");
$no = 1;
$grandtotal = 0;
// Color and font restoration
$abc->SetFillColor(231, 218, 212);
$abc->SetTextColor(0);
$abc->SetFont('');
// Data
$fill = false;
$baris = 0;
while ($hasil = $kon->hasil_data($xyz)) {
	$abc->Cell(10, 5, $no, 1, 0, 'C', $fill);
	$abc->Cell(45, 5, $hasil['pembeli_nama'], 1, 0, 'L', $fill);
	$abc->Cell(30, 5, $hasil['pembeli_hp'], 1, 0, 'L', $fill);
	$abc->Cell(40, 5, $hasil['produk_nama'], 1, 0, 'L', $fill);
	$abc->Cell(40, 5, $hasil['transaksi_id'], 1, 0, 'L', $fill);
	$abc->Cell(35, 5, $hasil['metode_pengiriman'], 1, 0, 'L', $fill);
	$abc->Cell(30, 5, $hasil['metode_pembayaran'], 1, 0, 'L', $fill);
	$abc->Cell(15, 5, $hasil['jumlah'], 1, 0, 'L', $fill);
	$abc->Cell(35, 5, 'Rp.'.$hasil['subtotal'], 1, 0, 'L', $fill);
	$abc->Ln();
	$no++;
	$baris = $baris + 2;
	$fill = !$fill;
}

$abc->SetFont('Arial', 'B', 9);
$abc->Text(245, $baris + 80, '................................, ' . date('d/m/y'));

$abc->Output();
