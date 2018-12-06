<?php

/**
 * table_parse_rule.class.php 数据库表:解析规则
 *
 * @version		    $Id$
 * @createtime		2018/11/2
 * @updatetime		2018/11/2
 * @author          zhfang
 * @copyright		Copyright (c) 芝麻开发 (http://www.zhimawork.com)
 */

class Table_parse_rule extends Table {
	
	static protected function struct($data){
	   	$r = array();

        $r['r_id']=$data['r_id'];
        $r['site_url']=$data['site_url'];
        $r['rule_name']=$data['rule_name'];
        $r['method']=$data['method'];
        $r['click_b']=$data['click_b'];
        $r['click_e']=$data['click_e'];
        $r['title_b']=$data['title_b'];
        $r['title_e']=$data['title_e'];
        $r['author_b']=$data['author_b'];
        $r['author_e']=$data['author_e'];
        $r['content_b']=$data['content_b'];
        $r['content_e']=$data['content_e'];
        $r['time_b']=$data['time_b'];
        $r['time_e']=$data['time_e'];
        $r['media_b']=$data['media_b'];
        $r['media_e']=$data['media_e'];
        $r['channel_b']=$data['channel_b'];
        $r['channel_e']=$data['channel_e'];
        $r['comment_b']=$data['comment_b'];
        $r['comment_e']=$data['comment_e'];
        $r['is_repost']=$data['is_repost'];
        return $r;
	}

    /**
     * Table_parse_rule::getInfoByAccount() 根据网站url匹配规则获取详情
     *
     * @param string $url url匹配规则正则表达式
     *
     * @return array|mixed
     * @throws Exception
     */
    static public function getInfoByUrl($url){
        global $mypdo;
        
        $sql = "select * from ".$mypdo->prefix."parse_rules where site_url like '%{$url}%'";
        
        $rs = $mypdo->sqlQuery($sql);
        $r  = array();
		if($rs){
            foreach($rs as $key => $val){
                $r[$key] = self::struct($val);
            }
            return $r;
        }else{
            return $r;
        }
    }
    
    /**
     * Table_parse_rule::getInfoById() 根据ID获取详情
     * 
     * @param Integer $id  规则ID
     * 
     * @return
     */
    static public function getInfoById($id){
        global $mypdo;
        
        $id = $mypdo->sql_check_input(array('number', $id));
        
        $sql = "select * from ".$mypdo->prefix."parse_rules where r_id = $id limit 1";
        
        $rs = $mypdo->sqlQuery($sql);
        $r  = array();
		if($rs){
            foreach($rs as $key => $val){
                $r[$key] = self::struct($val);
            }
            return $r[0];
        }else{
            return $r;
        }
    }

    /**
     * Table_parse_rule::edit() 修改提取规则
     *
     * @param Integer $r_id 规则ID
     * @param $ruleAttr
     * @return mixed
     * @throws Exception
     */
    static public function edit($r_id, $ruleAttr){
        
        global $mypdo;
        
        //参数
        $param = array (
            'site_url'=>array('string', $ruleAttr['site_url']),
            'rule_name'=>array('string', $ruleAttr['rule_name']),
            'click_b'=>array('string', $ruleAttr['click_b']),
            'click_e'=>array('string', $ruleAttr['click_e']),
            'title_b'=>array('string', $ruleAttr['title_b']),
            'title_e'=>array('string', $ruleAttr['title_e']),
            'author_b'=>array('string', $ruleAttr['author_b']),
            'author_e'=>array('string', $ruleAttr['author_e']),
            'content_b'=>array('string', $ruleAttr['content_b']),
            'content_e'=>array('string', $ruleAttr['content_e']),
            'time_b'=>array('string', $ruleAttr['time_b']),
            'time_e'=>array('string', $ruleAttr['time_e']),
            'media_b'=>array('string', $ruleAttr['media_b']),
            'media_e'=>array('string', $ruleAttr['media_e']),
            'channel_b'=>array('string', $ruleAttr['channel_b']),
            'channel_e'=>array('string', $ruleAttr['channel_e']),
            'comment_b'=>array('string', $ruleAttr['comment_b']),
            'comment_e'=>array('string', $ruleAttr['comment_e']),
            'is_repost'=>array('string', $ruleAttr['is_repost'])
        );
        $where = array('r_id'=> array('number', $r_id));
            
        return $mypdo->sqlupdate($mypdo->prefix.'parse_rules', $param, $where);
    }

    /**
     * Table_parse_rule::add()  添加规则
     *
     * @param $ruleAttr
     * @return mixed
     * @throws Exception
     */
    static public function add($ruleAttr){
        
        global $mypdo;

		//参数
		$param = array (
            'site_url'=>array('string', $ruleAttr['site_url']),
            'rule_name'=>array('string', $ruleAttr['rule_name']),
            'click_b'=>array('string', $ruleAttr['click_b']),
            'click_e'=>array('string', $ruleAttr['click_e']),
            'title_b'=>array('string', $ruleAttr['title_b']),
            'title_e'=>array('string', $ruleAttr['title_e']),
            'author_b'=>array('string', $ruleAttr['author_b']),
            'author_e'=>array('string', $ruleAttr['author_e']),
            'content_b'=>array('string', $ruleAttr['content_b']),
            'content_e'=>array('string', $ruleAttr['content_e']),
            'time_b'=>array('string', $ruleAttr['time_b']),
            'time_e'=>array('string', $ruleAttr['time_e']),
            'media_b'=>array('string', $ruleAttr['media_b']),
            'media_e'=>array('string', $ruleAttr['media_e']),
            'channel_b'=>array('string', $ruleAttr['channel_b']),
            'channel_e'=>array('string', $ruleAttr['channel_e']),
            'comment_b'=>array('string', $ruleAttr['comment_b']),
            'comment_e'=>array('string', $ruleAttr['comment_e']),
            'is_repost'=>array('string', $ruleAttr['is_repost'])
		);
        return $mypdo->sqlinsert($mypdo->prefix.'parse_rules', $param);
    }

    /**
     * Table_parse_rule::del() 删除规则
     *
     * @param Integer $r_id 规则ID
     *
     * @return mixed
     * @throws Exception
     */
    static public function del($r_id){
        
        global $mypdo;
        
		$where = array(
			"r_id" => array('number', $r_id)
		);
        
        return $mypdo->sqldelete($mypdo->prefix.'parse_rules', $where);
    }

    /**
     * Table_parse_rule::getList() 获取规则列表
     *
     * @return array|int
     */
    static public function getList(){
        
        global $mypdo;

        $sql="select * from ".$mypdo->prefix."parse_rules order by r_id asc";

        $rs = $mypdo->sqlQuery($sql);
        $r = array();
        if($rs){
            foreach($rs as $key => $val){
                $r[$key] = self::struct($val);
            }
            return $r;
        }else{
            return 0;
        }
    }


    /**
     * Table_site::search()
     *
     * @param $params
     * @return array|int
     */
    static public function search($params){
        global $mypdo;


        $sql = "select * from ".$mypdo->prefix."parse_rules";

        $where = " where 1=1 ";

        if(!empty($params["name"]))
        {
            $where .= " and rule_name like '%{$params["name"]}%'";
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
     * Table_site::searchCount()
     *
     * @param $params
     * @return int
     */
    static public function searchCount($params){
        global $mypdo;


        $sql = "select count(1) as act from ".$mypdo->prefix."parse_rules";

        $where = " where 1=1 ";

        if(!empty($params["name"]))
        {
            $where .= " and rule_name like '%{$params["name"]}%'";
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