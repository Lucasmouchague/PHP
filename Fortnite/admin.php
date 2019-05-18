<?php require_once('bdd.php'); ?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<title>admin_Spawn</title>
	</head>
	<body>
		<form method="post" action="admin.php" accept-charset="utf-8">
			 <input type="text" name="nom" id="nom" placeholder="Nom du spawn">
			 <input type="text" name="url" id="url" placeholder="url de l'image du spawn">
			 <button type="submit" name="add" id="submit">Enregistrer le spawn</button>
		</form>	
		
		</br><label for="spawn_select">Choose a spawn:</label>

		<select id="spawn_select">
			<?php
				$list = $bdd->query('SELECT * FROM spawn');
				while ($donnees = $list->fetch())
				{
					?>
					<option value=<?php echo($donnees['nom']); ?>><?php echo($donnees['nom']); ?></option>
					<?php
				}

			?>
		</form>

		</select>
		 <form action="admin.php" method="post" accept-charset="utf-8">
			<button type="submit" name="select" id="submit">
				Selectioner le spawn
			</button>
			<?php 
			if(isset($_POST['select']))
			{
				$select = $bdd->query('SELECT * FROM spawn');
				
			}
			?>
		</form>
		</br></br><form method="post" action="admin.php" accept-charset="utf-8">
			<button type="submit" name="list" id="submit">
				Voir tout les spawn
			</button>
			<?php
			if (isset($_POST['list']))
				{	
					$reponse = $bdd->query('SELECT * FROM spawn');
					while ($donnees = $reponse->fetch())
					{
						?>
						<hr>
						<p>Nom du spawn : <?php echo $donnees['nom']; ?>
						<p>URL de l'image : <?php echo $donnees['url']; ?>
					<?php
					}
				}
			?>
		</form>
	</body>
</html>


<?php

if (isset($_POST['add']))
{
	$nom=$_POST['nom'];
	$url=$_POST['url'];
    $a = $bdd->prepare("INSERT INTO spawn(nom,url) VALUES (:nom, :url)");
    $a->bindParam(':nom', $nom, PDO::PARAM_STR);
    $a->bindParam(':url', $url, PDO::PARAM_STR);
    $a->execute();
    echo("Bravo vous avez ajouter le spawn " . $nom);
}

?>