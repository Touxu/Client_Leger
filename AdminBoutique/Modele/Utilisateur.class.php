<?php

class Utilisateur {

    private $IdUtilisateur;
    private $LoginUtilisateur;
    private $MdpUtilisateur;
    private $EmailUtilisateur;
    private $Admin;

    function __construct($idU, $loginU, $mdpU, $emailU, $admin) {
        $this->IdUtilisateur = $idU;
        $this->LoginUtilisateur = $loginU;
        $this->MdpUtilisateur = $mdpU;
        $this->EmailUtilisateur = $emailU;
        $this->Admin = $admin;
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
                case'EmailUtilisateur': {
                    $this->Admin = $valeur;
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
            case 'Admin':return $this->Admin;
        }
    }

    function __call($methode, $arguments) {
        echo 'Vous avez appelé la méthode ', $methode, ' avec les arguments : ', implode(',', $arguments);
    }

    function __tostring() {
        return "Id : " . $this->IdUtilisateur . " | Login : " . $this->LoginUtilisateur .
                " | Mdp : " . $this->MdpUtilisateur . " | Email : " . $this->MdpUtilisateur .  " | Admin : " . $this->Admin . "<br>";
    }
}
