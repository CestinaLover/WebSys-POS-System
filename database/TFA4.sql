-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: sql204.infinityfree.com
-- Generation Time: Oct 06, 2026 at 09:58 AM
-- Server version: 11.4.13-MariaDB
-- PHP Version: 7.2.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `if0_42899174_tfa2`
--

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` int(11) NOT NULL,
  `full_name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `created_at` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `full_name`, `email`, `phone`, `created_at`) VALUES
(1, 'Joshua Concepcion', 'joshua@example.com', '09171254567', '2026-09-19 08:00:00'),
(2, 'Gian Saba', 'gian@example.com', '09181674567', '2026-09-19 09:00:00'),
(3, 'Jim Hernandez', 'jim@example.com', '09191226567', '2026-09-19 10:00:00'),
(4, 'Andrei Dulguime', 'andrei@example.com', '09201994567', '2026-09-19 11:00:00'),
(5, 'Daniella Haro', 'daniella@example.com', '09207234567', '2026-09-19 12:00:00'),
(6, 'Jimbo123', 'Nandez123@email.com', '6767123', '2026-10-03 13:03:18'),
(7, 'Aldous Damaso', 'aldous@gmail.com', '676721', '2026-10-03 13:35:25');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `full_name` varchar(100) NOT NULL,
  `created_at` datetime NOT NULL,
  `avatar` varchar(255) DEFAULT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `full_name`, `created_at`, `avatar`, `password`) VALUES
(1, 'JoshuaTurtle', 'Joshua Concepcion', '2026-09-19 08:00:00', '1791034672_8771d6e8992cf5db51ba.png', '$2y$10$ge4eOLdKehz7ggqhY4zGHebqI.GLSN2OkMOb6.Spx5k.E6.baqHO2'),
(2, 'GinaStick', 'Gian Saba', '2026-09-19 09:00:00', '1791034838_a68fa92c5d587d04f660.jpg', ''),
(3, 'JimmyHenny', 'Jim Hernandez', '2026-09-19 10:00:00', '1791034635_44acdc2f5ac9aca7dbf1.png', ''),
(4, 'Andwei', 'Andrei Dulguime', '2026-09-19 11:00:00', '1791034807_aad58b11a14dcc61adf9.jpg', ''),
(5, 'Nyellies1', 'Daniella Haro1', '2026-09-19 12:00:00', '1791034979_d8fbea7bd76786445a0c.jpg', ''),
(6, 'Dousy', 'Aldous Damaso', '2026-10-03 13:35:49', '1791034614_0270347a07cb99f9139d.jpg', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
