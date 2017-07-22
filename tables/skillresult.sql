-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 22, 2014 at 06:18 AM
-- Server version: 5.6.12-log
-- PHP Version: 5.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `careerscope`
--

-- --------------------------------------------------------

--
-- Table structure for table `skillresult`
--

CREATE TABLE IF NOT EXISTS `skillresult` (
  `email` varchar(30) NOT NULL,
  `mod1` tinyint(10) NOT NULL,
  `E` int(10) NOT NULL,
  `A` int(10) NOT NULL,
  `C` int(10) NOT NULL,
  `N` int(10) NOT NULL,
  `O` int(10) NOT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `skillresult`
--

INSERT INTO `skillresult` (`email`, `mod1`, `E`, `A`, `C`, `N`, `O`) VALUES
('priya@gmail.com', 1, 19, 20, 17, 24, 24);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `skillresult`
--
ALTER TABLE `skillresult`
  ADD CONSTRAINT `skillresult_ibfk_1` FOREIGN KEY (`email`) REFERENCES `masteruser` (`email`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
