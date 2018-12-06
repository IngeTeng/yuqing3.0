<?php

class Config {
    static public $proxyUseDomain =array (
        'weibo.com',
        'so.com',
        'sogou.com',
        'chinaso.com',
        'autohome.com.cn',
        'toutiao.com',
        'yidianzixun.com',
        'qq.com'

    ) ;
   

    public $cookieUseDomain =array(
        'qq.com'
    );

    function matchDomain($url){
        //从URL中获取主机名称
        preg_match('@^(?:http://)?([^/]+)@i',$url, $matches);
        $host = $matches[1];
        preg_match('/[^.]+\.[^.]+$/', $host, $matches);
        $post=$matches[0];
        if(in_array($post,self::$proxyUseDomain)){
            return true;
        }else {
            return false;
        }

    }

    function getDomain($url){
        preg_match('@^(?:http://)?([^/]+)@i',$url, $matches);
        $host = $matches[1];
        preg_match('/[^.]+\.[^.]+$/', $host, $matches);
        $post=$matches[0];
        $name=explode(".",$post);
        $name=$name[0];
        return $name;

    }
}
