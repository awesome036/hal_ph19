<!DOCTYPE html>
<html lang="ja" dir="ltr">
	<head>
		<meta charset="utf-8">
		<title>検索結果</title>
	</head>
	<body>
		<?php
			// CSVファイルの内容を連想配列に格納
			$f_pt = fopen('post_no.csv','r');
			$postNoList = array();
			while($row = fgetcsv($f_pt)){
				$postNoList[$row[0]] = $row[1];
			}
			fclose($f_pt);

			// 住所を出力
			$post_no = $_GET["postalCode"];
			echo $post_no;
			if(isset($postNoList[$post_no])){
				echo " ".$postNoList[$post_no];
			}else{
				echo " データが見つかりません。";
			}
		?>
	</body>
</html>