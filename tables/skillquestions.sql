-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 22, 2014 at 06:19 AM
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
-- Table structure for table `skillquestions`
--

CREATE TABLE IF NOT EXISTS `skillquestions` (
  `id` int(10) NOT NULL,
  `selfquestions` text NOT NULL,
  `obsquestions` text NOT NULL,
  `desc` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `skillquestions`
--

INSERT INTO `skillquestions` (`id`, `selfquestions`, `obsquestions`, `desc`) VALUES
(1, 'I am the life of the party', 'is the life of the party', ''),
(2, 'I feel little concern for others. ', 'feels little concern for others.', ''),
(3, 'I am always prepared.', 'is always prepared.', ''),
(4, 'I get stressed out easily.', 'gets stressed out easily.', ''),
(5, 'I have a rich vocabulary. ', 'has a rich vocabulary. ', '<b>Vocabulary</b> can be the sum of words used by or understood by a particular person. A rich vocabulary can therefore mean a very good vocabulary.'),
(6, 'I don''t talk a lot. ', 'doesn''t talk a lot. ', ''),
(7, 'I am interested in people. ', 'is interested in people. ', ''),
(8, 'I leave my belongings around.', 'leaves their belongings around.', ''),
(9, 'I am relaxed most of the time. ', 'is relaxed most of the time. ', ''),
(10, 'I have difficulty understanding abstract ideas.', 'has difficulty understanding abstract ideas.', '<b>Abstract Ideas</b> are concepts that need to be visualized, as they cannot be illustrated through concrete (real) examples. In a simple way, explaining the progression of logic in a (computer) program will be possible only if the reader can correctly visualize (imagine) it in his mind.'),
(11, 'I feel comfortable around people. ', 'feels comfortable around people. ', ''),
(12, 'I insult people. ', 'insults people. ', ''),
(13, 'I pay attention to details. ', 'pays attention to details. ', ''),
(14, 'I worry about things.', 'worries about things.', ''),
(15, 'I have a vivid imagination. ', 'has a vivid imagination. ', 'Creating imaginary things in the mind. It is often a term used to describe someone like a storyteller, people who make up stories often are spoken of as having such a vivid imagination.'),
(16, 'I keep in the background. ', 'keeps in the background. ', '<b>Keep in the background</b> means to not be outgoing and talkative and draw attention or be out of sight of people'),
(17, 'I sympathize with others'' feelings. ', 'sympathizes with others'' feelings. ', ''),
(18, 'I make a mess of things. ', 'makes a mess of things. ', ''),
(19, 'I seldom feel blue.', 'seldom feels blue.', '<b>Feeling blue</b> means feeling sad, depressed, or maybe just a little down.<br>\\n<b>Seldom</b> means not often or rarely'),
(20, 'I am not interested in abstract ideas.', 'is not interested in abstract ideas.', '<b>Abstract Ideas</b> are concepts that need to be visualized, as they cannot be illustrated through concrete (real) examples. In a simple way, explaining the progression of logic in a (computer) program will be possible only if the reader can correctly visualize (imagine) it in his mind.'),
(21, 'I start conversations. ', 'starts conversations. ', ''),
(22, 'I am not interested in other people''s problems. ', 'is not interested in other people''s problems. ', ''),
(23, 'I get chores done right away. ', 'gets chores done right away. ', '<b>Chore</b> means a routine task, especially a household one.'),
(24, 'I am easily disturbed. ', 'is easily disturbed. ', ''),
(25, 'I have excellent ideas. ', 'has excellent ideas. ', ''),
(26, 'I have little to say.', 'has little to say.', ''),
(27, 'I have a soft heart.', 'has a soft heart.', ''),
(28, 'I often forget to put things back in their proper place.', 'often forgets to put things back in their proper place.', ''),
(29, 'I get upset easily.', 'gets upset easily.', ''),
(30, 'I do not have a good imagination.', 'do not have a good imagination.', ''),
(31, 'I talk to a lot of different people at parties.', 'talks to a lot of different people at parties.', ''),
(32, 'I am not really interested in others.', 'is not really interested in others.', ''),
(33, 'I like order.', 'likes order.', ''),
(34, 'I change my mood a lot.', 'changes their mood a lot.', ''),
(35, 'I am quick to understand things.', 'is quick to understand things.', ''),
(36, 'I don''t like to draw attention to myself.', 'doesn''t like to draw self attention.', ''),
(37, 'I take time out for others.', 'takes time out for others.', ''),
(38, 'I shirk my duties.', 'shirks their duties.', '<b>Shirks</b> means to avoid or neglect (a duty or responsibility)'),
(39, 'I have frequent mood swings.', 'has frequent mood swings.', '<b>Mood Swing</b> is an abrupt and unaccountable change of mood. A person may be happy now & then suddenly be sad the other instant.'),
(40, 'I use difficult words.', 'uses difficult words.', ''),
(41, 'I don''t mind being the center of attention.', 'doesn''t mind being the center of attention.', ''),
(42, 'I feel others'' emotions.', 'feels others'' emotions.', ''),
(43, 'I follow a schedule.', 'follows a schedule.', ''),
(44, 'I get irritated easily.', 'gets irritated easily.', ''),
(45, 'I spend time reflecting on things.', 'spends time reflecting on things.', ''),
(46, 'I am quiet around strangers.', 'is quiet around strangers.', ''),
(47, 'I make people feel at ease.', 'makes people feel at ease.', ''),
(48, 'I am exacting in my work.', 'is exacting in their work.', ''),
(49, 'I often feel blue.', 'often feels blue.', '<b>Feeling blue</b> means feeling sad, depressed, or maybe just a little down.<br>'),
(50, 'I am full of ideas.', 'is full of ideas.', '');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
