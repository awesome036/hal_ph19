<?php
// ファイルからカウント値を読み込んで＋１
function getCount() {
  $f_pt = fopen('count.txt', 'r');
  $count = trim(fgets($f_pt));
  fclose($f_pt);

  if ($count == "") {
    $count = 1;
  } else {
    $count++;
  }
  return $count;
}

// 受け取ったカウント値をファイルに書き込む
function setCount($count) {
  $f_pt = fopen('count.txt', 'w');
  fputs($f_pt, $count);
  fclose($f_pt);
}
?>
