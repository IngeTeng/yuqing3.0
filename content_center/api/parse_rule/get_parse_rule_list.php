<?php
/**
 * get_parse_rule_list.php 获得规则信息
 *
 * @version       v0.01
 * @create time   2017/7/8
 * @update time   2018/11/12
 * @author        tengyingzhi
 * @copyright     Copyright (c) 微普科技 WiiPu Tech Inc. (http://www.wiipu.com)
 */

$params = array();

$name  = safeCheck($_POST['name'], 0);
$page  = safeCheck($_POST['page']);
$shownum  = safeCheck($_POST['shownnum'],0);


try {

    $totalcount  = $totalcount= Parse_rule::searchCount($params);
    $pagecount = ceil($totalcount / $shownum);
    //$page      = getPage($pagecount);//点击页码之后在这函数里面获取页码

    $params["page"] = $page;
    $params["pageSize"] = $shownum;
    $params["name"] = $name;

    $data = Parse_rule::search($params);
    $res = array();
    $res['page'] = $page;
    $res['pagecount'] = $pagecount;
    $res['totalcount'] = $totalcount;
    $res["parse_rule"] = array();
    if(!empty($data))
    {
        foreach ($data as $item)
        {
            $resItem = array();
            $resItem["id"] = $item["r_id"];
            $resItem["rule_name"] = $item["rule_name"];
            $resItem["site_url"] = $item["site_url"];
            $res["parse_rule"][] = $resItem;
        }
    }

    echo action_msg_data(api::SUCCESS_MSG,api::SUCCESS,$res);
    //检查手机验证码

}catch (MyException $e){
    $api->ApiError($e->getCode(), $e->getMessage());
}

?>