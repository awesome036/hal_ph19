<?php
	function db_connect(){
		$con = mysqli_connect("mysql", "root", "root") or die("接続失敗");
		mysqli_set_charset($con, "utf8");
		mysqli_select_db($con, "ph22_test");
		return $con;
	}

	function db_close($con){
		mysqli_close($con);
	}

	function upload_image($title,$filename){
		$con = db_connect();

		$title = htmlspecialchars($title,ENT_QUOTES);
		$sql = "INSERT INTO image_file(title,filename) VALUES (? , ?)";
		$stmt = mysqli_prepare($con, $sql);
		mysqli_stmt_bind_param($stmt, 'ss', $title,$filename);
		$result = mysqli_stmt_execute($stmt);
		mysqli_stmt_close($stmt);

		db_close($con);

		if($result){
			$result = move_uploaded_file($_FILES['uploadfile']['tmp_name'],$filename);
		}
		return $result;
	}

	function itiran_image(){
		$con = db_connect();
		$sql = "SELECT title,filename FROM image_file";
		$result = mysqli_query($con, $sql);
		$list = array();
		while($row = mysqli_fetch_array($result)){
			$list[] = $row;
		}
		db_close($con);

		return $list;
	}

	function delete_image($filename){
		$con = db_connect();

		// DBから削除
		$sql = "DELETE FROM image_file WHERE filename = '$filename'";
		$result = mysqli_query($con, $sql);

		// 画像ファイルを削除
		unlink($filename);

		db_close($con);
	}
?>