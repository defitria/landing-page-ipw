-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 31, 2022 at 06:41 PM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 7.3.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bappeda`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `password` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `email`, `name`, `password`) VALUES
(1, 'admin1@admin.com', 'admin1', 'admin123'),
(2, 'admin2@admin.com', 'admin2', 'admin321');

-- --------------------------------------------------------

--
-- Table structure for table `agenda`
--

CREATE TABLE `agenda` (
  `id` int(11) NOT NULL,
  `kegiatan` varchar(255) DEFAULT NULL,
  `mulai` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `selesai` timestamp NULL DEFAULT NULL,
  `nama` varchar(255) NOT NULL,
  `tempat` varchar(255) NOT NULL,
  `peserta` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `agenda`
--

INSERT INTO `agenda` (`id`, `kegiatan`, `mulai`, `selesai`, `nama`, `tempat`, `peserta`) VALUES
(3, 'Meeting Internal IPW', '2021-10-20 07:53:22', '2021-10-20 08:00:00', 'Rapat Pembahasan Identifikasi Kinerja dan Indikator Sub Kegiatan Urusan Lingkungan Hidup melalui Zoom Meeting', 'R. Rapat Bidang IPW Lt. 3 Bappeda Provinsi Sumsel', 'Bidang IPW'),
(5, 'Rapat Koordinasi', '2021-10-20 01:25:00', '2021-10-20 03:00:00', 'Rapat Koordinasi Rencana Fasilitasi Program Compact 2 untuk Kawasan Tanjung Carat dalam rangka mendukung Proyek KPBU Pelabuhan Tanjung Carat melalui Zoom Meeting', 'R. Rapat Balaputera Dewa Lt. 2 Bappeda Provinsi Sumsel', 'Kaban, Kabid IPW');

-- --------------------------------------------------------

--
-- Table structure for table `arsip`
--

CREATE TABLE `arsip` (
  `id` int(11) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `kategori` varchar(20) NOT NULL,
  `terbit` varchar(1) NOT NULL,
  `tanggal` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `arsip`
--

INSERT INTO `arsip` (`id`, `judul`, `nama`, `kategori`, `terbit`, `tanggal`) VALUES
(3, 'Contoh Arsip 1', '34-Article Text-119-2-10-20181114.pdf', 'arsip IPW', 'N', '2021-10-18 12:04:19'),
(6, 'Contoh Arsip 2', 'jurnal_13173.pdf', 'arsip IPW', 'Y', '2021-10-18 16:08:55'),
(7, 'Paparan Jalan Baru Bengkulu-Sumsel 20 Juni 2020', 'Paparan Jalan Baru Bengkulu-Sumsel 20 Juni 2020 ver tanpa video.pdf', 'arsip IPW', 'Y', '2020-10-21 14:46:38');

-- --------------------------------------------------------

--
-- Table structure for table `berita`
--

CREATE TABLE `berita` (
  `id` int(11) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `isi` varchar(10000) NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `terbit` varchar(1) NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `berita`
--

INSERT INTO `berita` (`id`, `judul`, `isi`, `gambar`, `terbit`, `tanggal`) VALUES
(2, 'Tes Judul Berita 2', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras dapibus bibendum turpis, a volutpat nunc scelerisque nec. Quisque nisl elit, gravida vitae leo vitae, pellentesque lacinia neque. Aliquam fermentum ultrices consectetur. Curabitur non felis posuere, consectetur quam a, porta ligula. Vestibulum risus justo, mattis id ullamcorper non, imperdiet eget lorem. Etiam at lorem massa. Quisque cursus turpis ut consectetur tempus. Interdum et malesuada fames ac ante ipsum primis in faucibus. Nunc fringilla erat posuere tempor iaculis. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Sed ut odio sit amet mauris interdum condimentum. Etiam sed felis vitae libero tristique viverra. Praesent in molestie enim.\r\n <br><br>\r\nSuspendisse et feugiat felis, at fringilla risus. Proin eget consectetur ipsum, et viverra tellus. Integer malesuada placerat iaculis. Etiam facilisis arcu velit, quis maximus neque pulvinar vitae. Proin imperdiet eu ex vel convallis. Ut porta iaculis auctor. Nunc velit sem, placerat nec turpis a, ornare convallis urna. Phasellus sit amet erat elementum, hendrerit ante sed, rutrum est. Phasellus hendrerit sollicitudin nulla, nec dapibus sapien tempus eget. Vivamus a tortor vel neque placerat dapibus. Cras feugiat nunc velit. Praesent bibendum efficitur magna. Donec egestas justo lectus, sit amet tempor enim aliquam in. Nulla varius leo id sodales mattis. Vivamus elementum, tellus sed fermentum porta, lacus tellus semper lorem, commodo consequat ante orci ut massa.', 'IMG_20210331_093410.jpg', 'Y', '2021-10-21 16:26:52'),
(3, 'Tes Judul Berita 3', 'In tincidunt sapien eu dui porttitor porttitor. Nulla lobortis sapien ut dui iaculis, vitae ultricies nibh pharetra. Duis in turpis metus. Nunc id quam ex. Donec sed eros convallis, placerat erat a, hendrerit nisl. Aliquam finibus orci vel lectus placerat volutpat. Integer eros ex, ultricies nec nibh vel, dictum vulputate felis. Pellentesque tincidunt metus nec ex commodo sagittis. Quisque elit ipsum, maximus id quam vel, molestie scelerisque ex. Donec eget mauris non magna sagittis fermentum non vel nisl. Sed dapibus augue vel libero auctor commodo. Integer vulputate maximus nibh ac efficitur. Duis at elit quam. Donec mattis, dui in posuere gravida, augue nulla mattis ipsum, in rutrum sapien libero eget elit. Vivamus id pharetra quam.\r\n<br><br>\r\nNunc suscipit tortor sed hendrerit varius. Fusce congue nibh orci, vitae tincidunt dolor vestibulum ut. Morbi et nulla faucibus, posuere dui sed, fringilla velit. Sed egestas vitae elit nec rutrum. Integer quis nibh a augue posuere imperdiet id eget libero. Nunc venenatis volutpat dictum. Curabitur imperdiet tincidunt nibh et molestie. Nam in mauris non purus fringilla porta.', 'IMG_20210331_105501.jpg', 'Y', '2022-01-28 16:00:30');

-- --------------------------------------------------------

--
-- Table structure for table `galerifoto`
--

CREATE TABLE `galerifoto` (
  `id` int(11) NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `terbit` varchar(1) NOT NULL,
  `tanggal` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `galerifoto`
--

INSERT INTO `galerifoto` (`id`, `gambar`, `terbit`, `tanggal`) VALUES
(1, 'IMG_20210412_091017.jpg', 'Y', '2021-10-21 19:05:21'),
(3, 'IMG_20210916_101245.jpg', 'Y', '2021-10-21 20:41:46'),
(4, 'IMG_3528.JPG', 'Y', '2021-10-21 20:42:18'),
(5, 'IMG_9246.JPG', 'Y', '2021-10-21 20:42:31'),
(6, 'IMG_9354.JPG', 'N', '2021-10-21 20:43:12'),
(7, 'IMG_9350.JPG', 'N', '2021-10-21 20:43:22'),
(8, 'IMG_20210317_150500.jpg', 'N', '2021-10-21 20:43:50'),
(9, 'IMG_9763.JPG', 'N', '2021-10-21 20:44:18'),
(10, 'IMG_9800.JPG', 'N', '2021-10-21 20:44:27'),
(11, 'IMG_9818.JPG', 'N', '2021-10-21 20:44:51'),
(12, 'IMG_9881.JPG', 'N', '2021-10-21 20:45:11');

-- --------------------------------------------------------

--
-- Table structure for table `galerivideo`
--

CREATE TABLE `galerivideo` (
  `id` int(11) NOT NULL,
  `video` varchar(255) NOT NULL,
  `terbit` varchar(1) NOT NULL,
  `tanggal` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `galerivideo`
--

INSERT INTO `galerivideo` (`id`, `video`, `terbit`, `tanggal`) VALUES
(1, 'VID_20210406_1349399.mp4', 'Y', '2021-10-21 19:37:45');

-- --------------------------------------------------------

--
-- Table structure for table `jawabanadmin`
--

CREATE TABLE `jawabanadmin` (
  `id` int(5) NOT NULL,
  `email_pengunjung` varchar(65) NOT NULL,
  `pesan_jawaban` text NOT NULL,
  `tanggal_jawaban` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jawabanadmin`
