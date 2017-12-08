<?php
	$host = "localhost";
	$database = "stop";
	$user = "root";
	$password = "root";

	try {
		$bdd = new PDO('mysql:host='.$host.';dbname='.$database.';charset=utf8', ''.$user.'', ''.$password.'');
	}

	catch (Exception $e) {
		die('Erreur : ' . $e->getMessage());
	}
	
	$ip = $_SERVER["REMOTE_ADDR"];
	
	session_start();
	
	if(!isset($_SESSION['username']) && isset($_COOKIE['username'],$_COOKIE['password']) && !empty($_COOKIE['username']) && !empty($_COOKIE['password'])) {
		$requser = $bdd->prepare('SELECT * FROM users WHERE username = :username AND password = :password');
		$requser->execute(array(
			'username' => $_COOKIE['username'],
			'password' => $_COOKIE['password']
			));
		$reqexist = $requser->rowCount();
		
		if($reqexist == 1) {
			$userinfo = $requser->fetch();
			$_SESSION['username'] = $userinfo['username'];
			
			$newip = $bdd->prepare('UPDATE users SET ip = :ip, lastconnection = :lastconnection WHERE username = :username');
			$newip->execute(array(
				'ip' => $ip,
				'lastconnection' => time(),
				'username' => $_SESSION['username']
				));
		}
	}
	
	if(isset($_SESSION['username'])) {
		$getuser = $bdd->prepare('SELECT * FROM users WHERE username = :username');
		$getuser->execute(array('username' => $_SESSION['username']));
		$member = $getuser->fetch();
	}
?>