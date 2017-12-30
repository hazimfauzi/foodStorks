-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 05, 2017 at 03:18 AM
-- Server version: 10.1.25-MariaDB
-- PHP Version: 7.1.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `foodstorks`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `cat_id` int(11) NOT NULL,
  `cat_name` varchar(50) NOT NULL,
  `cat_image` varchar(100) NOT NULL,
  `rest_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`cat_id`, `cat_name`, `cat_image`, `rest_id`) VALUES
(1, 'Milk Shake', '1_Milk Shake_milkshake.jpg', 1),
(2, 'Nasi Lemak', '1_Nasi Lemak_nasi lemak.jpg', 1),
(3, 'Fruit Juice', '2_Fruit Juice_fruit juice.jpg', 2),
(4, 'Nasi Lemak', '2_Nasi Lemak_nasi lemak.jpg', 2),
(7, 'Mamak Goreng & Rojak', '2_Mamak Goreng & Rojak_Mamak Goreng & Rojak.jpg', 2),
(8, 'Can Drinks', '2_Can Drinks_Can Drinks.jpg', 2),
(9, 'Drinks', '2_Drinks_Drinks.jpg', 2);

-- --------------------------------------------------------

--
-- Table structure for table `chat`
--

CREATE TABLE `chat` (
  `chat_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `chat_from` int(11) NOT NULL,
  `chat_to` int(11) NOT NULL,
  `chat_msg` mediumtext NOT NULL,
  `chat_time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `chat`
--

INSERT INTO `chat` (`chat_id`, `order_id`, `chat_from`, `chat_to`, `chat_msg`, `chat_time`) VALUES
(1, 9, 10, 21, 'helo', '2017-05-22 14:56:42'),
(2, 9, 21, 10, 'hai can i help u', '2017-05-22 14:56:56'),
(3, 9, 10, 21, 'yeah how about my order', '2017-05-22 14:57:14'),
(4, 10, 10, 21, 'helo', '2017-05-22 15:06:59'),
(5, 10, 21, 10, 'helo can i help u', '2017-05-22 15:07:14'),
(6, 10, 10, 21, 'can i cancel my order', '2017-05-22 15:07:36'),
(7, 10, 21, 10, 'errm', '2017-05-22 15:08:14'),
(8, 11, 18, 21, 'test', '2017-05-22 15:32:56'),
(9, 11, 21, 18, 'tet', '2017-05-22 15:33:07'),
(10, 12, 18, 21, 'hai jgn lambat tau', '2017-05-22 13:01:14'),
(11, 12, 21, 18, 'ok tgh buat', '2017-05-23 13:01:36'),
(12, 10, 10, 21, 'hai', '2017-05-24 00:27:14'),
(13, 10, 21, 10, 'hai', '2017-05-24 00:27:56'),
(14, 10, 21, 10, 'test', '2017-05-24 02:45:47'),
(15, 10, 21, 10, 'erm', '2017-05-24 02:46:31'),
(16, 10, 21, 10, 'hai', '2017-05-24 02:47:25'),
(17, 10, 21, 10, 'gaga', '2017-05-24 02:48:30'),
(18, 10, 10, 21, 'test', '2017-05-24 02:49:51'),
(19, 10, 10, 21, 'haha', '2017-05-24 02:49:58'),
(20, 10, 10, 21, '', '2017-05-24 02:49:59'),
(21, 10, 10, 21, 'fucj', '2017-05-24 02:50:04'),
(22, 10, 10, 21, 'dh', '2017-05-24 02:50:41'),
(23, 10, 21, 10, 'test', '2017-05-24 02:50:53'),
(24, 10, 10, 21, 'hai', '2017-05-24 02:51:44'),
(25, 10, 21, 10, 'bebal la', '2017-05-24 02:52:02'),
(26, 10, 10, 21, 'test', '2017-05-24 02:53:13'),
(27, 10, 21, 10, 'wtf is happen', '2017-05-24 02:53:31'),
(28, 10, 10, 21, 'gaga', '2017-05-24 02:54:17'),
(29, 10, 21, 10, 'mcm jalan', '2017-05-24 02:54:31'),
(30, 10, 10, 21, 'jln ke ni', '2017-05-24 02:55:12'),
(31, 10, 21, 10, 'x tahu lah', '2017-05-24 02:55:24'),
(32, 10, 10, 21, '', '2017-05-24 02:55:33'),
(33, 10, 21, 10, 'yg ni jalan', '2017-05-24 02:55:50'),
(34, 10, 21, 10, 'pelik sial', '2017-05-24 02:55:57'),
(35, 10, 10, 21, 'haha', '2017-05-24 02:57:17'),
(36, 10, 10, 21, 'patut la', '2017-05-24 02:57:23'),
(37, 10, 10, 21, 'hai', '2017-05-24 02:59:40'),
(38, 10, 21, 10, 'wew', '2017-05-24 02:59:44'),
(39, 10, 21, 10, 'jalan siak', '2017-05-24 02:59:51'),
(40, 10, 10, 21, 'power2', '2017-05-24 02:59:57'),
(41, 10, 21, 10, 'alhamduliallah', '2017-05-24 03:00:07'),
(42, 10, 10, 21, 'fyp kita dapat a x ko rasa?', '2017-05-24 03:00:19'),
(43, 10, 21, 10, 'x kot', '2017-05-24 03:00:25'),
(44, 9, 10, 21, 'bro bila nk sampai', '2017-05-23 03:01:17'),
(45, 9, 21, 10, 'eh lupa nk ckp', '2017-05-24 03:01:27'),
(46, 9, 21, 10, 'moto rosak', '2017-05-24 03:01:36');

-- --------------------------------------------------------

--
-- Table structure for table `floorplan`
--

CREATE TABLE `floorplan` (
  `table_id` int(11) NOT NULL,
  `table_no` int(11) NOT NULL,
  `table_status` varchar(20) NOT NULL,
  `rest_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `floorplan`
