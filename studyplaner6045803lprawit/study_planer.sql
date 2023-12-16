-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Dec 12, 2023 at 11:29 AM
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
-- Database: `study planer`
--

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `course_id` int(32) NOT NULL,
  `course_name` varchar(255) NOT NULL,
  `professor_id` int(32) NOT NULL,
  `description` text NOT NULL,
  `ects` int(32) NOT NULL,
  `type_of_exam_id` int(32) DEFAULT NULL,
  `lecture_time_one` datetime DEFAULT NULL,
  `lecture_time_two` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`course_id`, `course_name`, `professor_id`, `description`, `ects`, `type_of_exam_id`, `lecture_time_one`, `lecture_time_two`) VALUES
(1, 'Visuelle Kommunikation 2', 2, 'Übergreifende Anwendung des erworbenen Wissens aus den vorhergehenden Veranstaltungen in Konzeption, Gestaltung und Produktion für verschiedene Medien. Visuelle und ethische Kompetenz erweitern. Vektorbasiertes Arbeiten erlernen, fortgeschrittene Techniken der Erzeugung und Bearbeitung von Fotos und Grafiken anwenden.', 5, 1, '2023-12-11 10:15:00', '2023-12-11 12:15:00'),
(2, 'Medientechnik', 3, 'Technische Hintergründe, die für die Produktion von analogen Produkten wie Printerzeugnissen und digitalen Medien und deren Komponenten relevant sind, werden vorgestellt. Hierzu gehören insbesondere Grundlagen der Audio- und Videotechnik, verschiedene Grafik-, Video-, und Audiodateiformate, unterschiedliche Datenkompressionsverfahren sowie die Funktion von Speicher- und Übertragungsmedien. Die technischen Grundlagen zur Medienproduktion werden diskutiert und auf die Möglichkeiten der Einsetzbarkeit überprüft.', 5, 2, '2023-12-11 14:15:00', '2023-12-13 08:15:00'),
(3, 'Investition & Finanzierung', 4, 'Grundlagen der Investitions- und Finanzplanung, verschiedene Verfahren der Investitionsrechnung sowie Finanzierungsformen kennen lernen und anwenden (Statische und dynamische Verfahren der Investitionsrechnung, Vorteilhaftigkeitsentscheidungen bei mehreren Zielgrößen: Nutzwertanalyse, Nutzungsdauer- und Ersatzzeitpunktentscheidungen, Investitionsrechnung bei unsicheren Erwartungen, Finanzplanung, Bestimmung des optimalen Finanzvolumens, Außenfinanzierung, Innenfinanzierung).', 5, 2, '2023-12-12 10:15:00', '2023-12-14 10:15:00'),
(4, 'Projektmanagement 2', 7, 'Systematisches Projektmanagement als Methode. Zusätzlich zum Medienprojekt.', 0, 1, '2023-12-12 12:15:00', '2023-12-12 14:15:00'),
(5, 'Medienprojekt 1', 10, 'Medienwirtschaftliche, journalistische, kommunikationswissenschaftliche, gestalterische und/oder technische Kenntnisse in fächerübergreifenden Projekten anwenden; Medienkonzepte im Team entwickeln, planen und nachhalten; Umsetzungen auf wissenschaftlicher Grundlage analysieren und reflektieren;', 5, NULL, '2023-12-14 12:15:00', '2023-12-14 14:15:00'),
(6, 'Mathematik', 6, 'Behandelt werden Grundlagen der Aussagenlogik, der Mengenlehre, der Relationen und der Kombinatorik sowie Gleichungen/Ungleichungen, Systeme von Gleichungen/Ungleichungen, Vektorrechnung, Eigenschaften und Konstruktion von Funktionen. In die Differential- und Integralrechnung und ihre Bedeutung wird ein Einblick gegeben.', 4, 2, '2023-12-12 14:15:00', '2023-12-11 12:15:00'),
(7, 'Medien & Kommunikation 2', 9, 'Kenntnisse und Anwendung grundlegender Methoden in der empirischen Kommunikations- und Medienforschung, u.a. qualitative und quantitative Befragung, Inhaltsanalyse, ggfs. Beobachtung und Experiment.', 5, 1, '2023-12-13 10:15:00', '2023-12-13 12:15:00'),
(8, 'Internettechnologie 2', 8, 'Es werden client- und serverseitige Technologien vorgestellt. Kenntnisse in ausgesuchten Technologien und Sprachen (z.B. php, SQL) werden vertieft vermittelt. Datenbanken und deren Einbindung in Webauftritte werden theoretisch behandelt und praktisch eingeübt. Die Veranstaltung wird in einen theoretischen und einen Übungsblock unterteilt, sodass das Erlernte auch praktisch angewendet und eingeübt werden kann.', 5, 1, '2023-12-14 08:15:00', '2023-12-14 10:15:00');

-- --------------------------------------------------------

--
-- Table structure for table `examtypes`
--

