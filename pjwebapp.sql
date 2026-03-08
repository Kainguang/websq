-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 08, 2026 at 02:13 PM
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
-- Database: `pjwebapp`
--

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cache`
--

INSERT INTO `cache` (`key`, `value`, `expiration`) VALUES
('2aed5a6e16f70b5e889a3b7a51f47de3', 'i:1;', 1771300578),
('2aed5a6e16f70b5e889a3b7a51f47de3:timer', 'i:1771300578;', 1771300578),
('admin@gmail.com|127.0.0.1', 'i:1;', 1771300736),
('admin@gmail.com|127.0.0.1:timer', 'i:1771300736;', 1771300736),
('c525a5357e97fef8d3db25841c86da1a', 'i:1;', 1771300736),
('c525a5357e97fef8d3db25841c86da1a:timer', 'i:1771300736;', 1771300736),
('david.smithson@gmail.com|127.0.0.1', 'i:1;', 1771300580),
('david.smithson@gmail.com|127.0.0.1:timer', 'i:1771300580;', 1771300580);

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `course_name` varchar(255) NOT NULL,
  `course_cost` double NOT NULL,
  `course_sellprice` double NOT NULL,
  `course_status` varchar(1) NOT NULL,
  `start_time` time NOT NULL,
  `end_time` time NOT NULL,
  `period` int(11) NOT NULL,
  `times` int(11) NOT NULL,
  `max_participant` int(11) NOT NULL,
  `description` varchar(255) NOT NULL,
  `picture_path` varchar(255) DEFAULT NULL,
  `employee_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `course_name`, `course_cost`, `course_sellprice`, `course_status`, `start_time`, `end_time`, `period`, `times`, `max_participant`, `description`, `picture_path`, `employee_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'โยคะ 1', 2400, 10000, '1', '09:00:00', '12:00:00', 8, 2, 15, 'คลาสนี้เน้นการเสริมสร้างสมดุลร่างกายและจิตใจผ่านการหายใจและท่าโยคะ เหมาะสำหรับผู้ที่ต้องการพัฒนาความยืดหยุ่นและสงบจิตใจ', 'course_pictures/yogamen1.png', 1, '2024-09-29 05:28:48', '2026-02-25 09:50:21', NULL),
(2, 'โยคะ 2', 2400, 4600, '1', '13:00:00', '15:00:00', 8, 2, 15, 'คลาสเพื่อเสริมความแข็งแรงของกล้ามเนื้อและความยืดหยุ่น ด้วยการหายใจและการเคลื่อนไหวที่อ่อนโยน เหมาะสำหรับทุกเพศทุกวัย', 'course_pictures/yogagirl1.png', 2, '2024-09-29 05:28:48', '2026-02-25 10:00:17', NULL),
(3, 'โยคะ 3', 2400, 4600, '1', '13:00:00', '15:00:00', 8, 2, 15, 'คลาสเน้นพัฒนาความแข็งแกร่งและสมาธิ ช่วยเสริมความมั่นคงในท่าโยคะ เหมาะสำหรับผู้ที่ต้องการท้าทายร่างกาย', 'course_pictures/yogamen2.png', 3, '2024-09-29 05:28:48', '2026-02-25 10:00:21', NULL),
(4, 'โยคะ 4', 2400, 4600, '1', '09:00:00', '12:00:00', 8, 2, 15, 'คลาสนี้เน้นเพิ่มความยืดหยุ่นและความสงบใจผ่านท่าโยคะที่ผ่อนคลาย เหมาะสำหรับผู้ที่ต้องการลดความเครียด', 'course_pictures/yogagirl2.png', 4, '2024-09-29 05:28:48', '2026-02-25 10:00:25', NULL),
(5, 'เต้น 1', 2000, 3600, '1', '09:00:00', '12:00:00', 6, 2, 15, 'คลาสนี้ผสมผสานท่าเต้นสนุกสนานและการออกกำลังกายที่เน้นการเผาผลาญพลังงาน เหมาะสำหรับผู้ที่ต้องการความสนุกและความฟิตในเวลาเดียวกัน', 'course_pictures/dancemen1.jpg', 5, '2024-09-29 05:28:48', '2024-10-03 08:51:19', NULL),
(6, 'เต้น 2', 2000, 3600, '1', '13:00:00', '15:00:00', 6, 2, 15, 'คลาสเต้นที่เน้นการเคลื่อนไหวที่อ่อนช้อยและสวยงาม พร้อมเสริมสร้างความยืดหยุ่นของร่างกาย เหมาะสำหรับผู้ที่ต้องการเพิ่มความมั่นใจในทุกการเคลื่อนไหว', 'course_pictures/dancegirl1.jpg', 6, '2024-09-29 05:28:48', '2026-02-25 10:04:29', NULL),
(7, 'เต้น 3', 2000, 3600, '1', '13:00:00', '15:00:00', 6, 2, 15, 'คลาสนี้เน้นการเต้นแบบผสมผสานสไตล์ที่หลากหลาย ครูวราวุธจะพาคุณปลดปล่อยพลังในจังหวะที่เร้าใจ เหมาะสำหรับผู้ที่ชอบความท้าทายและต้องการพัฒนาทักษะคลาสนี้เน้นการเต้นแบบผสมผสานสไตล์ที่หลากหลาย พาคุณปลดปล่อยพลังในจังหวะที่เร้าใจ เหมาะสำหรับผู้ที่ชอบความท้าทายและต', 'course_pictures/dancemen2.jpeg', 7, '2024-09-29 05:28:48', '2026-02-25 10:04:32', NULL),
(8, 'เต้น 4', 2000, 3600, '1', '09:00:00', '12:00:00', 6, 2, 15, 'คลาสเต้นที่เน้นการออกกำลังกายแบบเต็มรูปแบบ ด้วยท่าเต้นที่สร้างความสนุกสนานและเผาผลาญแคลอรี เหมาะสำหรับผู้ที่ต้องการผ่อนคลายและเพิ่มพลังในเวลาเดียวกัน', 'course_pictures/dancegirl2.jpg', 8, '2024-09-29 05:28:48', '2024-10-03 08:51:57', NULL),
(9, 'มวยไทย 1', 2800, 5400, '1', '09:00:00', '12:00:00', 12, 2, 15, 'คลาสมวยไทยที่เน้นการฝึกท่าพื้นฐานอย่างถูกต้อง เทคนิคการออกหมัด เตะ ศอก เข่า พร้อมกับการฝึกความแข็งแกร่งของร่างกาย', 'course_pictures/muaythaimen1.jpg', 9, '2024-09-29 05:28:48', '2024-10-03 08:52:10', NULL),
(10, 'มวยไทย 2', 2800, 5400, '1', '13:00:00', '15:00:00', 12, 2, 15, 'คลาสนี้เน้นการพัฒนาทักษะการเคลื่อนไหวที่คล่องแคล่วและสวยงาม เทคนิคการป้องกันตัวและการโจมตีแบบผสมผสาน', 'course_pictures/muaythaigirl1.jpg', 10, '2024-09-29 05:28:48', '2024-10-03 08:52:26', NULL),
(11, 'มวยไทย 3', 2800, 5400, '1', '13:00:00', '15:00:00', 12, 2, 15, 'คลาสมวยไทยที่ท้าทายและเน้นการฝึกแบบเข้มข้น ฝึกการเคลื่อนไหวรวดเร็วและเทคนิคการต่อสู้ที่ทรงพลัง', 'course_pictures/muaythaimen2.jpg', 11, '2024-09-29 05:28:48', '2024-10-03 08:52:40', NULL),
(12, 'มวยไทย 4', 2800, 5400, '1', '09:00:00', '12:00:00', 12, 2, 15, 'คลาสที่ออกแบบมาเพื่อพัฒนาทักษะมวยไทยแบบครบวงจร สอนท่ามวยไทยที่หลากหลาย เน้นความแข็งแรง ความคล่องตัว และการเผาผลาญพลังงาน', 'course_pictures/muaythaigirl2.jpg', 12, '2024-09-29 05:28:48', '2024-10-03 08:53:17', NULL),
(13, 'ซุมบา 1', 2200, 4000, '1', '09:00:00', '12:00:00', 7, 2, 15, 'คลาสซุมบาที่เต็มไปด้วยพลังและความสนุก เต้นในจังหวะดนตรีหลากหลายสไตล์ ช่วยเผาผลาญแคลอรีและเพิ่มความฟิตอย่างสนุกสนาน', 'course_pictures/zumbamen1.jpg', 13, '2024-09-29 05:28:48', '2024-10-03 08:52:53', NULL),
(14, 'ซุมบา 2', 2200, 4000, '1', '13:00:00', '15:00:00', 7, 2, 15, 'คลาสที่ผสมผสานความสนุกของการเต้นซุมบาเข้ากับท่าเต้นที่อ่อนช้อย ช่วยให้คุณเคลื่อนไหวได้อย่างคล่องตัวและพัฒนาความยืดหยุ่นในทุกจังหวะเพลง', 'course_pictures/zumbagirl1.jpg', 14, '2024-09-29 05:28:48', '2024-10-03 08:53:31', NULL),
(15, 'ซุมบา 3', 2200, 4000, '1', '13:00:00', '15:00:00', 7, 2, 15, 'คลาสที่เน้นการเต้นซุมบาอย่างเร้าใจและเข้มข้น เต้นอย่างเต็มที่เพื่อเผาผลาญแคลอรี เหมาะสำหรับผู้ที่ต้องการออกกำลังกายที่สนุกสนาน', 'course_pictures/zumbamen2.jpg', 15, '2024-09-29 05:28:48', '2024-10-03 10:14:19', NULL),
(16, 'ซุมบา 4', 2200, 4000, '1', '09:00:00', '12:00:00', 7, 2, 15, 'คลาสซุมบาที่ออกแบบมาเพื่อเพิ่มความฟิตและความสนุก เต้นในจังหวะดนตรีสุดมันส์ เหมาะสำหรับผู้ที่ต้องการออกกำลังกายแบบเต็มพลังและเพลิดเพลินไปกับดนตรี', 'course_pictures/zumbagirl2.jpg', 16, '2024-09-29 05:28:48', '2024-10-03 08:54:28', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `course_days`
--

CREATE TABLE `course_days` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `course_id` bigint(20) UNSIGNED NOT NULL,
  `day_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `course_days`
