-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 14, 2021 at 08:48 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mkt`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `email`, `password`) VALUES
(2, 'Hamna Iqbal', 'info12@gmail.com', '$2y$09$QN2pyhwHKKHt5yVIAtcbJesc4GhIFmInsHGP4zI5rH0MH99RDjvS2');

-- --------------------------------------------------------

--
-- Table structure for table `blog`
--

CREATE TABLE `blog` (
  `id` int(11) NOT NULL,
  `writer_name` longtext NOT NULL,
  `slug` longtext NOT NULL,
  `heading` varchar(255) NOT NULL,
  `short_description` longtext NOT NULL,
  `long_description` longtext NOT NULL,
  `date_issue` longtext NOT NULL,
  `img` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `pid` int(15) NOT NULL,
  `uid` int(255) NOT NULL,
  `quantity` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` longtext NOT NULL,
  `img` varchar(255) NOT NULL,
  `description` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`, `slug`, `img`, `description`) VALUES
(4, 'burger', '', 'artist-30.6515600016171074721617107472.jpeg', 'kjfhf'),
(6, 'ICE CREAM', '', 'artist-30.5471210016171187751617118775.jpeg', 'qwsdasdfa'),
(7, 'test', '', 'hammer1_22_230.1361270016180837111618083711.jpg', 'test descr');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `phone` varchar(14) NOT NULL,
  `email` varchar(255) NOT NULL,
  `message` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `name`, `phone`, `email`, `message`) VALUES
(1, 'Muhammad Noor', '03496082391', 'info@gmail.com', 'kjadaf'),
(2, 'noor', '945245242', 'info@gmail.com', 'Ali Hassan'),
(3, 'Muhammad Noor', '945245242', 'info@gmail.com', 'lkadjlaksdfjalkdf'),
(4, 'Kazma Rehman', '03496082391', 'kazmarehman1@gmail.com', 'asdfasdfads'),
(5, 'Maria Kanwal', '3496082391', 'mariakanwal@gmail.com', 'kajdhkajsdfkasjdaksdnfaksdfnjkasd'),
(6, 'Muhammad Noor', '945245242', 'voteindividualism@gmail.com', 'asdasdfasdfasdfa'),
(7, 'noor', '3496082391', 'info12@gmail.com', 'eqwerqwer'),
(8, 'mnoor082@gmail.com', '03496082391', 'stefcimarron@gmail.com', 'sdaadsfasdf');

-- --------------------------------------------------------

--
-- Table structure for table `gallery`
--

CREATE TABLE `gallery` (
  `id` int(11) NOT NULL,
  `img` varchar(255) NOT NULL,
  `pid` int(14) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `newsletter`
--

CREATE TABLE `newsletter` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `order_amount` varchar(20) NOT NULL,
  `order_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `order_count` int(11) NOT NULL,
  `discount` int(11) NOT NULL,
  `tax` varchar(255) NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `user_id` int(11) NOT NULL,
  `first_name` text,
  `last_name` text,
  `country` text,
  `address` text,
  `city` text,
  `phone` text,
  `email` text,
  `additional` text,
  `isdel` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `order_amount`, `order_date`, `order_count`, `discount`, `tax`, `time`, `user_id`, `first_name`, `last_name`, `country`, `address`, `city`, `phone`, `email`, `additional`, `isdel`) VALUES
