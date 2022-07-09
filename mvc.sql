-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 09, 2022 at 06:20 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mvc`
--

-- --------------------------------------------------------

--
-- Table structure for table `clothes`
--

CREATE TABLE `clothes` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `type` varchar(100) NOT NULL,
  `gender` varchar(100) NOT NULL,
  `costPerDay` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `clothes`
--

INSERT INTO `clothes` (`id`, `name`, `type`, `gender`, `costPerDay`) VALUES
(1, 'Kebaya Jawa Tengahs', 'Baju Pernikahan', 'Anak Perempuan', 5000),
(2, 'Jawi Jangkep Jawa Tengah', 'Baju Adat', 'Pria', 90000),
(3, 'Koteka Papua', 'Baju Adat', 'Pria', 30000),
(4, 'Polisi Anak Laki', 'Baju Profesi', 'Anak Laki-laki', 20000);

-- --------------------------------------------------------

--
-- Table structure for table `clothes_rent`
--

CREATE TABLE `clothes_rent` (
  `clothes_id` int(11) NOT NULL,
  `rent_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `clothes_rent`
--

INSERT INTO `clothes_rent` (`clothes_id`, `rent_id`) VALUES
(1, 3),
(2, 3),
(3, 3),
(3, 4),
(4, 3);

-- --------------------------------------------------------

--
-- Table structure for table `rent`
--

CREATE TABLE `rent` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rent`
--

INSERT INTO `rent` (`id`, `nama`, `start_date`, `end_date`) VALUES
(3, 'tes', '2022-07-09', '2022-10-17'),
(4, 'syarif', '2022-07-09', '2022-07-12');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `clothes`
--
ALTER TABLE `clothes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `clothes_rent`
--
ALTER TABLE `clothes_rent`
  ADD PRIMARY KEY (`clothes_id`,`rent_id`),
  ADD KEY `clothes_id` (`clothes_id`),
  ADD KEY `rent_id` (`rent_id`);

--
-- Indexes for table `rent`
--
ALTER TABLE `rent`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `clothes`
--
ALTER TABLE `clothes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `rent`
--
ALTER TABLE `rent`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `clothes_rent`
--
ALTER TABLE `clothes_rent`
  ADD CONSTRAINT `clothes_rent_ibfk_1` FOREIGN KEY (`rent_id`) REFERENCES `rent` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `clothes_rent_ibfk_2` FOREIGN KEY (`clothes_id`) REFERENCES `clothes` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
