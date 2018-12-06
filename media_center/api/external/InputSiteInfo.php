<?php

//接口功能：输入网页site_id ,url , cur_depth 向task表插入 ，返回ok
//require('../init.php');

if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $post_siteid            = safeCheck($_POST['siteid']);
    $post_url               = $_POST['url'];
    $post_cur_depth         = safeCheck($_POST['cur_depth']);
    $task_type         = safeCheck($_POST['task_type']);

}
else {
    exit('nothing');
}



//如果属于保留规则，校验是否处理过
if($task_type==task::SAVE_TYPE)
{
    $solvedRs = solved::getInfoByUrl($post_url);

    if(!empty($solvedRs))
    {
        echo  action_msg(1,"success");
        exit;
    }
}



$Atrr = array(

    "siteid" => $post_siteid,
    "url"   => $post_url,
    "cur_depth" => $post_cur_depth,
    "type" => $task_type,
);


$result = Table_task::add($Atrr);

$code = 1;
$msg = "success";

if(!$result)
{
    $code = -1;
    $msg = "fail";
}

echo  action_msg($msg,$code);

?>


