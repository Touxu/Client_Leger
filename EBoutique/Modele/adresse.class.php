<?php
class Adresse
{
    private $IdAdresse ;
    private $Pays;
    private $Prenom;
    private $Nom;
    private $Adresse;
    private $AdresseComplement;
    private $Ville;
    private $CodePostal;
    private $Region;
    private $Telephone;
    private $Note;
    private $IdUtilisateur;

    public function __construct($leId, $lePays, $lePrenom, $leNom, $leAdresse, $leAdresseComplement, $laVille, $leCodePostal, $laRegion, $leTelephone, $laNote, $leIdUtilisateur)
    {
        $this->IdAdresse=$leId ;
        $this->Pays=$lePays ;
        $this->Prenom=$lePrenom ;
        $this->Nom=$leNom ;
        $this->Adresse=$leAdresse ;
        $this->AdresseComplement=$leAdresseComplement ;
        $this->Ville=$laVille ;
        $this->CodePostal=$leCodePostal ;
        $this->Region=$laRegion ;
        $this->Telephone=$leTelephone ;
        $this->Note=$laNote ;
        $this->IdUtilisateur=$leIdUtilisateur ;
        
    }

    function __destruct() {

    }

    public function __set($attribut, $valeur) {
        switch ($attribut) {
            case'IdAdresse': {
                    $this->IdAdresse = $valeur;
                    break;
                }
            case'Pays': {
                    $this->Pays = $valeur;
                    break;
                }
            case'Prenom': {
                    $this->Prenom = $valeur;
                    break;
                }
            case'Nom': {
                    $this->Nom = $valeur;
                    break;
                }
            case'Adresse': {
                    $this->Adresse = $valeur;
                    break;
                }
            case'AdresseComplement': {
                    $this->AdresseComplement = $valeur;
                    break;
                }
            case'Ville': {
                    $this->Ville = $valeur;
                    break;
                }
            case'CodePostal': {
                    $this->CodePostal = $valeur;
                    break;
                }
            case'Region': {
                    $this->Region = $valeur;
                    break;
                }
            case'Telephone': {
                    $this->Telephone = $valeur;
                    break;
                }
            case'Note': {
                    $this->Note = $valeur;
                    break;
                }
            case'IdUtilisateur': {
                    $this->IdUtilisateur = $valeur;
                    break;
                }
                
        }
    }

    public function __get($attribut) {
        switch ($attribut) {
            case 'IdAdresse': return $this->IdAdresse;
            case 'Pays': return $this->Pays;
            case 'Prenom': return $this->Prenom;
            case 'Nom': return $this->Nom;
            case 'Adresse': return $this->Adresse;
            case 'AdresseComplement': return $this->AdresseComplement;
            case 'Ville': return $this->Ville;
            case 'CodePostal': return $this->CodePostal;
            case 'Region': return $this->Region;
            case 'Telephone': return $this->Telephone;
            case 'Note': return $this->Note;
            case 'IdUtilisateur': return $this->IdUtilisateur;
        }
        
    }

    function __call($methode, $arguments) {
        echo 'Vous avez appelé la méthode ', $methode, ' avec les arguments : ', implode(',', $arguments);
    }

    function __tostring() {
        return $this->Adresse .  $this->AdresseComplement . ", " . $this->Ville .
                ", " . $this->Region . ", " . $this->Pays .
                ", " . $this->Nom . ", " . $this->Prenom . ", " . $this->Telephone;
    }
}
?>
