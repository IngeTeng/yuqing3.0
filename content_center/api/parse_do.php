<?php

/**
 * @filename bbs_article.php 
 * @encoding UTF-8 
 * @author WiiPu CzRzChao 
 * @createtime 2016-7-31  19:28:54
 * @updatetime 2016-7-31  19:28:54
 * @version 1.0
 * @Description
 * 文章内容解析
 * 
 */

// 获取缓存好的html
$collect_download_url = $post_obj['collect_download_url'];
//$collect_download_url = "http://localhost/yuqing/wii_spider/bbs_article/spider_result/be1eec5cde46868db8378b79e707d599";

$html = file_get_contents($collect_download_url);
$final_result = array();
//$fp = fopen("test.txt","w");
if($myrow['title_b']!=NULL && $myrow['title_e']!=NULL){
    $title_reg = '/'.preg_quote($myrow['title_b'],'/').'(.*?)'.preg_quote($myrow['title_e'],'/').'/s';        // 标题
    preg_match($title_reg, $html, $title_result);
}
else{
    $title_result=NULL;
}
if($myrow['author_b']!=NULL&&$myrow['author_e']!=NULL){
    $author_reg = '/'.preg_quote($myrow['author_b'],'/').'(.*?)'.preg_quote($myrow['author_e'],'/').'/s';      // 内容
    //fwrite($fp,$author_reg."\n");
    preg_match($author_reg, $html, $author_result);
}
else{
    $author_result=NULL;
}
if($myrow['content_b']!=NULL&&$myrow['content_e']!=NULL){
    $content_reg = '/'.preg_quote($myrow['content_b'],'/').'(.*?)'.preg_quote($myrow['content_e'],'/').'/s';      // 内容
//    fwrite($fp,$content_reg."\n");
    preg_match($content_reg, $html, $content_result);
}
else{
    $content_result=NULL;
}
if($myrow['media_b']!=NULL&&$myrow['media_e']!=NULL){
    $media_reg = '/'.preg_quote($myrow['media_b'],'/').'(.*?)'.preg_quote($myrow['media_e'],'/').'/s';        // 标题
//    fwrite($fp,$media_reg."\n");
    preg_match($media_reg, $html, $media_result);
}
else{
    $media_result=NULL;
}
if($myrow['channel_b']!=NULL&&$myrow['channel_e']!=NULL){
    $channel_reg = '/'.preg_quote($myrow['channel_b'],'/').'(.*?)'.preg_quote($myrow['channel_e'],'/').'/s';        // 标题
//    fwrite($fp,$channel_reg."\n");
    preg_match($channel_reg, $html, $channel_result);
}
else{
    $channel_result=NULL;
}
if($myrow['time_b']!=NULL&&$myrow['time_e']!=NULL){
    $time_reg = '/'.preg_quote($myrow['time_b'],'/').'(.*?)'.preg_quote($myrow['time_e'],'/').'/s';        // 标题
    preg_match($time_reg, $html, $time_result);
}
else{
    $time_result=NULL;
}
if($myrow['comment_b']!=NULL&&$myrow['comment_e']!=NULL){
    $comment_reg = '/'.preg_quote($myrow['comment_b'],'/').'(.*?)'.preg_quote($myrow['comment_e'],'/').'/s';        // 标题
    preg_match($comment_reg, $html, $comment_result);
}
else{
    $comment_result=NULL;
}
if($myrow['click_b']!=NULL&&$myrow['click_e']!=NULL){
    $click_reg = '/'.preg_quote($myrow['click_b'],'/').'(.*?)'.preg_quote($myrow['click_e'],'/').'/s';        // 标题
    preg_match($click_reg, $html, $click_result);
}
else{
    $click_result=NULL;
}

$final_result = array(
    'url' => $post_obj['collect_url'],     // bbsURL
    'title' => trim(strip_tags($title_result[1])),        // 删除标签
    'author'=> trim(strip_tags($author_result[1])),
    'pubtime' => strtotime(trim(strip_tags($time_result[1]))),     // 文章发布时间
    'content' => preg_replace("/[\s]{2,}/",'',trim(strip_tags($content_result[1]))),     // 删除标签和前后空格
    'reply_num' => $comment_result[1],
    'comment_num' => $comment_result[1],
    'click_num' => $click_result[1],
    'forum' => strip_tags($media_result[1]),
    'channel'=> preg_replace("/[\s]{2,}/",'',trim(strip_tags($channel_result[1])))
);

$response_result = $final_result;
