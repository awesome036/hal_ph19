<?php
	if(isset($_POST["submit"])){
		require_once("db_control.php");
		csv_out();
		echo "<a href='./index_op.html'>メニュー</a>";
	}else{
		header("Location: csv_out.php",true,301);
	}
?>