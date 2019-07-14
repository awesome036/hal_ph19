<?php
session_start();
require_once "../Model/LogoutModel.php";
if (!isset($_POST["login_message"])) {
  $_POST["login_message"] = "";
}
include_once("../View/login.php");
?>
