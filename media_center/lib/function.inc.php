<?php

/**
 * function.inc.php  与业务有关的函数
 *
 * @version		$Id$
 * @createtime		2018/03/01
 * @updatetime		2018/03/01
 * @author         空竹
 * @copyright		Copyright (c) 芝麻开发 (http://www.zhimawork.com)
 */

/**
 * 获得执行程序的时间(秒)
 * 
 * @param $starttime 
 * @param $endtime
 *
 * @return
 */
function getRunTime($starttime = 0, $endtime = 0){
	global $PageStartTime;
	if(empty($starttime)){
		$starttime = $PageStartTime;
	}
	if(empty($endtime)){
		$PageEndTime = explode(' ',microtime());
		$PageEndTime = $PageEndTime[1] + $PageEndTime[0];
		$endtime = $PageEndTime;
	}
	
	$runtime = number_format(($endtime - $starttime), 3);
	return $runtime;
}

/**
 * 分页参数page传递后的处理
 * 
 * @param mixed $pagecount 页数
 * @return
 */
function getPage($pagecount){

	$page = empty($_GET['page']) ? 1 : safeCheck(trim($_GET['page']));
	if(!is_numeric($page)) $page = 1;
	if($page < 1) $page = 1;
    if(empty($pagecount)) 
        $page = 1;
	elseif($page > $pagecount) 
        $page = $pagecount;

	return $page;
}
/**
 * 分页显示 dspPages()--具体样式再通过CSS控制
 * 形如：
 * 1 2 3 × × × 98 99 100
 * 1 × × × 7 8 9 × × × 100
 *
 * @param $page      当前页数
 * @param $pagecount 总页数
 * @return
 */
function dspPages($page, $pagecount){
		
		//当前页面的URL
		$url = Env::getPageUrl();
		
		//参数合法性检查
		if(!is_numeric($page))       $page = 0;
		if(!is_numeric($pagecount))  $pagecount = 0;
		
		//处理Page参数
		$p1 = strpos($url, '?page=');
        if($p1) $url = substr($url, 0, $p1);
        
        $p2 = strpos($url, '&page=');
        if($p2) $url = substr($url, 0, $p2);
		
		//构建显示
		$temppage="";
		$temppage.="<div class=\"pagenum\">";

		if($page>1){
			$temppage.="<div class=\"page_prev\"><a href=\"".$url."?page=".($page-1)."\">上一页</a></div>";
		}else{
			$temppage.="<div class=\"page_prev\">上一页</div>";
		}
		
		If($pagecount<9){
			for($p=1;$p<=$pagecount;$p++){
				if($p!=$page)
					$temppage.=" <div class=\"pager\"><a href=\"".$url."?page=".$p."\">".$p."</a></div>";
				else
					$temppage.=" <div class=\"pager active\"><a href=\"".$url."?page=".$p."\">".$p."</a></div>";
			}
		}else{
			if($page<=3){
				for($p=1;$p<=5;$p++){
					if($p!=$page)
						$temppage.=" <div class=\"pager\"><a href=\"".$url."?page=".$p."\">".$p."</a></div>";
					else
						$temppage.=" <div class=\"pager active\"><a href=\"".$url."?page=".$p."\">".$p."</a></div>";
				}
				$temppage.=" <div class=\"pager\">...</div>";
				for($p=$pagecount-3;$p<=$pagecount;$p++){
					if($p!=$page)
						$temppage.=" <div class=\"pager\"><a href=\"".$url."?page=".$p."\">".$p."</a></div>";
					else
						$temppage.=" <div class=\"pager active\"><a href=\"".$url."?page=".$p."\">".$p."</a></div>";
				}
			}else if($pagecount-$page<=3){
				for($p=1;$p<=3;$p++){
					$temppage.=" <div class=\"pager\"><a href=\"".$url."?page=".$p."\">".$p."</a></div>";
				}
				$temppage.="<div class=\"pager\">...</div>";
				for($p=$pagecount-4;$p<=$pagecount;$p++){
					if($p!=$page){
						$temppage.=" <div class=\"pager\"><a href=\"".$url."?page=".$p."\">".$p."</a></div>";
					}else{
						$temppage.=" <div class=\"pager active\"><a href=\"".$url."?page=".$p."\">".$p."</a></div>";
					}
				}
			}
			else{
				$temppage.=" <div class=\"pager\"><a href=\"".$url."?page=1\">1</a></div>";
				$temppage.=" <div class=\"pager\">...</div>";
				for($p=$page-2;$p<=$page+2;$p++){
					if($p!=$page){
						$temppage.=" <div class=\"pager\"><a href=\"".$url."?page=".$p."\">".$p."</a></div>";
					}else{
						$temppage.=" <div class=\"pager active\">".$p."</div>";
					}
				}
				$temppage.="<div class=\"pager\">...</div>";
				$temppage.=" <div class=\"pager\"><a href=\"".$url."?page=".$pagecount."\">".$pagecount."</a></div>";
			}
		}

		if($page<=$pagecount-1){
			$temppage.="<div class=\"page_prev\"><a href=\"".$url."?page=".($page+1)."\">下一页</a></div>";
		}else{
			$temppage.="<div class=\"page_prev\">下一页</div>";
		}
		
		$temppage .="</div>";		


		if(!strpos($url, "?") === false)
			$temppage=str_replace("?page=", "&page=", $temppage);

		return $temppage;
}




// 获取的html,带模拟登陆
function get_html($url,  $proxy='', $proxy_port='') {
    $ch = curl_init();
    // 设置选项，包括URL
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_7_5) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/33.0.1750.3 Safari/537.36');
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 10);
    //curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);//允许页面跳转，获取重定向
    curl_setopt($ch, CURLOPT_HEADER, 0);
    curl_setopt($ch, CURLOPT_TIMEOUT, 60);      // 60秒超时

    if($proxy != '' and $proxy_port != '') {
        curl_setopt($ch, CURLOPT_PROXY, $proxy);
        curl_setopt($ch, CURLOPT_PROXYPORT, $proxy_port);
        curl_setopt($ch, CURLOPT_PROXYTYPE, CURLPROXY_HTTP);
    }

    // 获取内容
    $output = curl_exec($ch);
    curl_close($ch);
    return $output;
}




/**
 * 将后台配置的变成真正可用的匹配表达是
 * @param $rule
 * @return mixed|string
 */
function pregQuote($rule){

    $rule = str_replace("*","(.*?)",$rule);

    $rule =  "/^".str_replace("/","\/",$rule)."$/";

    return $rule;

}


?>