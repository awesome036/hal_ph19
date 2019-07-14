<?php
session_start();
if (!isset($_SESSION["account_id"])) {
  header("Location: LoginController.php");
  exit;
}

require_once "../Model/DbModel.php";
$row = read_row($_SESSION["account_id"]);
if (!$row) {
  header("Location: LoginController.php");
  exit;
}

$_POST["name"] = $row["name"];
include_once("../View/menu.html");
?>
