<!DOCTYPE html>
<html>
<head>
    <title>预约打印</title>
	  <?php include '../format/head.php'; ?>
    <style>
			body {
			  padding-top: 60px; /* 60px to make the container go all the way to the bottom of the topbar */
			}
          /* Custom container */
    .container-narrow {
      margin: 0 auto;
      max-width: 700px;
    }
    .container-narrow > hr {
      margin: 30px 0;
    }
    .jumbotron {
      margin: 60px 0;
      text-align: center;
    }
    .jumbotron h1 {
      font-size: 72px;
      line-height: 1;
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
        

    <div class="container-narrow">
          <div class="jumbotron">
            <h1>敬请期待</h1>
            <p>此版块正在开发中……</p>
            <!-- <p><a href="#" class="btn btn-primary btn-large">Learn more &raquo;</a></p> -->
        </div>
    </div>
    
</body>
</html>