-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 26, 2023 at 05:51 AM
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
-- Database: `cs631project`
--

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `email` varchar(255) NOT NULL,
  `SSN` varchar(11) NOT NULL,
  `position` varchar(50) DEFAULT NULL,
  `salary` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`email`, `SSN`, `position`, `salary`) VALUES
('instructor@sports.com', '111111111', 'instructor', 50000.00),
('', '11111112', 'front desk', 40000.00),
('instructor1@sports.com', '11111113', 'instructor', 50000.00),
('', '11111114', 'cleaner', 30000.00),
('manager@sports.com', '123456789', 'manager', 80000.00);

-- --------------------------------------------------------

--
-- Table structure for table `exercise`
--

CREATE TABLE `exercise` (
  `Description` text DEFAULT NULL,
  `exercise_number` int(11) NOT NULL,
  `exercise_type` varchar(50) DEFAULT NULL,
  `exercise_name` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `exercise`
--

INSERT INTO `exercise` (`Description`, `exercise_number`, `exercise_type`, `exercise_name`) VALUES
('45 min equestrian class with instructor', 201, 'class', 'Horseback Riding'),
('45 min archery class with instructor', 202, 'class', 'Archery'),
('45 min of open water swimming', 203, 'class', 'Swimming'),
('45 min of wrestling', 204, 'class', 'Wrestling');

-- --------------------------------------------------------

--
-- Table structure for table `exerciseclass`
--

CREATE TABLE `exerciseclass` (
  `exercise_number` int(11) DEFAULT NULL,
  `class_number` int(11) NOT NULL,
  `duration` int(11) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `start_time` time DEFAULT NULL,
  `building` varchar(50) DEFAULT NULL,
  `room_number` int(11) DEFAULT NULL,
  `instructor_number` int(11) DEFAULT NULL,
  `max_occupancy` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `exerciseclass`
--

INSERT INTO `exerciseclass` (`exercise_number`, `class_number`, `duration`, `date`, `start_time`, `building`, `room_number`, `instructor_number`, `max_occupancy`) VALUES
(201, 3, 45, '2023-08-14', '16:00:00', '300', 3, 1, 1),
(202, 4, 45, '2023-08-14', '17:00:00', '300', 2, 2, 2),
(203, 5, 45, '2023-08-25', '17:00:00', '300', 2, 2, 30),
(204, 6, 45, '2023-08-26', '11:00:00', '300', 3, 1, 10),
(201, 7, 100, '2023-08-25', '23:37:00', '300', 2, 1, 80),
(201, 8, 100, '2023-08-25', '23:37:00', '300', 2, 1, 80),
(202, 9, 50, '2023-08-30', '23:44:00', '300', 3, 1, 74);

-- --------------------------------------------------------

--
-- Table structure for table `external`
--

CREATE TABLE `external` (
  `SSN` varchar(11) NOT NULL,
  `Wage` decimal(10,2) DEFAULT NULL,
  `hours` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `external`
--

INSERT INTO `external` (`SSN`, `Wage`, `hours`) VALUES
('111111114', 20.00, 0.00),
('111111115', 30.00, 0.00);

-- --------------------------------------------------------

--
-- Table structure for table `instructor`
--

CREATE TABLE `instructor` (
  `SSN` varchar(11) NOT NULL,
  `instructor_number` int(11) DEFAULT NULL,
  `instructor_name` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `instructor`
--

INSERT INTO `instructor` (`SSN`, `instructor_number`, `instructor_name`) VALUES
('111111111', 1, 'John Doe'),
('111112222', 2, 'Jane Yoe');

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE `member` (
  `M_number` int(11) NOT NULL,
  `M_name` varchar(100) DEFAULT NULL,
  `M_address` varchar(200) DEFAULT NULL,
  `registration_date` datetime DEFAULT current_timestamp(),
  `type` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`M_number`, `M_name`, `M_address`, `registration_date`, `type`, `email`) VALUES
(60, '', '', NULL, '', ''),
(61, '', '', NULL, '', ''),
(62, '', '', NULL, '', ''),
(63, '', '', NULL, '', ''),
(64, '', '', NULL, '', ''),
(65, '', '', NULL, '', ''),
(66, '', '', NULL, '', ''),
(67, '', '', '2023-08-23 18:19:28', '', ''),
(68, '', '', '2023-08-23 18:32:15', 'Tier1', ''),
(69, 'Test', '123 main st\r\ngoing, CA\r\n12311', '2023-08-23 18:42:17', 'Tier1', 'test@test.com'),
(70, 'Albert', '123 Main St\r\nSetee, CA\r\n12442', '2023-08-23 22:45:40', 'Tier2', 'albert@albert.com'),
(71, 'beebop', '123 pp\r\nfeet, CA\r\n00077', '2023-08-23 22:48:53', 'Tier3', 'beebop@bop.com'),
(72, 'Albert', '123 ern rd\r\nRoot, GH\r\n12345', '2023-08-24 01:55:26', 'Tier1', 'albert@albert.com'),
(73, 'Shkaboom', '123 Right tr\r\nEin, ER\r\n12345', '2023-08-24 02:08:21', 'Tier1', 'shk@boom.com'),
(74, 'Albert', 'aregarhg', '2023-08-24 02:10:11', 'Tier1', 'test@test.com'),
(76, 'Brad', 'asrg e', '2023-08-24 02:43:29', 'Tier1', 'brad@chad.com'),
(77, 'Chris', '123 Main St.\r\nNewark, NJ\r\n09834', '2023-08-25 03:09:37', 'Tier1', 'chris@big.com'),
(78, 'Socrates', 'The streets', '2023-08-25 22:43:51', 'Tier1', 'soc@ath.com');

-- --------------------------------------------------------

--
-- Table structure for table `membership`
--

CREATE TABLE `membership` (
  `type` varchar(50) NOT NULL,
  `fee` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `membership`
--

INSERT INTO `membership` (`type`, `fee`) VALUES
('Tier1', 30.00),
('Tier2', 50.00),
('Tier3', 60.00),
('Tier4', 80.00);

-- --------------------------------------------------------

--
-- Table structure for table `registers`
--

CREATE TABLE `registers` (
  `M_number` int(11) NOT NULL,
  `class_number` int(11) NOT NULL,
  `R_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `room`
--

CREATE TABLE `room` (
  `building` varchar(50) DEFAULT NULL,
  `room_number` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `room`
--

INSERT INTO `room` (`building`, `room_number`) VALUES
('300', 2),
('300', 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`SSN`);

--
-- Indexes for table `exercise`
--
ALTER TABLE `exercise`
  ADD PRIMARY KEY (`exercise_number`);

--
-- Indexes for table `exerciseclass`
--
ALTER TABLE `exerciseclass`
  ADD PRIMARY KEY (`class_number`),
  ADD KEY `exercise_number` (`exercise_number`),
  ADD KEY `room_number` (`room_number`),
  ADD KEY `Instructor_number` (`instructor_number`);

--
-- Indexes for table `external`
--
ALTER TABLE `external`
  ADD PRIMARY KEY (`SSN`);

--
-- Indexes for table `instructor`
--
ALTER TABLE `instructor`
  ADD PRIMARY KEY (`SSN`),
  ADD KEY `Instructor_number` (`instructor_number`);

--
-- Indexes for table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`M_number`);

--
-- Indexes for table `membership`
--
ALTER TABLE `membership`
  ADD PRIMARY KEY (`type`);

--
-- Indexes for table `registers`
--
ALTER TABLE `registers`
  ADD PRIMARY KEY (`M_number`,`class_number`),
  ADD KEY `class_number` (`class_number`);

--
-- Indexes for table `room`
--
ALTER TABLE `room`
  ADD PRIMARY KEY (`room_number`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `exerciseclass`
--
ALTER TABLE `exerciseclass`
  MODIFY `class_number` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `member`
--
ALTER TABLE `member`
  MODIFY `M_number` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `exerciseclass`
--
ALTER TABLE `exerciseclass`
  ADD CONSTRAINT `exerciseclass_ibfk_1` FOREIGN KEY (`exercise_number`) REFERENCES `exercise` (`exercise_number`),
  ADD CONSTRAINT `exerciseclass_ibfk_2` FOREIGN KEY (`room_number`) REFERENCES `room` (`room_number`),
  ADD CONSTRAINT `exerciseclass_ibfk_3` FOREIGN KEY (`Instructor_number`) REFERENCES `instructor` (`Instructor_number`);

--
-- Constraints for table `registers`
--
ALTER TABLE `registers`
  ADD CONSTRAINT `registers_ibfk_1` FOREIGN KEY (`M_number`) REFERENCES `member` (`M_number`),
  ADD CONSTRAINT `registers_ibfk_2` FOREIGN KEY (`class_number`) REFERENCES `exerciseclass` (`class_number`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
