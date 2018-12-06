
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
        case 'add'://添加邮箱
            $center  =  safeCheck($_POST['center'], 0);
            $email_addr  =  safeCheck($_POST['email_addr'], 0);

            try {

               $rs = Email::add($center,$email_addr);
               echo $rs;
            }catch (MyException $e){
                echo $e->jsonMsg();
            }
            break;

        case 'edit'://编辑邮箱
            $id            = safeCheck($_POST['id']);
            $center = safeCheck($_POST['center'], 0);
            $email_addr   = safeCheck($_POST['email_addr'],0);

            try {
                $rs = Email::update($id, $center,$email_addr);
                echo $rs;
            }catch (MyException $e){
                echo $e->jsonMsg();
            }
            break;

        case 'del'://删除管理员
            $id = safeCheck($_POST['id']);

            try {
                $rs = Email::delete($id);
                echo $rs;
            }catch (MyException $e){
                echo $e->jsonMsg();
            }
            break;

    }

?>