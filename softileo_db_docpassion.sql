-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 15, 2021 at 11:26 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `softileo_db_docpassion`
--

-- --------------------------------------------------------

--
-- Table structure for table `about`
--

CREATE TABLE `about` (
  `ID` int(11) NOT NULL,
  `en` longtext NOT NULL,
  `ar` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `about`
--

INSERT INTO `about` (`ID`, `en`, `ar`) VALUES
(1, '<b>						\r\n							asdasdasd\r\n						</b>', 'asd');

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `ID` int(11) NOT NULL,
  `name` longtext NOT NULL,
  `email` longtext NOT NULL,
  `password` longtext NOT NULL,
  `date` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`ID`, `name`, `email`, `password`, `date`) VALUES
(2, 'Adminasdas', 'asdasasdf@asd.com', '$2y$10$W/0XvyQ1i7qJxtK/icK5h.6u/bJxi7tAKuKYFhEk7YCYtPPZR2vba', '18 Jan 2021');

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `brand_id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `slug` varchar(256) NOT NULL,
  `image` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`brand_id`, `name`, `slug`, `image`) VALUES
(3, 'Polo ', 'polo', 'Screenshot 2020-12-05 at 11.07.05 PM.png'),
(4, 'Crocodile', 'crocodile', 'Screenshot 2020-12-05 at 11.01.17 PM.png'),
(5, 'Khaadi', 'khaadi', 'women-suits-pak.jpeg'),
(6, 'Bonanza', 'bonanza', '0002083_white-cotton-kurta_550.jpeg'),
(7, 'Gucci', 'gucci', 'Screenshot 2020-12-05 at 10.39.34 PM.png'),
(8, 'Bata', 'bata', 'women-heels.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `subtotal` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `userid`, `product_id`, `qty`, `price`, `subtotal`) VALUES
(58, 1, 27, 1, 55, 55),
(59, 1, 28, 1, 450, 450);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `cat_id` int(11) NOT NULL,
  `category_name` longtext NOT NULL,
  `slug` longtext NOT NULL,
  `seller_type` longtext NOT NULL,
  `description` longtext NOT NULL,
  `image` longtext NOT NULL,
  `date` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`cat_id`, `category_name`, `slug`, `seller_type`, `description`, `image`, `date`) VALUES
(24, 'Electronics', 'electronics', '3', 'View all the electronic services ', 'NGC_2244_Rosette_Nebula1613124608.jpg', '12 Feb 2021');

-- --------------------------------------------------------

--
-- Table structure for table `coupons`
--

CREATE TABLE `coupons` (
  `coupon_id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `code` varchar(128) NOT NULL,
  `percentage` varchar(128) NOT NULL,
  `expdate` varchar(128) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `coupons`
--

INSERT INTO `coupons` (`coupon_id`, `name`, `code`, `percentage`, `expdate`, `status`) VALUES
(2, 'New Year Offer', 'NYO21', '3', '2020-12-16', 1),
(3, 'Eid offer', 'EDO21', '5', '2021-02-28', 1);

-- --------------------------------------------------------

--
-- Table structure for table `coupon_used`
--

