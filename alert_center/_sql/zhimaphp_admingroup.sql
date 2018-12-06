
--
-- 表的结构 `zhimaphp_admingroup`
--

CREATE TABLE IF NOT EXISTS `zhimaphp_admingroup` (
  `admingroup_id` int(4) NOT NULL AUTO_INCREMENT,
  `admingroup_name` varchar(50) NOT NULL,
  `admingroup_auth` varchar(600) DEFAULT NULL,
  `admingroup_type` tinyint(1) NOT NULL DEFAULT '0',
  `admingroup_order` int(4) NOT NULL DEFAULT '99',
  PRIMARY KEY (`admingroup_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;

--
-- 表的数据 `zhimaphp_admingroup`
--

INSERT INTO `zhimaphp_admingroup` (`admingroup_id`, `admingroup_name`, `admingroup_auth`, `admingroup_type`, `admingroup_order`) VALUES
(1, '超级管理员', '7005|7004|7003|7002|7001', 9, 1);