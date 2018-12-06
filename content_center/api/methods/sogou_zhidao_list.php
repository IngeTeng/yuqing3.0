<?php

/**
 * @filename sougou_zhidao_article.php 
 * @encoding UTF-8 
 * @author WiiPu CzRzChao 
 * @createtime 2016-8-4  17:23:40
 * @updatetime 2016-8-4  17:23:40
 * @version 1.0
 * @Description
 * 搜狗问问解析
 * 
 */

// 获取缓存好的html
$collect_download_url = $post_obj['collect_download_url'];
//$collect_download_url = "http://localhost/yuqing/wii_spider/zhidao_article/spider_result/bc3c9aa4f410272446eefa90ad3e3a5c";

$html = file_get_contents($collect_download_url);
$final_result = array();

$main_reg = '/<div class="main">(.*)<\/div>/s';
preg_match($main_reg, $html, $main_result);

$li_reg = '/<div class="result-item">(.*?)<\/div><\/div>/s';
preg_match_all($li_reg, $main_result[0], $li_result, PREG_SET_ORDER);

foreach($li_result as $li) {
    $url_reg = '/<a href="(.*?)"/s';                
    $title_reg = '/level="4">(.*?)<\/a>/s';        // 标题
    $summary_reg = '/<div class="result-summary">(.*?)<\/div>/s';      // 内容
    $time_reg = '/<\/span>\s+(.*?)\s+<i class="dot-div">/s';     // 发布时间

    preg_match($url_reg, $li[0], $url_result);
    preg_match($title_reg, $li[0], $title_result);
    preg_match($summary_reg, $li[0], $summary_result);
    preg_match($time_reg, $li[0], $time_result);

    $final_result[] = array(
        'url' => 'http://wenwen.qq.com'. $url_result[1],     // url处理
        'title' => trim(strip_tags($title_result[1])),        // 删除标签
        'time' => strtotime($time_result[1]),
        'summary' => trim(strip_tags($summary_result[1])),         // 删除标签和前后空格
        'author' => '',
        'source'=>1,
        'media' => '搜狗问问',
    );
}
//print_r($final_result);
$response_result = $final_result;