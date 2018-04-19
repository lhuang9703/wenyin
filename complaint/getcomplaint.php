<?php
    header("Content-type: text/html; charset=utf-8");
    require_once("../db_pj_sys_conf.inc");
    require_once '../medoo/Medoo.php';
    use Medoo\Medoo;

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