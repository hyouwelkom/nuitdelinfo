<?php
	require_once('config.php');
?>

<!DOCTYPE html>
<html lang="fr">
	<?php include('includes/head.php'); ?>
	
	<body>
		<?php include('includes/header.php'); ?>
		
		<div id="carrousel" class="container">
			<ul>
				<li><a href="safety"><img src="../img/alcool.jpg" alt="Alcool" ></a></li>
				<li><a href="safety"><img src="../img/drogue.jpg" alt="Drogue" /></a></li>
				<li><a href="safety"><img src="../img/vitesse.jpg" alt="Vitesse" /></a></li>
			</ul>
		</div>
		
		<div class="container">
			<h1>SAM</h1>

			<hr>
			
			Besoin de s'amuser un peu ?
		</div>
		
		<section class="container">
			<h2>Jeux flash</h2>
			
			<div id="game-list">
				<div class="games flappy-bird"><img src="img/games/flappy-bird.png" alt="Flappy Bird" /></div>
				<div class="games 2048"><img src="img/games/2048.png" alt="2048" /></div>
				<div class="games katana-fruits"><img src="img/games/katana-fruits.png" alt="Katana Fruits" /></div>
				<div class="games bubble-shooter"><img src="img/games/bubble-shooter.png" alt="Bubble Shooter" /></div>
				<div class="games doodle-jump"><img src="img/games/doodle-jump.png" alt="Bubble Shooter" /></div>
			</div>
			
			<br />
			
			<div id="game-flash">
				<iframe src="https://www.silvergames.com/fr/flappy-bird/iframe" id="flappygame" width="400" height="640" style="margin:0;padding:0;border:0"></iframe>
				<iframe src="https://www.silvergames.com/fr/2048/iframe" id="twogame" width="400" height="640" style="margin:0;padding:0;border:0"></iframe>
				<iframe src="https://www.silvergames.com/fr/katana-fruits/iframe" id="katanagame" width="400" height="640" style="margin:0;padding:0;border:0"></iframe>
				<iframe src="https://www.silvergames.com/fr/bubble-shooter/iframe" id="bubblegame" width="400" height="640" style="margin:0;padding:0;border:0"></iframe>
				<iframe src="https://www.silvergames.com/fr/doodle-jump/iframe" id="doodlegame" width="400" height="640" style="margin:0;padding:0;border:0"></iframe>
			</div>
    
		</section>
		
		<script src="js/games.js?<?=rand(0,10000000); ?>"></script>
	</body>
</html>