(1, '234', '0000-00-00 00:00:00', 0, 0, '0', '2021-04-11 09:47:36', 0, 'first name', 'last name', 'country', 'address', 'city', '121232', 'test@gmail.com', NULL, 0),
(2, '234', '2021-04-11 14:50:22', 0, 0, '0', '2021-04-11 09:50:22', 0, 'first name', 'last name', 'country', 'address', 'city', '121232', 'test@gmail.com', NULL, 0),
(3, '234', '2021-04-11 14:51:15', 0, 0, '0', '2021-04-11 09:51:15', 0, 'first name', 'last name', 'country', 'address', 'city', '121232', 'test@gmail.com', NULL, 0),
(4, '234', '2021-04-11 14:52:17', 0, 0, '0', '2021-04-11 09:52:17', 0, 'first name', 'last name', 'country', 'address', 'city', '121232', 'test@gmail.com', NULL, 0),
(5, '234', '2021-04-11 14:57:01', 0, 0, '0', '2021-04-11 09:57:01', 0, 'first name', 'last name', 'country', 'address', 'city', '121232', 'test@gmail.com', NULL, 0),
(6, '234', '2021-04-11 15:04:43', 0, 0, '0', '2021-04-11 10:04:43', 0, 'first name', 'last name', 'country', 'address', 'city', '121232', 'test@gmail.com', NULL, 0),
(7, '234', '2021-04-11 15:05:11', 0, 0, '0', '2021-04-11 10:05:11', 0, 'first name', 'last name', 'country', 'address', 'city', '121232', 'test@gmail.com', NULL, 0),
(8, '234', '2021-04-11 15:06:08', 0, 0, '0', '2021-04-11 10:06:08', 0, 'first name', 'last name', 'country', 'address', 'city', '121232', 'test@gmail.com', NULL, 0),
(9, '234', '2021-04-11 15:07:07', 0, 0, '0', '2021-04-11 10:07:07', 0, 'first name', 'last name', 'country', 'address', 'city', '121232', 'test@gmail.com', NULL, 0),
(10, '234', '2021-04-11 15:07:11', 0, 0, '0', '2021-04-11 10:07:11', 0, 'first name', 'last name', 'country', 'address', 'city', '121232', 'test@gmail.com', NULL, 0),
(11, '234', '2021-04-11 15:07:51', 0, 0, '0', '2021-04-11 10:07:51', 0, 'first name', 'last name', 'country', 'address', 'city', '121232', 'test@gmail.com', NULL, 0),
(14, '234', '2021-04-11 20:27:51', 0, 0, '0', '2021-04-11 15:27:51', 0, 'first name', 'last name', 'country', 'address', 'city', '121232', 'test@gmail.com', NULL, 0),
(15, '1234', '2021-04-12 20:43:26', 0, 0, '0', '2021-04-12 15:43:26', 0, 'test', 'test', 'Pakistan', 'test, tetstetetset, tetstetetset, tetstetetset, te', 'test', '6475257466', 'arslansheikh310@gmail.com', NULL, 0),
(16, '1234', '2021-04-12 20:44:44', 0, 0, '0', '2021-04-13 20:26:04', 0, 'test', 'test', 'Pakistan', 'test, tetstetetset, tetstetetset, tetstetetset, te', 'test', '6475257466', 'arslansheikh310@gmail.com', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `order_detail`
--

CREATE TABLE `order_detail` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `p_name` varchar(30) NOT NULL,
  `p_price` varchar(30) NOT NULL,
  `sale_price` varchar(30) NOT NULL,
  `quantity` varchar(30) NOT NULL,
  `total_purchase_price` varchar(30) NOT NULL,
  `t_price` varchar(30) NOT NULL,
  `order_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order_detail`
--

INSERT INTO `order_detail` (`id`, `product_id`, `p_name`, `p_price`, `sale_price`, `quantity`, `total_purchase_price`, `t_price`, `order_id`) VALUES
(1, 1001, 'Khulfa', '', '234', '1', '', '234', 5),
(2, 1001, 'Khulfa', '', '234', '1', '', '234', 6),
(3, 1001, 'Khulfa', '', '234', '1', '', '234', 7),
(4, 1001, 'Khulfa', '', '234', '1', '', '234', 8),
(5, 1001, 'Khulfa', '', '234', '1', '', '234', 9),
(6, 1001, 'Khulfa', '', '234', '1', '', '234', 10),
(7, 1001, 'Khulfa', '', '234', '1', '', '234', 11),
(8, 1001, 'Khulfa', '', '234', '1', '', '234', 12),
(9, 1001, 'Khulfa', '', '234', '1', '', '234', 13),
(10, 1001, 'Khulfa', '', '234', '1', '', '234', 14),
(11, 1001, 'Khulfa', '', '234', '1', '', '234', 15),
(12, 1002, 'test', '', '1000', '1', '', '1000', 15),
(13, 1001, 'Khulfa', '', '234', '1', '', '234', 16),
(14, 1002, 'test', '', '1000', '1', '', '1000', 16);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `cid` longtext NOT NULL,
  `name` longtext NOT NULL,
  `p_code` varchar(255) NOT NULL,
  `description` longtext NOT NULL,
  `price` longtext NOT NULL,
  `shipping_price` longtext NOT NULL,
  `img` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `cid`, `name`, `p_code`, `description`, `price`, `shipping_price`, `img`) VALUES
