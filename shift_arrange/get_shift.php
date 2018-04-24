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
    
    echo $_POST["id"];
    echo $_POST["shift1"];
    echo $_POST["shift2"];
    //echo "alalal";
    //删除上次提交的选班数据，插入新选班数据
    if(isset($_POST["id"])){
        $database->delete("select_shift", [
                "wno" => $_POST["id"]
        ]);

        $shifts=array();
        for($i=1; $i<=28; $i++){
            $str="shift";
            $str=$str.(string)$i;
            if(isset($_POST[$str])){
                    $database->insert('select_shift', [
                        'wno' => $_POST["id"],
                        'sno' => $i ,
                    ]);
            }
        }
    }
?>