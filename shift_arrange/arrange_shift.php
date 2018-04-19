
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
 

    //读取选班信息
    //调用排班代码
    //得到排班结果，并且返回到数据库中；
    //前端应该有等待排班结果的机制；
    
    // $shift2=$_POST["shift2"];
    // $rate=$_POST["rate"];
    // $complaint=$_POST["complaint"] ;

    // $database->insert('comp', [
    //     'shift' => $shift,
    //     'rate' => $rate ,
    //     'comp' => $complaint,
    // ]);
?>