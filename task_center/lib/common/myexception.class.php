<?php

/**
 * exception.class.php 错误类文件
 *
 * @version		$Id$
 * @createtime		2018/03/01
 * @updatetime		2018/03/01
 * @author         空竹
 * @copyright		Copyright (c) 芝麻开发 (http://www.zhimawork.com)
 */

class MyException extends Exception {

	public function jsonMsg(){

		$code = $this->getCode();
		$msg  = $this->getMessage();

		return action_msg($msg, $code, 1);
	}

}
?>