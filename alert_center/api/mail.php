<?php
//require("../init.php");

$from = safeCheck($_POST['from'],0);
$content=safeCheck($_POST['content'],0);

$emailto=Table_mail::getEmail($from);

if(ParamCheck::is_email( $emailto['email_addr'])){
    $mail = new Mail($from,$emailto['email_addr'],$content);
}

else{
    echo "未找到相应的邮箱地址或邮箱地址格式不正确";
}
