<?php
    session_start();
    header("Content-type: text/html; charset=utf-8");
    require_once("../../db_pj_sys_conf.inc");
    require_once '../medoo/Medoo.php';
    use Medoo\Medoo;

   if($_SESSION["commit_time"] >6) //一次会话，提交不能超过6次
    {echo "提交次数过多!";
        die();
    }
    $database = new Medoo([
            'database_type' => 'mysql',
            'database_name' => $DBNAME,
            'server' =>  $DBHOST,
            'username' => $DBUSER,
            'password' => $DBPWD,
        ]);
 
    $shift=$_POST["shift"];
    $rate=$_POST["rate"];
    $complaint=$_POST["complaint"] ;


    $_SESSION["commit_time"]  = (int)($_SESSION["commit_time"])+1;
    $database->insert('comp', [
        'shift' => $shift,
        'rate' => $rate ,
        'comp' => $complaint,
    ]);
    echo "您的反馈已收到，谢谢支持!";
?>