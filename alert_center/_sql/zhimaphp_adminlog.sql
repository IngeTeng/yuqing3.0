
--
-- 表的结构 `zhimaphp_adminlog`
--

CREATE TABLE IF NOT EXISTS `zhimaphp_adminlog` (
  `adminlog_id` int(10) NOT NULL AUTO_INCREMENT,
  `adminlog_admin` int(4) DEFAULT NULL,
  `adminlog_time` int(11) DEFAULT NULL,
  `adminlog_log` varchar(600) DEFAULT NULL,
  `adminlog_ip` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`adminlog_id`),
  KEY `adminlog_admin` (`adminlog_admin`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;
