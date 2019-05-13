<?php
include 'header.php';
echo '<html>';
$date = date("d-m-Y");
$heure = date("H:i");
echo '<p>Bonjour nous somme le ' . $date .' et il est ' . $heure .'</p></br>';
echo "<a href='bordeaux.php'>La metéo sur bordeaux</a></br>";
echo "<a href='paris.php'>La metéo sur paris</a>";
echo '</body>';
include 'footer.php';
?>
