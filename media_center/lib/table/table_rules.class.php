<?php

/**
 * table_rules.class.php 媒体信息表
 *
 * @version       $Id$
 * @createtime    2018/10/25
 * @updatetime    
 * @author        tengyingzhi
 * @copyright     Copyright (c) 芝麻开发 (http://www.zhimawork.com)
 */

class Table_rules extends Table{
    
    /**
     * Table_rules::struct()  数组转换
     * 
     * @param array $data
     * 
     * @return $r
     */
    static protected function struct($data){
        $r = array();
     
        $r['id']                    = $data['rules_id'];
        $r['example']                	= $data['rules_example'];//示例网址

        $r['url']                	= $data['rules_url'];//媒体名称
        $r['type']                	= $data['rules_type'];//媒体链接
        $r['siteid']              	= $data['rules_siteid'];//备注信息
        $r['is_param']              	= $data['rules_is_param'];//备注信息

        return $r;
    }


    static public function getTypeByAttr($attr)
    {
        $attrs = array(
            "example"=>"string",
          "url"=>"string",
          "type"=>"number",
          "siteid"=>"number",
            "is_param"=>"number"

        );

        return isset($attrs[$attr])?$attrs[$attr]:$attrs;
    }



    /**
     * @param $attrs
     * @return mixed
     */
    static public function add($attrs){

        global $mypdo;
        //写入数据库
        $params = array();
        foreach ($attrs as $key=>$value)
        {
            $type = self::getTypeByAttr($key);
            $params["rules_".$key] =  array($type,$value);

        }
        return $mypdo->sqlinsert($mypdo->prefix.'rules', $params);
    }


    /**
     * 更新
     * @param $id
     * @param $attrs
     * @return mixed
     */
    static public function edit($id,$attrs){
        global $mypdo;
        //修改参数i
        $param = array();
        foreach($attrs as $key=>$value)
        {
            $type = self::getTypeByAttr($key);
            $param["rules_".$key] =array($type, $value);

        }
        $where = array(
            'rules_id' => array('number', $id),
        );
        //返回结果
        $r = $mypdo->sqlupdate($mypdo->prefix.'rules', $param, $where);
        return $r;
    }





    /**
     * Table_rules::getInfoById()
     * 
     * @param mixed $id
     * @return
     */
    static public function getInfoById($id){
        global $mypdo;
        
        $id = $mypdo->sql_check_input(array('number', $id));
        
        $sql = "select * from ".$mypdo->prefix."rules where rules_id = $id limit 1";
        
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
     * Table_rules::getInfoBySiteid($siteid)
     * 
     * @param mixed $id
     * @return
     */
    static public function getRulesBySiteid($siteid,$type){
        global $mypdo;
        
        $siteid = $mypdo->sql_check_input(array('number', $siteid));
        
        $sql = "select * from ".$mypdo->prefix."rules where rules_siteid = $siteid  and rules_type = $type";
        

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
     * Table_rules::getList()    媒体列表
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
        
        $sql = "select * from ".$mypdo->prefix."rules where 1=1 ";
        /*if(!empty($sort)) {
            $sql .= " and news_sort = $sort ";
        }
        if(!empty($status)) {
            $sql .= " and news_status = $status ";
        }*/
        $sql .= " order by rules_id desc limit $startrow, $pagesize";
               
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
     * Table_rules::getAllList()    媒体列表
     * 
     * @param int $page         当前页
     * @param int $pagesize     每页数量
     * @return
     */
    static public function getListByType($siteid,$type){
        global $mypdo;
        
        
        $sql = "select * from ".$mypdo->prefix."rules where 1=1 ";
        if(!empty($siteid)) {
            $sql .= " and rules_siteid = $siteid ";
        }
        if(!empty($type)) {
            $sql .= " and rules_type = $type ";
        }
 
        $sql .= " order by rules_id desc";
               
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
      * Table_rules::getCount()  数量统计
      * 
      * @return
      */
     static public function getCount(){
        global $mypdo;
        
        $sql = "select count(*) as ct from ".$mypdo->prefix."rules where 1=1";

        $r = $mypdo->sqlQuery($sql);
        if($r){
            return $r[0]['ct'];
        }else{
            return 0;
        }
    }
    /**
     * Table_task::del() 删除媒体信息
     * 
     * @param mixed $id
     * @return
     */
    static public function del($id){
        global $mypdo;
        
        $where = array(
            'rules_id' => array('number', $id)
        );

        return $mypdo->sqldelete($mypdo->prefix.'rules', $where);
    }



    /**
     * Table_task::del() 删除媒体信息
     *
     * @param mixed $id
     * @return
     */
    static public function delBySite($siteId){
        global $mypdo;

        $where = array(
            'rules_siteid' => array('number', $siteId)
        );

        return $mypdo->sqldelete($mypdo->prefix.'rules', $where);
    }


}
?>