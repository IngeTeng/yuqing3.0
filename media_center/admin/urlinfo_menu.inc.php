<?php
	/**
	 * 媒体设置菜单  url_menu.inc.php
	 *
	 * @version		    $Id$
	 * @createtime		2018/10/25
	 * @updatetime		2018/10/25
	 * @author          tengyingzhi
	 * @copyright		Copyright (c) 芝麻开发 (http://www.zhimawork.com)
	 */
?>
<div id="leftmenu">
	<div class="menu1"><a href="urlinfo_list.php">媒体设置</a></div>
	<?php
    $sessionAuth = explode('|', $ADMINAUTH);
    if(in_array('7004', $sessionAuth)){
		echo '<div class="menu2"><a';
		if($FLAG_LEFTMENU == 'urlinfo_list') echo ' class="active"';
		echo ' href="urlinfo_list.php">媒体链列表</a></div><div class="menuline"></div>';
	}

	$sessionAuth = explode('|', $ADMINAUTH);
	if(in_array('7004', $sessionAuth)){
		echo '<div class="menu2"><a';
		if($FLAG_LEFTMENU == 'task_list') echo ' class="active"';
		echo ' href="task_list.php">任务列表</a></div><div class="menuline"></div>';
	}
	?>
	
</div>