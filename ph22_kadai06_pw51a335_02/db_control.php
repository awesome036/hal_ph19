<?php
	function db_connect(){
		$con = mysqli_connect("mysql", "root", "root") or die("接続失敗");
		mysqli_set_charset($con, "utf8");
		mysqli_select_db($con, "ph22_kadai06_pw51a335_02");
		return $con;
	}

	function db_close($con){
		mysqli_close($con);
	}

	function login_error(){
		echo<<<EOM
		<p>ログインしてください。</p>
		<ul style="list-style-type: none; margin: 0; padding: 0;">
			<li><a href="./login.php">ログイン</a></li>
			<li><a href="./index.html">メニュー</a></li>
		</ul>
EOM;
	}

	function get_id($login_id,$password){
		$con = db_connect();
		$sql ="SELECT id
				FROM accounts
				WHERE login_id = '$login_id'
				AND password = '$password'";
		$result = mysqli_query($con, $sql);
		$row = mysqli_fetch_array($result);
		$result = $row[0];
		db_close($con);
		return $result;
	}

	function get_account_info($id){
		$con = db_connect();
		$sql = "SELECT login_id,password,name
				FROM accounts
				WHERE id = $id";
		$result = mysqli_query($con, $sql);
		$list = array();
		$row = mysqli_fetch_row($result);
		$list["login_id"] = $row[0];
		$list["password"] =$row[1];
		$list["name"] = $row[2];
		db_close($con);
		return $list;
	}

	function accounts_insert($login_id, $password, $name){
		$con = db_connect();
		$name = htmlspecialchars($name,ENT_QUOTES);
		$sql = "INSERT INTO accounts(login_id,password,name) VALUES (?, ?, ?)";
		$stmt = mysqli_prepare($con, $sql);
		mysqli_stmt_bind_param($stmt, 'sss', $login_id, $password, $name);
		$result = mysqli_stmt_execute($stmt);
		mysqli_stmt_close($stmt);
		db_close($con);
		return $result;
	}

	function accounts_update($id,$login_id,$password,$name){
		$con = db_connect();
		$name = htmlspecialchars($name,ENT_QUOTES);
		$sql = "UPDATE accounts SET login_id = ?, password = ?, name= ? WHERE id = ?";
		$stmt = mysqli_prepare($con, $sql);
		mysqli_stmt_bind_param($stmt, 'sssi', $login_id, $password, $name, $id);
		$result = mysqli_stmt_execute($stmt);
		mysqli_stmt_close($stmt);
		db_close($con);
		return $result;
	}

	function csv_out(){
		$con = db_connect();
		$sql = "SELECT * FROM accounts";
		$result = mysqli_query($con, $sql);
		$list = array();
		while($row = mysqli_fetch_array($result)){
			$list[] = $row;
		}

		$f_pt = fopen('accounts.csv','w');
		$data = array();
		foreach($list as $var){
			$id = $var["id"];
			$login_id = $var["login_id"];
			$password = $var["password"];
			$name = $var["name"];
			$data = array($id,$login_id,$password,$name);
			fputcsv($f_pt,$data);
		}
		echo "<p>CSVファイルに出力しました。</p>";
		fclose($f_pt);

		db_close($con);
	}

	function csv_in(){
		$con = db_connect();
		$f_pt = fopen('accounts.csv','r');
		$count = 0;
		while($wk = fgetcsv($f_pt)){
			$id = $wk[0];
			$login_id = $wk[1];
			$password = $wk[2];
			$name = $wk[3];
			$sql = "INSERT INTO accounts VALUES(?,?,?,?)";
			$stmt = mysqli_prepare($con, $sql);
			mysqli_stmt_bind_param($stmt, 'isss', $id, $login_id, $password, $name);
			$result = mysqli_stmt_execute($stmt);
			if($result){
				$count += 1;
			}
		}

		echo "<p>{$count}件の新規レコードをCSVファイルから取り込みました。</p>";

		mysqli_stmt_close($stmt);
		db_close($con);
	}
?>