<?php
include("../modele/GestionUtilisateur.class.php"); // c'est le fichier qui contient les fonctions de gestion des données
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
        $leRetour = GestionUtilisateur::VerifUtilisateur();
        if($leRetour[1] == true)
        {
        GestionUtilisateur::InscrireUtilisateur($leRetour[2], $leRetour[3], $leRetour[4]);
        header("Location: ../index.php?page=login");
        }
        else
        {
            header("Location: ../index.php?page=signin&leretour=$leRetour[0]");
        }
        break;

    case 2:
        if($_GET['mdp'] == '')
        {
            GestionUtilisateur::ModifUtilisateur($_GET['num'], $_GET['login'], $_GET['mdpCrypt'], $_GET['email'], $_GET['admin']);
        }
        else
        {
            $mdpC = sha1($_GET['mdp']);
            GestionUtilisateur::ModifUtilisateur($_GET['num'], $_GET['login'], $mdpC, $_GET['email'], $_GET['admin']);
        }
        header("Location: ../index.php?page=utilisateurs_lister");
        break;

    case 3:
        GestionUtilisateur::SupprimeUtilisateur($_GET["num"]);
        header("Location: ../index.php?page=utilisateurs_lister");
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
