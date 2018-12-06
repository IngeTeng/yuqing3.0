<?php
	/**
	 * 处理匹配规则  match_do.php
	 *
	 * @version		    $Id$
	 * @createtime		2018/10/30
	 * @updatetime		2018/10/30
	 * @author          tengyingzhi
	 * @copyright		Copyright (c) 芝麻开发 (http://www.zhimawork.com)
	 */
	require_once('admin_init.php');
	require_once('admincheck.php');

	$POWERID = '7004';//权限
	Admin::checkAuth($POWERID, $ADMINAUTH);

	$act = safeCheck($_GET['act'], 0);
	switch($act){
		case 'add'://添加过滤规则
			$example_site   	=  safeCheck($_POST['example_site'],0);
			$url 			=  safeCheck($_POST['url'],0);
			$tag     		=  safeCheck($_POST['tag']);
            $is_param    		=  safeCheck($_POST['is_param']);

            $siteid    		=  safeCheck($_POST['siteid']);

            try {


                $pregUrl = pregQuote($url);

                $flag = preg_match($pregUrl,$example_site);

                if(!$flag) throw new MyException("匹配规则不能正确匹配示例网址",101);


                //构造需要传递的数组参数
                $matchAttr = array(

                    'example'=>$example_site,
                    'url'         => $url,
                    'type'          		=> $tag,
                    'siteid'          	=> $siteid,
                    "is_param"=>$is_param


                );


				$rs = Rules::add($matchAttr);
				echo action_msg("添加成功",1);
                //echo $rs;
			}catch (MyException $e){
				echo $e->jsonMsg();
			}
			break;
            
		case 'edit'://编辑过滤规则

            try {

                $id     			= safeCheck($_POST['id']);
                $example_site   	=  safeCheck($_POST['example_site'],0);
                $url 			=  safeCheck($_POST['url'],0);
                $tag     		=  safeCheck($_POST['tag']);
                $siteid    		=  safeCheck($_POST['siteid']);
                $is_param    		=  safeCheck($_POST['is_param']);

                $pregUrl = pregQuote($url);

                $flag = preg_match($pregUrl,$example_site);

                if(!$flag) throw new MyException("匹配规则不能正确匹配示例网址",101);
                $matchAttr = array(
                    'example'=>$example_site,

                    'url'         => $url,
                    'type'          		=> $tag,
                    'siteid'          	=> $siteid,
                    "is_param"=>$is_param


                );
 
				$rs = Rules::edit($id,$matchAttr);
				echo action_msg("修改成功",1);
			}catch (MyException $e){
				echo $e->jsonMsg();
			}
			break;
            
		case 'del'://删除管理员
			$id = safeCheck($_POST['id']);
            
            try {
				$rs = Rules::del($id);
                echo $rs;
				//echo action_msg("删除成功",1);
			}catch (MyException $e){
				echo $e->jsonMsg();
			}
			break;
            
            
	}
?>