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
		case 'add'://添加管理员
			$account   =  safeCheck($_POST['account'], 0);
			$password  =  safeCheck($_POST['password'], 0);
			$group     =  safeCheck($_POST['group']);
			
            try {
				$rs = Admin::add($account, $password, $group);
				echo $rs;
			}catch (MyException $e){
				echo $e->jsonMsg();
			}
			break;
            
		case 'edit'://编辑管理员
			$id            = safeCheck($_POST['id']);
			$account = safeCheck($_POST['account'], 0);
			$group   = safeCheck($_POST['group']);
   
            try {
				$rs = Admin::edit($id, $account, $group);
				echo $rs;
			}catch (MyException $e){
				echo $e->jsonMsg();
			}
			break;
            
		case 'del'://删除管理员
			$id = safeCheck($_POST['id']);
            
            try {
				$rs = Admin::del($id);
				echo $rs;
			}catch (MyException $e){
				echo $e->jsonMsg();
			}
			break;
            
		case 'reset'://重置密码
			$id = safeCheck($_POST['id']);
			$newpass = 'zhima999';
            
            try{
                $r = Admin::resetPwd($id, $newpass);
                echo $r;
            }catch(MyException $e){
                echo $e->jsonMsg();
            }
			break;
            
	}
?>