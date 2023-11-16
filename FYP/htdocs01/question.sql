-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- 主機： 127.0.0.1
-- 產生時間： 2023 年 11 月 16 日 08:26
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
-- 資料表結構 `question`
--

CREATE TABLE `question` (
  `ID` varchar(255) NOT NULL,
  `question` varchar(255) NOT NULL,
  `option1` varchar(255) NOT NULL,
  `option2` varchar(255) NOT NULL,
  `option3` varchar(255) DEFAULT NULL,
  `option4` varchar(255) DEFAULT NULL,
  `correct_answer` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- 傾印資料表的資料 `question`
--

INSERT INTO `question` (`ID`, `question`, `option1`, `option2`, `option3`, `option4`, `correct_answer`) VALUES
('001', '1+1', '11', '2', '0', '3', '2'),
('002', '5^2', '5', '10', '25', '7', '3'),
('003', '1TB = ?GB', '1TB', '1GB', '1000GB', '1024GB', '4'),
('004', '圓周率是多少(取至二位小數)', '3.141592', '3.14', '3.141', '3.1', '2'),
('005', '3x-2y = 11 = x+4y-2, x-y = ?', '\r\n-3', '2', '3', '5', '4'),
('006', 'm^2 + 2m - 4n^2 - 4n = ?', '(m-2n)(m+2n+2)', '(m-2n)(m+2n-2)', '(m+2n)(m-2n+2)', '(m+2n)(m+2n-2)', '1'),
('007', 'k = (6/5-h)-3 , h = ?', '5k+9/k-3', '5k+21/k-3', '5k+9/k+3', '5k+21/k+3', '3'),
('008', '10次扭蛋要1600個兌換幣，8000個兌換幣的費用是$788，180次必定出大獎，請問必得到大獎的最大費用是多少?', '16000', '2836.8', '7880', '3152', '4'),
('009', '1=5　2=15　3=215　4=3215　5=？', '43215', '1', '6', '6789', '2'),
('010', '(6 + 4 = 2 10)\r\n(9 + 2 = 7 11)\r\n(8 + 5 = 3 13)\r\n(5 + 2 = 3 7)\r\n(7 + 6 = ???)', '1 13', '13', '7 60', '7 13', '1');

--
-- 已傾印資料表的索引
--

--
-- 資料表索引 `question`
--
ALTER TABLE `question`
  ADD PRIMARY KEY (`ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
