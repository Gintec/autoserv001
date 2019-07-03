-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 22, 2017 at 09:07 AM
-- Server version: 5.7.14
-- PHP Version: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kmdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `access`
--

CREATE TABLE `access` (
  `name` varchar(30) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `category` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `access`
--

INSERT INTO `access` (`name`, `username`, `password`, `category`) VALUES
('Mr Ikenna', 'kojoadmin', '@@kojo22', 'Administrator');

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `name` varchar(40) NOT NULL,
  `telephoneno` varchar(33) NOT NULL,
  `email` varchar(40) NOT NULL,
  `organization` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL,
  `customerid` varchar(30) NOT NULL,
  `remarks` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `diagnosis`
--

CREATE TABLE `diagnosis` (
  `customerid` varchar(30) NOT NULL,
  `jobno` varchar(30) NOT NULL,
  `diagnosis` varchar(300) NOT NULL,
  `problems` varchar(300) NOT NULL,
  `causes` varchar(300) NOT NULL,
  `request` varchar(300) NOT NULL,
  `deliverydate` date NOT NULL,
  `status` varchar(30) NOT NULL,
  `instructions` varchar(300) NOT NULL,
  `remarks` varchar(100) NOT NULL,
  `did` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `expenditure`
--

CREATE TABLE `expenditure` (
  `description` varchar(200) NOT NULL,
  `amount` varchar(30) NOT NULL,
  `dated` date NOT NULL,
  `spentby` varchar(50) NOT NULL,
  `paymethod` varchar(30) NOT NULL,
  `particulars` varchar(50) NOT NULL,
  `category` varchar(40) NOT NULL,
  `expid` int(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `inventory`
--

CREATE TABLE `inventory` (
  `partdesc` varchar(50) NOT NULL,
  `partno` varchar(40) NOT NULL,
  `unitcost` varchar(30) NOT NULL,
  `quantity` int(30) NOT NULL,
  `value` varchar(30) NOT NULL,
  `location` varchar(30) NOT NULL,
  `datesupplied` date NOT NULL,
  `remarks` varchar(50) NOT NULL,
  `partid` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `customerid` varchar(30) NOT NULL,
  `jobno` varchar(30) NOT NULL,
  `description` varchar(100) NOT NULL,
  `dated` date NOT NULL,
  `status` varchar(30) NOT NULL,
  `amount` varchar(30) NOT NULL,
  `jid` int(30) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `partsorder`
--

CREATE TABLE `partsorder` (
  `customerid` varchar(30) NOT NULL,
  `jobno` varchar(30) NOT NULL,
  `partsname` varchar(50) NOT NULL,
  `partsno` varchar(30) NOT NULL,
  `quantity` varchar(30) NOT NULL,
  `amount` varchar(30) NOT NULL,
  `pdate` date NOT NULL,
  `pid` int(20) NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `personnel`
--

CREATE TABLE `personnel` (
  `surname` varchar(40) NOT NULL,
  `firstname` varchar(40) NOT NULL,
  `othernames` varchar(40) NOT NULL,
  `designation` varchar(40) NOT NULL,
  `phoneno` varchar(40) NOT NULL,
  `email` varchar(50) NOT NULL,
  `address` varchar(100) NOT NULL,
  `department` varchar(50) NOT NULL,
  `salary` varchar(30) NOT NULL,
  `highestcert` varchar(60) NOT NULL,
  `password` varchar(50) NOT NULL,
  `guarantor` varchar(30) NOT NULL,
  `staffid` varchar(50) NOT NULL,
  `cv` varchar(50) NOT NULL,
  `dob` date NOT NULL,
  `stateoforigin` varchar(30) NOT NULL,
  `maritalstatus` varchar(30) NOT NULL,
  `empdate` date NOT NULL,
  `picture` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `personnel`
--

INSERT INTO `personnel` (`surname`, `firstname`, `othernames`, `designation`, `phoneno`, `email`, `address`, `department`, `salary`, `highestcert`, `password`, `guarantor`, `staffid`, `cv`, `dob`, `stateoforigin`, `maritalstatus`, `empdate`, `picture`) VALUES
('NWOKOMA', 'OGOCHUKWU', 'MIRIAMA', 'Staff', '08063535085', 'ogochukwueze82@gmail.com', 'H78 Behind Primary School, Jahi, Abuja', 'Sales', '40000', 'Bsc/Ebonyi  State University, Abakaliki(2014)', '@@kojo22', 'Anthony Nwokoma/07067973091', 'test', 'NWOKOMA_ANTHONY_CV(1).docx', '1995-02-11', 'Anambra', 'Single', '2017-12-31', 'IMG_20170709_134852.jpg'),
('Administrator', '', '', 'Administrator', '', '', '', '', '', '', 'admin', '', 'kojoadmin', '', '0000-00-00', '', '', '0000-00-00', '');

-- --------------------------------------------------------

--
-- Table structure for table `reports`
--

CREATE TABLE `reports` (
  `sender` varchar(50) NOT NULL,
  `reciever` varchar(50) NOT NULL,
  `dated` date NOT NULL,
  `category` varchar(50) NOT NULL,
  `title` varchar(93) NOT NULL,
  `description` varchar(500) NOT NULL,
  `status` varchar(30) NOT NULL,
  `mid` int(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE `sales` (
  `customerid` varchar(30) NOT NULL,
  `jobid` varchar(30) NOT NULL,
  `salesdesc` varchar(50) NOT NULL,
  `partno` varchar(50) NOT NULL,
  `quantity` varchar(30) NOT NULL,
  `amount` varchar(30) NOT NULL,
  `datesold` date NOT NULL,
  `paymethod` varchar(30) NOT NULL,
  `particulars` varchar(50) NOT NULL,
  `sid` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `schedule`
--

CREATE TABLE `schedule` (
  `customerid` varchar(50) NOT NULL,
  `jobno` varchar(50) NOT NULL,
  `vregno` varchar(50) NOT NULL,
  `scheduletype` varchar(30) NOT NULL,
  `nextappointment` date NOT NULL,
  `description` varchar(200) NOT NULL,
  `services` varchar(400) NOT NULL,
  `location` varchar(300) NOT NULL,
  `shid` int(11) NOT NULL,
  `phoneno` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `serviceorder`
--

CREATE TABLE `serviceorder` (
  `customerid` varchar(30) NOT NULL,
  `jobno` varchar(30) NOT NULL,
  `servicename` varchar(100) NOT NULL,
  `description` varchar(300) NOT NULL,
  `amount` varchar(30) NOT NULL,
  `sdate` date NOT NULL,
  `sid` int(20) NOT NULL,
  `status` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `servicename` varchar(100) NOT NULL,
  `description` varchar(150) NOT NULL,
  `cost` varchar(30) NOT NULL,
  `sid` int(30) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`servicename`, `description`, `cost`, `sid`) VALUES
('Wheel Alignment', 'Vehicle wheels are often aligned to precision using alignment equipments', '1500', 6),
('Wheel Balancing', 'This service involves entirely balancing the four wheels of a vehicle', '10000', 3);

-- --------------------------------------------------------

--
-- Table structure for table `vehicles`
--

CREATE TABLE `vehicles` (
  `customerid` varchar(30) NOT NULL,
  `jobno` varchar(30) NOT NULL,
  `vregno` varchar(30) NOT NULL,
  `regdate` date NOT NULL,
  `modelname` varchar(30) NOT NULL,
  `modelno` varchar(30) NOT NULL,
  `frameno` varchar(30) NOT NULL,
  `vin` varchar(30) NOT NULL,
  `color` varchar(30) NOT NULL,
  `chasisno` varchar(30) NOT NULL,
  `vcondition` varchar(50) NOT NULL,
  `daterecieved` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `access`
--
ALTER TABLE `access`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`customerid`);

--
-- Indexes for table `diagnosis`
--
ALTER TABLE `diagnosis`
  ADD PRIMARY KEY (`did`);

--
-- Indexes for table `expenditure`
--
ALTER TABLE `expenditure`
  ADD PRIMARY KEY (`expid`);

--
-- Indexes for table `inventory`
--
ALTER TABLE `inventory`
  ADD PRIMARY KEY (`partid`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`jid`);

--
-- Indexes for table `partsorder`
--
ALTER TABLE `partsorder`
  ADD PRIMARY KEY (`pid`);

--
-- Indexes for table `personnel`
--
ALTER TABLE `personnel`
  ADD PRIMARY KEY (`staffid`);

--
-- Indexes for table `reports`
--
ALTER TABLE `reports`
  ADD PRIMARY KEY (`mid`);

--
-- Indexes for table `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`sid`);

--
-- Indexes for table `schedule`
--
ALTER TABLE `schedule`
  ADD PRIMARY KEY (`shid`);

--
-- Indexes for table `serviceorder`
--
ALTER TABLE `serviceorder`
  ADD PRIMARY KEY (`sid`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`sid`);

--
-- Indexes for table `vehicles`
--
ALTER TABLE `vehicles`
  ADD PRIMARY KEY (`jobno`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `diagnosis`
--
ALTER TABLE `diagnosis`
  MODIFY `did` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `expenditure`
--
ALTER TABLE `expenditure`
  MODIFY `expid` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `inventory`
--
ALTER TABLE `inventory`
  MODIFY `partid` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `jid` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `partsorder`
--
ALTER TABLE `partsorder`
  MODIFY `pid` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;
--
-- AUTO_INCREMENT for table `reports`
--
ALTER TABLE `reports`
  MODIFY `mid` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
  MODIFY `sid` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
--
-- AUTO_INCREMENT for table `schedule`
--
ALTER TABLE `schedule`
  MODIFY `shid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `serviceorder`
--
ALTER TABLE `serviceorder`
  MODIFY `sid` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `sid` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
