-- phpMyAdmin SQL Dump
-- version 4.5.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 06, 2016 at 05:51 AM
-- Server version: 5.7.11
-- PHP Version: 5.6.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lr`
--

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE `groups` (
  `id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `permissions` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`id`, `name`, `permissions`) VALUES
(1, 'Standard user ', ''),
(2, 'Administrator', '{"admin": 1}');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(64) NOT NULL,
  `salt` varchar(32) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `joined` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `group` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `salt`, `name`, `joined`, `group`) VALUES
(8, 'harun', 'db28cb3bd3fc30df9e6b1a6141e8fff5555117d9bc533995292a78ce7ed59be1', 'Á¶Ë¯"«6˜«zJÅH©¯z[*‡kG”¨Ñ\0', 'Harun R', '2016-11-05 11:28:58', 1),
(6, 'aleah', '66ddd1cee775a4d1e0a35df6e0d0be20ec3cc50ca4dc7d66b29aef3c18978006', 'ïÚ}ÚªŒ²e[ŸØU¾”®ˆ©:~lœÎ¾ù{l"ƒ', 'Aleah', '2016-11-05 11:22:20', 1),
(7, 'alhley', '72d2e9cc888fb4ce41ebc365c2af72de712cbf07701bbc839543055d921c3fbb', '0µAâ¾Uc[{·kNHdÁÛB3dJg5ßxâw¯:“', 'Alhely', '2016-11-05 11:27:28', 1),
(9, 'shiba', 'b92d3a75429d418054473d77ff4d6f5fcb7f7dea773a3850690bfd53b179bb62', '{;œrRh]\ra0$“DÇ€Ã¤)yÎÏûŒöÎt', 'Shiba', '2016-11-05 11:40:46', 1),
(10, 'willy', '4784393c0305e54b171dcfe0e7bf7805ff7e8f9d5d43f6ae6cfbb3fc530a5d59', 'yp9¿#˜±\0´h*`3ÄQâRØÇoª~‰>8ý®!\r', 'Willy', '2016-11-05 11:48:32', 1),
(11, 'billy', 'e783238a1196af8a8da5819ad41facb3eecaf5bdb0c0ac63e109e6abfd99a6e8', '¶C£êCôu\rÅøBÆD‰°A\ZCoqvwßNˆú', 'Billy', '2016-11-05 11:49:45', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users_session`
--

CREATE TABLE `users_session` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `hash` varchar(64) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users_session`
--

INSERT INTO `users_session` (`id`, `user_id`, `hash`) VALUES
(6, 8, '441ee6641e9ab3a4dc6a0602a9d0edc79277c0dd2b7a1ad2d068f6ea4fa501b5');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users_session`
--
ALTER TABLE `users_session`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `groups`
--
ALTER TABLE `groups`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `users_session`
--
ALTER TABLE `users_session`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
