<?php
/**
 * 管理员处理  admin_do.php
 *
 * @version		    $Id$
 * @createtime		2018/03/01
 * @updatetime		2018/4/14
 * @author          空竹
 * @copyright		Copyright (c) 芝麻开发 (http://www.zhimawork.com)
 */
require_once('admin_init.php');
require_once('admincheck.php');

$POWERID = '7002';//权限
Admin::checkAuth($POWERID, $ADMINAUTH);

$act = safeCheck($_GET['act'], 0);
switch($act){
    case 'kill'://添加管理员
        $pid   =  safeCheck($_POST['pid'], 0);

        $command = "kill -9 {$pid}";

        system($command,$arr);


        echo action_msg("结束成功",1);
        break;


    case 'add':
        $type   =  safeCheck($_POST['type'], 0);


        $dateStr = date("Ymdhis");
        if($type==1)
        {
            $command = "nohup php {$FILE_PATH}commands/task_control.php >/dev/null &";

            system($command,$arr);

        }
        else if($type==2)
        {
            $command = "nohup php {$FILE_PATH}commands/main.php >/dev/null &";
            //var_dump($command);
            system($command,$arr);
        }


          echo action_msg("创建成功",1);

        break;


}
?>