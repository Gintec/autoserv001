-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 20, 2017 at 01:50 PM
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

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`name`, `telephoneno`, `email`, `organization`, `address`, `customerid`, `remarks`) VALUES
('Ogochukwu Nwokoma', '08063535085', 'ogochukwueze82@gmail.com', 'Mimi Pharmacy', 'Mabushi Way, Abuja', 'KJ120982', 'For contant repairs of car'),
('James Godan', '2347073838838', 'info@mail.com', 'Gimoskey Pablo Ltd', '1 Leach Road, Abakaliki', 'KJ123303', 'New Client'),
('Paul Biu', '07067973091', 'coinmac@yahoo.com', 'Paul Biu Sikes and Co', 'Okpara Street, London', 'KJ955603', 'Panket');

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

--
-- Dumping data for table `diagnosis`
--

INSERT INTO `diagnosis` (`customerid`, `jobno`, `diagnosis`, `problems`, `causes`, `request`, `deliverydate`, `status`, `instructions`, `remarks`, `did`) VALUES
('KJ123303', 'JK44284913', 'Oil Leakage from the Engine', 'Caused the car to be leaking oil', 'A hole in the Engine', 'Repair the Caburator', '0000-00-00', 'Badly Damage', 'Please let oil be pumping accurately through the system', 'By the MD', 7),
('KJ120982', 'JK15465606', 'SERIOUSLY DAMAGED', 'COMPLETELY EXHAUSTED', 'NO SERVICE FOR A LONG PERIOD OF TIME', 'TO BE RESERVICED', '0000-00-00', 'UNATTENDED TO', 'TO BE ATTENDED TO AS SOON AS POSSIBLE', 'Please make sure that the oil is checked regularly', 8);

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

--
-- Dumping data for table `expenditure`
--

INSERT INTO `expenditure` (`description`, `amount`, `dated`, `spentby`, `paymethod`, `particulars`, `category`, `expid`) VALUES
('Purchase of Fuel and Diesel for the Generator', '20000', '2017-12-20', 'Not Applicable', 'Cash', 'Voucher No: HSJ90303', 'Fuel/Diesel', 1),
('December Salary', '40000', '2017-12-20', 'KS12744687', 'Cash', 'Reciep No: 345', 'Salary', 2);

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

--
-- Dumping data for table `inventory`
--

INSERT INTO `inventory` (`partdesc`, `partno`, `unitcost`, `quantity`, `value`, `location`, `datesupplied`, `remarks`, `partid`) VALUES
('Damasco Oil', 'HJS9899', '6700', 10, '20', 'Storage 80B', '2017-12-31', 'Kept cool always', 10),
('Crankshaft', '782828N', '6000', 15, '60', 'DECK CW', '2017-12-30', 'For Jeeps and Volkswagen Only', 11);

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

--
-- Dumping data for table `partsorder`
--

INSERT INTO `partsorder` (`customerid`, `jobno`, `partsname`, `partsno`, `quantity`, `amount`, `pdate`, `pid`, `status`) VALUES
('KJ123303', 'JK44284913', 'Damasco Oil', 'HJS9899', '2', '15600', '2017-12-11', 19, 'Paid'),
('KJ120982', 'JK15465606', 'Damasco Oil', 'HJS9899', '2', '13400', '2017-12-16', 26, 'Paid'),
('KJ120982', 'JK15465606', 'Crankshaft', '782828N', '3', '18000', '2017-12-16', 27, 'Paid');

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
('', '', '', '', '', '', '', '', '', '', 'admin', '', 'kojoadmin', '', '0000-00-00', '', '', '0000-00-00', '');

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

--
-- Dumping data for table `reports`
--

INSERT INTO `reports` (`sender`, `reciever`, `dated`, `category`, `title`, `description`, `status`, `mid`) VALUES
('KS12744687', 'KS12744687', '2017-12-20', 'Activity Report', 'Please report to our Office', '&lt;p&gt;&lt;span style=&quot;text-decoration: underline;&quot;&gt;&lt;strong&gt;Outcomes&lt;/strong&gt;&lt;/span&gt;&lt;/p&gt;\r\n&lt;ul&gt;\r\n&lt;li&gt;New Gen&lt;/li&gt;\r\n&lt;li&gt;No IOU&lt;/li&gt;\r\n&lt;/ul&gt;', 'Unread', 1),
('KS12744687', 'KS12744687', '2017-12-20', 'Activity Report', 'I know your mama', '&lt;p&gt;&lt;span style=&quot;text-decoration: underline;&quot;&gt;&lt;strong&gt;Outcomes&lt;/strong&gt;&lt;/span&gt;&lt;/p&gt;\r\n&lt;ul&gt;\r\n&lt;li&gt;New Gen&lt;/li&gt;\r\n&lt;li&gt;No IOU&lt;/li&gt;\r\n&lt;/ul&gt;', 'Read', 2),
('KS12744687 	', 'KS12744687', '2017-12-20', 'Activity Report', 'Testing the Memo Form', '<p><strong>Outcomes</strong></p><br />\r\n<ul><br />\r\n<li>Here</li><br />\r\n<li>Heter</li><br />\r\n</ul>', 'Unread', 3);

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

