<?php
/**
 * 处理规则  rules_interfaceUse_do.php
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
        $url            =  $_POST['url'];
        $example        =  $_POST['example'];
        $tag            =  safeCheck($_POST['tag']);
        $is_param       =  safeCheck($_POST['is_param']);
        $siteid         =  safeCheck($_POST['siteid']);

        //构造需要传递的数组参数
        $SiteAttr = array(
            'method'                => $method,//接口方法名
            'post_url'              => $post_url,//接口地址
            'url'                   => $url,//接口地址
            'example'               => $example,//媒体名称
            'tag'                   => $tag,//深度
            'siteid'                => $siteid,//备注信息
            'is_param'              => $is_param//状态信息
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
        $url            =  $_POST['url'];
        $example        =  safeCheck($_POST['example'],0);
        $tag            =  safeCheck($_POST['tag']);
        $siteid          =  safeCheck($_POST['siteid']);
        $is_param         =  safeCheck($_POST['is_param']);

        $SiteAttr = array(
            'id'                    => $id,
            'method'                => $method,//接口方法名
            'post_url'              => $post_url,//接口地址
            'url'                   => $url,//接口地址
            'example'               => $example,//媒体名称
            'tag'                   => $tag,//深度
            'siteid'                => $siteid,//备注信息
            'is_param'              => $is_param//状态信息
        );

        try {

            $rs = Interfaceuse::edit($SiteAttr);
            echo $rs;
        }catch (MyException $e){
            echo $e->jsonMsg();
        }
        break;

    case 'del'://删除

            $id             = safeCheck($_POST['id']);
            $table_name     = safeCheck($_POST['table_name'],0);
            $post_url       = $_POST['post_url'];
            $method         = safeCheck($_POST['method'],0);

            $SiteAttr = array(

                'id'            => $id,
                'table_name'    => $table_name,
                'post_url'      => $post_url,
                'method'        => $method

            );

            try {
                $rs = Interfaceuse::del($SiteAttr);
                echo $rs;
            }catch (MyException $e){
                echo $e->jsonMsg();
            }

        break;


}
?>