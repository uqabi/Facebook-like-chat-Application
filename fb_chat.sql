-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 18, 2016 at 03:31 PM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `fb_chat`
--

-- --------------------------------------------------------

--
-- Table structure for table `chat`
--

CREATE TABLE IF NOT EXISTS `chat` (
  `chat_id` int(8) NOT NULL AUTO_INCREMENT,
  `user_id` int(8) NOT NULL,
  `message` text NOT NULL,
  `message_id` int(55) NOT NULL,
  `sent_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`chat_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=522 ;

--
-- Dumping data for table `chat`
--

INSERT INTO `chat` (`chat_id`, `user_id`, `message`, `message_id`, `sent_on`) VALUES
(503, 35, 'kamrana da ta jor ko', 11, '2016-05-29 18:13:22'),
(504, 11, 'aa g da ma jor ko', 35, '2016-05-29 18:13:36'),
(505, 35, 'hi', 36, '2016-05-29 18:16:41'),
(506, 12, 'salam', 36, '2016-05-29 18:33:47'),
(507, 12, 'how are you devotion', 36, '2016-05-29 18:33:56'),
(508, 35, 'sa hal day janab', 11, '2016-05-29 19:53:01'),
(509, 11, 'salam bro', 36, '2016-05-30 11:04:54'),
(510, 11, 'check it out', 36, '2016-05-30 11:04:59'),
(511, 11, 'my app', 36, '2016-05-30 11:05:02'),
(512, 11, 'i have made some improvments', 36, '2016-05-30 11:05:13'),
(513, 11, 'check out auto scroll on new message arrival ', 36, '2016-05-30 11:05:42'),
(514, 11, 'also check out the speed', 36, '2016-05-30 11:05:54'),
(515, 11, 'it is like facebook in some regards', 36, '2016-05-30 11:06:53'),
(516, 11, 'specially chat box', 36, '2016-05-30 11:07:02'),
(517, 11, 'you can close minimize ', 36, '2016-05-30 11:07:13'),
(518, 11, 'and chat with other person', 36, '2016-05-30 11:07:25'),
(519, 11, 'this chat box is a private chat box no else would be able to see your messages', 36, '2016-05-30 11:07:59'),
(520, 11, 'but there is one issue', 36, '2016-05-30 11:08:20'),
(521, 11, 'i want to discuss with you', 36, '2016-05-30 11:08:27');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(40) NOT NULL,
  `email` varchar(40) NOT NULL,
  `pass` varchar(33) NOT NULL,
  `status` tinyint(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=64 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `pass`, `status`) VALUES
(11, 'kamran', 'kami.uqabi@gmail.com', 'shahsahab123', 1),
(35, 'Arif', 'arifhussain33@yahoo.com', 'arifhussain', 0),
(36, 'devotion', 'arifhussain.33@yahoo.com', 'asdf1234', 0),
(50, 'Muzamil', 'muzamil@yahoo.com', 'asdf123', 0),
(51, 'John Deo', 'john@yahoo.com', 'asdf123', 0),
(52, 'Kevin Scoglund', 'kevin@yahoo.com', 'asdf123', 0),
(53, 'Jeffery way', 'Jeffery@yahoo.com', 'asdf123', 0),
(54, 'Brad hussey', 'brad@yahoo.com', 'asdf123', 0),
(55, 'Jane white', 'jane@yahoo.com', 'asdf123', 0),
(56, 'Jane black', 'black@yahoo.com', 'asdf123', 0),
(57, 'Lynda', 'lynda@gmail.com', 'asdf123', 0),
(58, 'Katrina', 'katrina@gmail.com', 'asdf123', 0),
(59, 'muzoo', 'muzoo@gmail.com', 'asdf123', 0),
(60, 'Miqdadi', 'miqdad@gmail.com', 'asdf123', 0),
(61, 'Zaki sahab', 'zaki@gmail.com', 'asdf123', 0),
(62, 'Mary', 'mary@gmail.com', 'asdf123', 0),
(63, 'Leohu', 'leo@gmail.com', 'asdf123', 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
