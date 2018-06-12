-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 12, 2018 at 07:45 PM
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
(15, '22à¸ºB', 'bangkok,a1,korat', 'Bee', 20, '0,50,105', '4:30 pm,5:00 pm,5:00 pm', '22à¸ºB'),
(16, '13A2', 'nonthaburi,bangkok,ayuttaya', 'Aomsin', 20, '0,40,130', '10:30 am,11:30 am,11:30 am', '13A2'),
(17, '79B', 'nonthaburi,pathumthani,korat', 'Aomsin', 20, '0,30,105', '10:30 am,11:00 am,11:00 am', '79B'),
(18, '80A', 'nonthaburi,chiang mai', 'Kang', 30, '0,450', '5:30 am,5:30 am', '80A'),
(19, '22à¸ºB', 'pathumthani,phuket', 'Gas', 20, '0,245', '12:00 pm,12:00 pm', '22à¸ºB'),
(20, '12M', 'tu,bu,nonthaburi', 'Gass', 20, '0,30,100', '1:30 am,2:30 am,2:30 am', '12M');

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
(13, '2018-06-09', 28),
(14, '2018-06-13', 26),
(15, '2018-06-13', 16),
(17, '2018-06-17', 18),
(16, '2018-06-13', 20),
(20, '2018-06-14', 20);

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
('Bangkok', 'A1'),
('Bangkok', 'Korat'),
('Nonthaburi', 'Bangkok'),
('Nonthaburi', 'Ayuttaya'),
('Nonthaburi', 'Pathumthani'),
('Nonthaburi', 'Korat'),
('Nonthaburi', 'Chiang Mai'),
('Pathumthani', 'Phuket'),
('TU', 'BU'),
('TU', 'Nonthaburi');

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
(58, 44, 17, 'nonthaburi', 'korat', 270, '2018-06-11 07:05:06pm GMT', 2, '2018-06-17');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `email_id` varchar(256) NOT NULL,
  `password` varchar(256) NOT NULL,
  `phone_no` varchar(20) NOT NULL,
  `first_name` varchar(256) NOT NULL,
  `last_name` varchar(256) NOT NULL,
  `user_name` varchar(256) NOT NULL,
  `photo` varchar(256) NOT NULL,
  `ssn` varchar(13) NOT NULL,
  `bday` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `email_id`, `password`, `phone_no`, `first_name`, `last_name`, `user_name`, `photo`, `ssn`, `bday`) VALUES
(44, 'natchakorn@hotmail.com', '123456', '999999999', 'natchakorn', 'tirakul', 'natchakorn', 'natchakorn.jpeg', '1709901138584', '1997-12-11'),
(45, 'gas@gas.gas', '123456', '0910681055', 'gas', 'prp', 'gasprp', 'gasprp.jpeg', '1709901138585', '1997-10-01');

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
  MODIFY `bus_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `ticket`
--
ALTER TABLE `ticket`
  MODIFY `ticket_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
