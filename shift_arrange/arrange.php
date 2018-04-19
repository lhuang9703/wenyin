<?php 
session_start(); 
header("Content-type: text/html; charset=utf-8");
require_once("../db_pj_sys_conf.inc");
require_once '../medoo/Medoo.php';
?>
<!DOCTYPE html>
<html>
<head>
	<title>选班排班系统</title>
	<script src="https://apps.bdimg.com/libs/jquery/2.1.4/jquery.min.js"> </script>

	<?php include '../format/head.php'; ?>
	<link href="shift.css" rel="stylesheet" media="screen">
	<style>
			body {
			  padding-top: 60px; /* 60px to make the container go all the way to the bottom of the topbar */
			}
	</style>

</head>
<body>
	<?php include '../format/menu.php'; ?>
	<script>
		var p = document.getElementById('select_class');
		p.setAttribute('class', 'active'); 
	</script>

    <div class="container-fluid">
      <div class="row-fluid">

      <div class="span3">
          <div class="well sidebar-nav">
            <ul class="nav nav-list">
              <li ><a href="shift.php">选班</a></li>
              <li ><a href="table.php">当班表</a></li>
              <li><a href="in_out.php">收班出班</a></li>
              <li class="active"><a href="manage.php">管理员</a></li>
              <li><a href="selfinfo.php">个人信息</a></li>
            </ul>
          </div><!--/.well -->
        </div><!--/span-->

        <div class="span9">
          <div class="hero-unit">
            <h1>排班页面</h1>
            <p>请在13月25点之前完成填班工作</p>
            <!-- <p><a href="#" class="btn btn-primary btn-large">Learn more &raquo;</a></p> -->
          </div> 
       <p>新建排班 </p>  提交到php文件中，同时用js生成代码；
       <p>排班表 </p>  --> 显示已经有几个人填写，每个时间段都有谁可以当
       <p>列表中，每个排班都可以停止收集，开始排班， 修改排班结果，使用排班结果</p>
            排班-->新建，停止，修改

员工添加
员工删除
管理员权限转让
群通知

添加修改主页的板块
      <hr>

      <footer>
        <p>&copy; wjp 2018</p>
      </footer>

    </div><!--/.fluid-container-->

</body>
</html>
