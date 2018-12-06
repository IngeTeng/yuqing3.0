<?php
/**
 * get_site_list.php 获得站点信息
 *
 * @version       v0.01
 * @create time   2017/7/8
 * @update time   2018/11/09
 * @author        tengyingzhi
 * @copyright     Copyright (c) 微普科技 WiiPu Tech Inc. (http://www.wiipu.com)
 */

//获取参数 name,shownnum

$params = array();

//if(!empty($_POST['name'])){
//    $s_name  = safeCheck($_POST['name'], 0);
//
//    $params["name"] = $s_name;
//}else{
//    $s_name  = '';
//}
    $name  = safeCheck($_POST['name'], 0);
    $page  = safeCheck($_POST['page']);
    $shownum  = safeCheck($_POST['shownnum'],0);



try {

    $totalcount  = $totalcount= Site::searchCount($params);
    $pagecount = ceil($totalcount / $shownum);
    //$page      = getPage($pagecount);//点击页码之后在这函数里面获取页码

    $params["page"] = $page;
    $params["pageSize"] = $shownum;
    $params["name"] = $name;
    $data = Site::search($params);

    $res = array();
    $res['page'] = $page;
    $res['pagecount'] = $pagecount;
    $res['totalcount'] = $totalcount;
    $res["sites"] = array();
    if(!empty($data))
    {
        foreach ($data as $item)
        {
            $resItem = array();
            $resItem["id"] = $item["id"];
            $resItem["name"] = $item["name"];
            $resItem["start_url"] = $item["start_url"];
            $resItem["source"] = Site::getSource($item["source"]);
            $resItem["status"] =Site::getStatus($item["status"]) ;
            $resItem["last_time"] =$item["last_time"] ;
            $res["sites"][] = $resItem;
        }
    }

    echo action_msg_data(api::SUCCESS_MSG,api::SUCCESS,$res);
    //检查手机验证码

}catch (MyException $e){
    $api->ApiError($e->getCode(), $e->getMessage());
}

?>