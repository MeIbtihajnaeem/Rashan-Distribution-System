-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 15, 2020 at 04:38 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.2.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `orgdata`
--

-- --------------------------------------------------------

--
-- Table structure for table `helpseeker`
--

CREATE TABLE `helpseeker` (
  `id` int(11) NOT NULL,
  `cnic` varchar(40) NOT NULL,
  `fname` varchar(200) NOT NULL,
  `addres` varchar(400) NOT NULL,
  `zip` varchar(20) NOT NULL,
  `phone` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `helpseekerAndrashanRelation`
--

CREATE TABLE `helpseekerAndrashanRelation` (
  `ID` int(11) NOT NULL,
  `cnic` varchar(200) NOT NULL,
  `dates` date NOT NULL,
  `statuss` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `Orders`
--

CREATE TABLE `Orders` (
  `quantity` int(11) NOT NULL,
  `dates` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `rashan`
--

CREATE TABLE `rashan` (
  `dates` date NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `helpseeker`
--
ALTER TABLE `helpseeker`
  ADD PRIMARY KEY (`cnic`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `helpseekerAndrashanRelation`
--
ALTER TABLE `helpseekerAndrashanRelation`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `cnic` (`cnic`);

--
-- Indexes for table `Orders`
--
ALTER TABLE `Orders`
  ADD PRIMARY KEY (`dates`);

--
-- Indexes for table `rashan`
--
ALTER TABLE `rashan`
  ADD PRIMARY KEY (`dates`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `helpseeker`
--
ALTER TABLE `helpseeker`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `helpseekerAndrashanRelation`
--
ALTER TABLE `helpseekerAndrashanRelation`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `helpseekerAndrashanRelation`
--
ALTER TABLE `helpseekerAndrashanRelation`
  ADD CONSTRAINT `helpseekerAndrashanRelation_ibfk_1` FOREIGN KEY (`cnic`) REFERENCES `helpseeker` (`cnic`);

--
-- Constraints for table `Orders`
--
ALTER TABLE `Orders`
  ADD CONSTRAINT `Orders_ibfk_1` FOREIGN KEY (`dates`) REFERENCES `rashan` (`dates`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
