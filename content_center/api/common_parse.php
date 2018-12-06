<?php
/**
 * Created by PhpStorm.
 * User: ZeroFang
 * Date: 2018/11/8
 * Time: 23:09
 */
require 'include/vendor/autoload.php';
use andreskrey\Readability\Readability;
use andreskrey\Readability\Configuration;

$readability = new Readability(new Configuration());

//$html = file_get_contents($post_obj['collect_url']);

$html=$post_obj['collect_download_url'];

try {
    $readability->parse($html);
    $my_title = $readability->getTitle();
    if(substr($my_title,0,3)=="404"){
        $response['status']=404;
    }
    else{
        $my_author = $readability->getAuthor();
        $my_content = $readability->getContent();
        $my_time = parseTime($html);
        $my_forum = preg_split('/(\-|\_|\|)/s',$my_title);
        $my_channel = preg_split('/(\-|\_|\|)/',$my_title,2);
        //转载是1，原创是2
        $html = mb_convert_encoding($html, "UTF-8", "auto");
        if(preg_match('/<(.*?)原创(.*?)>/',$my_title)||preg_match('/<(.*?)原创(.*?)>/',$my_content)||preg_match('/<(.*?)原创(.*?)>/',$html)){
            $is_repost = 2;
        }
        else{
            $is_repost = 1;
        }
    }
} catch (\andreskrey\Readability\ParseException $e) {
    $response['status']=502;
    //echo $e->getMessage();
}

$final_result = array(
    'url' => '',     // URL
    'title' => htmlFilter($my_title),   // 标题
    'author'=> htmlFilter($my_author),  //作者
    'pubtime' => $my_time,     // 文章发布时间
    'content' => htmlFilter($my_content),     // 正文内容
    'reply_num' => '',   //回复数
    'comment_num' => '',   //评论数
    'click_num' => '',    //点击量
    'forum' => htmlFilter(end($my_forum)),   //论坛or媒体名称
    'channel'=> htmlFilter($my_channel[1]),   //所属频道
    'is_repost'=> $is_repost    //转载是1，原创是2
);
$response_result = $final_result;