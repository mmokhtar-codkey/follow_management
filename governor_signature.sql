-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 07, 2023 at 04:01 PM
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
-- Database: `office1`
--

-- --------------------------------------------------------

--
-- Table structure for table `governor_signature`
--

CREATE TABLE `governor_signature` (
  `id` bigint(20) NOT NULL,
  `posta_date` date DEFAULT NULL,
  `posta_side` varchar(255) DEFAULT NULL,
  `posta_state` varchar(50) DEFAULT NULL,
  `posta_about` text DEFAULT NULL,
  `posta_file` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `governor_signature`
--

INSERT INTO `governor_signature` (`id`, `posta_date`, `posta_side`, `posta_state`, `posta_about`, `posta_file`, `created_at`, `updated_at`) VALUES
(1, '2023-05-25', 'رئاسة الجمهورية - هيئة مستشاري رئاسة الجمهوري', 'لم يتم', 'يزال نظام مبتكر من القنوات المائية أُنشئ قبل نحو 1700 عام في جنوب البيرو ويبدو من الجوّ كأشكال حلزونية مذهلة، يروي حتى اليوم الوديان القاحلة في منطقة نازكا الشهيرة بسلسلة من النقوش الصخرية القديمة الغامضة.	', NULL, NULL, '2023-05-31 06:13:58'),
(2, '2023-05-25', 'رئاسة الجمهورية - هيئة مستشاري رئاسة الجمهوري', 'لم يتم', 'يزال نظام مبتكر من القنوات المائية أُنشئ قبل نحو 1700 عام في جنوب البيرو ويبدو من الجوّ كأشكال حلزونية مذهلة، يروي حتى اليوم الوديان القاحلة في منطقة نازكا الشهيرة بسلسلة من النقوش الصخرية القديمة الغامضة.	', 'abc.pdf', NULL, '2023-05-29 09:09:45'),
(3, '2023-05-25', 'رئاسة الجمهورية - هيئة مستشاري رئاسة الجمهوري', 'لم يتم', 'يزال نظام مبتكر من القنوات المائية أُنشئ قبل نحو 1700 عام في جنوب البيرو ويبدو من الجوّ كأشكال حلزونية مذهلة، يروي حتى اليوم الوديان القاحلة في منطقة نازكا الشهيرة بسلسلة من النقوش الصخرية القديمة الغامضة.	', 'abc.pdf', NULL, '2023-05-29 09:19:29');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
