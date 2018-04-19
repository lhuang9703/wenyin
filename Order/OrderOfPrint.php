<!DOCTYPE html>
<html>
  <head>
    <title>预约打印</title>
    <script src="https://apps.bdimg.com/libs/jquery/2.1.4/jquery.min.js"> </script>
	<?php include '../format/head.php'; ?>
    <style>
			body {
			  padding-top: 60px; /* 60px to make the container go all the way to the bottom of the topbar */
			}
    </style>
    <!-- 处理文件的函数 -->
	<script src="/js/pro_file2.js"></script>
	<script src="/js/processfile.js"></script>
  </head>
  <body>

    <!-- 加载头部，并设置成活动页面 -->
    <?php include "../format/menu.php"; ?>
    <script>
            var p = document.getElementById('order_print');
            p.setAttribute('class', 'active');   
    </script>
        
    <如果未登录，请先登录>
    <a href="orders.php">订单</a>
  </body>
</html>