<?php
	require_once("db_control.php");

	function getName(){
		if(isset($_SESSION["id"])) {
			$row = read_row($_SESSION["id"]);
		} else {
			$row = false;
		}
		return $row["name"];
	}
?>