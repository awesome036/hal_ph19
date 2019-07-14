<?php
	function db_connect(){
		$con = mysqli_connect("mysql", "root", "root") or die("接続失敗");
		mysqli_set_charset($con, "utf8mb4");
		mysqli_select_db($con, "ph22_shop");
		return $con;
	}

	function db_close($con){
		mysqli_close($con);
	}

	function insert($login_id, $password, $name){
		$password_hash = password_hash($password, PASSWORD_DEFAULT);

		$con = db_connect();
		$sql = "INSERT INTO staff (login_id, password_hash, name) VALUES (?, ?, ?)";
		$stmt = mysqli_prepare($con, $sql);
		mysqli_stmt_bind_param($stmt, 'sss', $login_id, $password_hash, $name);
		$result = mysqli_stmt_execute($stmt);
		print mysqli_error($con);
		mysqli_stmt_close($stmt);
		db_close($con);
		return $result;
	}

	function read_id($login_id, $password){
		$con = db_connect();
		$sql = "SELECT login_id, password_hash FROM staff WHERE login_id = ?";
		$stmt = mysqli_prepare($con, $sql);
		mysqli_stmt_bind_param($stmt, 's', $login_id);
		mysqli_stmt_execute($stmt);
		$result = mysqli_stmt_get_result($stmt);
		$row = mysqli_fetch_array($result);
		mysqli_stmt_close($stmt);
		db_close($con);

		// パスワードハッシュのチェック
		if ($row && password_verify($password, $row["password_hash"])) {
			return $row["login_id"];
		} else {
			return false;
		}
	}

	function read_row($id){
		$con = db_connect();
		$sql = "SELECT login_id, password_hash, name FROM staff WHERE login_id = ?";
		$stmt = mysqli_prepare($con, $sql);
		mysqli_stmt_bind_param($stmt, 's', $id);
		mysqli_stmt_execute($stmt);
		$result = mysqli_stmt_get_result($stmt);
		$row = mysqli_fetch_array($result);
		mysqli_stmt_close($stmt);
		db_close($con);
		return $row;
	}
?>