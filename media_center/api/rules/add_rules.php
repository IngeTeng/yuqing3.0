<?php
/**
 * add_rules.php 添加规则信息
 *
 * @version       v0.01
 * @create time   2017/7/8
 * @update time   2018/11/12
 * @author        tengyingzhi
 * @copyright     Copyright (c) 微普科技 WiiPu Tech Inc. (http://www.wiipu.com)
 */

//获取参数 name,shownnum

$example =  safeCheck($_POST['example'],0);
$url =  safeCheck($_POST['url'],0);
$tag =  safeCheck($_POST['tag']);
$siteid =  safeCheck($_POST['siteid']);
$is_param =  safeCheck($_POST['is_param']);

$RulesAttr = array(
    'example' => $example,
    'url' => $url,
    'type' => $tag,
    'siteid'   => $siteid,
    'is_param' => $is_param

);

try {

    $pregUrl = pregQuote($url);

    $flag = preg_match($pregUrl,$example);

    if(!$flag) throw new MyException("匹配规则不能正确匹配示例网址",101);

    $rs = Rules::add_msg($RulesAttr);
    //var_dump($rs);
    echo $rs;
    //echo action_msg_data(api::SUCCESS_MSG,api::SUCCESS);
    //检查手机验证码


}catch (MyException $e){
    $api->ApiError($e->getCode(), $e->getMessage());
}

?>