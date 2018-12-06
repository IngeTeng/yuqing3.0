<?php

/**
 * site.class.php 站点类
 *
 * @version       $Id$
 * @create time   2018/10/25
 * @update time   2018/11/01
 * @author        tengyingzhi
 * @copyright     Copyright (c) 芝麻开发 (http://www.zhimawork.com)
 */
class Site {


    const STATUS_NORMAL = 1;//开启
    const STATUS_CLOSED = 2;//关闭

    public function __construct() {
    }
    
    /**
     *site::getInfoById()
     * 
     * @param mixed $id
     * @return
     */
    static public function getInfoById($id){
        if(empty($id)) throw new MyException('ID不能为空', 101);
        
        return Table_site::getInfoById($id);
    }



    /**
     * site::getStatus()
     *
     * @param mixed $tag
     * @return
     */
    static public function getStatus($type){
        switch($type){
            case 1:
                return '开启';
                break;

            case 2:
                return '关闭';
                break;

            default:
                return false;
                break;
        }
    }


    /**
     * site::getSource()
     *
     * @param mixed $tag
     * @return
     */
    static public function getSource($type){
        switch($type){
            case 1:
                return '新闻';
                break;

            case 2:
                return '论坛';
                break;

            case 3:
                return '博客';
                break;

            case 4:
                return '视频';
                break;

            default:
                return false;
                break;
        }
    }
    /**
     * site::add()
     *
     * @param array $siteAttr
     * $siteAttr数组键：name, start_url, depth, source, interval, status, last_time
     *
     * @return
     */
    static public function add($siteAttr){
        
        //参数较多，校验较多。而且添加和修改的操作校验相同。所以单独做个函数
        $okAttr = self::checkSiteInputParam($siteAttr);

        $rs = Table_site::add($okAttr);

        if($rs > 0){
            //记录管理员日志log表
            $msg = '成功添加站点信息('.$okAttr['name'].')';
            //Adminlog::add($msg);

            return action_msg($msg, 1);
        }else{
            throw new MyException('操作失败', 106);
        }
    }
    
    
    /**
     * site::edit()
     * 
     * @param mixed $id
     * @param array $siteAttr
     * $siteAttr数组键：id, name, url, depth, start_url, status, interval, last_time
     * 
     * @return
     */
    static public function edit($id, $siteAttr){
        
        if(empty($id)) throw new MyException('ID不能为空', 100);
        
        $okAttr = self::checkSiteInputParam($siteAttr);
        
        $rs = Table_site::edit($id, $okAttr);
        
        if($rs >= 0){
            $msg = '成功修改站点信息('.$id.')';
            //Adminlog::add($msg);
            
            return action_msg($msg, 1);
        }else{
            throw new MyException('操作失败', 106);
        }
    }

  
    /**
     * site::checksiteInputParam()
     * 
     * @param array $siteAttr
     * 
     * @return void
     */
    static private function checkSiteInputParam($siteAttr){
        if(empty($siteAttr) || !is_array($siteAttr)) throw new MyException('参数错误', 100);
        if(empty($siteAttr['name'])) throw new MyException('媒体名称不能为空', 101);
        if(empty($siteAttr['depth'])) throw new MyException('爬取深度不能为空', 102);
        if(empty($siteAttr['interval'])) throw new MyException('爬取间隔不能为空', 103);
        if(empty($siteAttr['start_url'])) throw new MyException('初始站点不能为空', 104);
        return $siteAttr;
    }

    /**
     * site::getList()
     * 
     * @param integer $page
     * @param integer $pagesize
     * @return
     */
    static public function getList($page = 1, $pagesize = 10,$count=0){
        
        if(!preg_match('/^\d+$/', $page)) $page = 1;
        if(!preg_match('/^\d+$/', $pagesize)) $pagesize = 10;
        
        return Table_site::getList($page, $pagesize,$count=0);
    }

    /**
     *site::getAllList()
     * 
     * @param integer $page
     * @param integer $pagesize
     * @return
     */
    static public function getAllList(){
        
        
        return Table_site::getAllList();
    }
    
    /**
     * site::getCount()
     * 
     * @param integer $sort
     * @param integer $status
     * @return
     */
    static public function getCount(){
        
        return Table_site::getCount();

    }
    
    
    /**
     * site::del()
     * 
     * @param mixed $id
     * @return
     */
    static public function del($id){

        if(empty($id))throw new MyException('ID不能为空', 101);

        
        
        $rs = Table_site::del($id);
        if($rs == 1){


            Rules::delBySite($id);
            //TODO 删除媒体信息
            
            $msg = '删除站点信息('.$id.')成功!';
            //Adminlog::add($msg);
            
            return action_msg($msg, 1);
        }else{
            throw new MyException('操作失败', 102);
        }
    }


    /**
     * 获取需要监测的网站
     * @param $time
     * @return array|int
     */
    static public function getNeedMonitorList($time){
        return Table_site::getNeedMonitorList($time);
    }
 
    
    /**
     * site::search()
     * 
     * @param integer $page
     * @param integer $pagesize
     * @param integer $count //是否仅作统计 1 - 统计
     * @return
     */
    static public function search($params){

        return Table_site::search($params);
    }


    static public function searchCount($params){

        return Table_site::searchCount($params);
    }


}
?>