<?php 
session_start(); 
header("Content-type: text/html; charset=utf-8");
require_once("../db_pj_sys_conf.inc");
?>

<!DOCTYPE html>
<html>
<head>
	<title>文印管理系统</title
  <?php include './format/head.php'; ?>
	<style>
	  body {
        padding-top: 60px;
        padding-bottom: 40px;
      }
    /* Custom container */
    .container-narrow {
      margin: 0 auto;
      max-width: 700px;
    }
    .container-narrow > hr {
      margin: 30px 0;
    }
    /* Main marketing message and sign up button */
    .jumbotron {
      margin: 60px 0;
      text-align: center;
    }
    .jumbotron h1 {
      font-size: 72px;
      line-height: 1;
    }
    .jumbotron .btn {
      font-size: 21px;
      padding: 14px 24px;
    }
    /* Supporting marketing content */
    .marketing {
      margin: 60px 0;
    }
    .marketing p + h4 {
      margin-top: 28px;
    }
	</style>
</head>
<body>
	<?php include './format/menu.php'; ?>
	<script>
		var p = document.getElementById('main_page');
		p.setAttribute('class', 'active'); 
	</script>

<?php
	echo date("Y-m-d")."&nbsp;&nbsp;";
	echo date("l");
?>
   <hr>
   <div class="container-narrow">
		<div class="jumbotron">
				<h1>欢迎来到文印家家</h1>
				<p class="lead">学生文印中心，位于叶耀珍楼115室，光华公司旗下打印店。</p>
				<a class="btn btn-large btn-success" href="/shift_arrange/shift.php">进入选班</a>
		</div>
	<hr>

	<div class="row-fluid marketing">
        <div class="span6">
          <h4>业务简介</h4>
          <p>打印、复印、扫描、期末资料</p>

          <h4>价格明细</h4>
          <p>A470g：0.1元/张</p>
        </div>

        <div class="span6">
          <h4>资料类型</h4>
          <p>《我是马基》</p>

          <h4><a href="/complaint/complaint.php">顾客投诉</a></h4>
          <p>向我们反馈文印的服务情况吧！</p>
        </div>
	</div>
	  
	</div> 
</body>
</html>
