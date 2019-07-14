<?php
require_once "../Model/DbModel.php";
delete($_POST["id"]);
unlink("../".$_POST["filename"]);
header("Location: ListController.php");
?>
