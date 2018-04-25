<?php 
session_start(); 
header("Content-type: text/html; charset=utf-8");
require_once("../../db_pj_sys_conf.inc");
require_once '../medoo/Medoo.php';

if(isset($_SESSION["id"])){
	if((int)($_SESSION["privilege"])>2){
		echo "<script language=javascript>alert('对不起，您没有权限！');location.href='../index.php';</script>";
	}
}else
echo "<script language=javascript>alert('请先登录！');location.href='../login&register/login.php';</script>";

$conn=mysqli_connect($DBHOST,$DBUSER,$DBPWD,$DBNAME);
  //mysqli_select_db($conn,$DBNAME);
$strb = '<div class="btn-group"><button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
选班人员 <span class="caret"></span></button><ul class="dropdown-menu">';

$stre = '</ul></div>';
$get_staff = "select wstaff.wname from wstaff,select_shift where select_shift.sno = s and wstaff.wno = select_shift.wno;";
$get_arrange_staff = "select wstaff.wname from wstaff,arrange_shift where arrange_shift.sno = s and wstaff.wno = arrange_shift.wno;";
$zero = 0;
$str = "暂无人选该班";
$begin = 1;

?>

<html>
<head>
	<title>选班排班系统</title>
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
      var p = document.getElementById('table');
      p.setAttribute('class', 'active'); 
    </script>


    <div class="span9">
        <div class="hero-unit">
            <h1>本周当班表</h1>
            <p>收班出版板块</p>
            <!-- <p><a href="#" class="btn btn-primary btn-large">Learn more &raquo;</a></p> -->
        </div>
<div>
   <table width="100%" class="table table-striped table-bordered table-hover">
   <tr style="height: 50px;">
     <th>当班表</th>
     <th>星期一</th>
     <th>星期二</th>
     <th>星期三</th>
     <th>星期四</th>
     <th>星期五</th>
     <th>星期六</th>
     <th>星期日</th>
   </tr>
   <tr>
    <th>第一班</th>
        <?php
              for($i=1;$i<=28;$i+=4)
              {
                  $sql=substr_replace($get_arrange_staff,$i,-37,-36);
                  $re=mysqli_query($conn,$sql);
                  echo "<td>";
                  while ($row1=mysqli_fetch_assoc($re)) {
                    echo "<li>".$row1['wname']."</li>";
                  }
                  echo "<br>";
                  echo "</td>";
                };
        ?>
   </tr>
   <tr>
     <th>第二班</th>
        <?php
              for($i=2;$i<=28;$i+=4)
              {
                  $sql=substr_replace($get_arrange_staff,$i,-37,-36);
                  $re=mysqli_query($conn,$sql);
                  echo "<td>";
                  while ($row1=mysqli_fetch_assoc($re)) {
                    echo "<li>".$row1['wname']."</li>";
                  }
                  echo "<br>";
                  echo "</td>";
                };
        ?>
        </tr>
    <tr>
       <th>第三班</th>
        <?php
              for($i=3;$i<=28;$i+=4)
              {
                  $sql=substr_replace($get_arrange_staff,$i,-37,-36);
                  $re=mysqli_query($conn,$sql);
                  echo "<td>";
                  while ($row1=mysqli_fetch_assoc($re)) {
                    echo "<li>".$row1['wname']."</li>";
                  }
                  echo "<br>";
                  echo "</td>";
                };
        ?>
   </tr>
   <tr>
    <th>第四班</th>
        <?php
              for($i=4;$i<=28;$i+=4)
              {
                  $sql=substr_replace($get_arrange_staff,$i,-37,-36);
                  $re=mysqli_query($conn,$sql);
                  echo "<td>";
                  while ($row1=mysqli_fetch_assoc($re)) {
                    echo "<li>".$row1['wname']."</li>";
                  }
                  echo "<br>";
                  echo "</td>";
                };
        ?>
   </tr>
   </table>
</div> 
   <hr>
   </div><!--/.fluid-container-->

</body>
</html>
