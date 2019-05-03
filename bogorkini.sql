-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 03, 2019 at 01:58 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bogorkini`
--

-- --------------------------------------------------------

--
-- Table structure for table `informasi`
--

CREATE TABLE `informasi` (
  `judul` varchar(20) NOT NULL,
  `authorID` bigint(20) UNSIGNED NOT NULL,
  `isi` varchar(700) NOT NULL,
  `fotoFilePath` varchar(100) DEFAULT NULL,
  `infoID` bigint(20) UNSIGNED NOT NULL,
  `category` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `informasirating`
--

CREATE TABLE `informasirating` (
  `infoID` bigint(20) UNSIGNED NOT NULL,
  `rating` int(5) NOT NULL,
  `byUserID` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `userID` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(16) NOT NULL,
  `password` varchar(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`userID`, `username`, `password`) VALUES
(1, 'alfin27', 'bgrkini27');

-- --------------------------------------------------------

--
-- Table structure for table `useradm`
--

CREATE TABLE `useradm` (
  `userID` bigint(20) UNSIGNED NOT NULL,
  `isAdmin` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `useradm`
--

INSERT INTO `useradm` (`userID`, `isAdmin`) VALUES
(1, 'yes');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `informasi`
--
ALTER TABLE `informasi`
  ADD PRIMARY KEY (`infoID`),
  ADD UNIQUE KEY `infoID` (`infoID`),
  ADD KEY `authorID_FK` (`authorID`);

--
-- Indexes for table `informasirating`
--
ALTER TABLE `informasirating`
  ADD PRIMARY KEY (`infoID`),
  ADD UNIQUE KEY `infoID` (`infoID`),
  ADD KEY `userID_FK` (`byUserID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`userID`),
  ADD UNIQUE KEY `userID` (`userID`);

--
-- Indexes for table `useradm`
--
ALTER TABLE `useradm`
  ADD PRIMARY KEY (`userID`),
  ADD UNIQUE KEY `userID` (`userID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `informasi`
--
ALTER TABLE `informasi`
  MODIFY `infoID` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `userID` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `informasi`
--
ALTER TABLE `informasi`
  ADD CONSTRAINT `authorID_FK` FOREIGN KEY (`authorID`) REFERENCES `useradm` (`userID`);

--
-- Constraints for table `informasirating`
--
ALTER TABLE `informasirating`
  ADD CONSTRAINT `infoID_FK_PK` FOREIGN KEY (`infoID`) REFERENCES `informasi` (`infoID`),
  ADD CONSTRAINT `userID_FK` FOREIGN KEY (`byUserID`) REFERENCES `user` (`userID`);

--
-- Constraints for table `useradm`
--
ALTER TABLE `useradm`
  ADD CONSTRAINT `userID_FK_PK` FOREIGN KEY (`userID`) REFERENCES `user` (`userID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
