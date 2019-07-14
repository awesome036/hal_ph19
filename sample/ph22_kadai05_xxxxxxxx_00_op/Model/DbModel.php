<?php
function db_connect(){
		$con = mysqli_connect("mysql", "root", "root") or die("接続失敗");
		mysqli_set_charset($con, "utf8mb4");
		mysqli_select_db($con, "ph22_kadai05_pw51a335_02");
		return $con;
	}

function db_close($con)
{
	mysqli_close($con);
}

function write($account_id, $title, $filename) {
  $con = db_connect();
  $sql = "INSERT INTO image_file (account_id, title, filename) VALUES (?, ?, ?)";
  $stmt = mysqli_prepare($con, $sql);
  mysqli_stmt_bind_param($stmt, 'sss', $account_id, $filename, $title);
  $result = mysqli_stmt_execute($stmt);
	mysqli_stmt_close($stmt);
	db_close($con);
	return $result;
}

function read_list($acocunt_id) {
	$con = db_connect();
  $sql = "SELECT id, title, filename, publish FROM image_file WHERE account_id = ? ORDER BY id";
	$stmt = mysqli_prepare($con, $sql);
	mysqli_stmt_bind_param($stmt, 's', $acocunt_id);
	mysqli_stmt_execute($stmt);
	$result = mysqli_stmt_get_result($stmt);
  $list = array();
  while ($row = mysqli_fetch_assoc($result)) {
    $list[] = array("id" => $row["id"], "title" => $row["title"], "filename" => $row["filename"], "publish" => $row["publish"]);
  }
	mysqli_stmt_close($stmt);
	db_close($con);
  return $list;
}

function read_list_other($acocunt_id) {
	$con = db_connect();
  $sql = "SELECT id, title, filename, publish FROM image_file WHERE account_id <> ? AND publish = 1 ORDER BY id";
	$stmt = mysqli_prepare($con, $sql);
	mysqli_stmt_bind_param($stmt, 's', $acocunt_id);
	mysqli_stmt_execute($stmt);
	$result = mysqli_stmt_get_result($stmt);
  $list = array();
  while ($row = mysqli_fetch_assoc($result)) {
    $list[] = array("id" => $row["id"], "title" => $row["title"], "filename" => $row["filename"], "publish" => $row["publish"]);
  }
	mysqli_stmt_close($stmt);
	db_close($con);
  return $list;
}

function publish($id, $value) {
	$con = db_connect();
  $sql = "UPDATE image_file SET publish = ? WHERE id = ?";
  $stmt = mysqli_prepare($con, $sql);
  mysqli_stmt_bind_param($stmt, ii, $value, $id);
  $result = mysqli_stmt_execute($stmt);
	mysqli_stmt_close($stmt);
	db_close($con);
	return $result;
}

function delete($id) {
	$con = db_connect();
  $sql = "DELETE FROM image_file WHERE id = ?";
  $stmt = mysqli_prepare($con, $sql);
  mysqli_stmt_bind_param($stmt, i, $id);
  $result = mysqli_stmt_execute($stmt);
	mysqli_stmt_close($stmt);
	db_close($con);
	return $result;
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

	// パスワードハッシュのチェック
	if ($row && password_verify($password, $row["password_hash"])) {
		return $row["id"];
	} else {
		return false;
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
	$password_hash = password_hash($password, PASSWORD_DEFAULT);

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
