<?php
	session_start();
?>
<!DOCTYPE html>
<html lang="ja" dir="ltr">
	<head>
		<meta charset="utf-8">
		<title>新規登録</title>
	</head>
	<body>
		<form action="./regist.php" method="post">
			<?php
				if(isset($_SESSION["errReg"])){
					echo "<span style='color:red'>".$_SESSION["errReg"]."</span><br>";
					unset($_SESSION["errReg"]);
				}
			?>
			<label>ID:</label>
			<input type="text" name="id" placeholder="半角英数3~8文字">
			<br>
			<label>パスワード：</label>
			<input type="password" name="password">
			<br>
			<input type="submit" value="登録">
			<br>
			<input type="button" onclick="location.href='./index.php'" value="戻る">
		</form>
	</body>
</html>