CREATE TABLE `coupon_used` (
  `use_id` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `coupon_id` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `coupon_used`
--

INSERT INTO `coupon_used` (`use_id`, `userid`, `coupon_id`, `status`) VALUES
(13, 4, 2, 0),
(14, 4, 2, 0),
(15, 4, 2, 0),
(16, 4, 2, 0),
(17, 4, 2, 0),
(18, 4, 2, 0),
(19, 4, 2, 0),
(20, 4, 2, 0),
(21, 4, 2, 0),
(22, 4, 2, 0),
(23, 4, 2, 0),
(24, 4, 2, 0),
(25, 4, 2, 0),
(26, 1, 2, 0);

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `message_id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `subject` varchar(1000) NOT NULL,
  `message` varchar(5000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`message_id`, `name`, `email`, `subject`, `message`) VALUES
(1, 'idrees', 'sidrees250@gmail.com', 'testing', 'hi i am testing'),
(2, 'idrees', 'sidrees250@gmail.com', 'testing', 'fg');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `order_number` varchar(256) NOT NULL,
  `userid` int(11) NOT NULL,
  `seller_id` longtext NOT NULL,
  `couponid` varchar(1000) DEFAULT NULL,
  `total_price` int(11) NOT NULL,
  `customer_details` varchar(5000) DEFAULT NULL,
  `time` varchar(256) NOT NULL,
  `notes` varchar(5000) DEFAULT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `order_number`, `userid`, `seller_id`, `couponid`, `total_price`, `customer_details`, `time`, `notes`, `status`) VALUES
(13, 'ORD2012220713', 4, '5', '', 1154, 'Galaxians, Mujahid undefined, Adil park main street, Sargodha 40100, Pakistan — Punjab, Pakistan, 03122985589, Mujahidfarooq57@gmail.com', '07:13 am 22-Dec-2020', 'this is test', 1),
(14, 'ORD2012220810', 4, '', '', 1154, 'Softileo, Mujahid undefined, Adil Park, sargodha 40100, punjab, Pakistan, 0132245635, mujahidfarooq57@gmail.com', '08:10 am 22-Dec-2020', 'test2342534', 1),
(26, 'ORD2012221919', 4, '', 'NYO21', 127, NULL, '07:19 pm 22-Dec-2020', NULL, 1),
(27, 'ORD2012230949', 4, '', '', 1146, 'Galaxians, Mujahid Farooq, Adil park main street, Sargodha 40100, Pakistan — Punjab, Pakistan, 03122985589, Mujahidfarooq57@gmail.com', '09:49 am 23-Dec-2020', 'test note', 1),
(28, 'ORD2012231812', 4, '', '', 131, 'Galaxians, Mujahid Farooq, Adil park main street, Sargodha 40100, Pakistan — Punjab, Pakistan, 03122985589, Mujahidfarooq57@gmail.com', '06:12 pm 23-Dec-2020', 'test', 1),
(30, 'ORD2101301412', 1, '', 'NYO21', 973, 'Softileo, Softileo Acadmy, asd, Sargodha 40100, Punjabv, Pakistan, 23545, info@softileo.com', '02:12 pm 30-Jan-2021', '', 1),
(31, 'ORD2101311232', 1, '', '', 6, NULL, '12:32 pm 31-Jan-2021', NULL, 0),
(32, 'ORD2102111611', 8, '', '', 115, NULL, '04:11 pm 11-Feb-2021', NULL, 0),
(33, 'ORD2102121434', 8, '', '', 175, 'dsfsdfsdfsd, weqweqwewqeqw`de srer, 22, 222 40100, 22222, Pakistan, 212112, Mujahidfarooq57@gmail.com', '02:34 pm 12-Feb-2021', 'fsf', 0),
(34, 'ORD2102131018', 8, '', '', 150, 'ksdjnlsi, jsdkj ksdjsl, 22, jkkenwk 40100, dflkd, Pakistan, 212112, Mujahidfarooq57@gmail.com', '10:18 am 13-Feb-2021', 'erffd', 1);

-- --------------------------------------------------------

--
-- Table structure for table `order_detail`
--

CREATE TABLE `order_detail` (
  `order_detail_id` int(11) NOT NULL,
  `order_number` varchar(256) NOT NULL,
  `product_id` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `shipping_fee` int(11) NOT NULL,
  `subtotal` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order_detail`
--

INSERT INTO `order_detail` (`order_detail_id`, `order_number`, `product_id`, `price`, `qty`, `shipping_fee`, `subtotal`) VALUES
(4, 'ORD2012190734', 9, 1000, 1, 3, 1003),
(5, 'ORD2012190734', 10, 100, 1, 25, 125),
(6, 'ORD2012190734', 11, 5, 5, 1, 26),
(7, 'ORD2012200727', 9, 1000, 1, 3, 1003),
(8, 'ORD2012200727', 10, 100, 1, 25, 125),
(9, 'ORD2012200727', 11, 5, 5, 1, 26),
(10, 'ORD2012220713', 9, 1000, 1, 3, 1003),
(11, 'ORD2012220713', 10, 100, 1, 25, 125),
(12, 'ORD2012220713', 11, 5, 5, 1, 26),
(13, 'ORD2012220810', 9, 1000, 1, 3, 1003),
(14, 'ORD2012220810', 10, 100, 1, 25, 125),
(15, 'ORD2012220810', 11, 5, 5, 1, 26),
(16, 'ORD2012221843', 11, 5, 1, 1, 6),
(17, 'ORD2012221843', 10, 100, 1, 25, 125),
(18, 'ORD2012221844', 11, 5, 1, 1, 6),
(19, 'ORD2012221844', 10, 100, 1, 25, 125),
(20, 'ORD2012221845', 11, 5, 1, 1, 6),
(21, 'ORD2012221845', 10, 100, 1, 25, 125),
(22, 'ORD2012221852', 11, 5, 1, 1, 6),
(23, 'ORD2012221852', 10, 100, 1, 25, 125),
(24, 'ORD2012221854', 11, 5, 1, 1, 6),
(25, 'ORD2012221854', 10, 100, 1, 25, 125),
(26, 'ORD2012221855', 11, 5, 1, 1, 6),
(27, 'ORD2012221855', 10, 100, 1, 25, 125),
(28, 'ORD2012221917', 11, 5, 1, 1, 6),
(29, 'ORD2012221917', 10, 100, 1, 25, 125),
(30, 'ORD2012221918', 11, 5, 1, 1, 6),
(31, 'ORD2012221918', 10, 100, 1, 25, 125),
(32, 'ORD2012221919', 11, 5, 1, 1, 6),
(33, 'ORD2012221919', 10, 100, 1, 25, 125),
(34, 'ORD2012230949', 11, 5, 1, 1, 6),
(35, 'ORD2012230949', 10, 100, 1, 25, 125),
(36, 'ORD2012230949', 9, 1000, 1, 3, 1003),
(37, 'ORD2012230949', 8, 10, 1, 2, 12),
(38, 'ORD2012231812', 10, 100, 1, 25, 125),
(39, 'ORD2012231812', 11, 5, 1, 1, 6),
(40, 'ORD2101261407', 9, 1000, 1, 3, 1003),
(41, 'ORD2101261407', 10, 100, 1, 25, 125),
(42, 'ORD2101301412', 9, 1000, 1, 3, 1003),
(43, 'ORD2101311232', 11, 5, 1, 1, 6),
(44, 'ORD2102111611', 23, 100, 1, 15, 115),
(45, 'ORD2102121434', 22, 50, 1, 10, 60),
(46, 'ORD2102121434', 23, 100, 1, 15, 115),
(47, 'ORD2102131018', 22, 50, 1, 0, 50),
(48, 'ORD2102131018', 23, 100, 1, 0, 100);

-- --------------------------------------------------------

--
-- Table structure for table `privacy_policy`
--

CREATE TABLE `privacy_policy` (
  `ID` int(11) NOT NULL,
  `en` longtext NOT NULL,
  `ar` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `privacy_policy`
--

INSERT INTO `privacy_policy` (`ID`, `en`, `ar`) VALUES
(1, 'english content', '');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL,
  `name` longtext NOT NULL,
  `slug` longtext NOT NULL,
  `cat_id` longtext NOT NULL,
  `subcat` longtext NOT NULL,
  `seller_id` longtext NOT NULL,
  `img` longtext NOT NULL,
  `short_description` longtext NOT NULL,
  `price` longtext NOT NULL,
  `stock` longtext DEFAULT NULL,
  `long_description` longtext DEFAULT NULL,
  `tags` longtext DEFAULT NULL,
  `meta_description` longtext DEFAULT NULL,
  `shipping_fee` longtext DEFAULT NULL,
  `is_featured` longtext NOT NULL,
  `status` longtext NOT NULL,
  `type` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `name`, `slug`, `cat_id`, `subcat`, `seller_id`, `img`, `short_description`, `price`, `stock`, `long_description`, `tags`, `meta_description`, `shipping_fee`, `is_featured`, `status`, `type`) VALUES
(27, 'Samsung Note 10', 'samsung note 10', '24', '12', '5', 'NGC_2244_Rosette_Nebula1613124858.jpg', 'Latest smartphone from samsung', '450', '45000', 'Latest Samsung Galaxy Note 10', 'samsung, galaxy, latest', '-----', '50', '1', '1', '3'),
(28, 'Samsung Note 15', 'samsung note 15', '24', '12', '5', 'wp3054739-dirilis-ertugrul-wallpapers1613201447.jpg', 'Latest smartphone from samsung', '55', '23', 'latest smart phone', 'samsung, galaxy, latest', 'dfdf', '5', '1', '1', '3');

-- --------------------------------------------------------

--
-- Table structure for table `product_gallery`
--

CREATE TABLE `product_gallery` (
  `imgid` int(11) NOT NULL,
  `imgurl` varchar(1000) NOT NULL,
  `pid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product_gallery`
--

INSERT INTO `product_gallery` (`imgid`, `imgurl`, `pid`) VALUES
(22, 'image.jpg\r\n\r\n\r\n\r\n', 8),
(23, 'Group 258.png', 9),
(24, 'Group 259.png', 9),
(25, 'Group 260.png', 9),
(26, 'Group 261.png', 9),
(27, 'Group 262.png', 9),
(29, 'Group 264.png', 9),
(30, 'Group 267.png', 9),
(31, 'Group 268.png', 9),
(32, 'Group 269.png', 9),
(33, 'foodapp1.jpeg', 9),
(35, 'pancake.jpg\r\n', 10),
(36, 'jeans-men-fashion.jpeg', 11);

-- --------------------------------------------------------

--
-- Table structure for table `refund_policy`
--

CREATE TABLE `refund_policy` (
  `ID` int(11) NOT NULL,
  `en` longtext NOT NULL,
  `ar` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `refund_policy`
--

INSERT INTO `refund_policy` (`ID`, `en`, `ar`) VALUES
(1, 'sdfsdfsdf', 'sdf');

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `review_id` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `rating` int(11) NOT NULL,
  `feedback` varchar(3000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`review_id`, `userid`, `product_id`, `rating`, `feedback`) VALUES
(1, 4, 11, 5, 'I got a stunning jeans, it is flexible and cost is reasonable as well.');

-- --------------------------------------------------------

--
-- Table structure for table `sellers`
--

CREATE TABLE `sellers` (
  `ID` int(11) NOT NULL,
  `name` longtext NOT NULL,
  `email` longtext NOT NULL,
  `password` longtext NOT NULL,
  `profile_image` longtext NOT NULL,
  `description` longtext NOT NULL,
  `type` longtext NOT NULL,
  `status` longtext NOT NULL,
  `product_commision` longtext NOT NULL,
  `balance` longtext NOT NULL,
  `date` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sellers`
--

INSERT INTO `sellers` (`ID`, `name`, `email`, `password`, `profile_image`, `description`, `type`, `status`, `product_commision`, `balance`, `date`) VALUES
(5, 'Samsung', 'info@samsung.com', '$2y$10$6rVHDQQ/gBZ002d.2iwZBu0Tg2a5PF8p2eCmq2aCMnG9LwNxV8Z12', 'NGC_2244_Rosette_Nebula1613124784.jpg', 'Samsung is the electronics company', '3', 'active', '40', '289.8', '12 Feb 2021');

-- --------------------------------------------------------

--
-- Table structure for table `seller_types`
--

CREATE TABLE `seller_types` (
  `ID` int(11) NOT NULL,
  `seller_type` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `seller_types`
--

INSERT INTO `seller_types` (`ID`, `seller_type`) VALUES
(2, 'Handcrafts'),
(3, 'Services'),
(5, 'Food');

-- --------------------------------------------------------

--
-- Table structure for table `subcategories`
--

CREATE TABLE `subcategories` (
  `ID` int(11) NOT NULL,
  `name` longtext NOT NULL,
  `parent_category` longtext NOT NULL,
  `date` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `subcategories`
--

INSERT INTO `subcategories` (`ID`, `name`, `parent_category`, `date`) VALUES
(12, 'Mobiles', '24', '12 Feb 2021');

-- --------------------------------------------------------

--
-- Table structure for table `superadmins`
--

CREATE TABLE `superadmins` (
  `ID` int(11) NOT NULL,
  `name` longtext NOT NULL,
  `email` longtext NOT NULL,
  `password` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `superadmins`
--

INSERT INTO `superadmins` (`ID`, `name`, `email`, `password`) VALUES
(1, 'sdffasdasd', 'user@email.com', '$2y$10$W/0XvyQ1i7qJxtK/icK5h.6u/bJxi7tAKuKYFhEk7YCYtPPZR2vba');

-- --------------------------------------------------------

--
-- Table structure for table `terms_of_use`
--

CREATE TABLE `terms_of_use` (
  `ID` int(11) NOT NULL,
  `en` longtext NOT NULL,
  `ar` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `terms_of_use`
--

INSERT INTO `terms_of_use` (`ID`, `en`, `ar`) VALUES
(1, 'english content', '');

-- --------------------------------------------------------

--
-- Table structure for table `transaction_history`
--

CREATE TABLE `transaction_history` (
  `ID` int(11) NOT NULL,
  `user_id` longtext NOT NULL,
  `seller` longtext NOT NULL,
  `paid_amount` longtext NOT NULL,
  `product_id` longtext NOT NULL,
  `date` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `transaction_history`
--

INSERT INTO `transaction_history` (`ID`, `user_id`, `seller`, `paid_amount`, `product_id`, `date`) VALUES
(1, '1', '1', '35', '9', '');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userid` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `username` varchar(128) NOT NULL,
  `email` varchar(256) NOT NULL,
  `phone` varchar(128) DEFAULT NULL,
  `password` varchar(128) NOT NULL,
  `address` varchar(512) DEFAULT NULL,
  `type` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userid`, `name`, `username`, `email`, `phone`, `password`, `address`, `type`) VALUES
(1, 'Mujahid Farooq ', 'softileo_mujahid', 'Mujahidfarooq57@yahoo.com', '923122985589', '123456789', 'Adil park sargodha', 2),
(4, 'Mujahid Farooq 1', 'mujahid589', 'Mujahidfarooq57@gmail.com', NULL, '12345678', NULL, 1),
(8, 'Another', 'another', 'another@somewhere.com', '1234567890', '123', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `wallet`
--

CREATE TABLE `wallet` (
  `ID` int(11) NOT NULL,
  `total_balance` longtext NOT NULL,
  `admin_balance` longtext NOT NULL,
  `seller_balance` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `wallet`
--

INSERT INTO `wallet` (`ID`, `total_balance`, `admin_balance`, `seller_balance`) VALUES
(1, '805', '202', '450');

-- --------------------------------------------------------

--
-- Table structure for table `wishlist`
--

CREATE TABLE `wishlist` (
  `id` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `product_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `withdraw_resquests`
--

CREATE TABLE `withdraw_resquests` (
  `ID` int(11) NOT NULL,
  `seller_id` longtext NOT NULL,
  `status` longtext NOT NULL,
  `amount` longtext NOT NULL,
  `date` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `withdraw_resquests`
--

INSERT INTO `withdraw_resquests` (`ID`, `seller_id`, `status`, `amount`, `date`) VALUES
(8, '12', 'delivered', '80', '12 Feb 2021');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `about`
--
ALTER TABLE `about`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`brand_id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `coupons`
--
ALTER TABLE `coupons`
  ADD PRIMARY KEY (`coupon_id`);

--
-- Indexes for table `coupon_used`
--
ALTER TABLE `coupon_used`
  ADD PRIMARY KEY (`use_id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`message_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `order_detail`
--
ALTER TABLE `order_detail`
  ADD PRIMARY KEY (`order_detail_id`);

--
-- Indexes for table `privacy_policy`
--
ALTER TABLE `privacy_policy`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `product_gallery`
--
ALTER TABLE `product_gallery`
  ADD PRIMARY KEY (`imgid`);

--
-- Indexes for table `refund_policy`
--
ALTER TABLE `refund_policy`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`review_id`);

--
-- Indexes for table `sellers`
--
ALTER TABLE `sellers`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `seller_types`
--
ALTER TABLE `seller_types`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `subcategories`
--
ALTER TABLE `subcategories`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `superadmins`
--
ALTER TABLE `superadmins`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `terms_of_use`
--
ALTER TABLE `terms_of_use`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `transaction_history`
--
ALTER TABLE `transaction_history`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userid`);

--
-- Indexes for table `wallet`
--
ALTER TABLE `wallet`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `wishlist`
--
ALTER TABLE `wishlist`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `withdraw_resquests`
--
ALTER TABLE `withdraw_resquests`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `about`
--
ALTER TABLE `about`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `brand_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `coupons`
--
ALTER TABLE `coupons`
  MODIFY `coupon_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `coupon_used`
--
ALTER TABLE `coupon_used`
  MODIFY `use_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `message_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `order_detail`
--
ALTER TABLE `order_detail`
  MODIFY `order_detail_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `privacy_policy`
--
ALTER TABLE `privacy_policy`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `product_gallery`
--
ALTER TABLE `product_gallery`
  MODIFY `imgid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `refund_policy`
--
ALTER TABLE `refund_policy`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `review_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `sellers`
--
ALTER TABLE `sellers`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `seller_types`
--
ALTER TABLE `seller_types`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `subcategories`
--
ALTER TABLE `subcategories`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `superadmins`
--
ALTER TABLE `superadmins`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `terms_of_use`
--
ALTER TABLE `terms_of_use`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `transaction_history`
--
ALTER TABLE `transaction_history`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `wallet`
--
ALTER TABLE `wallet`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `wishlist`
--
ALTER TABLE `wishlist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `withdraw_resquests`
--
ALTER TABLE `withdraw_resquests`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
