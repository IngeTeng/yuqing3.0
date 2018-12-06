<?php
/**
 * add_site.php 获得站点信息
 *
 * @version       v0.01
 * @create time   2017/7/8
 * @update time   2018/11/09
 * @author        tengyingzhi
 * @copyright     Copyright (c) 微普科技 WiiPu Tech Inc. (http://www.wiipu.com)
 */

//获取参数 name,shownnum

$name =  safeCheck($_POST['name'],0);
$depth =  safeCheck($_POST['depth']);
$interval =  safeCheck($_POST['interval']);
$status =  safeCheck($_POST['status']);
$start_url =  safeCheck($_POST['start_url'],0);
$source =  safeCheck($_POST['source']);

$SiteAttr = array(
    'name' => $name,
    'depth' => $depth,
    'interval' => $interval,
    'status'   => $status,
    'start_url' => $start_url,
    'source' => $source,

);

try {

    $rs = Site::add($SiteAttr);
    //var_dump($rs);
    echo $rs;
    //echo action_msg_data(api::SUCCESS_MSG,api::SUCCESS);
    //检查手机验证码


}catch (MyException $e){
    $api->ApiError($e->getCode(), $e->getMessage());
}

?>