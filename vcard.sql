-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 20, 2024 at 05:45 AM
-- Server version: 8.0.30
-- PHP Version: 8.3.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `vcard`
--

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` int NOT NULL,
  `firstname` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `lastname` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `company` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `jobtitle` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `emailwork` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `emailhome` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `phonework` varchar(20) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `phonehome` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `website` varchar(250) COLLATE utf8mb4_general_ci NOT NULL,
  `city` varchar(250) COLLATE utf8mb4_general_ci NOT NULL,
  `state` varchar(120) COLLATE utf8mb4_general_ci NOT NULL,
  `note` varchar(250) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `firstname`, `lastname`, `company`, `jobtitle`, `emailwork`, `emailhome`, `phonework`, `phonehome`, `website`, `city`, `state`, `note`) VALUES
(3, 'dhruv', 'bhimani', 'Google ', 'CEO', 'dhruv22bhimani@gmail.com', 'dhruvbhimani2222@gmail.com', '9824880325', '9023998946', 'xyz.com', 'Bhavnagar ', 'Gujarat ', 'blah blah'),
(4, 'vihar', 'ramavat', 'amazon ', 'Owner', 'viharramavat@gmail.com', '', '8460576097', '', 'xyz.com', 'Bhavnagar ', 'Gujarat ', 'blah blah'),
(6, '360 tester', '360 tester03', '360 INC', 'Executive Trainee', '360tester03@gmail.com', '360tester02@gmail.com', '971055123456', '97124360852', 'https://wewant360.com', 'Bhavnagar ', 'Gujarat ', 'doing testing kindly ignore this message etc');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
