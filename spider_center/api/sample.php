<?php
    require("../init.php");
     $surl = getopt('u:k:t:');
     $url = $surl['u'];
     $keyword=$surl['k'];
    $time=$surl['t'];
    if(Config::matchDomain($url)){
        $proxy = new Proxy;
        $sproxy = $proxy->proxy;
        $sport = $proxy->port;
      //  print "use :".$sproxy.":".$sport;
        $data = Curl::get_html($url,'',$sproxy,$sport);
       
        while(empty($data)){
               // print "无效代理";
                $proxy = new Proxy;
                $sproxy = $proxy->proxy;
                $sport = $proxy->port;
               // print "use :".$sproxy.":".$sport;
                $data = Curl::get_html($url,'',$sproxy,$sport);
          
        }
        $site=Config::getDomain($url);
        $save_bath='/opt/lampp/htdocs/spider_center/results/'.$keyword.'_'.$site.'_'.$time.".txt";
      
        file_put_contents($save_bath,$data); 
        echo $save_bath;
        
    }else 
    {
        $data =Curl::get_html($url);   
        $site =Config::getDomain($url);
        $save_bath='/opt/lampp/htdocs/spider_center/results/'.$keyword.'_'.$site.'_'.$time.".txt";
       // print $data;
        file_put_contents($save_bath,$data); 
        echo $save_bath;
    }
