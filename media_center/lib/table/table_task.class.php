<?php

/**
 * table_task.class.php 媒体信息表
 *
 * @version       $Id$
 * @createtime    2018/10/25
 * @updatetime    
 * @author        tengyingzhi
 * @copyright     Copyright (c) 芝麻开发 (http://www.zhimawork.com)
 */

class Table_task extends Table{
    
    /**
     * Table_task::struct()  数组转换
     * 
     * @param array $data
     * 
     * @return $r
     */
    static protected function struct($data){
        $r = array();
     
        $r['id']                    	= $data['task_id'];
        $r['siteid']                	= $data['task_siteid'];//媒体名称
        $r['cur_depth']                 = $data['task_cur_depth'];//媒体链接
        $r['url']              			= $data['task_url'];//备注信息
        $r['type']              		= $data['task_type'];//备注信息

        return $r;
    }

    /**
     * Table_task::getInfoById()
     * 
     * @param mixed $id
     * @return
     */
    static public function getInfoById($id){
        global $mypdo;
        
        $id = $mypdo->sql_check_input(array('number', $id));
        
        $sql = "select * from ".$mypdo->prefix."task where task_id = $id limit 1";
        
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
     * Table_task::getInfoById()
     * 
     * @param mixed $id
     * @return
     */
    static public function getInfoByLimit(){
        global $mypdo;
 
        //随机取一条
//        $sql = "select * from ".$mypdo->prefix."task where 1 = 1 order by rand() limit 1 ";
        $sql = "select * from ".$mypdo->prefix."task where 1 = 1 limit 1 ";

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
     * Table_task::add() 添加媒体信息
     * 
     * @param array $Attr
     * $Attr数组键：id, name, url, remark
     * 
     * @return
     */
    static public function add($Attr){ 
        global $mypdo;
        
        $siteid                  	= $Attr['siteid'];
        $cur_depth                 	= $Attr['cur_depth'];
        $url                 		= $Attr['url'];
        $type                 		= $Attr['type'];

        $param = array (
            'task_siteid'              	=> array('number', $siteid),
            'task_cur_depth'            => array('number', $cur_depth),
            'task_url'               	=> array('string', $url),
            'task_type'               	=> array('number', $type)

            
        );
        //var_dump($param);
        return $mypdo->sqlinsert($mypdo->prefix.'task', $param); 
    }
    /**
     * Table_task::edit() 修改媒体信息
     * 
     * @param int   $id
     * @param array $Attr
     * $Attr数组键：id, name, url, remark
     * 
     * @return
     */
    static public function edit($id, $Attr){ 
        global $mypdo;
        $siteid                		= $Attr['siteid'];
        $cur_depth                 	= $Attr['cur_depth'];
        $url              			= $Attr['url'];
    

       $param = array (
            'task_siteid'             	=> array('number', $siteid),
            'task_cur_depth'           	=> array('number', $cur_depth),
            'task_url'           		=> array('string', $url),

            );
        $where = array(
            'task_id'                => array('number', $id)
        );
            
        return $mypdo->sqlupdate($mypdo->prefix.'task', $param, $where); 
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
            'task_id' => array('number', $id)
        );

        return $mypdo->sqldelete($mypdo->prefix.'task', $where);
    }

    /**
     * Table_task::getList()    媒体列表
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
        
        $sql = "select * from ".$mypdo->prefix."task where 1=1 ";
        /*if(!empty($sort)) {
            $sql .= " and news_sort = $sort ";
        }
        if(!empty($status)) {
            $sql .= " and news_status = $status ";
        }*/
        $sql .= " order by task_id desc limit $startrow, $pagesize";
               
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
     * Table_task::getAllList()    媒体列表
     * 
     * @param int $page         当前页
     * @param int $pagesize     每页数量
     * @return
     */
    static public function getAllList(){
        global $mypdo;
        
        
        $sql = "select * from ".$mypdo->prefix."task where 1=1 ";
        /*if(!empty($sort)) {
            $sql .= " and news_sort = $sort ";
        }
        if(!empty($status)) {
            $sql .= " and news_status = $status ";
        }*/
        $sql .= " order by task_id desc";
               
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
      * Table_task::getCount()  数量统计
      * 
      * @return
      */
     static public function getCount(){
        global $mypdo;
        
        $sql = "select count(*) as ct from ".$mypdo->prefix."task where 1=1";

        $r = $mypdo->sqlQuery($sql);
        if($r){
            return $r[0]['ct'];
        }else{
            return 0;
        }
    }



    /**
     * Table_task::search()
     *
     * @param mixed $id
     * @return
     */
    static public function search($params){
        global $mypdo;


        $sql = "select * from ".$mypdo->prefix."task";

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
     * Table_task::searchCount()
     *
     * @param mixed $id
     * @return
     */
    static public function searchCount($params){
        global $mypdo;


        $sql = "select count(1) as act from ".$mypdo->prefix."task";

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