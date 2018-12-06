<?php
	/**
	 * 登录表单处理 adminlogin_do.php
	 *
	 * @version		$Id$
	 * @createtime		2018/03/01
	 * @updatetime		2018/03/01
	 * @author         空竹
	 * @copyright		Copyright (c) 芝麻开发 (http://www.zhimawork.com)
	 */
	require_once('admin_init.php');

	//获取值
	$account   = safeCheck($_POST['account'], 0);
	$password  = safeCheck($_POST['pass'], 0);
    
	$vercode   = safeCheck($_POST['vercode'], 0);
	$remember  = safeCheck($_POST['remember']);//是否记住cookie

	//校验验证码
	if($vercode != $_SESSION['ZhimaPHP_imgcode']){
		echo action_msg('验证码错误', -4);
        exit();
	}else{
		try {
			$admin = new Admin();
			$r = $admin->login($account, $password, $remember);
			echo $r;
		}catch(MyException $e){
			echo $e->jsonMsg();
		}
	}
	
?>