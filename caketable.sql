-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 27, 2015 at 02:52 PM
-- Server version: 5.6.26
-- PHP Version: 5.5.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `caketable`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(10) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `designation_id` int(10) NOT NULL,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` varchar(50) NOT NULL DEFAULT 'active'
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`, `designation_id`, `created`, `modified`, `status`) VALUES
(1, 'admin', '$2y$10$Mxv6VnbJjmLkCPmcD1El8uneKcY1otWNc6cus7CafEXIKRlVKLXfy', 1, '2015-08-26 02:22:54', '2015-08-26 02:22:54', 'active'),
(2, 'itsme', '$2y$10$z.U0aIpzLAKpifRxD1n71ORKvt1E87G.eyU2PfagA3ArVXU0nAhmq', 2, '2015-08-25 18:33:35', '2015-08-25 18:33:35', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `admin_image`
--

CREATE TABLE IF NOT EXISTS `admin_image` (
  `admin_id` int(10) NOT NULL,
  `created` timestamp(6) NOT NULL DEFAULT CURRENT_TIMESTAMP(6),
  `directory` varchar(255) DEFAULT NULL,
  `file_size` varchar(255) NOT NULL,
  `file_path` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `file_type` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `admin_profile`
--

CREATE TABLE IF NOT EXISTS `admin_profile` (
  `admin_id` int(10) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `email` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_profile`
--

INSERT INTO `admin_profile` (`admin_id`, `firstname`, `lastname`, `email`) VALUES
(1, 'Administrator', 'Default', 'email@mail.to'),
(2, 'ako', 'ikaw', 'para.sa.ating.lahat.to@email.com');

-- --------------------------------------------------------

--
-- Table structure for table `currency`
--

CREATE TABLE IF NOT EXISTS `currency` (
  `id` int(10) NOT NULL,
  `name` varchar(255) NOT NULL,
  `code` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `customerinformation`
--

CREATE TABLE IF NOT EXISTS `customerinformation` (
  `ID` int(11) NOT NULL,
  `firstname` varchar(255) DEFAULT NULL,
  `lastname` varchar(255) DEFAULT NULL,
  `birthday` datetime(6) DEFAULT NULL,
  `contactno` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `carmodel` varchar(255) DEFAULT NULL,
  `customerInformationID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `date_policy`
--

CREATE TABLE IF NOT EXISTS `date_policy` (
  `id` int(10) NOT NULL,
  `name` varchar(255) NOT NULL,
  `start` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `end` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `description` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `date_term`
--

CREATE TABLE IF NOT EXISTS `date_term` (
  `id` int(10) NOT NULL,
  `name` varchar(255) NOT NULL,
  `start` int(10) NOT NULL,
  `end` int(10) NOT NULL,
  `description` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `designation`
--

CREATE TABLE IF NOT EXISTS `designation` (
  `id` int(10) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `designation`
--

INSERT INTO `designation` (`id`, `name`) VALUES
(2, 'Everyone'),
(1, 'Full Administrator');

-- --------------------------------------------------------

--
-- Table structure for table `inventory`
--

CREATE TABLE IF NOT EXISTS `inventory` (
  `item_id` int(10) NOT NULL,
  `created` timestamp(6) NOT NULL DEFAULT CURRENT_TIMESTAMP(6),
  `location_id` int(10) DEFAULT NULL,
  `quantity` int(10) NOT NULL DEFAULT '0',
  `unit_id` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `item`
--

CREATE TABLE IF NOT EXISTS `item` (
  `id` int(10) NOT NULL,
  `code` varchar(25) NOT NULL,
  `name` varchar(255) NOT NULL,
  `category_id` int(10) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `item_type_id` int(10) NOT NULL,
  `store_unit` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `item_category`
--

CREATE TABLE IF NOT EXISTS `item_category` (
  `id` int(10) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `lft` int(10) DEFAULT NULL,
  `rght` int(10) DEFAULT NULL,
  `parent_id` int(10) DEFAULT NULL,
  `level` int(10) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `item_category`
--

INSERT INTO `item_category` (`id`, `name`, `description`, `lft`, `rght`, `parent_id`, `level`) VALUES
(1, 'Category', 'This is used as a General Term for Items that does not belong to any Category', 1, 2, NULL, 0),
(2, 'Adobe.pro', 'For all Adobe products', 3, 4, NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `item_measure`
--

CREATE TABLE IF NOT EXISTS `item_measure` (
  `item_id` int(10) NOT NULL,
  `size` varchar(50) NOT NULL,
  `size_unit` int(10) NOT NULL,
  `weight` varchar(50) NOT NULL,
  `weight_unit` int(10) NOT NULL,
  `remarks` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `item_point_detail`
--

CREATE TABLE IF NOT EXISTS `item_point_detail` (
  `item_id` int(10) NOT NULL,
  `reorder_point` int(10) NOT NULL,
  `reorder_quantity` int(10) NOT NULL,
  `alert_point` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `item_price`
--

CREATE TABLE IF NOT EXISTS `item_price` (
  `item_id` int(10) NOT NULL,
  `record_date` date NOT NULL,
  `cost` decimal(10,2) NOT NULL,
  `type` varchar(255) DEFAULT NULL,
  `unit` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `item_type`
--

CREATE TABLE IF NOT EXISTS `item_type` (
  `id` int(10) NOT NULL,
  `name` varchar(20) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `item_type`
--

INSERT INTO `item_type` (`id`, `name`) VALUES
(1, 'stockable'),
(2, 'non-stockable'),
(3, 'service');

-- --------------------------------------------------------

--
-- Table structure for table `location`
--

CREATE TABLE IF NOT EXISTS `location` (
  `id` int(10) NOT NULL,
  `name` varchar(255) NOT NULL,
  `code` varchar(10) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `location`
--

INSERT INTO `location` (`id`, `name`, `code`) VALUES
(1, 'Casamis Warehouse', 'CWB-1');

-- --------------------------------------------------------

--
-- Table structure for table `payment_term`
--

CREATE TABLE IF NOT EXISTS `payment_term` (
  `id` int(10) NOT NULL,
  `name` varchar(255) NOT NULL,
  `days` int(10) NOT NULL,
  `description` varchar(255) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payment_term`
--

INSERT INTO `payment_term` (`id`, `name`, `days`, `description`) VALUES
(1, 'Sampler Term', 12, 'This Payment term is for sample only!'),
(2, 'gdgdf', 123, 'dfsdf'),
(3, 'gdgdf', 123, 'dfsdf'),
(5, 'sdfadfsa', 21, 'sdfafsd');

-- --------------------------------------------------------

--
-- Table structure for table `purchase_order_status`
--

CREATE TABLE IF NOT EXISTS `purchase_order_status` (
  `id` int(10) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `purchase_order_status`
--

INSERT INTO `purchase_order_status` (`id`, `name`) VALUES
(1, 'Paid'),
(2, 'Unpaid'),
(3, 'Partial'),
(4, 'Owing');

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

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE IF NOT EXISTS `supplier` (
  `id` int(10) NOT NULL,
  `name` varchar(255) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `email` varchar(255) NOT NULL,
  `remarks` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `supplier_detail`
--

CREATE TABLE IF NOT EXISTS `supplier_detail` (
  `supplier_id` int(10) NOT NULL,
  `street` varchar(255) NOT NULL,
  `city` varchar(50) NOT NULL,
  `country` varchar(100) DEFAULT NULL,
  `postal_code` varchar(16) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `supplier_item`
--

CREATE TABLE IF NOT EXISTS `supplier_item` (
  `supplier_id` int(10) NOT NULL,
  `item_id` int(10) NOT NULL,
  `status` int(10) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `supplier_item_status`
--

CREATE TABLE IF NOT EXISTS `supplier_item_status` (
  `id` int(10) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `supplier_item_status`
--

INSERT INTO `supplier_item_status` (`id`, `name`) VALUES
(1, 'selling'),
(2, 'not selling'),
(3, 'deleted');

-- --------------------------------------------------------

--
-- Table structure for table `taxing_scheme`
--

CREATE TABLE IF NOT EXISTS `taxing_scheme` (
  `id` int(10) NOT NULL,
  `name` varchar(255) NOT NULL,
  `rate` decimal(10,4) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `taxing_scheme`
--

INSERT INTO `taxing_scheme` (`id`, `name`, `rate`) VALUES
(1, '12% Just for Sample', '12.0000');

-- --------------------------------------------------------

--
-- Table structure for table `unit`
--

CREATE TABLE IF NOT EXISTS `unit` (
  `id` int(10) NOT NULL,
  `name` varchar(255) NOT NULL,
  `code` varchar(10) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `unit_type_id` int(10) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `unit`
--

INSERT INTO `unit` (`id`, `name`, `code`, `description`, `unit_type_id`) VALUES
(1, '5''7', 'M1', 'Sampler', 1);

-- --------------------------------------------------------

--
-- Table structure for table `unit_type`
--

CREATE TABLE IF NOT EXISTS `unit_type` (
  `id` int(10) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `unit_type`
--

INSERT INTO `unit_type` (`id`, `name`) VALUES
(1, 'measure'),
(2, 'store');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD KEY `designation_id` (`designation_id`);

--
-- Indexes for table `admin_image`
--
ALTER TABLE `admin_image`
  ADD PRIMARY KEY (`admin_id`,`created`);

--
-- Indexes for table `admin_profile`
--
ALTER TABLE `admin_profile`
  ADD PRIMARY KEY (`admin_id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `currency`
--
ALTER TABLE `currency`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customerinformation`
--
ALTER TABLE `customerinformation`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `date_policy`
--
ALTER TABLE `date_policy`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `date_term`
--
ALTER TABLE `date_term`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `designation`
--
ALTER TABLE `designation`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `inventory`
--
ALTER TABLE `inventory`
  ADD PRIMARY KEY (`item_id`,`created`),
  ADD KEY `location_id` (`location_id`),
  ADD KEY `unit_id` (`unit_id`);

--
-- Indexes for table `item`
--
ALTER TABLE `item`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `code` (`code`),
  ADD KEY `category_id` (`category_id`),
  ADD KEY `item_type_id` (`item_type_id`),
  ADD KEY `store_unit` (`store_unit`);

--
-- Indexes for table `item_category`
--
ALTER TABLE `item_category`
  ADD PRIMARY KEY (`id`),
  ADD KEY `parent_id` (`parent_id`);

--
-- Indexes for table `item_measure`
--
ALTER TABLE `item_measure`
  ADD PRIMARY KEY (`item_id`),
  ADD KEY `size_unit` (`size_unit`),
  ADD KEY `weight_unit` (`weight_unit`);

--
-- Indexes for table `item_point_detail`
--
ALTER TABLE `item_point_detail`
  ADD PRIMARY KEY (`item_id`);

--
-- Indexes for table `item_price`
--
ALTER TABLE `item_price`
  ADD PRIMARY KEY (`item_id`),
  ADD KEY `unit` (`unit`);

--
-- Indexes for table `item_type`
--
ALTER TABLE `item_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `location`
--
ALTER TABLE `location`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `code` (`code`);

--
-- Indexes for table `payment_term`
--
ALTER TABLE `payment_term`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `purchase_order_status`
--
ALTER TABLE `purchase_order_status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reservation`
--
ALTER TABLE `reservation`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `fk_customer_information_id` (`customer_information_id`),
  ADD KEY `fk_item_id` (`item_id`),
  ADD KEY `fk_datepolicy_id` (`datepolicy_id`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `supplier_detail`
--
ALTER TABLE `supplier_detail`
  ADD PRIMARY KEY (`supplier_id`);

--
-- Indexes for table `supplier_item`
--
ALTER TABLE `supplier_item`
  ADD PRIMARY KEY (`supplier_id`,`item_id`),
  ADD KEY `item_id` (`item_id`),
  ADD KEY `status` (`status`);

--
-- Indexes for table `supplier_item_status`
--
ALTER TABLE `supplier_item_status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `taxing_scheme`
--
ALTER TABLE `taxing_scheme`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `unit`
--
ALTER TABLE `unit`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `code` (`code`),
  ADD KEY `unit_type_id` (`unit_type_id`);

--
-- Indexes for table `unit_type`
--
ALTER TABLE `unit_type`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `currency`
--
ALTER TABLE `currency`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `date_policy`
--
ALTER TABLE `date_policy`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `date_term`
--
ALTER TABLE `date_term`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `designation`
--
ALTER TABLE `designation`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `item`
--
ALTER TABLE `item`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `item_category`
--
ALTER TABLE `item_category`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `item_type`
--
ALTER TABLE `item_type`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `location`
--
ALTER TABLE `location`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `payment_term`
--
ALTER TABLE `payment_term`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `purchase_order_status`
--
ALTER TABLE `purchase_order_status`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `reservation`
--
ALTER TABLE `reservation`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `supplier_item_status`
--
ALTER TABLE `supplier_item_status`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `taxing_scheme`
--
ALTER TABLE `taxing_scheme`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `unit`
--
ALTER TABLE `unit`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `unit_type`
--
ALTER TABLE `unit_type`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `admin`
--
ALTER TABLE `admin`
  ADD CONSTRAINT `admin_ibfk_1` FOREIGN KEY (`designation_id`) REFERENCES `designation` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `admin_image`
--
ALTER TABLE `admin_image`
  ADD CONSTRAINT `admin_image_ibfk_1` FOREIGN KEY (`admin_id`) REFERENCES `admin` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `admin_profile`
--
ALTER TABLE `admin_profile`
  ADD CONSTRAINT `admin_profile_ibfk_1` FOREIGN KEY (`admin_id`) REFERENCES `admin` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `inventory`
--
ALTER TABLE `inventory`
  ADD CONSTRAINT `inventory_ibfk_1` FOREIGN KEY (`item_id`) REFERENCES `item` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `inventory_ibfk_2` FOREIGN KEY (`location_id`) REFERENCES `location` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `inventory_ibfk_3` FOREIGN KEY (`unit_id`) REFERENCES `unit` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `item`
--
ALTER TABLE `item`
  ADD CONSTRAINT `item_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `item_category` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `item_ibfk_2` FOREIGN KEY (`item_type_id`) REFERENCES `item_type` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `item_ibfk_3` FOREIGN KEY (`store_unit`) REFERENCES `unit` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `item_category`
--
ALTER TABLE `item_category`
  ADD CONSTRAINT `item_category_ibfk_1` FOREIGN KEY (`parent_id`) REFERENCES `item_category` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `item_measure`
--
ALTER TABLE `item_measure`
  ADD CONSTRAINT `item_measure_ibfk_1` FOREIGN KEY (`size_unit`) REFERENCES `unit` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `item_measure_ibfk_2` FOREIGN KEY (`weight_unit`) REFERENCES `unit` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `item_point_detail`
--
ALTER TABLE `item_point_detail`
  ADD CONSTRAINT `item_point_detail_ibfk_1` FOREIGN KEY (`item_id`) REFERENCES `item` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `item_price`
--
ALTER TABLE `item_price`
  ADD CONSTRAINT `item_price_ibfk_1` FOREIGN KEY (`item_id`) REFERENCES `item` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `item_price_ibfk_2` FOREIGN KEY (`unit`) REFERENCES `unit` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `reservation`
--
ALTER TABLE `reservation`
  ADD CONSTRAINT `fk_customer_information_id` FOREIGN KEY (`customer_information_id`) REFERENCES `customerinformation` (`ID`),
  ADD CONSTRAINT `fk_datepolicy_id` FOREIGN KEY (`datepolicy_id`) REFERENCES `date_policy` (`id`),
  ADD CONSTRAINT `fk_item_id` FOREIGN KEY (`item_id`) REFERENCES `reservation` (`ID`);

--
-- Constraints for table `supplier_detail`
--
ALTER TABLE `supplier_detail`
  ADD CONSTRAINT `supplier_detail_ibfk_1` FOREIGN KEY (`supplier_id`) REFERENCES `supplier` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `supplier_item`
--
ALTER TABLE `supplier_item`
  ADD CONSTRAINT `supplier_item_ibfk_1` FOREIGN KEY (`supplier_id`) REFERENCES `supplier` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `supplier_item_ibfk_2` FOREIGN KEY (`item_id`) REFERENCES `item` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `supplier_item_ibfk_3` FOREIGN KEY (`status`) REFERENCES `supplier_item_status` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `unit`
--
ALTER TABLE `unit`
  ADD CONSTRAINT `unit_ibfk_1` FOREIGN KEY (`unit_type_id`) REFERENCES `unit_type` (`id`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
