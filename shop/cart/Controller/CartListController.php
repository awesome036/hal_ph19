<?php
	session_start();
	require_once("../Model/CartModel.php");
	require_once("../../product/Model/ProductDbModel.php");

	$codeList = codeList();
	if($codeList){
		$list = array();
		foreach($codeList as $code){
			$list[] = read($code);
		}
	}
	$_POST["list"] = $list;

	require_once("../View/cart_list.php");
?>