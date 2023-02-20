-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 20 Feb 2023 pada 08.09
-- Versi server: 10.4.27-MariaDB
-- Versi PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_pemesananmobil`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `booking`
--

CREATE TABLE `booking` (
  `id_booking` int(11) NOT NULL,
  `kode_booking` varchar(255) NOT NULL,
  `id_login` int(11) NOT NULL,
  `id_mobil` int(11) NOT NULL,
  `nik` varchar(255) NOT NULL,
  `pemesan` varchar(255) NOT NULL,
  `divisi` varchar(255) NOT NULL,
  `tgl_pesan` varchar(255) NOT NULL,
  `tgl_pake` varchar(255) NOT NULL,
  `lama_pake` int(11) NOT NULL,
  `kota` varchar(255) NOT NULL,
  `tujuan` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `keperluan` varchar(255) NOT NULL,
  `jml_orang` int(11) NOT NULL,
  `jml_barang` int(11) NOT NULL,
  `etd_padma` time(6) NOT NULL,
  `eta_tujuan` time(6) NOT NULL,
  `supir` varchar(255) NOT NULL,
  `go_time` time NOT NULL,
  `status_booking` varchar(255) NOT NULL,
  `konfirmasi_booking` varchar(255) NOT NULL,
  `tgl_input` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `booking`
--

INSERT INTO `booking` (`id_booking`, `kode_booking`, `id_login`, `id_mobil`, `nik`, `pemesan`, `divisi`, `tgl_pesan`, `tgl_pake`, `lama_pake`, `kota`, `tujuan`, `alamat`, `keperluan`, `jml_orang`, `jml_barang`, `etd_padma`, `eta_tujuan`, `supir`, `go_time`, `status_booking`, `konfirmasi_booking`, `tgl_input`) VALUES
(57, '1676541686', 2, 12, '3201071806710008', 'Rizkita', 'HRD-GA', '2023-02-16', '2023-02-17', 1, 'Bekasi', 'Dinas Tenaga Kerja Kota Bekasi', 'Bekasi', 'Meeting', 2, 1, '08:00:00.000000', '08:45:00.000000', 'Andi', '08:10:00', 'Terlayani', 'Booking di terima', '2023-02-16'),
(58, '1676861955', 2, 13, '3201071806710008', 'Agus ', 'HRD-GA', '2023-02-20', '2023-02-20', 1, 'Bekasi', 'PT. PLN Persero', 'Pekayon', 'Dokumen & Pembayaran', 2, 2, '08:00:00.000000', '08:59:00.000000', '', '00:00:00', '', 'Sedang di proses', '2023-02-20');

-- --------------------------------------------------------

--
-- Struktur dari tabel `infoweb`
--

CREATE TABLE `infoweb` (
  `id` int(11) NOT NULL,
  `nama_rental` varchar(255) NOT NULL,
  `telp` varchar(15) NOT NULL,
  `alamat` text NOT NULL,
  `email` varchar(255) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `infoweb`
--

INSERT INTO `infoweb` (`id`, `nama_rental`, `telp`, `alamat`, `email`, `updated_at`) VALUES
(1, 'PT. Padma Soode Indonesia', '021 123456789', 'Jl. Raya Narogong, KM. 15', 'padma@soode.co.id', '2023-02-01 07:27:54');

-- --------------------------------------------------------

--
-- Struktur dari tabel `konfirmasi`
--

CREATE TABLE `konfirmasi` (
  `id_konfirmasi` int(11) NOT NULL,
  `id_booking` int(11) NOT NULL,
  `no_konfirmasi` varchar(255) NOT NULL,
  `pemesan` varchar(255) NOT NULL,
  `divisi` varchar(255) NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `konfirmasi`
--

INSERT INTO `konfirmasi` (`id_konfirmasi`, `id_booking`, `no_konfirmasi`, `pemesan`, `divisi`, `tanggal`) VALUES
(1, 57, '1676541686', 'Rizkita', 'HRD-GA', '2023-02-17'),
(2, 58, '1676861955', 'Agus ', 'HRD-GA', '2023-02-20');

-- --------------------------------------------------------

--
-- Struktur dari tabel `login`
--

CREATE TABLE `login` (
  `id_login` int(11) NOT NULL,
  `nama_pengguna` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `level` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `login`
--

INSERT INTO `login` (`id_login`, `nama_pengguna`, `username`, `password`, `level`) VALUES
(1, 'HRD', 'admin', 'demo', 'admin'),
(2, 'Rizki', 'demo', 'demo', 'pengguna'),
(3, 'Tisnaedi', '3201072801850008', '3201072801850008', 'pengguna');

-- --------------------------------------------------------

--
-- Struktur dari tabel `mobil`
--

CREATE TABLE `mobil` (
  `id_mobil` int(11) NOT NULL,
  `no_plat` varchar(255) NOT NULL,
  `nama_mobil` varchar(255) NOT NULL,
  `merk` varchar(255) NOT NULL,
  `deskripsi` varchar(255) NOT NULL,
  `status_mobil` varchar(255) NOT NULL,
  `gambar` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `mobil`
--

INSERT INTO `mobil` (`id_mobil`, `no_plat`, `nama_mobil`, `merk`, `deskripsi`, `status_mobil`, `gambar`) VALUES
(12, 'F 1211 SGT', 'Avanza', 'Toyota', 'All New Avanza', 'Tersedia', '167644570916752390401-avanza-purplish-silver.png'),
(13, 'B 4564 RZK', 'Xenia', 'Daihatsu', 'All New Xenia', 'Tidak Tersedia', '16765109511643012563all-new-xenia-exterior-tampak-perspektif-depan---varian-1.5r-ads.jpg'),
(14, 'B 3219 RST', 'Grand Max', 'Daihatsu', 'All New Grand Max', 'Tersedia', '16765111965ef21fb658caf.jpg'),
(15, 'F 1211 BNG', 'Kijang Innova', 'Toyota', 'All New Kijang Innova', 'Tersedia', '1676511330k_inova.jpg'),
(16, 'F 6271 JBL', 'Expander', 'Mitsubishi', 'Mitsubishi Expander', 'Tersedia', '1676511429k_expander.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengembalian`
--

CREATE TABLE `pengembalian` (
  `id_pengembalian` int(11) NOT NULL,
  `kode_booking` varchar(255) NOT NULL,
  `tanggal` varchar(255) NOT NULL,
  `denda` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`id_booking`);

--
-- Indeks untuk tabel `konfirmasi`
--
ALTER TABLE `konfirmasi`
  ADD PRIMARY KEY (`id_konfirmasi`);

--
-- Indeks untuk tabel `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id_login`);

--
-- Indeks untuk tabel `mobil`
--
ALTER TABLE `mobil`
  ADD PRIMARY KEY (`id_mobil`);

--
-- Indeks untuk tabel `pengembalian`
--
ALTER TABLE `pengembalian`
  ADD PRIMARY KEY (`id_pengembalian`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `booking`
--
ALTER TABLE `booking`
  MODIFY `id_booking` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT untuk tabel `konfirmasi`
--
ALTER TABLE `konfirmasi`
  MODIFY `id_konfirmasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `login`
--
ALTER TABLE `login`
  MODIFY `id_login` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `mobil`
--
ALTER TABLE `mobil`
  MODIFY `id_mobil` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT untuk tabel `pengembalian`
--
ALTER TABLE `pengembalian`
  MODIFY `id_pengembalian` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
