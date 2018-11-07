<?php

include("Produit.class.php");

class GestionProduit {

    public static function InsertProduit($numProd, $nomProduit, $prixProd, $codeCateg) {

        require("connect_BaseProduitsBozendo.php");
        try {
            $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
            $bdd = new PDO('mysql:host=' . $host . ';dbname=' . $bdd, $util, $password, $pdo_options);
        if (empty($numProd))
        {
            $reponse = $bdd->prepare('INSERT INTO PRODUITS (NomProd, PrixProd, CodeCateg) VALUES (?, ?, ?)');
            $reponse->execute(array($nomProduit, $prixProd, $codeCateg));
        }
        else
        {
            $reponse = $bdd->prepare('INSERT INTO PRODUITS (NumProd, NomProd, PrixProd, CodeCateg) VALUES (?, ?, ?, ?)');
            $reponse->execute(array($numProd, $nomProduit, $prixProd, $codeCateg));
        }

            $reponse->closeCursor(); // ferme le curseur
        } catch (Exception $e) {
            die('Erreur : ' . $e->getMessage());
        }
    }

    public static function ModifProduit($numProd, $nomProduit, $prixProd, $codeCateg) {
        $nomProd = ($nomProduit);
        require("connect_BaseProduitsBozendo.php");
        try {
            $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
            $bdd = new PDO('mysql:host=' . $host . ';dbname=' . $bdd.';charset=utf8', $util, $password, $pdo_options);
            $reponse = $bdd->prepare('UPDATE PRODUITS SET NomProd = ?, PrixProd = ?, CodeCateg = ? WHERE NumProd = ?;');
            $reponse->execute(array($nomProd, $prixProd, $codeCateg, $numProd));
            $reponse->closeCursor();  // ferme le curseur
        } catch (Exception $e) {
            die('Erreur : ' . $e->getMessage());
        }
    }

    public static function SupprimeProduit($numProd) {
        require("connect_BaseProduitsBozendo.php");
        try {
            $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
            $bdd = new PDO('mysql:host=' . $host . ';dbname=' . $bdd, $util, $password, $pdo_options);
            $reponse = $bdd->prepare('DELETE FROM PRODUITS WHERE NumProd = ?');
            $reponse->execute(array($numProd));

            $reponse->closeCursor();  // ferme le curseur
        } catch (Exception $e) {
            die('Erreur : ' . $e->getMessage());
        }
    }

    public static function GetLesProduits($num) {
        require("connect_BaseProduitsBozendo.php");
        try {
            $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
            $bdd = new PDO('mysql:host=' . $host . ';dbname=' . $bdd, $util, $password, $pdo_options);
            if ($num == 0) { // On teste s'il s'agit de la liste complète ou d'un compte en particulier identifié par $num
                $reponse = $bdd->query("SELECT NumProd, NomProd, PrixProd, CodeCateg, Image, DescProd FROM PRODUITS ;"); //Exécute la requête

                $produitDonnees = array();
            while ($ligne = $reponse->fetch()) {  //parcours le curseur pour récupérer les données
                $num = $ligne['NumProd'];
                $libelle = utf8_encode(htmlentities($ligne['NomProd'], ENT_QUOTES, "UTF-8"));
                $prix = $ligne['PrixProd'];
                $categ = $ligne['CodeCateg'];
                $image = utf8_encode($ligne['Image']);
                $desc = utf8_encode(htmlentities($ligne['DescProd'], ENT_QUOTES, "UTF-8"));


                //Construction d'un objet de type Produit
                $nouveauProduit = new Produit($num, $libelle, $prix, $categ, $image, $desc);


                $produitDonnees[] = $nouveauProduit;  // Ajout de l'objet dans le tableau
                }
                return $produitDonnees;
            } else {
                $reponse = $bdd->prepare("SELECT NumProd, NomProd, PrixProd, CodeCateg, Image, DescProd FROM PRODUITS WHERE NumProd=?;");
                $reponse->execute(array($num));

                while ($ligne = $reponse->fetch()) {  //parcours le curseur pour récupérer les données
                $num = $ligne['NumProd'];
                $libelle = utf8_encode(htmlentities($ligne['NomProd'], ENT_QUOTES, "UTF-8"));
                $prix = $ligne['PrixProd'];
                $categ = $ligne['CodeCateg'];
                $image = utf8_encode($ligne['Image']);
                $desc = utf8_encode(htmlentities($ligne['DescProd'], ENT_QUOTES, "UTF-8"));
                }

                //Construction d'un objet de type Produit
                $nouveauProduit = new Produit($num, $libelle, $prix, $categ, $image, $desc);
                return $nouveauProduit;
            }
            $reponse->closeCursor();  // ferme le curseur

            return $produitDonnees; // On retourne le tableau des comptes
        } catch (Exception $e) {
            die('Erreur : ' . $e->getMessage());
        }
    }

    public static function GetLesProduitsCateg($categ) {
        require("connect_BaseProduitsBozendo.php");
        try {
            $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
            $bdd = new PDO('mysql:host=' . $host . ';dbname=' . $bdd, $util, $password, $pdo_options);

                $reponse = $bdd->prepare("SELECT NumProd, NomProd, PrixProd, CodeCateg, Image, DescProd FROM PRODUITS WHERE CodeCateg=?;");
                $reponse->execute(array($categ));

            $produitDonnees = array();
            while ($ligne = $reponse->fetch()) {  //parcours le curseur pour récupérer les données
                $num = $ligne['NumProd'];
                $libelle = utf8_encode(htmlentities($ligne['NomProd'], ENT_QUOTES, "UTF-8"));
                $prix = $ligne['PrixProd'];
                $categ = $ligne['CodeCateg'];
                $image = utf8_encode($ligne['Image']);
                $desc = utf8_encode(htmlentities($ligne['DescProd'], ENT_QUOTES, "UTF-8"));


                //Construction d'un objet de type Produit
                $nouveauProduit = new Produit($num, $libelle, $prix, $categ, $image, $desc);


                $produitDonnees[] = $nouveauProduit;  // Ajout de l'objet dans le tableau
            }
            $reponse->closeCursor();  // ferme le curseur

            return $produitDonnees; // On retourne le tableau des comptes
        } catch (Exception $e) {
            die('Erreur : ' . $e->getMessage());
        }
    }


        public static function GetLeCodeCateg($laCateg) {
        require("connect_BaseProduitsBozendo.php");
        try {
            $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
            $bdd = new PDO('mysql:host=' . $host . ';dbname=' . $bdd, $util, $password, $pdo_options);

                $reponse = $bdd->prepare("SELECT NumCategorie FROM CATEGORIES WHERE NomCategorie=?;");
                $reponse->execute(array($laCateg));

            $leCodeCateg;
            while ($ligne = $reponse->fetch()) {  //parcours le curseur pour récupérer les données
                $leCodeCateg = $ligne['NumCategorie'];
            }

            $reponse->closeCursor();  // ferme le curseur

            return $leCodeCateg; // On retourne le tableau des comptes
        } catch (Exception $e) {
            die('Erreur : ' . $e->getMessage());
        }
    }

}
