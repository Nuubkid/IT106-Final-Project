-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 11, 2024 at 10:07 AM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 7.4.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bakbakan.db`
--

-- --------------------------------------------------------

--
-- Table structure for table `players`
--

CREATE TABLE `players` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `ip` varchar(255) NOT NULL,
  `datecreated` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `players`
--

INSERT INTO `players` (`id`, `username`, `password`, `email`, `ip`, `datecreated`) VALUES
(8, 'chaosenpai', 'chaosenpai', 'chaosenpai@gmail.com', '25.12.81.155', '2024-02-11 07:57:21'),
(9, 'chaosenpai1', 'chaosenpai', 'chaosenpaiwa@gmail.com', '25.12.81.155', '2024-02-11 07:57:47'),
(10, 'adminchao', 'adminchao', 'adminchao@gmail.com', '25.12.81.155', '2024-02-11 08:01:17'),
(11, 'Chaosenpai22', '$2y$10$aVNkgFxli78q4FOz4oT.De7V3NFJJVG6uxlmmT.5SKhZenkEqn56C', 'Chaosenpai22@gmail.com', '25.12.81.155', '2024-02-11 08:32:49'),
(12, 'Chaosenpai222', '$2y$10$kG1LKDqJaSKDGzTqtrCw/Ofb.ZREmVagvoTm0C5oTTTEICqeiIw8C', 'Chaosenpai222@gmaill.com', '25.12.81.155', '2024-02-11 08:33:53');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `players`
--
ALTER TABLE `players`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `players`
--
ALTER TABLE `players`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
