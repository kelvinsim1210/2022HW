-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- 主机： 127.0.0.1
-- 生成日期： 2022-10-29 10:47:22
-- 服务器版本： 10.4.24-MariaDB
-- PHP 版本： 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 数据库： `shopping_cart`
--

-- --------------------------------------------------------

--
-- 表的结构 `commodity_details`
--

CREATE TABLE `commodity_details` (
  `Commodity_Id` char(100) NOT NULL,
  `Commodity_Name_ch` char(100) NOT NULL,
  `Commodity_Name_en` char(100) NOT NULL,
  `Commodity_Num` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 转存表中的数据 `commodity_details`
--

INSERT INTO `commodity_details` (`Commodity_Id`, `Commodity_Name_ch`, `Commodity_Name_en`, `Commodity_Num`) VALUES
('0', '蘋果', 'apple', 4),
('1', '香蕉', 'banana', 66),
('2', '榴蓮', 'durian', 0),
('3', '西瓜', 'watermalon', 10);

-- --------------------------------------------------------

--
-- 表的结构 `shopping_cart`
--

CREATE TABLE `shopping_cart` (
  `Commodity_Name_ch` char(50) NOT NULL,
  `Commodity_Num` int(10) NOT NULL,
  `Commodity_Id` char(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
