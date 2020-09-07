-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 07, 2020 at 12:35 PM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `phpcrud`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `email`, `phone`) VALUES
(1, 'Andrew', 'Green', 'admin@blacklinks.co.uk', '+44 203 291 3292'),
(10, 'Reaz', 'Mohammad', 'onlinereaz@gmail.com', '+44 203 291 3292'),
(12, 'Pradip', 'Kalia', 'pradipkaliya63136@gmail.com', '+44 203 291 3292'),
(13, 'Atul', 'Salvi', 'atulsalvi01@gmail.com', '+44 203 291 3292'),
(14, 'Dhak', 'Shak', 'dakshag84@gmail.com', '+44 203 291 3292'),
(15, 'Anor', 'Ullah', 'anwaryzi05@gmil.com', '+44 203 291 3292'),
(16, 'Ramzan', 'freelancer', 'Ramzan.nano@gmail.com', '+44 203 291 3292'),
(24, 'Rokon ', 'Ahmed', 'rokon2308@gmail.com', '+88 01989 032098'),
(25, 'Omar ', 'Faruk', 'gadgetfuture.bd@gmail.com', '01974122700'),
(26, 'Md Aminul', 'Islam', 'mdahadaminul@gmail.com', '+8801521257123'),
(27, 'Ahmed ', 'Riaj', 'ahmadreaz@gmail.com', '+8801521257122');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
