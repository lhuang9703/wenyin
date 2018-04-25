<?php 
session_start(); 
header("Content-type: text/html; charset=utf-8");
require_once("../../db_pj_sys_conf.inc");
require_once '../medoo/Medoo.php';
if(isset($_SESSION["id"])){
	if((int)($_SESSION["privilege"])>0){
		echo "<script language=javascript>alert('对不起，您没有权限！');location.href='./shift.php';</script>";
	}
}else
echo "<script language=javascript>alert('请先登录！');location.href='../login&register/login.php';</script>";
?>
<!DOCTYPE html>
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
        var p = document.getElementById('arrange');
        p.setAttribute('class', 'active'); 
      </script>

    <div class="span9">
          <div class="hero-unit">
            <h1>排班页面</h1>
            <p>请在13月25点之前完成填班工作</p>
            <!-- <p><a href="#" class="btn btn-primary btn-large">Learn more &raquo;</a></p> -->
          </div> 
    <button onclick="arrange();">排班</button>

    </div><!--/.fluid-container-->

</body>
<script>
function arrange(){
        $.ajax({
                url:"./arrange_shift.php",
                type:"post",
                data:{},
                processData:false,
                contentType:false,
                success:function(data){
                    console.log("over..");
					          alert("排班成功！");
                },
                error:function(e){
                    alert("排班失败！");
                }
            });
  // window.location.href="arrange_shift.php";
}
</script>

</html>
