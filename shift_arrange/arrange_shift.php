<?php
    //具体执行排班代码的php
    header("Content-type: text/html; charset=utf-8");
    require_once("../../db_pj_sys_conf.inc");
    require_once '../medoo/Medoo.php';
    use Medoo\Medoo;

    $conn = new mysqli($DBHOST, $DBUSER, $DBPWD , $DBNAME);
	// 检测连接

	if ($conn->connect_error) {
		die("连接失败: " . $conn->connect_error);
	} 

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

    $file=fopen("info.txt","w") or exit("Unable to open file!");
    foreach ($select_map as $key=>&$value){
        fwrite($file,$key." ");
        foreach($value as $v){
            fwrite($file,$v." ");
        }
        fwrite($file, "\n");
    }
    //读取选班信息，放到json文件中；
    // $json_t = json_encode($select_map);
   
    // fwrite($file, $json_t);
    fclose($file);
    //调用排班代码

/* 下面备注的代码是调用选班代码的模板*/
    // $args="Hello world";  
    // if($args == "")  
    // echo "<h1>You didn't enter any arguments.</h1>";  
    // else  
    // {  
    // echo "<h1>SampleApp Result</h1>";  
    $command = "./arrange";// . escapeshellcmd($args);  
    ///var/www/test/hello 是c++编译生成的hello 的路径  
    passthru($command);  
    //}
    $database = new Medoo([
        'database_type' => 'mysql',
        'database_name' => $DBNAME,
        'server' =>  $DBHOST,
        'username' => $DBUSER,
        'password' => $DBPWD,
    ]);

    $file=fopen("result.txt","r") or exit("Unable to open file!");
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