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
    <hr>
        按钮：新建排班（给定一个排班id，标志每个排班，把id放在数据库中）；提交到php文件中，同时用js生成代码；

        这里应该有排班表： 显示每个班上选的人数（下拉菜单，点击后，可以将某个人选中） 显示当前班的排班结果（内容，但可以取消）； 表头是： 有几个人已经填写；
        按钮：自动排班
        按钮：使用此排班
        
        <hr>

    </div><!--/.fluid-container-->

</body>
<script>
function arrange(){
        $.ajax({
                url:"arrange_shift.php",
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
