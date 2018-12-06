<?php
	/**
	 * 系统设置菜单  admin_menu.inc.php
	 *
	 * @version		    $Id$
	 * @createtime		2018/3/1
	 * @updatetime		2018/4/17
	 * @author          空竹
	 * @copyright		Copyright (c) 芝麻开发 (http://www.zhimawork.com)
	 */
?>
<div id="leftmenu">
	<div class="menu1"><a href="admingroup_list.php">管理设置</a></div>
	<?php
    $sessionAuth = explode('|', $ADMINAUTH);
    if(in_array('7001', $sessionAuth)){
		echo '<div class="menu2"><a';
		if($FLAG_LEFTMENU == 'admingroup_list') echo ' class="active"';
		echo ' href="admingroup_list.php">管理员组</a></div><div class="menuline"></div>';
	}
    if(in_array('7002', $sessionAuth)){
		echo '<div class="menu2"><a';
		if($FLAG_LEFTMENU == 'admin_list') echo ' class="active"';
		echo ' href="admin_list.php">管理员</a></div><div class="menuline"></div>';
	}
	if(in_array('7003', $sessionAuth)){
		echo '<div class="menu2"><a';
		if($FLAG_LEFTMENU == 'adminlog_list') echo ' class="active"';
		echo ' href="adminlog_list.php">管理员日志</a></div><div class="menuline"></div>';
	}
	?>

	<div class="menu1"><a href="sys_sec_info.php">接口设置</a></div>
	<?php
	if(in_array('7003', $sessionAuth)){
		echo '<div class="menu2"><a';
		if($FLAG_LEFTMENU == 'interfaceIn') echo ' class="active"';
		echo ' href="interfaceIn_list.php">接口地址</a></div><div class="menuline"></div>';
	}
	if(in_array('7003', $sessionAuth)){
		echo '<div class="menu2"><a';
		if($FLAG_LEFTMENU == 'serverOut') echo ' class="active"';
		echo ' href="serverOut_list.php">服务器接口</a></div><div class="menuline"></div>';
	}
	?>


	<div class="menu1"><a href="sys_sec_info.php">系统信息</a></div>
	<?php
	if(in_array('7003', $sessionAuth)){
		echo '<div class="menu2"><a';
		if($FLAG_LEFTMENU == 'sys_sec_info') echo ' class="active"';
		echo ' href="sys_sec_info.php">安全信息</a></div><div class="menuline"></div>';
	}
	if(in_array('7003', $sessionAuth)){
		echo '<div class="menu2"><a';
		if($FLAG_LEFTMENU == 'sys_tech_info') echo ' class="active"';
		echo ' href="sys_tech_info.php">技术信息</a></div><div class="menuline"></div>';
	}
	if(in_array('7003', $sessionAuth)){
		echo '<div class="menu2"><a';
		if($FLAG_LEFTMENU == 'sys_log') echo ' class="active"';
		echo ' href="sys_log_common.php">系统日志</a></div><div class="menuline"></div>';
	}
	?>
</div>