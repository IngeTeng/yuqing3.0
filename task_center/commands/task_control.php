<?php

$CURRENT_PATH = str_replace('\\','/',dirname(__FILE__)).'/'; //网站根目录路径

require_once($CURRENT_PATH."../init.php");




//http://auto.sina.com.cn/newcar/x/2018-10-31/detail-ifxeuwws9983494.shtml
while(1) {

    $logPath = $LOG_PATH."task_".date("Ymd").".log";


    $data = array();
    //调用task表返回信息并且删除
    $data = array(
        "method" => $get_task_url,
        "post_url" =>$pre_media,
    );

    $res = Interfaceuse::call_interface($data);

    $rs = json_decode($res);


    if(empty($rs))
    {

        sleep(10);
        continue;
    }


echo "--------开始处理---------\n";

    $data_url = array(
        "url" => $rs->url,
        "method" => $get_html_url,
        "post_url" => $pre_spider
    );


echo "--------获取网页内容---------\n";

    //$htmlInfo = Curl::post($get_html_url, $data_url);
    $htmlInfo = Interfaceuse::call_interface($data_url);
    if ($rs->type == 1) {
        //print_r($page);
        //$htmlInfo = strtolower($htmlInfo);//转小写
        preg_match_all('/href=\"([^\"]+)\"/iU', $htmlInfo, $out);
        $startUrl = Tools_url::getDomain($rs->url);


        $nextDepth = $rs->cur_depth + 1;
        //print_r($out[1]);
        for ($i = 0; $i < count($out[1]); $i++) {

//标准化url
            $url = Tools_url::standardUrl($startUrl, $out[1][$i]);
            if (empty($url)) continue;

//执行规则
            $matchResult = Tools_url::urlMatch($url, $rs->throw_rule, $rs->save_rule, $rs->match_rule);

            if (!empty($matchResult) && ($matchResult["code"] == 1 || $matchResult["code"] == 2)) {
//深度达到限定深度则不再抓取
                if ($rs->depth != -1 && $nextDepth > $rs->depth && $matchResult["code"] == 1) continue;

                $data = array(
                    "method" => $input_site_url,
                    "post_url" => $pre_media,
                    "siteid" => $rs->site_id,
                    "url" => $url,
                    "cur_depth" => $nextDepth,
                    "task_type" => $matchResult["code"]
                );

                $res = Interfaceuse::call_interface($data);
            }

        }
    } else {

        $data_url1 = array(
            "method" => $parse_url,
            "post_url" => $pre_content,
            "collect_url" => $rs->url,      //网页url
            "collect_download_url" => $htmlInfo //网页的HTML内容

        );


echo "--------进行网页内容解析---------\n";

        $resultInfo = json_decode(Interfaceuse::call_interface($data_url1), true);

        //print_r($resultInfo);
        if(empty($resultInfo))
        {
            //日志:数据解析失败
            $log = "数据解析失败";
            echo "--------网页内容解析失败---------\n";
            $mylog->filelog($log,$logPath);
        }
        else
        {
            //日志:数据解析成功
            $log = "数据解析成功";
            echo "--------网页内容解析成功---------\n";
            $mylog->filelog($log,$logPath);
        }

        if ($resultInfo["status"] == 200) {
            $result = $resultInfo["result"];

            //一个月之外不入库
            $startTime = time() - 86400*30;

            if($result["pubtime"]<$startTime)
            {
                echo "-------";
                continue;
            }


            $result["source"] = $rs->source;





echo "--------调用舆情web系统接口---------\n";

//往前端web系统扔数据
            foreach ($api_web_list as $currentApi) {
                //$postRes = Curl::post($currentApi['addr'], $result);
                $postRes = json_decode(Curl::post($currentApi, $result));
                if(empty($postRes))
                {
                    echo "--------解析内容发送失败--------\n";
                    //print_r($postRes);
                    //向$currentApi['name']发送解析数据失败
                    //$log = "向".$currentApi['name']."发送数据失败";
                    $log = "向".$currentApi."发送数据失败";
                    $mylog->filelog($log,$logPath);
                }
                else
                {
                    echo "--------解析内容发送成功--------\n";
                    //print_r($postRes);
                    //已向$currentApi['name']发送解析数据
                    $log = "向".$currentApi."发送数据成功";
                    $mylog->filelog($log,$logPath);
                }
            }
        }
        //获取网址内容
    }

echo "--------本次处理完毕---------\n";

}


?>