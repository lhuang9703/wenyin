<?php 
session_start(); 
header("Content-type: text/html; charset=utf-8");
require_once("../../db_pj_sys_conf.inc");
require_once '../medoo/Medoo.php';

if(isset($_SESSION["id"])){
	if((int)($_SESSION["privilege"])>4){
		echo "<script language=javascript>alert('对不起，您没有权限！');location.href='../index.php';</script>";
	}
}else
echo "<script language=javascript>alert('请先登录！');location.href='../login&register/login.php';</script>";

//这里查找基础的个人信息
use Medoo\Medoo;
$database = new Medoo([
  'database_type' => 'mysql',
  'database_name' => $DBNAME,
  'server' =>  $DBHOST,
  'username' => $DBUSER,
  'password' => $DBPWD,
]);


$data= $database->select('wstaff', ['wno','wname','wprivilege','wphone','wbirthday','wsex'],
['wno'=> $_SESSION["id"] ]  );

// $wno="";
// $wname="";
// $wprivilege="";
// $wphone="";
// $wbirthday="";
// $wsex="";

if(count($data,0)>0){
  $wno=   $data[0]['wno'];
  $wname=  $data[0]['wname'];
  $wprivilege=$data[0]['wprivilege'];
  $wphone=$data[0]['wphone'];
  $wbirthday=$data[0]['wbirthday'];
  $wsex=$data[0]['wsex'];

  if($wprivilege==0)
    $wprivilege="管理员";
  else if($wprivilege==1)
    $wprivilege="中高层经理";
  else if($wprivilege==2)
    $wprivilege="员工";
  else if($wprivilege==3)
    $wprivilege="保留编制";
  else
    $wprivilege="顾客";
}


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
        var p = document.getElementById('selfinfo');
        p.setAttribute('class', 'active'); 
      </script>

      <div class="span9">
        <div class="hero-unit">
          <h1>Hello, world!</h1>
          <p>请在13月25点之前完成填班工作</p>
          <!-- <p><a href="#" class="btn btn-primary btn-large">Learn more &raquo;</a></p> -->
        </div> 
          <!-- </br><fieldset> -->
        <legend>员工基本信息</legend>
        <table width='100%'>
            <tr>
              <th>学号:</th>
                <td id="wno">
                </td>
              <th>姓名:</th>
                <td id="wname">
                </td>
            </tr>
            <tr>
              <th>权限:</th>
                <td id="wprivilege">
                </td>  
              <th>性别:</th>
                <td id="wsex">
                </td>
            </tr>

            <tr>
              <th>电话:</th>
                <td id="wphone">
                </td>  
              <th>生日:</th>
                <td id="wbirthday">
                </td>
            </tr> 
        </table>
        <hr>
        <button id="change_button">更改密码</button>

        <fieldset>
          <form  id="change_form" action="scode_sure.php" method="post">
            请先输入您原密码验证身份：</br><input type="password" name="pw_su"/></br></br>
            <input type="submit" name="subm" class="login_button" value="提交" /></button> &nbsp &nbsp
            <input type="reset" id="reset" value="取消">
          </form>
        </fieldset>

    <!-- </fieldset> -->
      </div>
      <hr>
    </div>
  </div><!--/.fluid-container-->

</body>
<script>
  var wno=   "<?php echo $wno; ?>";
  var wname= "<?php echo $wname; ?>";
  var wprivilege="<?php echo $wprivilege; ?>";
  var wphone= "<?php echo $wphone; ?>";
  var wbirthday= "<?php echo $wbirthday; ?>";
  var wsex=  "<?php echo $wsex; ?>";

  $(document).ready(function(){
    $("#wno").text(wno);
    $("#wname").text(wname);
    $("#wprivilege").text(wprivilege);
    $("#wphone").text(wphone);
    $("#wbirthday").text(wbirthday);
    $("#wsex").text(wsex);
    $("#change_form").hide();
  });

  $("#change_button").click(function(){
    if($("#change_form").is(":hidden")){  
      
      $("#change_form").show();
    } 
    else {
      $("#change_form").hide();
    }
  });

</script>
</html>