--

INSERT INTO `course_days` (`id`, `course_id`, `day_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 2, '2024-09-29 05:31:36', '2024-09-29 05:31:36', NULL),
(2, 1, 3, '2024-09-29 05:31:36', '2024-09-29 05:31:36', NULL),
(3, 2, 2, '2024-09-29 05:31:36', '2024-09-29 05:31:36', NULL),
(4, 2, 3, '2024-09-29 05:31:36', '2024-09-29 05:31:36', NULL),
(5, 3, 2, '2024-09-29 05:31:36', '2024-09-29 05:31:36', NULL),
(6, 3, 3, '2024-09-29 05:31:36', '2024-09-29 05:31:36', NULL),
(7, 4, 2, '2024-09-29 05:31:36', '2024-09-29 05:31:36', NULL),
(8, 4, 3, '2024-09-29 05:31:36', '2024-09-29 05:31:36', NULL),
(9, 5, 4, '2024-09-29 05:31:36', '2024-09-29 05:31:36', NULL),
(10, 5, 5, '2024-09-29 05:31:36', '2024-09-29 05:31:36', NULL),
(11, 6, 4, '2024-09-29 05:31:36', '2024-09-29 05:31:36', NULL),
(12, 6, 5, '2024-09-29 05:31:36', '2024-09-29 05:31:36', NULL),
(13, 7, 4, '2024-09-29 05:31:36', '2024-09-29 05:31:36', NULL),
(14, 7, 5, '2024-09-29 05:31:36', '2024-09-29 05:31:36', NULL),
(15, 8, 4, '2024-09-29 05:31:36', '2024-09-29 05:31:36', NULL),
(16, 8, 5, '2024-09-29 05:31:36', '2024-09-29 05:31:36', NULL),
(17, 9, 1, '2024-09-29 05:31:36', '2024-09-29 05:31:36', NULL),
(18, 9, 7, '2024-09-29 05:31:36', '2024-09-29 05:31:36', NULL),
(19, 10, 1, '2024-09-29 05:31:36', '2024-09-29 05:31:36', NULL),
(20, 10, 7, '2024-09-29 05:31:36', '2024-09-29 05:31:36', NULL),
(21, 11, 1, '2024-09-29 05:31:36', '2024-09-29 05:31:36', NULL),
(22, 11, 7, '2024-09-29 05:31:36', '2024-09-29 05:31:36', NULL),
(23, 12, 1, '2024-09-29 05:31:37', '2024-09-29 05:31:37', NULL),
(24, 12, 7, '2024-09-29 05:31:37', '2024-09-29 05:31:37', NULL),
(25, 13, 4, '2024-09-29 05:31:37', '2024-09-29 05:31:37', NULL),
(26, 13, 6, '2024-09-29 05:31:37', '2024-09-29 05:31:37', NULL),
(27, 14, 4, '2024-09-29 05:31:37', '2024-09-29 05:31:37', NULL),
(28, 14, 6, '2024-09-29 05:31:37', '2024-09-29 05:31:37', NULL),
(29, 15, 4, '2024-09-29 05:31:37', '2024-09-29 05:31:37', NULL),
(30, 15, 6, '2024-09-29 05:31:37', '2024-09-29 05:31:37', NULL),
(31, 16, 4, '2024-09-29 05:31:37', '2024-09-29 05:31:37', NULL),
(32, 16, 6, '2024-09-29 05:31:37', '2024-09-29 05:31:37', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `course_facilities`
--

CREATE TABLE `course_facilities` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `course_id` bigint(20) UNSIGNED NOT NULL,
  `facility_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `course_facilities`
--

INSERT INTO `course_facilities` (`id`, `course_id`, `facility_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 1, '2024-09-29 05:31:15', '2024-09-29 05:31:15', NULL),
(2, 1, 2, '2024-09-29 05:31:15', '2024-09-29 05:31:15', NULL),
(3, 1, 8, '2024-09-29 05:31:15', '2024-09-29 05:31:15', NULL),
(4, 1, 7, '2024-09-29 05:31:15', '2024-09-29 05:31:15', NULL),
(5, 2, 1, '2024-09-29 05:31:15', '2024-09-29 05:31:15', NULL),
(6, 2, 2, '2024-09-29 05:31:15', '2024-09-29 05:31:15', NULL),
(7, 2, 8, '2024-09-29 05:31:15', '2024-09-29 05:31:15', NULL),
(8, 2, 7, '2024-09-29 05:31:15', '2024-09-29 05:31:15', NULL),
(9, 3, 1, '2024-09-29 05:31:15', '2024-09-29 05:31:15', NULL),
(10, 3, 2, '2024-09-29 05:31:15', '2024-09-29 05:31:15', NULL),
(11, 3, 8, '2024-09-29 05:31:15', '2024-09-29 05:31:15', NULL),
(12, 3, 7, '2024-09-29 05:31:15', '2024-09-29 05:31:15', NULL),
(13, 4, 1, '2024-09-29 05:31:15', '2024-09-29 05:31:15', NULL),
(14, 4, 2, '2024-09-29 05:31:15', '2024-09-29 05:31:15', NULL),
(15, 4, 8, '2024-09-29 05:31:15', '2024-09-29 05:31:15', NULL),
(16, 4, 7, '2024-09-29 05:31:15', '2024-09-29 05:31:15', NULL),
(17, 5, 8, '2024-09-29 05:31:15', '2024-09-29 05:31:15', NULL),
(18, 5, 6, '2024-09-29 05:31:15', '2024-09-29 05:31:15', NULL),
(19, 5, 3, '2024-09-29 05:31:15', '2024-09-29 05:31:15', NULL),
(20, 5, 4, '2024-09-29 05:31:15', '2024-09-29 05:31:15', NULL),
(21, 6, 8, '2024-09-29 05:31:15', '2024-09-29 05:31:15', NULL),
(22, 6, 6, '2024-09-29 05:31:15', '2024-09-29 05:31:15', NULL),
(23, 6, 3, '2024-09-29 05:31:15', '2024-09-29 05:31:15', NULL),
(24, 6, 4, '2024-09-29 05:31:16', '2024-09-29 05:31:16', NULL),
(25, 7, 8, '2024-09-29 05:31:16', '2024-09-29 05:31:16', NULL),
(26, 7, 6, '2024-09-29 05:31:16', '2024-09-29 05:31:16', NULL),
(27, 7, 3, '2024-09-29 05:31:16', '2024-09-29 05:31:16', NULL),
(28, 7, 4, '2024-09-29 05:31:16', '2024-09-29 05:31:16', NULL),
(29, 8, 8, '2024-09-29 05:31:16', '2024-09-29 05:31:16', NULL),
(30, 8, 6, '2024-09-29 05:31:16', '2024-09-29 05:31:16', NULL),
(31, 8, 3, '2024-09-29 05:31:16', '2024-09-29 05:31:16', NULL),
(32, 8, 4, '2024-09-29 05:31:16', '2024-09-29 05:31:16', NULL),
(33, 9, 3, '2024-09-29 05:31:16', '2024-09-29 05:31:16', NULL),
(34, 9, 5, '2024-09-29 05:31:16', '2024-09-29 05:31:16', NULL),
(35, 9, 10, '2024-09-29 05:31:16', '2024-09-29 05:31:16', NULL),
(36, 9, 11, '2024-09-29 05:31:16', '2024-09-29 05:31:16', NULL),
(37, 10, 3, '2024-09-29 05:31:16', '2024-09-29 05:31:16', NULL),
(38, 10, 5, '2024-09-29 05:31:16', '2024-09-29 05:31:16', NULL),
(39, 10, 10, '2024-09-29 05:31:16', '2024-09-29 05:31:16', NULL),
(40, 10, 11, '2024-09-29 05:31:16', '2024-09-29 05:31:16', NULL),
(41, 11, 3, '2024-09-29 05:31:16', '2024-09-29 05:31:16', NULL),
(42, 11, 5, '2024-09-29 05:31:16', '2024-09-29 05:31:16', NULL),
(43, 11, 10, '2024-09-29 05:31:16', '2024-09-29 05:31:16', NULL),
(44, 11, 11, '2024-09-29 05:31:16', '2024-09-29 05:31:16', NULL),
(45, 12, 3, '2024-09-29 05:31:16', '2024-09-29 05:31:16', NULL),
(46, 12, 5, '2024-09-29 05:31:16', '2024-09-29 05:31:16', NULL),
(47, 12, 10, '2024-09-29 05:31:16', '2024-09-29 05:31:16', NULL),
(48, 12, 11, '2024-09-29 05:31:16', '2024-09-29 05:31:16', NULL),
(49, 13, 6, '2024-09-29 05:31:16', '2024-09-29 05:31:16', NULL),
(50, 13, 3, '2024-09-29 05:31:16', '2024-09-29 05:31:16', NULL),
(51, 13, 4, '2024-09-29 05:31:16', '2024-09-29 05:31:16', NULL),
(52, 13, 9, '2024-09-29 05:31:16', '2024-09-29 05:31:16', NULL),
(53, 14, 6, '2024-09-29 05:31:16', '2024-09-29 05:31:16', NULL),
(54, 14, 3, '2024-09-29 05:31:16', '2024-09-29 05:31:16', NULL),
(55, 14, 4, '2024-09-29 05:31:16', '2024-09-29 05:31:16', NULL),
(56, 14, 9, '2024-09-29 05:31:16', '2024-09-29 05:31:16', NULL),
(57, 15, 6, '2024-09-29 05:31:16', '2024-09-29 05:31:16', NULL),
(58, 15, 3, '2024-09-29 05:31:16', '2024-09-29 05:31:16', NULL),
(59, 15, 4, '2024-09-29 05:31:16', '2024-09-29 05:31:16', NULL),
(60, 15, 9, '2024-09-29 05:31:16', '2024-09-29 05:31:16', NULL),
(61, 16, 6, '2024-09-29 05:31:16', '2024-09-29 05:31:16', NULL),
(62, 16, 3, '2024-09-29 05:31:16', '2024-09-29 05:31:16', NULL),
(63, 16, 4, '2024-09-29 05:31:16', '2024-09-29 05:31:16', NULL),
(64, 16, 9, '2024-09-29 05:31:16', '2024-09-29 05:31:16', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `phonenum` varchar(10) NOT NULL,
  `address` varchar(255) NOT NULL,
  `birthdate` date NOT NULL,
  `weight` double NOT NULL,
  `height` int(11) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `profile_picture` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `firstname`, `lastname`, `email`, `password`, `phonenum`, `address`, `birthdate`, `weight`, `height`, `gender`, `profile_picture`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'เดอิอิ', 'สมิธสัน', 'david.smithson@gmail.com', '$2y$12$/ryWfhUaedpIeLDMZc4F0uSEa9Jxq9yzQD0BEiBIgEQZmxtu/pmK.', '0915551234', '123 Main Street, เขตคลองเตย, กรุงเทพฯ 10110', '1986-04-22', 80, 185, 'ชาย', 'profile_pictures/fourthkub.jpg', '2024-09-29 05:27:32', '2026-02-25 10:18:09', NULL),
(2, 'เอลิซาเบธ', 'แบรดฟอร์ด', 'elizabeth.bradford@gmail.com', '$2y$10$2MJ9NQvaLbEkTV0KV7S47uNrX2DmpYZMR/6hXdhwolz3WWnzXoQIa', '0813335678', '567/89 หมู่บ้านปิ่นเกล้า, ถนนจรัญสนิทวงศ์, เขตบางพลัด, กรุงเทพฯ 10700', '1988-03-13', 60, 170, 'หญิง', 'https://cms.dmpcdn.com/musicarticle/2021/04/19/9a4dd220-a0dd-11eb-b0fb-f5ec3a1c8403_original.jpg', '2024-09-29 05:27:32', '2024-09-29 05:27:32', NULL),
(3, 'เจคอบ', 'แอนเดอร์สัน', 'jacob.anderson@gmail.com', '$2y$10$2MJ9NQvaLbEkTV0KV7S47uNrX2DmpYZMR/6hXdhwolz3WWnzXoQIa', '0928765432', '45/2 ซอยลาดพร้าว 101, แขวงคลองเจ้าคุณสิงห์, เขตบางกะปิ, กรุงเทพฯ 10240', '1989-09-14', 78, 180, 'ชาย', 'https://f.ptcdn.info/555/080/000/ruchv82c2ykWPkkuCAtC5-o.jpg', '2024-09-29 05:27:32', '2024-09-29 05:27:32', NULL),
(4, 'เอมิลี่', 'โรเบิร์ตส์', 'emily.roberts@gmai.com', '$2y$10$2MJ9NQvaLbEkTV0KV7S47uNrX2DmpYZMR/6hXdhwolz3WWnzXoQIa', '0821119876', '100/5 ถนนเพชรเกษม, แขวงหนองแขม, เขตหนองแขม, กรุงเทพฯ 10160', '1991-10-18', 58, 165, 'หญิง', '', '2024-09-29 05:27:32', '2024-09-29 05:27:32', NULL),
(5, 'แดเนียล', 'โจเซฟ', 'daniel.joseph@gmail.com', '$2y$10$2MJ9NQvaLbEkTV0KV7S47uNrX2DmpYZMR/6hXdhwolz3WWnzXoQIa', '0932229876', '789 หมู่บ้านสุขสันต์, ถนนรามคำแหง, เขตสะพานสูง, กรุงเทพฯ 10240', '1991-11-17', 85, 183, 'ชาย', '', '2024-09-29 05:27:32', '2024-09-29 05:27:32', NULL),
(6, 'โซเฟีย', 'ฮาร์เปอร์', 'sophia.harper@gmail.com', '$2y$10$2MJ9NQvaLbEkTV0KV7S47uNrX2DmpYZMR/6hXdhwolz3WWnzXoQIa', '0839876543', '300/25 หมู่บ้านแกรนด์วิลล์, ตำบลปากเกร็ด, อำเภอปากเกร็ด, จังหวัดนนทบุรี 11120', '1990-07-22', 55, 168, 'หญิง', '', '2024-09-29 05:27:32', '2024-09-29 05:27:32', NULL),
(7, 'คริสโตเฟอร์', 'วิลสัน', 'christopher.wilson@gmail.com', '$2y$10$2MJ9NQvaLbEkTV0KV7S47uNrX2DmpYZMR/6hXdhwolz3WWnzXoQIa', '0944567890', '22/11 หมู่ 4, ตำบลบ้านใหม่, อำเภอเมือง, จังหวัดนครราชสีมา 30000', '1990-06-25', 88, 188, 'ชาย', '', '2024-09-29 05:27:32', '2024-09-29 05:27:32', NULL),
(8, 'อลิซา', 'สจ๊วต', 'alyssa.stewart@gmail.com', '$2y$10$2MJ9NQvaLbEkTV0KV7S47uNrX2DmpYZMR/6hXdhwolz3WWnzXoQIa', '0845432109', '55/15 ซอยอารีย์, ถนนพหลโยธิน, แขวงสามเสนใน, เขตพญาไท, กรุงเทพฯ 10400', '1992-11-30', 57, 170, 'หญิง', '', '2024-09-29 05:27:32', '2024-09-29 05:27:32', NULL),
(9, 'ก้องภพ', 'ศิริวงศ์', 'kongphop.sirivong@gmail.com', '$2y$10$2MJ9NQvaLbEkTV0KV7S47uNrX2DmpYZMR/6hXdhwolz3WWnzXoQIa', '0811234567', '456 ถนนพหลโยธิน กรุงเทพฯ 10400', '1990-01-15', 75, 178, 'ชาย', '', '2024-09-29 05:27:32', '2024-09-29 05:27:32', NULL),
(10, 'พรทิพย์', 'แสงจันทร์', 'porntip.sc@gmail.com', '$2y$10$2MJ9NQvaLbEkTV0KV7S47uNrX2DmpYZMR/6hXdhwolz3WWnzXoQIa', '0819876540', '12 ซอยรามคำแหง เขตบางกะปิ กรุงเทพฯ 10240', '1990-11-23', 55, 165, 'หญิง', '', '2024-09-29 05:27:32', '2024-09-29 05:27:32', NULL),
(11, 'ธนพล', 'พัฒนวัฒน์', 'thanapol.pattanawat@gmail.com', '$2y$10$2MJ9NQvaLbEkTV0KV7S47uNrX2DmpYZMR/6hXdhwolz3WWnzXoQIa', '0812345678', '123 หมู่ 1 ถนนเจริญนคร เขตคลองสาน กรุงเทพฯ 10250', '1995-11-15', 78, 182, 'ชาย', '', '2024-09-29 05:27:32', '2024-09-29 05:27:32', NULL),
(12, 'สุชาดา', 'วงศ์กาญจนา', 'suchada.wg@gmail.com', '$2y$10$2MJ9NQvaLbEkTV0KV7S47uNrX2DmpYZMR/6hXdhwolz3WWnzXoQIa', '0847654320', '33 ถนนพญาไท เขตราชเทวี กรุงเทพฯ 10400', '1993-10-10', 60, 162, 'หญิง', '', '2024-09-29 05:27:32', '2024-09-29 05:27:32', NULL),
(13, 'กิตติศักดิ์', 'วงศ์ชัย', 'kittisak.wc@gmail.com', '$2y$12$LUoIYKbhyozGKdaOfCQzguUkIROEzHYobOyx7/xrsIMzpFP9FpML2', '0893456789', '30 หมู่ 5 ถนนรามอินทรา เขตบางเขน กรุงเทพฯ 10220', '1992-05-15', 85, 185, 'ชาย', '', '2024-09-29 05:27:32', '2024-10-04 05:33:40', NULL),
(14, 'อรพรรณ', 'ทองคำ', 'orapan.tk@gmail.com', '$2y$10$2MJ9NQvaLbEkTV0KV7S47uNrX2DmpYZMR/6hXdhwolz3WWnzXoQIa', '0829874321', '88 หมู่บ้านจันทร์งาม เขตบางเขน กรุงเทพฯ 10220', '1992-08-25', 52, 158, 'หญิง', '', '2024-09-29 05:27:32', '2024-09-29 05:27:32', NULL),
(15, 'พิทักษ์ชัย', 'นาคแก้ว', 'pitakchai.ng@gmail.com', '$2y$10$2MJ9NQvaLbEkTV0KV7S47uNrX2DmpYZMR/6hXdhwolz3WWnzXoQIa', '0834321098', '56 ซอยลาดพร้าว 48 เขตวังทองหลาง กรุงเทพฯ 10310', '1988-07-22', 77, 175, 'ชาย', '', '2024-09-29 05:27:32', '2024-09-29 05:27:32', NULL),
(16, 'ชนิกานต์', 'อินทร์แก้ว', 'chanikan.ig@gmail.com', '$2y$10$2MJ9NQvaLbEkTV0KV7S47uNrX2DmpYZMR/6hXdhwolz3WWnzXoQIa', '0894321234', '66 ถนนพระราม 9 เขตห้วยขวาง กรุงเทพฯ 10310', '1991-09-15', 57, 162, 'หญิง', '', '2024-09-29 05:27:32', '2024-09-29 05:27:32', NULL),
(17, 'นพดล', 'ศรีสุวรรณ', 'nopadol.sw@gmail.com', '$2y$10$2MJ9NQvaLbEkTV0KV7S47uNrX2DmpYZMR/6hXdhwolz3WWnzXoQIa', '0847652345', '12 ถนนสีลม เขตบางรัก กรุงเทพฯ 10500', '1991-11-10', 72, 170, 'ชาย', '', '2024-09-29 05:27:32', '2024-09-29 05:27:32', NULL),
(18, 'ธนาภรณ์', 'แก้วมณี', 'thanaporn.km@gmail.com', '$2y$10$2MJ9NQvaLbEkTV0KV7S47uNrX2DmpYZMR/6hXdhwolz3WWnzXoQIa', '0869874320', '77 ถนนนวมินทร์ เขตบึงกุ่ม กรุงเทพฯ 10240', '1994-03-18', 58, 160, 'หญิง', '', '2024-09-29 05:27:32', '2024-09-29 05:27:32', NULL),
(19, 'วีรชาติ', 'ทองอร่าม', 'weerachat.tr@gmail.com', '$2y$10$2MJ9NQvaLbEkTV0KV7S47uNrX2DmpYZMR/6hXdhwolz3WWnzXoQIa', '0869876543', '88 หมู่บ้านประชาชื่น เขตบางซื่อ กรุงเทพฯ 10800', '1993-09-23', 80, 180, 'ชาย', '', '2024-09-29 05:27:32', '2024-09-29 05:27:32', NULL),
(20, 'กัญญารัตน์', 'ทองดี', 'kanyarat.td@gmail.com', '$2y$12$.jlLfDR69ckyQmN13Y5H6OnVWtiZCAon5A4FR17VcsKLGH9PrJ7q2', '0837652345', '14 หมู่บ้านลาดพร้าว เขตวังทองหลาง กรุงเทพฯ 10310', '1990-11-22', 54, 159, 'หญิง', '', '2024-09-29 05:27:32', '2024-10-01 02:36:51', NULL),
(21, 'กฤษณะ', 'หอมหวล', 'krisana.hh@gmail.com', '$2y$10$2MJ9NQvaLbEkTV0KV7S47uNrX2DmpYZMR/6hXdhwolz3WWnzXoQIa', '0819876541', '29 หมู่บ้านแสงทอง เขตจตุจักร กรุงเทพฯ 10900', '1989-03-15', 76, 178, 'ชาย', '', '2024-09-29 05:27:32', '2024-09-29 05:27:32', NULL),
(22, 'สุปราณี', 'มะลิทอง', 'supranee.mt@gmail.com', '$2y$10$2MJ9NQvaLbEkTV0KV7S47uNrX2DmpYZMR/6hXdhwolz3WWnzXoQIa', '0859876542', '99 ซอยอุดมสุข เขตบางนา กรุงเทพฯ 10260', '1992-11-22', 61, 166, 'หญิง', '', '2024-09-29 05:27:32', '2024-09-29 05:27:32', NULL),
(23, 'ธรรมรักษ์', 'ชาญประเสริฐ', 'thammarak.cp@gmail.com', '$2y$10$2MJ9NQvaLbEkTV0KV7S47uNrX2DmpYZMR/6hXdhwolz3WWnzXoQIa', '0854321098', '100 ถนนสาทร เขตสาทร กรุงเทพฯ 10120', '1994-06-18', 82, 183, 'ชาย', '', '2024-09-29 05:27:32', '2024-09-29 05:27:32', NULL),
(24, 'ปวีณา', 'วิริยะวงศ์', 'paveena.vw@gmail.com', '$2y$10$2MJ9NQvaLbEkTV0KV7S47uNrX2DmpYZMR/6hXdhwolz3WWnzXoQIa', '0807654320', '22 ถนนเจริญนคร เขตคลองสาน กรุงเทพฯ 10600', '1995-05-17', 59, 164, 'หญิง', '', '2024-09-29 05:27:32', '2024-09-29 05:27:32', NULL),
(25, 'ภูริณัฐ', 'นาคเจริญ', 'phurinat.nj@gmail.com', '$2y$10$2MJ9NQvaLbEkTV0KV7S47uNrX2DmpYZMR/6hXdhwolz3WWnzXoQIa', '0807654321', '45 ถนนเพชรเกษม เขตบางแค กรุงเทพฯ 10160', '1992-10-12', 75, 172, 'ชาย', '', '2024-09-29 05:27:33', '2024-09-29 05:27:33', NULL),
(26, 'กุลธิดา', 'รุ่งเรือง', 'kulthida.rr@gmail.com', '$2y$10$2MJ9NQvaLbEkTV0KV7S47uNrX2DmpYZMR/6hXdhwolz3WWnzXoQIa', '0821237654', '90 หมู่บ้านประชาอุทิศ เขตทุ่งครุ กรุงเทพฯ 10140', '1991-07-17', 53, 161, 'หญิง', '', '2024-09-29 05:27:33', '2024-09-29 05:27:33', NULL),
(27, 'ณัฐพล', 'วัฒนกิจ', 'nattapol.wk@gmail.com', '$2y$10$2MJ9NQvaLbEkTV0KV7S47uNrX2DmpYZMR/6hXdhwolz3WWnzXoQIa', '0876541234', '59 ถนนนราธิวาสราชนครินทร์ เขตสาทร กรุงเทพฯ 10120', '1990-12-29', 79, 176, 'ชาย', '', '2024-09-29 05:27:33', '2024-09-29 05:27:33', NULL),
(28, 'สุพรรณี', 'แก้วเจริญ', 'supannee.kj@gmail.com', '$2y$10$2MJ9NQvaLbEkTV0KV7S47uNrX2DmpYZMR/6hXdhwolz3WWnzXoQIa', '0876543210', '44 ถนนนราธิวาส เขตบางรัก กรุงเทพฯ 10500', '1989-10-12', 56, 163, 'หญิง', '', '2024-09-29 05:27:33', '2024-09-29 05:27:33', NULL),
(29, 'อนุรักษ์', 'รุ่งเรือง', 'anurak.rr@gmail.com', '$2y$10$2MJ9NQvaLbEkTV0KV7S47uNrX2DmpYZMR/6hXdhwolz3WWnzXoQIa', '0891236543', '68 ซอยอ่อนนุช เขตสวนหลวง กรุงเทพฯ 10250', '1987-08-17', 81, 181, 'ชาย', '', '2024-09-29 05:27:33', '2024-10-04 09:48:38', '2024-10-04 09:48:38'),
(30, 'วรินทร์พร', 'จงรักษ์', 'warinporn.j@gmail.com', '$2y$10$2MJ9NQvaLbEkTV0KV7S47uNrX2DmpYZMR/6hXdhwolz3WWnzXoQIa', '0912345678', '123/45 หมู่บ้านสุขใจ ถนนพระราม 2 เขตจอมทอง กรุงเทพฯ 10150', '1992-03-15', 58, 165, 'หญิง', '', '2024-09-29 05:27:33', '2024-09-29 12:14:55', '2024-09-29 12:14:55'),
(31, 'สาวสวย', 'สองสาม', '007@gmail.com', '$2y$12$3YU/dt3tMnFS8.rcwKGt4ObURb/iD72uBkfzM1f2TW1KLVpSCJeXS', '0630640650', 'มข', '2005-05-01', 56, 165, 'หญิง', NULL, '2024-09-30 11:18:38', '2024-10-04 06:45:00', '2024-10-04 06:45:00');

-- --------------------------------------------------------

--
-- Table structure for table `days`
--

CREATE TABLE `days` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `days`
--

INSERT INTO `days` (`id`, `name`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'อาทิตย์', '2024-09-29 05:27:56', '2024-09-29 05:27:56', NULL),
(2, 'จันทร์', '2024-09-29 05:27:56', '2024-09-29 05:27:56', NULL),
(3, 'อังคาร', '2024-09-29 05:27:56', '2024-09-29 05:27:56', NULL),
(4, 'พุธ', '2024-09-29 05:27:56', '2024-09-29 05:27:56', NULL),
(5, 'พฤหัสบดี', '2024-09-29 05:27:56', '2024-09-29 05:27:56', NULL),
(6, 'ศุกร์', '2024-09-29 05:27:56', '2024-09-29 05:27:56', NULL),
(7, 'เสาร์', '2024-09-29 05:27:56', '2024-09-29 05:27:56', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `phonenum` varchar(10) NOT NULL,
  `address` varchar(255) NOT NULL,
  `birthdate` date NOT NULL,
  `weight` double NOT NULL,
  `height` int(11) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `salary` double NOT NULL,
  `profile_picture` varchar(255) DEFAULT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`id`, `firstname`, `lastname`, `email`, `password`, `phonenum`, `address`, `birthdate`, `weight`, `height`, `gender`, `salary`, `profile_picture`, `role_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'นพชัย', 'วิริยะสกุล', 'nopchai.wiriyasakul@gmail.com', '$2y$10$2MJ9NQvaLbEkTV0KV7S47uNrX2DmpYZMR/6hXdhwolz3WWnzXoQIa', '0812345678', '123/45 ซอยสุขุมวิท 64 แขวงพระโขนง เขตคลองเตย กรุงเทพฯ 10110', '1990-08-12', 75, 189, 'ชาย', 20000, 'https://today-obs.line-scdn.net/0h8MU_8aQpZ2JoJnfau2cYNVBwaxNbQH1rSkcsU0UvOlZCCiNkUxM0AUlzPE5NEHRnSBMsAUwvbFoVFSYwUQ/w644', 1, '2024-09-29 05:25:51', '2024-09-29 05:25:51', NULL),
(2, 'ปรียาภรณ์', 'ศิริกุลวงศ์', 'preeyaporn.sirikulwong@gmail.com', '$2y$10$2MJ9NQvaLbEkTV0KV7S47uNrX2DmpYZMR/6hXdhwolz3WWnzXoQIa', '0869876543', '89 หมู่ 7 ตำบลบ้านใหม่ อำเภอเมือง จังหวัดนครราชสีมา 30000', '1994-06-25', 58, 170, 'หญิง', 20000, 'https://upload.wikimedia.org/wikipedia/commons/thumb/a/ae/20240314_Lisa_Manoban_07.jpg/640px-20240314_Lisa_Manoban_07.jpg', 1, '2024-09-29 05:25:51', '2024-09-29 05:25:51', NULL),
(3, 'วิชาญ', 'จงใจรักษ์', 'wichan.jongjairak@gmail.com', '$2y$10$2MJ9NQvaLbEkTV0KV7S47uNrX2DmpYZMR/6hXdhwolz3WWnzXoQIa', '0897654321', '44 หมู่บ้านสุขสันต์ ถนนประชาราษฎร์ ตำบลบางกระสอ อำเภอเมือง จังหวัดนนทบุรี 11000', '1985-10-30', 82, 180, 'ชาย', 18000, 'https://magazine.weverse.io/upload/img/202306/20230616d3TK2vwJ.jpg', 1, '2024-09-29 05:25:51', '2024-09-29 05:25:51', NULL),
(4, 'จารุวรรณ', 'พรหมรักษา', 'jaruwan.phromraksa@gmail.com', '$2y$10$2MJ9NQvaLbEkTV0KV7S47uNrX2DmpYZMR/6hXdhwolz3WWnzXoQIa', '0843219876', '512/8 ถนนราชพฤกษ์ แขวงบางจาก เขตภาษีเจริญ กรุงเทพฯ 10160', '1992-02-18', 55, 162, 'หญิง', 18000, 'https://pbs.twimg.com/media/F8EEBUhboAA0EMk.jpg:large', 1, '2024-09-29 05:25:51', '2024-09-29 05:25:51', NULL),
(5, 'เกรียงไกร', 'สมบูรณ์ชัย', 'kriangkrai.somboonchai@gmail.com', '$2y$10$2MJ9NQvaLbEkTV0KV7S47uNrX2DmpYZMR/6hXdhwolz3WWnzXoQIa', '0826547890', '199/77 ซอยลาดพร้าว 101 แขวงคลองเจ้าคุณสิงห์ เขตบางกะปิ กรุงเทพฯ 10240', '1988-12-05', 88, 185, 'ชาย', 20000, 'https://www.hollywoodreporter.com/wp-content/uploads/2024/08/Mingyu-Calin-Klein-Main-2024.jpg?w=1296', 1, '2024-09-29 05:25:51', '2024-09-29 05:25:51', NULL),
(6, 'สุพัตรา ', 'ชินวงศ์', 'supattra.chinwong@gmail.com', '$2y$10$2MJ9NQvaLbEkTV0KV7S47uNrX2DmpYZMR/6hXdhwolz3WWnzXoQIa', '0875439871', '99/16 ซอยรามคำแหง 24 แขวงหัวหมาก เขตบางกะปิ กรุงเทพฯ 10240', '1993-11-08', 54, 160, 'หญิง', 20000, 'https://cdn.tatlerasia.com/tatlerasia/i/2022/05/10170405-omega-so-hee-han-22010342010003_cover_1200x1500.jpghttps://cdn.tatlerasia.com/tatlerasia/i/2022/05/10170405-omega-so-hee-han-22010342010003_cover_1200x1500.jpg', 1, '2024-09-29 05:25:51', '2024-09-29 05:25:51', NULL),
(7, 'วราวุธ', 'อินทรักษ์', 'warawut.intarak@gmail.com', '$2y$10$2MJ9NQvaLbEkTV0KV7S47uNrX2DmpYZMR/6hXdhwolz3WWnzXoQIa', '0837652345', '78/32 หมู่บ้านสวนทอง ถนนราชพฤกษ์ ตำบลบางกร่าง อำเภอเมือง จังหวัดนนทบุรี 11000', '1992-03-15', 80, 182, 'ชาย', 18000, 'https://www.nme.com/wp-content/uploads/2023/07/jungkook-bts-seven.jpg', 1, '2024-09-29 05:25:51', '2024-09-29 05:25:51', NULL),
(8, 'สุภาพร', 'วัฒนสุข', 'supaporn.wattanasuk@gmail.com', '$2y$10$2MJ9NQvaLbEkTV0KV7S47uNrX2DmpYZMR/6hXdhwolz3WWnzXoQIa', '0859876543', '250/68 หมู่บ้านสวนหลวง ซอย 12 ตำบลหนองปรือ อำเภอบางละมุง จังหวัดชลบุรี 20150', '1993-11-09', 60, 168, 'หญิง', 18000, 'https://imgix.bustle.com/uploads/image/2023/8/18/a8f60118-9eb7-489a-a44f-f0c8d13e33b7-huh-yunjin-1_photo-credit-source-music-1.jpg?w=1200&h=1200&fit=crop&crop=faces&fm=jpg', 1, '2024-09-29 05:25:51', '2024-09-29 05:25:51', NULL),
(9, 'ศราวุธ', 'เชาวน์กร', 'sarawut.chaokorn@gmail.com', '$2y$10$2MJ9NQvaLbEkTV0KV7S47uNrX2DmpYZMR/6hXdhwolz3WWnzXoQIa', '0844567890', '1010 ถนนฟิตเนส สมุทรปราการ 10280', '1985-03-08', 75, 180, 'ชาย', 20000, 'https://ih1.redbubble.net/image.4851250594.7186/raf,360x360,075,t,fafafa:ca443f4786.jpg', 1, '2024-09-29 05:25:51', '2024-09-29 05:25:51', NULL),
(10, 'สุกิจตรา', 'โคแสงรักษา', 'sukijtra.kosangraka@gmail.com', '$2y$10$2MJ9NQvaLbEkTV0KV7S47uNrX2DmpYZMR/6hXdhwolz3WWnzXoQIa', '0811234567', '123 ถนนสุขภาพดี กรุงเทพฯ 10110', '1987-05-01', 55, 165, 'หญิง', 20000, 'https://www.j-14.com/wp-content/uploads/2023/09/chaewon-le-sserafim-.jpg?fit=4666%2C3111&quality=86&strip=all', 1, '2024-09-29 05:25:51', '2024-09-29 05:25:51', NULL),
(11, 'ฉัตรชัย', 'มีความสุข', 'chatchai.mekhamsuk@gmail.com', '$2y$10$2MJ9NQvaLbEkTV0KV7S47uNrX2DmpYZMR/6hXdhwolz3WWnzXoQIa', '0833456789', '789 ถนนสุขภาพดี พัทยา ชลบุรี 20150', '1988-07-28', 70, 175, 'ชาย', 18000, 'https://www.billboard.com/wp-content/uploads/2023/02/J-Hope-attends-the-Louis-Vuitton-2023-paris-billboard-1548.jpg', 1, '2024-09-29 05:25:51', '2024-09-29 05:25:51', NULL),
(12, 'ศิริวรรณ', 'ชลธาร', 'siriwan.cholthan@gmail.com', '$2y$10$2MJ9NQvaLbEkTV0KV7S47uNrX2DmpYZMR/6hXdhwolz3WWnzXoQIa', '0822345678', '456 ซอยฟิตเนส เชียงใหม่ 50000', '1989-12-17', 50, 158, 'หญิง', 18000, 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS-jDi0urjdco6Vps5bSlKRpmIaYrqm16T_cg&s', 1, '2024-09-29 05:25:51', '2024-09-29 05:25:51', NULL),
(13, 'อรรถพล', 'จันทรา', 'attapol.chantara@gmail.com', '$2y$10$2MJ9NQvaLbEkTV0KV7S47uNrX2DmpYZMR/6hXdhwolz3WWnzXoQIa', '0888901234', '1414 ถนนสุขภาพดี หาดใหญ่ สงขลา 90110', '1990-04-15', 73, 178, 'ชาย', 20000, 'https://newsimg.koreatimes.co.kr/2024/04/22/1eee8651-4dcb-4f11-b4a3-0abbf8b2c358.jpg', 1, '2024-09-29 05:25:51', '2024-09-29 05:25:51', NULL),
(14, 'กฤติกา', 'กุลธรรมนิติ', 'kritika.kulthammaniti@gmail.com', '$2y$10$2MJ9NQvaLbEkTV0KV7S47uNrX2DmpYZMR/6hXdhwolz3WWnzXoQIa', '0866789012', '1212 ถนนฟิตเนส ภูเก็ต 83000', '1991-03-09', 54, 162, 'หญิง', 20000, 'https://0.soompi.io/wp-content/uploads/2024/07/27233757/Karina.jpg', 1, '2024-09-29 05:25:51', '2024-09-29 05:25:51', NULL),
(15, 'ณเดชน์', 'เรียนเก่ง', 'nadech.@gmail.com', '$2y$10$2MJ9NQvaLbEkTV0KV7S47uNrX2DmpYZMR/6hXdhwolz3WWnzXoQIa', '0877890123', '1313 ซอยฟิตเนส เชียงราย 57000', '1992-06-23', 78, 185, 'ชาย', 18000, 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTsR4kVGfbuNr0i6vefEQR9lDMDVwvoHtXNOQ&s', 1, '2024-09-29 05:25:51', '2024-09-29 05:25:51', NULL),
(16, 'สรัลชนา', 'ชื่นชมกิจ', 'saranchana.chuenchomkit@gmail.com', '$2y$10$2MJ9NQvaLbEkTV0KV7S47uNrX2DmpYZMR/6hXdhwolz3WWnzXoQIa', '0855678901', '1111 ซอยสุขภาพดี นนทบุรี 11000', '1995-07-12', 52, 160, 'หญิง', 18000, 'https://i.pinimg.com/736x/cb/59/e4/cb59e4c7262b7c1ff0269b6651c5afa1.jpg', 1, '2024-09-29 05:25:51', '2024-09-29 05:25:51', NULL),
(17, 'หมูกรอบ', 'อร่อยมาก', 'admin@gmail.com', '$2y$12$W/2p7kTUXbwgi0d6hofcmO/Gx260Z5itXrzyI4Wu0bsC4rYjr6uFG', '0630636540', 'ร้านหมูกรอบที่อร่อยที่สุดในโลก', '2005-05-01', 65, 170, 'ชาย', 40000, 'profile_pictures/moodeng.jpg', 2, '2024-09-29 05:25:51', '2024-09-29 07:05:32', NULL),
(18, 'เดวิดอิอิ', 'สู้ซ่า', 'kaiza@gmail.com', '$2y$12$2Q8VfXeD872nGZqWqsWg3uBLhDdYVvFqtRoU49eEQ0VuXjjDCZ7ci', '0632548547', 'มข', '2005-02-28', 74, 182, 'ชาย', 18000, 'trainer_pictures/kai.jpg', 1, '2024-09-29 12:34:23', '2024-09-29 12:34:23', NULL),
(19, 'หมู', 'หมา', 'moomha@gmail.com', '123456789', '0630636540', 'ขอนแก่น', '2004-09-11', 85, 185, 'ชาย', 18000, NULL, 1, '2024-09-30 10:51:15', '2024-09-30 12:11:04', '2024-09-30 12:11:04'),
(20, 'ไก่', 'ซ่าซ่า', 'Kainguangza007@gmail.com', '$2y$12$dyXdgo3fRGPnRBAZGdHToeRJ3NQN1iW1E59fU/OpTrKRUsMXUxss2', '0632548542', '44 ขอนแก่น', '2000-02-04', 75, 180, 'ชาย', 12000, 'trainer_pictures/nadech.jpg', 1, '2024-10-04 10:04:53', '2024-10-04 10:04:53', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `enrolls`
--

CREATE TABLE `enrolls` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `course_id` bigint(20) UNSIGNED NOT NULL,
  `customer_id` bigint(20) UNSIGNED NOT NULL,
  `start_day` date DEFAULT NULL,
  `end_day` date DEFAULT NULL,
  `totalprice` int(11) NOT NULL,
  `payment_status` varchar(1) NOT NULL,
  `course_status` varchar(1) NOT NULL,
  `slip_picture` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `enrolls`
--

INSERT INTO `enrolls` (`id`, `course_id`, `customer_id`, `start_day`, `end_day`, `totalprice`, `payment_status`, `course_status`, `slip_picture`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 1, '2024-08-01', '2024-09-26', 1800, '3', '2', 'slip_pictures/slip1.jpg', '2024-09-29 05:32:05', '2024-10-04 05:30:47', NULL),
(2, 2, 2, '2024-08-02', '2024-09-27', 1800, '1', '1', 'slip_pictures/slip2.jpg', '2024-09-29 05:32:05', '2024-10-04 03:57:36', NULL),
(3, 3, 3, '2024-08-03', '2024-09-28', 1800, '1', '1', 'slip_pictures/slip3.jpg', '2024-09-29 05:32:05', '2024-10-04 03:57:47', NULL),
(4, 4, 4, '2024-08-04', '2024-09-29', 1800, '1', '1', 'slip_pictures/slip4.jpg', '2024-09-29 05:32:05', '2024-10-04 03:58:23', NULL),
(5, 5, 5, '2024-08-05', '2024-09-16', 2100, '1', '1', 'slip_pictures/slip5.jpg', '2024-09-29 05:32:05', '2024-10-04 03:58:30', NULL),
(6, 6, 6, '2024-08-06', '2024-09-17', 2100, '1', '1', 'slip_pictures/slip6.jpg', '2024-09-29 05:32:05', '2024-10-04 03:58:42', NULL),
(7, 7, 7, '2024-08-07', '2024-09-18', 2100, '1', '1', 'slip_pictures/slip7.jpg', '2024-09-29 05:32:05', '2024-10-04 03:58:49', NULL),
(8, 8, 8, '2024-08-08', '2024-09-19', 2100, '1', '1', 'slip_pictures/slip8.jpg', '2024-09-29 05:32:05', '2024-10-04 03:58:59', NULL),
(9, 9, 9, '2024-08-09', '2024-11-01', 2600, '1', '1', 'slip_pictures/slip9.jpg', '2024-09-29 05:32:05', '2024-10-04 03:59:08', NULL),
(10, 10, 10, '2024-08-10', '2024-11-02', 2600, '1', '1', 'slip_pictures/slip10.jpg', '2024-09-29 05:32:05', '2024-10-04 03:59:18', NULL),
(11, 11, 11, '2024-08-01', '2024-10-24', 2600, '1', '1', 'slip_pictures/slip11.jpg', '2024-09-29 05:32:05', '2024-10-04 03:59:26', NULL),
(12, 12, 12, '2024-08-02', '2024-10-25', 2600, '1', '1', 'slip_pictures/slip12.jpg', '2024-09-29 05:32:05', '2024-10-04 03:59:46', NULL),
(13, 13, 13, '2024-08-03', '2024-09-21', 2100, '1', '1', 'slip_pictures/slip13.jpg', '2024-09-29 05:32:05', '2024-10-04 03:59:55', NULL),
(14, 14, 14, '2024-08-04', '2024-09-22', 2100, '1', '1', 'slip_pictures/slip14.jpg', '2024-09-29 05:32:05', '2024-10-04 04:00:07', NULL),
(15, 15, 1, '2024-08-05', '2024-09-23', 2100, '1', '1', 'slip_pictures/slip15.jpg', '2024-09-29 05:32:05', '2024-10-04 04:00:21', NULL),
(16, 16, 2, '2024-08-06', '2024-09-24', 2100, '1', '1', 'slip_pictures/slip16.jpg', '2024-09-29 05:32:05', '2024-10-04 04:00:30', NULL),
(17, 1, 3, '2024-08-07', '2024-10-02', 1800, '1', '1', 'slip_pictures/slip17.jpg', '2024-09-29 05:32:05', '2024-10-04 04:00:39', NULL),
(18, 2, 4, '2024-08-08', '2024-10-03', 1800, '1', '1', 'slip_pictures/slip18.jpg', '2024-09-29 05:32:05', '2024-10-04 04:00:53', NULL),
(19, 3, 5, '2024-08-09', '2024-10-04', 1800, '1', '1', 'slip_pictures/slip19.jpg', '2024-09-29 05:32:05', '2024-10-04 04:01:02', NULL),
(20, 4, 6, '2024-08-10', '2024-10-05', 1800, '1', '1', 'slip_pictures/slip20.jpg', '2024-09-29 05:32:05', '2024-10-04 04:01:15', NULL),
(21, 5, 7, '2024-08-30', '2024-10-11', 2100, '1', '1', 'slip_pictures/slip21.jpg', '2024-09-29 05:32:05', '2024-10-04 04:01:26', NULL),
(22, 6, 8, '2024-08-30', '2024-10-11', 2100, '1', '1', 'slip_pictures/slip22.jpg', '2024-09-29 05:32:05', '2024-10-04 04:01:38', NULL),
(23, 7, 9, '2024-08-30', '2024-10-11', 2100, '1', '1', 'slip_pictures/slip23.jpg', '2024-09-29 05:32:05', '2024-10-04 04:01:47', NULL),
(24, 8, 10, '2024-08-30', '2024-10-11', 2100, '1', '1', 'slip_pictures/slip24.jpg', '2024-09-29 05:32:05', '2024-10-04 04:01:55', NULL),
(25, 9, 11, '2024-08-30', '2024-11-22', 2600, '1', '1', 'slip_pictures/slip25.jpg', '2024-09-29 05:32:05', '2024-10-04 04:02:36', NULL),
(26, 10, 12, '2024-08-07', '2024-10-30', 2600, '1', '1', 'slip_pictures/slip26.jpg', '2024-09-29 05:32:05', '2024-10-04 04:02:49', NULL),
(27, 11, 13, '2024-08-08', '2024-10-31', 2600, '1', '1', 'slip_pictures/slip27.jpg', '2024-09-29 05:32:05', '2024-10-04 04:02:57', NULL),
(28, 12, 15, '2024-08-09', '2024-11-01', 2600, '1', '1', 'slip_pictures/slip28.jpg', '2024-09-29 05:32:05', '2024-10-04 04:03:04', NULL),
(29, 13, 16, '2024-08-10', '2024-09-28', 2100, '1', '1', 'slip_pictures/slip29.jpg', '2024-09-29 05:32:05', '2024-10-04 04:03:13', NULL),
(30, 14, 17, '2024-08-30', '2024-10-18', 2100, '0', '1', 'slip_pictures/slip30.jpg', '2024-09-29 05:32:05', '2024-10-04 04:03:25', NULL),
(31, 15, 18, '2024-08-30', '2024-10-18', 2100, '0', '1', 'slip_pictures/slip31.jpg', '2024-09-29 05:32:05', '2024-10-04 04:03:33', NULL),
(32, 16, 19, '2024-08-30', '2024-10-18', 2100, '0', '1', 'slip_pictures/slip32.jpg', '2024-09-29 05:32:05', '2024-10-04 04:03:38', NULL),
(33, 1, 20, '2024-08-30', '2024-10-25', 1800, '0', '1', 'slip_pictures/slip33.jpg', '2024-09-29 05:32:05', '2024-10-04 04:03:46', NULL),
(34, 2, 21, '2024-08-30', '2024-10-25', 1800, '0', '1', 'slip_pictures/slip34.jpg', '2024-09-29 05:32:05', '2024-10-04 04:03:54', NULL),
(35, 3, 22, '2024-08-07', '2024-10-02', 1800, '0', '1', 'slip_pictures/slip35.jpg', '2024-09-29 05:32:05', '2024-10-04 04:04:02', NULL),
(36, 4, 23, '2024-08-08', '2024-10-03', 1800, '0', '1', 'slip_pictures/slip36.jpg', '2024-09-29 05:32:05', '2024-10-04 04:04:09', NULL),
(37, 5, 24, '2024-08-09', '2024-09-20', 2100, '0', '1', 'slip_pictures/slip37.jpg', '2024-09-29 05:32:05', '2024-10-04 04:04:15', NULL),
(38, 6, 25, '2024-08-10', '2024-09-21', 2100, '0', '1', 'slip_pictures/slip38.jpg', '2024-09-29 05:32:05', '2024-10-04 04:04:22', NULL),
(39, 7, 26, '2024-08-30', '2024-10-11', 2100, '0', '1', 'slip_pictures/slip39.jpg', '2024-09-29 05:32:05', '2024-10-04 04:04:30', NULL),
(40, 8, 27, '2024-08-30', '2024-10-11', 2100, '0', '1', 'slip_pictures/slip40.jpg', '2024-09-29 05:32:05', '2024-10-04 04:04:49', NULL),
(41, 9, 28, '2024-08-30', '2024-11-22', 2600, '0', '1', 'slip_pictures/slip41.jpg', '2024-09-29 05:32:05', '2024-10-04 04:05:10', NULL),
(42, 10, 29, '2024-08-30', '2024-11-22', 2600, '0', '1', 'slip_pictures/slip42.jpg', '2024-09-29 05:32:05', '2024-10-04 04:05:18', NULL),
(43, 11, 30, '2024-08-30', '2024-11-22', 2600, '0', '1', 'slip_pictures/slip43.jpg', '2024-09-29 05:32:05', '2024-10-04 04:05:26', NULL),
(44, 7, 22, '2024-08-07', '2024-09-18', 2100, '0', '1', 'slip_pictures/slip44.jpg', '2024-09-29 05:32:05', '2024-10-04 04:05:34', NULL),
(45, 15, 20, NULL, NULL, 4000, '3', '2', 'slip_pictures/slip45.jpg', '2024-10-01 02:54:08', '2024-10-04 04:05:58', NULL),
(46, 12, 20, '2024-10-01', '2024-12-24', 5400, '3', '0', 'slip_pictures/slip46.jpg', '2024-10-01 03:36:27', '2024-10-04 04:06:25', NULL),
(47, 1, 1, '2024-10-04', '2024-11-29', 4600, '1', '1', 'slip_pictures/slip47.jpg', '2024-10-04 09:39:06', '2024-10-04 09:57:37', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `facilities`
--

CREATE TABLE `facilities` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `facility_name` varchar(255) NOT NULL,
  `facility_amount` int(11) NOT NULL,
  `description` varchar(255) NOT NULL,
  `picture_path` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `facilities`
--

INSERT INTO `facilities` (`id`, `facility_name`, `facility_amount`, `description`, `picture_path`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'เสื่อโยคะ', 100, 'เสื่อโยคะคุณภาพสูง ให้ความสะดวกสบายและความยึดเกาะที่ดีเยี่ยม', 'facility_pictures/mat-icon.png', '2024-09-29 05:29:38', '2024-10-03 08:46:13', NULL),
(2, 'บล็อกโยคะ', 100, 'บล็อกโยคะที่ช่วยในการฝึกท่าที่ยาก และเพิ่มความยืดหยุ่นของร่างกาย', 'facility_pictures/blockyoga-icon.png', '2024-09-29 05:29:38', '2024-10-03 08:46:27', NULL),
(3, 'ห้องกระจก', 8, 'ห้องกระจกรอบทิศสำหรับช่วยในการปรับปรุงท่าทางให้ถูกต้องและสมบูรณ์แบบ', 'facility_pictures/mirror-icon.png', '2024-09-29 05:29:38', '2024-10-03 08:46:44', NULL),
(4, 'ห้องเปลี่ยนเสื้อผ้า', 20, 'ห้องเปลี่ยนเสื้อผ้าที่มีพื้นที่กว้างขวางและตกแต่งอย่างสะดวกสบาย', 'facility_pictures/changcloth-icon.png', '2024-09-29 05:29:38', '2024-10-03 08:47:25', NULL),
(5, 'กระสอบทรายและแผ่นรองชก', 100, 'อุปกรณ์สำหรับการฝึกการโจมตีและการป้องกัน ซึ่งช่วยพัฒนาทักษะการต่อสู้และความแข็งแกร่ง', 'facility_pictures/punchingbag-icon.png', '2024-09-29 05:29:38', '2024-10-03 08:48:20', NULL),
(6, 'ลำโพง', 10, 'ลำโพงคุณภาพสูงเพื่อประสบการณ์ฟังเพลงที่ชัดเจนและเต็มที่', 'facility_pictures/sound-icon.png', '2024-09-29 05:29:38', '2024-10-03 08:48:45', NULL),
(7, 'บอลโยคะ', 500, 'บอลโยคะคุณภาพสูง', 'facility_pictures/yogaball-icon.png', '2024-09-29 05:29:38', '2024-10-03 08:48:33', NULL),
(8, 'ผ้าขนหนู', 500, 'ผ้าขนหนูสะอาด นุ่ม และพร้อมใช้งานทุกครั้งหลังคลาส', 'facility_pictures/towel-icon.png', '2024-09-29 05:29:38', '2024-10-03 08:49:01', NULL),
(9, 'พัดลม', 20, 'พัดลมที่มีประสิทธิภาพสูงช่วยให้การระบายความร้อนในห้องเรียนเป็นไปอย่างรวดเร็ว', 'facility_pictures/fan-icon.png', '2024-09-29 05:29:38', '2024-10-03 08:49:13', NULL),
(10, 'เสื่อนวม', 16, 'พื้นที่ที่ปูด้วยเสื่อนวมเพื่อป้องกันการบาดเจ็บเมื่อฝึกท่าต่อสู้และการล้ม', 'facility_pictures/matfloor-icon.png', '2024-09-29 05:29:38', '2024-10-03 08:49:31', NULL),
(11, 'ชุดอุปกรณ์ป้องกัน', 100, 'ชุดอุปกรณ์ป้องกันเช่น หมวกกันกระแทก, ปลอกแขน, และปลอกขา เพื่อความปลอดภัยในระหว่างการฝึกซ้อม', 'facility_pictures/boxingglove-icon.png', '2024-09-29 05:29:38', '2024-10-03 08:49:49', NULL),
(12, 'ยางยืด', 1, 'ยาง', 'facility_pictures/irene.jpeg', '2024-10-04 10:01:13', '2024-10-04 10:01:13', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2024_09_01_204701_add_two_factor_columns_to_users_table', 1),
(5, '2024_09_01_204756_create_personal_access_tokens_table', 1),
(6, '2024_09_08_190144_create_customers_table', 1),
(7, '2024_09_08_193323_create_employees_table', 1),
(8, '2024_09_09_115040_create_courses_table', 1),
(9, '2024_09_09_115813_create_facilities_table', 1),
(10, '2024_09_09_153505_create_course_facilities_table', 1),
(11, '2024_09_12_192441_create_days_table', 1),
(12, '2024_09_12_192747_create_course_days_table', 1),
(13, '2024_09_27_192002_create_enrolls_table', 1),
(14, '2024_09_09_120205_create_facility_pics_table', 2),
(15, '2024_09_09_120215_create_course_pics_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `role_name` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `role_name`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'เทรนเนอร์', '2024-09-29 05:24:48', '2024-09-29 05:24:48', NULL),
(2, 'แอดมิน', '2024-09-29 05:24:48', '2024-09-29 05:24:48', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('7IjbRbAreQXmJ1NFMDzoLlHCRbBY4yCGGYHdkP46', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiVHNXdkdNaTl6MlhvNElmMVc5Q3ZITGdwOFR0Z0F2dFlwT0FDRUZ4cCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjY6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9ob21lIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo1NToibG9naW5fY3VzdG9tZXJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToxO30=', 1772015952);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `two_factor_secret` text DEFAULT NULL,
  `two_factor_recovery_codes` text DEFAULT NULL,
  `two_factor_confirmed_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `current_team_id` bigint(20) UNSIGNED DEFAULT NULL,
  `profile_photo_path` varchar(2048) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `courses_employee_id_foreign` (`employee_id`);

--
-- Indexes for table `course_days`
--
ALTER TABLE `course_days`
  ADD PRIMARY KEY (`id`),
  ADD KEY `course_days_course_id_foreign` (`course_id`),
  ADD KEY `course_days_day_id_foreign` (`day_id`);

--
-- Indexes for table `course_facilities`
--
ALTER TABLE `course_facilities`
  ADD PRIMARY KEY (`id`),
  ADD KEY `course_facilities_course_id_foreign` (`course_id`),
  ADD KEY `course_facilities_facility_id_foreign` (`facility_id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `days`
--
ALTER TABLE `days`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`id`),
  ADD KEY `employees_role_id_foreign` (`role_id`);

--
-- Indexes for table `enrolls`
--
ALTER TABLE `enrolls`
  ADD PRIMARY KEY (`id`),
  ADD KEY `enrolls_course_id_foreign` (`course_id`),
  ADD KEY `enrolls_customer_id_foreign` (`customer_id`);

--
-- Indexes for table `facilities`
--
ALTER TABLE `facilities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `course_days`
--
ALTER TABLE `course_days`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `course_facilities`
--
ALTER TABLE `course_facilities`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `days`
--
ALTER TABLE `days`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `enrolls`
--
ALTER TABLE `enrolls`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `facilities`
--
ALTER TABLE `facilities`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `courses`
--
ALTER TABLE `courses`
  ADD CONSTRAINT `courses_employee_id_foreign` FOREIGN KEY (`employee_id`) REFERENCES `employees` (`id`);

--
-- Constraints for table `course_days`
--
ALTER TABLE `course_days`
  ADD CONSTRAINT `course_days_course_id_foreign` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `course_days_day_id_foreign` FOREIGN KEY (`day_id`) REFERENCES `days` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `course_facilities`
--
ALTER TABLE `course_facilities`
  ADD CONSTRAINT `course_facilities_course_id_foreign` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `course_facilities_facility_id_foreign` FOREIGN KEY (`facility_id`) REFERENCES `facilities` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `employees`
--
ALTER TABLE `employees`
  ADD CONSTRAINT `employees_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`);

--
-- Constraints for table `enrolls`
--
ALTER TABLE `enrolls`
  ADD CONSTRAINT `enrolls_course_id_foreign` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `enrolls_customer_id_foreign` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
