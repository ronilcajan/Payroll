-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 11, 2021 at 09:10 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `payroll`
--

-- --------------------------------------------------------

--
-- Table structure for table `pdf`
--

CREATE TABLE `pdf` (
  `id` int(11) NOT NULL,
  `salesrep_id` int(11) NOT NULL,
  `username` varchar(20) DEFAULT NULL,
  `filename` varchar(100) DEFAULT NULL,
  `date` varchar(50) DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pdf`
--

INSERT INTO `pdf` (`id`, `salesrep_id`, `username`, `filename`, `date`) VALUES
(14, 10, 'admin', '05122020071247invoice.pdf', '2020-12-05 14:12:47'),
(15, 10, 'admin', '05122020071308invoice.pdf', '2020-12-05 14:13:08'),
(16, 10, 'admin', '05122020071352invoice.pdf', '2020-12-05 14:13:52');

-- --------------------------------------------------------

--
-- Table structure for table `salesrep`
--

CREATE TABLE `salesrep` (
  `id` int(11) NOT NULL,
  `name` varchar(30) DEFAULT NULL,
  `comission` int(11) DEFAULT NULL,
  `tax` int(11) DEFAULT NULL,
  `bonus` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `salesrep`
--

INSERT INTO `salesrep` (`id`, `name`, `comission`, `tax`, `bonus`) VALUES
(10, 'Ronil Cajan', 50, 5, 100),
(11, 'CodeDax LLC', 10, 50, 100);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(20) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `pdf`
--
ALTER TABLE `pdf`
  ADD PRIMARY KEY (`id`),
  ADD KEY `salesrep_id` (`salesrep_id`),
  ADD KEY `username` (`username`);

--
-- Indexes for table `salesrep`
--
ALTER TABLE `salesrep`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pdf`
--
ALTER TABLE `pdf`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `salesrep`
--
ALTER TABLE `salesrep`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `pdf`
--
ALTER TABLE `pdf`
  ADD CONSTRAINT `pdf_ibfk_1` FOREIGN KEY (`salesrep_id`) REFERENCES `salesrep` (`id`),
  ADD CONSTRAINT `pdf_ibfk_2` FOREIGN KEY (`username`) REFERENCES `user` (`username`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
