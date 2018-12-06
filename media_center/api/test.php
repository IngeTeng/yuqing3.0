<?php
/**
	 * get()
	 * 
	 * @param mixed $url
	 * @return
	 */
 function get_html($url, $is_https = false){
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


$post_url = "http://www.baidu.com";
//$siteinfo=file_get_contents($post_url);
$siteinfo = get_html($post_url);
//echo $siteinfo;
$response = json_encode($siteinfo);

echo $response;


//var_dump($siteinfo);




//test写入文件
//
//要创建的两个文件
$TxtFileName = "Demo.txt";
//以读写方式打写指定文件，如果文件不存则创建
if( ($TxtRes=fopen ($TxtFileName,"w+")) === FALSE){
echo("创建可写文件：".$TxtFileName."失败");
exit();
}
echo ("创建可写文件".$TxtFileName."成功！</br>");
$StrConents = "Welcome To ItCodeWorld!";//要 写进文件的内容
if(!fwrite ($TxtRes,$StrConents)){ //将信息写入文件
echo ("尝试向文件".$TxtFileName."写入".$StrConents."失败！");
fclose($TxtRes);
exit();
}
echo ("尝试向文件".$TxtFileName."写入".$StrConents."成功！");
fclose ($TxtRes); //关闭指针


?>