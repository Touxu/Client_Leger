<?php
if (isset($_SESSION['id']))
{
	$commandeDonnees = GestionCommande::GetLesCommandesDuUser($_SESSION['id']); //liste complète des commandes de l'utilisateur
	include("Vues/mesCommandes.php");
}
else
{
	include("Controleur/login.php");
}
?>
