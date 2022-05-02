-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 02, 2022 at 05:25 PM
-- Server version: 5.7.24
-- PHP Version: 8.0.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `capstone_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `games`
--

CREATE TABLE `games` (
  `id` bigint(20) NOT NULL,
  `gameid` bigint(20) NOT NULL,
  `title` varchar(30) NOT NULL,
  `description` text NOT NULL,
  `posts` int(11) NOT NULL,
  `cover_img` text NOT NULL,
  `url_address` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `games`
--

INSERT INTO `games` (`id`, `gameid`, `title`, `description`, `posts`, `cover_img`, `url_address`) VALUES
(1, 7894512, 'Destiny 2', 'Dive into the world of Destiny 2 to explore the mysteries of the solar system and experience responsive first-person shooter combat. Unlock powerful elemental abilities and collect unique gear to customize your Guardian\'s look and playstyle. Enjoy Destiny 2’s cinematic story, challenging co-op missions, and a variety of PvP modes alone or with friends. Download for free today and write your legend in the stars.', 0, 'Images/Destiny_2_(artwork).jpg', 'destiny2'),
(2, 49812, 'Valorant', 'Blend your style and experience on a global, competitive stage. You have 13 rounds to attack and defend your side using sharp gunplay and tactical abilities. And, with one life per-round, you\'ll need to think faster than your opponent if you want to survive. Take on foes across Competitive and Unranked modes as well as Deathmatch and Spike Rush.', 0, 'Images/MV5BNmNhM2NjMTgtNmIyZC00ZmVjLTk4YWItZmZjNGY2NThiNDhkXkEyXkFqcGdeQXVyODU4MDU1NjU@._V1_.jpg', 'valorant'),
(3, 7897514132, 'League of Legends', 'League of Legends is a team-based strategy game where two teams of five powerful champions face off to destroy the other’s base. Choose from over 140 champions to make epic plays, secure kills, and take down towers as you battle your way to victory.', 0, 'Images/300px-League_of_Legends_-_cover.jpg', 'league_of_legends'),
(4, 7548903275, 'Sea of Thieves', 'SEA OF THIEVES IS YOUR GATEWAY TO THE PIRATE LIFE YOU’VE ALWAYS DREAMED OF, SERVING UP ENDLESS OPPORTUNITIES FOR ADVENTURE, EXCITEMENT AND DISCOVERY IN A VAST WORLD WHERE THE SEAS ARE HOME TO CREWS OF OTHER PLAYERS. EVERYTHING YOU NEED TO SET SAIL IS ALREADY AT YOUR FINGERTIPS, SO YOU’RE FREE TO CHART YOUR OWN PATH ACROSS THE WAVES. ENJOY THRILLING STORIES, DANGEROUS SEA CREATURES AND HAULS OF HIDDEN TREASURE THAT HELP SHAPE YOUR OWN UNIQUE PIRATE LEGEND.', 0, 'Images/3c866ef7-6a3b-40a7-9c28-1661d41aba35.jpg', 'sea_of_thieves'),
(5, 21934875, 'Minecraft', 'Prepare for an adventure of limitless possibilities as you build, mine, battle mobs, and explore the ever-changing Minecraft landscape.', 0, 'Images/Minecraft_cover.png', 'minecraft'),
(6, 5743891205, 'Fortnite', 'Fortnite is a free-to-play Battle Royale game with numerous game modes for every type of game player. Watch a concert, build an island or fight.', 0, 'Images/fortnite---button-1520296499714.jpg', 'fortnite'),
(7, 78934217, 'Dead By Daylight', 'Dead by Daylight is a survival horror asymmetric multiplayer online game released for Microsoft Windows and Steam in June 2016, PlayStation 4 and Xbox One in June 2017, Nintendo Switch in September 2019, iOS and Android in April 2020, Stadia in October 2020, and PlayStation 5 and Xbox Series X/S in November 2020', 0, 'Images/dead-by-daylight-codes.jpg', 'dead_by_daylight'),
(8, 91473, 'Final Fantasy XIV', 'Final Fantasy XIV is a massively multiplayer online role-playing game developed and published by Square Enix', 0, 'Images/ff14online-1638841900910.png', 'final_fantasy_xiv');

-- --------------------------------------------------------

--
-- Table structure for table `interested`
--

CREATE TABLE `interested` (
  `id` bigint(20) NOT NULL,
  `postid` bigint(20) NOT NULL,
  `interested` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `interested`
--

INSERT INTO `interested` (`id`, `postid`, `interested`) VALUES
(6, 4974131204144, '[]');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` bigint(20) NOT NULL,
  `postid` bigint(20) NOT NULL,
  `userid` bigint(20) NOT NULL,
  `gameid` bigint(20) NOT NULL,
  `needed` int(11) NOT NULL,
  `description` text NOT NULL,
  `interested` int(11) NOT NULL DEFAULT '0',
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `postid`, `userid`, `gameid`, `needed`, `description`, `interested`, `date`) VALUES
(1, 51152, 279906369, 1234, 1, 'Test', 0, '2022-04-28 21:51:10'),
(3, 70639008159030, 279906369, 1234, 6, 'This is a third test post', 0, '2022-04-28 22:27:32'),
(5, 86110, 279906369, 1234, 69, 'fifth post', 0, '2022-04-28 22:29:11'),
(7, 9101714856069195348, 279906369, 1234, 6, 'New Test post', 0, '2022-04-28 23:11:30'),
(8, 7429630403898851, 279906369, 7894512, 1, 'test', 0, '2022-04-29 04:39:35'),
(9, 3283126, 510328690432129, 7894512, 7, 'This is a test post', 0, '2022-04-29 04:55:43'),
(11, 211554247617677635, 279906369, 7894512, 6, 'Raid', 0, '2022-04-29 05:54:26'),
(12, 43434548394, 9691562938165428, 49812, 3, 'I love valorant so much', 0, '2022-04-29 11:04:18'),
(13, 4974131204144, 9691562938165428, 49812, 5, 'What a swell game!', 0, '2022-04-29 12:20:23'),
(14, 283168, 43916, 7894512, 3, 'Please help me, I\'m stuck at Shuro Chi!', 0, '2022-04-29 11:05:11'),
(17, 6166206280799, 279906369, 91473, 4, 'Test Final Fantasy Post', 0, '2022-04-29 12:16:02');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) NOT NULL,
  `userid` bigint(20) DEFAULT NULL,
  `first_name` varchar(20) NOT NULL,
  `last_name` varchar(20) NOT NULL,
  `username` varchar(100) NOT NULL,
  `xbox_name` varchar(100) DEFAULT NULL,
  `playstation_name` varchar(100) DEFAULT NULL,
  `steam_name` varchar(100) DEFAULT NULL,
  `gamestyle` varchar(11) NOT NULL,
  `password` varchar(64) NOT NULL,
  `url_address` varchar(100) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `prof_img` varchar(500) NOT NULL DEFAULT 'uploads/360_F_346839683_6nAPzbhpSkIpb8pmAwufkC7c5eD7wYws.jpg',
  `description` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `userid`, `first_name`, `last_name`, `username`, `xbox_name`, `playstation_name`, `steam_name`, `gamestyle`, `password`, `url_address`, `date`, `prof_img`, `description`) VALUES
