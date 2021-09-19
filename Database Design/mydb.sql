-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 19, 2021 at 05:08 PM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mydb`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `user_delete_lists` (IN `in_id` INT)  BEGIN
    
	DELETE FROM follow
    WHERE list_id IN (SELECT id FROM list WHERE user_id = in_id );
    
    DELETE FROM list_items
    WHERE list_id IN (SELECT id FROM list WHERE user_id = in_id );
    
    DELETE FROM list
    WHERE user_id = in_id;
    
	END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `user_delete_reviews` (IN `id` INT)  BEGIN
	DELETE FROM review 
	WHERE review.user_id = id;
	END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `deletedshowz`
--

CREATE TABLE `deletedshowz` (
  `id` int(11) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `about` text DEFAULT NULL,
  `image` text DEFAULT NULL,
  `release_date` date DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL ON UPDATE current_timestamp(),
  `imdb_textfield` text DEFAULT NULL,
  `type` smallint(6) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `episodes`
--

CREATE TABLE `episodes` (
  `id` int(11) NOT NULL,
  `num` mediumint(9) DEFAULT NULL,
  `season_id` int(11) DEFAULT NULL,
  `title` tinytext DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `episodes`
--

INSERT INTO `episodes` (`id`, `num`, `season_id`, `title`) VALUES
(3, 1, 3, 'Episode 1'),
(4, 2, 3, 'Episode 2'),
(5, 3, 3, 'Episode 3'),
(6, 4, 3, 'Episode 4'),
(28, 6, 3, 'Episode 6'),
(30, 5, 3, 'Episode 5'),
(38, 1, 24, ' The End\'s Beginning'),
(39, 2, 24, ' Four Marks'),
(40, 3, 24, ' Betrayer Moon'),
(41, 4, 24, ' Of Banquets, Bastards and Burials'),
(42, 5, 24, ' Bottled Appetites'),
(43, 6, 24, ' Rare Species'),
(44, 7, 24, ' Before a Fall'),
(46, 8, 24, 'Much More');

-- --------------------------------------------------------

--
-- Table structure for table `follow`
--

CREATE TABLE `follow` (
  `list_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `follow`
--

INSERT INTO `follow` (`list_id`, `user_id`) VALUES
(7, 1),
(9, 2);

-- --------------------------------------------------------

--
-- Table structure for table `list`
--

