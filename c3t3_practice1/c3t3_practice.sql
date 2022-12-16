-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               5.7.33 - MySQL Community Server (GPL)
-- Server OS:                    Win64
-- HeidiSQL Version:             11.2.0.6213
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

-- Dumping structure for table medical_records.persons
CREATE TABLE IF NOT EXISTS `persons` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `age` int(2) DEFAULT NULL,
  `gender` varchar(1) DEFAULT NULL,
  `height` int(3) DEFAULT NULL,
  `weight` decimal(4,1) DEFAULT NULL,
  `waist_size` int(3) DEFAULT NULL,
  `rfm_score` decimal(4,2) DEFAULT NULL,
  `rfm_category` varchar(40) DEFAULT NULL,
  `bmi_score` decimal(4,2) DEFAULT NULL,
  `bmi_category` varchar(40) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

-- Dumping data for table medical_records.persons: ~0 rows (approximately)
/*!40000 ALTER TABLE `persons` DISABLE KEYS */;
INSERT INTO `persons` (`id`, `name`, `age`, `gender`, `height`, `weight`, `waist_size`, `rfm_score`, `rfm_category`, `bmi_score`, `bmi_category`) VALUES
	(17, 'Edward', 23, 'm', 190, 80.0, 70, 8.00, 'Athletes', 21.50, 'Normal');
/*!40000 ALTER TABLE `persons` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
