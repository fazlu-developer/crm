-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 20, 2023 at 07:12 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

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
(1, 'Amit Kumar', 'amitkumarbaghpur@gmail.com', '8222817455', 1, 'DL-4547', '10:34', '10:34', '2023-09-20', '2023-09-20 15:42:34', 1),
(2, 'Sandeep Kumar', 'sandeep@gmail.com', '9898498498', 1, 'DL-4547', '09:47', '06:51', '2023-09-20', '2023-09-20 15:47:33', 1),
(3, 'Sonu Kumar', 'sonu@gmail.com', '9849848498', 1, 'DL-5648', '10:50', '06:54', '2023-09-20', '2023-09-20 15:50:23', 1);

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
(1, 'Haryana', '2023-09-20 17:04:16', '2023-09-20 19:03:48', 1),
(2, 'Delhidsfgsdf', '2023-09-20 17:22:59', NULL, 3),
(3, 'Delhidsfgsdfsgsdfgsdfdsg', '2023-09-20 17:23:33', NULL, 3),
(4, 'Haryana', '2023-09-20 17:25:57', NULL, 3),
(5, 'Haryana', '2023-09-20 17:26:09', NULL, 3),
(6, 'gggggg', '2023-09-20 17:26:43', '2023-09-20 18:46:04', 3),
(7, 'Delhi', '2023-09-20 19:08:36', NULL, 1),
(8, 'Punjab', '2023-09-20 19:08:48', '2023-09-20 19:10:35', 1);

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
-- AUTO_INCREMENT for table `tbl_city`
--
ALTER TABLE `tbl_city`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_customer`
--
ALTER TABLE `tbl_customer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_state`
--
ALTER TABLE `tbl_state`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
