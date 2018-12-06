<?php

/**
 * table_interfaceIn.class.php 接口信息表
 *
 * @version       $Id$
 * @createtime    2018/10/25
 * @updatetime    2018/11/08
 * @author        tengyingzhi
 * @copyright     Copyright (c) 芝麻开发 (http://www.zhimawork.com)
 */

class Table_interfaceIn extends Table{

    /**
     * Table_interfaceIn::struct()  数组转换
     *
     * @param array $data
     *
     * @return $r
     */
    static protected function struct($data){
        $r = array();

        $r['id']                    = $data['interface_id'];
        $r['name']                	= $data['interface_name'];//名称
        $r['addr']                  = $data['interface_addr'];//接口地址
        $r['type']                  = $data['interface_type'];//接口类型 1-媒体中心,2-爬虫中心,3-内容解析中心,4-服务器外部接口

        return $r;
    }


    static public function getTypeByAttr($attr)
    {
        $attrs = array(

            "name"=>'string',
            "addr"=>'string',
            "type"=>'number'

        );

        return isset($attrs[$attr])?$attrs[$attr]:$attrs;
    }

    /**
     * Table_interfaceIn::getInfoById()
     *
     * @param mixed $id
     * @return
     */
    static public function getInfoById($id){
        global $mypdo;

        $id = $mypdo->sql_check_input(array('number', $id));

        $sql = "select * from ".$mypdo->prefix."interface where interface_id = $id limit 1";

        $rs = $mypdo->sqlQuery($sql);
        if($rs){
            $r = array();
            foreach($rs as $key => $val){
                $r[$key] = self::struct($val);
            }
            return $r[0];
        }else{
            return 0;
        }
    }


    /**
     * Table_interfaceIn::getInfoByType()
     *
     * @param mixed $id
     * @return
     */
    static public function getInfoByType($type){
        global $mypdo;

        $type = $mypdo->sql_check_input(array('number', $type));

        $sql = "select * from ".$mypdo->prefix."interface where interface_type = $type limit 1";

        $rs = $mypdo->sqlQuery($sql);
        if($rs){
            $r = array();
            foreach($rs as $key => $val){
                $r[$key] = self::struct($val);
            }
            return $r[0];
        }else{
            return 0;
        }
    }




    /**
     * Table_interfaceIn::del() 删除媒体信息
     *
     * @param mixed $id
     * @return
     */
    static public function del($id){
        global $mypdo;

        $where = array(
            'interface_id' => array('number', $id)
        );

        return $mypdo->sqldelete($mypdo->prefix.'interface', $where);
    }

    /**
     * Table_interfaceIn::getList()    媒体列表
     *
     * @param int $page         当前页
     * @param int $pagesize     每页数量
     * @return
     */
    static public function getList($page = 1, $pagesize = 10,$count=0){
        global $mypdo;

        $page     = $mypdo->sql_check_input(array('number', $page));
        $pagesize = $mypdo->sql_check_input(array('number', $pagesize));
        $startrow = ($page - 1) * $pagesize;

        $sql = "select * from ".$mypdo->prefix."interface where 1=1 ";
        /*if(!empty($sort)) {
            $sql .= " and news_sort = $sort ";
        }
        if(!empty($status)) {
            $sql .= " and news_status = $status ";
        }*/
        $sql .= " order by interface_id desc limit $startrow, $pagesize";

        $rs = $mypdo->sqlQuery($sql);
        if($rs){
            $r = array();
            foreach($rs as $key => $val){
                $r[$key] = self::struct($val);
            }
            return $r;
        }else{
            return 0;
        }
    }

    /**
     * Table_interface::getAllList()    媒体列表
     *
     * @param int $page         当前页
     * @param int $pagesize     每页数量
     * @return
     */
    static public function getAllList(){
        global $mypdo;


        $sql = "select * from ".$mypdo->prefix."interface where 1=1 ";
        /*if(!empty($sort)) {
            $sql .= " and news_sort = $sort ";
        }
        if(!empty($status)) {
            $sql .= " and news_status = $status ";
        }*/
        $sql .= " order by interface_id desc";

        $rs = $mypdo->sqlQuery($sql);
        if($rs){
            $r = array();
            foreach($rs as $key => $val){
                $r[$key] = self::struct($val);
            }
            return $r;
        }else{
            return 0;
        }
    }


