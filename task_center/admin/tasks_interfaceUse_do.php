<?php
/**
 * 处理任务  tasks_interfaceUse_do.php
 *
 * @version		    $Id$
 * @createtime		2018/11/17
 * @updatetime		2018/11/17
 * @author          tengyingzhi
 * @copyright		Copyright (c) 芝麻开发 (http://www.zhimawork.com)
 */
require_once('admin_init.php');
require_once('admincheck.php');

$POWERID = '7009';//权限
Admin::checkAuth($POWERID, $ADMINAUTH);
$act = safeCheck($_GET['act'], 0);
switch($act){

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