<?php
include("../modele/GestionProduit.class.php");
include("../modele/GestionPanier.class.php");
include("../modele/GestionCategorie.class.php");
include("../modele/GestionUtilisateur.class.php");
include("../modele/GestionAdresse.class.php");
include("../modele/GestionCommande.class.php");
session_start();
if(isset($_POST["action"]))
{
$action = $_POST["action"];
}
else
{
$action = $_GET["action"];
}
switch ($action) {
	case 1:
		//Traitement
		$date = date("Y-m-d H:i:s");
		GestionCommande::CreateCommande($date, $_SESSION['id'], $_POST['adresseDenvoie'], null); //on créé la commande


		unset($_SESSION['panier']);
    	header("Location: ../index.php?page=thankyou");
    	break;
}
?>
