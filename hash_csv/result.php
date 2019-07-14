<?php
	session_start();
?>
<!DOCTYPE html>
<html lang="ja" dir="ltr">
	<head>
		<meta charset="utf-8">
		<title>認証結果</title>
	</head>
	<body>
		<?php
			// CSVファイルの内容を連想配列に格納
			$f_pt = fopen('./account.csv','r');
			$accList = array();
			while($row = fgetcsv($f_pt)){
				$accList[$row[0]] = $row[1];
			}
			fclose($f_pt);

			$id = $_POST["id"];
			$password = $_POST["password"];

			if(isset($accList[$id])){
				if(password_verify($password,$accList[$id])){
					$check = TRUE;
				}else{
					$check = FALSE;
				}
			}else{
				$check = FALSE;
			}

			if($check){
				echo "<p>認証成功</p>";
			}else{
				$_SESSION["error"] = "IDまたはパスワードを見直してください";
				header("Location: index.php",true,301);
			}

		?>
		<button type="button" onclick="location.href='./index.php'">戻る</button>
	</body>
</html>