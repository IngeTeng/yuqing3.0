<?php
	/**
	 * 编辑管理员组权限  admingroup_auth.php
	 *
	 * @version		$Id$
	 * @createtime		2018/03/01
	 * @updatetime		2018/03/01
	 * @author         空竹
	 * @copyright		Copyright (c) 芝麻开发 (http://www.zhimawork.com)
	 */
    require_once('admin_init.php');
	require_once('admincheck.php');

	$POWERID = '7001';//权限
    Admin::checkAuth($POWERID, $ADMINAUTH);

    $FLAG_TOPNAV   =  "system";
    $FLAG_LEFTMENU =  'admingroup_list';

	//组权限
	$id = safeCheck($_GET['id']);
	try {
		$group = new Admingroup($id);
		$groupId   = $id;
		$groupName = $group->name;
		$groupAuth = explode('|', $group->auth);
	} catch(MyException $e){
		echo $e->getMessage();
		exit();
	}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta name="author" content="芝麻开发 http://www.zhimawork.com" />
		<title>管理员权限修改 - 管理系统 </title>
		<link rel="stylesheet" href="css/style.css" type="text/css" />
		<link rel="stylesheet" href="css/form.css" type="text/css" />
		<script type="text/javascript" src="js/jquery-1.11.1.min.js"></script>
		<script type="text/javascript" src="js/common.js"></script>
		<script type="text/javascript" src="js/layer/layer.js"></script>
		<script type="text/javascript">
			$(function(){
				// 返回
				$('#btn_back').click(function(){
					window.location.href = 'admingroup_list.php';
				});

				$('#btn_submit').click(function(){
				    var powernum =  $('#formlist p > .checkbox-input').length;
                    var powerlist = '';
                    var id = $("#gid").val();
                    for(i=0; i<powernum; i++){
                        if($('#formlist p > .checkbox-input').eq(i).prop('checked')){
                            powerlist = $('#formlist p > .checkbox-input').eq(i).val() + '|' + powerlist;
                        }
                    }
                    $.getJSON('admingroup_do.php?act=updateauth',{id : id, auth : powerlist},function(data){
                        var code = data.code;
						var msg  = data.msg;
						switch(code){
							case 1:
								layer.alert(msg, {icon: 6}, function(index){
									location.reload();
								});
								break;
							default:
								layer.alert(msg, {icon: 5});
						}
                    });
				});

			});
				
		</script>
	</head>
	<body>
		<div id="header">
			<?php include('top.inc.php');?>
			<?php include('nav.inc.php');?>
		</div>
		<div id="container">
			<?php include('admin_menu.inc.php');?>
			<div id="maincontent">
				<div id="formlist" style="padding:0 40px;">
					<h3>编辑“<?php echo $groupName?>”的权限</h3>
					<p>
 						<input type="checkbox" class="checkbox-input" value="7001" <?php if(in_array(7001, $groupAuth)) echo 'checked';?> /><span class="radio-text">管理员组</span>
						<input type="checkbox" class="checkbox-input" value="7002" <?php if(in_array(7002, $groupAuth)) echo 'checked';?> /><span class="radio-text">管理员</span>
						<input type="checkbox" class="checkbox-input" value="7003" <?php if(in_array(7003, $groupAuth)) echo 'checked';?> /><span class="radio-text">管理员日志</span>
					</p>

                    <p>
        				<input type="submit" id="btn_submit" class="btn_submit" value="提交" />
						<input type="button" id="btn_back" class="btn_back" value="返回"/>
                        <input type="hidden" id="gid" value="<?php echo $groupId;?>" />
        			</p>
        		</div>
			</div>
			<div class="clear"></div>
		</div>
		<?php include('footer.inc.php');?>
	</body>
</html>

