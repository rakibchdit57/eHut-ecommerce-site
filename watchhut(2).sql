-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 24, 2017 at 08:11 AM
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
-- Database: `watchhut`
--

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `brand_id` int(20) NOT NULL,
  `brand_title` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`brand_id`, `brand_title`) VALUES
(1, 'Rado'),
(2, 'Rolex'),
(5, 'Nivada'),
(8, 'fujifilm'),
(9, 'nikon'),
(10, 'canon'),
(11, 'Apple'),
(12, 'LG SET'),
(13, 'Huwai'),
(14, 'Spine fidget'),
(15, 'Samsung');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(10) NOT NULL,
  `p_id` int(10) NOT NULL,
  `user_id` int(10) NOT NULL,
  `product_title` varchar(200) NOT NULL,
  `product_image` varchar(200) NOT NULL,
  `qty` int(10) NOT NULL,
  `price` int(10) NOT NULL,
  `total_amt` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `p_id`, `user_id`, `product_title`, `product_image`, `qty`, `price`, `total_amt`) VALUES
(91, 22, 37, 'Fujifilm camera', 'fujifilm2.jpg', 1, 200, 200),
(92, 23, 37, 'Fidget Spinner', 'f2.png', 2, 40, 80),
(97, 26, 36, 'Iphone Case', 'iphone7Case.jpg', 1, 42, 42);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `cat_id` int(20) NOT NULL,
  `cat_title` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`cat_id`, `cat_title`) VALUES
(1, 'Computer Accessories'),
(2, 'Electronics'),
(4, 'Mans Staff'),
(5, 'Watch'),
(7, 'Furniture'),
(9, 'Camera'),
(10, 'pendrivesss'),
(11, 'Household'),
(12, 'Spinner');

-- --------------------------------------------------------

--
-- Table structure for table `contact_us`
--

