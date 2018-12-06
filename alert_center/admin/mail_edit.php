<<<<<<< HEAD
<?php
/**
 * 添加管理员组  admingroup_add.php
 *
 * @version		    $Id$
 * @createtime		2018/03/01
 * @updatetime		2018/03/01
 * @author          空竹
 * @copyright		Copyright (c) 芝麻开发 (http://www.zhimawork.com)
 */
require_once('admin_init.php');
require_once('admincheck.php');

$POWERID       = '7001';//权限
Admin::checkAuth($POWERID, $ADMINAUTH);

$FLAG_LEFTMENU = 'mail_edit';
$FLAG_TOPNAV   = 'user';
$id = safeCheck(trim($_GET['id']));
try {
    $email = new Email($id);
    $emailId      = $id;
    $emailCenter = $email->center;
    $emailAddr   = $email->email_addr;
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
    <link rel="stylesheet" href="css/style.css" type="text/css" />
    <link rel="stylesheet" href="css/form.css" type="text/css" />
    <script type="text/javascript" src="js/jquery-1.11.1.min.js"></script>
    <script type="text/javascript" src="js/layer/layer.js"></script>
    <script type="text/javascript" src="js/common.js"></script>
    <script type="text/javascript">
        $(function(){
            $('#btn_submit').click(function(){

                var center = "<?php echo $emailCenter;?>";
                var email_addr = $('input[name="email_addr"]').val();
                var eid =<?php echo $emailId; ?> ;
                if(center == ""){
                    layer.tips('中心名称不能为空', '#s_center_name');
                    return false;
                }
                if(email_addr == ""){
                    layer.tips('邮箱地址不能为空', '#s_email_addr');
                    return false;
                }
                $.ajax({
                    type        : 'POST',
                    data        : {
                        center  : center,
                        email_addr  : email_addr,
                        id : eid
                    },
                    dataType:     'json',
                    url :         'mail_do.php?act=edit',
                    success :     function(data){
                        var code = data.code;
                        var msg  = data.msg;
                        switch(code){
                            case 1:
                                layer.alert(msg, {icon: 6,shade: false}, function(index){
                                    parent.location.reload();
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
<div id="maincontent">
    <div id="formlist">
        <p>
            <label>中心名称</label>
            <input type="text" class="text-input input-length-30" name="account" id="account"   readonly="readonly" value="<?php echo $emailCenter;?>" />
            <span class="warn-inline" id="s_center_name">* </span>
        </p>
        <p>
            <label>邮箱地址</label>
            <input name="email_addr" id="email_addr" class="text-input input-length-30">
            </input>
            <span class="warn-inline" id="s_email_addr">* </span>
        </p>
        <p>
            <label>　　</label>
            <input type="submit" id="btn_submit" class="btn_submit" value="提交" />
        </p>
    </div>
</div>
</body>
</html>

