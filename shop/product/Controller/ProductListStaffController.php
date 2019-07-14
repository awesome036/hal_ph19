<?php
	require_once("../Model/ProductDbModel.php");
	$list = read_list();
	$_POST["list"] = $list;

	require_once("../View/product_listStaff.php");
?>