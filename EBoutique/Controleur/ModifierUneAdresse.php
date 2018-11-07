<?php
if (isset($_SESSION['id']))
{
	$idAdressePrefere = GestionUtilisateur::GetIdAdressePrefere($_SESSION['id']);//Récupére l'id de son adresse préféré

	if(isset($_GET['idAdresse']))
	{
		$idAdresse = $_GET['idAdresse'];
	}
	else
	{
		$idAdresse = $_POST['idAdresse'];
	}

	$isPrefere = false;
	if($idAdresse == $idAdressePrefere)
	{
		$isPrefere = true;
	}

	$AdresseDonnees = GestionAdresse::GetLesAdresse($idAdresse); //liste compléte des adresses
	include("Vues/ModifierUneAdresse.php");
}
else
{
	include("Controleur/login.php");
}
?>