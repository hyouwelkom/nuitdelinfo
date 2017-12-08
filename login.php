<?php
	require_once('config.php');
	
	if(isset($_SESSION['username'])) {
		header('Location: index');
	}
	
	$ip = $_SERVER['REMOTE_ADDR'];
	$avatar = $bdd->prepare('SELECT * FROM users WHERE ip = :ip ORDER BY date DESC');
	$avatar->execute(array('ip' => $ip));
	$memberget = $avatar->fetch();
	
	if($_SERVER['REQUEST_METHOD'] == 'POST') {
		$username = htmlspecialchars($_POST['username']);
		$password = md5(sha1($_POST['password']));
		$ip = $_SERVER['REMOTE_ADDR'];
		
		$user = $bdd->prepare('SELECT * FROM users WHERE username = :username OR email = :username');
		$user->execute(array('username' => $username));
		$member = $user->fetch();
		
		if(!isset($_SESSION['id'])) {
			if(!empty($username) && !empty($password)) {
				if($member['id'] != "" || $eMember['id'] != "") {
					if($password == $member['password']) {
						if(isset($_POST['remember'])) {
							setcookie('username',$username,time()+365*24*3600,null,null,false,true);
							setcookie('password',$password,time()+365*24*3600,null,null,false,true);
						}
						
						$_SESSION['username'] = $member['username'];
						$_SESSION['id'] = $member['id'];
						
						$newip = $bdd->prepare('UPDATE users SET ip = :ip, date = :date WHERE username = :username');
						$newip->execute(array(
							'ip' => $ip,
							'date' => time(),
							'username' => $_SESSION['username']
							));
						header('Location: index');
					} else {
						header('Location: login?error=3');
					}
				} else {
					header('Location: login?error=2');
				}
			} else {
				header('Location: login?error=1');
			}
		} else {
			header('Location: index');
		}
	}
	
	if(!empty($_GET["error"])) {
		if($_GET["error"] == 1) {
			$message = 'Vous devez remplir tous les champs !';
		}
		if($_GET["error"] == 2) {
			$message = 'Votre nom d\'utilisateur ou votre adresse email n\'existe pas !';
		}
		if($_GET["error"] == 3) {
			$message = 'Votre mot de passe est invalide !';
		}
		if($_GET["error"] == 4) {
			$message = 'Vous devez vous connecter pour accéder à cette page !';
		}
	}
?>

<!DOCTYPE html>
<html lang="fr">
	<?php include('includes/head.php'); ?>
	
	<body>
		<?php include('includes/header.php'); ?>
		
		<?php if(!empty($message)) { ?>
			<div class="error container"> <i class="fa fa-times" style="color: #b02d33" aria-hidden="true"></i> <?php echo $message; ?></div>
		<?php } ?>
		
		<section class="container">
			<div id="login">
				<h2>Connexion</h2>
				
				<form method="post" action="login">
					<p>
						<label for="username">Nom d'utilisateur ou email: </label><br />
						<input type="text" name="username" id="username" />
					</p>
					<p>
						<label for="password">Mot de passe:</label><br />
						<input type="password" name="password" id="password" />
					</p>
					
					<input type="submit" value="Connexion" />
				</form>
			</div>
		</section>
	</body>
</html>