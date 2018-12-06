<?php
/**
 * Created by PhpStorm.
 * User: ZeroFang
 * Date: 2018/11/3
 * Time: 14:05
 */
$url = 'http://bbs.tianya.cn/post-*.shtml';
$site_url = explode('*',$url,2);
//$patten = '/'.preg_quote($site_url[0], '/').'.*'.preg_quote($site_url[1], '/').'/';
$patten='/http\:\/\/www\.qctsw\.com\/article\/articleContent\/.*\.html/';
$str='http://www.qctsw.com/article/articleContent/20126.html';
if(preg_match($patten,$str)){
    echo 'success';
}
else{
    echo 'failed';
}

