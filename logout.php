<?php
	require_once('config.php');
	
	setcookie('username','',time()-3600);
	setcookie('password','',time()-3600);
	$_SESSION = array();
	session_destroy();
	
	header('Location: index');
?>