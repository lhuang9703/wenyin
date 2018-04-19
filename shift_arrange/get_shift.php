<?php
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
 
    //做一个循环，判断1-28是否出现，对某个人形成一个json文件；
    //数据表中，以每个人为主键，28个字符表示选班结果；
    //管理员新建排班时，会先将存储选班表的数据库清空；
        
    // $shift2=$_POST["shift2"];
    // $rate=$_POST["rate"];
    // $complaint=$_POST["complaint"] ;

    // $database->insert('comp', [
    //     'shift' => $shift,
    //     'rate' => $rate ,
    //     'comp' => $complaint,
    // ]);
?>