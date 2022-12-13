-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 13 Des 2022 pada 05.32
-- Versi server: 10.4.18-MariaDB
-- Versi PHP: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rsintanh_it`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `dailyactivity`
--

CREATE TABLE `dailyactivity` (
  `id` int(11) NOT NULL,
  `kegiatan` varchar(160) DEFAULT NULL,
  `bagian` varchar(160) NOT NULL,
  `kendala` varchar(255) DEFAULT NULL,
  `tindaklanjut` varchar(255) DEFAULT NULL,
  `tgl_komplain` datetime DEFAULT NULL,
  `waktu_mulai` datetime DEFAULT current_timestamp(),
  `waktu_selesai` datetime DEFAULT NULL ON UPDATE current_timestamp(),
  `username` varchar(160) DEFAULT NULL,
  `status` int(1) NOT NULL COMMENT '0: Belum Selesai, 1: Selesai Belum Validasi, 2: Selesai dan divalidasi'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `dailyactivity`
--

INSERT INTO `dailyactivity` (`id`, `kegiatan`, `bagian`, `kendala`, `tindaklanjut`, `tgl_komplain`, `waktu_mulai`, `waktu_selesai`, `username`, `status`) VALUES
(24, '5', '20', 'POWER SUPPLY DAN MOUSE SUDAH RUSAK', 'PS SUDAH DIGANTI, MOUSE IT SEMENTARA', '2022-06-03 08:00:00', '2022-06-03 08:20:00', '2022-06-03 08:20:00', 'ispan', 2),
(20, '5', '27', 'POWER SUPPLY SUDAH TIDAK BERFUNGSI', 'BA', '2022-04-08 09:20:00', '2022-04-08 09:40:00', '2022-04-08 09:40:00', 'ispan', 2),
(23, '5', '27', 'KEYBOARD SERING MATI', 'BA', '2022-05-18 09:00:00', '2022-05-18 09:10:00', '2022-05-18 09:10:00', 'ispan', 2),
(22, '5', '39', 'KEYBOARD DAN MOUSE SUDAH TIDAK BERFUNGSI', 'BA', '2022-05-11 10:00:00', '2022-05-11 10:20:00', '2022-05-11 10:20:00', 'ispan', 2),
(21, '5', '25', 'HARDISK SUDAH TIDAK BISA DIGUNAKAN', 'BA', '2022-04-19 08:00:00', '2022-04-19 08:30:00', '2022-04-19 08:30:00', 'ispan', 2),
(19, '5', '27', 'PRINTER SUDAH SERING BOCOR PADA PENAMPUNGAN TINTA', 'SUDAH PENGAJUAN', '2022-04-08 09:00:00', '2022-04-08 09:10:00', '2022-04-08 09:10:00', 'ispan', 2),
(18, '5', '21', 'CATRIDE PRINTER RUSAK', 'BA', '2022-02-23 14:00:00', '2022-02-23 14:15:00', '2022-02-23 14:15:00', 'ispan', 2),
(15, '5', '12', 'PRINTER BOCOR', 'BA', '2022-01-27 08:00:00', '2022-01-27 08:15:00', '2022-01-27 08:15:00', 'ispan', 2),
(16, '5', '35', 'HARDIS TIDAK TERBACA', 'BA', '2022-02-10 08:00:00', '2022-02-10 08:10:00', '2022-02-10 08:10:00', 'ispan', 2),
(17, '5', '37', 'KERUSAKAN LAYAR LAPTOP', 'BA', '2022-02-15 13:30:00', '2022-02-15 13:40:00', '2022-02-15 13:40:00', 'ispan', 2),
(14, '5', '38', 'HARDISK KOMPUTER TIDAK TERBACA', 'BA', '2022-01-04 09:00:00', '2022-01-04 09:20:00', '2022-01-04 09:20:00', 'ispan', 2),
(25, '5', '37', 'BATRAI SUDAH TIDAK BERFUNGSI', 'BA', '2022-06-07 10:30:00', '2022-06-07 10:45:00', '2022-06-07 10:45:00', 'ispan', 2),
(26, '5', '22', 'PC SERING LEMOT,PC YANG DIGUNAKAN PC LAMA ASOKA', 'BA', '2022-06-08 10:00:00', '2022-06-08 10:15:00', '2022-06-08 10:15:00', 'ispan', 2),
(27, '5', '6', 'PRINTER BOCOR', 'BA', '2022-06-13 09:00:00', '2022-06-13 09:15:00', '2022-06-13 09:15:00', 'ispan', 2),
(28, '5', '3', 'PRINTER BOCOR', 'BA', '2022-06-20 08:00:00', '2022-06-20 08:15:00', '2022-06-20 08:15:00', 'ispan', 2),
(29, '5', '17', 'PRINTER BOCOR', 'BA', '2022-07-12 09:00:00', '2022-07-12 09:10:00', '2022-07-12 09:10:00', 'ispan', 2),
(30, '5', '30', 'POWER SUPPLY SUDAH RUSAK', 'BA', '2022-07-19 14:00:00', '2022-07-19 14:10:00', '2022-07-19 14:10:00', 'ispan', 2),
(31, '5', '29', 'MASIH BISA DIGUNAKAN TAPI SERING DISCONNECT', '-', '2022-07-20 10:00:00', '2022-07-20 10:20:00', '2022-07-20 10:20:00', 'ispan', 2),
(32, '5', '29', 'PRINTER TIDAK BISA SCAN', 'BA', '2022-07-20 10:00:00', '2022-07-20 09:20:00', '2022-07-20 09:20:00', 'ispan', 2),
(33, '5', '15', 'KIPAS PROCESSOR SUDAH RUSAK DAN HARUS DIGANTI', 'BA', '2022-07-22 09:00:00', '2022-07-22 08:00:00', '2022-07-22 08:00:00', 'ispan', 2),
(34, '5', '7', 'MESIN MATI', 'SUDAH GARANSI (VENDOR)', '2022-07-24 20:00:00', '2022-07-25 10:15:00', '2022-07-25 10:15:00', 'ispan', 2),
(35, '5', '35', 'MONITOR RONGEN SUDAH RUSAK', 'BA', '2022-07-29 10:10:00', '2022-07-29 10:15:00', '2022-07-29 10:15:00', 'ispan', 2),
(36, '5', '37', 'KERTAS SERING MACET', 'BA', '2022-07-29 10:30:00', '2022-07-29 10:45:00', '2022-07-29 10:45:00', 'ispan', 2),
(37, '5', '23', 'SUDAH TIDAK NYAMAN DIGUNAKAN', '-', '2022-08-02 13:00:00', '2022-08-02 13:10:00', '2022-09-26 10:19:20', 'ispan', 2),
(43, '4', '32', 'ANTRIAN BELAKANG SERING MATI SENDIRI', 'SETTING SLEEP MODE DARI PC ANTRIAN BELAKANG', '2022-09-15 14:03:00', '2022-09-15 14:31:52', '2022-09-26 10:26:38', 'wildan', 2),
(42, '5', '1', 'FLASHDISK TIBA-TIBA MATI', 'BUAT BA KERUSAKAN FLASHDISK TERSEBUT', '2022-09-15 10:11:00', '2022-09-15 10:11:22', '2022-09-26 10:13:52', 'wildan', 2),
(44, '3', '12', 'INTERNET TIDAK KONEK', 'PASANG SWITCH DAN KABEL BARU', '2022-09-16 08:30:00', '2022-09-16 08:46:54', '2022-09-16 08:47:59', 'wildan', 1),
(45, '6', '14', 'SHARING PRINTER TIDAK BERFUNGSI', 'Restart Print Spooler', '2022-09-16 08:30:00', '2022-09-16 08:50:40', '2022-09-16 08:52:25', 'wildan', 1),
(46, '5', '4', 'test', '', '2022-09-28 11:38:00', '2022-09-28 11:39:59', NULL, 'wildan', 0),
(47, '7', '1', 'TEST INPUT ACTIVITY', 'TEST 2', '2022-09-28 11:41:00', '2022-09-28 11:41:24', '2022-09-28 11:46:18', 'wildan', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `histori_mutasi`
--

CREATE TABLE `histori_mutasi` (
  `no` int(11) DEFAULT NULL,
  `id_mutasi` varchar(35) NOT NULL,
  `id_barang` varchar(35) DEFAULT NULL,
  `desc_barang` varchar(35) DEFAULT NULL,
  `tgl_mutasi` date DEFAULT NULL,
  `asal_brg` varchar(35) DEFAULT NULL,
  `tujuan_brg` varchar(35) DEFAULT NULL,
  `status_brg` varchar(35) DEFAULT NULL,
  `keterangan` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `log`
--

CREATE TABLE `log` (
  `no` int(11) NOT NULL,
  `user` varchar(100) DEFAULT NULL,
  `deskripsi` varchar(255) DEFAULT NULL,
  `tgl` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `log`
--

INSERT INTO `log` (`no`, `user`, `deskripsi`, `tgl`) VALUES
(95, 'wildan', 'Menambahkan data Activity Baru', '2022-09-15 10:11:22'),
(96, 'wildan', 'Menambahkan data Activity Baru', '2022-09-15 14:31:52'),
(97, 'wildan', 'Menambahkan data Activity Baru', '2022-09-16 08:46:54'),
(98, 'wildan', 'Menambahkan data Activity Baru', '2022-09-16 08:50:40'),
(99, 'wildan', 'Menambahkan data Activity Baru', '2022-09-28 11:39:59'),
(100, 'wildan', 'Menambahkan data Activity Baru', '2022-09-28 11:41:24'),
(101, 'wildan', 'Update Status Activity', '2022-09-28 11:46:18'),
(102, 'Wildan Auliana', 'Menambahkan data komputer Baru dengan id ', '2022-09-28 13:49:05'),
(103, 'Wildan Auliana', 'Menambahkan data komputer Baru dengan id ', '2022-09-28 13:58:34'),
(104, 'Wildan Auliana', 'Menambahkan data komputer Baru dengan id ', '2022-09-28 13:59:17'),
(105, 'Wildan Auliana', 'Menambahkan data komputer Baru dengan id ', '2022-09-28 14:00:52'),
(106, 'Wildan Auliana', 'Menambahkan data komputer Baru dengan id LT28092022030', '2022-09-28 15:45:21'),
(107, 'wildan', 'Menambahkan data Logbook Baru', '2022-09-29 14:19:14'),
(108, 'wildan', 'Menambahkan data Logbook Baru', '2022-09-30 07:39:40'),
(109, 'wildan', 'Menambahkan data Logbook Baru', '2022-09-30 07:41:16'),
(110, 'wildan', 'Menambahkan data Pengukuran suhu baru', '2022-09-30 09:05:08');

-- --------------------------------------------------------

--
-- Struktur dari tabel `logbook`
--

CREATE TABLE `logbook` (
  `id` int(11) NOT NULL,
  `petugas` varchar(160) NOT NULL,
  `instansi` varchar(60) NOT NULL,
  `status` int(1) NOT NULL COMMENT '0: Internal, 1: Eksternal',
  `kepentingan` varchar(255) NOT NULL,
  `tgl_masuk` datetime NOT NULL,
  `tgl_keluar` datetime DEFAULT NULL,
  `tgl_input` datetime NOT NULL DEFAULT current_timestamp(),
  `username` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `logbook`
--

INSERT INTO `logbook` (`id`, `petugas`, `instansi`, `status`, `kepentingan`, `tgl_masuk`, `tgl_keluar`, `tgl_input`, `username`) VALUES
(2, 'TEST', 'TEST', 0, 'TEST', '2022-09-29 14:18:00', '0000-00-00 00:00:00', '2022-09-29 14:19:14', 'wildan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `mst_alkom`
--

CREATE TABLE `mst_alkom` (
  `no` int(11) DEFAULT NULL,
  `id_tlf` varchar(35) NOT NULL,
  `tipe` int(1) DEFAULT NULL,
  `desc_barang` varchar(50) DEFAULT NULL,
  `lokasi` varchar(35) DEFAULT NULL,
  `extensi` varchar(25) DEFAULT NULL,
  `tgl_garansi` varchar(10) DEFAULT NULL,
  `tgl_terima` datetime DEFAULT NULL,
  `tgl_update` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `update_by` varchar(35) DEFAULT NULL,
  `status` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `mst_alkom`
--

INSERT INTO `mst_alkom` (`no`, `id_tlf`, `tipe`, `desc_barang`, `lokasi`, `extensi`, `tgl_garansi`, `tgl_terima`, `tgl_update`, `update_by`, `status`) VALUES
(NULL, 'SP21072020001', 0, 'Samsung A-20', 'NS.ANTHURIUM', '081310829266', '9-09-08', '2020-07-21 11:25:01', '2020-07-21 11:25:01', 'Muhammad Resha Mantik', '0'),
(NULL, 'TL21072020001', 1, 'Panasonic', 'NS.ANTHURIUM', '2400', '9-09-08', '2020-07-21 11:23:32', '2020-07-21 11:23:32', 'Muhammad Resha Mantik', '0'),
(NULL, 'TL21072020002', 1, 'Panasonic', 'ADMIN UMUM', '2401', '9-09-08', '2020-07-21 11:26:26', '2020-07-21 11:26:26', 'Muhammad Resha Mantik', '0'),
(NULL, 'TL21072020003', 1, 'KRISBOW', 'SDM', '2401', '9-09-08', '2020-07-21 11:27:19', '2020-07-21 11:27:19', 'Muhammad Resha Mantik', '0'),
(NULL, 'TL21072020004', 1, 'Panasonic', 'Keuangan', '1210', '04-03-2018', '2020-07-21 11:53:34', '2020-07-21 11:53:34', 'Muhammad Resha Mantik', '0'),
(NULL, 'TL21072020005', 1, 'Panasonic', 'Billing', '2301', '9-09-08', '2020-07-21 11:54:04', '2020-07-21 11:54:04', 'Muhammad Resha Mantik', '0'),
(NULL, 'TL21072020006', 1, 'Panasonic', 'NS.ASOKA', '2300', '9-09-08', '2020-07-21 11:55:50', '2020-07-21 11:55:50', 'Muhammad Resha Mantik', '0');

-- --------------------------------------------------------

--
-- Struktur dari tabel `mst_bagian`
--

CREATE TABLE `mst_bagian` (
  `id` int(11) NOT NULL,
  `nama` varchar(160) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `mst_bagian`
--

INSERT INTO `mst_bagian` (`id`, `nama`) VALUES
(1, 'SIRS'),
(2, 'DIREKTUR'),
(3, 'KESEKRETARIATAN'),
(4, 'ADMIN UMUM'),
(5, 'KEPERAWATAN'),
(6, 'PELAYANAN MEDIS'),
(7, 'SDM'),
(8, 'PT RSIH'),
(9, 'MANAJER SDM DAN UMUM'),
(10, 'MANAJER KEPERAWATAN'),
(11, 'MANAJER PELAYANAN MEDIS'),
(12, 'MARKETING'),
(13, 'DIGITAL MARKETING'),
(14, 'KEUANGAN'),
(15, 'AKUNTANSI'),
(16, 'ANTHURIUM'),
(17, 'ASOKA'),
(18, 'FARMASI RANAP'),
(19, 'AKASIA'),
(20, 'ICU - HCU'),
(21, 'PERINATOLOGI'),
(22, 'AZALEA'),
(23, 'VK'),
(24, 'OK'),
(25, 'REKAM MEDIS'),
(26, 'PENDAFTARAN'),
(27, 'KASIR'),
(28, 'BILLING RAWAT JALAN'),
(29, 'BILLING RAWAT INAP'),
(30, 'POLI DEPAN'),
(31, 'POLI BELAKANG'),
(32, 'FARMASI RAJAL'),
(33, 'FARMASI IGD'),
(34, 'IGD'),
(35, 'RADIOLOGI'),
(36, 'LABORATORIUM'),
(37, 'LOGISTIK'),
(38, 'BINATU'),
(39, 'FARMASI GUDANG');

-- --------------------------------------------------------

--
-- Struktur dari tabel `mst_kegiatan`
--

CREATE TABLE `mst_kegiatan` (
  `id` int(11) NOT NULL,
  `nama` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `mst_kegiatan`
--

INSERT INTO `mst_kegiatan` (`id`, `nama`) VALUES
(1, 'Maintenance SIMRS'),
(2, 'Maintenance Jaringan'),
(3, 'Jaringan'),
(4, 'SIMRS'),
(5, 'Hardware'),
(6, 'Software'),
(7, 'Support');

-- --------------------------------------------------------

--
-- Struktur dari tabel `mst_komputer`
--

CREATE TABLE `mst_komputer` (
  `id_komp` varchar(35) NOT NULL,
  `tipe` int(1) DEFAULT NULL COMMENT '0: LAPTOP, 1: PC',
  `desc_barang` varchar(35) DEFAULT NULL,
  `lokasi` int(5) DEFAULT NULL,
  `user` varchar(35) DEFAULT NULL,
  `tgl_terima` datetime DEFAULT NULL,
  `tgl_garansi` varchar(10) DEFAULT NULL,
  `spesifikasi` varchar(200) DEFAULT NULL,
  `ip_address` varchar(15) DEFAULT NULL,
  `mac_address` varchar(35) DEFAULT NULL,
  `anydesk` varchar(30) DEFAULT NULL,
  `jmlh_instal` varchar(3) DEFAULT NULL,
  `tgl_instal_terakhir` datetime DEFAULT NULL,
  `tgl_update` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `update_by` varchar(35) DEFAULT NULL,
  `status` varchar(20) DEFAULT NULL COMMENT '0: AKTIF, 1: NON AKTIF'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `mst_komputer`
--

INSERT INTO `mst_komputer` (`id_komp`, `tipe`, `desc_barang`, `lokasi`, `user`, `tgl_terima`, `tgl_garansi`, `spesifikasi`, `ip_address`, `mac_address`, `anydesk`, `jmlh_instal`, `tgl_instal_terakhir`, `tgl_update`, `update_by`, `status`) VALUES
('LT15102020027', 0, 'ASUS A409J', 0, 'FEBRIAN IBRAHIM', '2020-10-15 09:49:48', '2022-10-13', 'CORE I3 GEN 10, RAM 4GB, HDD 1TB, NO LAN', '-', 'C8-B2-9B-7D-F4-42', '-', NULL, NULL, '2020-10-15 09:50:21', 'Wildan Auliana', '0'),
('LT17062020001', 0, 'Laptop', 0, 'Harwanti Lustianingsih', '0000-00-00 00:00:00', '', 'Mother Board : X453SA\nProcessor : Intel Celeron 1.60GHz\nRam : 2 GB\nVGA : 1 GB\n', '172.0.40.129', '2C-56-DC-BC-37-BE', '', '', '0000-00-00 00:00:00', '2020-07-21 13:40:08', 'Wildan Auliana', '0'),
('LT17062020002', 0, 'Laptop', 0, '', '0000-00-00 00:00:00', '', 'Mother Board : HP 240 G6 Notebook PC\nProcessor : Intel Core i3 2.00GHz\nRam : 4GB\nVGA : 2GB\n', '172.0.40.155', '48-BA-4E-4B-CA-80', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'Wildan Auliana', '0'),
('LT17062020003', 0, 'Laptop', 0, '', '0000-00-00 00:00:00', '', 'Mother Board : HP 14 Notebook PC\nProcessor : Intel Core i3 2.40GHz\nRam : 2GB\nVGA : 1GB\n', '172.0.40.201', 'A0-2B-B8-28-4A-4B', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'Wildan Auliana', '0'),
('LT17062020004', 0, 'Laptop', 0, '', '0000-00-00 00:00:00', '', 'Mother Board : HP 14 Notebook PC\nProcessor : Intel Core i3 2.40GHz\nRam : 2GB\nVGA : 1 GB\n', '172.0.40.251', '14-2D-27-11-FA-93', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'Wildan Auliana', '0'),
('LT17062020005', 0, 'Laptop', 0, '', '0000-00-00 00:00:00', '', 'Mother Board : HP 14 Notebook PC\nProcessor : Intel Core i3 2.40GHz\nRam : 2GB\nVGA : 1GB\n', '172.0.20.183', '9C-D2-1E-D1-F9-DC', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'Wildan Auliana', '0'),
('LT21072020028', 0, 'Laptop HP', 0, 'HASTINI HADIYANTI', '2020-07-21 10:16:32', '9-09-08', 'Mother Board : HP 14 Notebook PC\r\nProcessor : Intel Core i3-3110M 2.40GHz\r\nRam : 2 GB\r\nVGA : Onboard\r\n', '172.0.120.238', 'A0-2B-B8-28-50-6C', '342 743 426', NULL, NULL, '2020-07-21 10:16:32', 'Muhammad Resha Mantik', '0'),
('LT21072020029', 0, 'Laptop DELL', 0, 'ATRI', '2020-07-21 11:35:52', '9-09-08', 'Mother Board : DELL Inspiron 3443\r\nProcessor : Intel Core i5-5200u 2.20GHz\r\nRam : 4 GB\r\nVGA : 2GB\r\n', '172.0.120.234', '20-47-47-46-41-0F', '397685220', NULL, NULL, '2020-07-21 11:35:52', 'Muhammad Resha Mantik', '0'),
('LT28092022028', 0, 'test', 0, 'test', '2022-09-28 13:49:05', '2022-09-29', 'test', '', '35232', '2626e2', NULL, NULL, '2022-09-28 13:49:05', 'Wildan Auliana', '0'),
('LT28092022029', 0, 'TEST TAMBAH KOMPUTER BARU', 0, 'Test test', '2022-09-28 13:58:34', '2022-09-28', '', '', '1235', '12456', NULL, NULL, '2022-09-28 13:58:34', 'Wildan Auliana', '0'),
('LT28092022030', 0, 'TEST TAMBAH LAPTOP BARU', 15, 'test', '2022-09-28 15:45:21', '2022-09-28', '', '', '1245`45', '145145', NULL, NULL, '2022-09-28 15:45:21', 'Wildan Auliana', '0'),
('PC17062020001', 1, 'PC / Personal Computer', 0, 'RIAN ARIANSYAH', '0000-00-00 00:00:00', '04-03-2018', 'Mother Board : H81H3-M4\r\nProcessor : Intel Core i5 -2400\r\nRam : 4 GB\r\nVGA : Onboard\r\n', '172.0.40.170', '00-E2-690A-FA-48', '562 181 242', '', '0000-00-00 00:00:00', '2020-07-21 09:19:17', 'Wildan Auliana', '0'),
('PC17062020002', 1, 'PC / Personal Computer', 0, 'WIDI', '0000-00-00 00:00:00', '', 'Mother Board : H81MLV3\nProcessor : Intel Core i5 3.20 GHz\nRam : 4GB\nVGA : 3GB\n', '172.0.40.124', 'B8-97-5A-C2-95-7B', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'Wildan Auliana', '0'),
('PC17062020003', 1, 'PC / Personal Computer', 0, 'SITI NURHAYATI', '0000-00-00 00:00:00', '04-03-2018', 'Mother Board : H81M-DS2\r\nProcessor : Intel Core i3 3.60GHz\r\nRam : 4 GB\r\nVGA : onboard\r\n', '172.0.40.76', '40-8D-5C-D7-E2-F0', '935 521 724', '', '0000-00-00 00:00:00', '2020-07-21 09:31:44', 'Wildan Auliana', '0'),
('PC17062020004', 1, 'PC / Personal Computer', 0, 'CITRA ZULISTYA', '0000-00-00 00:00:00', '04-03-2018', 'Mother Board : H81M-DS2\r\nProcessor : Intel Core i3-4160 3.60GHz\r\nRam : 4 GB\r\nVGA : onbiard\r\n', '172.0.120.230', '40-8D-5C-D7-D9-DA', '240 435 319', '', '0000-00-00 00:00:00', '2020-07-21 10:10:49', 'Wildan Auliana', '0'),
('PC17062020005', 1, 'PC / Personal Computer', 0, 'FUJI ASTUTI PUSPITASARI NURUL JANAH', '0000-00-00 00:00:00', '2020-06-17', 'Mother Board : H81M-DS2\r\nProcessor : Intel Core i3-4160 3.60GHz\r\nRam : 4 GB\r\nVGA : Onboard\r\n', '172.0.120.236', '40-8D-5C-D7-DD-9E', '2324561', '', '0000-00-00 00:00:00', '2020-07-21 11:50:23', 'Wildan Auliana', '0'),
('PC17062020006', 1, 'PC / Personal Computer', 0, 'Irnatia', '0000-00-00 00:00:00', '2020-12-05', 'Mother Board : H81M-DS2\r\nProcessor : Intel Core i3 3.70 GHz\r\nRam : 4GB\r\nVGA : 1.5 GB\r\n', '172.0.40.123', 'E0-D5-5E-9A-4B-4D', '12345', '', '0000-00-00 00:00:00', '2020-06-17 09:35:07', 'Wildan Auliana', '0'),
('PC17062020007', 1, 'PC / Personal Computer', 0, '', '0000-00-00 00:00:00', '', 'Mother Board : H8 1M-DS2\nProcessor : Intel Core i3 3.60 GHz\nRam : 4GB RAM\nVGA : 1.5 GB\n', '172.0.40.120', '40-8D-5C-D7-E2-EF', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'Wildan Auliana', '0'),
('PC17062020008', 1, 'PC / Personal Computer', 0, '', '0000-00-00 00:00:00', '', 'Mother Board : H81M-DS2 \nProcessor : Intel Core i3 3.70GHz\nRam : 4GB\nVGA : 2GB\n', '172.0.40.239', 'E0-D5-5E-9F-DC-22', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'Wildan Auliana', '0'),
('PC17062020009', 1, 'PC / Personal Computer', 0, 'Kartini Cendrawasih', '0000-00-00 00:00:00', '04-03-2018', 'Mother Board : H81M-DS2\r\nProcessor : Intel Core i3-4160 3.60GHz\r\nRam : 4 GB\r\nVGA : Onboard\r\n', '172.0.40.38', '40-8D-5C-D7-DD-B7', '228 977 123', '', '0000-00-00 00:00:00', '2020-07-21 09:39:09', 'Wildan Auliana', '0'),
('PC17062020010', 1, 'PC / Personal Computer', 0, '', '0000-00-00 00:00:00', '', 'Mother Board : H81M-S1\nProcessor : Intel Core i3 3.60 GHz\nRam : 4 GB\nVGA : 1.5 GB\n', '172.0.20.63', 'FC-AA-14-FF-58-61', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'Wildan Auliana', '0'),
('PC17062020011', 1, 'PC / Personal Computer', 0, '', '0000-00-00 00:00:00', '', 'Mother Board : MS-7788\nProcessor : Intel Core i3 3.30 GHz\nRam : 4GB\nVGA : 1.5 GB\n', '172.0.40.91', 'D8-CB-8A-1F-A3-B2', '', '1', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'Wildan Auliana', '0'),
('PC17062020012', 1, 'PC / Personal Computer', 0, '', '0000-00-00 00:00:00', '', 'Mother Board : H81M-DS2\nProcessor : Intel core i3 3.70 GHz\nRam : 4GB\nVGA : 2GB\n', '172.0.40.67', 'EC-08-6B-15-3A-DF', '', '1', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'Wildan Auliana', '0'),
('PC17062020013', 1, 'PC / Personal Computer', 0, 'NURAN', '0000-00-00 00:00:00', '04-03-2018', 'Mother Board : H81M-DS2\r\nProcessor : Intel Core i3-4160 3.60GHz\r\nRam : 4 GB\r\nVGA : Onboard\r\n', '172.0.80.19', '40-8D-5C-D7-DD-BE', '12345', '', '0000-00-00 00:00:00', '2020-07-21 11:03:49', 'Wildan Auliana', '0'),
('PC17062020014', 1, 'PC / Personal Computer', 0, 'MELAN', '0000-00-00 00:00:00', '04-03-2018', 'Mother Board : H81M-DS2\r\nProcessor : Intel core i3-4170 3.70 GHz\r\nRam : 4GB\r\nVGA : Onboard\r\n', '172.0.80.18', 'FC-AA-14-FE-DF-D6', '12345', '', '0000-00-00 00:00:00', '2020-07-21 10:54:28', 'Wildan Auliana', '0'),
('PC17062020015', 1, 'PC / Personal Computer', 0, 'MILA', '0000-00-00 00:00:00', '04-03-2018', 'Mother Board : H81M-DS2\r\nProcessor : Intel Core i3-4160 3.60GHz\r\nRam : 4 GB\r\nVGA : Onboard\r\n', '172.0.80.20', '40-8D-5C-F9-3E-2F', '12345', '', '0000-00-00 00:00:00', '2020-07-21 11:00:48', 'Wildan Auliana', '0'),
('PC17062020016', 1, 'PC / Personal Computer', 0, 'NURDIN', '0000-00-00 00:00:00', '04-03-2018', 'Mother Board : H81M-S1\r\nProcessor : Intel Core i3-4160 3.60 GHz\r\nRam : 4 GB\r\nVGA : Onboard\r\n', '172.0.80.22', '40-8D-5C-F0-20-90', '12345', '', '0000-00-00 00:00:00', '2020-07-21 10:51:58', 'Wildan Auliana', '0'),
('PC17062020017', 1, 'PC / Personal Computer', 0, 'NS Asoka', '0000-00-00 00:00:00', '04-03-2018', 'Mother Board : H81M-DS2\r\nProcessor : Intel Core i34160 3.60GHz\r\nRam : 4 GB\r\nVGA : Onboard\r\n', '172.0.100.14', '40-8D-5C-D7-DD-A1', '183 444 181', '1', '0000-00-00 00:00:00', '2020-07-21 10:23:37', 'Wildan Auliana', '0'),
('PC17062020018', 1, 'PC / Personal Computer', 0, 'Billing', '0000-00-00 00:00:00', '2020-06-17', 'Mother Board : -\r\nProcessor : Intel Core i3-4170 3.70 GHz\r\nRam : 4 GB\r\nVGA : Onboard\r\n', '172.0.80.13', '00-30-18-CC-1C-02', '904602491', '', '0000-00-00 00:00:00', '2020-07-21 10:33:50', 'Wildan Auliana', '0'),
('PC17062020019', 1, 'PC / Personal Computer', 0, 'GITA GIRINA MARTAHA', '0000-00-00 00:00:00', '04-03-2018', 'Mother Board : H81M-S1\r\nProcessor : Intel Core i34160 3.60 GHz\r\nRam : 4 GB\r\nVGA : Onboard\r\n', '172.0.80.14', '40-8D-5C-F0-24-87', '752059733', '', '0000-00-00 00:00:00', '2020-07-21 10:41:26', 'Wildan Auliana', '0'),
('PC17062020020', 1, 'PC / Personal Computer', 0, 'Billing', '0000-00-00 00:00:00', '04-03-2018', 'Mother Board : H81M-S1\r\nProcessor : Intel core i34160 3.70 GHz\r\nRam : 4GB\r\nVGA : Onboard\r\n', '172.0.40.27', 'FC-AA-14-FE-71-DD', '751110126', '', '0000-00-00 00:00:00', '2020-07-21 10:36:27', 'Wildan Auliana', '0'),
('PC17062020021', 1, 'PC / Personal Computer', 0, 'KUSDINAR', '0000-00-00 00:00:00', '04-03-2018', 'Mother Board : H81M-DS2\r\nProcessor : Intel Core i3-4160 3.60 GHz\r\nRam : 4 GB\r\nVGA : Onboard\r\n', '172.0.80.15', '40-8D-5C-D7-DD-B6', '549103256', '', '0000-00-00 00:00:00', '2020-07-21 10:30:34', 'Wildan Auliana', '0'),
('PC17062020022', 1, 'PC / Personal Computer', 0, 'NS anthurium', '0000-00-00 00:00:00', '04-03-2018', 'Mother Board : gigabyte\r\nProcessor :Intel Pentium 2030 3.00 GHz\r\nRam : 4 GB\r\nVGA : onboard\r\n', '172.0.100.22', '74-D4-35-27-EE-30', '623044624', '', '0000-00-00 00:00:00', '2020-07-21 10:20:12', 'Wildan Auliana', '0'),
('PC17062020023', 1, 'PC / Personal Computer', 0, '', '0000-00-00 00:00:00', '', 'Mother Board : H61MLV3\nProcessor :Intel Core i3 2100 3.10\nRam : 4 GB\nVGA : 1 GB\n', '172.0.40.85', 'B8-97-5A-6F-BC-3F', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'Wildan Auliana', '0'),
('PC17062020024', 0, 'PC / Personal Computer', 0, '', '0000-00-00 00:00:00', '', 'Mother Board : H81M-DS2\nProcessor : Intel core i3 3.70Hz\nRam : 4 GB\nVGA : 1GB\n', '172.0.40.143', 'FC-AA-14-FE-DF-D1', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'Wildan Auliana', '0'),
('PC17062020025', 0, 'PC / Personal Computer', 0, '', '0000-00-00 00:00:00', '', 'Mother Board : H81M-DS2\nProcessor : Intel Core i3-8100 3.60GHz\nRam : 4GB\nVGA : 2GB\n', '172.0.40.207', 'B4-2E-99-52-5C-92', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'Wildan Auliana', '0'),
('PC17062020026', 0, 'PC / Personal Computer', 0, '', '0000-00-00 00:00:00', '', 'Mother Board : H81M-DS2\nProcessor : Intel core i3 4170 3.70Hz\nRam : 4 GB\nVGA : 1GB\n', '172.0.40.96', '1C-1B-0D-98-42-4A', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'Wildan Auliana', '0'),
('PC17062020027', 0, 'PC / Personal Computer', 0, '', '0000-00-00 00:00:00', '', 'Mother Board :\nProcessor :\nRam :\nVGA :\n', '', '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'Wildan Auliana', '0'),
('PC17062020028', 0, 'PC / Personal Computer', 0, '', '0000-00-00 00:00:00', '', 'Mother Board : Inspiron one 2020\nProcessor :\nRam : 2GB\nVGA : 1GB\n', '172.0.20.57', 'C8-1F-66-38-A8-75', '', '1', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'Wildan Auliana', '0'),
('PC17062020029', 0, 'PC / Personal Computer', 0, '', '0000-00-00 00:00:00', '', 'Mother Board : MS-7A15\nProcessor : Intel Core i3-7100 3.90GHz\nRam : 4GB\nVGA : 2GB\n', '172.0.20.16', '00-D8-61-0E-3C-C4', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'Wildan Auliana', '0'),
('PC17062020030', 0, 'PC / Personal Computer', 0, '', '0000-00-00 00:00:00', '', 'Mother Board : H81M-DS2\nProcessor : Intel core i3 3.70Hz\nRam : 4 GB\nVGA : 1GB\n', '172.0.20.203', 'FC-AA-14-FE-DF-0B', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'Wildan Auliana', '0'),
('PC17062020031', 0, 'PC / Personal Computer', 0, '', '0000-00-00 00:00:00', '', 'Mother Board : H81M-DS2 2.0\nProcessor : Intel core i3 3.60Hz\nRam : 4 GB\nVGA : 1GB\n', '172.0.40.118', 'B4-2E-99-52-5C-95', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'Wildan Auliana', '0'),
('PC17062020032', 0, 'PC / Personal Computer', 0, '', '0000-00-00 00:00:00', '', 'Mother Board :\nProcessor :\nRam : 16GB\nVGA :\n', '172,0,40,210', '54-BF-64-8C-13-AB', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'Wildan Auliana', '0'),
('PC17062020033', 0, 'PC / Personal Computer', 0, '', '0000-00-00 00:00:00', '', 'Mother Board : Inspiron one 2020\nProcessor : Intel Pentium g2030T 2.60GHz\nRam : 2GB\nVGA : 1GB\n', '172.0.40.198', 'C8-1F-66-38-A8-ED', '', '1', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'Wildan Auliana', '0'),
('PC17062020034', 0, 'PC / Personal Computer', 0, '', '0000-00-00 00:00:00', '', 'Mother Board : H81M-DS2\nProcessor : Intel core i3 3.70Hz\nRam : 4 GB\nVGA : 3GB\n', '172,0,40,156', 'EO-D5-5E-1F-40-5E', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'Wildan Auliana', '0'),
('PC17062020035', 0, 'PC / Personal Computer', 0, '', '0000-00-00 00:00:00', '', 'Mother Board : HP 14\nProcessor : Intel Core i3\nRam :2GB\nVGA : 1GB\n', '172.0.40.29', 'A0-2B-B8-28-4A-AD', '', '2', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'Wildan Auliana', '0'),
('PC17062020036', 0, 'PC / Personal Computer', 0, '', '0000-00-00 00:00:00', '', 'Mother Board : Intel Premium 3.00 Ghz\nProcessor : \nRam : 4GB\nVGA : 1GB\n', '172,0,40,154', '74-D4-35-20-3F-9F', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'Wildan Auliana', '0'),
('PC17062020037', 0, 'PC / Personal Computer', 0, '', '0000-00-00 00:00:00', '', 'Mother Board : H81M-DS1\nProcessor : Intel core i3 3.60Hz\nRam : 4 GB\nVGA : 3GB\n', '172.0.40.21', '40-8D-5C-F0-24-59', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'Wildan Auliana', '0'),
('PC17062020038', 0, 'PC / Personal Computer', 0, '', '0000-00-00 00:00:00', '', 'Mother Board : H81M-DS2\nProcessor : Intel core i3 3.70Hz\nRam : 4 GB\nVGA : 1GB\n', '172,0,40,238', '1C-1B-0D-D9-E4-04', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'Wildan Auliana', '0'),
('PC17062020039', 0, 'PC / Personal Computer', 0, '', '0000-00-00 00:00:00', '', 'Mother Board : H81M-DS2\nProcessor : Intel core i3 3.60Hz\nRam : 4 GB\nVGA : 1GB\n', '172,0,40,190', '40-8D-5C-D7-DA-4F', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'Wildan Auliana', '0'),
('PC17062020040', 0, 'PC / Personal Computer', 0, '', '0000-00-00 00:00:00', '', 'Mother Board : H81M-DS2\nProcessor : Intel core i3 4170 3.60Hz\nRam : 4 GB\nVGA : 1GB\n', '172.0.40.202', 'E0-D5-5E-9D-E2-4F', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'Wildan Auliana', '0'),
('PC17062020041', 0, 'PC / Personal Computer', 0, '', '0000-00-00 00:00:00', '', 'Mother Board :\nProcessor :Intel Core i3 8100 2.60Ghz\nRam : 4GB\nVGA :2GB\n', '172.0.40.216', '172.0.40.216', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'Wildan Auliana', '0'),
('PC17062020042', 0, 'PC / Personal Computer', 0, '', '0000-00-00 00:00:00', '', 'Mother Board :\nProcessor :Intel Core i3 8100 2.60Ghz\nRam : 4GB\nVGA :2GB\n', '172.0.40.180', '70-85-C2-87-37-5C', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'Wildan Auliana', '0'),
('PC21072020024', 1, 'PC / Personal Computer', 0, 'PUTRI RIZQY', '2020-07-21 10:05:21', '9-09-08', 'Mother Board : H310M DS2 2.0\r\nProcessor : Intel Core i3-9100f 3.60GHz\r\nRam : 4 GB\r\nVGA : 2GB\r\n', '172.0.120.4', 'B4-2E-99-B2-C5-82', '983 907 778', NULL, NULL, '2020-07-21 10:05:21', 'Muhammad Resha Mantik', '0'),
('PC21072020025', 1, 'PC / Personal Computer', 0, 'SALMA FIRYAL', '2020-07-21 10:47:49', '9-09-08', 'Mother Board : H310M DS2 2.0\r\nProcessor : Intel CORE i3-8100 3.60GHz\r\nRam : 4 GB\r\nVGA : Onboard\r\n', '', 'B4-2E-99-52-5C-97', '12345', NULL, NULL, '2020-07-21 10:47:49', 'Muhammad Resha Mantik', '0'),
('PC21072020026', 1, 'PC / Personal Computer', 0, 'Billing', '2020-07-21 11:09:53', '9-09-08', 'Mother Board : H310M DS2 2.0\r\nProcessor : Intel Core i3-9100f 3.60GHz\r\nRam : 8 GB\r\nVGA : 2GB Nvidia Gforce\r\n', '172.0.80.30', 'B4-2E-99-DC-E6-F9', '662941886', NULL, NULL, '2020-07-21 11:09:53', 'Muhammad Resha Mantik', '0'),
('PC28092022027', 1, 'TEST TAMBAH KOMPUTER BARU', 0, 'Test test', '2022-09-28 13:59:17', '2022-09-28', '', '', '123', '123', NULL, NULL, '2022-09-28 13:59:17', 'Wildan Auliana', '0'),
('PC28092022028', 1, 'TEST TAMBAH KOMPUTER BARU', 33, '123', '2022-09-28 14:00:52', '2022-09-28', '', '', '123', '123', NULL, NULL, '2022-09-28 14:00:52', 'Wildan Auliana', '0');

-- --------------------------------------------------------

--
-- Struktur dari tabel `mst_printer`
--

CREATE TABLE `mst_printer` (
  `no` int(11) DEFAULT NULL,
  `id_prnt` varchar(35) NOT NULL,
  `tipe` varchar(35) DEFAULT NULL,
  `lokasi` varchar(35) DEFAULT NULL,
  `ip_address` varchar(15) DEFAULT NULL,
  `tgl_garansi` varchar(10) DEFAULT NULL,
  `tgl_terima` datetime DEFAULT NULL,
  `tgl_isi_tinta` datetime DEFAULT NULL,
  `tgl_perawatan` datetime DEFAULT NULL,
  `tgl_update` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `update_by` varchar(35) DEFAULT NULL,
  `status` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `mst_printer`
--

INSERT INTO `mst_printer` (`no`, `id_prnt`, `tipe`, `lokasi`, `ip_address`, `tgl_garansi`, `tgl_terima`, `tgl_isi_tinta`, `tgl_perawatan`, `tgl_update`, `update_by`, `status`) VALUES
(NULL, 'PR17062020001', 'EPSON L360 (C462H)', 'Ruang Admin Umum', '172.0.120.239', '2020-06-17', '2020-06-17 09:27:29', NULL, NULL, '2020-07-21 11:20:29', 'Wildan Auliana', '0'),
(NULL, 'PR17062020002', 'EPSON L220 (C462H)', 'Ruang SDM', '172.0.40.76', '2020-06-17', '2020-06-17 09:28:21', NULL, NULL, '2020-06-17 09:28:21', 'Wildan Auliana', '0'),
(NULL, 'PR17062020003', 'EPSON L360 (C462H)', 'Ruang Marketing', '172.0.40.123', '2020-06-17', '2020-06-17 09:29:22', NULL, NULL, '2020-06-17 09:29:22', 'Wildan Auliana', '0'),
(NULL, 'PR17062020004', 'EPSON L220 (C462H)', 'Ruang Sekretariat', '172.0.40.239', '2020-06-17', '2020-06-17 09:30:00', NULL, NULL, '2020-06-17 09:30:00', 'Wildan Auliana', '0'),
(NULL, 'PR17062020005', 'EPSON L220 (C462H)', 'Ruang Keperawatan', '172.0.120.252', '2020-06-17', '2020-06-17 09:30:33', NULL, NULL, '2020-07-21 11:21:09', 'Wildan Auliana', '0'),
(NULL, 'PR17062020006', 'EPSON L210 (C462H)', 'NS. Akasia', '172.0.40.91', '2020-06-17', '2020-06-17 09:31:02', NULL, NULL, '2020-06-17 09:31:02', 'Wildan Auliana', '0'),
(NULL, 'PR21072020007', 'Epson L220', 'Billing1', '172.0.80.15', '9-09-08', '2020-07-21 11:11:49', NULL, NULL, '2020-07-21 11:11:49', 'Muhammad Resha Mantik', '0'),
(NULL, 'PR21072020008', 'EPSON L3110', 'KEUANGAN', '172.0.80.14', '9-09-08', '2020-07-21 11:13:23', NULL, NULL, '2020-07-21 11:13:23', 'Muhammad Resha Mantik', '0'),
(NULL, 'PR21072020009', 'Epson LX310', 'Billing4', '172.0.80.30', '9-09-08', '2020-07-21 11:14:51', NULL, NULL, '2020-07-21 11:14:51', 'Muhammad Resha Mantik', '0'),
(NULL, 'PR21072020010', 'Epson LX310', 'BILLING 3', '172.0.80.50', '9-09-08', '2020-07-21 11:15:50', NULL, NULL, '2020-07-21 11:15:50', 'Muhammad Resha Mantik', '0'),
(NULL, 'PR21072020011', 'Epson L220', 'NS.ASOKA', '172.0.100.14', '9-09-08', '2020-07-21 11:17:33', NULL, NULL, '2020-07-21 11:17:33', 'Muhammad Resha Mantik', '0'),
(NULL, 'PR21072020012', 'Epson L220', 'NS.ASOKA', '172.0.100.14', '9-09-08', '2020-07-21 11:18:34', NULL, NULL, '2020-07-21 11:18:34', 'Muhammad Resha Mantik', '0'),
(NULL, 'PR21072020013', 'Epson L220', 'NS.ANTHURIUM', '172.0.100.22', '9-09-08', '2020-07-21 11:19:08', NULL, NULL, '2020-07-21 11:19:08', 'Muhammad Resha Mantik', '0');

-- --------------------------------------------------------

--
-- Struktur dari tabel `suhu`
--

CREATE TABLE `suhu` (
  `id` int(11) NOT NULL,
  `petugas` varchar(60) NOT NULL,
  `waktucek` datetime NOT NULL,
  `suhu` int(11) NOT NULL,
  `kelembaban` int(11) NOT NULL,
  `username` varchar(60) NOT NULL,
  `tgl_input` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `suhu`
--

INSERT INTO `suhu` (`id`, `petugas`, `waktucek`, `suhu`, `kelembaban`, `username`, `tgl_input`) VALUES
(1, 'WILDAN', '2022-09-30 03:29:38', 18, 80, 'wildan', '2022-09-30 08:30:03'),
(2, 'TEST', '2022-09-30 09:04:00', 10, 80, 'wildan', '2022-09-30 09:05:08');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `username` varchar(35) NOT NULL DEFAULT '',
  `password` varchar(100) DEFAULT NULL,
  `nama_lengkap` varchar(100) DEFAULT NULL,
  `bagian` varchar(5) DEFAULT NULL,
  `level` int(1) NOT NULL COMMENT '0: ADMINISTRATOR, 1:USER',
  `status` int(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`username`, `password`, `nama_lengkap`, `bagian`, `level`, `status`) VALUES
('ispan', '54e64c2548e0506d45d02f43a3ace880', 'Ispan Pajrul Fallakh', 'IT', 0, 0),
('manajer', '69b731ea8f289cf16a192ce78a37b4f0', 'Manajer Marketing Keuangan dan IT', 'Manaj', 2, 0),
('rizal', '150fb021c56c33f82eef99253eb36ee1', 'Tubagus Rizal Abdul Hamid', 'IT', 1, 0),
('wildan', 'af6b3aa8c3fcd651674359f500814679', 'Wildan Auliana', 'IT', 0, 0);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `dailyactivity`
--
ALTER TABLE `dailyactivity`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `histori_mutasi`
--
ALTER TABLE `histori_mutasi`
  ADD PRIMARY KEY (`id_mutasi`);

--
-- Indeks untuk tabel `log`
--
ALTER TABLE `log`
  ADD PRIMARY KEY (`no`);

--
-- Indeks untuk tabel `logbook`
--
ALTER TABLE `logbook`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `mst_alkom`
--
ALTER TABLE `mst_alkom`
  ADD PRIMARY KEY (`id_tlf`);

--
-- Indeks untuk tabel `mst_bagian`
--
ALTER TABLE `mst_bagian`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `mst_kegiatan`
--
ALTER TABLE `mst_kegiatan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `mst_komputer`
--
ALTER TABLE `mst_komputer`
  ADD PRIMARY KEY (`id_komp`);

--
-- Indeks untuk tabel `mst_printer`
--
ALTER TABLE `mst_printer`
  ADD PRIMARY KEY (`id_prnt`);

--
-- Indeks untuk tabel `suhu`
--
ALTER TABLE `suhu`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`username`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `dailyactivity`
--
ALTER TABLE `dailyactivity`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT untuk tabel `log`
--
ALTER TABLE `log`
  MODIFY `no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=111;

--
-- AUTO_INCREMENT untuk tabel `logbook`
--
ALTER TABLE `logbook`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `mst_bagian`
--
ALTER TABLE `mst_bagian`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT untuk tabel `mst_kegiatan`
--
ALTER TABLE `mst_kegiatan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `suhu`
--
ALTER TABLE `suhu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
