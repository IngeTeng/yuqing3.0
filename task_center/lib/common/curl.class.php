<?php

/**
 * curl.class.php CURL类
 *
 * @version		$Id$
 * @createtime		2018/03/01
 * @updatetime		2018/03/01
 * @author         空竹
 * @copyright		Copyright (c) 芝麻开发 (http://www.zhimawork.com)
 */

class Curl {
	
	/**
	 * post()
	 * 
	 * @param mixed $url
	 * @param mixed $postData 格式形如：id=3&name=tester //// TODO: wait 补充cookie情况和文件提交情况
	 * @param bool $is_https 
	 * @return
	 */
	static public function post($url, $postData, $is_https = false){

        $ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_HEADER, 0); //启用时会将头文件的信息作为数据流输出
		curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
		curl_setopt($ch, CURLOPT_POST, 1);
		if($is_https){
			curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
			curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
		}
		curl_setopt($ch, CURLOPT_POSTFIELDS, $postData);
		$re = curl_exec($ch);
		curl_close($ch);


        return $re;
	}

	/**
	 * get()
	 * 
	 * @param mixed $url
	 * @return
	 */
	static public function get($url, $is_https = false){
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_HEADER, 0); //启用时会将头文件的信息作为数据流输出
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		if($is_https){
			curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
			curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
		}
		$re = curl_exec($ch);
		curl_close($ch);
		return $re;
	}
	

	function get_html_multi($urls=[], $cookie='', $proxy='', $proxy_port='', $referer='', $gzip=false){
		$ch=[];

		for($i=0;$i<count($urls);$i++){
			$ch[$i] = curl_init();
			// 设置选项，包括URL
			curl_setopt($ch[$i], CURLOPT_URL, $urls[$i]);
			curl_setopt($ch[$i], CURLOPT_USERAGENT, 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_7_5) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/33.0.1750.3 Safari/537.36');
			curl_setopt($ch[$i], CURLOPT_RETURNTRANSFER, 1);
			curl_setopt($ch[$i], CURLOPT_CONNECTTIMEOUT, 10);
			curl_setopt($ch[$i], CURLOPT_FOLLOWLOCATION, 1);//允许页面跳转，获取重定向
			curl_setopt($ch[$i], CURLOPT_HEADER, 0);
			curl_setopt($ch[$i], CURLOPT_TIMEOUT, 60);      // 60秒超时
			if($gzip) curl_setopt($ch[$i], CURLOPT_ENCODING, "gzip"); // 编码格式
		
			if($cookie != '') {
				$coo = "Cookie:$cookie";
				$headers[] = $coo;
				curl_setopt($ch[$i], CURLOPT_HTTPHEADER, $headers);
			}
			if($referer != '') {
				curl_setopt($ch[$i], CURLOPT_REFERER, $referer);
			}
			if($proxy != '' and $proxy_port != '') {
				curl_setopt($ch[$i], CURLOPT_PROXY, $proxy);
				curl_setopt($ch[$i], CURLOPT_PROXYPORT, $proxy_port);
				curl_setopt($ch[$i], CURLOPT_PROXYTYPE, CURLPROXY_HTTP);
			}
		}
		$mh = curl_multi_init();
		foreach($ch as $k => $chsi){      
			curl_multi_add_handle($mh, $chsi); //2 增加句柄
		}
		$active = null; 
		do{
			//echo "running ";
			curl_multi_exec($mh, $active); //3 执行批处理句柄
		}while($active > 0); //4
		$result=[];
		foreach($ch as $k => $chsi){ 
			$result[$k]= curl_multi_getcontent($chsi); //5 获取句柄的返回值
			curl_multi_remove_handle($mh, $chsi);//6 将$mh中的句柄移除
		}
		
		curl_multi_close($mh); //7 关闭全部句柄 
		
		print_r($result);
		// $FILE_PATH ="/opt/lampp/htdocs/spider_center/";
		// $paths=[];
		// $time=time();
		// for($k=0;$k<count($urls);$k++){
		// 	$name=Config::getDomain($urls[$k]);
		// 	$save_path=$FILE_PATH."results/".$name."_".$time.".txt";
		// 	file_put_contents($save_path,$result[$k]);
		// 	array_push($paths,$save_path);
		// }
		//print json_encode($paths);
	}

	static public function get_html($url, $cookie='', $proxy='', $proxy_port='', $referer='', $gzip=false){
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_7_5) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/33.0.1750.3 Safari/537.36');
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 10);
		curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);//允许页面跳转，获取重定向
		curl_setopt($ch, CURLOPT_HEADER, 0);
		curl_setopt($ch, CURLOPT_TIMEOUT, 60);      // 60秒超时
		if($gzip) curl_setopt($ch, CURLOPT_ENCODING, "gzip"); // 编码格式
	
		if($cookie != '') {
			$coo = "Cookie:$cookie";
			$headers[] = $coo;
			curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
		}
		if($referer != '') {
			curl_setopt($ch, CURLOPT_REFERER, $referer);
		}
		if($proxy != '' and $proxy_port != '') {
			curl_setopt($ch, CURLOPT_PROXY, $proxy);
			curl_setopt($ch, CURLOPT_PROXYPORT, $proxy_port);
			curl_setopt($ch, CURLOPT_PROXYTYPE, CURLPROXY_HTTP);
		}
		$re = curl_exec($ch);
		curl_close($ch);


        return $re;


	}


	

}
?>