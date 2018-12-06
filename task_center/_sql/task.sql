-- phpMyAdmin SQL Dump
-- version 4.7.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: 2018-12-06 09:54:46
-- 服务器版本： 5.6.36-log
-- PHP Version: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `task`
--
CREATE DATABASE IF NOT EXISTS `task` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `task`;

-- --------------------------------------------------------

--
-- 表的结构 `task_admin`
--

DROP TABLE IF EXISTS `task_admin`;
CREATE TABLE `task_admin` (
  `admin_id` int(4) NOT NULL,
  `admin_name` varchar(20) DEFAULT NULL,
  `admin_account` varchar(50) DEFAULT NULL,
  `admin_password` varchar(50) DEFAULT NULL,
  `admin_salt` varchar(20) DEFAULT NULL,
  `admin_group` tinyint(1) DEFAULT NULL,
  `admin_lastloginip` varchar(100) DEFAULT NULL,
  `admin_lastlogintime` int(11) DEFAULT NULL,
  `admin_logincount` int(10) DEFAULT '0',
  `admin_addtime` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `task_admin`
--

INSERT INTO `task_admin` (`admin_id`, `admin_name`, `admin_account`, `admin_password`, `admin_salt`, `admin_group`, `admin_lastloginip`, `admin_lastlogintime`, `admin_logincount`, `admin_addtime`) VALUES
(1, '', 'zhima', '5ccf71a9c408315c57eddc0d8e317e60', '1&Ge34YFtb', 1, '113.140.11.123', 1544015238, 84, 1523696149),
(2, NULL, 'buhongyu', '78ce813410a60c51323b584539cc8677', 'OHYb31sKc2', 2, '222.135.76.172', 1542610381, 1, 1542610368);

-- --------------------------------------------------------

--
-- 表的结构 `task_admingroup`
--

DROP TABLE IF EXISTS `task_admingroup`;
CREATE TABLE `task_admingroup` (
  `admingroup_id` int(4) NOT NULL,
  `admingroup_name` varchar(50) NOT NULL,
  `admingroup_auth` varchar(600) DEFAULT NULL,
  `admingroup_type` tinyint(1) NOT NULL DEFAULT '0',
  `admingroup_order` int(4) NOT NULL DEFAULT '99'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `task_admingroup`
--

INSERT INTO `task_admingroup` (`admingroup_id`, `admingroup_name`, `admingroup_auth`, `admingroup_type`, `admingroup_order`) VALUES
(1, '超级管理员', '70013|70012|70011|70010|7009|7008|7007|7006|7005|7004|7003|7002|7001', 9, 1),
(2, '运营组', '7006', 0, 99);

-- --------------------------------------------------------

--
-- 表的结构 `task_adminlog`
--

DROP TABLE IF EXISTS `task_adminlog`;
CREATE TABLE `task_adminlog` (
  `adminlog_id` int(10) NOT NULL,
  `adminlog_admin` int(4) DEFAULT NULL,
  `adminlog_time` int(11) DEFAULT NULL,
  `adminlog_log` varchar(600) DEFAULT NULL,
  `adminlog_ip` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `task_adminlog`
--

INSERT INTO `task_adminlog` (`adminlog_id`, `adminlog_admin`, `adminlog_time`, `adminlog_log`, `adminlog_ip`) VALUES
(1, 1, 1540470458, '成功登录!', '127.0.0.1'),
(2, 1, 1540518911, '成功登录!', '127.0.0.1'),
(3, 1, 1540544222, '成功登录!', '127.0.0.1'),
(4, 1, 1540552255, '成功登录!', '127.0.0.1'),
(5, 1, 1540604713, '成功登录!', '127.0.0.1'),
(6, 1, 1540645973, '成功登录!', '127.0.0.1'),
(7, 1, 1540731767, '成功登录!', '127.0.0.1'),
(8, 1, 1540776092, '成功登录!', '127.0.0.1'),
(9, 1, 1540887025, '成功登录!', '127.0.0.1'),
(10, 1, 1540988258, '成功登录!', '127.0.0.1'),
(11, 1, 1540992803, '成功登录!', '113.140.11.6'),
(12, 1, 1541038470, '成功登录!', '219.144.218.167'),
(13, 1, 1541137688, '成功登录!', '219.144.219.174'),
(14, 1, 1541211262, '成功登录!', '1.80.139.81'),
(15, 1, 1541249094, '成功登录!', '124.115.222.149'),
(16, 1, 1541315815, '成功登录!', '113.140.11.120'),
(17, 1, 1541404533, '成功登录!', '1.86.243.99'),
(18, 1, 1541404811, '成功登录!', '124.115.222.150'),
(19, 1, 1541412953, '成功登录!', '124.115.222.150'),
(20, 1, 1541469362, '成功登录!', '1.86.241.163'),
(21, 1, 1541510162, '成功登录!', '124.115.222.148'),
(22, 1, 1541511676, '成功登录!', '111.19.32.30'),
(23, 1, 1541657512, '成功登录!', '::1'),
(24, 1, 1541766337, '成功登录!', '::1'),
(25, 1, 1541771042, '成功登录!', '127.0.0.1'),
(26, 1, 1541826904, '成功登录!', '127.0.0.1'),
(27, 1, 1542089694, '成功登录!', '113.140.11.125'),
(28, 1, 1542107801, '成功登录!', '113.140.11.125'),
(29, 1, 1542266841, '成功登录!', '222.135.76.172'),
(30, 1, 1542348293, '成功登录!', '222.135.77.87'),
(31, 1, 1542467303, '成功登录!', '113.140.11.125'),
(32, 1, 1542469099, '成功登录!', '113.140.11.125'),
(33, 1, 1542521924, '成功登录!', '113.140.11.125'),
(34, 1, 1542609399, '成功登录!', '222.135.76.172'),
(35, 1, 1542609434, '修改管理员组(1)权限成功!', '222.135.76.172'),
(36, 1, 1542609936, '成功登录!', '115.155.1.122'),
(37, 1, 1542609952, '修改管理员组(1)权限成功!', '115.155.1.122'),
(38, 1, 1542609990, '修改管理员组(1)权限成功!', '115.155.1.122'),
(39, 1, 1542610332, '添加管理员组(2:运营组)成功!', '222.135.76.172'),
(40, 1, 1542610349, '修改管理员组(2)权限成功!', '222.135.76.172'),
(41, 1, 1542610368, '成功添加管理员(buhongyu)', '222.135.76.172'),
(42, 1, 1542610371, '退出登录!', '222.135.76.172'),
(43, 2, 1542610381, '成功登录!', '222.135.76.172'),
(44, 1, 1542623371, '成功登录!', '222.135.76.172'),
(45, 1, 1542629993, '成功登录!', '113.140.11.6'),
(46, 1, 1542800012, '成功登录!', '124.115.222.150'),
(47, 1, 1542890000, '成功登录!', '124.115.222.150'),
(48, 1, 1542942478, '成功登录!', '113.200.106.119'),
(49, 1, 1542946578, '成功登录!', '113.140.11.125'),
(50, 1, 1542948886, '成功登录!', '222.135.77.87'),
(51, 1, 1542952401, '成功登录!', '113.140.11.125'),
(52, 1, 1542954822, '成功登录!', '222.135.77.87'),
(53, 1, 1542962304, '成功登录!', '124.115.222.150'),
(54, 1, 1542976139, '成功登录!', '115.155.1.122'),
(55, 1, 1542979830, '成功登录!', '124.115.222.150'),
(56, 1, 1542981949, '成功登录!', '113.140.11.126'),
(57, 1, 1543021358, '成功登录!', '113.140.11.6'),
(58, 1, 1543033497, '成功登录!', '113.140.11.6'),
(59, 1, 1543059448, '成功登录!', '113.140.11.122'),
(60, 1, 1543110975, '成功登录!', '113.140.11.122'),
(61, 1, 1543120388, '成功登录!', '113.140.11.122'),
(62, 1, 1543130863, '成功登录!', '113.140.11.122'),
(63, 1, 1543212735, '成功登录!', '124.115.222.150'),
(64, 1, 1543305632, '成功登录!', '113.140.11.123'),
(65, 1, 1543308780, '成功登录!', '113.140.11.123'),
(66, 1, 1543398493, '成功登录!', '124.115.222.148'),
(67, 1, 1543403818, '成功登录!', '124.115.222.148'),
(68, 1, 1543407149, '成功登录!', '124.115.222.148'),
(69, 1, 1543495901, '成功登录!', '124.115.222.147'),
(70, 1, 1543498651, '成功登录!', '124.115.222.147'),
(71, 1, 1543580213, '成功登录!', '113.140.11.123'),
(72, 1, 1543648605, '成功登录!', '113.140.11.123'),
(73, 1, 1543653201, '成功登录!', '113.140.11.123'),
(74, 1, 1543664075, '成功登录!', '113.140.11.123'),
(75, 1, 1543734187, '成功登录!', '113.140.11.124'),
(76, 1, 1543739957, '成功登录!', '113.140.11.124'),
(77, 1, 1543803204, '成功登录!', '124.115.222.148'),
(78, 1, 1543806056, '成功登录!', '124.115.222.148'),
(79, 1, 1543810617, '成功登录!', '124.115.222.148'),
(80, 1, 1543820071, '成功登录!', '113.140.11.121'),
(81, 1, 1543925064, '成功登录!', '113.140.11.120'),
(82, 1, 1543928273, '成功登录!', '113.140.11.120'),
(83, 1, 1543974982, '成功登录!', '1.86.241.6'),
(84, 1, 1543991406, '成功登录!', '1.86.241.6'),
(85, 1, 1544011200, '成功登录!', '113.140.11.123'),
(86, 1, 1544015238, '成功登录!', '113.140.11.123');

-- --------------------------------------------------------

--
-- 表的结构 `task_interface`
--

DROP TABLE IF EXISTS `task_interface`;
CREATE TABLE `task_interface` (
  `interface_id` int(4) NOT NULL,
  `interface_addr` varchar(255) DEFAULT NULL,
  `interface_type` tinyint(1) DEFAULT '4' COMMENT '1-媒体中心1\n2-爬虫中心、\n3-内容解析中心\n4-类似于广丰、江淮的服务器接口地址\n5-媒体中心2\n6-媒体中心3',
  `interface_name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 转存表中的数据 `task_interface`
--

INSERT INTO `task_interface` (`interface_id`, `interface_addr`, `interface_type`, `interface_name`) VALUES
(1, 'http://47.94.0.230/media_center/api/getSiteInfoById.php', 1, '通过ID获取所有站点信息'),
(2, 'http://47.94.0.230/media_center/api/InputSiteInfo.php', 5, '向任务表中输入站点信息'),
(3, 'http://47.94.0.230/media_center/apigetTask.php', 6, '获取任务信息'),
(4, 'http://47.94.0.230/spider_center/apiquery.php', 2, '爬虫接口'),
(5, 'http://47.94.0.230/content_center/apiparse_test.php', 3, '内容解析接口');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `task_admin`
--
ALTER TABLE `task_admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `task_admingroup`
--
ALTER TABLE `task_admingroup`
  ADD PRIMARY KEY (`admingroup_id`);

--
-- Indexes for table `task_adminlog`
--
ALTER TABLE `task_adminlog`
  ADD PRIMARY KEY (`adminlog_id`),
  ADD KEY `adminlog_admin` (`adminlog_admin`);

--
-- Indexes for table `task_interface`
--
ALTER TABLE `task_interface`
  ADD PRIMARY KEY (`interface_id`);

--
-- 在导出的表使用AUTO_INCREMENT
--

--
-- 使用表AUTO_INCREMENT `task_admin`
--
ALTER TABLE `task_admin`
  MODIFY `admin_id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- 使用表AUTO_INCREMENT `task_admingroup`
--
ALTER TABLE `task_admingroup`
  MODIFY `admingroup_id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- 使用表AUTO_INCREMENT `task_adminlog`
--
ALTER TABLE `task_adminlog`
  MODIFY `adminlog_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=87;
--
-- 使用表AUTO_INCREMENT `task_interface`
--
ALTER TABLE `task_interface`
  MODIFY `interface_id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
