<?php
session_start();
require_once "../Model/DbModel.php";
$list = read_list($_SESSION["account_id"]);
for ($i=0; $i < count($list); $i++) {
  if ($list[$i]["publish"] == 0) {
    $list[$i]["publish_str"] = "公開する";
  } else {
    $list[$i]["publish_str"] = "非公開にする";
  }
}
$list2 = read_list_other($_SESSION["account_id"]);
$_POST["list"] = $list;
$_POST["list2"] = $list2;
include_once("../View/list.php");
?>
