<?php
    header("Content-type: text/html; charset=utf-8");
    require_once("../../db_pj_sys_conf.inc");
    require_once '../medoo/Medoo.php';
    use Medoo\Medoo;
    //不对，应该只允许前端提交；
   //前端用ajax提交，服务器接口暴露，应当对ip进行检查
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

    $database->insert('comp', [
        'shift' => $shift,
        'rate' => $rate ,
        'comp' => $complaint,
    ]);
?>