<?php
function db_connect()
{
	$con = mysqli_connect("localhost", "root", "") or die("接続失敗");
	mysqli_set_charset($con, "utf8");
	mysqli_select_db($con, "hash_test");
	return $con;
}

function db_close($con)
{
	mysqli_close($con);
}

function read_id($login_id, $password)
{
	$con = db_connect();
	$sql = "SELECT id, password_hash FROM accounts WHERE login_id = ?";
	$stmt = mysqli_prepare($con, $sql);
	mysqli_stmt_bind_param($stmt, 's', $login_id);
	mysqli_stmt_execute($stmt);
	$result = mysqli_stmt_get_result($stmt);
	$row = mysqli_fetch_array($result);
	mysqli_stmt_close($stmt);
	db_close($con);

	// パスワードとハッシュ値のチェック
	if($row && password_verify($password,$row["password_hash"])){
		// 成功の場合
		return $row["id"];
	}else{
		// 失敗の場合
		return FALSE;
	}
}

function read_row($id)
{
	$con = db_connect();
	$sql = "SELECT login_id, password_hash, name FROM accounts WHERE id = ?";
	$stmt = mysqli_prepare($con, $sql);
	mysqli_stmt_bind_param($stmt, 'i', $id);
	mysqli_stmt_execute($stmt);
	$result = mysqli_stmt_get_result($stmt);
	$row = mysqli_fetch_array($result);
	mysqli_stmt_close($stmt);
	db_close($con);
	return $row;
}

function exists($login_id)
{
	$con = db_connect();
	$sql = "SELECT id FROM accounts WHERE login_id = ?";
	$stmt = mysqli_prepare($con, $sql);
	mysqli_stmt_bind_param($stmt, 's', $login_id);
	mysqli_stmt_execute($stmt);
	$result = mysqli_stmt_get_result($stmt);
	$row = mysqli_fetch_array($result);
	mysqli_stmt_close($stmt);
	db_close($con);
	if($row) {
		return true;
	} else {
		return false;
	}
}

function insert($login_id, $password, $name)
{
	// パスワードをハッシュ値に変換
	$password_hash = password_hash($password,PASSWORD_DEFAULT);

	$con = db_connect();
	$sql = "INSERT INTO accounts (login_id, password_hash, name) VALUES (?, ?, ?)";
	$stmt = mysqli_prepare($con, $sql);
	mysqli_stmt_bind_param($stmt, 'sss', $login_id, $password_hash, $name);
	$result = mysqli_stmt_execute($stmt);
	print mysqli_error($con);
	mysqli_stmt_close($stmt);
	db_close($con);
	return $result;
}
?>
