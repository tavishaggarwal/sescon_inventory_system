-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jul 10, 2015 at 08:15 AM
-- Server version: 5.5.41-0ubuntu0.14.04.1
-- PHP Version: 5.5.9-1ubuntu4.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `SesconInventoryManagement`
--

-- --------------------------------------------------------

--
-- Table structure for table `central_store`
--

CREATE TABLE IF NOT EXISTS `central_store` (
  `item_code` int(11) NOT NULL,
  `items_available` int(11) NOT NULL,
  `min_stock_level` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `central_store`
--

INSERT INTO `central_store` (`item_code`, `items_available`, `min_stock_level`) VALUES
(1, 10540, 200);

-- --------------------------------------------------------

--
-- Table structure for table `item`
--

CREATE TABLE IF NOT EXISTS `item` (
  `item_code` int(11) NOT NULL,
  `item_desc` varchar(100) NOT NULL,
  `unit_of_measure` varchar(100) NOT NULL,
  `central_retail_price` int(11) NOT NULL,
  `supplier_central_price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `item`
--

INSERT INTO `item` (`item_code`, `item_desc`, `unit_of_measure`, `central_retail_price`, `supplier_central_price`) VALUES
(1, 'shoes', 'number', 1000, 400);

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE IF NOT EXISTS `login` (
  `employee_id` int(11) NOT NULL AUTO_INCREMENT,
  `employee_name` varchar(100) NOT NULL,
  `user_name` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `employee_role_id` int(9) NOT NULL,
  PRIMARY KEY (`employee_id`),
  KEY `employee_role_id` (`employee_role_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`employee_id`, `employee_name`, `user_name`, `password`, `employee_role_id`) VALUES
(1, 'arjun', 'arjun_verma', '1234', 2),
(2, 'amit', 'amit_kumar', '1234', 3),
(3, 'abhishek', 'abhi', '1234', 4),
(4, 'arpit', 'arpit_verma', '1234', 1),
(5, 'ravi', 'ravi_mehta', '1234', 5);

-- --------------------------------------------------------

--
-- Table structure for table `mi`
--

CREATE TABLE IF NOT EXISTS `mi` (
  `mi_number` int(11) NOT NULL,
  `item_code` int(11) NOT NULL,
  `quantity_required` int(11) NOT NULL,
  `required_date` varchar(100) NOT NULL,
  `store_id` int(11) NOT NULL,
  `status` varchar(100) NOT NULL DEFAULT 'pending',
  `requested_date` varchar(100) NOT NULL,
  `requested_by` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mi`
--

INSERT INTO `mi` (`mi_number`, `item_code`, `quantity_required`, `required_date`, `store_id`, `status`, `requested_date`, `requested_by`) VALUES
(1, 1, 50, '15/07/2015', 101, 'accept', '9/07/2015', 'arjun');

-- --------------------------------------------------------

--
-- Table structure for table `min`
--

CREATE TABLE IF NOT EXISTS `min` (
  `mi_number` int(11) NOT NULL,
  `mi_date` varchar(100) NOT NULL,
  `item_code` int(11) NOT NULL,
  `mi_quantity` int(11) NOT NULL,
  `issued_quantity` int(11) NOT NULL,
  `issued_on` varchar(100) NOT NULL,
  `issue_to_whom` varchar(100) NOT NULL,
  `current_stock` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `min`
--

INSERT INTO `min` (`mi_number`, `mi_date`, `item_code`, `mi_quantity`, `issued_quantity`, `issued_on`, `issue_to_whom`, `current_stock`) VALUES
(1, '9/07/2015', 1, 50, 40, '12/07/2015', '101', 10530);

-- --------------------------------------------------------

--
-- Table structure for table `po`
--

CREATE TABLE IF NOT EXISTS `po` (
  `po_number` int(11) NOT NULL AUTO_INCREMENT,
  `po_date` varchar(100) NOT NULL,
  `item_code` int(11) NOT NULL,
  `supplier_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `raised_by` varchar(100) NOT NULL,
  `approved_by` varchar(100) DEFAULT NULL,
  `status` varchar(100) NOT NULL DEFAULT 'pending',
  PRIMARY KEY (`po_number`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `po`
--

INSERT INTO `po` (`po_number`, `po_date`, `item_code`, `supplier_id`, `quantity`, `raised_by`, `approved_by`, `status`) VALUES
(11, '9/07/2015', 1, 101, 50, 'abhishek', 'amit', 'accept');

-- --------------------------------------------------------

--
-- Table structure for table `retail_store`
--

CREATE TABLE IF NOT EXISTS `retail_store` (
  `store_id` int(11) NOT NULL,
  `store_name` varchar(100) NOT NULL,
  `item_code` int(11) NOT NULL,
  `items_available` int(11) NOT NULL,
  `min_stock_level` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `retail_store`
--

INSERT INTO `retail_store` (`store_id`, `store_name`, `item_code`, `items_available`, `min_stock_level`) VALUES
(101, 'ganesh_store', 1, 5, 15);

-- --------------------------------------------------------

--
-- Table structure for table `role_master`
--

CREATE TABLE IF NOT EXISTS `role_master` (
  `role_id` int(11) NOT NULL AUTO_INCREMENT,
  `role_description` varchar(100) NOT NULL,
  PRIMARY KEY (`role_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=102 ;

--
-- Dumping data for table `role_master`
--

INSERT INTO `role_master` (`role_id`, `role_description`) VALUES
(1, 'quality_manager'),
(2, 'retail_store'),
(3, 'head_central'),
(4, 'central_store_manager'),
(5, 'supplier'),
(101, 'rs_manager_101');

-- --------------------------------------------------------

--
-- Table structure for table `sin`
--

CREATE TABLE IF NOT EXISTS `sin` (
  `sin_no` int(11) NOT NULL AUTO_INCREMENT,
  `sin_date` varchar(100) NOT NULL,
  `item_code` int(11) NOT NULL,
  `items_delivered` int(11) NOT NULL,
  `recieved_date` varchar(100) NOT NULL,
  `quality_reference_number` int(11) NOT NULL DEFAULT '101',
  `quality_manager_name` varchar(100) NOT NULL,
  `quality_status` varchar(100) DEFAULT 'pending',
  `quantity_accepted` int(11) NOT NULL,
  `quantity_inspected` int(11) NOT NULL,
  `comments` varchar(100) NOT NULL,
  PRIMARY KEY (`sin_no`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `sin`
--

INSERT INTO `sin` (`sin_no`, `sin_date`, `item_code`, `items_delivered`, `recieved_date`, `quality_reference_number`, `quality_manager_name`, `quality_status`, `quantity_accepted`, `quantity_inspected`, `comments`) VALUES
(6, '15/07/2015', 1, 10, '14/07/2015', 101, 'arpit', 'accepted', 10, 10, 'good');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `login`
--
ALTER TABLE `login`
  ADD CONSTRAINT `login_ibfk_1` FOREIGN KEY (`employee_role_id`) REFERENCES `role_master` (`role_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
