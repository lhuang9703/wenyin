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
        

    <div class="container">
        <!-- <h1>Hello, world!</h1> -->
        <!-- <div id="test-image-preview" style="border: 1px solid #ccc; width: 100%; height: 200px; background-size: contain; background-repeat: no-repeat; background-position: center center;"></div>
        <p id="test-file-info"></p> -->
        //左侧建立选择窗口
        <h2>个人状态</h2> 邮箱、 修改密码、状态
        <h2>新建订单</h2>
        <h3>打印要求</h3>
        <form action="/">
            <h4>单双面</h4>
            单面<input type="radio" name="sin_dou" value="single" checked>
            双面<input type="radio" name="sin_dou" value="double"> <br>
            <h4>一张纸文件张数(针对ppt或pdf)</h4>
            一面<input type="radio" name="ppt_n" value="1" checked> </input>
            双面<input type="radio" name="ppt_n" value="2"> 
            四面<input type="radio" name="ppt_n" value="4"> 
            六面<input type="radio" name="ppt_n" value="6"><br>
            <h4>上传文件</h4>
            备注:<input type="text" name="says" > <br>
            <input type="submit" value="Submit" >
        </form>

        <input class="input-block-level" type="file" id="file-upload" name="file"/>
        <button class="btn btn-large btn-primary" onclick="checkfile()"  >上传</button>

        订单查看中，有下面三个小项
         <h2>未处理订单</h2>
            下单日期，订单状态（）
        <h2>已处理订单</h2>
        <h2>已完成订单</h2>
        
    </div>
    
  </body>
</html>