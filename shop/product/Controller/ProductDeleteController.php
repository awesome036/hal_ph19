<?php
	require_once("../Model/ProductDbModel.php");
	delete($_POST["code"]);
	unlink("../".$_POST["filename"]);
	header("Location: ProductListStaffController.php");
?>