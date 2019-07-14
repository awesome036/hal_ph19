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

	function write($code, $name, $price, $image_name) {
		$con = db_connect();
		$sql = "INSERT INTO product(code, name, price, image_name) VALUES(?, ?, ?, ?)";
		$stmt = mysqli_prepare($con, $sql);
		mysqli_stmt_bind_param($stmt, 'ssis', $code, $name, $price, $image_name);
		$result = mysqli_stmt_execute($stmt);
		mysqli_stmt_close($stmt);
		db_close($con);
		return $result;
	}

	function read($code){
		$con = db_connect();
		$sql = "SELECT code, name, price, image_name FROM product WHERE code = ?";
		$stmt = mysqli_prepare($con, $sql);
		mysqli_stmt_bind_param($stmt, s, $code);
		mysqli_stmt_execute($stmt);
		$result = mysqli_stmt_get_result($stmt);
		$row = mysqli_fetch_array($result);
		mysqli_stmt_close($stmt);
		db_close($con);
		return $row;
	}

	function read_list() {
		$con = db_connect();
		$sql = "SELECT code, name, price, image_name FROM product";
		$result = mysqli_query($con, $sql);
		$list = array();
		while ($row = mysqli_fetch_array($result)) {
			$list[] = array("code" => $row["code"], "name" => $row["name"], "price" => $row["price"], "image_name" => $row["image_name"]);
		}
		db_close($con);
		return $list;
	}

	function delete($code) {
		$con = db_connect();
		$sql = "DELETE FROM product WHERE code = ?";
		$stmt = mysqli_prepare($con, $sql);
		mysqli_stmt_bind_param($stmt, s, $code);
		$result = mysqli_stmt_execute($stmt);
		mysqli_stmt_close($stmt);
		db_close($con);
		return $result;
	}
?>