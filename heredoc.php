<?php
	$str1 = "PH22";
	$str2 = "ヒアドキュメント";
	print "<h1>".$str1."</h1>";
	print "<h2>".$str2."</h2>";
	print<<<AAA
		<h1>$str1</h1>
		<h2>$str2</h2>
AAA;
?>