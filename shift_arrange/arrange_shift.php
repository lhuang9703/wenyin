<?php
    //具体执行排班代码的php
    session_start();
    header("Content-type: text/html; charset=utf-8");
    require_once("../../db_pj_sys_conf.inc");
    require_once '../medoo/Medoo.php';
    use Medoo\Medoo;

    //用session保护
    if(!isset($_SESSION["id"]))
        return ;

    $conn = new mysqli($DBHOST, $DBUSER, $DBPWD , $DBNAME);
	// 检测连接

	if ($conn->connect_error) {
		die("连接失败: " . $conn->connect_error);
	} 
    //首先结束选班环节   标志位设置为0,代表当前不允许排班
	$sql="update flags set flag_value = 0 where flag_name = 'allow_shift';";
    $result_nouse = $conn->query($sql);

	$sql = "SELECT wno,sno FROM select_shift;";
	$result = $conn->query($sql);

    $conn->close();
    $select_map = [];
	if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {

            $wno= $row["wno"];
            $sno= (int)($row["sno"])-1;

            if(isset($select_map[$wno]))
                array_push($select_map[$wno], $sno);
            else 
                $select_map[$wno]=array($sno);
		}
    }

    $file=fopen("../../info.txt","w") or exit("Unable to open file!");
    foreach ($select_map as $key=>&$value){
        fwrite($file,$key." ");
        foreach($value as $v){
            fwrite($file,$v." ");
        }
        fwrite($file, "\n");
    }

    fclose($file);
    
    //调用排班代码
    $command = "../../arrange";
    passthru($command);  

    $database = new Medoo([
        'database_type' => 'mysql',
        'database_name' => $DBNAME,
        'server' =>  $DBHOST,
        'username' => $DBUSER,
        'password' => $DBPWD,
    ]);
    usleep(300000);//暂停0.3秒
    //sleep(1);

    //先把原来排班信息删掉
    $database->query("DELETE from arrange_shift;"); 

    $file=fopen("../../result.txt","r") or exit("Unable to open file!");
    while(!feof($file)) {
        $line=fgets($file);
        $arr= explode(" ", $line);
        echo $arr[0];
        $shift = (int)($arr[0])+1; //获取班
        for($i=1; $i<count($arr); $i++){
            $id=$arr[$i];
            //插入数据库中
            $database->insert('arrange_shift', [
                'wno' => $id,
                'sno' => $shift,
            ]);
        }
      }
      
    fclose($file);
    //将排班结果输出到json文件中；

     //php  延迟1s
     //php  读取json文件
     //php 将排班结果插入到数据库中
   
     //排班结束后
     
    $conn->close();
?>