<?php
/**
 * add_parse_rule.php 添加规则信息
 *
 * @version       v0.01
 * @create time   2017/7/8
 * @update time   2018/11/09
 * @author        tengyingzhi
 * @copyright     Copyright (c) 微普科技 WiiPu Tech Inc. (http://www.wiipu.com)
 */

//获取参数 name,shownnum

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
    //echo action_msg_data(api::SUCCESS_MSG,api::SUCCESS);
    //检查手机验证码


}catch (MyException $e){
    $api->ApiError($e->getCode(), $e->getMessage());
}

?>