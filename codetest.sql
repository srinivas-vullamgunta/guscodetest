-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 21, 2020 at 06:23 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.2.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `codetest`
--

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `message` text NOT NULL,
  `created_datetime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `name`, `email`, `message`, `created_datetime`) VALUES
(8, 'Jhon', 'srinivas.vullamgunta@gmail.com', 'this is test message', '2020-05-20 20:52:13'),
(9, 'Jhon', 'srinivas.vullamgunta@gmail.com', 'this is test message', '2020-05-20 20:52:13'),
(10, 'jack', 'vasu.9v@gmail.com', 'test msg', '2020-05-20 20:52:13'),
(11, 'jack', 'vsrinivas9v@gmail.com', 'This is test message', '2020-05-20 20:52:13');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `order_quantity` int(11) NOT NULL,
  `created_datetime` datetime NOT NULL,
  `modified_datetime` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `product_id`, `order_quantity`, `created_datetime`, `modified_datetime`) VALUES
(1, 2, 2, '2020-05-20 21:07:05', '2020-05-20 15:37:25'),
(2, 10, 5, '2020-05-20 20:50:43', '2020-05-20 15:37:25'),
(3, 2, 3, '2020-05-20 21:07:45', '2020-05-20 15:38:03'),
(4, 6, 2, '2020-05-20 20:50:43', '2020-05-20 15:38:03'),
(5, 5, 1, '2020-05-20 21:08:07', '2020-05-20 15:38:39'),
(6, 4, 1, '2020-05-20 20:50:43', '2020-05-20 15:38:39'),
(7, 3, 2, '2020-05-20 21:08:51', '2020-05-20 15:39:10'),
(8, 10, 1, '2020-05-20 20:52:13', '2020-05-20 15:39:10'),
(9, 7, 1, '2020-05-20 21:09:13', '2020-05-20 15:39:32'),
(10, 5, 1, '2020-05-20 20:50:43', '2020-05-20 15:39:32');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `image` varchar(100) NOT NULL,
  `created_datetime` datetime NOT NULL,
  `modified_datetime` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `image`, `created_datetime`, `modified_datetime`) VALUES
(1, 'Mildred and Sam', '20215-M.jpg', '2020-05-20 20:50:43', '2020-05-20 15:22:04'),
(2, 'Chiken Little', '462969-M.jpg', '2020-05-20 20:50:43', '2020-05-20 15:22:04'),
(3, 'One Bean', '571138-M.jpg', '2020-05-20 20:52:13', '2020-05-20 15:23:08'),
(4, 'Policeman', '2929519-M.jpg', '2020-05-20 20:52:13', '2020-05-20 15:23:08'),
(5, 'Mystory', '7413258-M.jpg', '2020-05-20 20:52:13', '2020-05-20 15:28:03'),
(6, 'Malory Towers', '7834609-M.jpg', '2020-05-20 20:52:13', '2020-05-20 15:28:03'),
(7, 'Truck', '8259166-M.jpg', '2020-05-20 20:52:13', '2020-05-20 15:28:03'),
(8, 'The Habbit', '8406786-M.jpg', '2020-05-20 20:52:13', '2020-05-20 15:28:03'),
(9, 'The Big', '9176033-M.jpg', '2020-05-20 20:52:13', '2020-05-20 15:28:03'),
(10, 'Dragons Code', '9400192-M.jpg', '2020-05-20 20:52:13', '2020-05-20 15:28:03');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_order_key` (`product_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `product_order_key` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
