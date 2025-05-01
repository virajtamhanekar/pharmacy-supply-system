-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 27, 2023 at 06:55 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_pharma`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL DEFAULT 0,
  `user_id` int(11) NOT NULL DEFAULT 0,
  `qnty` int(11) NOT NULL DEFAULT 0,
  `status` int(5) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `product_id`, `user_id`, `qnty`, `status`) VALUES
(1, 1, 1, 2, 1),
(4, 4, 2, 2, 0),
(5, 5, 1, 1, 1),
(6, 14, 1, 1, 1),
(7, 12, 4, 1, 1),
(8, 11, 4, 2, 1),
(9, 14, 4, 1, 1),
(10, 9, 4, 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL DEFAULT 0,
  `country` varchar(255) NOT NULL DEFAULT '',
  `firstname` varchar(255) NOT NULL DEFAULT '',
  `lastname` varchar(255) NOT NULL DEFAULT '',
  `company` varchar(255) NOT NULL DEFAULT '',
  `address1` text NOT NULL DEFAULT '',
  `address2` text NOT NULL DEFAULT '',
  `state` varchar(255) NOT NULL DEFAULT '',
  `zip` varchar(255) NOT NULL DEFAULT '',
  `email` varchar(255) NOT NULL DEFAULT '',
  `phone` varchar(255) NOT NULL DEFAULT '',
  `note` text NOT NULL DEFAULT '',
  `coupon` varchar(255) NOT NULL DEFAULT '',
  `total` int(20) NOT NULL DEFAULT 0,
  `status` int(11) NOT NULL DEFAULT 0,
  `cart_ids` varchar(255) NOT NULL DEFAULT '',
  `date` date NOT NULL DEFAULT current_timestamp(),
  `done` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `country`, `firstname`, `lastname`, `company`, `address1`, `address2`, `state`, `zip`, `email`, `phone`, `note`, `coupon`, `total`, `status`, `cart_ids`, `date`, `done`) VALUES
(1, 1, 'India', 'Nikhil', 'Mishra', 'no', 'Mendoza chawl', 'Room no 11', 'Maharashtra', '400060', 'nikhilmishra7208150840@gmail.com', '7208150840', 'vxcvvvvxv', '', 148, 6, '1,5', '2023-02-23', 1),
(2, 2, '', '', '', '', '', '', '', '', '', '', '', '', 1137, 7, '1,5,6', '0000-00-00', 2),
(3, 4, 'India', 'Rohan', 'Yadav', '', 'nallasopara', '', 'maharashtra', '410252', 'rohan123@gmail.com', '7895485687', 'plz shift on this address', '', 114, 6, '7,8', '2023-02-27', 1),
(4, 4, 'India', 'Nikhil', 'Mishra', 'no', 'fdfdfd', 'Room no 11', 'Maharashtra', '400060', 'nikhilmishra7208150840@gmail.com', '', 'fgdfgdgdg', '', 443, 0, '7,8,9,10', '2023-02-27', 0);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL DEFAULT '',
  `price` varchar(255) NOT NULL DEFAULT '0',
  `sale_price` varchar(255) NOT NULL DEFAULT '0',
  `image` text NOT NULL DEFAULT '',
  `cat_id` int(11) NOT NULL DEFAULT 0,
  `dash_id` int(11) NOT NULL DEFAULT 0,
  `material` text NOT NULL DEFAULT '',
  `description` text NOT NULL DEFAULT '',
  `packaging` text NOT NULL DEFAULT '',
  `hpis` text NOT NULL DEFAULT '',
  `hprovider` text NOT NULL DEFAULT '',
  `latex` text NOT NULL DEFAULT '',
  `medication_r` text NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `price`, `sale_price`, `image`, `cat_id`, `dash_id`, `material`, `description`, `packaging`, `hpis`, `hprovider`, `latex`, `medication_r`) VALUES
(1, 'Bioderma', '90.00', '55.00', 'images/Uploads/63f8f9747014cproduct_01.png', 1, 1, 'OTC022401	', 'Pain Management: Acetaminophen PM Extra-Strength Caplets, 500 mg, 100/Bottle', '1 BT', '999_200_40_0', 'No', 'Yes, No', 'Topical'),
(2, 'Chanca Piedra', '70.00', '', 'images/Uploads/product_02.png', 1, 2, 'OTC022401	', 'Pain Management: Acetaminophen PM Extra-Strength Caplets, 500 mg, 100/Bottle', '1 BT', '999_200_40_0', 'No', 'Yes, No', 'Topical'),
(3, 'Umcka Cold Care', '120.00', '', 'images/Uploads/product_03.png', 1, 3, 'OTC022401	', 'Pain Management: Acetaminophen PM Extra-Strength Caplets, 500 mg, 100/Bottle', '1 BT', '999_200_40_0', 'No', 'Yes, No', 'Topical'),
(4, 'Cetyl Pure', '45.00', '20.00', 'images/Uploads/product_04.png', 1, 4, 'OTC022401	', 'Pain Management: Acetaminophen PM Extra-Strength Caplets, 500 mg, 100/Bottle', '1 BT', '999_200_40_0', 'No', 'Yes, No', 'Topical'),
(5, 'CLA Core', '38.00', '', 'images/Uploads/product_05.png', 1, 5, 'OTC022401	', 'Pain Management: Acetaminophen PM Extra-Strength Caplets, 500 mg, 100/Bottle', '1 BT', '999_200_40_0', 'No', 'Yes, No', 'Topical'),
(6, 'Poo Pourri', '89.00', '38.00', 'images/Uploads/product_06.png', 1, 6, 'OTC022401	', 'Pain Management: Acetaminophen PM Extra-Strength Caplets, 500 mg, 100/Bottle', '1 BT', '999_200_40_0', 'No', 'Yes, No', 'Topical'),
(7, 'Bioderma', '95.00', '55.00', 'images/Uploads/product_01.png', 1, 1, 'OTC022401	', 'Pain Management: Acetaminophen PM Extra-Strength Caplets, 500 mg, 100/Bottle', '1 BT', '999_200_40_0', 'No', 'Yes, No', 'Topical'),
(8, 'Chanca Piedra', '70.00', '', 'images/Uploads/product_02.png', 1, 2, 'OTC022401	', 'Pain Management: Acetaminophen PM Extra-Strength Caplets, 500 mg, 100/Bottle', '1 BT', '999_200_40_0', 'No', 'Yes, No', 'Topical'),
(9, 'Umcka Cold Care', '120.00', '', 'images/Uploads/product_03.png', 1, 3, 'OTC022401	', 'Pain Management: Acetaminophen PM Extra-Strength Caplets, 500 mg, 100/Bottle', '1 BT', '999_200_40_0', 'No', 'Yes, No', 'Topical'),
(10, 'Cetyl Pure', '45.00', '20.00', 'images/Uploads/product_04.png', 1, 4, 'OTC022401	', 'Pain Management: Acetaminophen PM Extra-Strength Caplets, 500 mg, 100/Bottle', '1 BT', '999_200_40_0', 'No', 'Yes, No', 'Topical'),
(11, 'CLA Core', '38.00', '', 'images/Uploads/product_05.png', 1, 5, 'OTC022401	', 'Pain Management: Acetaminophen PM Extra-Strength Caplets, 500 mg, 100/Bottle', '1 BT', '999_200_40_0', 'No', 'Yes, No', 'Topical'),
(12, 'Poo Pourri', '89.00', '38.00', 'images/Uploads/product_06.png', 1, 6, 'OTC022401	', 'Pain Management: Acetaminophen PM Extra-Strength Caplets, 500 mg, 100/Bottle', '1 BT', '999_200_40_0', 'No', 'Yes, No', 'Topical'),
(14, 'abcd', '89', '', 'images/Uploads/product_01.png', 0, 0, 'scsc', 'sdcscc', 'csdcscc', 'csdccscc', 'sdcscsdcsc', '', 'sdccscc');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL DEFAULT '',
  `email` varchar(255) NOT NULL DEFAULT '',
  `password` varchar(255) NOT NULL DEFAULT '',
  `type` varchar(11) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `type`) VALUES
(1, 'Nikhil Mishra', 'nikhilmishra7208150840@gmail.com', '123', ''),
(2, 'Safin Alfanso', 'safin123@gmail.com', 's123', ''),
(3, 'admin', 'admin123@gmail.com', 'admin', 'A'),
(4, 'Rohan Yadav', 'rohan123@gmail.com', 'rohan123', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
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
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
