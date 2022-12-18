-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Dec 18, 2022 at 07:15 AM
-- Server version: 10.4.16-MariaDB
-- PHP Version: 7.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `crudmachineproblem`
--

-- --------------------------------------------------------

--
-- Table structure for table `grades`
--

CREATE TABLE `grades` (
  `id` int(11) NOT NULL,
  `studentname` varchar(255) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `handledby` varchar(255) NOT NULL,
  `semester` varchar(255) NOT NULL,
  `studentg1stqr` int(11) NOT NULL,
  `studentg2ndqr` int(11) NOT NULL,
  `studentg3rdqr` int(11) NOT NULL,
  `studentg4thqr` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `grades`
--

INSERT INTO `grades` (`id`, `studentname`, `subject`, `handledby`, `semester`, `studentg1stqr`, `studentg2ndqr`, `studentg3rdqr`, `studentg4thqr`) VALUES
(1, 'Johannes Uther', 'Science 1', 'Anthony Isaac', '1st', 90, 95, 95, 90),
(5, 'Carla Yeager', 'Science 1', 'Anthony Isaac', '1st', 90, 90, 90, 90),
(7, 'Carla Yeager', 'Science 2', 'Anthony Isaac', '2nd', 85, 87, 90, 95),
(8, 'Johannes Uther', 'Science 2', 'Anthony Isaac', '2nd', 90, 95, 95, 95),
(9, 'Johannes Uther', 'Science 3', 'Anthony Isaac', '3rd', 95, 95, 95, 95),
(10, 'Johannes Uther', 'English 1', 'Marissa Malabanan', '1st', 90, 95, 95, 95),
(11, 'Carla Yeager', 'English 1', 'Marissa Malabanan', '1st', 90, 85, 89, 90),
(15, 'Johannes Uther', 'English 3', 'Marissa Malabanan', '3rd', 90, 95, 95, 90),
(16, 'Johannes Uther', 'English 2', 'Marissa Malabanan', '2nd', 95, 95, 90, 95),
(17, 'Carla Yeager', 'English 2', 'Marissa Malabanan', '2nd', 90, 89, 93, 95);

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `section` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `email`, `username`, `password`, `fullname`, `status`, `section`) VALUES
(1, 'johannes@gmail.com', 'johannes', '$2y$10$1GM7kjZ1T6VhKeGHiFbSwesnWPb5v/glicbxt2yoRHA11viPIZoZG', 'Johannes Uther', 'student', 'Diamond'),
(2, 'carlayeager@gmail.com', 'carlayeager', '$2y$10$1GM7kjZ1T6VhKeGHiFbSwesnWPb5v/glicbxt2yoRHA11viPIZoZG', 'Carla Yeager', 'student', 'Diamond');

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

CREATE TABLE `subjects` (
  `subjectid` int(11) NOT NULL,
  `subjectname` varchar(255) NOT NULL,
  `semester` varchar(255) NOT NULL,
  `department` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`subjectid`, `subjectname`, `semester`, `department`) VALUES
(1, 'English 1', '1st', 'English'),
(2, 'Math 1', '1st', 'Math'),
(3, 'Arts 1', '1st', 'Arts'),
(5, 'Science 1', '1st', 'Science'),
(6, 'English 2', '2nd', 'English'),
(7, 'Math 2', '2nd', 'Math'),
(8, 'Arts 2', '2nd', 'Arts'),
(9, 'Science 2', '2nd', 'Science'),
(10, 'English 3', '3rd', 'English'),
(11, 'Math 3', '3rd', 'Math'),
(12, 'Arts 3', '3rd', 'Arts'),
(13, 'Science 3', '3rd', 'Science'),
(14, 'English 4', '4th', 'English'),
(15, 'Math 4', '4th', 'Math'),
(16, 'Arts 4', '4th', 'Arts'),
(17, 'Science 4', '4th', 'Science');

-- --------------------------------------------------------

--
-- Table structure for table `teachers`
--

CREATE TABLE `teachers` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `department` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `teachers`
--

INSERT INTO `teachers` (`id`, `email`, `fullname`, `username`, `password`, `department`, `status`) VALUES
(1, 'marissamalabanan@gmail.com', 'Marissa Malabanan', 'marissa', '$2y$10$q5vT6ZuIoEal3SFNvZXMcuZnvIJW42qrlfvQ4VQ2oJ6M9z2Ql9QYK', 'English', 'teacher'),
(2, 'anthonyisaac@gmail.com', 'Anthony Isaac', 'anthonyisaac', '$2y$10$q5vT6ZuIoEal3SFNvZXMcuZnvIJW42qrlfvQ4VQ2oJ6M9z2Ql9QYK', 'Science', 'teacher');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `grades`
--
ALTER TABLE `grades`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`subjectid`);

--
-- Indexes for table `teachers`
--
ALTER TABLE `teachers`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `grades`
--
ALTER TABLE `grades`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `subjects`
--
ALTER TABLE `subjects`
  MODIFY `subjectid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `teachers`
--
ALTER TABLE `teachers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
