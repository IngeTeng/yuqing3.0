<?php
//require("../init.php");
/**
 * 获取请求参数
 */
// $sitesall=file_get_contents("php://input");
// $sitesall=json_decode($sitesall);
// $sites=$sitesall->site_url;

/**暂不使用代理*/
//Curl::get_html_multi($sites);

$url=htmlspecialchars_decode(safeCheck($_POST['url'],0));


if(Config::matchDomain($url)){
    $proxy = new Proxy;
    $sproxy = $proxy->proxy;
    $sport = $proxy->port;
  //print "use :".$sproxy.":".$sport;
    $data = Curl::get_html($url,'',$sproxy,$sport);
   
    while($data){
           // print "无效代理";
            $proxy = new Proxy;
            $sproxy = $proxy->proxy;
            $sport = $proxy->port;
           // print "use :".$sproxy.":".$sport;
            $data = Curl::get_html($url,'',$sproxy,$sport);
      
    }


}else 
{

    $data =Curl::get_html($url);

}
print_r($data);