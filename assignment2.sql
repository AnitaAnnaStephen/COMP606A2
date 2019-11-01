-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 01, 2019 at 02:09 PM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.3.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `assignment2`
--

-- --------------------------------------------------------

--
-- Table structure for table `estimatedetails`
--

CREATE TABLE `estimatedetails` (
  `EstimateId` int(11) NOT NULL,
  `JobId` int(11) NOT NULL,
  `TId` int(11) NOT NULL,
  `LabourCost` double NOT NULL,
  `MaterialCost` double NOT NULL,
  `TotalCost` double NOT NULL,
  `ExpirationDate` date NOT NULL,
  `IsAccepted` int(11) NOT NULL,
  `IsDeleted` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `estimatedetails`
--

INSERT INTO `estimatedetails` (`EstimateId`, `JobId`, `TId`, `LabourCost`, `MaterialCost`, `TotalCost`, `ExpirationDate`, `IsAccepted`, `IsDeleted`) VALUES
(69, 18, 15, 100, 250, 350, '2019-12-28', 0, 0),
(71, 20, 15, 90, 50, 140, '2020-01-26', 0, 0),
(72, 23, 15, 30, 40, 70, '2019-12-25', 1, 0),
(73, 22, 15, 100, 150, 250, '2019-12-30', 1, 0),
(74, 24, 15, 200, 150, 350, '2019-12-12', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `jobdetails`
--

CREATE TABLE `jobdetails` (
  `JobId` int(11) NOT NULL,
  `UId` int(11) NOT NULL,
  `JobType` varchar(255) NOT NULL,
  `JobDescription` varchar(255) NOT NULL,
  `Location` varchar(50) NOT NULL,
  `CostRange` double NOT NULL,
  `ActiveDate` date NOT NULL,
  `EstimateDate` date NOT NULL,
  `IsClosed` int(11) NOT NULL,
  `IsEstimateAccepted` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jobdetails`
--

INSERT INTO `jobdetails` (`JobId`, `UId`, `JobType`, `JobDescription`, `Location`, `CostRange`, `ActiveDate`, `EstimateDate`, `IsClosed`, `IsEstimateAccepted`) VALUES
(18, 14, 'Roofing', 'Repair the roofing to prevent leakage', 'Queens Ave', 350, '2019-11-30', '2019-12-25', 1, 0),
(19, 14, 'Electrical', 'Dining room lighting and rewiring', 'Queens Ave', 150, '2020-01-01', '2019-12-25', 1, 0),
(20, 14, 'Cleaning', 'Garage and attic cleaning', 'Queens Avenue', 150, '2019-01-30', '2020-02-25', 1, 1),
(21, 14, 'Roofing', 'Repair the roofing to prevent leakage', 'Queens Ave', 150, '2019-10-31', '2019-11-01', 0, 1),
(22, 19, 'Electrical', 'Dining room lighting and rewiring', 'Lyon Street', 200, '2019-12-30', '2019-12-25', 0, 1),
(23, 19, 'Washing', 'Car Washing and waxing', 'Beatty Street', 50, '2019-10-31', '2019-12-20', 0, 1),
(24, 14, 'Plumbing', 'Repair bathroom plumbing', 'Dinsdale', 200, '2019-12-20', '2019-12-15', 0, 0),
(25, 14, 'Fencing', 'Put fence around 25 acre property', 'Napier', 800, '2020-01-01', '2019-12-30', 0, 0),
(26, 19, 'Catering', 'Prepare and serve food for 15 people', 'Melville', 1000, '2019-11-15', '2019-11-10', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tradesmandetails`
--

CREATE TABLE `tradesmandetails` (
  `TId` int(11) NOT NULL,
  `FirstName` varchar(255) NOT NULL,
  `LastName` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Phone` bigint(20) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `UId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tradesmandetails`
--

INSERT INTO `tradesmandetails` (`TId`, `FirstName`, `LastName`, `Email`, `Phone`, `Password`, `UId`) VALUES
(13, 'don', 'dan', 'don@mail.com', 2041871686, '25f9e794323b453885f5181f1b624d0b', 0),
(14, 'RAYMOL', 'MATHEW', 'anna.stephen@gmail.com', 2041871686, '25d55ad283aa400af464c76d713c07ad', 0),
(15, 'stefan', 'salvatore', 'stefan@123.com', 2041871686, '202cb962ac59075b964b07152d234b70', 0);

-- --------------------------------------------------------

--
-- Table structure for table `userdetails`
--

CREATE TABLE `userdetails` (
  `UId` int(11) NOT NULL,
  `FirstName` tinytext NOT NULL,
  `LastName` tinytext NOT NULL,
  `Address` tinytext NOT NULL,
  `Suburb` tinytext NOT NULL,
  `City` tinytext NOT NULL,
  `PO` int(11) NOT NULL,
  `Phone` bigint(20) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Password` tinytext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `userdetails`
--

INSERT INTO `userdetails` (`UId`, `FirstName`, `LastName`, `Address`, `Suburb`, `City`, `PO`, `Phone`, `Email`, `Password`) VALUES
(14, 'Anna', 'Anita', '1/11 Queens Ave', 'Frankton', 'Hamilton', 3204, 2041871686, 'anna@mail.com', '25d55ad283aa400af464c76d713c07ad'),
(18, 'Annas', 'Mathew', '1/1 Beatty Street, Melville', 'Hamilton', 'Hamilton', 3200, 2041871686, 'cat@mail.com', '25d55ad283aa400af464c76d713c07ad'),
(19, 'Elena', 'Gilbert', '1/11', 'Street', 'Mystic Falls', 1234, 123654879, 'tvd@123.com', '22d7fe8c185003c98f97e5d6ced420c7');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `estimatedetails`
--
ALTER TABLE `estimatedetails`
  ADD PRIMARY KEY (`EstimateId`);

--
-- Indexes for table `jobdetails`
--
ALTER TABLE `jobdetails`
  ADD PRIMARY KEY (`JobId`);

--
-- Indexes for table `tradesmandetails`
--
ALTER TABLE `tradesmandetails`
  ADD PRIMARY KEY (`TId`),
  ADD UNIQUE KEY `Email` (`Email`);

--
-- Indexes for table `userdetails`
--
ALTER TABLE `userdetails`
  ADD PRIMARY KEY (`UId`),
  ADD UNIQUE KEY `Email` (`Email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `estimatedetails`
--
ALTER TABLE `estimatedetails`
  MODIFY `EstimateId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;

--
-- AUTO_INCREMENT for table `jobdetails`
--
ALTER TABLE `jobdetails`
  MODIFY `JobId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `tradesmandetails`
--
ALTER TABLE `tradesmandetails`
  MODIFY `TId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `userdetails`
--
ALTER TABLE `userdetails`
  MODIFY `UId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
