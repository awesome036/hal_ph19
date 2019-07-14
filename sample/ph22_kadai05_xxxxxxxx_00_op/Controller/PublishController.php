<?php
require_once "../Model/DbModel.php";
publish($_POST["id"], 1 - $_POST["publish"]);
header("Location: ListController.php");
?>
