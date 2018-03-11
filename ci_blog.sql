-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 09, 2018 at 03:30 PM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 7.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ci_blog`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `user_id`, `name`, `created_at`) VALUES
(13, 1, 'Info', '2018-03-07 15:57:02'),
(14, 1, 'Business', '2018-03-07 15:57:40'),
(15, 1, 'Sport', '2018-03-07 15:57:53'),
(16, 1, 'Science', '2018-03-07 15:58:29');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `body` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `body` text NOT NULL,
  `post_image` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `category_id`, `user_id`, `title`, `slug`, `body`, `post_image`, `created_at`) VALUES
(29, 16, 1, 'Science planets', 'Science-planets', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras in quam consequat, suscipit purus nec, ultricies lorem. Pellentesque posuere risus id finibus facilisis. Nam eu sapien vel odio semper interdum non nec lorem. Nam at est nulla. Integer metus nulla, rutrum nec lacus vel, tincidunt viverra ex. Cras interdum ac elit eu lacinia. Morbi convallis nulla massa, eget lobortis elit viverra eu. Sed pretium nisl nulla, suscipit pellentesque turpis semper a. Aliquam erat volutpat.</p>\r\n\r\n<p>In risus augue, iaculis id mi ac, sagittis lacinia erat. Donec non nisi mi. Proin ultricies hendrerit dui et pharetra. Nulla nulla dolor, dapibus at semper sed, egestas vel mauris. Ut non ex et sem mollis semper. Donec eu erat sodales, dictum eros id, interdum odio. Morbi scelerisque diam rhoncus lorem porta congue.</p>\r\n\r\n<p>Sed fringilla, orci vitae ullamcorper euismod, nibh leo posuere orci, ac fermentum mi nibh et dolor. Etiam mauris elit, mattis id mattis quis, mollis in lorem. Nunc quis urna lacus. Proin luctus dui non mauris laoreet, et imperdiet tellus bibendum. Maecenas dignissim pharetra sem sit amet sodales. Praesent mollis nulla suscipit volutpat efficitur. Sed placerat, quam eu elementum dictum, nulla ipsum vestibulum massa, vel congue nulla augue scelerisque felis.</p>\r\n', 'planets_stock_pack_by_kuschelirmel_stock.jpg', '2018-03-07 16:01:12'),
(30, 16, 1, 'Science post 2', 'Science-post-2', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras in quam consequat, suscipit purus nec, ultricies lorem. Pellentesque posuere risus id finibus facilisis. Nam eu sapien vel odio semper interdum non nec lorem. Nam at est nulla. Integer metus nulla, rutrum nec lacus vel, tincidunt viverra ex. Cras interdum ac elit eu lacinia. Morbi convallis nulla massa, eget lobortis elit viverra eu. Sed pretium nisl nulla, suscipit pellentesque turpis semper a. Aliquam erat volutpat.</p>\r\n\r\n<p>In risus augue, iaculis id mi ac, sagittis lacinia erat. Donec non nisi mi. Proin ultricies hendrerit dui et pharetra. Nulla nulla dolor, dapibus at semper sed, egestas vel mauris. Ut non ex et sem mollis semper. Donec eu erat sodales, dictum eros id, interdum odio. Morbi scelerisque diam rhoncus lorem porta congue.</p>\r\n\r\n<p>Sed fringilla, orci vitae ullamcorper euismod, nibh leo posuere orci, ac fermentum mi nibh et dolor. Etiam mauris elit, mattis id mattis quis, mollis in lorem. Nunc quis urna lacus. Proin luctus dui non mauris laoreet, et imperdiet tellus bibendum. Maecenas dignissim pharetra sem sit amet sodales. Praesent mollis nulla suscipit volutpat efficitur. Sed placerat, quam eu elementum dictum, nulla ipsum vestibulum massa, vel congue nulla augue scelerisque felis.</p>\r\n', 'download.jpg', '2018-03-07 16:11:53'),
(31, 15, 1, 'Messi in Argentina Shirt', 'Messi-in-Argentina-Shirt', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras in quam consequat, suscipit purus nec, ultricies lorem. Pellentesque posuere risus id finibus facilisis. Nam eu sapien vel odio semper interdum non nec lorem. Nam at est nulla. Integer metus nulla, rutrum nec lacus vel, tincidunt viverra ex. Cras interdum ac elit eu lacinia. Morbi convallis nulla massa, eget lobortis elit viverra eu. Sed pretium nisl nulla, suscipit pellentesque turpis semper a. Aliquam erat volutpat.</p>\r\n\r\n<p>In risus augue, iaculis id mi ac, sagittis lacinia erat. Donec non nisi mi. Proin ultricies hendrerit dui et pharetra. Nulla nulla dolor, dapibus at semper sed, egestas vel mauris. Ut non ex et sem mollis semper. Donec eu erat sodales, dictum eros id, interdum odio. Morbi scelerisque diam rhoncus lorem porta congue.</p>\r\n\r\n<p>Sed fringilla, orci vitae ullamcorper euismod, nibh leo posuere orci, ac fermentum mi nibh et dolor. Etiam mauris elit, mattis id mattis quis, mollis in lorem. Nunc quis urna lacus. Proin luctus dui non mauris laoreet, et imperdiet tellus bibendum. Maecenas dignissim pharetra sem sit amet sodales. Praesent mollis nulla suscipit volutpat efficitur. Sed placerat, quam eu elementum dictum, nulla ipsum vestibulum massa, vel congue nulla augue scelerisque felis.</p>\r\n', 'lionel-andres-messi-football-match-romania-argentina-th-march-national-stadium-bucharest-romania-final-42176684.jpg', '2018-03-07 16:17:33'),
(32, 13, 1, 'Vote', 'Vote', '<p>Maecenas ac elementum nulla, malesuada consectetur turpis. Maecenas quis libero condimentum, varius ipsum at, congue leo. Pellentesque sapien arcu, pharetra vitae interdum eget, congue aliquam lorem. Vivamus augue eros, ultrices ut mi at, eleifend dignissim mi. Donec fringilla est placerat vehicula tempor. Vivamus lacinia odio ac sem sagittis hendrerit. Pellentesque quis ligula vitae ipsum semper mollis a eget mauris. Ut id rutrum arcu, quis tincidunt odio.</p>\r\n\r\n<p>Phasellus accumsan scelerisque ullamcorper. Cras purus leo, luctus vel nisl eu, cursus hendrerit metus. Proin maximus rhoncus arcu, ac ullamcorper eros mattis sit amet. Donec molestie mollis rutrum. Phasellus imperdiet pulvinar velit, ac sollicitudin leo scelerisque non. Duis est tortor, consequat non finibus non, interdum vel purus. Vestibulum vulputate nisl quis nisi efficitur, et elementum mi luctus. Nulla nec augue convallis, tempus erat non, mattis augue. Sed libero sapien, laoreet ac pellentesque in, pretium at mauris. Aenean tellus dui, accumsan vitae neque ac, luctus feugiat velit. Quisque condimentum suscipit erat, eget mollis dolor maximus sit amet. Nam vitae metus ut enim posuere ullamcorper.</p>\r\n', 'vote-5811198.jpg', '2018-03-07 16:21:07'),
(33, 14, 1, 'Business post 1', 'Business-post-1', '<p>Maecenas ac elementum nulla, malesuada consectetur turpis. Maecenas quis libero condimentum, varius ipsum at, congue leo. Pellentesque sapien arcu, pharetra vitae interdum eget, congue aliquam lorem. Vivamus augue eros, ultrices ut mi at, eleifend dignissim mi. Donec fringilla est placerat vehicula tempor. Vivamus lacinia odio ac sem sagittis hendrerit. Pellentesque quis ligula vitae ipsum semper mollis a eget mauris. Ut id rutrum arcu, quis tincidunt odio.</p>\r\n\r\n<p>Phasellus accumsan scelerisque ullamcorper. Cras purus leo, luctus vel nisl eu, cursus hendrerit metus. Proin maximus rhoncus arcu, ac ullamcorper eros mattis sit amet. Donec molestie mollis rutrum. Phasellus imperdiet pulvinar velit, ac sollicitudin leo scelerisque non. Duis est tortor, consequat non finibus non, interdum vel purus. Vestibulum vulputate nisl quis nisi efficitur, et elementum mi luctus. Nulla nec augue convallis, tempus erat non, mattis augue. Sed libero sapien, laoreet ac pellentesque in, pretium at mauris. Aenean tellus dui, accumsan vitae neque ac, luctus feugiat velit. Quisque condimentum suscipit erat, eget mollis dolor maximus sit amet. Nam vitae metus ut enim posuere ullamcorper.</p>\r\n', 'pexels-photo-886465.jpeg', '2018-03-07 16:23:03');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `zipcode` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `register_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `zipcode`, `email`, `username`, `password`, `register_date`) VALUES
(1, 'Marko Pavlovic', '11000', 'pavika@pavika.com', 'Pavika', 'b10f41c22136ee6714fb0fd97152fdf3', '2018-03-01 01:50:46'),
(2, 'Pera', '11000', 'pera@pera', 'Pera', 'd8795f0d07280328f80e59b1e8414c49', '2018-03-05 19:15:40');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
