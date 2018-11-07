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
        $leRetour = GestionUtilisateur::VerifUtilisateur();
        if($leRetour[1] == true)
        {
        if (count($leRetour) > 10)
        {
            GestionUtilisateur::InscrireUtilisateurETAdresse($leRetour[2], $leRetour[3], $leRetour[4], $leRetour[5], $leRetour[6], $leRetour[7], $leRetour[8], $leRetour[9], $leRetour[10], $leRetour[11], $leRetour[12], $leRetour[13], $leRetour[14], $leRetour[15], $leRetour[16]);
        }
        else
        {
            GestionUtilisateur::InscrireUtilisateur($leRetour[2], $leRetour[3], $leRetour[4], $leRetour[5], $leRetour[6]);
        }
        header("Location: ../index.php?page=monCompte");
        }
        else
        {
            header("Location: ../index.php?page=signin&leretour=$leRetour[0]");
        }
        break;

    case 2:
        GestionUtilisateur::ModifAdressePréférée($_GET['idUser'], $_GET['idAdressePrefere']);
        header("Location: ../index.php?page=mesAdresses");
        break;

    case 3:
        GestionUtilisateur::SupprimeProduit($_POST["num"]);
        header("Location: ../index.php?page=login");
        break;

    case 4:
    $leRetour2 = GestionUtilisateur::SeConnecter();
    if($leRetour2 != '')
        {
            header("Location: ../index.php?page=login&leretour2=$leRetour2");
        }
    break;
}

?>
