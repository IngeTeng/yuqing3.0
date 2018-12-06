--
-- 表的结构 `zhimaphp_admin`
--

CREATE TABLE IF NOT EXISTS `zhimaphp_admin` (
  `admin_id` int(4) NOT NULL AUTO_INCREMENT,
  `admin_name` varchar(20) DEFAULT NULL,
  `admin_account` varchar(50) DEFAULT NULL,
  `admin_password` varchar(50) DEFAULT NULL,
  `admin_salt` varchar(20) DEFAULT NULL,
  `admin_group` tinyint(1) DEFAULT NULL,
  `admin_lastloginip` varchar(100) DEFAULT NULL,
  `admin_lastlogintime` int(11) DEFAULT NULL,
  `admin_logincount` int(10) DEFAULT '0',
  `admin_addtime` int(11) DEFAULT NULL,
  PRIMARY KEY (`admin_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;

--
-- 表的数据 `zhimaphp_admin`
--

INSERT INTO `zhimaphp_admin`(admin_id, admin_name, admin_account, admin_password, admin_salt, admin_group, admin_lastloginip, admin_lastlogintime, admin_logincount, admin_addtime) VALUES
('1','','zhima','5ccf71a9c408315c57eddc0d8e317e60','1&Ge34YFtb','1','127.0.0.1','1524140927','6','1523696149');