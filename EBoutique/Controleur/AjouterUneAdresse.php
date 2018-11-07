<?php
if (isset($_SESSION['id']))
{
	$idAdressePrefere = GestionUtilisateur::GetIdAdressePrefere($_SESSION['id']);//Récupére l'id de son adresse préféré
	include("Vues/AjouterUneAdresse.php");
}
else
{
	include("Controleur/login.php");
}
?>
