-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 17, 2025 at 06:17 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gamestudio`
--

-- --------------------------------------------------------

--
-- Table structure for table `qna`
--

CREATE TABLE `qna` (
  `id` int(11) NOT NULL,
  `question` varchar(255) NOT NULL,
  `answer` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `qna`
--

INSERT INTO `qna` (`id`, `question`, `answer`) VALUES
(1, 'How many games have you release', 'So far we are preparing to release one game in summer'),
(2, 'Do you have guwd quality games? ', 'We think that yes we try to achieve that');

-- --------------------------------------------------------

--
-- Table structure for table `user_info`
--

CREATE TABLE `user_info` (
  `user_id` int(11) NOT NULL,
  `nickname` varchar(16) NOT NULL,
  `email` varchar(60) NOT NULL,
  `password` varchar(255) NOT NULL,
  `date_registered` date NOT NULL,
  `Anna` tinyint(2) NOT NULL,
  `Fritz` tinyint(2) NOT NULL,
  `Lilith` tinyint(2) NOT NULL,
  `SpaceMerks` tinyint(2) NOT NULL,
  `RTS` tinyint(2) NOT NULL,
  `coffee_count` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_info`
--

INSERT INTO `user_info` (`user_id`, `nickname`, `email`, `password`, `date_registered`, `Anna`, `Fritz`, `Lilith`, `SpaceMerks`, `RTS`, `coffee_count`) VALUES
(10, 'Uby', 'ouhellouder@gmail.com', '$2y$10$H33Cr/6.063AinHkZov9zOP6p8usCnDbcokPkqiEj6oD1bp9IayF.', '2025-06-15', 1, 1, 1, 1, 1, 16),
(11, 'Jahodkar', 'Jahodkar@samozber.sk', '$2y$10$2bKnVO.GgMudXxAkSqPOQOdE40MPOYW5C21.oUimorzF/3FfNc0Te', '2025-06-17', 1, 0, 0, 1, 0, 0),
(12, 'Leo', 'digmore@bratislava.sk', '$2y$10$FTDmIfCcy5q1B1GIhoWXiOqtixdgNj9KA5yvux1YftbFG1fLdewMS', '2025-06-17', 1, 0, 0, 0, 0, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `qna`
--
ALTER TABLE `qna`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_info`
--
ALTER TABLE `user_info`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `qna`
--
ALTER TABLE `qna`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user_info`
--
ALTER TABLE `user_info`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
