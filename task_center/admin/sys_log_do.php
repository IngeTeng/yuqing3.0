<?php
	/**
	 * 系统日志处理文件  sys_log_do.php
	 *
	 * @version		    $Id$
	 * @createtime		2018/4/17
	 * @updatetime		2018/4/17
	 * @author          空竹
	 * @copyright		Copyright (c) 芝麻开发 (http://www.zhimawork.com)
	 */
	require_once('admin_init.php');
	require_once('admincheck.php');

	$POWERID = '70013';//权限
	Admin::checkAuth($POWERID, $ADMINAUTH);

	$act = safeCheck($_GET['act'], 0);
	switch($act){
		case 'clear'://清空日志
			$type  =  safeCheck($_POST['type'], 0);
			
            try {
				$rs = $mylog->clear($type);
				echo $rs;
			}catch (MyException $e){
				echo $e->jsonMsg();
			}
		break;
	}
?>