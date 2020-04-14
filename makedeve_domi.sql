-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 13, 2020 at 03:44 PM
-- Server version: 5.7.23-23
-- PHP Version: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `makedeve_domi`
--

-- --------------------------------------------------------

--
-- Table structure for table `chat_message`
--

CREATE TABLE `chat_message` (
  `chat_message_id` int(11) NOT NULL,
  `to_user_id` int(11) NOT NULL,
  `from_user_id` int(11) NOT NULL,
  `chat_message` text NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `chat_message`
--

INSERT INTO `chat_message` (`chat_message_id`, `to_user_id`, `from_user_id`, `chat_message`, `timestamp`, `status`) VALUES
(1, 9, 8, 'hola', '2020-03-30 04:00:40', 0),
(2, 8, 9, 'hey', '2020-03-30 04:00:58', 0),
(3, 8, 9, 'digame', '2020-03-30 04:01:03', 0),
(4, 8, 9, '????????', '2020-03-30 04:01:10', 0),
(5, 9, 8, '????', '2020-03-30 04:01:25', 0),
(6, 10, 8, 'hola', '2020-03-30 15:04:24', 0),
(7, 8, 10, 'hey', '2020-03-30 15:04:35', 0),
(8, 10, 8, 'que sucede', '2020-03-30 15:04:43', 0),
(9, 1, 8, 'Hola', '2020-03-30 16:04:35', 0),
(10, 8, 1, 'en que le puedo ayudar?', '2020-03-30 16:10:27', 0),
(11, 1, 8, 'mi pedido no ha llegado', '2020-03-30 16:10:40', 0),
(12, 8, 1, 'permitame un momento', '2020-03-30 16:10:56', 0),
(13, 1, 8, 'ok', '2020-03-30 16:11:01', 0),
(14, 8, 1, 'ok', '2020-03-30 16:11:13', 0),
(15, 1, 8, '????', '2020-03-30 16:11:27', 0),
(16, 1, 8, '????', '2020-03-30 16:11:29', 0),
(17, 8, 1, 'bueno', '2020-03-30 16:11:52', 0),
(18, 1, 8, 'hola', '2020-03-30 16:17:57', 0),
(19, 8, 1, 'si digame', '2020-03-30 16:18:10', 0),
(20, 8, 1, 'si digame', '2020-03-30 16:18:10', 0),
(21, 1, 15, 'hola', '2020-03-30 18:45:55', 0),
(22, 1, 15, 'en que', '2020-03-30 21:30:41', 0),
(23, 15, 1, 'msamsammsadya voy para alla', '2020-03-31 03:07:58', 1),
(24, 20, 1, 'hola', '2020-03-31 03:08:11', 0),
(25, 1, 20, 'hola', '2020-03-31 03:08:32', 2),
(26, 8, 1, 'Ya voy para alla', '2020-03-31 03:09:49', 1),
(27, 1, 20, 'jsjsja', '2020-03-31 19:17:44', 0),
(28, 1, 20, 'jajaj', '2020-04-02 17:23:45', 1),
(29, 1, 20, 'hey help', '2020-04-03 17:49:11', 1),
(30, 1, 20, 'alguien?.??', '2020-04-03 17:49:47', 1),
(31, 1, 20, 'jajajjaja', '2020-04-03 22:56:15', 1),
(32, 1, 20, 'hila', '2020-04-07 18:25:33', 1),
(33, 1, 20, 'jeje', '2020-04-08 20:34:20', 2),
(34, 20, 4, 'Hika', '2020-04-09 16:19:01', 0),
(35, 20, 4, 'sr', '2020-04-09 16:19:07', 0),
(36, 20, 4, 'jpojoj', '2020-04-09 16:19:15', 0),
(37, 20, 4, '????', '2020-04-09 16:19:20', 0),
(38, 4, 20, 'ok', '2020-04-09 16:19:30', 0),
(39, 4, 20, 'hola', '2020-04-09 19:24:54', 0),
(40, 4, 20, 'hey', '2020-04-13 17:03:37', 0),
(41, 4, 22, 'hey', '2020-04-13 19:30:41', 0),
(42, 4, 22, 'jajaja', '2020-04-13 19:30:44', 0),
(43, 4, 22, 'jm', '2020-04-13 20:38:47', 1),
(44, 4, 22, 'jjnnkk', '2020-04-13 20:39:43', 1);

-- --------------------------------------------------------

--
-- Table structure for table `contacto`
--

CREATE TABLE `contacto` (
  `id` int(11) NOT NULL,
  `nombrelocal` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `mensaje` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(11) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `contacto`
--

INSERT INTO `contacto` (`id`, `nombrelocal`, `mensaje`, `phone`) VALUES
(8, 'Coronao', '', '2147483647'),
(9, 'Nankanao', '', '3133757314');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `user_id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `addressAditional` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`user_id`, `username`, `name`, `address`, `addressAditional`, `password`) VALUES
(8, '1', '', '', '', '$2y$10$jlwIvhDyadciDKao3pMFc.dQ6VjiZmpVJRrtGYdxC8I0vVfrfqvwC'),
(9, '123', '', '', '', '$2y$10$sxQazO1f7L/sPh2/ZfjbVez7.kw9DVf5Tphyw75BEWflH24RDds5y'),
(10, 'm', '', '', '', '$2y$10$eIUXci74k0Fu8sfyyLeG9..7L9491bI1y0wgQqJSeyeIy7C0fvkle'),
(12, '2', '', '', '', '$2y$10$Afvh9x2/hLEOsQiwMQWapeXgeToAtWkQYwQw528Fs6a73E1Arl97K'),
(13, '313321', '', '', '', '$2y$10$Z7HQAv1IBy/QrRfn2w9okeHNIXAVTd7uO0k/BjHLYTABY9mdSZCh6'),
(14, '321', '', '', '', '$2y$10$6Oz7e9XLQI9n4YgTz0GWdOZ77z8HJsNXyc/oQ1s0KDO.yfkM0uVKa'),
(15, '1234567890', '', '', '', '$2y$10$NhyiXeDRVz//Pkh91442.O5bvuOMJRc9gG1M54KHizG5Qun25SbUK'),
(20, '3133757314', 'Maicol Alarcon', 'Carrera 104 #13d-57', 'casa azul', '$2y$10$lfjiqIJdK3Qsk3AfeXN49OBfkUH9pshGrVV74Q00dXRYBPvkd6x52'),
(21, '3118469623', 'Fabian Alarcon', 'Calle 1a N15-37', 'Tercer piso', '$2y$10$akDCRqOzvU2Au67OTuJUQ.vGVPePkNzQZOsddZHttuDXz1nbtBd96'),
(22, '1111111111', 'Nuevo', 'Nueva', 'Casa nueva', '$2y$10$fmHUg/i.L2HZxnxGs9WxDeaLla3KYX8wELRFGAJF2rebw4KsBFsVi'),
(23, '3142725894', 'Jose daniel', 'Calle 8 #20-24', 'San miguel', '$2y$10$4e3fs3o7F1P3ldWLB0ouGuBkwA1GfwRKicqnILisI/2Ns6zONI6ly');

-- --------------------------------------------------------

--
-- Table structure for table `loginAdmin`
--

CREATE TABLE `loginAdmin` (
  `user_id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `loginAdmin`
--

INSERT INTO `loginAdmin` (`user_id`, `username`, `password`) VALUES
(1, 'admin', '$2y$10$cuw426qZRVsd1F.7fmLv/uH1QjrLX982UkGVkkcDbOc7xdypT1DDy'),
(3, 'Soporte', '$2y$10$JlPqfg9HtvWiQXY.60Hz3eHdwRf2WLE5c/w.ImG4CIOl.OTMrRdBG'),
(4, 'Repartidor', '$2y$10$W3Wzrqb0aK0pVvq/en4cR.b0KPH97b4YlfnsOxZ8x/awrkvEP8O7O');

-- --------------------------------------------------------

--
-- Table structure for table `login_details`
--

CREATE TABLE `login_details` (
  `login_details_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `last_activity` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `is_type` enum('no','yes') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login_details`
--

INSERT INTO `login_details` (`login_details_id`, `user_id`, `last_activity`, `is_type`) VALUES
(1, 2, '2020-03-30 02:57:09', 'no'),
(2, 4, '2020-03-30 02:58:03', 'no'),
(3, 5, '2020-03-30 02:58:04', 'no'),
(4, 4, '2020-03-30 02:58:12', 'no'),
(5, 6, '2020-03-30 02:59:50', 'no'),
(6, 5, '2020-03-30 03:03:23', 'no'),
(7, 5, '2020-03-30 03:04:07', 'no'),
(8, 5, '2020-03-30 03:04:10', 'no'),
(9, 5, '2020-03-30 03:05:40', 'no'),
(10, 5, '2020-03-30 03:05:56', 'no'),
(11, 5, '2020-03-30 03:08:19', 'no'),
(12, 5, '2020-03-30 03:08:24', 'no'),
(13, 5, '2020-03-30 03:10:02', 'no'),
(14, 7, '2020-03-30 03:10:16', 'no'),
(15, 7, '2020-03-30 03:18:37', 'no'),
(16, 7, '2020-03-30 03:18:44', 'no'),
(17, 7, '2020-03-30 03:20:26', 'no'),
(18, 7, '2020-03-30 03:20:29', 'no'),
(19, 7, '2020-03-30 03:20:32', 'no'),
(20, 7, '2020-03-30 03:23:12', 'no'),
(21, 7, '2020-03-30 03:23:15', 'no'),
(22, 7, '2020-03-30 03:29:38', 'no'),
(23, 7, '2020-03-30 03:29:42', 'no'),
(24, 7, '2020-03-30 03:35:40', 'no'),
(25, 7, '2020-03-30 03:35:43', 'no'),
(26, 8, '2020-03-30 03:38:06', 'no'),
(27, 8, '2020-03-30 03:45:43', 'no'),
(28, 8, '2020-03-30 03:45:47', 'no'),
(29, 8, '2020-03-30 03:59:22', 'no'),
(30, 9, '2020-03-30 04:01:31', 'no'),
(31, 9, '2020-03-30 04:00:25', 'no'),
(32, 8, '2020-03-30 04:01:28', 'no'),
(33, 10, '2020-03-30 15:48:33', 'no'),
(34, 8, '2020-03-30 15:06:38', 'no'),
(35, 8, '2020-03-30 16:05:16', 'no'),
(36, 8, '2020-03-30 16:18:16', 'no'),
(37, 1, '2020-03-30 16:12:23', 'no'),
(38, 11, '2020-03-30 16:13:23', 'no'),
(39, 3, '2020-03-30 16:17:28', 'no'),
(40, 1, '2020-03-30 16:18:18', 'no'),
(41, 12, '2020-03-30 17:14:19', 'no'),
(42, 15, '2020-03-30 18:45:11', 'no'),
(43, 15, '2020-03-30 18:46:00', 'no'),
(44, 15, '2020-03-30 18:51:54', 'no'),
(45, 15, '2020-03-30 18:52:44', 'no'),
(46, 15, '2020-03-30 18:54:05', 'no'),
(47, 17, '2020-03-30 20:17:16', 'no'),
(48, 17, '2020-03-30 20:27:20', 'no'),
(49, 17, '2020-03-30 20:27:37', 'no'),
(50, 17, '2020-03-30 20:41:47', 'no'),
(51, 15, '2020-03-30 21:30:42', 'no'),
(52, 15, '2020-03-30 21:35:14', 'no'),
(53, 1, '2020-03-30 21:36:34', 'no'),
(54, 15, '2020-03-30 21:39:24', 'no'),
(55, 20, '2020-03-31 03:14:32', 'no'),
(56, 1, '2020-03-31 04:23:40', 'no'),
(57, 20, '2020-03-31 04:30:39', 'no'),
(58, 20, '2020-03-31 04:34:26', 'no'),
(59, 20, '2020-03-31 16:35:22', 'no'),
(60, 20, '2020-03-31 16:39:58', 'no'),
(61, 20, '2020-03-31 16:42:09', 'no'),
(62, 20, '2020-03-31 17:58:48', 'no'),
(63, 20, '2020-03-31 19:04:16', 'no'),
(64, 20, '2020-03-31 19:06:39', 'no'),
(65, 20, '2020-03-31 19:07:34', 'no'),
(66, 20, '2020-03-31 19:10:18', 'no'),
(67, 20, '2020-03-31 20:59:20', 'no'),
(68, 20, '2020-03-31 19:49:13', 'no'),
(69, 20, '2020-03-31 21:42:39', 'no'),
(70, 21, '2020-03-31 20:38:37', 'no'),
(71, 20, '2020-04-01 03:44:26', 'no'),
(72, 20, '2020-04-01 03:45:04', 'no'),
(73, 20, '2020-04-01 16:24:53', 'no'),
(74, 20, '2020-04-01 16:30:14', 'no'),
(75, 20, '2020-04-01 18:24:39', 'no'),
(76, 1, '2020-04-01 16:39:11', 'no'),
(77, 20, '2020-04-01 19:33:35', 'no'),
(78, 20, '2020-04-01 19:35:15', 'no'),
(79, 20, '2020-04-02 03:46:33', 'no'),
(80, 20, '2020-04-02 03:47:43', 'no'),
(81, 20, '2020-04-02 05:12:56', 'no'),
(82, 20, '2020-04-02 15:56:14', 'no'),
(83, 20, '2020-04-02 13:47:08', 'no'),
(84, 20, '2020-04-02 13:52:02', 'no'),
(85, 20, '2020-04-02 18:29:29', 'no'),
(86, 20, '2020-04-02 16:09:54', 'no'),
(87, 20, '2020-04-02 16:09:55', 'no'),
(88, 20, '2020-04-02 16:09:55', 'no'),
(89, 20, '2020-04-02 16:16:31', 'no'),
(90, 20, '2020-04-02 16:55:07', 'no'),
(91, 20, '2020-04-02 16:58:06', 'no'),
(92, 20, '2020-04-02 18:25:58', 'no'),
(93, 20, '2020-04-03 00:56:41', 'no'),
(94, 20, '2020-04-03 01:08:39', 'no'),
(95, 20, '2020-04-03 01:56:52', 'no'),
(96, 20, '2020-04-03 17:06:46', 'no'),
(97, 20, '2020-04-03 17:48:06', 'no'),
(98, 20, '2020-04-03 23:29:08', 'no'),
(99, 20, '2020-04-03 19:03:34', 'no'),
(100, 20, '2020-04-03 21:06:57', 'no'),
(101, 20, '2020-04-03 21:13:30', 'no'),
(102, 20, '2020-04-03 21:17:30', 'no'),
(103, 20, '2020-04-03 22:56:20', 'no'),
(104, 20, '2020-04-03 22:57:12', 'no'),
(105, 20, '2020-04-03 23:31:00', 'no'),
(106, 20, '2020-04-03 23:31:52', 'no'),
(107, 20, '2020-04-03 23:50:55', 'no'),
(108, 20, '2020-04-04 00:02:59', 'no'),
(109, 20, '2020-04-04 00:14:58', 'no'),
(110, 20, '2020-04-04 00:52:33', 'no'),
(111, 20, '2020-04-04 00:51:29', 'no'),
(112, 20, '2020-04-04 02:39:53', 'no'),
(113, 20, '2020-04-04 02:43:45', 'no'),
(114, 20, '2020-04-04 02:54:10', 'no'),
(115, 20, '2020-04-04 02:57:25', 'no'),
(116, 20, '2020-04-04 02:58:21', 'no'),
(117, 20, '2020-04-04 03:19:54', 'no'),
(118, 20, '2020-04-04 19:06:56', 'no'),
(119, 20, '2020-04-04 20:25:12', 'no'),
(120, 20, '2020-04-07 01:38:21', 'no'),
(121, 20, '2020-04-07 02:14:10', 'no'),
(122, 20, '2020-04-07 17:01:37', 'no'),
(123, 20, '2020-04-07 18:25:46', 'yes'),
(124, 20, '2020-04-07 18:24:26', 'no'),
(125, 20, '2020-04-07 18:24:32', 'no'),
(126, 20, '2020-04-07 18:26:29', 'no'),
(127, 20, '2020-04-07 21:05:57', 'no'),
(128, 20, '2020-04-07 21:07:47', 'no'),
(129, 20, '2020-04-07 21:19:51', 'no'),
(130, 20, '2020-04-07 23:13:23', 'no'),
(131, 20, '2020-04-07 23:12:52', 'no'),
(132, 20, '2020-04-07 23:31:53', 'no'),
(133, 20, '2020-04-07 23:53:04', 'no'),
(134, 20, '2020-04-08 04:07:08', 'no'),
(135, 20, '2020-04-08 19:36:42', 'no'),
(136, 20, '2020-04-08 22:45:18', 'no'),
(137, 20, '2020-04-08 21:33:10', 'no'),
(138, 20, '2020-04-08 21:38:36', 'no'),
(139, 20, '2020-04-09 02:22:38', 'no'),
(140, 20, '2020-04-08 22:46:17', 'no'),
(141, 20, '2020-04-08 22:55:43', 'no'),
(142, 20, '2020-04-08 23:28:08', 'no'),
(143, 20, '2020-04-09 01:35:12', 'no'),
(144, 20, '2020-04-09 03:07:32', 'no'),
(145, 20, '2020-04-09 03:22:45', 'no'),
(146, 20, '2020-04-09 03:26:20', 'no'),
(147, 20, '2020-04-09 16:13:58', 'no'),
(148, 20, '2020-04-09 16:18:07', 'no'),
(149, 20, '2020-04-09 22:02:19', 'no'),
(150, 4, '2020-04-09 20:31:54', 'no'),
(151, 20, '2020-04-09 17:08:13', 'no'),
(152, 22, '2020-04-09 18:20:02', 'no'),
(153, 22, '2020-04-09 22:20:43', 'no'),
(154, 20, '2020-04-10 04:00:05', 'no'),
(155, 20, '2020-04-10 17:28:32', 'no'),
(156, 22, '2020-04-10 17:31:56', 'no'),
(157, 20, '2020-04-11 14:19:51', 'no'),
(158, 20, '2020-04-11 16:16:45', 'no'),
(159, 20, '2020-04-12 16:40:31', 'no'),
(160, 20, '2020-04-12 16:41:03', 'no'),
(161, 20, '2020-04-12 17:42:20', 'no'),
(162, 22, '2020-04-12 17:35:07', 'no'),
(163, 20, '2020-04-12 18:10:11', 'no'),
(164, 23, '2020-04-12 18:06:14', 'no'),
(165, 20, '2020-04-12 18:16:16', 'no'),
(166, 20, '2020-04-12 20:32:08', 'no'),
(167, 20, '2020-04-12 18:19:37', 'no'),
(168, 22, '2020-04-12 18:21:48', 'no'),
(169, 23, '2020-04-12 18:50:22', 'no'),
(170, 22, '2020-04-12 21:33:49', 'no'),
(171, 22, '2020-04-12 22:10:20', 'no'),
(172, 20, '2020-04-12 22:12:14', 'no'),
(173, 20, '2020-04-12 22:10:58', 'no'),
(174, 22, '2020-04-12 22:44:34', 'no'),
(175, 20, '2020-04-13 15:12:07', 'no'),
(176, 20, '2020-04-13 17:03:40', 'no'),
(177, 20, '2020-04-13 16:46:53', 'no'),
(178, 22, '2020-04-13 16:51:26', 'no'),
(179, 20, '2020-04-13 17:01:55', 'no'),
(180, 22, '2020-04-13 16:59:55', 'no'),
(181, 4, '2020-04-13 20:44:20', 'no'),
(182, 22, '2020-04-13 19:30:46', 'no'),
(183, 22, '2020-04-13 20:34:09', 'no'),
(184, 20, '2020-04-13 20:38:27', 'no'),
(185, 22, '2020-04-13 20:42:49', 'no');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `favor` text COLLATE utf8_unicode_ci NOT NULL,
  `valor` int(11) NOT NULL,
  `address` text COLLATE utf8_unicode_ci NOT NULL,
  `addressAditional` text COLLATE utf8_unicode_ci,
  `propina` int(11) NOT NULL,
  `metodopago` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `domicilio` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `favor`, `valor`, `address`, `addressAditional`, `propina`, `metodopago`, `domicilio`, `total`, `user_id`, `created_at`, `updated_at`) VALUES
(51, ' Por favor soy usuario nuevo', 500, 'Nueva ', 'Casa nueva ', 500, 'Nequi', 250, 1250, 22, '2020-04-13 20:33:47', '2020-04-13 20:33:47'),
(49, ' chimba', 500, 'Carrera 104 #13d-57 ', 'casa azul ', 500, 'Efectivo', 250, 1250, 20, '2020-04-12 17:50:05', '2020-04-12 17:50:05'),
(48, ' envio hacia atras', 500, 'Carrera 104 #13d-57 ', 'casa azul ', 500, 'Efectivo', 250, 1250, 20, '2020-04-12 17:43:27', '2020-04-12 17:43:27'),
(47, ' prueba de valor', 500, 'Carrera 104 #13d-57 ', 'casa azul ', 0, 'Nequi', 250, 750, 20, '2020-04-08 21:29:18', '2020-04-08 21:29:18'),
(45, ' mamaaaaaaaaaaaa', 1000, 'Carrera 104 #13d-57 ', 'casa azul ', 1000, 'Nequi', 500, 2500, 20, '2020-04-04 03:18:54', '2020-04-04 03:18:54'),
(46, ' necesito tal cosa', 2000, 'Carrera 104 #13d-57 ', 'casa azul ', 0, 'Efectivo', 1000, 3000, 20, '2020-04-07 23:39:40', '2020-04-07 23:39:40');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `chat_message`
--
ALTER TABLE `chat_message`
  ADD PRIMARY KEY (`chat_message_id`);

--
-- Indexes for table `contacto`
--
ALTER TABLE `contacto`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `loginAdmin`
--
ALTER TABLE `loginAdmin`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `login_details`
--
ALTER TABLE `login_details`
  ADD PRIMARY KEY (`login_details_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_orders_users_idx` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `chat_message`
--
ALTER TABLE `chat_message`
  MODIFY `chat_message_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `contacto`
--
ALTER TABLE `contacto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `loginAdmin`
--
ALTER TABLE `loginAdmin`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `login_details`
--
ALTER TABLE `login_details`
  MODIFY `login_details_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=186;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
