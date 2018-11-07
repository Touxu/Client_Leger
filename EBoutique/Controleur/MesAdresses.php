<?php
if (isset($_SESSION['id']))
{
	$idAdressePrefere = GestionUtilisateur::GetIdAdressePrefere($_SESSION['id']);//Récupére l'id de son adresse préféré
	if(isset($idAdressePrefere))
	{
	$adressePrefere = GestionAdresse::GetLesAdresse($idAdressePrefere);//Récupére son adresse préféré
	}

	$adresseDonnees = GestionAdresse::GetLesAdresseDuUser($_SESSION['id']); //liste compléte des adresses de l'utilisateur
	include("Vues/mesAdresses.php");
}
else
{
	include("Controleur/login.php");
}
?>
