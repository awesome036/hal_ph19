<?php
	require_once("db_func.php");
	$result = students_insert($_POST["class"], $_POST["no"], $_POST["name"]);
	if ($result) {
		header("Location:input.php");
	} else {
		header("Location:error.html");
	}
?>
