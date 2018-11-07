<?php
if (!isset($_SESSION['id']))
{
include("Vues/login.php");
}
else
{
	include("Controleur/monCompte.php");
}
?>

