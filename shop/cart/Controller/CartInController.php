<?php
	session_start();
	require_once("../Model/CartModel.php");
	
	cartIn($_POST["code"]);

	header("Location: ../../product/Controller/ProductListController.php");
?>