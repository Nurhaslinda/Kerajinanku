-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 25, 2023 at 11:00 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kerajinanku`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `admin_nama` varchar(60) NOT NULL,
  `admin_username` varchar(15) NOT NULL,
  `admin_email` varchar(50) NOT NULL,
  `admin_hp` varchar(25) NOT NULL,
  `admin_foto` varchar(100) NOT NULL,
  `admin_pass` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_nama`, `admin_username`, `admin_email`, `admin_hp`, `admin_foto`, `admin_pass`) VALUES
(1, 'Ily', 'ily10', 'ily10@gmail.com', '081028470001', 'img/logo/646e6e2a7fec3admin.jpg', '89f288757f4d0693c99b007855fc075e');

-- --------------------------------------------------------

--
-- Table structure for table `kontak`
--

CREATE TABLE `kontak` (
  `kontak_id` int(11) NOT NULL,
  `kontak_nama` varchar(60) NOT NULL,
  `kontak_email` varchar(50) NOT NULL,
  `kontak_subjek` varchar(30) NOT NULL,
  `kontak_pesan` text NOT NULL,
  `kontak_tanggal` date NOT NULL,
  `admin_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ongkir`
--

CREATE TABLE `ongkir` (
  `ongkir_id` int(11) NOT NULL,
  `metode_pengiriman` varchar(30) NOT NULL,
  `ongkir_harga` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ongkir`
--

INSERT INTO `ongkir` (`ongkir_id`, `metode_pengiriman`, `ongkir_harga`) VALUES
(1, 'reguler', 10000),
(2, 'hemat', 5000);

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran`
--

CREATE TABLE `pembayaran` (
  `pembayaran_id` int(11) NOT NULL,
  `metode_pembayaran` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pembayaran`
--

INSERT INTO `pembayaran` (`pembayaran_id`, `metode_pembayaran`) VALUES
(1, 'COD'),
(2, 'Kartu Kredit / Debit'),
(3, 'Transfer Bank');

-- --------------------------------------------------------

--
-- Table structure for table `pembeli`
--

CREATE TABLE `pembeli` (
  `pembeli_id` int(11) NOT NULL,
  `pembeli_nama` varchar(60) NOT NULL,
  `pembeli_username` varchar(15) NOT NULL,
  `pembeli_email` varchar(100) NOT NULL,
  `pembeli_gender` enum('L','P') DEFAULT NULL,
  `pembeli_alamat` varchar(100) NOT NULL,
  `pembeli_foto` varchar(100) NOT NULL,
  `pembeli_pass` varchar(100) NOT NULL,
  `pembeli_hp` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pembeli`
--

INSERT INTO `pembeli` (`pembeli_id`, `pembeli_nama`, `pembeli_username`, `pembeli_email`, `pembeli_gender`, `pembeli_alamat`, `pembeli_foto`, `pembeli_pass`, `pembeli_hp`) VALUES
(1, 'Fifit Syafaaty', 'fifit01', 'fifit.21001@mhs.unesa.ac.id', 'P', 'Ds. Krajanpatuk', 'foto/64346390145126430a6ca0f7a7fifit.jpg', '12abef197e118fa7c8c842b32d713c90', '0815331120722'),
(2, 'Nur Haslinda', 'linda35', 'nurhaslinda.21035@mhs.unesa.ac.id', 'P', 'Ds. Tejoasri', 'foto/646d602680dd2IMG-20230218-WA0011.jpg', 'eaf450085c15c3b880c66d0b78f2c041', '085734534617'),
(3, 'Rizqi Cahya Angelita', 'cahya47', 'rizqicahya.21047@mhs.unesa.ac.id', 'P', 'Dk. Kalisari', 'foto/646d6061a913d37078ed2-116f-4b75-9949-e856fa2d4c65-removebg-preview.png', '2ea4dce70aecd3a50945105a01aa2cba', '081297247310'),
(4, 'Dwi Ramadhaniasari', 'sari57', 'dwirahmadhaniasari.21057@mhs.unesa.ac.id', 'P', 'Ds. Sobontoro', 'foto/646d62d01da591646375333348-removebg-preview.png', 'a87bcf310c4fdf2a80f2f3d97f1f9424', '083672646781');

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `produk_id` int(11) NOT NULL,
  `produk_nama` varchar(60) NOT NULL,
  `produk_stok` smallint(6) NOT NULL,
  `produk_harga` float NOT NULL,
  `produk_detail` text NOT NULL,
  `produk_status` varchar(15) NOT NULL,
  `produk_gambartumbnail` varchar(100) NOT NULL,
  `produk_gambar1` varchar(100) NOT NULL,
  `produk_gambar2` varchar(100) NOT NULL,
  `toko_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`produk_id`, `produk_nama`, `produk_stok`, `produk_harga`, `produk_detail`, `produk_status`, `produk_gambartumbnail`, `produk_gambar1`, `produk_gambar2`, `toko_id`) VALUES
(1, 'Tas', 21, 80000, '- Import Kualitas PREMIUM 100%\r\n- Bahan : Anyaman + Furing Dalam\r\n- Model Fashion Kekinian\r\n- Ukuran : 30x15x20 cm\r\n- Berat : 250 Gram', 'Ada', 'foto/64345a11d90fa6422be698f9703.jpg', 'foto/64345a11d90fa6422be698f9703.jpg', 'foto/64345a11d90fa6422be698f9703.jpg', 1),
(2, 'Cangkir', 50, 15000, '...', 'Ada', 'foto/64345d47eaf6864283bec0cbbfbg.jpg', 'foto/64345d47ec5ca64283bec0cbbfbg.jpg', 'foto/64345d47ecc8d64283bec0cbbfbg.jpg', 2),
(3, 'Miniatur Sepeda', 35, 100000, '...', 'Ada', 'foto/64345e9617d2e64283db86a83a1.jpg', 'foto/64345e9618d7f64283db86a83a1.jpg', 'foto/64345e961965a64283db86a83a1.jpg', 3);

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

CREATE TABLE `review` (
  `review_id` int(11) NOT NULL,
  `review_rating` int(5) NOT NULL,
  `review_isi` text NOT NULL,
  `produk_id` int(11) NOT NULL,
  `toko_id` int(11) NOT NULL,
  `pembeli_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `review`
--

INSERT INTO `review` (`review_id`, `review_rating`, `review_isi`, `produk_id`, `toko_id`, `pembeli_id`) VALUES
(1, 4, 'Lucu banget, terlihat mewah. Bahan lentur. Modelnya cantik. Nggak terlihat murahan.', 1, 1, 1),
(2, 5, 'Material Produk Bagus. Warna Produk Sesuai Kualitas Produk Bagus. Suka Banget', 2, 2, 2),
(3, 4, 'Produk sangat bagus, sesuai deskripsi penjual. packing rapi dan aman, pengiriman tepat waktu.', 3, 3, 4);

-- --------------------------------------------------------

--
-- Table structure for table `toko`
--

CREATE TABLE `toko` (
  `toko_id` int(11) NOT NULL,
  `toko_pemilik` varchar(60) NOT NULL,
  `toko_username` varchar(15) NOT NULL,
  `toko_nama` varchar(60) NOT NULL,
  `toko_hp` varchar(25) NOT NULL,
  `toko_email` varchar(50) NOT NULL,
  `toko_pemilik_alamat` varchar(100) NOT NULL,
  `toko_alamat` varchar(100) NOT NULL,
  `toko_foto` varchar(100) NOT NULL,
  `toko_pass` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `toko`
--

INSERT INTO `toko` (`toko_id`, `toko_pemilik`, `toko_username`, `toko_nama`, `toko_hp`, `toko_email`, `toko_pemilik_alamat`, `toko_alamat`, `toko_foto`, `toko_pass`) VALUES
(1, 'Bella', 'bella21', 'Bella HCraft', '081234567890', 'bella210@gmail.com', 'Jl.Anggrek', 'Jl.Usman Sadar, Sukorame, Kec. Gresik, Kab. Gresik, Jawa Timur 61119', 'foto/643459b5bdfd8642f690624bdbprofil 1.jpg', 'e7e9ec3723447a642f762b2b6a15cfd7'),
(2, 'Thiara Safa', 'thiara2', 'Flower', '081827678592', 'cs.flower@gmail.com', 'Jl. Permata', 'Jl. Warinoi 116A, Bunulrejo, Kec.Blimbing, Kota Malang, Jawa Timur 65123', 'foto/646f2189428826.png', '1e8295dda56d645e2e192da2bd14a9b4'),
(3, 'Anthony R', 'anthony7', 'Saturnice', '087867775099', 'saturnice@gmail.com', 'Jl.Batu', 'Jl. Bukit Cemara Tidar, Karangbesuki, Kec.Sukun, Kota Malang, Jawa Timur 65146', 'foto/646f222c3c0ae4.png', '65fbef05e01fac390cb3fa073fb3e8cf');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `transaksi_id` varchar(30) NOT NULL,
  `transaksi_tanggal` datetime NOT NULL,
  `pembeli_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`transaksi_id`, `transaksi_tanggal`, `pembeli_id`) VALUES
('TR20230524182407', '2023-05-24 23:24:07', 3),
('TR20230524193727', '2023-05-25 00:37:27', 3);

-- --------------------------------------------------------

--
-- Table structure for table `transaksi_detail`
--

CREATE TABLE `transaksi_detail` (
  `transaksi_detail_id` varchar(30) NOT NULL,
  `jumlah` smallint(6) NOT NULL,
  `subtotal` float NOT NULL,
  `ongkir_harga` float NOT NULL,
  `status_pesanan` varchar(30) NOT NULL,
  `status_pembayaran` varchar(30) NOT NULL,
  `transaksi_id` varchar(30) NOT NULL,
  `produk_id` int(11) NOT NULL,
  `ongkir_id` int(11) NOT NULL,
  `pembayaran_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `transaksi_detail`
--

INSERT INTO `transaksi_detail` (`transaksi_detail_id`, `jumlah`, `subtotal`, `ongkir_harga`, `status_pesanan`, `status_pembayaran`, `transaksi_id`, `produk_id`, `ongkir_id`, `pembayaran_id`) VALUES
('TR20230524182407646E3A2786EC0', 2, 165000, 5000, 'Sedang Dikemas', 'Belum diBayar', 'TR20230524182407', 1, 2, 2),
('TR20230524193727646E4B57B5AB9', 1, 20000, 5000, 'Sedang Diproses', 'Belum dikonfirmasi', 'TR20230524193727', 2, 2, 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`),
  ADD UNIQUE KEY `admin_username` (`admin_username`);

--
-- Indexes for table `kontak`
--
ALTER TABLE `kontak`
  ADD PRIMARY KEY (`kontak_id`);

--
-- Indexes for table `ongkir`
--
ALTER TABLE `ongkir`
  ADD PRIMARY KEY (`ongkir_id`);

--
-- Indexes for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`pembayaran_id`);

--
-- Indexes for table `pembeli`
--
ALTER TABLE `pembeli`
  ADD PRIMARY KEY (`pembeli_id`),
  ADD UNIQUE KEY `pembeli_username` (`pembeli_username`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`produk_id`);

--
-- Indexes for table `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`review_id`);

--
-- Indexes for table `toko`
--
ALTER TABLE `toko`
  ADD PRIMARY KEY (`toko_id`),
  ADD UNIQUE KEY `toko_username` (`toko_username`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`transaksi_id`);

--
-- Indexes for table `transaksi_detail`
--
ALTER TABLE `transaksi_detail`
  ADD PRIMARY KEY (`transaksi_detail_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `kontak`
--
ALTER TABLE `kontak`
  MODIFY `kontak_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `ongkir`
--
ALTER TABLE `ongkir`
  MODIFY `ongkir_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `pembayaran_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `pembeli`
--
ALTER TABLE `pembeli`
  MODIFY `pembeli_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `produk_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `review`
--
ALTER TABLE `review`
  MODIFY `review_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `toko`
--
ALTER TABLE `toko`
  MODIFY `toko_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
