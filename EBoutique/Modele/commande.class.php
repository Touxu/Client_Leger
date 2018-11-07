<?php
class Commande
{
    private $NumCommande;
	private $Date;
	private $IdUser;
	private $IdAdresse;
	private $NumCoupon;
    

    public function __construct($leNumCommande, $laDate, $leIdUser, $leIdAdresse, $leNumCoupon)
    {
        $this->NumCommande=$leNumCommande ;
        $this->Date=$laDate ;
        $this->IdUser=$leIdUser ;
        $this->IdAdresse=$leIdAdresse ;
        $this->NumCoupon=$leNumCoupon ;        
    }

    function __destruct() {

    }

    public function __set($attribut, $valeur) {
        switch ($attribut) {
            case'NumCommande': {
                    $this->NumCommande = $valeur;
                    break;
                }
            case'Date': {
                    $this->Date = $valeur;
                    break;
                }
            case'IdUser': {
                    $this->IdUser = $valeur;
                    break;
                }
            case'IdAdresse': {
                    $this->IdAdresse = $valeur;
                    break;
                }
            case'NumCoupon': {
                    $this->NumCoupon = $valeur;
                    break;
                }                
        }
    }

    public function __get($attribut) {
        switch ($attribut) {
            case 'NumCommande': return $this->NumCommande;
            case 'Date': return $this->Date;
            case 'IdUser': return $this->IdUser;
            case 'IdAdresse': return $this->IdAdresse;
            case 'NumCoupon': return $this->NumCoupon;
        }
        
    }

    function __call($methode, $arguments) {
        echo 'Vous avez appelé la méthode ', $methode, ' avec les arguments : ', implode(',', $arguments);
    }

}
?>
