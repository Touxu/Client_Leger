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
            //suprimmer
            //il faut suprimmer ou remplacer l'adresse préférée de l'utilsiateur
            $adresseDonnees = GestionAdresse::GetLesAdresseDuUser($_GET["idUser"]); //liste compléte des adresses de l'utilisateur

            if(count($adresseDonnees) > 1)
            {
                if ( (GestionUtilisateur::GetIdAdressePrefere($_GET["idUser"])) == ($adresseDonnees[0]->IdAdresse) ) //Si la prochaine adresse est la préférée qui na pas encore été suprimmé
                {
                    GestionUtilisateur::ModifAdressePréférée($_GET["idUser"], ($adresseDonnees[1]->IdAdresse));
                }
                else
                {
                    GestionUtilisateur::ModifAdressePréférée($_GET["idUser"], ($adresseDonnees[0]->IdAdresse));
                }
            }
            else //Si il na pas d'autre adresse
            {
                GestionUtilisateur::ModifAdressePréférée($_GET["idUser"], NULL);
            }
            
            GestionAdresse::SupprimeAdresse($_GET['idAdressePrefere']); //On suprimme l'adresse

            header("Location: ../index.php?page=mesAdresses");
        break;
    case 2:
        //Ajouter
        $leRetour = GestionAdresse::VerifAdresse();
        if($leRetour[1] == true)
        {
            $AddByDefault = null;
            if(isset($leRetour[12]))
            {
                $AddByDefault = $leRetour[12];
            }
            else
            {
                $AddByDefault = $_POST['addParDefaut'];
            }
            GestionAdresse::AjouterAdresse($leRetour[2], $leRetour[3], $leRetour[4], $leRetour[5], $leRetour[6], $leRetour[7], $leRetour[8], $leRetour[9], $leRetour[10], $leRetour[11], $AddByDefault);
            header("Location: ../index.php?page=mesAdresses");
        }
        else
        {
            header("Location: ../index.php?page=AjouterUneAdresse&leretour=$leRetour[0]");
        }
        break;
    case 3:
        //Si il suprimme juste une adresse
        GestionAdresse::SupprimeAdresse($_GET['idAdresse']);
        header("Location: ../index.php?page=mesAdresses");
        break;
    case 4:
        //modifier
        $leRetour = GestionAdresse::VerifAdresseMofifier();
        if($leRetour[1] == true)
        {
            $AddByDefault = null;
            if(isset($leRetour[12]))
            {
                $AddByDefault = $leRetour[12];
            }
            $idAdresse = $_POST['idAdresse'];
            GestionAdresse::ModifierAdresse($leRetour[2], $leRetour[3], $leRetour[4], $leRetour[5], $leRetour[6], $leRetour[7], $leRetour[8], $leRetour[9], $leRetour[10], $leRetour[11], $AddByDefault, $idAdresse);
            var_dump($leRetour);
            header("Location: ../index.php?page=mesAdresses");
        }
        else
        {
          header("Location: ../index.php?page=ModifierUneAdresse&leretour=$leRetour[0]");
        }
        break;
    case 5:
        //Ajouter dans chheckout
        $leRetour = GestionAdresse::VerifAdresse();
        if($leRetour[1] == true)
        {
            $AddByDefault = null;
            if(isset($leRetour[12]))
            {
                $AddByDefault = $leRetour[12];
            }
            else
            {
                $AddByDefault = $_POST['addParDefaut'];
            }
            GestionAdresse::AjouterAdresse($leRetour[2], $leRetour[3], $leRetour[4], $leRetour[5], $leRetour[6], $leRetour[7], $leRetour[8], $leRetour[9], $leRetour[10], $leRetour[11], $AddByDefault);
            header("Location: ../index.php?page=checkout");
        }
        else
        {
            header("Location: ../index.php?page=checkout&leretour=$leRetour[0]");
        }
        break;
}
?>
