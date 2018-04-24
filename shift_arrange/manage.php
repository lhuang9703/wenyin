<?php 
session_start(); 
header("Content-type: text/html; charset=utf-8");
require_once("../../db_pj_sys_conf.inc");
require_once '../medoo/Medoo.php';
?>
<!DOCTYPE html>
<html>
<head>
	<title>选班排班系统</title>
	<script src="https://apps.bdimg.com/libs/jquery/2.1.4/jquery.min.js"> </script>

	<?php include '../format/head.php'; ?>
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

      <?php include './menu_shift.php'; ?>
      <script>
        var p = document.getElementById('manage');
        p.setAttribute('class', 'active'); 
      </script>


//管理员工信息：
//只有这个页面和管理员页面是有管理员权限的
员工添加（批量添加，从excel文件中导入，初始密码为后四位，数据库里存储密文）
员工删除
员工权限修改，（管理员权限转让， 1，2，3之间转换）
群通知

添加修改主页的板块
      <hr>

      <footer>
        <p>&copy; wjp 2018</p>
      </footer>

    </div><!--/.fluid-container-->

</body>
</html>
