<?php
class Coupon
{
    private $NumCoupon;
	private $Libelle;
	private $Code;
	private $Taux;

    public function __construct($leNumCoupon, $laLibelle, $leCode, $leTaux)
    {
        $this->NumCoupon=$leNumCoupon ;
        $this->Libelle=$laLibelle ;
        $this->Code=$leCode ;
        $this->Taux=$leTaux ;       
    }

    function __destruct() {

    }

    public function __set($attribut, $valeur) {
        switch ($attribut) {
            case'NumCoupon': {
                    $this->NumCoupon = $valeur;
                    break;
                }
            case'Libelle': {
                    $this->Libelle = $valeur;
                    break;
                }
            case'Code': {
                    $this->Code = $valeur;
                    break;
                }
            case'Taux': {
                    $this->Taux = $valeur;
                    break;
                }              
        }
    }

    public function __get($attribut) {
        switch ($attribut) {
            case 'NumCoupon': return $this->NumCoupon;
            case 'Libelle': return $this->Libelle;
            case 'Code': return $this->Code;
            case 'Taux': return $this->Taux;
        }
        
    }

    function __call($methode, $arguments) {
        echo 'Vous avez appelé la méthode ', $methode, ' avec les arguments : ', implode(',', $arguments);
    }

}
?>
