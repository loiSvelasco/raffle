-- --------------------------------------------------------
-- Host:                         localhost
-- Server version:               5.7.33 - MySQL Community Server (GPL)
-- Server OS:                    Win64
-- HeidiSQL Version:             12.1.0.6537
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

-- Dumping structure for table raffle.participants_divisionoffice
CREATE TABLE IF NOT EXISTS `participants_divisionoffice` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `district` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `school` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `position` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  KEY `name` (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- Data exporting was unselected.

-- Dumping structure for table raffle.participants_elem
CREATE TABLE IF NOT EXISTS `participants_elem` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `staff_id` int(11) NOT NULL DEFAULT '0',
  `name` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `district` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `school` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `position` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  KEY `staff_id` (`staff_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- Data exporting was unselected.

-- Dumping structure for table raffle.participants_granddraw
CREATE TABLE IF NOT EXISTS `participants_granddraw` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `staff_id` int(11) NOT NULL DEFAULT '0',
  `name` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `district` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `school` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `position` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  KEY `staff_id` (`staff_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- Data exporting was unselected.

-- Dumping structure for table raffle.participants_nonteaching
CREATE TABLE IF NOT EXISTS `participants_nonteaching` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `staff_id` int(11) NOT NULL DEFAULT '0',
  `name` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `district` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `school` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `position` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  KEY `staff_id` (`staff_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- Data exporting was unselected.

-- Dumping structure for table raffle.participants_private
CREATE TABLE IF NOT EXISTS `participants_private` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `staff_id` int(11) NOT NULL DEFAULT '0',
  `name` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `district` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `school` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `position` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  KEY `staff_id` (`staff_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- Data exporting was unselected.

-- Dumping structure for table raffle.participants_sec
CREATE TABLE IF NOT EXISTS `participants_sec` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `staff_id` int(11) NOT NULL DEFAULT '0',
  `name` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `district` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `school` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `position` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  KEY `staff_id` (`staff_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- Data exporting was unselected.

-- Dumping structure for table raffle.participants_template
CREATE TABLE IF NOT EXISTS `participants_template` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `staff_id` int(11) NOT NULL DEFAULT '0',
  `name` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `district` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `school` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `position` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  KEY `staff_id` (`staff_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- Data exporting was unselected.

-- Dumping structure for table raffle.participants_tests
CREATE TABLE IF NOT EXISTS `participants_tests` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `staff_id` int(11) NOT NULL DEFAULT '0',
  `name` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `district` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `school` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `position` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  KEY `staff_id` (`staff_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- Data exporting was unselected.

-- Dumping structure for table raffle.winners
CREATE TABLE IF NOT EXISTS `winners` (
  `win_id` int(11) NOT NULL AUTO_INCREMENT,
  `win_staff_id` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `win_name` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `win_level` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `win_school` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `win_position` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `win_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`win_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Data exporting was unselected.

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
