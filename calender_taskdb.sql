-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 09, 2024 at 12:56 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `calender_taskdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `t_cal_storedate`
--

CREATE TABLE `t_cal_storedate` (
  `CAL_ID` int(11) NOT NULL,
  `SELECTED_DATES` date DEFAULT NULL COMMENT 'SELECTED_DATES : Store multiple date row wise.'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `t_cal_storedate`
--

INSERT INTO `t_cal_storedate` (`CAL_ID`, `SELECTED_DATES`) VALUES
(1, '2024-03-10'),
(2, '2024-03-11'),
(3, '2024-03-12'),
(4, '2024-03-17'),
(5, '2024-03-18'),
(6, '2024-03-19');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `t_cal_storedate`
--
ALTER TABLE `t_cal_storedate`
  ADD PRIMARY KEY (`CAL_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `t_cal_storedate`
--
ALTER TABLE `t_cal_storedate`
  MODIFY `CAL_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
