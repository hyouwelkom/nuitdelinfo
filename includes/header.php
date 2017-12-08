<header>
	<div id="headband">
		<section class="container clearfix">
			<div class="left">
				<i class="fa fa-envelope" aria-hidden="true"></i> <a href="mailto:contact@blabla.com">contact@blabla.com</a> | <i class="fa fa-phone" aria-hidden="true"></i> <a href="tel:0412345678">04 12 34 56 78</a>
			</div>
			
			<div class="right">
				<?php if(isset($_SESSION['username'])) { ?>
					Bonjour <?php echo $member['username']; ?> ! | <i class="fa fa-lock" aria-hidden="true"></i> <a href="logout">Se déconnecter</a>
				<?php } else { ?>
					<i class="fa fa-key" aria-hidden="true"></i> <a href="register">Inscription</a> | <i class="fa fa-user" aria-hidden="true"></i> <a href="login">Connexion</a>
				<?php } ?>
			</div>
		</section>
	</div>
	
	<div id="headcontent">
		<section class="container clearfix">
			<div class="logo left">
				<img src="img/logo.png" alt="Logo stop" />
			</div>
			
			<nav id="nav" class="right">
				<ul>
					<li class="responsive last"><a href="javascript:void(0);" class="icon" onclick="menu()">☰</a></li>
					<li class="web"><a href="index">Accueil</a></li>
					<li class="web"><a href="safety">Sécurité</a></li>
					<li class="web"><a href="trafic">Info trafic</a></li>
					<li class="web"><a href="event">Créer un événement</a></li>
					<li class="web last"><a href="chat">Chat</a></li>
				</ul>
			</nav>
		</section>
	</div>
	
	<div id="carrousel" class="container">
		<ul>
			<li><a href="safety"><img src="../img/alcool.jpg" alt="Alcool" ></a></li>
			<li><a href="safety"><img src="../img/drogue.jpg" alt="Drogue" /></a></li>
			<li><a href="safety"><img src="../img/vitesse.jpg" alt="Vitesse" /></a></li>
		</ul>
	</div>
</header>

<script>
$(document).ready(function() {
	var $carrousel = $('#carrousel'),
		$img = $('#carrousel img'),
		indexImg = $img.length - 1,
		i = 0,
		$currentImg = $img.eq(i);

	$img.hide();
	$currentImg.fadeIn();

	function slideImg(){
		setTimeout(function(){			
			if(i < indexImg){
			i++;
		}
		else{
			i = 0;
		}

		$img.hide();

		$currentImg = $img.eq(i);
		$currentImg.fadeIn();

		slideImg();

		}, 5000);
	}

	slideImg();
});
</script>