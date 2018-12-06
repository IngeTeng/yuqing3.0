<?php

/**
 * interfaceIn.class.php 接口参数设置类
 *
 * @version       $Id$
 * @create time   2018/10/25
 * @update time   2018/11/08
 * @author        tengyingzhi
 * @copyright     Copyright (c) 芝麻开发 (http://www.zhimawork.com)
 */
class InterfaceIn {


    public function __construct() {
    }

    /**
     *interfaceIn::getInfoById()
     *
     * @param mixed $id
     * @return
     */
    static public function getInfoById($id){
        if(empty($id)) throw new MyException('ID不能为空', 101);

        return Table_interfaceIn::getInfoById($id);
    }


    /**
     *interfaceIn::getInfoByType()
     *
     * @param mixed $type
     * @return
     */
    static public function getInfoByType($type){
        if(empty($type)) throw new MyException('ID不能为空', 101);

        return Table_interfaceIn::getInfoByType($type);
    }
    /**
     * interfaceIn::getName()
     *
     * @param mixed $tag
     * @return
     */
    static public function getName($type){
        switch($type){
            case 1:
                return '媒体中心1';
                break;

            case 2:
                return '爬虫中心';
                break;

            case 3:
                return '内容解析中心';
                break;

            case 4:
            return '外部服务器接口';
            break;

            case 5:
                return '媒体中心2';
                break;

            case 6:
                return '媒体中心3';
                break;

            default:
                return false;
                break;
        }
    }
    /**
     * interfaceIn::add()
     *
     * @param array $interfaceInAttr
     * $interfaceInAttr数组键：name, addr, type,
     *
     * @return
     */
    static public function add($interfaceInAttr){

        //参数较多，校验较多。而且添加和修改的操作校验相同。所以单独做个函数
        $okAttr = self::checkInterfaceInInputParam($interfaceInAttr);

        $rs = Table_interfaceIn::add($okAttr);

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
     * interfaceIn::edit()
     *
     * @param mixed $id
     * @param array $interfaceInAttr
     * $interfaceInAttr数组键：id, name, url, depth, start_url, status, interval, last_time
     *
     * @return
     */
    static public function edit($id, $interfaceInAttr){

        if(empty($id)) throw new MyException('ID不能为空', 100);

        $okAttr = self::checkinterfaceInInputParam($interfaceInAttr);

        $rs = Table_interfaceIn::edit($id, $okAttr);

        if($rs >= 0){
            $msg = '修改接口信息('.$okAttr['name'].')';
            //Adminlog::add($msg);

            return action_msg($msg, 1);
        }else{
            throw new MyException('操作失败', 106);
        }
    }


    /**
     * interfaceIn::checkInterfaceInInputParam()
     *
     * @param array $interfaceInAttr
     *
     * @return void
     */
    static private function checkInterfaceInInputParam($interfaceInAttr){
        if(empty($interfaceInAttr) || !is_array($interfaceInAttr)) throw new MyException('参数错误', 100);
        if(empty($interfaceInAttr['addr'])) throw new MyException('接口地址不能为空', 101);
        return $interfaceInAttr;
    }

    /**
     * interfaceIn::getList()
     *
     * @param integer $page
     * @param integer $pagesize
     * @return
     */
    static public function getList($page = 1, $pagesize = 10,$count=0){

        if(!preg_match('/^\d+$/', $page)) $page = 1;
        if(!preg_match('/^\d+$/', $pagesize)) $pagesize = 10;

        return Table_interfaceIn::getList($page, $pagesize,$count=0);
    }

    /**
     *interfaceIn::getAllList()
     *
     * @param integer $page
     * @param integer $pagesize
     * @return
     */
    static public function getAllList(){


        return Table_interfaceIn::getAllList();
    }

    /**
     * interfaceIn::getCount()
     *
     * @param integer $sort
     * @param integer $status
     * @return
     */
    static public function getCount(){

        return Table_interfaceIn::getCount();

    }


    /**
     * interfaceIn::del()
     *
     * @param mixed $id
     * @return
     */
    static public function del($id){

        if(empty($id))throw new MyException('ID不能为空', 101);



        $rs = Table_interfaceIn::del($id);
        if($rs == 1){
            //TODO 删除服务器接口信息

            $msg = '删除服务器接口信息('.$id.')成功!';
            //Adminlog::add($msg);

            return action_msg($msg, 1);
        }else{
            throw new MyException('操作失败', 102);
        }
    }


    /**
     * interfaceIn::searchByType()  根据类型查找
     * @param array $params
     * @param integer $tag
     * @return
     */
    //$tag -1 外部服务器  -2 内部接口
    static public function searchByType($params, $tag){


        return Table_interfaceIn::searchByType($params, $tag);
    }

    static public function search($params){

        return Table_interfaceIn::search($params);
    }

    /**
     * interfaceIn::searchByTypeCount()  根据类型计数
     * @param array $params
     * @param integer $tag
     * @return
     */
    static public function searchByTypeCount($params,$tag){

        return Table_interfaceIn::searchByTypeCount($params, $tag);
    }

    static public function searchCount($params){

        return Table_interfaceIn::searchCount($params);
    }

}
?>