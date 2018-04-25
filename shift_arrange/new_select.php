<?php
	session_start(); 
	header("Content-type: text/html; charset=utf-8");
	require_once("../../db_pj_sys_conf.inc");


	if(isset($_SESSION["id"])){  //使用session作为保护
		$conn=mysqli_connect($DBHOST,$DBUSER,$DBPWD,$DBNAME);
		$sql="select flag_value from flags where flag_name = 'allow_shift';";
		$re=mysqli_query($conn,$sql);
		$row=mysqli_fetch_assoc($re);

		//标志位设置为1, 代表允许选班操作
		$sq="update flags set flag_value = 1 where flag_name = 'allow_shift';";
		$r=mysqli_query($conn,$sq);

		//删掉之前选班结果，否则之前的值会影响
		$delete_table = "truncate table select_shift;";
		$re=mysqli_query($conn,$delete_table);
	}

?>