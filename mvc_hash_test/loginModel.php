<?php
	function getMsg(){
		if(isset($_SESSION["login_message"])){
			$str = $_SESSION["login_message"];
			unset($_SESSION["login_message"]);
		}else{
			$str = "";
		}
		return $str;
	}
?>