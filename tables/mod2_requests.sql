-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 04, 2014 at 04:29 AM
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
-- Table structure for table `mod2_requests`
--

CREATE TABLE IF NOT EXISTS `mod2_requests` (
  `reviewer` varchar(16) NOT NULL,
  `requestor` varchar(16) NOT NULL,
  `val` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mod2_requests`
--

INSERT INTO `mod2_requests` (`reviewer`, `requestor`, `val`) VALUES
('admin', 'markford', 'a:50:{i:0;s:1:"2";i:1;s:1:"2";i:2;s:1:"3";i:3;s:1:"4";i:4;s:1:"4";i:5;s:1:"1";i:6;s:1:"2";i:7;s:1:"3";i:8;s:1:"4";i:9;s:1:"4";i:10;s:1:"2";i:11;s:1:"3";i:12;s:1:"4";i:13;s:1:"3";i:14;s:1:"2";i:15;s:1:"2";i:16;s:1:"3";i:17;s:1:"5";i:18;s:1:"2";i:19;s:1:"1";i:20;s:1:"3";i:21;s:1:"4";i:22;s:1:"2";i:23;s:1:"3";i:24;s:1:"4";i:25;s:1:"3";i:26;s:1:"5";i:27;s:1:"1";i:28;s:1:"2";i:29;s:1:"3";i:30;s:1:"5";i:31;s:1:"4";i:32;s:1:"3";i:33;s:1:"2";i:34;s:1:"4";i:35;s:1:"4";i:36;s:1:"2";i:37;s:1:"1";i:38;s:1:"3";i:39;s:1:"4";i:40;s:1:"5";i:41;s:1:"3";i:42;s:1:"4";i:43;s:1:"1";i:44;s:1:"2";i:45;s:1:"4";i:46;s:1:"3";i:47;s:1:"4";i:48;s:1:"3";i:49;s:1:"1";}'),
('admin', 'janew', 'a:50:{i:0;s:1:"1";i:1;s:1:"2";i:2;s:1:"2";i:3;s:1:"4";i:4;s:1:"5";i:5;s:1:"4";i:6;s:1:"3";i:7;s:1:"2";i:8;s:1:"1";i:9;s:1:"2";i:10;s:1:"3";i:11;s:1:"4";i:12;s:1:"5";i:13;s:1:"4";i:14;s:1:"3";i:15;s:1:"2";i:16;s:1:"1";i:17;s:1:"2";i:18;s:1:"3";i:19;s:1:"4";i:20;s:1:"5";i:21;s:1:"4";i:22;s:1:"3";i:23;s:1:"2";i:24;s:1:"1";i:25;s:1:"2";i:26;s:1:"3";i:27;s:1:"4";i:28;s:1:"3";i:29;s:1:"2";i:30;s:1:"4";i:31;s:1:"3";i:32;s:1:"2";i:33;s:1:"1";i:34;s:1:"3";i:35;s:1:"4";i:36;s:1:"5";i:37;s:1:"3";i:38;s:1:"2";i:39;s:1:"1";i:40;s:1:"4";i:41;s:1:"2";i:42;s:1:"5";i:43;s:1:"4";i:44;s:1:"2";i:45;s:1:"1";i:46;s:1:"3";i:47;s:1:"4";i:48;s:1:"5";i:49;s:1:"2";}'),
('archangel', 'admin', 'a:50:{i:0;s:1:"1";i:1;s:1:"2";i:2;s:1:"3";i:3;s:1:"4";i:4;s:1:"5";i:5;s:1:"4";i:6;s:1:"3";i:7;s:1:"2";i:8;s:1:"1";i:9;s:1:"2";i:10;s:1:"3";i:11;s:1:"4";i:12;s:1:"5";i:13;s:1:"4";i:14;s:1:"3";i:15;s:1:"2";i:16;s:1:"1";i:17;s:1:"2";i:18;s:1:"3";i:19;s:1:"4";i:20;s:1:"3";i:21;s:1:"2";i:22;s:1:"2";i:23;s:1:"4";i:24;s:1:"3";i:25;s:1:"2";i:26;s:1:"3";i:27;s:1:"4";i:28;s:1:"3";i:29;s:1:"2";i:30;s:1:"4";i:31;s:1:"3";i:32;s:1:"2";i:33;s:1:"3";i:34;s:1:"4";i:35;s:1:"3";i:36;s:1:"3";i:37;s:1:"4";i:38;s:1:"2";i:39;s:1:"4";i:40;s:1:"4";i:41;s:1:"5";i:42;s:1:"3";i:43;s:1:"1";i:44;s:1:"2";i:45;s:1:"4";i:46;s:1:"2";i:47;s:1:"2";i:48;s:1:"1";i:49;s:1:"3";}'),
('larry', 'markford', ''),
('admin', 'larry', ''),
('markford', 'admin', 'a:50:{i:0;s:1:"1";i:1;s:1:"2";i:2;s:1:"3";i:3;s:1:"4";i:4;s:1:"5";i:5;s:1:"4";i:6;s:1:"3";i:7;s:1:"2";i:8;s:1:"1";i:9;s:1:"2";i:10;s:1:"3";i:11;s:1:"4";i:12;s:1:"5";i:13;s:1:"4";i:14;s:1:"3";i:15;s:1:"2";i:16;s:1:"1";i:17;s:1:"2";i:18;s:1:"3";i:19;s:1:"4";i:20;s:1:"3";i:21;s:1:"2";i:22;s:1:"2";i:23;s:1:"4";i:24;s:1:"3";i:25;s:1:"2";i:26;s:1:"3";i:27;s:1:"4";i:28;s:1:"3";i:29;s:1:"2";i:30;s:1:"4";i:31;s:1:"3";i:32;s:1:"2";i:33;s:1:"3";i:34;s:1:"4";i:35;s:1:"3";i:36;s:1:"3";i:37;s:1:"2";i:38;s:1:"3";i:39;s:1:"4";i:40;s:1:"5";i:41;s:1:"2";i:42;s:1:"3";i:43;s:1:"1";i:44;s:1:"2";i:45;s:1:"4";i:46;s:1:"1";i:47;s:1:"3";i:48;s:1:"1";i:49;s:1:"4";}'),
('211suraj2587', 'admin', ''),
('s3cube', 'priyanka', 'a:50:{i:0;s:1:"4";i:1;s:1:"3";i:2;s:1:"3";i:3;s:1:"1";i:4;s:1:"3";i:5;s:1:"3";i:6;s:1:"2";i:7;s:1:"5";i:8;s:1:"3";i:9;s:1:"2";i:10;s:1:"4";i:11;s:1:"1";i:12;s:1:"4";i:13;s:1:"2";i:14;s:1:"3";i:15;s:1:"4";i:16;s:1:"5";i:17;s:1:"1";i:18;s:1:"2";i:19;s:1:"3";i:20;s:1:"4";i:21;s:1:"5";i:22;s:1:"2";i:23;s:1:"2";i:24;s:1:"2";i:25;s:1:"4";i:26;s:1:"4";i:27;s:1:"3";i:28;s:1:"4";i:29;s:1:"2";i:30;s:1:"5";i:31;s:1:"1";i:32;s:1:"3";i:33;s:1:"5";i:34;s:1:"2";i:35;s:1:"4";i:36;s:1:"3";i:37;s:1:"2";i:38;s:1:"5";i:39;s:1:"5";i:40;s:1:"1";i:41;s:1:"3";i:42;s:1:"4";i:43;s:1:"2";i:44;s:1:"4";i:45;s:1:"5";i:46;s:1:"2";i:47;s:1:"2";i:48;s:1:"4";i:49;s:1:"3";}'),
('admin', 'priyanka', 'a:50:{i:0;s:1:"2";i:1;s:1:"2";i:2;s:1:"2";i:3;s:1:"2";i:4;s:1:"2";i:5;s:1:"2";i:6;s:1:"2";i:7;s:1:"3";i:8;s:1:"4";i:9;s:1:"1";i:10;s:1:"5";i:11;s:1:"2";i:12;s:1:"3";i:13;s:1:"4";i:14;s:1:"2";i:15;s:1:"3";i:16;s:1:"5";i:17;s:1:"2";i:18;s:1:"3";i:19;s:1:"2";i:20;s:1:"4";i:21;s:1:"5";i:22;s:1:"2";i:23;s:1:"1";i:24;s:1:"3";i:25;s:1:"5";i:26;s:1:"3";i:27;s:1:"1";i:28;s:1:"5";i:29;s:1:"3";i:30;s:1:"2";i:31;s:1:"4";i:32;s:1:"1";i:33;s:1:"2";i:34;s:1:"3";i:35;s:1:"4";i:36;s:1:"5";i:37;s:1:"4";i:38;s:1:"3";i:39;s:1:"2";i:40;s:1:"1";i:41;s:1:"2";i:42;s:1:"3";i:43;s:1:"4";i:44;s:1:"5";i:45;s:1:"4";i:46;s:1:"3";i:47;s:1:"2";i:48;s:1:"1";i:49;s:1:"3";}'),
('roshan_raj', 'priyanka', 'a:50:{i:0;s:1:"5";i:1;s:1:"2";i:2;s:1:"1";i:3;s:1:"1";i:4;s:1:"1";i:5;s:1:"5";i:6;s:1:"5";i:7;s:1:"5";i:8;s:1:"5";i:9;s:1:"2";i:10;s:1:"3";i:11;s:1:"4";i:12;s:1:"5";i:13;s:1:"5";i:14;s:1:"2";i:15;s:1:"3";i:16;s:1:"3";i:17;s:1:"2";i:18;s:1:"2";i:19;s:1:"4";i:20;s:1:"2";i:21;s:1:"3";i:22;s:1:"5";i:23;s:1:"4";i:24;s:1:"3";i:25;s:1:"2";i:26;s:1:"1";i:27;s:1:"3";i:28;s:1:"4";i:29;s:1:"5";i:30;s:1:"3";i:31;s:1:"2";i:32;s:1:"1";i:33;s:1:"3";i:34;s:1:"4";i:35;s:1:"5";i:36;s:1:"2";i:37;s:1:"2";i:38;s:1:"2";i:39;s:1:"2";i:40;s:1:"2";i:41;s:1:"2";i:42;s:1:"2";i:43;s:1:"3";i:44;s:1:"4";i:45;s:1:"4";i:46;s:1:"3";i:47;s:1:"2";i:48;s:1:"1";i:49;s:1:"5";}');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
