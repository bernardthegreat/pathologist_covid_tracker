-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.4.11-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win64
-- HeidiSQL Version:             11.0.0.5919
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Dumping database structure for covid_pathologist_tracker
CREATE DATABASE IF NOT EXISTS `covid_pathologist_tracker` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;
USE `covid_pathologist_tracker`;

-- Dumping structure for procedure covid_pathologist_tracker.clear_data
DELIMITER //
CREATE PROCEDURE `clear_data`()
BEGIN
SET FOREIGN_KEY_CHECKS = 0;
TRUNCATE patient_requests;
TRUNCATE departments;
TRUNCATE users;
TRUNCATE patient_request_dispositions;
TRUNCATE patients;
SET FOREIGN_KEY_CHECKS = 1;
END//
DELIMITER ;

-- Dumping structure for procedure covid_pathologist_tracker.clear_patients
DELIMITER //
CREATE PROCEDURE `clear_patients`()
BEGIN
SET FOREIGN_KEY_CHECKS = 0;
TRUNCATE patient_requests;
TRUNCATE patients;
TRUNCATE departments;
SET FOREIGN_KEY_CHECKS = 1;
END//
DELIMITER ;

-- Dumping structure for table covid_pathologist_tracker.configurations
CREATE TABLE IF NOT EXISTS `configurations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(45) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `value` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Dumping data for table covid_pathologist_tracker.configurations: ~0 rows (approximately)
/*!40000 ALTER TABLE `configurations` DISABLE KEYS */;
/*!40000 ALTER TABLE `configurations` ENABLE KEYS */;

-- Dumping structure for table covid_pathologist_tracker.departments
CREATE TABLE IF NOT EXISTS `departments` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `description` text DEFAULT NULL,
  `active` tinyint(1) unsigned DEFAULT 1,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Dumping data for table covid_pathologist_tracker.departments: ~0 rows (approximately)
/*!40000 ALTER TABLE `departments` DISABLE KEYS */;
/*!40000 ALTER TABLE `departments` ENABLE KEYS */;

-- Dumping structure for table covid_pathologist_tracker.hospital
CREATE TABLE IF NOT EXISTS `hospital` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(45) DEFAULT NULL,
  `address` varchar(45) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `active` tinyint(1) unsigned DEFAULT 1,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Dumping data for table covid_pathologist_tracker.hospital: ~0 rows (approximately)
/*!40000 ALTER TABLE `hospital` DISABLE KEYS */;
/*!40000 ALTER TABLE `hospital` ENABLE KEYS */;

-- Dumping structure for table covid_pathologist_tracker.patients
CREATE TABLE IF NOT EXISTS `patients` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `hospital_number` varchar(45) DEFAULT NULL,
  `alias` varchar(50) DEFAULT NULL,
  `first_name` varchar(45) NOT NULL,
  `middle_name` varchar(45) DEFAULT NULL,
  `last_name` varchar(45) NOT NULL,
  `gender` varchar(5) DEFAULT NULL,
  `age` int(10) unsigned DEFAULT NULL,
  `active` tinyint(1) DEFAULT 1,
  `updated_at` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `latest_result` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `hospital_number_UNIQUE` (`hospital_number`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Dumping data for table covid_pathologist_tracker.patients: ~0 rows (approximately)
/*!40000 ALTER TABLE `patients` DISABLE KEYS */;
/*!40000 ALTER TABLE `patients` ENABLE KEYS */;

-- Dumping structure for table covid_pathologist_tracker.patient_requests
CREATE TABLE IF NOT EXISTS `patient_requests` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `specimen_no` int(10) unsigned NOT NULL,
  `patient_id` int(11) NOT NULL,
  `disposition_id` int(11) unsigned NOT NULL,
  `control_no` int(10) unsigned DEFAULT NULL,
  `hcw` int(11) DEFAULT NULL COMMENT '1 - hcw 0 - non-hcw',
  `requested_date` date DEFAULT NULL,
  `requested_time` time DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `status` varchar(50) DEFAULT NULL COMMENT '0 - pending 1 - available',
  `result_availability_datetime` datetime DEFAULT NULL,
  `swab_requested_datetime` datetime DEFAULT NULL,
  `expired_datetime` datetime DEFAULT NULL,
  `released_datetime` datetime DEFAULT NULL,
  `failed_datetime` datetime DEFAULT NULL,
  `final_result` varchar(45) DEFAULT NULL COMMENT '0 - pending 1 - positive 2 - negative 3 - rejected',
  `soft_copy` int(10) unsigned DEFAULT NULL COMMENT '0 - not available 1 - available',
  `user_id` int(11) unsigned DEFAULT NULL,
  `department_id` int(11) unsigned DEFAULT NULL,
  `remarks` text DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_px_req_disposition_idx` (`disposition_id`),
  KEY `fk_px_req_user_idx` (`user_id`),
  KEY `fk_px_req_dept_idx` (`department_id`),
  KEY `fk_px_patients_idx` (`patient_id`),
  CONSTRAINT `fk_px_patients` FOREIGN KEY (`patient_id`) REFERENCES `patients` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_px_req_dept` FOREIGN KEY (`department_id`) REFERENCES `departments` (`id`) ON DELETE SET NULL ON UPDATE SET NULL,
  CONSTRAINT `fk_px_req_user` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Dumping data for table covid_pathologist_tracker.patient_requests: ~0 rows (approximately)
/*!40000 ALTER TABLE `patient_requests` DISABLE KEYS */;
/*!40000 ALTER TABLE `patient_requests` ENABLE KEYS */;

-- Dumping structure for table covid_pathologist_tracker.patient_request_dispositions
CREATE TABLE IF NOT EXISTS `patient_request_dispositions` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(45) DEFAULT NULL,
  `active` tinyint(1) unsigned DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table covid_pathologist_tracker.patient_request_dispositions: ~4 rows (approximately)
/*!40000 ALTER TABLE `patient_request_dispositions` DISABLE KEYS */;
INSERT INTO `patient_request_dispositions` (`id`, `name`, `active`, `updated_at`, `created_at`) VALUES
	(1, 'INPATIENT', 1, NULL, NULL),
	(2, 'DISCHARGED', 1, NULL, NULL),
	(3, 'EXPIRED', 0, NULL, NULL),
	(5, 'OUTPATIENT', 1, NULL, NULL);
/*!40000 ALTER TABLE `patient_request_dispositions` ENABLE KEYS */;

-- Dumping structure for table covid_pathologist_tracker.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `first_name` varchar(45) NOT NULL,
  `middle_name` varchar(45) DEFAULT NULL,
  `last_name` varchar(45) NOT NULL,
  `prefix` varchar(45) DEFAULT NULL,
  `role` int(11) DEFAULT NULL,
  `active` tinyint(1) unsigned DEFAULT 1,
  `username` varchar(45) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table covid_pathologist_tracker.users: ~2 rows (approximately)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
