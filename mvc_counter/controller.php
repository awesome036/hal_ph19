<?php
require_once("model.php");

// ①ファイルからカウント値を読み込む
$cnt = getCount();

// ②カウント値をビューに渡す
$_POST["count"] = $cnt;

// ③カウンタ値をファイルに書き込む
setCount($cnt);

require_once("view.php");
?>
