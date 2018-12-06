<?php
/**
 * 媒体设置菜单  media_menu.inc.php
 *
 * @version		    $Id$
 * @createtime		2018/3/1
 * @updatetime		2018/11/12
 * @author          tengyingzhi
 * @copyright		Copyright (c) 芝麻开发 (http://www.zhimawork.com)
 */
?>
<div id="leftmenu">
    <div class="menu1"><a href="parse_rule_list.php">解析中心</a></div>
    <?php
    $sessionAuth = explode('|', $ADMINAUTH);
    if(in_array('70010', $sessionAuth)){
        echo '<div class="menu2"><a';
        if($FLAG_LEFTMENU == 'parse_rule_list') echo ' class="active"';
        echo ' href="parse_rule_list.php">规则列表</a></div><div class="menuline"></div>';
    }
    ?>
</div>