<?php
/**
 * 任务列表  task_list.php
 *
 * @version		    $Id$
 * @createtime		2018/11/08
 * @updatetime		2018/11/08
 * @author          tengyingzhi
 * @copyright		Copyright (c) 芝麻开发 (http://www.zhimawork.com)
 */
require_once('admin_init.php');
require_once('admincheck.php');

$POWERID        = '7004';//权限
Admin::checkAuth($POWERID, $ADMINAUTH);

$FLAG_TOPNAV	= "urlinfo";
$FLAG_LEFTMENU  = 'task_list';

$params = array();

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="author" content="芝麻开发 http://www.zhimawork.com" />
    <title>任务列表 - 媒体设置 - 媒体数据中心 </title>
    <link rel="stylesheet" href="css/style.css" type="text/css" />
    <link rel="stylesheet" href="css/form.css" type="text/css" />
    <script type="text/javascript" src="js/jquery-1.11.1.min.js"></script>
    <script type="text/javascript" src="js/layer/layer.js"></script>
    <script type="text/javascript" src="js/common.js"></script>
    <script type="text/javascript">
        $(function(){

            //删除媒体链接
            $(".delete").click(function(){
                var thisid = $(this).parent('td').find('#taskid').val();
                layer.confirm('确认删除该任务吗？', {
                        btn: ['确认','取消']
                    }, function(){
                        var index = layer.load(0, {shade: false});
                        $.ajax({
                            type        : 'POST',
                            data        : {
                                id:thisid
                            },
                            dataType : 'json',
                            url : 'task_do.php?act=del',
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

            $(".delete").mouseover(function(){
                layer.tips('删除', $(this), {
                    tips: [4, '#3595CC'],
                    time: 500
                });
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
    <?php include('urlinfo_menu.inc.php');?>
    <div id="maincontent">
        <div id="handlelist">
            <?php
            //初始化
            $totalcount= Task::searchCount($params);
            $shownum   = 10;
            $pagecount = ceil($totalcount / $shownum);
            $page      = getPage($pagecount);//点击页码之后在这函数里面获取页码

            $params["page"] = $page;
            $params["pageSize"] = $shownum;

            $rows      = Task::search($params);
            ?>

            <!-- <span class="table_info"><input type="button" class="btn-handle" id="addurlinfo" value="添 加"/></span> -->
        </div>
        <div class="tablelist">
            <table>
                <tr>
                    <th>任务ID</th>
                    <th>站点名称</th>
                    <th>起始站点</th>
                    <th>当前链接</th>
                    <th>设置爬取深度</th>
                    <th>当前爬取深度</th>
                    <th>操作</th>
                </tr>
                <?php

                $i=1;
                //如果列表不为空
                if(!empty($rows)){
                    foreach($rows as $row){
                        $siteInfo = Site::getInfoById($row['siteid']);

                        echo '<tr>
											<td class="center">'.$row['id'].'</td>
											<td class="center">'.$siteInfo['name'].'</td>
											<td class="center">'.$siteInfo['start_url'].'</td>
											<td class="center">'.$row['url'].'</td>
											<td class="center">'.$siteInfo['depth'].'</td>
											<td class="center">'.$row['cur_depth'].'</td>
											<td class="center">
										
                                            <a class="delete" href="javascript:void(0);"><img src="images/action/dot_del.png"/></a>
                                            <input type="hidden" id="taskid" value="'.$row['id'].'"/>
											</td>
										</tr>
									';
                        $i++;
                    }
                }else{
                    echo '<tr><td class="center" colspan="6">没有数据</td></tr>';
                }
                ?>

            </table>
            <div id="pagelist">
                <div class="pageinfo">
                    <span class="table_info">共<?php echo $totalcount;?>条数据，共<?php echo $pagecount;?>页</span>
                </div>
                <?php
                if($pagecount>1){
                    echo dspPages($page,  $pagecount);
                }
                ?>
            </div>
        </div>
    </div>
    <div class="clear"></div>
</div>
<?php include('footer.inc.php');?>
</body>
</html>