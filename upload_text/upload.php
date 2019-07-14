<?php
	$filename = 'docs/'.$_FILES['uploadfile']['name'];
	$isSuccess = move_uploaded_file($_FILES['uploadfile']['tmp_name'],$filename);

	if($isSuccess){
		echo "アップロード成功<hr>";

		// アップロード内容を表示
		$f_pt = fopen($filename,"r");
		while($row = fgets($f_pt)){
			echo $row."<br>";
		}
		fclose($f_pt);
	}else{
		echo "アップロード失敗<br>";
	}
?>