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
    <div class="menu1"><a href="#">邮箱设置</a></div>
    <?php
    $sessionAuth = explode('|', $ADMINAUTH);

        echo '<div class="menu2"><a';
        echo ' href="mail_list.php">邮箱设置</a></div><div class="menuline"></div>';


    ?>
</div>