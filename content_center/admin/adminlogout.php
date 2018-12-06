<?php
	/**
	 * 登出表单处理 adminlogout.php
	 *
	 * @version		$Id$
	 * @createtime		2018/03/01
	 * @updatetime		2018/03/01
	 * @author         空竹
	 * @copyright		Copyright (c) 芝麻开发 (http://www.zhimawork.com)
	 */
	require_once('admin_init.php');
	Admin::logout();
	header("Location: adminlogin.html");exit();
?>