-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 11, 2024 at 11:15 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `oxygen`
--

-- --------------------------------------------------------

--
-- Table structure for table `bookingdetails`
--

CREATE TABLE `bookingdetails` (
  `booking_reference` varchar(60) NOT NULL,
  `fullname` varchar(60) NOT NULL,
  `phone` int(10) NOT NULL,
  `email` varchar(60) NOT NULL,
  `route` varchar(60) NOT NULL,
  `bus` varchar(60) NOT NULL,
  `selected_seats` varchar(60) NOT NULL,
  `total_fare` varchar(60) NOT NULL,
  `id` int(20) NOT NULL,
  `booking_date` timestamp(6) NOT NULL DEFAULT current_timestamp(6) ON UPDATE current_timestamp(6)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bookingdetails`
--

INSERT INTO `bookingdetails` (`booking_reference`, `fullname`, `phone`, `email`, `route`, `bus`, `selected_seats`, `total_fare`, `id`, `booking_date`) VALUES
('JE0TPC5G', 'Wambia Kennedy', 719191658, 'kennedy@gmail.com', 'Nairobi-Mombasa', 'Luxury Coach', 'B4', 'Ksh 1500', 1, '2024-10-04 06:52:19.993168'),
('MYNZ9Z1U', 'Otieno Kennedy Wambia', 719191658, 'kennedqy322@gmail.com', 'Mombasa-Kisumu', 'Comfort Ride', 'B9,A1,A5,A7', 'Ksh 5200', 2, '2024-10-04 06:52:19.993168'),
('EFDM1VE6', 'Otieno Kennedy Wambia', 719191658, 'kennedqy322@gmail.com', 'Kisumu-Nairobi', 'N/A', '7L', 'Ksh 1500', 3, '2024-10-04 06:52:19.993168'),
('D9EL4B69', 'Otieno Kennedy Wambia', 719191658, 'kennedqy322@gmail.com', 'Nairobi-Mombasa', 'Luxury Coach', 'B10,B11,A16', 'Ksh 4500', 4, '2024-10-04 06:52:19.993168'),
('XBQ32823', 'Otieno Wambia', 719191658, 'kennedqy382@gmail.com', 'Nairobi-Mombasa', 'Luxury Coach', 'A9', 'Ksh 1500', 5, '2024-10-04 06:52:19.993168'),
('X30489SA', 'jessy kite', 719191658, 'jesst@gmail.com', 'Nairobi-Mombasa', 'Luxury Coach', 'B18', 'Ksh 1500', 6, '2024-10-11 07:15:49.954470'),
('B1WAV8KQ', 'jessy kite', 719191658, 'jesst@gmail.com', 'Nairobi-Mombasa', 'Luxury Coach', 'B18', 'Ksh 1500', 7, '2024-10-11 07:59:06.888635'),
('B1WAV8KQ', 'jessy kite', 719191658, 'jesst@gmail.com', 'Nairobi-Mombasa', 'Luxury Coach', 'B18', 'Ksh 1500', 8, '2024-10-11 08:00:29.300232'),
('L945YBHP', 'Wambia Kennedy', 719191658, 'kennyleyy0@gmail.com', 'Nairobi-Mombasa', 'N/A', '11L', 'Ksh 1500', 9, '2024-10-11 09:05:44.056099'),
('L945YBHP', 'Wambia Kennedy', 719191658, 'kennyleyy0@gmail.com', 'Nairobi-Mombasa', 'N/A', '11L', 'Ksh 1500', 10, '2024-10-11 09:10:52.821505');

-- --------------------------------------------------------

--
-- Table structure for table `bus`
--

CREATE TABLE `bus` (
  `id` int(10) NOT NULL,
  `name` varchar(50) NOT NULL,
  `number` varchar(20) NOT NULL,
  `capacity` int(40) NOT NULL,
  `rout_from` varchar(50) NOT NULL,
  `rout_to` varchar(50) NOT NULL,
  `driver` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bus`
--

INSERT INTO `bus` (`id`, `name`, `number`, `capacity`, `rout_from`, `rout_to`, `driver`) VALUES
(7, 'Simba', 'KDC 22ED', 56, 'Kisumu', 'Siaya', 'Japheth Muga'),
(12, 'Easy Coach', 'KDD 55Q', 64, 'Mikindani', 'Nairobi', 'Elvis Omolo'),
(13, 'Nyaugenya', 'KCB R45', 68, 'Mombasa', 'Homabay', 'Brian Mwangi'),
(14, 'Honest', 'KJS 55RD', 70, 'Kisumu', 'Nairobi', 'John Pombe'),
(15, 'Honest', 'KJS 55TR', 70, 'Kisumu', 'Siaya', 'Kennedy Otieno');

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `id` int(10) NOT NULL,
  `name` varchar(40) NOT NULL,
  `email` varchar(40) NOT NULL,
  `phone` int(15) NOT NULL,
  `identity` int(12) NOT NULL,
  `password` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`id`, `name`, `email`, `phone`, `identity`, `password`) VALUES
(1, 'Wambia Kennedy', 'kennedy23@gmail.com', 719191658, 40006146, '81dc9bdb52d04dc20036dbd8313ed055'),
(2, 'Dorothy Oyieke', 'doro@gmail.com', 2147483647, 463552726, 'test'),
(3, 'Maxwel Juma', 'maxi@gmail.com', 743394373, 887756443, 'd93591bdf7860e1e4ee2fca799911215'),
(4, 'kenny leyy', 'kennyleyy0@gmail.com', 729309078, 400093984, '1234');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bookingdetails`
--
ALTER TABLE `bookingdetails`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bus`
--
ALTER TABLE `bus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bookingdetails`
--
ALTER TABLE `bookingdetails`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `bus`
--
ALTER TABLE `bus`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
