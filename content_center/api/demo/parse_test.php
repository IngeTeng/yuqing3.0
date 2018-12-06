<?php
//$content = file_get_contents("../test_data/315.html");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>接口:调用模板解析</title>
    <script type="text/javascript" src="js/jquery.1.9.1.min.js"></script>
    <script type="text/javascript" src="js/func.common.js"></script>
    <script type="text/javascript" src="js/func.js"></script>
    <script type="text/javascript" src="js/jquery.md5.js">//$.md5()</script>
    <script type="text/javascript" src="js/jquery.base64.js">//$.base64.encode()</script>
    <script src="js/c.js" type="text/javascript"></script>
    <script src="js/urchin.js" type="text/javascript"></script>
    <link href="css/s.css" type="text/css" rel="stylesheet">
    <link href="css/base.css" type="text/css" rel="stylesheet">
    <script type="text/javascript">

        $(function(){
            $('#btn').click(function(){

                var method = $('input[name="method"]').val();
                var collect_url = $('input[name="collect_url"]').val();
               // var collect_download_url = $('input[name="collect_download_url"]').val();
                var timestamp = $('input[name="timestamp"]').val();
                var token = "yuqing3.0";
                var sign = $.md5(method+timestamp+token);
                $('#sign').val(sign);
                $.ajax({
                    type         : 'POST',
                    data         : {
                        method :method,
                        collect_url : collect_url,
                        timestamp : timestamp,
                        token : token,
                        sign : sign
                    },
                    url : "../api.php",
                    beforeSend :  function(data){
                        $('#Canvas').html('<p>请求处理中...</p>');
                    },
                    success :     function(data){
                        Process(data);
                    },
                    error :       function(request, errtext, e){
                        $('#Canvas').html('<p><b>发生错误</b></p><p>'+request.status+'<br/>'+errtext+'</p>');
                    }
                });
            });
        });
    </script>
</head>
<body>
<div id="head"><p>接口111：获取首页轮播图</p></div>
<!--<div style="background:#C0C0C0">-->
<!--<p style="margin-left:20px">部分字段说明:</p>-->
<!--<p style="margin-left:20px">type: 1链接,2商品,3门店</p>-->
<!--<p style="margin-left:20px">content: 链接url,商品id,门店id</p>-->
<!--</div>-->
<div id="content">
    <div id="left">
        <div class ="message"><p>接口返回：</p></div>
        <div id="Canvas" class="Canvas"></div>
    </div>
    <div id="right">
        <div class ="message"><p>请求数据：</p></div>
        <form>
            <p>
                <span>method:</span>
                <input type="text" class="input-text"  name="method" value="parse_test"/>
            </p>
            <p>
                <span>collect_url:</span>
                <input type="text" class="input-text"  name="collect_url" value="http://tousu.315che.com/tousudetail/96343"/>
            </p>
<!--            <p>-->
<!--                <span>collect_download_url:</span>-->
<!--                <input type="text" class="input-text"  name="collect_download_url" value="test_data/315.html"/>-->
<!--            </p>-->
            <p>
                <span>timestamp:</span>
                <input type="text" class="input-text"  name="timestamp" value="11111111"/>
            </p>

            <p><span>校验码：</span><input type="text" class="input-text" id="sign" readonly/></p>
            <p><button class="button success small" id="btn" type="button">发送请求</button></p>
        </form>
    </div>
</div>


</body>
</html>
