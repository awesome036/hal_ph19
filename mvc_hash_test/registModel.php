<?php
	function getRegMsg(){
		if(isset($_SESSION["regist_message"])) {
			$str = $_SESSION["regist_message"];
			unset($_SESSION["regist_message"]);
		}else{
			$str = "";
		}
		return $str;
	}
?>