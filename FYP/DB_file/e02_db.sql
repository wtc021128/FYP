-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- 主機： localhost
-- 產生時間： 2023-09-24 08:11:41
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
-- 資料表結構 `admin`
--

CREATE TABLE `admin` (
  `adminID` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `admin_Name` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `Phone` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- 傾印資料表的資料 `admin`
--

INSERT INTO `admin` (`adminID`, `admin_Name`, `password`, `email`, `Phone`) VALUES
('A001', 'TAM KA HO', 'rootroot', '210069852@stu.vtc.edu.hk', NULL),
('A002', 'Wong Tsz Chun', 'rootroot', '210075207@stu.vtc.edu.hk', NULL),
('A003', 'Cheung Chi Him', 'rootroot', '210072739@stu.vtc.edu.hk', NULL),
('A004', 'Shiu Chung Hei', 'rootroot', '210129496@stu.vtc.edu.hk', NULL);

-- --------------------------------------------------------

--
-- 資料表結構 `all_user`
--

CREATE TABLE `all_user` (
  `user_id` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `user_type` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- 資料表結構 `assignment`
--

CREATE TABLE `assignment` (
  `assignment_id` int NOT NULL,
  `classroom_id` int NOT NULL,
  `title` int NOT NULL,
  `description` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- 資料表結構 `exam`
--

CREATE TABLE `exam` (
  `exam_id` varchar(2552) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `teacher_id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `description` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `date_created` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- 資料表結構 `lesson`
--

CREATE TABLE `lesson` (
  `lesson_id` varchar(255) NOT NULL,
  `topic_id` varchar(255) NOT NULL,
  `title` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- 資料表結構 `log`
--

CREATE TABLE `log` (
  `log_id` varchar(255) NOT NULL,
  `user_id` varchar(255) NOT NULL,
  `action` varchar(255) DEFAULT NULL,
  `timestamp` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- 資料表結構 `mathtopic`
--

CREATE TABLE `mathtopic` (
  `topic_id` varchar(255) NOT NULL,
  `topic_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- 資料表結構 `questions`
--

CREATE TABLE `questions` (
  `question_id` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `question_type_id` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `questionPoint` int NOT NULL,
  `question_text` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `answer_text` varchar(255) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- 傾印資料表的資料 `questions`
--

INSERT INTO `questions` (`question_id`, `question_type_id`, `questionPoint`, `question_text`, `answer_text`) VALUES
('q00001', 'qt001', 4, 'The cost of a chair is $ 360 . If the chair is sold at a discount of 20 % on its marked price, then the percentage profit is 30 % . Find the marked price of the chair.', 'Let $ x be the marked price of the chair. pp−1 for undefined symbol\r\nx 1( − 20%) = 360 1( + 30%) 1M+1M+1A 1M for x 1( − 20%)\r\n0.8\r\n360 )3.1(\r\nx =\r\nx = 585 1A\r\n Thus, the marked price of the chair is $585 . u−1 for missing unit\r\n The marked price of the ch');

-- --------------------------------------------------------

--
-- 資料表結構 `question_type`
--

CREATE TABLE `question_type` (
  `question_type_id` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `type_name` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `Year` year NOT NULL,
  `difficulty_level` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- 資料表結構 `quiz`
--

CREATE TABLE `quiz` (
  `quiz_id` varchar(255) NOT NULL,
  `topic_id` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- 資料表結構 `quizquestion`
--

CREATE TABLE `quizquestion` (
  `quiz_question_id` varchar(255) NOT NULL,
  `quiz_id` varchar(255) NOT NULL,
  `question_text` varchar(255) NOT NULL,
  `correct_answer` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- 資料表結構 `student`
--

CREATE TABLE `student` (
  `student_id` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- 資料表結構 `studentassignment`
--

CREATE TABLE `studentassignment` (
  `student_ass_id` varchar(255) NOT NULL,
  `student_id` varchar(255) NOT NULL,
  `assignment_id` varchar(255) NOT NULL,
  `submission` tinyint(1) NOT NULL,
  `submission_date` date NOT NULL,
  `grade` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- 資料表結構 `studentexam`
--

CREATE TABLE `studentexam` (
  `student_exam_id` varchar(255) NOT NULL,
  `student_id` varchar(255) NOT NULL,
  `exam_id` varchar(255) NOT NULL,
  `score` int DEFAULT NULL,
  `sumbit_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- 資料表結構 `studentprofile`
--

CREATE TABLE `studentprofile` (
  `profile_id` varchar(255) NOT NULL,
  `student_id` varchar(255) NOT NULL,
  `bio` varchar(255) NOT NULL,
  `contact_info` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- 資料表結構 `studentprogress`
--

CREATE TABLE `studentprogress` (
  `progress_id` varchar(255) NOT NULL,
  `student_id` varchar(255) NOT NULL,
  `topic` varchar(255) DEFAULT NULL,
  `progress_percentage` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- 資料表結構 `studentquizattempt`
--

CREATE TABLE `studentquizattempt` (
  `attempt_id` varchar(255) NOT NULL,
  `student_id` varchar(255) NOT NULL,
  `quiz_id` varchar(255) NOT NULL,
  `submission` tinyint(1) NOT NULL,
  `submission_date` date NOT NULL,
  `score` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- 資料表結構 `studentregister`
--

CREATE TABLE `studentregister` (
  `register_id` varchar(255) NOT NULL,
  `student_id` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- 資料表結構 `teacher`
--

CREATE TABLE `teacher` (
  `teacher_id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone_number` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- 資料表結構 `teacherassignment`
--

CREATE TABLE `teacherassignment` (
  `teacher_ass_id` varchar(255) NOT NULL,
  `teacher_id` varchar(255) NOT NULL,
  `assignment_id` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- 資料表結構 `teacherprofile`
--

CREATE TABLE `teacherprofile` (
  `profile_id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `teacher_id` varchar(255) NOT NULL,
  `bio` varchar(255) DEFAULT NULL,
  `contact_info` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- 資料表結構 `websitestatistics`
--

CREATE TABLE `websitestatistics` (
  `stats_id` varchar(255) NOT NULL,
  `page_views` int NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- 已傾印資料表的索引
--

--
-- 資料表索引 `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`adminID`);

--
-- 資料表索引 `lesson`
--
ALTER TABLE `lesson`
  ADD PRIMARY KEY (`lesson_id`),
  ADD KEY `topic_id` (`topic_id`);

--
-- 資料表索引 `log`
--
ALTER TABLE `log`
  ADD PRIMARY KEY (`log_id`),
  ADD KEY `user_id` (`user_id`);

--
-- 資料表索引 `mathtopic`
--
ALTER TABLE `mathtopic`
  ADD PRIMARY KEY (`topic_id`);

--
-- 資料表索引 `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`question_id`),
  ADD KEY `question_type_id` (`question_type_id`);

--
-- 資料表索引 `question_type`
--
ALTER TABLE `question_type`
  ADD PRIMARY KEY (`question_type_id`),
  ADD KEY `question_type_id` (`question_type_id`);

--
-- 資料表索引 `quiz`
--
ALTER TABLE `quiz`
  ADD PRIMARY KEY (`quiz_id`),
  ADD KEY `topic_id` (`topic_id`);

--
-- 資料表索引 `quizquestion`
--
ALTER TABLE `quizquestion`
  ADD PRIMARY KEY (`quiz_question_id`),
  ADD KEY `quiz_id` (`quiz_id`);

--
-- 資料表索引 `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`student_id`);

--
-- 資料表索引 `studentprofile`
--
ALTER TABLE `studentprofile`
  ADD PRIMARY KEY (`profile_id`),
  ADD KEY `student_id` (`student_id`);

--
-- 資料表索引 `studentprogress`
--
ALTER TABLE `studentprogress`
  ADD PRIMARY KEY (`progress_id`),
  ADD KEY `student_id` (`student_id`);

--
-- 資料表索引 `studentregister`
--
ALTER TABLE `studentregister`
  ADD PRIMARY KEY (`register_id`),
  ADD KEY `student_id` (`student_id`);

--
-- 資料表索引 `teacher`
--
ALTER TABLE `teacher`
  ADD PRIMARY KEY (`teacher_id`);

--
-- 資料表索引 `teacherassignment`
--
ALTER TABLE `teacherassignment`
  ADD PRIMARY KEY (`teacher_ass_id`),
  ADD KEY `teacher_id` (`teacher_id`),
  ADD KEY `assignment_id` (`assignment_id`);

--
-- 資料表索引 `teacherprofile`
--
ALTER TABLE `teacherprofile`
  ADD PRIMARY KEY (`profile_id`),
  ADD KEY `teacher_id` (`teacher_id`);

--
-- 資料表索引 `websitestatistics`
--
ALTER TABLE `websitestatistics`
  ADD PRIMARY KEY (`stats_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
