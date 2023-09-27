-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 20, 2022 at 06:36 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bangladesh_train_ticket`
--

-- --------------------------------------------------------

--
-- Table structure for table `customer_discount`
--

CREATE TABLE `customer_discount` (
  `user_name` varchar(100) NOT NULL,
  `discount` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer_discount`
--

INSERT INTO `customer_discount` (`user_name`, `discount`) VALUES
('Robi1982', '50');

-- --------------------------------------------------------

--
-- Table structure for table `customer_feedback`
--

CREATE TABLE `customer_feedback` (
  `user_name` varchar(100) NOT NULL,
  `comment` text NOT NULL,
  `_date` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer_feedback`
--

INSERT INTO `customer_feedback` (`user_name`, `comment`, `_date`) VALUES
('Robi1982', 'Nigger', '2022/08/19'),
('Robi1982', 'dumbass', '2022/08/19'),
('unknown', 'bad web site', '2022/08/20'),
('unknown', 'bad', '2022/08/20');

-- --------------------------------------------------------

--
-- Table structure for table `customer_refund`
--

CREATE TABLE `customer_refund` (
  `ticket_id` varchar(100) NOT NULL,
  `user_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer_refund`
--

INSERT INTO `customer_refund` (`ticket_id`, `user_name`) VALUES
('23', 'Robi1982'),
('22', 'Robi1982'),
('24', 'Robi1982'),
('26', 'Robi1982'),
('27', 'Robi1982'),
('28', 'Robi1982'),
('29', 'Robi1982'),
('30', 'Robi1982'),
('31', 'Robi1982'),
('32', 'Robi1982'),
('33', 'Robi1982'),
('34', 'Robi1982'),
('35', 'Robi1982'),
('36', 'Robi1982'),
('37', 'Robi1982'),
('38', 'Robi1982'),
('39', 'Robi1982'),
('44', 'Robi1982'),
('67', 'Robi1982');

-- --------------------------------------------------------

--
-- Table structure for table `ticket`
--

CREATE TABLE `ticket` (
  `ticket_id` bigint(100) NOT NULL,
  `user_name` varchar(100) NOT NULL,
  `_from` varchar(100) NOT NULL,
  `_to` varchar(100) NOT NULL,
  `_date` varchar(100) NOT NULL,
  `train_id` varchar(100) NOT NULL,
  `quantity` varchar(100) NOT NULL,
  `Printed` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ticket`
--

INSERT INTO `ticket` (`ticket_id`, `user_name`, `_from`, `_to`, `_date`, `train_id`, `quantity`, `Printed`) VALUES
(1, 'Robi1982', 'Dhaka', 'Chittagong', '2022-08-01', '1111', '5', 'No'),
(2, 'Robi1982', 'Dhaka', 'Chittagong', '2022-08-04', '1111', '5', 'No'),
(3, 'Robi1982', 'Dhaka', 'Chittagong', '2022-08-04', '1111', '5', 'No'),
(4, 'Robi1982', 'Dhaka', 'Chittagong', '2022-08-14', '1111', '2', 'No'),
(5, 'Robi1982', 'Dhaka', 'Chittagong', '2022-08-14', '1111', '2', 'No'),
(6, 'Robi1982', 'Dhaka', 'Chittagong', '2022-08-14', '1111', '4', 'No'),
(7, 'Robi1982', 'Dhaka', 'Chittagong', '2022-08-14', '1111', '5', 'No'),
(8, 'Robi1982', 'Dhaka', 'Chittagong', '2022-08-14', '1111', '5', 'No'),
(9, 'Robi1982', 'Dhaka', 'Chittagong', '2022-08-14', '1111', '5', 'No'),
(10, 'Robi1982', 'Dhaka', 'Chittagong', '2022-08-14', '1111', '5', 'No'),
(11, 'Robi1982', 'Dhaka', 'Chittagong', '2022-08-14', '1111', '5', 'No'),
(12, 'Robi1982', 'Dhaka', 'Chittagong', '2022-08-14', '1111', '5', 'No'),
(13, 'Robi1982', 'Dhaka', 'Chittagong', '2022-08-14', '1111', '5', 'No'),
(14, 'Robi1982', 'Dhaka', 'Chittagong', '2022-08-14', '1111', '5', 'No'),
(15, 'Robi1982', 'Dhaka', 'Chittagong', '2022-08-14', '1115', '5', 'No'),
(16, 'Robi1982', 'Dhaka', 'Chittagong', '2022-08-14', '1115', '3', 'No'),
(17, 'Robi1982', 'Dhaka', 'Chittagong', '2022-08-14', '1115', '5', 'No'),
(18, 'Robi1982', 'Dhaka', 'Chittagong', '2022-08-14', '1115', '5', 'No'),
(19, 'Robi1982', 'Dhaka', 'Chittagong', '2022-08-14', '1115', '5', 'No'),
(20, 'Robi1982', 'Dhaka', 'Chittagong', '2022-08-14', '1115', '5', 'No'),
(22, 'Robi1982', 'Dhaka', 'Chittagong', '2022-08-18', '1111', '4', 'No'),
(23, 'Robi1982', 'Dhaka', 'Chittagong', '2022-08-18', '1111', '4', 'No'),
(24, 'Robi1982', 'Dhaka', 'Chittagong', '2022-08-18', '1111', '4', 'No'),
(26, 'Robi1982', 'Dhaka', 'Chittagong', '2022-08-21', '1111', '4', 'No'),
(27, 'Robi1982', 'Dhaka', 'Chittagong', '2022-08-21', '1111', '4', 'No'),
(28, 'Robi1982', 'Dhaka', 'Chittagong', '2022-08-21', '1111', '4', 'No'),
(29, 'Robi1982', 'Dhaka', 'Chittagong', '2022-08-20', '1111', '2', 'No'),
(30, 'Robi1982', 'Dhaka', 'Sylhet', '2022-08-19', '1113', '5', 'No'),
(31, 'Robi1982', 'Dhaka', 'Chittagong', '2022-08-19', '1111', '4', 'No'),
(32, 'Robi1982', 'Dhaka', 'Sylhet', '2022-08-20', '1113', '4', 'No'),
(33, 'Robi1982', 'Dhaka', 'Sylhet', '2022-08-19', '1113', '2', 'No'),
(34, 'Robi1982', 'Dhaka', 'Sylhet', '2022-08-19', '1113', '2', 'No'),
(35, 'Robi1982', 'Dhaka', 'Sylhet', '2022-08-23', '1113', '5', 'No'),
(36, 'Robi1982', 'Dhaka', 'Sylhet', '2022-08-19', '1113', '2', 'No'),
(37, 'Robi1982', 'Dhaka', 'Sylhet', '2022-08-23', '1113', '4', 'No'),
(38, 'Robi1982', 'Dhaka', 'Sylhet', '2022-08-21', '1113', '4', 'No'),
(39, 'Robi1982', 'Dhaka', 'Sylhet', '2022-08-21', '1113', '4', 'No'),
(40, 'Robi1982', 'Dhaka', 'Sylhet', '2022-08-21', '1113', '4', 'No'),
(41, 'Robi1982', 'Dhaka', 'Sylhet', '2022-08-21', '1113', '4', 'No'),
(42, 'Robi1982', 'Dhaka', 'Sylhet', '2022-08-21', '1113', '4', 'No'),
(43, 'Robi1982', 'Dhaka', 'Sylhet', '2022-08-22', '1113', '4', 'No'),
(44, 'Robi1982', 'Dhaka', 'Sylhet', '2022-08-22', '1113', '4', 'No'),
(45, 'Robi1982', 'Dhaka', 'Sylhet', '2022-08-22', '1113', '4', 'No'),
(46, 'Robi1982', 'Dhaka', 'Sylhet', '2022-08-22', '1113', '4', 'No'),
(47, 'Robi1982', 'Dhaka', 'Sylhet', '2022-08-22', '1113', '4', 'No'),
(48, 'Robi1982', 'Dhaka', 'Sylhet', '2022-08-22', '1113', '4', 'No'),
(49, 'Robi1982', 'Dhaka', 'Sylhet', '2022-08-22', '1113', '4', 'No'),
(50, 'Robi1982', 'Dhaka', 'Sylhet', '2022-08-22', '1113', '4', 'No'),
(51, 'Robi1982', 'Dhaka', 'Sylhet', '2022-08-22', '1113', '4', 'No'),
(52, 'Robi1982', 'Dhaka', 'Sylhet', '2022-08-22', '1113', '4', 'No'),
(53, 'Robi1982', 'Dhaka', 'Sylhet', '2022-08-22', '1113', '4', 'No'),
(54, 'Robi1982', 'Dhaka', 'Sylhet', '2022-08-22', '1113', '4', 'No'),
(55, 'Robi1982', 'Dhaka', 'Sylhet', '2022-08-22', '1113', '4', 'No'),
(56, 'Robi1982', 'Dhaka', 'Sylhet', '2022-08-22', '1113', '4', 'No'),
(57, 'Robi1982', 'Dhaka', 'Sylhet', '2022-08-22', '1113', '4', 'No'),
(58, 'Robi1982', 'Dhaka', 'Sylhet', '2022-08-22', '1113', '4', 'No'),
(59, 'Robi1982', 'Dhaka', 'Sylhet', '2022-08-22', '1113', '4', 'No'),
(60, 'Robi1982', 'Dhaka', 'Sylhet', '2022-08-22', '1113', '4', 'No'),
(61, 'Robi1982', 'Dhaka', 'Sylhet', '2022-08-22', '1113', '4', 'No'),
(62, 'Robi1982', 'Dhaka', 'Sylhet', '2022-08-22', '1113', '4', 'No'),
(63, 'Robi1982', 'Dhaka', 'Sylhet', '2022-08-22', '1113', '4', 'No'),
(64, 'Robi1982', 'Dhaka', 'Sylhet', '2022-08-22', '1113', '4', 'No'),
(65, 'Robi1982', 'Dhaka', 'Sylhet', '2022-08-22', '1113', '4', 'No'),
(66, 'Robi1982', 'Dhaka', 'Sylhet', '2022-08-23', '1113', '4', 'No'),
(67, 'Robi1982', 'Dhaka', 'Sylhet', '2022-08-23', '1113', '4', 'No'),
(68, 'Robi1982', 'Dhaka', 'Sylhet', '2022-08-24', '1113', '2', 'No'),
(69, 'Robi1982', 'Dhaka', 'Sylhet', '2022-08-24', '1113', '2', 'No'),
(70, 'Robi1982', 'Dhaka', 'Sylhet', '2022-08-24', '1113', '2', 'No'),
(71, 'Robi1982', 'Dhaka', 'Sylhet', '2022-08-24', '1113', '2', 'No'),
(72, 'Robi1982', 'Dhaka', 'Sylhet', '2022-08-24', '1113', '2', 'No'),
(73, 'Robi1982', 'Dhaka', 'Sylhet', '2022-08-24', '1113', '2', 'No'),
(74, 'Robi1982', 'Dhaka', 'Sylhet', '2022-08-24', '1113', '2', 'No'),
(75, 'Robi1982', 'Dhaka', 'Sylhet', '2022-08-24', '1113', '4', 'No'),
(76, 'Robi1982', 'Dhaka', 'Sylhet', '2022-08-24', '1113', '4', 'No'),
(77, 'Robi1982', 'Dhaka', 'Sylhet', '2022-08-24', '1113', '4', 'No'),
(78, 'Robi1982', 'Dhaka', 'Sylhet', '2022-08-24', '1113', '4', 'No'),
(79, 'Robi1982', 'Dhaka', 'Sylhet', '2022-08-24', '1113', '4', 'No'),
(80, 'Robi1982', 'Dhaka', 'Sylhet', '2022-08-24', '1113', '4', 'No'),
(81, 'Robi1982', 'Dhaka', 'Sylhet', '2022-08-24', '1113', '4', 'No'),
(82, 'Robi1982', 'Dhaka', 'Sylhet', '2022-08-24', '1113', '4', 'No'),
(83, 'Robi1982', 'Dhaka', 'Sylhet', '2022-08-24', '1113', '4', 'No'),
(84, 'Robi1982', 'Dhaka', 'Sylhet', '2022-08-24', '1113', '4', 'No'),
(85, 'Robi1982', 'Dhaka', 'Sylhet', '2022-08-24', '1113', '4', 'No'),
(86, 'Robi1982', 'Dhaka', 'Sylhet', '2022-08-24', '1113', '4', 'No'),
(87, 'Robi1982', 'Dhaka', 'Sylhet', '2022-08-24', '1113', '4', 'No'),
(88, 'Robi1982', 'Dhaka', 'Sylhet', '2022-08-24', '1113', '4', 'No'),
(89, 'Robi1982', 'Dhaka', 'Sylhet', '2022-08-24', '1113', '4', 'No'),
(90, 'Robi1982', 'Dhaka', 'Sylhet', '2022-08-24', '1113', '4', 'No'),
(91, 'Robi1982', 'Dhaka', 'Sylhet', '2022-08-24', '1113', '4', 'No'),
(92, 'unknown', 'Dhaka', 'Sylhet', '2022-08-24', '1113', '2', 'No'),
(93, 'unknown', 'Dhaka', 'Sylhet', '2022-08-24', '1113', '2', 'No'),
(94, 'unknown', 'Dhaka', 'Sylhet', '2022-08-24', '1113', '2', 'No'),
(95, 'unknown', 'Dhaka', 'Sylhet', '2022-08-24', '1113', '2', 'No'),
(96, 'unknown', 'Dhaka', 'Sylhet', '2022-08-24', '1113', '2', 'No'),
(97, 'unknown', 'Dhaka', 'Sylhet', '2022-08-24', '1113', '2', 'No'),
(98, 'unknown', 'Dhaka', 'Sylhet', '2022-08-24', '1113', '2', 'No'),
(99, 'unknown', 'Dhaka', 'Sylhet', '2022-08-24', '1113', '2', 'No'),
(100, 'unknown', 'Dhaka', 'Sylhet', '2022-08-24', '1113', '2', 'No'),
(101, 'unknown', 'Dhaka', 'Sylhet', '2022-08-20', '1113', '5', 'No'),
(102, 'unknown', 'Dhaka', 'Sylhet', '2022-08-20', '1113', '5', 'No'),
(103, 'unknown', 'Dhaka', 'Sylhet', '2022-08-20', '1113', '5', 'No'),
(104, 'unknown', 'Dhaka', 'Sylhet', '2022-08-20', '1113', '2', 'No'),
(105, 'Robi1982', 'Dhaka', 'Sylhet', '2022-08-23', '1113', '4', 'No');

-- --------------------------------------------------------

--
-- Table structure for table `ticket_bought`
--

CREATE TABLE `ticket_bought` (
  `ticket_id` varchar(100) NOT NULL,
  `user_name` varchar(100) NOT NULL,
  `bought_price` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ticket_bought`
--

INSERT INTO `ticket_bought` (`ticket_id`, `user_name`, `bought_price`) VALUES
('1', 'Robi1982', '60'),
('2', 'Robi1982', '60'),
('3', 'Robi1982', '60'),
('6', 'Robi1982', '48'),
('7', 'Robi1982', '60'),
('8', 'Robi1982', '60'),
('9', 'Robi1982', '60'),
('10', 'Robi1982', '60'),
('11', 'Robi1982', '60'),
('12', 'Robi1982', '60'),
('13', 'Robi1982', '60'),
('14', 'Robi1982', '60'),
('15', 'Robi1982', '60'),
('16', 'Robi1982', '36'),
('17', 'Robi1982', '60'),
('18', 'Robi1982', '60'),
('19', 'Robi1982', '60'),
('20', 'Robi1982', '60'),
('22', 'Robi1982', '48'),
('23', 'Robi1982', '48'),
('24', 'Robi1982', '48'),
('25', 'Robi1982', '48'),
('26', 'Robi1982', '48'),
('27', 'Robi1982', '48'),
('28', 'Robi1982', '48'),
('29', 'Robi1982', '24'),
('30', 'Robi1982', '60'),
('31', 'Robi1982', '48'),
('32', 'Robi1982', '48'),
('33', 'Robi1982', '24'),
('34', 'Robi1982', '24'),
('35', 'Robi1982', '60'),
('36', 'Robi1982', '24'),
('37', 'Robi1982', '48'),
('38', 'Robi1982', '48'),
('39', 'Robi1982', '48'),
('40', 'Robi1982', '48'),
('41', 'Robi1982', '48'),
('42', 'Robi1982', '48'),
('43', 'Robi1982', '48'),
('44', 'Robi1982', '48'),
('45', 'Robi1982', '48'),
('46', 'Robi1982', '48'),
('47', 'Robi1982', '48'),
('48', 'Robi1982', '48'),
('49', 'Robi1982', '48'),
('50', 'Robi1982', '48'),
('51', 'Robi1982', '48'),
('52', 'Robi1982', '48'),
('53', 'Robi1982', '48'),
('54', 'Robi1982', '48'),
('55', 'Robi1982', '48'),
('56', 'Robi1982', '48'),
('57', 'Robi1982', '48'),
('58', 'Robi1982', '48'),
('59', 'Robi1982', '48'),
('60', 'Robi1982', '48'),
('61', 'Robi1982', '48'),
('62', 'Robi1982', '48'),
('63', 'Robi1982', '48'),
('64', 'Robi1982', '48'),
('65', 'Robi1982', '48'),
('66', 'Robi1982', '48'),
('67', 'Robi1982', '48'),
('68', 'Robi1982', '24'),
('69', 'Robi1982', '24'),
('70', 'Robi1982', '24'),
('71', 'Robi1982', '24'),
('72', 'Robi1982', '24'),
('73', 'Robi1982', '24'),
('74', 'Robi1982', '24'),
('75', 'Robi1982', '48'),
('76', 'Robi1982', '48'),
('77', 'Robi1982', '48'),
('78', 'Robi1982', '48'),
('79', 'Robi1982', '48'),
('80', 'Robi1982', '48'),
('81', 'Robi1982', '48'),
('82', 'Robi1982', '48'),
('83', 'Robi1982', '48'),
('84', 'Robi1982', '48'),
('85', 'Robi1982', '48'),
('86', 'Robi1982', '48'),
('87', 'Robi1982', '48'),
('88', 'Robi1982', '48'),
('89', 'Robi1982', '48'),
('90', 'Robi1982', '48'),
('91', 'Robi1982', '48'),
('92', 'unknown', '24'),
('93', 'unknown', '24'),
('94', 'unknown', '24'),
('95', 'unknown', '24'),
('96', 'unknown', '24'),
('97', 'unknown', '24'),
('98', 'unknown', '24'),
('100', 'sumo', '70'),
('99', 'unknown', '24'),
('100', 'sumo', '70'),
('100', 'unknown', '24'),
('101', 'unknown', '60'),
('102', 'unknown', '60'),
('103', 'unknown', '60'),
('104', 'unknown', '24'),
('105', 'Robi1982', '24');

-- --------------------------------------------------------

--
-- Table structure for table `train`
--

CREATE TABLE `train` (
  `train_id` varchar(100) NOT NULL,
  `train_name` varchar(100) NOT NULL,
  `seat_availability` varchar(100) NOT NULL,
  `class` varchar(100) NOT NULL,
  `active` varchar(100) NOT NULL,
  `_from` varchar(100) NOT NULL,
  `_to` varchar(100) NOT NULL,
  `price` varchar(100) NOT NULL,
  `_time` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `train`
--

INSERT INTO `train` (`train_id`, `train_name`, `seat_availability`, `class`, `active`, `_from`, `_to`, `price`, `_time`) VALUES
('1111', 'Mahanagar Pravati', '50', 'AC', 'Yes', 'Dhaka', 'Chittagong', '12', '9:00 AM'),
('1112', 'Sonar Bangla Express', '100', 'Regular', 'Yes', 'Dhaka', 'Chittagong', '10', '9:00 AM'),
('1113', 'Parbat Express', '100', 'AC', 'Yes', 'Dhaka', 'Sylhet', '12', '2:00 PM'),
('1114', 'Upoban Express', '100', 'Regular', 'No', 'Dhaka', 'Sylhet', '11', '2:00 PM'),
('1115', 'Mahanagar Express', '30', 'AC', 'Yes', 'Dhaka', 'Chittagong', '12', '2:00 PM');

-- --------------------------------------------------------

--
-- Table structure for table `train_time`
--

CREATE TABLE `train_time` (
  `train_id` varchar(100) NOT NULL,
  `_time` varchar(100) NOT NULL,
  `_date` varchar(100) NOT NULL,
  `seat_taken` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `train_time`
--

INSERT INTO `train_time` (`train_id`, `_time`, `_date`, `seat_taken`) VALUES
('1111', '9:00 AM', '2022-08-01', '5'),
('1111', '9:00 AM', '2022-08-04', '10'),
('1111', '9:00 AM', '2022-08-14', '48'),
('1115', '2:00 PM', '2022-08-14', '28'),
('1111', '9:00 AM', '2022-08-17', '3'),
('1111', '9:00 AM', '2022-08-18', '12'),
('1111', '9:00 AM', '2022-08-21', '16'),
('1111', '9:00 AM', '2022-08-20', '2'),
('1113', '2:00 PM', '2022-08-19', '11'),
('1111', '9:00 AM', '2022-08-19', '4'),
('1113', '2:00 PM', '2022-08-20', '21'),
('1113', '2:00 PM', '2022-08-23', '21'),
('1113', '2:00 PM', '2022-08-21', '20'),
('1113', '2:00 PM', '2022-08-22', '92'),
('1113', '2:00 PM', '2022-08-24', '100');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `full_name` varchar(100) NOT NULL,
  `user_name` varchar(100) NOT NULL,
  `age` varchar(100) NOT NULL,
  `current_address` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `train` varchar(100) NOT NULL,
  `mobile` varchar(100) NOT NULL,
  `_password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`full_name`, `user_name`, `age`, `current_address`, `email`, `train`, `mobile`, `_password`) VALUES
('Robi Khan', 'Robi1982', '23', 'Khulna', 'rsdad1982@gmail.com', 'Regular', '61111111111', 'RaiyanKhan-1982');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customer_discount`
--
ALTER TABLE `customer_discount`
  ADD PRIMARY KEY (`user_name`);

--
-- Indexes for table `ticket`
--
ALTER TABLE `ticket`
  ADD PRIMARY KEY (`ticket_id`);

--
-- Indexes for table `train`
--
ALTER TABLE `train`
  ADD PRIMARY KEY (`train_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_name`),
  ADD UNIQUE KEY `user_name` (`user_name`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `mobile` (`mobile`),
  ADD UNIQUE KEY `password` (`_password`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ticket`
--
ALTER TABLE `ticket`
  MODIFY `ticket_id` bigint(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=106;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
