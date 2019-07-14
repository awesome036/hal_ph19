<?php
require_once "../Model/DbModel.php";
$_POST["regist_message"] = "";

if (!isset($_POST["login_id"]) or !isset($_POST["password"])
 || !preg_match("/^[a-zA-Z0-9]{3,10}$/", $_POST["login_id"])
 || !preg_match("/^[a-zA-Z0-9]{3,10}$/", $_POST["password"])) {
  $_POST["regist_message"] = "ログインIDまたはパスワードを見直してください。";
  include_once("../View/regist.php");
  exit;
}

if (mb_strlen($_POST["name"]) == 0 or mb_strlen($_POST["name"]) > 20) {
  $_POST["regist_message"] = "名前を見直してください。";
  include_once("../View/regist.php");
  exit;
}

$exists = exists($_POST["login_id"]);
if ($exists) {
  $_POST["regist_message"] = "ログインIDは使われています。";
  include_once("../View/regist.php");
  exit;
}

$result = insert($_POST["login_id"], $_POST["password"], $_POST["name"]);
if ($result) {
  header("Location:LoginController.php");
  exit;
}
?>
