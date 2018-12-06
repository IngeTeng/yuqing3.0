<?php
/**
 * 提取规则配置数据库操作
 * @version		    $Id$
 * @createtime		2018/11/2
 * @updatetime		2018/11/2
 * @author          zhfang
 * @copyright		Copyright (c) 芝麻开发 (http://www.zhimawork.com)
 */
require_once('../init.php');
$op = $_GET["op"];
$time = time();
switch($op){
	case 'add':
		$url=trim($_POST['url']);
        $rule_name=trim($_POST['rule_name']);
        $click_b=trim($_POST['click_b']);
        $click_e=trim($_POST['click_e']);
        $title_b=trim($_POST['title_b']);
        $title_e=trim($_POST['title_e']);
        $author_b=trim($_POST['author_b']);
        $author_e=trim($_POST['author_e']);
        $content_b=trim($_POST['content_b']);
        $content_e=trim($_POST['content_e']);
        $time_b=trim($_POST['pubtime_b']);
        $time_e=trim($_POST['pubtime_e']);
        $media_b=trim($_POST['media_b']);
        $media_e=trim($_POST['media_e']);
        $channel_b=trim($_POST['channel_b']);
        $channel_e=trim($_POST['channel_e']);
        $comment_b=trim($_POST['comment_b']);
        $comment_e=trim($_POST['comment_e']);
        $is_repost=trim($_POST['is_repost']);

        $ruleAttr = array(
            'site_url'=>$url,
            'rule_name'=>$rule_name,
            'click_b'=>$click_b,
            'click_e'=>$click_e,
            'title_b'=>$title_b,
            'title_e'=>$title_e,
            'author_b'=>$author_b,
            'author_e'=>$author_e,
            'content_b'=>$content_b,
            'content_e'=>$content_e,
            'time_b'=>$time_b,
            'time_e'=>$time_e,
            'media_b'=>$media_b,
            'media_e'=>$media_e,
            'channel_b'=>$channel_b,
            'channel_e'=>$channel_e,
            'comment_b'=>$comment_b,
            'comment_e'=>$comment_e,
            'is_repost'=>$is_repost
        );

        try {
            $rs = Parse_rule::add($ruleAttr);
            echo $rs;
        }catch (MyException $e){
            echo $e->jsonMsg();
        }
	break;
        
    case 'del':
        $r_id=trim($_POST['r_id']);
        try {
            $rs = Parse_rule::del($r_id);
            echo $rs;
        }catch (MyException $e){
            echo $e->jsonMsg();
        }
    break;
    
    case 'edit':
        $r_id=trim($_POST['r_id']);

        $url=trim($_POST['url']);
        $rule_name=trim($_POST['rule_name']);
        $click_b=trim($_POST['click_b']);
        $click_e=trim($_POST['click_e']);
        $title_b=trim($_POST['title_b']);
        $title_e=trim($_POST['title_e']);
        $author_b=trim($_POST['author_b']);
        $author_e=trim($_POST['author_e']);
        $content_b=trim($_POST['content_b']);
        $content_e=trim($_POST['content_e']);
        $time_b=trim($_POST['pubtime_b']);
        $time_e=trim($_POST['pubtime_e']);
        $media_b=trim($_POST['media_b']);
        $media_e=trim($_POST['media_e']);
        $channel_b=trim($_POST['channel_b']);
        $channel_e=trim($_POST['channel_e']);
        $comment_b=trim($_POST['comment_b']);
        $comment_e=trim($_POST['comment_e']);
        $is_repost=trim($_POST['is_repost']);

        $ruleAttr = array(
            'site_url'=>$url,
            'rule_name'=>$rule_name,
            'click_b'=>$click_b,
            'click_e'=>$click_e,
            'title_b'=>$title_b,
            'title_e'=>$title_e,
            'author_b'=>$author_b,
            'author_e'=>$author_e,
            'content_b'=>$content_b,
            'content_e'=>$content_e,
            'time_b'=>$time_b,
            'time_e'=>$time_e,
            'media_b'=>$media_b,
            'media_e'=>$media_e,
            'channel_b'=>$channel_b,
            'channel_e'=>$channel_e,
            'comment_b'=>$comment_b,
            'comment_e'=>$comment_e,
            'is_repost'=>$is_repost
        );

        try {
            $rs = Parse_rule::edit($r_id,$ruleAttr);
            echo $rs;
        }catch (MyException $e){
            echo $e->jsonMsg();
        }
    break;
}

?>