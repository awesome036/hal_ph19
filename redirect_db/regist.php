<?php
	require_once("db_func.php");

	$class = $_POST["class"];
	$no = $_POST["no"];
	$name = $_POST["name"];

	if(exist_db($class,$no)){
		header("Location: error.html",true,301);
	}else{
		insert_db($class,$no,$name);
		header("Location: input.php",true,301);
	}
?>