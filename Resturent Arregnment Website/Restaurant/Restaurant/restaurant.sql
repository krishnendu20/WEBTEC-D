-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 22, 2022 at 05:07 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.3.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `restaurant`
--

-- --------------------------------------------------------

--
-- Table structure for table `chat`
--

CREATE TABLE `chat` (
  `id` int(11) NOT NULL,
  `chat` text NOT NULL,
  `time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `chat`
--

INSERT INTO `chat` (`id`, `chat`, `time`) VALUES
(1, 'Hello', '2022-08-19 06:34:41'),
(2, 'Kemon achen', '2022-08-19 06:34:48'),
(0, 'Hii', '2022-08-21 19:33:12');

-- --------------------------------------------------------

--
-- Table structure for table `delivary`
--

CREATE TABLE `delivary` (
  `d_id` int(11) NOT NULL,
  `d_name` text NOT NULL,
  `d_type` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `delivary`
--

INSERT INTO `delivary` (`d_id`, `d_name`, `d_type`) VALUES
(1, 'Burger', 'Mohammadpur'),
(2, 'Pizza', 'Dhanmondi');

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `id` int(11) NOT NULL,
  `images` varchar(200) NOT NULL,
  `texts` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`id`, `images`, `texts`) VALUES
(1, '19-41794-3.jpg', 'Ratul'),
(2, '_Rocket.PNG', 'bahir'),
(3, 'MicrosoftTeams-image (8).png', '');

-- --------------------------------------------------------

--
-- Table structure for table `offers`
--

CREATE TABLE `offers` (
  `o_id` int(11) NOT NULL,
  `o_name` text NOT NULL,
  `o_details` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `offers`
--

INSERT INTO `offers` (`o_id`, `o_name`, `o_details`) VALUES
(4, '50% Discount', '50% Discount');

-- --------------------------------------------------------

--
-- Table structure for table `price`
--

CREATE TABLE `price` (
  `p_id` int(11) NOT NULL,
  `p_name` text NOT NULL,
  `p_price` text NOT NULL,
  `status` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `price`
--

INSERT INTO `price` (`p_id`, `p_name`, `p_price`, `status`) VALUES
(1, 'Pizza', '2000', 'Fiinished');

-- --------------------------------------------------------

--
-- Table structure for table `regis`
--

CREATE TABLE `regis` (
  `u_id` int(11) NOT NULL,
  `u_name` text NOT NULL,
  `u_email` text NOT NULL,
  `u_pass` text NOT NULL,
  `u_image` text NOT NULL,
  `u_country` text NOT NULL,
  `u_gender` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `regis`
--

INSERT INTO `regis` (`u_id`, `u_name`, `u_email`, `u_pass`, `u_image`, `u_country`, `u_gender`) VALUES
(1, 'Ratul Bhattacharjee', 'ratulrahulbhattacharjee@gmail.com', 'Rupok2bh@tt', 'default_cover.jpg', '', ''),
(2, 'Ratul Bhattacharjee', 'ratul@gmail.com', 'Ratul2bh@tt', 'Screenshot 2022-07-19 085446.png.34', '', ''),
(3, 'Maruf_mia', 'shoibal@gmail.com', '123456789', '19-41794-3.jpg.30', 'Bangladesh', 'Male');

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `s_id` int(11) NOT NULL,
  `s_name` text NOT NULL,
  `s_type` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`s_id`, `s_name`, `s_type`) VALUES
(5, 'Burger', 'Raw Materials'),
(6, 'Ratul', 'Seller');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `f_name` text NOT NULL,
  `l_name` text NOT NULL,
  `user_name` text NOT NULL,
  `user_pass` text NOT NULL,
  `user_email` text NOT NULL,
  `user_gender` text NOT NULL,
  `user_image` text NOT NULL,
  `recovery_account` text NOT NULL,
  `user_ip` text NOT NULL,
  `salary` text NOT NULL,
  `food` text NOT NULL,
  `hour` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `f_name`, `l_name`, `user_name`, `user_pass`, `user_email`, `user_gender`, `user_image`, `recovery_account`, `user_ip`, `salary`, `food`, `hour`) VALUES
(6, 'Shoibal', 'Shaha', 'shoibal_shaha_34280', 'Shoibal2bh@tt', 'ratul@gmail.com', 'Male', 'head_red.jpg', 'Type Best Friend Name.', 'saha', '', '', ''),
(7, 'Ratul', 'bhattacharjee ', 'ratul_bhattacharjee _599891', 'Ratul2bh@tt', 'maruf@gamil.com', 'Female', 'placeholder.jpg', 'Type Best Friend Name.', 'maruf', '20000', 'Burger', '12 hour');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `u_id` int(11) NOT NULL,
  `u_name` text NOT NULL,
  `u_type` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`u_id`, `u_name`, `u_type`) VALUES
(1, 'Ratul', 'Seller'),
(2, 'Maruf', 'Customer'),
(3, 'Mohok', 'Seller'),
(4, 'Ratul', 'Raw Materials');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `delivary`
--
ALTER TABLE `delivary`
  ADD PRIMARY KEY (`d_id`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `offers`
--
ALTER TABLE `offers`
  ADD PRIMARY KEY (`o_id`);

--
-- Indexes for table `price`
--
ALTER TABLE `price`
  ADD PRIMARY KEY (`p_id`);

--
-- Indexes for table `regis`
--
ALTER TABLE `regis`
  ADD PRIMARY KEY (`u_id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`s_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`u_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `delivary`
--
ALTER TABLE `delivary`
  MODIFY `d_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `offers`
--
ALTER TABLE `offers`
  MODIFY `o_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `price`
--
ALTER TABLE `price`
  MODIFY `p_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `regis`
--
ALTER TABLE `regis`
  MODIFY `u_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `s_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `u_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