--

INSERT INTO `jawabanadmin` (`id`, `email_pengunjung`, `pesan_jawaban`, `tanggal_jawaban`) VALUES
(2, 'admin4@pngo.com', 'Ya 12', '2022-01-28 18:11:16'),
(3, 'admin6@pngo.com', 'Ya test admin6@pngo.com', '2022-01-28 18:25:25'),
(4, 'admin7@pngo.com', 'Ya Test admin7@pngo.com', '2022-01-28 18:27:46'),
(5, 'admin8@pngo.com', 'ya tes admin8@pngo.com', '2022-01-28 18:29:40');

-- --------------------------------------------------------

--
-- Table structure for table `pengunjung`
--

CREATE TABLE `pengunjung` (
  `no` int(4) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `pesan` text NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pengunjung`
--

INSERT INTO `pengunjung` (`no`, `nama`, `email`, `pesan`, `tanggal`) VALUES
(9, 'Rida Defitria', 'admin6@pngo.com', 'test', '2022-01-28 17:24:19'),
(10, 'Rida Defitria', 'admin7@pngo.com', 'test', '2022-01-28 17:24:24'),
(11, 'Rida Defitria', 'admin8@pngo.com', 'test', '2022-01-28 17:24:28'),
(12, 'Rida Defitria', 'admin9@pngo.com', '123', '2022-01-28 17:24:32'),
(14, 'Rida Defitria', 'admin11@pngo.com', '123', '2022-01-28 17:24:51'),
(15, 'Rida Defitria', 'admin1@pngo.com', '123', '2022-01-28 16:32:11'),
(16, 'Rida Defitria', 'admin2@pngo.com', '123', '2022-01-28 16:35:43'),
(17, 'Rida Defitria', 'admin3@pngo.com', '12', '2022-01-28 16:32:05'),
(18, 'Rida Defitria', 'admin4@pngo.com', '12', '2022-01-28 16:32:00'),
(19, 'Rida Defitria', 'admin5@pngo.com', 'Test123', '2022-01-28 16:31:55');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `agenda`
--
ALTER TABLE `agenda`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `arsip`
--
ALTER TABLE `arsip`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `berita`
--
ALTER TABLE `berita`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `galerifoto`
--
ALTER TABLE `galerifoto`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `galerivideo`
--
ALTER TABLE `galerivideo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jawabanadmin`
--
ALTER TABLE `jawabanadmin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pengunjung`
--
ALTER TABLE `pengunjung`
  ADD PRIMARY KEY (`no`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `agenda`
--
ALTER TABLE `agenda`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `arsip`
--
ALTER TABLE `arsip`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `berita`
--
ALTER TABLE `berita`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `galerifoto`
--
ALTER TABLE `galerifoto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `galerivideo`
--
ALTER TABLE `galerivideo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `jawabanadmin`
--
ALTER TABLE `jawabanadmin`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `pengunjung`
--
ALTER TABLE `pengunjung`
  MODIFY `no` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
