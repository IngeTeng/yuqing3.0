<?php
/**
 * 处理任务列表  task_do.php
 *
 * @version		    $Id$
 * @createtime		2018/11/09
 * @updatetime		2018/11/09
 * @author          tengyingzhi
 * @copyright		Copyright (c) 芝麻开发 (http://www.zhimawork.com)
 */
require_once('admin_init.php');
require_once('admincheck.php');

$POWERID = '7002';//权限
Admin::checkAuth($POWERID, $ADMINAUTH);
$act = safeCheck($_GET['act'], 0);
switch($act){


    case 'del'://删除任务
        $id = safeCheck($_POST['id']);

        try {
            $rs = Task::del($id);
            echo $rs;
        }catch (MyException $e){
            echo $e->jsonMsg();
        }
        break;


}
?>