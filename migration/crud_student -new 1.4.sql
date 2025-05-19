-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 19, 2025 at 09:01 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `crud_student`
--

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `duration` varchar(50) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `price` decimal(10,2) DEFAULT 0.00
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`id`, `name`, `duration`, `image`, `price`) VALUES
(5, 'bca', '2 Years', NULL, 18.00),
(6, 'csit', '6 Months', NULL, 10.00),
(12, 'abc', '6 Months', NULL, 15.00),
(14, 'xyz', '2 Years', 'IMG_682ab8fcd13008.17939721.jpeg', 8.00);

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` int(11) NOT NULL,
  `payment_id` text DEFAULT NULL,
  `payer_id` text DEFAULT NULL,
  `payer_name` text DEFAULT NULL,
  `payer_email` text DEFAULT NULL,
  `item_id` text DEFAULT NULL,
  `item_name` text DEFAULT NULL,
  `currency` text DEFAULT NULL,
  `amount` text DEFAULT NULL,
  `status` text DEFAULT NULL,
  `created_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`id`, `payment_id`, `payer_id`, `payer_name`, `payer_email`, `item_id`, `item_name`, `currency`, `amount`, `status`, `created_at`) VALUES
(0, '', '', ' ', '', '', '', '', '', '', '2025-05-19 10:58:11'),
(0, '', '', ' ', '', '', '', '', '', '', '2025-05-19 10:58:40'),
(0, '', '', ' ', '', '', '', '', '', '', '2025-05-19 11:05:36'),
(0, '', '', ' ', '', '', '', '', '', '', '2025-05-19 11:18:22'),
(0, '', '', ' ', '', '', '', '', '', '', '2025-05-19 11:32:06'),
(0, '', '', ' ', '', '', '', '', '', '', '2025-05-19 11:42:32'),
(0, '', '', ' ', '', '', '', '', '', '', '2025-05-19 11:42:36'),
(0, '', '', ' ', '', '', '', '', '', '', '2025-05-19 11:42:40'),
(0, '', '', ' ', '', '', '', '', '', '', '2025-05-19 11:43:48'),
(0, '', '', ' ', '', '', '', '', '', '', '2025-05-19 11:47:45'),
(0, '', '', ' ', '', '', '', '', '', '', '2025-05-19 11:48:22'),
(0, '', '', ' ', '', '', '', '', '', '', '2025-05-19 11:52:03'),
(0, '', '', ' ', '', '', '', '', '', '', '2025-05-19 12:27:58'),
(0, '', '', ' ', '', '', '', '', '', '', '2025-05-19 12:28:00'),
(0, '4A209079X79628202', 'KSZ3W8ED8YKDN', 'John Doe', 'sb-47f143h42374582@personal.example.com', '', 'xyz', 'USD', '8.00', 'Completed', '2025-05-19 12:28:48');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `mobile` varchar(20) NOT NULL,
  `password` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `name`, `email`, `mobile`, `password`, `image`) VALUES
(36, 'pranit', 'pranit@pranit', '123', '123', 'avanger.jpg'),
(62, 'test', 'test@test', '1231', '$2y$10$iHJeZzCYEnWIlZLYGW82VeNovOvJkIGCpEddUmJXK1JgpdAC/y7lq', 'IMG_68296366342a58.36778446.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `teachers`
--

CREATE TABLE `teachers` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `fav_sport` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `teachers`
--

INSERT INTO `teachers` (`id`, `name`, `email`, `password`, `fav_sport`) VALUES
(4, 'teacher', 'teacher3@teacher3', '123', ''),
(5, 'ttt', 'ttt@ttt', '123', ''),
(11, 'trtr', 'qqq@qqq', '123', ''),
(12, 'zzz', 'zzz@zzz', '123', ''),
(13, 'try', 'try@try', '123', 'see');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unique_email` (`email`);

--
-- Indexes for table `teachers`
--
ALTER TABLE `teachers`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `course`
--
ALTER TABLE `course`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT for table `teachers`
--
ALTER TABLE `teachers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
