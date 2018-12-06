<?php
	/**
	 * 处理媒体链接  Site_do.php
	 *
	 * @version		    $Id$
	 * @createtime		2018/10/25
	 * @updatetime		2018/10/25
	 * @author          tengyingzhi
	 * @copyright		Copyright (c) 芝麻开发 (http://www.zhimawork.com)
	 */
	require_once('admin_init.php');
	require_once('admincheck.php');

	$POWERID = '7002';//权限
	Admin::checkAuth($POWERID, $ADMINAUTH);
	$act = safeCheck($_GET['act'], 0);
	switch($act){
		case 'add'://添加媒体url
            $name           =  safeCheck($_POST['name'],0);
            $depth          =  safeCheck($_POST['depth']);
            $interval       =  safeCheck($_POST['interval']);
            $status         =  safeCheck($_POST['status']);
            $start_url      =  $_POST['start_url'];
            $source         =  safeCheck($_POST['source']);

			//构造需要传递的数组参数
            $SiteAttr = array(
                'name'                	=> $name,//媒体名称
                'depth'                 => $depth,//深度
                'interval'              => $interval,//备注信息
                'status'                => $status,//状态信息
                'start_url'             => $start_url,//媒体链接
                'source'             	=> $source//备注信息
                );

            try {
				$rs = Site::add($SiteAttr);
				echo $rs;
			}catch (MyException $e){
				echo $e->jsonMsg();
			}
			break;

		case 'edit'://编辑媒体信息
			$id     		=  safeCheck($_POST['id']);
            $name           =  safeCheck($_POST['name'],0);
            $depth          =  safeCheck($_POST['depth']);
            $interval       =  safeCheck($_POST['interval']);
            $status         =  safeCheck($_POST['status']);
            $start_url      =  $_POST['start_url'];
            $source         =  safeCheck($_POST['source']);

   			$SiteAttr = array(
                'name'                	=> $name,//媒体名称
                'depth'                 => $depth,//深度
                'interval'              => $interval,//备注信息
                'status'                => $status,//状态信息
                'start_url'             => $start_url,//媒体链接
                'source'             	=> $source//备注信息
                );

            try {

				$rs = Site::edit($id,$SiteAttr);
				echo $rs;
			}catch (MyException $e){
				echo $e->jsonMsg();
			}
			break;

		case 'del'://删除媒体
			$id = safeCheck($_POST['id']);

            try {
				$rs = Site::del($id);
				echo $rs;
			}catch (MyException $e){
				echo $e->jsonMsg();
			}
			break;


	}
?>