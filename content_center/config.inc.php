<?php

/**
 * config.inc.php 基础配置文件
 *
 * @version		    $Id$
 * @createtime		2018/03/01
 * @updatetime		2018/10/30
 * @author          空竹,zhfang
 * @copyright		Copyright (c) 芝麻开发 (http://www.zhimawork.com)
 */

//基础设置=================================================
error_reporting(0);                          //网站开发时，务必关闭此项；网站上线时，务必打开此项。
define("ZHIMAPHP_VERSION", '4.0');          //ZhimaPHP版本号（）
define("ZHIMAPHP_UPDATE",  '20180817');        //ZhimaPHP更新日期
header("content-type:text/html;charset=utf-8");
date_default_timezone_set('PRC');              //时区设置，服务器放置在国外的需要打开此项
session_start();
//ob_start();
define("PROJECTCODE",    'content_center1.0');          //项目编号，建议修改，每个项目应该不同

$HTTP_PATH = 'http://127.0.0.1/';     //网站访问路径，根据实际情况修改，务必以“/”结尾。--线上使用
//$HTTP_PATH = 'http://127.0.0.1:8888/';     //网站访问路径，根据实际情况修改，务必以“/”结尾。--本地测试

//数据库连接参数设置=======================================
$DB_host   = '127.0.0.1';                      //数据库地址  不要使用localhost
$DB_user   = 'root';                           //数据库用户
$DB_pass   = 'zhima888123!@#';                          //数据库用户密码--线上使用
//$DB_pass   = 'root';                           //数据库用户密码---本地测试
$DB_name   = 'content';                       //数据库名称
$DB_prefix = 'content_';                      //表前缀，可以为空


/*********以下配置一般不用修改***********/
//路径定义=================================================
$FILE_PATH = str_replace('\\','/',dirname(__FILE__)).'/'; //网站根目录路径
$LIB_PATH        = $FILE_PATH.'lib/';
$LIB_COMMON_PATH = $LIB_PATH.'common/';
$LIB_TABLE_PATH  = $LIB_PATH.'table/';

$API_LIB_PATH        = $FILE_PATH.'api/lib/';
$API_LIB_TABLE_PATH        = $FILE_PATH.'api/lib/table/';

//日志文件路径==============================================
//请给以下日志文件设置写权限
$LOG_PATH   = $FILE_PATH.'logs/';
$LOG_config = array(
    'common'      => $LOG_PATH.'common.log',
    'debug'       => $LOG_PATH.'debug.log'
);

//管理员Cookie 和 Session===================================
$cookie_ADMINID      = PROJECTCODE.'ACID';
$cookie_ADMINCODE    = PROJECTCODE.'ACCODE';
$session_ADMINID     = PROJECTCODE.'ASID';

//日志参数设置=======================================
define("LOG_LEVEL", 15);// log级别配置
define("LOG_HANDLER", $FILE_PATH. 'logs/'. date('Y_m_d'));// 日志保存路径
define('SAVE_RESULT', 0);// 是否保存结果, 1为保存, 0不保存
if(SAVE_RESULT == 1) {// result保存路径
    define("RESULT_PATH", $FILE_PATH. '/result');
}
define("SECRET", "secret=3723905834958739587349857938292");// secret配置

// 错误报告等级
//error_reporting(E_ALL);
//ini_set('display_errors', 1);

// 正则表达式的配置
ini_set('pcre.backtrack_limit', 999999999);
ini_set('pcre.recursion_limit', 999999);
ini_set('memory_limit', '64M');

?>