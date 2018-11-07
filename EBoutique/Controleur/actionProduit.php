<?php
include("../modele/GestionProduit.class.php");
include("../modele/GestionPanier.class.php");
include("../modele/GestionCategorie.class.php");
include("../modele/GestionUtilisateur.class.php");
include("../modele/GestionAdresse.class.php");
session_start();
$action = $_GET["action"];
switch ($action) {
    case 1:
        GestionProduit::InsertProduit($_GET['num'], htmlentities($_GET['libelle'], ENT_QUOTES, "UTF-8"), $_GET['prix'], $_GET['categ']);
        header("Location: ../index.php?page=produits_lister");
        break;

    case 2:
        GestionProduit::ModifProduit($_GET['num'], $_GET['libelle'], $_GET['solde'], $_GET['categ']);
        header("Location: ../index.php?page=produits_lister");
        break;

    case 3:
        GestionProduit::SupprimeProduit($_GET["num"]);
        header("Location: ../index.php?page=produits_lister");
        break;
}
?>
