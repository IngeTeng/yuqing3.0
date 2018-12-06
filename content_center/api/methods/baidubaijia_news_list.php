<?php

/**
 * @filename baidubaijia_news_list.php 
 * @encoding UTF-8 
 * @author WiiPu CzRzChao 
 * @createtime 2016-8-23  16:41:13
 * @updatetime 2016-8-23  16:41:13
 * @version 1.0
 * @Description
 * 百度百家解析
 * 
 */

$collect_download_url = $post_obj['collect_download_url'];
//$collect_download_url = "http://localhost/yuqing2/wii_spider/news_list/spider_result/0dfe6530b5eddb679e36c97839479016";

$html = file_get_contents($collect_download_url);

$main_reg = '/<div class="feeds" id="feeds">(.*)<div class="rendermore" id="rendermore">/s';

// 最外层匹配
preg_match($main_reg, $html, $main_result);
//print_r($main_result);

$final_result = array();

$li_reg = '/<div class="feeds-item(.*?)<\/div>/s';

// 第四个参数用于所有结果排序
preg_match_all($li_reg, $main_result[0], $li_result, PREG_SET_ORDER);
foreach($li_result as $value) {

    // 构建正则表达式
    $url_reg = '/<a href="(.*?)"/s';
    $title_reg = '/<h3>(.*?)<\/h3>/s';
    $abstract_reg = '/<p class="feeds-item-text1">(.*?)<\/p>/s';
    $from_reg = '/<\/p>\s+<a[^>]+>(.*?)<\/a>/s';
    $time_reg = '/<span class="tm">(.*?)<\/span>/s';

    preg_match($url_reg, $value[0], $url_result);
    preg_match($title_reg, $value[0], $title_result);
    preg_match($abstract_reg, $value[0], $abstract_result);
    preg_match($from_reg, $value[0], $from_result);
    preg_match($time_reg, $value[0], $time_result);
    
    // 处理时间
    if(strpos($time_result[1], ':')) {      // 当日文章
        $time_str = date('Y-m-d '). $time_result[1];
    }
    else {
        $time_str = date('Y-').  $time_result[1]. date('H:i:s');
    }
    $time = strtotime($time_str);

    $final_result[] = array(
        'url' => $url_result[1],
        'title' => trim(strip_tags($title_result[1])),
        'abstract' => trim(strip_tags($abstract_result[1])),
        'from' => $from_result[1],
        'time' => $time,
        'source'=>1,
        'author' =>$from_result[1],
        'channel' => '百度百家',
    );
}
//print_r($final_result);
$response_result = $final_result;
file_put_contents('baidubaijia-news_list', var_export($final_result, true));