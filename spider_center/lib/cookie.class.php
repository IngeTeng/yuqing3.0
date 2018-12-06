<?php 

   
    class Cookie{

   
        function generateSogouCookie(){
            $word='abcdefghijklmnopqrstuvwxyz';
            $num = rand(0,25);
            $url="http://weixin.sogou.com/weixin?query=".$word[$num];
            $headers = get_headers($url,1);//获取请求头
          
            $cookies = $headers['Set-Cookie'];//获取请求头中的set-cookie数组
            $cookie = implode(";", $cookies);//将cookies转成一个字符串
            preg_match('/ABTEST=(.*);/iU', $cookie, $ABTEST); //匹配ABTEST值
            preg_match('/SNUID=(.*);/iU', $cookie, $SNUID); //匹配SNUID值
            preg_match('/SUID=(.*);/iU', $cookie, $SUID); //匹配ABTEST值
            $SUV = round(microtime(true) * 1000) . rand(000, 999);//生成SUV
            $cookie_res = $ABTEST[0]. $SNUID[0]. $SUID[0]. 'SUV='.$SUV. '; IPLOC=CN;';//合并各参数为最终cookie
            //print_r($cookie_res);
            $res= Table_wxcookie::add($cookie_res);
            print $res;
        }


        function getSogouCookie(){

            $res =Table_wxcookie::getList();
            return $res;
        }
    }
   

