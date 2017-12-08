<?php
	require_once('config.php');
	
	if($_SERVER['REQUEST_METHOD'] == 'POST') {
		$username = htmlspecialchars($_POST['username']);
		$email = htmlspecialchars($_POST['email']);
		$password = md5(sha1($_POST['password']));
		$repassword = md5(sha1($_POST['repassword']));
		$ip = $_SERVER['REMOTE_ADDR'];
		
		if(!empty($username) && !empty($email) && !empty($password) && !empty($repassword)) {
			$userlength = strlen($username);
			
			if($userlength >= 2) {
				if($userlength <= 25) {
					$userisexist = $bdd->prepare('SELECT * FROM users WHERE username = :username');
					$userisexist->execute(array('username' => $username));
					$userexist = $userisexist->rowCount();
					$emailisexist = $bdd->prepare('SELECT * FROM users WHERE email = :email');
					$emailisexist->execute(array('email' => $email));
					$emailexist = $emailisexist->rowCount();
					
					if($userexist == 0) {
						if($emailexist == 0) {
							if(filter_var($email, FILTER_VALIDATE_EMAIL)) {
								if($password == $repassword) {
									$register = $bdd->prepare('INSERT INTO users (username, email, password, register, lastconnection, ip) VALUES (:username, :email, :password, :register, :lastconnection, :ip)');
									$register->execute(array(
										'username' => $username,
										'email' => $email,
										'password' => $password,
										'register' => time(),
										'lastconnection' => time(),
										'ip' => $ip,
										));
									
									$_SESSION['username'] = $username;
									
									header('Location: index');
								} else {
									header('Location: register?error=7');
								}
							} else {
								header('Location: register?error=6');
							}
						} else {
							header('Location: register?error=5');
						}
					} else {
						header('Location: register?error=4');
					}
				} else {
					header('Location: register?error=3');
				}
			} else {
				header('Location: register?error=2');
			}
		} else {
			header('Location: register?error=1');
		}
	}
	
	if(!empty($_GET['error'])) {
		if($_GET['error'] == 1) {
			$message = 'Vous devez remplir tous les champs !';
		}
		if($_GET['error'] == 2) {
			$message = 'Votre nom d\'utilisateur doit contenir au moins 2 caractères.';
		}
		if($_GET['error'] == 3) {
			$message = 'Votre nom d\'utilisateur ne doit pas dépasser 25 caractères.';
		}
		if($_GET['error'] == 4) {
			$message = 'Ce nom d\'utilisateur est déjà pris.';
		}
		if($_GET['error'] == 5) {
			$message = 'Cette adresse email est déjà utilisée.';
		}
		if($_GET['error'] == 6) {
			$message = 'Vous devez saisir une adresse email valide.';
		}
		if($_GET['error'] == 7) {
			$message = 'Vos 2 mots de passe ne correspondent pas.';
		}
	}
	
	if(isset($_SESSION['username'])) {
		header('Location: index');
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
			<div id="register">
				<h2>Inscription</h2>
				
				<form method="post" action="register">
					<p>
						<label for="username">Nom d'utilisateur: </label><br />
						<input type="text" name="username" id="username" />
					</p>
					<p>
						<label for="email">Email:</label><br />
						<input type="text" name="email" id="email" />
					</p>
					<p>
						<label for="password">Mot de passe:</label><br />
						<input type="password" name="password" id="password" />
					</p>
					<p>
						<label for="repassword">Re-tapez le mot de passe:</label><br />
						<input type="password" name="repassword" id="repassword" />
					</p>
					
					<input type="submit" value="Inscription" />
				</form>
			</div>
		</section>
	</body>
</html>