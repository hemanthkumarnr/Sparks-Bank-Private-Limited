-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 21, 2021 at 07:22 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sparksbank`
--

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `cus_id` int(5) NOT NULL,
  `cus_name` varchar(20) NOT NULL,
  `cus_gmail` varchar(50) NOT NULL,
  `balance` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`cus_id`, `cus_name`, `cus_gmail`, `balance`) VALUES
(10200, 'Abhiram', 'abhiramkumar@gmail.com', 5670),
(10201, 'Vinay', 'nofearvinaybt@gmail.com', 5808),
(10202, 'Hemanth Kumar N R', 'hemanthkumar@gmail.com', 8400),
(10203, 'Divya', 'divyashree@gmail.com', 6030),
(10204, 'Praveen B L', 'praveenbl@gmail.com', 6800),
(10205, 'Radika', 'radikareddy@gmail.com', 6320),
(10206, 'Bhuvanesh', 'bhuvanesh@gmail.com', 4411),
(10207, 'Anirudh', 'anirudh@gmail.com', 6531);

-- --------------------------------------------------------

--
-- Table structure for table `transfer`
--

CREATE TABLE `transfer` (
  `fromcustomer` varchar(20) NOT NULL,
  `tocustomer` varchar(20) NOT NULL,
  `amount` int(11) NOT NULL,
  `datetime` datetime NOT NULL DEFAULT current_timestamp(),
  `tran_id` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transfer`
--

INSERT INTO `transfer` (`fromcustomer`, `tocustomer`, `amount`, `datetime`, `tran_id`) VALUES
('Abhiram', 'Hemanth Kumar N R', 30, '2021-08-21 11:47:07', 1021),
('Hemanth Kumar N R', 'Bhuvanesh', 1000, '2021-08-21 12:54:48', 1022),
('Praveen B L', 'Vinay', 1000, '2021-08-21 13:26:57', 1023),
('Abhiram', 'Vinay', 500, '2021-08-21 14:12:27', 1024),
('Hemanth Kumar N R', 'Bhuvanesh', 100, '2021-08-21 20:13:14', 1025),
('Hemanth Kumar N R', 'Vinay', 500, '2021-08-21 22:10:59', 1026);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`cus_id`);

--
-- Indexes for table `transfer`
--
ALTER TABLE `transfer`
  ADD PRIMARY KEY (`tran_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `cus_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10210;

--
-- AUTO_INCREMENT for table `transfer`
--
ALTER TABLE `transfer`
  MODIFY `tran_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1027;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
