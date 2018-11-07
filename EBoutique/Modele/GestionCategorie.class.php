<?php

include("Categorie.class.php");

class GestionCategorie {

    public static function InsertCategorie($numC, $nomC) {

        require("connect_BaseProduitsBozendo.php");
        try {
            $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
            $bdd = new PDO('mysql:host=' . $host . ';dbname=' . $bdd, $util, $password, $pdo_options);
        if (empty($numC))
        {
            $reponse = $bdd->prepare('INSERT INTO CATEGORIES (NomCategorie) VALUES (?)');
            $reponse->execute(array($nomC));
        }
        else
        {
            $reponse = $bdd->prepare('INSERT INTO CATEGORIES (NumCategorie, NomCategorie) VALUES (?, ?)');
            $reponse->execute(array($numC, $nomC));
        }

            $reponse->closeCursor(); // ferme le curseur
        } catch (Exception $e) {
            die('Erreur : ' . $e->getMessage());
        }
    }

    public static function ModifCategorie($numC, $nomC) {
        require("connect_BaseProduitsBozendo.php");
        try {
            $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
            $bdd = new PDO('mysql:host=' . $host . ';dbname=' . $bdd.';charset=utf8', $util, $password, $pdo_options);
            $reponse = $bdd->prepare('UPDATE CATEGORIES SET NomCategorie = ? WHERE NumCategorie = ?;');
            $reponse->execute(array($nomC, $numC));
            $reponse->closeCursor();  // ferme le curseur
        } catch (Exception $e) {
            die('Erreur : ' . $e->getMessage());
        }
    }

    public static function SupprimeCategorie($numC) {
        require("connect_BaseProduitsBozendo.php");
        try {
            $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
            $bdd = new PDO('mysql:host=' . $host . ';dbname=' . $bdd, $util, $password, $pdo_options);
            $reponse = $bdd->prepare('DELETE FROM CATEGORIES WHERE NumCategorie = ?');
            $reponse->execute(array($numC));

            $reponse->closeCursor();  // ferme le curseur
        } catch (Exception $e) {
            die('Erreur : ' . $e->getMessage());
        }
    }

    public static function AjouterCategorie($numC, $nomC) {
        return $uneCategorie = new Categorie($numC, $nomC);
    }

    public static function GetLesCategories($num) {
        require("connect_BaseProduitsBozendo.php");
        try {
            $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
            $bdd = new PDO('mysql:host=' . $host . ';dbname=' . $bdd, $util, $password, $pdo_options);
            if ($num == 0) { // On teste s'il s'agit de la liste complète ou d'un compte en particulier identifié par $num
                $reponse = $bdd->query("SELECT NumCategorie, NomCategorie FROM CATEGORIES ;"); //Exécute la requête
            } else {
                $reponse = $bdd->prepare("SELECT NumCategorie, NomCategorie FROM CATEGORIES WHERE NumCategorie=?;");
                $reponse->execute(array($num));
            }
            $categoriesDonnees = array();
            while ($ligne = $reponse->fetch()) {  //parcours le curseur pour récupérer les données
                $numC = $ligne['NumCategorie'];
                $nomC = utf8_encode($ligne['NomCategorie']);

                //Construction d'un objet de type categories
                $nouveauCategorie = new Categorie($numC, $nomC);


                $categoriesDonnees[] = $nouveauCategorie;  // Ajout de l'objet dans le tableau
            }
            $reponse->closeCursor();  // ferme le curseur

            return $categoriesDonnees; // On retourne le tableau des comptes
        } catch (Exception $e) {
            die('Erreur : ' . $e->getMessage());
        }
    }

}