--
-- Dumping data for table `sales`
--

INSERT INTO `sales` (`customerid`, `jobid`, `salesdesc`, `partno`, `quantity`, `amount`, `datesold`, `paymethod`, `particulars`, `sid`) VALUES
('KJ123303', 'JK44284913', 'Damasco Oil', 'HJS9899', '2', '0', '2017-12-14', 'Not Applicable', 'Refer to Invoice', 20),
('KJ123303', 'JK44284913', 'Wheel Alignment', 'Service', '0', '1500', '2017-12-14', 'Not Applicable', 'Refer to Invoice', 21),
('KJ123303', 'JK44284913', 'Wheel Balancing', 'Service', '0', '10000', '2017-12-14', 'Not Applicable', 'Refer to Invoice', 22),
('KJ120982', 'JK15465606', 'Damasco Oil', 'HJS9899', '2', '0', '2017-12-16', 'Not Applicable', 'Refer to Invoice', 26),
('KJ120982', 'JK15465606', 'Crankshaft', '782828N', '3', '0', '2017-12-16', 'Not Applicable', 'Refer to Invoice', 27),
('KJ120982', 'JK15465606', 'Wheel Alignment', 'Service', '0', '1500', '2017-12-16', 'Not Applicable', 'Refer to Invoice', 28),
('KJ120982', 'JK15465606', 'Wheel Balancing', 'Service', '0', '10000', '2017-12-16', 'Not Applicable', 'Refer to Invoice', 29);

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

--
-- Dumping data for table `schedule`
--

INSERT INTO `schedule` (`customerid`, `jobno`, `vregno`, `scheduletype`, `nextappointment`, `description`, `services`, `location`, `shid`, `phoneno`) VALUES
('KJ123303', 'JK11831458', 'JDJDJ83839', 'Every 3 Months / Recurrent', '2017-12-29', 'Change of Oil and Shock Absorbers every 3 months (Three Months)', '', '1 Leach Road, Abakaliki', 1, 2147483647),
('KJ123303', 'JK11831458', 'JDJDJ83839', 'Every 3 Months / Recurrent', '2017-12-21', 'Change of Oil and Shock Absorbers every 3 months (Three Months)', '- <br>-Wheel Alignment <br>-Wheel Balancing', '1 Leach Road, Abakaliki', 2, 2147483647),
('KJ123303', 'JK21573870', 'HS98939K0', 'Once in a Year / Once', '2017-12-23', 'To be serviced constantly', '- <br>-Wheel Alignment <br>-Wheel Balancing', '1 Leach Road, Abakaliki', 3, 2147483647);

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

--
-- Dumping data for table `serviceorder`
--

INSERT INTO `serviceorder` (`customerid`, `jobno`, `servicename`, `description`, `amount`, `sdate`, `sid`, `status`) VALUES
('KJ123303', 'JK44284913', 'Wheel Alignment', 'Vehicle wheels are often aligned to precision using alignment equipments', '1500', '2017-12-11', 19, 'Paid'),
('KJ123303', 'JK44284913', 'Wheel Balancing', 'This service involves entirely balancing the four wheels of a vehicle', '10000', '2017-12-11', 20, 'Paid'),
('KJ120982', 'JK15465606', 'Wheel Alignment', 'Vehicle wheels are often aligned to precision using alignment equipments', '1500', '2017-12-16', 21, 'Paid'),
('KJ120982', 'JK15465606', 'Wheel Balancing', 'This service involves entirely balancing the four wheels of a vehicle', '10000', '2017-12-16', 22, 'Paid');

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
-- Dumping data for table `vehicles`
--

INSERT INTO `vehicles` (`customerid`, `jobno`, `vregno`, `regdate`, `modelname`, `modelno`, `frameno`, `vin`, `color`, `chasisno`, `vcondition`, `daterecieved`) VALUES
('KJ120982', 'JK15465606', 'HDKDKKK', '0000-00-00', 'MERCEDEZ 330', 'XJCJJF DD', 'IE90-0-009', '349404WXXXZZZZ', 'RED', '93303303030', 'DAMAGED', '0000-00-00'),
('KJ123303', 'JK44284913', 'KJSKJSKKJ', '0000-00-00', 'Mercedez R200', 'R200', 'WJJS990300LK', 'JKS92872889', 'Ash Color', 'wzzz34i49404040', 'Good', '0000-00-00');

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
  MODIFY `did` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `expenditure`
--
ALTER TABLE `expenditure`
  MODIFY `expid` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `inventory`
--
ALTER TABLE `inventory`
  MODIFY `partid` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `partsorder`
--
ALTER TABLE `partsorder`
  MODIFY `pid` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
--
-- AUTO_INCREMENT for table `reports`
--
ALTER TABLE `reports`
  MODIFY `mid` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
  MODIFY `sid` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
--
-- AUTO_INCREMENT for table `schedule`
--
ALTER TABLE `schedule`
  MODIFY `shid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `serviceorder`
--
ALTER TABLE `serviceorder`
  MODIFY `sid` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `sid` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
