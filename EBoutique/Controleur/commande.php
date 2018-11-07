<?php
if (isset($_SESSION['id']))
{
	if (isset($_GET['num']))
	{
		$laCommande = GestionCommande::GetLesCommandes($_GET['num']); //la commande
		$lAdresse = GestionCommande::GetLAdresse($laCommande->IdAdresse); //l'adresse
		$laFacture = GestionFacture::GetFactureByCommande($_GET['num']); //la Facture
		$lesEtats = GestionEtat::GetEtatByFacture($laFacture->NumFacture); //les etats*
		$lesEtapes = GestionEtape::GetEtape(); //les etapes
		include("Vues/commande.php");
	}
	else
	{
		include("Controleur/MesCommandes.php");
	}
}
else
{
	include("Controleur/login.php");
}
?>
