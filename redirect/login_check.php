<?php
	if($_POST["id"] == "ths99999" && $_POST["pass"] == "B19991231"){
		header("Location: welcome.html",true,301);
	}else{
		header("Location: error.html",true,301);
	}
?>