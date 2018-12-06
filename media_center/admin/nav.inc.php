<div id="topmenu">
	<ul>
		<li><a href="index.php" <?php if($FLAG_TOPNAV=='index') echo ' class="active"';?> title="系统首页">系统首页</a></li>
		<li><a href="urlinfo_list.php" <?php if($FLAG_TOPNAV == 'urlinfo') echo 'class="active"';?> title="媒体数据中心">媒体数据中心</a></li>
		<!-- <li><a href="#" <?php if($FLAG_TOPNAV == 'order') echo ' class="active"';?> title="菜单示例">菜单示例</a></li> -->
		<li><a href="admingroup_list.php" <?php if($FLAG_TOPNAV == 'system') echo ' class="active"';?> title="系统设置">系统设置</a></li>
	</ul>
</div>