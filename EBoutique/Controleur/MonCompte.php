<?php
if (isset($_SESSION['id']))
{
	include("Vues/monCompte.php");
}
else
{
	include("Controleur/login.php");
}
?>
