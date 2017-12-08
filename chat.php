<?php
	require_once('config.php');
?>

<!DOCTYPE html>
<html lang="fr">
	<?php include('includes/head.php'); ?>
	
	<body>
		<?php include('includes/header.php'); ?>
		
		<h1 class="container">Prévention sécurité routière</h1>
		
		<section class="container">
			<h2>Posez lui des questions</h2>
			
			<div id="chatbot">
				<iframe width="350" height="430" src="https://console.dialogflow.com/api-client/demo/embedded/b19a481a-fd22-49a9-8cd2-9a9a1c341fb4" style="border: none;"></iframe>
			</div>
		</section>
	</body>
</html>