(3, 279906369, 'Zach', 'Shoop', 'Ardrasais', 'Ardrasais', 'Ardrasais', 'Shlurmff', 'Competitive', 'password', 'ardrasais279906369', '2022-04-27 23:04:09', 'uploads/picture-smiling-handsome-businessman-office-260nw-265383200.webp', 'This is crazy'),
(4, 510328690432129, 'Jake', 'Kissler', 'Superjake', 'Superjake8888', 'Superjake8888', 'Goku', 'Competitive', 'password', 'superjake510328690432129', '2022-04-27 23:36:09', 'uploads/head-shot-portrait-social-networks-dating-application-profile-picture-attractive-young-happy-indian-arabic-mixed-race-woman-203598050.jpg', 'hi im jake'),
(15, 9691562938165428, 'test', 'test', 'test', 'test', 'test', 'test', 'Competitive', 'test', 'test9691562938165428', '2022-04-29 07:21:24', 'uploads/depositphotos_19841901-stock-photo-asian-young-business-man-close.jpg', 'test'),
(16, 43916, 'The Man', 'The Myth', 'Legend', 'TheLegend', 'ProGamer', 'na', 'Competitive', 'password', 'legend43916', '2022-04-29 07:25:46', 'uploads/picture-smiling-handsome-businessman-office-260nw-265383200.webp', 'I am the Legend27'),
(17, 621109021865421, 'Kevin', 'Foley', 'Spleegie', 'Spleegie', 'na', 'Spleegie', 'Competitive', 'password', 'spleegie621109021865421', '2022-04-29 12:24:18', 'uploads/istockphoto-1300972574-170667a.jpg', 'Hi! I am Kevin!');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `games`
--
ALTER TABLE `games`
  ADD PRIMARY KEY (`id`),
  ADD KEY `gameid` (`gameid`),
  ADD KEY `title` (`title`),
  ADD KEY `posts` (`posts`),
  ADD KEY `url_address` (`url_address`);

--
-- Indexes for table `interested`
--
ALTER TABLE `interested`
  ADD PRIMARY KEY (`id`),
  ADD KEY `postid` (`postid`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `postid` (`postid`),
  ADD KEY `userid` (`userid`),
  ADD KEY `gameid` (`gameid`),
  ADD KEY `interested` (`interested`),
  ADD KEY `date` (`date`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `userid` (`userid`),
  ADD KEY `first_name` (`first_name`),
  ADD KEY `last_name` (`last_name`),
  ADD KEY `url_address` (`url_address`),
  ADD KEY `date` (`date`),
  ADD KEY `xbox_name` (`xbox_name`),
  ADD KEY `playstation_name` (`playstation_name`),
  ADD KEY `steam_name` (`steam_name`),
  ADD KEY `gamestyle` (`gamestyle`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `games`
--
ALTER TABLE `games`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `interested`
--
ALTER TABLE `interested`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
