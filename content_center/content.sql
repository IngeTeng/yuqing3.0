-- phpMyAdmin SQL Dump
-- version 4.7.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: 2018-12-06 09:53:54
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
-- Database: `content`
--
CREATE DATABASE IF NOT EXISTS `content` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `content`;

-- --------------------------------------------------------

--
-- 表的结构 `content_admin`
--

DROP TABLE IF EXISTS `content_admin`;
CREATE TABLE `content_admin` (
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
-- 转存表中的数据 `content_admin`
--

INSERT INTO `content_admin` (`admin_id`, `admin_name`, `admin_account`, `admin_password`, `admin_salt`, `admin_group`, `admin_lastloginip`, `admin_lastlogintime`, `admin_logincount`, `admin_addtime`) VALUES
(1, '', 'zhima', '5ccf71a9c408315c57eddc0d8e317e60', '1&Ge34YFtb', 1, '124.115.222.147', 1543485535, 43, 1523696149);

-- --------------------------------------------------------

--
-- 表的结构 `content_admingroup`
--

DROP TABLE IF EXISTS `content_admingroup`;
CREATE TABLE `content_admingroup` (
  `admingroup_id` int(4) NOT NULL,
  `admingroup_name` varchar(50) NOT NULL,
  `admingroup_auth` varchar(600) DEFAULT NULL,
  `admingroup_type` tinyint(1) NOT NULL DEFAULT '0',
  `admingroup_order` int(4) NOT NULL DEFAULT '99'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `content_admingroup`
--

INSERT INTO `content_admingroup` (`admingroup_id`, `admingroup_name`, `admingroup_auth`, `admingroup_type`, `admingroup_order`) VALUES
(1, '超级管理员', '7005|7004|7003|7002|7001', 9, 1);

-- --------------------------------------------------------

--
-- 表的结构 `content_adminlog`
--

DROP TABLE IF EXISTS `content_adminlog`;
CREATE TABLE `content_adminlog` (
  `adminlog_id` int(10) NOT NULL,
  `adminlog_admin` int(4) DEFAULT NULL,
  `adminlog_time` int(11) DEFAULT NULL,
  `adminlog_log` varchar(600) DEFAULT NULL,
  `adminlog_ip` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `content_adminlog`
--

INSERT INTO `content_adminlog` (`adminlog_id`, `adminlog_admin`, `adminlog_time`, `adminlog_log`, `adminlog_ip`) VALUES
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
(23, 1, 1541564820, '成功登录!', '124.115.222.148'),
(24, 1, 1541574877, '成功登录!', '1.86.241.67'),
(25, 1, 1541594038, '成功登录!', '124.115.222.148'),
(26, 1, 1541854267, '成功登录!', '113.140.11.4'),
(27, 1, 1542000753, '成功登录!', '222.135.76.172'),
(28, 1, 1542091469, '成功登录!', '222.135.77.87'),
(29, 1, 1542114688, '成功登录!', '124.115.222.148'),
(30, 1, 1542172769, '成功登录!', '113.140.11.125'),
(31, 1, 1542361088, '成功登录!', '113.140.11.123'),
(32, 1, 1542368569, '成功登录!', '113.140.11.123'),
(33, 1, 1542526094, '成功登录!', '113.140.11.6'),
(34, 1, 1542609482, '成功登录!', '222.135.76.172'),
(35, 1, 1542799552, '成功登录!', '124.115.222.150'),
(36, 1, 1543146206, '成功登录!', '115.155.1.122'),
(37, 1, 1543485535, '成功登录!', '124.115.222.147');

-- --------------------------------------------------------

--
-- 表的结构 `content_apicount`
--

DROP TABLE IF EXISTS `content_apicount`;
CREATE TABLE `content_apicount` (
  `apicount_id` int(10) NOT NULL,
  `apicount_code` varchar(255) DEFAULT NULL,
  `apicount_source` int(10) DEFAULT NULL,
  `apicount_day` int(10) DEFAULT NULL,
  `apicount_count` int(10) DEFAULT NULL,
  `apicount_errcount` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 转存表中的数据 `content_apicount`
--

INSERT INTO `content_apicount` (`apicount_id`, `apicount_code`, `apicount_source`, `apicount_day`, `apicount_count`, `apicount_errcount`) VALUES
(1, 'parse_test', 0, 1542556800, 1, 1);

-- --------------------------------------------------------

--
-- 表的结构 `content_parse_rules`
--

DROP TABLE IF EXISTS `content_parse_rules`;
CREATE TABLE `content_parse_rules` (
  `r_id` int(11) NOT NULL,
  `author_b` varchar(255) DEFAULT NULL,
  `method` varchar(255) DEFAULT NULL,
  `author_e` varchar(255) DEFAULT NULL,
  `rule_name` varchar(255) DEFAULT '',
  `site_url` varchar(255) DEFAULT '',
  `title_b` varchar(255) DEFAULT '',
  `title_e` varchar(255) DEFAULT '',
  `time_b` varchar(255) DEFAULT '',
  `time_e` varchar(255) DEFAULT '',
  `content_b` varchar(255) DEFAULT '',
  `content_e` varchar(255) DEFAULT '',
  `comment_b` varchar(255) DEFAULT NULL,
  `comment_e` varchar(255) DEFAULT NULL,
  `media_b` varchar(255) DEFAULT '',
  `media_e` varchar(255) DEFAULT '',
  `channel_b` varchar(255) DEFAULT '',
  `channel_e` varchar(255) DEFAULT '',
  `click_b` varchar(255) DEFAULT NULL,
  `click_e` varchar(255) DEFAULT NULL,
  `is_repost` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

--
-- 转存表中的数据 `content_parse_rules`
--

INSERT INTO `content_parse_rules` (`r_id`, `author_b`, `method`, `author_e`, `rule_name`, `site_url`, `title_b`, `title_e`, `time_b`, `time_e`, `content_b`, `content_e`, `comment_b`, `comment_e`, `media_b`, `media_e`, `channel_b`, `channel_e`, `click_b`, `click_e`, `is_repost`) VALUES
(1, NULL, 'ifeng_bbs_content', NULL, '凤凰汽车论坛', 'http://bbs.auto.ifeng.com/thread-*.html', '', '', '', '', '', '', NULL, NULL, '', '', '', '', NULL, NULL, NULL),
(2, NULL, 'souhu_app_content', NULL, '搜狐app', 'http://3g.k.sohu.com*', '', '', '', '', '', '', NULL, NULL, '', '', '', '', NULL, NULL, NULL),
(3, NULL, 'uctoutiao_app_content', NULL, 'UC头条', 'http://m.uczzd.cn/ucnews/*.html', '', '', '', '', '', '', NULL, NULL, '', '', '', '', NULL, NULL, NULL),
(4, NULL, 'tianya_bbs_article', NULL, '天涯社区-汽车时代', 'http://bbs.tianya.cn/post-*.shtml', '', '', '', '', '', '', NULL, NULL, '', '', '', '', NULL, NULL, NULL),
(5, '<em>作者：<b>', '', '</b>', '汽车投诉网-资讯', 'http://www.qctsw.com/article/articleContent/*.html', '<title>', '</title>', '<em>发表于：<b>', '</b></em>', '<div class=\"articleContent\">', '<div class=\"wxText\">', '', '', '_', '</title>', '<div class=\"l-Content\">', '</h3>', '', '', '<em>来源：<b>汽车投诉网'),
(6, '', '', '', '315汽车投诉', 'http://tousu.315che.com/tousudetail/*/', '<title>', '</title>', '<p><span>投诉时间：</span>', '</p>', '<div class=\"comlain-order-con\">', '<div class=\"dispose-progress-wrap\">', '<h2 id=\"commentsize\">全部评论(', ')</h2>', '<a href=\"javascript:;\" id=\"login_to_dea\" style=\"display:none;\">欢迎登录', '!</a>', '<p>您现在的位置：<a href=\"http://www.315che.com/\">', '</p>', '', '', NULL),
(7, '作者：', '', '&nbsp;', '车质网', 'http://www.12365auto.com/*.shtml', '<title>', '</title>', '&nbsp;时间：', '&nbsp;', '<div class=\"show\">', '<div class=\"xgxw\">', '<span id=\"sp_commentcount2\">', '</span>', '<div class=\"logo\"><a href=\"http://www.', '.com\">', '当前位置：<a href=\"/\">', '</span></div>', '', '', '来源：车质网'),
(8, '文|', '', '</strong>', '搜狐汽车频道新闻', 'www.sohu.com/a/*', '<title>', '</title>', '<span class=\"l time\">', '</span>', '<article class=\"article-text\">', '</article>', '', '', '_', '</title>', '<div class=\"location area\">', '</div>', '<div class=\"l read-num\">阅读(', ')</div>', ''),
(9, '<span>作者:', NULL, '</span>', '网上车市', 'http://news.cheshi.com/*.shtml', '<title>', '</title>', '<span class=\"fr\">', '</span>', '<!--正文-->', '<!--阅读-->', '', '', '<span>来源', '</span>', '<h2 class=\"fl\">', '</h2>', '', '', '来源：<a href=\'http://www.cheshi.com\' target=\'_blank\'>网上车市'),
(10, '<div class=\"ina_author\">', '', '</a></span>', '网通社汽车新闻', 'auto.news18a.com/news/*.html', '<title>', '</title>', '<!--时间开始-->', '<!--时间结束-->', '<div class=\"ina_content \">', '<div class=\"ina_antistop\" >', '', '', '<span class=\"ina_source\">来源：', '</a></span>', '<p>当前位置：', '</p>', '', '', '<span class=\"ina_label\">原创'),
(11, '', '', '', '汽车投诉网-投诉', 'http://www.qctsw.com/tousu/content/*.html', '<title>', '</title>', '<em>发表于：<b>', '</b></em>', '<div class=\"articleContent\">', '<div class=\"tstable\">', '', '', '<a href=\"/index.jsp\" title=\"', '\">', '<div class=\"titleNav fix\">', '<em>发表于：', '', '', ''),
(12, '', '', '', '汽车之家论坛', 'https://club.autohome.com.cn/bbs/thread/*.html', '<title>', '</title>', '<span xname=\"date\">', '</span>', '<div class=\"conttxt\" xname=\"content\">', '<div class=\"conbottoms-main\">', '回复：<font id=\"x-replys\">', '</font>', '', '', '_', '</title>', '点击：<font id=\"x-views\">', '</font>', NULL),
(13, '<p class=\"author\">', '', '</p>', '人民网汽车', 'http://auto.people.com.cn/n1/*.html', '<title>', '</title>', '<div class=\"box01\">', '&nbsp;', '<div class=\"clearfix w1000_320 text_con\">', '<div class=\"zdfy clearfix\">', '', '', '--', '</title>', '--', '--人民网', '', '', 'target=\"_blank\">人民网-'),
(14, '<em id=\"source\">', '', '</em>', '新华网汽车', 'http://www.xinhuanet.com/auto/*.htm', '<title>', '</title>', '<span class=\"h-time\">', '</span>', '<span class=\"lb-right s_arrow_right\">', '<div class=\"zan-wap\">', '', '', '<a href=\"http://www.xinhuanet.com/\" target=\"_blank\">', '</a>', '<div class=\"news-position\">', '</div>', '', '', '<em id=\"source\"> 新华社</em>'),
(15, '责任编辑：', NULL, '</span>', '中国新闻网汽车', 'www.chinanews.com/auto/*.shtml', '<title>', '</title>', '<span id=\"pubtime_baidu\">', '<span id=\"pubtime_baidu\">', '<div class=\"left_zw\" style=\"position:relative\">', '<div class=\"left_name\"', '', '', '<span id=\"source_baidu\">来源：', '</span>', '<div id=\"nav\">', '</div>', '', '', 'style=\'color:#666;font-weight:normal;\'>中国新闻网'),
(16, '来源：', '', '<div class=\"zhaiyao\">', '中青在线汽车', 'http://auto.cyol.com/content/*.htm', '<title>', '</title>', '<h6 class=\"laiy\">', '来源：<a', '<div class=\"zhaiyao\">', '<div class=\"xgwz\"', '', '', '<div class=\"lmtit\">', '</div>', '<div class=\"dqwz\">当前位置：', '</span>', '', '', '来源：中国青年报'),
(17, '<span class=\"author\">   作者：', NULL, '</a>', 'nextcar（牛车网）', 'http://www.niuche.com/news/detail_*.html', '<title>', '</title>', '<span class=\"time\">', '</span>', '<section class=\"content recwContent\" id=\"recwContent\">', '<div class=\"tags\">', '<a class=\"comment\" href=\"javascript:void(0);\">', '</a>', '<meta name=\"author\" content=\"', '\">', '<div class=\"bread-nav\">', '</div>', '', '', NULL),
(18, '', '', '', '车人网', 'http://www.che310.com/index.php?m=content&c=index&a=show*', '<title>', '</title>', '</h1>                 <p><span>', '</span>', '<div class=\"art_text\">', '<div class=\"zb\"', '', '', '<img src=\"/statics/che310/images/logo.jpg\" alt=\"', '，最真实', '<div class=\"bread\">', '</div>', '', '', '来源：<a href=\'http://www.che310.com\' target=\'_blank\' style=\'color:#AAA\'>车人网'),
(19, '', '', '', '车神榜', 'http://www.cheshen.cn/article/detail/*.htm', '<title>', '</title>', '</a><span class=\"hr-line\">|</span><span>', '</span>', '<div class=\"detail-main\">', '<div class=\"detail-source\">', '', '', '<div class=\"detail-source\">', '</div>', '<h5 class=\"desc\">', '|</span><span>', '', '', ''),
(20, '<div class=\"zb\">(责编：', NULL, ')</div>', '车天下', 'http://news.chetxia.com/news/*.htm', '<title>', '</title>', '>www.chetxia.com</a>', '来源：<a href=', '<div class=\"content \" id=\"contact\" >', '<div class=\"zb\">', '', '', '_', '</title>', '<input name=\"dir\" type=\"hidden\" value=\"news\" />', '<span class=\"fc_black\">', '', '', '类型：原创'),
(21, '<div class=\"laiyuan\">', NULL, '</a>', '车问网', 'http://www.chewen.com/journal/*.html', '<title>', '</title>', '</a>', '<div class=\"cw_new_xiangxi\">', '<div class=\"cw_new_xiangxi\">', '</div>', '', '', '_', '</title>', '_', '</title>', '', '', ''),
(22, '<i>作者:', NULL, '</i>', '车讯网', 'http://www.chexun.com/*.html', '<title>', '</title>', '<span class=\"time\">', '</span>', '<div class=\"news-editbox\">', '</div>', '', '', '_', 'chexun.com-车讯网</title>', '<span>当前位置：', '</div>', '', '', '来源：车讯网'),
(23, '<p class=\"articleInfo\">编辑：', NULL, '发表日期：', '车友邦', 'http://www.cyb800.com/Html/*.shtml', '<title>', '</title>', '发表日期：', '来源：<a href=', '<div class=\"detail\">', '</div>', '', '', '<a href=\"http://cyb800.com\">', '</a>', '<div class=\"location clearfix\">', '<div id=\"ckepop\"class=\"share\">', '', '', '来源：<a href=\"http://www.cyb000.com\">车友邦'),
(24, '<li class=\"fn-left user\">', NULL, '</li>', '车云网', 'http://www.cheyun.com/content/*', '<title>', '</title>', '<span>发表于:', '来源：', '<div class=\"m-con-article m-con-special\">', '<div class=\"m-banner m-banner-a\">', '', '', '&copy2013-2016', '(京ICP备', '<div class=\"m-bread-crumb\">', '<a href=\"javascript', '', '', '来源：车云网'),
(25, '', NULL, '', '盖世汽车网', 'http://auto.gasgoo.com/News/*', '<title>', '</title>', '<span class=\"timeSource\">', '</span>', '<div id=\"ArticleContent\" class=\"contentDetailed article_18\">', '</div>', '', '', '<div class=\"space02 barcode01\" style=\"display: none;\" id=\"qqbarcode\">', '资讯官方QQ</p>', '<div class=\"crumb\">当前位置：', '</div>', '', '', ''),
(26, 'target=\"_blank\" rel=\"nofollow\">', NULL, '</div>', '和讯网', 'http://auto.hexun.com/*.html', '<title>', '</title>', '<span class=\"pr20\">', '</span>', '<div class=\"art_contextBox\">', '<div class=\"showAll\">', '', '', '作者本人观点，与', '无关。', '<div class=\"logonav clearfix\">', '<div class=\"topSearch\">', '', '', ''),
(27, '', NULL, '', '慧聪汽车网', 'http://info.auto-a.hc360.com/*.shtml', '<title>', '</title>', '<span id=\"endData\">', '</span>', '<div id=\"artical\">', '<div id=\"endFunction\">', '', '', '<meta name=\"author\" content=\"', '\"', '<meta name=\"author\" content=\"', '\"', '', '', '来源：慧聪汽车用品电子网'),
(28, '<span>作者：', NULL, '</span>', '金融界', 'http://ucheke.jrj.com.cn/*.shtml', '<title>', '</title>', '<!--jrj_final_date_start-->', '<!--jrj_final_date_end-->', '<div class=\"texttit_m1\">', '<div id=\"itougu\">', '<i id=\"commentnum\" style=\"padding-right:5px;\">', '</i>', '<meta property=\"og:site_name\" content=\"', '\"', '<!--jrj_final_daohang_start1-->', '<!-- 导航条end -->', '', '', '来源：<!--jrj_final_source_start-->金融界汽车<!--jrj_final_source_end-->'),
(29, '', NULL, '', '猫扑汽车', 'http://auto.mop.com/a/*.html', '<title>', '</title>', '<div class=\"subtile gray\">', '来源：', '<div class=\"article\">', '<div class=\"tag-wrapper\">', '', '', '_', '</title>', '_', '</title>', '', '', ''),
(30, '<span>作者：', NULL, '</span>', '汽车产经网', 'http://www.autoreport.cn/*.html', '<title>', '</title>', '<div class=\"article-information\">', '<span>', '<div class=\"article-content\">', '</div>', '', '', '来源：', '</a></span>', '<span>当前位置：</span>', '</div>', '', '', '来源：<a href=\"http://www.autoreport.cn/\" target=\"_blank\"  rel=\"nofollow\">汽车产经网'),
(31, '<strong class=\"pt-name\">', NULL, '</strong>', '爱卡汽车论坛', 'https://a.xcar.com.cn/bbs/thread-*.html', '<section class=\"posts-tlt\"><h2>', '</h2></section>', '<span class=\"pt-time\">发表于 <span>', '</span>', '<div class=\"pt-cons\">', '</div>', '<span>回', '</span>', '<div class=\"logo-wrap\">', '</a>', '<div class=\"info-nav row\">', '</div>', '<span>看', '</span>', NULL),
(32, '<div class=\"name\">', NULL, '</a>', '汽车之家主站文章news/advice/drive/use/culture/travels/tech/tuning/ev', 'https://www.autohome.com.cn/*', '<title>', '</title>', '<span class=\"time\">', '</span>', '<div class=\"details\" id=\"articleContent\">', '</div>', '', '', '<span class=\"source\">来源：', '</a></span>', '<span>当前位置：</span>', '</div>', '', '', '<span class=\"type\">原创'),
(33, '作者：', NULL, '</span>', '网易文章（newcar/test/guide/chezhu/news）', 'http://auto.163.com/*.html', '<title>', '</title>', '<div class=\"post_time_source\">', '来源: <a id=\"ne_article_source\"', '<div class=\"post_text\" id=\"endText\">', '<div class=\"ep-source cDGray\">', '', '', '来源:', '</a>', '<div class=\"post_crumb\">', '</div>', '', '', '本文版权为网易汽车所有'),
(34, '<span>编辑：', NULL, '</span>', '58车（汽车点评网）', 'https://news.58che.com/*.html', '<title>', '</title>', '<div class=\"a_t l\"><span>', '</span>', '<div class=\"c_tcon clearfix\">', '</div>', '', '', '<span>来源：', '</a>', '_', '</title>', '', '', '类型：<em>原创'),
(35, 'class=\"source ent-source\" rel=\"nofollow\">', NULL, '</a>', '新浪汽车', 'http://auto.sina.com.cn/*', '<title>', '</title>', '<span class=\"date\">', '</span>', '<div class=\"article clearfix\" id=\"artibody\">', '<div class=\"article-bottom clearfix\"  id=\"article-bottom\" >', '', '', '<a href=\"http://auto.sina.com.cn/\" title=\"', '\">', '<div class=\"article-bread fL\" data-sudaclick=\"cnav_breadcrumbs_p\">', '</div>', '', '', 'source ent-source\" rel=\"nofollow\">新浪汽车'),
(36, '作者：', NULL, '</a>', '新车评网', 'www.xincheping.com/*.html', '<title>', '</title>', '&nbsp;&nbsp;', '评论 (<font id=\"cmt_count_callback\">', '<div class=\"de_info\" id=\"zwnr\" style=\"font-size:16px;\">', '</div>', '', '', '<p><a href=\"https://www.xincheping.com/\" target=\"_blank\">', '</a>', '<div class=\"crunav fs12\">', '</div>', '', '', '<div class=\"de_from\">来源：新车评网'),
(37, '作者：', NULL, '</a>', '易车号', 'http://news.bitauto.com/hao/wenzhang/*', '<title>', '</title>', '浏览数：加载中...</span>', '</span>', '<div class=\"article-content motu_cont\" id=\"openimg_articlecontent\">', '</div>', '', '', '<a href=\"http://hao.yiche.com/\" target=\"_blank\">', '</a>', '<span>当前位置：', '</div>', '', '', ''),
(38, '责任编辑：', NULL, '</a>', '爱卡汽车news', 'info.xcar.com.cn/*/news_', '<title>', '</title>', '<span class=\"pub_date\" id=\"pubtime_baidu\" >', '</span>', '<div class=\"artical_player_wrap\" id=\"newsbody\">', '</div>', '', '', '_', '</title>', '当前位置：', '<em>', '', '', '<span class=\"media_name\"  id=\"source_baidu\" ><a href=\"http://www.xcar.com.cn/\" target=\"_blank\" title=\"爱卡汽车\">'),
(39, '责任编辑：', NULL, '</a>', '爱卡汽车newcar', 'newcar.xcar.com.cn/*/news_', '<title>', '</title>', '<span class=\"pub_date\" id=\"pubtime_baidu\" >', '</span>', '<div class=\"artical_player_wrap\" id=\"newsbody\">', '</div>', '', '', '_', '</title>', '当前位置：', '<em>', '', '', '<span class=\"media_name\"  id=\"source_baidu\" ><a href=\"http://www.xcar.com.cn/\" target=\"_blank\" title=\"爱卡汽车\">'),
(40, '责任编辑：', NULL, '</a>', '爱卡汽车drive', 'drive.xcar.com.cn/*/news_', '<title>', '</title>', '<span class=\"pub_date\" id=\"pubtime_baidu\" >', '</span>', '<div class=\"artical_player_wrap\" id=\"newsbody\">', '</div>', '', '', '_', '</title>', '当前位置：', '<em>', '', '', '<span class=\"media_name\"  id=\"source_baidu\" ><a href=\"http://www.xcar.com.cn/\" target=\"_blank\" title=\"爱卡汽车\">'),
(41, '<p class=\"p-n\">', NULL, '</a>', '易车网news', 'news.bitauto.com/*.html', '<title>', '</title>', '<div class=\"t-box\">', '</span>', '<div class=\"article-content motu_cont\" id=\"openimg_articlecontent\">', '</div>', '', '', '_', '</title>', '<span>当前位置：', '</div>', '', '', '<em class=\"bg-ico-sty\">'),
(42, '<div class=\"user_name\">', NULL, '</a>', '易车网baa', 'baa.bitauto.com/*/thread-*.html', '<title>', '</title>', '<span role=\"postTime\">发表于', '</span>', '<div class=\"post_width\">', '<div class=\"new-share-box\">', '<i class=\"pl-num\">', '</i>', '_', '</title>', '_', '</title>', '', '', ''),
(43, 'bosszone=\"jgname\">', NULL, '</span>', '腾讯汽车', 'auto.qq.com/a/*.htm', '<title>', '</title>', 'time\">', '</span>', 'bossZone=\"content\">', '</div>', '', '', '_', '</title>', 'bosszone=\"ztTopic\">', '</a></span>', '', '', '原创报道组'),
(44, 'rel=\"bookmark\" target=\"_blank\">', NULL, '</a>发表', '汽车探索', 'http://www.feelcars.com/*.html', '<title>', '</title>', '发布日期：', '&nbsp;', '<div class=\"single-content\">', '</div>', '', '', '|', '</title>', '<nav class=\"breadcrumb\">', '</nav>', '', '', '本站原创文章'),
(45, '新闻来源：', NULL, '</div>', '汽车商务网', 'http://www.bcar35.com/html/*.html', '<title>', '</title>', '<div class=\"date\">', '新闻来源：', '<div class=\"content\">', '</div>', '', '', '专栏资料，均为', '版权所有', '<div class=\"mnav\">当前位置：', '</div>', '', '', '新闻来源：汽车商务网'),
(46, '<small>来源：', NULL, '</small>', '汽车之友', 'http://www.zzkwzz.com/*.html', '<title>', '</title>', '<small>日期：', '</small>', '<div class=\"wzw\" >', '</div>', '', '', 'Copyright &copy; 2002-2016', '版权所有', '<div class=\"place clearfix\">', '</div>', '', '', '<small>来源：汽车评测'),
(47, '<span class=\"ai-author d\" id=\"author_baidu\">作者：', NULL, '</span>', '凤凰网汽车', 'auto.ifeng.com/*.shtml', '<title>', '</title>', '<span class=\"ai-date d\" id=\"pubtime_baidu\">', '</span>', '<div class=\"arl-c-txt\">', '</div>', '', '', '_', '</title>', '凤凰网汽车</a></h1>', '<div class=\"c-m-i fr\">', '', '', ''),
(48, '作者：', NULL, '</div>', '搜狐汽车老版', 'auto.sohu.com/*.shtml', '<title>', '</title>', '<div class=\"time\">', '</div>', '<div class=\"text clear\" id=\"contentText\" collection=\"Y\">', '<div class=\"editShare clear\">', '', '', '<a target=\"_blank\" href=\"http://auto.sohu.com/\">', '</a>', '<a href=http://auto.sohu.com/>', '</a>', '', '', ''),
(49, '<div class=\"articleTag\">', NULL, '</span>', '汽车之家-车家号', 'chejiahao.autohome.com.cn/info*', '<title>', '</title>', '浏览</span>', '</span>', '<div class=\"article-content example\" id=\"gallery-selector\">', '<div id=\"gallery-pswp\" class=\"pswp\"', '', '', '_', '</title>', '_', '</title>', '', '', ''),
(50, '<span  class=\"postauthor\">', NULL, '</a>', '车神网', 'www.cncheshen.com/*.html', '<title>', '</title>', '<span class=\"postclock\"><i class=\"icon-clock-1\"></i>', '</span>', '<div class=\"post-content\">', '<div class=\"post-options  clearfix\">', '', '', '<a  href=\"http://www.cncheshen.com\" title=\"', '\"', '<span  class=\"postcat\">', '</span>', '', '', ''),
(51, '<div class=\"pageInfo\">', NULL, '</span>', '盖世汽车研究院', 'auto.gasgoo.com/institute/*.html', '<title>', '</title>', '</span><span>', '</span><span>', '<div class=\"keytxt\">', '</div>', '', '', '_研究院_', '</title>', '<li class=\"pitch\"><a href=\"http://auto.gasgoo.com/institute\">', '</a></li>', '', '', '</span><span>盖世汽车研究院</span></div>'),
(52, '<span class=\"scribe\">', NULL, '</span>', '盖世汽车大V说', 'auto.gasgoo.com/a/*.html', '<title>', '</title>', '<span>', '<div class=\"pageTools\">', '<div id=\"ArticleContent\" class=\"contentDetailed02\">', '<p class=\"promptP\">', '', '', '文章为作者个人独立观点，不代表', '官方立场。', '<li class=\"pitch\"><a href=\"http://auto.gasgoo.com/a\" target=\"_blank\">', '</a></li>', '', '', ''),
(53, '<div class=\"ina_author\">', NULL, '/span>', '和讯网独家', 'http://che.hexun.com/news/storys_*.html', '<title>', '</title>', '<span class=\"ina_data\">', '</span>', '<div class=\"ina_news_pic_text\">', '<div id=\"ina_insert_behind\">', '', '', '<a href=\"http://auto.hexun.com\" title=\"和讯网\">', '</a>', '<p>当前位置：', '</p>', '', '', '<span class=\"ina_label\">原创</span>'),
(54, 'class=\"post-author-name\">', NULL, '</a>', '猫扑大杂烩', 'dzh.mop.com/a/*.html', '<title>', '</title>', '发表时间：<span>', '</span>', '<div class=\"detail-article\">', '<div class=\"dzh-detail-ad02\"', '', '', '-猫扑大杂烩', '</title>', '<div class=\"crumbs-wrap clearfix mb15\">', '</div>', '', '', ''),
(55, '<span>作者：', NULL, '</span>', '太平洋汽车网', 'https://www.pcauto.com.cn/*.html', '<title>', '</title>', '<span class=\"pubTime\" id=\"pubtime_baidu\">', '</span>', '<div class=\"artText clearfix\">', '<div class=\"relateArt\" newflag=\"y\">', '', '', '_', '</title>', '_', '</title>', '', '', '<span class=\"tips\">原创'),
(56, '<a class=\"ml5 mr5 black f12\">编辑：', NULL, '</a>', '中国汽车质量网newcars', 'aqsiqauto.com/newcars/*.html', '<title>', '</title>', '<a class=\"ml5 mr5 black f12\">时间：', '</a>', '<a href=\"#commentcot\" class=\"social-share-icon combtn\">评</a>', '<div class=\"col-xs-12 plr_0\">', '', '', '<meta name=\"keywords\" content=\"', '，', '<span class=\"text-muted ml5\">当前位置&nbsp;:</span>', '</h5>', '', '', '<a class=\"ml5 mr5 black f12\">来源：中国汽车质量网'),
(57, '', NULL, '', '中国汽车质量网recall', 'aqsiqauto.com/recall/*.html', '<div class=\"col-xs-12 page-header\">', '</div>', '<title>', '<title>', '<div class=\"col-xs-12 info-contentItem\">', '<div class=\"clear\">', '', '', '<title>', '</title>', '网站首页></span></a>', '</span></a>', '', '', ''),
(58, 'source: \'', NULL, '\',', '今日头条汽车', 'www.toutiao.com/a*/', '<title>', '</title>', 'time: \'', '\'', 'content: \'', 'groupId:', '', '', 'href=//m.', '.com', 'chineseTag: \'', '\',', '', '', 'isOriginal: true,'),
(59, '<span class=\"auther\">', NULL, '</span>', 'ZAKER—汽车频道', 'www.myzaker.com/article/*/', '<title>', '</title>', '<span class=\"time\">', '</span>', '<div class=\"article_content\">', '<div class=\"article_more\">', '', '', '<a href=\"//www.myzaker.com/about.html\" target=\"_blank\">关于', '</a>', '<ol class=\"breadcrumb hidden-phone\">', '<li class=\"active\">', '', '', ''),
(60, '<span class=\"tg\">来源：', NULL, '</span>', '汽车经济网', 'www.autojingji.com/html/kanche/*.html', '<title>', '</title>', '<span class=\"time\">时间：', '</span>', '<div class=\"arc-body mt10 clearfix\">', '<div class=\"end_source\">', '', '', '<a href=\"http://www.autojingji.com/\" target=\"_blank\">', '</a>', '<div class=\"position\">您的位置：', '<span>正文', '', '', '<span class=\"tg\">来源：汽车经济网'),
(61, '作者:</small>', NULL, '<small>', '汽车圈', 'www.qichequan.net/*.html', '<title>', '</title>', '时间:</small>', '<small>', '<div class=\"content\">', '<div class=\"dede_pages\">', '', '', '_', '</title>', '<strong>当前位置:', '</div>', '', '', '来源:</small>汽车圈'),
(62, '作者：<span>', NULL, '</span>', '千龙网', 'http://auto.qianlong.com/*/*.shtml', '<title>', '</title>', '<span class=\"pubDate\">', '</span>', '<div class=\"article-content\">', '</div>', '', '', 'class=\"hidden-phone\">', '</span>首页', 'class=\"hidden-phone\">', '</span>首页', '', '', '<span class=\"source\"><a href=\"\" target=\"_blank\" title=\"千龙网\">千龙网'),
(63, '&nbsp;&nbsp;', NULL, '</div>', '深圳车城网', 'http://www.c168c.cn/news/*', '<title>', '</title>', '<div class=\"breadNav\">', '&nbsp;&nbsp;', '<div class=\"contentMain\">', '</div>', '', '', '<img src=\"/images/', 'Logo.png\" /></a>', '<img src=\"/images/', 'Logo.png\" /></a>', '', '', ''),
(64, '', NULL, '', '汽车大世界', 'mycar168.com/*.html', '<title>', '</title>', '&nbsp;', '&nbsp;责任编辑', '<div id=\"body\">', '<div class=\"tg_ksbm\">', '', '', '·', '</title>', '_', '</title>', '', '', ''),
(65, '', NULL, '', '蜀车网', 'http://www.shucar.com/show-*.html', '<title>', '</title>', '<span class=\"fr\">', '&nbsp;', '<section data-role=\"outer\" label=\"Powered by 135editor.com\" style=\"caret-color: rgb(0, 0, 0); color: rgb(0, 0, 0); font-size: 16px; font-family: 微软雅黑;\">', '</section>', '', '', '</a>都市', '</span>', '_blank\">首页</a> >', '</div>', '', '', ''),
(66, '', NULL, '', '万车网', 'http://www.i7car.com/review/*.html', '<title>', '</title>', '</span><span class=\"floatRight\">', '</span>', '<div class=\"newNewsMainContent\">', '</div>', '', '', '_', '</title>', '>万车网</a> &gt;', '</a> &gt; <span>', '', '', '类型：原创'),
(67, '<span class=\"wz_name\">', NULL, '</span>', '选车网', 'http://www.chooseauto.com.cn/*.shtml', '<title>', '</title>', '<span class=\"wz_time\">', '</span>', '<div id=\"div_CurrentPage\">', '</div>', '', '', '_', '</title>', 'target=\"_blank\">首页</a>', '</div>', '', '', ''),
(68, '<span>作者：', NULL, '</span>', '越野一族', 'http://www.fblife.com/newshow_*.html', '<title>', '</title>', '<i class=\"tit_time\">', '</span>', '<div class=\"con_neir clearfix\" id=\"con_weibo\">', '<div class=\"f_wzkeywords_pad clearfix\">', '', '', '__', '</title>', '__', '</title>', '', '', '本文首发于越野e族'),
(69, '', NULL, '', '中国汽车交易网', 'http://news.auto18.com/html/*/news_*.html', '<title>', '</title>', '<span>', '</span>', '<div class=\"newsbody\">', '<div class=\"keyworlds\">', '', '', '<div class=\"newshead\">', '</a>', '<div class=\"navi\">', '</h1>', '', '', '来源：中国汽车交易网'),
(70, '<span class=\"from\">', NULL, '</span>', '中国汽车网', 'http://www.chinacar.com.cn/newsview*.html', '<title>', '</title>', '<span class=\"time_article\">', '<span class=\"from\">', '<div class=\"article-contents\">', '</article>', '', '', '|新闻资讯', '</title>', '|', '</title>', '', '', ''),
(71, '', NULL, '', '中国汽车消费网', 'http://inf.315che.com/n/*/*', '<title>', '</title>', '<span class=\"fcgray post-time\">', '</span>', '<div class=\"article-content\">', '<div class=\"share-toos\">', '', '', '_', '</title>', '您现在的位置：<a href=\"http://www.315che.com/\">首页', '正文</a></p>', '', '', ''),
(72, '<h1 class=\"art-tit\">', NULL, '|', '中国汽车消费网-大咖说', 'bigshow.315che.com/bigShowDetail/*/', '<h1 class=\"art-tit\">', '</h1>', '<title>', '</title>', '<div class=\"art-content\">', '<div class=\"row clearfix mb20\">', '', '', '_正文_', '</title>', '<title>', '</title>', '', '', ''),
(73, '&nbsp;', NULL, '&nbsp;', '中华网', 'auto.china.com/*.html', '<title>', '</title>', '<div class=\"chan_scanToPhone_img\">', '&nbsp;', '<div id=\"chan_newsDetail\">', '<div class=\"pageStyle5\">', '', '', '_', '</title>', '_', '</title>', '', '', '&nbsp;<a href=\'http://auto.china.com/\' target=\'_blank\'>中华网汽车</a> &nbsp;'),
(74, '作者：', NULL, '&nbsp;', '卓众汽车网', 'http://www.uncars.com.cn/*.shtml', '<title>', '</title>', '发布时间：', '</div>', '<div class=\"box\">', '<div class=\"page\"', '', '', '_', '</title>', '_', '</title>', '', '', ''),
(75, '<meta name=\"author\" content=\"', NULL, '\">', '环球网汽车', 'auto.huanqiu.com/*.html', '<title>', '</title>', '<span class=\"la_t_a\">', '</span>', '<div class=\"la_con\">', '<script type=\"text/javascript\">', '', '', '_', '</title>', '_', '</title>', '', '', '版权作品，未经环球网'),
(76, '<div class=\"fr\">', NULL, '</a>', '12缸汽车人之家', 'www.12gang.com/article_*.html', '<title>', '</title>', '<div class=\"arinfo\">', '</span>', '<div class=\"arMain\">', '关注微信号：12缸汽车', '', '', '_', '</title>', '_', '</title>', '', '', ''),
(77, '', NULL, '', '爱易汽车nc', 'nc.ieche.com/*.shtml', '<title>', '</title>', '<div class=\"info\">', '<a href=', '<div class=\"artTxt\">', '<div class=\"pagers\">', '', '', '_', '</title>', '首页</a> >', '> 正文', '', '', '<a href=\"http://old.ieche.com\">爱意汽车</a> 来源：'),
(78, '', NULL, '', '爱易汽车ns', 'ns.ieche.com/*.shtml', '<title>', '</title>', '<div class=\"info\">', '<a href=', '<div class=\"artTxt\">', '<div class=\"pagers\">', '', '', '_', '</title>', '首页</a> >', '> 正文', '', '', '<a href=\"http://old.ieche.com\">爱意汽车</a> 来源：'),
(79, '', NULL, '', '爱易汽车guide', 'guide.ieche.com/*.shtml', '<title>', '</title>', '<div class=\"info\">', '<a href=', '<div class=\"artTxt\">', '<div class=\"pagers\">', '', '', '_', '</title>', '首页</a> >', '> 正文', '', '', '<a href=\"http://old.ieche.com\">爱意汽车</a> 来源：'),
(80, '', NULL, '', '爱易汽车market', 'market.ieche.com/*.shtml', '<title>', '</title>', '<div class=\"info\">', '<a href=', '<div class=\"artTxt\">', '<div class=\"pagers\">', '', '', '_', '</title>', '首页</a> >', '> 正文', '', '', '<a href=\"http://old.ieche.com\">爱意汽车</a> 来源：'),
(81, '', NULL, '', '安徽车迷网', 'http://www.xkcar.cn/a/*.html', '<title>', '</title>', '|</span>&nbsp;', '&nbsp;', '<div id=\"Content_\">', '<div>', '', '', '_', '</title>', '_', '</title>', '', '', ''),
(82, '编辑：', NULL, '发布时间：', '安徽汽车网', 'http://www.ahauto.com/article/*.html', '<title>', '</title>', '发布时间：', '评论：', '<div class=\"a_con\">', '<div class=\"autopage\">', '', '', '<meta content=\"', '为你提供汽车', '首页</a> >', '</a>', '', '', '来源：安徽汽车网'),
(83, '</i>编辑：', NULL, '<i>', '巴渝车网', 'www.bayuche.com/*.html', '<title>', '</title>', '</h1>', '<i>', '<div class=\"articleContent\">', '<div class=\"articleSellerInfo\">', '', '', '<a href=\"http://www.bayuche.com\" target=\"_top\" title=\"', '\">', '<font>当前位置：</font>', '<span>', '', '', '类型：原创'),
(84, '', NULL, '', '常州汽车网', 'http://www.czqc.cn/news/*', '<title>', '</title>', '<div class=\"dExp\">[', ']', '<div class=\"dArea\" style=\"padding-top:25px;\">', '<div class=\"dTags\">', '', '', '<div id=\"logo\"><a href=\"http://www.czqc.cn/\" target=\"_blank\">', '</a></div>', '您现在的位置：<a href=\"/\">首页</a> >', '</div>', '', '', '出处：<a href=\"http://www.czqc.cn\">www.czqc.cn'),
(85, '', NULL, '', '车城网', 'www.chemalls.com/*.html', '<title>', '</title>', '时间：', '</div>', '<div class=\"contents\">', '<div data-am-widget=\"duoshuo\"', '', '', '<meta name=\"keywords\" content=\"', ',', '<meta name=\"keywords\" content=\"', ',', '', '', '');

-- --------------------------------------------------------

--
-- 表的结构 `content_parse_rulesss`
--

DROP TABLE IF EXISTS `content_parse_rulesss`;
CREATE TABLE `content_parse_rulesss` (
  `r_id` int(11) NOT NULL,
  `author_b` varchar(255) DEFAULT NULL,
  `method` varchar(255) DEFAULT NULL,
  `author_e` varchar(255) DEFAULT NULL,
  `rule_name` varchar(255) DEFAULT '',
  `site_url` varchar(255) DEFAULT '',
  `title_b` varchar(255) DEFAULT '',
  `title_e` varchar(255) DEFAULT '',
  `time_b` varchar(255) DEFAULT '',
  `time_e` varchar(255) DEFAULT '',
  `content_b` varchar(255) DEFAULT '',
  `content_e` varchar(255) DEFAULT '',
  `comment_b` varchar(255) DEFAULT NULL,
  `comment_e` varchar(255) DEFAULT NULL,
  `media_b` varchar(255) DEFAULT '',
  `media_e` varchar(255) DEFAULT '',
  `channel_b` varchar(255) DEFAULT '',
  `channel_e` varchar(255) DEFAULT '',
  `click_b` varchar(255) DEFAULT NULL,
  `click_e` varchar(255) DEFAULT NULL,
  `is_repost` varchar(255) DEFAULT NULL COMMENT '是否原创标记'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

--
-- 转存表中的数据 `content_parse_rulesss`
--

INSERT INTO `content_parse_rulesss` (`r_id`, `author_b`, `method`, `author_e`, `rule_name`, `site_url`, `title_b`, `title_e`, `time_b`, `time_e`, `content_b`, `content_e`, `comment_b`, `comment_e`, `media_b`, `media_e`, `channel_b`, `channel_e`, `click_b`, `click_e`, `is_repost`) VALUES
(1, NULL, 'ifeng_bbs_content', NULL, '凤凰汽车论坛', 'http://bbs.auto.ifeng.com/thread-*.html', '', '', '', '', '', '', NULL, NULL, '', '', '', '', NULL, NULL, NULL),
(2, NULL, 'souhu_app_content', NULL, '搜狐app', 'http://3g.k.sohu.com*', '', '', '', '', '', '', NULL, NULL, '', '', '', '', NULL, NULL, NULL),
(3, NULL, 'uctoutiao_app_content', NULL, 'UC头条', 'http://m.uczzd.cn/ucnews/*.html', '', '', '', '', '', '', NULL, NULL, '', '', '', '', NULL, NULL, NULL),
(4, NULL, 'tianya_bbs_article', NULL, '天涯社区-汽车时代', 'http://bbs.tianya.cn/post-*.shtml', '', '', '', '', '', '', NULL, NULL, '', '', '', '', NULL, NULL, NULL),
(5, '<em>作者：<b>', '', '</b>', '汽车投诉网-资讯', 'http://www.qctsw.com/article/articleContent/*.html', '<title>', '</title>', '<em>发表于：<b>', '</b></em>', '<div class=\"articleContent\">', '<div class=\"wxText\">', '', '', '_', '</title>', '<div class=\"l-Content\">', '</h3>', '', '', '<em>来源：<b>汽车投诉网'),
(6, '', '', '', '315汽车投诉', 'http://tousu.315che.com/tousudetail/*/', '<title>', '</title>', '<p><span>投诉时间：</span>', '</p>', '<div class=\"comlain-order-con\">', '<div class=\"dispose-progress-wrap\">', '<h2 id=\"commentsize\">全部评论(', ')</h2>', '<a href=\"javascript:;\" id=\"login_to_dea\" style=\"display:none;\">欢迎登录', '!</a>', '<p>您现在的位置：<a href=\"http://www.315che.com/\">', '</p>', '', '', NULL),
(7, '作者：', '', '&nbsp;', '车质网', 'http://www.12365auto.com/*.shtml', '<title>', '</title>', '&nbsp;时间：', '&nbsp;', '<div class=\"show\">', '<div class=\"xgxw\">', '<span id=\"sp_commentcount2\">', '</span>', '<div class=\"logo\"><a href=\"http://www.', '.com\">', '当前位置：<a href=\"/\">', '</span></div>', '', '', '来源：车质网'),
(8, '文|', '', '</strong>', '搜狐汽车频道新闻', 'www.sohu.com/a/*', '<title>', '</title>', '<span class=\"l time\">', '</span>', '<article class=\"article-text\">', '</article>', '', '', '_', '</title>', '<div class=\"location area\">', '</div>', '<div class=\"l read-num\">阅读(', ')</div>', ''),
(9, '<span>作者:', NULL, '</span>', '网上车市', 'http://news.cheshi.com/*.shtml', '<title>', '</title>', '<span class=\"fr\">', '</span>', '<!--正文-->', '<!--阅读-->', '', '', '<span>来源', '</span>', '<h2 class=\"fl\">', '</h2>', '', '', '来源：<a href=\'http://www.cheshi.com\' target=\'_blank\'>网上车市'),
(10, '<div class=\"ina_author\">', '', '</a></span>', '网通社汽车新闻', 'auto.news18a.com/news/*.html', '<title>', '</title>', '<!--时间开始-->', '<!--时间结束-->', '<div class=\"ina_content \">', '<div class=\"ina_antistop\" >', '', '', '<span class=\"ina_source\">来源：', '</a></span>', '<p>当前位置：', '</p>', '', '', '<span class=\"ina_label\">原创'),
(11, '', '', '', '汽车投诉网-投诉', 'http://www.qctsw.com/tousu/content/*.html', '<title>', '</title>', '<em>发表于：<b>', '</b></em>', '<div class=\"articleContent\">', '<div class=\"tstable\">', '', '', '<a href=\"/index.jsp\" title=\"', '\">', '<div class=\"titleNav fix\">', '<em>发表于：', '', '', ''),
(12, '', '', '', '汽车之家论坛', 'https://club.autohome.com.cn/bbs/thread/*.html', '<title>', '</title>', '<span xname=\"date\">', '</span>', '<div class=\"conttxt\" xname=\"content\">', '<div class=\"conbottoms-main\">', '回复：<font id=\"x-replys\">', '</font>', '', '', '_', '</title>', '点击：<font id=\"x-views\">', '</font>', NULL),
(13, '<p class=\"author\">', '', '</p>', '人民网汽车', 'http://auto.people.com.cn/n1/*.html', '<title>', '</title>', '<div class=\"box01\">', '&nbsp;', '<div class=\"clearfix w1000_320 text_con\">', '<div class=\"zdfy clearfix\">', '', '', '--', '</title>', '--', '--人民网', '', '', 'target=\"_blank\">人民网-'),
(14, '<em id=\"source\">', '', '</em>', '新华网汽车', 'http://www.xinhuanet.com/auto/*.htm', '<title>', '</title>', '<span class=\"h-time\">', '</span>', '<span class=\"lb-right s_arrow_right\">', '<div class=\"zan-wap\">', '', '', '<a href=\"http://www.xinhuanet.com/\" target=\"_blank\">', '</a>', '<div class=\"news-position\">', '</div>', '', '', '<em id=\"source\"> 新华社</em>'),
(15, '责任编辑：', NULL, '</span>', '中国新闻网汽车', 'www.chinanews.com/auto/*.shtml', '<title>', '</title>', '<span id=\"pubtime_baidu\">', '<span id=\"pubtime_baidu\">', '<div class=\"left_zw\" style=\"position:relative\">', '<div class=\"left_name\"', '', '', '<span id=\"source_baidu\">来源：', '</span>', '<div id=\"nav\">', '</div>', '', '', 'style=\'color:#666;font-weight:normal;\'>中国新闻网'),
(16, '来源：', '', '<div class=\"zhaiyao\">', '中青在线汽车', 'http://auto.cyol.com/content/*.htm', '<title>', '</title>', '<h6 class=\"laiy\">', '来源：<a', '<div class=\"zhaiyao\">', '<div class=\"xgwz\"', '', '', '<div class=\"lmtit\">', '</div>', '<div class=\"dqwz\">当前位置：', '</span>', '', '', '来源：中国青年报'),
(17, '<span class=\"author\">   作者：', NULL, '</a>', 'nextcar（牛车网）', 'http://www.niuche.com/news/detail_*.html', '<title>', '</title>', '<span class=\"time\">', '</span>', '<section class=\"content recwContent\" id=\"recwContent\">', '<div class=\"tags\">', '<a class=\"comment\" href=\"javascript:void(0);\">', '</a>', '<meta name=\"author\" content=\"', '\">', '<div class=\"bread-nav\">', '</div>', '', '', NULL),
(19, '', '', '', '车神榜', 'http://www.cheshen.cn/article/detail/*.htm', '<title>', '</title>', '</a><span class=\"hr-line\">|</span><span>', '</span>', '<div class=\"detail-main\">', '<div class=\"detail-source\">', '', '', '<div class=\"detail-source\">', '</div>', '<h5 class=\"desc\">', '|</span><span>', '', '', ''),
(20, '<div class=\"zb\">(责编：', NULL, ')</div>', '车天下', 'http://news.chetxia.com/news/*.htm', '<title>', '<title>', '>www.chetxia.com</a>', '来源：<a href=', '<div class=\"content \" id=\"contact\" >', '<div class=\"zb\">', '', '', '_', '</title>', '<input name=\"dir\" type=\"hidden\" value=\"news\" />', '<span class=\"fc_black\">', '', '', '类型：原创'),
(21, '<div class=\"laiyuan\">', NULL, '</a>', '车问网', 'http://www.chewen.com/journal/*.html', '<title>', '</title>', '</a>', '<div class=\"cw_new_xiangxi\">', '<div class=\"cw_new_xiangxi\">', '</div>', '', '', '_', '</title>', '_', '</title>', '', '', ''),
(22, '<i>作者:', NULL, '</i>', '车讯网', 'http://www.chexun.com/*.html', '<title>', '</title>', '<span class=\"time\">', '</span>', '<div class=\"news-editbox\">', '</div>', '', '', '_', 'chexun.com-车讯网</title>', '<span>当前位置：', '</div>', '', '', '来源：车讯网'),
(23, '<p class=\"articleInfo\">编辑：', NULL, '发表日期：', '车友邦', 'http://www.cyb800.com/Html/*.shtml', '<title>', '</title>', '发表日期：', '来源：<a href=', '<div class=\"detail\">', '</div>', '', '', '<a href=\"http://cyb800.com\">', '</a>', '<div class=\"location clearfix\">', '<div id=\"ckepop\"class=\"share\">', '', '', '来源：<a href=\"http://www.cyb000.com\">车友邦'),
(24, '<li class=\"fn-left user\">', NULL, '</li>', '车云网', 'http://www.cheyun.com/content/*', '<title>', '</title>', '<span>发表于:', '来源：', '<div class=\"m-con-article m-con-special\">', '<div class=\"m-banner m-banner-a\">', '', '', '&copy2013-2016', '(京ICP备', '<div class=\"m-bread-crumb\">', '<a href=\"javascript', '', '', '来源：车云网'),
(25, '', NULL, '', '盖世汽车网', 'http://auto.gasgoo.com/News/*', '<title>', '</title>', '<span class=\"timeSource\">', '</span>', '<div id=\"ArticleContent\" class=\"contentDetailed article_18\">', '</div>', '', '', '<div class=\"space02 barcode01\" style=\"display: none;\" id=\"qqbarcode\">', '资讯官方QQ</p>', '<div class=\"crumb\">当前位置：', '</div>', '', '', ''),
(26, 'target=\"_blank\" rel=\"nofollow\">', NULL, '</div>', '和讯网', 'http://auto.hexun.com/*.html', '<title>', '</title>', '<span class=\"pr20\">', '</span>', '<div class=\"art_contextBox\">', '<div class=\"showAll\">', '', '', '作者本人观点，与', '无关。', '<div class=\"logonav clearfix\">', '<div class=\"topSearch\">', '', '', ''),
(27, '', NULL, '', '慧聪汽车网', 'http://info.auto-a.hc360.com/*.shtml', '<title>', '</title>', '<span id=\"endData\">', '</span>', '<div id=\"artical\">', '<div id=\"endFunction\">', '', '', '<meta name=\"author\" content=\"', '\"', '<meta name=\"author\" content=\"', '\"', '', '', '来源：慧聪汽车用品电子网'),
(28, '<span>作者：', NULL, '</span>', '金融界', 'http://ucheke.jrj.com.cn/*.shtml', '<title>', '</title>', '<!--jrj_final_date_start-->', '<!--jrj_final_date_end-->', '<div class=\"texttit_m1\">', '<div id=\"itougu\">', '<i id=\"commentnum\" style=\"padding-right:5px;\">', '</i>', '<meta property=\"og:site_name\" content=\"', '\"', '<!--jrj_final_daohang_start1-->', '<!-- 导航条end -->', '', '', '来源：<!--jrj_final_source_start-->金融界汽车<!--jrj_final_source_end-->'),
(29, '', NULL, '', '猫扑汽车', 'http://auto.mop.com/a/*.html', '<title>', '</title>', '<div class=\"subtile gray\">', '来源：', '<div class=\"article\">', '<div class=\"tag-wrapper\">', '', '', '_', '</title>', '_', '</title>', '', '', ''),
(30, '<span>作者：', NULL, '</span>', '汽车产经网', 'http://www.autoreport.cn/*.html', '<title>', '</title>', '<div class=\"article-information\">', '<span>', '<div class=\"article-content\">', '</div>', '', '', '来源：', '</a></span>', '<span>当前位置：</span>', '</div>', '', '', '来源：<a href=\"http://www.autoreport.cn/\" target=\"_blank\"  rel=\"nofollow\">汽车产经网'),
(31, '<strong class=\"pt-name\">', NULL, '</strong>', '爱卡汽车论坛', 'https://a.xcar.com.cn/bbs/thread-*.html', '<section class=\"posts-tlt\"><h2>', '</h2></section>', '<span class=\"pt-time\">发表于 <span>', '</span>', '<div class=\"pt-cons\">', '</div>', '<span>回', '</span>', '<div class=\"logo-wrap\">', '</a>', '<div class=\"info-nav row\">', '</div>', '<span>看', '</span>', NULL),
(32, '<div class=\"name\">', NULL, '</a>', '汽车之家主站文章news/advice/drive/use/culture/travels/tech/tuning/ev', 'https://www.autohome.com.cn/*', '<title>', '</title>', '<span class=\"time\">', '</span>', '<div class=\"details\" id=\"articleContent\">', '</div>', '', '', '<span class=\"source\">来源：', '</a></span>', '<span>当前位置：</span>', '</div>', '', '', '<span class=\"type\">原创'),
(33, '作者：', NULL, '</span>', '网易文章（newcar/test/guide/chezhu/news）', 'http://auto.163.com/*.html', '<title>', '</title>', '<div class=\"post_time_source\">', '来源: <a id=\"ne_article_source\"', '<div class=\"post_text\" id=\"endText\">', '<div class=\"ep-source cDGray\">', '', '', '来源:', '</a>', '<div class=\"post_crumb\">', '</div>', '', '', '本文版权为网易汽车所有'),
(34, '<span>编辑：', NULL, '</span>', '58车（汽车点评网）', 'https://news.58che.com/*.html', '<title>', '</title>', '<div class=\"a_t l\"><span>', '</span>', '<div class=\"c_tcon clearfix\">', '</div>', '', '', '<span>来源：', '</a>', '_', '</title>', '', '', '类型：<em>原创'),
(35, 'class=\"source ent-source\" rel=\"nofollow\">', NULL, '</a>', '新浪汽车', 'http://auto.sina.com.cn/*', '<title>', '</title>', '<span class=\"date\">', '</span>', '<div class=\"article clearfix\" id=\"artibody\">', '<div class=\"article-bottom clearfix\"  id=\"article-bottom\" >', '', '', '<a href=\"http://auto.sina.com.cn/\" title=\"', '\">', '<div class=\"article-bread fL\" data-sudaclick=\"cnav_breadcrumbs_p\">', '</div>', '', '', 'source ent-source\" rel=\"nofollow\">新浪汽车'),
(36, '作者：', NULL, '</a>', '新车评网', 'www.xincheping.com/*.html', '<title>', '</title>', '&nbsp;&nbsp;', '评论 (<font id=\"cmt_count_callback\">', '<div class=\"de_info\" id=\"zwnr\" style=\"font-size:16px;\">', '</div>', '', '', '<p><a href=\"https://www.xincheping.com/\" target=\"_blank\">', '</a>', '<div class=\"crunav fs12\">', '</div>', '', '', '<div class=\"de_from\">来源：新车评网'),
(37, '作者：', NULL, '</a>', '易车号', 'http://news.bitauto.com/hao/wenzhang/*', '<title>', '</title>', '浏览数：加载中...</span>', '</span>', '<div class=\"article-content motu_cont\" id=\"openimg_articlecontent\">', '</div>', '', '', '<a href=\"http://hao.yiche.com/\" target=\"_blank\">', '</a>', '<span>当前位置：', '</div>', '', '', ''),
(38, '责任编辑：', NULL, '</a>', '爱卡汽车news', 'info.xcar.com.cn/*/news_', '<title>', '</title>', '<span class=\"pub_date\" id=\"pubtime_baidu\" >', '</span>', '<div class=\"artical_player_wrap\" id=\"newsbody\">', '</div>', '', '', '_', '</title>', '当前位置：', '<em>', '', '', '<span class=\"media_name\"  id=\"source_baidu\" ><a href=\"http://www.xcar.com.cn/\" target=\"_blank\" title=\"爱卡汽车\">'),
(39, '责任编辑：', NULL, '</a>', '爱卡汽车newcar', 'newcar.xcar.com.cn/*/news_', '<title>', '</title>', '<span class=\"pub_date\" id=\"pubtime_baidu\" >', '</span>', '<div class=\"artical_player_wrap\" id=\"newsbody\">', '</div>', '', '', '_', '</title>', '当前位置：', '<em>', '', '', '<span class=\"media_name\"  id=\"source_baidu\" ><a href=\"http://www.xcar.com.cn/\" target=\"_blank\" title=\"爱卡汽车\">'),
(40, '责任编辑：', NULL, '</a>', '爱卡汽车drive', 'drive.xcar.com.cn/*/news_', '<title>', '</title>', '<span class=\"pub_date\" id=\"pubtime_baidu\" >', '</span>', '<div class=\"artical_player_wrap\" id=\"newsbody\">', '</div>', '', '', '_', '</title>', '当前位置：', '<em>', '', '', '<span class=\"media_name\"  id=\"source_baidu\" ><a href=\"http://www.xcar.com.cn/\" target=\"_blank\" title=\"爱卡汽车\">'),
(41, '<p class=\"p-n\">', NULL, '</a>', '易车网news', 'news.bitauto.com/*.html', '<title>', '</title>', '<div class=\"t-box\">', '</span>', '<div class=\"article-content motu_cont\" id=\"openimg_articlecontent\">', '</div>', '', '', '_', '</title>', '<span>当前位置：', '</div>', '', '', '<em class=\"bg-ico-sty\">'),
(42, '<div class=\"user_name\">', NULL, '</a>', '易车网baa', 'baa.bitauto.com/*/thread-*.html', '<title>', '</title>', '<span role=\"postTime\">发表于', '</span>', '<div class=\"post_width\">', '<div class=\"new-share-box\">', '<i class=\"pl-num\">', '</i>', '_', '</title>', '_', '</title>', '', '', ''),
(43, 'bosszone=\"jgname\">', NULL, '</span>', '腾讯汽车', 'auto.qq.com/a/*.htm', '<title>', '</title>', 'time\">', '</span>', 'bossZone=\"content\">', '</div>', '', '', '_', '</title>', 'bosszone=\"ztTopic\">', '</a></span>', '', '', '原创报道组'),
(44, 'rel=\"bookmark\" target=\"_blank\">', NULL, '</a>发表', '汽车探索', 'http://www.feelcars.com/*.html', '<title>', '</title>', '发布日期：', '&nbsp;', '<div class=\"single-content\">', '</div>', '', '', '|', '</title>', '<nav class=\"breadcrumb\">', '</nav>', '', '', '本站原创文章'),
(45, '新闻来源：', NULL, '</div>', '汽车商务网', 'http://www.bcar35.com/html/*.html', '<title>', '</title>', '<div class=\"date\">', '新闻来源：', '<div class=\"content\">', '</div>', '', '', '专栏资料，均为', '版权所有', '<div class=\"mnav\">当前位置：', '</div>', '', '', '新闻来源：汽车商务网'),
(46, '<small>来源：', NULL, '</small>', '汽车之友', 'http://www.zzkwzz.com/*.html', '<title>', '</title>', '<small>日期：', '</small>', '<div class=\"wzw\" >', '</div>', '', '', 'Copyright &copy; 2002-2016', '版权所有', '<div class=\"place clearfix\">', '</div>', '', '', '<small>来源：汽车评测'),
(47, '<span class=\"ai-author d\" id=\"author_baidu\">作者：', NULL, '</span>', '凤凰网汽车', 'auto.ifeng.com/*.shtml', '<title>', '</title>', '<span class=\"ai-date d\" id=\"pubtime_baidu\">', '</span>', '<div class=\"arl-c-txt\">', '</div>', '', '', '_', '</title>', '凤凰网汽车</a></h1>', '<div class=\"c-m-i fr\">', '', '', ''),
(48, '作者：', NULL, '</div>', '搜狐汽车老版', 'auto.sohu.com/*.shtml', '<title>', '</title>', '<div class=\"time\">', '</div>', '<div class=\"text clear\" id=\"contentText\" collection=\"Y\">', '<div class=\"editShare clear\">', '', '', '<a target=\"_blank\" href=\"http://auto.sohu.com/\">', '</a>', '<a href=http://auto.sohu.com/>', '</a>', '', '', ''),
(49, '<div class=\"articleTag\">', NULL, '</span>', '汽车之家-车家号', 'chejiahao.autohome.com.cn/info*', '<title>', '</title>', '浏览</span>', '</span>', '<div class=\"article-content example\" id=\"gallery-selector\">', '<div id=\"gallery-pswp\" class=\"pswp\"', '', '', '_', '</title>', '_', '</title>', '', '', ''),
(50, '<span  class=\"postauthor\">', NULL, '</a>', '车神网', 'www.cncheshen.com/*.html', '<title>', '</title>', '<span class=\"postclock\"><i class=\"icon-clock-1\"></i>', '</span>', '<div class=\"post-content\">', '<div class=\"post-options  clearfix\">', '', '', '<a  href=\"http://www.cncheshen.com\" title=\"', '\"', '<span  class=\"postcat\">', '</span>', '', '', ''),
(51, '<div class=\"pageInfo\">', NULL, '</span>', '盖世汽车研究院', 'auto.gasgoo.com/institute/*.html', '<title>', '</title>', '</span><span>', '</span><span>', '<div class=\"keytxt\">', '</div>', '', '', '_研究院_', '</title>', '<li class=\"pitch\"><a href=\"http://auto.gasgoo.com/institute\">', '</a></li>', '', '', '</span><span>盖世汽车研究院</span></div>'),
(52, '<span class=\"scribe\">', NULL, '</span>', '盖世汽车大V说', 'auto.gasgoo.com/a/*.html', '<title>', '</title>', '<span>', '<div class=\"pageTools\">', '<div id=\"ArticleContent\" class=\"contentDetailed02\">', '<p class=\"promptP\">', '', '', '文章为作者个人独立观点，不代表', '官方立场。', '<li class=\"pitch\"><a href=\"http://auto.gasgoo.com/a\" target=\"_blank\">', '</a></li>', '', '', ''),
(53, '<div class=\"ina_author\">', NULL, '/span>', '和讯网独家', 'http://che.hexun.com/news/storys_*.html', '<title>', '</title>', '<span class=\"ina_data\">', '</span>', '<div class=\"ina_news_pic_text\">', '<div id=\"ina_insert_behind\">', '', '', '<a href=\"http://auto.hexun.com\" title=\"和讯网\">', '</a>', '<p>当前位置：', '</p>', '', '', '<span class=\"ina_label\">原创</span>'),
(54, 'class=\"post-author-name\">', NULL, '</a>', '猫扑大杂烩', 'dzh.mop.com/a/*.html', '<title>', '</title>', '发表时间：<span>', '</span>', '<div class=\"detail-article\">', '<div class=\"dzh-detail-ad02\"', '', '', '-猫扑大杂烩', '</title>', '<div class=\"crumbs-wrap clearfix mb15\">', '</div>', '', '', ''),
(55, '<span>作者：', NULL, '</span>', '太平洋汽车网', 'https://www.pcauto.com.cn/*.html', '<title>', '</title>', '<span class=\"pubTime\" id=\"pubtime_baidu\">', '</span>', '<div class=\"artText clearfix\">', '<div class=\"relateArt\" newflag=\"y\">', '', '', '_', '</title>', '_', '</title>', '', '', '<span class=\"tips\">原创'),
(56, '<a class=\"ml5 mr5 black f12\">编辑：', NULL, '</a>', '中国汽车质量网newcars', 'aqsiqauto.com/newcars/*.html', '<title>', '</title>', '<a class=\"ml5 mr5 black f12\">时间：', '</a>', '<a href=\"#commentcot\" class=\"social-share-icon combtn\">评</a>', '<div class=\"col-xs-12 plr_0\">', '', '', '<meta name=\"keywords\" content=\"', '，', '<span class=\"text-muted ml5\">当前位置&nbsp;:</span>', '</h5>', '', '', '<a class=\"ml5 mr5 black f12\">来源：中国汽车质量网'),
(57, '', NULL, '', '中国汽车质量网recall', 'aqsiqauto.com/recall/*.html', '<div class=\"col-xs-12 page-header\">', '</div>', '<title>', '<title>', '<div class=\"col-xs-12 info-contentItem\">', '<div class=\"clear\">', '', '', '<title>', '</title>', '网站首页></span></a>', '</span></a>', '', '', ''),
(58, 'source: \'', NULL, '\',', '今日头条汽车', 'www.toutiao.com/a*/', '<title>', '</title>', 'time: \'', '\'', 'content: \'', 'groupId:', '', '', 'href=//m.', '.com', 'chineseTag: \'', '\',', '', '', 'isOriginal: true,'),
(59, '<span class=\"auther\">', NULL, '</span>', 'ZAKER—汽车频道', 'www.myzaker.com/article/*/', '<title>', '</title>', '<span class=\"time\">', '</span>', '<div class=\"article_content\">', '<div class=\"article_more\">', '', '', '<a href=\"//www.myzaker.com/about.html\" target=\"_blank\">关于', '</a>', '<ol class=\"breadcrumb hidden-phone\">', '<li class=\"active\">', '', '', ''),
(60, '<span class=\"tg\">来源：', NULL, '</span>', '汽车经济网', 'www.autojingji.com/html/kanche/*.html', '<title>', '</title>', '<span class=\"time\">时间：', '</span>', '<div class=\"arc-body mt10 clearfix\">', '<div class=\"end_source\">', '', '', '<a href=\"http://www.autojingji.com/\" target=\"_blank\">', '</a>', '<div class=\"position\">您的位置：', '<span>正文', '', '', '<span class=\"tg\">来源：汽车经济网'),
(61, '作者:</small>', NULL, '<small>', '汽车圈', 'www.qichequan.net/*.html', '<title>', '</title>', '时间:</small>', '<small>', '<div class=\"content\">', '<div class=\"dede_pages\">', '', '', '_', '</title>', '<strong>当前位置:', '</div>', '', '', '来源:</small>汽车圈'),
(62, '<span>来源：', NULL, '</a></span>', '车人网', 'www.che310.com/index*m=content*a=show*', '<title>', '</title>', '分享到腾讯微博\"></a></div>', '</span>', '<div class=\"art_text\">', '</div>', '', '', 'images/logo.jpg\" alt=\"', '，最真实最', '>首页</a> &gt;', '</a> 正文', '', '', '来源：<a href=\'http://www.che310.com\' target=\'_blank\' style=\'color:#AAA\'>车人网</a>');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `content_admin`
--
ALTER TABLE `content_admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `content_admingroup`
--
ALTER TABLE `content_admingroup`
  ADD PRIMARY KEY (`admingroup_id`);

--
-- Indexes for table `content_adminlog`
--
ALTER TABLE `content_adminlog`
  ADD PRIMARY KEY (`adminlog_id`),
  ADD KEY `adminlog_admin` (`adminlog_admin`);

--
-- Indexes for table `content_apicount`
--
ALTER TABLE `content_apicount`
  ADD PRIMARY KEY (`apicount_id`);

--
-- Indexes for table `content_parse_rules`
--
ALTER TABLE `content_parse_rules`
  ADD PRIMARY KEY (`r_id`);

--
-- Indexes for table `content_parse_rulesss`
--
ALTER TABLE `content_parse_rulesss`
  ADD PRIMARY KEY (`r_id`);

--
-- 在导出的表使用AUTO_INCREMENT
--

--
-- 使用表AUTO_INCREMENT `content_admin`
--
ALTER TABLE `content_admin`
  MODIFY `admin_id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- 使用表AUTO_INCREMENT `content_admingroup`
--
ALTER TABLE `content_admingroup`
  MODIFY `admingroup_id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- 使用表AUTO_INCREMENT `content_adminlog`
--
ALTER TABLE `content_adminlog`
  MODIFY `adminlog_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;
--
-- 使用表AUTO_INCREMENT `content_apicount`
--
ALTER TABLE `content_apicount`
  MODIFY `apicount_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- 使用表AUTO_INCREMENT `content_parse_rules`
--
ALTER TABLE `content_parse_rules`
  MODIFY `r_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=86;
--
-- 使用表AUTO_INCREMENT `content_parse_rulesss`
--
ALTER TABLE `content_parse_rulesss`
  MODIFY `r_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
