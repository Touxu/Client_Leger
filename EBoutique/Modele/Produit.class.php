<?php

class Produit {

    private $NumProd;
    private $NomProd;
    private $PrixProd;
    private $CodeCateg;
    private $Image;
    private $DescProd;
    private $QuantitéeDansPanier;

    function __construct($num, $nom, $prix, $categ, $image, $desc) {
        $this->NumProd = $num;
        $this->NomProd = $nom;
        $this->PrixProd = $prix;
        $this->CodeCateg = $categ;
        $this->Image = $image;
        $this->DescProd = $desc;
        $this->QuantitéeDansPanier = 1;
    }

    function __destruct() {

    }

    public function __set($attribut, $valeur) {
        switch ($attribut) {
            case'NumProd': {
                    $this->NumProd = $valeur;
                    break;
                }
            case'NomProd': {
                    $this->NomProd = $valeur;
                    break;
                }
            case'PrixProd': {
                    $this->PrixProd = $valeur;
                    break;
                }
            case'CodeCateg': {
                    $this->CodeCateg = $valeur;
                    break;
                }
            case'Image': {
                    $this->Image = $valeur;
                    break;
                }
            case'DescProd': {
                    $this->DescProd = $valeur;
                    break;
                }
            case'QuantitéeDansPanier': {
                    $this->QuantitéeDansPanier = $valeur;
                    break;
                }
        }
    }

    public function __get($attribut) {
        switch ($attribut) {
            case 'NumProd': return $this->NumProd;
            case 'NomProd':return $this->NomProd;
            case 'PrixProd': return $this->PrixProd;
            case 'CodeCateg':return $this->CodeCateg;
            case 'Image':return $this->Image;
            case 'DescProd':return $this->DescProd;
            case 'QuantitéeDansPanier':return $this->QuantitéeDansPanier;
        }
    }

    function __call($methode, $arguments) {
        echo 'Vous avez appelé la méthode ', $methode, ' avec les arguments : ', implode(',', $arguments);
    }

    function __tostring() {
        return "Num : " . $this->NumProd . " | Nom : " . $this->NomProd .
                " | Prix : " . $this->PrixProd . " | Categégorie : " . $this->CodeCateg .
                " | Image : " . $this->Image . " | Description : " . $this->DescProd ."<br>";
    }

    function credit($mt) {
        $this->solde = $this->solde + $mt;
    }

    function debit($mt) {
        $this->solde = $this->solde - $mt;
    }

}
