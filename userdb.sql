-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Nov 28, 2018 at 01:24 PM
-- Server version: 5.7.19
-- PHP Version: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `userdb`
--

DELIMITER $$
--
-- Procedures
--
DROP PROCEDURE IF EXISTS `GetPatients`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `GetPatients` ()  BEGIN
 SELECT Id,Name,Phone,Doctor,Date,Time
 FROM patientdetails;
    END$$

DROP PROCEDURE IF EXISTS `medicine_call`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `medicine_call` ()  BEGIN
 SELECT Id,Medicine,Stock,Message
 FROM medicines;
    END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `doctor`
--

DROP TABLE IF EXISTS `doctor`;
CREATE TABLE IF NOT EXISTS `doctor` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(15) NOT NULL,
  `password` varchar(15) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `doctor`
--

INSERT INTO `doctor` (`id`, `username`, `password`) VALUES
(1, 'Ramesh', 'ramesh123'),
(2, 'Ramya', 'ramya123');

-- --------------------------------------------------------

--
-- Table structure for table `medicines`
--

DROP TABLE IF EXISTS `medicines`;
CREATE TABLE IF NOT EXISTS `medicines` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Medicine` varchar(50) NOT NULL,
  `Stock` varchar(50) NOT NULL,
  `Message` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `medicines`
--

INSERT INTO `medicines` (`id`, `Medicine`, `Stock`, `Message`) VALUES
(1, 'Paracetemol', '12', 'In Stock'),
(2, 'Dolo650', '25', 'In Stock'),
(3, 'dart', '50', 'In Stock');

-- --------------------------------------------------------

--
-- Table structure for table `medrep`
--

DROP TABLE IF EXISTS `medrep`;
CREATE TABLE IF NOT EXISTS `medrep` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(50) NOT NULL,
  `Phone` bigint(15) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Company` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `medrep`
--

INSERT INTO `medrep` (`id`, `Name`, `Phone`, `Email`, `Company`) VALUES
(1, 'Rohith', 8527413692, 'rohith11@gmail.com', 'Sans Pharma');

-- --------------------------------------------------------

--
-- Table structure for table `p1`
--

DROP TABLE IF EXISTS `p1`;
CREATE TABLE IF NOT EXISTS `p1` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL,
  `action_performed` varchar(400) NOT NULL,
  `date_added` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `p1`
--

INSERT INTO `p1` (`id`, `name`, `action_performed`, `date_added`) VALUES
(1, 'Sandesh', 'Updated Patient', '2018-11-28 12:25:40');

-- --------------------------------------------------------

--
-- Table structure for table `p2`
--

DROP TABLE IF EXISTS `p2`;
CREATE TABLE IF NOT EXISTS `p2` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `patient_name` varchar(200) NOT NULL,
  `action_performed` varchar(400) NOT NULL,
  `date_added` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `p2`
--

INSERT INTO `p2` (`id`, `patient_name`, `action_performed`, `date_added`) VALUES
(1, 'Sandesh', 'Deleted a patient', '2018-11-27 12:35:34'),
(2, 'manoj', 'Deleted a patient', '2018-11-27 12:57:53');

-- --------------------------------------------------------

--
-- Table structure for table `patientdetails`
--

DROP TABLE IF EXISTS `patientdetails`;
CREATE TABLE IF NOT EXISTS `patientdetails` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(15) NOT NULL,
  `Phone` varchar(15) NOT NULL,
  `Doctor` varchar(15) NOT NULL,
  `Date` date NOT NULL,
  `Time` varchar(5) NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `patientdetails`
--

INSERT INTO `patientdetails` (`Id`, `Name`, `Phone`, `Doctor`, `Date`, `Time`) VALUES
(1, 'Anarghya ', '9632587413', 'Ramya', '2018-11-26', '5pm'),
(2, 'Abhinav', '7852365412', 'Ramesh', '2018-11-27', '5pm');

-- --------------------------------------------------------

--
-- Table structure for table `patientrecords`
--

DROP TABLE IF EXISTS `patientrecords`;
CREATE TABLE IF NOT EXISTS `patientrecords` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(15) NOT NULL,
  `Age` int(3) NOT NULL,
  `Sex` varchar(10) NOT NULL,
  `Phone` bigint(20) NOT NULL,
  `Address` varchar(255) NOT NULL,
  `Date` date NOT NULL,
  `Disease` varchar(255) NOT NULL,
  `Medicine` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `patientrecords`
--

INSERT INTO `patientrecords` (`id`, `Name`, `Age`, `Sex`, `Phone`, `Address`, `Date`, `Disease`, `Medicine`) VALUES
(1, 'Anarghya M', 11, 'Female', 9638527412, 'Mysuru', '2018-11-26', 'Fever', 'Paracetemol'),


--
-- Triggers `patientrecords`
--
DROP TRIGGER IF EXISTS `after_patient_delete`;
DELIMITER $$
CREATE TRIGGER `after_patient_delete` AFTER DELETE ON `patientrecords` FOR EACH ROW BEGIN

    INSERT INTO p2

    SET action_performed  = 'Deleted a patient',

    patient_name       =  OLD.Name;


END
$$
DELIMITER ;
DROP TRIGGER IF EXISTS `after_patient_edit`;
DELIMITER $$
CREATE TRIGGER `after_patient_edit` AFTER UPDATE ON `patientrecords` FOR EACH ROW BEGIN

    INSERT INTO p1

    SET action_performed  = 'Updated Patient',

    Name       =  OLD.Name;


END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`) VALUES
(1, 'recep', '123');

DELIMITER $$
--
-- Events
--
DROP EVENT `Stocks_check`$$
CREATE DEFINER=`root`@`localhost` EVENT `Stocks_check` ON SCHEDULE EVERY 1 SECOND STARTS '2018-11-26 00:00:00' ON COMPLETION NOT PRESERVE ENABLE DO Update medicines set `Message`='In Stock' where
`Stock`>10$$

DROP EVENT `Stock_check`$$
CREATE DEFINER=`root`@`localhost` EVENT `Stock_check` ON SCHEDULE EVERY 1 SECOND STARTS '2018-11-26 00:00:00' ON COMPLETION NOT PRESERVE ENABLE DO Update medicines set `Message`='Less stock contact MedRep' where
`Stock`<=10$$

DELIMITER ;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
