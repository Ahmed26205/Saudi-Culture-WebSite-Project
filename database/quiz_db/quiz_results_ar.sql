-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 13, 2025 at 11:00 PM
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
-- Database: `quiz_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `quiz_results_ar`
--

CREATE TABLE `quiz_results_ar` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `score` int(11) NOT NULL,
  `total_questions` int(11) NOT NULL,
  `quiz_type` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `quiz_results_ar`
--

INSERT INTO `quiz_results_ar` (`id`, `user_id`, `score`, `total_questions`, `quiz_type`, `created_at`) VALUES
(1, 1, 0, 10, 'كوكتيل', '2025-12-13 03:44:50'),
(2, 1, 0, 10, 'أمثال', '2025-12-13 03:45:36'),
(3, 1, 0, 10, 'كوكتيل', '2025-12-13 04:34:15'),
(4, 1, 0, 10, 'كوكتيل', '2025-12-13 04:43:09'),
(5, 1, 0, 10, 'كوكتيل', '2025-12-13 04:44:24'),
(6, 1, 0, 0, 'كوكتيل', '2025-12-13 04:46:16'),
(7, 1, 0, 0, 'كوكتيل', '2025-12-13 04:46:46'),
(8, 1, 5, 10, 'كوكتيل', '2025-12-13 04:47:31'),
(9, 1, 5, 10, 'كوكتيل', '2025-12-13 04:51:16'),
(10, 1, 1, 10, 'كلمات', '2025-12-13 04:51:46'),
(11, 1, 5, 10, 'كوكتيل', '2025-12-13 05:10:02'),
(12, 1, 1, 10, 'كوكتيل', '2025-12-13 08:07:06'),
(13, 6, 2, 10, 'كوكتيل', '2025-12-13 08:11:55'),
(14, 6, 4, 10, 'كوكتيل', '2025-12-13 08:12:16'),
(15, 6, 0, 10, 'كوكتيل', '2025-12-13 08:17:57'),
(16, 6, 4, 10, 'كوكتيل', '2025-12-13 08:18:15'),
(17, 6, 4, 10, 'كوكتيل', '2025-12-13 08:19:36'),
(18, 6, 0, 0, 'كوكتيل', '2025-12-13 08:23:22'),
(19, 6, 1, 10, 'كوكتيل', '2025-12-13 08:23:38'),
(20, 6, 0, 0, 'كوكتيل', '2025-12-13 08:24:15'),
(21, 6, 0, 0, 'كوكتيل', '2025-12-13 08:26:52'),
(22, 6, 0, 0, 'كوكتيل', '2025-12-13 08:26:55'),
(23, 6, 0, 0, 'كوكتيل', '2025-12-13 08:27:03'),
(24, 6, 0, 0, 'كوكتيل', '2025-12-13 08:29:04'),
(25, 6, 2, 10, 'كوكتيل', '2025-12-13 08:29:52'),
(26, 6, 4, 10, 'كوكتيل', '2025-12-13 08:30:32'),
(27, 6, 5, 10, 'كوكتيل', '2025-12-13 08:36:03'),
(28, 6, 5, 10, 'كوكتيل', '2025-12-13 08:41:19'),
(29, 6, 5, 10, 'كوكتيل', '2025-12-13 08:41:23'),
(30, 6, 3, 10, 'كوكتيل', '2025-12-13 08:42:42'),
(31, 6, 3, 10, 'كوكتيل', '2025-12-13 08:44:07'),
(32, 6, 4, 10, 'كوكتيل', '2025-12-13 08:44:25'),
(33, 6, 5, 10, 'كوكتيل', '2025-12-13 09:02:05'),
(34, 1, 2, 5, 'كوكتيل', '2025-12-13 10:03:04'),
(35, 1, 5, 10, 'كوكتيل', '2025-12-13 17:16:30');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `quiz_results_ar`
--
ALTER TABLE `quiz_results_ar`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `quiz_results_ar`
--
ALTER TABLE `quiz_results_ar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
