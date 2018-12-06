<?php
/**
 * 媒体url列表  urlinfo_list.php
 *
 * @version		    $Id$
 * @createtime		2018/10/25
 * @updatetime		2018/10/25
 * @author          tengyingzhi
 * @copyright		Copyright (c) 芝麻开发 (http://www.zhimawork.com)
 */
require_once('admin_init.php');
require_once('admincheck.php');

$POWERID        = '7006';//权限
Admin::checkAuth($POWERID, $ADMINAUTH);

$FLAG_TOPNAV	= "media";
$FLAG_LEFTMENU  = 'site_list';

$params = array();

if(!empty($_GET['name'])){
    $s_name  = safeCheck($_GET['name'], 0);

    $params["name"] = $s_name;
}else{
    $s_name  = '';
}
if(!empty($_GET['page'])){
    $s_page  = safeCheck($_GET['page']);

    $params["page"] = $s_page;
}else{
    $s_page  = 1;
}

$data = array(
    'method' => 'site/get_site_list',
    'post_url' => $pre_media,
    'shownnum' => '10',
    'page' => $s_page
);
$table_name = "Site";
$rows = Interfaceuse::get_list($data,$s_name);
$rs = $rows->sites;

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="author" content="芝麻开发 http://www.zhimawork.com" />
    <title>媒体链接 - 媒体设置 - 媒体数据中心 </title>
    <link rel="stylesheet" href="css/style.css" type="text/css" />
    <link rel="stylesheet" href="css/form.css" type="text/css" />
    <script type="text/javascript" src="js/jquery-1.11.1.min.js"></script>
    <script type="text/javascript" src="js/layer/layer.js"></script>
    <script type="text/javascript" src="js/common.js"></script>
    <script type="text/javascript">
        $(function(){
            //添加媒体链接
            $('#addsite').click(function () {
                location.href = 'site_add.php';
            });

            //查询
            $('#searchurlinfo').click(function(){

                s_name         = $('#search_name').val();
                location.href='site_list.php?name='+s_name;
            });


            //删除媒体链接
            $(".delete").click(function(){
                var thisid = $(this).parent('td').find('#siteid').val();
                layer.confirm('确认删除该媒体链接吗？', {
                        btn: ['确认','取消']
                    }, function(){
                        var index = layer.load(0, {shade: false});
                        $.ajax({
                            type        : 'POST',
                            data        : {
                                id:thisid,
                                table_name:'<?php echo $table_name;?>',
                                post_url : '<?php echo $pre_media;?>',
                                method : 'site/del_Info_id',
                            },
                            dataType : 'json',
                            url : 'site_interfaceUse_do.php?act=del',
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

            $(".editinfo").mouseover(function(){
                layer.tips('修改', $(this), {
                    tips: [4, '#3595CC'],
                    time: 500
                });
            });
            $(".delete").mouseover(function(){
                layer.tips('删除', $(this), {
                    tips: [4, '#3595CC'],
                    time: 500
                });
            });



            $(".baoliu").mouseover(function(){
                layer.tips('查看保留规则', $(this), {
                    tips: [4, '#3595CC'],
                    time: 500
                });
            });
            $(".diuqi").mouseover(function(){
                layer.tips('查看丢弃规则', $(this), {
                    tips: [4, '#3595CC'],
                    time: 500
                });
            });

            $(".pipei").mouseover(function(){
                layer.tips('查看匹配规则', $(this), {
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
    <?php include('media_menu.inc.php');?>
    <div id="maincontent">
        <div id="handlelist">
            <?php
//            //初始化
//            $totalcount= Site::searchCount($params);
//            $shownum   = 10;
//            $pagecount = ceil($totalcount / $shownum);
            $page      = getPage($rows->pagecount);//点击页码之后在这函数里面获取页码

            ?>
            <input class="order-input" placeholder="媒体名称"  name="search_title" id="search_name" value="<?php echo $s_name?>" style="width:20%;height:16px;" type="text">


            <input style="margin-left:10px" class="btn-handle" id="searchurlinfo" value="查询" type="button">

            <div class="btns">
                <input type="button" class="btn-handle" id="addsite" value="添加媒体信息"/>
            </div>
            <!-- <span class="table_info"><input type="button" class="btn-handle" id="addurlinfo" value="添 加"/></span> -->
        </div>
        <div class="tablelist">
            <table>
                <tr>
                    <th>媒体名称</th>
                    <th>媒体类型</th>
                    <th>媒体链接</th>
                    <th>上次监测时间</th>
                    <th>监测状态</th>
                    <th>规则详情</th>

                    <th>操作</th>
                </tr>
                <?php

                $i=1;
                //如果列表不为空
                if(!empty($rows)){
                    foreach($rs as $r){
                        //$status = Site::getStatus($row['status']);
                        //var_dump($r);
                        echo '<tr>
											<td class="center">'.$r->name.'</td>
											<td class="center">'.$r->source.'</td>
											<td class="center">'.$r->start_url.'</td>
											<td class="center">'.date("Y-m-d H:i:s",$r->last_time).'</td>
											<td class="center">'.$r->status.'</td>
                                            <td class="center">
                                            
                                           
                                            <a  href="rules_list.php?siteid='.$r->id.'" class="btn_submit">查看详情</a> 
										
                                            
                                            </td>

											<td class="center">
											<a class="editinfo" href="site_edit.php?id='.$r->id.'"><img src="images/action/dot_edit.png"/></a> 
									
                                            <a class="delete" href="javascript:void(0);"><img src="images/action/dot_del.png"/></a>
                                            <input type="hidden" id="siteid" value="'.$r->id.'"/>
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
                    <span class="table_info">共<?php echo $rows->totalcount;?>条数据，共<?php echo $rows->pagecount;?>页</span>
                </div>
                <?php
                if($rows->pagecount>1){
                    echo dspPages($page,  $rows->pagecount);
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