<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>ファイルアップロード</title>
	</head>
	<body>
		<?php
		$filename = 'docs/'.$_FILES['uploadfile']['name'];
		$isSuccess = move_uploaded_file($_FILES['uploadfile']['tmp_name'], $filename);	// ファイルを保存
		if($isSuccess) {
			$f_pt = fopen($filename, 'r');
			while($str = fgets($f_pt)) {
				print $str."<br>";
			}
			fclose($f_pt);
		} else {
			print "アップロード失敗<br>";
		}
		?>
  </body>
</html>
