<?php 
	session_start();
	header("Content-type: text/html; charset=utf-8");
	require_once("../../db_pj_sys_conf.inc");

	echo "<table>
			<thead>
				<tr>
					<th>日期</th> 
					<th>班次</th> 
					<th>评分</th>
					<th>吐槽</th>
				</tr>
			</thead>

		<tbody>";

	$conn = new mysqli($DBHOST, $DBUSER, $DBPWD , $DBNAME);
	// 检测连接

	if ($conn->connect_error) {
		die("连接失败: " . $conn->connect_error);
	} 

	$sql = "SELECT * FROM comp;";
	$result = $conn->query($sql);

	if ($result->num_rows > 0) {
		// 输出数据
		
		while($row = $result->fetch_assoc()) {
			echo "<tr>";
			echo "<td>" . $row["local_time"] . "</td>";
			echo "<td>" . $row["shift"] . "</td>";
			echo "<td>" . $row["rate"] . "</td>";
			echo "<td>" . $row["comp"] . "</td>";
			echo "</tr>";
		}
		
	}
	else {
		echo "记录为空";
	}
	

	echo "</tbody>
		  </table>";

	$conn->close();
?>

