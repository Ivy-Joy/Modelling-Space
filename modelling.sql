-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 03, 2021 at 07:48 PM
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
-- Database: `modelling`
--

-- --------------------------------------------------------

--
-- Table structure for table `applications`
--

CREATE TABLE `applications` (
  `id` int(11) NOT NULL,
  `job_id` int(11) NOT NULL,
  `email` varchar(191) NOT NULL,
  `reason` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `applications`
--

INSERT INTO `applications` (`id`, `job_id`, `email`, `reason`, `created_at`) VALUES
(1, 2, 'sdads@sdsasad.dfsf', 'the best', '2021-06-01 07:06:52'),
(2, 2, 'sdfsdf@dfsf.dfsf', 'dfsf', '2021-06-01 07:07:27');

-- --------------------------------------------------------

--
-- Table structure for table `companies`
--

CREATE TABLE `companies` (
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
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `job_title` varchar(191) NOT NULL,
  `job_category` varchar(191) NOT NULL,
  `job_description` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jobs`
--

INSERT INTO `jobs` (`id`, `user_id`, `job_title`, `job_category`, `job_description`, `created_at`) VALUES
(2, 16, 'sdsd', 'glamour', 'dfafdfdf', '2021-06-01 07:36:37');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `post_image` varchar(191) NOT NULL,
  `post_type` varchar(191) NOT NULL,
  `post_description` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `user_id`, `post_image`, `post_type`, `post_description`, `created_at`) VALUES
(6, 16, 'maize.jpg', 'promotional', 'Zea Meaz\r\n', '2021-05-31 09:20:21'),
(8, 16, 'beans.jfif', 'fashion', 'Zea Meaz\r\n', '2021-06-01 08:32:12');

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
  `type` text NOT NULL,
  `state` varchar(255) NOT NULL,
  `county` varchar(255) NOT NULL,
  `zip` varchar(255) NOT NULL,
  `experince` varchar(120) NOT NULL,
  `height` varchar(12) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `about` text NOT NULL,
  `profileImage` varchar(255) NOT NULL,
  `gender` varchar(12) NOT NULL,
  `user_type` varchar(191) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `dob`, `email`, `phone`, `type`, `state`, `county`, `zip`, `experince`, `height`, `username`, `password`, `about`, `profileImage`, `gender`, `user_type`) VALUES
(16, 'Ivy', 'TEST', '2021-04-28', 'ivy@gmail.com', 2541778, '[\"fashion\",\"fitness\",\"promotional\"]', 'Kenya', 'elgeyo marakwet', '22222', 'expert', '4.5', 'test@gmail.com', '$2y$10$jfLJ6VxWDbHmBhGLRh5IY.WJ1SWfvWzkEgNwdC9GgT0F4mzlUdQn.', 'I am a model', 'Model1.jpg', 'female', 'model'),
(17, 'James', 'James', '2021-04-28', 'www@gmail.com', 4544555, '', 'Kenya', 'busia', '22222', 'intermediate', '4.5', 'tests@gmail.com', ' 123456', 'I am a model', 'Model1.jpg', 'male', 'model'),
(19, 'asd', 'sda', '2021-05-31', 'dasd@sdasd.dfss', 0, '[\"fashion\",\"fitness\",\"promotional\"]', 'dfsf', 'baringo', 'dfsf', 'intermediate', '4.5', 'ivy@gmail.com', ' $2y$10$q99vcGOBv4q7xYmOdiy7Be7mFB.Vo5LMpWJarlIzcQSG/wJ/EY4nO', 'dfsdddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddd', 'google.jfif', ' female', 'company'),
(20, 'ssad', 'sdad', '2021-05-14', 'sdad@sdad.sdad', 0, '[\"fashion\",\"promotional\"]', 'sds', 'garissa', 'sdasd', 'beginner', '4.5', 'ivy@gmail.com', ' $2y$10$QpB.eWQz4iKKnNQxWRLeVeMJ6QHmGft1dCF/RF2lqirJ.MTnv1DU.', 'sdasd', 'google2.jfif', 'male', 'company'),
(22, 'TEST', 'TEST', '2021-04-28', 'ivy@gmail.coma', 2541778, '[\"fashion\",\"fitness\",\"promotional\"]', 'Kenya', 'elgeyo marakwet', '22222', 'expert', '4.5', 'test@gmail.com', '$2y$10$jfLJ6VxWDbHmBhGLRh5IY.WJ1SWfvWzkEgNwdC9GgT0F4mzlUdQn.', 'I am a model', 'Model1.jpg', 'female', 'model');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `applications`
--
ALTER TABLE `applications`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `companies`
--
ALTER TABLE `companies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `applications`
--
ALTER TABLE `applications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `companies`
--
ALTER TABLE `companies`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
