-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 04, 2020 at 05:12 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `foodedge`
--

CREATE DATABASE IF NOT EXISTS `foodedge` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `foodedge`;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `CustomerID` int(11) NOT NULL,
  `order_date` date NOT NULL,
  `order_status` char(10) NOT NULL,
  `occasion` varchar(50) NOT NULL,
  `package_id` int(11) NOT NULL,
  `address` varchar(255) NOT NULL,
  `event_time` time NOT NULL,
  `event_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `CustomerID`, `order_date`, `order_status`, `occasion`, `package_id`, `address`, `event_time`, `event_date`) VALUES
(1, 1, '2020-10-04', 'pending', 'Birthday', 1, 'No 249 Jalan Selising 7 Off JalanTaman Titian Waris Business Park 51200 Wilayah Persekutuan', '23:08:40', '2020-10-10'),
(2, 2, '2020-10-04', 'delivered', 'New Year', 2, 'No. 32 Ground Floor Tabuan Stutong Comm Centre Jln Setia Raja 93350Sarawak', '11:00:00', '2020-10-17');

-- --------------------------------------------------------

--
-- Table structure for table `package`
--

CREATE TABLE `package` (
  `package_id` int(11) NOT NULL,
  `package_name` varchar(255) NOT NULL,
  `package_cuisine` varchar(30) NOT NULL,
  `pax` int(11) NOT NULL,
  `price_per_pax` decimal(5,2) NOT NULL,
  `package_desc` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `package`
--

INSERT INTO `package` (`package_id`, `package_name`, `package_cuisine`, `pax`, `price_per_pax`, `package_desc`) VALUES
(1, 'Zats special', 'arabic', 20, '20.00', NULL),
(2, 'Zats special', 'arabic', 20, '20.00', 'sfapmfpmasfmaposmf');

-- --------------------------------------------------------

--
-- Table structure for table `userinformation`
--

CREATE TABLE `userinformation` (
  `CustomerID` int(11) NOT NULL,
  `CustomerFName` varchar(255) NOT NULL,
  `CustomerLName` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Password` char(82) NOT NULL,
  `PhoneNo` varchar(15) NOT NULL,
  `SecQuestion` varchar(255) NOT NULL,
  `SecAnswer` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `userinformation`
--

INSERT INTO `userinformation` (`CustomerID`, `CustomerFName`, `CustomerLName`, `Email`, `Password`, `PhoneNo`, `SecQuestion`, `SecAnswer`) VALUES
(1, 'Simon', 'Jingga', 'aoidja@gmail.com', 'oawjdoiawd', '0129301', 'oaksdoak', 'jingger'),
(2, 'Jibril', 'Saleem', 'jibril@gmail.com', 'presefy123', '0123456789', 'whats ur cat name', 'jingcat');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `orders_ibfk_1` (`package_id`),
  ADD KEY `orders_ibfk_2` (`CustomerID`);

--
-- Indexes for table `package`
--
ALTER TABLE `package`
  ADD PRIMARY KEY (`package_id`);

--
-- Indexes for table `userinformation`
--
ALTER TABLE `userinformation`
  ADD PRIMARY KEY (`CustomerID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `package`
--
ALTER TABLE `package`
  MODIFY `package_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `userinformation`
--
ALTER TABLE `userinformation`
  MODIFY `CustomerID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`package_id`) REFERENCES `package` (`package_id`),
  ADD CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`CustomerID`) REFERENCES `userinformation` (`CustomerID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
