<?php
/**
 * 添加规则规则  rules_add.php
 *
 * @version         $Id$
 * @createtime      2018/10/25
 * @updatetime      2018/11/12
 * @author          tengyingzhi
 * @copyright       Copyright (c) 芝麻开发 (http://www.zhimawork.com)
 */
require_once('admin_init.php');
require_once('admincheck.php');

$POWERID        = '7006';//权限
Admin::checkAuth($POWERID, $ADMINAUTH);
$FLAG_TOPNAV    = "media";
$FLAG_LEFTMENU  = 'site_list';

if(!empty($_GET['siteid'])){
    $siteId = safeCheck($_GET['siteid']);
}else{

    exit("非法访问");
}

if(!empty($_GET['type'])){
    $type = safeCheck($_GET['type']);
}else{

    $type=1;
}
//var_dump($s_urlinfoid);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="author" content="芝麻开发 http://www.zhimawork.com" />
    <title>添加匹配规则 - 媒体信息管理</title>
    <link rel="stylesheet" href="css/style.css" type="text/css" />
    <link rel="stylesheet" href="css/form.css" type="text/css" />
    <script type="text/javascript" src="js/jquery-1.11.1.min.js"></script>
    <script type="text/javascript" src="js/layer/layer.js"></script>
    <script type="text/javascript" src="js/common.js"></script>
    <script type="text/javascript" src="js/upload.js"></script>
    <script src="ckeditor/ckeditor.js"></script>
    <script type="text/javascript">
        $(function(){


            //添加过滤规则
            $('.btn_submit').click(function(){
                //start数据检查
                var example                = $('input[name="example"]').val();
                var post_url               = '<?php echo $pre_media;?>';
                var url                    = $('input[name="url"]').val();
                var tag                    = $('#tag').val();
                var is_param               = $('#is_param').val();

                var siteid                  =<?php echo $siteId?>;


                //end数据检查

                $.ajax({
                    type : 'POST',
                    data : {
                        method              : 'rules/add_rules',
                        example             : example,
                        post_url            : post_url,
                        url                 : url,
                        tag                 : tag,
                        siteid              : siteid,
                        is_param            :is_param

                    },
                    dataType : 'json',
                    url      : 'rules_interfaceUse_do.php?act=add',
                    success  : function(data){
                        console.log('success');
                        var code = data.code;
                        var msg  = data.msg;
                        switch(code){
                            case 1:
                                layer.alert(msg, {icon: 6,shade: false}, function(index){
                                    parent.location.href = 'rules_list.php?siteid=<?php echo $siteId?>&type=<?php echo $type?>';
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

<div id="container">
    <div id="maincontent">
        <div id="formlist">

            <p>
                <label>示例网址</label>
                <input name="example" type="text" class="text-input input-length-50" />
                <span class="warn-inline">*</span>
            </p>

            <p >
                <label>匹配表达式</label>
                <input name="url" type="text" value="" class="text-input input-length-50"  />
                <span class="warn-inline">*</span>
            </p>
            <p>
                <label>规则类型</label>
                <select name="tag" class="select-option" id="tag">
                    <option value="1" <?php echo $type==1?"selected":"";?>>匹配规则</option>
                    <option value="2" <?php echo $type==2?"selected":"";?>>保留规则</option>
                    <option value="3" <?php echo $type==3?"selected":"";?>>丢弃规则</option>
                </select>
            </p>

            <p >
                <label>是否保留参数</label>
                <select name="is_param" class="select-option" id="is_param">
                    <option value="1" >是</option>
                    <option value="2" >否</option>

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
</body>
</html>