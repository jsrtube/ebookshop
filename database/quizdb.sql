-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 11, 2022 at 10:10 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `quizdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `activity`
--

CREATE TABLE `activity` (
  `id` int(11) NOT NULL,
  `task_qr_num` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `u_image` varchar(255) NOT NULL,
  `q_a_image` varchar(255) NOT NULL,
  `audio` varchar(255) NOT NULL,
  `parents_a_image` varchar(255) NOT NULL,
  `t_date` varchar(255) NOT NULL,
  `time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(50) NOT NULL,
  `status` int(11) DEFAULT NULL,
  `mobile` varchar(12) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `fullname`, `username`, `password`, `status`, `mobile`, `email`) VALUES
(1, 'Govind Kumawat', 'govind', '123', NULL, '7023373715', 'govind.kumawat886@gmail.com'),
(2, 'Ashok Kumawat', 'govind', 'govind123', NULL, '7023373715', 'marutimobiledk@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `answers`
--

CREATE TABLE `answers` (
  `aid` int(11) NOT NULL,
  `answers` text NOT NULL,
  `q_id` int(11) NOT NULL,
  `other` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `answers`
--

INSERT INTO `answers` (`aid`, `answers`, `q_id`, `other`) VALUES
(29, 'HTML', 8, ''),
(30, 'CSS', 8, ''),
(31, 'PHP', 8, ''),
(32, 'Javascript', 8, ''),
(33, 'Mouse', 9, ''),
(34, 'Monitor', 9, ''),
(35, 'Speaker', 9, ''),
(36, 'Printer', 9, ''),
(37, 'Mouse', 10, ''),
(38, 'Keyboard', 10, ''),
(39, 'Printer', 10, ''),
(40, 'Mic', 10, ''),
(41, 'HTML', 11, ''),
(42, 'Heading', 11, ''),
(43, 'H1', 11, ''),
(44, 'H6', 11, ''),
(45, '.htl', 12, ''),
(46, '.html', 12, ''),
(47, '.css', 12, ''),
(48, '.htnl', 12, ''),
(49, 'HTTP', 13, ''),
(50, 'FTP', 13, ''),
(51, 'IP', 13, ''),
(52, 'STP', 13, ''),
(53, 'world wide web', 14, ''),
(54, 'world wide wears', 14, ''),
(55, 'world wide wait', 14, ''),
(56, 'world wide war', 14, ''),
(57, 'Decoder', 15, ''),
(58, 'Mother board', 15, ''),
(59, 'Select', 15, ''),
(60, 'RAM', 15, ''),
(61, 'rmdir', 16, ''),
(62, 'ls', 16, ''),
(63, 'mkdir', 16, ''),
(64, 'cd', 16, ''),
(65, 'rmdir', 17, ''),
(66, 'cd', 17, ''),
(67, 'mkdir', 17, ''),
(68, 'ls', 17, '');

-- --------------------------------------------------------

--
-- Table structure for table `chat`
--

CREATE TABLE `chat` (
  `id` int(11) NOT NULL,
  `c_to` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `c_from` varchar(255) NOT NULL,
  `time_s` timestamp NOT NULL DEFAULT current_timestamp(),
  `other` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `chat`
--

INSERT INTO `chat` (`id`, `c_to`, `message`, `c_from`, `time_s`, `other`) VALUES
(1, 'teacher', 'hello sir?', 'govind', '2022-01-30 09:41:52', '1'),
(2, 'govind', 'hi govind!', 'teacher', '2022-01-30 09:42:53', '0'),
(3, 'teacher', 'hello sir?', 'vikas', '2022-01-30 09:43:54', '1'),
(4, 'vikas', 'hi Vikas', 'teacher', '2022-01-30 09:44:55', '0'),
(7, 'govind', 'All the students Solve the task number 101? ', 'teacher', '2022-01-30 11:18:15', '0'),
(8, 'ashok', 'help all students', 'teacher', '2022-01-30 11:22:02', '0'),
(9, 'teacher', 'ok sir', 'ashok', '2022-01-30 11:27:04', '1'),
(14, 'teacher', 'ok sir', 'govind', '2022-02-11 03:38:00', '1'),
(15, 'teacher', 'ok sir', '', '2022-02-11 03:41:05', '1');

-- --------------------------------------------------------

--
-- Table structure for table `question`
--

CREATE TABLE `question` (
  `qid` int(11) NOT NULL,
  `task_qr_num` varchar(255) NOT NULL,
  `question` text NOT NULL,
  `ans_id` int(11) NOT NULL,
  `other` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `question`
--

INSERT INTO `question` (`qid`, `task_qr_num`, `question`, `ans_id`, `other`) VALUES
(8, '123', 'Select the Backend language?', 31, ''),
(9, '123', 'Select input device?', 33, ''),
(10, '123', 'Select output device ?', 39, ''),
(11, '123', 'Choose the correct HTML tag for a large title?', 43, ''),
(12, '123', 'An HTML document is saved with the _____ extension?', 46, ''),
(13, '456', 'Which is not an internet protocol?', 52, ''),
(14, '456', 'www stands for?', 53, ''),
(15, '456', 'Main circuit board in a computer is?', 58, ''),
(16, '456', 'Which commend is used to create folder?', 63, ''),
(17, '456', 'Which commend is used to delete folder?', 65, '');

-- --------------------------------------------------------

--
-- Table structure for table `quiz_result`
--

CREATE TABLE `quiz_result` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `u_q_attend` int(11) NOT NULL,
  `u_score` int(11) NOT NULL,
  `q_date` varchar(15) NOT NULL,
  `task_qr_num` varchar(255) NOT NULL,
  `t_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `quiz_result`
--

INSERT INTO `quiz_result` (`id`, `username`, `u_q_attend`, `u_score`, `q_date`, `task_qr_num`, `t_date`) VALUES
(23, 'govind', 5, 2, '13-01-2022', '123', '2022-01-13 15:57:44'),
(25, 'govind', 5, 5, '13-01-2022', '456', '2022-01-13 16:03:10'),
(26, 'ashok', 5, 1, '13-01-2022', '123', '2022-01-13 16:22:56'),
(27, 'vikas', 5, 4, '', '123', '2022-01-18 08:54:22'),
(28, 'vikas', 5, 3, '', '456', '2022-01-18 08:54:29'),
(29, 'ashok', 5, 5, '', '456', '2022-01-18 08:55:20'),
(30, 'vikas', 5, 0, '', '789', '2022-01-18 08:55:20'),
(31, 'ashok', 5, 3, '', '123', '2022-01-18 08:55:24'),
(32, 'vikas', 5, 2, '', '456', '2022-01-18 08:55:24');

-- --------------------------------------------------------

--
-- Table structure for table `user_reg`
--

CREATE TABLE `user_reg` (
  `id` int(11) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mobile` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_reg`
--

INSERT INTO `user_reg` (`id`, `fullname`, `username`, `email`, `mobile`) VALUES
(1, 'Govind Kumawat', 'govind', 'govind.kumawat886@gmail.com', '7023373715'),
(2, 'Ashok Kumawat', 'ashok', 'marutimobiledk@gmail.com', '9950550068'),
(4, 'Puran Kumawat', 'puran', 'jsrtube0@gmail.com', '7023373715');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activity`
--
ALTER TABLE `activity`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `answers`
--
ALTER TABLE `answers`
  ADD PRIMARY KEY (`aid`);

--
-- Indexes for table `chat`
--
ALTER TABLE `chat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `question`
--
ALTER TABLE `question`
  ADD PRIMARY KEY (`qid`);

--
-- Indexes for table `quiz_result`
--
ALTER TABLE `quiz_result`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_reg`
--
ALTER TABLE `user_reg`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `activity`
--
ALTER TABLE `activity`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `answers`
--
ALTER TABLE `answers`
  MODIFY `aid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT for table `chat`
--
ALTER TABLE `chat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `question`
--
ALTER TABLE `question`
  MODIFY `qid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `quiz_result`
--
ALTER TABLE `quiz_result`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `user_reg`
--
ALTER TABLE `user_reg`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
