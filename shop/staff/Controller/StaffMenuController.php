<?php
	session_start();
	if (!isset($_SESSION["account_id"])) {
		header("Location: StaffLoginController.php");
		exit;
	}

	require_once("../Model/StaffDbModel.php");
	$row = read_row($_SESSION["account_id"]);
	if (!$row) {
		header("Location: StaffLoginController.php");
		exit;
	}

	$_POST["name"] = $row["name"];
	require_once("../View/staff_menu.php");
?>