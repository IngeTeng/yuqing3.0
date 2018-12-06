<?php
	/**
	 * 系统调试日志  sys_log_debug.php
	 *
	 * @version		    $Id$
	 * @createtime		2018/4/17
	 * @updatetime		2018/4/17
	 * @author          空竹
	 * @copyright		Copyright (c) 芝麻开发 (http://www.zhimawork.com)
	 */
	require_once('admin_init.php');
    require_once('admincheck.php');
    
    $FLAG_TOPNAV   = "system";
	$FLAG_LEFTMENU = 'sys_log';

	$POWERID       = '7003';//权限
	Admin::checkAuth($POWERID, $ADMINAUTH);

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta name="author" content="芝麻开发 http://www.zhimawork.com" />
		<title>系统调试日志 - 系统信息 - 管理系统 </title>
		<link rel="stylesheet" href="css/style.css" type="text/css" />
		<link rel="stylesheet" href="css/form.css" type="text/css" />
		<script type="text/javascript" src="js/jquery-1.11.1.min.js"></script>
		<script type="text/javascript" src="js/layer/layer.js"></script>
		<script type="text/javascript" src="js/common.js"></script>
		<script type="text/javascript">
			$(function(){
				//清空日志
				$("#btn_clear").click(function(){
					layer.confirm('确认清空调试日志吗？', {
		            	btn: ['确认','取消']
			            }, function(){
			            	var index = layer.load(0, {shade: false});
			            	$.ajax({
								type        : 'POST',
								data        : {
									type : 'debug'
								},
                                dataType : 'json',
								url : 'sys_log_do.php?act=clear',
								success : function(data){
												layer.close(index);
                                                
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
                                            }
							});
			            }, function(){}
			        );
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
				<div id="tablist">
					<ul>
						<li class="first"><a href="sys_log_common.php">系统日志</a></li>
						<li class="active"><a href="sys_log_debug.php">调试日志</a></li>
					</ul>
					<div class="actor"><input type="button" class="btn-handle btn-red" id="btn_clear" value="清空调试日志"/></div>
				</div>
				<div class="textcontent">
					<?php
						try {
							$r = $mylog->read('debug');
							echo json_decode($r)->msg;
						}catch (MyException $e){
							echo json_decode($e->jsonMsg())->msg;
						}
					?>
				</div>
			</div>
			<div class="clear"></div>
		</div>
		<?php include('footer.inc.php');?>
	</body>
</html>