CREATE TABLE `contact_us` (
  `id` int(230) NOT NULL,
  `name` varchar(230) NOT NULL,
  `email` varchar(230) NOT NULL,
  `subject` varchar(230) NOT NULL,
  `message` varchar(230) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contact_us`
--

INSERT INTO `contact_us` (`id`, `name`, `email`, `subject`, `message`, `date`) VALUES
(1, 'Israt Jahan', 'israt@gamil.com', 'suggestions', 'jdkfjdkfjdk', '0000-00-00'),
(2, 'saikat sarkar', 'saikat@gmail.com', 'suggestions', 'dfkdjskfjdskjfkjdf', '2017-08-07'),
(3, 'salma Haq', 'salma@gmail.com', 'service', 'good\r\n', '2017-08-09');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `product_id` int(17) NOT NULL,
  `product_category_id` int(17) NOT NULL,
  `product_brand_id` int(17) NOT NULL,
  `product_title` varchar(255) NOT NULL,
  `product_price` varchar(255) NOT NULL,
  `product_description` text NOT NULL,
  `product_image` text NOT NULL,
  `product_keyword` varchar(255) NOT NULL,
  `product_qty` int(20) NOT NULL,
  `product_status` varchar(250) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`product_id`, `product_category_id`, `product_brand_id`, `product_title`, `product_price`, `product_description`, `product_image`, `product_keyword`, `product_qty`, `product_status`, `date`) VALUES
(22, 9, 8, 'Fujifilm camera', '200', 'Amazing camera', 'fujifilm2.jpg', 'fujifilm,camera', 5, 'New', '2017-09-22'),
(23, 12, 14, 'Fidget Spinner', '40', 'We use it for decrease our stress', 'f2.png', 'fidget,spinner', 3, ' ', '2017-09-22'),
(24, 1, 11, 'Iphone 10', '200', 'This is latest model of iphone10', 'AppleMLL.jpg', 'iphone,iphone10', 7, 'New', '2017-09-22'),
(25, 9, 15, 'Samsung Camera', '300', 'Samsung camera is one of the best', 'canon2.jpg', 'samsung,camera', 9, ' ', '2017-09-22'),
(26, 2, 11, 'Iphone Case', '42', 'Very useful to use as iphone case', 'iphone7Case.jpg', 'case,iphone', 9, 'New', '2017-09-22'),
(27, 2, 11, 'Iphone diamond case', '23', 'Very useful to use as iphone case', 'iphone7plus.png', 'iphone,iphone case', 9, ' ', '2017-09-22'),
(28, 9, 8, 'Fujifilm camera', '87', 'Paneroma camera ', 'fujifilm2.jpg', 'fujifilm,camera', 3, 'New', '2017-09-22'),
(29, 9, 9, 'Nikon Camera', '78', 'Amazing Nikon camera with flash', 'nikon1.jpg', 'Nikon,camera', 34, 'Sale', '2017-09-22'),
(30, 5, 1, 'Rado Watch', '42', 'Stylish watch for man', 'rolex1.jpg', 'rado,watch,man', 7, ' ', '2017-09-22'),
(33, 4, 14, 'Fidget spinner', '42', 'Fidget spinner for boys', 'f1.jpg', 'fidget,spinner,spinetech', 8, ' ', '2017-09-22'),
(35, 2, 12, 'LG mobile', '32', 'LG mobile with New feature', 'Lg mobile1.jpeg', 'LG mobile', 32, ' ', '2017-09-22'),
(38, 1, 1, 'Canon Camera', '21', 'Amazing camera with flash', 'pp.jpg', 'Canon,camera', 32, '', '2017-09-22'),
(39, 1, 1, 'Canon EOS', '42', 'Amazing camera with flash', 'pp.jpg', 'EOS,Canon', 9, '', '2017-09-22'),
(40, 9, 15, 'Samsung Camera', '21', 'Samsung camera is nice to use', 'samsung camera.jpg', 'samsung,camera', 21, 'Sale', '2017-09-22'),
(41, 5, 2, 'Rolex Watch', '90', 'Stylish rolex watch', 'watch4.jpg', 'rado,watch,man', 43, 'New', '2017-09-22'),
(42, 4, 1, 'Rado Watch', '32', 'Amazing rado watch', 'rolex2.jpg', 'rado,watch,man', 32, 'Sale', '2017-09-22');

-- --------------------------------------------------------

--
-- Table structure for table `product_gift_sending_address`
--

CREATE TABLE `product_gift_sending_address` (
  `id` int(230) NOT NULL,
  `product_title` varchar(230) NOT NULL,
  `product_price` varchar(230) NOT NULL,
  `product_qty` varchar(230) NOT NULL,
  `product_description` varchar(230) NOT NULL,
  `gift_sending_address` varchar(230) NOT NULL,
  `gift_address` varchar(230) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product_gift_sending_address`
--

INSERT INTO `product_gift_sending_address` (`id`, `product_title`, `product_price`, `product_qty`, `product_description`, `gift_sending_address`, `gift_address`) VALUES
(1, 'Rolex Watch', ' 100', '7', 'rolex watch is good ', 'No', 'Colombia                               \r\n                        '),
(2, 'Iphone ', ' 600', '8', 'fdfdfdf', 'Yes', '   Washington DC                            \r\n                        ');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(33) NOT NULL,
  `user_firstname` varchar(200) NOT NULL,
  `user_lastname` varchar(200) NOT NULL,
  `user_gender` varchar(200) NOT NULL,
  `username` varchar(200) NOT NULL,
  `user_password` varchar(200) NOT NULL,
  `user_email` varchar(200) NOT NULL,
  `user_contact_no` varchar(200) NOT NULL,
  `user_role` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_firstname`, `user_lastname`, `user_gender`, `username`, `user_password`, `user_email`, `user_contact_no`, `user_role`) VALUES
(36, 'kazi', 'afroz', 'Female', 'kazi123', '1234', 'dfdf@gmail.com', '0188888', 'admin'),
(37, 'Rakib', 'Chowdhury', 'Male', 'rakibch', '1234', 'rakib@gmail.com', '01734343434', 'subscriber');

-- --------------------------------------------------------

--
-- Table structure for table `user_address`
--

CREATE TABLE `user_address` (
  `id` int(40) NOT NULL,
  `u_address` varchar(250) NOT NULL,
  `first_name` varchar(250) NOT NULL,
  `last_name` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL,
  `mobile_no` varchar(250) NOT NULL,
  `country` varchar(250) NOT NULL,
  `city` varchar(250) NOT NULL,
  `pincode` varchar(250) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_address`
--

INSERT INTO `user_address` (`id`, `u_address`, `first_name`, `last_name`, `email`, `mobile_no`, `country`, `city`, `pincode`, `date`) VALUES
(22, '                               \r\n some address                                           ', 'rabab', 'islam', 'rakib9204@gmail.com', '01234567897', 'kjkj', 'jjjjjjjj', '12345', '2017-08-07'),
(24, 'b block banani dhaka                               \r\n                                            ', 'jahid', 'siraz', 'jahid@gmail.com', '987654321698', 'arabia', 'fjdk', 'jfdkjfkdj', '2017-08-08'),
(25, 'washington dc                               \r\n                                            ', 'ismith', 'pasha', 'pasha@gmail.com', '87649338888', 'USA ', 'bogota', '1234', '2017-08-08'),
(26, 'F block bonosree,Dhaka                               \r\n                                            ', 'Sinthia', 'Saha', 'rakib9204@gmail.com', '01723930101', 'Bangladesh', 'Brahmanbaria', '321', '2017-09-22'),
(27, 'Sahabazar,Puran Dhaka                               \r\n                                            ', 'Saha', 'MInoti', 'saha@gmail.com', '01348292039', 'Bangladesh', 'Dhaka', '422', '2017-09-22'),
(28, 'Sahabazar,Puran Dhaka                               \r\n                                            ', 'Saha', 'MInoti', 'saha@gmail.com', '01348292039', 'Bangladesh', 'Dhaka', '422', '2017-09-22');

--
-- Indexes for dumped tables
--

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
-- Indexes for table `contact_us`
--
ALTER TABLE `contact_us`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `product_gift_sending_address`
--
ALTER TABLE `product_gift_sending_address`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `user_address`
--
ALTER TABLE `user_address`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `brand_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=98;
--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `cat_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `contact_us`
--
ALTER TABLE `contact_us`
  MODIFY `id` int(230) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(17) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;
--
-- AUTO_INCREMENT for table `product_gift_sending_address`
--
ALTER TABLE `product_gift_sending_address`
  MODIFY `id` int(230) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(33) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;
--
-- AUTO_INCREMENT for table `user_address`
--
ALTER TABLE `user_address`
  MODIFY `id` int(40) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
