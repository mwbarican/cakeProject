-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 27, 2015 at 12:58 PM
-- Server version: 5.6.26
-- PHP Version: 5.5.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `projectarrow4x4`
--

-- --------------------------------------------------------

--
-- Table structure for table `customerinformation`
--

CREATE TABLE IF NOT EXISTS `customerinformation` (
  `ID` int(11) NOT NULL DEFAULT '0',
  `firstname` varchar(255) DEFAULT NULL,
  `lastname` varchar(255) DEFAULT NULL,
  `birthday` varchar(255) DEFAULT NULL,
  `contactno` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `carmodel` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `datepolicy`
--

CREATE TABLE IF NOT EXISTS `datepolicy` (
  `ID` int(11) NOT NULL DEFAULT '0',
  `name` varchar(255) DEFAULT NULL,
  `start_due` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `end_due` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `description` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `reservation`
--

CREATE TABLE IF NOT EXISTS `reservation` (
  `ID` int(11) NOT NULL,
  `customer_information_id` int(11) DEFAULT NULL,
  `item_id` int(11) DEFAULT NULL,
  `datepolicy_id` int(11) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customerinformation`
--
ALTER TABLE `customerinformation`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `datepolicy`
--
ALTER TABLE `datepolicy`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `reservation`
--
ALTER TABLE `reservation`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `fk_customer_information_id` (`customer_information_id`),
  ADD KEY `fk_item_id` (`item_id`),
  ADD KEY `fk_datepolicy_id` (`datepolicy_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `reservation`
--
ALTER TABLE `reservation`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `reservation`
--
ALTER TABLE `reservation`
  ADD CONSTRAINT `fk_customer_information_id` FOREIGN KEY (`customer_information_id`) REFERENCES `customerinformation` (`ID`),
  ADD CONSTRAINT `fk_datepolicy_id` FOREIGN KEY (`datepolicy_id`) REFERENCES `datepolicy` (`ID`),
  ADD CONSTRAINT `fk_item_id` FOREIGN KEY (`item_id`) REFERENCES `reservation` (`ID`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
