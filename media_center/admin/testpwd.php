<?php
$salt = 123456;
$pwd = 'admin';
$pwd_new = md5(md5($pwd).$salt);//加密算法
echo $pwd_new;
?>