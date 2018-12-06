<div id="topmenu">
	<ul>
		<li><a href="index.php" <?php if($FLAG_TOPNAV=='index') echo ' class="active"';?> title="系统首页">系统首页</a></li>
<!--		<li><a href="site_list.php" --><?php //if($FLAG_TOPNAV == 'DAQsites') echo 'class="active"';?><!-- title="采集站点设置">采集站点设置</a></li>-->
		<li><a href="parse_rule_list.php" <?php if($FLAG_TOPNAV == 'rules') echo ' class="active"';?> title="提取规则配置">提取规则配置</a></li>
<!--		<li><a href="words_list.php?type=1" --><?php //if($FLAG_TOPNAV == 'words') echo ' class="active"';?><!-- title=调性词管理>调性词管理</a></li>-->
<!--		<li><a href="media_list.php" --><?php //if($FLAG_TOPNAV == 'media') echo ' class="active"';?><!-- title="媒体管理">媒体管理</a></li>-->
<!--		<li><a href="user_list.php" --><?php //if($FLAG_TOPNAV == 'sysmng') echo ' class="active"';?><!-- title="系统管理">系统管理</a></li>-->
		<li><a href="admingroup_list.php" <?php if($FLAG_TOPNAV == 'system') echo ' class="active"';?> title="系统设置">系统设置</a></li>
	</ul>
</div>