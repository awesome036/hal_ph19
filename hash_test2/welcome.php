<?php
	session_start();
?>
<!DOCTYPE html>
<html lang="ja" dir="ltr">
	<head>
		<meta charset="utf-8">
		<title>ようこそ</title>
	</head>
	<body>
		<?php
			require_once("db_control.php");
			if(isset($_SESSION["id"])){
				$list = array();
				$list = get_account_info($_SESSION["id"]);
				$login_id = $list["login_id"];
				$name = $list["name"];
				setcookie("login_id",$login_id,time()+180);
				echo<<<EOM
				 <p>ようこそ、{$name}さん。</p>
				 <ul style="list-style-type: none; margin: 0; padding: 0;">
				 	<li><a href="./change.php">ユーザー情報変更（オプション）</a></li>
 					<li><a href="./logout.php">ログアウト</a></li>
 					<li><a href="./index.html">メニュー</a></li>
 				</ul>
EOM;
			}else{
				login_error();
			}
		?>
	</body>
</html>