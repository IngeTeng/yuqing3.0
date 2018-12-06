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
//$collect_download_url = $post_obj['collect_download_url'];
//$collect_download_url = "http://localhost/yuqing/wii_spider/bbs_article/spider_result/be1eec5cde46868db8378b79e707d599";

//$html = file_get_contents($collect_download_url);
$html = $post_obj['collect_download_url'];
$final_result = array();
//$fp = fopen("test.txt","w");
if($myrow['title_b']!=NULL && $myrow['title_e']!=NULL){
    $title_reg = '/'.preg_quote($myrow['title_b'],'/').'(.*?)'.preg_quote($myrow['title_e'],'/').'/s';        // 标题
    preg_match($title_reg, $html, $title_result);
    $my_title = htmlFilter($title_result[1]);
}
else{
    $my_title = NULL;
}
if(substr($my_title,0,3)=="404"){
    $response['status']=404;
}
else{
    if($myrow['author_b']!=NULL&&$myrow['author_e']!=NULL){
        $author_reg = '/'.preg_quote($myrow['author_b'],'/').'(.*?)'.preg_quote($myrow['author_e'],'/').'/s';      // 内容
        preg_match($author_reg, $html, $author_result);
    }
    else{
        $author_result=NULL;
    }
    if($myrow['content_b']!=NULL&&$myrow['content_e']!=NULL){
        $content_reg = '/'.preg_quote($myrow['content_b'],'/').'(.*?)'.preg_quote($myrow['content_e'],'/').'/s';      // 内容
//    fwrite($fp,$content_reg."\n");
        preg_match($content_reg, $html, $content_result);
//    fwrite($fp,$content_result[1]."\n");
    }
    else{
        $content_result=NULL;
    }
    if($myrow['media_b']!=NULL&&$myrow['media_e']!=NULL){
        $media_reg = '/'.preg_quote($myrow['media_b'],'/').'(.*?)'.preg_quote($myrow['media_e'],'/').'/s';        // 标题
        preg_match($media_reg, $html, $media_result);
    }
    else{
        $media_result=NULL;
    }
    if($myrow['channel_b']!=NULL&&$myrow['channel_e']!=NULL){
        $channel_reg = '/'.preg_quote($myrow['channel_b'],'/').'(.*?)'.preg_quote($myrow['channel_e'],'/').'/s';        // 标题
        preg_match($channel_reg, $html, $channel_result);
    }
    else{
        $channel_result=NULL;
    }
    if($myrow['time_b']!=NULL&&$myrow['time_e']!=NULL){
        $time_reg = '/'.preg_quote($myrow['time_b'],'/').'(.*?)'.preg_quote($myrow['time_e'],'/').'/s';        // 标题
        preg_match($time_reg, $html, $time_result);
        $my_time = strtotime(htmlFilter($time_result[1]));
        if($my_time==false){
            $my_time=parseTime($html);
        }
    }
    else{
        $my_time=parseTime($html);
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

    if($myrow['click_b']!=NULL&&$myrow['click_e']!=NULL){
        $click_reg = '/'.preg_quote($myrow['click_b'],'/').'(.*?)'.preg_quote($myrow['click_e'],'/').'/s';        // 标题
        preg_match($click_reg, $html, $click_result);
    }
    else{
        $click_result=NULL;
    }
//转载是1，原创是2
    if($myrow['is_repost']!=NULL){
        $html = mb_convert_encoding($html, "UTF-8", "auto");
        $is_repost_reg = '/'.preg_quote($myrow['is_repost'],'/').'/';
        if(preg_match($is_repost_reg,$html)){
            $is_repost_result = 2;
        }
        else{
            $is_repost_result = 1;
        }
    }
    else{
        $is_repost_result = 1;
    }
}

$final_result = array(
    'url' => '',     // URL
    'title' => $my_title,   // 标题
    'author'=> htmlFilter($author_result[1]),  //作者
    'pubtime' => $my_time,     // 文章发布时间
    'content' => htmlFilter($content_result[1]),     // 正文内容
    'reply_num' =>htmlFilter($comment_result[1]),   //回复数
    'comment_num' => htmlFilter($comment_result[1]),   //评论数
    'click_num' => htmlFilter($click_result[1]),    //点击量
    'forum' => htmlFilter($media_result[1]),   //论坛or媒体名称
    'channel'=>htmlFilter($channel_result[1]),   //所属频道
    'is_repost'=> $is_repost_result    //转载是1，原创是2
);

$response_result = $final_result;
