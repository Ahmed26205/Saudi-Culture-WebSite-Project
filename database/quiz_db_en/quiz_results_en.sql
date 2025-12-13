-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 13, 2025 at 10:59 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `quiz_db_en`
--

-- --------------------------------------------------------

--
-- Table structure for table `quiz_results_en`
--

CREATE TABLE `quiz_results_en` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `score` int(11) NOT NULL,
  `total_questions` int(11) NOT NULL,
  `quiz_type` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `quiz_results_en`
--

INSERT INTO `quiz_results_en` (`id`, `user_id`, `score`, `total_questions`, `quiz_type`, `created_at`) VALUES
(1, 1, 4, 10, 'Mixed', '2025-12-13 03:36:49'),
(2, 1, 1, 10, 'East Region', '2025-12-13 03:42:42'),
(3, 1, 2, 10, 'West Region', '2025-12-13 04:12:08'),
(4, 6, 0, 10, 'Mixed', '2025-12-13 08:12:29'),
(5, 1, 3, 5, 'Mixed', '2025-12-13 10:01:34'),
(6, 7, 0, 35, 'Centeral Region', '2025-12-13 10:16:22'),
(7, 8, 6, 10, 'Mixed', '2025-12-13 10:28:49');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `quiz_results_en`
--
ALTER TABLE `quiz_results_en`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `quiz_results_en`
--
ALTER TABLE `quiz_results_en`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
