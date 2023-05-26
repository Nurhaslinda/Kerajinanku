<?php
session_start();
include '../../fpdf/fpdf.php';
include '../../koneksi.php';
$kon = new Koneksi();
$abc = new FPDF('P', 'mm', 'A4');
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
$abc->Cell(190, 0.6, '', '0', '1', 'C', true);
$abc->Ln(5);
}
$abc->SetFont('Arial', 'B', 12);
$abc->Cell(50, 5, 'Laporan Data Produk', '0', '1', 'L', false);
$abc->Ln(3);

#-- Query dari tabel users
$abc->SetFont('Arial', 'B', 9);

$abc->SetXY(10, 45);
$abc->SetFillColor(50, 50, 50);
$abc->SetTextColor(255, 255, 255);
$abc->Cell(10, 5, 'No.', 1, 0, 'C', true);
// $abc->Cell(40, 5, 'Foto', 1, 0, 'C', true);
$abc->Cell(40, 5, 'Nama Produk', 1, 0, 'C', true);
$abc->Cell(20, 5, 'Status', 1, 0, 'C', true);
$abc->Cell(20, 5, 'Stok', 1, 0, 'C', true);
$abc->Cell(25, 5, 'Harga', 1, 0, 'C', true);
$abc->Ln(5);


$xyz = $kon->kueri("SELECT a.toko_id, b.produk_nama, b.produk_harga, b.produk_stok, b.produk_status FROM toko AS a JOIN produk AS b ON (a.toko_id = b.toko_id) WHERE a.toko_id ='".@$_SESSION['toko_id']."'  LIMIT 0,10");
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
	// $abc->Cell(40, 20, $abc->Image('../../penjual/'. $hasil['produk_gambartumbnail'], $abc->GetX(), $abc->GetY(), 25,25), 1, 0, 'L',false);
	$abc->Cell(40, 5, $hasil['produk_nama'], 1, 0, 'L', $fill);
	$abc->Cell(20, 5, $hasil['produk_status'], 1, 0, 'L', $fill);
	$abc->Cell(20, 5, $hasil['produk_stok'], 1, 0, 'L', $fill);
	$abc->Cell(25, 5, 'Rp.'.$hasil['produk_harga'], 1, 0, 'L', $fill);
	$abc->Ln();
	$no++;
	$baris = $baris + 2;
	$fill = !$fill;
}

$abc->SetFont('Arial', 'B', 9);
$abc->Text(165, $baris + 80, '....................., ' . date('d/m/y'));

$abc->Output();
