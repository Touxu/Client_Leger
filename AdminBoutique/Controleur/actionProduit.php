<?php
include("../modele/GestionProduit.class.php"); // c'est le fichier qui contient les fonctions de gestion des données
session_start();
if($_POST["action"] == null)
{
$action = $_GET["action"];
}
else
{
$action = $_POST["action"];
}
switch ($action) {
    case 1:
        $the_name = $_FILES['mon_fichier']['name'];
        if($the_name == "") {$the_name = null;}
        $repertoire_de_lautre_site   = '../../eBoutique/Vues/images/';
        $result = move_uploaded_file($_FILES['mon_fichier']['tmp_name'], $repertoire_de_lautre_site.$the_name);
        echo 'result : ' . $result . '<br />';

        GestionProduit::InsertProduit(null, $_POST['libelle'], $_POST['prix'], $_POST['categ'], $the_name, $_POST['laDescription']);
        break;

    case 2:
        $the_name = $_FILES['mon_fichier']['name'];
        if($the_name == "")
            {
                $the_name = null;
            }
            else
            {
                $repertoire_de_lautre_site   = '../../eBoutique/Vues/images/';
                $result = move_uploaded_file($_FILES['mon_fichier']['tmp_name'], $repertoire_de_lautre_site.$the_name);
            }
        GestionProduit::ModifProduit($_POST['num'], $_POST['libelle'], $_POST['solde'], $_POST['categ'], $the_name, $_POST['laDescription']);
        break;

    case 3:
        GestionProduit::SupprimeProduit($_GET["num"]);
        break;
}
header("Location: ../index.php?page=produits_lister");
?>
