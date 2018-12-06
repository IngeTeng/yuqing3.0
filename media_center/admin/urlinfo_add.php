<?php
    /**
     * 添加媒体信息  urlinfo_add.php
     *
     * @version         $Id$
     * @createtime      2018/10/25
     * @updatetime      2018/10/25
     * @author          tengyingzhi
     * @copyright       Copyright (c) 芝麻开发 (http://www.zhimawork.com)
     */
    require_once('admin_init.php');
    require_once('admincheck.php');

    $POWERID        = '7004';//权限
    Admin::checkAuth($POWERID, $ADMINAUTH);
    $FLAG_TOPNAV    = "urlinfo";
    $FLAG_LEFTMENU  = 'urlinfo_list';

    $groupId = $ADMIN->getGroupID();

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="author" content="芝麻开发 http://www.zhimawork.com" />
        <title>添加媒体信息 - 媒体信息管理</title>
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
                $('#btn_submit').click(function(){
                    //start数据检查                 
                    var name           = $('input[name="name"]').val();
                    var depth            = $('input[name="depth"]').val();
                    var interval            = $('input[name="interval"]').val();
                    var status            = $("#status").val();
                    var start_url            = $('input[name="start_url"]').val();
                    var source         = $("#source").val();

    
                    if(name === ''){
                        layer.msg('媒体名称不能为空');
                        return false;
                    }
                    if(start_url === ''){
                        layer.msg('媒体链接不能为空');
                        return false;
                    }

                     //end数据检查
                    
                    $.ajax({
                        type : 'POST',
                        data : {
                            name           : name,
                            depth          : depth,
                            interval       : interval,
                            status         : status,
                            start_url      : start_url,
                            source         : source,
                        },
                        dataType : 'json',
                        url      : "urlinfo_do.php?act=add",
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
                                        location.href = 'urlinfo_list.php';
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
            <?php include('urlinfo_menu.inc.php');?>
            <div id="maincontent">
                <div id="position">当前位置：<a href="urlinfo_list.php">媒体管理</a> &gt; 添加媒体信息</div>
                <div id="formlist">
                    <p>
                        <label>媒体名称</label>
                        <input name="name" type="text" class="text-input input-length-30" />
                        <span class="warn-inline">*</span>
                    </p>

                    <p>
                        <label>解析深度</label>
                        <input name="depth" type="text" class="text-input input-length-50" />
                        <span class="warn-inline"></span>
                    </p>

                    <p>
                        <label>间隔</label>
                        <input name="interval" type="text" class="text-input input-length-50" />
                        <span class="warn-inline"></span>
                    </p>

                    <p>
                        <label>媒体链接</label>
                        <input name="start_url" type="text" class="text-input input-length-50" />
                        <span class="warn-inline">*</span>
                    </p>

                    <p>
                        <label>来源</label>
                        <select name="source" class="select-option" id="source">

                            <option value="1">新闻</option>;
                            <option value="2">论坛</option>;
                            <option value="3">博客</option>;
                            <option value="4">视频</option>;

                        </select>
                        <span class="warn-inline"></span>
                    </p>

                    <p>
                        <label>是否开启监测</label>
                        <select name="status" class="select-option" id="status" <?php echo $groupId!=1?'disabled':""?> >
                            <option value="2">关闭</option>;

                            <option value="1">开启</option>;

                        </select>
                        <span class="warn-inline"></span>
                    </p>



                    <p>
                        <label>&nbsp;</label>
                        <input type="button" id = "btn_submit" class="btn_submit" value="提　交" />
                    </p>
                </div>
                
            </div>
            <div class="clear"></div>
        </div>
        <?php include('footer.inc.php');?>
    </body>
</html>