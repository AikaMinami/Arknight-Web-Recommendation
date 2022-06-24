-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 24, 2022 at 02:05 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `datatest`
--

-- --------------------------------------------------------

--
-- Table structure for table `criteria`
--

CREATE TABLE `criteria` (
  `operatorName` varchar(255) NOT NULL,
  `health` int(11) NOT NULL,
  `dps` double NOT NULL,
  `cost` int(11) NOT NULL,
  `survivability` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `criteria`
--

INSERT INTO `criteria` (`operatorName`, `health`, `dps`, `cost`, `survivability`) VALUES
('Mountain', 5000, 333.33333333333, 12, 1300),
('Blaze', 4000, 300, 12, 1900);

-- --------------------------------------------------------

--
-- Table structure for table `final`
--

CREATE TABLE `final` (
  `operatorName` varchar(255) NOT NULL,
  `score` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `final`
--

INSERT INTO `final` (`operatorName`, `score`) VALUES
('Mountain', 0.63899762876906),
('Blaze', 0.36100237123094);

-- --------------------------------------------------------

--
-- Table structure for table `normalized`
--

CREATE TABLE `normalized` (
  `operatorName` varchar(255) NOT NULL,
  `health` double NOT NULL,
  `dps` double NOT NULL,
  `cost` double NOT NULL,
  `survivability` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `normalized`
--

INSERT INTO `normalized` (`operatorName`, `health`, `dps`, `cost`, `survivability`) VALUES
('Mountain', 0.0030487804878049, 0.049723756906077, 0.83333333333333, 0.0061320754716981),
('Blaze', 0.0024390243902439, 0.04475138121547, 0.83333333333333, 0.0089622641509434);

-- --------------------------------------------------------

--
-- Table structure for table `operator`
--

CREATE TABLE `operator` (
  `id` int(11) NOT NULL,
  `operatorName` varchar(255) NOT NULL,
  `maximumHP` int(11) NOT NULL,
  `attackPower` int(11) NOT NULL,
  `attackTime` double NOT NULL,
  `defense` int(11) NOT NULL,
  `magicResistance` int(11) NOT NULL,
  `deploymentCost` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `operator`
--

INSERT INTO `operator` (`id`, `operatorName`, `maximumHP`, `attackPower`, `attackTime`, `defense`, `magicResistance`, `deploymentCost`) VALUES
(1, 'Mountain', 5000, 400, 1.2, 300, 10, 12),
(2, 'Blaze', 4000, 300, 1, 400, 15, 12);

-- --------------------------------------------------------

--
-- Table structure for table `selected`
--

CREATE TABLE `selected` (
  `id` int(11) NOT NULL,
  `operatorName` varchar(255) NOT NULL,
  `maximumHP` int(11) NOT NULL,
  `attackPower` int(11) NOT NULL,
  `attackTime` double NOT NULL,
  `defense` int(11) NOT NULL,
  `magicResistance` int(11) NOT NULL,
  `deploymentCost` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `selected`
--

INSERT INTO `selected` (`id`, `operatorName`, `maximumHP`, `attackPower`, `attackTime`, `defense`, `magicResistance`, `deploymentCost`) VALUES
(10, 'Mountain', 5000, 400, 1.2, 300, 10, 12),
(11, 'Blaze', 4000, 300, 1, 400, 15, 12);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `admins` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `admins`) VALUES
(1, 'Radithya', 'radithyaiqbalprasaja@gmail.com', '0cf651a42566e6acbe44c0225e3a8cf0', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `operator`
--
ALTER TABLE `operator`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `selected`
--
ALTER TABLE `selected`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `operator`
--
ALTER TABLE `operator`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `selected`
--
ALTER TABLE `selected`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
