<?php

/**
 * task.class.php 任务类
 *
 * @version       $Id$
 * @create time   2018/10/25
 * @update time   
 * @author        tengyingzhi
 * @copyright     Copyright (c) 芝麻开发 (http://www.zhimawork.com)
 */
class Task {

    CONST MATCH_TYPE = 1;//匹配规则
    CONST SAVE_TYPE = 2;//保留规则

    
    public function __construct() {
    }
    
    /**
     *task::getInfoById()
     * 
     * @param mixed $id
     * @return
     */
    static public function getInfoById($id){
        if(empty($id)) throw new MyException('ID不能为空', 101);
        
        return Table_task::getInfoById($id);
    }
    
    /**
     * task::add()
     * 
     * @param array $taskAttr
     * $taskAttr数组键：id, siteid, cur_depth, url
     * 
     * @return void
     */
    static public function add($taskAttr = array()){
        
        //参数较多，校验较多。而且添加和修改的操作校验相同。所以单独做个函数
        $okAttr = self::checkTaskInputParam($taskAttr);

        $rs = Table_task::add($okAttr);

        if($rs > 0){
            //记录管理员日志log表
            $msg = '成功添加任务('.$okAttr['id'].')';
            //Adminlog::add($msg);
            
            return action_msg('添加任务成功', 1);
        }else{
            throw new MyException('操作失败', 106);
        }
    }
    
    
    /**
     * task::edit()
     * 
     * @param mixed $id
     * @param array $taskAttr
     * $taskAttr数组键：id, siteid, cur_depth, url
     * 
     * @return
     */
    static public function edit($id, $taskAttr){
        
        if(empty($id)) throw new MyException('ID不能为空', 100);
        
        $okAttr = self::checkTaskInputParam($taskAttr);
        
        $rs = Table_task::edit($id, $okAttr);
        
        if($rs >= 0){
            $msg = '成功修改任务信息('.$id.')';
            //Adminlog::add($msg);
            
            return action_msg($msg, 1);
        }else{
            throw new MyException('操作失败', 106);
        }
    }

  
    /**
     * task::checkTaskInputParam()
     * 
     * @param array $taskAttr
     * 
     * @return void
     */
    static private function checkTaskInputParam($taskAttr){
        if(empty($taskAttr) || !is_array($taskAttr)) throw new MyException('参数错误', 100);
        if(empty($taskAttr['siteid'])) throw new MyException('站点ID不能为空', 101);
        if(empty($taskAttr['cur_depth'])) throw new MyException('爬取深度不能为空', 102);
        if(empty($taskAttr['url'])) throw new MyException('爬取链接不能为空', 103);
        return $taskAttr;
    }

    /**
     * task::getList()
     * 
     * @param integer $page
     * @param integer $pagesize
     * @return
     */
    static public function getList($page = 1, $pagesize = 10,$count=0){
        
        if(!preg_match('/^\d+$/', $page)) $page = 1;
        if(!preg_match('/^\d+$/', $pagesize)) $pagesize = 10;
        
        return Table_task::getList($page, $pagesize,$count=0);
    }

    /**
     *task::getAllList()
     * 
     * @param integer $page
     * @param integer $pagesize
     * @return
     */
    static public function getAllList(){
        
        
        return Table_task::getAllList();
    }
    
    /**
     * task::getCount()
     * 
     * @param integer $sort
     * @param integer $status
     * @return
     */
    static public function getCount(){
        
        return Table_task::getCount();

    }
    
    
    /**
     * task::del()
     * 
     * @param mixed $id
     * @return
     */
    static public function del($id){

        if(empty($id))throw new MyException('ID不能为空', 101);

        
        
        $rs = Table_task::del($id);
        if($rs == 1){
            //TODO 删除媒体信息
            
            $msg = '删除任务信息('.$id.')成功!';
            //Adminlog::add($msg);
            
            return action_msg($msg, 1);
        }else{
            throw new MyException('操作失败', 102);
        }
    }


    /**
     * task::search()
     *
     * @param integer $page
     * @param integer $pagesize
     * @param integer $count //是否仅作统计 1 - 统计
     * @return
     */
    static public function search($params){

        return Table_task::search($params);
    }

    static public function searchCount($params){

        return Table_task::searchCount($params);
    }

}
?>