<?php

class Categorie {

    private $NumCategorie;
    private $NomCategorie;


    function __construct($numC, $nomC) {
        $this->NumCategorie = $numC;
        $this->NomCategorie = $nomC;
    }

    function __destruct() {

    }

    function __set($attribut, $valeur) {
        switch ($attribut) {
            case'NumCategorie': {
                    $this->NumCategorie = $valeur;
                    break;
                }
            case'NomCategorie': {
                    $this->NomCategorie = $valeur;
                    break;
                }
        }
    }

    function __get($attribut) {
        switch ($attribut) {
            case 'NumCategorie': return $this->NumCategorie;
            case 'NomCategorie':return $this->NomCategorie;
        }
    }

    function __call($methode, $arguments) {
        echo 'Vous avez appelé la méthode ', $methode, ' avec les arguments : ', implode(',', $arguments);
    }

    function __tostring() {
        return "Num : " . $this->NumCategorie . " | Nom : " . $this->NomCategorie . "<br>";
    }
}
