<?php
	session_start(); 
	header("Content-type: text/html; charset=utf-8");
	require_once("../../db_pj_sys_conf.inc");

	if(isset($_SESSION["id"])){  //使用session作为保护
		$conn=mysqli_connect($DBHOST,$DBUSER,$DBPWD,$DBNAME);
		$sql="select flag_value from flags where flag_name = 'allow_shift';";
		$re=mysqli_query($conn,$sql);
		$row=mysqli_fetch_assoc($re);

		//标志位设置为0,代表当前不允许排班
		$sq="update flags set flag_value = 0 where flag_name = 'allow_shift';";
		$r=mysqli_query($conn,$sq);
	}
?>