<?php
/**
 * get_task_list.php 获得任务表信息
 *
 * @version       v0.01
 * @create time   2017/7/8
 * @update time   2018/11/12
 * @author        tengyingzhi
 * @copyright     Copyright (c) 微普科技 WiiPu Tech Inc. (http://www.wiipu.com)
 */

//获取参数 name,shownnum

$params = array();

$page  = safeCheck($_POST['page']);
$shownum  = safeCheck($_POST['shownnum'],0);



try {

    $totalcount  = $totalcount= Task::searchCount($params);
    $pagecount = ceil($totalcount / $shownum);
    //$page      = getPage($pagecount);//点击页码之后在这函数里面获取页码

    $params["page"] = $page;
    $params["pageSize"] = $shownum;
    $data = Task::search($params);

    $res = array();
    $res['page'] = $page;
    $res['pagecount'] = $pagecount;
    $res['totalcount'] = $totalcount;
    $res["task"] = array();
    if(!empty($data))
    {
        foreach ($data as $item)
        {
            $resItem = array();
            $resItem["id"] = $item["id"];
            $resItem["siteid"] = Site::getInfoById($item['siteid']);
            $resItem["cur_depth"] =$item["cur_depth"] ;
            $resItem["url"] =$item["url"] ;
            $res["tasks"][] = $resItem;
        }
    }

    echo action_msg_data(api::SUCCESS_MSG,api::SUCCESS,$res);
    //检查手机验证码

}catch (MyException $e){
    $api->ApiError($e->getCode(), $e->getMessage());
}

?>