(1, '6', 'Khulfa', '1001', 'adadsfasd', '234', '2323', 'artist-20.6635920016171188291617118829.jpeg'),
(2, '6', 'test', '1002', 'test descr', '1000', '10', 'hammer1_22_230.2706600016181264461618126446.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `team`
--

CREATE TABLE `team` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `designation` varchar(255) NOT NULL,
  `description` varchar(1000) NOT NULL,
  `img` varchar(11111) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `team`
--

INSERT INTO `team` (`id`, `name`, `designation`, `description`, `img`) VALUES
(1, 'Kazma Rehman qwwww', 'CEO', ' Kazma Rehman The CEO of MKT and Expert Chef In Chinies Food', 'chef-10.2744910016152923481615292348.jpg'),
(2, 'Maria Kanwal', 'Chief Cheff', 'fdsfdgsdfs', 'mobile-20.5952610016166020071616602007.png'),
(3, 'Tahira Tabusam', 'Cook', 'asdafd', 'lates-20.2945140016171189961617118996.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `address` longtext NOT NULL,
  `img` varchar(10000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `password`, `phone`, `address`, `img`) VALUES
(1, 'Kazma rehman', 'ali@gmail.com', '$2y$09$uhB0ofSVPYBSVviMXi3T.uRQCrwxwSenL1/wSr81PQT7zCQBU.hSi', '123456789', 'MOZA Darhutta Teh. bhowana distric chiniot', 'mobile.PNG'),
(2, 'fjksaljf', 'tt@gmail.com', '$2y$09$GZYzFeivQrBsa/0u5317e.gnKrRTrB/SYCtzHUphTVBxkU45uc0qO', '748927', 'sfhkahsfk', 'mobile.PNG'),
(3, 'jflaj', 'ee@gmail.com', '$2y$09$S1UJoz/oES/OTfDPrQOs8OavxCFDYvlBYCIQ0AwQl89lxduoconRy', '242424255', 'fjlsajfklasj', 'mobile-2.PNG'),
(4, 'jflaj', 'ee@gmail.com', '$2y$09$S1UJoz/oES/OTfDPrQOs8OavxCFDYvlBYCIQ0AwQl89lxduoconRy', '242424255', 'fjlsajfklasj', 'mobile-2.PNG'),
(5, 'jflaj', 'ee@gmail.com', '$2y$09$mLXUZ3WyaAeXvYTaPZdrV.aJdAlRgv9MwW1gOAEW4ZvAm/DJw3Ary', '242424255', 'fjlsajfklasj', 'mobile-2.PNG'),
(6, 'Muhammad Noor', 'info@gmail.com', '$2y$09$KRknIrZN/hDBddxKXtDTm.7J/VbScpLD7btR9ELFvI3RixEBk6xJm', '34552323234', 'MOZA Darhutta Teh. bhowana distric chiniot', 'database table.PNG'),
(7, 'Muhammad Noor', 'mnoor92082@gmail.com', '$2y$09$7WVikRkpEfj3avABFi27.OW2eFmzNfmUvamNRXW7xQ/WozBJRrzSC', '98742347932845', 'kajsdnfdkajdfakj', 'background_quizz_3.ce9ab797.jpg'),
(8, 'Maria Kanwal', 'maria@gmail.com', '$2y$09$z7i24oIox430Oh8qs7FV9eg8VCqulAhtzA3R1O7PJhd3o41dRn9v2', '12324234525', 'klajsdhalskdfjaldkj', '111..PNG');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blog`
--
ALTER TABLE `blog`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gallery`
--
ALTER TABLE `gallery`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `order_id` (`order_id`);

--
-- Indexes for table `order_detail`
--
ALTER TABLE `order_detail`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_id` (`order_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `team`
--
ALTER TABLE `team`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `blog`
--
ALTER TABLE `blog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `gallery`
--
ALTER TABLE `gallery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `order_detail`
--
ALTER TABLE `order_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `team`
--
ALTER TABLE `team`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
