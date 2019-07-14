<?php
	session_start();
	require_once("../Model/CartModel.php");

	cartOut($_POST["index"]);
	header("Location: ../Controller/CartListController.php");
?>