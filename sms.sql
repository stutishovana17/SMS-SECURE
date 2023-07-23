-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3308
-- Generation Time: Mar 11, 2022 at 12:24 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sms`
--

-- --------------------------------------------------------

--
-- Table structure for table `attendence`
--

CREATE TABLE `attendence` (
  `id` int(11) NOT NULL,
  `student name` varchar(20) NOT NULL,
  `course name` varchar(20) NOT NULL,
  `date` date NOT NULL,
  `faculty name` varchar(20) NOT NULL,
  `attendence` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `attendence`
--

INSERT INTO `attendence` (`id`, `student name`, `course name`, `date`, `faculty name`, `attendence`) VALUES
(101, 'Stuti Mohanty', 'MCA', '2022-02-20', 'Alok Tripathy', 50);

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `id` int(11) NOT NULL,
  `email` varchar(20) NOT NULL,
  `name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `email`, `name`) VALUES
(1, 'admin@123', 'Admin');

-- --------------------------------------------------------

--
-- Table structure for table `register`
--

CREATE TABLE `register` (
  `id` int(11) NOT NULL,
  `fullname` varchar(20) NOT NULL,
  `studentID` varchar(11) DEFAULT NULL,
  `mobile` varchar(20) NOT NULL,
  `course` text NOT NULL,
  `email` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `cpassword` varchar(20) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `register`
--

INSERT INTO `register` (`id`, `fullname`, `studentID`, `mobile`, `course`, `email`, `password`, `cpassword`, `image`) VALUES
(28, 'Stuti Mohanty', '', '852963147', 'MCA', 'stuti@gmail.com', 'Stuti@123', 'Stuti@123', ''),
(41, 'Ram Das', '1001', '85296314', 'MCA', 'Shovana@gmail.com', 'Shovana@123', 'Shovana@123', ''),
(44, 'Sneharani Muni', '1002', '852963123', 'MCA', 'sneha@gmail.com', 'Sneha@123', 'Sneha@123', '');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `studentID` int(11) NOT NULL,
  `fullname` varchar(20) NOT NULL,
  `mobile` varchar(10) NOT NULL,
  `email` varchar(20) NOT NULL,
  `course` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `cpassword` varchar(20) NOT NULL,
  `image` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`studentID`, `fullname`, `mobile`, `email`, `course`, `password`, `cpassword`, `image`) VALUES
(1, 'stuti shovana Mohant', '', 'stuti@gmail.com', 'mba', 'Stuti@123', 'Stuti@123', 'image/P1050393.jpg'),
(7, '', '', 'elon@gmail.com', 'msc', 'Elon@123', 'Elon@123', 'image/P1050393.jpg'),
(8, '', '', 'dipti@gmail.com', 'mtech', 'Dipti@123', 'Dipti@123', 'image/Sign.jpg'),
(9, '', '', 'sahu@gmail.com', 'msc', 'Indu@123', 'Indu@123', 'image/Adhaar.pdf'),
(10, '', '', 'stutishovana@gmail.c', 'mba', 'Stuti@123', 'Stuti@123', ''),
(12, '', '', 'ghtfjtyf', 'kygkiygki,', 'hjygykgku', 'hbhyjgk', ''),
(14, 'Bijay Laxmi', '0824991124', 'bijaya@gmail.com', 'mba', 'Bijaya@123', 'Bijaya@123', ''),
(15, 'Sneharani Muni', '0824991124', 'sneha@gmail.com', 'msc', 'Sneha@123', 'Sneha@123', 'imageupload/DSC_0411');

-- --------------------------------------------------------

--
-- Table structure for table `student details`
--

CREATE TABLE `student details` (
  `id` int(11) NOT NULL,
  `studentID` varchar(20) NOT NULL,
  `name` varchar(20) NOT NULL,
  `mobile` varchar(20) NOT NULL,
  `course` text NOT NULL,
  `image` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `register`
--
ALTER TABLE `register`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `studentID` (`studentID`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`studentID`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `student details`
--
ALTER TABLE `student details`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `register`
--
ALTER TABLE `register`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `studentID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `student details`
--
ALTER TABLE `student details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
