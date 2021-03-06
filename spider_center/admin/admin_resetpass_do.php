<?php
	/**
	 * 管理员修改自己的密码  admin_resetpass_do.php
	 *
	 * @version		    $Id$
	 * @createtime		2018/03/01
	 * @updatetime		2018/4/19
	 * @author          空竹
	 * @copyright		Copyright (c) 芝麻开发 (http://www.zhimawork.com)
	 */
	require_once('admin_init.php');
	require_once('admincheck.php');

	$act = safeCheck($_GET['act'], 0);
	switch($act){
            
		case 'editpass'://修改密码
			$old_password = safeCheck($_POST['old_password'], 0);
			$new_password = safeCheck($_POST['new_password'], 0);
			$re_password  = safeCheck($_POST['re_password'], 0);
            
			if($new_password != $re_password){
				echo action_msg('两次密码不一致', -1);
                exit();
			}
			try {
				$r = $ADMIN->updatePwd($old_password, $new_password);
				echo $r;
			}catch (MyException $e){
				echo $e->jsonMsg();
			}
			break;
	}
?>