<?php

/**
 * autoloader.class.php 自动加载类
 *
 * 只自动加载lib下的业务类、common下的常用类以及table层的类。
 *
 * @version		$Id$
 * @createtime		2018/03/01
 * @updatetime		2018/03/01
 * @author         空竹
 * @copyright		Copyright (c) 芝麻开发 (http://www.zhimawork.com)
 */

class Autoloader {
	
	/**
	 * 构造函数
	 * 
	 * @return void
	 */
	public function __construct() {
		
	}
	
	/**
	 * autoload
	 * 
	 * @return void
	 */
	public static function autoload($classname) {
		global $LIB_PATH, $LIB_COMMON_PATH, $LIB_TABLE_PATH;
        
		$classname = strtolower($classname);//文件名都是小写的
		
		//加载公用类
		$filename = $LIB_COMMON_PATH.$classname.".class.php";
        if(is_file($filename)) {
            include $filename;
            return;
        }

		//加载table层类
		$filename = $LIB_TABLE_PATH.$classname.".class.php";
        if(is_file($filename)) {
            include $filename;
            return;
        }
		
		//加载业务类
        $filename = $LIB_PATH.$classname.".class.php";
        if(is_file($filename)) {
            include $filename;
            return;
        }
    }
}
?>