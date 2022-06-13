-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 13, 2022 at 05:16 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `teszt`
--

-- --------------------------------------------------------

--
-- Table structure for table `robot`
--

CREATE TABLE `robot` (
  `id` int(11) NOT NULL,
  `Name` varchar(200) COLLATE utf8_hungarian_ci NOT NULL,
  `Cast` varchar(200) COLLATE utf8_hungarian_ci NOT NULL,
  `Power` int(11) NOT NULL,
  `Deleted` varchar(10) COLLATE utf8_hungarian_ci NOT NULL DEFAULT 'false'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- Dumping data for table `robot`
--

INSERT INTO `robot` (`id`, `Name`, `Cast`, `Power`, `Deleted`) VALUES
(14, 'Valeera', 'Rouge', 3, 'false'),
(15, 'Garrosh', 'Brawler', 2, 'false'),
(16, 'Kaelthas', 'Assault', 3, 'false'),
(17, 'Ilidan', 'Rouge', 4, 'false'),
(18, 'Uther', 'Brawler', 5, 'false'),
(19, 'Jaina', 'Assault', 6, 'false'),
(21, 'Thrall', 'Brawler', 7, 'false'),
(23, 'Varian', 'Brawler', 2, 'false'),
(24, 'Arthas', 'Brawler', 10, 'false'),
(25, 'Zuljin', 'Brawler', 0, 'true'),
(26, 'Sylvanas', 'Brawler', 0, 'true'),
(27, 'Saurfang', 'Brawler', 1, 'true'),
(28, 'Deathwing', 'Assault', 12, 'false'),
(29, 'Anduin', 'Brawler', 8, 'false'),
(30, 'Lunara', 'Assault', 10, 'false');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `robot`
--
ALTER TABLE `robot`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `robot`
--
ALTER TABLE `robot`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
