<?php
/**
 * del_info_id.php 根据id删除信息
 *
 * @version       v0.01
 * @create time   2017/7/8
 * @update time   2018/11/12
 * @author        tengyingzhi
 * @copyright     Copyright (c) 微普科技 WiiPu Tech Inc. (http://www.wiipu.com)
 */

//获取参数 id,表名

$params = array();

$id  = safeCheck($_POST['id']);
$table_name  = safeCheck($_POST['table_name'],0);



try {

    $res = $table_name::del($id);
    echo $res;
    //echo action_msg_data(api::SUCCESS_MSG,api::SUCCESS,$res);
    //检查手机验证码

}catch (MyException $e){
    $api->ApiError($e->getCode(), $e->getMessage());
}

?>