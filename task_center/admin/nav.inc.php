<div id="topmenu">
	<ul>
		<li><a href="index.php" <?php if($FLAG_TOPNAV=='index') echo ' class="active"';?> title="系统首页">系统首页</a></li>
		<li><a href="process_task_list.php" <?php if($FLAG_TOPNAV == 'process') echo 'class="active"';?> title="进程管理">进程管理</a></li>
		<li><a href="site_list.php" <?php if($FLAG_TOPNAV == 'media') echo 'class="active"';?> title="媒体中心">媒体中心</a></li>
		<li><a href="parse_rule_list.php" <?php if($FLAG_TOPNAV == 'content') echo 'class="active"';?> title="解析中心">解析中心</a></li>
		<li><a href="admingroup_list.php" <?php if($FLAG_TOPNAV == 'system') echo ' class="active"';?> title="系统设置">系统设置</a></li>
	</ul>
</div>