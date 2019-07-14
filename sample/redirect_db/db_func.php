<?php
	function db_connect()
	{
		$con = mysqli_connect("localhost", "root", "") or die("接続失敗");
		mysqli_set_charset($con, "utf8");
		mysqli_select_db($con, "ph22_test");
		return $con;
	}

	function db_close($con)
	{
		mysqli_close($con);
	}

	function students_list()
	{
		$con = db_connect();
		$sql = "SELECT class, no, name FROM students";
		$result = mysqli_query($con, $sql);
		$list = array();
		while ($row = mysqli_fetch_array($result)) {
			$list[] = $row;
		}
		db_close($con);
		return $list;
	}

	function students_insert($class, $no, $name)
	{
		$con = db_connect();
		$sql = "INSERT INTO students VALUES (?, ?, ?)";
		$stmt = mysqli_prepare($con, $sql);
		mysqli_stmt_bind_param($stmt, 'sis', $class, $no, $name);
		$result = mysqli_stmt_execute($stmt);
		mysqli_stmt_close($stmt);
		db_close($con);
		return $result;
	}
?>
