-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- 主机： 127.0.0.1
-- 生成日期： 2022-11-27 14:09:08
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
-- 数据库： `1121hw_bidding`
--

-- --------------------------------------------------------

--
-- 表的结构 `commodity_details`
--

CREATE TABLE `commodity_details` (
  `Commodity_Id` char(50) NOT NULL,
  `Commodity_Name` char(100) NOT NULL,
  `Commodity_Mark` varchar(500) NOT NULL,
  `Commodity_Seller_Id` char(50) NOT NULL,
  `Commodity_Start_Price` char(10) NOT NULL,
  `Commodity_Bidding_Start_Time` char(50) NOT NULL,
  `Commodity_Bidding_End_Time` char(50) NOT NULL,
  `Commodity_End_Price` char(10) NOT NULL,
  `Commodity_Buyer_Id` char(50) NOT NULL,
  `Commodity_State` char(50) NOT NULL COMMENT '狀態（拍賣中，已結拍）',
  `Lowest_Asking_Price` char(10) NOT NULL COMMENT '最低叫價'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 转存表中的数据 `commodity_details`
--

INSERT INTO `commodity_details` (`Commodity_Id`, `Commodity_Name`, `Commodity_Mark`, `Commodity_Seller_Id`, `Commodity_Start_Price`, `Commodity_Bidding_Start_Time`, `Commodity_Bidding_End_Time`, `Commodity_End_Price`, `Commodity_Buyer_Id`, `Commodity_State`, `Lowest_Asking_Price`) VALUES
('C20221127192402', '西瓜', '好吃的西瓜', 'christy', '30', '2022-11-27 19:24:02', '2022-11-27 19:27:02', '44', 'christy', 'End_Bidding', '5'),
('C20221127210426', '別墅', '靠海，三樓，陽台', 'kelvin', '2000000', '2022-11-27 21:04:26', '2022-11-27 21:07:26', '2020000', 'john', 'On_Bidding', '10000');

-- --------------------------------------------------------

--
-- 表的结构 `user`
--

CREATE TABLE `user` (
  `User_Id` char(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 转存表中的数据 `user`
--

INSERT INTO `user` (`User_Id`) VALUES
('kelvin'),
('christy'),
('john');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
