<?php
if (!isset($_SESSION['id']))
{
	include("Vues/signin.php");
}
else
{
	include("Controleur/monCompte.php");
}
?>

