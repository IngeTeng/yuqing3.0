<?php

/**
 * setting.inc.php
 * 此处定义无需放在数据库中，又可以方便修改和扩展的数据
 *
 * @version			$Id$
 * @createtime		2018/03/01
 * @updatetime		2018/4/17
 * @author          空竹
 * @copyright		Copyright (c) 芝麻开发 (http://www.zhimawork.com)
 */

//管理员分类
$ARRAY_admin_type = array(
	'0' => '普通管理员组',
	'9' => '超级管理员组'
);

//API相关的设置
$Array_API_Source = array(
    1  => 'weixin',
    2  => 'android',
    3  => 'ios',
    99 => 'test'
);

//调用接口的IP白名单
$Array_API_IP_WhiteList = array(
    '127.0.0.1',
    '192.168.0.1'
);

?>