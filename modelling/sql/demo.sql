-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 09, 2021 at 02:05 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `demo`
--

-- --------------------------------------------------------

--
-- Table structure for table `company`
--

CREATE TABLE `company` (
  `id` int(100) NOT NULL,
  `firstname` varchar(20) NOT NULL,
  `lastname` varchar(20) NOT NULL,
  `dob` date NOT NULL,
  `email` varchar(20) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `type` varchar(20) NOT NULL,
  `state` varchar(20) NOT NULL,
  `county` varchar(20) NOT NULL,
  `zip` varchar(20) NOT NULL,
  `experience` varchar(30) NOT NULL,
  `height` varchar(30) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `about` varchar(300) NOT NULL,
  `profileImage` varchar(30) NOT NULL,
  `gender` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `dob` date NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` int(12) NOT NULL,
  `type` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL,
  `county` varchar(255) NOT NULL,
  `zip` varchar(255) NOT NULL,
  `experince` varchar(120) NOT NULL,
  `height` varchar(12) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `about` text NOT NULL,
  `profileImage` varchar(255) NOT NULL,
  `gender` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `dob`, `email`, `phone`, `type`, `state`, `county`, `zip`, `experince`, `height`, `username`, `password`, `about`, `profileImage`, `gender`) VALUES
(16, 'TEST', 'TEST', '2021-04-28', 'ivy@gmail.com', 2541778, 'on', 'Kenya', 'elgeyo marakwet', '22222', 'expert', '4.5', 'test@gmail.com', ' kkkkkkk', 'I am a model', 'Model1.jpg', 'male'),
(17, 'James', 'James', '2021-04-28', 'www@gmail.com', 4544555, 'on', 'Kenya', 'busia', '22222', 'intermediate', '4.5', 'tests@gmail.com', ' 123456', 'I am a model', 'modelm1.png', 'female'),
(18, 'TEST', 'TEST', '2021-04-28', 'ivy@gmail.com', 4544555, 'on', 'Kenya', 'homa bay', '555', 'intermediate', '4.5', 'test@gmail.com', ' 123456', 'I am a model', 'model7.png', 'female');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `company`
--
ALTER TABLE `company`
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
-- AUTO_INCREMENT for table `company`
--
ALTER TABLE `company`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
