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
    <div class="menu1"><a href="process_task_list.php">进程管理</a></div>
    <?php
    $sessionAuth = explode('|', $ADMINAUTH);
    if(in_array('7005', $sessionAuth)){
        echo '<div class="menu2"><a';
        if($FLAG_LEFTMENU == 'process_task_list') echo ' class="active"';
        echo ' href="process_task_list.php">任务进程</a></div><div class="menuline"></div>';
    }
    if(in_array('7004', $sessionAuth)){
        echo '<div class="menu2"><a';
        if($FLAG_LEFTMENU == 'process_main_list') echo ' class="active"';
        echo ' href="process_main_list.php">主进程</a></div><div class="menuline"></div>';
    }

    ?>
</div>