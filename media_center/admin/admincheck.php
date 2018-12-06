<?php
/**
 * 管理员登陆验证  admincheck.php
 *
 * @version		    $Id$
 * @createtime		2018/03/01
 * @updatetime		2018/03/01
 * @author          空竹
 * @copyright		Copyright (c) 芝麻开发 (http://www.zhimawork.com)
 */
require_once('admin_init.php');

$check = Admin::checkLogin();
if(empty($check)) {
	header('Location: adminlogin.html');
	exit();//header()之后一定要加上退出
}else{
    $adminId = Admin::getSession();
	$ADMIN = new Admin($adminId);
	$ADMINGROUP = new Admingroup($ADMIN->getGroupID());
	$ADMINAUTH = $ADMINGROUP->getAuth();
}
	
?>