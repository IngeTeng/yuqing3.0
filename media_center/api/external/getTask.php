<?php

//接口功能：输入网页site_id ,url , cur_depth 向task表插入 ，返回ok
//require('../../init.php');
$response  = array(  );

$rows = table_task::getInfoByLimit();
if($rows =='')
{
    $response = json_encode($response);

    echo $response;
    return;
}
$siteinfo = table_site::getInfoById($rows['siteid']);

//$rulesinfo = table_rules::getInfoBySiteid($rows['siteid']);
// var_dump($siteinfo);
// exit();
$match_rule = Rules::getXiuzhengListByType($rows['siteid'],1);
$save_rule = Rules::getXiuzhengListByType($rows['siteid'],2);
$throw_rule = Rules::getXiuzhengListByType($rows['siteid'],3);

if($rows["type"]==task::SAVE_TYPE)
{
    $attrs = array(
      "siteid"=>$rows['siteid'],
       "url"=>$rows['url'],
    );

    solved::add($attrs);
}


table_task::del($rows['id']);


$response = array(
        'task_id'               => $rows['id'],
        'url'              => $rows['url'],
        'cur_depth'        => $rows['cur_depth'],
        'type'        => $rows['type'],
        'site_id'          => $siteinfo['id'],
        'source'        => $siteinfo['source'],
        'depth'        => $siteinfo['depth'],

        'match_rule'            => $match_rule,
        'save_rule'             => $save_rule,
        'throw_rule'             => $throw_rule
    );

$response = json_encode($response);

echo $response;
?>


