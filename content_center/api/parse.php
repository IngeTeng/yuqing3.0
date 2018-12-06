<?php

/**
 * @filename content_center.php
 * @encoding UTF-8
 * @author WiiPu CzRzChao
 * @datetime 2016-6-2  14:29:17
 * @version 1.0
 * @Description
 *
 */

//require('./config.php');
require ('api_init.php');
require($FILE_PATH. 'api/include/post2sign.php');
require($FILE_PATH. 'api/include/observer.php');
require($FILE_PATH. 'api/include/log.php');

// ini_set('display_errors',1);            //错误信息
// ini_set('display_startup_errors',1);    //php启动错误信息
//error_reporting(-1);                    //打印出所有的 错误信息
// ini_set('error_log', dirname(__FILE__) . '/content_log.txt'); //将出错信息输出到一个文本文件

//echo LOG_HANDLER;

// 初始化log类
$log = Log::Init(LOG_HANDLER, LOG_LEVEL);

if($_SERVER['REQUEST_METHOD'] == "POST") {
    $post_obj = $_POST;
    $post_str = json_encode($post_obj);
    //echo $post_str;
    //echo $post_obj['collect_url'];
}
else {
    $log->WARN('post_str 为空');
    exit('hhhh');
}

// 初始化返回
$response = array(
    'status' => 200,
    'timestamp' => time(),
    'result' => '',
);

// 创建观察者
$subject = new CInterfaceSubject();
$observer = new CInterfaceObserver();
// 将初始化的返回付给观察者
$observer->setResponse($response);
$subject->attach($observer);

$collect_url = $post_obj['collect_url'];

include 'common_parse.php';

//$arr = parse_url($collect_url);
//$preUrl = $arr["host"];
//
//try {
//    $rules = Parse_rule::getInfoByUrl($preUrl);
//} catch (MyException $e) {
//    $log->WARN("404 没有找到对应的解析规则 $post_str");
//    $subject->setStatus(404);
//}
////$fp = fopen("test.txt","w");
//foreach ($rules as $myrow){
//    $site_url = explode('*',$myrow['site_url'],2);
//    $patten='/'.preg_quote($site_url[0], '/').'.*'.preg_quote($site_url[1], '/').'/';
////    fwrite($fp,$patten."\n");
//    if(preg_match($patten,$collect_url)){
//        //echo json_encode($myrow, JSON_UNESCAPED_UNICODE);
//        if($myrow['method']!=NULL){
//            $method_name =$FILE_PATH. 'api/methods/'. $myrow['method'].'.php';
//            if(file_exists($method_name)) {
//                $log->INFO(" 200 成功 $post_str");
//                include ($method_name);
//            }
//            else {
//                include ('./methods/common.php');
////              $log->WARN("404 没有找到对应的解析函数 $post_str");
////              $subject->setStatus(404);
//            }
//        }
//        else{
//            //print (string)$myrow['title_b'];
//            include 'parse_do.php';
//        }
//    }
//}


if(empty($response_result)) {
    $subject->setStatus(501);
}

$response['result'] = $response_result;
// 本地存储的数据
$local_result = json_encode(array_merge($post_obj, $response));
// 返回数据格式化
$json_result = json_encode($response,JSON_UNESCAPED_UNICODE);


echo $json_result;
