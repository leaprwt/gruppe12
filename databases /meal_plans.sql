-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Dec 20, 2023 at 12:27 PM
-- Server version: 5.7.39
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mealplans`
--

-- --------------------------------------------------------

--
-- Table structure for table `days`
--

CREATE TABLE `days` (
  `day_id` int(11) NOT NULL,
  `day_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `days`
--

INSERT INTO `days` (`day_id`, `day_name`) VALUES
(1, 'Montag'),
(2, 'Dienstag'),
(3, 'Mittwoch'),
(4, 'Donnerstag'),
(5, 'Freitag');

-- --------------------------------------------------------

--
-- Table structure for table `ingredients`
--

CREATE TABLE `ingredients` (
  `ingredients_id` int(32) NOT NULL,
  `ingredients_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ingredients`
--

INSERT INTO `ingredients` (`ingredients_id`, `ingredients_name`) VALUES
(1, 'Milch'),
(2, 'Weizen'),
(3, 'Soja'),
(4, 'Lactose');

-- --------------------------------------------------------

--
-- Table structure for table `linkingmealday`
--

CREATE TABLE `linkingmealday` (
  `id` int(11) NOT NULL,
  `meal_id` int(32) NOT NULL,
  `day_id` int(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `linkingmealday`
--

INSERT INTO `linkingmealday` (`id`, `meal_id`, `day_id`) VALUES
(18, 12, 1),
(19, 12, 4),
(20, 12, 5);

-- --------------------------------------------------------

--
-- Table structure for table `linkingMealIngredients`
--

CREATE TABLE `linkingMealIngredients` (
  `linking_id` int(11) NOT NULL,
  `ingredient_id` int(11) NOT NULL,
  `meal_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `meals`
--

CREATE TABLE `meals` (
  `meal_id` int(32) NOT NULL,
  `price` float NOT NULL,
  `calories` int(32) NOT NULL,
  `protein` int(32) NOT NULL,
  `fat` int(32) NOT NULL,
  `carbonhydrate` int(32) NOT NULL,
  `name` varchar(255) NOT NULL,
  `type_of_meal_id` int(32) NOT NULL,
  `type_of_nutrition_id` int(32) NOT NULL,
  `path_to_image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `meals`
--

INSERT INTO `meals` (`meal_id`, `price`, `calories`, `protein`, `fat`, `carbonhydrate`, `name`, `type_of_meal_id`, `type_of_nutrition_id`, `path_to_image`) VALUES
(12, 4.75, 342, 32, 21, 27, 'Testmeal', 1, 1, 'app/assets/meals/image_6582be519f1321.72992020.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `mealtype`
--

CREATE TABLE `mealtype` (
  `meal_type_id` int(32) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mealtype`
--

INSERT INTO `mealtype` (`meal_type_id`, `name`) VALUES
(1, 'Hauptgericht'),
(2, 'Beilage'),
(3, 'Dessert');

-- --------------------------------------------------------

--
-- Table structure for table `nutritiontypes`
--

CREATE TABLE `nutritiontypes` (
  `nutrition_type_id` int(32) NOT NULL,
  `nutrition_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `nutritiontypes`
--

INSERT INTO `nutritiontypes` (`nutrition_type_id`, `nutrition_name`) VALUES
(1, 'Vegan'),
(2, 'Vegetarisch'),
(3, 'Omnivore');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `days`
--
ALTER TABLE `days`
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
  ADD UNIQUE KEY `unique_combination` (`meal_id`,`day_id`),
  ADD KEY `linking-meal` (`meal_id`),
  ADD KEY `linking-day` (`day_id`);

--
-- Indexes for table `linkingMealIngredients`
--
ALTER TABLE `linkingMealIngredients`
  ADD PRIMARY KEY (`linking_id`),
  ADD UNIQUE KEY `unique_combination` (`meal_id`,`ingredient_id`),
  ADD KEY `ingredient_id` (`ingredient_id`);

--
-- Indexes for table `meals`
--
ALTER TABLE `meals`
  ADD PRIMARY KEY (`meal_id`),
  ADD KEY `meal-mealType` (`type_of_meal_id`),
  ADD KEY `meal-nutritionType` (`type_of_nutrition_id`);

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
-- AUTO_INCREMENT for table `days`
--
ALTER TABLE `days`
  MODIFY `day_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `ingredients`
--
ALTER TABLE `ingredients`
  MODIFY `ingredients_id` int(32) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `linkingmealday`
--
ALTER TABLE `linkingmealday`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `linkingMealIngredients`
--
ALTER TABLE `linkingMealIngredients`
  MODIFY `linking_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `meals`
--
ALTER TABLE `meals`
  MODIFY `meal_id` int(32) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `mealtype`
--
ALTER TABLE `mealtype`
  MODIFY `meal_type_id` int(32) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `nutritiontypes`
--
ALTER TABLE `nutritiontypes`
  MODIFY `nutrition_type_id` int(32) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `linkingmealday`
--
ALTER TABLE `linkingmealday`
  ADD CONSTRAINT `linking-day` FOREIGN KEY (`day_id`) REFERENCES `days` (`day_id`),
  ADD CONSTRAINT `linking-meal` FOREIGN KEY (`meal_id`) REFERENCES `meals` (`meal_id`);

--
-- Constraints for table `linkingMealIngredients`
--
ALTER TABLE `linkingMealIngredients`
  ADD CONSTRAINT `ingredient_id` FOREIGN KEY (`ingredient_id`) REFERENCES `ingredients` (`ingredients_id`),
  ADD CONSTRAINT `meal_id` FOREIGN KEY (`meal_id`) REFERENCES `meals` (`meal_id`);

--
-- Constraints for table `meals`
--
ALTER TABLE `meals`
  ADD CONSTRAINT `meal-mealType` FOREIGN KEY (`type_of_meal_id`) REFERENCES `mealtype` (`meal_type_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `meal-nutritionType` FOREIGN KEY (`type_of_nutrition_id`) REFERENCES `nutritiontypes` (`nutrition_type_id`) ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
