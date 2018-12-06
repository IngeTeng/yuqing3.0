<?php
/**
 * 处理媒体链接  parse_rule_interfaceUse_do.php
 *
 * @version		    $Id$
 * @createtime		2018/11/17
 * @updatetime		2018/11/17
 * @author          tengyingzhi
 * @copyright		Copyright (c) 芝麻开发 (http://www.zhimawork.com)
 */
require_once('admin_init.php');
require_once('admincheck.php');

$POWERID = '70010';//权限
Admin::checkAuth($POWERID, $ADMINAUTH);
$act = safeCheck($_GET['act'], 0);
switch($act){
    case 'add'://添加媒体url
        $method         =  safeCheck($_POST['method'],0);
        $post_url       =  $_POST['post_url'];
        $url            =trim($_POST['url']);
        $rule_name      =trim($_POST['rule_name']);
        $click_b        =trim($_POST['click_b']);
        $click_e        =trim($_POST['click_e']);
        $title_b        =trim($_POST['title_b']);
        $title_e        =trim($_POST['title_e']);
        $author_b       =trim($_POST['author_b']);
        $author_e       =trim($_POST['author_e']);
        $content_b      =trim($_POST['content_b']);
        $content_e      =trim($_POST['content_e']);
        $time_b         =trim($_POST['pubtime_b']);
        $time_e         =trim($_POST['pubtime_e']);
        $media_b        =trim($_POST['media_b']);
        $media_e        =trim($_POST['media_e']);
        $channel_b      =trim($_POST['channel_b']);
        $channel_e      =trim($_POST['channel_e']);
        $comment_b      =trim($_POST['comment_b']);
        $comment_e      =trim($_POST['comment_e']);
        $is_repost      =trim($_POST['is_repost']);
        //构造需要传递的数组参数
        $ruleAttr = array(
            'post_url'=>$post_url,
            'method'=>$method,
            'url'=>$url,
            'rule_name'=>$rule_name,
            'click_b'=>$click_b,
            'click_e'=>$click_e,
            'title_b'=>$title_b,
            'title_e'=>$title_e,
            'author_b'=>$author_b,
            'author_e'=>$author_e,
            'content_b'=>$content_b,
            'content_e'=>$content_e,
            'pubtime_b'=>$time_b,
            'pubtime_e'=>$time_e,
            'media_b'=>$media_b,
            'media_e'=>$media_e,
            'channel_b'=>$channel_b,
            'channel_e'=>$channel_e,
            'comment_b'=>$comment_b,
            'comment_e'=>$comment_e,
            'is_repost'=>$is_repost
        );

        try {
            $rs = Interfaceuse::add($ruleAttr);
            echo $rs;
        }catch (MyException $e){
            echo $e->jsonMsg();
        }
        break;

    case 'edit'://编辑媒体信息
        $id     		=  safeCheck($_POST['id']);
        $method         =  $_POST['method'];
        $post_url       =  $_POST['post_url'];
        $url            =   $_POST['url'];
        $rule_name      =   $_POST['rule_name'];
        $click_b        =   $_POST['click_b'];
        $click_e        =   $_POST['click_e'];
        $title_b        =   $_POST['title_b'];
        $title_e        =   $_POST['title_e'];
        $author_b       =   $_POST['author_b'];
        $author_e       =   $_POST['author_e'];
        $content_b      =   $_POST['content_b'];
        $content_e      =   $_POST['content_e'];
        $time_b         =   $_POST['pubtime_b'];
        $time_e         =   $_POST['pubtime_e'];
        $media_b        =   $_POST['media_b'];
        $media_e        =   $_POST['media_e'];
        $channel_b      =   $_POST['channel_b'];
        $channel_e      =   $_POST['channel_e'];
        $comment_b      =   $_POST['comment_b'];
        $comment_e      =   $_POST['comment_e'];
        $is_repost      =   $_POST['is_repost'];

        $ruleAttr = array(
            'id'      => $id,
            'post_url'=>$post_url,
            'method'=>$method,
            'url'=>$url,
            'rule_name'=>$rule_name,
            'click_b'=>$click_b,
            'click_e'=>$click_e,
            'title_b'=>$title_b,
            'title_e'=>$title_e,
            'author_b'=>$author_b,
            'author_e'=>$author_e,
            'content_b'=>$content_b,
            'content_e'=>$content_e,
            'pubtime_b'=>$time_b,
            'pubtime_e'=>$time_e,
            'media_b'=>$media_b,
            'media_e'=>$media_e,
            'channel_b'=>$channel_b,
            'channel_e'=>$channel_e,
            'comment_b'=>$comment_b,
            'comment_e'=>$comment_e,
            'is_repost'=>$is_repost
        );
        //var_dump($ruleAttr);
        try {

            $rs = Interfaceuse::edit($ruleAttr);
            echo $rs;
        }catch (MyException $e){
            echo $e->jsonMsg();
        }
        break;

    case 'del'://删除媒体
        $id             = safeCheck($_POST['id']);
        $table_name     = safeCheck($_POST['table_name'],0);
        $post_url       = $_POST['post_url'];
        $method         = safeCheck($_POST['method'],0);

        $ruleAttr = array(

            'id'            => $id,
            'table_name'    => $table_name,
            'post_url'      => $post_url,
            'method'        => $method

        );

        try {
            $rs = Interfaceuse::del($ruleAttr);
            echo $rs;
        }catch (MyException $e){
            echo $e->jsonMsg();
        }
        break;


}
?>