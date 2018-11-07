<?php
include("../modele/GestionCategorie.class.php"); // c'est le fichier qui contient les fonctions de gestion des données
session_start();
$action = $_GET["action"];
switch ($action) {
    case 1:
        GestionCategorie::InsertCategorie(htmlentities( $_GET['nomC'], ENT_QUOTES, "UTF-8"));
        break;

    case 2:
        GestionCategorie::ModifCategorie($_GET['numC'], htmlentities($_GET['nomC'] , ENT_QUOTES, "UTF-8"));
        break;

    case 3:
        GestionCategorie::SupprimeCategorie($_GET["numC"]);
        break;
}
header("Location: ../index.php?page=categories_lister");
?>
