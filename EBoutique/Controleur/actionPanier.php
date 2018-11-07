<?php
include("../modele/GestionProduit.class.php");
include("../modele/GestionPanier.class.php");
include("../modele/GestionCategorie.class.php");
include("../modele/GestionUtilisateur.class.php");
include("../modele/GestionAdresse.class.php");
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
    	$leProduit = GestionProduit::GetLesProduits($_POST["num"]);
        //var_dump($leProduit->NomProd);
    	GestionPanier::AjouterProduitPanier($leProduit, $_POST["qt"]);
    	//$panier = GestionPanier::GetLePanier();
        $tabProduits = $panier->Produits;
        var_dump($panier);
        echo '<br><br><br><br><br>';
        //var_dump($tabProduits);

    	header("Location: ../index.php?page=panier");
    	break;
    case 2:
        $leProduit = GestionProduit::GetLesProduits($_GET["num"]);
        //retirer un produit
        GestionPanier::DecrementerProduitPanier($leProduit);
        header("Location: ../index.php?page=panier");
        break;
    case 3:
        $leProduit = GestionProduit::GetLesProduits($_GET["num"]);
        //ajouter un produit
        GestionPanier::IncrementerProduitPanier($leProduit);
        header("Location: ../index.php?page=panier");
        break;
    case 4:
    $leProduit = GestionProduit::GetLesProduits($_GET["num"]);
    //Supprime
    GestionPanier::SuprimmerProduitPanier($leProduit);
    header("Location: ../index.php?page=panier");
        break;
}
?>
