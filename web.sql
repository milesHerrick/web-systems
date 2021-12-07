-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 07, 2021 at 06:19 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `web`
--

-- --------------------------------------------------------

--
-- Table structure for table `accounts`
--

CREATE TABLE `accounts` (
  `email` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `accounts`
--

INSERT INTO `accounts` (`email`, `password`) VALUES
('ben@gmail.com', 'test'),
('email@gmail.com', 'asdasd'),
('email@gmail.com', 'test'),
('miles@gmail.com', 'asdasd'),
('jim@gmail.com', 'red');

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `user` varchar(20) NOT NULL,
  `password` varchar(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`user`, `password`) VALUES
('admin', 'admin'),
('[admin', '[admin'),
('admin@', 'admin'),
('admin@gmail.com', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `appointments`
--

CREATE TABLE `appointments` (
  `Id` int(5) NOT NULL,
  `name` varchar(200) DEFAULT NULL,
  `email` varchar(200) DEFAULT NULL,
  `phone` varchar(15) DEFAULT NULL,
  `type` varchar(100) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `time` varchar(20) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `year` int(4) NOT NULL,
  `make` varchar(30) NOT NULL,
  `model` varchar(30) NOT NULL,
  `vin` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `appointments`
--

INSERT INTO `appointments` (`Id`, `name`, `email`, `phone`, `type`, `date`, `time`, `description`, `year`, `make`, `model`, `vin`) VALUES
(1, 'Ben', 'ben@gmail.com', '7337556521', 'oilchange', '2021-12-01', '18:41', 'efesfsfesf', 2000, 'Pontiac', 'Grand Prix', '342f2323'),
(2, 'Chase', 'chase@gmail.com', '7155695555', 'oilchange', '2021-12-01', '20:37', '', 2000, 'Pontiac', 'Grand Prix', '342f2323'),
(3, 'Miles', 'miles@gmail.com', '5958663421', 'oilchange', '2021-12-01', '20:40', '', 2000, 'Pontiac', 'Grand Prix', '342f2323'),
(4, 'Ben', 'rad@gmail.com', '59968855', 'oilchange', '2021-12-01', '20:43', '', 2000, 'Pontiac', 'Grand Prix', '342f2323'),
(5, 'Chad', 'chad@gmail.com', '7158556332', 'oilchange', '2021-12-01', '20:45', '', 2000, 'Pontiac', 'Grand Prix', '342f2323'),
(6, 'Ben', 'ben@gmail.com', '59968855', 'oilchange', '2021-12-01', '20:46', '', 2000, 'Pontiac', 'Grand Prix', '342f2323'),
(7, 'Ben', 'ben@gmail.com', '59968855', 'oilchange', '2021-12-01', '20:46', '', 2000, 'Pontiac', 'Grand Prix', '342f2323'),
(8, 'Ben', 'ben@gmail.com', '59968855', 'oilchange', '2021-12-01', '20:50', '', 2000, 'Pontiac', 'Grand Prix', '342f2323'),
(9, 'Ben', 'ben@gmail.com', '5958663421', 'oilchange', '2021-12-07', '20:02', '', 2000, 'Pontiac', 'Grand Prix', '1234567880'),
(10, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

CREATE TABLE `review` (
  `description` varchar(200) DEFAULT NULL,
  `stars` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `review`
--

INSERT INTO `review` (`description`, `stars`) VALUES
('asdasdasd', 0),
('awdawdawd', 0),
('adawdawd', 4),
('awdawd', 1);

-- --------------------------------------------------------

--
-- Stand-in structure for view `test_view`
-- (See below for the actual view)
--
CREATE TABLE `test_view` (
`description` varchar(200)
,`stars` int(11)
);

-- --------------------------------------------------------

--
-- Structure for view `test_view`
--
DROP TABLE IF EXISTS `test_view`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `test_view`  AS SELECT `review`.`description` AS `description`, `review`.`stars` AS `stars` FROM `review` ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `appointments`
--
ALTER TABLE `appointments`
  ADD PRIMARY KEY (`Id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `appointments`
--
ALTER TABLE `appointments`
  MODIFY `Id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
