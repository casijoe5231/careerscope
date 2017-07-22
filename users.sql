-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 30, 2013 at 05:36 AM
-- Server version: 5.5.24-log
-- PHP Version: 5.3.13

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
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
-- Table structure for table `access_level`
--

CREATE TABLE IF NOT EXISTS `access_level` (
  `username` varchar(12) NOT NULL,
  `acess` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `analysis`
--

CREATE TABLE IF NOT EXISTS `analysis` (
  `type` varchar(5) NOT NULL,
  `id` int(2) NOT NULL,
  `result` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `analysis`
--

INSERT INTO `analysis` (`type`, `id`, `result`) VALUES
('E', 1, 'Your score on this trait is extremely high. You like being with people and having a good time. Your attitude can be characterized as spontaneous and communicative. You are generally less fond of being alone. You are enthusiastic and energetic. You need external stimuli and are generally quickly bored. In a sense, you are always looking for social adventure. It is easy for you to talk and you often lead the troops. To others you are energetic and easy to approach. You are probably very popular among your group of friends. People will generally consider you to be happy and optimistic. It may be difficult for you to take a step back. People who are more introverted may find it difficult to keep up with you, or they may think that your social life is too busy. You generally get along better with people who are relatively talkative and boisterous.'),
('E', 2, 'Your score on this trait is high. You like to have a good time now and then and feel relatively comfortable with others. Your attitude is sometimes characterized as spontaneous and communicative. You do not always enjoy being alone. You can be very enthusiastic and energetic. You sometimes need external stimuli and may be bored quickly. In a sense, you are looking for social adventure. It is easy for you to talk to people and you sometimes take the lead. You can be open and friendly to others. Others probably consider you to be popular. People will generally consider you to be happy and optimistic. It may sometimes be difficult for you to take a step back. People who are highly introverted may find it difficult to keep up with you, or sometimes think your social life is too busy. In general, you get along better with people who are relatively talkative or even boisterous.'),
('E', 3, 'Your score on this trait is above average. You like to have a good time now and then and feel relatively comfortable with others. Your attitude is sometimes characterized as spontaneous and communicative. You do not always enjoy being alone. You can be very enthusiastic and energetic. You sometimes need external stimuli and may be bored quickly. In a sense, you are looking for social adventure. It is easy for you to talk to people and you sometimes take the lead. You can be open and friendly to others. Others probably consider you to be popular. People will generally consider you to be happy and optimistic. It may sometimes be difficult for you to take a step back. People who are highly introverted may find it difficult to keep up with you, or sometimes think your social life is too busy. In general, you get along better with people who are relatively talkative or even boisterous.'),
('E', 4, 'Your score on this trait is just above average. You are equally fond of having fun with others and being alone. In general, you are energetic but not overenthusiastic. You like your privacy but also do well in groups. At parties or in a group, you do not feel a need for attention. If asked or if there is a reason to do so, you will voice your opinion. You do not feel the need to be busy all the time, but you are also not one to simply relax. You feel comfortable with people who are not afraid to take the initiative when the situation arises. But you can also deal with people who are more introverted or who crave attention. You enjoy contact with others, but this is not essential. You can appear to be both hesitant and spontaneous. In principle, an average score on this scale makes you open to both those who are reserved and extroverts.'),
('E', 5, 'Your score on this trait is average. You are equally fond of having fun with others and being alone. In general, you are energetic but not overenthusiastic. You like your privacy but also do well in groups. At parties or in a group, you do not feel a need for attention. If asked or if there is a reason to do so, you will voice your opinion. You do not feel the need to be busy all the time, but you are also not one to simply relax. You feel comfortable with people who are not afraid to take the initiative when the situation arises. But you can also deal with people who are more introverted or who crave attention. You enjoy contact with others, but this is not essential. You can appear to be both hesitant and spontaneous. In principle, an average score on this scale makes you open to both those who are reserved and extroverts.'),
('E', 6, 'Your score on this trait is just below average. You are equally fond of having fun with others and being alone. In general, you are energetic but not overenthusiastic. You like your privacy but also do well in groups. At parties or in a group, you do not feel a need for attention. If asked or if there is a reason to do so, you will voice your opinion. You do not feel the need to be busy all the time, but you are also not one to simply relax. You feel comfortable with people who are not afraid to take the initiative when the situation arises. But you can also deal with people who are more introverted or who crave attention. You enjoy contact with others, but this is not essential. You can appear to be both hesitant and spontaneous. In principle, an average score on this scale makes you open to both those who are reserved and extroverts.'),
('E', 7, 'Your score on this trait is below average. With others, your attitude is somewhat reserved or formal. Your need for external stimuli varies, and you sometimes like being alone. This does not mean that you are anti-social at all. You simply do not always feel the need to be heard or to voice your opinion unasked. You can appear to be reserved and are sometimes less outspoken with others. You may prefer to take things slowly, and you can enjoy being alone. You can be typified as a person who sometimes tests the waters. Others may consider you to be rigid and closed at times. You prefer to be with people who, like yourself, prefer to stay in the background. It is more difficult for you to identify with people who are extremely spontaneous or overly enthusiastic.'),
('E', 8, 'Your score on this trait is low. With others, your attitude is somewhat reserved or formal. Your need for external stimuli varies, and you sometimes like being alone. This does not mean that you are anti-social at all. You simply do not always feel the need to be heard or to voice your opinion unasked. You can appear to be reserved and are sometimes less outspoken with others. You may prefer to take things slowly, and you can enjoy being alone. You can be typified as a person who sometimes tests the waters. Others may consider you to be rigid and closed at times. You prefer to be with people who, like yourself, prefer to stay in the background. It is more difficult for you to identify with people who are extremely spontaneous or overly enthusiastic.'),
('A', 1, 'Your score on this trait is extremely high. This means that above all, you are a people person. Your attitude can be typified as people-minded. You have a mild attitude and are generally empathetic. When dealing with people, you are often helpful and take the other person''s feelings into account. This is evident in your higher level of attentiveness, for example. You will tend to soften bad news, or simply say nothing. Your assessment of others is generally relatively mild. You are probably known to be nice and sociable. You generally have trouble dealing with people who are harsh or unrelenting. As a result, you may sell yourself short or ignore your own needs. Thus you will normally feel comfortable with people whose approach is to be highly considerate of others. You have more trouble dealing with people who are competitive and harsh.'),
('A', 2, 'Your score on this trait is high. This means that you are a person who can be mild and empathetic. In many situations, you understand the emotional side. Your attitude is often considered people-minded. You can be highly empathetic with others. In dealing with people, you will take their feelings into account and can be very helpful. This is then evident in a greater degree of attentiveness. You will tend to soften bad news or simply not give it. You are generally relatively mild in your assessment of others. You are probably known to be nice and sociable. Sometimes you find it difficult to deal with people who are harsh or unrelenting. As a result, you may sell yourself short or ignore your own needs. Remember that some people can be attentive out of self-interest or for a certain purpose. You normally feel more comfortable with people who take others into account by nature. It is generally more difficult for you to deal with highly competitive individuals.'),
('A', 3, 'Your score on this trait is above average. This means that you are a person who can be mild and empathetic. In many situations, you understand the emotional side. Your attitude is often considered people-minded. You can be highly empathetic with others. In dealing with people, you will take their feelings into account and can be very helpful. This is then evident in a greater degree of attentiveness. You will tend to soften bad news or simply not give it. You are generally relatively mild in your assessment of others. You are probably known to be nice and sociable. Sometimes you find it difficult to deal with people who are harsh or unrelenting. As a result, you may sell yourself short or ignore your own needs. Remember that some people can be attentive out of self-interest or for a certain purpose. You normally feel more comfortable with people who take others into account by nature. It is generally more difficult for you to deal with highly competitive individuals.'),
('A', 4, 'Your score on this trait is just above average. You can be very friendly but also relatively direct. In general, you are interested in people and their motives, but can also be business-like. When you do things, you are guided by rationale on the one hand and the circumstances on the other. This means that you can take the feelings of others into account, but can also be relatively direct and less diplomatic. As a result, people will consider you to be both friendly and direct. In other words: a person who is not afraid to say what needs saying, but who is also able to do so in a friendly manner. You get along well with people who are nice but also capable of standing up for themselves. As long as they are not arrogant or individualistic.'),
('A', 5, 'Your score on this trait is average. You can be very friendly but also relatively direct. In general, you are interested in people and their motives, but can also be business-like. When you do things, you are guided by rationale on the one hand and the circumstances on the other. This means that you can take the feelings of others into account, but can also be relatively direct and less diplomatic. As a result, people will consider you to be both friendly and direct. In other words: a person who is not afraid to say what needs saying, but who is also able to do so in a friendly manner. You get along well with people who are nice but also capable of standing up for themselves. As long as they are not arrogant or individualistic.'),
('A', 6, 'Your score on this trait is just below average. You can be very friendly but also relatively direct. In general, you are interested in people and their motives, but can also be business-like. When you do things, you are guided by rationale on the one hand and the circumstances on the other. This means that you can take the feelings of others into account, but can also be relatively direct and less diplomatic. As a result, people will consider you to be both friendly and direct. In other words: a person who is not afraid to say what needs saying, but who is also able to do so in a friendly manner. You get along well with people who are nice but also capable of standing up for themselves. As long as they are not arrogant or individualistic.'),
('A', 7, 'Your score on this trait is below average. In comparison to others, you can be relatively direct. You approach others sometimes in a business-like and sometimes in a somewhat functional manner. As a result, you may leave the impression of being detached. In comparison with others, you are sometimes strong-willed. This means that you are a person who can be competitive. You are not always the first to quickly or spontaneously help others with their personal problems. You may even appear to be somewhat stubborn and business-like to specific others. In the worst case, this may make you seem less nice. However, people can also respect or appreciate you for your direct and outspoken attitude. In general, you get along well with people who, like yourself, are unafraid to be independent and can be straightforward. It is usually more difficult for you to deal with people who tend to be extremely mild or who try to be indirect.'),
('A', 8, 'Your score on this trait is low. In comparison to others, you can be relatively direct. You approach others sometimes in a business-like and sometimes in a somewhat functional manner. As a result, you may leave the impression of being detached. In comparison with others, you are sometimes strong-willed. This means that you are a person who can be competitive. You are not always the first to quickly or spontaneously help others with their personal problems. You may even appear to be somewhat stubborn and business-like to specific others. In the worst case, this may make you seem less nice. However, people can also respect or appreciate you for your direct and outspoken attitude. In general, you get along well with people who, like yourself, are unafraid to be independent and can be straightforward. It is usually more difficult for you to deal with people who tend to be extremely mild or who try to be indirect.'),
('C', 1, 'Your score on this trait is extremely high. You let your conscience lead you. In general, you are highly purposeful and careful. Other typifications that apply are exact and meticulous. You believe that proper preparations are what get the job done. Thus you are generally well organized and have your affairs in order. Others will sometimes think you are overly prudent. You keep your promises and believe that others should as well. You have a strong desire to successfully complete things. Thus you apply your own standards, which others may consider high. You are relatively careful in taking action and like to plan ahead. As a result, you may appear to be inflexible to certain others. Understand that not everybody has the same desire to get things done correctly and successfully. You, however, like to be around people who are neat. People who are generally methodical and careful. Messiness is usually more troubling to you.'),
('C', 2, 'Your score on this trait is high. You let your conscience lead you whenever possible. You are person who is relatively purposeful and careful. Other characteristics that could apply are exact and orderly. You believe that proper preparations are often what get the job done. Thus you are generally well organized and you usually have your affairs in order. Others who are much messier will think you are prudent. In general, you keep your promises and you also often expect others to keep theirs. You have a relatively strong desire to successfully complete things. Thus you sometimes apply your own standards, which others may consider high. You can be relatively cautious and you tend to plan ahead. As a result, you may sometimes appear to be inflexible. Understand that not everybody has the same desire to get things done correctly and successfully. You like to be around people who are neat. People who are methodical and cautious. You may have trouble dealing with people who are extremely messy.'),
('C', 3, 'Your score on this trait is above average. You let your conscience lead you whenever possible. You are person who is relatively purposeful and careful. Other characteristics that could apply are exact and orderly. You believe that proper preparations are often what get the job done. Thus you are generally well organized and you usually have your affairs in order. Others who are much messier will think you are prudent. In general, you keep your promises and you also often expect others to keep theirs. You have a relatively strong desire to successfully complete things. Thus you sometimes apply your own standards, which others may consider high. You can be relatively cautious and you tend to plan ahead. As a result, you may sometimes appear to be inflexible. Understand that not everybody has the same desire to get things done correctly and successfully. You like to be around people who are neat. People who are methodical and cautious. You may have trouble dealing with people who are extremely messy.'),
('C', 4, 'Your score on this trait is just above average. This indicates that you are a person who has his/her affairs reasonably well organized. You like to take a systematic approach without being too prudent. It is probably relatively easy for you to find a healthy balance between your work and your private life. You are the kind of person who can achieve impressive results with relatively little effort. However, striving for perfection is not in your nature. In other words, you are a person who acts to achieve a certain goal but who is willing to compromise. This makes you both effective and flexible, so that many people consider you to be a pleasant colleague or person. In general, you get along well with people who like order and neatness. As long as they are not too persistent.'),
('C', 5, 'Your score on this trait is average. This indicates that you are a person who has his/her affairs reasonably well organized. You like to take a systematic approach without being too prudent. It is probably relatively easy for you to find a healthy balance between your work and your private life. You are the kind of person who can achieve impressive results with relatively little effort. However, striving for perfection is not in your nature. In other words, you are a person who acts to achieve a certain goal but who is willing to compromise. This makes you both effective and flexible, so that many people consider you to be a pleasant colleague or person. In general, you get along well with people who like order and neatness. As long as they are not too persistent.'),
('C', 6, 'Your score on this trait is just below average. This indicates that you are a person who has his/her affairs reasonably well organized. You like to take a systematic approach without being too prudent. It is probably relatively easy for you to find a healthy balance between your work and your private life. You are the kind of person who can achieve impressive results with relatively little effort. However, striving for perfection is not in your nature. In other words, you are a person who acts to achieve a certain goal but who is willing to compromise. This makes you both effective and flexible, so that many people consider you to be a pleasant colleague or person. In general, you get along well with people who like order and neatness. As long as they are not too persistent.'),
('C', 7, 'Your score on this trait is below average. You are capable of taking whatever life brings. Sometimes you seem to be careless. You can be relaxed and spontaneous. However, you are sometimes less organized than others as a result. You may tend to avoid obligations. Your actions are sometimes more intuitive: based on feelings rather than on what has been agreed or is considered appropriate. As a result, sometimes you may appear to be somewhat disorganized and therefore easily distracted. Thus sometimes you need to be careful of forgetting things or losing understanding of the big picture. Specific others will sometimes even consider you to be lazy or uncaring. However, this also means that you can be flexible. In general, you prefer to be with people who take life as it comes. You generally have more difficulty dealing with people who are very cautious, exact or somewhat prudent. You do not always feel at ease in a more structured, extremely orderly environment.'),
('C', 8, 'Your score on this trait is low. You are a person who is usually less organized than others. You may prefer to avoid too many obligations. You take life as it comes and may appear to be careless. Your actions are more intuitive: based on feelings rather than on what has been agreed or is considered appropriate. As a result, you can be somewhat disorganized and therefore easily distracted. Thus you need to be careful of forgetting things or losing understanding of the big picture. Specific others will probably consider you to be lazy or uncaring. However, this also makes you highly flexible. As such, you prefer to be with people who take life as it comes. It is more difficult for you to deal with people who are extremely cautious, exact or basically fussy. You do not feel at ease in a highly structured and orderly environment, and should therefore avoid such situations.'),
('N', 1, 'Your score on this trait is extremely high. This means that in comparison with others, you are generally very calm. When others are stressed, you keep your cool. You are not easily insulted or annoyed. Usually you do not care much about what others think of you. Thus you are relatively untroubled by shame or anger. As a result, you appear to be controlled and satisfied. You are also not easily discouraged. You might appear as indifferent to some people: a person who can remain unmoved and cold-blooded under stress. This can work to your disadvantage, however, when people around you are either enthusiastic or distressed. In such situations, your calm may be interpreted as insensitivity or a lack of enthusiasm. You will get along well with more stable personality types: people known to be cool-headed. Nervous, whiny types who are easily frightened are not normally your type.'),
('N', 2, 'Your score on this trait is high. This means that in comparison with others, you are generally reasonably calm. When others are stressed, you tend to keep your cool. You are not very easily annoyed or insulted. You are less sensitive to what others think of you. Thus you are relatively untroubled by shame or anger. You are also not easily discouraged. As a result, you may appear to be somewhat controlled and satisfied. You are sometimes known as indifferent to some people: a person who can be unmoved and cold-blooded. This can work to your disadvantage, however, when many people around you are enthusiastic or distressed. In such situations, your calm may be interpreted as insensitivity or a lack of enthusiasm. You get along well with more stable personality types: people known to be cool-headed. You sometimes find it more difficult to deal with people who are nervous or whiny.'),
('N', 3, 'Your score on this trait is above average. This means that in comparison with others, you are generally reasonably calm. When others are stressed, you tend to keep your cool. You are not very easily annoyed or insulted. You are less sensitive to what others think of you. Thus you are relatively untroubled by shame or anger. You are also not easily discouraged. As a result, you may appear to be somewhat controlled and satisfied. You are sometimes known as indifferent to some people: a person who can be unmoved and cold-blooded. This can work to your disadvantage, however, when many people around you are enthusiastic or distressed. In such situations, your calm may be interpreted as insensitivity or a lack of enthusiasm. You get along well with more stable personality types: people known to be cool-headed. You sometimes find it more difficult to deal with people who are nervous or whiny.'),
('N', 4, 'Your score on this trait is just above average. This means that you are normally relatively calm. Your emotional response primarily depends on the situation. You only feel stressed or out of balance when put under pressure or forced to deal with setbacks. It is not very difficult to get you riled, and in general you may feel bad about losing, but this does not keep you awake at night. It is relatively easy for you to get past feelings, such as shame. You certainly have your doubts and worries, but these do not dominate your thinking. Most of the time you can think rationally and put emotions into their proper perspective.'),
('N', 5, 'Your score on this trait is average. This means that you are normally relatively calm. Your emotional response primarily depends on the situation. You only feel stressed or out of balance when put under pressure or forced to deal with setbacks. It is not very difficult to get you riled, and in general you may feel bad about losing, but this does not keep you awake at night. It is relatively easy for you to get past feelings, such as shame. You certainly have your doubts and worries, but these do not dominate your thinking. Most of the time you can think rationally and put emotions into their proper perspective.'),
('N', 6, 'Your score on this trait is just below average. This means that you are normally relatively calm. Your emotional response primarily depends on the situation. You only feel stressed or out of balance when put under pressure or forced to deal with setbacks. It is not very difficult to get you riled, and in general you may feel bad about losing, but this does not keep you awake at night. It is relatively easy for you to get past feelings, such as shame. You certainly have your doubts and worries, but these do not dominate your thinking. Most of the time you can think rationally and put emotions into their proper perspective.'),
('N', 7, 'Your score on this trait is below average. You responses are usually relatively alert and involved. However, you may sometimes get overwhelmed by negative feelings, such as fear, shame or anger. It is relatively more difficult for you to get past such feelings. Sometimes your thinking is too negative and you probably worry more than actually necessary. As a result, others may sometimes perceive you to be troubled or tense. The advantage of this is that you will not be easily considered to be cold. Sometimes you devote extra effort to doing things right. As a result, you can be appreciated for your enthusiasm and caring. You prefer being with people who, like you, can be sensitive and empathetic. It is relatively more difficult for you to deal with people who show little enthusiasm or sensitivity. For the record, Emotional stability is the specific scale that fluctuates based on your actual state of mind. Depending on your particular mood or meaningful events in your life, the description given here may apply to a greater or lesser extent.'),
('N', 8, 'Your score on this trait is low. You responses are usually relatively alert and involved. However, you may sometimes get overwhelmed by negative feelings, such as fear, shame or anger. It is relatively more difficult for you to get past such feelings. Sometimes your thinking is too negative and you probably worry more than actually necessary. As a result, others may sometimes perceive you to be troubled or tense. The advantage of this is that you will not be easily considered to be cold. Sometimes you devote extra effort to doing things right. As a result, you can be appreciated for your enthusiasm and caring. You prefer being with people who, like you, can be sensitive and empathetic. It is relatively more difficult for you to deal with people who show little enthusiasm or sensitivity. For the record, Emotional stability is the specific scale that fluctuates based on your actual state of mind. Depending on your particular mood or meaningful events in your life, the description given here may apply to a greater or lesser extent.'),
('O', 1, '1Your score on this trait is extremely high. This means that you are probably a highly imaginative individual. You can also be typified as creative and reflective. You have broad interests and are inquisitive. You are open to new experiences, solutions and values. You love to break with routines and fixed patterns. You are curious and take a broad view of things. Exchanging views and acquiring knowledge are important to you. You do not like routines and fixed patterns. In some ways, others may think of you as curious, exciting or learned. It bothers you when others are not willing to discuss things or insist upon maintaining the status quo. You feel more comfortable with people who are independent or original.'),
('O', 2, 'Your score on this trait is high. This means that you probably have a relatively well-developed imagination. Others will sometimes typify you as being creative or reflective. You sometimes show broad interest and curiosity. You are often open to new experiences, solutions or values. Sometimes you tend to break away from routines and fixed patterns. You are often curious and take a relatively broad view. You enjoy exchanging ideas sometimes or acquiring new knowledge. You are not very fond of routines and fixed patterns. In certain ways, others may consider you to be curious, exciting or learned. You can become troubled when people are afraid to discuss things or insist upon maintaining the status quo. You feel more comfortable with people who can be independent or original.'),
('O', 3, 'Your score on this trait is above average. This means that you probably have a relatively well-developed imagination. Others will sometimes typify you as being creative or reflective. You sometimes show broad interest and curiosity. You are often open to new experiences, solutions or values. Sometimes you tend to break away from routines and fixed patterns. You are often curious and take a relatively broad view. You enjoy exchanging ideas sometimes or acquiring new knowledge. You are not very fond of routines and fixed patterns. In certain ways, others may consider you to be curious, exciting or learned. You can become troubled when people are afraid to discuss things or insist upon maintaining the status quo. You feel more comfortable with people who can be independent or original.'),
('O', 4, 'Your score on this trait is just above average. Part of you is practical. Why make things difficult? But every now and then, with due cause, you will break away from routines or fixed patterns and be open to new ideas, or want to discuss things. You do like challenges and enjoy exchanging views at time. However, finding new ideas and experiences does not always have central focus in your life. In general, you focus on the here and now, but are willing to try something new if necessary or intriguing. Thus your approach is pragmatic. Many people appreciate the fact that you are not constantly wondering whether things can be done differently or better. By nature, you get along well with people who are original without simply refusing to maintain the status quo.'),
('O', 5, 'Your score on this trait is average. Part of you is practical. Why make things difficult? But every now and then, with due cause, you will break away from routines or fixed patterns and be open to new ideas, or want to discuss things. You do like challenges and enjoy exchanging views at time. However, finding new ideas and experiences does not always have central focus in your life. In general, you focus on the here and now, but are willing to try something new if necessary or intriguing. Thus your approach is pragmatic. Many people appreciate the fact that you are not constantly wondering whether things can be done differently or better. By nature, you get along well with people who are original without simply refusing to maintain the status quo.'),
('O', 6, 'Your score on this trait is just below average. Part of you is practical. Why make things difficult? But every now and then, with due cause, you will break away from routines or fixed patterns and be open to new ideas, or want to discuss things. You do like challenges and enjoy exchanging views at time. However, finding new ideas and experiences does not always have central focus in your life. In general, you focus on the here and now, but are willing to try something new if necessary or intriguing. Thus your approach is pragmatic. Many people appreciate the fact that you are not constantly wondering whether things can be done differently or better. By nature, you get along well with people who are original without simply refusing to maintain the status quo.'),
('O', 7, 'Your score on this trait is below average. You are more focused than others on the here and now. Instead of thinking things up or considering alternatives, you prefer to get down to work. Why make things difficult? Thus you are also not the type who readily wants things discussed. As a result, you can seem to be polite and correct. In general, you slightly prefer routine and tend to take a practical approach. Specific others may consider you to be conservative or even rigid as a result, but also especially loyal and rule abiding. It is sometimes difficult for you to deal with people who are dreamy, vague or always wondering whether there is a better way to do things. You prefer to accept things as they are. Your preference is for people who can take a level-headed approach.'),
('O', 8, 'Your score on this trait is low. You are more focused than others on the here and now. Instead of thinking things up or considering alternatives, you prefer to get down to work. Why make things difficult? Thus you are also not the type who readily wants things discussed. As a result, you can seem to be polite and correct. In general, you slightly prefer routine and tend to take a practical approach. Specific others may consider you to be conservative or even rigid as a result, but also especially loyal and rule abiding. It is sometimes difficult for you to deal with people who are dreamy, vague or always wondering whether there is a better way to do things. You prefer to accept things as they are. Your preference is for people who can take a level-headed approach.'),
('N_OBS', 1, 'Your Observers feel that you are very calm and relaxed, even in highly stressful situations '),
('N_OBS', 2, 'Your Observer feel that you are generally calm. Emotionally stable.'),
('N_OBS', 3, 'Your Observers feel that you are slightly emotionally stable. Sometimes able to handle nervousness.'),
('N_OBS', 4, 'Your Observers feel that you are even tempered. You may be nervous sometimes when trying new things'),
('N_OBS', 5, 'Your Observers feel that you get worried sometimes about uncertain outcomes.'),
('N_OBS', 6, 'Your Observers feel that you are mostly nervous & uneasy. Sensitive to environmental stress, shy'),
('N_OBS', 7, 'Your Observers feel that you are highly anxious, easily stressed. You feel depressed mostly. You are very self-conscious and shy');

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE IF NOT EXISTS `course` (
  `name` varchar(60) NOT NULL,
  `domain` varchar(20) NOT NULL,
  `desc` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`name`, `domain`, `desc`) VALUES
('New Course', 'comp', '<p><strong>Course Description</strong>.</p>\r\n\r\n<p>This might work</p>\r\n'),
('New test course', 'comp', '<p>New Test Course on display&nbsp;</p>\r\n'),
('Robotics', 'mech', '<h3>Soft Robotics and Morphological Computation</h3>\r\n\r\n<p>The workshop brings together two recent and exciting trends in robotics, namely, Soft Robotics and Morphological Computation. Both are expected to play an important role to bring about substantially novel approaches and application in robotics research. Toward high impact achievements, the main objectives of the workshop is to bring together the leading scientists of these two exciting research areas from all over the world, and to present the state-of-the-art work for mutual inspiration.</p>\r\n\r\n<p>More specifically, we will explore overlaps of the two fields to stimulate fertile interaction. We will share and discuss important theoretical and technological issues, which will lead to high impact applications and innovation in the near future. We will discuss how these research directions can be more concretely implemented in the grand scheme of the field. For this purpose, we will invite the leading scientists and assign a significant amount of time to brainstorming and discussion. Furthermore, we will promote the collaborations of promising young scientists and students to stimulate interdisciplinary work, as they are the main driving force of research in the long time perspective.</p>\r\n\r\n<h3>Workshop Detail</h3>\r\n\r\n<p>The workshop will feature plenary lectures from visionary and interdisciplinary leaders of this field as well as room for stimulating discussions among the participants about the future of this field and the questions related to it as mentioned above.</p>\r\n\r\n<p>The CSF Congress Center belongs to ETH Zurich and is located at Monte Verit&agrave;, Ascona, in one of the most beautiful areas of Switzerland. For more information, please refer to the further information provided on this website.</p>\r\n'),
('Electronics- SemiConductors', 'extc', '<p>Course Description.&nbsp;</p>\r\n\r\n<p>SemiConductors</p>\r\n\r\n<p>Some sample text for this example created in Microsoft Word 2007.</p>\r\n\r\n<p>Subtitle1</p>\r\n\r\n<p>Some other title</p>\r\n\r\n<h1>Heading</h1>\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `domain`
--

CREATE TABLE IF NOT EXISTS `domain` (
  `Name` varchar(40) NOT NULL,
  `value` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `domain`
--

INSERT INTO `domain` (`Name`, `value`) VALUES
('Quantitative', 'quant'),
('Verbal', 'verbal'),
('Logical', 'logic'),
('Computer/I.T', 'compit'),
('E.X.T.C', 'extc'),
('Mechanical', 'mech');

-- --------------------------------------------------------

--
-- Table structure for table `mod1_questions`
--

CREATE TABLE IF NOT EXISTS `mod1_questions` (
  `id` int(3) NOT NULL,
  `question` text NOT NULL,
  `desc` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mod1_questions`
--

INSERT INTO `mod1_questions` (`id`, `question`, `desc`) VALUES
(1, 'I am the life of the party', ''),
(2, 'I feel little concern for others.', ''),
(3, 'I am always prepared.', ''),
(4, 'I get stressed out easily.', ''),
(5, 'I have a rich vocabulary. ', '<b>Vocabulary</b> can be the sum of words used by or understood by a particular person. A rich vocabulary can therefore mean a very good vocabulary.'),
(6, 'I don''t talk a lot. ', ''),
(7, 'I am interested in people. ', ''),
(8, 'I leave my belongings around.', ''),
(9, 'I am relaxed most of the time. ', ''),
(10, 'I have difficulty understanding abstract ideas.', '<b>Abstract Ideas</b> are concepts that need to be visualized, as they cannot be illustrated through concrete (real) examples. In a simple way, explaining the progression of logic in a (computer) program will be possible only if the reader can correctly visualize (imagine) it in his mind.'),
(11, 'I feel comfortable around people. ', ''),
(12, 'I insult people. ', ''),
(13, 'I pay attention to details. ', ''),
(14, 'I worry about things.', ''),
(15, 'I have a vivid imagination. ', 'Creating imaginary things in the mind. It is often a term used to describe someone like a storyteller, people who make up stories often are spoken of as having such a vivid imagination.'),
(16, 'I keep in the background. ', '<b>Keep in the background</b> means to not be outgoing and talkative and draw attention or be out of sight of people'),
(17, 'I sympathize with others'' feelings. ', ''),
(18, 'I make a mess of things. ', ''),
(19, 'I seldom feel blue.', '<b>Feeling blue</b> means feeling sad, depressed, or maybe just a little down.<br>\\n<b>Seldom</b> means not often or rarely'),
(20, 'I am not interested in abstract ideas.', '<b>Abstract Ideas</b> are concepts that need to be visualized, as they cannot be illustrated through concrete (real) examples. In a simple way, explaining the progression of logic in a (computer) program will be possible only if the reader can correctly visualize (imagine) it in his mind.'),
(21, 'I start conversations. ', ''),
(22, 'I am not interested in other people''s problems. ', ''),
(23, 'I get chores done right away. ', '<b>Chore</b> means a routine task, especially a household one.'),
(24, 'I am easily disturbed. ', ''),
(25, 'I have excellent ideas. ', ''),
(26, 'I have little to say.', ''),
(27, 'I have a soft heart.', ''),
(28, 'I often forget to put things back in their proper place.', ''),
(29, 'I get upset easily.', ''),
(30, 'I do not have a good imagination.', ''),
(31, 'I talk to a lot of different people at parties.', ''),
(32, 'I am not really interested in others.', ''),
(33, 'I like order.', ''),
(34, 'I change my mood a lot.', ''),
(35, 'I am quick to understand things.', ''),
(36, 'I don''t like to draw attention to myself.', ''),
(37, 'I take time out for others.', ''),
(38, 'I shirk my duties.', '<b>Shirks</b> means to avoid or neglect (a duty or responsibility)'),
(39, 'I have frequent mood swings.', '<b>Mood Swing</b> is an abrupt and unaccountable change of mood. A person may be happy now & then suddenly be sad the other instant.'),
(40, 'I use difficult words.', ''),
(41, 'I don''t mind being the center of attention.', ''),
(42, 'I feel others'' emotions.', ''),
(43, 'I follow a schedule.', ''),
(44, 'I get irritated easily.', ''),
(45, 'I spend time reflecting on things.', ''),
(46, 'I am quiet around strangers.', ''),
(47, 'I make people feel at ease.', ''),
(48, 'I am exacting in my work.', ''),
(49, 'I often feel blue.', '<b>Feeling blue</b> means feeling sad, depressed, or maybe just a little down.<br>'),
(50, 'I am full of ideas.', '');

-- --------------------------------------------------------

--
-- Table structure for table `mod2`
--

CREATE TABLE IF NOT EXISTS `mod2` (
  `reviewer` varchar(16) NOT NULL,
  `requestor` varchar(16) NOT NULL,
  `val` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mod2`
--

INSERT INTO `mod2` (`reviewer`, `requestor`, `val`) VALUES
('admin', 'robert', 'a:50:{i:0;s:1:"1";i:1;s:1:"2";i:2;s:1:"3";i:3;s:1:"4";i:4;s:1:"5";i:5;s:1:"4";i:6;s:1:"3";i:7;s:1:"2";i:8;s:1:"1";i:9;s:1:"2";i:10;s:1:"3";i:11;s:1:"4";i:12;s:1:"5";i:13;s:1:"4";i:14;s:1:"3";i:15;s:1:"2";i:16;s:1:"1";i:17;s:1:"2";i:18;s:1:"3";i:19;s:1:"4";i:20;s:1:"5";i:21;s:1:"4";i:22;s:1:"3";i:23;s:1:"2";i:24;s:1:"1";i:25;s:1:"2";i:26;s:1:"3";i:27;s:1:"4";i:28;s:1:"5";i:29;s:1:"4";i:30;s:1:"3";i:31;s:1:"2";i:32;s:1:"1";i:33;s:1:"2";i:34;s:1:"3";i:35;s:1:"4";i:36;s:1:"5";i:37;s:1:"4";i:38;s:1:"3";i:39;s:1:"2";i:40;s:1:"1";i:41;s:1:"2";i:42;s:1:"3";i:43;s:1:"4";i:44;s:1:"5";i:45;s:1:"4";i:46;s:1:"3";i:47;s:1:"2";i:48;s:1:"1";i:49;s:1:"2";}'),
('markford', 'admin', 'a:50:{i:0;s:1:"1";i:1;s:1:"2";i:2;s:1:"3";i:3;s:1:"4";i:4;s:1:"5";i:5;s:1:"4";i:6;s:1:"3";i:7;s:1:"2";i:8;s:1:"1";i:9;s:1:"2";i:10;s:1:"3";i:11;s:1:"4";i:12;s:1:"5";i:13;s:1:"4";i:14;s:1:"3";i:15;s:1:"2";i:16;s:1:"1";i:17;s:1:"2";i:18;s:1:"3";i:19;s:1:"4";i:20;s:1:"5";i:21;s:1:"4";i:22;s:1:"3";i:23;s:1:"2";i:24;s:1:"1";i:25;s:1:"2";i:26;s:1:"3";i:27;s:1:"4";i:28;s:1:"5";i:29;s:1:"4";i:30;s:1:"3";i:31;s:1:"2";i:32;s:1:"1";i:33;s:1:"2";i:34;s:1:"3";i:35;s:1:"4";i:36;s:1:"5";i:37;s:1:"4";i:38;s:1:"3";i:39;s:1:"2";i:40;s:1:"1";i:41;s:1:"2";i:42;s:1:"3";i:43;s:1:"4";i:44;s:1:"5";i:45;s:1:"4";i:46;s:1:"3";i:47;s:1:"2";i:48;s:1:"1";i:49;s:1:"2";}'),
('janew', 'admin', 'a:50:{i:0;s:1:"5";i:1;s:1:"4";i:2;s:1:"3";i:3;s:1:"2";i:4;s:1:"1";i:5;s:1:"2";i:6;s:1:"3";i:7;s:1:"4";i:8;s:1:"5";i:9;s:1:"4";i:10;s:1:"3";i:11;s:1:"2";i:12;s:1:"1";i:13;s:1:"2";i:14;s:1:"3";i:15;s:1:"4";i:16;s:1:"5";i:17;s:1:"4";i:18;s:1:"3";i:19;s:1:"2";i:20;s:1:"1";i:21;s:1:"2";i:22;s:1:"3";i:23;s:1:"4";i:24;s:1:"5";i:25;s:1:"4";i:26;s:1:"3";i:27;s:1:"2";i:28;s:1:"1";i:29;s:1:"2";i:30;s:1:"3";i:31;s:1:"4";i:32;s:1:"5";i:33;s:1:"4";i:34;s:1:"3";i:35;s:1:"2";i:36;s:1:"1";i:37;s:1:"2";i:38;s:1:"3";i:39;s:1:"4";i:40;s:1:"5";i:41;s:1:"4";i:42;s:1:"3";i:43;s:1:"2";i:44;s:1:"1";i:45;s:1:"2";i:46;s:1:"3";i:47;s:1:"4";i:48;s:1:"5";i:49;s:1:"4";}'),
('rahul', 'admin', 'a:50:{i:0;s:1:"1";i:1;s:1:"2";i:2;s:1:"1";i:3;s:1:"3";i:4;s:1:"5";i:5;s:1:"3";i:6;s:1:"2";i:7;s:1:"3";i:8;s:1:"4";i:9;s:1:"5";i:10;s:1:"1";i:11;s:1:"3";i:12;s:1:"4";i:13;s:1:"3";i:14;s:1:"5";i:15;s:1:"3";i:16;s:1:"2";i:17;s:1:"3";i:18;s:1:"5";i:19;s:1:"3";i:20;s:1:"2";i:21;s:1:"1";i:22;s:1:"2";i:23;s:1:"3";i:24;s:1:"5";i:25;s:1:"4";i:26;s:1:"3";i:27;s:1:"3";i:28;s:1:"1";i:29;s:1:"5";i:30;s:1:"5";i:31;s:1:"4";i:32;s:1:"2";i:33;s:1:"2";i:34;s:1:"1";i:35;s:1:"3";i:36;s:1:"4";i:37;s:1:"5";i:38;s:1:"5";i:39;s:1:"2";i:40;s:1:"3";i:41;s:1:"2";i:42;s:1:"3";i:43;s:1:"5";i:44;s:1:"1";i:45;s:1:"2";i:46;s:1:"2";i:47;s:1:"3";i:48;s:1:"4";i:49;s:1:"2";}'),
('admin', 'janew', 'a:50:{i:0;s:1:"1";i:1;s:1:"2";i:2;s:1:"3";i:3;s:1:"1";i:4;s:1:"2";i:5;s:1:"3";i:6;s:1:"2";i:7;s:1:"2";i:8;s:1:"3";i:9;s:1:"5";i:10;s:1:"2";i:11;s:1:"1";i:12;s:1:"2";i:13;s:1:"3";i:14;s:1:"5";i:15;s:1:"4";i:16;s:1:"2";i:17;s:1:"2";i:18;s:1:"4";i:19;s:1:"1";i:20;s:1:"4";i:21;s:1:"3";i:22;s:1:"3";i:23;s:1:"2";i:24;s:1:"2";i:25;s:1:"3";i:26;s:1:"1";i:27;s:1:"2";i:28;s:1:"3";i:29;s:1:"5";i:30;s:1:"4";i:31;s:1:"3";i:32;s:1:"4";i:33;s:1:"2";i:34;s:1:"4";i:35;s:1:"3";i:36;s:1:"3";i:37;s:1:"2";i:38;s:1:"5";i:39;s:1:"1";i:40;s:1:"2";i:41;s:1:"3";i:42;s:1:"4";i:43;s:1:"3";i:44;s:1:"2";i:45;s:1:"2";i:46;s:1:"1";i:47;s:1:"3";i:48;s:1:"3";i:49;s:1:"5";}'),
('admin', 'markford', 'a:50:{i:0;s:1:"5";i:1;s:1:"3";i:2;s:1:"2";i:3;s:1:"1";i:4;s:1:"3";i:5;s:1:"4";i:6;s:1:"3";i:7;s:1:"2";i:8;s:1:"3";i:9;s:1:"4";i:10;s:1:"1";i:11;s:1:"5";i:12;s:1:"1";i:13;s:1:"2";i:14;s:1:"4";i:15;s:1:"3";i:16;s:1:"5";i:17;s:1:"2";i:18;s:1:"4";i:19;s:1:"2";i:20;s:1:"3";i:21;s:1:"4";i:22;s:1:"2";i:23;s:1:"1";i:24;s:1:"4";i:25;s:1:"5";i:26;s:1:"3";i:27;s:1:"2";i:28;s:1:"1";i:29;s:1:"2";i:30;s:1:"3";i:31;s:1:"5";i:32;s:1:"4";i:33;s:1:"2";i:34;s:1:"1";i:35;s:1:"3";i:36;s:1:"4";i:37;s:1:"5";i:38;s:1:"4";i:39;s:1:"2";i:40;s:1:"1";i:41;s:1:"2";i:42;s:1:"3";i:43;s:1:"4";i:44;s:1:"5";i:45;s:1:"4";i:46;s:1:"2";i:47;s:1:"1";i:48;s:1:"2";i:49;s:1:"3";}');

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
('markford', 'admin', 'planning&organising', 'Organizing things especially during events as such shows his capability to the fullest. However planning is best done when in a group');

-- --------------------------------------------------------

--
-- Table structure for table `mod2_questions`
--

CREATE TABLE IF NOT EXISTS `mod2_questions` (
  `id` int(3) NOT NULL,
  `question` text NOT NULL,
  `desc` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mod2_questions`
--

INSERT INTO `mod2_questions` (`id`, `question`, `desc`) VALUES
(1, 'is the life of the party', ''),
(2, 'feels little concern for others.', ''),
(3, 'is always prepared.', ''),
(4, 'gets stressed out easily.', ''),
(5, 'has a rich vocabulary. ', '<b>Vocabulary</b> can be the sum of words used by or understood by a particular person. A rich vocabulary can therefore mean a very good vocabulary.'),
(6, 'doesn''t talk a lot. ', ''),
(7, 'is interested in people. ', ''),
(8, 'leaves their belongings around.', ''),
(9, 'is relaxed most of the time. ', ''),
(10, 'has difficulty understanding abstract ideas.', '<b>Abstract Ideas</b> are concepts that need to be visualized, as they cannot be illustrated through concrete (real) examples. In a simple way, explaining the progression of logic in a (computer) program will be possible only if the reader can correctly visualize (imagine) it in his mind.'),
(11, 'feels comfortable around people. ', ''),
(12, 'insults people. ', ''),
(13, 'pays attention to details. ', ''),
(14, 'worries about things.', ''),
(15, 'has a vivid imagination. ', 'Creating imaginary things in the mind. It is often a term used to describe someone like a storyteller, people who make up stories often are spoken of as having such a vivid imagination.'),
(16, 'keeps in the background. ', '<b>Keep in the background</b> means to not be outgoing and talkative and draw attention or be out of sight of people'),
(17, 'sympathizes with others'' feelings. ', ''),
(18, 'makes a mess of things. ', ''),
(19, 'seldom feels blue.', '<b>Feeling blue</b> means feeling sad, depressed, or maybe just a little down.<br>\n<b>Seldom</b> means not often or rarely'),
(20, 'is not interested in abstract ideas.', '<b>Abstract Ideas</b> are concepts that need to be visualized, as they cannot be illustrated through concrete (real) examples. In a simple way, explaining the progression of logic in a (computer) program will be possible only if the reader can correctly visualize (imagine) it in his mind.'),
(21, 'starts conversations. ', ''),
(22, 'is not interested in other people''s problems. ', ''),
(23, 'gets chores done right away. ', '<b>Chore</b> means a routine task, especially a household one.'),
(24, 'is easily disturbed. ', ''),
(25, 'has excellent ideas. ', ''),
(26, 'has little to say.', ''),
(27, 'has a soft heart.', ''),
(28, 'often forgets to put things back in their proper place.', ''),
(29, 'gets upset easily.', ''),
(30, 'does not have a good imagination.', ''),
(31, 'talks to a lot of different people at parties.', ''),
(32, 'is not really interested in others.', ''),
(33, 'likes order.', ''),
(34, 'changes their mood a lot.', ''),
(35, 'is quick to understand things.', ''),
(36, 'doesn''t like to draw self attention.', ''),
(37, 'takes time out for others.', ''),
(38, 'shirks their duties.', '<b>Shirks</b> means to avoid or neglect (a duty or responsibility)'),
(39, 'has frequent mood swings.', '<b>Mood Swing</b> is an abrupt and unaccountable change of mood. A person may be happy now & then suddenly be sad the other instant.'),
(40, 'uses difficult words.', ''),
(41, 'doesn''t mind being the center of attention.', ''),
(42, 'feels others emotions.', ''),
(43, 'follows a schedule.', ''),
(44, 'gets irritated easily.', ''),
(45, 'spends time reflecting on things.', ''),
(46, 'is quiet around strangers.', ''),
(47, 'makes people feel at ease.', ''),
(48, 'is exacting in their work.', ''),
(49, 'often feels blue.', '<b>Feeling blue</b> means feeling sad, depressed, or maybe just a little down.<br>'),
(50, 'is full of ideas.', '');

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
('211suraj2587', 'admin', '');

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

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE IF NOT EXISTS `questions` (
  `t_id` int(3) NOT NULL,
  `q_id` int(3) NOT NULL,
  `question` text NOT NULL,
  `opt1` text NOT NULL,
  `opt2` text NOT NULL,
  `opt3` text NOT NULL,
  `opt4` text NOT NULL,
  `ans` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`t_id`, `q_id`, `question`, `opt1`, `opt2`, `opt3`, `opt4`, `ans`) VALUES
(11, 27, 'B2C commerce ', '	includes services such as legal advice\n<br>', '	means only shopping for physical goods\n<br>', '	means only customers should approach customers to sell\n<br>', '	means only customers should approach business to buy\n<br>', 1),
(11, 28, 'EDI requires ', '	representation of common business documents in computer readable forms\n<br>', '	data entry operators by receivers\n<br>', '	special value added networks\n<br>', '	special hardware at co-operating Business premises\n<br>', 1),
(17, 1, 'A capacitor is a perfect insulator for', '\nAlternating current\n        ', '\nDirect current\n        ', '\nDirect as well as alternating current\n        ', '\nNone of these\n        ', 2),
(17, 2, 'A choke coil is a coil having', '\nLow L and high R\n        ', '\nLow L and low R\n        ', '\nHigh L and low R\n        ', '\nHigh L and high R\n        ', 3),
(17, 3, 'A circuit has an impedance of (1-j2) ohms. The susceptance of the circuit is', '\n0.1 S\n        ', '\n0.2 s\n        ', '\n0.4 s\n        ', '\nNone\n        ', 3),
(17, 4, 'A heater is rated as 230 V, 10 KW, AC. The value 230 V refers to', '\nrms voltage\n        ', '\npeak voltage\n        ', '\naverage voltage\n        ', '\nnone\n        ', 1),
(17, 5, 'A low power factor of a circuit means that it will', '\nDraw more active power\n        ', '\nDraw less line current\n        ', '\nDraw more reactive power\n        ', '\nCause less voltage drop in the line\n        ', 1),
(17, 6, 'A parallel ac circuit in resonance will', '\nhave a high voltage developed across each inductive and capacitve section\n        ', '\nhave a high impedance\n        ', '\nact like a resistor of low value\n        ', '\nhave current in each section equal to line current\n        ', 2),
(17, 7, 'A parallel ac circuit in resonance will', '\nhave current in each section equal to line current\n        ', '\nhave a high voltage developed across each inductive and capacitive section\n        ', '\nact like a resistor of low value\n        ', '\nhave high impedance\n        ', 4),
(17, 8, 'A parallel resonant circuit magnifies', '\nCurrent\n        ', '\nVoltage\n        ', '\nCurrent and voltage\n        ', '\nNone of these\n        ', 1),
(17, 9, 'A parallel resonant circuit magnifies____', '\nvoltage\n        ', '\ncurrent\n        ', '\nboth voltage and current\n        ', '\nnone\n        ', 2),
(17, 10, 'A phasor is', '\na line which represents the magnitude and phase of an alternating quantity\n        ', '\na line representing the magnitude and direction of an alternating quantity\n        ', '\na coloured tag or band for distinction between different phases of 3 phase supply\n        ', '\nan instrument for measuring phases of unbalanced 3 phase load\n        ', 1),
(17, 11, 'A resonance curve for a series circuit is a lplot of frequency versus', '\ncurrent\n        ', '\nvoltage\n        ', '\nimpedance\n        ', '\nreactance\n        ', 1),
(17, 12, 'A series RLC circuit draws current at leading power factor at', '\nmore than resonant frequency\n        ', '\nless than resonant frequency\n        ', '\nresonant frequency\n        ', '\nnone\n        ', 2),
(17, 13, 'A wattmeter indicates ', '\nActive\n        ', '\nReactive\n        ', '\nApparent\n        ', '\nNone of these\n        ', 1),
(17, 14, 'Alternating voltages and currents are expressed in rms voltages because', '\nThey can be easily determined\n        ', '\nCalculations become simple\n        ', '\nThey give comparison with dc\n        ', '\nNone of these\n        ', 3),
(17, 15, 'An ac voltage of 50 Hz has a maximum value of 50V. Its value after 1/600 second after the instant the current is zero will be', '\n5V\n        ', '\n12.5V\n        ', '\n25V\n        ', '\n43.3V\n        ', 3),
(17, 16, 'An alternating current cannot be measured by a dc ammeter because', '\nAC is virtual\n        ', '\nAC cannot pass through DC ammeter\n        ', '\nAverage value of AC over one cycle is zero\n        ', '\nNone of these\n        ', 3),
(17, 17, 'An alternating current is converted to direct current by', '\nDynamo\n        ', '\nTransformer\n        ', '\nRectifier\n        ', '\nMotor\n        ', 3),
(17, 18, 'An alternating voltage  is given by v=200 sin 314t. Its rms value is', '\n100V\n        ', '\n282.8V\n        ', '\n141.4V\n        ', '\n121.4V\n        ', 3),
(17, 19, 'An alternating voltage is given by v=20 sin 157t. The frequency of the alternating voltage is', '\n50 Hz\n        ', '\n100 Hz\n        ', '\n25 Hz\n        ', '\n75 Hz\n        ', 3),
(17, 20, 'An alternating voltage or current is a', '\nScalar quantity\n        ', '\nVector quantity\n        ', '\nPhasor\n        ', '\nNone of these\n        ', 3),
(17, 21, 'As the power factor of  a circuit is increased,', '\nReactive power is decreased\n        ', '\nActive power is decreased\n        ', '\nReactive power is increased\n        ', '\nBoth active and reactive powers are increased\n        ', 1),
(17, 22, 'At parallel resonance, the circuit draws a current of 2mA. If the Q of the circuit is 100, then current through the capacitor is', '\n2mA\n        ', '\n1 mA\n        ', '\n200 mA\n        ', '\nNone\n        ', 3),
(17, 23, 'At parallel resonance,the circuit offers impedance equal to', '\nL/CR\n        ', '\nLC/R\n        ', '\nRL/C\n        ', '\nCR/L\n        ', 1),
(17, 24, 'At series resonance,', '\nCircuit impedance is very large\n        ', '\nCircuit power factor is minimum\n        ', '\nVoltage across L and C is zero\n        ', '\nCircuit power factor is unity\n        ', 4),
(17, 25, 'At very low frequencies a series RC circuit behaves as almost purely', '\nresistive\n        ', '\ninductive\n        ', '\ncapacitive\n        ', '\nnone\n        ', 3),
(17, 26, 'At ___ frequencies, the parallel RC circuit behaves as purely resistive.', '\nlow\n        ', '\nvery low\n        ', '\nhigh\n        ', '\nvery high\n        ', 4),
(17, 27, 'Domestic appliances are connected in parallel across ac mains because', '\nit is a simple arrangement\n        ', '\noperation of each appliance becomes independent of each other\n        ', '\nappliances have same current ratings\n        ', '\nthis arrangement occupies less space\n        ', 2),
(17, 28, 'Dynamic impedance of a parallel tuned circuit is', '\nL/CR\n        ', '\nRL/C\n        ', '\nL/C\n        ', '\nR/L\n        ', 1),
(17, 29, 'For a frequency of 200Hz, the time period will be', '\n0.05s\n        ', '\n0.005s\n        ', '\n0.0005s\n        ', '\n0.5s\n        ', 2),
(17, 30, 'For a sine wave with peak value I max, the rms value is', '\n0.5 Imax\n        ', '\n0.707 Imax\n        ', '\n0.9 Imax\n        ', '\n1.414 Imax\n        ', 2),
(17, 31, 'For the same peak value which of the following waves will have the highest rms valu?', '\nsquare wave\n        ', '\nhalf wave rectified sine wave\n        ', '\ntriangular wave\n        ', '\nsine wave\n        ', 1),
(17, 32, 'Form factor for a sine wave is', '\n1.414\n        ', '\n0.707\n        ', '\n1.11\n        ', '\n0.637\n        ', 3),
(17, 33, 'Form factor is the ratio of', '\naverage value to rms value\n        ', '\naverage value to peak value\n        ', '\nrms value to average value\n        ', '\nrms value to peak value\n        ', 3),
(17, 34, 'Higher the Q of a series circuit', '\nbroader its resonance curve\n        ', '\nnarrower its pass band\n        ', '\ngreater its bandwidth\n        ', '\nsharper its resonance\n        ', 2),
(17, 35, 'If a parallel resonant circuit is shunted by a resistance, then', '\ncircuit impedance is decreased\n        ', '\nQ of the circuit is increased\n        ', '\nThe gain of the circuit is increased\n        ', '\nNone\n        ', 1),
(17, 36, 'If an alternating current of 50 Hz is flowing in a circuit, the current becomes zero', '\n50 times\n        ', '\n25 times\n        ', '\n100 times\n        ', '\n200 times\n        ', 3),
(17, 37, 'If the admittance of a parallel ac circuit is increased, the circuit current', '\nremains constant\n        ', '\nis decreased\n        ', '\nis increased\n        ', '\nnone\n        ', 3),
(17, 38, 'If the resistance in the inductive branch of a parallel resonant circuit is increased, then', '\nthe circuit impedance is increased\n        ', '\nQ of the circuit is increased\n        ', '\nSelectivity of the circuit is increased\n        ', '\nImpedance of the circuit is decreased\n        ', 4),
(17, 39, 'Impedance of an AC circuit is a ', '\nScalar\n        ', '\nVector\n        ', '\nPhasor\n        ', '\nNone\n        ', 2),
(17, 40, 'In a circuit containing R,L,C power loss can take place in', '\nC only\n        ', '\nL only\n        ', '\nR only\n        ', '\nIn R,L,C\n        ', 3),
(17, 41, 'In a highly capacitive circuit the', '\napparent power is equal to actual power\n        ', '\nreactive power is more than the apparent power\n        ', '\nreactive power is more than actual power\n        ', '\nactual power is more than its reactive power\n        ', 3),
(17, 42, 'In a parallel ac circuit, if the supply frequency is less than the resonant frequency, then the circuit is', '\ninductive\n        ', '\ncapacitive\n        ', '\nresistive\n        ', '\nnone\n        ', 1),
(17, 43, 'In a parallel ac circuit, power loss is due to________', '\nconductance alone\n        ', '\nsusceptance alone\n        ', '\nboth conductance and susceptance\n        ', '\nnone\n        ', 1),
(17, 44, 'In a parallel RC circuit, the current always ________ the applied voltage.', '\nlags\n        ', '\nleads\n        ', '\nremains in phase with\n        ', '\nnone\n        ', 2),
(17, 45, 'In a power system, reactive power is necessary for', '\npower transmission\n        ', '\nstabilizing the voltage level\n        ', '\ncounteracting the effect of reactance in the transmission system\n        ', '\nnone\n        ', 3),
(17, 46, 'In a pure capacitive circuit if the supply frequency is reduced to ', '\nbe reduced to half\n        ', '\nbe doubled\n        ', '\nbe four times as high\n        ', '\nbe reduced to one fourth\n        ', 1),
(17, 47, 'In a pure inductive circuit', '\ncurrent is in phase with the voltage\n        ', '\ncurrent lags behind the voltage by 90 degrees\n        ', '\ncurrent leads voltage by 90 degrees\n        ', '\ncurrent can lead or lag voltage by 90\n        ', 2),
(17, 48, 'In a pure inductive circuit, if the suuply frequency is reduced to ', '\nbe reduced to half\n        ', '\nbe doubled\n        ', '\nbe four times as high\n        ', '\nbe reduced to one fourth\n        ', 2),
(17, 49, 'In a pure resistive circuit', '\ncurrent lags behind the voltage by 90 degrees\n        ', '\ncurrent leads voltage by 90 degrees\n        ', '\ncurrent can lead or lag voltage by 90\n        ', '\ncurrent is in phase with the voltage\n        ', 4),
(17, 50, 'In a purely inductive circuit', '\nactual power is zero\n        ', '\nreactive power is zero\n        ', '\napparent power is zero\n        ', '\nnone\n        ', 1),
(17, 51, 'In a series circuit at resonance, the impedance of the circuit is', '\nmaximum\n        ', '\nminimum\n        ', '\nzero\n        ', '\nnone\n        ', 1),
(17, 52, 'In a series resonant circuit the voltage across the circuit is the same as the coltage across', '\nL\n        ', '\nC\n        ', '\nR\n        ', '\nNone\n        ', 3),
(17, 53, 'In a series RLC circuit at resonance', '\ncurrent is maximum\n        ', '\ncurrent is minimum\n        ', '\nimpedance is maximum\n        ', '\nvoltage is maximum\n        ', 1),
(17, 54, 'In AC system, we generate sinewave because', '\nIt can be easily drawn\n        ', '\nIt produces least disturbance in electrical circuits\n        ', '\nIt is nature\n        ', '\nOther waves cannot be produced easily\n        ', 2),
(17, 55, 'In an ac circuit electrical energy is consumed in', '\nL\n        ', '\nC\n        ', '\nL and C\n        ', '\nR\n        ', 4),
(17, 56, 'In an ac circuit, power is dissipated in', '\nR only\n        ', '\nL only\n        ', '\nC only\n        ', '\nNone\n        ', 1),
(17, 57, 'In an R-L series circuit, the two sides of the impedance triangle that form the phase angle are', '\nR and XL\n        ', '\nR and Z\n        ', '\nZ and XL\n        ', '\nNone of these\n        ', 1),
(17, 58, 'In any ac circuit, always', '\napparent power is more than actual power\n        ', '\nreactive power is more than apparent power\n        ', '\nactual power is more than reactive power\n        ', '\nreactive power is more than actual power\n        ', 1),
(17, 59, 'In RLC series resonant circuit, magnitude of resonance frequency can be changed by changing the value of', '\nR only\n        ', '\nL only\n        ', '\nC only\n        ', '\nL or C\n        ', 4),
(17, 60, 'In series as well as parallel resonant circuits, increasing the value of resistance would lead to', '\ndecrease in bandwidth of both the circuits\n        ', '\nincrease in bandwidth of both the circuits\n        ', '\ndecrease in bandwidth in series circuit and increase in parallel circuit\n        ', '\nincrease in bandwidth in series circuit and decrease in parallel circuit\n        ', 3),
(17, 61, 'Magnitude of current at resonance in R-L-C circuit', '\ndepends upon the magnitude of R\n        ', '\ndepends upon the magnitude of L\n        ', '\ndepends upon the magnitude of C\n        ', '\ndepends upon the magnitude of R,L,C\n        ', 1),
(17, 62, 'Power absorbed in a purely inductive circuit is zero because', '\nReactive component of current is zero\n        ', '\nActive component of current is maximum\n        ', '\nPower factor of the circuit is zero\n        ', '\nReactive and active components of current cancel out\n        ', 3),
(17, 63, 'Power factor of electric bulb is', '\nzero\n        ', '\nlagging\n        ', '\nleading\n        ', '\nunity\n        ', 4),
(17, 64, 'Radio frequency choke is', '\nAir cored\n        ', '\nIron cored\n        ', '\nAir as well as iron cored\n        ', '\nNone of these\n        ', 1),
(17, 65, 'The ability of a resonant circuit to discriminate between one particular frequency and all others is called', '\nimpedance\n        ', '\nselectivity\n        ', '\nconductance\n        ', '\nrectification\n        ', 2),
(17, 66, 'The ac system is preferred to dc because', '\nAC voltages can be easily changed in magnitude\n        ', '\nDC motors do not have fine speed control\n        ', '\nHigh voltage ac transmission is less efficient\n        ', '\nDC voltage cannot be used for domestic appliances\n        ', 1),
(17, 67, 'The admittance of a circuit is (0.1 + j0.8)S. The circuit is', '\nresistive\n        ', '\nCapacitive\n        ', '\nInductive\n        ', '\nNone\n        ', 2),
(17, 68, 'The area of a sinusoidal wave over a half cycle is', '\nMax value / 2\n        ', '\n2 X max value\n        ', '\nMax value / 4\n        ', '\nMax value / 25\n        ', 2),
(17, 69, 'The average value of a sinusoidal current is 100A. Its rms value is', '\n63.7A\n        ', '\n70.7A\n        ', '\n141.4A\n        ', '\n111A\n        ', 4),
(17, 70, 'The capacitive reactance of a circuit is ', '\nndependent of\n        ', '\nInversely proportional to\n        ', '\nDirectly proportional to\n        ', '\nNone of these\n        ', 2),
(17, 71, 'The conductance and inductive susceptance of a circuit have the same magnitude. The power factor of the circuit is', '\n1\n        ', '\n0.5\n        ', '\n0.707\n        ', '\n0.866\n        ', 3),
(17, 72, 'The dynamic impedance of R-L and c parallel circuit at resonance is ____ ohm', '\nR/LC\n        ', '\nC/LR\n        ', '\nLC/R\n        ', '\nL/CR\n        ', 4),
(17, 73, 'The form factor of a ', '\nSinusoidal\n        ', '\nSquare\n        ', '\nRectangular\n        ', '\nTriangular\n        ', 2),
(17, 74, 'The form factor of a sinusoidal wave is ', '\n1.414\n        ', '\n1.11\n        ', '\n2\n        ', '\n1.5\n        ', 2),
(17, 75, 'The frequency of an alternating current is', '\nthe speed with which the alternator runs\n        ', '\nthe number of cycles generated in a minute\n        ', '\nthe number of waves passing through a point in one second\n        ', '\nthe number of electrons passing through a point in one second\n        ', 3),
(17, 76, 'The frequency of dc in India is', '\n50Hz\n        ', '\n30Hz\n        ', '\n60Hz\n        ', '\nZero\n        ', 4),
(17, 77, 'The impedance at parallel resonance is very large because', '\nR is very large\n        ', '\nRatio C/L is very large\n        ', '\nRatio L/C is very large\n        ', '\nNone\n        ', 3),
(17, 78, 'The inductive reactance of a circuit is ', '\nDirectly proportional to\n        ', '\nInversely proportional to\n        ', '\nIndependent of\n        ', '\nNone of these\n        ', 1),
(17, 79, 'The least number of I phase wattmeters required to measure total power consumed by an unbalanced load fed from a 3 phase, 4-wire system is', '\n1\n        ', '\n2\n        ', '\n3\n        ', '\n4\n        ', 3),
(17, 80, 'The peak value of a sine wave is 200V. Its average value is', '\n127.4V\n        ', '\n141.4V\n        ', '\n282.8V\n        ', '\n200V\n        ', 1),
(17, 81, 'The period of a sine wave is 1/50 seconds. Its frequency is', '\n20 Hz\n        ', '\n30 Hz\n        ', '\n40 Hz\n        ', '\n50 Hz\n        ', 4),
(17, 82, 'The phase difference between voltage and current wave through a circuit is 30 degrees. The essential condition is that', '\nboth waves have same frequency\n        ', '\nboth waves must have identical peak values\n        ', '\nboth waves must have zero value at same time\n        ', '\nnone\n        ', 1),
(17, 83, 'The power consumed in a circuit will be least when the phase difference between the current and voltage is', '\n180 degrees\n        ', '\n90 degrees\n        ', '\n60 degrees\n        ', '\n0 degrees\n        ', 2),
(17, 84, 'The power factor of a series RLC circuit at its half-power points is', '\nunity\n        ', '\nlagging\n        ', '\nleading\n        ', '\nlagging or leading\n        ', 4),
(17, 85, 'The purpose of choke in a fluorescent tube is', '\nTo decrease the current\n        ', '\nTo increase the current\n        ', '\nTo decrease the voltage momentarily\n        ', '\nTo increase the voltage momentarily\n        ', 4),
(17, 86, 'The Q factor of a coil is given by', '\nR/ XL\n        ', '\n1/ XL\n        ', '\n1/R\n        ', '\nXL/R\n        ', 4),
(17, 87, 'The Q factor of a parallel tuned circuit can be increased by', '\nincreasing circuit resistance\n        ', '\ndecreasing circuit resistance\n        ', '\ndecreasing inductance of the circuit\n        ', '\nnone\n        ', 2),
(17, 88, 'The quality factor of R-L-C circuit will increase if', '\nR increases\n        ', '\nR decreases\n        ', '\nImpedance increases\n        ', '\nVoltage increase\n        ', 2),
(17, 89, 'The ratio of active power to apparent power is known as _______ factor.', '\nDemand\n        ', '\nLoad\n        ', '\nPower\n        ', '\nForm\n        ', 3),
(17, 90, 'The ratio of the bandwidth to the resonance frequency is called the _____ of the circuit', '\nimpedance\n        ', '\nsusceptance\n        ', '\nquality factor\n        ', '\nselectivity\n        ', 4),
(17, 91, 'The rms value and the mean value is the same in case of', '\ntriangular wave\n        ', '\nsine wave\n        ', '\nsquare wave\n        ', '\nhalf wave rectified sine wave\n        ', 3),
(17, 92, 'The rms value of a sine wave is 100A. Its peak value is', '\n70.7A\n        ', '\n141.4 A\n        ', '\n150A\n        ', '\n282.8A\n        ', 2),
(17, 93, 'Two waves of the same frequency have opposite phase when the phase angle between them is', '\n360 degrees\n        ', '\n180 degrees\n        ', '\n90 degrees\n        ', '\n0 degrees\n        ', 2),
(17, 94, 'We have assigned a frequency of 50Hz to power system because it', '\nCan be easily obtained\n        ', '\nGives best result when used for operating both lights and machinery\n        ', '\nLeads to easy calculations\n        ', '\nNone\n        ', 2),
(17, 95, 'What is the peak to peak value for 120V ac?', '\n240V\n        ', '\n480V\n        ', '\n339V\n        ', '\n391V\n        ', 3),
(17, 96, 'When a parallel ac circuit contains a number of branches, then it is convenient to solve the circuit by', '\nphasor diagram\n        ', '\nphasor algebra\n        ', '\nequivalent impedance method\n        ', '\nnone\n        ', 2),
(17, 97, 'When an ac passes through an ohmic resistance the electrical power converted into heat is', '\napparent power\n        ', '\ntrue power\n        ', '\nreactive power\n        ', '\nno power\n        ', 2),
(17, 98, 'When supply frequency is less than the resonant frequency in a parallel ac circuit, then circuit is ', '\nResistive\n        ', '\nCapacitive\n        ', '\nInductive\n        ', '\nnone of these\n        ', 3),
(17, 99, 'When the supply frequency is more than the resonant frequency in a parallel ac circuit, then the circuit is', '\nResistive\n        ', '\nCapacitive\n        ', '\nInductive\n        ', '\nNone of these\n        ', 2),
(17, 100, 'Which of the following values of alternating voltage should an insulation absolutely withstand?', '\naverage value\n        ', '\nrms value\n        ', '\npeak value\n        ', '\nhalf the effective value\n        ', 3),
(18, 1, '<p class="MsoNormal">3gp stands for _____</p>', '\nAudio file\n        ', '\nVideo file\n        ', '\nMultimedia file\n        ', '\nGraphics file\n        ', 3),
(18, 2, '<p class="MsoNormal">A photographic film is called positive if it has _____</p>', '\npositive gamma\n        ', '\nnegative gamma\n        ', '\ninverse gamma\n        ', '\ngamma is greater than 1\n        ', 2),
(18, 3, '<p class=MsoNormal>Audio is _____</p>', '\n1D signal\n        ', '\n2D signal\n        ', '\n3D signal\n        ', '\n4D signal\n        ', 1),
(18, 4, '<p class=MsoNormal><span class=SpellE><span class=GramE>biSize</span></span> field in Bitmap Info Header of BMP file format specifies _____</p>', '\nsize of image\n        ', '\nsize of header\n        ', '\nSize of bit count\n        ', '\nsize of file\n        ', 2),
(18, 5, '<p class=MsoNormal>Bitmap File Header size of BMP file format is _____</p>', '\n12\n        ', '\n14\n        ', '\n16\n        ', '\n18\n        ', 2),
(18, 6, '<p class=MsoNormal>Bitmap Info Header size of BMP file format is _____</p>', '\n32\n        ', '\n36\n        ', '\n44\n        ', '\n48\n        ', 1),
(18, 7, '<p class=MsoNormal>BMP stands for _____</p>', '\nBit Mapped Image format\n        ', '\nBit Mapped File Format\n        ', '\nBit Mapped Graphics Format\n        ', '\nBit Mapped Portable Format\n        ', 2),
(18, 8, '<p class=MsoNormal>Color image cab be easily converted to grey image using one of following equations _____</p>', '\n0.30R+0.58G+0.11B\n        ', '\n0.30R+0.59G+0.11B\n        ', '\n0.30R+0.58G+0.12B\n        ', '\n0.30+0.059G+0.12B\n        ', 2),
(18, 9, '<p class=MsoNormal>Cones receptors in human eye are sensitive to _____</p>', '\nBright-Light- Answer\n        ', '\nRed, Green, Blue\n        ', '\nDim-Light\n        ', '\nBack &amp; White\n        ', 2),
(18, 10, '<p class="MsoNormal">ECG is _____</p>', '\n1D signal\n        ', '\n2D signal\n        ', '\n3D signal\n        ', '\n4D signal\n        ', 1),
(18, 11, '<p class=MsoNormal>For standard video the refresh rate for PAL standard is fixed at the value _____</p>', '\n24 images/second\n        ', '\n25 images/second\n        ', '\n28 images/second\n        ', '\n30 images/second\n        ', 2),
(18, 12, '<p class=MsoNormal>Header size of BMP file format is _____</p>', '\n1086\n        ', '\n1068\n        ', '\n1078\n        ', '\n1087\n        ', 3),
(18, 13, '<p class="MsoNormal"><span style="color: black;">How many shades of grey are there in a 6 bit image? _____<o:p></o:p></span></p>', '\n26\n        ', '\n256\n        ', '\n128\n        ', '\n64\n        ', 4),
(18, 14, '<p class=MsoNormal>III - Spectral (frequency) _____</p>', '\nI, and II\n        ', '\nI and III\n        ', '\nI, II, and III\n        ', '\nI only\n        ', 4),
(18, 15, '<p class=MsoNormal>Image is _____</p>', '\n1D signal\n        ', '\n2D signal\n        ', '\n3D signal\n        ', '\n4D signal\n        ', 2),
(18, 16, '<p class="MsoNormal"><span style="color: black;">Perceptual attributes of color are _____</span></p>', '\nRed, green, and blue\n        ', '\nCyan, magenta, and yellow\n        ', '\nBrightness, Hue and Saturation\n        ', '\nIndex, Hue, and Saturation\n        ', 3),
(18, 17, '<p class="MsoNormal"><span style="color: black;">Perceptual attributes of color are _____</span></p>', '\nRed, green, and blue\n        ', '\nCyan, magenta, and yellow\n        ', '\nBrightness, Hue and Saturation\n        ', '\nIndex, Hue, and Saturation\n        ', 3),
(18, 18, '<p class=MsoNormal><span class=SpellE><span class=GramE>pgm</span></span> file format is _____</p>', '\nportable grayscale bitmap graphics\n        ', '\nportable graphics bitmap\n        ', '\nportable page graphics bitmap\n        ', '\nportable group bitmap\n        ', 1),
(18, 19, '<p class="MsoNormal">Pixels stand for _____.</p>', '\nImage elements\n        ', '\nelements\n        ', '\nPicture elements\n        ', '\nPixel elements\n        ', 4),
(18, 20, '<p class="MsoNormal"><span class="SpellE"><span style="color: black;">Postretinal</span></span><span style="color: black;"> signal is also known as _____</span></p>', '\nLateral\n        ', '\nNeural\n        ', '\nConical\n        ', '\nRadial\n        ', 2),
(18, 21, '<p class=MsoNormal><span class=SpellE><span class=GramE>ppm</span></span> file format is _____</p>', '\nportable pixel bitmap graphics\n        ', '\nportable pixel map graphics\n        ', '\nportable page graphics bitmap\n        ', '\nportable page map graphics\n        ', 2),
(18, 22, '<p class=MsoNormal>RGBQUAD size of BMP file format is _____</p>', '\n256\n        ', '\n512\n        ', '\n1024\n        ', '\n1032\n        ', 2),
(18, 23, '<p class=MsoNormal>RIFF is _____</p>', '\nResource internet file format\n        ', '\nResource interactive file format\n        ', '\nResource inline file format\n        ', '\nResource Interchange File Format\n        ', 4),
(18, 24, '<p class=MsoNormal>Rods receptors in human eye are sensitive to _____</p>', '\nBright-Light\n        ', '\nRed, Green, Blue\n        ', '\nDim-Light\n        ', '\nBack &amp; White\n        ', 4),
(18, 25, '<p class=MsoNormal>Speech is _____</p>', '\n1D signal\n        ', '\n2D signal\n        ', '\n3D signal\n        ', '\n4D signal\n        ', 1),
(18, 26, '<p class=MsoNormal>The header size of a 24-bit BMP image is _____</p>', '\n40 Bytes\n        ', '\n54 Bytes\n        ', '\n64 Bytes\n        ', '\n24Bytes\n        ', 2),
(18, 27, '<p class="MsoNormal"><span lang="EN" style="font-family: times;">The optic nerve has approximately _____ neurons connecting to the brain<o:p></o:p></span></p>', '\n2500\n        ', '\n25000\n        ', '\n250000\n        ', '\n2500000\n        ', 3),
(18, 28, '<p class="MsoNormal"><span lang="EN" style="font-family: times;">The visible wavelength range is also called the _____<o:p></o:p></span></p>', '\nisotopic range\n        ', '\nphotopic range\n        ', '\nvisopic range\n        ', '\nmesopic range\n        ', 4),
(18, 29, '<p class="MsoNormal"><span lang="EN" style="font-family: times;">The wavelength for the green peaks is about _____<o:p></o:p></span></p>', '\n570-645 nm\n        ', '\n526-535 nm\n        ', '\n444-445 nm\n        ', '\n440-445 nm\n        ', 2),
(18, 30, '<p class="MsoNormal"><span lang="EN" style="font-family: times;">The wavelength for the red peak is about _____<o:p></o:p></span></p>', '\n444-445 nm\n        ', '\n570-645 nm\n        ', '\n526-535 nm\n        ', '\n440-445 nm\n        ', 2),
(18, 31, '<p class="MsoNormal">To prevent the appearance of visual flicker at refresh rates below 60 images, the display can be interlaced. The Standard interlace for video systems is _____</p>', '\n1:2\n        ', '\n1:4\n        ', '\n2:1\n        ', '\n4:1\n        ', 3),
(18, 32, '<p class=MsoNormal>Transmittance; T is defined as _____</p>', '\nintensity light passed/intensity light incident\n        ', '\nintensity light incident /intensity light passed\n        ', '\n1-(intensity light incident /intensity light passed)\n        ', '\n1-(intensity light passed/intensity light incident\n        ', 1),
(18, 33, '<p class="MsoNormal">Unit of intensity is _____</p>', '\nmS\n        ', '\nmI\n        ', '\nmT\n        ', '\nmL\n        ', 4),
(18, 34, '<p class=MsoNormal>Video is _____</p>', '\n1D signal\n        ', '\n2D signal\n        ', '\n3D signal\n        ', '\n4D signal\n        ', 3),
(18, 35, '<p class=MsoNormal>What is total size of the 24-bit color image having (4 heights) x (3 widths)? _____</p>', '\n66 Bytes\n        ', '\n90 Bytes\n        ', '\n70 Bytes\n        ', '\n36 Bytes\n        ', 2),
(18, 36, '<p class=MsoNormal>What is total size of the 8-bit grey scale image having (4 height) x (3 widths) dimension? _____</p>', '\n1090 Bytes\n        ', '\n1094 Bytes\n        ', '\n1087 Bytes\n        ', '\n1089 Bytes\n        ', 1),
(19, 1, 'A port address in TCP/IP is ______ bits long.', '\n32\n        ', '\n48\n        ', '\n16\n        ', '\nnone of the above\n        ', 3),
(19, 2, 'A television broadcast is an example of _______ transmission.', '\nsimplex\n        ', '\nhalf-duplex\n        ', '\nfull-duplex\n        ', '\nautomatic\n        ', 1),
(19, 3, 'A _______ connection provides a dedicated link between two devices.', '\npoint-to-point\n        ', '\nmultipoint\n        ', '\nprimary\n        ', '\nsecondary\n        ', 1),
(19, 4, 'An unauthorized user is a network _______ issue.', '\nPerformance\n        ', '\nReliability\n        ', '\nSecurity\n        ', '\nAll the above\n        ', 3),
(19, 5, 'As the data packet moves from the upper to the lower layers, headers are _______.', '\nAdded\n        ', '\nRemoved\n        ', '\nRearranged\n        ', '\nModified\n        ', 1),
(19, 6, 'Communication between a computer and a keyboard involves ______________ transmission.', '\nsimplex\n        ', '\nhalf-duplex\n        ', '\nfull-duplex\n        ', '\nautomatic\n        ', 1),
(19, 7, 'Ethernet uses a ______ physical address that is imprinted on the network interface card (NIC..', '\n32-bit\n        ', '\n64-bit\n        ', '\n6-byte\n        ', '\nnone of the above\n        ', 3),
(19, 8, 'Frequency of failure and network recovery time after a failure are measures of the _______ of a network.', '\nPerformance\n        ', '\nReliability\n        ', '\nSecurity\n        ', '\nFeasibility\n        ', 2),
(19, 9, 'ICMPv6 includes _______.', '\nIGMP\n        ', '\nARP\n        ', '\nRARP\n        ', '\na and b\n        ', 4),
(19, 10, 'In a _______ connection, more than two devices can share a single link.', '\npoint-to-point\n        ', '\nmultipoint\n        ', '\nprimary\n        ', '\nsecondary\n        ', 2),
(19, 11, 'In the original ARPANET, _______ were directly connected together.', '\nIMPs\n        ', '\nhost computers\n        ', '\nnetworks\n        ', '\nrouters\n        ', 1),
(19, 12, 'In the OSI model, as a data packet moves from the lower to the upper layers, headers are _______.', '\nadded\n        ', '\nremoved\n        ', '\nrearranged\n        ', '\nmodified\n        ', 2),
(19, 13, 'In the OSI model, encryption and decryption are functions of the ________ layer.', '\ntransport\n        ', '\nsession\n        ', '\npresentation\n        ', '\napplication\n        ', 3),
(19, 14, 'In _______ transmission, the channel capacity is shared by both communicating devices at all times.', '\nsimplex\n        ', '\nhalf-duplex\n        ', '\nfull-duplex\n        ', '\nhalf-simplex\n        ', 3),
(19, 15, 'IPv6 has _______ -bit addresses.', '\n32\n        ', '\n64\n        ', '\n128\n        ', '\nvariable\n        ', 3),
(19, 16, 'Mail services are available to network users through the _______ layer.', '\nData link\n        ', '\nPhysical\n        ', '\nTransport\n        ', '\nApplication\n        ', 4),
(19, 17, 'TCP/IP is a ______ hierarchical protocol suite developed ____ the OSI model.', '\nseven-layer; before\n        ', '\nfive-layer; before\n        ', '\nsix-layer; before\n        ', '\nfive-layer; after\n        ', 2),
(19, 18, 'The information to be communicated in a data communications system is the _______.', '\nMedium\n        ', '\nProtocol\n        ', '\nMessage\n        ', '\nTransmission\n        ', 3),
(19, 19, 'The Internetworking Protocol (IP. is a ________ protocol.', '\nreliable\n        ', '\nconnection-oriented\n        ', '\nboth a and b\n        ', '\nnone of the above\n        ', 4),
(19, 20, 'The OSI model consists of _______ layers.', '\nthree\n        ', '\nfive\n        ', '\nseven\n        ', '\neight\n        ', 3),
(19, 21, 'The physical layer is concerned with the movement of _______ over the physical medium.', '\nprograms\n        ', '\ndialogs\n        ', '\nprotocols\n        ', '\nbits\n        ', 4),
(19, 22, 'The process-to-process delivery of the entire message is the responsibility of the _______ layer.', '\nNetwork\n        ', '\nTransport\n        ', '\nApplication\n        ', '\nPhysical\n        ', 2),
(19, 23, 'The seven-layer _____ model provides guidelines for the development of universally compatible networking protocols.', '\nOSI\n        ', '\nISO\n        ', '\nIEEE\n        ', '\nnone of the above\n        ', 1),
(19, 24, 'The TCP/IP _______ layer is equivalent to the combined session, presentation, and application layers of the OSI model.', '\napplication\n        ', '\nnetwork\n        ', '\ndata link\n        ', '\nphysical\n        ', 1),
(19, 25, 'The ____ address uniquely defines a host on the Internet.', '\nphysical\n        ', '\nIP\n        ', '\nport\n        ', '\nspecific\n        ', 2),
(19, 26, 'The ____ created a model called the Open Systems Interconnection, which allows diverse systems to communicate.', '\nOSI\n        ', '\nISO\n        ', '\nIEEE\n        ', '\nnone of the above\n        ', 2),
(19, 27, 'The ______ layer adds a header to the packet coming from the upper layer that includes the logical addresses of the sender and receiver.', '\nphysical\n        ', '\ndata link\n        ', '\nnetwork\n        ', '\nnone of the above\n        ', 3),
(19, 28, 'The ______ layer establishes, maintains, and synchronizes the interactions between communicating devices.', '\ntransport\n        ', '\nnetwork\n        ', '\nsession\n        ', '\nphysical\n        ', 3),
(19, 29, 'The ______ layer is responsible for moving frames from one hop (node. to the next.', '\nphysical\n        ', '\ndata link\n        ', '\ntransport\n        ', '\nnone of the above\n        ', 2),
(19, 30, 'The ______ layer is responsible for the source-to-destination delivery of a packet across multiple network links.', '\ntransport\n        ', '\nnetwork\n        ', '\ndata link\n        ', '\nphysical\n        ', 2),
(19, 31, 'The _______ is the physical path over which a message travels.', '\nProtocol\n        ', '\nMedium\n        ', '\nSignal\n        ', '\nAll the above\n        ', 2),
(19, 32, 'The _______ layer changes bits into electromagnetic signals.', '\nPhysical\n        ', '\nData link\n        ', '\nTransport\n        ', '\nNone of the above\n        ', 1),
(19, 33, 'The _______ layer coordinates the functions required to transmit a bit stream over a physical medium.', '\ntransport\n        ', '\nnetwork\n        ', '\ndata link\n        ', '\nphysical\n        ', 4),
(19, 34, 'The _______ layer ensures interoperability between communicating devices through transformation of data into a mutually agreed upon format.', '\ntransport\n        ', '\nnetwork\n        ', '\ndata link\n        ', '\npresentation\n        ', 4),
(19, 35, 'The _______ layer is responsible for delivering data units from one station to the next without errors.', '\ntransport\n        ', '\nnetwork\n        ', '\ndata link\n        ', '\nphysical\n        ', 3),
(19, 36, 'The _______ layer is the layer closest to the transmission medium.', '\nPhysical\n        ', '\nData link\n        ', '\nNetwork\n        ', '\nTransport\n        ', 1),
(19, 37, 'The _______ layer lies between the network layer and the application layer.', '\nPhysical\n        ', '\nData link\n        ', '\nTransport\n        ', '\nNone of the above\n        ', 3),
(19, 38, 'The _______ layer links the network support layers and the user support layers.', '\ntransport\n        ', '\nnetwork\n        ', '\ndata link\n        ', '\nsession\n        ', 1),
(19, 39, 'The _______ model shows how the network functions of a computer ought to be organized.', '\nCCITT\n        ', '\nOSI\n        ', '\nISO\n        ', '\nANSI\n        ', 2),
(19, 40, 'The ________ address, also known as the link address, is the address of a node as defined by its LAN or WAN.', '\nport\n        ', '\nphysical\n        ', '\nlogical\n        ', '\nnone of the above\n        ', 2),
(19, 41, 'The ________ address, also known as the link address, is the address of a node as defined by its LAN or WAN.', '\nphysical\n        ', '\nIP\n        ', '\nport\n        ', '\nspecific\n        ', 1),
(19, 42, 'The ________ layer is responsible for the process-to-process delivery of the entire message.', '\ntransport\n        ', '\nnetwork\n        ', '\ndata link\n        ', '\nphysical\n        ', 1),
(19, 43, 'The _________ layer enables the users to access the network.', '\ntransport\n        ', '\napplication\n        ', '\ndata link\n        ', '\nphysical\n        ', 2),
(19, 44, 'The_____ address identifies a process on a host.', '\nphysical\n        ', '\nIP\n        ', '\nport\n        ', '\nspecific\n        ', 3),
(19, 45, 'The_________ layer is responsible for the delivery of a message from one process to another.', '\nphysical\n        ', '\ntransport\n        ', '\nnetwork\n        ', '\nnone of the above\n        ', 2),
(19, 46, 'This was the first network.', '\nCSNET\n        ', '\nNSFNET\n        ', '\nANSNET\n        ', '\nARPANET\n        ', 4),
(19, 47, 'To deliver a message to the correct application program running on a host, the _______ address must be consulted.', '\nport\n        ', '\nIP\n        ', '\nphysical\n        ', '\nnone of the above\n        ', 1),
(19, 48, 'When a host on network A sends a message to a host on network B, which address does the router look at?', '\nport\n        ', '\nlogical\n        ', '\nphysical\n        ', '\nnone of the above\n        ', 2),
(19, 49, 'Which of the following is an application layer service?', '\nRemote log-in\n        ', '\nFile transfer and access\n        ', '\nMail service\n        ', '\nAll the above\n        ', 4),
(19, 50, 'Which topology requires a central controller or hub?', '\nMesh\n        ', '\nStar\n        ', '\nBus\n        ', '\nRing\n        ', 2),
(19, 51, 'Which topology requires a multipoint connection?', '\nMesh\n        ', '\nStar\n        ', '\nBus\n        ', '\nRing\n        ', 3),
(19, 52, 'Why was the OSI model developed?', '\nManufacturers disliked the TCP/IP protocol suite.\n        ', '\nThe rate of data transfer was increasing exponentially\n        ', '\nStandards were needed to allow any two systems to communicate\n        ', '\nNone of the above\n        ', 3),
(19, 53, '_______ is a process-to-process protocol that adds only port addresses, checksum error control, and length information to the data from the upper layer.', '\nTCP\n        ', '\nUDP\n        ', '\nIP\n        ', '\nnone of the above\n        ', 2),
(19, 54, '__________ provides full transport layer services to applications.', '\nTCP\n        ', '\nUDP\n        ', '\nARP\n        ', '\nnone of the above\n        ', 1);

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

CREATE TABLE IF NOT EXISTS `review` (
  `username` varchar(16) NOT NULL,
  `rating` int(1) NOT NULL,
  `useful` varchar(3) NOT NULL,
  `pros` text NOT NULL,
  `cons` text NOT NULL,
  PRIMARY KEY (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `review`
--

INSERT INTO `review` (`username`, `rating`, `useful`, `pros`, `cons`) VALUES
('admin', 3, '', 'l', 'l');

-- --------------------------------------------------------

--
-- Table structure for table `score`
--

CREATE TABLE IF NOT EXISTS `score` (
  `username` varchar(16) NOT NULL,
  `t_id` int(4) NOT NULL,
  `score` int(4) NOT NULL,
  `correct` int(4) NOT NULL,
  `total` int(4) NOT NULL,
  `max_score` int(4) NOT NULL,
  `attempt` int(4) NOT NULL DEFAULT '0',
  `timesql` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `score`
--

INSERT INTO `score` (`username`, `t_id`, `score`, `correct`, `total`, `max_score`, `attempt`, `timesql`) VALUES
('archangel', 11, 5, 5, 22, 22, 1, '2013-09-22 16:38:16'),
('markford', 16, 1, 1, 4, 4, 1, '2013-09-22 12:22:16'),
('markford', 11, 15, 15, 22, 22, 1, '2013-09-24 12:22:25'),
('admin', 8, 3, 2, 3, 6, 12, '2013-10-06 16:54:55'),
('janew', 8, 0, 0, 3, 6, 1, '2013-10-03 14:41:22'),
('admin', 10, 2, 2, 10, 10, 1, '2013-09-22 16:13:17'),
('admin', 11, 16, 16, 21, 21, 1, '2013-10-04 16:19:21'),
('admin', 9, 3, 3, 3, 3, 1, '2013-10-05 13:29:21'),
('admin', 13, 12, 12, 15, 15, 1, '2013-10-05 16:18:21');

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE IF NOT EXISTS `staff` (
  `fname` varchar(15) NOT NULL,
  `lname` varchar(15) NOT NULL,
  `s_username` varchar(16) NOT NULL,
  `password` varchar(16) NOT NULL,
  `authorized` tinyint(1) NOT NULL DEFAULT '0',
  `type` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`fname`, `lname`, `s_username`, `password`, `authorized`, `type`) VALUES
('Stephen', 'Santhmayor', 'admin', 'admin', 1, 'super'),
('Mark', 'Ford', 'staff', 'staff', 1, 'manager'),
('Jane', 'Watson', 'janew', '12345', 1, 'manager');

-- --------------------------------------------------------

--
-- Table structure for table `test`
--

CREATE TABLE IF NOT EXISTS `test` (
  `id` int(4) NOT NULL,
  `domain` varchar(25) NOT NULL,
  `subject` varchar(30) NOT NULL,
  `t_name` varchar(30) NOT NULL,
  `t_time` int(3) NOT NULL,
  `t_desc` text NOT NULL,
  `assign` varchar(15) NOT NULL,
  `negative` int(1) NOT NULL DEFAULT '0',
  `correct` int(2) NOT NULL DEFAULT '1',
  `incorrect` int(2) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `test`
--

INSERT INTO `test` (`id`, `domain`, `subject`, `t_name`, `t_time`, `t_desc`, `assign`, `negative`, `correct`, `incorrect`) VALUES
(1, 'compit', 'Data Structures', 'Basics', 30, 'No Description found.', 'staff', 0, 1, 1),
(2, 'compit', 'Programming', 'Programming Basics', 45, 'No Description found.', 'staff', 0, 1, 1),
(3, 'extc', 'Basic Electronics', 'Test 1', 25, 'No Description found.', 'janew', 0, 1, 1),
(4, 'mech', 'Mechanical Engineering', 'Engineering Design', 35, 'No Description found.', '', 0, 1, 1),
(5, 'compit', 'Networking', 'Basics 1', 24, 'No Description found.', 'staff', 0, 1, 1),
(6, 'quant', 'Train Problem', 'Trains 1', 30, 'No Description found.', '', 0, 1, 1),
(7, 'compit', 'Networking', 'Basics 2', 30, 'No Description found.', 'staff', 0, 1, 1),
(8, 'logic', 'Logic Respresenation', 'Logical Tests ', 1, 'No Description found.', '', 1, 2, 1),
(9, 'verbal', 'Grammar', 'Grammar Test', 30, 'No Description found.', 'janew', 0, 1, 1),
(10, 'quant', 'Train Problem', 'Trains 2', 45, 'No Description found.', 'janew', 0, 1, 1),
(11, 'compit', 'Ecommerce', 'Ecomm Test', 45, 'Electronic commerce, commonly known as e-commerce or eCommerce, is a type of industry where the buying and selling of products or services is conducted over electronic systems such as the Internet and other computer networks. ', 'admin', 0, 1, 1),
(12, 'quant', 'Train Problem', 'Trains New', 30, 'No Description found.', '', 0, 1, 1),
(13, 'quant', 'Distances', 'Travel', 30, 'No Description found.', '', 0, 1, 1),
(14, 'quant', 'Pipes and Cisterns', 'Water Levels', 15, 'This tests comprises problems on water tanks. Questions may be based on water leakages &\npumps filling the tanks.', 'staff', 0, 1, 1),
(15, 'mech', 'Mechanical Engineering', 'Design Test 2', 30, 'No Description found.', '', 0, 1, 1),
(16, 'logic', 'Cause and Effect', 'C&E Test 1', 26, 'In each of the questions, two statements numbered I and II are given. There may be cause and effect relationship between the two statements. These two statements may be the effect of the same cause or independent causes. These statements may be independent causes without having any relationship.', 'janew', 0, 1, 1),
(17, 'extc', 'Basic Electronics', 'AC Circuits', 30, 'AC Circuits', '', 0, 1, 1),
(18, 'compit', 'DSIP', 'Image Processing', 30, 'Test on Image Processing', '', 0, 1, 1),
(19, 'compit', 'Networking', 'CN Chapter 1', 30, 'Computer Networks chapter 1', '', 0, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `fname` varchar(15) NOT NULL,
  `lname` varchar(15) NOT NULL,
  `email` varchar(45) NOT NULL,
  `class` varchar(8) NOT NULL,
  `branch` varchar(8) NOT NULL,
  `username` varchar(16) NOT NULL,
  `password` varchar(32) NOT NULL,
  `type` text NOT NULL,
  `mod1` tinyint(1) NOT NULL DEFAULT '0',
  `E` int(2) NOT NULL,
  `A` int(2) NOT NULL,
  `C` int(2) NOT NULL,
  `N` int(2) NOT NULL,
  `O` int(2) NOT NULL,
  `rr1` varchar(16) NOT NULL,
  `rr2` varchar(16) NOT NULL,
  `rr3` varchar(16) NOT NULL,
  `rr4` varchar(16) NOT NULL,
  `rr5` varchar(16) NOT NULL,
  `request` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`fname`, `lname`, `email`, `class`, `branch`, `username`, `password`, `type`, `mod1`, `E`, `A`, `C`, `N`, `O`, `rr1`, `rr2`, `rr3`, `rr4`, `rr5`, `request`) VALUES
('Satej', 'Sawant', 'satej_sawant@live.com', 'S.E', 'Computer', 's3cube', '', 'student', 1, 22, 30, 29, 24, 29, '', '', '', '', '', ''),
('RIshit', 'Parekh', 'rp11393@gmail.com', 'S.E', 'Computer', 'rp113', '', 'student', 1, 20, 21, 30, 32, 30, '', '', '', '', '', ''),
('KRISHNA', 'SINGH', 'kms1551@gmail.com', 'S.E', 'Computer', 'krishna', '', 'student', 1, 20, 19, 18, 17, 26, '', '', '', '', '', ''),
('suraj', 'yadav', 'surajy145@gmail.com', 'S.E', 'Computer', '211suraj2587', '', 'student', 1, 14, 28, 22, 17, 18, '', '', '', '', '', ''),
('Aaron', 'Pereira', 'aaronpereira047@gmail.com', 'S.E', 'Computer', '211aaron2621', '', 'student', 1, 13, 21, 14, 29, 26, '', '', '', '', '', ''),
('vanessa', 'pais', 'pais_vane@yahoo.co.in', 'S.E', 'Computer', 'vanessa', '', 'student', 1, 30, 32, 12, 15, 11, '', '', '', '', '', ''),
('sammy', 'daniel', 'sammy14@gmail.com', 'S.E', 'Computer', '211sammy2628', '', 'student', 1, 23, 27, 23, 22, 24, '', '', '', '', '', ''),
('gauri', 'datar', 'datar.gauri@gmail.com', 'S.E', 'Computer', '211gauri2596', '', 'student', 1, 19, 22, 23, 25, 23, '', '', '', '', '', ''),
('Kevin', 'Lewis', 'kl0756@gmail.com', 'S.E', 'Computer', '211kevin2613', '', 'student', 1, 24, 29, 14, 21, 31, '', '', '', '', '', ''),
('pritam', 'patil', 'pritamp77@gmail.com', 'S.E', 'Computer', 'pritamp77', '', 'student', 1, 19, 29, 29, 18, 29, '', '', '', '', '', ''),
('isaac', 'nadar', 'isaac7nadar@gmail.com', 'S.E', 'Computer', 'isaac7nadar', '', 'student', 1, 9, 20, 15, 19, 33, '', '', '', '', '', ''),
('Derick', 'Sequeira', 'dericksequeira3593@gmail.com', 'S.E', 'Computer', 'derick93', '', 'student', 1, 20, 27, 24, 19, 26, '', '', '', '', '', ''),
('Jerome', 'John', 'jeromejohn88@yahoo.com', 'S.E', 'Computer', 'Jerome', '', 'student', 1, 23, 23, 13, 25, 17, '', '', '', '', '', ''),
('PRIYANKA', 'SALIAN', 'priyya07@gmail.com', 'S.E', 'Computer', 'piyus', '', 'student', 1, 22, 26, 23, 15, 25, '', '', '', '', '', ''),
('Joel', 'George', 'joelgeorge46@gmail.com', 'S.E', 'Computer', '211joel2629', '', 'student', 1, 22, 29, 22, 18, 23, '', '', '', '', '', ''),
('Prashant', 'Sonawane', 'prashant.sonawane91@gmail.com', 'S.E', 'Computer', 'comp5', '', 'student', 1, 16, 24, 20, 20, 20, '', '', '', '', '', ''),
('Anush', 'shetty', 'shetty.anush94@gmail.com', 'S.E', 'Computer', '211anush2597', '', 'student', 1, 19, 22, 21, 19, 19, '', '', '', '', '', ''),
('noella', 'fernandes', 'noellafernandes51@yahoo.in', 'S.E', 'Computer', 'noella', '', 'student', 1, 31, 33, 13, 9, 31, '', '', '', '', '', ''),
('Navnita', 'Singh', 'navnitae047891@gmail.com', 'S.E', 'Computer', 'navnita09', '', 'student', 1, 26, 27, 22, 16, 25, '', '', '', '', '', ''),
('chrisyl', 'd''souza', 'chrisyldsouza@yahoo.com', 'S.E', 'Computer', '211chrisyl2642', '', 'student', 1, 15, 26, 22, 10, 28, '', '', '', '', '', ''),
('Larsen', 'Rodrigues', 'larsenrodrigues25@yahoo.com', 'S.E', 'Computer', 'lar7n', '', 'student', 1, 21, 25, 18, 10, 20, '', '', '', '', '', ''),
('Ravikumar', 'Chaurasiya', 'ravichaurasiya215@gmail.com', 'S.E', 'Computer', 'comp3', '', 'student', 1, 17, 24, 29, 19, 20, '', '', '', '', '', ''),
('Ansie ', 'Jacob', 'ansie.jacob@yahoo.com', 'S.E', 'Computer', 'ansiealinajj', '', 'student', 1, 21, 22, 19, 23, 22, '', '', '', '', '', ''),
('Srushti', 'Upadhyay', 'srushtiupadhyay@gmail.com', 'S.E', 'Computer', 'srushtiu', '', 'student', 1, 13, 20, 23, 22, 19, '', '', '', '', '', ''),
('Abhishek', 'Pandey', 'abhishek.18.ap@gmail.com', 'S.E', 'Computer', 'Abhi18', '', 'student', 1, 23, 29, 30, 24, 28, '', '', '', '', '', ''),
('christina', 'jose', 'christinajose1993@gmail.com', 'S.E', 'Computer', 'christina', '', 'student', 1, 22, 26, 25, 21, 21, '', '', '', '', '', ''),
('Keshav', 'Pawaskar', 'keshavpawaskar149@gmail.com', 'S.E', 'Computer', '211pawaskar', '', 'student', 1, 21, 28, 27, 21, 28, '', '', '', '', '', ''),
('Neelam', 'Thapa', 'neelam108thapa@gmail.com', 'S.E', 'Computer', 'neelam123ibm', '', 'student', 1, 29, 37, 33, 31, 30, '', '', '', '', '', ''),
('ruhika', 'fernandes', 'geradjoel@gmail.com', 'S.E', 'Computer', 'ruhika', '', 'student', 1, 17, 21, 19, 21, 20, '', '', '', '', '', ''),
('vijay', 'yadav', 'vy5953@gmail.com', 'S.E', 'Computer', 'vijay_yadav', '', 'student', 1, 25, 24, 27, 23, 26, '', '', '', '', '', ''),
('pamela', 'mathias', 'pammiemathias@gmail.com', 'S.E', 'Computer', 'pamela', '', 'student', 1, 26, 30, 30, 21, 22, '', '', '', '', '', ''),
('justin', 'philip', 'philip.justin@yahoo.com', 'S.E', 'Computer', 'justinphilip', '', 'student', 1, 17, 31, 32, 23, 29, '', '', '', '', '', ''),
('pallavi', 'patil', 'pallavi.patil430@gmail.com', 'S.E', 'Computer', 'comp2', '', 'student', 1, 28, 28, 22, 22, 22, '', '', '', '', '', ''),
('jonita', 'fernandes', 'jonitaolivia1993@gmail.com', 'S.E', 'Computer', 'jonita', '', 'student', 1, 25, 26, 19, 26, 22, '', '', '', '', '', ''),
('zenia', 'gomes', 'zengomes93@hotmail.com', 'S.E', 'Computer', 'zenia', '', 'student', 1, 32, 27, 19, 9, 32, '', '', '', '', '', ''),
('ROWEENA', 'ALVA', 'roweena16@gmail.com', 'S.E', 'Computer', 'roweena', '', 'student', 1, 20, 32, 37, 20, 26, '', '', '', '', '', ''),
('Gauri', 'Kulkarni', 'gauri.ck08@gmail.com', 'S.E', 'Computer', '211gauri2608', '', 'student', 1, 20, 27, 33, 20, 20, '', '', '', '', '', ''),
('Divyadev', 'Pillai', 'pillai.divyadev1@gmail.com', 'S.E', 'Computer', 'divyadev', '', 'student', 1, 26, 33, 32, 20, 29, '', '', '', '', '', ''),
('KELLY', 'CORREIA', 'kellycorreia94@yahoo.com', 'S.E', 'Computer', 'kelly', '', 'student', 1, 26, 28, 25, 14, 20, '', '', '', '', '', ''),
('Lionel', 'M', 'lionelm84@yahoo.in', 'S.E', 'Computer', 'lionelm84', '', 'student', 1, 9, 30, 25, 17, 29, '', '', '', '', '', ''),
('cecilia', 'padayachi', 'c_ceciliap@yahoo.com', 'S.E', 'Computer', 'cecilia', '', 'student', 1, 22, 24, 18, 20, 19, '', '', '', '', '', ''),
('Annlisa', 'Joseph', 'annlisajoseph@gmail.com', 'S.E', 'Computer', 'annlisa', '', 'student', 0, 0, 0, 0, 0, 0, '', '', '', '', '', ''),
('Jason', 'Ryan', 'jason@ymail.com', 'S.E', 'I.T.', 'jason', '', 'student', 0, 0, 0, 0, 0, 0, '', '', '', '', '', ''),
('John ', 'Doe', 'john@doe.com', 'F.E', 'Computer', 'johndoe', '25d55ad283aa400af464c76d713c07ad', 'student', 1, 18, 20, 19, 20, 18, 'markford', 'robert', 'larry', 'rahul', 'admin', ''),
('Mark', 'Ford', 'mark14@yahoo.com', 'T.E', 'Computer', 'markford', '4635c2ccd41c93273eeba73d5635e94b', 'student', 1, 21, 17, 17, 17, 19, 'larry', 'robert', 'rahul', 'admin', 'janew', ''),
('Robert ', 'Angier', 'rob.ang@gmail.com', 'T.E', 'Computer', 'robert', '243e61e9410a9f577d2d662c67025ee9', 'student', 1, 16, 25, 26, 16, 12, 'rahul', 'markford', 'larry', 'admin', 'larry', ''),
('Larry', 'Thomas', 'larry@live.com', 'T.E', 'Computer', 'larry', '243e61e9410a9f577d2d662c67025ee9', 'student', 1, 16, 33, 37, 30, 35, 'janew', 'robert', 'rahul', 'admin', 'markford', ''),
('Rahul', 'Sharma', 'rahil.cool@gmail.com', 'T.E', 'Computer', 'rahul', '243e61e9410a9f577d2d662c67025ee9', 'student', 0, 0, 0, 0, 0, 0, 'markford', 'robert', 'larry', 'admin', 'janew', ''),
('Jane', 'Watson', 'jane12@ymail.com', 'T.E', 'MECH', 'janew', '243e61e9410a9f577d2d662c67025ee9', 'student', 1, 20, 35, 38, 30, 28, 'admin', 'markford', 'robert', 'larry', 'rahul', ''),
('Stephen', 'Santhmayor', 'santhmayor.stephen@gmail.com', 'B.E', 'Computer', 'admin', 'ce1b0e08c79bcd4b4593197fe733f084', 'staff', 1, 17, 19, 19, 17, 19, '', '', '', '', '', ''),
('Steve', 'Dias', 'stevedias@rocketmail.com', 'F.E', 'I.T.', 'steve dias', '8897970096666b635abb8e3a57a385d5', 'student', 1, 28, 31, 26, 27, 21, 'sijo reji ', 'kevin25_john', 'Abhijit_:D', 'leoltc', 'joygomes16', ''),
('Brian', 'Fernando', 'brianaxf@gmail.com', 'F.E', 'I.T.', 'brianaxf', 'ddf5fc56e535cd42d8cd449a6945a4ab', 'student', 1, 16, 32, 25, 20, 32, 'Ash.xane', 'ROYDEN', 'Avron', 'joygomes16', 'teny01', ''),
('Alisha', 'Cheyaden', 'alishashine12@gmail.com', 'F.E', 'Computer', 'Alisha12', 'c336d03baca3ec3ecbd26a059e72f3d3', 'student', 1, 22, 17, 22, 10, 31, 'Elton', 'flazerf', 'Tejaswini.k', 'calida', 'nigel', ''),
('elton bapt', 'almeida', 'l10.blmda@gmail.com', 'F.E', 'MECH', 'Elton', '5126355e07259913f32dc22507ba253e', 'student', 1, 19, 19, 11, 19, 27, 'prinson311', 'neil francis', 'Alisha12', 'nelson', 'calida', ''),
('ernest rob', 'desouza', 'death_ray8@yahoo.com', 'F.E', 'I.T.', 'ernest8', '07c951b96a98243a16cf878da663f44e', 'student', 1, 25, 25, 28, 21, 32, 'Christopher', 'roshelle96', '$$darius03$$', 'casanova@ron', 'keith', ''),
('roshell', 'creado', 'roshellecreado@yahoo.in', 'F.E', 'EXTC', 'roshelle96', 'e0f01cb4fbc8a87b67bf91d07bffb946', 'student', 1, 30, 22, 22, 30, 29, 'Alisha12', 'Elton', 'flazerf', 'calida', 'ernest8', ''),
('ROYDEN', 'CRUZ', 'cruzroyden@yahoo.com', 'F.E', 'EXTC', 'ROYDEN', '01b91c20bc1cb14d91bef0062ee7b3fc', 'student', 1, 25, 37, 19, 15, 27, 'Avron', 'Ash.xane', 'gorden2g', 'brianaxf', 'nitz19', ''),
('Joswin', 'Pinto', 'pinto_joswin@rediffmail.com', 'F.E', 'I.T.', 'Josdgr8', '17f273c551e9bfa9d3ce3826e67a3d54', 'student', 1, 24, 20, 10, 30, 15, 'genie', 'roshelle96', 'Ash.xane', 'Sueanne25', 'calida', ''),
('SIJO', 'REJIGEORGE', 'sijorejigeorge@gmail.com', 'F.E', 'Computer', 'sijo reji ', '6fb42da0e32e07b61c9f0251fe627a9c', 'student', 1, 29, 28, 33, 28, 26, 'leoltc', 'steve dias', 'erina', 'calvin009', 'Shinu', ''),
('Tejaswini', 'Koilakuntl', 'k.trivani@yahoo.in', 'F.E', 'Computer', 'Tejaswini.k', '1ed7c53668068c4573a3bd21a64afa7f', 'student', 1, 17, 26, 29, 29, 31, '', '', '', '', '', ''),
('Flazer', 'Fernandes', 'flazerf@gmail.com', 'F.E', 'EXTC', 'flazerf', '0eeadcbb7c6834dda3bf3d894b6d804c', 'student', 1, 19, 27, 17, 28, 25, 'Sueanne25', 'Alisha12', 'keith', 'roshelle96', 'preema6', ''),
('llewellyn', 'fernandes', 'llewellyn95@gmail.com', 'F.E', 'I.T.', 'llewellyn31', 'cc9a266a64aaf24b953fc7ec0462b034', 'student', 1, 22, 29, 32, 33, 32, 'ernest8', 'nickydcruz07', 'rex95', 'keegan369', 'calvin009', ''),
('Leo', 'Thomson', 'leothomsonltc@gmail.com', 'F.E', 'I.T.', 'leoltc', 'e3935ab08e38ef361d951e964aa8ae12', 'student', 1, 11, 23, 30, 24, 22, 'sijo reji ', 'nigel', 'erina', 'calvin009', 'Shinu', ''),
('ROCIA', 'FERNANDES', 'rocia.fernandes@gmail.com', 'F.E', 'I.T.', 'SCAELA', 'ac7e1a630ab418bdbd02749b2171ee60', 'student', 1, 33, 26, 16, 8, 30, 'genie', 'Elaine', 'ernest8', 'leory', 'Shaun', ''),
('kevin', 'john', 'kevin25_john@yahoo.co.in', 'F.E', 'I.T.', 'kevin25_john', '83b174d5cde78d94303bacf764dda30a', 'student', 1, 24, 28, 7, 25, 23, 'Elaine', 'Sueanne25', 'keith', 'prinson311', 'nelson', ''),
('Ashwin', 'Fernandes', 'ashphoenix16@hotmail.com', 'F.E', 'I.T.', 'Ash.xane', 'f2ee5189d17cd9684e623b095ae81e79', 'student', 1, 28, 25, 18, 28, 29, 'brianaxf', 'Avron', 'roshelle96', 'Josdgr8', 'keith', ''),
('calida', 'pereira', 'calida@gmail.com', 'F.E', 'I.T.', 'calida', 'fe41e9053fc18422ce222c158af9d79d', 'student', 1, 9, 30, 23, 27, 29, 'Alisha12', 'Elton', 'roshelle96', 'keith', 'Josdgr8', ''),
('Genevieve', 'Xalxo', 'genevievexal@hotmail.com', 'F.E', 'I.T.', 'genie', '7b7557998adcc0883eeb815106f5b9a9', 'student', 1, 14, 17, 18, 28, 15, 'Elaine', 'Sueanne25', 'SCAELA', 'erina', 'preema6', ''),
('Elaine', 'D''mello', 'dmelloelaine95@gmail.com', 'F.E', 'I.T.', 'Elaine', 'aa079a47c94040e67fe380df9e66c497', 'student', 1, 22, 29, 18, 27, 27, 'Josdgr8', 'rohanjoseph', 'Reema', 'casanova@ron', 'SCAELA', ''),
('Sueanne', 'Alphonso', 'alphonso.sueanne@yahoo.in', 'F.E', 'I.T.', 'Sueanne25', 'bf94d723d1b6d813b7d0e3410b8783c6', 'student', 1, 16, 27, 25, 18, 22, 'preema6', 'llewellyn31', 'Josdgr8', 'SCAELA', 'Elaine', ''),
('Abhijit', 'Anjanaveli', 'abhijitanjanavelil@outlook.com', 'F.E', 'I.T.', 'Abhijit_:D', 'd6f3b3deadf4d73cd64efc0abfbedf29', 'student', 1, 24, 29, 23, 17, 30, 'steve dias', 'joygomes16', 'kevin25_john', 'sijo reji ', 'Christopher', ''),
('Avron', 'Stephen', 'avron.stephen7@gmail.com', 'F.E', 'EXTC', 'Avron', '61aa07723f42c15d0bc36b59ff0e765d', 'student', 1, 21, 27, 28, 17, 23, 'rohanjoseph', 'nelson', 'Ash.xane', 'prinson', 'ROYDEN', ''),
('Calvin', 'D''Souza', 'calvinwolfman@yahoo.com', 'F.E', 'EXTC', 'calvin009', 'a8cdd4f9ce6b0b3a1f18842fe173e985', 'student', 1, 27, 26, 21, 28, 28, 'ernest8', 'Josdgr8', 'flazerf', 'llewellyn31', 'keegan369', ''),
('Preema', 'Rodrigues', 'premzr22@gmail.com', 'F.E', 'I.T.', 'preema6', '87f776b5a210bd8a53cfd7460560b033', 'student', 1, 21, 22, 20, 9, 23, 'Sueanne25', 'flazerf', 'Reema', 'prinson', 'erina', ''),
('Shaun', 'Mendes', 'Shaun290129012901@hotmail.com', 'F.E', 'EXTC', 'Shaun', '41fe950f692a4eb43aedf06cd8d350af', 'student', 1, 14, 25, 15, 22, 22, 'SCAELA', 'calvin009', 'benaldrin96', 'casanova@ron', 'roshelle96', ''),
('Christophe', 'Carvalho', 'christophercarvalho1996@rediff', 'F.E', 'Computer', 'Christopher', 'f32f177ae76b00e07c963ad9a7632450', 'student', 1, 15, 26, 18, 12, 22, 'ernest8', 'Abhijit_:D', 'calvin009', 'keith', 'rex95', ''),
('Nicky', 'Dcruz', 'nickydcruz07@yahoo.co.in', 'F.E', 'I.T.', 'nickydcruz07', '3c99997fbb9bc3eb28d9669260f285f6', 'student', 1, 8, 21, 10, 24, 26, 'ernest8', 'keegan369', 'rex95', 'olesh29lewis', 'nigel', ''),
('Gorden', 'Gonsalves', 'gorden2g@yahoo.co.in', 'F.E', 'MECH', 'gorden2g', '909256a56bb03a3424fee297537a5731', 'student', 1, 28, 18, 28, 25, 28, 'nitz19', 'ROYDEN', 'Alisha12', 'kevin25_john', 'Avron', ''),
('LEORIOUS', 'VARGHESE', 'leorykallarakkal@gmail.com', 'F.E', 'EXTC', 'leory', 'f71908d7e86505a8df80d1d006104bff', 'student', 1, 15, 26, 36, 17, 27, 'SCAELA', 'sweety12', 'teny01', 'OLIVIA1996', 'Elaine', ''),
('Keith Mich', 'Fernandes', 'keithmichaelfernandes@gmail.co', 'F.E', 'EXTC', 'keith', '4362be5d239c8a27fecf1a7b4834d7a9', 'student', 1, 27, 28, 15, 20, 29, 'roshelle96', 'calida', 'Ash.xane', 'Shaun', 'flazerf', ''),
('nelson', 'morris', 'nelsonmorris.nm@gmail.com', 'F.E', 'I.T.', 'nelson', '063571376b10e1a17b9e0f7d51140605', 'student', 1, 32, 30, 11, 17, 30, 'Avron', 'Reema', 'rohanjoseph', 'Alisha12', 'OLIVIA1996', ''),
('Rexon', 'Santhmayor', 'santhmayor.rexon@gmail.com', 'F.E', 'EXTC', 'rex95', 'e7a25845f82b259f2f7f2c518b59d725', 'student', 1, 23, 26, 24, 18, 25, 'ROYDEN', 'llewellyn31', 'calvin009', 'rohanjoseph', 'Avron', ''),
('Rohan', 'Joseph', 'rohanshaju@yahoo.co.in', 'F.E', 'I.T.', 'rohanjoseph', '06f8c82a14e918cae6add219192ba9e7', 'student', 1, 25, 27, 17, 20, 26, 'joeldsouza', 'Reema', 'Avron', 'renita25', 'SCAELA', ''),
('Keegan', 'Mooken', 'keeganmooken@gmail.com', 'F.E', 'EXTC', 'keegan369', '97a212b85719165b0c7057251e0483d1', 'student', 1, 19, 11, 30, 15, 32, 'llewellyn31', 'ernest8', 'Christopher', '$$darius03$$', 'Josdgr8', ''),
('Olesh', 'Lewis', 'oleshlewis@yahoo.in', 'F.E', 'EXTC', 'olesh29lewis', 'cf96c61924cd0a631cf29443b186e50b', 'student', 1, 13, 25, 26, 17, 25, 'benaldrin96', 'Shaun', 'nickydcruz07', 'prinson311', 'flazerf', ''),
('Agzeliya', 'Aleander', 'alexanderagzeliya@gmail.com', 'F.E', 'EXTC', 'Agzeliya', '2d9231da577812bf57072e546bc5bf00', 'student', 1, 15, 26, 31, 8, 21, 'Shinu', 'Jovanna', 'Tejaswini.k', 'OLIVIA1996', 'martina', ''),
('nigel', 'd''sa', 'nigeldsa@yahoo.in', 'F.E', 'MECH', 'nigel', 'e7f7be1401c746d9a020dda2acefc475', 'student', 1, 24, 27, 16, 17, 17, 'Elaine', 'llewellyn31', 'Shaun', 'nickydcruz07', 'joygomes16', ''),
('Renita', 'Rodrigues', 'renita95@yahoo.com', 'F.E', 'Computer', 'renita25', '78c08c10b39333214ca515534fde0790', 'student', 1, 23, 29, 31, 16, 21, 'sweety12', 'Reema', 'preema6', 'calida', 'rohanjoseph', ''),
('Ronald', 'Fernandes', 'super06101995@gmail.com', 'F.E', 'Computer', 'casanova@ron', 'f81c5db3daf135184520a19bca189d8f', 'student', 1, 27, 29, 8, 15, 28, 'keith', 'ernest8', 'Josdgr8', 'Shaun', '$$darius03$$', ''),
('Nitin ', 'John ', 'nitinjohn69@gmail.com', 'F.E', 'EXTC', 'nitz19', '27cd6a41533cd2816b3d6b09c6c3d1fb', 'student', 1, 26, 22, 29, 29, 28, 'joygomes16', 'prinson', 'rex95', 'gorden2g', 'nigel', ''),
('Joy', 'Gomes', 'gomesjoy16@ymail.com', 'F.E', 'Computer', 'joygomes16', '7788e4f72515268d8012f2ea96a3d4c7', 'student', 1, 19, 25, 13, 12, 25, 'erina', 'sijo reji ', 'lijo4991', 'Sueanne25', 'martina', ''),
('Darius', 'Stallone', 'werlyn891@gmail.com', 'F.E', 'EXTC', '$$darius03$$', 'a91958ebd75fb5b8cde9850985a3b927', 'student', 1, 17, 23, 38, 31, 39, 'keith', 'joeldsouza', 'Josdgr8', 'ernest8', 'casanova@ron', ''),
('ben', 'aldrin', 'benaldrin96@gmail.com', 'F.E', 'EXTC', 'ben aldrin', '3e7b0cb789b3cba843a445a79fb94013', 'student', 0, 0, 0, 0, 0, 0, '', '', '', '', '', ''),
('SWEETY', 'PAZHAY', 'sweetydavis12@gmail.com', 'F.E', 'I.T.', 'sweety12', '4eb6ef5873aef9b30df67e9840325789', 'student', 1, 16, 27, 30, 18, 25, 'teny01', 'OLIVIA1996', 'leory', 'renita25', 'Agzeliya', ''),
('TENY MARIY', 'KUTHIRAKKA', 'teny.mariya@gmail.com', 'F.E', 'I.T.', 'teny01', 'ca4ab23719deace9d51ea74a3a714ed7', 'student', 1, 22, 27, 17, 25, 18, 'sweety12', 'OLIVIA1996', 'leory', 'renita25', 'Elaine', ''),
('neil', 'chakramakk', 'neil.francis05@gmail.com', 'F.E', 'Computer', 'neil francis', '7ff5c96a10a8c94d641fe6bedd058ab4', 'student', 1, 19, 29, 12, 28, 16, 'nelson', 'Elton', 'nitz19', 'prinson311', 'joeldsouza', ''),
('Prinson', 'Philip', 'prinson311@gmail.com', 'F.E', 'EXTC', 'prinson', '451fb006ddaed33e06dca45ec2d0ad83', 'student', 0, 0, 0, 0, 0, 0, '', '', '', '', '', ''),
('Joel', 'Dsouza', 'nasatitan@hotmail.com', 'F.E', 'I.T.', 'joeldsouza', 'd53eb44da41c42ffbb884b2efa8a9bb8', 'student', 1, 23, 15, 15, 23, 15, 'rohanjoseph', 'nelson', 'ernest8', 'benaldrin96', 'neil francis', ''),
('Jovanna', 'Cyril', 'jovannacyril@gmail.com', 'F.E', 'EXTC', 'Jovanna', '45b50787f20dd296e100f7e26ba01662', 'student', 1, 33, 33, 23, 25, 24, 'Agzeliya', 'Shinu', 'erina', 'martina', 'lijo4991', ''),
('Shinu', 'Raju', 'shinuraju7@gmail.com', 'F.E', 'I.T.', 'Shinu', '333c2a5061b1f7019edaf3c27a0b3276', 'student', 1, 15, 29, 28, 23, 23, 'erina', 'martina', 'Agzeliya', 'Jovanna', 'leoltc', ''),
('OLIVIA', 'JOY', 'poliviajoy@gmail.com', 'F.E', 'I.T.', 'OLIVIA1996', '73374493f1b864525f2978c71a4acdde', 'student', 1, 18, 27, 20, 21, 24, 'sweety12', 'teny01', 'leory', 'renita25', 'Agzeliya', ''),
('Prinson', 'Philip', 'prinson311@gmail.com', 'F.E', 'EXTC', 'prinson311', '451fb006ddaed33e06dca45ec2d0ad83', 'student', 1, 18, 30, 25, 18, 23, 'Elton', 'Avron', 'rex95', 'llewellyn31', 'nelson', ''),
('Erina', 'Dsoza', 'erinadsouza12@gmail.com', 'F.E', 'I.T.', 'erina', 'aabd4def34bdcd6f71ad97888413d0eb', 'student', 1, 21, 31, 18, 28, 30, 'martina', 'Shinu', 'Jovanna', 'joygomes16', 'sijo reji ', ''),
('ben', 'aldrin', 'benaldrin96@gmail.com', 'F.E', 'EXTC', 'benaldrin96', '3e7b0cb789b3cba843a445a79fb94013', 'student', 1, 17, 25, 20, 26, 18, 'Avron', 'Shaun', 'olesh29lewis', 'joeldsouza', 'rohanjoseph', ''),
('martina', 'george', 'martinageorgev@gmail.com', 'F.E', 'EXTC', 'martina', 'fa0e0687aff13627eb5c011d4da5e4e5', 'student', 1, 19, 31, 19, 24, 25, 'erina', 'Shinu', 'Jovanna', 'sijo reji ', 'leoltc', ''),
('Reema ', 'Rodrigues', 'reemarodrigues1811@gmail.com', 'F.E', 'EXTC', 'Reema', '5a7edca0f1fd8a86b264c086a81f5c24', 'student', 1, 26, 25, 24, 17, 23, 'genie', 'Avron', 'rohanjoseph', 'nelson', 'joeldsouza', ''),
('lijo', 'jacob', 'lijo.jacob4991@gmail.com', 'F.E', 'EXTC', 'lijo4991', '61618896411fe35f8da7b2a471281348', 'student', 1, 31, 36, 18, 37, 25, 'leoltc', 'Jovanna', 'erina', 'Shinu', 'martina', ''),
('ASLIN', 'XAVIER', 'aslinxavier1995@yahoo.com', 'F.E', 'Computer', 'aslin', '15cb9427d8ba083bfe25a0814c67c547', 'student', 1, 10, 22, 32, 23, 20, 'OLIVIA1996', 'Agzeliya', 'Shinu', 'martina', 'Jovanna', ''),
('lucita', 'dcruz', 'lucitadcruz@gmail.com', 'F.E', 'EXTC', 'lucita77', 'a2e3c5a03e4d8d298d9d6a12897254d3', 'student', 1, 15, 23, 9, 21, 23, 'calida', 'roshelle96', 'Elton', 'wincy', 'keith', ''),
('wincy', 'willi', 'princywilli@ymail.com', 'F.E', 'Computer', 'wincy', '5636fc5d7920ed9cf968f7823b6e626c', 'student', 0, 0, 0, 0, 0, 0, 'lucita77', 'Alisha12', 'Elton', 'calida', 'roshelle96', ''),
('Arch', 'Angel', 'santhmayor.stephen@gmail.com', 'S.E', 'Computer', 'archangel', '25d55ad283aa400af464c76d713c07ad', 'staff', 0, 0, 0, 0, 0, 0, '', '', '', '', '', ''),
('Steve', 'Balmer', 'steve@rockstar.com', 'Other', 'Other', 'S_balmer', '25d55ad283aa400af464c76d713c07ad', 'Staff', 0, 0, 0, 0, 0, 0, '', '', '', '', '', ''),
('', '', '', '', '', '', 'd41d8cd98f00b204e9800998ecf8427e', '', 0, 0, 0, 0, 0, 0, '', '', '', '', '', ''),
('Roshan', 'Raj', 'raj123@gmail.com', 'Other', 'Other', 'roshan_raj', '25d55ad283aa400af464c76d713c07ad', 'parent', 1, 12, 13, 35, 28, 26, '', '', '', '', '', '');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
