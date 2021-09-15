-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 29, 2021 at 07:34 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 7.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `vsga`
--

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `author` varchar(255) NOT NULL,
  `publisher` varchar(255) NOT NULL,
  `category` varchar(255) NOT NULL,
  `year` varchar(255) NOT NULL,
  `images` varchar(1000) NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`id`, `title`, `author`, `publisher`, `category`, `year`, `images`, `status`) VALUES
(30, 'Da vinci Code', 'Dan Brown', 'Doubleday‎', 'Novel', '2003', '612a3c0b45215.jpg', 'Available'),
(31, 'Harry Potter and the Cursed Child', 'J.K Rowling', 'Bloomsbury Publishing', 'Novel', '2009', '612a3c2720e86.jpg', 'Borrowed'),
(32, 'The Lord of the Ring', 'J. R. R. Tolkien', 'Doubleday‎', 'Novel', '1956', '612a3c4979eb6.jpg', 'Borrowed'),
(33, 'Laskar Pelangi', 'Andrea Hirata', 'Bentang Pustaka', 'Novel', '2005', '612a3c7262926.jpg', 'Borrowed'),
(34, 'Sepatu Dahlan', 'Khrisna Pabichara', 'GagasMedia', 'Novel', '2012', '612a3cad0981a.jpg', 'Available');

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE `member` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `s_code` varchar(255) NOT NULL,
  `study` varchar(255) NOT NULL,
  `adress` varchar(255) NOT NULL,
  `gender` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`id`, `name`, `s_code`, `study`, `adress`, `gender`) VALUES
(1, 'Muhammad James', '6706192020', 'Informatika', 'Jl. kebon raya no 19', 'Male'),
(3, 'Primanda Sayarizki', '6706192060', 'Software Enginnering', 'Jl. Entok Putih', 'Male'),
(4, 'Noordin M Floop', '6706192260', 'Medical', 'Jl. Kolor Hijau', 'I prepare not to share'),
(5, 'Nunung', '6706122063', 'Art', 'Jl. Merdeka', 'Female');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `name`, `date`, `password`) VALUES
(10, 'primanda@gmail.com', 'Primanda Sayarizki', '2001-07-20', '$2y$10$sQDiJ1lKsrr4mAaIDZgNn.vmJxR.Z8ZHehDLLAPcXb57fY2BvR3.6'),
(11, 'qwerty@gmail.com', 'popon', '2021-08-28', '$2y$10$fejUcogVoEO9oa/HiwzV5OrJm3DWkObvYZCCBLYOLFu1mXvbzcPAO');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `member`
--
ALTER TABLE `member`
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
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `member`
--
ALTER TABLE `member`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
