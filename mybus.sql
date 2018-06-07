-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 07, 2018 at 03:57 PM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.2.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mybus`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `user_name` varchar(256) NOT NULL,
  `password` varchar(256) NOT NULL,
  `email` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `user_name`, `password`, `email`) VALUES
(1, 'gas', '123456', 'gas@g.g');

-- --------------------------------------------------------

--
-- Table structure for table `bus`
--

CREATE TABLE `bus` (
  `bus_id` int(11) NOT NULL,
  `bus_no` varchar(25) NOT NULL,
  `intermediate_station` varchar(1024) NOT NULL,
  `driver_name` varchar(256) NOT NULL,
  `total_seats` int(11) NOT NULL,
  `intermediate_price` varchar(256) NOT NULL,
  `intermediate_time` varchar(1024) NOT NULL,
  `photo` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bus`
--

INSERT INTO `bus` (`bus_id`, `bus_no`, `intermediate_station`, `driver_name`, `total_seats`, `intermediate_price`, `intermediate_time`, `photo`) VALUES
(1, 'HR 10 A1234', 'allahabad,kanpur,mathura,alwar', 'good_driver', 30, '0,50,40,50', '06:10 AM,07:10 AM,08:10 AM,09:10 AM', '1.jpeg'),
(13, 'asdasd', 'aa,bb,cc,dd', '11awd', 30, '0,20,30,10', '10:10 am,10:20 am,10:30 am,10:30 am', 'asdasd'),
(14, '6', 'vv,xx,yy,zz', 'adawd', 30, '0,20,30,10', '11:11 am,11:30 am,11:40 am,11:40 am', '6');

-- --------------------------------------------------------

--
-- Table structure for table `seats`
--

CREATE TABLE `seats` (
  `bus_id` int(11) NOT NULL,
  `date1` date NOT NULL,
  `available_seats` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `seats`
--

INSERT INTO `seats` (`bus_id`, `date1`, `available_seats`) VALUES
(1, '2018-04-09', 25),
(1, '2018-04-08', 29),
(1, '2018-04-06', 31),
(1, '2018-04-10', 29),
(1, '0000-00-00', 30),
(2, '2018-05-05', 37),
(3, '2018-05-05', 35),
(2, '2018-04-10', 33),
(3, '2018-04-10', 35),
(1, '2018-04-11', 30),
(1, '2018-04-12', 30),
(1, '2018-04-05', 28),
(4, '2018-04-10', 34),
(5, '2018-04-10', 31),
(2, '2018-04-11', 37),
(3, '2018-04-11', 37),
(2, '2018-04-12', 37),
(3, '2018-04-12', 37),
(1, '2018-04-14', 30),
(1, '2018-04-21', 30),
(1, '2018-04-19', 29),
(1, '2018-04-18', 30),
(1, '2018-04-17', 30),
(1, '2018-06-06', 20),
(2, '2018-06-06', 37),
(3, '2018-06-06', 37),
(4, '2018-06-06', 33),
(1, '2018-06-07', 27),
(1, '2018-06-08', 30),
(14, '2018-06-07', 30),
(13, '2018-06-07', 30),
(13, '2018-06-08', 24),
(14, '2018-06-08', 20),
(13, '2018-06-09', 28);

-- --------------------------------------------------------

--
-- Table structure for table `station`
--

CREATE TABLE `station` (
  `start_station` text NOT NULL,
  `end_station` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `station`
--

INSERT INTO `station` (`start_station`, `end_station`) VALUES
('aa', 'bb'),
('aa', 'cc'),
('aa', 'dd'),
('vv', 'xx'),
('vv', 'yy'),
('vv', 'zz');

-- --------------------------------------------------------

--
-- Table structure for table `ticket`
--

CREATE TABLE `ticket` (
  `ticket_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `bus_id` int(11) NOT NULL,
  `source` varchar(256) NOT NULL,
  `destination` varchar(256) NOT NULL,
  `price` int(11) NOT NULL,
  `time_of_booking` varchar(50) NOT NULL,
  `no_of_passenger` int(11) NOT NULL,
  `date_of_journey` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ticket`
--

INSERT INTO `ticket` (`ticket_id`, `user_id`, `bus_id`, `source`, `destination`, `price`, `time_of_booking`, `no_of_passenger`, `date_of_journey`) VALUES
(51, 41, 13, 'aa', 'dd', 240, '2018-06-07 03:15:54pm GMT', 4, '2018-06-08'),
(52, 41, 13, 'aa', 'cc', 100, '2018-06-07 03:42:49pm GMT', 2, '2018-06-09'),
(53, 41, 13, 'aa', 'dd', 120, '2018-06-07 03:46:48pm GMT', 2, '2018-06-08'),
(54, 41, 14, 'vv', 'zz', 240, '2018-06-07 03:52:44pm GMT', 4, '2018-06-08'),
(55, 41, 14, 'vv', 'zz', 360, '2018-06-07 03:54:52pm GMT', 6, '2018-06-08');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `email_id` varchar(256) NOT NULL,
  `password` varchar(256) NOT NULL,
  `phone_no` bigint(20) NOT NULL,
  `first_name` varchar(256) NOT NULL,
  `last_name` varchar(256) NOT NULL,
  `user_name` varchar(256) NOT NULL,
  `photo` varchar(256) NOT NULL,
  `ssn` int(13) NOT NULL,
  `bday` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `email_id`, `password`, `phone_no`, `first_name`, `last_name`, `user_name`, `photo`, `ssn`, `bday`) VALUES
(9, 'hello', 'hello', 7895153153, 'hello', 'hello', 'hello', 'hello.jpeg', 0, '0000-00-00'),
(41, 'aa@aa.a', '123456', 313123131, 'asdasd', 'qwdqwd', 'gggg', 'gggg.jpeg', 0, '0000-00-00'),
(42, 'gg@gg.g', '123456', 916081055, 'gas', 'gggga', 'gas', 'gas.jpeg', 0, '0000-00-00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `bus`
--
ALTER TABLE `bus`
  ADD PRIMARY KEY (`bus_id`);

--
-- Indexes for table `ticket`
--
ALTER TABLE `ticket`
  ADD PRIMARY KEY (`ticket_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `bus`
--
ALTER TABLE `bus`
  MODIFY `bus_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `ticket`
--
ALTER TABLE `ticket`
  MODIFY `ticket_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
