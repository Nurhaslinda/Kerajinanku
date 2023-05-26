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
	$abc->Cell(275, 0.6, '', '0', '1', 'C', true);
	$abc->Ln(5);
	}
	$abc->SetFont('Arial', 'B', 12);
	$abc->Cell(50, 5, 'Laporan Data Review', '0', '1', 'L', false);
	$abc->Ln(3);

#-- Query dari tabel users
$abc->SetFont('Arial', 'B', 9);

$abc->SetXY(10, 45);
$abc->SetFillColor(50, 50, 50);
$abc->SetTextColor(255, 255, 255);
$abc->Cell(10, 5, 'No.', 1, 0, 'C', true);
$abc->Cell(40, 5, 'Nama Pembeli', 1, 0, 'C', true);
$abc->Cell(30, 5, 'Nama Toko', 1, 0, 'C', true);
$abc->Cell(35, 5, 'Produk', 1, 0, 'C', true);
$abc->Cell(140, 5, 'Review', 1, 0, 'C', true);
$abc->Cell(10, 5, 'Rating', 1, 0, 'C', true);
$abc->Ln(5);


$xyz = $kon->kueri("SELECT a.review_isi, a.review_rating, b.pembeli_nama, c.produk_nama, d.toko_nama FROM review a JOIN pembeli b ON (a.pembeli_id = b.pembeli_id) JOIN produk c ON (a.produk_id = c.produk_id) JOIN toko d ON (a.toko_id = d.toko_id) WHERE a.toko_id ='".@$_SESSION['toko_id']."' LIMIT 0,10 ");
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
	$abc->Cell(40, 5, $hasil['pembeli_nama'], 1, 0, 'L', $fill);
	$abc->Cell(30, 5, $hasil['toko_nama'], 1, 0, 'L', $fill);
	$abc->Cell(35, 5, $hasil['produk_nama'], 1, 0, 'L', $fill);
	$abc->Cell(140, 5, $hasil['review_isi'], 1, 0, 'L', $fill);
	$abc->Cell(10, 5, $hasil['review_rating'], 1, 0, 'L', $fill);
	$abc->Ln();
	$no++;
	$baris = $baris + 3;
	$fill = !$fill;
}

$abc->SetFont('Arial', 'B', 9);
$abc->Text(250, $baris + 80, '.......................,' . date('d/m/y'));

$abc->Output();
