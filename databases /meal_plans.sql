-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 08, 2023 at 05:42 PM
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
-- Database: `meal_plans`
--

-- --------------------------------------------------------

--
-- Table structure for table `day`
--

CREATE TABLE `day` (
  `day_id` int(11) NOT NULL,
  `day_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ingredients`
--

CREATE TABLE `ingredients` (
  `ingredients_id` int(32) NOT NULL,
  `ingredients_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `linkingmealday`
--

CREATE TABLE `linkingmealday` (
  `id` int(11) NOT NULL,
  `meal_id` int(32) NOT NULL,
  `day_id` int(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `meals`
--

CREATE TABLE `meals` (
  `meal_id` int(32) NOT NULL,
  `price` int(32) NOT NULL,
  `calories` int(32) NOT NULL,
  `protein` int(32) NOT NULL,
  `fat` int(32) NOT NULL,
  `carbonhydrate` int(32) NOT NULL,
  `name` varchar(255) NOT NULL,
  `type_of_meal_id` int(32) NOT NULL,
  `type_of_nutrition_id` int(32) NOT NULL,
  `ingredients_id` int(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `mealtype`
--

CREATE TABLE `mealtype` (
  `meal_type_id` int(32) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `nutritiontypes`
--

CREATE TABLE `nutritiontypes` (
  `nutrition_type_id` int(32) NOT NULL,
  `nutrition_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `day`
--
ALTER TABLE `day`
  ADD PRIMARY KEY (`day_id`);

--
-- Indexes for table `ingredients`
--
ALTER TABLE `ingredients`
  ADD PRIMARY KEY (`ingredients_id`);

--
-- Indexes for table `linkingmealday`
--
ALTER TABLE `linkingmealday`
  ADD PRIMARY KEY (`id`),
  ADD KEY `linking-meal` (`meal_id`),
  ADD KEY `linking-day` (`day_id`);

--
-- Indexes for table `meals`
--
ALTER TABLE `meals`
  ADD PRIMARY KEY (`meal_id`),
  ADD KEY `meal-mealType` (`type_of_meal_id`),
  ADD KEY `meal-nutritionType` (`type_of_nutrition_id`),
  ADD KEY `meal-ingredients` (`ingredients_id`);

--
-- Indexes for table `mealtype`
--
ALTER TABLE `mealtype`
  ADD PRIMARY KEY (`meal_type_id`);

--
-- Indexes for table `nutritiontypes`
--
ALTER TABLE `nutritiontypes`
  ADD PRIMARY KEY (`nutrition_type_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `day`
--
ALTER TABLE `day`
  MODIFY `day_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ingredients`
--
ALTER TABLE `ingredients`
  MODIFY `ingredients_id` int(32) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `linkingmealday`
--
ALTER TABLE `linkingmealday`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `meals`
--
ALTER TABLE `meals`
  MODIFY `meal_id` int(32) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `mealtype`
--
ALTER TABLE `mealtype`
  MODIFY `meal_type_id` int(32) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `nutritiontypes`
--
ALTER TABLE `nutritiontypes`
  MODIFY `nutrition_type_id` int(32) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `linkingmealday`
--
ALTER TABLE `linkingmealday`
  ADD CONSTRAINT `linking-day` FOREIGN KEY (`day_id`) REFERENCES `day` (`day_id`),
  ADD CONSTRAINT `linking-meal` FOREIGN KEY (`meal_id`) REFERENCES `meals` (`meal_id`);

--
-- Constraints for table `meals`
--
ALTER TABLE `meals`
  ADD CONSTRAINT `meal-ingredients` FOREIGN KEY (`ingredients_id`) REFERENCES `ingredients` (`ingredients_id`),
  ADD CONSTRAINT `meal-mealType` FOREIGN KEY (`type_of_meal_id`) REFERENCES `mealtype` (`meal_type_id`),
  ADD CONSTRAINT `meal-nutritionType` FOREIGN KEY (`type_of_nutrition_id`) REFERENCES `nutritiontypes` (`nutrition_type_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
