-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 26, 2023 at 07:38 AM
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
-- Database: `videostore`
--

-- --------------------------------------------------------

--
-- Table structure for table `actor`
--

CREATE TABLE `actor` (
  `Actor_ID` int(3) NOT NULL,
  `Firstname` varchar(20) NOT NULL,
  `Lastname` varchar(20) NOT NULL,
  `Gender` varchar(6) NOT NULL,
  `Age` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `actor`
--

INSERT INTO `actor` (`Actor_ID`, `Firstname`, `Lastname`, `Gender`, `Age`) VALUES
(101, 'Leonado', 'Dicaprio', 'Male', 48),
(102, 'Michelle', 'Rodriguez', 'Female', 45);

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE `member` (
  `MID` int(5) NOT NULL,
  `First_name` varchar(20) NOT NULL,
  `Last_name` varchar(20) NOT NULL,
  `Telephone` int(10) NOT NULL,
  `Address` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`MID`, `First_name`, `Last_name`, `Telephone`, `Address`) VALUES
(10001, 'Jack', 'March', 293895849, 'Bangkok'),
(10002, 'James', 'Conner', 89985849, 'Bangkok'),
(10003, 'janny', 'Backpink', 887684979, 'Surattani'),
(10004, 'Jamies', 'Oliver', 89985849, 'Bangkok');

-- --------------------------------------------------------

--
-- Table structure for table `movies`
--

CREATE TABLE `movies` (
  `Movie_ID` int(3) NOT NULL,
  `Movie_name` varchar(50) NOT NULL,
  `Movie_length` int(3) NOT NULL COMMENT 'in minute',
  `Genre` varchar(50) NOT NULL,
  `DVD` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `movies`
--

INSERT INTO `movies` (`Movie_ID`, `Movie_name`, `Movie_length`, `Genre`, `DVD`) VALUES
(101, 'Avatar', 180, 'Sci-Fi', 2),
(102, 'Titanic', 180, 'Romantic', 1);

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE `sales` (
  `MID` int(5) NOT NULL,
  `Movie_ID` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sales`
--

INSERT INTO `sales` (`MID`, `Movie_ID`) VALUES
(10001, 101),
(10001, 102),
(10002, 102),
(10003, 102);

-- --------------------------------------------------------

--
-- Table structure for table `starring`
--

CREATE TABLE `starring` (
  `Movie_ID` int(5) NOT NULL,
  `Actor_ID` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `starring`
--

INSERT INTO `starring` (`Movie_ID`, `Actor_ID`) VALUES
(101, 101),
(102, 101),
(101, 102);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `actor`
--
ALTER TABLE `actor`
  ADD PRIMARY KEY (`Actor_ID`);

--
-- Indexes for table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`MID`);

--
-- Indexes for table `movies`
--
ALTER TABLE `movies`
  ADD PRIMARY KEY (`Movie_ID`);

--
-- Indexes for table `sales`
--
ALTER TABLE `sales`
  ADD KEY `Sales_MID_fk` (`MID`),
  ADD KEY `Sales_MovID_fk` (`Movie_ID`);

--
-- Indexes for table `starring`
--
ALTER TABLE `starring`
  ADD KEY `str_ACID_fk` (`Actor_ID`),
  ADD KEY `str_MovID_fk` (`Movie_ID`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `sales`
--
ALTER TABLE `sales`
  ADD CONSTRAINT `Sales_MID_fk` FOREIGN KEY (`MID`) REFERENCES `member` (`MID`),
  ADD CONSTRAINT `Sales_MovID_fk` FOREIGN KEY (`Movie_ID`) REFERENCES `movies` (`Movie_ID`);

--
-- Constraints for table `starring`
--
ALTER TABLE `starring`
  ADD CONSTRAINT `str_ACID_fk` FOREIGN KEY (`Actor_ID`) REFERENCES `actor` (`Actor_ID`),
  ADD CONSTRAINT `str_MovID_fk` FOREIGN KEY (`Movie_ID`) REFERENCES `movies` (`Movie_ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
