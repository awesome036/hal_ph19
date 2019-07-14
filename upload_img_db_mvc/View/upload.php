<!DOCTYPE html>
<html lang="ja" dir="ltr">
	<head>
		<meta charset="utf-8">
		<title>アップロード</title>
		<style type="text/css">
			input[type="text"] {
				border: solid 1px #ddd;
				height: 30px;
				border-radius: 5px;
				padding: 0 10px;
				margin: 5px 0;
			}
			input[type="text"]:focus {
				box-shadow: 0 0 3px deepskyblue inset;
			}
			input[type="submit"] {
				border: solid 2px blue;
				color: blue;
				padding: 5px;
				background: #fff;
				margin: 5px 0;
				transition: .1s ease-in-out;
			}
			input[type="submit"]:hover {
				cursor: pointer;
				background: blue;
				color: #fff;
			}
			.fileBox {
				border: solid;
				width: 250px;
				height: 20px;
				text-indent: -60px;
				white-space: nowrap;
				overflow: hidden;
			}
			.fileBox:hover {
				cursor: pointer;
			}
		</style>
	</head>
	<body>
		<form action="../Controller/UploadedController.php" method="post" enctype="multipart/form-data">
			<?php echo $_POST["err_msg"]; ?>
			<input type="hidden" name="MAX_FILE_SIZE" value="10000000">
			<label>タイトル：</label>
			<input type="text" name="title">
			<br>
			<label>ファイル名：</label>
			<input type="file" class="fileBox" name="uploadfile">
			<br>
			<input type="submit" value="アップロード">
		</form>
		<a href="../index.html">メニュー</a>
	</body>
</html>