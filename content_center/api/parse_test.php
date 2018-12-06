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
require_once ('api_init.php');
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

$collect_url = $post_obj['collect_url'];
//获取请求url的host
$arr = parse_url($collect_url);
$preUrl = $arr["host"];

try {
    //在数据库中检索出所有解析规则的URL中包含该host的记录
    //即找到该host下的所有子模块/频道的解析规则记录
    $rules = Parse_rule::getInfoByUrl($preUrl);
    /**遍历该host下的所有频道的解析规则，构建正则表达式去匹配请求url，
     * 匹配到了就判断method是否为空，不为空，调用method解析，为空就用
     * 数据库里的规则解析，循环完了还找不到就报404错误
     */
    $flag = false;
    foreach ($rules as $myrow){

        //用数据库里的url规则构造匹配正则表达式
        $patten = str2reg($myrow['site_url']);


        if(preg_match($patten,$collect_url)){

            //flag标记找到了对应的解析规则
            $flag = true;

            //如果数据库中配有对应的解析函数，就找解析函数，没有配就用数据库中配的规则解析
            if($myrow['method']!=NULL){
                $method_name =$FILE_PATH. 'api/methods/'. $myrow['method'].'.php';
                //找到解析函数就用该函数解析，找不到就用通用解析
                if(file_exists($method_name)) {
                    $log->INFO(" 200 成功 $post_str");
                    include ($method_name);
                }
                else {
                    include 'common_parse.php';
                }
            }
            else{
                include 'parse_do_test.php';
            }
        }
    }
    //如果该host下的所有频道遍历完了还没找到就报404错误
    if($flag==false){
        include 'common_parse.php';
    //    $log->WARN("404 没有找到对应的解析函数 $post_str");
    //    $subject->setStatus(404);
    }
} catch (MyException $e) {
    include 'common_parse.php';
//    $log->WARN("404 没有找到对应的解析规则 $post_str");
//    $subject->setStatus(404);
}



if(empty($response_result)) {
    $response['status']=501;
}
$response_result['url']=$post_obj['collect_url'];

$response['result'] = $response_result;
// 本地存储的数据
$local_result = json_encode(array_merge($post_obj, $response));
// 返回数据格式化
$json_result = json_encode($response,JSON_UNESCAPED_UNICODE);


echo $json_result;
