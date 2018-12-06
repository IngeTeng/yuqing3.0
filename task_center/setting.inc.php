<?php

/**
 * setting.inc.php
 * 此处定义无需放在数据库中，又可以方便修改和扩展的数据
 *
 * @version			$Id$
 * @createtime		2018/03/01
 * @updatetime		2018/4/17
 * @author          空竹
 * @copyright		Copyright (c) 芝麻开发 (http://www.zhimawork.com)
 */

//管理员分类
$ARRAY_admin_type = array(
	'0' => '普通管理员组',
	'9' => '超级管理员组'
);


/******接口设置***********************/
//暂时注释掉
//向媒体中心的接口

//$media_1 = InterfaceIn::getInfoByType(1);
//$media_list_url = $media_1['addr'];
//
//$media_2 = InterfaceIn::getInfoByType(5);
//$input_site_url = $media_2['addr'];
//
//$media_3 = InterfaceIn::getInfoByType(6);
//$get_task_url = $media_3['addr'];

$pre_media = "http://47.94.0.230/yuqing3.0/media_center/api/api.php";//线上使用
//$pre_media = "http://127.0.0.1:8888/yuqing3.0/media_center/api/api.php";//本地测试
$media_list_url = "external/getSiteInfoById";
$input_site_url = "external/InputSiteInfo";
$get_task_url = "external/getTask";



//爬虫中心的接口

//$spider = InterfaceIn::getInfoByType(2);
//$get_html_url = $spider['addr'];

$pre_spider = "http://47.94.0.230/yuqing3.0/spider_center/api/api.php";
$get_html_url = "query";
//$get_html_url = "http://47.94.0.230/yuqing3.0/spider_center/api/query.php";




//内容解析中心接口

//$content = InterfaceIn::getInfoByType(3);
//$parse_url = $content['addr'];

$pre_content= "http://47.94.0.230/yuqing3.0/content_center/api/api.php";//线上使用
//$pre_content= "http://127.0.0.1:8888/yuqing3.0/content_center/api/api.php";//本地测试
$parse_url = "parse_test";




//前端wen系统接收结果的接口地址

//$api_web_list  = InterfaceIn::searchByType($params,1);

$api_web_list = array(
  "http://47.94.0.230/yuqing_web/api/insert_db.php"
);


?>