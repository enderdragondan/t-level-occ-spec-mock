-- phpMyAdmin SQL Dump
-- version 5.1.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Feb 14, 2025 at 03:10 PM
-- Server version: 5.7.24
-- PHP Version: 8.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `healthadvice`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `firstname` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lastname` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(16) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `question` int(11) DEFAULT NULL,
  `answer` text COLLATE utf8mb4_unicode_ci,
  `isAdmin` tinyint(1) NOT NULL DEFAULT '0',
  `hayFever` tinyint(1) NOT NULL DEFAULT '0',
  `asthma` tinyint(1) NOT NULL DEFAULT '0',
  `heart` tinyint(1) NOT NULL DEFAULT '0',
  `heat` tinyint(1) NOT NULL DEFAULT '0',
  `cold` tinyint(1) NOT NULL DEFAULT '0',
  `skin` tinyint(1) NOT NULL DEFAULT '0',
  `migraines` tinyint(1) NOT NULL DEFAULT '0',
  `jointPain` tinyint(1) NOT NULL DEFAULT '0',
  `dustMold` tinyint(1) NOT NULL DEFAULT '0',
  `heatstroke` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `username`, `password`, `question`, `answer`, `isAdmin`, `hayFever`, `asthma`, `heart`, `heat`, `cold`, `skin`, `migraines`, `jointPain`, `dustMold`, `heatstroke`) VALUES
(1, 'Daniel', 'Morgan', 'danmo', '$2y$10$1vdmPyJWlXhWgArg/nAwpO.TQFRAbRDNoJWTEGejbbjcQVTjEi0FO', 2, '$2y$10$Nf7XGDeirDJoEAD.tFzhx.s2qxciAR.iQk3f/juggQee6WQ5wOuk2', 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(2, 'John', 'Doe', 'johndoe123', '$2y$10$opE/B2k2zN6/bRSlUEJ7MOQja50b1L6IYAT.ZZ0e9TtGAu66sqUt6', 2, '$2y$10$qYN3TE.6NVP1F0bQ1bKRA.0neev3x4xHwYaC.lDnZgWcuO531JmrO', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(4, 'Nate', 'Han', 'Nate-Han', '$2y$10$CZkdb36AsP0zH62.pHMD1OIG0tKnRJkEqnSik9Vo0LYkEzHhV1cSm', 1, '$2y$10$3eOCt0EBDvDqijVPIIcBq.ACNbpMNBLVcVvc6ftzbf1rRJuXAGNXS', 0, 0, 0, 0, 1, 0, 0, 0, 1, 0, 0);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