--

INSERT INTO `floorplan` (`table_id`, `table_no`, `table_status`, `rest_id`) VALUES
(13, 1, 'Occupied', 2),
(14, 2, 'Available', 2),
(15, 3, 'Dirty', 2),
(17, 4, 'Dirty', 2),
(18, 5, 'Available', 2),
(22, 1, 'Available', 1),
(23, 2, 'Available', 1),
(29, 3, 'Occupied', 1),
(30, 4, 'Dirty', 1),
(31, 5, 'Occupied', 1),
(34, 6, 'Occupied', 1),
(35, 7, 'Occupied', 1),
(36, 8, 'Dirty', 1),
(37, 9, 'Dirty', 1),
(38, 10, 'Available', 1),
(39, 11, 'Occupied', 1),
(40, 12, 'Available', 1),
(41, 6, 'Occupied', 2);

-- --------------------------------------------------------

--
-- Table structure for table `item`
--

CREATE TABLE `item` (
  `item_id` int(11) NOT NULL,
  `item_name` varchar(50) NOT NULL,
  `item_price` float(10,2) NOT NULL,
  `cat_id` int(11) NOT NULL,
  `rest_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `item`
--

INSERT INTO `item` (`item_id`, `item_name`, `item_price`, `cat_id`, `rest_id`) VALUES
(1, 'Strawberry Milk Shake', 3.50, 1, 1),
(2, 'Nasi Lemak Biasa', 2.00, 2, 1),
(3, 'Vanila Milk Shake', 3.00, 1, 1),
(4, 'Nasi Lemak Ayam', 4.50, 2, 1),
(5, 'Apple Milk Shake', 3.50, 1, 1),
(6, 'Nasi Lemak Special', 5.00, 2, 1),
(7, 'Apple Juice', 3.00, 3, 2),
(8, 'Orange Juice', 3.00, 3, 2),
(9, 'Carrot  Juice', 3.00, 3, 2),
(10, 'Nasi Lemak Biasa', 2.00, 4, 2),
(11, 'Nasi Lemak Ayam', 3.00, 4, 2),
(12, 'Mango Float', 5.00, 5, 1),
(13, 'Nasi Lemak Special', 4.00, 4, 2),
(14, 'Watermelon Juice', 3.00, 3, 2),
(15, 'Maggi Goreng', 4.00, 7, 2),
(16, ' Mee Goreng', 4.00, 7, 2),
(17, 'Kuew Teow Goreng', 4.00, 7, 2),
(18, 'Kuew Teow Goreng Ayam', 4.00, 7, 2),
(19, 'Coca - Cola', 2.00, 8, 2),
(20, 'Sprite', 2.00, 8, 2),
(21, 'Pepsi', 2.00, 8, 2),
(22, 'Sarsi', 2.00, 8, 2),
(23, '100 Plus', 2.00, 8, 2);

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `order_id` int(11) NOT NULL,
  `order_type` int(11) NOT NULL,
  `order_list` longtext NOT NULL,
  `table_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `rest_id` int(11) NOT NULL,
  `order_date` date NOT NULL,
  `order_time` time NOT NULL,
  `order_address` varchar(100) NOT NULL,
  `order_city` varchar(20) NOT NULL,
  `order_state` varchar(20) NOT NULL,
  `order_postcode` int(11) NOT NULL,
  `order_price` varchar(20) NOT NULL,
  `done` int(11) NOT NULL,
  `paid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`order_id`, `order_type`, `order_list`, `table_id`, `user_id`, `rest_id`, `order_date`, `order_time`, `order_address`, `order_city`, `order_state`, `order_postcode`, `order_price`, `done`, `paid`) VALUES
(1, 1, '1-Strawberry Milk Shake-3.50-1;3-Vanila Milk Shake-3.00-1;6-Nasi Lemak Special-5.00-2;2-Nasi Lemak Biasa-2.00-1;', 0, 10, 1, '2017-05-15', '22:00:01', 'DT2916, JALAN KENARI JAYA 2,, TAMAN KENARI JAYA,', 'DURIAN TUNGGAL,', 'MELAKA', 76100, '23.5', 1, 1),
(2, 1, '12-Mango Float-5.00-11;', 0, 18, 1, '2017-05-18', '23:37:19', 'DT2916, JALAN KENARI JAYA 2,, TAMAN KENARI JAYA,', 'DURIAN TUNGGAL,', 'MELAKA', 76100, '55', 1, 1),
(3, 2, '12-Mango Float-5.00-1;1-Strawberry Milk Shake-3.50-1;5-Apple Milk Shake-3.50-1;3-Vanila Milk Shake-3.00-1;', 0, 18, 1, '2017-05-19', '22:00:00', 'None', 'None', 'None', 0, '15', 1, 1),
(4, 2, '1-Strawberry Milk Shake-3.50-10;', 0, 18, 1, '2017-05-19', '17:00:00', 'None', 'None', 'None', 0, '35', 1, 1),
(5, 1, '5-Apple Milk Shake-3.50-10;', 0, 18, 1, '2017-05-19', '02:19:34', 'DT2916, JALAN KENARI JAYA 2,, TAMAN KENARI JAYA,', 'DURIAN TUNGGAL,', 'MELAKA', 76100, '35', 1, 1),
(6, 2, '1-Strawberry Milk Shake-3.50-10;', 0, 18, 1, '2017-05-19', '13:00:00', 'None', 'None', 'None', 0, '35', 1, 1),
(7, 1, '5-Apple Milk Shake-3.50-3;6-Nasi Lemak Special-5.00-1;', 0, 10, 1, '2017-05-20', '19:18:39', 'DT2916, JALAN KENARI JAYA 2,, TAMAN KENARI JAYA,', 'DURIAN TUNGGAL,', 'MELAKA', 76100, '15.5', 1, 1),
(8, 1, '12-Mango Float-5.00-1;2-Nasi Lemak Biasa-2.00-1;5-Apple Milk Shake-3.50-1;4-Nasi Lemak Ayam-4.50-1;', 0, 10, 1, '2017-05-21', '14:41:27', 'DT2916, JALAN KENARI JAYA 2,, TAMAN KENARI JAYA,', 'DURIAN TUNGGAL,', 'MELAKA', 76100, '15', 1, 1),
(9, 1, '5-Apple Milk Shake-3.50-1;3-Vanila Milk Shake-3.00-1;6-Nasi Lemak Special-5.00-1;1-Strawberry Milk Shake-3.50-1;', 0, 10, 1, '2017-05-22', '13:54:00', 'DT2916, JALAN KENARI JAYA 2,, TAMAN KENARI JAYA,', 'DURIAN TUNGGAL', 'MELAKA', 76100, '15', 1, 1),
(10, 1, '', 0, 10, 1, '2017-05-23', '13:55:05', 'DT2916, JALAN KENARI JAYA 2,, TAMAN KENARI JAYA,', 'DURIAN TUNGGAL', 'MELAKA', 76100, '0', 1, 1),
(11, 1, '1-Strawberry Milk Shake-3.50-1;6-Nasi Lemak Special-5.00-1;3-Vanila Milk Shake-3.00-1;5-Apple Milk Shake-3.50-1;', 0, 18, 1, '2017-05-22', '15:31:01', 'DT2916, JALAN KENARI JAYA 2,', 'DURIAN TUNGGAL', 'MELAKA', 76100, '15', 1, 1),
(12, 2, '1-Strawberry Milk Shake-3.50-1;5-Apple Milk Shake-3.50-1;3-Vanila Milk Shake-3.00-1;6-Nasi Lemak Special-5.00-1;', 0, 18, 1, '2017-05-23', '13:00:00', 'None', 'None', 'None', 0, '15', 1, 1),
(13, 1, '1-Strawberry Milk Shake-3.50-2;6-Nasi Lemak Special-5.00-2;', 0, 18, 1, '2017-05-23', '13:00:55', 'DT2916, JALAN KENARI JAYA 2,, TAMAN KENARI JAYA,', 'DURIAN TUNGGAL', 'MELAKA', 76100, '17', 1, 1),
(14, 2, '5-Apple Milk Shake-3.50-2;6-Nasi Lemak Special-5.00-2;', 0, 18, 1, '2017-05-23', '14:00:00', 'None', 'None', 'None', 0, '17', 1, 1),
(15, 1, '1-Strawberry Milk Shake-3.50-10;', 0, 10, 1, '2017-05-24', '03:19:29', 'DT2916, JALAN KENARI JAYA 2,, TAMAN KENARI JAYA,', 'DURIAN TUNGGAL', 'Melaka', 76100, '35', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `restaurant`
--

CREATE TABLE `restaurant` (
  `rest_id` int(11) NOT NULL,
  `rest_name` varchar(50) NOT NULL,
  `rest_owner` int(11) NOT NULL,
  `rest_rate` int(11) NOT NULL,
  `total_rate` varchar(50) NOT NULL,
  `rest_address` varchar(50) NOT NULL,
  `rest_postcode` varchar(10) NOT NULL,
  `rest_city` varchar(50) NOT NULL,
  `rest_state` varchar(50) NOT NULL,
  `rest_contact` varchar(20) NOT NULL,
  `open` int(11) NOT NULL,
  `delivery` int(11) NOT NULL,
  `delivery_fee` float(10,2) NOT NULL,
  `halal` int(11) NOT NULL,
  `non_halal` int(11) NOT NULL,
  `start1` time NOT NULL,
  `start2` time NOT NULL,
  `start3` time NOT NULL,
  `start4` time NOT NULL,
  `start5` time NOT NULL,
  `start6` time NOT NULL,
  `start7` time NOT NULL,
  `end1` time NOT NULL,
  `end2` time NOT NULL,
  `end3` time NOT NULL,
  `end4` time NOT NULL,
  `end5` time NOT NULL,
  `end6` time NOT NULL,
  `end7` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `restaurant`
--

INSERT INTO `restaurant` (`rest_id`, `rest_name`, `rest_owner`, `rest_rate`, `total_rate`, `rest_address`, `rest_postcode`, `rest_city`, `rest_state`, `rest_contact`, `open`, `delivery`, `delivery_fee`, `halal`, `non_halal`, `start1`, `start2`, `start3`, `start4`, `start5`, `start6`, `start7`, `end1`, `end2`, `end3`, `end4`, `end5`, `end6`, `end7`) VALUES
(1, 'Warewolf', 21, 3, '2', 'DT 2134,', '71600', 'Durian tunggal', 'Melaka', '0137664533', 1, 1, 0.00, 1, 0, '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00'),
(2, 'Ole Ole Bandung', 21, 5, '2', 'DT2916, JALAN KENARI JAYA 2,', '76100', 'DURIAN TUNGGAL', 'MELAKA', '0137664533', 1, 1, 5.00, 0, 1, '22:00:00', '22:00:00', '22:00:00', '22:00:00', '16:00:00', '13:00:00', '22:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

CREATE TABLE `review` (
  `review_id` int(11) NOT NULL,
  `review_star` int(11) NOT NULL,
  `review_title` varchar(50) NOT NULL,
  `review_desc` varchar(100) NOT NULL,
  `rest_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `review_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `review`
--

INSERT INTO `review` (`review_id`, `review_star`, `review_title`, `review_desc`, `rest_id`, `user_id`, `review_date`) VALUES
(1, 1, 'Best Restaurant Ever', 'Best Restaurant Ever', 1, 18, '2017-08-03 13:20:18'),
(2, 5, 'New Title', 'New review', 1, 10, '2017-05-22 13:51:00'),
(3, 4, 'test', '', 2, 10, '2017-05-21 16:42:24'),
(4, 5, '', '', 2, 18, '2017-08-03 13:20:37');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `level` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `first_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `last_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `password` longtext COLLATE utf8_unicode_ci NOT NULL,
  `gender` varchar(6) COLLATE utf8_unicode_ci NOT NULL,
  `contact` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `status` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `created` datetime NOT NULL,
  `employer` int(11) NOT NULL,
  `modified` datetime NOT NULL,
  `link` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `locale` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `picture` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `oauth_uid` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `oauth_provider` enum('','facebook','google','twitter') COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `level`, `first_name`, `last_name`, `email`, `password`, `gender`, `contact`, `address`, `status`, `created`, `employer`, `modified`, `link`, `locale`, `picture`, `oauth_uid`, `oauth_provider`) VALUES
(10, 'user', 'Hazim', 'SsMf', 'hazimfauzi95@gmail.com', '', 'male', '+60137664533', '', '', '2017-04-24 14:11:28', 0, '2017-05-24 01:59:39', 'https://www.facebook.com/app_scoped_user_id/1474925192552301/', 'en_GB', 'https://scontent.xx.fbcdn.net/v/t1.0-1/p50x50/12072825_1021493497895475_8974624700934947644_n.jpg?oh=1c78c8ce7d8299fde322593e99e93abe&oe=59A5F931', '1474925192552301', 'facebook'),
(12, 'admin', 'Food', 'Storks', 'storks4dmin@gmail.com', '$2y$10$jZQTfro9cL.EcIeuMbLhUugKQdYAAk2mJhtdql3QxAAyEQHufIBNe', '', '', '', '', '2017-04-25 10:36:35', 0, '2017-04-25 10:36:35', '', '', '', '', ''),
(18, 'user', 'Muhammad Hazim Bin', 'Mohd Fauzi', 'hazimfauzi124@gmail.com', '$2y$10$r/m6DgcEwf6qbdYsWkUIY.RNkEEAhFanam8TFRfBVrSq6CFd90NPe', 'male', '0137664533', '', '', '2017-04-25 15:04:01', 0, '2017-04-25 15:04:01', '', '', '', '', ''),
(21, 'manager', 'Muhammad', 'Hazim', 'hazimssmf@gmail.com', '$2y$10$UaYoq4FWWW7Cj83xFA/TI./9KctvKm6IhdhuM.fSWdiKXWa5dUDsS', 'Male', '0123456789', 'DT2916, JALAN KENARI JAYA 2,\r\nTAMAN KENARI JAYA,', 'Active', '2017-04-25 18:02:40', 0, '2017-04-25 18:02:40', '', '', '', '', ''),
(22, 'Waiter', 'Hazim', 'Fauzi', 'test@gmail.com', '$2y$10$hbpGwx6IXr5fFZECnVvh5e0DrfCYI8yFeVX6LQ6HdQTddlEuoGs2W', 'Male', '0123456789', 'DT2916, JALAN KENARI JAYA 2,\r\nTAMAN KENARI JAYA,', 'Active', '2017-04-26 09:06:25', 21, '2017-04-26 09:06:25', '', '', '', '', ''),
(23, 'Cashier', 'Safwan', 'Ahmad', 'safwan811@gmail.com', '$2y$10$v37YryP6knrMvEYnFK7V/u1WuNkGKO3P9knA.y8wP5rYxoVXoU1/W', 'Male', '0123456789', 'DT2916, JALAN KENARI JAYA 2,\r\nTAMAN KENARI JAYA,', 'Active', '2017-04-27 08:18:06', 21, '2017-04-27 08:18:06', '', '', '', '', ''),
(24, 'user', 'Zul', 'Amy', 'zulhilmijohari17@gmail.com', '$2y$10$YCY9hAc6iAjI.SKM4sOULezcENPBJKdu8eYPOI0jfBFK5JaBrAsOe', '', '', '', '', '2017-05-19 20:35:16', 0, '2017-05-19 20:35:16', '', '', '', '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `chat`
--
ALTER TABLE `chat`
  ADD PRIMARY KEY (`chat_id`);

--
-- Indexes for table `floorplan`
--
ALTER TABLE `floorplan`
  ADD PRIMARY KEY (`table_id`);

--
-- Indexes for table `item`
--
ALTER TABLE `item`
  ADD PRIMARY KEY (`item_id`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `restaurant`
--
ALTER TABLE `restaurant`
  ADD PRIMARY KEY (`rest_id`);

--
-- Indexes for table `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`review_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `chat`
--
ALTER TABLE `chat`
  MODIFY `chat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;
--
-- AUTO_INCREMENT for table `floorplan`
--
ALTER TABLE `floorplan`
  MODIFY `table_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;
--
-- AUTO_INCREMENT for table `item`
--
ALTER TABLE `item`
  MODIFY `item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `restaurant`
--
ALTER TABLE `restaurant`
  MODIFY `rest_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `review`
--
ALTER TABLE `review`
  MODIFY `review_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
