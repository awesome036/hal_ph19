<!DOCTYPE html>
<html lang="ja" dir="ltr">
	<head>
		<meta charset="utf-8">
		<title>スタッフ新規登録</title>
	</head>
	<body>
		<form action="../Controller/StaffRegistCheckController.php" method="post">
			<label for="login_id">ログインID：</label>
			<input type="text" name="login_id" placeholder="半角英数3~10文字">
			<br>
			<label for="password">パスワード：</label>
			<input type="password" name="password" placeholder="半角英数3~10文字">
			<br>
			<label for="name">名前：</label>
			<input type="text" name="name" placeholder="1~20文字">
			<br>
			<input type="submit" name="submit" value="登録">
			<?php echo $_POST["regist_message"]; ?>
			<br>
			<a href="../index.html">管理者トップページ</a>
		</form>
	</body>
</html>