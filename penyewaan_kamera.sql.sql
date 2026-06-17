-- phpMyAdmin SQL Dump
-- version 5.2.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 17, 2026 at 12:52 PM
-- Server version: 8.4.3
-- PHP Version: 8.3.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `penyewaan_kamera`
--

DELIMITER $$
--
-- Functions
--
CREATE DEFINER=`root`@`localhost` FUNCTION `hitung_lama_sewa` (`tgl_sewa` DATE, `tgl_kembali` DATE) RETURNS INT DETERMINISTIC BEGIN
    RETURN DATEDIFF(tgl_kembali, tgl_sewa);
END$$

CREATE DEFINER=`root`@`localhost` FUNCTION `hitung_total_biaya` (`harga` DECIMAL(10,2), `lama` INT) RETURNS DECIMAL(10,2) DETERMINISTIC BEGIN
    RETURN harga * lama;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int NOT NULL,
  `username` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `username`, `password`) VALUES
(1, 'admin', 'admin123');

-- --------------------------------------------------------

--
-- Table structure for table `detail_penyewaan`
--

CREATE TABLE `detail_penyewaan` (
  `id_detail` int NOT NULL,
  `id_sewa` int NOT NULL,
  `id_kamera` int NOT NULL,
  `jumlah` int NOT NULL,
  `subtotal` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `detail_penyewaan`
--

INSERT INTO `detail_penyewaan` (`id_detail`, `id_sewa`, `id_kamera`, `jumlah`, `subtotal`) VALUES
(1, 6, 1, 1, 300000.00),
(2, 7, 3, 1, 400000.00),
(3, 8, 4, 1, 360000.00),
(4, 9, 5, 1, 200000.00),
(5, 10, 2, 1, 170000.00);

--
-- Triggers `detail_penyewaan`
--
DELIMITER $$
CREATE TRIGGER `trg_kurangi_stok` AFTER INSERT ON `detail_penyewaan` FOR EACH ROW BEGIN
    UPDATE kamera
    SET stok = stok - NEW.jumlah
    WHERE id_kamera = NEW.id_kamera;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `kamera`
--

CREATE TABLE `kamera` (
  `id_kamera` int NOT NULL,
  `id_kategori` int NOT NULL,
  `nama_kamera` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `harga_sewa` decimal(10,2) NOT NULL,
  `stok` int DEFAULT '0',
  `status` varchar(20) COLLATE utf8mb4_general_ci DEFAULT 'Tersedia'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kamera`
--

INSERT INTO `kamera` (`id_kamera`, `id_kategori`, `nama_kamera`, `harga_sewa`, `stok`, `status`) VALUES
(1, 1, 'Canon EOS 80D', 120000.00, 3, 'Tersedia'),
(2, 1, 'Nikon D7500', 170000.00, 1, 'Tersedia'),
(3, 2, 'Sony A6400', 200000.00, 2, 'Tersedia'),
(4, 2, 'Fujifilm X-T30', 180000.00, 4, 'Tersedia'),
(5, 3, 'GoPro Hero 12', 100000.00, 5, 'Tersedia');

--
-- Triggers `kamera`
--
DELIMITER $$
CREATE TRIGGER `trg_status_kamera` BEFORE UPDATE ON `kamera` FOR EACH ROW BEGIN
    IF NEW.stok <= 0 THEN
        SET NEW.status = 'Tidak Tersedia';
    ELSE
        SET NEW.status = 'Tersedia';
    END IF;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `kategori_kamera`
--

CREATE TABLE `kategori_kamera` (
  `id_kategori` int NOT NULL,
  `nama_kategori` varchar(50) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kategori_kamera`
--

INSERT INTO `kategori_kamera` (`id_kategori`, `nama_kategori`) VALUES
(1, 'DSLR'),
(2, 'Mirrorless'),
(3, 'Action Cam');

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id_pelanggan` int NOT NULL,
  `nama` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `alamat` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `no_hp` varchar(15) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `email` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pelanggan`
--

INSERT INTO `pelanggan` (`id_pelanggan`, `nama`, `alamat`, `no_hp`, `email`) VALUES
(4, 'Andi Pratama', 'Jakarta', '081234567890', 'andi@gmail.com'),
(5, 'Budi Santoso', 'Bandung', '081234567891', 'budi@gmail.com'),
(6, 'Citra Lestari', 'Yogyakarta', '081234567892', 'citra@gmail.com'),
(7, 'Dewi Anggraini', 'Surabaya', '081234567893', 'dewi@gmail.com'),
(8, 'Eko Saputra', 'Semarang', '081234567894', 'eko@gmail.com'),
(10, 'Andy Park', 'Ajibarang Kulon RT 02 RW 01, Ajibarang Kulon', '088980705251', 'andypark@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id_pembayaran` int NOT NULL,
  `id_sewa` int NOT NULL,
  `tanggal_bayar` date NOT NULL,
  `metode_bayar` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `nominal` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pembayaran`
--

INSERT INTO `pembayaran` (`id_pembayaran`, `id_sewa`, `tanggal_bayar`, `metode_bayar`, `nominal`) VALUES
(1, 6, '2026-06-01', 'Transfer Bank', 300000.00),
(2, 7, '2026-06-05', 'E-Wallet', 400000.00),
(3, 8, '2026-06-08', 'Transfer Bank', 360000.00),
(4, 9, '2026-06-10', 'Cash', 200000.00),
(5, 10, '2026-06-12', 'Transfer Bank', 170000.00);

-- --------------------------------------------------------

--
-- Table structure for table `penyewaan`
--

CREATE TABLE `penyewaan` (
  `id_sewa` int NOT NULL,
  `id_pelanggan` int NOT NULL,
  `tanggal_sewa` date NOT NULL,
  `tanggal_kembali` date NOT NULL,
  `total_biaya` decimal(10,2) DEFAULT NULL,
  `status` varchar(20) COLLATE utf8mb4_general_ci DEFAULT 'Dipinjam'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `penyewaan`
--

INSERT INTO `penyewaan` (`id_sewa`, `id_pelanggan`, `tanggal_sewa`, `tanggal_kembali`, `total_biaya`, `status`) VALUES
(6, 4, '2026-06-01', '2026-06-03', 300000.00, 'Selesai'),
(7, 5, '2026-06-05', '2026-06-07', 400000.00, 'Selesai'),
(8, 6, '2026-06-08', '2026-06-10', 360000.00, 'Dipinjam'),
(9, 7, '2026-06-10', '2026-06-12', 200000.00, 'Dipinjam'),
(10, 8, '2026-06-12', '2026-06-14', 170000.00, 'Dipinjam');

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_data_penyewaan`
-- (See below for the actual view)
--
CREATE TABLE `view_data_penyewaan` (
`nama` varchar(100)
,`nama_kamera` varchar(100)
,`tanggal_sewa` date
,`tanggal_kembali` date
,`subtotal` decimal(10,2)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_laporan_pendapatan`
-- (See below for the actual view)
--
CREATE TABLE `view_laporan_pendapatan` (
`bulan` int
,`total_pendapatan` decimal(32,2)
);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `detail_penyewaan`
--
ALTER TABLE `detail_penyewaan`
  ADD PRIMARY KEY (`id_detail`),
  ADD KEY `id_sewa` (`id_sewa`),
  ADD KEY `id_kamera` (`id_kamera`);

--
-- Indexes for table `kamera`
--
ALTER TABLE `kamera`
  ADD PRIMARY KEY (`id_kamera`),
  ADD KEY `id_kategori` (`id_kategori`);

--
-- Indexes for table `kategori_kamera`
--
ALTER TABLE `kategori_kamera`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`id_pelanggan`);

--
-- Indexes for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`id_pembayaran`),
  ADD KEY `id_sewa` (`id_sewa`);

--
-- Indexes for table `penyewaan`
--
ALTER TABLE `penyewaan`
  ADD PRIMARY KEY (`id_sewa`),
  ADD KEY `id_pelanggan` (`id_pelanggan`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `detail_penyewaan`
--
ALTER TABLE `detail_penyewaan`
  MODIFY `id_detail` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `kamera`
--
ALTER TABLE `kamera`
  MODIFY `id_kamera` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `kategori_kamera`
--
ALTER TABLE `kategori_kamera`
  MODIFY `id_kategori` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `id_pelanggan` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `id_pembayaran` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `penyewaan`
--
ALTER TABLE `penyewaan`
  MODIFY `id_sewa` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

-- --------------------------------------------------------

--
-- Structure for view `view_data_penyewaan`
--
DROP TABLE IF EXISTS `view_data_penyewaan`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_data_penyewaan`  AS SELECT `p`.`nama` AS `nama`, `k`.`nama_kamera` AS `nama_kamera`, `s`.`tanggal_sewa` AS `tanggal_sewa`, `s`.`tanggal_kembali` AS `tanggal_kembali`, `d`.`subtotal` AS `subtotal` FROM (((`pelanggan` `p` join `penyewaan` `s` on((`p`.`id_pelanggan` = `s`.`id_pelanggan`))) join `detail_penyewaan` `d` on((`s`.`id_sewa` = `d`.`id_sewa`))) join `kamera` `k` on((`d`.`id_kamera` = `k`.`id_kamera`))) ;

-- --------------------------------------------------------

--
-- Structure for view `view_laporan_pendapatan`
--
DROP TABLE IF EXISTS `view_laporan_pendapatan`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_laporan_pendapatan`  AS SELECT month(`pembayaran`.`tanggal_bayar`) AS `bulan`, sum(`pembayaran`.`nominal`) AS `total_pendapatan` FROM `pembayaran` GROUP BY month(`pembayaran`.`tanggal_bayar`) ;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `detail_penyewaan`
--
ALTER TABLE `detail_penyewaan`
  ADD CONSTRAINT `detail_penyewaan_ibfk_1` FOREIGN KEY (`id_sewa`) REFERENCES `penyewaan` (`id_sewa`),
  ADD CONSTRAINT `detail_penyewaan_ibfk_2` FOREIGN KEY (`id_kamera`) REFERENCES `kamera` (`id_kamera`);

--
-- Constraints for table `kamera`
--
ALTER TABLE `kamera`
  ADD CONSTRAINT `kamera_ibfk_1` FOREIGN KEY (`id_kategori`) REFERENCES `kategori_kamera` (`id_kategori`);

--
-- Constraints for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD CONSTRAINT `pembayaran_ibfk_1` FOREIGN KEY (`id_sewa`) REFERENCES `penyewaan` (`id_sewa`);

--
-- Constraints for table `penyewaan`
--
ALTER TABLE `penyewaan`
  ADD CONSTRAINT `penyewaan_ibfk_1` FOREIGN KEY (`id_pelanggan`) REFERENCES `pelanggan` (`id_pelanggan`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
