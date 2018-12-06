<?php

function getSogouWithProxy($url){
    $proxy_list=Proxy::saveZMproxy("http://webapi.http.zhimacangku.com/getip?num=20&type=1&pro=&city=0&yys=0&port=1&pack=34796&ts=0&ys=0&cs=0&lb=1&sb=0&pb=4&mr=1&regions=");
    if(count($proxy_list)==0){
        echo "无代理可用;请确认获取代理API;";
    }
 //   var_dump($proxy_list);

        $num = rand(0,19);

        $proxy=$proxy_list[$num];
        print "use:".$proxy;
        $data = Curl::get_html($url,'',$proxy);
       //$data =Curl::get_html($url);
        $preg='/<span class="s1">(.*?)<\/span>/s';
        preg_match($preg,$data,$res);
        if(count($res) !== 0 ){
            if(strpos($res[1],'您的访问出错了')!==false || $data==''){
                print "无效代理"."\n";

               // continue;
            }
        }
        elseif ($data ==false ){
            print "data false"."\n";
        }
        else{
            print "有效代理"."\n";

        }
        var_dump($data);



}
