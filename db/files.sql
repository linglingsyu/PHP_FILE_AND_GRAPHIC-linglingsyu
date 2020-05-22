-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- 主機： 127.0.0.1
-- 產生時間： 2020-05-22 10:30:12
-- 伺服器版本： 10.4.11-MariaDB
-- PHP 版本： 7.4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫： `files`
--

-- --------------------------------------------------------

--
-- 資料表結構 `file_info`
--

CREATE TABLE `file_info` (
  `id` int(10) UNSIGNED NOT NULL,
  `filename` varchar(32) NOT NULL,
  `type` varchar(32) NOT NULL,
  `text` text NOT NULL,
  `path` varchar(256) NOT NULL,
  `album` int(10) UNSIGNED NOT NULL,
  `upload_time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 傾印資料表的資料 `file_info`
--

INSERT INTO `file_info` (`id`, `filename`, `type`, `text`, `path`, `album`, `upload_time`) VALUES
(28, 'ling20200522162100.jpg', 'image/jpeg', '睡花', 'img/ling20200522162100.jpg', 3, '2020-05-22 08:20:55');

--
-- 已傾印資料表的索引
--

--
-- 資料表索引 `file_info`
--
ALTER TABLE `file_info`
  ADD PRIMARY KEY (`id`);

--
-- 在傾印的資料表使用自動遞增(AUTO_INCREMENT)
--

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `file_info`
--
ALTER TABLE `file_info`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
