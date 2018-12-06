<?php
require('api_init.php');
$method     = safeCheck($_POST['method'],0);

$api = New API($method);//参数1是接口编号，每个API应不一样
//$api->checkIP();//检查调用是否来自IP白名单
$sign      = safeCheck($_POST['sign'], 0);//校验码
$timestamp     = safeCheck($_POST['timestamp'],0);//来源
//$timestamp     = "11111111";//来源
$token = "yuqing3.0";
$sign_raw = md5($method.$timestamp.$token);
if($sign_raw != $sign) $api->ApiError('002', '校验不通过!');

//echo "here";
require_once($method.".php");

?>