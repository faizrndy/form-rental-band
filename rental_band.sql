-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Waktu pembuatan: 25 Sep 2025 pada 12.46
-- Versi server: 10.4.28-MariaDB
-- Versi PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rental_band`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `alat_musik`
--

CREATE TABLE `alat_musik` (
  `id` int(11) NOT NULL,
  `nama_alat` varchar(255) NOT NULL,
  `merk` varchar(255) DEFAULT NULL,
  `kategori` varchar(100) DEFAULT NULL,
  `sub_kategori` varchar(255) DEFAULT NULL,
  `kondisi` varchar(50) DEFAULT NULL,
  `harga_per_hari` decimal(10,2) DEFAULT 0.00,
  `harga_per_minggu` decimal(10,2) DEFAULT 0.00,
  `harga_per_bulan` decimal(10,2) DEFAULT 0.00,
  `deposit` decimal(10,2) DEFAULT 0.00,
  `kelengkapan` text DEFAULT NULL,
  `spesifikasi` text DEFAULT NULL,
  `deskripsi` text DEFAULT NULL,
  `ketersediaan` varchar(50) DEFAULT NULL,
  `lokasi` varchar(255) DEFAULT NULL,
  `minimal_sewa` varchar(50) DEFAULT NULL,
  `syarat_khusus` text DEFAULT NULL,
  `tanggal_ditambahkan` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `alat_musik`
--

INSERT INTO `alat_musik` (`id`, `nama_alat`, `merk`, `kategori`, `sub_kategori`, `kondisi`, `harga_per_hari`, `harga_per_minggu`, `harga_per_bulan`, `deposit`, `kelengkapan`, `spesifikasi`, `deskripsi`, `ketersediaan`, `lokasi`, `minimal_sewa`, `syarat_khusus`, `tanggal_ditambahkan`) VALUES
(1, 'BASS', 'yamaha', 'Gitar & Bass', 'gitar elektrik', 'Excellent', 0.00, 0.00, 0.00, 0.00, 'Kabel Original', 'efeferfgre', 'efvefvevre', 'Tersedia', 'Sragen', '1 Hari', 'Wajib KTP/Identitas', '2025-09-25 07:37:18');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `alat_musik`
--
ALTER TABLE `alat_musik`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `alat_musik`
--
ALTER TABLE `alat_musik`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
