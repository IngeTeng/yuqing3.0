<?php
require('api_init.php');
$method     = safeCheck($_POST['method'],0);
//var_dump($method);
$api = New API($method);//参数1是接口编号，每个API应不一样
//$api->checkIP();//检查调用是否来自IP白名单
$sign      = safeCheck($_POST['sign'], 0);//校验码
$timestamp     = safeCheck($_POST['timestamp'],0);//来源
$token = "yuqing3.0";
$sign_raw = md5($method.$timestamp.$token);
if($sign_raw != $sign) $api->ApiError('002', '校验不通过!');
////设置API来源
//$api->setsource($source);
//if(!in_array($source, array_keys($Array_API_Source)))  $api->ApiError('002', '来源错误');
////业务处理---------------
//
//try{
//    //sign::checkSign($sign);
//    if(isset($_POST["token"])&&!empty($_POST["token"]))
//    {
//        $uid = token::checkToken($_POST["token"]);
//    }
//
//}catch (MyException $e)
//{
//    $api->ApiError($e->getCode(), $e->getMessage());
//}

require_once($method.".php");

?>