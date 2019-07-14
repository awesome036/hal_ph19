<?php
	function authorize_user($id,$pass){
		$check = FALSE;		// FALSE:NG	TRUE:OK

		if(!empty($id) && !empty($pass)){
			// データベースへの接続
			$con = mysqli_connect("localhost","root","");

			// 文字コードの指定
			mysqli_set_charset($con,"utf8");

			// データベースの指定
			mysqli_select_db($con,"ph22_kadai01_pw51a335_02");

			// 実行するSQL文
			$sql = "SELECT * FROM account WHERE id = '$id'";

			// SQLを実行する
			$result = mysqli_query($con,$sql);

			// 実行した結果を取り出す
			if($row = mysqli_fetch_array($result)){
				if($row["password"] == $pass){
					$check = TRUE;
				}
			}

			// データベース接続終了
			mysqli_close($con);
		}

		if($check){
			print "<p>こんにちは、{$row["name"]}さん</p>";
			print "<a href='./index.html'>ログアウト</a>";
		}else{
			print "<p>IDまたはパスワードを見直してください</p>";
			print "<a href='./index.html'>戻る</a>";
		}
	}

	function exist_account($id){
		// データベースへの接続
		$con = mysqli_connect("localhost","root","");

		// 文字コードの指定
		mysqli_set_charset($con,"utf8");

		// データベースの指定
		mysqli_select_db($con,"ph22_kadai01_pw51a335_02");

		// 実行するSQL文
		$sql = "SELECT id FROM account WHERE id = '$id'";

		// SQLを実行する
		$result = mysqli_query($con,$sql);

		// 実行した結果を取り出す
		$row = mysqli_fetch_array($result);

		return $row;

		// データベース接続終了
		mysqli_close($con);
	}

	function add_account($id,$pass,$name){
		if(preg_match("/^[a-z0-9]{3,5}$/",$id)){
			if(preg_match("/^[a-z0-9]{3,8}$/",$pass)){
				if(!empty($name)){
					// データベースへの接続
					$con = mysqli_connect("localhost","root","");

					// 文字コードの指定
					mysqli_set_charset($con,"utf8");

					// データベースの指定
					mysqli_select_db($con,"ph22_kadai01_pw51a335_02");

					// 実行するSQL文
					$sql = "INSERT INTO account(id,password,name)VALUES('$id','$pass','$name')";

					// SQLを実行する
					$result = mysqli_query($con,$sql);

					print "<p>登録しました</p>";

					// データベース接続終了
					mysqli_close($con);

				}else{
					print "<p>入力に誤りがあります。</p>";
				}
			}else{
				print "<p>入力に誤りがあります。</p>";
			}
		}else{
			print "<p>入力に誤りがあります。</p>";
		}
	}
 ?>