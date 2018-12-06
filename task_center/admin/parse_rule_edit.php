<?php
/**
 * 提取规则配置
 * @version		    $Id$
 * @createtime		2018/11/2
 * @updatetime		2018/11/12
 * @author          tengyingzhi
 * @copyright		Copyright (c) 芝麻开发 (http://www.zhimawork.com)
 */
require_once('admincheck.php');
$title="编辑提取规则";
$POWERID        = '70010';//权限
Admin::checkAuth($POWERID, $ADMINAUTH);

$FLAG_TOPNAV	= "content";
$FLAG_LEFTMENU  = 'parse_rule_list';


$id = safeCheck($_GET['id']);
$data = array(
    'method' => 'parse_rule/get_Info_id',
    'table_name' => 'Parse_rule',
    'id' => $id
);
$url = $pre_content;
$r = Interfaceuse::getInfoById($url , $data);
$rule_name = htmlspecialchars($r->rule_name);
$url = htmlspecialchars($r->site_url);
$click_b = htmlspecialchars($r->click_b);
$click_e = htmlspecialchars($r->click_e);
$title_b = htmlspecialchars($r->title_b);
$title_e = htmlspecialchars($r->title_e);
$author_b = htmlspecialchars($r->author_b);
$author_e = htmlspecialchars($r->author_e);
$pubtime_b = htmlspecialchars($r->time_b);
$pubtime_e = htmlspecialchars($r->time_e);
$media_b = htmlspecialchars($r->media_b);
$media_e = htmlspecialchars($r->media_e);
$content_b = htmlspecialchars($r->content_b);
$content_e = htmlspecialchars($r->content_e);
$channel_b = htmlspecialchars($r->channel_b);
$channel_e = htmlspecialchars($r->channel_e);
$comment_b = htmlspecialchars($r->comment_b);
$comment_e = htmlspecialchars($r->comment_e);
$is_repost= htmlspecialchars($r->is_repost);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title> <?php echo $title;?> </title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="author" content="Jiangting@WiiPu -- http://www.wiipu.com" />
    <link rel="stylesheet" href="css/style.css" type="text/css" />
    <link rel="stylesheet" href="css/form.css" type="text/css" />
    <script type="text/javascript" src="js/jquery-1.11.1.min.js"></script>
    <script type="text/javascript" src="js/layer/layer.js"></script>
    <script type="text/javascript" src="js/common.js"></script>
    <script type="text/javascript" src="js/upload.js"></script>
    <script type="text/javascript">
        $(function(){

            //添加过滤规则
            $('.btn_submit').click(function(){
                //start数据检查
                var rule_name = $('input[name="rule_name"]').val();
                var url = $('input[name="url"]').val();
                var post_url = '<?php echo $pre_content;?>';
                var click_b = $('input[name="click_b"]').val();
                var click_e = $('input[name="click_e"]').val();
                var title_b = $('input[name="title_b"]').val();
                var title_e = $('input[name="title_e"]').val();
                var author_b = $('input[name="author_b"]').val();
                var author_e = $('input[name="author_e"]').val();
                var pubtime_b = $('input[name="pubtime_b"]').val();
                var pubtime_e = $('input[name="pubtime_e"]').val();
                var media_b = $('input[name="media_b"]').val();
                var media_e = $('input[name="media_e"]').val();
                var content_b = $('input[name="content_b"]').val();
                var content_e = $('input[name="content_e"]').val();
                var channel_b = $('input[name="channel_b"]').val();
                var channel_e = $('input[name="channel_e"]').val();
                var comment_b = $('input[name="comment_b"]').val();
                var comment_e = $('input[name="comment_e"]').val();
                var is_repost = $('input[name="is_repost"]').val();
                var id            =<?php echo $id?>;

                if(rule_name === ''){
                    layer.msg('媒体名称不能为空');
                    return false;
                }
                if(url === ''){
                    layer.msg('媒体链接不能为空');
                    return false;
                }
                if(title_b === ''||title_e === ''){
                    layer.msg('标题规则不能为空');
                    return false;
                }
                if(content_b === ''||content_e === ''){
                    layer.msg('内容规则不能为空');
                    return false;
                }
                if(pubtime_b === ''||pubtime_e === ''){
                    layer.msg('时间规则不能为空');
                    return false;
                }

                //end数据检查

                $.ajax({
                    type : 'POST',
                    data : {
                        rule_name : rule_name,
                        url : url,
                        method : 'parse_rule/edit_parse_rule',
                        post_url : post_url,
                        click_b : click_b,
                        click_e : click_e,
                        title_b : title_b,
                        title_e : title_e,
                        author_b : author_b,
                        author_e : author_e,
                        pubtime_b : pubtime_b,
                        pubtime_e : pubtime_e,
                        media_b : media_b,
                        media_e : media_e,
                        content_b : content_b,
                        content_e : content_e,
                        channel_b : channel_b,
                        channel_e : channel_e,
                        comment_b : comment_b,
                        comment_e : comment_e,
                        is_repost: is_repost,
                        id             : <?php echo $id; ?>

                    },
                    dataType : 'json',
                    url      : 'parse_rule_interfaceUse_do.php?act=edit',
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
                                    parent.location.href = 'parse_rule_list.php';
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
    <?php include('content_menu.inc.php');?>
    <div id="maincontent">
        <div id="position">当前位置：<a href="parse_rule_list.php">提取规则配置</a> &gt; 修改规则</div>
        <div id="formlist">
            <input type="hidden" name='r_id' value="<?php echo $r_id;?>" />
            <p><label>规则    名称：</label><input class="text-input input-length-30" type="text" name="rule_name"  value = "<?php echo $rule_name;?>"/><span class="warn-inline">*</span></p>
            <br/>
            <p><label>URL 匹配规则：</label><input class="text-input input-length-30" type="text" name="url" value = "<?php echo $url;?>" /><span class="warn-inline">* 示例：http://bbs.tianya.cn/post-*.shtml</span></p>
            <br/>
            <p><label>标题开始标记：</label><input class="text-input input-length-30" type="text" name="title_b" value =" <?php echo $title_b;?>"/><span class="warn-inline">* 示例：&lt;h1 id="p_title"&gt;</span></p>
            <p><label>标题结束标记：</label><input class="text-input input-length-30" type="text" name="title_e" value =" <?php echo $title_b;?>"/><span class="warn-inline">* 示例：&lt;/h1&gt;</span></p>
            <br/>
            <p><label>作者开始标记：</label><input class="text-input input-length-30" type="text" name="author_b" value =" <?php echo $author_b;?>"/></p>
            <p><label>作者结束标记：</label><input class="text-input input-length-30" type="text" name="author_e" value =" <?php echo $author_e;?>"/></p>
            <br/>
            <p><label>正文开始标记：</label><input class="text-input input-length-30" type="text" name="content_b" value =" <?php echo $content_b;?>"/><span class="warn-inline">*</span></p>
            <p><label>正文结束标记：</label><input class="text-input input-length-30" type="text" name="content_e" value =" <?php echo $content_e;?>"/><span class="warn-inline">*</span></p>
            <br/>
            <p><label>发布时间开始：</label><input class="text-input input-length-30" type="text" name="pubtime_b" value =" <?php echo $pubtime_b;?>"/><span class="warn-inline">*</span></p>
            <p><label>发布时间结束：</label><input class="text-input input-length-30" type="text" name="pubtime_e" value =" <?php echo $pubtime_e;?>"/><span class="warn-inline">*</span></p>
            <br/>
            <p><label>点击量开始：</label><input class="text-input input-length-30" type="text" name="click_b" value =" <?php echo $click_b;?>"/></p>
            <p><label>点击量结束：</label><input class="text-input input-length-30" type="text" name="click_e" value =" <?php echo $click_e;?>"/></p>
            <br/>
            <p><label>评论开始标记：</label><input class="text-input input-length-30" type="text" name="comment_b" value =" <?php echo $comment_b;?>"/></p>
            <p><label>评论结束标记：</label><input class="text-input input-length-30" type="text" name="comment_e" value =" <?php echo $comment_e;?>"/></p>
            <br/>
            <p><label>媒体开始标记：</label><input class="text-input input-length-30" type="text" name="media_b" value =" <?php echo $media_b;?>"/></p>
            <p><label>媒体结束标记：</label><input class="text-input input-length-30" type="text" name="media_e" value =" <?php echo $media_e;?>"/></p>
            <br/>
            <p><label>频道开始标记：</label><input class="text-input input-length-30" type="text" name="channel_b" value =" <?php echo $channel_b;?>"/></p>
            <p><label>频道结束标记：</label><input class="text-input input-length-30" type="text" name="channel_e" value =" <?php echo $channel_e;?>"/></p>
            <br/>
            <br/>
            <p><label>原创标记：</label><input class="text-input input-length-30" type="text" name="is_repost" value = "<?php echo $is_repost;?>"/></p>
            <br/>

            <p>
                <label>&nbsp;</label>
                <input type="submit" id = "btn_submit" class="btn_submit" value="提交" />
            </p>
        </div>
    </div>
</div>
<?php include('footer.inc.php');?>
</body>
</html>
<script>

</script>
