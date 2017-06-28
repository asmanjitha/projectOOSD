-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 28, 2017 at 03:13 PM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hospital`
--

-- --------------------------------------------------------

--
-- Table structure for table `drug batches`
--

CREATE TABLE `drug batches` (
  `batch_number` varchar(25) NOT NULL,
  `serial_number` varchar(25) NOT NULL,
  `arrival` date NOT NULL,
  `expire` date NOT NULL,
  `arrival_amount` int(8) NOT NULL,
  `inventory_balance` int(11) NOT NULL,
  `dispensory_balance` int(11) NOT NULL,
  `other_departments_balance` int(11) NOT NULL,
  `total_balance` int(11) NOT NULL,
  `deleted` int(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `drugs`
--

CREATE TABLE `drugs` (
  `serial_number` varchar(25) NOT NULL,
  `drug_name` varchar(100) NOT NULL,
  `type` varchar(25) NOT NULL,
  `description` varchar(250) NOT NULL,
  `deleted` int(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `drugs`
--

INSERT INTO `drugs` (`serial_number`, `drug_name`, `type`, `description`, `deleted`) VALUES
('123', 'drug1', 'Tablet', 's jv jmc vmcx', 0),
('injet12gy32', 'insulin', 'Syrup', '', 0),
('paracitamol121cdv2w3', 'paracitamol', 'Tablet', '', 0),
('pen12e5f5', 'penadole', 'Tablet', 'paracitamol type of drug', 0),
('s12nujnb4', 'insulin1', 'Spray', '', 0),
('vintagino', 'vinef3f123', 'Cream', '100ml', 0);

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `notification_id` int(11) NOT NULL,
  `description` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `page_id` int(2) NOT NULL,
  `page_url` varchar(100) NOT NULL,
  `page_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`page_id`, `page_url`, `page_name`) VALUES
(2, 'createUser.php', 'Create A New User'),
(3, 'viewUser.php', 'View Users'),
(4, 'addANewDrug.php', 'Add A New Drug');

-- --------------------------------------------------------

--
-- Table structure for table `request details`
--

CREATE TABLE `request details` (
  `id` int(11) NOT NULL,
  `request_id` int(11) NOT NULL,
  `serial_number` varchar(25) NOT NULL,
  `batch_number` varchar(25) NOT NULL,
  `amount` int(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `requests`
--

CREATE TABLE `requests` (
  `request_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `sending_dept` int(11) NOT NULL,
  `receiving_dept` int(11) NOT NULL,
  `u_id` int(4) NOT NULL,
  `state` varchar(10) NOT NULL,
  `description` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `role2page`
--

CREATE TABLE `role2page` (
  `role_id` int(3) NOT NULL,
  `page_id` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `role2page`
--

INSERT INTO `role2page` (`role_id`, `page_id`) VALUES
(0, 2),
(0, 3),
(2, 4);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `role_id` int(4) NOT NULL,
  `role_name` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`role_id`, `role_name`) VALUES
(0, 'Admin'),
(1, 'Dispenser'),
(2, 'Inventory Manager');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `u_id` int(4) NOT NULL,
  `u_name` varchar(25) NOT NULL,
  `first_name` varchar(25) NOT NULL,
  `last_name` varchar(25) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(20) NOT NULL,
  `role_id` int(4) NOT NULL,
  `deleted` int(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`u_id`, `u_name`, `first_name`, `last_name`, `email`, `password`, `role_id`, `deleted`) VALUES
(2, 'admin', 'zfdsf', 'lastadmin', 'admin@gmail.com', 'superadmin', 0, 0),
(3, 'Dis1', 'FirstDis', 'LastDis', 'Dis1@gmail.com', 'Dis1@hospital', 1, 0),
(4, 'Inv1', 'firstInv1', 'lastInv1', 'Inv1@gmail.com', 'Inv1@hospital', 2, 0),
(5, 'DIs2', 'firstDis', 'LastDis', 'Dis2@gmail.com', 'Dis2@hospital', 1, 1),
(6, 'Inv2', 'firstInv', 'lastInv', 'Inv2@gmail.com', 'Inv2@hospital', 0, 0),
(7, 'DIs3', 'FirstDis', 'LastDis', 'Dis3@gmail.com', 'Dis3@hospital', 1, 0),
(8, 'Inv3', 'firstInv', 'lastInv', 'Inv3@gmail.com', 'Inv3@hospital', 0, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `drug batches`
--
ALTER TABLE `drug batches`
  ADD PRIMARY KEY (`batch_number`),
  ADD KEY `serial_number` (`serial_number`);

--
-- Indexes for table `drugs`
--
ALTER TABLE `drugs`
  ADD PRIMARY KEY (`serial_number`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`notification_id`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`page_id`);

--
-- Indexes for table `request details`
--
ALTER TABLE `request details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `request_id` (`request_id`);

--
-- Indexes for table `requests`
--
ALTER TABLE `requests`
  ADD PRIMARY KEY (`request_id`),
  ADD KEY `u_id` (`u_id`);

--
-- Indexes for table `role2page`
--
ALTER TABLE `role2page`
  ADD PRIMARY KEY (`role_id`,`page_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`role_id`),
  ADD UNIQUE KEY `role_name` (`role_name`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`u_id`),
  ADD UNIQUE KEY `u_name` (`u_name`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `role_id` (`role_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `notification_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `page_id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `request details`
--
ALTER TABLE `request details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `requests`
--
ALTER TABLE `requests`
  MODIFY `request_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `u_id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `drug batches`
--
ALTER TABLE `drug batches`
  ADD CONSTRAINT `drug batches_ibfk_1` FOREIGN KEY (`serial_number`) REFERENCES `drugs` (`serial_number`);

--
-- Constraints for table `request details`
--
ALTER TABLE `request details`
  ADD CONSTRAINT `request details_ibfk_1` FOREIGN KEY (`request_id`) REFERENCES `requests` (`request_id`);

--
-- Constraints for table `requests`
--
ALTER TABLE `requests`
  ADD CONSTRAINT `requests_ibfk_1` FOREIGN KEY (`u_id`) REFERENCES `users` (`u_id`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `roles` (`role_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
