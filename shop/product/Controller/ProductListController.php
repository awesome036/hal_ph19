<?php
	require_once("../Model/ProductDbModel.php");
	$list = read_list();
	if(!isset($_POST["cart_message"])){
		$_POST["cart_message"] = "";
	}
	$_POST["list"] = $list;

	require_once("../View/product_list.php");
?>