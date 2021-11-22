-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 29, 2021 at 05:16 PM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 8.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `plantmonitoring`
--

-- --------------------------------------------------------

--
-- Table structure for table `plant_data`
--

CREATE TABLE `plant_data` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `temperature` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '15˚ - 20˚',
  `daylight` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Yes',
  `water_duration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '7',
  `water_times` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `image` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'default.png',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `plant_data`
--

INSERT INTO `plant_data` (`id`, `name`, `temperature`, `daylight`, `water_duration`, `water_times`, `image`, `created_at`, `updated_at`) VALUES
(1, 'Strawberry', '15˚ - 20˚', 'Yes', '7', '3', 'Plant_1_Strawberry.png', '2021-08-29 10:49:18', NULL),
(2, 'Raspberries', '20˚ - 25˚', 'Yes', '7', '2', 'Plant_2_raspberrry.jpg', '2021-08-29 10:49:53', NULL),
(3, 'Cactus', '15˚ - 20˚', 'No', '14', '1', 'Plant_3_cactus.jpg', '2021-08-29 10:49:53', NULL),
(4, 'Aloe-vera', '15˚ - 25˚', 'No', '14', '1', 'Plant_4_aloe vera.jpg', '2021-08-29 10:49:53', NULL),
(5, 'Boston Fern', '18˚ - 25˚', 'No', '7', '3', 'Plant_5_boston fern.jpg', '2021-08-29 10:49:53', NULL),
(6, 'Jade', '18˚ - 24˚', 'No', '14', '1', 'Plant_6_jade.jpg', '2021-08-29 10:49:53', NULL),
(7, 'Monestera', '15˚ - 25˚', 'No', '7', '1', 'Plant_7_monstera.jpg', '2021-08-29 10:49:53', NULL),
(8, 'Snake', '16˚ - 24˚', 'No', '2', '1', 'Plant_8_snake.jpg', '2021-08-29 10:49:53', NULL),
(9, 'String of Pearls', '25˚ - 30˚', 'Yes', '14', '1', 'Plant_9_pearls.jpg', '2021-08-29 10:49:53', NULL),
(10, 'Devil\'s Ivy', '15˚ - 30˚', 'No', '7', '1', 'Plant_10_devil\'s ivy.jpg', '2021-08-29 10:49:53', NULL),
(11, 'Orchid', '15˚ - 20˚', 'No', '7', '1', 'Plant_11_orchid.jpg', '2021-08-29 10:52:51', NULL),
(12, 'Peace Lilly', '20˚ - 30˚', 'No', '7', '1', 'Plant_12_peace lily.png', '2021-08-29 10:52:51', NULL),
(13, 'Fiddle Leaf Fig', '18˚ - 25˚', 'Yes', '14', '1', 'Plant_13_fiddle leaf.jpg', '2021-08-29 10:52:51', NULL),
(14, 'Ocimum Tenuiflorum', '20˚ - 28˚', 'Yes', '7', '2', 'Plant_14_Ocimum.jpg', '2021-08-29 10:52:51', NULL),
(15, 'Spider', '13˚ - 18˚', 'No', '7', '1', 'Plant_15_spider.jpeg', '2021-08-29 10:52:51', NULL),
(16, 'Money', '15˚ - 25˚', 'Yes', '7', '1', 'Plant_16_money.jpg', '2021-08-29 10:52:51', NULL),
(17, 'Hoya Kerrii', '25˚ - 35˚', 'Yes', '14', '1', 'Plant_17_hoya.jpg', '2021-08-29 10:52:51', NULL),
(18, 'Venus Flytrap', '21˚ - 35˚', 'Yes', '2', '1', 'Plant_18_Venus.jpg', '2021-08-29 10:52:51', NULL),
(19, 'Peperomia Obtusifolia', '15˚ - 25˚', 'No', '14', '1', 'Plant_19_Peperomia.png', '2021-08-29 10:52:51', NULL),
(20, 'Echeveria', '15˚ - 20˚', 'Yes', '7', '1', 'Plant_20_Echeveria.jpg', '2021-08-29 10:52:51', NULL),
(21, 'Golden Pothos', '15˚ - 30˚', 'No', '7', '1', 'Plant_21_Pothos.webp', '2021-08-29 10:54:59', NULL),
(22, 'Rose', '22˚ - 35˚', 'Yes', '2', '1', 'Plant_22_rose.jpeg', '2021-08-29 10:54:59', NULL),
(23, 'Sunflower', '20˚ - 35˚', 'Yes', '7', '1', 'Plant_23_Sunflower.jpg', '2021-08-29 10:54:59', NULL),
(24, 'Zebra Haworthia', '15˚ - 30˚', 'No', '14', '1', 'Plant_24_Zebra.jpg', '2021-08-29 10:54:59', NULL),
(25, 'Philodendron', '25˚ - 30˚', 'No', '7', '1', 'Plant_25_Philodendron.jpg', '2021-08-29 10:54:59', NULL),
(26, 'Prayer', '18˚ - 30˚', 'No', '7', '1', 'Plant_26_Prayer.jpg', '2021-08-29 10:54:59', NULL),
(27, 'Burro\'s Tail', '10˚ - 28˚', 'No', '14', '1', 'Plant_27_Burro.jfif', '2021-08-29 10:54:59', NULL),
(28, 'Areca Palm', '18˚ - 25˚', 'No', '2', '1', 'Plant_28_Areca.webp', '2021-08-29 10:54:59', NULL),
(29, 'Faux Calathea', '18˚ - 30˚', 'No', '14', '1', 'Plant_29_Faux.jpg', '2021-08-29 10:54:59', NULL),
(30, 'Lavander', '20˚ - 30˚', 'Yes', '7', '1', 'Plant_30_Lavander.jpg', '2021-08-29 10:54:59', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `plant_data`
--
ALTER TABLE `plant_data`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `plant_data`
--
ALTER TABLE `plant_data`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
