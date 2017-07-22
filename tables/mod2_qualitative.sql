-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 04, 2014 at 04:27 AM
-- Server version: 5.6.12-log
-- PHP Version: 5.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `users`
--

-- --------------------------------------------------------

--
-- Table structure for table `mod2_qualitative`
--

CREATE TABLE IF NOT EXISTS `mod2_qualitative` (
  `reviewer` varchar(16) NOT NULL,
  `requestor` varchar(16) NOT NULL,
  `question` text NOT NULL,
  `review` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mod2_qualitative`
--

INSERT INTO `mod2_qualitative` (`reviewer`, `requestor`, `question`, `review`) VALUES
('admin', 'markford', 'written_communication', 'acsavfas'),
('admin', 'markford', 'written_communication', 'dbvsz'),
('admin', 'markford', 'written_communication', 'gasgasg'),
('markford', 'admin', 'written_communication', 'Good with writtencommunication'),
('admin', 'markford', 'general_review', 'fafsafaf'),
('janew', 'admin', 'written_communication', 'Stephen is very good at Comprehension & any form of written communcation'),
('markford', 'admin', 'leadership', 'He may not be so good when it comes to Leadership. However he does get the job done...'),
('markford', 'admin', 'planning&organising', 'Organizing things especially during events as such shows his capability to the fullest. However planning is best done when in a group'),
('s3cube', 'priyanka', 'leadership', 'hardworking, intelligent'),
('roshan_raj', 'priyanka', 'general_review', 'versatile');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
