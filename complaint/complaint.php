<?php 
    session_start(); 
    header("Content-type: text/html; charset=utf-8");
    require_once("../../db_pj_sys_conf.inc");
    require_once '../medoo/Medoo.php';
?>
<!DOCTYPE html>
<html>
<head><meta charset="UTF-8">
    <title>学生文印中心投诉系统</title>
    <?php include '../format/head.php'; ?>
    <script src="https://cdn.bootcss.com/vue/2.2.2/vue.min.js"></script>
    <style>
    body {
        padding-top: 60px;
        padding-bottom: 40px;
      }
    </style>

</head>
<body >
    <?php  include "../format/menu.php"?>
    <script>
		var p = document.getElementById('compliant');
		p.setAttribute('class', 'active'); 
	</script>

    <!-- 导入表格（由于比较大，所以放在另一个文件中） -->
    <?php include 'showtable.php'; ?>
    

</body>
<script type="text/javascript">
        $(document).ready (function () {
                var myDate=new Date();
                $("#time1").text("当前时间为："+ myDate.getHours()+"时"+  myDate.getMinutes()+"分");
        });

        $("textarea").mouseenter(function(){
                if($(this).text()=="please write our ploblems.") {
                    $(this).text("");
                }
                });
        $("textarea").mouseleave(function(){
                if($(this).text()==""){
                    $(this).text("please write our ploblems.");
                    }
                });
        
        //向服务器提交信息的函数
        function postdata(shift, rate, complaint){
                var url = "./getcomplaint.php";
                var params = {
                        "shift": shift,
                        "rate": rate,
                        "complaint": complaint
                };

                $.ajax({
                        type: "POST",
                        url: url,
                        data : params,
                        success: function(msg) {
                            alert(msg+"您的反馈我们已经收到！感谢您的支持~~")
                    }
                });
                return false;
            }
</script>


<script type="text/javascript">
//vue.js 相关脚本
		var Data = {
				showdate: false,
                newShift: {
                    shift:1,
                    rate: 3,
                    complaint: ''
                },
                Items: []
            }
		var Methods = {

                createShift: function(){
                    var shiftstr;
                    if(this.newShift.shift==1)
                        shiftstr="9:15-12:15";
                    else if(this.newShift.shift==2)
                        shiftstr="12:15-15:15";
                    else if(this.newShift.shift==3)
                        shiftstr="15:15-17:15";
                    else if(this.newShift.shift==4)
                        shiftstr="17:15-21:15"; 

                    this.Items.push([shiftstr, this.newShift.rate, this.newShift.complaint]);
                    postdata(this.newShift.shift, this.newShift.rate, this.newShift.complaint);
                    this.newShift = {shift:1, rate: 3, complaint: ''};
                },                            
            }

        var vm = new Vue({
            el: '#app',
            data: Data,
            methods: Methods
        })
</script>
</html>
