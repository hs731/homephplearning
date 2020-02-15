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
-- Table structure for table `drinks`
--

CREATE TABLE IF NOT EXISTS `drinks` (
  `id` int(11) DEFAULT NULL,
  `price` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `calories` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `drinks`
--

INSERT INTO `drinks` (`id`, `price`, `name`, `description`, `calories`) VALUES
(1, '3.99', 'Coffee', 'Classic Coffee', 5),
(2, '4.99', 'Cappuccino', 'Foamy coffee topped with chocolate shavings', 120),
(3, '4.99', 'Espresso', 'Finely brewed and highly concentrated ', 10),
(4, '3.99', 'Latte', 'Italian coffee made with steamed milk', 50),
(5, '3.99', 'Americano', 'Latin American traditional coffee', 40),
(6, '4.49', 'Hot Chocolate', 'Topped with whipped cream and chocolate shavings', 300),
(7, '1.99', 'Tea', 'English Tea', 100),
(8, '1.99', 'Kashmiri Tea', 'Traditional pink tea', 200),
(9, '0.99', 'Coke', 'Cola drink', 400),
(10, '0.99', 'Pepsi', 'Carbonated cola soft drink', 400);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
