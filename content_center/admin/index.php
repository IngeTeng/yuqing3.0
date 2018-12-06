<?php
	/**
	 * 管理系统首页  index.php
	 *
	 * @version		    $Id$
	 * @createtime		2018/03/01
	 * @updatetime		2018/4/17
	 * @author          空竹
	 * @copyright		Copyright (c) 芝麻开发 (http://www.zhimawork.com)
	 */
	require_once('admin_init.php');
	require_once('admincheck.php');


?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta name="author" content="芝麻开发 http://www.zhimawork.com" />
		<title> 管理系统首页 </title>
		<link rel="stylesheet" href="css/style.css" type="text/css" />
		<link rel="stylesheet" href="css/form.css" type="text/css" />
		<script type="text/javascript" src="js/jquery-1.11.1.min.js"></script>
        <script type="text/javascript" src="js/common.js"></script>
		<script type="text/javascript" src="js/layer/layer.js"></script>

	</head>
	<body>
		<div id="header">
			<?php include('top.inc.php');?>
			<?php include('nav.inc.php');?>
		</div>
		<div id="container">
			<div id="main_index">
				<div class="boxlist">
					<div class="indexbox">
						<div class="title iconalarm">事务提醒</div>
						<div class="content">
<!--							<table class="indextable">-->
<!--                                --><?php
//                                echo count($qq_num)>0?'':'<p><a href="add_qq.php">所有腾讯微博的cookies都已失效</a></p>';
//                                echo count($weixin_num)>0?'':'<p><a href="add_weixin_c.php">所有微信的cookies都已失效</a></p>';
//                                echo $ifeng_num>0?'<p><a href="http://121.40.53.37/wii_spider/bbs_article/ifeng_result.php" target="_Blank">还有'. $ifeng_num. '个凤凰论坛反爬虫结果需要处理(如果停止跳转,刷新即可)</a></p>':'';
//                                ?>
<!--							</table>-->
						</div>
					</div>
					<div class="indexbox">
						<div class="title iconinfo">系统信息</div>
						<div class="content">
							<table class="indextable">
								<tr>
									<td width="30%" class="c1">安全事务提醒</td>
									<td width="70%" class="c3"><a href="sys_sec_info.php">查看</a></td>
								</tr>
								<tr>
									<td width="30%" class="c1">系统技术信息</td>
									<td width="70%" class="c3"><a href="sys_tech_info.php">查看</a></td>
								</tr>
								<tr>
									<td class="c1">上线日期</td>
									<td class="c3">2018-10-31</td>
								</tr>
								<tr>
									<td class="c1">技术支持单位</td>
									<td class="c3">芝麻开发</td>
								</tr>
								<tr>
									<td class="c1">联系电话</td>
									<td class="c3">400-0018-318</td>
								</tr>
							</table>
						</div>
					</div>
					<div class="clear"></div>
				</div>
				<div></div>
			</div>
			<div class="clear"></div>
		</div>
		<?php include('footer.inc.php');?>
	</body>
</html>

