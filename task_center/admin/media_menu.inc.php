<?php
/**
 * 媒体设置菜单  media_menu.inc.php
 *
 * @version		    $Id$
 * @createtime		2018/3/1
 * @updatetime		2018/11/11
 * @author          tengyingzhi
 * @copyright		Copyright (c) 芝麻开发 (http://www.zhimawork.com)
 */
?>
<div id="leftmenu">
    <div class="menu1"><a href="media_center_list.php">媒体中心</a></div>
    <?php
    $sessionAuth = explode('|', $ADMINAUTH);
    if(in_array('7006', $sessionAuth)){
        echo '<div class="menu2"><a';
        if($FLAG_LEFTMENU == 'site_list') echo ' class="active"';
        echo ' href="site_list.php">媒体链接列表</a></div><div class="menuline"></div>';
    }
    if(in_array('7009', $sessionAuth)){
        echo '<div class="menu2"><a';
        if($FLAG_LEFTMENU == 'task_list') echo ' class="active"';
        echo ' href="task_list.php">任务列表</a></div><div class="menuline"></div>';
    }

    ?>
</div>