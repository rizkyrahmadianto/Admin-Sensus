-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 12, 2019 at 01:31 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sensus`
--

-- --------------------------------------------------------

--
-- Table structure for table `person`
--

CREATE TABLE `person` (
  `id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `region_id` varchar(11) NOT NULL,
  `address` text NOT NULL,
  `income` varchar(64) NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `person`
--

INSERT INTO `person` (`id`, `name`, `region_id`, `address`, `income`, `created_at`) VALUES
(1, 'Suwindu', '4', 'Jalan Sesama No 27 RT 06 RW 02', '1200000', '2019-03-16 20:17:56'),
(2, 'Joko Susilo', '5', 'Jalan Sehat No 12 RT 02 RW 01 ', '7500000', '2019-03-16 20:19:55'),
(3, 'Rudy', '7', 'Jalan Aspal No 12 RT 02 RW 01 ', '3250000', '2019-03-16 20:20:29'),
(4, 'Siswanto', '6', 'Jalan Paving No 12 RT 02 RW 01 ', '4500000', '2019-03-16 20:20:54'),
(5, 'Retno', '7', 'Jalan Bata No 12 RT 02 RW 01 ', '2750000', '2019-03-16 20:21:24'),
(6, 'Gundul', '6', 'Jalan Lemah No 12 RT 02 RW 01 ', '3100000', '2019-03-16 20:21:49'),
(7, 'Aryanto', '2', 'Jalan Pojok No 4 RT 08 RW 10', '3250000', '2019-03-17 13:26:52'),
(8, 'Princess Bubblegum', '5', 'Jalan Sana No.30 RT 01 RW 02', '2750000', '2019-03-22 17:04:33'),
(9, 'Lukas', '3', 'Jalan Kuil No 20 RT 02 RW 01', '3500000', '2019-03-22 17:05:33'),
(10, 'Tukijan', '3', 'Jalan Utara No 112 RT 05 RW 03', '580000', '2019-03-22 18:49:09');

-- --------------------------------------------------------

--
-- Table structure for table `regions`
--

CREATE TABLE `regions` (
  `id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `regions`
--

INSERT INTO `regions` (`id`, `name`, `created_at`) VALUES
(2, 'Jawa Timur', '2019-03-16 16:32:18'),
(3, 'Bali', '2019-03-16 16:32:30'),
(4, 'Jawa Barat', '2019-03-16 16:32:45'),
(5, 'DKI Jakarta', '2019-03-16 16:33:09'),
(6, 'D.I.Yogyakartya', '2019-03-16 16:33:34'),
(7, 'Jawa Tengah', '2019-03-16 17:10:21');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `image` varchar(128) NOT NULL,
  `password` varchar(256) NOT NULL,
  `role_id` int(11) NOT NULL,
  `is_active` int(1) NOT NULL,
  `created_at` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `image`, `password`, `role_id`, `is_active`, `created_at`) VALUES
(2, 'Rizky Admin', 'rahmadianto@gmail.com', '10735487_1575164376038815_43211914_n.jpg', '$2y$10$ojVg/Mvr9wpLnHNd.9AxXOlpSEWuivT9dQDbnoZx5Hw9MLaCFjmWK', 1, 1, 20190323),
(5, 'Joko Susilo', 'joko@gmail.com', 'default.jpg', '$2y$10$tRGSoeXANULbOTrnEt5PIecTsUiNwOIPMVMP5mbWnSDTks6lxNl46', 2, 1, 1553410535),
(6, 'Rizky Dianto', 'rizky@gmail.com', 'default.jpg', '$2y$10$LHlKegoqyZVtOS0cWhFAPuDifWPyxSzd3vGpGpO8nYS1wcS9WMywa', 1, 1, 1554129734),
(9, 'Rizky Member', 'rahmadianto018@gmail.com', 'casque-de-dark-vador.jpg', '$2y$10$7yLy9L1IPE0rpTOrlEHgTOZduRJs7V.U69Cv2D4rMrEwDeNZcqGES', 2, 1, 1554390224);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `person`
--
ALTER TABLE `person`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `regions`
--
ALTER TABLE `regions`
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
-- AUTO_INCREMENT for table `person`
--
ALTER TABLE `person`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `regions`
--
ALTER TABLE `regions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
