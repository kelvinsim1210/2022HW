-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- 主机： 127.0.0.1
-- 生成日期： 2022-11-21 08:28:10
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
  `Commodity_Bidding_Start_Time` date NOT NULL,
  `Commodity_Bidding_End_Time` date NOT NULL,
  `Commodity_End_Price` char(10) NOT NULL,
  `Commodity_Buyer_Id` char(50) NOT NULL,
  `Commodity_State` char(50) NOT NULL COMMENT '狀態（拍賣中，已結拍）'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- 表的结构 `user`
--

CREATE TABLE `user` (
  `User_Id` char(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
