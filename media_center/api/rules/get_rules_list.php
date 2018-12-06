<?php
/**
 * get_rules_list.php 获得规则信息
 *
 * @version       v0.01
 * @create time   2017/7/8
 * @update time   2018/11/12
 * @author        tengyingzhi
 * @copyright     Copyright (c) 微普科技 WiiPu Tech Inc. (http://www.wiipu.com)
 */

//获取参数 name,shownnum

$params = array();

$siteId  = safeCheck($_POST['siteid']);
$type  = safeCheck($_POST['type']);
try {
    $res['rules'] = array();
    $rows = Rules::getListByType($siteId,$type);

    foreach ($rows as $row)
    {
        $is_param = Rules::getParam($row['is_param']);
        $row['is_param_name'] = $is_param;
        $res['rules'][] = $row;
    }
    echo action_msg_data(api::SUCCESS_MSG,api::SUCCESS,$res);
    //检查手机验证码

}catch (MyException $e){
    $api->ApiError($e->getCode(), $e->getMessage());
}

?>