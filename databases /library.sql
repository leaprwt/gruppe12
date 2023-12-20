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
-- Database: `library`
--

-- --------------------------------------------------------

--
-- Table structure for table `authors`
--

CREATE TABLE `authors` (
  `id` int(32) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `authors`
--

INSERT INTO `authors` (`id`, `name`) VALUES
(1, 'Magdalena Droste'),
(2, 'Michael Sommer'),
(3, 'Aurélien Géron');

-- --------------------------------------------------------

--
-- Table structure for table `bookcategories`
--

CREATE TABLE `bookcategories` (
  `id` int(32) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bookcategories`
--

INSERT INTO `bookcategories` (`id`, `name`) VALUES
(1, 'Informatik'),
(2, 'Geschichte'),
(3, 'Kunst'),
(4, 'Gesellschaft'),
(5, 'Politik'),
(6, 'Mathematik'),
(7, 'Design'),
(8, 'Wirtschaft');

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `book_id` int(32) NOT NULL,
  `isbn` bigint(20) NOT NULL,
  `cover_image_link` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `title` varchar(255) NOT NULL,
  `date_published` year(4) NOT NULL,
  `category_id` int(32) NOT NULL,
  `language_id` int(32) NOT NULL,
  `book_type_id` int(32) NOT NULL,
  `author_id` int(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`book_id`, `isbn`, `cover_image_link`, `description`, `title`, `date_published`, `category_id`, `language_id`, `book_type_id`, `author_id`) VALUES
(1, 3836560119, '/app/assets/books/book_cover_bauhaus_droste.jpeg', 'Seit der ersten Veröffentlichung im Jahre 1985 hat sich die Basic Art Series zur meistverkauften Kunstbuchreihe aller Zeiten entwickelt.', 'Bauhaus', 2022, 7, 1, 1, 1),
(2, 3520909022, '/app/assets/books/book_cover_roemische_geschichte_sommer.jpeg', 'Was ermöglichte den beispiellosen Aufstieg Roms von einer kleinen Stadt in Mittelitalien zum Mittelpunkt einer Weltmacht?', 'Römische Geschichte', 2021, 2, 1, 1, 2),
(3, 1098125975, '/app/assets/books/book_cover_machine_learning_hands_on_oreilly.jpg', 'Through a recent series of breakthroughs, deep learning has boosted the entire field of machine learning. Now, even programmers who know close to nothing about this technology can use simple, efficient tools to implement programs capable of learning from data. This bestselling book uses concrete examples, minimal theory, and production-ready Python frameworks (Scikit-Learn, Keras, and TensorFlow) to help you gain an intuitive understanding of the concepts and tools for building intelligent systems.', 'Hands-On Machine Learning', 2022, 1, 2, 1, 3),
(8, 1234123, 'app/assets/books/image_6582dd1db8a532.23937698.jpeg', 'Testest', 'Test', 2012, 1, 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `booktypes`
--

CREATE TABLE `booktypes` (
  `id` int(32) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `booktypes`
--

INSERT INTO `booktypes` (`id`, `name`) VALUES
(1, 'Buch'),
(2, 'Journal'),
(3, 'Magazin');

-- --------------------------------------------------------

--
-- Table structure for table `languages`
--

CREATE TABLE `languages` (
  `id` int(32) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `languages`
--

INSERT INTO `languages` (`id`, `name`) VALUES
(1, 'Deutsch'),
(2, 'Englisch'),
(3, 'Spanisch'),
(4, 'Französisch');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `authors`
--
ALTER TABLE `authors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bookcategories`
--
ALTER TABLE `bookcategories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`book_id`),
  ADD UNIQUE KEY `isbn` (`isbn`),
  ADD KEY `book-category` (`category_id`),
  ADD KEY `book-language` (`language_id`),
  ADD KEY `book-author` (`author_id`),
  ADD KEY `book-type` (`book_type_id`);

--
-- Indexes for table `booktypes`
--
ALTER TABLE `booktypes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `languages`
--
ALTER TABLE `languages`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `authors`
--
ALTER TABLE `authors`
  MODIFY `id` int(32) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `bookcategories`
--
ALTER TABLE `bookcategories`
  MODIFY `id` int(32) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `book_id` int(32) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `booktypes`
--
ALTER TABLE `booktypes`
  MODIFY `id` int(32) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `languages`
--
ALTER TABLE `languages`
  MODIFY `id` int(32) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `books`
--
ALTER TABLE `books`
  ADD CONSTRAINT `book-author` FOREIGN KEY (`author_id`) REFERENCES `authors` (`id`),
  ADD CONSTRAINT `book-category` FOREIGN KEY (`category_id`) REFERENCES `bookcategories` (`id`),
  ADD CONSTRAINT `book-language` FOREIGN KEY (`language_id`) REFERENCES `languages` (`id`),
  ADD CONSTRAINT `book-type` FOREIGN KEY (`book_type_id`) REFERENCES `booktypes` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
