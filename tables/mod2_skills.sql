-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 04, 2014 at 04:28 AM
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
-- Table structure for table `mod2_skills`
--

CREATE TABLE IF NOT EXISTS `mod2_skills` (
  `id` int(3) NOT NULL,
  `skill` text NOT NULL,
  `type` varchar(4) NOT NULL,
  `desc` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mod2_skills`
--

INSERT INTO `mod2_skills` (`id`, `skill`, `type`, `desc`) VALUES
(1, 'can think through in advance about what to say', 'WC', ''),
(2, 'can gather, analyze and arrange information in a logical sequence', 'WC', ''),
(3, 'develops an argument in a logical way', 'WC', ''),
(4, 'avoids jargon', 'WC', 'Jargon: The specialized or technical language of a trade or profession'),
(5, 'listens carefully to what others are saying', 'VC', ''),
(6, 'is able to clarify and summarize what others are communicating\r\n', 'VC', ''),
(7, 'helps others to define their problems. Not interrupting', 'VC', ''),
(8, 'is sensitive to body language as well as verbal information', 'VC', ''),
(9, 'keeps calm in the face of difficulties', 'FX', ''),
(10, 'plans ahead, but having alternative options in case things go wrong\r\n', 'FX', ''),
(11, 'thinks quickly to respond to sudden changes in circumstances', 'FX', ''),
(12, 'persists in the face of unexpected difficulties	', 'FX', ''),
(13, 'puts points across in a reasoned way\r\n', 'PR', ''),
(14, 'emphasizes the positive aspects of your argument', 'PR', ''),
(15, 'understands the needs of the person they are dealing with', 'PR', ''),
(16, 'makes concessions to reach agreement', 'PR', ''),
(17, 'works cooperatively towards a common goal\r\n', 'TW', ''),
(18, 'contributes  ideas effectively in a group', 'TW', ''),
(19, 'listens to others'' opinions', 'TW', ''),
(20, 'takes a share of the responsibility', 'TW', ''),
(21, 'takes the initiative\r\n', 'LR', ''),
(22, 'organizes and motivates others', 'LR', ''),
(23, 'takes a positive attitude to failure: persevering when things are not working out\r\n', 'LR', ''),
(24, 'accepts responsibility for mistakes/wrong decisions', 'LR', ''),
(25, 'sets objectives which are achievable	\r\n', 'PO', ''),
(26, 'manages time effectively/using action planning skills', 'PO', ''),
(27, 'is able to work effectively when under pressure\r\n', 'PO', ''),
(28, 'completes work to a deadline', 'PO', ''),
(29, 'collects, collates, classifies and summarizes data systematically\r\n', 'IA', ''),
(30, 'analyzes the factors involved in a problem & being able to identify the key ones', 'IA', ''),
(31, 'uses creativity/initiative in the generation of alternative solutions to a problem', 'IA', ''),
(32, 'differentiates between practical and impractical solutions', 'IA', ''),
(33, 'accepts responsibility for their views and actions\r\n', 'DP', ''),
(34, 'makes choices based on self judgment', 'DP', ''),
(35, 'pays care and attention to quality in all work', 'DP', ''),
(36, 'develops the drive and enthusiasm to achieve a goal', 'DP', '');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
