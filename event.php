<?php
	require_once('config.php');
	
	if(isset($_SESSION['username'])) {
		$selectquery = $bdd->prepare('SELECT * FROM event WHERE owner_id = :id');
		$selectquery->execute(array('id' => $member['id']));
	}
	
	
	if($_SERVER['REQUEST_METHOD'] == 'POST') {
		$name = htmlspecialchars($_POST['name']);
		$dateEvent = strtotime(htmlspecialchars($_POST['dateEvent']));
		$category = htmlspecialchars($_POST['category']);
		$location = htmlspecialchars($_POST['location']);
		
		if(!empty($name) && !empty($dateEvent) && !empty($category) && !empty($location)) {
			$insertquery = $bdd->prepare('INSERT INTO event (name, date, category, location, owner_id) VALUES (:name, :date, :category, :location, :owner_id)');
			$insertquery->execute(array(
				'name' => $name,
				'date' => $dateEvent,
				'category' => $category,
				'location' => $location,
				'owner_id' => $member['id']
			));
			$insert = $insertquery->fetch();
			
			header('Location: event');
		} else {
			header('Location: event?error=1');
		}
	}
	
	if(!empty($_GET["error"])) {
		if($_GET["error"] == 1) {
			$message = "Vous devez remplir tous les champs !";
		}
	}
?>

<!DOCTYPE html>
<html lang="fr">
	<?php include('includes/head.php'); ?>
	
	<body>
		<?php include('includes/header.php'); ?>
		
		<h1 class="container">Événements</h1>
		
		<hr class="container">
		
		<?php if(isset($_SESSION['username'])) { ?>
		<section class="container">
			<h2>Mes événememens</h2>
			
			<table>
				<thead>
					<tr>
						<th>Nom</th>
						<th>Date</th>
						<th>Catégorie</th>
						<th>Lieu</th>
						<th></th>
					</tr>
				</thead>
			<?php while($event = $selectquery->fetch()) { ?>
				<tbody>
					<tr>
						<td><?php echo $event['name']; ?></td>
						<td><?php echo date('d/m/y à H:i', $event['date']); ?></td>
						<td><?php if($event['category'] == 1) echo "Fête"; else echo "Voyage"; ?></td>
						<td><?php echo $event['location']; ?></td>
						<td><a href="see-event?id=<?php echo $event['id']; ?>">Voir</a></td>
					</tr>
				</tbody>
			<?php } ?>
			</table>
		</section>
		
		<section class="container">
			<h2>Créer un événement</h2>

				<form method="post" action="event">
					<p>
						<label for="name">Nom d'événement:</label><br />
						<input type="text" name="name" id="name" />
					</p>
					<p>
						<label for="dateEvent">Date d'événement:</label><br />
						<input type="date" name="dateEvent" id="dateEvent" />
					</p>
					<p>
						<label for="category">Catégorie:</label><br />
						<select name="category" id="category">
							<option value="party">Fête</option> 
							<option value="travel">Voyage</option>
						</select>
					</p>
					<p>
						<label for="location">Lieu:</label><br />
						<input type="text" name="location" id="location" />
					</p>
					
					<input type="submit" value="Créer un événement" />
				</form>
		</section>
		<?php } else { ?>
		<section class="container">
			<h2>Connexion</h2>
			Vous devez <a href="login">vous connecter</a> pour créer/voir un événement
		</section>
		<?php } ?>
	</body>
</html>