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
              <li class="active"><a href="in_out.php">收班出班</a></li>
              <li><a href="manage.php">管理员</a></li>
              <li><a href="selfinfo.php">个人信息</a></li>
            </ul>
          </div><!--/.well -->
        </div><!--/span-->

        <div class="span9">
          <div class="hero-unit">
            <h1>敬请期待</h1>
            <p>收班出版板块</p>
            <!-- <p><a href="#" class="btn btn-primary btn-large">Learn more &raquo;</a></p> -->
          </div> 
    
      <hr>

      <footer>
        <p>&copy; wjp 2018</p>
      </footer>

    </div><!--/.fluid-container-->

</body>
</html>
