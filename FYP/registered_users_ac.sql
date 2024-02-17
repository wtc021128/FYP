-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- 主機： 127.0.0.1
-- 產生時間： 2024-02-17 10:02:02
-- 伺服器版本： 10.4.28-MariaDB
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
-- 資料表結構 `registered_users_ac`
--

CREATE TABLE `registered_users_ac` (
  `id` int(100) NOT NULL,
  `usr_id` varchar(10) NOT NULL,
  `usr_name` varchar(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `phone` varchar(13) NOT NULL,
  `user_type` varchar(20) NOT NULL DEFAULT 'user',
  `image` varchar(100) DEFAULT NULL,
  `remark` varchar(50) DEFAULT NULL,
  `pwstatus` char(1) DEFAULT NULL,
  `usr_grp` char(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- 傾印資料表的資料 `registered_users_ac`
--

INSERT INTO `registered_users_ac` (`id`, `usr_id`, `usr_name`, `email`, `password`, `phone`, `user_type`, `image`, `remark`, `pwstatus`, `usr_grp`) VALUES
(46, '000000000', 'user', 'user@gmail.com', '$2y$10$Un/zJI6K/UrIAp9x9cPYLuuzPdQqF.JM8EiDQ7pTe.E26U.aGNqAu', '+85221800000', 'user', 'pic-4.png', NULL, NULL, NULL),
(47, '111111111', 'teacher', 'teacher@gmail.com', '$2y$10$wQ2cbBYre3J8HjwWXE7Tc.USQzIChFUKkmj4DOUoq2r440taSinSG', '+85221800000', 'teacher', 'pic-3.png', NULL, NULL, NULL),
(48, '333333333', 'admin', 'admin@gmail.com', '$2y$10$vnmKY8kUzN6e7M5gQ9YhGetQ2Ld954oYvFhC7woflvn8jHj1F.Cju', '+85221800000', 'admin', 'pic-5.png', NULL, NULL, NULL);

--
-- 已傾印資料表的索引
--

--
-- 資料表索引 `registered_users_ac`
--
ALTER TABLE `registered_users_ac`
  ADD PRIMARY KEY (`id`);

--
-- 在傾印的資料表使用自動遞增(AUTO_INCREMENT)
--

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `registered_users_ac`
--
ALTER TABLE `registered_users_ac`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
