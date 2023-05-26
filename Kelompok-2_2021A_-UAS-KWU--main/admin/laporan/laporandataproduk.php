<?php
session_start();
include '../../fpdf/fpdf.php';
include '../../koneksi.php';
$kon = new Koneksi();
$abc = new FPDF('L', 'mm', 'A4');
$abc->AddPage();

#-- Tambah Logo
$abc->Image('../img/logo/logo.png', 10, 5, 30, 20);

$abc->SetFont('Arial', 'B', '18');
$abc->Cell(0, 5, 'KERAJINANKU', '0', '1', 'C', false);
$abc->SetFont('Arial', 'i', '8');
$abc->Cell(0, 5, 'Alamat: Jl. Ketintang, Gayungan, Kota Surabaya, Jawa Timur. 60231', '0', '1', 'C', false);
$abc->Cell(0, 5, 'http://', '0', '1', 'C', false);
$abc->Ln(3);
$abc->Cell(270, 0.6, '', '0', '1', 'C', true);
$abc->Ln(5);

$abc->SetFont('Arial', 'B', 12);
$abc->Cell(50, 5, 'Laporan Data Produk', '0', '1', 'L', false);
$abc->Ln(3);

#-- Query dari tabel users
$abc->SetFont('Arial', 'B', 9);

$abc->SetXY(10, 45);
$abc->SetFillColor(50, 50, 50);
$abc->SetTextColor(255, 255, 255);
$abc->Cell(10, 5, 'No.', 1, 0, 'C', true);
$abc->Cell(10, 5, 'ID', 1, 0, 'C', true);
// $abc->Cell(40, 5, 'Foto', 1, 0, 'C', true);
$abc->Cell(40, 5, 'Nama Produk', 1, 0, 'C', true);
$abc->Cell(40, 5, 'Nama Toko', 1, 0, 'C', true);
$abc->Cell(20, 5, 'Status', 1, 0, 'C', true);
$abc->Cell(20, 5, 'Stok', 1, 0, 'C', true);
$abc->Cell(25, 5, 'Harga', 1, 0, 'C', true);
$abc->Ln(5);


$xyz = $kon->kueri("SELECT * FROM produk a JOIN toko c ON a.toko_id = c.toko_id ORDER BY a.produk_id ASC LIMIT 0,10 ");
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
	$abc->Cell(10, 5, $hasil['produk_id'], 1, 0, 'L', $fill);
	// $abc->Cell(40, 20, $abc->Image('../../penjual/'. $hasil['produk_gambartumbnail'], $abc->GetX(), $abc->GetY(), 25,25), 1, 0, 'L',false);
	$abc->Cell(40, 5, $hasil['produk_nama'], 1, 0, 'L', $fill);
	$abc->Cell(40, 5, $hasil['toko_nama'], 1, 0, 'L', $fill);
	$abc->Cell(20, 5, $hasil['produk_status'], 1, 0, 'L', $fill);
	$abc->Cell(20, 5, $hasil["produk_stok"], 1, 0, 'L', $fill);
	$abc->Cell(25, 5, 'Rp.'.$hasil['produk_harga'], 1, 0, 'L', $fill);
	$abc->Ln();
	$no++;
	$baris = $baris + 2;
	$fill = !$fill;
}

$abc->SetFont('Arial', 'B', 9);
$abc->Text(250, $baris + 80, 'Surabaya, ' . date('d/m/y'));
$abc->Text(250, $baris + 100, 'Admin');

$abc->Output();
