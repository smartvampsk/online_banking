-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 21, 2019 at 06:51 AM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `banking`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `surname` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `firstname`, `surname`, `username`, `password`) VALUES
(1, 'dad', 'dad', 'hello', '$2y$10$jE95XGevudfGKy8xwyWUg.qGg6TMjK3rQ4Jgy72q0ROiNDOPupqqy'),
(3, 'adminname', 'adminsurname', 'admin', '$2y$10$uTwNDVw8NvhmxB.akYO0cefzRH6kz.4NyeudQZiimoUARG5qlXmCC');

-- --------------------------------------------------------

--
-- Table structure for table `balance`
--

CREATE TABLE `balance` (
  `balance_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `total` decimal(13,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `balance`
--

INSERT INTO `balance` (`balance_id`, `customer_id`, `total`) VALUES
(1, 10, '570.00'),
(2, 11, '10.00'),
(3, 12, '40.00'),
(14, 24, '0.00');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `customer_id` int(11) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `surname` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`customer_id`, `firstname`, `surname`, `gender`, `username`, `password`) VALUES
(10, 'avi', 'pan', 'Male', 'avipan', '$2y$10$maa4vQ2xMmOyM95.vXs0C.SGLS2gUf.0qw.BvtQu41awJ1bY5kKJm'),
(11, 'san', 'kha', 'Male', 'sankha', '$2y$10$sGAjX2HP/NQCO0sZWbavJuv8fhrnBO6pY12aS08CNd6Nk1TIvVLty'),
(12, 'shu', 'shre', 'Male', 'shushre', '$2y$10$zQ.1tW3D0L1KxcODXIloyuc.tcmexerpiiTKxm5ReWm5RZWz5FsZi'),
(24, 'dczc', 'DSADS', 'Female', 'DSADSA', '$2y$10$i3EFlbb9d0G82gr6RRcj2OjxVclHf6aCX8a8jnbUrlJkS3doF.B8u');

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE `message` (
  `msg_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `contact` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `message` varchar(999) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `message`
--

INSERT INTO `message` (`msg_id`, `name`, `contact`, `email`, `message`) VALUES
(1, 'avihal', '9854463546', 'avihal@gmail.com', 'sdajdlkas l'),
(2, 'avihal', '98465563464', 'avihal@gmail.com', 'hello htis isoi kjsdpa');

-- --------------------------------------------------------

--
-- Table structure for table `transact`
--

CREATE TABLE `transact` (
  `transact_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `receiver_id` int(11) DEFAULT NULL,
  `amount` decimal(13,2) NOT NULL,
  `description` varchar(999) NOT NULL,
  `submitted_on` datetime NOT NULL,
  `action_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transact`
--

INSERT INTO `transact` (`transact_id`, `customer_id`, `receiver_id`, `amount`, `description`, `submitted_on`, `action_id`) VALUES
(1, 10, NULL, '10.00', 'hello', '2019-08-21 11:28:26', 1),
(2, 10, NULL, '10.00', 'test', '2019-08-21 11:30:05', 2),
(3, 10, 11, '10.00', 'Family Expenses', '2019-08-21 11:33:30', 3),
(4, 10, NULL, '50.00', 'personal use', '2019-08-21 01:03:13', 1),
(5, 10, 12, '40.00', 'Bill Sharing', '2019-08-21 01:07:21', 3),
(6, 12, 10, '20.00', 'Lend/Borrow', '2019-08-21 01:09:06', 3),
(7, 10, NULL, '50.00', 'hjgkjhik', '2019-08-21 02:40:42', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `balance`
--
ALTER TABLE `balance`
  ADD PRIMARY KEY (`balance_id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`msg_id`);

--
-- Indexes for table `transact`
--
ALTER TABLE `transact`
  ADD PRIMARY KEY (`transact_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `balance`
--
ALTER TABLE `balance`
  MODIFY `balance_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `msg_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `transact`
--
ALTER TABLE `transact`
  MODIFY `transact_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
