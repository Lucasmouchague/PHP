<?php
header('Cache-Control: no cache'); //no cache
session_cache_limiter('private_no_expire'); // works
session_start();
if (isset($_SESSION['connected'])) 
{
  header("Location: admin.php");
}
?>
<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <title>Login page</title>
  </head>
  <body>
    <div>
      <div>
        <form  method="post" action="connexion.php">
          <span>
            Connectez vous
          </span>

          <div data-validate="Veuillez entrer votre identifiant">
            <input type="text" name="login" id="login" placeholder="Identifiant">
            <span></span>
          </div>

          <div data-validate = "Veuillez entrer votre mot de passe">
            <input type="password" name="password" id="password" placeholder="Mot de passe">
            <span></span>
          </div>
          <div>
            <button type="submit" name="submit" id="submit">
              <span>
                Connexion
              </span>
            </button>
          </div>
        </form>
      </div>
    </div>
    <div></div>
  </body>
<?php
define("DATABASE_HOST", "localhost");
define("DATABASE_NAME", "tpspawn");
define("DATABASE_USER", "root");
define("DATABASE_PASSWORD", "toor");
$bdd = new PDO('mysql:host='.DATABASE_HOST.';dbname='.DATABASE_NAME.';charset=utf8', DATABASE_USER, DATABASE_PASSWORD);

if (isset($_POST['submit']))
{
	$login=$_POST['login'];
	$password=md5($_POST['password']);

     $a = $bdd->prepare("SELECT login FROM conn WHERE login = ? AND  password = ?");
     $a->execute([$login,$password]);

     $row = $a->fetch();
      if ($row) 
      {
        session_start();
        $_SESSION['connected'] = 1;
        header('Location: admin.php');
        exit();
      } else {
        echo ("Mauvais mot de passe ou nom d'utilisateur !");
      }
}
?>