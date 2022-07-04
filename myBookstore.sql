-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 02, 2022 at 04:25 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bookstore`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbladmin`
--

CREATE TABLE `tbladmin` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `adminNumber` varchar(100) NOT NULL,
  `adminUsername` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbladmin`
--

INSERT INTO `tbladmin` (`id`, `name`, `adminNumber`, `adminUsername`, `password`) VALUES
(1, 'RJ', '12345678', 'rj123 vcbb.com', '25d55ad283aa400af464c76d713c07ad');

-- --------------------------------------------------------

--
-- Table structure for table `tblbooks`
--

CREATE TABLE `tblbooks` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `price` double(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblbooks`
--

INSERT INTO `tblbooks` (`id`, `name`, `image`, `price`) VALUES
(1, 'Programming Logic & Design', 'ProgrammingLogic.jpg', 850.00),
(2, 'Operating Systems', 'OperatingSystems.jpg', 950.00),
(3, 'Java Programming', 'JavaProgramming.jpg', 800.00),
(4, 'Database Principles', 'DatabasePrinciples.jpeg', 790.00),
(5, 'System Analysis And Design', 'SystemAnalysis.jpg', 820.00),
(6, 'Pro C# with 9 NET 5', 'ProgrammingCsharp.jpg', 840.00),
(7, 'PHP Programming with MySQL', 'WebDevelopment.jpg', 940.00),
(8, 'Principles Info. Security', 'InformationSecurity.jpg', 860.00),
(9, 'The IIE Masterskill 1', 'Masterskill1.jpg', 850.00),
(10, 'The IIE Masterskill 2', 'Masterskiill2.jpg', 750.00);

-- --------------------------------------------------------

--
-- Table structure for table `tblorder`
--

CREATE TABLE `tblorder` (
  `orderNumber` int(11) NOT NULL,
  `fullName` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL,
  `city` varchar(100) NOT NULL,
  `zip` int(10) NOT NULL,
  `state` varchar(100) NOT NULL,
  `itemName` varchar(100) NOT NULL,
  `quantity` int(10) NOT NULL,
  `price` double(10,2) NOT NULL,
  `total` double(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblorder`
--

INSERT INTO `tblorder` (`orderNumber`, `fullName`, `email`, `address`, `city`, `zip`, `state`, `itemName`, `quantity`, `price`, `total`) VALUES
(1, 'Roberto', 'robertobooysen11@gmail.com', '6 Church Street', 'Clarkson', 6302, 'ZA', 'Programming Logic & Design', 1, 850.00, 850.00);

-- --------------------------------------------------------

--
-- Table structure for table `tbluser`
--

CREATE TABLE `tbluser` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `studentNumber` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbluser`
--

INSERT INTO `tbluser` (`id`, `name`, `studentNumber`, `username`, `password`, `status`) VALUES
(1, 'Roberto', 'ST10085125', 'Roberto1', '833646be6406d8d7d63e42a3ee268ba0', 'approved'),
(2, 'Keely-Ann', 'ST10085428', 'Keely', 'c8cbbb2e8c52b2f322cc9190e2497300', 'approved'),
(3, 'Nikita', 'ST10085223', 'Nikita', 'a148df4b80c36f0e6608c8a7dd01ca96', 'pending');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbladmin`
--
ALTER TABLE `tbladmin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblbooks`
--
ALTER TABLE `tblbooks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblorder`
--
ALTER TABLE `tblorder`
  ADD PRIMARY KEY (`orderNumber`);

--
-- Indexes for table `tbluser`
--
ALTER TABLE `tbluser`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbladmin`
--
ALTER TABLE `tbladmin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tblbooks`
--
ALTER TABLE `tblbooks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tblorder`
--
ALTER TABLE `tblorder`
  MODIFY `orderNumber` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbluser`
--
ALTER TABLE `tbluser`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
