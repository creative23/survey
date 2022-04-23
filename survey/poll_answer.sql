-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 03, 2021 at 08:50 PM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 7.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `poll`
--

-- --------------------------------------------------------

--
-- Table structure for table `poll_answer`
--

CREATE TABLE `poll_answer` (
  `ans_id` int(6) NOT NULL,
  `dt_created` datetime DEFAULT CURRENT_TIMESTAMP,
  `email` varchar(100) NOT NULL,
  `exam_no` varchar(100) NOT NULL,
  `qst_id` int(6) NOT NULL,
  `opt` varchar(50) NOT NULL,
  `correct` varchar(50) NOT NULL,
  `mark` int(1) NOT NULL
  
  
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


MODIFY dt_created datetime DEFAULT CURRENT_TIMESTAMP

--
ALTER TABLE `poll_answer`
  ADD PRIMARY KEY (`ans_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `poll_answer`
--
ALTER TABLE `poll_answer`
  MODIFY `ans_id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=187;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
