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
        GestionCategorie::InsertCategorie($_GET['numC'], htmlentities( $_GET['nomC'], ENT_QUOTES, "UTF-8"));
        break;

    case 2:
        GestionCategorie::ModifCategorie($_GET['numC'], htmlentities($_GET['nomC'] , ENT_QUOTES, "UTF-8"));
        break;

    case 3:
        GestionCategorie::SupprimeCategorie($_GET["numC"]);
        break;
}
header("Location: ../index.php?page=produits_lister");
?>
