<?php
/**
 * 处理媒体链接  Site_interfaceUse_do.php
 *
 * @version		    $Id$
 * @createtime		2018/11/17
 * @updatetime		2018/11/17
 * @author          tengyingzhi
 * @copyright		Copyright (c) 芝麻开发 (http://www.zhimawork.com)
 */
require_once('admin_init.php');
require_once('admincheck.php');

$POWERID = '7006';//权限
Admin::checkAuth($POWERID, $ADMINAUTH);
$act = safeCheck($_GET['act'], 0);
switch($act){
    case 'add'://添加媒体url
        $method         =  safeCheck($_POST['method'],0);
        $post_url       =  $_POST['post_url'];
        $name           =  safeCheck($_POST['name'],0);
        $depth          =  safeCheck($_POST['depth']);
        $interval       =  safeCheck($_POST['interval']);
        $status         =  safeCheck($_POST['status']);
        $start_url      =  $_POST['start_url'];
        $source         =  safeCheck($_POST['source']);
        //构造需要传递的数组参数
        $SiteAttr = array(
            'method'                => $method,//接口方法名
            'post_url'              => $post_url,//接口地址
            'name'                	=> $name,//媒体名称
            'depth'                 => $depth,//深度
            'interval'              => $interval,//备注信息
            'status'                => $status,//状态信息
            'start_url'             => $start_url,//媒体链接
            'source'             	=> $source//备注信息
        );

        try {
            $rs = Interfaceuse::add($SiteAttr);
            echo $rs;
        }catch (MyException $e){
            echo $e->jsonMsg();
        }
        break;

    case 'edit'://编辑媒体信息
        $id     		=  safeCheck($_POST['id']);
        $method         =  safeCheck($_POST['method'],0);
        $post_url       =  $_POST['post_url'];
        $name           =  safeCheck($_POST['name'],0);
        $depth          =  safeCheck($_POST['depth']);
        $interval       =  safeCheck($_POST['interval']);
        $status         =  safeCheck($_POST['status']);
        $start_url      =  $_POST['start_url'];
        $source         =  safeCheck($_POST['source']);

        $SiteAttr = array(
            'id'                    => $id,
            'method'                => $method,//接口方法名
            'post_url'              => $post_url,//接口地址
            'name'                	=> $name,//媒体名称
            'depth'                 => $depth,//深度
            'interval'              => $interval,//备注信息
            'status'                => $status,//状态信息
            'start_url'             => $start_url,//媒体链接
            'source'             	=> $source//备注信息
        );

        try {

            $rs = Interfaceuse::edit($SiteAttr);
            echo $rs;
        }catch (MyException $e){
            echo $e->jsonMsg();
        }
        break;

    case 'del'://删除媒体
        //权限判断
        $POWERID        = '7008';//权限
        $tag = Admin::checkAuth_page($POWERID, $ADMINAUTH);

        if($tag == 2)
        {
            echo action_msg("没有删除权限",6);
        }
        else {
            $id = safeCheck($_POST['id']);
            $table_name = safeCheck($_POST['table_name'], 0);
            $post_url = $_POST['post_url'];
            $method = safeCheck($_POST['method'], 0);

            $SiteAttr = array(

                'id' => $id,
                'table_name' => $table_name,
                'post_url' => $post_url,
                'method' => $method

            );

            try {
                $rs = Interfaceuse::del($SiteAttr);
                echo $rs;
            } catch (MyException $e) {
                echo $e->jsonMsg();
            }
        }
        break;


}
?>