CREATE TABLE `list` (
  `id` int(11) NOT NULL,
  `title` varchar(30) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `list`
--

INSERT INTO `list` (`id`, `title`, `user_id`) VALUES
(7, 'Sarwar2\'s second list', 2),
(9, 'My list', 1);

-- --------------------------------------------------------

--
-- Table structure for table `list_items`
--

CREATE TABLE `list_items` (
  `list_id` int(11) NOT NULL,
  `show_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `list_items`
--

INSERT INTO `list_items` (`list_id`, `show_id`) VALUES
(7, 3),
(9, 3),
(7, 18);

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

CREATE TABLE `review` (
  `id` int(11) NOT NULL,
  `text` text DEFAULT NULL,
  `score` tinyint(4) DEFAULT NULL,
  `show_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `review`
--

INSERT INTO `review` (`id`, `text`, `score`, `show_id`, `user_id`, `created_at`, `updated_at`) VALUES
(43, 'Terrible show', 2, 3, 2, '2021-09-13 20:12:26', '2021-09-13 20:12:36'),
(45, 'Amazing!!!', 10, 2, 2, '2021-09-13 22:11:48', '2021-09-19 21:07:14'),
(47, 'Its alright', 7, 2, 1, '2021-09-18 16:43:39', '2021-09-18 16:43:50'),
(48, 'Good', 8, 3, 1, '2021-09-19 20:16:39', '2021-09-19 20:16:39'),
(49, 'Awesome show!', 9, 18, 1, '2021-09-19 20:42:30', '2021-09-19 20:42:30');

-- --------------------------------------------------------

--
-- Table structure for table `seasons`
--

CREATE TABLE `seasons` (
  `id` int(11) NOT NULL,
  `title` varchar(50) DEFAULT NULL,
  `num` smallint(6) DEFAULT NULL,
  `show_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `seasons`
--

INSERT INTO `seasons` (`id`, `title`, `num`, `show_id`) VALUES
(3, 'Season 1', 1, 2),
(24, 'Season 1', 1, 3),
(25, 'Season 2', 2, 2);

-- --------------------------------------------------------

--
-- Table structure for table `showz`
--

CREATE TABLE `showz` (
  `id` int(11) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `about` text DEFAULT NULL,
  `image` text DEFAULT NULL,
  `release_date` date DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL ON UPDATE current_timestamp(),
  `imdb_textfield` text DEFAULT NULL,
  `type` smallint(6) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `showz`
--

INSERT INTO `showz` (`id`, `name`, `about`, `image`, `release_date`, `created_at`, `updated_at`, `imdb_textfield`, `type`) VALUES
(2, 'Code Geass', 'Japan has been invaded and conquered by the Britannian Empire. Japan is now known as Area 11 and its citizens known as Elevens. The Britannian Empire takes away Japan\'s autonomous power and imposes its rule through the use of Knightmares. The Empire\'s rule has never faltered, but cracks have begun to show...', 'images/show-21631460266168img1.jpg', '2006-10-06', '2021-09-11 21:35:49', '2021-09-19 20:43:48', '31724', 1),
(3, 'The Witcher', 'Geralt of Rivia, a mutated monster-hunter for hire, journeys toward his destiny in a turbulent world where people often prove more wicked than beasts.', 'images/show-31631542939441witcher_poster.jpg', '2019-12-20', '2021-09-11 21:35:49', '2021-09-19 20:44:06', '71912', 1),
(18, 'Breaking Bad', 'When Walter White, a New Mexico chemistry teacher, is diagnosed with Stage III cancer and given a prognosis of only two years left to live. He becomes filled with a sense of fearlessness and an unrelenting desire to secure his family\'s financial future at any cost as he enters the dangerous world of drugs and crime.', 'images/show-181632061320165breaking_bad.jpg', '2008-01-20', '2021-09-13 19:57:32', '2021-09-19 20:43:22', '1396', 1);

--
-- Triggers `showz`
--
DELIMITER $$
CREATE TRIGGER `show_delete` AFTER DELETE ON `showz` FOR EACH ROW BEGIN
	INSERT INTO deletedshowz(name,about,image,release_date,created_at,updated_at,imdb_textfield,type)
    VALUES(OLD.name,OLD.about,OLD.image,OLD.release_date,OLD.created_at,OLD.updated_at,OLD.imdb_textfield,OLD.type);	
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

CREATE TABLE `tags` (
  `id` int(11) NOT NULL,
  `show_id` int(11) DEFAULT NULL,
  `tag` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tags`
--

INSERT INTO `tags` (`id`, `show_id`, `tag`) VALUES
(26, 18, 'Drama'),
(27, 2, 'Action'),
(28, 2, 'Adventure'),
(29, 2, 'Animation'),
(30, 2, 'Drama'),
(31, 2, 'SciFi'),
(32, 2, 'Fantasy'),
(33, 3, 'ScFi'),
(34, 3, 'Fantasy'),
(35, 3, 'Darama'),
(36, 3, 'Action'),
(37, 3, 'Adventure');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `type` int(11) DEFAULT 0,
  `name` tinytext DEFAULT NULL,
  `about` text DEFAULT NULL,
  `handle` tinytext NOT NULL,
  `password` tinytext DEFAULT NULL,
  `image` text DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `email` tinytext DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `type`, `name`, `about`, `handle`, `password`, `image`, `created_at`, `email`) VALUES
(1, 1, 'sarwar', 'This is my profile', 'sarwar450', '3627909a29c31381a071ec27f7c9ca97726182aed29a7ddd2e54353322cfb30abb9e3a6df2ac2c20fe23436311d678564d0c8d305930575f60e2d3d048184d79', 'images/sarwar4501631548815723show-216313345288553NeCJKhyQwDamEZM5hHzrZ-1200-80.jpg', '2021-09-11 20:17:24', 'sarwar@gmail.com'),
(2, 0, 'sarwar_2', 'This is sarwar_2\'s about info.', 'sarwar2', '3627909a29c31381a071ec27f7c9ca97726182aed29a7ddd2e54353322cfb30abb9e3a6df2ac2c20fe23436311d678564d0c8d305930575f60e2d3d048184d79', 'images/sarwar21632062894093unnamed.jpg', '2021-09-12 03:37:07', 'sarwar2@gmail.com'),
(9, 1, 'admin', NULL, 'admin', 'b109f3bbbc244eb82441917ed06d618b9008dd09b3befd1b5e07394c706a8bb980b1d7785e5976ec049b46df5f1326af5a2ea6d103fd07c95385ffab0cacbc86', NULL, '2021-09-19 20:37:08', 'admin@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `deletedshowz`
--
ALTER TABLE `deletedshowz`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `episodes`
--
ALTER TABLE `episodes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `season_id` (`season_id`);

--
-- Indexes for table `follow`
--
ALTER TABLE `follow`
  ADD PRIMARY KEY (`list_id`,`user_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `list`
--
ALTER TABLE `list`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `list_items`
--
ALTER TABLE `list_items`
  ADD PRIMARY KEY (`show_id`,`list_id`),
  ADD KEY `list_id` (`list_id`);

--
-- Indexes for table `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `show_id` (`show_id`);

--
-- Indexes for table `seasons`
--
ALTER TABLE `seasons`
  ADD PRIMARY KEY (`id`),
  ADD KEY `show_id` (`show_id`);

--
-- Indexes for table `showz`
--
ALTER TABLE `showz`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`id`),
  ADD KEY `show_id` (`show_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `handle` (`handle`) USING HASH;

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `deletedshowz`
--
ALTER TABLE `deletedshowz`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `episodes`
--
ALTER TABLE `episodes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `list`
--
ALTER TABLE `list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `review`
--
ALTER TABLE `review`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `seasons`
--
ALTER TABLE `seasons`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `showz`
--
ALTER TABLE `showz`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `tags`
--
ALTER TABLE `tags`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `episodes`
--
ALTER TABLE `episodes`
  ADD CONSTRAINT `episodes_ibfk_1` FOREIGN KEY (`season_id`) REFERENCES `seasons` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `follow`
--
ALTER TABLE `follow`
  ADD CONSTRAINT `follow_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `follow_ibfk_2` FOREIGN KEY (`list_id`) REFERENCES `list` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `list`
--
ALTER TABLE `list`
  ADD CONSTRAINT `list_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `list_items`
--
ALTER TABLE `list_items`
  ADD CONSTRAINT `list_items_ibfk_1` FOREIGN KEY (`list_id`) REFERENCES `list` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `list_items_ibfk_2` FOREIGN KEY (`show_id`) REFERENCES `showz` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `review`
--
ALTER TABLE `review`
  ADD CONSTRAINT `review_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `review_ibfk_2` FOREIGN KEY (`show_id`) REFERENCES `showz` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `seasons`
--
ALTER TABLE `seasons`
  ADD CONSTRAINT `seasons_ibfk_1` FOREIGN KEY (`show_id`) REFERENCES `showz` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tags`
--
ALTER TABLE `tags`
  ADD CONSTRAINT `tags_ibfk_1` FOREIGN KEY (`show_id`) REFERENCES `showz` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
