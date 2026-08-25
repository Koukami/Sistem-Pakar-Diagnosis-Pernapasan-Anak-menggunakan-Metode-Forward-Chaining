-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 22, 2024 at 12:15 PM
-- Server version: 10.1.32-MariaDB
-- PHP Version: 7.2.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_pernapasananak`
--

-- --------------------------------------------------------

--
-- Table structure for table `gejala`
--

CREATE TABLE `gejala` (
  `id_gejala` int(11) NOT NULL,
  `gejala` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gejala`
--

INSERT INTO `gejala` (`id_gejala`, `gejala`) VALUES
(1, 'Hidung berair'),
(2, 'Hidung tersumbat'),
(3, 'Bersin'),
(4, 'Batuk'),
(5, 'Sakit tenggorokan'),
(6, 'Demam'),
(7, 'Sakit kepala'),
(8, 'Menggigil'),
(9, 'Nyeri otot'),
(10, 'Kelelahan'),
(11, 'Sesak napas'),
(12, 'Suara napas mengi'),
(13, 'Nafas cepat'),
(14, 'Nafas pendek'),
(15, 'Gangguan tidur'),
(16, 'Kehilangan nafsu makan'),
(17, 'Mual atau muntah'),
(18, 'Diare'),
(19, 'Dada terasa nyeri'),
(20, 'Sesak saat beraktivitas'),
(21, 'Batuk dengan lendir'),
(22, 'Batuk dengan dahak'),
(23, 'Kejang'),
(24, 'Bibir atau kuku kebiruan'),
(25, 'Dehidrasi'),
(26, 'Kehilangan kesadaran'),
(27, 'Kesulitan untuk minum'),
(28, 'Kelesuan atau lemas'),
(29, 'Penurunan berat badan'),
(30, 'Keluar cairan kuning/kekuningan dari hidung'),
(32, 'Nyeri dada atau nyeri dada saat bernapas dalam'),
(33, 'Sesak napas saat istirahat');

-- --------------------------------------------------------

--
-- Table structure for table `konsultasi`
--

