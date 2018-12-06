<?php

/**
 * cookie 获取  & proxy 维护
 */
require("../init.php");
while(true){
    Cookie::generateSogouCookie();
    
    $proxy = new Proxy;
    $proxy->updateProxy(10);

    sleep(60*60*6);//6小时更新一次
}