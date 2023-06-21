-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 11, 2023 at 06:46 PM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 8.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rambey`
--

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `id_barang` int(11) NOT NULL,
  `nama_barang` varchar(100) DEFAULT NULL,
  `merek` varchar(20) DEFAULT NULL,
  `img` varchar(80) DEFAULT NULL,
  `kategori` varchar(20) DEFAULT NULL,
  `harga` varchar(20) DEFAULT NULL,
  `hargaint` int(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`id_barang`, `nama_barang`, `merek`, `img`, `kategori`, `harga`, `hargaint`) VALUES
(1, '	Geforce ROG-STRIX-RTX-4090-24GB', 'nvidia', 'assets/img/products/vga/ROG-STRIX-GeForce-RTX-4090-24-GB.jpg', 'VGA', 'Rp 31.000.000', 31000000),
(2, 'Geforce MSI-GT-730-2GB', 'nvidia', 'assets/img/products/vga/5fae6299-2d31-4030-a2de-c1e05900f6ea.jpg', 'VGA', 'Rp 1.100.000', 1100000),
(3, 'Geforce EVGA-GTX-1080-11GB', 'nvidia', 'assets/img/products/vga/79161c05-ba90-4ef3-bdad-ada1e462cd5a.jpg', 'VGA', 'Rp 8.000.000', 8000000),
(4, 'Geforce MSI-RTX-2060-8GB', 'nvidia', 'assets/img/products/vga/8ffe34a8-a86c-4aaf-844a-53a3feba33bd.jpg', 'VGA', 'Rp 7.000.000', 7000000),
(5, 'Geforce Gigabyte-RTX-3070-12GB', 'nvidia', 'assets/img/products/vga/cd7442f5122f50155c642c982ac938a8.jpg', 'VGA', 'Rp 9.000.000', 9000000),
(6, 'Monitor-MSI-24M1N3', 'MSI', 'assets/img/products/monitor/24M1N3200Z_70-IMS-id_ID.jpg', 'monitor', 'Rp 2.600.000', 2600000),
(7, 'Monitor-Philips-278E1', 'Philips', 'assets/img/products/monitor/278E1A_70-IMS-en_ID.jpg', 'monitor', 'Rp 2.480.000', 2480000),
(8, 'Xiaomi-curve-Gaming-34inch', 'Xiaomi', 'assets/img/products/monitor/pms_1658151680.21758095-removebg-preview.png', 'monitor', 'Rp 6.000.000', 6000000),
(9, 'LG 21.5inch 22MK400H-B FHD with AMD FreeSync', 'LG', 'assets/img/products/monitor/22mk400h.jpg', 'monitor', 'Rp 1.255.000', 1255000),
(10, 'SAMSUNG 24inch S24AG32 Odyssey G3 FHD Gaming Monitor 165Hz', 'Samsung', 'assets/img/products/monitor/samsung.jpeg', 'monitor', 'Rp 2.450.000', 2450000),
(11, 'LG 23.8inch 24MK430H-B FHD IPS 75Hz with AMD FreeSync', 'LG', 'assets/img/products/monitor/24mk430h.avif', 'monitor', 'Rp 1.485.000', 1485000),
(12, 'intel i9 13900k', 'intel', 'assets/img/products/processor/intel_i9_13900k.jpg', 'processor', 'Rp 9.862.000', 9862000),
(13, 'AMD Ryzen 3 3200G', 'AMD', 'assets/img/products/processor/AMD_Ryzen_3_3200G.jpg', 'processor', 'Rp 1.366.000', 1366000),
(14, 'intel i7 6700', 'intel', 'assets/img/products/processor/intel_i7_6700.jpg', 'processor', 'Rp 5.305.000', 5305000),
(15, 'AMD ryzen 5600G', 'AMD', 'assets/img/products/processor/AMD_ryzen_5600G.jpg', 'processor', 'Rp 4.390.000', 4390000);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(16) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `notelepon` varchar(20) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `notelepon`, `password`) VALUES
(1, 'daffa', 'dikiomen@ymail.com', '08123162313', '123'),
(2, 'dikiomen', 'daffayuharshu@gmail.com', '08126321312', '321'),
(3, 'heydar', 'geydar@gmail.com', '0812371263', '123');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id_barang`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
