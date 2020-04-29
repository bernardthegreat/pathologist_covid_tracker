-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.4.11-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win64
-- HeidiSQL Version:             9.4.0.5125
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Dumping database structure for covid_pathologist_tracker
CREATE DATABASE IF NOT EXISTS `covid_pathologist_tracker` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;
USE `covid_pathologist_tracker`;

-- Dumping structure for table covid_pathologist_tracker.departments
CREATE TABLE IF NOT EXISTS `departments` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `description` text DEFAULT NULL,
  `active` tinyint(1) unsigned DEFAULT 1,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table covid_pathologist_tracker.departments: ~4 rows (approximately)
/*!40000 ALTER TABLE `departments` DISABLE KEYS */;
INSERT INTO `departments` (`id`, `name`, `description`, `active`, `created_at`, `updated_at`) VALUES
	(2, 'MSW', NULL, 1, '2020-04-25 09:23:25', '2020-04-25 09:23:25'),
	(3, 'FSW', NULL, 1, '2020-04-25 09:23:34', '2020-04-25 09:23:34'),
	(4, 'NEURO', 'NEURO', 0, '2020-04-25 09:24:04', '2020-04-25 09:24:04'),
	(5, 'ER', 'ER', 1, '2020-04-27 17:17:31', '2020-04-27 17:17:31');
/*!40000 ALTER TABLE `departments` ENABLE KEYS */;

-- Dumping structure for table covid_pathologist_tracker.patients
CREATE TABLE IF NOT EXISTS `patients` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `hospital_number` varchar(45) DEFAULT NULL,
  `first_name` varchar(45) NOT NULL,
  `middle_name` varchar(45) DEFAULT NULL,
  `last_name` varchar(45) NOT NULL,
  `gender` varchar(5) DEFAULT NULL,
  `age` int(10) unsigned DEFAULT NULL,
  `active` tinyint(1) DEFAULT 1,
  `updated_at` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `hospital_number_UNIQUE` (`hospital_number`)
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table covid_pathologist_tracker.patients: ~15 rows (approximately)
/*!40000 ALTER TABLE `patients` DISABLE KEYS */;
INSERT INTO `patients` (`id`, `hospital_number`, `first_name`, `middle_name`, `last_name`, `gender`, `age`, `active`, `updated_at`, `created_at`) VALUES
	(1, '1', 'Bernard', 'T. ', 'Gresola', 'M', NULL, 1, '2020-04-25 05:43:05', NULL),
	(3, '2', 'Dranreb', 'T.', 'Gresola', 'M', NULL, 1, '2020-04-25 05:39:53', NULL),
	(4, '3', 'John Paul', 'P.', 'Pascua', 'M', NULL, 1, '2020-04-25 05:39:43', NULL),
	(5, '4', 'Juan', 'Santos', 'Dela Cruz', 'M', NULL, 1, '2020-04-25 06:16:56', '2020-04-25 06:16:56'),
	(6, '5', 'Mark', 'A.', 'Santos', 'M', NULL, 1, '2020-04-25 06:17:51', '2020-04-25 06:17:51'),
	(9, '6', 'Rogelio', '', 'Bagadiong Jr.', 'M', NULL, 1, NULL, NULL),
	(10, '7', 'Rogelio', 'T.', 'Plaza', 'M', NULL, 1, NULL, NULL),
	(11, '8', 'Stanley', NULL, 'Verde', 'M', NULL, 1, NULL, NULL),
	(12, '10', 'Mary Grace', 'P.', 'Degurio', 'F', 27, 1, '2020-04-29 17:08:51', NULL),
	(13, '9', 'Nolie', 'P.', 'Francisco', 'M', NULL, 1, NULL, NULL),
	(14, '11', 'Jerome', 'A', 'Bongon', 'M', NULL, 1, NULL, NULL),
	(15, '12', 'Hedrick', 'G.', 'Caunca', 'M', NULL, 1, '2020-04-26 17:33:11', '2020-04-26 17:30:19'),
	(16, '13', 'Robin', 'B.', 'Reginan', 'M', NULL, 1, '2020-04-26 17:33:39', '2020-04-26 17:33:39'),
	(35, '132132131321', 'dfdsf', 'sfds', 'sdfds', 'F', 123, 1, '2020-04-29 17:56:34', '2020-04-29 17:56:34'),
	(36, '32eer4', 'fdsfsd', 'sdfds', 'sdfs', 'F', NULL, 1, '2020-04-29 17:57:23', '2020-04-29 17:57:23');
/*!40000 ALTER TABLE `patients` ENABLE KEYS */;

