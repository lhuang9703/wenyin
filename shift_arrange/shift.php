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
              <li class="active"><a href="shift.php">选班</a></li>
			  <li ><a href="table.php">当班表</a></li>
              <li><a href="in_out.php">收班出班</a></li>
              <li><a href="manage.php">管理员</a></li>
              <li><a href="selfinfo.php">个人信息</a></li>
            </ul>
          </div><!--/.well -->
        </div><!--/span-->

        <div class="span9">
          <div class="hero-unit">
            <h1>Hello, world!</h1>
            <p>请在13月25点之前完成填班工作</p>
            <!-- <p><a href="#" class="btn btn-primary btn-large">Learn more &raquo;</a></p> -->
          </div> 
       


		  <!-- 填班的表格 -->
		  <!-- 如果复选框搞不定，可以换成下拉表格 -->
		<form>
		<table class="table table-hover  table-responsive">
  		<caption>文印排班表</caption>

			<thead>
				<tr>
				<th></th>
				<th>周一</th>
				<th>周二</th>
				<th>周三</th>
				<th>周四</th>
				<th>周五</th>
				<th>周六</th>
				<th>周日</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td>第一班(9:15- 12:15)</td>
					<td><input type="checkbox" name="shift1" value="1" /> </td>
					<td><input type="checkbox" name="shift5" value="1" /> </td>
					<td><input type="checkbox" name="shift9" value="1" /> </td>
					<td><input type="checkbox" name="shift13" value="1" /> </td>
					<td><input type="checkbox" name="shift17" value="1" /> </td>
					<td><input type="checkbox" name="shift21" value="1" /> </td>
					<td><input type="checkbox" name="shift25" value="1" /> </td>
				</tr>
				<tr>
					<td>第二班(12:15- 3:15)</td>
					<td><input type="checkbox" name="shift2" value="1" /> </td>
					<td><input type="checkbox" name="shift6" value="1" /> </td>
					<td><input type="checkbox" name="shift10" value="1" /> </td>
					<td><input type="checkbox" name="shift14" value="1" /> </td>
					<td><input type="checkbox" name="shift18" value="1" /> </td>
					<td><input type="checkbox" name="shift22" value="1" /> </td>
					<td><input type="checkbox" name="shift26" value="1" /> </td>
				</tr>
				<tr>
					<td>第三班(3:15- 5:15)</td>
					<td><input type="checkbox" name="shift3" value="1" /> </td>
					<td><input type="checkbox" name="shift7" value="1" /> </td>
					<td><input type="checkbox" name="shift11" value="1" /> </td>
					<td><input type="checkbox" name="shift15" value="1" /> </td>
					<td><input type="checkbox" name="shift19" value="1" /> </td>
					<td><input type="checkbox" name="shift23" value="1" /> </td>
					<td><input type="checkbox" name="shift27" value="1" /> </td>
				</tr>
				<tr>
					<td>第四班(5:15- 9:15)</td>
					<td><input type="checkbox" name="shift4" value="1" /> </td>
					<td><input type="checkbox" name="shift8" value="1" /> </td>
					<td><input type="checkbox" name="shift12" value="1" /> </td>
					<td><input type="checkbox" name="shift16" value="1" /> </td>
					<td><input type="checkbox" name="shift20" value="1" /> </td>
					<td><input type="checkbox" name="shift24" value="1" /> </td>
					<td><input type="checkbox" name="shift28" value="1" /> </td>
				</tr>
			</tbody>
		</table>
		<button type="submit">提交</button> &nbsp &nbsp
		<button type="reset">重置</button>
		</form>
		</div><!--/span-->

      </div><!--/span-->
    </div><!--/row-->

      <hr>

      <footer>
        <p>&copy; wjp 2018</p>
      </footer>

    </div><!--/.fluid-container-->

</body>
</html>
