-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- 主機： localhost
-- 產生時間： 2023-10-23 10:37:02
-- 伺服器版本： 8.0.34
-- PHP 版本： 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫： `e02_db`
--

-- --------------------------------------------------------

--
-- 資料表結構 `registered_users`
--

CREATE TABLE `registered_users` (
  `cna` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `role` enum('Administration','Student') COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- 傾印資料表的資料 `registered_users`
--

INSERT INTO `registered_users` (`cna`, `username`, `email`, `password`, `role`) VALUES
('A000', 'Admin', 'Admin@gmail.com', '$2y$10$YEqCMRvE9GjFGe3f9aquWuPX2ShBn0sYjXcYKpJU783r8Dq9vJx22', 'Administration'),
('carlos', 'carlos', 'carlos123@gmail.com', '$2y$10$7302QkjwsOa3oje2HlKFseUgYjTfPaYBNIEjLNdmV5ymXMFm6I6pK', 'Student'),
('cna', 'cna', 'cna@gmail.com', '$2y$10$q6RKcbok52W7fDHN2b8Dhu.NIQrQWDb1nsJGLhtz/tMN2hDbIR5hy', 'Student');

--
-- 已傾印資料表的索引
--

--
-- 資料表索引 `registered_users`
--
ALTER TABLE `registered_users`
  ADD PRIMARY KEY (`cna`),
  ADD UNIQUE KEY `username` (`username`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
