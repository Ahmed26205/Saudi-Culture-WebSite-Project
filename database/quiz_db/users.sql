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
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `username` varchar(50) NOT NULL,
  `created_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `username`, `created_at`) VALUES
(1, 'ahmed@gmail.com', 'AaAa1523320550', 'سيطبهت', '2025-12-12 05:15:57'),
(2, 'C@gmail.com', 'AaAa1523320550', 'ahmedalafif', '2025-12-12 07:54:51'),
(3, 'ahmedalafif@gmail.com', 'AaAa1523320550', 'akjsdhf', '2025-12-12 07:59:24'),
(4, 'kong@gmail.com', 'AaAa1523320550', 'asdf', '2025-12-12 08:15:45'),
(5, 'a123@gmail.com', '$2y$10$HXgxpNM2.AIZTG1mIAznju886P/bEIIQdkAGZe2Disl07OYgJ7WRq', 'يبلمتشسبم', '2025-12-13 11:09:06'),
(6, 'sf@gmail.com', '$2y$10$44HmF2Vn00v19.naRxjqz.v0P36FBAIzPfaX1yGj1bplIAfQtRcFa', 'geg', '2025-12-13 11:11:31'),
(7, 'ASDF@gmail.com', '$2y$10$kJsFogC1oUq5lHueo7KEe.jgnsyyYuDa5Ze9ZWnFnEXS4Dr1QvqWu', 'أحمد332r', '2025-12-13 13:09:31'),
(8, 'faisl@gmal.com', '$2y$10$6MQSXiw2IQonRQPBuMkTxOtVJRihLqX0WUOeKuuJXbetc17GwTM8e', 'فيصل المطرفي', '2025-12-13 13:18:09'),
(9, 'gmail@gmail.com', '$2y$10$Dg9Q4DxVsl772hp.xPdZKeIrG2qARza6cKPWHBSEb.ZONoG90F/wK', 'احمد', '2025-12-13 13:37:56'),
(10, 'lah@lsgh.com', 'AaAa1523320550', 'سسايل', '2025-12-14 00:05:44'),
(11, 'Asodhf@gmail.com', '$2y$10$bsfhkpFQJ0zPtvJxynH/D.v9iOv94kE1jzCB0yN381WKjzjv0YS2W', 'sdfj', '2025-12-14 00:06:15'),
(12, 'a12345@gmail.com', '$2y$10$i7NSFKV3423Ba2OuUXh3detL8NGjGBuLZ5r6Y2OYq1v0I89tByuC.', 'ahmed', '2025-12-14 00:09:18'),
(13, 'asdfg@gmial.com', '123456', 'asdfg', '2025-12-14 00:17:18'),
(14, 'hamed@gmail.com', '$2y$10$SF0QS2RzoWAB6vWiB.UUvOogTbeO0uSdcm9.nt7ZvHGDBvr2dQXby', 'فيصل', '2025-12-14 00:24:22'),
(15, 'ahmed123@gmail.com', '$2y$10$0w58pyIBOaJXvVWAl0/gROEApUZZMbQR7vVmGYOgZdPZO4.OPJsxW', 'احمد', '2025-12-14 00:26:23'),
(16, 'dk@gmail.com', '$2y$10$Rjckzhw65qICT2kbaXgRVupOlev/h.2bSgaLUalThtXaxjNmlZ1OW', 'أحمد', '2025-12-14 00:34:45');

--
-- Indexes for dumped tables
--

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
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