CREATE TABLE `konsultasi` (
  `id` int(11) NOT NULL,
  `waktu` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `penyakit` varchar(100) DEFAULT NULL,
  `presentase_penyakit` int(11) DEFAULT NULL,
  `solusi` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `konsultasi`
--

INSERT INTO `konsultasi` (`id`, `waktu`, `penyakit`, `presentase_penyakit`, `solusi`) VALUES
(3, '2023-08-09 12:54:43', 'Asma', 11, 'Hindari faktor pemicu asma seperti debu, bulu binatang, atau polusi udara.\r\nBerikan anak vaksin flu tahunan sesuai jadwal yang direkomendasikan.\r\nKonsultasikan dengan dokter untuk penggunaan obat asma yang sesuai.\r\n'),
(4, '2023-08-09 22:53:31', 'Bronkitis', 23, '1. Hindari paparan asap rokok dan polusi udara.\n2. Jaga kebersihan tangan dan batasi kontak dengan orang yang sedang sakit.\n3. Sediakan lingkungan yang lembap dengan menggunakan humidifier.\n4. Berikan anak cukup istirahat dan nutrisi yang seimbang.\n'),
(5, '2024-10-22 10:14:48', 'CommonCold', 50, '1. Meningkatkan kebersihan tangan dengan sering mencuci tangan dengan sabun.\n2. Hindari kontak dengan orang yang sedang sakit\n3. Sediakan kelembapan di dalam rumah dengan menggunakan humidifier.\n4. Berikan anak cukup istirahat dan nutrisi yang seimbang.\n');

-- --------------------------------------------------------

--
-- Table structure for table `penyakit`
--

CREATE TABLE `penyakit` (
  `id_penyakit` int(11) NOT NULL,
  `penyakit` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `penyakit`
--

INSERT INTO `penyakit` (`id_penyakit`, `penyakit`) VALUES
(1, 'Selesma (Common Cold)'),
(2, 'Influenza'),
(3, 'Bronkitis'),
(4, 'Pneumonia'),
(5, 'Asma'),
(6, 'ISPA (Infeksi Saluran Pernapasan Akut)');

-- --------------------------------------------------------

--
-- Table structure for table `relasi`
--

CREATE TABLE `relasi` (
  `id_relasi` int(11) NOT NULL,
  `id_gejala` int(11) DEFAULT NULL,
  `id_penyakit` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `relasi`
--

INSERT INTO `relasi` (`id_relasi`, `id_gejala`, `id_penyakit`) VALUES
(1, 1, 1),
(2, 2, 1),
(3, 3, 1),
(4, 4, 1),
(5, 5, 1),
(6, 6, 1),
(7, 7, 1),
(8, 10, 1),
(9, 1, 2),
(10, 2, 2),
(11, 3, 2),
(12, 4, 2),
(13, 5, 2),
(14, 6, 2),
(15, 7, 2),
(16, 8, 2),
(17, 9, 2),
(18, 10, 2),
(19, 15, 2),
(20, 16, 2),
(21, 1, 3),
(22, 2, 3),
(23, 3, 3),
(24, 4, 3),
(25, 5, 3),
(26, 6, 3),
(27, 7, 3),
(28, 10, 3),
(29, 16, 3),
(30, 19, 3),
(31, 20, 3),
(32, 21, 3),
(33, 22, 3),
(34, 1, 4),
(35, 2, 4),
(36, 3, 4),
(37, 4, 4),
(38, 5, 4),
(39, 6, 4),
(40, 7, 4),
(41, 8, 4),
(42, 10, 4),
(43, 11, 4),
(44, 13, 4),
(45, 14, 4),
(46, 15, 4),
(47, 16, 4),
(48, 17, 4),
(49, 18, 4),
(50, 19, 4),
(51, 22, 4),
(52, 23, 4),
(53, 24, 4),
(54, 25, 4),
(55, 26, 4),
(56, 27, 4),
(57, 28, 4),
(58, 29, 4),
(60, 1, 5),
(61, 2, 5),
(62, 4, 5),
(63, 11, 5),
(64, 12, 5),
(65, 14, 5),
(66, 15, 5),
(67, 16, 5),
(68, 20, 5),
(69, 1, 6),
(70, 2, 6),
(71, 3, 6),
(72, 4, 6),
(73, 5, 6),
(74, 6, 6),
(75, 7, 6),
(76, 8, 6),
(77, 10, 6),
(78, 11, 6),
(79, 13, 6),
(80, 14, 6),
(81, 15, 6),
(82, 16, 6),
(83, 17, 6),
(84, 18, 6),
(85, 19, 6),
(86, 20, 6),
(87, 21, 6),
(88, 22, 6),
(89, 25, 6),
(90, 27, 6),
(91, 28, 6),
(92, 29, 6),
(93, 30, 6),
(94, 32, 6),
(95, 33, 6);

-- --------------------------------------------------------

--
-- Table structure for table `solusi`
--

CREATE TABLE `solusi` (
  `id_solusi` int(11) NOT NULL,
  `id_penyakit` int(11) NOT NULL,
  `solusi` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `solusi`
--

INSERT INTO `solusi` (`id_solusi`, `id_penyakit`, `solusi`) VALUES
(1, 1, 'Meningkatkan kebersihan tangan dengan sering mencuci tangan dengan sabun.'),
(2, 1, 'Hindari kontak dengan orang yang sedang sakit'),
(3, 1, 'Sediakan kelembapan di dalam rumah dengan menggunakan humidifier.'),
(4, 1, 'Berikan anak cukup istirahat dan nutrisi yang seimbang.'),
(5, 2, 'Berikan anak vaksin flu tahunan sesuai jadwal yang direkomendasikan.'),
(6, 2, 'Jaga kebersihan tangan dan batasi kontak dengan orang yang sedang sakit.'),
(7, 2, 'Hindari paparan asap rokok dan polusi udara.'),
(8, 2, 'Berikan anak cukup istirahat dan nutrisi yang seimbang.'),
(9, 3, 'Hindari paparan asap rokok dan polusi udara.'),
(10, 3, 'Jaga kebersihan tangan dan batasi kontak dengan orang yang sedang sakit.'),
(11, 3, 'Sediakan lingkungan yang lembap dengan menggunakan humidifier.'),
(12, 3, 'Berikan anak cukup istirahat dan nutrisi yang seimbang.'),
(13, 4, 'Berikan anak vaksin pneumonia sesuai jadwal yang direkomendasikan.'),
(14, 4, 'Hindari paparan asap rokok dan polusi udara.'),
(15, 4, 'Jaga kebersihan tangan dan batasi kontak dengan orang yang sedang sakit.'),
(16, 4, 'Berikan anak antibiotik jika diperlukan, sesuai petunjuk dokter.'),
(17, 5, 'Hindari faktor pemicu asma seperti debu, bulu binatang, atau polusi udara.'),
(18, 5, 'Berikan anak vaksin flu tahunan sesuai jadwal yang direkomendasikan.'),
(19, 5, 'Konsultasikan dengan dokter untuk penggunaan obat asma yang sesuai.'),
(20, 6, 'Jaga kebersihan tangan dan batasi kontak dengan orang yang sedang sakit.'),
(21, 6, 'Hindari paparan asap rokok dan polusi udara.'),
(22, 6, 'Berikan anak vaksin flu tahunan sesuai jadwal yang direkomendasikan.'),
(23, 6, 'Sediakan lingkungan yang lembap dengan menggunakan humidifier.');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `role` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `password` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `role`, `nama`, `email`, `alamat`, `tgl_lahir`, `password`) VALUES
(2, 0, 'admin', 'admin@gmail.com', 'Mataram', '1999-07-06', '$2y$10$ASS50col3niwOOku4Zkky.HpmF18hiPWL9pi2DnE8CS7jTDSD4ufe'),
(6, 1, 'Robby', 'Robbybambanghadinata1999@gmail.com', 'Dayan Peken', '1999-07-06', '$2y$10$5/a8hWfVvmhwXBo7pC4PW.yTjOXfcOYcSd6BC.QnUjtaae7V0.lKy'),
(7, 2, 'Raden ', 'Antamasusanto91@gmail.com', 'Mataram', '1991-06-14', '$2y$10$HbD86ub6sll8Jn5M5cJLBeGmOiHIG2tZV.Hio88adU1V7kBxwYQC2'),
(8, 2, 'Fauziah', 'Fauziah1988@gmail.com', 'Pagutan', '1988-08-20', '$2y$10$nvF4OcZTB7wrJETE3BjM6.Kqp3QrH9BvF6RHJAYrt3ImRej/HliEe');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `gejala`
--
ALTER TABLE `gejala`
  ADD PRIMARY KEY (`id_gejala`);

--
-- Indexes for table `konsultasi`
--
ALTER TABLE `konsultasi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `penyakit`
--
ALTER TABLE `penyakit`
  ADD PRIMARY KEY (`id_penyakit`);

--
-- Indexes for table `relasi`
--
ALTER TABLE `relasi`
  ADD PRIMARY KEY (`id_relasi`),
  ADD KEY `id_gejala` (`id_gejala`),
  ADD KEY `id_penyakit` (`id_penyakit`);

--
-- Indexes for table `solusi`
--
ALTER TABLE `solusi`
  ADD PRIMARY KEY (`id_solusi`),
  ADD KEY `id_penyakit` (`id_penyakit`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `gejala`
--
ALTER TABLE `gejala`
  MODIFY `id_gejala` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `konsultasi`
--
ALTER TABLE `konsultasi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `penyakit`
--
ALTER TABLE `penyakit`
  MODIFY `id_penyakit` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `relasi`
--
ALTER TABLE `relasi`
  MODIFY `id_relasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=96;

--
-- AUTO_INCREMENT for table `solusi`
--
ALTER TABLE `solusi`
  MODIFY `id_solusi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `konsultasi`
--
ALTER TABLE `konsultasi`
  ADD CONSTRAINT `konsultasi_ibfk_1` FOREIGN KEY (`id`) REFERENCES `penyakit` (`id_penyakit`);

--
-- Constraints for table `relasi`
--
ALTER TABLE `relasi`
  ADD CONSTRAINT `relasi_ibfk_1` FOREIGN KEY (`id_gejala`) REFERENCES `gejala` (`id_gejala`),
  ADD CONSTRAINT `relasi_ibfk_2` FOREIGN KEY (`id_penyakit`) REFERENCES `penyakit` (`id_penyakit`);

--
-- Constraints for table `solusi`
--
ALTER TABLE `solusi`
  ADD CONSTRAINT `solusi_ibfk_1` FOREIGN KEY (`id_penyakit`) REFERENCES `penyakit` (`id_penyakit`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
