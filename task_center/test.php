<?php
/**
 * Created by PhpStorm.
 * User: IngeTeng
 * Date: 2018/11/19
 * Time: 下午1:28
 */
$method = "query";
$timestamp = time();
echo $timestamp;
echo '</br>';
$token = "yuqing3.0";
$sign = md5($method.$timestamp.$token);
echo $sign;