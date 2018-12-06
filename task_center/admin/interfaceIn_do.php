<?php
/**
 * 处理接口地址  InterfaceIn_do.php
 *
 * @version		    $Id$
 * @createtime		2018/11/08
 * @updatetime		2018/11/08
 * @author          tengyingzhi
 * @copyright		Copyright (c) 芝麻开发 (http://www.zhimawork.com)
 */
require_once('admin_init.php');
require_once('admincheck.php');

$POWERID = '70011';//权限
Admin::checkAuth($POWERID, $ADMINAUTH);
$act = safeCheck($_GET['act'], 0);
switch($act){
    case 'add'://添加接口
        $name           =  safeCheck($_POST['name'],0);
        $addr           =  safeCheck($_POST['addr'],0);
        $type           =  safeCheck($_POST['type']);

        //构造需要传递的数组参数
        $interfaceInAttr = array(
            'name'                	=> $name,//接口名称
            'addr'                  => $addr,//接口地址
            'type'                  => $type//接口类型

        );

        try {
            $rs = InterfaceIn::add($interfaceInAttr);
            echo $rs;
        }catch (MyException $e){
            echo $e->jsonMsg();
        }
        break;

    case 'edit'://编辑媒体信息
        $id     		=  safeCheck($_POST['id']);
        $name           =  safeCheck($_POST['name'],0);
        $addr           =  safeCheck($_POST['addr'],0);
        $type           =  safeCheck($_POST['type']);

        $interfaceInAttr = array(
            'name'                	=> $name,//接口名称
            'addr'                  => $addr,//接口地址
            'type'                  => $type//接口类型
        );

        try {

            $rs = interfaceIn::edit($id,$interfaceInAttr);
            echo $rs;
        }catch (MyException $e){
            echo $e->jsonMsg();
        }
        break;

    case 'del'://删除媒体
        $id = safeCheck($_POST['id']);

        try {
            $rs = interfaceIn::del($id);
            echo $rs;
        }catch (MyException $e){
            echo $e->jsonMsg();
        }
        break;


}
?>