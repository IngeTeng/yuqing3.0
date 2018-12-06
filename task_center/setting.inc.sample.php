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

//向媒体中心的接口

$pre_media = "http://127.0.0.1/yuqing3.0/media_center/api/";
$media_list_url = $pre_media."getSiteInfoById.php";
$input_site_url = $pre_media."InputSiteInfo.php";
$get_task_url = $pre_media."getTask.php";



//爬虫中心的接口
$pre_spider= "http://127.0.0.1/yuqing3.0/spider_center/api/";
$get_html_url = $pre_spider."query.php";




//内容解析中心接口
$pre_content= "http://127.0.0.1/yuqing3.0/content_center/api/";
$parse_url = $pre_content."parse_test.php";




//前端wen系统接收结果的接口地址

$api_web_list = array(
    "jianghuai"=>"http://121.40.40.203/yuqing_web/api/insert_db.php",
    "guangfeng"=>"http://47.92.204.34/yuqing_web/api/insert_db.php",

);
?>