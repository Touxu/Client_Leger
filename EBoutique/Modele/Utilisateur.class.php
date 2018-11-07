<?php

class Utilisateur {

    private $IdUtilisateur;
    private $LoginUtilisateur;
    private $MdpUtilisateur;
    private $EmailUtilisateur;

    function __construct($idU, $loginU, $mdpU, $emailU) {
        $this->IdUtilisateur = $idU;
        $this->LoginUtilisateur = $loginU;
        $this->MdpUtilisateur = $mdpU;
        $this->EmailUtilisateur = $emailU;
    }

    function __destruct() {

    }

    function __set($attribut, $valeur) {
        switch ($attribut) {
            case'IdUtilisateur': {
                    $this->IdUtilisateur = $valeur;
                    break;
                }
            case'LoginUtilisateur': {
                    $this->LoginUtilisateur = $valeur;
                    break;
                }
            case'MdpUtilisateur': {
                    $this->MdpUtilisateur = $valeur;
                    break;
                }
            case'EmailUtilisateur': {
                    $this->EmailUtilisateur = $valeur;
                    break;
                }
        }
    }

    function __get($attribut) {
        switch ($attribut) {
            case 'IdUtilisateur': return $this->IdUtilisateur;
            case 'LoginUtilisateur':return $this->LoginUtilisateur;
            case 'MdpUtilisateur': return $this->MdpUtilisateur;
            case 'EmailUtilisateur':return $this->EmailUtilisateur;
        }
    }

    function __call($methode, $arguments) {
        echo 'Vous avez appelé la méthode ', $methode, ' avec les arguments : ', implode(',', $arguments);
    }

    function __tostring() {
        return "Id : " . $this->IdUtilisateur . " | Login : " . $this->LoginUtilisateur .
                " | Mdp : " . $this->MdpUtilisateur . " | Email : " . $this->MdpUtilisateur . "<br>";
    }
}
