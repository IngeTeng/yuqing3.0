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
	$FLAG_TOPNAV = 'index';

	
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
							<table class="indextable">
								<tr>
									<td width="50%" class="c1">待审核评论</td>
									<td width="50%" class="c2"><a href="#">200</a></td>
								</tr>
								<tr>
									<td class="c1">待审核用户</td>
									<td class="c2"><a href="#">500</a></td>
								</tr>
								<tr>
									<td class="c1">待发货订单</td>
									<td class="c2"><a href="#">2000</a></td>
								</tr>
								<tr>
									<td class="c1">事务DDDDDD</td>
									<td class="c2"><a href="#">10</a></td>
								</tr>
								<tr>
									<td class="c1">事务EEEEEE</td>
									<td class="c2"><a href="#">90</a></td>
								</tr>
							</table>
						</div>
					</div>
					<div class="indexbox">
						<div class="title iconstat">数据统计</div>
						<div class="content">
							<table class="indextable">
								<tr>
									<td width="25%" class="c1">注册用户数</td>
									<td width="25%" class="c2"><a href="#">200</a></td>
									<td width="25%" class="c1">文章数</td>
									<td width="25%" class="c2"><a href="#">10</a></td>
								</tr>
								<tr>
									<td width="25%" class="c1">新订单数</td>
									<td width="25%" class="c2"><a href="#">200</a></td>
									<td width="25%" class="c1">总浏览量</td>
									<td width="25%" class="c2"><a href="#">10000</a></td>
								</tr>
							</table>
						
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
									<td class="c3">2018-8-8</td>
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