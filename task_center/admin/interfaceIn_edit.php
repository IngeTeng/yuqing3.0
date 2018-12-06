<?php
/**
 * 修改接口信息  interfaceIn_edit.php
 *
 * @version         $Id$
 * @createtime      2018/10/25
 * @updatetime      2018/11/08
 * @author          tengyingzhi
 * @copyright       Copyright (c) 芝麻开发 (http://www.zhimawork.com)
 */
require_once('admin_init.php');
require_once('admincheck.php');

$POWERID        = '70011';//权限
Admin::checkAuth($POWERID, $ADMINAUTH);
$FLAG_TOPNAV    = "system";
$FLAG_LEFTMENU  = 'interfaceIn';

//获得参数后，率先检查参数的合法性
$id = safeCheck($_GET['id']);
try {
    $r = InterfaceIn::getInfoById($id);
    $interfaceIn_name                   = $r['name'];
    $interfaceIn_addr                 	= $r['addr'];
    $interfaceIn_type                   = $r['type'];

} catch(MyException $e){
    echo $e->getMessage();
    exit();
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="author" content="芝麻开发 http://www.zhimawork.com" />
    <title>修改接口信息 - 接口信息管理</title>
    <link rel="stylesheet" href="css/style.css" type="text/css" />
    <link rel="stylesheet" href="css/form.css" type="text/css" />
    <script type="text/javascript" src="js/jquery-1.11.1.min.js"></script>
    <script type="text/javascript" src="js/layer/layer.js"></script>
    <script type="text/javascript" src="js/common.js"></script>
    <script type="text/javascript" src="js/upload.js"></script>
    <script src="ckeditor/ckeditor.js"></script>
    <script type="text/javascript">
        $(function(){


            //添加媒体信息
            $('.btn_submit').click(function(){
                //start数据检查
                var name            = $('input[name="name"]').val();
                var addr            = $('input[name="addr"]').val();
                var type            = $("#type").val();


                if(name === ''){
                    layer.msg('接口名称不能为空');
                    return false;
                }
                if(addr === ''){
                    layer.msg('接口地址不能为空');
                    return false;
                }



                //end数据检查

                $.ajax({
                    type : 'POST',
                    data : {

                        name           : name,
                        addr           : addr,
                        type           : type,
                        id             : <?php echo $id?>


                    },
                    dataType : 'json',
                    url      : 'interfaceIn_do.php?act=edit',
                    error:function(data,type, err){
                        //alert(data);
                        console.log(data);
                        console.log("ajax错误类型："+type);
                        console.log(err);
                    },
                    success  : function(data){
                        console.log('success');
                        var code = data.code;
                        var msg  = data.msg;
                        switch(code){
                            case 1:
                                layer.alert(msg, {icon: 6,shade: false}, function(index){
                                    location.href = 'interfaceIn_list.php';
                                });
                                break;
                            default:
                                layer.alert(msg, {icon: 5});
                        }
                    }
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
    <?php include('admin_menu.inc.php');?>
    <div id="maincontent">
        <div id="position">当前位置：<a href="interfaceIn_list.php">接口管理</a> &gt; 修改接口信息</div>
        <div id="formlist">
            <p>
                <label>接口名称</label>
                <input name="name" type="text" value="<?php echo $interfaceIn_name?>" class="text-input input-length-30" />
                <span class="warn-inline">*</span>
            </p>

            <p>
                <label>接口地址</label>
                <input name="addr" type="text" class="text-input input-length-50" value="<?php echo $interfaceIn_addr?>"/>
                <span class="warn-inline"></span>
            </p>
            <p>
                <label>接口类型</label>
                <select name="type" class="select-option" id="type">

                    <option value="1" <?php if($interfaceIn_type==1) echo 'selected';?>>媒体中心1</option>;
                    <option value="5" <?php if($interfaceIn_type==5) echo 'selected';?>>媒体中心2</option>;
                    <option value="6" <?php if($interfaceIn_type==6) echo 'selected';?>>媒体中心3</option>;
                    <option value="2" <?php if($interfaceIn_type==2) echo 'selected';?>>爬虫中心</option>;
                    <option value="3" <?php if($interfaceIn_type==3) echo 'selected';?>>内容解析中心</option>;

                </select>
            </p>

            <p>
                <label>&nbsp;</label>
                <input type="button" class="btn_submit" value="提　交" />
            </p>
        </div>

    </div>
    <div class="clear"></div>
</div>
<?php include('footer.inc.php');?>
</body>
</html>