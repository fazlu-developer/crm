-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 24, 2023 at 03:47 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `crm_project`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_booking`
--

CREATE TABLE `tbl_booking` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `vehicle_number` varchar(255) NOT NULL,
  `state_id` int(11) NOT NULL COMMENT 'tbl_state.id',
  `city_id` int(11) NOT NULL COMMENT 'tbl_city.id',
  `created_date` varchar(255) DEFAULT NULL,
  `mod_date` varchar(255) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1 COMMENT '1-Active,2-Inactive,3-Deleted'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_booking`
--

INSERT INTO `tbl_booking` (`id`, `name`, `vehicle_number`, `state_id`, `city_id`, `created_date`, `mod_date`, `status`) VALUES
(1, 'fazlu', '3984983', 12, 3, '2023-09-24 15:46:00', NULL, 1),
(2, 'rehman', '3204032ljksdlkfj', 12, 3, '2023-09-24 15:40:17', NULL, 1),
(3, 'asdfjsfsf', 'lkjlklksdf', 13, 1, '2023-09-24 15:46:46', NULL, 3);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_city`
--

CREATE TABLE `tbl_city` (
  `id` int(11) NOT NULL,
  `state_id` int(11) NOT NULL COMMENT 'tbl_state.id',
  `title` varchar(555) NOT NULL,
  `created_date` datetime NOT NULL,
  `mod_date` datetime DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1 COMMENT '1-Active,2-InActive,3-Deleted'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_city`
--

INSERT INTO `tbl_city` (`id`, `state_id`, `title`, `created_date`, `mod_date`, `status`) VALUES
(1, 13, 'East Delhi', '2023-09-21 18:00:37', '2023-09-21 19:04:26', 1),
(2, 7, 'Rohtak', '2023-09-21 18:05:43', '2023-09-21 19:04:03', 1),
(3, 12, 'Bhiwani', '2023-09-21 18:56:54', NULL, 1),
(4, 13, 'kangra', '2023-09-21 18:57:54', NULL, 3),
(5, 7, 'delhi', '2023-09-24 14:43:32', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_customer`
--

CREATE TABLE `tbl_customer` (
  `id` int(11) NOT NULL,
  `name` varchar(555) NOT NULL,
  `email` varchar(555) DEFAULT NULL,
  `mobile` varchar(555) NOT NULL,
  `vehicle_type` tinyint(4) NOT NULL COMMENT '1-2 Wheeler,2-3 Wheeler,3-4 Wheeler',
  `vehicle_number` varchar(55) NOT NULL,
  `check_in_time` varchar(665) NOT NULL,
  `check_out_time` varchar(555) NOT NULL,
  `checkout_date` varchar(555) NOT NULL,
  `created_date` varchar(555) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1 COMMENT '1-Active,2-InActive,3-Deleted'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_customer`
--

INSERT INTO `tbl_customer` (`id`, `name`, `email`, `mobile`, `vehicle_type`, `vehicle_number`, `check_in_time`, `check_out_time`, `checkout_date`, `created_date`, `status`) VALUES
(1, 'Amit Kumar', 'amitkumarbaghpur@gmail.com', '8222817455', 1, 'DL-4547', '10:34', '10:34', '2023-09-20', '2023-09-21 19:34:04', 3),
(2, 'Sandeep Kumar', 'sandeep@gmail.com', '9898498498', 1, 'DL-4547', '09:47', '06:51', '2023-09-20', '2023-09-21 19:32:10', 1),
(3, 'Sonu Kumar', 'sonu@gmail.com', '9849848498', 1, 'DL-5648', '10:50', '06:54', '2023-09-20', '2023-09-21 19:35:14', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_state`
--

CREATE TABLE `tbl_state` (
  `id` int(11) NOT NULL,
  `title` varchar(555) NOT NULL,
  `created_date` datetime NOT NULL,
  `mod_date` datetime DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1 COMMENT '1-Active,2-InActive,3-Deleted'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_state`
--

INSERT INTO `tbl_state` (`id`, `title`, `created_date`, `mod_date`, `status`) VALUES
(1, 'sdfgsdfgsd', '2023-09-20 17:04:16', '2023-09-21 17:12:15', 3),
(2, 'Delhidsfgsdf', '2023-09-20 17:22:59', NULL, 3),
(3, 'Delhidsfgsdfsgsdfgsdfdsg', '2023-09-20 17:23:33', NULL, 3),
(4, 'Haryana', '2023-09-20 17:25:57', NULL, 3),
(5, 'Haryana', '2023-09-20 17:26:09', NULL, 3),
(6, 'gggggg', '2023-09-20 17:26:43', '2023-09-20 18:46:04', 3),
(7, 'Delhi', '2023-09-20 19:08:36', '2023-09-21 17:20:05', 1),
(8, 'Punjab sdf', '2023-09-20 19:08:48', '2023-09-21 17:12:39', 3),
(9, 'sdgsd sfgsdfgsdf', '2023-09-21 16:46:29', '2023-09-21 16:46:36', 3),
(10, 'Delhi fgsfdfg sdfgsdf', '2023-09-21 17:09:15', '2023-09-21 17:12:08', 3),
(11, 'sdgsdfgsd', '2023-09-21 17:12:22', NULL, 3),
(12, 'Haryana', '2023-09-21 17:12:50', NULL, 1),
(13, 'Himachal Pardesh', '2023-09-21 17:12:59', NULL, 1),
(14, 'Rajasthan', '2023-09-21 17:13:07', NULL, 1),
(15, 'Uttar Pardesh', '2023-09-21 17:13:16', '2023-09-21 17:19:50', 2);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users`
--

CREATE TABLE `tbl_users` (
  `id` int(11) NOT NULL,
  `name` varchar(555) NOT NULL,
  `username` varchar(555) NOT NULL,
  `password` varchar(555) NOT NULL,
  `created_date` datetime NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_users`
--

INSERT INTO `tbl_users` (`id`, `name`, `username`, `password`, `created_date`, `status`) VALUES
(1, 'Super Admin', 'admin@gmail.com', 'e6e061838856bf47e1de730719fb2609', '2023-09-20 14:47:08', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_booking`
--
ALTER TABLE `tbl_booking`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_city`
--
ALTER TABLE `tbl_city`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_customer`
--
ALTER TABLE `tbl_customer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_state`
--
ALTER TABLE `tbl_state`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_booking`
--
ALTER TABLE `tbl_booking`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_city`
--
ALTER TABLE `tbl_city`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_customer`
--
ALTER TABLE `tbl_customer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_state`
--
ALTER TABLE `tbl_state`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
