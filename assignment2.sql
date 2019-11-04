-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 04, 2019 at 10:23 AM
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
(71, 21, 15, 90, 50, 140, '2019-01-26', 1, 0),
(72, 23, 15, 30, 40, 70, '2019-10-29', 1, 0),
(73, 22, 15, 100, 150, 250, '2019-12-30', 0, 0),
(74, 24, 15, 200, 150, 350, '2019-12-12', 1, 0),
(75, 25, 13, 400, 500, 900, '2019-12-31', 1, 0),
(76, 26, 13, 300, 900, 1200, '2019-11-12', 0, 1),
(77, 22, 13, 250, 200, 450, '2019-12-26', 0, 0),
(78, 26, 13, 250, 900, 1150, '2019-10-12', 0, 0),
(79, 28, 15, 600, 1200, 1800, '2020-02-21', 0, 1),
(80, 26, 15, 150, 900, 1050, '2019-10-12', 1, 0),
(81, 28, 15, 500, 1200, 1700, '2020-02-22', 0, 0),
(82, 32, 16, 50, 200, 250, '2019-11-29', 0, 0),
(83, 22, 16, 100, 150, 250, '2019-12-30', 0, 1),
(84, 38, 15, 150, 0, 150, '2019-12-30', 1, 0);

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
(20, 14, 'Cleaning', 'Garage and attic cleaning', 'Queens Avenue', 150, '2019-01-30', '2019-01-25', 1, 1),
(21, 14, 'Roofing', 'Repair the roofing to prevent leakage', 'Queens Ave', 150, '2019-10-31', '2019-11-01', 0, 1),
(22, 19, 'Electrical', 'Dining room lighting and rewiring', 'Lyon Street', 250, '2019-12-30', '2019-12-25', 0, 0),
(23, 19, 'Washing', 'Car Washing and waxing', 'Beatty Street', 50, '2019-10-31', '2019-10-24', 0, 1),
(24, 14, 'Plumbing', 'Repair bathroom plumbing', 'Dinsdale', 200, '2019-12-20', '2019-12-15', 1, 1),
(25, 14, 'Fencing', 'Put fence around 25 acre property', 'Napier', 850, '2019-11-01', '2019-12-30', 0, 1),
(26, 19, 'Catering', 'Prepare and serve food for 15 people', 'Melville', 1000, '2019-10-15', '2019-10-10', 0, 1),
(28, 14, 'Building', 'Building a deck on the backyard', 'Claudelands', 1500, '2019-02-23', '2019-02-20', 0, 0),
(31, 20, 'Cleaning', 'cleaning lawn and attic', 'Mahoe', 200, '2019-10-29', '2019-10-25', 0, 0),
(32, 21, 'Cleaning', 'Cleaning attic', 'mahoe', 200, '2019-11-30', '2019-11-29', 0, 0),
(33, 21, 'Roofing', 'roof work', 'mahoe', 200, '2019-12-30', '2019-12-26', 0, 0),
(34, 21, 'fencing', 'fencing for house', 'hamilton', 200, '2019-12-31', '2019-12-25', 1, 0),
(35, 22, 'Repairing', 'Car repairing', 'Glenview', 100, '2020-02-02', '2020-01-25', 0, 0),
(36, 22, 'Electrical', 'Kitchen lighting', 'Jones Street', 150, '2020-01-25', '2020-01-20', 0, 0),
(37, 19, 'Building', 'Buiding play area for kids in the back yard', 'Dinsdale', 600, '2020-02-02', '2020-01-25', 0, 0),
(38, 19, 'BabySitting', 'Take care of 5 year old for 3 hours for five days', 'Terapa', 130, '2020-01-01', '2019-12-30', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `reviewdetails`
--

CREATE TABLE `reviewdetails` (
  `rid` int(11) NOT NULL,
  `EstimateId` int(11) NOT NULL,
  `Comment` varchar(255) NOT NULL,
  `Rating` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reviewdetails`
--

INSERT INTO `reviewdetails` (`rid`, `EstimateId`, `Comment`, `Rating`) VALUES
(7, 75, 'Awesome service', 5),
(8, 71, 'Bad service', 2),
(9, 72, 'Okay job', 3);

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
(13, 'don', 'dan', 'don@mail.com', 2041871686, '202cb962ac59075b964b07152d234b70', 0),
(14, 'RAYMOL', 'MATHEW', 'anna.stephen@gmail.com', 2041871686, '202cb962ac59075b964b07152d234b70', 0),
(15, 'stefan', 'salvatore', 'stefan@123.com', 2041871686, '202cb962ac59075b964b07152d234b70', 0),
(16, 'Joey', 'Tribbiani', 'joey@123.com', 2041871686, '202cb962ac59075b964b07152d234b70', 0);

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
(14, 'Anna', 'Anita', '1/11 Queens Ave', 'Frankton', 'Hamilton', 3204, 2041871686, 'anna@mail.com', '202cb962ac59075b964b07152d234b70'),
(18, 'Annas', 'Mathew', '1/1 Beatty Street, Melville', 'Hamilton', 'Hamilton', 3200, 2041871686, 'cat@mail.com', '202cb962ac59075b964b07152d234b70'),
(19, 'Elena', 'Gilbert', '1/11', 'Street', 'Mystic Falls', 1234, 2041871686, 'tvd@123.com', '202cb962ac59075b964b07152d234b70'),
(21, 'Ron', 'Rex', '1/11 Queens Ave', 'Frankton', 'Hamilton', 3204, 2041871686, 'ron@123.com', '202cb962ac59075b964b07152d234b70'),
(22, 'Liam', 'Sam', '111 Lake cres', 'frankton', 'Hamilton', 3204, 2041871686, 'liam@123.com', '202cb962ac59075b964b07152d234b70');

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
-- Indexes for table `reviewdetails`
--
ALTER TABLE `reviewdetails`
  ADD PRIMARY KEY (`rid`);

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
  MODIFY `EstimateId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85;

--
-- AUTO_INCREMENT for table `jobdetails`
--
ALTER TABLE `jobdetails`
  MODIFY `JobId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `reviewdetails`
--
ALTER TABLE `reviewdetails`
  MODIFY `rid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tradesmandetails`
--
ALTER TABLE `tradesmandetails`
  MODIFY `TId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `userdetails`
--
ALTER TABLE `userdetails`
  MODIFY `UId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
