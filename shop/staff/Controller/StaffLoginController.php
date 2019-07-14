<?php
	session_start();
	require_once "../Model/StaffLogoutModel.php";
	if (!isset($_POST["login_message"])) {
		$_POST["login_message"] = "";
	}
	include_once("../View/staff_login.php");
?>