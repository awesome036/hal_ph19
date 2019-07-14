<?php
	$f_pt = fopen('data.csv','r');
	while($wk = fgetcsv($f_pt)){
		print "クラス記号：{$wk[0]} 番号：{$wk[1]} 名前：{$wk[2]}<br>";
	}
	fclose($f_pt);
?>