-- Dumping structure for table covid_pathologist_tracker.patient_requests
CREATE TABLE IF NOT EXISTS `patient_requests` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `specimen_no` int(10) unsigned NOT NULL,
  `patient_id` int(11) NOT NULL,
  `disposition_id` int(11) unsigned NOT NULL,
  `control_no` int(10) unsigned DEFAULT NULL,
  `hcw` int(11) DEFAULT NULL,
  `requested_date` date DEFAULT NULL,
  `requested_time` time DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `status` varchar(50) DEFAULT NULL,
  `expired_datetime` datetime DEFAULT NULL,
  `released_datetime` datetime DEFAULT NULL,
  `final_result` varchar(45) DEFAULT NULL,
  `soft_copy` varchar(45) DEFAULT NULL,
  `user_id` int(11) unsigned DEFAULT NULL,
  `department_id` int(11) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_px_req_disposition_idx` (`disposition_id`),
  KEY `fk_px_req_user_idx` (`user_id`),
  KEY `fk_px_req_dept_idx` (`department_id`),
  KEY `fk_px_patients_idx` (`patient_id`),
  CONSTRAINT `fk_px_patients` FOREIGN KEY (`patient_id`) REFERENCES `patients` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_px_req_dept` FOREIGN KEY (`department_id`) REFERENCES `departments` (`id`) ON DELETE SET NULL ON UPDATE SET NULL,
  CONSTRAINT `fk_px_req_user` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=48 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table covid_pathologist_tracker.patient_requests: ~8 rows (approximately)
/*!40000 ALTER TABLE `patient_requests` DISABLE KEYS */;
INSERT INTO `patient_requests` (`id`, `specimen_no`, `patient_id`, `disposition_id`, `control_no`, `hcw`, `requested_date`, `requested_time`, `created_at`, `updated_at`, `status`, `expired_datetime`, `released_datetime`, `final_result`, `soft_copy`, `user_id`, `department_id`) VALUES
	(3, 0, 1, 1, NULL, 1, NULL, '00:00:00', '2020-04-26 16:42:49', '0000-00-00 00:00:00', '1', NULL, NULL, '1', NULL, 1, 5),
	(40, 0, 3, 2, NULL, 1, '2020-04-26', '16:04:49', '2020-04-26 16:42:49', '2020-04-26 16:42:49', '1', NULL, NULL, '1', '1', 1, 2),
	(41, 0, 12, 1, NULL, 0, '2020-04-26', '17:04:22', '2020-04-26 17:13:22', '2020-04-26 17:13:22', '1', NULL, NULL, '1', '1', 1, 3),
	(42, 0, 1, 1, NULL, 1, '2020-04-27', '18:04:46', '2020-04-27 18:12:46', '2020-04-27 18:12:46', NULL, NULL, NULL, '0', NULL, 1, 3),
	(44, 0, 1, 1, NULL, 1, '2020-04-27', '20:04:52', '2020-04-27 20:18:52', '2020-04-27 20:18:52', '1', NULL, '2020-04-28 17:40:14', '1', '1', 2, 2),
	(45, 4, 1, 1, NULL, 1, '2020-04-29', '15:04:46', '2020-04-29 15:10:46', '2020-04-29 15:34:38', '1321321', NULL, '2020-04-29 15:04:38', '1', '1321', 1, 2),
	(46, 2, 12, 2, NULL, 1, '2020-04-29', '15:04:26', '2020-04-29 15:54:26', '2020-04-29 15:54:26', '12313', NULL, NULL, '0', NULL, 1, 2),
	(47, 1, 13, 3, NULL, 1, '2020-04-29', '15:04:36', '2020-04-29 15:59:36', '2020-04-29 18:58:50', '1321', '2020-04-29 18:04:50', NULL, '1', '1231', 1, 2);
/*!40000 ALTER TABLE `patient_requests` ENABLE KEYS */;

-- Dumping structure for table covid_pathologist_tracker.patient_request_dispositions
CREATE TABLE IF NOT EXISTS `patient_request_dispositions` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(45) DEFAULT NULL,
  `active` tinyint(1) unsigned DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table covid_pathologist_tracker.patient_request_dispositions: ~3 rows (approximately)
/*!40000 ALTER TABLE `patient_request_dispositions` DISABLE KEYS */;
INSERT INTO `patient_request_dispositions` (`id`, `name`, `active`, `updated_at`, `created_at`) VALUES
	(1, 'INPATIENT', 1, NULL, NULL),
	(2, 'DISCHARGED', 1, NULL, NULL),
	(3, 'EXPIRED', 1, NULL, NULL);
/*!40000 ALTER TABLE `patient_request_dispositions` ENABLE KEYS */;

-- Dumping structure for table covid_pathologist_tracker.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `first_name` varchar(45) NOT NULL,
  `middle_name` varchar(45) DEFAULT NULL,
  `last_name` varchar(45) NOT NULL,
  `prefix` varchar(45) DEFAULT NULL,
  `active` tinyint(1) unsigned DEFAULT 1,
  `username` varchar(45) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table covid_pathologist_tracker.users: ~2 rows (approximately)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `first_name`, `middle_name`, `last_name`, `prefix`, `active`, `username`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
	(1, 'Vincent Carlo', NULL, 'Cruz', 'MD', 1, NULL, NULL, NULL, NULL, NULL),
	(2, 'Bernard', NULL, 'Gresola', NULL, 1, NULL, NULL, NULL, '2020-04-25 09:47:01', '2020-04-25 09:47:01');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
