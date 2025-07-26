-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 22, 2023 at 11:13 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mystore`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart_details`
--

CREATE TABLE `cart_details` (
  `product_id` int(11) NOT NULL,
  `ip_address` varchar(255) NOT NULL,
  `quantity` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cart_details`
--

INSERT INTO `cart_details` (`product_id`, `ip_address`, `quantity`) VALUES
(15, '::1', 0),
(25, '::1', 2);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `category_id` int(11) NOT NULL,
  `category_title` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`category_id`, `category_title`) VALUES
(1, 'Fruits'),
(2, 'vagetables-1'),
(3, 'vagetable-2'),
(4, 'Fish'),
(5, 'Meat'),
(6, 'Grain');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL,
  `product_title` varchar(100) NOT NULL,
  `product_description` varchar(255) NOT NULL,
  `product_keywords` varchar(255) NOT NULL,
  `category_id` int(11) NOT NULL,
  `product_image1` varchar(255) NOT NULL,
  `product_image2` varchar(255) NOT NULL,
  `product_image3` varchar(255) NOT NULL,
  `product_price` varchar(100) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_title`, `product_description`, `product_keywords`, `category_id`, `product_image1`, `product_image2`, `product_image3`, `product_price`, `date`, `status`) VALUES
(13, 'Rui Fish', 'Rui fish brought from the river', 'ruifish.rui.goodfish.fish', 4, 'rui.jpg', 'rui2.jpg', 'rui3.webp', '480', '2023-08-19 09:19:48', 'true'),
(14, 'Shrimp Fish(chingri)', 'Saltwater fish', 'shrimpfish.fish.goodfish.chingri', 4, 'chingri2.jpg', 'chingri1.jpg', 'chingri3.jpeg', '800', '2023-08-19 09:25:16', 'true'),
(15, 'Puti ', 'brought from the river', 'puti.fish', 4, 'puti1.webp', 'puti2.jpg', 'puti3.jpg', '250', '2023-08-19 09:28:45', 'true'),
(16, 'Spinach(Pui shak)', 'vegetables picked today', 'spinach.puishak', 2, 'puishak1.webp', 'puishak2.webp', 'puishak3.jpg', '40', '2023-08-19 09:33:33', 'true'),
(17, 'Musterd(sharisha)', 'Brought from Rangpur', 'Musterd.sharisha', 6, 'mustard1.jpg', 'shorisha2.jpg', 'mustard3.jpg', '600', '2023-08-19 09:37:38', 'true'),
(18, 'Basmati Rice', 'brought from Dinajpur', 'rice.basmati', 6, 'basmoti1.webp', 'basmoti2.jpg', 'basmati-rice3.jpg', '95', '2023-08-19 09:39:36', 'true'),
(19, 'Apple', 'brought from Kashmir', 'apple.fruit', 1, 'apple2.jpg', 'apple1.jpg', 'apple3.jpg', '220', '2023-08-19 09:41:13', 'true'),
(20, 'Banana', 'brought from Narsingdi', 'banana.fruit', 1, 'banana1.webp', 'banana2.webp', 'banana3.jpg', '40', '2023-08-19 09:42:09', 'true'),
(21, 'Aman Rich', 'brought from Dinajpur', 'aman.rice', 6, 'aman2.jpg', 'aman.jpg', 'aman3.png', '65', '2023-08-19 09:45:28', 'true'),
(22, 'Anar', 'Fresh Fruits', 'anar.fruit', 1, 'anar1.webp', 'anar2.jpg', 'anar3.jpg', '380', '2023-08-19 09:46:52', 'true'),
(23, 'Spinach(palang shak)', 'Fresh Spinach', 'Spinach.palang.shak', 2, 'palong1.jpg', 'palong2.jpg', 'palong3.jpg', '35', '2023-08-19 09:50:24', 'true'),
(24, 'Bottle Gourd(Lau)', 'Fresh bottle gourd', 'lau.bottlegourd.vagetable', 3, 'lau1.jpeg', 'lau2.jpg', 'lau3.png', '60', '2023-08-19 09:53:35', 'true'),
(25, 'Eggplant', 'Two type of eggplant are here', 'eggplant.vagetable', 3, 'begun1.webp', 'begun2.jpg', 'begun3.jpg', '65', '2023-08-19 16:33:24', 'true');

-- --------------------------------------------------------

--
-- Table structure for table `user_table`
--

CREATE TABLE `user_table` (
  `user_id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `user_gmail` varchar(100) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `user_image` varchar(255) NOT NULL,
  `user_ip` varchar(100) NOT NULL,
  `user_address` varchar(255) NOT NULL,
  `user_mobile` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart_details`
--
ALTER TABLE `cart_details`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `user_table`
--
ALTER TABLE `user_table`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `user_table`
--
ALTER TABLE `user_table`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
