<?php

$response  = array();

$time = time();
$rows = Site::getNeedMonitorList($time);
$cur_time = time();
if(!empty($rows)){
        foreach($rows as $row){

            $rows_match = Rules::getXiuzhengListByType($row['id'],1);
            $rows_save = Rules::getXiuzhengListByType($row['id'],2);
            $rows_throw = Rules::getXiuzhengListByType($row['id'],3);

            $response[] = array(
                'id'            => $row['id'],
                'name'          => $row['name'],
                'depth'         => $row['depth'],
                'interval'      => $row['interval'],
                'start_url'     => $row['start_url'],
                'source'        => $row['source'],
                'last_time'     => $row['last_time'],
                'match_rule'    => $rows_match,
                'save_rule'     => $rows_save,
                'throw_rule'    => $rows_throw
            );

            table_site::update_last_time($row['id']);


            $code = 1;
        }
}else{

    $code = 101;
    $response = "没有需要监测的网站";
}

echo action_msg($response,$code);;
?>


