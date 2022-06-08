-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 08, 2022 at 03:30 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

--
-- Database: `raffle`
--

-- --------------------------------------------------------

--
-- Table structure for table `participants`
--

CREATE TABLE `participants` (
  `id` int(11) NOT NULL,
  `name` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `district` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `school` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `position` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `winners`
--

CREATE TABLE `winners` (
  `win_id` int(11) NOT NULL,
  `win_staff_id` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `win_name` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `win_level` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `win_school` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `win_position` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `win_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `participants_binnulig`
--
ALTER TABLE `participants_binnulig`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `winners`
--
ALTER TABLE `winners`
  ADD PRIMARY KEY (`win_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `participants_binnulig`
--
ALTER TABLE `participants_binnulig`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `winners`
--
ALTER TABLE `winners`
  MODIFY `win_id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;
