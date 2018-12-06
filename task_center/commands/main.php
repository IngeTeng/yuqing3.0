<?php

    $CURRENT_PATH = str_replace('\\','/',dirname(__FILE__)).'/'; //网站根目录路径

    //require_once("../init.php");
    require_once($CURRENT_PATH."../init.php");
    //require_once("../lib/common/interfaceUse.class.php");


    while(1)
    {

        $logPath = $LOG_PATH."main_".date("Ymd").".log";

        $data = array(
            'method' =>$media_list_url,
            'post_url' =>$pre_media
        );

//向媒体中心获取需要监测的网站
        $res = Interfaceuse::call_interface($data);

        //echo $res;
        $rs = json_decode($res);


        if(empty($rs)||$rs->code!=1)
        {
            //日志:调取站点信息失败
            $log = $rs->msg;
            $mylog->filelog($log,$logPath);
            echo $rs->msg."\n";
            sleep(10);
            continue;
        }


        $mediaList =  $rs->msg;

echo "-------开始爬取-----------\n";

        foreach ($mediaList as $media) {
            //print_r($r);
            //调用爬虫中心接口获取网页中的url
            $data_url = array(
                "url" => $media->start_url,
                "method" => $get_html_url,
                "post_url" => $pre_spider
            );

            $htmlInfo = Interfaceuse::call_interface($data_url);


            if(empty($htmlInfo))
            {
                //日志:未获取网页中的url
                echo "-------获取网页中的url失败-----------\n";
                $log = "获取网页中的url失败";
                $mylog->filelog($log,$logPath);
            }
            else
            {
                //日志:成功获取网页中url
                echo "-------获取网页中的url成功-----------\n";
                $log = "获取网页中的url成功";
                $mylog->filelog($log,$logPath);
            }
            //print_r($page);
//            $htmlInfo =  strtolower($htmlInfo);


            preg_match_all('/href=\"([^\"]+)\"/iU',$htmlInfo,$out);



            for($i = 0 ; $i < count($out[1]) ; $i++)
            {


//标准化url
                $url = Tools_url::standardUrl($media->start_url , $out[1][$i]);

                if(empty($url)) continue;

//执行规则
                $matchResult = Tools_url::urlMatch($url,$media->throw_rule,$media->save_rule,$media->match_rule);

                if(!empty($matchResult)&&($matchResult["code"]==1||$matchResult["code"]==2))
                {


                    $data = array(
                        "method" => $input_site_url,
                        "post_url" => $pre_media,
                        "siteid" => $media->id,
                        "url"	  => $matchResult["url"],
                        "cur_depth"	  => 1,
                        "task_type"=>$matchResult["code"]
                    );
                    //信息插入任务表
                    $res = Interfaceuse::call_interface($data);
                    $rs = json_decode($res);
                    if($res->code == -1)
                    {
                        //日志:任务创建失败
                        $log = "任务创建失败";
                        $mylog->filelog($log,$logPath);
                    }
                    else
                    {
                        //日志:任务创建成功
                        $log = "任务创建成功";
                        $mylog->filelog($log,$logPath);
                    }

                }

            }
        }
echo "-------爬取完毕-----------\n";
        //break;
        sleep(1);

    }




?>