CREATE TABLE `examtypes` (
  `examType_id` int(32) NOT NULL,
  `examType_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `examtypes`
--

INSERT INTO `examtypes` (`examType_id`, `examType_name`) VALUES
(1, 'Kursarbeit'),
(2, 'Klausur'),
(3, 'Arbeitsmappe'),
(4, 'Hausarbeit'),
(5, 'Praxisbericht');

-- --------------------------------------------------------

--
-- Table structure for table `faculties`
--

CREATE TABLE `faculties` (
  `faculty_id` int(11) NOT NULL,
  `faculty_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `faculties`
--

INSERT INTO `faculties` (`faculty_id`, `faculty_name`) VALUES
(3, 'Fachbereich Ingenieurwissenschaften'),
(4, 'Fachbereich Management, Information, Technologie'),
(5, 'Fachbereich Wirtschaft');

-- --------------------------------------------------------

--
-- Table structure for table `linking courses-students`
--

CREATE TABLE `linking courses-students` (
  `linke_course_student_id` int(32) NOT NULL,
  `course_id` int(32) NOT NULL,
  `student_id` int(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `linking courses-students`
--

INSERT INTO `linking courses-students` (`linke_course_student_id`, `course_id`, `student_id`) VALUES
(1, 6, 4),
(2, 8, 4),
(3, 2, 4),
(4, 3, 4),
(5, 8, 5),
(6, 4, 5),
(7, 6, 5),
(8, 1, 5),
(9, 4, 6),
(10, 6, 6),
(11, 8, 6),
(12, 7, 6);

-- --------------------------------------------------------

--
-- Table structure for table `professors`
--

CREATE TABLE `professors` (
  `professor_id` int(32) NOT NULL,
  `professor_name` varchar(255) NOT NULL,
  `faculty_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `professors`
--

INSERT INTO `professors` (`professor_id`, `professor_name`, `faculty_id`) VALUES
(2, 'Prof. Dipl.-Des Götz Greiner', 4),
(3, 'Prof. Dr. Knut Barghorn', 4),
(4, 'Prof. Dr. Dirk Fischer', 4),
(5, 'Anke Arends-Pielstick', 4),
(6, 'Prof. Dr. Rebecca Hartje', 4),
(7, 'Prof. Dr. Eva Nowak', 4),
(8, 'Dipl.-Ing. (FH) Andreas Baumgart', 4),
(9, 'Prof. Dr. Beate Illg', 4),
(10, 'Dipl.-Pol. Carola Schede', 4);

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `student_id` int(32) NOT NULL,
  `student_number` int(32) NOT NULL,
  `student_faculty_id` int(32) NOT NULL,
  `student_name` varchar(255) NOT NULL,
  `student_first_name` varchar(255) NOT NULL,
  `student_email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`student_id`, `student_number`, `student_faculty_id`, `student_name`, `student_first_name`, `student_email`) VALUES
(4, 6054803, 4, 'Prawit', 'Lea Joline', 'lea.prawit@student.jade-hs.de'),
(5, 6045014, 4, 'Fechtner', 'Nane', 'nane.fechtner@student.jade-hs.de'),
(6, 6045803, 4, 'Ratz', 'Lea', 'lea.ratz@student.jade-hs.de');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD UNIQUE KEY `course_id` (`course_id`),
  ADD KEY `course-professor` (`professor_id`),
  ADD KEY `course-examType` (`type_of_exam_id`);

--
-- Indexes for table `examtypes`
--
ALTER TABLE `examtypes`
  ADD PRIMARY KEY (`examType_id`);

--
-- Indexes for table `faculties`
--
ALTER TABLE `faculties`
  ADD PRIMARY KEY (`faculty_id`);

--
-- Indexes for table `linking courses-students`
--
ALTER TABLE `linking courses-students`
  ADD PRIMARY KEY (`linke_course_student_id`),
  ADD KEY `linking-student` (`student_id`),
  ADD KEY `linking-course` (`course_id`);

--
-- Indexes for table `professors`
--
ALTER TABLE `professors`
  ADD PRIMARY KEY (`professor_id`),
  ADD KEY `Professor-Faculty` (`faculty_id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`student_id`),
  ADD UNIQUE KEY `student_number` (`student_number`),
  ADD UNIQUE KEY `student_email` (`student_email`),
  ADD KEY `student-faculty` (`student_faculty_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `course_id` int(32) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `examtypes`
--
ALTER TABLE `examtypes`
  MODIFY `examType_id` int(32) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `faculties`
--
ALTER TABLE `faculties`
  MODIFY `faculty_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `linking courses-students`
--
ALTER TABLE `linking courses-students`
  MODIFY `linke_course_student_id` int(32) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `professors`
--
ALTER TABLE `professors`
  MODIFY `professor_id` int(32) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `student_id` int(32) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `courses`
--
ALTER TABLE `courses`
  ADD CONSTRAINT `course-examType` FOREIGN KEY (`type_of_exam_id`) REFERENCES `examtypes` (`examType_id`),
  ADD CONSTRAINT `course-professor` FOREIGN KEY (`professor_id`) REFERENCES `professors` (`professor_id`);

--
-- Constraints for table `linking courses-students`
--
ALTER TABLE `linking courses-students`
  ADD CONSTRAINT `linking-course` FOREIGN KEY (`course_id`) REFERENCES `courses` (`course_id`),
  ADD CONSTRAINT `linking-student` FOREIGN KEY (`student_id`) REFERENCES `students` (`student_id`);

--
-- Constraints for table `professors`
--
ALTER TABLE `professors`
  ADD CONSTRAINT `Professor-Faculty` FOREIGN KEY (`faculty_id`) REFERENCES `faculties` (`faculty_id`);

--
-- Constraints for table `students`
--
ALTER TABLE `students`
  ADD CONSTRAINT `student-faculty` FOREIGN KEY (`student_faculty_id`) REFERENCES `faculties` (`faculty_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
