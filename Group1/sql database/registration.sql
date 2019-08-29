-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 29, 2019 at 11:46 AM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `registration`
--

-- --------------------------------------------------------

--
-- Table structure for table `available_courses2018`
--

CREATE TABLE `available_courses2018` (
  `courseCode` varchar(15) NOT NULL,
  `courseTitle` text NOT NULL,
  `creditHour` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `available_courses2018`
--

INSERT INTO `available_courses2018` (`courseCode`, `courseTitle`, `creditHour`) VALUES
('csc400', 'Project ', 6),
('csc401', 'Organisation of Programing Language', 3),
('csc411', 'Artificial Intelligence and Expert Systems', 3),
('csc421', 'Software Engineering 1', 2),
('csc431', 'Database Design and Management 2', 3),
('csc441', 'Computer Modelling and Simulation', 3),
('csc451', 'Computer Networking and Data Communication', 3),
('csc461', 'Compiler Construction 2 (Elective)', 2),
('csc471', ' Special Topics in Software Engineering (Elective)', 2),
('csc481', 'Computer Lab 4', 1),
('csc491', 'Queuing System Performance Evaluation (Elective)', 2);

-- --------------------------------------------------------

--
-- Table structure for table `duespayment2018`
--

CREATE TABLE `duespayment2018` (
  `paymentid` int(13) NOT NULL,
  `matricNumber` varchar(20) NOT NULL,
  `fullname` varchar(30) NOT NULL,
  `level` varchar(10) NOT NULL,
  `referencekey` varchar(20) NOT NULL,
  `amountpaid` decimal(6,0) NOT NULL,
  `semester` varchar(15) NOT NULL,
  `paysession` varchar(15) NOT NULL,
  `paymentdate` date NOT NULL,
  `userkey` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `duespayment2018`
--

INSERT INTO `duespayment2018` (`paymentid`, `matricNumber`, `fullname`, `level`, `referencekey`, `amountpaid`, `semester`, `paysession`, `paymentdate`, `userkey`) VALUES
(2, '14/095244082', 'Okoi Prince Francis ', '400', '7654254625', '2500', 'First Semester', '2017/2018', '2018-06-12', 'ref-123456'),
(3, '14/095244082', 'Okoi Prince Francis ', '400', '7625323553', '2500', 'Second Semester', '2017/2018', '2018-07-08', 'ref-654321');

-- --------------------------------------------------------

--
-- Table structure for table `registered_courses2018`
--

CREATE TABLE `registered_courses2018` (
  `regID` int(15) NOT NULL,
  `matricNumber` varchar(20) NOT NULL,
  `fullName` varchar(50) NOT NULL,
  `department` varchar(20) NOT NULL,
  `level` varchar(12) NOT NULL,
  `semester` varchar(20) NOT NULL,
  `courseCode` varchar(10) NOT NULL,
  `courseTitle` varchar(50) NOT NULL,
  `creditHour` int(3) NOT NULL,
  `registered_at` date NOT NULL,
  `userkey` varchar(12) NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `registered_courses2018`
--

INSERT INTO `registered_courses2018` (`regID`, `matricNumber`, `fullName`, `department`, `level`, `semester`, `courseCode`, `courseTitle`, `creditHour`, `registered_at`, `userkey`, `status`) VALUES
(18, '14/095244082', 'okoi prince francis', 'computer science', '100', 'First Semester', 'csc400', 'Project ', 6, '2019-03-27', ' ref-123456', 'paid');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `matricNumber` varchar(15) NOT NULL,
  `lastName` varchar(15) NOT NULL,
  `firstName` varchar(30) NOT NULL,
  `otherNames` varchar(15) NOT NULL,
  `department` varchar(25) NOT NULL,
  `gender` enum('male','female') NOT NULL,
  `phone` varchar(15) NOT NULL,
  `password` varchar(30) NOT NULL,
  `status` enum('1','0') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`matricNumber`, `lastName`, `firstName`, `otherNames`, `department`, `gender`, `phone`, `password`, `status`) VALUES
('14/0952440118', 'Egbe', 'Smith', 'Etoma', 'computer science', 'male', '08168683062', '123456', '1'),
('14/095244072', 'Nyiam', 'Paul', 'Sunday', 'computer science', 'male', '08143317623', 'password', '1'),
('14/095244082', 'okoi', 'prince', 'francis', 'computer science', 'male', '07038077555', '123456', '1'),
('14/095244098', 'tabe', 'roland', 'tabe', 'computer science', 'male', '08068468648', '123456', '1'),
('14/095244118', 'egbe', 'etoma', 'smith', 'computer science', 'male', '08168683062', '123456', '1'),
('14/095344002', 'Adula', 'Jude', 'Abladoyi', 'computer science', 'male', '08038460496', 'junior', '1'),
('14/09876', 'jlk', 'kjkjhb', 'sdds', 'computer science', 'male', '2147483647', 'frank888', '1');

-- --------------------------------------------------------

--
-- Table structure for table `yearone`
--

CREATE TABLE `yearone` (
  `matricnumber` varchar(23) NOT NULL,
  `coursecode` varchar(12) NOT NULL,
  `coursetitle` varchar(100) NOT NULL,
  `ca` int(5) DEFAULT NULL,
  `exams` int(5) DEFAULT NULL,
  `credithour` int(3) NOT NULL,
  `grade` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `available_courses2018`
--
ALTER TABLE `available_courses2018`
  ADD PRIMARY KEY (`courseCode`);

--
-- Indexes for table `duespayment2018`
--
ALTER TABLE `duespayment2018`
  ADD PRIMARY KEY (`paymentid`),
  ADD UNIQUE KEY `userkey_2` (`userkey`),
  ADD UNIQUE KEY `referencekey` (`referencekey`),
  ADD KEY `matricNumber` (`matricNumber`),
  ADD KEY `userkey` (`userkey`);

--
-- Indexes for table `registered_courses2018`
--
ALTER TABLE `registered_courses2018`
  ADD PRIMARY KEY (`regID`),
  ADD KEY `matricNumber` (`matricNumber`),
  ADD KEY `courseCode` (`courseCode`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`matricNumber`);

--
-- Indexes for table `yearone`
--
ALTER TABLE `yearone`
  ADD PRIMARY KEY (`matricnumber`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `duespayment2018`
--
ALTER TABLE `duespayment2018`
  MODIFY `paymentid` int(13) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `registered_courses2018`
--
ALTER TABLE `registered_courses2018`
  MODIFY `regID` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `duespayment2018`
--
ALTER TABLE `duespayment2018`
  ADD CONSTRAINT `duespayment2018_ibfk_1` FOREIGN KEY (`matricNumber`) REFERENCES `users` (`matricNumber`);

--
-- Constraints for table `registered_courses2018`
--
ALTER TABLE `registered_courses2018`
  ADD CONSTRAINT `registered_courses2018_ibfk_1` FOREIGN KEY (`matricNumber`) REFERENCES `users` (`matricNumber`),
  ADD CONSTRAINT `registered_courses2018_ibfk_2` FOREIGN KEY (`courseCode`) REFERENCES `available_courses2018` (`courseCode`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
