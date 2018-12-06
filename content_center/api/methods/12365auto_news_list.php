<?php

/**
 * @filename 12365auto.php 
 * @encoding UTF-8 
 * @author WiiPu CzRzChao 
 * @createtime 2016-10-11  23:14:00
 * @updatetime 2016-10-11  23:14:00
 * @version 1.0
 * @Description
 * 
 */


$collect_download_url = $post_obj['collect_download_url'];
//$collect_download_url = "http://localhost/yuqing/wii_spider/news_list/spider_result/3c3650bc9d5eb3dd45845cd58343a456";
$html = file_get_contents($collect_download_url);
$final_result = array();

$main_reg = '/<div class="tslb_b">(.*?)<\/div>/s';

// 最外层匹配
preg_match($main_reg, $html, $main_result);

// 懒惰匹配    
$li_reg = '/<tr><td>(.*?)<\/td><\/tr>/s';

// 第四个参数用于所有结果排序
preg_match_all($li_reg, $main_result[0], $li_result, PREG_SET_ORDER);

foreach($li_result as $value) {
    
    
    // 构建正则表达式
    $url_reg = '/<a href="(.*?)"/s';
    $title_reg = '/target="_blank">(.*?)<\/a>/s';
    $time_reg = '/<td class="tsgztj">[^<]*<\/td><td>(.*?)<\/td><td>/s';

    preg_match($url_reg, $value[0], $url_result);
    preg_match($title_reg, $value[0], $title_result);
    preg_match($time_reg, $value[0], $time_result);
    
    $title = trim(strip_tags($title_result[1]));
    
    $final_result[] = array(
        'url' => $url_result[1],
        'title' => $title,
        'abstract' => $title,
        'from' => '车质网',
        'source'=>1,
        'author' => '',
        'time' => strtotime($time_result[1]),
        'channel' => '车质网',
    );
}

$response_result = $final_result;
file_put_contents('12365-news-list', var_export($final_result, true));