<?php

/**
 * 提取规则配置菜单
 * @version		    $Id$
 * @createtime		2018/10/27
 * @updatetime		2018/11/2
 * @author          zhfang
 * @copyright		Copyright (c) 芝麻开发 (http://www.zhimawork.com)
 */
?>
<div id="leftmenu">
    <?php
    $sessionAuth = explode('|', $ADMINAUTH);
    if(in_array('7001', $sessionAuth)){
        echo '<div class="menu2"><a';
        if($FLAG_LEFTMENU == 'parse_rule_list') echo ' class="active"';
        echo ' href="parse_rule_list.php">规则列表</a></div><div class="menuline"></div>';
    }
//    if(in_array('7002', $sessionAuth)){
//        echo '<div class="menu2"><a';
//        if($FLAG_LEFTMENU == 'parse_list') echo ' class="active"';
//        echo ' href="parse_list.php">新闻类</a></div><div class="menuline"></div>';
//    }
//    if(in_array('7003', $sessionAuth)){
//        echo '<div class="menu2"><a';
//        if($FLAG_LEFTMENU == 'bbs_rule_list') echo ' class="active"';
//        echo ' href="bbs_rule_list.php">论坛类</a></div><div class="menuline"></div>';
//    }
//    if(in_array('7004', $sessionAuth)){
//        echo '<div class="menu2"><a';
//        if($FLAG_LEFTMENU == 'blog_rule_list') echo ' class="active"';
//        echo ' href="blog_rule_list.php">博客类</a></div><div class="menuline"></div>';
//    }
//    if(in_array('7005', $sessionAuth)){
//        echo '<div class="menu2"><a';
//        if($FLAG_LEFTMENU == 'video_rule_list') echo ' class="active"';
//        echo ' href="video_rule_list.php">视频类</a></div><div class="menuline"></div>';
//    }
    ?>
</div>