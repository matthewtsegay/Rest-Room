-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 28, 2024 at 04:14 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `login-register`
--

-- --------------------------------------------------------

--
-- Table structure for table `guesthouse`
--

CREATE TABLE `guesthouse` (
  `id` int(11) NOT NULL,
  `Room_number` varchar(10) NOT NULL,
  `type` varchar(50) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `availability` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `guesthouse`
--

INSERT INTO `guesthouse` (`id`, `Room_number`, `type`, `price`, `availability`) VALUES
(14, '103', 'double', 2000.00, 0),
(16, '202', 'double', 2500.00, 0),
(19, '205', 'vip', 10000.00, 0),
(20, '220', 'single', 1000.00, 0);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(100) NOT NULL,
  `full_name` varchar(50) NOT NULL DEFAULT '',
  `email` varchar(255) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `full_name`, `email`, `password`) VALUES
(1, 'matyos tsegayu', 'matyostsegay@gmail.com', '$2y$10$ccWx.vXZiGmjkbJ7UpV.eeueioEhJnsrj4pWYZv6InfWUfHhNBFwm'),
(2, 'samuel zeray', 'natnaeldems12a@gmail.com', '$2y$10$uLCzXfZrbMFiWBg.CLYgPea2JqVi/0KzeRQAqQswGzoU8VS6GGmL2'),
(3, 'semere huruy', 'semerehuruy@gmail.com', '$2y$10$0I0tUuQJaLWWahR5QqT67ue9kFT.x8mGMIcFi7DdwrMcTsoobCfuO'),
(4, 'kiros gebremedhin', 'kiros@gmail.com', '$2y$10$WeogZlfxEnCCgFfMbxa1Te6ET539RCzJQtf21aeU9vjyxIK8wlj9q'),
(21, 'natnael dems', 'natnael@gmail.com', '$2y$10$V/t5w.t.T/uGepJyvEDlq.HS/JVAXZDriWd0CEATcTc6N4zKhPUw6'),
(22, 'medhaniye negash', 'meda@gmail.com', '$2y$10$LuY/sU3hSuSZ1Uq8vMHbiOQ2O09OJDwIkXdHgtyUZk8q1vgMJqUtm');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `guesthouse`
--
ALTER TABLE `guesthouse`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD UNIQUE KEY `id` (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `guesthouse`
--
ALTER TABLE `guesthouse`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
