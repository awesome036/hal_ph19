<?php
	if(isset($_POST["submit"])){
		require_once("db_control.php");
		csv_in();
		echo "<a href='./index_op.html'>メニュー</a>";
	}else{
		header("Location: csv_in.php",true,301);
	}
?>