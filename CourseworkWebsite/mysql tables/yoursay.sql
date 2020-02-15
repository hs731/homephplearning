-- phpMyAdmin SQL Dump
-- version 3.4.10.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 20, 2019 at 05:52 PM
-- Server version: 5.5.21
-- PHP Version: 5.6.18

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `hshakil`
--

-- --------------------------------------------------------

--
-- Table structure for table `yoursay`
--

CREATE TABLE IF NOT EXISTS `yoursay` (
  `satisfied` varchar(225) DEFAULT NULL,
  `recommend` varchar(225) DEFAULT NULL,
  `returning` varchar(225) DEFAULT NULL,
  `taste` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `yoursay`
--

INSERT INTO `yoursay` (`satisfied`, `recommend`, `returning`, `taste`) VALUES
('v.satisfied', 'definitely', 'yes', 100),
('satisfied', 'probably', 'yes', 77),
('v.satisfied', 'definitely', 'yes', 100),
('satisfied', 'probably', 'yes', 82),
('v.satisfied', 'definitely', 'yes', 100),
('v.satisfied', 'definitely', 'yes', 77),
('v.satisfied', 'definitely', 'yes', 100),
('v.satisfied', 'notsure', 'yes', 50),
('v.satisfied', 'prob not', 'yes', 50),
('v.satisfied', 'no', 'yes', 50),
('v.satisfied', 'definitely', 'no', 50),
('v.satisfied', 'definitely', 'yes', 100),
('v.satisfied', 'definitely', 'yes', 50),
('v.satisfied', 'definitely', 'yes', 100),
('v.satisfied', 'definitely', 'yes', 85),
('v.satisfied', 'definitely', 'yes', 50),
('v.satisfied', 'definitely', 'yes', 100),
('v.satisfied', 'definitely', 'yes', 100),
('v.satisfied', 'definitely', 'yes', 100);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
