<?php
class Etape
{
    private $NumEtape;
    private $Libelle;

    public function __construct($leNum, $leLib)
    {
        $this->NumEtape= $leNum;
        $this->Libelle= $leLib;
    }

    function __destruct() {

    }

    public function __set($attribut, $valeur) {
        switch ($attribut) {
            case'NumEtape': {
                    $this->NumEtape = $valeur;
                    break;
                }
            case'Libelle': {
                    $this->Libelle = $valeur;
                    break;
                }
        }
    }

    public function __get($attribut) {
        switch ($attribut) {
            case 'NumEtape': return $this->NumEtape;
            case 'Libelle': return $this->Libelle;
        }
    }

    function __call($methode, $arguments) {
        echo 'Vous avez appelé la méthode ', $methode, ' avec les arguments : ', implode(',', $arguments);
    }

}
?>
