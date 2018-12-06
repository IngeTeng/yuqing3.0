<?php
require("../init.php");
/**
 * 获取请求参数
 */
// $sitesall=file_get_contents("php://input");
// $sitesall=json_decode($sitesall);
// $sites=$sitesall->site_url;

/**暂不使用代理*/
//Curl::get_html_multi($sites);

//$url=htmlspecialchars_decode(safeCheck($_POST['url'],0));
$surl = getopt('u:');
$url = $surl['u'];
//Proxy::saveZMproxy("http://webapi.http.zhimacangku.com/getip?num=20&type=1&pro=&city=0&yys=0&port=1&pack=34796&ts=0&ys=0&cs=0&lb=1&sb=0&pb=4&mr=1&regions=");
if(Config::matchDomain($url)=="sogou.com"){
   // echo "sogou"."\n";
     $re =getSogouWithProxy($url);
     echo $re;
}
