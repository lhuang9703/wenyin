<?php 
session_start(); 
header("Content-type: text/html; charset=utf-8");
require_once("db_pj_sys_conf.inc");
?>

<!DOCTYPE html>
<html>
<head>
	<title>文印管理系统</title>
	<script src="https://apps.bdimg.com/libs/jquery/2.1.4/jquery.min.js"> </script>

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
				<h1>hello world!</h1>
				<p class="lead">文印的一些简介，简介，简介，简介~~~</p>
				<a class="btn btn-large btn-success" href="/login&register/register.php">注册来预约打印吧</a>
		</div>
	<hr>

	<div class="row-fluid marketing">
        <div class="span6">
          <h4>文印业务简介</h4>
          <p>Donec id elit non mi porta gravida at eget metus. Maecenas faucibus mollis interdum.</p>

          <h4>文印公众号文章</h4>
          <p>Morbi leo risus, porta ac consectetur ac, vestibulum at eros. Cras mattis consectetur purus sit amet fermentum.</p>

          <h4>文印照片墙</h4>
          <p>Maecenas sed diam eget risus varius blandit sit amet non magna.</p>
        </div>

        <div class="span6">
          <h4>资料</h4>
          <p>Donec id elit non mi porta gravida at eget metus. Maecenas faucibus mollis interdum.</p>

          <h4>价格明细</h4>
          <p>Morbi leo risus, porta ac consectetur ac, vestibulum at eros. Cras mattis consectetur purus sit amet fermentum.</p>

          <h4><a href="/complaint/complaint.php">顾客投诉</a></h4>
          <p>Maecenas sed diam eget risus varius blandit sit amet non magna.</p>
        </div>
	</div>
	  
	</div> 
</body>
</html>
