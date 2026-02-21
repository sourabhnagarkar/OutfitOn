-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 22, 2025 at 06:19 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ocrs`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `cloth_id` int(11) DEFAULT NULL,
  `added_at` datetime DEFAULT current_timestamp(),
  `name` varchar(255) DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `photo` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `user_id`, `cloth_id`, `added_at`, `name`, `price`, `photo`) VALUES
(1, 0, 3, '2025-06-17 22:07:56', NULL, NULL, NULL),
(2, 0, 5, '2025-06-17 22:09:21', NULL, NULL, NULL),
(3, 0, 8, '2025-06-18 21:00:11', 'Kanchipuram Saree', 290.00, 'uploads/cloth_68529275de0ac2.63870107.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `clothes`
--

CREATE TABLE `clothes` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `category` varchar(50) NOT NULL,
  `size` varchar(20) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `photo` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL,
  `vendor_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `clothes`
--

INSERT INTO `clothes` (`id`, `name`, `description`, `category`, `size`, `price`, `photo`, `user_id`, `vendor_id`) VALUES
(3, 'Silk Saree', 'indian Saree', 'Ethnic', 'L', 450.00, 'uploads/cloth_68517255c3d3b1.82049981.jpeg', 1, NULL),
(5, 'Party Dress', 'heavy Party Dress in chepp', 'Casual', 'M', 250.00, 'uploads/cloth_685178def09850.10745922.jpeg', 1, NULL),
(8, 'Kanchipuram Saree', 'Best out ware for Tradition or family function', 'Ethnic', 'XL', 290.00, 'uploads/cloth_68529275de0ac2.63870107.jpeg', 1, NULL),
(9, 'Tshart', 'aeretuiyuosegvhbjn', 'Formal', 'M', 250.00, 'uploads/cloth_6855510e450430.02962536.jpeg', 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `submitted_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`id`, `email`, `name`, `description`, `submitted_at`) VALUES
(1, 'sourbhnagarkar26@gmail.com', 'Sourabh Nagarkar', 'juefwurdgowpogfknjfi', '2025-06-07 04:29:29'),
(2, 'sourbhnagarkar26@gmail.com', 'Sourabh Nagarkar', 'Helo guys', '2025-06-07 04:33:53'),
(8, 'sanjanadeshbhandari310@gmail.com', 'Pavitra Anandu Gouda', 'hello sir i have faceing login problem plazz help mee', '2025-06-11 18:24:08'),
(9, 'admin@example.com', 'ran', 'hahj7gj ,mj', '2025-06-20 12:22:23');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `vendor_id` int(11) DEFAULT NULL,
  `cloth_id` int(11) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `payment_method` varchar(20) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `city` varchar(100) DEFAULT NULL,
  `state` varchar(100) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL,
  `tdate` date DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `fdate` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `vendor_id`, `cloth_id`, `name`, `price`, `photo`, `payment_method`, `address`, `city`, `state`, `phone`, `email`, `status`, `tdate`, `created_at`, `fdate`) VALUES
(1, 1, 1, 3, 'Sourabh Nagarkar', 450.00, 'uploads/cloth_68517255c3d3b1.82049981.jpeg', 'COD', 'PG Mulla Bus Stop,kodibag Road', 'Bengaluru', 'Karnataka', '8971073230', 'sourbhnagarkar26@gmail.com', 'Pending', NULL, '2025-06-19 16:41:56', NULL),
(2, 1, 1, 5, 'Sourabh Nagarkar', 250.00, 'uploads/cloth_685178def09850.10745922.jpeg', 'COD', 'PG Mulla Bus Stop,kodibag Road', 'Bengaluru', 'Karnataka', '8971073230', 'sourbhnagarkar26@gmail.com', 'Pending', NULL, '2025-06-19 16:41:56', NULL),
(3, 1, 1, 3, 'Sourabh Nagarkar', 450.00, 'uploads/cloth_68517255c3d3b1.82049981.jpeg', 'COD', 'PG Mulla Bus Stop,kodibag Road', 'Bengaluru', 'Karnataka', '8971073230', 'sourbhnagarkar26@gmail.com', 'Pending', NULL, '2025-06-19 16:52:01', NULL),
(4, 1, 1, 5, 'Sourabh Nagarkar', 250.00, 'uploads/cloth_685178def09850.10745922.jpeg', 'COD', 'PG Mulla Bus Stop,kodibag Road', 'Bengaluru', 'Karnataka', '8971073230', 'sourbhnagarkar26@gmail.com', 'Pending', NULL, '2025-06-19 16:52:01', NULL),
(5, 1, 1, 8, 'Sourabh Nagarkar', 290.00, 'uploads/cloth_68529275de0ac2.63870107.jpeg', 'COD', 'PG Mulla Bus Stop,kodibag Road', 'Bengaluru', 'Karnataka', '8971073230', 'sourbhnagarkar26@gmail.com', 'Pending', NULL, '2025-06-19 16:52:01', NULL),
(6, 1, 1, 3, 'Sourabh Nagarkar', 450.00, 'uploads/cloth_68517255c3d3b1.82049981.jpeg', 'COD', 'PG Mulla Bus Stop,kodibag Road', 'Bengaluru', 'Karnataka', '8971073230', 'sourbhnagarkar26@gmail.com', 'Pending', '2025-07-03', '2025-06-20 05:46:43', '2025-06-20'),
(7, 1, 1, 8, 'Sourabh Nagarkar', 290.00, 'uploads/cloth_68529275de0ac2.63870107.jpeg', 'COD', 'PG Mulla Bus Stop,kodibag Road', 'Bengaluru', 'Karnataka', '8971073230', 'sourbhnagarkar26@gmail.com', 'Pending', '2025-07-03', '2025-06-20 05:46:43', '2025-06-20'),
(8, 1, 1, 3, 'Sourabh Nagarkar', 450.00, 'uploads/cloth_68517255c3d3b1.82049981.jpeg', 'COD', 'PG Mulla Bus Stop,kodibag Road', 'Bengaluru', 'Karnataka', '8971073230', 'sourbhnagarkar26@gmail.com', 'approved', '2025-06-26', '2025-06-20 06:35:40', '2025-06-27'),
(9, 1, 1, 3, 'Sourabh Nagarkar', 450.00, 'uploads/cloth_68517255c3d3b1.82049981.jpeg', 'COD', 'PG Mulla Bus Stop,kodibag Road', 'Bengaluru', 'Karnataka', '8971073230', 'sourbhnagarkar26@gmail.com', 'Pending', '2025-07-11', '2025-06-20 08:45:44', '2025-06-27'),
(10, 1, 1, 3, 'Sourabh Nagarkar', 450.00, 'uploads/cloth_68517255c3d3b1.82049981.jpeg', 'COD', 'PG Mulla Bus Stop,kodibag Road', 'Bengaluru', 'Karnataka', '8971073230', 'sourbhnagarkar26@gmail.com', 'Pending', '2025-06-20', '2025-06-20 10:00:46', '2025-06-20'),
(11, 1, 1, 5, 'Sourabh Nagarkar', 250.00, 'uploads/cloth_685178def09850.10745922.jpeg', 'COD', 'PG Mulla Bus Stop,kodibag Road', 'Bengaluru', 'Karnataka', '8971073230', 'sourbhnagarkar26@gmail.com', 'Pending', '2025-06-20', '2025-06-20 10:00:46', '2025-06-20'),
(12, 1, 1, 3, 'Sourabh Nagarkar', 450.00, 'uploads/cloth_68517255c3d3b1.82049981.jpeg', 'COD', 'PG Mulla Bus Stop,kodibag Road', 'Bengaluru', 'Karnataka', '8971073230', 'sourbhnagarkar26@gmail.com', 'shipped', '2025-07-05', '2025-06-20 10:05:19', '2025-06-20'),
(13, 1, 1, 3, 'Sourabh Nagarkar', 450.00, 'uploads/cloth_68517255c3d3b1.82049981.jpeg', 'COD', 'PG Mulla Bus Stop,kodibag Road', 'Bengaluru', 'Karnataka', '8971073230', 'sourbhnagarkar26@gmail.com', 'completed', '2025-06-10', '2025-06-20 10:25:06', '2025-06-17'),
(14, 1, 1, 3, 'Sourabh Nagarkar', 450.00, 'uploads/cloth_68517255c3d3b1.82049981.jpeg', 'COD', 'PG Mulla Bus Stop,kodibag Road', 'Bengaluru', 'Karnataka', '8971073230', 'sourbhnagarkar26@gmail.com', 'shipped', '2025-06-17', '2025-06-20 11:10:12', '2025-06-12'),
(15, 1, 1, 3, 'Sourabh Nagarkar', 450.00, 'uploads/cloth_68517255c3d3b1.82049981.jpeg', 'COD', 'PG Mulla Bus Stop,kodibag Road', 'Bengaluru', 'Karnataka', '8971073230', 'sourbhnagarkar26@gmail.com', 'completed', '2025-06-17', '2025-06-20 11:11:21', '2025-06-23'),
(16, 1, 1, 5, 'Sourabh Nagarkar', 250.00, 'uploads/cloth_685178def09850.10745922.jpeg', 'COD', 'PG Mulla Bus Stop,kodibag Road', 'Bengaluru', 'Karnataka', '8971073230', 'sourbhnagarkar26@gmail.com', 'completed', '2025-06-17', '2025-06-20 11:11:21', '2025-06-23'),
(17, 1, 1, 3, 'Sourabh Nagarkar', 450.00, 'uploads/cloth_68517255c3d3b1.82049981.jpeg', 'COD', 'PG Mulla Bus Stop,kodibag Road', 'Bengaluru', 'Karnataka', '8971073230', 'sourbhnagarkar26@gmail.com', 'Pending', '2025-06-20', '2025-06-20 12:10:10', '2025-06-20'),
(18, 1, 1, 8, 'Sourabh Nagarkar', 290.00, 'uploads/cloth_68529275de0ac2.63870107.jpeg', 'COD', 'PG Mulla Bus Stop,kodibag Road', 'Bengaluru', 'Karnataka', '8971073230', 'sourbhnagarkar26@gmail.com', 'Pending', '2025-06-20', '2025-06-20 12:10:10', '2025-06-20'),
(19, 1, 1, 8, 'Sourabh Nagarkar', 290.00, 'uploads/cloth_68529275de0ac2.63870107.jpeg', 'COD', 'PG Mulla Bus Stop,kodibag Road', 'Bengaluru', 'Karnataka', '8971073230', 'sourbhnagarkar26@gmail.com', 'Pending', '2025-06-28', '2025-06-20 12:12:50', '2025-06-20'),
(20, 1, 1, 5, 'Sourabh Nagarkar', 250.00, 'uploads/cloth_685178def09850.10745922.jpeg', 'COD', 'PG Mulla Bus Stop,kodibag Road', 'Bengaluru', 'Karnataka', '8971073230', 'sourbhnagarkar26@gmail.com', 'Pending', '2025-07-11', '2025-06-20 13:25:07', '2025-06-20'),
(21, 1, 1, 3, 'Sourabh Nagarkar', 450.00, 'uploads/cloth_68517255c3d3b1.82049981.jpeg', 'COD', 'PG Mulla Bus Stop,kodibag Road', 'Bengaluru', 'Karnataka', '8971073230', 'sourbhnagarkar26@gmail.com', 'Pending', '2025-07-11', '2025-06-20 13:25:07', '2025-06-20'),
(22, 1, 1, 3, 'Sourabh Nagarkar', 450.00, 'uploads/cloth_68517255c3d3b1.82049981.jpeg', 'COD', 'PG Mulla Bus Stop,kodibag Road', 'Bengaluru', 'Karnataka', '8971073230', 'sourbhnagarkar26@gmail.com', 'cancelled', '2025-06-20', '2025-06-20 13:52:25', '2025-06-20'),
(23, 1, 1, 3, 'Sourabh Nagarkar', 450.00, 'uploads/cloth_68517255c3d3b1.82049981.jpeg', 'COD', 'PG Mulla Bus Stop,kodibag Road', 'Bengaluru', 'Karnataka', '8971073230', 'sourbhnagarkar26@gmail.com', 'cancelled', '2025-06-27', '2025-06-20 14:00:46', '2025-06-20'),
(24, 1, 1, 3, 'Sourabh Nagarkar', 450.00, 'uploads/cloth_68517255c3d3b1.82049981.jpeg', 'COD', 'PG Mulla Bus Stop,kodibag Road', 'Bengaluru', 'Karnataka', '8971073230', 'sourbhnagarkar26@gmail.com', 'Pending', '2025-06-20', '2025-06-20 16:59:03', '2025-06-20'),
(25, 1, 1, 9, 'Sourabh Nagarkar', 250.00, 'uploads/cloth_6855510e450430.02962536.jpeg', 'COD', 'PG Mulla Bus Stop,kodibag Road', 'Bengaluru', 'Karnataka', '8971073230', 'sourbhnagarkar26@gmail.com', 'Pending', '2025-06-20', '2025-06-20 16:59:03', '2025-06-20'),
(26, 1, 1, 5, 'Sourabh Nagarkar', 250.00, 'uploads/cloth_685178def09850.10745922.jpeg', 'COD', 'PG Mulla Bus Stop,kodibag Road', 'Bengaluru', 'Karnataka', '8971073230', 'sourbhnagarkar26@gmail.com', 'cancelled', '2025-06-27', '2025-06-20 20:14:23', '2025-06-21'),
(27, 1, 1, 3, 'Sourabh Nagarkar', 450.00, 'uploads/cloth_68517255c3d3b1.82049981.jpeg', 'COD', 'PG Mulla Bus Stop,kodibag Road', 'Bengaluru', 'Karnataka', '8971073230', 'sourbhnagarkar26@gmail.com', 'Pending', '2025-06-27', '2025-06-20 20:14:23', '2025-06-21'),
(28, 1, 1, 3, 'Sourabh Nagarkar', 450.00, 'uploads/cloth_68517255c3d3b1.82049981.jpeg', 'COD', 'PG Mulla Bus Stop,kodibag Road', 'Bengaluru', 'Karnataka', '8971073230', 'sourbhnagarkar26@gmail.com', 'Pending', '2025-06-18', '2025-06-21 14:16:16', '2025-06-19');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `address` text NOT NULL,
  `state` varchar(100) NOT NULL,
  `city` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `name`, `phone`, `address`, `state`, `city`, `password`) VALUES
(1, 'sourbhnagarkar26@gmail.com', 'Sourabh Nagarkar', '8971073230', 'PG Mulla Bus Stop,kodibag Road', 'Karnataka', 'Bengaluru', '$2y$10$8xa2IH9oJeMNRdGlFIvN5.A0NryiTWPt6qhN.ikpuyRZSRihYBVjq'),
(2, 'sourbh@gmail.com', 'Sourabh Nagarkar', '8971073230', 'PG Mulla Bus Stop,kodibag Road', 'Karnataka', 'Bengaluru', '$2y$10$kEkPpqBB4T/EhONRpRDC/ee7.DmILIyJdtcsY.hSjiv/YkJnX65by'),
(3, 'pavitragouda956@gmail.com', 'Sujata Murlapur', '8971073230', 'karan', 'Karnataka', 'Mysuru', '$2y$10$qbw.3Jq.bDn1/JZHdAZq8uY5JwcH58bjyPV6YrXpIFUXjcbIM0pS2'),
(4, 'sourbhnagarkar26@h.com', 'Sourabh Nagarkar', '8971073230', 'Mulla stop', 'Karnataka', 'Bengaluru', '$2y$10$hTZJnno04BU/qm9hv/Mp4OIWdCWu4sJ075nGYQ2aDxXm1SyUQUg/m'),
(5, 'sourbhnagarka@gmail.com', 'Sourabh Nagarkar', '8971073230', 'Mulla', 'Karnataka', 'Mysuru', '$2y$10$rQqli1UoZMW8AVYQQMuKe.NtaxGKY6yHAHBli1wYwc9oKn80bi1MO'),
(6, 'sourbhnag@gmail.com', 'Sourabh', '8971073230', 'efjirguhegfw', 'Karnataka', 'Mangaluru', '$2y$10$y68L8GqBMbjPAA/tbWQ1EuWqkVCnRCZJxlppadn9QdwgR.Qgrsbye');

-- --------------------------------------------------------

--
-- Table structure for table `vendors`
--

CREATE TABLE `vendors` (
  `id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `address` text NOT NULL,
  `state` varchar(100) NOT NULL,
  `city` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `vendors`
--

INSERT INTO `vendors` (`id`, `email`, `name`, `phone`, `address`, `state`, `city`, `password`) VALUES
(1, 'sourbhnagarkar26@gmail.com', 'Sourabh Nagarkar', '8971073230', 'Karwar', 'Karnataka', 'Bengaluru', '$2y$10$KOupWDyBxqVb0AxL4uYQFeyp1tPjMzrp/Pu6oRZcO8dVIW0uuXdWC'),
(2, 'admin@example.com', 'Sourabh', '8971073230', 'Karwar', 'Karnataka', 'Mysuru', '$2y$10$TI0S3DfmTV4fJBsj4rAxfeHjl4NEbQR0IwOSTO0xe/lGnTzEQoNJ6');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `clothes`
--
ALTER TABLE `clothes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `vendors`
--
ALTER TABLE `vendors`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `clothes`
--
ALTER TABLE `clothes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `vendors`
--
ALTER TABLE `vendors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
