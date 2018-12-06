<?php

/**
 * table_site.class.php 媒体信息表
 *
 * @version       $Id$
 * @createtime    2018/10/25
 * @updatetime    
 * @author        tengyingzhi
 * @copyright     Copyright (c) 芝麻开发 (http://www.zhimawork.com)
 */

class Table_site extends Table{
    
    /**
     * Table_site::struct()  数组转换
     * 
     * @param array $data
     * 
     * @return $r
     */
    static protected function struct($data){
        $r = array();
     
        $r['id']                    = $data['site_id'];
        $r['name']                	= $data['site_name'];//媒体名称
        $r['depth']                 = $data['site_depth'];//深度
        $r['interval']              = $data['site_interval'];//间隔
        $r['start_url']             = $data['site_start_url'];//网址
        $r['source']                = $data['site_source'];//来源
        $r['status']                = $data['site_status'];//状态

        $r['last_time']             = $data['site_last_time'];//最近更新时间
        return $r;
    }


    static public function getTypeByAttr($attr)
    {
        $attrs = array(

            "name"=>'string',
            "depth"=>'number',
            "interval"=>'number',
            "start_url"=>'string',
            "source"=>'number',
            "last_time"=>'number',
            "status"=>'number',
        );

        return isset($attrs[$attr])?$attrs[$attr]:$attrs;
    }

    /**
     * Table_site::getInfoById()
     * 
     * @param mixed $id
     * @return
     */
    static public function getInfoById($id){
        global $mypdo;
        
        $id = $mypdo->sql_check_input(array('number', $id));
        
        $sql = "select * from ".$mypdo->prefix."site where site_id = $id limit 1";
        
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
     * Table_site::edit() 修改媒体信息
     * 
     * @param int   $id
     * @param array $Attr
     * $Attr数组键：id, name, url, remark
     * 
     * @return
     */
    static public function update_last_time($id){ 
        global $mypdo;
        
        $last_time              = time();
    

       $param = array (
            'site_last_time'           	=> array('number', $last_time)
        );

        $where = array(
            'site_id'                => array('number', $id)
        );
            
        return $mypdo->sqlupdate($mypdo->prefix.'site', $param, $where); 
    }
    


    /**
     * Table_site::del() 删除媒体信息
     * 
     * @param mixed $id
     * @return
     */
    static public function del($id){
        global $mypdo;
        
        $where = array(
            'site_id' => array('number', $id)
        );

        return $mypdo->sqldelete($mypdo->prefix.'site', $where);
    }

    /**
     * Table_site::getList()    媒体列表
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
        
        $sql = "select * from ".$mypdo->prefix."site where 1=1 ";
        /*if(!empty($sort)) {
            $sql .= " and news_sort = $sort ";
        }
        if(!empty($status)) {
            $sql .= " and news_status = $status ";
        }*/
        $sql .= " order by site_id desc limit $startrow, $pagesize";
               
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
     * Table_site::getAllList()    媒体列表
     * 
     * @param int $page         当前页
     * @param int $pagesize     每页数量
     * @return
     */
    static public function getAllList(){
        global $mypdo;
        
        
        $sql = "select * from ".$mypdo->prefix."site where 1=1 ";
        /*if(!empty($sort)) {
            $sql .= " and news_sort = $sort ";
        }
        if(!empty($status)) {
            $sql .= " and news_status = $status ";
        }*/
        $sql .= " order by site_id desc";
               
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
     * Table_site::getAllList()    媒体列表
     *
     * @param $time
     * @return array|int
     */
    static public function getNeedMonitorList($time){
        global $mypdo;


        $sql = "select * from ".$mypdo->prefix."site where 1=1 and (site_last_time+site_interval)<{$time} and site_status=1";
        /*if(!empty($sort)) {
            $sql .= " and news_sort = $sort ";
        }
        if(!empty($status)) {
            $sql .= " and news_status = $status ";
        }*/
        $sql .= " order by site_id desc";


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
     * Table_site::getCount()  数量统计
     *
     * @return int
     */
     static public function getCount(){
        global $mypdo;
        
        $sql = "select count(*) as ct from ".$mypdo->prefix."site where 1=1";

        $r = $mypdo->sqlQuery($sql);
        if($r){
            return $r[0]['ct'];
        }else{
            return 0;
        }
    }

    /**
     * Table_site::add()  添加媒体站点
     *
     * @param $urlinfoAttr
     * @return mixed
     * @throws Exception
     */
    static public function add($urlinfoAttr){

        global $mypdo;

        //写入数据库
        $param = array (
            'site_name'=> array('string',$urlinfoAttr['name']),//媒体名称
            'site_depth'=> array('number',$urlinfoAttr['depth']),//媒体链接
            'site_interval'=> array('number',$urlinfoAttr['interval']),//备注信息
            'site_status'=> array('number',$urlinfoAttr['status']),//媒体状态
            'site_start_url'=> array('string',$urlinfoAttr['start_url']),//备注信息
            'site_source'=> array('number',$urlinfoAttr['source']),//备注信息
        );
        return $mypdo->sqlinsert($mypdo->prefix.'site', $param);
    }


    /**
     * Table_site::edit()  编辑媒体站点
     *
     * @param $id
     * @param $urlinfoAttr
     * @return mixed
     * @throws Exception
     */
    static public function edit($id, $urlinfoAttr){

        global $mypdo;

        //修改参数
        $param = array (
            'site_name'=> array('string',$urlinfoAttr['name']),//媒体名称
            'site_depth'=> array('number',$urlinfoAttr['depth']),//媒体链接
            'site_status'=> array('number',$urlinfoAttr['status']),//媒体状态
            'site_interval'=> array('number',$urlinfoAttr['interval']),//备注信息
            'site_start_url'=> array('string',$urlinfoAttr['start_url']),//备注信息
            'site_source'=> array('number',$urlinfoAttr['source']),//备注信息
        );
        //where条件
        $where = array(
            "site_id" => array('number', $id)
        );
        return $mypdo->sqlupdate($mypdo->prefix.'site', $param, $where);
    }




    /**
     * Table_site::getInfoById()
     *
     * @param mixed $id
     * @return
     */
    static public function search($params){
        global $mypdo;


        $sql = "select * from ".$mypdo->prefix."site";

        $where = " where 1=1 ";

        if(!empty($params["name"]))
        {
            $where .= " and site_name like '%{$params["name"]}%'";
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



    /**
     * Table_site::getInfoById()
     *
     * @param mixed $id
     * @return
     */
    static public function searchCount($params){
        global $mypdo;


        $sql = "select count(1) as act from ".$mypdo->prefix."site";

        $where = " where 1=1 ";

        if(!empty($params["name"]))
        {
            $where .= " and site_name like '%{$params["name"]}%'";
        }

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