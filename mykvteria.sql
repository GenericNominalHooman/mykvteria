-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 21, 2022 at 01:03 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.2.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mykvteria`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `adminid` varchar(10) NOT NULL,
  `pass` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`adminid`, `pass`) VALUES
('admin', 'admin123');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(10) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`) VALUES
(1, 'breakfast'),
(2, 'lunch'),
(3, 'snack'),
(4, 'drink');

-- --------------------------------------------------------

--
-- Table structure for table `epcart`
--

CREATE TABLE `epcart` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `price` decimal(6,2) DEFAULT NULL,
  `quantity` int(11) NOT NULL,
  `username` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `eporderlist`
--

CREATE TABLE `eporderlist` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `menu_name` varchar(100) NOT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `total` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `eporderlist`
--

INSERT INTO `eporderlist` (`id`, `order_id`, `menu_name`, `price`, `quantity`, `total`) VALUES
(7, 3, 'Nasi Putih', '1.00', 2, '2.00'),
(8, 3, 'Ayam Masak Merah', '2.00', 2, '4.00');

-- --------------------------------------------------------

--
-- Table structure for table `eporders`
--

CREATE TABLE `eporders` (
  `id` int(11) NOT NULL,
  `dateorder` date NOT NULL DEFAULT current_timestamp(),
  `timeorder` time NOT NULL DEFAULT current_timestamp(),
  `username` varchar(100) NOT NULL,
  `status` varchar(100) DEFAULT NULL,
  `feedback` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `eporders`
--

INSERT INTO `eporders` (`id`, `dateorder`, `timeorder`, `username`, `status`, `feedback`) VALUES
(3, '2022-03-16', '10:30:54', 'Syazleen', 'Order Completed', 'harga mahal.');

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `id` int(10) NOT NULL,
  `name` varchar(100) NOT NULL,
  `category` varchar(100) NOT NULL,
  `price` decimal(6,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`id`, `name`, `category`, `price`) VALUES
(24, 'Spaghetti', 'Breakfast', '2.00'),
(25, 'Nasi Putih', 'Lunch', '1.00'),
(26, 'Ayam Masak Merah', 'Lunch', '2.50'),
(27, 'Green Tea', 'Drinks', '2.00'),
(28, 'Karipap (3 ketul)', 'Snack', '1.00');

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `prof` varchar(20) NOT NULL,
  `staffid` varchar(20) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`prof`, `staffid`, `username`, `password`) VALUES
('lect', 'LC112', 'Shafina', '123'),
('lect', 'LC123', 'Syazleen', '123');

-- --------------------------------------------------------

--
-- Table structure for table `stcart`
--

CREATE TABLE `stcart` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `price` decimal(6,2) DEFAULT NULL,
  `quantity` int(11) NOT NULL,
  `username` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `storderlist`
--

CREATE TABLE `storderlist` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `menu_name` varchar(100) NOT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `total` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `storderlist`
--

INSERT INTO `storderlist` (`id`, `order_id`, `menu_name`, `price`, `quantity`, `total`) VALUES
(69, 65, 'Spaghetti', '2.00', 1, '2.00'),
(70, 65, 'Karipap (3 ketul)', '1.00', 2, '2.00');

-- --------------------------------------------------------

--
-- Table structure for table `storders`
--

CREATE TABLE `storders` (
  `id` int(11) NOT NULL,
  `dateorder` date NOT NULL DEFAULT current_timestamp(),
  `timeorder` time NOT NULL DEFAULT current_timestamp(),
  `username` varchar(100) NOT NULL,
  `status` varchar(100) DEFAULT NULL,
  `feedback` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `storders`
--

INSERT INTO `storders` (`id`, `dateorder`, `timeorder`, `username`, `status`, `feedback`) VALUES
(65, '2022-03-16', '10:25:43', 'alia', 'Order Completed', 'Sedap.');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `studid` varchar(12) NOT NULL,
  `year` varchar(12) NOT NULL,
  `prog` varchar(12) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`studid`, `year`, `prog`, `username`, `password`) VALUES
('K151GKPD003', '2dvm', 'kpd', 'alia', '123'),
('K151GWTP003', '2dvm', 'wtp', 'dila', '123');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`adminid`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `epcart`
--
ALTER TABLE `epcart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `eporderlist`
--
ALTER TABLE `eporderlist`
  ADD PRIMARY KEY (`id`),
  ADD KEY `connected` (`order_id`);

--
-- Indexes for table `eporders`
--
ALTER TABLE `eporders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`staffid`);

--
-- Indexes for table `stcart`
--
ALTER TABLE `stcart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `storderlist`
--
ALTER TABLE `storderlist`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`order_id`);

--
-- Indexes for table `storders`
--
ALTER TABLE `storders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`studid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `epcart`
--
ALTER TABLE `epcart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `eporderlist`
--
ALTER TABLE `eporderlist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `eporders`
--
ALTER TABLE `eporders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `stcart`
--
ALTER TABLE `stcart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=109;

--
-- AUTO_INCREMENT for table `storderlist`
--
ALTER TABLE `storderlist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- AUTO_INCREMENT for table `storders`
--
ALTER TABLE `storders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `eporderlist`
--
ALTER TABLE `eporderlist`
  ADD CONSTRAINT `connected` FOREIGN KEY (`order_id`) REFERENCES `eporders` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `storderlist`
--
ALTER TABLE `storderlist`
  ADD CONSTRAINT `id` FOREIGN KEY (`order_id`) REFERENCES `storders` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
