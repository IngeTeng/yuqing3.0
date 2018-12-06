<?php

class Config {
    static public $proxyUseDomain =array (

        'sogou.com',
        'chinaso.com',

    ) ;
   

    public $cookieUseDomain =array(
        'sogou.com'
    );

    function matchDomain($url){
        //从URL中获取主机名称
        preg_match('@^(?:http:\/\/|https:\/\/)?([^/]+)@i',$url, $matches);
        $host = $matches[1];
        preg_match('/[^.]+\.[^.]+$/', $host, $matches);
        $post=$matches[0];
        if(in_array($post,self::$proxyUseDomain)){
            return $post;
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
