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
        var p = document.getElementById('arrange');
        p.setAttribute('class', 'active'); 
      </script>

    <div class="span9">
        <button  class="btn btn-default" onclick="new_select();" >初始化排班 </button>
        <!-- <button class="btn btn-default" onclick="stop_select();">结束选班</button> -->
        <button class="btn btn-default" onclick="arrange();" href="#">开始排班</button>
        <button a class="btn btn-default"  onclick="release();" href="#" >发布排班表</button>
        <hr>
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

<?php

#连接数据库

$conn=mysqli_connect($DBHOST,$DBUSER,$DBPWD,$DBNAME);

#预定义一些样式
$strb = '<div class="btn-group"><button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
  选班人员 <span class="caret"></span></button><ul class="dropdown-menu">';
$stre = '</ul></div>';

#sql语句
#每班选班的员工

$get_staff_1 = "SELECT wstaff.wname from wstaff,select_shift where select_shift.sno =";
$get_staff_2=" and wstaff.wno = select_shift.wno;";
#每班安排的员工
$get_arrange_staff_1 = "select wstaff.wname from wstaff,arrange_shift where arrange_shift.sno = ";
$get_arrange_staff_2=" and wstaff.wno = arrange_shift.wno;";

$zero = 0;
$str = "";
$begin = 1;

//php 输出表格
  echo "<tr><th>第一班</th>";
      for($i=1;$i<=28;$i+=4)
      {
          $sql=$get_arrange_staff_1. $i . $get_arrange_staff_2;
          $re=mysqli_query($conn,$sql);
          $cou=$get_staff_1. $i . $get_staff_2;
          $result=mysqli_query($conn,$cou);
          $num_results = mysqli_num_rows($result);
          echo "<td>";
          while ($row1=mysqli_fetch_assoc($re)) {
            echo "<li>".$row1['wname']."</li>";
          }
          echo "<br>";
          if($num_results>$zero)
          {
            echo $strb;
            while($row=mysqli_fetch_assoc($result)){
              echo "<li>".$row['wname']."</li>";}
            echo $stre;
          }
          else
              echo $str;
          echo "</td>";
        };

  echo "</tr><tr><th>第二班</th>";
    for($i=2;$i<=28;$i+=4)
            {
                $sql=$get_arrange_staff_1. $i . $get_arrange_staff_2;
                $re=mysqli_query($conn,$sql);
                $cou=$get_staff_1. $i . $get_staff_2;
                $result=mysqli_query($conn,$cou);
                $num_results = mysqli_num_rows($result);
                echo "<td>";
                while ($row1=mysqli_fetch_assoc($re)) {
                  echo "<li>".$row1['wname']."</li>";
                }
                echo "<br>";
                if($num_results>$zero)
                {
                  echo $strb;
                  while($row=mysqli_fetch_assoc($result)){
                    echo "<li>".$row['wname']."</li>";}
                  echo $stre;
                }
                else
                    echo $str;
                echo "</td>";
              };

  echo "</tr><tr><th>第三班</th>";
        for($i=3;$i<=28;$i+=4)
        {
            $sql=$get_arrange_staff_1. $i . $get_arrange_staff_2;
            $re=mysqli_query($conn,$sql);
            $cou=$get_staff_1. $i . $get_staff_2;
            $result=mysqli_query($conn,$cou);
            $num_results = mysqli_num_rows($result);
            echo "<td>";
            while ($row1=mysqli_fetch_assoc($re)) {
              echo "<li>".$row1['wname']."</li>";
            }
            echo "<br>";
            if($num_results>$zero)
            {
              echo $strb;
              while($row=mysqli_fetch_assoc($result)){
                echo "<li>".$row['wname']."</li>";}
              echo $stre;
            }
            else
                echo $str;
            echo "</td>";
          };

  echo "</tr><tr><th>第四班</th>";
        for($i=4;$i<=28;$i+=4)
        {
            $sql=$get_arrange_staff_1. $i . $get_arrange_staff_2;
            $re=mysqli_query($conn,$sql);
            $cou=$get_staff_1. $i . $get_staff_2;
            $result=mysqli_query($conn,$cou);
            $num_results = mysqli_num_rows($result);
            echo "<td>";
            while ($row1=mysqli_fetch_assoc($re)) {
              echo "<li>".$row1['wname']."</li>";
            }
            echo "<br>";
            if($num_results>$zero)
            {
              echo $strb;
              while($row=mysqli_fetch_assoc($result)){
                echo "<li>".$row['wname']."</li>";}
              echo $stre;
            }
            else
                echo $str;
            echo "</td>";
          };

echo "</tr>";
?>
    </table>
    </div>      
    <hr>
</div><!--/.fluid-container-->
   
</body>
<script>
//排班
function arrange(){
    $.ajax({
            url:"./operation/arrange_shift.php",
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
}
//发布当班表
function release(){
  if(window.confirm("注意，此操作会清空原来的排班表!")){
    ;
  }else return; //若用户取消，则函数返回，不执行操作
    
    $.ajax({
            url:"./operation/release_result.php",
            type:"post",
            data:{},
            processData:false,
            contentType:false,
            success:function(data){
                console.log("over..");
                alert("发布成功！");
            },
            error:function(e){
                alert("发布失败！");
            }
        });
}

//新建选班
function new_select(){
  if(window.confirm("注意，此操作会清空上次选班的信息!")){
    ;
  }else return; //若用户取消，则函数返回，不执行操作

    $.ajax({
            url:"./operation/new_select.php",
            type:"post",
            data:{},
            processData:false,
            contentType:false,
            success:function(data){
                console.log("over..");
                alert("选班已经重新开放………");
            },
            error:function(e){
                alert("初始化失败！");
            }
        });
}
</script>

</html>
