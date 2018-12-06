<?php
    require("../init.php");

/**
 * 
 * 没用的
 */

$i=0;
//$proxyurl="http://webapi.http.zhimacangku.com/getip?num=20&type=1&pro=&city=0&yys=0&port=1&pack=34796&ts=0&ys=0&cs=0&lb=1&sb=0&pb=4&mr=1&regions=";
//$proxy = Curl::get($proxyurl);
//$proxya=explode("\n" ,$proxy);
//var_dump($proxya);
//unset($proxya[20]);
//file_put_contents("../proxy/zm_proxy",serialize($proxya));
$k=0;
while(true){
      $word = 'abcdefghijklmnopqrstuvwxyz';
      $num = rand(0,25);
//    $url="https://www.so.com/s?ie=utf-8&fr=none&src=360sou_newhome&q=".$word[$num];
    $url="https://weixin.sogou.com/weixin?type=2&query=".$word[$num]."&ie=utf8&s_from=input&_sug_=n&_sug_type_=";
  //  $url ="https://s.weibo.com/weibo?q=". $word[$num]."&Refer=index";
  
  //$url="http://www.chinaso.com/search/pagesearch.htm?q=".$word[$num];
   // $url="http://sou.autohome.com.cn/zonghe?q=".$word[$num]."&pvareaid=100834&entry=42";
  // $url="https://www.toutiao.com/search/?keyword=".$word[$num];
  //$serch=$word[$num];
  //$url = "http://www.yidianzixun.com/channel/w/$serch?searchword=$serch";
  //$res=Curl::get_html($url);
//
//    $i+=2;
//    file_put_contents("../results/".$i.".html",$res);
//    sleep(3);
//}
$proxy_list = file_get_contents("../proxy/zm_proxy");
$proxy_list=unserialize($proxy_list);
if(Config::matchDomain($url)){
    //print "use :".$sproxy.":".$sport;
    //$data = Curl::get_html($url);
   // $preg='/<span class="s1">(.*?)<\/span>/s';
   // preg_match($preg,$data,$res);
  //  if(strpos($res[1],'您的访问出错了')!==false || $data==''){
        $num = rand(0,19);
     //   foreach ($proxy_list as $proxy){
        $proxy=$proxy_list[$num];
            print "use:".$proxy;
            $data = Curl::get_html($url,'',$proxy);
            $preg='/<span class="s1">(.*?)<\/span>/s';
            preg_match($preg,$data,$res);
            if(count($res) !== 0){
                if(strpos($res[1],'您的访问出错了')!==false || $data==''){
                    print "无效代理"."\n";
                    //  unset($proxy_list[$k]);
                    $k++;
                    continue;
                }else{
                    break;
                }
            }



}else
{
    $data =Curl::get_html($url);
}
  //  $proxy_list=array_values($proxy_list);
   // file_put_contents("../proxy/zm_proxy",serialize($proxy_list));
   // print "已更新zm_proxy";
//print_r($data);
$i+=5;
file_put_contents("../results/".$i."_".time().".html",$data);
sleep(5);
}