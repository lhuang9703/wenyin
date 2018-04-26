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
			  padding-top: 80px; /* 60px to make the container go all the way to the bottom of the topbar */
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

		<input type="button" value="查看投诉信息" onclick="lookup();"/>
        <div id="show"> </div>


<!-- //管理员工信息：
员工添加 批量添加，从excel文件中导入，初始密码为后四位，数据库里存储密文）
员工删除
员工权限修改，（管理员权限转让， 0,1，2，3之间转换）
群通知
修改主页信息 -->
      <hr>
    </div><!--/.fluid-container-->

</body>
<script>
	function lookup(){
		$.ajax({
                url:"operation/lookup_complaint.php",
                type:"post",
                data:{},
                processData:false,
                contentType:false,
                success:function(data){
                    console.log("over..");
                    // $("#show").text(data);
                    document.getElementById("show").innerHTML=data;    
                },
                error:function(e){
                    alert("提交失败！");
                }
            });	
	}

</script>
</html>
