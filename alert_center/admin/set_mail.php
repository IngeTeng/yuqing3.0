
<?php
/**
 * 管理员组列表  admingroup_list.php
 *
 * @version		    $Id$
 * @createtime		2018/03/01
 * @updatetime		2018/03/01
 * @author          空竹
 * @copyright		Copyright (c) 芝麻开发 (http://www.zhimawork.com)
 */
require_once('admin_init.php');
require_once('admincheck.php');

$POWERID        = '7001';//权限
Admin::checkAuth($POWERID, $ADMINAUTH);

$FLAG_LEFTMENU  = 'index';
$FLAG_TOPNAV    = 'user';

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="author" content="芝麻开发 http://www.zhimawork.com" />
    <title>管理员组 - 邮箱设置 - 报警邮箱</title>
    <link rel="stylesheet" href="css/style.css" type="text/css" />
    <link rel="stylesheet" href="css/form.css" type="text/css" />
    <script type="text/javascript" src="js/jquery-1.11.1.min.js"></script>
    <script type="text/javascript" src="js/layer/layer.js"></script>
    <script type="text/javascript" src="js/common.js"></script>
    <script type="text/javascript" >
        $(function(){
            $('#btn_add').click(function(){

                layer.open({
                    type: 2,
                    title: '添加邮箱',
                    shadeClose: true,
                    shade: 0.3,
                    area: ['500px', '300px'],
                    content: 'mail_add.php'
                });
            });
            $('.editinfo').click(function(){
                var thisid = $(this).parent('td').find('.gid').val();
                layer.open({
                    type: 2,
                    title: '编辑信息',
                    shadeClose: true,
                    shade: 0.3,
                    area: ['500px', '300px'],
                    content: 'mail_edit.php?id='+thisid
                });
            });
            $(".delete").click(function(){
                var thisid = $(this).parent('td').find('.gid').val();
                layer.confirm('确认删除该邮箱吗？', {
                        btn: ['确认','取消']
                    }, function(){
                        var index = layer.load(0, {shade: false});
                        $.ajax({
                            type        : 'POST',
                            data        : {
                                id:thisid
                            },
                            dataType : 'json',
                            url : 'mail_do.php?act=del',
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
    <?php include('mail_menu.inc.php');?>
    <div id="maincontent">
        <div id="handlelist">
            <?php
            //无需分页
            $rows = Email::getList();
            //    var_dump($rows);
            ?>
            <div class="btns">
                <input type="button" class="btn-handle btn-yellow" id="btn_order" value="保存排序"/>
                <input type="button" class="btn-handle" id="btn_add" value="添加报警邮箱"/>
            </div>
        </div>
        <div class="tablelist">
            <table>
                <tr>
                    <th>报警中心</th>
                    <th>报警邮箱</th>
                    <th>操作</th>
                </tr>
                <?php

                if(!empty($rows)){
                    foreach($rows as $row){
                        ?>
                        <tr>
                            <td><?php echo $row['center'];?></td>

                            <td class="center"><input type="text" class="email-input" name="ag_order[]" value="<?php echo $row['email_addr'];?>"></td>
                            <td class="center">
                                <input type="hidden" class="gid" value="<?php echo $row['id'];?>"/>

                                <a class="editinfo" id="email_edit" href="javascript:void(0)" title="修改邮箱"><img src="images/action/dot_edit.png"/></a>
                                <a class="delete" id="email_delete" href="javascript:void(0)" title="删除"><img src="images/action/dot_del.png"/></a>
                            </td>
                        </tr>
                        <?php

                    }
                }else{
                    echo '<tr><td colspan="4">没有数据</td></tr>';
                }

                ?>

            </table>
            <span class="table_info">共<?php echo count($rows);?>条数据</span>
        </div>
    </div>
    <div class="clear"></div>
</div>
<?php include('footer.inc.php');?>
</body>

</html>