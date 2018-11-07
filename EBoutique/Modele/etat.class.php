<?php
class Etat
{
    private $NumFacture;
    private $Date;
    private $NumEtape;

    public function __construct($leNum, $laDate, $leNumEtape)
    {
        $this->NumFacture= $leNum;
        $this->Date= $laDate;
        $this->NumEtape= $leNumEtape;
    }

    function __destruct() {

    }

    public function __set($attribut, $valeur) {
        switch ($attribut) {
            case'NumFacture': {
                    $this->NumFacture = $valeur;
                    break;
                }
            case'Date': {
                    $this->Date = $valeur;
                    break;
                }
            case'NumEtape': {
                    $this->NumEtape = $valeur;
                    break;
                }
        }
    }

    public function __get($attribut) {
        switch ($attribut) {
            case 'NumFacture': return $this->NumFacture;
            case 'Date': return $this->Date;
            case 'NumEtape': return $this->NumEtape;
        }
    }

    function __call($methode, $arguments) {
        echo 'Vous avez appelé la méthode ', $methode, ' avec les arguments : ', implode(',', $arguments);
    }

}
?>
