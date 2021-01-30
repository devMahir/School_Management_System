-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 31, 2021 at 12:43 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `schoolmanagement`
--

-- --------------------------------------------------------

--
-- Table structure for table `studentinformation`
--

CREATE TABLE `studentinformation` (
  `id` int(5) NOT NULL,
  `name` varchar(20) NOT NULL,
  `roll` varchar(15) NOT NULL,
  `class` varchar(5) NOT NULL,
  `city` varchar(15) NOT NULL,
  `pcontact` varchar(15) NOT NULL,
  `photo` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `studentinformation`
--

INSERT INTO `studentinformation` (`id`, `name`, `roll`, `class`, `city`, `pcontact`, `photo`) VALUES
(3, 'Mahir Shahriar', '181-35-2332', '10th', 'Jamalpur', '01793421368', 'Mahir.JPG'),
(4, 'Zerin Tanzim', '181-35-2222', '6th', 'New York', '017*********', 'Zerin.jpg'),
(5, 'Mim Rahman Auti', '181-35-2350', '10th', 'Azimpur', '015********', 'Mim.jpg'),
(6, 'Towhid Vodka', '181-35-2500', '9th', 'Ctg', '015541*****', 'Towhid.jpg'),
(7, 'SMN Shuvo', '181-35-2327', '10th', 'Bandarban', '015*******', 'SMN.jpg'),
(8, 'Sinha Naznin Iti', '181-35-2450', '10th', 'Mujibnogar', '015********', 'Sinha.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(5) NOT NULL,
  `name` varchar(25) NOT NULL,
  `email` varchar(20) NOT NULL,
  `number` varchar(15) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(50) NOT NULL,
  `photo` varchar(20) NOT NULL,
  `status` varchar(10) NOT NULL,
  `datetime` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `number`, `username`, `password`, `photo`, `status`, `datetime`) VALUES
(1, 'Mahir Shahriar', 'mahirshahriar10@gmai', '+8801793421368', 'mahirshahriar21', '25f9e794323b453885f5181f1b624d0b', 'mahirshahriar21.JPG', 'online', '2021-01-13 15:58:31'),
(5, 'Sinha Naznin It', 'sinha@gmail.com', '01793421368', 'sins123456', '25f9e794323b453885f5181f1b624d0b', 'sins123456.jpg', 'online', '2021-01-13 18:28:15'),
(6, 'shujat shuvo', 'shujat@gmail.com', '015*******', 's_shuvo159', '25f9e794323b453885f5181f1b624d0b', 's_shuvo159.jpg', 'online', '2021-01-17 08:10:36'),
(7, 'SMN Shuvo', 'smn@gmail.com', '017*********', 'sms_shuvo15', '25f9e794323b453885f5181f1b624d0b', 'sms_shuvo15.jpg', 'online', '2021-01-17 08:11:53');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `studentinformation`
--
ALTER TABLE `studentinformation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `studentinformation`
--
ALTER TABLE `studentinformation`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
