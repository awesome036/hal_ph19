<!DOCTYPE html>
<html lang="ja" dir="ltr">
	<head>
		<meta charset="utf-8">
		<title>新規登録</title>
	</head>
	<body>
		<form action="../Controller/RegistCheckController.php" method="post">
			<label for="login_id">ログインID：</label>
			<input type="text" name="login_id" placeholder="半角英数3~10文字">
			<?php echo $_POST["err_login_id"]; ?>
			<?php echo $_POST["err_exists"]; ?>
			<br>
			<label for="password">パスワード：</label>
			<input type="password" name="password" placeholder="半角英数3~10文字">
			<?php echo $_POST["err_password"]; ?>
			<br>
			<label for="name">名前：</label>
			<input type="text" name="name" placeholder="1~20文字">
			<?php echo $_POST["err_name"]; ?>
			<br>
			<input type="submit" name="submit" value="登録">
			<?php echo $_POST["err_msg"]; ?>
			<br>
			<a href="../index.html">トップ</a>
		</form>
	</body>
</html>