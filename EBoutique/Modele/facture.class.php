<?php
class Facture
{
    private $NumFacture;
    private $DateFacture;
    private $DateLivraison;

    public function __construct($leNum, $laDate, $laDateLivraison)
    {
        $this->NumFacture= $leNum;
        $this->DateFacture= $laDate;
        $this->DateLivraison= $laDateLivraison;
    }

    function __destruct() {

    }

    public function __set($attribut, $valeur) {
        switch ($attribut) {
            case'NumFacture': {
                    $this->NumFacture = $valeur;
                    break;
                }
            case'DateFacture': {
                    $this->DateFacture = $valeur;
                    break;
                }
            case'DateLivraison': {
                    $this->DateLivraison = $valeur;
                    break;
                }
        }
    }

    public function __get($attribut) {
        switch ($attribut) {
            case 'NumFacture': return $this->NumFacture;
            case 'DateFacture': return $this->DateFacture;
            case 'DateLivraison': return $this->DateLivraison;
        }
    }

    function __call($methode, $arguments) {
        echo 'Vous avez appelé la méthode ', $methode, ' avec les arguments : ', implode(',', $arguments);
    }

}
?>
