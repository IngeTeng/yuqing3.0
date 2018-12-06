<?php
/**
 * 管理员日志列表  adminlog_list.php
 *
 * @version		$Id$
 * @createtime		2018/03/01
 * @updatetime		2018/03/01
 * @author         空竹
 * @copyright		Copyright (c) 芝麻开发 (http://www.zhimawork.com)
 */
require_once('admin_init.php');
require_once('admincheck.php');

$FLAG_TOPNAV   = "process";
$FLAG_LEFTMENU = 'process_main_list';

$POWERID       = '7004';//权限
Admin::checkAuth($POWERID, $ADMINAUTH);


$command = "ps -ef|grep main.php";
exec($command,$arr);

//
//$num = count($arr);
//if(!empty($arr))
//{
//    unset($arr[$num-1]);
//    unset($arr[$num-2]);
//
//}



?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="author" content="芝麻开发 http://www.zhimawork.com" />
    <title>管理员日志 - 管理设置 - 管理系统 </title>
    <link rel="stylesheet" href="css/style.css" type="text/css" />
    <link rel="stylesheet" href="css/form.css" type="text/css" />
    <script type="text/javascript" src="js/jquery-1.11.1.min.js"></script>
    <script type="text/javascript" src="js/common.js"></script>
    <script type="text/javascript" src="js/layer/layer.js"></script>

    <script type="text/javascript">
        $(function(){


            $("#btn_add").click(function(){

                $.ajax({
                    type        : 'POST',
                    data        : {
                        type:2
                    },
                    dataType : 'json',
                    url : 'process_do.php?act=add',
                    success : function(data){

                        var code = data.code;
                        var msg  = data.msg;
                        switch(code){
                            case 1:
                                layer.alert(msg, {icon: 6}, function(index){
                                    location.reload();
                                });
                                break;
                            default:
                                layer.alert(msg, {icon: 5});
                        }
                    }
                });


            });


            $(".finish").click(function(){


                var thisid = $(this).parent('td').find('#aid').val();
                layer.confirm('确认结束该进程吗？', {
                        btn: ['确认','取消']
                    }, function(){
                        var index = layer.load(0, {shade: false});
                        $.ajax({
                            type        : 'POST',
                            data        : {
                                pid:thisid
                            },
                            dataType : 'json',
                            url : 'process_do.php?act=kill',
                            success : function(data){
                                layer.close(index);

                                var code = data.code;
                                var msg  = data.msg;
                                switch(code){
                                    case 1:
                                        layer.alert(msg, {icon: 6}, function(index){
                                            location.reload();
                                        });
                                        break;
                                    default:
                                        layer.alert(msg, {icon: 5});
                                }
                            }
                        });
                    }, function(){}
                );

            });


        });
    </script>
</head>
<body>
<div id="header">
    <?php include('top.inc.php');?>
    <?php include('nav.inc.php');?>
</div>
<div id="container">
    <?php include('process_menu.inc.php');?>
    <div id="maincontent">
        <div id="position">当前位置：<a href="#">进程管理</a> &gt; 主进程列表</div>
        <div id="handlelist">

            <div class="btns">
                <input type="button" class="btn-handle" id="btn_add" value="添加进程"/>
            </div>
        </div>
        <div class="tablelist">
            <table>
                <tr>
                    <th>序号</th>
                    <th>进程ID</th>
                    <th>执行脚本</th>
                    <th>操作</th>
                </tr>
                <?php
                //初始化

                $i = 1;
                //如果列表不为空
                if(!empty($arr)){
                    foreach($arr as $row){


                        $item = explode(" ",$row);

                        $item = array_values(array_filter($item));

                        $processId = $item[1];
                        $itemNum = count($item);

                        $shell = $item[$itemNum-1];

                        if($shell=="main.php") continue;

                        echo '<tr>
                                            <td width="20%" class="center">'.$i.'</td>
											<td width="20%">'.$item[1].'</td>
                                            <td width="40%">'.$shell.'</td>
                                            <td class="center">
                                                <button class="btn-handle finish">结束进程</button>
                                                <input type="hidden" id="aid" value="'.$item[1].'"/>
											</td>

										</tr>
									';
                        $i++;
                    }
                }else{
                    echo '<tr><td class="center" colspan="4">没有数据</td></tr>';
                }
                ?>

            </table>
        </div>

    </div>
    <div class="clear"></div>
</div>
<?php include('footer.inc.php');?>
</body>
</html>