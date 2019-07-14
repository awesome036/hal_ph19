<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>ファイルアップロード</title>
	</head>
	<body>
		<?php foreach ($_POST["list"] as $row) { ?>
			<img src="../<?php print $row["filename"]; ?>"><br>
			<?php print $row["title"]; ?><br>
			<form method="post" action="../Controller/PublishController.php">
				<input type="hidden" name="id" value="<?php print $row["id"]; ?>">
				<input type="hidden" name="publish" value="<?php print $row["publish"]; ?>">
				<input type="submit" value="<?php print $row["publish_str"]; ?>">
			</form>
			<form method="post" action="../Controller/DeleteController.php">
				<input type="hidden" name="id" value="<?php print $row["id"]; ?>">
				<input type="hidden" name="filename" value="<?php print $row["filename"]; ?>">
				<input type="submit" value="削除">
			</form>
			<br>
		<?php } ?>
		<?php foreach ($_POST["list2"] as $row) { ?>
			<img src="../<?php print $row["filename"]; ?>"><br>
			<?php print $row["title"]; ?><br>
			<br>
		<?php } ?>
		<a href="../Controller/MenuController.php">メニュー</a>
  </body>
</html>
