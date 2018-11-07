<?php
class LigneCommande
{
    private $NumCommande;
	private $NumProd;
	private $Quantitee;
    

    public function __construct($leNumCommande, $leNumProd, $laQtt)
    {
        $this->NumCommande=$leNumCommande ;
        $this->NumProd=$leNumProd ;
        $this->Quantitee=$laQtt ;      
    }

    function __destruct() {

    }

    public function __set($attribut, $valeur) {
        switch ($attribut) {
            case'NumCommande': {
                    $this->NumCommande = $valeur;
                    break;
                }
            case'NumProd': {
                    $this->NumProd = $valeur;
                    break;
                }
            case'Quantitee': {
                    $this->Quantitee = $valeur;
                    break;
                }              
        }
    }

    public function __get($attribut) {
        switch ($attribut) {
            case 'NumCommande': return $this->NumCommande;
            case 'NumProd': return $this->NumProd;
            case 'Quantitee': return $this->Quantitee;
        }
        
    }

    function __call($methode, $arguments) {
        echo 'Vous avez appelé la méthode ', $methode, ' avec les arguments : ', implode(',', $arguments);
    }

}
?>
