-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Värd: localhost:8889
-- Tid vid skapande: 07 maj 2024 kl 12:32
-- Serverversion: 5.7.39
-- PHP-version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Databas: `roffokap`
--

-- --------------------------------------------------------

--
-- Tabellstruktur `item`
--

CREATE TABLE `item` (
  `id` int(11) NOT NULL,
  `sellerId` int(11) NOT NULL,
  `name` varchar(55) DEFAULT NULL,
  `type` varchar(55) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `price` int(11) NOT NULL,
  `sold_date` date DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumpning av Data i tabell `item`
--

INSERT INTO `item` (`id`, `sellerId`, `name`, `type`, `description`, `price`, `sold_date`, `created_at`, `updated_at`) VALUES
(1, 1, 'Gucci', 'Solglasögon', 'This is a second hand item. The product is in very good condition and almost like new.', 250, NULL, '2024-04-28 16:04:37', '2024-04-28 16:04:37'),
(2, 3, 'Pre-loved', 'dress', 'This is a second hand item. The item is in good condition with no obvious defects.', 200, NULL, '2024-04-28 16:04:37', '2024-04-28 16:04:37'),
(3, 2, 'Amisu', 'Biker jacket', 'This is a second hand item. The product is in very good condition and almost like new.', 800, NULL, '2024-04-28 16:04:37', '2024-04-28 16:04:37'),
(4, 6, 'Amore & dress', 'Long dress', 'This is a second hand item. The item is in good condition with no obvious defects.', 250, NULL, '2024-04-28 16:04:37', '2024-04-28 16:04:37'),
(5, 6, 'Rosemunde ', ' dress', 'This is a second hand item. The item is in good condition with no obvious defects.', 299, NULL, '2024-04-28 16:04:37', '2024-04-28 16:04:37');

-- --------------------------------------------------------

--
-- Tabellstruktur `seller`
--

CREATE TABLE `seller` (
  `id` int(11) NOT NULL,
  `first_name` varchar(40) DEFAULT NULL,
  `last_name` varchar(40) DEFAULT NULL,
  `email` varchar(55) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumpning av Data i tabell `seller`
--

INSERT INTO `seller` (`id`, `first_name`, `last_name`, `email`, `phone`, `created_at`, `updated_at`) VALUES
(1, 'Sahra', 'Bile', 'sahra.bile13456@gmail.com', '0723201976', '2024-04-28 16:02:17', '2024-04-28 16:02:17'),
(2, 'Nicklas', 'Söderlund', 'nicklassoderlund96@gmail.com', '0723201943', '2024-04-28 16:02:17', '2024-04-28 16:02:17'),
(3, 'Ponny', 'Halloj', 'ponny@gmail.com', '0723555555', '2024-04-28 16:02:17', '2024-04-28 16:02:17'),
(4, 'Misan', 'Mops', 'misan@live.se', '0723201936', '2024-04-28 16:02:17', '2024-04-28 16:02:17'),
(5, 'Henrietta', 'Jeansson', 'hj@hotmail.com', '0723201976', '2024-04-28 16:02:17', '2024-04-28 16:02:17'),
(6, 'Ruby', 'Cotton', 'miabush@blogspot.com', '0723201476', '2024-04-28 16:02:17', '2024-04-28 16:02:17'),
(7, 'Tove', 'Lissner', 'tove.lissner@medieinstitutet.se', '0723401976', '2024-04-28 16:02:17', '2024-04-28 16:02:17');

--
-- Index för dumpade tabeller
--

--
-- Index för tabell `item`
--
ALTER TABLE `item`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sellerId` (`sellerId`);

--
-- Index för tabell `seller`
--
ALTER TABLE `seller`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT för dumpade tabeller
--

--
-- AUTO_INCREMENT för tabell `item`
--
ALTER TABLE `item`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT för tabell `seller`
--
ALTER TABLE `seller`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Restriktioner för dumpade tabeller
--

--
-- Restriktioner för tabell `item`
--
ALTER TABLE `item`
  ADD CONSTRAINT `item_ibfk_1` FOREIGN KEY (`sellerId`) REFERENCES `seller` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
