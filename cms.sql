-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 02, 2018 at 03:45 PM
-- Server version: 10.1.22-MariaDB
-- PHP Version: 7.1.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cms`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `cat_id` int(10) NOT NULL,
  `cat_title` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`cat_id`, `cat_title`) VALUES
(2, 'Monument'),
(7, 'sport'),
(8, 'News'),
(10, 'Economy');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `comment_id` int(10) NOT NULL,
  `comment_post_id` int(11) NOT NULL,
  `comment_author` varchar(255) NOT NULL,
  `comment_content` text NOT NULL,
  `comment_email` varchar(255) NOT NULL,
  `comment_status` varchar(255) NOT NULL,
  `comment_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`comment_id`, `comment_post_id`, `comment_author`, `comment_content`, `comment_email`, `comment_status`, `comment_date`) VALUES
(1, 1, 'lolo', 'its very nice ', 'lolo@yahoo.com', 'unapproved', '2017-11-24'),
(2, 2, 'lamia', 'ssssss ddddddd cbdhssg sdhdidi ', 'lamia@yahoo.com', 'approved', '2017-11-24'),
(3, 1, 'lamiaaaaaa', ' sdgdbc uddddd', 'po@gmail.com', 'approved', '2017-11-25'),
(7, 1, 'AHMED', 'ahmed strong', 'ahmed@gmail.com', 'approved', '2017-11-25'),
(8, 1, 'AHMED', 'ahmed strong', 'ahmed@gmail.com', 'unapproved', '2017-11-25'),
(9, 2, 'AHMED', 'aaaaaa', 'ahmed@gmail.com', 'approved', '2017-11-25');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `post_id` int(10) NOT NULL,
  `post_category_id` int(10) NOT NULL,
  `post_author` varchar(255) NOT NULL,
  `post_title` varchar(255) NOT NULL,
  `post_status` varchar(100) NOT NULL,
  `post_image` text NOT NULL,
  `post_tags` varchar(100) NOT NULL,
  `post_content` text NOT NULL,
  `post_comment_count` int(10) NOT NULL,
  `post_date` date NOT NULL,
  `post_views_count` int(10) NOT NULL,
  `post_user` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`post_id`, `post_category_id`, `post_author`, `post_title`, `post_status`, `post_image`, `post_tags`, `post_content`, `post_comment_count`, `post_date`, `post_views_count`, `post_user`) VALUES
(1, 7, 'lamia Tarek', 'Sport in our life', 'on', '3.jpg', '      spo', 'Sport (British English) or sports (American English) includes all forms of competitive physical activity or games which,[1] through casual or organised participation, aim to use, maintain or improve physical ability and skills while providing enjoyment to participants, and in some cases, entertainment for spectators.[2] Usually the contest or game is between two sides', 6, '2017-11-25', 0, ''),
(2, 2, 'Tarek Ahmed', 'Importance of monuments', 'on', 'mon.jpeg', 'monument,histotic,pol', 'A monument is a type of - usually three-dimensional - structure that was explicitly created to commemorate a person or event, or which has become relevant to a social group as a part of their remembrance of historic times or cultural heritage, due to its artistic, historical, political, technical or architectural importance', 5, '2017-11-21', 0, ''),
(5, 10, 'Tarek Ahmed', 'Economy', 'off', '1.jpg', '  eco,money,economy', 'dddddd fffffffff fffffffffff errttg     ffffff', 5, '2017-11-25', 0, '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`comment_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`post_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `cat_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `comment_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `post_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
