<?php

/**
 * table_solved.class.php 媒体信息表
 *
 * @version       $Id$
 * @createtime    2018/10/25
 * @updatetime    
 * @author        tengyingzhi
 * @copyright     Copyright (c) 芝麻开发 (http://www.zhimawork.com)
 */

class Table_solved extends Table{
    
    /**
     * Table_solved::struct()  数组转换
     * 
     * @param array $data
     * 
     * @return $r
     */
    static protected function struct($data){
        $r = array();
     
        $r['id']                    	= $data['solved_id'];
        $r['siteid']                	= $data['solved_siteid'];//媒体名称
        $r['url']                 = $data['solved_url'];//媒体链接
        $r['time']              			= $data['solved_time'];//备注信息

        return $r;
    }

    /**
     * Table_solved::getInfoById()
     * 
     * @param mixed $id
     * @return
     */
    static public function getInfoById($id){
        global $mypdo;
        
        $id = $mypdo->sql_check_input(array('number', $id));
        
        $sql = "select * from ".$mypdo->prefix."solved where solved_id = $id limit 1";
        
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
     * Table_solved::getInfoById()
     *
     * @param mixed $id
     * @return
     */
    static public function getInfoByUrl($url){
        global $mypdo;

        $url = $mypdo->sql_check_input(array('string', $url));

        $sql = "select * from ".$mypdo->prefix."solved where solved_url = $url limit 1";

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
     * Table_solved::getInfoById()
     * 
     * @param mixed $id
     * @return
     */
    static public function getInfoByLimit(){
        global $mypdo;
 
        //随机取一条
        $sql = "select * from ".$mypdo->prefix."solved where 1 = 1 order by rand() limit 1 ";
        
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
     * Table_solved::add() 添加媒体信息
     * 
     * @param array $Attr
     * $Attr数组键：id, name, url, remark
     * 
     * @return
     */
    static public function add($Attr){ 
        global $mypdo;
        
        $siteid                  	= $Attr['siteid'];
        $url                 		= $Attr['url'];

        $param = array (
            'solved_siteid'              	=> array('number', $siteid),
            'solved_url'               	=> array('string', $url),
            'solved_time'               	=> array('number', time())

            
        );
        //var_dump($param);
        return $mypdo->sqlinsert($mypdo->prefix.'solved', $param); 
    }
    /**
     * Table_solved::edit() 修改媒体信息
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
            'solved_siteid'             	=> array('number', $siteid),
            'solved_cur_depth'           	=> array('number', $cur_depth),
            'solved_url'           		=> array('string', $url),

            );
        $where = array(
            'solved_id'                => array('number', $id)
        );
            
        return $mypdo->sqlupdate($mypdo->prefix.'solved', $param, $where); 
    }
    


    /**
     * Table_solved::del() 删除媒体信息
     * 
     * @param mixed $id
     * @return
     */
    static public function del($id){
        global $mypdo;
        
        $where = array(
            'solved_id' => array('number', $id)
        );

        return $mypdo->sqldelete($mypdo->prefix.'solved', $where);
    }

    /**
     * Table_solved::getList()    媒体列表
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
        
        $sql = "select * from ".$mypdo->prefix."solved where 1=1 ";
        /*if(!empty($sort)) {
            $sql .= " and news_sort = $sort ";
        }
        if(!empty($status)) {
            $sql .= " and news_status = $status ";
        }*/
        $sql .= " order by solved_id desc limit $startrow, $pagesize";
               
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
     * Table_solved::getAllList()    媒体列表
     * 
     * @param int $page         当前页
     * @param int $pagesize     每页数量
     * @return
     */
    static public function getAllList(){
        global $mypdo;
        
        
        $sql = "select * from ".$mypdo->prefix."solved where 1=1 ";
        /*if(!empty($sort)) {
            $sql .= " and news_sort = $sort ";
        }
        if(!empty($status)) {
            $sql .= " and news_status = $status ";
        }*/
        $sql .= " order by solved_id desc";
               
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
      * Table_solved::getCount()  数量统计
      * 
      * @return
      */
     static public function getCount(){
        global $mypdo;
        
        $sql = "select count(*) as ct from ".$mypdo->prefix."solved where 1=1";

        $r = $mypdo->sqlQuery($sql);
        if($r){
            return $r[0]['ct'];
        }else{
            return 0;
        }
    }
    
    




}
?>