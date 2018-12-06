<?php
/**
 * 媒体管理菜单
 * @version		    $Id$
 * @createtime		2018/10/28
 * @updatetime		2018/10/28
 * @author          zhfang
 * @copyright		Copyright (c) 芝麻开发 (http://www.zhimawork.com)
 */
?>
<div id="leftmenu">
    <?php
    $sessionAuth = explode('|', $ADMINAUTH);
    if(in_array('7001', $sessionAuth)){
        echo '<div class="menu2"><a';
        if($FLAG_LEFTMENU == 'user_list') echo ' class="active"';
        echo ' href="user_list.php">会员管理</a></div><div class="menuline"></div>';
    }
    if(in_array('7002', $sessionAuth)){
        echo '<div class="menu2"><a';
        if($FLAG_LEFTMENU == 'qq_cookie_list') echo ' class="active"';
        echo ' href="qq_list.php">QQ_cookie管理</a></div><div class="menuline"></div>';
    }
    if(in_array('7003', $sessionAuth)){
        echo '<div class="menu2"><a';
        if($FLAG_LEFTMENU == 'weixin_cookie_list') echo ' class="active"';
        echo ' href="weixin_cookies.php">微信_cookie管理</a></div><div class="menuline"></div>';
    }
    if(in_array('7004', $sessionAuth)){
        echo '<div class="menu2"><a';
        if($FLAG_LEFTMENU == 'keyword_list') echo ' class="active"';
        echo ' href="keyword_list.php">关键词列表</a></div><div class="menuline"></div>';
    }
    if(in_array('7005', $sessionAuth)){
        echo '<div class="menu2"><a';
        if($FLAG_LEFTMENU == 'filter_keyword') echo ' class="active"';
        echo ' href="filter_keyword.php">过滤词列表</a></div><div class="menuline"></div>';
    }
    ?>
</div>
