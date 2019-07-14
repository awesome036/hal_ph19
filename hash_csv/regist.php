<?php
	session_start();
	unset($_SESSION["errReg"]);
?>
<!DOCTYPE html>
<html lang="ja" dir="ltr">
	<head>
		<meta charset="utf-8">
		<title>登録結果</title>
	</head>
	<body>
		<?php
			$id = $_POST["id"];
			$password = $_POST["password"];

			// 未入力の項目がなければ
			if(!empty($_POST["id"]) && !empty($_POST["password"])){

				// CSVファイルの内容を連想配列に格納
				$f_pt = fopen('./account.csv','r');
				$accList = array();
				while($row = fgetcsv($f_pt)){
					$accList[$row[0]] = $row[1];
				}
				fclose($f_pt);

				// IDが登録されていなければ
				if(!isset($accList[$id])){
					// IDが半角英数3~8文字ならば
					if(preg_match("/^[a-z0-9]{3,8}$/",$id)){
						$check = TRUE;
					}else{
						$_SESSION["errReg"] = "IDは半角英数3~8文字です。";
						$check = FALSE;
					}
				}else{
					$_SESSION["errReg"] = "登録済みIDです";
					$check = FALSE;
				}
			}else{
				$_SESSION["errReg"] = "未入力の項目があります";
				$check = FALSE;
			}

			if($check){
				// ファイルに書き込み
				$f_pt = fopen('./account.csv','a');
				// パスワードをハッシュ値に変換
				$password_hash = password_hash($password,PASSWORD_DEFAULT);
				$data = array($id,$password_hash);
				fputcsv($f_pt,$data);
				fclose($f_pt);

				echo "登録しました。<br><a href='./index.php'>ホーム</a>";
			}else{
				header("Location: new.php",true,301);
			}
		?>
	</body>
</html>