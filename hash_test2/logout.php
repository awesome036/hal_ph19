<?php
	session_start();
	unset($_SESSION["id"]);
	header("Location: index.html",true,301);
?>