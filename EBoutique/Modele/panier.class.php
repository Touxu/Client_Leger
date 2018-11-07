<?php
class Panier
{
    private $produits ;

    public function __construct()
    {
        $this->produits=array() ; // tableau destiné à stocker les produits du panier
    }

    function __destruct() {

    }

    public function __set($attribut, $valeur) {
        switch ($attribut) {
            case'Produits': {
                    $this->produits = $valeur;
                    break;
                }
        }
    }

    public function __get($attribut) {
        switch ($attribut) {
            case 'Produits': return $this->produits;
        }
    }

    function __call($methode, $arguments) {
        echo 'Vous avez appelé la méthode ', $methode, ' avec les arguments : ', implode(',', $arguments);
    }

}
?>
