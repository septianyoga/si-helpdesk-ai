-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 17, 2024 at 11:16 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db-sistem-pengaduan`
--

-- --------------------------------------------------------

--
-- Table structure for table `div_penerima_pengaduan`
--

CREATE TABLE `div_penerima_pengaduan` (
  `id_div` int(11) NOT NULL,
  `nama_div` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `div_penerima_pengaduan`
--

INSERT INTO `div_penerima_pengaduan` (`id_div`, `nama_div`) VALUES
(5, 'AGRO Jurusan Pertanian'),
(6, 'MESIN Jurusan Teknik Mesin'),
(7, 'JTIK'),
(8, 'Bagian Umum & Akademik'),
(9, 'AGRO'),
(10, 'JTIK Jurusan Sistem Informasi'),
(14, 'Pusat Penelitian dan Pengabdian Kepada Masyarakat'),
(15, 'Pusat Pengembahan Pembelajaran dan Penjaminan Mutu'),
(16, 'Unit Pelaksana Teknis Bahasa'),
(17, 'Unit Pelaksana Teknis TIK'),
(18, 'Unit Pelaksana Teknis Perpustakaan'),
(19, 'Unit Pelaksana Teknis Pemeliharaan'),
(20, 'Satgas Pencegahan dan Penanganan Kekerasan Seksual');

-- --------------------------------------------------------

--
-- Table structure for table `jenis_pengaduan`
--

CREATE TABLE `jenis_pengaduan` (
  `id_jenis_pengaduan` int(11) NOT NULL,
  `nama_pengaduan` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `jenis_pengaduan`
--

INSERT INTO `jenis_pengaduan` (`id_jenis_pengaduan`, `nama_pengaduan`) VALUES
(8, 'Pengaduan Umum'),
(9, 'Wistleblowing'),
(12, 'Lainnya');

-- --------------------------------------------------------

--
-- Table structure for table `lampiran_pengaduan`
--

CREATE TABLE `lampiran_pengaduan` (
  `id_lampiran_pengaduan` int(11) NOT NULL,
  `lampiran` text NOT NULL,
  `id_pengaduan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `lampiran_pengaduan`
--

INSERT INTO `lampiran_pengaduan` (`id_lampiran_pengaduan`, `lampiran`, `id_pengaduan`) VALUES
(13, '1699175295_bbecdaf4063a008d6841.png', 27),
(19, '1699365382_c30a1e48d94db618778d.png', 35),
(20, '1699881994_8e0277653d530546b08f.png', 36),
(21, '1701743051_a3b1d5f2a8472a432f8d.jpg', 46);

-- --------------------------------------------------------

--
-- Table structure for table `lampiran_pengaduan_jawab`
--

