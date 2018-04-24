<?php
    //具体执行排班代码的php
    header("Content-type: text/html; charset=utf-8");
    require_once("../../db_pj_sys_conf.inc");
    require_once '../medoo/Medoo.php';
    use Medoo\Medoo;

    $database = new Medoo([
            'database_type' => 'mysql',
            'database_name' => $DBNAME,
            'server' =>  $DBHOST,
            'username' => $DBUSER,
            'password' => $DBPWD,
        ]);
 
    
        //读取选班信息，放到json文件中；
        
        //调用排班代码
/* 下面备注的代码是调用选班代码的模板*/
        // $args="Hello world";  
        // if($args == "")  
        // echo "<h1>You didn't enter any arguments.</h1>";  
        // else  
        // {  
        // echo "<h1>SampleApp Result</h1>";  
        // $command = "/var/www/test/hello " . escapeshellcmd($args);  
        // ///var/www/test/hello 是c++编译生成的hello 的路径  
        // passthru($command);  
        // }
    //将排班结果输出到json文件中；

     //php  延迟1s
     //php  读取json文件
     //php 将排班结果插入到数据库中
   
     //排班结束后
    
    // $shift2=$_POST["shift2"];
    // $rate=$_POST["rate"];
    // $complaint=$_POST["complaint"] ;

    // $database->insert('comp', [
    //     'shift' => $shift,
    //     'rate' => $rate ,
    //     'comp' => $complaint,
    // ]);
?>