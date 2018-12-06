<?php

class Interfaceuse{


    //检查接口传输验证
    static public function makeSign($method , $token)
    {
        $timestamp = time();
        $sign = md5($method.$timestamp.$token);
        $data = array(
            "sign" =>$sign,
            "timestamp" =>$timestamp,
            "token" => $token,
            "method" => $method
        );
        return $data;

    }

    //InterfaceUes::get_list() 获取页面信息接口调用
    static public function get_list($array,$name ='')
    {
        if(empty($array['method'])) throw new Exception('接口方法不能为空', 101);
        if(empty($array['post_url'])) throw new Exception('接口地址不能为空', 102);
        //传输加密
        $sign = self::makeSign($array['method'], "yuqing3.0");
        //var_dump($sign);
        //组装数据
        $arr = array();
        $arr = $array;
        $arr['sign'] = $sign['sign'];
        $arr['timestamp'] = $sign['timestamp'];
        $arr['token'] = $sign['token'];
        //页面搜索框
        if(!empty($name)) $arr['name'] = $name;
        //进行接口调用
       // print_r($arr);
        $res = Curl::post($array['post_url'],$arr);
        //print_r($res);
        $rows = json_decode($res);
        $rs = $rows->data;
        return $rs;
    }
    //通过接口插入数据
    static public function add($array)
    {
        if(empty($array['method'])) throw new Exception('接口方法不能为空', 101);
        if(empty($array['post_url'])) throw new Exception('接口地址不能为空', 102);
        //传输加密
        $sign = self::makeSign($array['method'], "yuqing3.0");
        //组装数据
        $arr = array();
        $arr = $array;
        $arr['sign'] = $sign['sign'];
        $arr['timestamp'] = $sign['timestamp'];
        $arr['token'] = $sign['token'];
        //var_dump($array['post_url']);
        $rs = Curl::post($array['post_url'],$arr);
        return $rs;
    }
    //根据ID获取信息,调用接口,此接口为通用接口都是site/get_Info_id.php
    //id , method , table_name, url
    static public function getInfoById($url , $array)
    {
        $sign = self::makeSign($array['method'],"yuqing3.0");
        $arr = array(
            'id'    => $array['id'],
            'method' => $array['method'],
            'table_name' => $array['table_name'],
            'sign'      => $sign['sign'],
            "timestamp" =>$sign['timestamp'],
            "token" => $sign['token']

        );
        $res = Curl::post($url,$arr);
        $row = json_decode($res);
        $r = $row->data;
        return $r;
    }


    static public function getInfoById_url($url , $array)
    {
        $sign = self::makeSign($array['method'],"yuqing3.0");
        $arr = array(
            'id'    => $array['id'],
            'method' => $array['method'],
            'table_name' => $array['table_name'],
            'sign'      => $sign['sign'],
            "timestamp" =>$sign['timestamp'],
            "token" => $sign['token']

        );
        $res = Curl::post($url,$arr);
        return $res;
    }

    //通过接口修改数据
    static public function edit($array)
    {
        if(empty($array['method'])) throw new Exception('接口方法不能为空', 101);
        if(empty($array['post_url'])) throw new Exception('接口地址不能为空', 102);
        if(empty($array['id'])) throw new Exception('ID不能为空', 103);
        //传输加密
        $sign = self::makeSign($array['method'], "yuqing3.0");
        //组装数据
        $arr = array();
        $arr = $array;
        $arr['sign'] = $sign['sign'];
        $arr['timestamp'] = $sign['timestamp'];
        $arr['token'] = $sign['token'];
        $rs = Curl::post($array['post_url'],$arr);
        return $rs;
    }
    //删除数据,通过接口
    static public function del($array)
    {
        if(empty($array['method'])) throw new Exception('接口方法不能为空', 101);
        if(empty($array['id'])) throw new Exception('ID不能为空', 102);
        if(empty($array['table_name'])) throw new Exception('表名不能为空', 103);
        if(empty($array['post_url'])) throw new Exception('接口地址不能为空', 104);
        //传输加密
        $sign = self::makeSign($array['method'], "yuqing3.0");
        $arr = array();
        $arr = $array;
        $arr['sign'] = $sign['sign'];
        $arr['timestamp'] = $sign['timestamp'];
        $arr['token'] = $sign['token'];
        $rs = Curl::post($array['post_url'],$arr);
        return $rs;

    }
    //单纯调用接口,三个跟爬取相关的接口
    static public function call_interface($array)
    {
        if(empty($array['method'])) throw new Exception('接口方法不能为空', 101);
        $sign = self::makeSign($array['method'], "yuqing3.0");
        $arr = array();
        $arr = $array;
        $arr['sign'] = $sign['sign'];
        $arr['timestamp'] = $sign['timestamp'];
        $arr['token'] = $sign['token'];
        $rs = Curl::post($array['post_url'],$arr);
        //var_dump($rs);
        return $rs;
    }

    static public function test($data = '')
    {
        return 1;
    }
}
