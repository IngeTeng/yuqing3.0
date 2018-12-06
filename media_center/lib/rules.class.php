<?php

/**
 * rules.class.php 规则类
 *
 * @version       $Id$
 * @create time   2018/10/30
 * @update time   2018/11/01
 * @author        tengyingzhi
 * @copyright     Copyright (c) 芝麻开发 (http://www.zhimawork.com)
 */
class Rules {
    
    public function __construct() {
    }
    
    /**
     *rules::getInfoById()
     * 
     * @param mixed $id
     * @return
     */
    static public function getInfoById($id){
        if(empty($id)) throw new MyException('ID不能为空', 101);
        
        return Table_rules::getInfoById($id);
    }
    

    /**
     * @param array $rulesAttr
     * @throws MyException
     */
    static public function add($rulesAttr = array()){

        //参数较多，校验较多。而且添加和修改的操作校验相同。所以单独做个函数
        $okAttr = self::checkRulesInputParam($rulesAttr);

        $rs = Table_rules::add($okAttr);

        if($rs > 0){
            //记录管理员日志log表

            return $rs;
        }else{
            throw new MyException('操作失败', 106);
        }
    }

    /**
     * @param array $rulesAttr
     * @throws MyException
     */
    static public function add_msg($rulesAttr = array()){

        //参数较多，校验较多。而且添加和修改的操作校验相同。所以单独做个函数
        $okAttr = self::checkRulesInputParam($rulesAttr);

        $rs = Table_rules::add($okAttr);

        if($rs > 0){
            //记录管理员日志log表
            $msg = '成功添加规则('.$okAttr['url'].')';
            //Adminlog::add($msg);

            return action_msg($msg, 1);
        }else{
            throw new MyException('操作失败', 106);
        }
    }

    /**
     * @param $id
     * @param $rulesAttr
     * @return array|mixed|string
     * @throws MyException
     */
    static public function edit($id, $rulesAttr){
        
        if(empty($id)) throw new MyException('ID不能为空', 100);
        
        $okAttr = self::checkRulesInputParam($rulesAttr);
        
        $rs = Table_rules::edit($id, $okAttr);
        
        if($rs >= 0){

            return $rs;
        }else{
            throw new MyException('操作失败', 106);
        }
    }


    static public function edit_msg($id, $rulesAttr){

        if(empty($id)) throw new MyException('ID不能为空', 100);

        $okAttr = self::checkRulesInputParam($rulesAttr);

        $rs = Table_rules::edit($id, $okAttr);

        if($rs >= 0){

            $msg = '成功修改规则('.$okAttr['url'].')';
            //Adminlog::add($msg);

            return action_msg($msg, 1);
        }else{
            throw new MyException('操作失败', 106);
        }
    }

  	/**
     * rules::getRulesType()
     *
     * @param mixed $tag
     * @return
     */
    static public function getRulesType($type){
        switch($type){
            case 1:
                return '匹配规则';
                break;

            case 2:
                return '保留规则';
                break;

            case 3:
                return '丢弃规则';
                break;

            default:
                return false;
                break;
        }
    }


    /**
     * @param $rulesAttr
     * @return mixed
     * @throws MyException
     */
    static public function checkRulesInputParam($rulesAttr){
        if(empty($rulesAttr) || !is_array($rulesAttr)) throw new MyException('参数错误', 100);
        if(empty($rulesAttr['siteid'])) throw new MyException('链接信息不能为空', 101);
        if(empty($rulesAttr['type'])) throw new MyException('规则类型不能为空', 102);
        if(empty($rulesAttr['url'])) throw new MyException('链接规则不能为空', 103);

        return $rulesAttr;
    }

    /**
     * rules::getList()
     * 
     * @param integer $page
     * @param integer $pagesize
     * @return
     */
    static public function getList($page = 1, $pagesize = 10,$count=0){
        
        if(!preg_rules('/^\d+$/', $page)) $page = 1;
        if(!preg_rules('/^\d+$/', $pagesize)) $pagesize = 10;
        
        return Table_rules::getList($page, $pagesize,$count=0);
    }


    /**
     * rules::getParam()
     *
     * @param mixed $tag
     * @return
     */
    static public function getParam($type){
        switch($type){
            case 1:
                return '保留';
                break;

            case 2:
                return '忽略';
                break;

            default:
                return false;
                break;
        }
    }

    /**
     *rules::getAllList()
     * 
     * @param integer $page
     * @param integer $pagesize
     * @return
     */
    static public function getAllList(){
        
        return Table_rules::getAllList();
    }
    
    /**
     * rules::getCount()
     * 
     * @param integer $sort
     * @param integer $status
     * @return
     */
    static public function getCount(){
        
        return Table_rules::getCount();

    }
    
    
    /**
     * rules::del()
     * 
     * @param mixed $id
     * @return
     */
    static public function del($id){

        if(empty($id))throw new MyException('ID不能为空', 101);

        
        
        $rs = Table_rules::del($id);
        if($rs == 1){
            //TODO 删除媒体信息
            $msg = '成功删除规则';
            //Adminlog::add($msg);

            return action_msg($msg, 1);
            //return $rs;

        }else{
            throw new MyException('操作失败', 102);
        }
    }
 

    static public function getListByType($rulesId,$type)
    {
        return Table_rules::getListByType($rulesId,$type);
    }


    /**
     * 匹配表达式经过修正
     * @param $rulesId
     * @param $type
     * @return array|int
     */
    static public function getXiuzhengListByType($rulesId,$type)
    {
        $rs = Table_rules::getListByType($rulesId,$type);

        if(!empty($rs))
        {
            foreach ($rs as &$item)
            {
                $item["url"] = pregQuote($item["url"]);
            }

        }

        return $rs;
    }



    /**
     * rules::del()
     *
     * @param mixed $id
     * @return
     */
    static public function delBySite($siteId){

        if(empty($siteId))throw new MyException('$siteId', 101);



        Table_rules::delBySite($siteId);

    }
}
?>