CREATE TABLE `lampiran_pengaduan_jawab` (
  `id_lampiran_jawab` int(11) NOT NULL,
  `lampiran_jawaban` text NOT NULL,
  `id_jawab` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `lampiran_pengaduan_jawab`
--

INSERT INTO `lampiran_pengaduan_jawab` (`id_lampiran_jawab`, `lampiran_jawaban`, `id_jawab`) VALUES
(10, '1701748114_48a3bcdf0c3ae247d787.jpg', 16),
(11, '1701784289_d972a889f9400c0fdd50.png', 17),
(12, '1702276094_3ebbc6aa1f0f8ce9860d.jpg', 18),
(13, '1702276094_6a7ba3777285d3f2abb7.jpg', 19),
(14, '1705238004_f7784bca5c20264573c9.png', 20),
(15, '1709094529_b6a6703cf1d7c467e251.jpeg', 21);

-- --------------------------------------------------------

--
-- Table structure for table `pengaduan`
--

CREATE TABLE `pengaduan` (
  `id_pengaduan` int(11) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `isi` text NOT NULL,
  `tgl_kejadian` date NOT NULL,
  `tempat` varchar(40) NOT NULL,
  `anonim` tinyint(1) NOT NULL,
  `status_pengaduan` enum('Di Proses','Di Tolak','Selesai','Belum Diterima') NOT NULL DEFAULT 'Belum Diterima',
  `pesan_tolak` text DEFAULT NULL,
  `ulasan` text DEFAULT NULL,
  `id_jenis_pengaduan` int(11) NOT NULL,
  `id_sub` int(11) DEFAULT NULL,
  `id_div` int(11) NOT NULL,
  `id_sub_div` int(11) DEFAULT NULL,
  `id_user` int(11) NOT NULL,
  `created_at_pengaduan` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pengaduan`
--

INSERT INTO `pengaduan` (`id_pengaduan`, `judul`, `isi`, `tgl_kejadian`, `tempat`, `anonim`, `status_pengaduan`, `pesan_tolak`, `ulasan`, `id_jenis_pengaduan`, `id_sub`, `id_div`, `id_sub_div`, `id_user`, `created_at_pengaduan`) VALUES
(27, 'Contoh 1 pengaduan', 'Ini merupakan contoh laporan pengaduan yang saya ingin adukan. Sebagai contoh atau pengujian dalam sistem ini', '2024-02-27', 'politeknik negeri subang', 0, 'Selesai', NULL, 'terima kasih', 8, NULL, 7, NULL, 795641391, '2024-02-27 13:52:25'),
(28, 'Pengaduan', 'Pengaduan', '2024-02-27', 'polsub', 0, 'Di Tolak', 'Tolak', NULL, 9, 15, 7, NULL, 795641391, '2024-02-27 14:46:49'),
(34, 'Air kering', 'Air sering kering ketika solat dzuhur', '2024-02-27', 'Musola', 1, 'Selesai', NULL, NULL, 8, NULL, 5, NULL, 1102985594, '2024-02-27 15:43:29'),
(35, 'Pemalsuan dokumen', 'Terduga ada pemalsuan dokumen ', '2024-02-27', 'Gedung serbaguna ', 1, 'Selesai', NULL, 'Terima kasih telah di respon dengan baik', 8, NULL, 7, NULL, 1379109229, '2024-02-27 15:53:31'),
(36, 'Tidak Disiplin ', 'Tidak datang tepat waktu, melakukan kesalahan ', '2024-02-27', 'Kampus', 1, 'Belum Diterima', NULL, NULL, 9, 14, 5, NULL, 1379109229, '2024-02-27 15:55:27'),
(37, 'contoh pengaduan', 'ini merupakan contoh isi laporan pengaduan', '2024-02-28', 'politeknik negeri subang', 0, 'Selesai', NULL, NULL, 8, NULL, 17, NULL, 795641391, '2024-02-28 04:22:41'),
(38, 'contoh', 'ini merupakan contoh pengaduan', '2024-02-28', 'politeknik negeri subang', 1, 'Selesai', NULL, NULL, 12, NULL, 7, NULL, 795641391, '2024-02-28 04:25:52'),
(39, 'contoh', 'contoh pengaduan', '2024-02-28', 'politeknik negeri subang', 1, 'Selesai', NULL, NULL, 9, 27, 10, NULL, 795641391, '2024-02-28 04:26:36'),
(40, 'Indsipliner Pegawai', 'Tingkat disiplin pegawai terhadap absensi pegawai', '2024-02-28', 'kampus', 1, 'Di Proses', NULL, NULL, 9, 14, 10, NULL, 1068315517, '2024-02-28 07:20:54'),
(41, 'Sinyal Wifi', 'Sinyal wifi yang digunakan saat ini sangat lambat sekali jaringannya ', '2024-02-26', 'Teori 4', 0, 'Di Proses', NULL, NULL, 8, NULL, 7, NULL, 535858917, '2024-02-28 23:59:10'),
(42, 'Sinyal wifi', 'Wifi di teori 4 nya lambat', '2024-02-26', 'Teori 4', 0, 'Di Proses', NULL, NULL, 8, NULL, 17, NULL, 535858917, '2024-03-01 01:17:52'),
(43, 'Sarana dan Prasarana', 'Sarana dan Prasarana untuk pembelajaran mahasiswa seperti proyektor dan terminal kurang maksimal', '2024-03-01', 'Gedung JTIK', 0, 'Di Proses', NULL, NULL, 8, NULL, 10, NULL, 549692405, '2024-03-01 02:53:21'),
(44, 'CONTOH 2', 'contoh', '2024-03-01', 'politeknik negeri subang', 0, 'Di Proses', NULL, NULL, 8, NULL, 5, NULL, 795641391, '2024-03-01 02:58:19'),
(45, 'contoh3', 'isi', '2024-03-01', 'politeknik negeri subang', 1, 'Belum Diterima', NULL, NULL, 12, NULL, 5, NULL, 795641391, '2024-03-01 03:03:50'),
(46, 'Pengaduan Umum', 'tes', '2024-03-17', 'Kampus 2 gedung JTIK', 0, 'Di Proses', NULL, NULL, 8, NULL, 9, 10, 535858917, '2024-03-17 08:28:58');

-- --------------------------------------------------------

--
-- Table structure for table `pengaduan_jawab`
--

CREATE TABLE `pengaduan_jawab` (
  `id_jawab` int(11) NOT NULL,
  `jawaban` text NOT NULL,
  `id_pengaduan` int(11) NOT NULL,
  `id_penjawab` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pengaduan_jawab`
--

INSERT INTO `pengaduan_jawab` (`id_jawab`, `jawaban`, `id_pengaduan`, `id_penjawab`) VALUES
(16, 'terjawab', 27, 1331892391),
(17, 'terjawab', 34, 183560420),
(18, 'terjawab', 35, 1331892391),
(19, 'memang begitu alurnya ga usah ngadu ngadu apalagi ngadi ngadi', 37, 1754319190),
(20, 'iya', 38, 948091774),
(21, 'Terima kasih aduannya', 39, 1749108236);

-- --------------------------------------------------------

--
-- Table structure for table `sub_div_penerima`
--

CREATE TABLE `sub_div_penerima` (
  `id_sub_div` int(11) NOT NULL,
  `nama_sub_div` varchar(255) NOT NULL,
  `id_div` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sub_div_penerima`
--

INSERT INTO `sub_div_penerima` (`id_sub_div`, `nama_sub_div`, `id_div`) VALUES
(1, 'Sistem Informasi', 7),
(6, 'Agro1', 5),
(7, 'Agro2', 5),
(8, 'Agro3', 5),
(9, 'Pertaian', 9),
(10, 'Perternakan', 9);

-- --------------------------------------------------------

--
-- Table structure for table `sub_jenis_pengaduan`
--

CREATE TABLE `sub_jenis_pengaduan` (
  `id_sub` int(11) NOT NULL,
  `id_jenis_pengaduan` int(11) NOT NULL,
  `nama_sub` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sub_jenis_pengaduan`
--

INSERT INTO `sub_jenis_pengaduan` (`id_sub`, `id_jenis_pengaduan`, `nama_sub`) VALUES
(13, 9, 'Kejahatan'),
(14, 9, 'Pelanggaran Disiplin'),
(15, 9, 'Buly'),
(23, 9, 'Penyalahgunaan wewenang'),
(24, 9, 'Penipuan'),
(25, 9, 'Pencurian'),
(26, 9, 'Kekerasan Seksual'),
(27, 9, 'Pemalsuan Dokumen/Nilai/Ijazah'),
(28, 9, 'Korupsi'),
(29, 9, 'Kecurangan Akademik'),
(30, 9, 'Pelanggaran UUD atau Aturan ya'),
(31, 9, 'contoh penambahan edit');

-- --------------------------------------------------------

--
-- Table structure for table `token`
--

CREATE TABLE `token` (
  `id` int(11) NOT NULL,
  `token` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `token`
--

INSERT INTO `token` (`id`, `token`) VALUES
(1, 'JsCKnP7xQtwWR@YGruJM');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `username` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` text NOT NULL,
  `no_telp` varchar(15) NOT NULL,
  `role` enum('Admin','Pelapor','Penerima Laporan') NOT NULL,
  `status` varchar(30) DEFAULT NULL,
  `status_akun` enum('Belum Terverifikasi','Terverifikasi') DEFAULT NULL,
  `token_regist` text DEFAULT NULL,
  `token_reset` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `nama`, `username`, `email`, `password`, `no_telp`, `role`, `status`, `status_akun`, `token_regist`, `token_reset`, `created_at`, `updated_at`) VALUES
(123, 'Admin 1', 'admin', 'polsublapor2014@gmail.com', 'password', '085881769505', 'Admin', NULL, NULL, NULL, '4bcff47872edf79e25dec5ca776d83eb0d0047c66d5f6cd6b53e4139b4acb6f4', '2023-10-09 13:25:19', '2024-03-17 09:34:31'),
(151863421, 'Nunu Nugraha Purnawan', 'nunu', 'nunu@polsub.ac.id', 'nunu123', '087822560017', 'Penerima Laporan', NULL, NULL, NULL, NULL, '2024-02-28 02:50:13', '2024-03-17 09:25:01'),
(183560420, 'Irna Dwi Destiana', 'Jurusan Pertanian', 'pertanianpolsub02@gmail.com', 'pertanian123', '085770464600', 'Penerima Laporan', 'Penerima', NULL, NULL, NULL, '2023-12-03 13:14:39', '2024-02-27 15:26:29'),
(238293094, 'Susilawati', 'susilawati', 'susilawatibanin@gmail.com', 'susilawati123', '085729154915', 'Penerima Laporan', NULL, NULL, NULL, NULL, '2024-02-26 02:39:13', NULL),
(248865361, 'Roni Suhartono', 'roni', 'ronie.pas@gmail.com', 'roni123', '085327881656', 'Penerima Laporan', NULL, NULL, NULL, NULL, '2024-02-28 02:48:43', NULL),
(299513732, 'Dwi Diana Putri', 'dwi', 'dwidiana29@gmail.com', 'dwi123', '082121646664', 'Penerima Laporan', NULL, NULL, NULL, NULL, '2024-02-28 02:31:03', NULL),
(375047647, 'Azhis Sholeh Buchori', 'azhis', 'azhis.s.buchori@gmail.com', 'azhis123', '081232410615', 'Penerima Laporan', NULL, NULL, NULL, NULL, '2024-02-26 02:43:20', NULL),
(535858917, 'Sima Hasina Zulfa', 'Sima', 'simahasina38@gmail.com', 'hmmmajah', '083874567579', 'Pelapor', NULL, 'Terverifikasi', '108019980c3cc5082afc33cf19b216c585fa7035775ab3f122b76e2d0058f41d', NULL, '2024-02-28 23:55:07', '2024-03-17 09:25:19'),
(549692405, 'Syifa Rizkita Ananda', 'syifara', 'syifarananda11@polsub.ac.id', 'syifarzaa11', '0895331272333', 'Pelapor', NULL, 'Terverifikasi', '0c1d63642dc395581e0e85e37a0a6b70c781a7ad16b4e2dfdc3b2616f0c53a33', NULL, '2024-03-01 02:48:52', '2024-03-01 02:50:44'),
(565604583, 'Atika Romalasari', 'atika', 'atika.romalasari@gmail.com', 'atika123', '081511337385', 'Penerima Laporan', NULL, NULL, NULL, NULL, '2024-02-28 02:43:22', NULL),
(795641391, 'Anisa Rahmawati', 'Nisayang', 'arifmulyana33@gmail.com', 'anisa123', '089643926940', 'Pelapor', NULL, 'Terverifikasi', '350534cec7d71bb0844731f4ca96a424bc7f53085158a7684bd1c1d7be9bec89', NULL, '2024-02-27 13:41:59', '2024-02-27 13:49:05'),
(873762547, 'Agus Haris Abadi', 'agus', 'agusharis936@gmail.com', 'agus123', '082127556186', 'Penerima Laporan', NULL, NULL, NULL, NULL, '2024-02-28 02:57:42', NULL),
(912178582, 'Bayu Nirwana', 'bayu', 'nirwanabyu@gmail.com', 'bayu123', '081313114699', 'Penerima Laporan', NULL, NULL, NULL, NULL, '2024-02-26 02:41:29', NULL),
(934404610, 'Ferdi Fathurohman', 'ferdi', 'ferdifathurohman@polsub.ac.id', 'ferdi123', '081320096866', 'Penerima Laporan', NULL, NULL, NULL, NULL, '2024-02-28 02:53:56', NULL),
(948091774, 'Tri Herdiawan Apandi', 'tri', 'tri@polsub.ac.id', 'tri123', '081223826024', 'Penerima Laporan', NULL, NULL, NULL, NULL, '2024-02-28 02:39:02', '2024-03-06 16:22:35'),
(990308141, 'Laras Sirly Safitri', 'laras', 'larassirlysafitri@gmail.com', 'laras123', '082124305025', 'Penerima Laporan', NULL, NULL, NULL, NULL, '2024-02-26 02:45:44', NULL),
(1065612279, 'Fitri Handayani', 'fitri', 'fitri.handayani@polsub.ac.id', 'fitri123', '081214659007', 'Penerima Laporan', NULL, NULL, NULL, NULL, '2024-02-28 02:16:45', NULL),
(1068315517, 'Muhamad Abdul Jabar', 'abduljabar', 'mabduljabar05@gmail.com', 'POLSUB2014', '62895413011894', 'Pelapor', NULL, 'Terverifikasi', 'c6eb98c4d72738b2486232b0735ff546de157e11047c4501356bac048e088b9c', NULL, '2024-02-28 07:14:45', '2024-02-28 07:17:50'),
(1075831730, 'Mohammad Iqbal', 'iqbal', 'miqbaljanuar@gmail.com', 'iqbal123', '089655700083', 'Penerima Laporan', NULL, NULL, NULL, NULL, '2024-02-28 02:51:54', NULL),
(1102985594, 'Adelia suryani ', 'Adel', 'aadele414@gmail.com', '123456ff', '085777371539', 'Pelapor', NULL, 'Terverifikasi', '793aa7db40fb06232ad763f0d60e4b860bcc8b8cbcac6d69b0c9d5f93378df62', NULL, '2024-02-27 15:41:29', '2024-02-27 15:42:39'),
(1162858823, 'Rosiah', 'rosiah', 'rosrosiah82@gmail.com', 'rosiah123', '082119757825', 'Penerima Laporan', NULL, NULL, NULL, NULL, '2024-02-28 02:35:42', NULL),
(1207811145, 'Nurul Mukminah', 'nurul', 'Nurulmukminah24@gmail.com', 'nurul123', '081363352224', 'Penerima Laporan', NULL, NULL, NULL, NULL, '2024-02-28 02:40:36', NULL),
(1320963805, 'Rita Purwasih', 'rita', 'rita.purwasih@gmail.com', 'rita123', '081323697704', 'Penerima Laporan', NULL, NULL, NULL, NULL, '2024-02-26 02:49:19', NULL),
(1331892391, 'Tri Herdiawan Apandi', 'Jurusan JTIK', 'JTIKpolsub01@gmail.com', 'JTIK123', '08971423123', 'Penerima Laporan', 'Penerima', NULL, NULL, NULL, '2023-12-05 02:17:48', '2023-12-05 02:18:44'),
(1368918436, 'Enceng Sobari', 'enceng', 'ncesobari@gmail.com', 'enceng123', '085794483093', 'Penerima Laporan', NULL, NULL, NULL, NULL, '2024-02-28 02:56:27', NULL),
(1379109229, 'Siti Nur Zaenah ', 'Nurzen', 'nurzaenahsiti@gmail.com', '123nurzen', '085770959918', 'Pelapor', NULL, 'Terverifikasi', 'ec53b79ffa9650545665c886c566820953e59beefbd9578f99343311fedfd7cf', NULL, '2024-02-27 15:51:41', '2024-02-27 15:51:59'),
(1411303519, 'Ade Nuraeni', 'adenur', 'adenuraeni1@gmail.com', 'ade123', '08122308545', 'Penerima Laporan', NULL, NULL, NULL, NULL, '2024-02-28 02:29:43', NULL),
(1471226525, 'Aditya Nugraha', 'aditya', 'aditya@polsub.ac.id', 'aditya123', '082211990512', 'Penerima Laporan', NULL, NULL, NULL, NULL, '2024-02-28 03:00:37', NULL),
(1539251811, 'Wiwik Endah Rahayu', 'wiwik', 'windayu.sk@gmail.com', 'wiwik123', '08117542788', 'Penerima Laporan', NULL, NULL, NULL, NULL, '2024-02-28 02:32:31', NULL),
(1662260401, 'Adhan Efendi', 'adhan', 'adhan.efendi@gmail.com', 'adhan123', '081373241073', 'Penerima Laporan', NULL, NULL, NULL, NULL, '2024-02-28 02:47:18', NULL),
(1670862133, 'Slamet Rahayu', 'slamet', 'slamet.edu@gmail.com', 'slamet123', '082250694413', 'Penerima Laporan', NULL, NULL, NULL, NULL, '2024-02-28 02:37:51', NULL),
(1749108236, 'Rian Piarna', 'rian', 'piarnarian@gmail.com', '1234', '081233164343', 'Penerima Laporan', 'Penerima', NULL, NULL, NULL, '2024-02-28 02:28:03', '2024-02-28 04:20:00'),
(1754319190, 'Dwi Vernanda', 'vernanda', 'yogurt.nda@gmail.com', 'vernanda123', '085273114129', 'Penerima Laporan', 'Penerima', NULL, NULL, NULL, '2024-02-28 02:33:50', '2024-02-28 04:20:50'),
(1852944030, 'Irna Dwi Destiana', 'irna', 'irnadwidestiana@gmail.com', 'irna123', '085797117476', 'Penerima Laporan', NULL, NULL, NULL, NULL, '2024-02-28 02:42:01', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_pelapor`
--

CREATE TABLE `user_pelapor` (
  `id_user_pelapor` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `nik_nip_nim` varchar(16) NOT NULL,
  `tempat_lahir` varchar(50) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `jenis_kelamin` enum('Laki-laki','Perempuan') NOT NULL,
  `kategori` varchar(30) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_pelapor`
--

INSERT INTO `user_pelapor` (`id_user_pelapor`, `id_user`, `nik_nip_nim`, `tempat_lahir`, `tanggal_lahir`, `jenis_kelamin`, `kategori`, `created_at`, `updated_at`) VALUES
(6, 795641391, '10107008', 'Bogor', '2001-06-21', 'Perempuan', 'Mahasiswa', '2024-02-27 13:41:59', NULL),
(10, 1102985594, '10307001', 'Bogor', '2002-09-24', 'Perempuan', 'Mahasiswa', '2024-02-27 15:41:29', NULL),
(11, 1379109229, '3201174909020006', 'Bogor', '2002-09-09', 'Perempuan', 'Non Staff', '2024-02-27 15:51:41', NULL),
(12, 1068315517, '10104020', 'Subang', '2000-01-28', 'Laki-laki', 'Staff', '2024-02-28 07:14:45', NULL),
(13, 535858917, '10109054', 'Bogor', '2004-03-27', 'Perempuan', 'Mahasiswa', '2024-02-28 23:55:07', NULL),
(14, 549692405, '210300082', 'Subang', '1999-02-11', 'Perempuan', 'Staff', '2024-03-01 02:48:52', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_penerima`
--

CREATE TABLE `user_penerima` (
  `id_user_penerima` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_div` int(11) NOT NULL,
  `id_sub_div` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_penerima`
--

INSERT INTO `user_penerima` (`id_user_penerima`, `id_user`, `id_div`, `id_sub_div`) VALUES
(22, 183560420, 5, NULL),
(24, 1331892391, 7, 1),
(30, 1749108236, 10, NULL),
(31, 1754319190, 17, 1),
(35, 151863421, 5, 10),
(36, 238293094, 6, NULL),
(37, 1411303519, 20, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `div_penerima_pengaduan`
--
ALTER TABLE `div_penerima_pengaduan`
  ADD PRIMARY KEY (`id_div`);

--
-- Indexes for table `jenis_pengaduan`
--
ALTER TABLE `jenis_pengaduan`
  ADD PRIMARY KEY (`id_jenis_pengaduan`);

--
-- Indexes for table `lampiran_pengaduan`
--
ALTER TABLE `lampiran_pengaduan`
  ADD PRIMARY KEY (`id_lampiran_pengaduan`),
  ADD KEY `id_pengaduan` (`id_pengaduan`);

--
-- Indexes for table `lampiran_pengaduan_jawab`
--
ALTER TABLE `lampiran_pengaduan_jawab`
  ADD PRIMARY KEY (`id_lampiran_jawab`),
  ADD KEY `id_pengaduan_jawab` (`id_jawab`);

--
-- Indexes for table `pengaduan`
--
ALTER TABLE `pengaduan`
  ADD PRIMARY KEY (`id_pengaduan`),
  ADD KEY `id_jenis_pengaduan` (`id_jenis_pengaduan`,`id_sub`,`id_div`,`id_user`),
  ADD KEY `id_sub` (`id_sub`),
  ADD KEY `id_div` (`id_div`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_sub_div` (`id_sub_div`);

--
-- Indexes for table `pengaduan_jawab`
--
ALTER TABLE `pengaduan_jawab`
  ADD PRIMARY KEY (`id_jawab`),
  ADD KEY `id_pengaduan` (`id_pengaduan`,`id_penjawab`),
  ADD KEY `id_penjawab` (`id_penjawab`);

--
-- Indexes for table `sub_div_penerima`
--
ALTER TABLE `sub_div_penerima`
  ADD PRIMARY KEY (`id_sub_div`),
  ADD KEY `id_div` (`id_div`);

--
-- Indexes for table `sub_jenis_pengaduan`
--
ALTER TABLE `sub_jenis_pengaduan`
  ADD PRIMARY KEY (`id_sub`),
  ADD KEY `id_jenis_pengaduan` (`id_jenis_pengaduan`);

--
-- Indexes for table `token`
--
ALTER TABLE `token`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- Indexes for table `user_pelapor`
--
ALTER TABLE `user_pelapor`
  ADD PRIMARY KEY (`id_user_pelapor`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `user_penerima`
--
ALTER TABLE `user_penerima`
  ADD PRIMARY KEY (`id_user_penerima`),
  ADD KEY `id_div` (`id_div`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_sub_div` (`id_sub_div`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `div_penerima_pengaduan`
--
ALTER TABLE `div_penerima_pengaduan`
  MODIFY `id_div` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `jenis_pengaduan`
--
ALTER TABLE `jenis_pengaduan`
  MODIFY `id_jenis_pengaduan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `lampiran_pengaduan`
--
ALTER TABLE `lampiran_pengaduan`
  MODIFY `id_lampiran_pengaduan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `lampiran_pengaduan_jawab`
--
ALTER TABLE `lampiran_pengaduan_jawab`
  MODIFY `id_lampiran_jawab` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `pengaduan`
--
ALTER TABLE `pengaduan`
  MODIFY `id_pengaduan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `pengaduan_jawab`
--
ALTER TABLE `pengaduan_jawab`
  MODIFY `id_jawab` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `sub_div_penerima`
--
ALTER TABLE `sub_div_penerima`
  MODIFY `id_sub_div` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `sub_jenis_pengaduan`
--
ALTER TABLE `sub_jenis_pengaduan`
  MODIFY `id_sub` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `token`
--
ALTER TABLE `token`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2062059207;

--
-- AUTO_INCREMENT for table `user_pelapor`
--
ALTER TABLE `user_pelapor`
  MODIFY `id_user_pelapor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `user_penerima`
--
ALTER TABLE `user_penerima`
  MODIFY `id_user_penerima` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `lampiran_pengaduan`
--
ALTER TABLE `lampiran_pengaduan`
  ADD CONSTRAINT `lampiran_pengaduan_ibfk_1` FOREIGN KEY (`id_pengaduan`) REFERENCES `pengaduan` (`id_pengaduan`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `lampiran_pengaduan_jawab`
--
ALTER TABLE `lampiran_pengaduan_jawab`
  ADD CONSTRAINT `lampiran_pengaduan_jawab_ibfk_1` FOREIGN KEY (`id_jawab`) REFERENCES `pengaduan_jawab` (`id_jawab`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pengaduan`
--
ALTER TABLE `pengaduan`
  ADD CONSTRAINT `pengaduan_ibfk_1` FOREIGN KEY (`id_jenis_pengaduan`) REFERENCES `jenis_pengaduan` (`id_jenis_pengaduan`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pengaduan_ibfk_2` FOREIGN KEY (`id_sub`) REFERENCES `sub_jenis_pengaduan` (`id_sub`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `pengaduan_ibfk_3` FOREIGN KEY (`id_div`) REFERENCES `div_penerima_pengaduan` (`id_div`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pengaduan_ibfk_4` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pengaduan_ibfk_5` FOREIGN KEY (`id_sub_div`) REFERENCES `sub_div_penerima` (`id_sub_div`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `pengaduan_jawab`
--
ALTER TABLE `pengaduan_jawab`
  ADD CONSTRAINT `pengaduan_jawab_ibfk_1` FOREIGN KEY (`id_pengaduan`) REFERENCES `pengaduan` (`id_pengaduan`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pengaduan_jawab_ibfk_2` FOREIGN KEY (`id_penjawab`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `sub_div_penerima`
--
ALTER TABLE `sub_div_penerima`
  ADD CONSTRAINT `sub_div_penerima_ibfk_1` FOREIGN KEY (`id_div`) REFERENCES `div_penerima_pengaduan` (`id_div`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `sub_jenis_pengaduan`
--
ALTER TABLE `sub_jenis_pengaduan`
  ADD CONSTRAINT `sub_jenis_pengaduan_ibfk_1` FOREIGN KEY (`id_jenis_pengaduan`) REFERENCES `jenis_pengaduan` (`id_jenis_pengaduan`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user_pelapor`
--
ALTER TABLE `user_pelapor`
  ADD CONSTRAINT `user_pelapor_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user_penerima`
--
ALTER TABLE `user_penerima`
  ADD CONSTRAINT `user_penerima_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user_penerima_ibfk_2` FOREIGN KEY (`id_div`) REFERENCES `div_penerima_pengaduan` (`id_div`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user_penerima_ibfk_3` FOREIGN KEY (`id_sub_div`) REFERENCES `sub_div_penerima` (`id_sub_div`) ON DELETE SET NULL ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
