-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 27, 2017 at 10:53 AM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dispensary`
--

-- --------------------------------------------------------

--
-- Table structure for table `issue details`
--

CREATE TABLE `issue details` (
  `id` int(11) NOT NULL,
  `issue_id` int(11) NOT NULL,
  `serial_number` varchar(25) NOT NULL,
  `batch_number` varchar(25) NOT NULL,
  `amount` int(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `issues`
--

CREATE TABLE `issues` (
  `issue_id` int(11) NOT NULL,
  `patient/inventory` int(1) NOT NULL,
  `patient_id` varchar(25) NOT NULL,
  `date` date NOT NULL,
  `u_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pending requests`
--

CREATE TABLE `pending requests` (
  `id` int(11) NOT NULL,
  `request_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `responded requests`
--

CREATE TABLE `responded requests` (
  `id` int(11) NOT NULL,
  `request_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `seen notifications`
--

CREATE TABLE `seen notifications` (
  `id` int(11) NOT NULL,
  `notification_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `unseen notifications`
--

CREATE TABLE `unseen notifications` (
  `id` int(11) NOT NULL,
  `notification_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `issue details`
--
ALTER TABLE `issue details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `issue_id` (`issue_id`);

--
-- Indexes for table `issues`
--
ALTER TABLE `issues`
  ADD PRIMARY KEY (`issue_id`);

--
-- Indexes for table `responded requests`
--
ALTER TABLE `responded requests`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `seen notifications`
--
ALTER TABLE `seen notifications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `unseen notifications`
--
ALTER TABLE `unseen notifications`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `issue details`
--
ALTER TABLE `issue details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `issues`
--
ALTER TABLE `issues`
  MODIFY `issue_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `responded requests`
--
ALTER TABLE `responded requests`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `seen notifications`
--
ALTER TABLE `seen notifications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `unseen notifications`
--
ALTER TABLE `unseen notifications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `issue details`
--
ALTER TABLE `issue details`
  ADD CONSTRAINT `issue details_ibfk_1` FOREIGN KEY (`issue_id`) REFERENCES `issues` (`issue_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
