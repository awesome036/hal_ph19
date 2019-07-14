<?php
session_start();
require_once "../Model/DbModel.php";

unset($_SESSION["account_id"]);
$_POST["login_message"] = "";

if (!isset($_POST["login_id"]) or !isset($_POST["password"])) {
  $_POST["login_message"] = "ログインIDまたはパスワードを見直してください。";
  include_once("../View/login.php");
  exit;
}

$id = read_id($_POST["login_id"], $_POST["password"]);
if ($id > 0) {
  $_SESSION["account_id"] = $id;
  header("Location:MenuController.php");
  exit;
} else {
  $_POST["login_message"] = "ログインIDまたはパスワードを見直してください。";
  include_once("../View/login.php");
  exit;
}
?>
