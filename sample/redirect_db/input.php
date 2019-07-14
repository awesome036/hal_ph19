<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>リダイレクト</title>
	</head>
	<body>
		<form action="regist.php" method="post">
			クラス記号：<input type="text" name="class"><br>
			出席番号：<input type="text" name="no"><br>
			名前：<input type="text" name="name"><br>
			<input type="submit" value="登録">
		</form>
		<br>
		<h1>一覧</h1>
		<?php
			require_once("db_func.php");
			$students_list = students_list();
			foreach ($students_list as $row) {
				print "{$row["class"]} {$row["no"]} {$row["name"]} <br>";
			}
		?>
  </body>
</html>
