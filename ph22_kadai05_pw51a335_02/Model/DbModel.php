<?php
	function db_connect(){
		$con = mysqli_connect("mysql", "root", "root") or die("接続失敗");
		mysqli_set_charset($con, "utf8mb4");
		mysqli_select_db($con, "ph22_kadai05_pw51a335_02");
		return $con;
	}

	function db_close($con){
		mysqli_close($con);
	}

	function get_id($login_id, $password){
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
			return $row["id"];
		}else{
			// 失敗の場合
			return FALSE;
		}
	}

	function get_name($id){
		$con = db_connect();
		$sql = "SELECT name FROM accounts WHERE id = ?";
		$stmt = mysqli_prepare($con, $sql);
		mysqli_stmt_bind_param($stmt, 's', $id);
		mysqli_stmt_execute($stmt);
		$result = mysqli_stmt_get_result($stmt);
		$row = mysqli_fetch_array($result);
		mysqli_stmt_close($stmt);
		db_close($con);

		if($result){
			return $row["name"];
		}else{
			return FALSE;
		}

	}

	function check_login_id($login_id){
		if(preg_match("/^[a-z0-9]{3,10}$/",$login_id)){
			return TRUE;
		}else{
			return FALSE;
		}
	}

	function check_password($password){
		if(preg_match("/^[a-z0-9]{3,10}$/",$password)){
			return TRUE;
		}else{
			return FALSE;
		}
	}

	function check_name($name){
		if(mb_strlen($name) >= 1 && mb_strlen($name) <= 20){
			return TRUE;
		}else{
			return FALSE;
		}
	}

	function exist_login_id($login_id){
		$con = db_connect();
		$sql = "SELECT id FROM accounts WHERE login_id = ?";
		$stmt = mysqli_prepare($con, $sql);
		mysqli_stmt_bind_param($stmt, 's', $login_id);
		mysqli_stmt_execute($stmt);
		$result = mysqli_stmt_get_result($stmt);
		$row = mysqli_fetch_array($result);
		mysqli_stmt_close($stmt);
		db_close($con);
		if($row){
			return TRUE;
		}else{
			return FALSE;
		}
	}

	function insert_account($login_id,$password,$name){
		$name = htmlspecialchars($name,ENT_QUOTES);
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

	function check_title($title){
		if(mb_strlen($title) >= 1 && mb_strlen($title) <= 127){
			return TRUE;
		}else{
			return FALSE;
		}
	}

	function check_filename($filename){
		if(mb_strlen($filename) >= 1 && mb_strlen($filename) <= 127){
			return TRUE;
		}else{
			return FALSE;
		}
	}

	function check_filesize($error,$filename){
		if($error == "0" or !empty($tmpfile)){
			return TRUE;
		}else{
			return FALSE;
		}
	}

	function mod_filename($filename){
		$pathData = pathinfo($filename);
		$patterns = $pathData["filename"];
		$replacement = sha1(uniqid(mt_rand(), true));
		$new_filename = preg_replace("/$patterns/",$replacement,$filename);
		$mod_filename = '../images/'.$new_filename;
		return $mod_filename;
	}

	function upload_image($id,$title,$tmpfile,$filename){
		$result = move_uploaded_file($tmpfile,$filename);
		if($result){
			$title = htmlspecialchars($title,ENT_QUOTES);

			$con = db_connect();
			$sql = "INSERT INTO image_file(account_id,title,filename) VALUES (? , ? , ?)";
			$stmt = mysqli_prepare($con, $sql);
			mysqli_stmt_bind_param($stmt, 'iss', $id,$title,$filename);
			$result = mysqli_stmt_execute($stmt);
			mysqli_stmt_close($stmt);

			db_close($con);
		}
		return $result;
	}

	function image_list($id){
		$con = db_connect();
		$sql = "SELECT *
				FROM image_file
				WHERE account_id = ?
				OR publish = 1";
		$stmt = mysqli_prepare($con, $sql);
		mysqli_stmt_bind_param($stmt, 'i', $id);
		mysqli_stmt_execute($stmt);
		$result = mysqli_stmt_get_result($stmt);
		$list = array();
		while($row = mysqli_fetch_array($result)){
			$list[] = $row;
		}
		mysqli_stmt_close($stmt);
		db_close($con);

		return $list;
	}

	function delete_image($image_id){
		$con = db_connect();
		$sql_1 = "SELECT filename FROM image_file WHERE id = ?";
		$stmt_1 = mysqli_prepare($con, $sql_1);
		mysqli_stmt_bind_param($stmt_1, 'i', $image_id);
		mysqli_stmt_execute($stmt_1);
		$result_1 = mysqli_stmt_get_result($stmt_1);
		$row = mysqli_fetch_array($result_1);
		$filename = $row["filename"];
		mysqli_stmt_close($stmt_1);

		$sql_2 = "DELETE FROM image_file WHERE id = ?";
		$stmt_2 = mysqli_prepare($con, $sql_2);
		mysqli_stmt_bind_param($stmt_2, 'i', $image_id);
		mysqli_stmt_execute($stmt_2);
		$result_2 = mysqli_stmt_get_result($stmt_2);
		mysqli_stmt_close($stmt_2);
		db_close($con);

		unlink($filename);

		if($result_1 == $result_2){
			return TRUE;
		}else{
			return FALSE;
		}
	}

	function public_image($image_id){
		$con = db_connect();
		$sql = "UPDATE image_file SET publish = 1 WHERE id = ?";
		$stmt = mysqli_prepare($con, $sql);
		mysqli_stmt_bind_param($stmt, 'i', $image_id);
		mysqli_stmt_execute($stmt);
		mysqli_stmt_close($stmt);
		$result = mysqli_stmt_get_result($stmt);
		db_close($con);

		return $result;
	}

	function private_image($image_id){
		$con = db_connect();
		$sql = "UPDATE image_file SET publish = 0 WHERE id = ?";
		$stmt = mysqli_prepare($con, $sql);
		mysqli_stmt_bind_param($stmt, 'i', $image_id);
		mysqli_stmt_execute($stmt);
		mysqli_stmt_close($stmt);
		$result = mysqli_stmt_get_result($stmt);
		db_close($con);

		return $result;
	}
?>