<?php

header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");
require_once('bdd.php');
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<title>TP Spawn</title>
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
		<style type="text/css">
			body 
			{
				color:black;
				background-color:white;
				background-image:url(https://cdn2.unrealengine.com/Fortnite%2Flanding-pages%2Fseason-8-v2%2Fheader%2F08BR_UA_Landing-Page_BP-Launch_Keyart_Home-1920x1080-7d810184e17fc1c2d35397c00dde4ff8ae0140b9.jpg);
				background-repeat:no-repeat;
			}
			.center-div
			{
			     position: absolute;
			     margin: auto;
			     top: 0;
			     right: 0;
			     bottom: 0;
			     left: 0;
			     width: 100px;
			     height: 100px;
			}
		</style>
	</head>
	<body>
		<nav class="navbar navbar-expand-lg navbar-light bg-transparent">
		  <a class="navbar-brand" href="#">TP spawn</a>
		  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
		    <span class="navbar-toggler-icon"></span>
		  </button>
		  
		  <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
		    <div class="navbar-nav">
		      <a class="nav-item nav-link active" href="admin.php">admin panel</a>
		    </div>
		  </div>
		</nav>

		<div class="center-div">
		  <form action="index.php" method="post" accept-charset="utf-8">
		  	<button class="btn btn-primary" name="submit" type="submit">Spawn</button>
			<?php
				if (isset($_POST['submit']))
				{

					$get = $bdd->query('SELECT * FROM spawn ORDER BY rand() limit 1');
					while($donnees=$get->fetch())
				{
					?>
					<p> <?php echo $donnees['nom']  ?> </p>  
					<img src="<?php echo $donnees['url']  ?>"> </p>  
				    <?php
				}
				}
			?>
		  </form>
		</div>
	</body>

</html>
