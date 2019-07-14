<?php
	session_start();
	$_SESSION = array();
	session_destroy();
	if (isset($_COOKIE[session_name()])) {
		setcookie(session_name(), '', time() - 42000,
		$params["path"], $params["domain"],
		$params["secure"], $params["httponly"]
		);
	}
	header("Location: ../index.html",true,301);
?>