    /**
     * Table_interfaceIn::getCount()  数量统计
     *
     * @return int
     */
    static public function getCount(){
        global $mypdo;

        $sql = "select count(*) as ct from ".$mypdo->prefix."interface where 1=1";

        $r = $mypdo->sqlQuery($sql);
        if($r){
            return $r[0]['ct'];
        }else{
            return 0;
        }
    }

    /**
     * Table_interfaceIn::add()  添加外部服务器接口
     *
     * @param $interfaceInAttr
     * @return mixed
     * @throws Exception
     */
    static public function add($interfaceInAttr){

        global $mypdo;

        //写入数据库
        $param = array (
            'interface_name'=> array('string',$interfaceInAttr['name']),//媒体名称
            'interface_addr'=> array('string',$interfaceInAttr['addr']),//媒体链接
            'interface_type'=> array('number',$interfaceInAttr['type'])//媒体链接


        );
        return $mypdo->sqlinsert($mypdo->prefix.'interface', $param);
    }


    /**
     * Table_interfaceIn::edit()  编辑接口
     *
     * @param $id
     * @param $interfaceInAttr
     * @return mixed
     * @throws Exception
     */
    static public function edit($id, $interfaceInAttr){

        global $mypdo;

        //修改内部接口参数

            $param = array (
                'interface_addr'=> array('string',$interfaceInAttr['addr']),//接口地址
                'interface_name'=> array('string',$interfaceInAttr['name']),//接口地址
                'interface_type'=> array('number',$interfaceInAttr['type'])//接口类型

            );


        //where条件
        $where = array(
                "interface_id" => array('number', $id)
        );
        return $mypdo->sqlupdate($mypdo->prefix.'interface', $param, $where);
    }




    /**
     * Table_interfaceIn::getInfoById()
     *
     * @param mixed $id
     * @return
     */
    static public function searchByType($params, $tag){
        global $mypdo;


        $sql = "select * from ".$mypdo->prefix."interface";

        $where = " where 1=1 ";
        //外部服务器
        if($tag == 1 )
        {
            $where .= " and interface_type = 4";
        }
        else
        {
            $where .= " and interface_type = 1 or interface_type = 2 or interface_type = 3 or interface_type = 5 or interface_type = 6";
        }
        $sql .= $where;
        $limit = "";

        if(!empty($params["page"]))
        {
            $start = ($params["page"]-1)*$params["pageSize"];

            $limit = " limit {$start},{$params["pageSize"]}";
        }

        $sql .= $limit;

        $rs = $mypdo->sqlQuery($sql);
        if($rs){
            $r = array();
            foreach($rs as $key => $val){
                $r[$key] = self::struct($val);
            }
            return $r;
        }else{
            return 0;
        }
    }


    static public function search($params){
        global $mypdo;


        $sql = "select * from ".$mypdo->prefix."interface";

        $where = " where 1=1 ";

        $sql .= $where;
        $limit = "";

        if(!empty($params["page"]))
        {
            $start = ($params["page"]-1)*$params["pageSize"];

            $limit = " limit {$start},{$params["pageSize"]}";
        }

        $sql .= $limit;

        $rs = $mypdo->sqlQuery($sql);
        if($rs){
            $r = array();
            foreach($rs as $key => $val){
                $r[$key] = self::struct($val);
            }
            return $r;
        }else{
            return 0;
        }
    }



    /**
     * Table_interfaceIn::searchCount()
     *
     * @param mixed $id
     * @return
     */
    static public function searchByTypeCount($params,$tag){
        global $mypdo;


        $sql = "select count(1) as act from ".$mypdo->prefix."interface";

        $where = " where 1=1 ";

        //外部服务器
        if($tag == 1 )
        {
            $where .= " and interface_type = 4";
        }
        else
        {
            $where .= " and interface_type = 1 or interface_type = 2 or interface_type = 3 or interface_type = 5 or interface_type = 6";
        }

        $sql .= $where;


        $rs = $mypdo->sqlQuery($sql);
        if($rs){

            return $rs[0]["act"];
        }else{
            return 0;
        }
    }


    /**
     * Table_interfaceIn::searchCount()
     *
     * @param mixed $id
     * @return
     */
    static public function searchCount($params){
        global $mypdo;


        $sql = "select count(1) as act from ".$mypdo->prefix."interface";

        $where = " where 1=1 ";

        $sql .= $where;


        $rs = $mypdo->sqlQuery($sql);
        if($rs){

            return $rs[0]["act"];
        }else{
            return 0;
        }
    }

}
?>