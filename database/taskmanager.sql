-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 31, 2021 at 02:07 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.4.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `taskmanager`
--

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `id` int(50) NOT NULL,
  `name` varchar(25) NOT NULL,
  `email` varchar(50) NOT NULL,
  `address` varchar(25) NOT NULL,
  `phone` varchar(25) NOT NULL,
  `ismanager` int(2) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`id`, `name`, `email`, `address`, `phone`, `ismanager`, `password`) VALUES
(6, 'loay', 'loay@gmail.com', 'paris', '87566434', 0, '280498e55df34e84e5ae2dae8212c661'),
(14, 'jawad', 'jawad@live.com', 'saida', '74382912', 0, 'b4da655a32a0316c91fe1fd755e5f0e2'),
(40, 'hsein', 'hsein@gmail.com', 'address', '05114232', 0, 'a0cd8cfb7119a3df5644fa382f55ec67'),
(41, 'firas', 'firas@live.com', 'saida', '76034321', 1, '9be4866fc93ab2c7b9de344eab8e59f8'),
(42, 'feras', 'feras@gmail.com', 'sidon', '14412344', 1, 'ae387c6a3cd8a67e265d8f4b5d2f3177'),
(43, 'mhmd', 'mhmd@live.com', 'mhmdadd', '05114232', 0, 'f4bf34f47adbf9552928a147f6c27dfe'),
(46, 'nour', 'nour@gmail.com', 'nouraddress', '87654324', 0, 'ccbc1770bb10486495d127a7d65c252b'),
(47, 'yousef', 'ysf@mail.com', 'joun', '76876654', 0, '75b42d69fc527e6a37fc7bf10ae15d5e');

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` int(255) NOT NULL,
  `employee_id` int(255) NOT NULL,
  `text` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`id`, `employee_id`, `text`, `status`) VALUES
(4, 6, 'task3 not done', 'high');

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `id` int(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `leadby` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`id`, `title`, `description`, `leadby`) VALUES
(4, 'p1', 'task1 & task3', 43),
(6, 'p3', 'task6 & task7', 14),
(7, 'p5', 'hardproject', 43),
(18, 'p4', 'task', 6),
(21, 'p6', 'lebanonproject', 41);

-- --------------------------------------------------------

--
-- Table structure for table `subtasks`
--

CREATE TABLE `subtasks` (
  `id` int(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `done` int(2) NOT NULL,
  `task_id` int(50) NOT NULL,
  `added_by` varchar(255) NOT NULL,
  `added_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `subtasks`
--

INSERT INTO `subtasks` (`id`, `title`, `done`, `task_id`, `added_by`, `added_date`) VALUES
(42, 'a', 0, 64, 'firas', '2021-05-29'),
(43, 'b', 0, 64, 'firas', '2021-05-29'),
(44, 'c', 1, 64, 'firas', '2021-05-29');

-- --------------------------------------------------------

--
-- Table structure for table `tasks`
--

CREATE TABLE `tasks` (
  `id` int(50) NOT NULL,
  `description` varchar(255) NOT NULL,
  `employee_id` int(50) NOT NULL,
  `status` varchar(255) NOT NULL,
  `priority` varchar(255) NOT NULL,
  `ddate` date NOT NULL,
  `attachment` varchar(255) NOT NULL,
  `project_id` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tasks`
--

INSERT INTO `tasks` (`id`, `description`, `employee_id`, `status`, `priority`, `ddate`, `attachment`, `project_id`) VALUES
(64, 'task1', 6, 'hold', 'high', '2021-03-17', 'Lighthouse.jpg', 6),
(65, 'task2', 6, 'hold', 'medium', '2021-03-27', '3c793-tulips.jpg', 6),
(66, 'task5', 6, 'In Progress', 'low', '2021-03-20', 'Jellyfish.jpg', 18),
(67, 'task3', 6, 'Done', 'low', '2021-03-19', '7a743-penguins.jpg', 4),
(70, 'newtask', 14, 'In Progress', 'low', '2021-05-31', '0b6be-chrysanthemum.jpg', 18),
(71, 'task10', 14, 'hold', 'medium', '2021-05-26', '5823f-penguins.jpg', 6);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`id`),
  ADD KEY `name` (`name`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subtasks`
--
ALTER TABLE `subtasks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `task_id` (`task_id`);

--
-- Indexes for table `tasks`
--
ALTER TABLE `tasks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `employee_id` (`employee_id`),
  ADD KEY `project_id` (`project_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `subtasks`
--
ALTER TABLE `subtasks`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `tasks`
--
ALTER TABLE `tasks`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `subtasks`
--
ALTER TABLE `subtasks`
  ADD CONSTRAINT `subtasks_ibfk_1` FOREIGN KEY (`task_id`) REFERENCES `tasks` (`id`);

--
-- Constraints for table `tasks`
--
ALTER TABLE `tasks`
  ADD CONSTRAINT `tasks_ibfk_1` FOREIGN KEY (`employee_id`) REFERENCES `employees` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
