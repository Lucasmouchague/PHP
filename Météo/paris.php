<?php
if(date("H") > 19)
{
	for ($i = 0; $i < 4; $i++)
	{
        	echo "<img style='filter: invert(1);' src='https://www.prevision-meteo.ch/uploads/widget/paris_" . $i . ".png'>";
	}
	
}
else 
{
	for ($i = 0; $i < 4; $i++)
	{
        	echo "<img src='https://www.prevision-meteo.ch/uploads/widget/paris_" . $i . ".png'>";
	}
}
?>
