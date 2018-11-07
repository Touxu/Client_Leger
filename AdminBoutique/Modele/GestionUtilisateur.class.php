

<?php
include ("Utilisateur.class.php");

class GestionUtilisateur

    {
    public static function VerifUtilisateur()
        {
        $erreur = 'erreur';
        $aReussi = false;
        $pseudo = 'pseudo';
        $mail = 'mail';
        $mdp = 'mdp';
        $leRetour = array(
            0 => $erreur,
            1 => $aReussi,
            2 => $pseudo,
            3 => $mail,
            4 => $mdp,
        );
        if (isset($_POST['forminscription']))
            {
            $pseudo = htmlspecialchars($_POST['signin']);
            $mail = htmlspecialchars($_POST['mail']);
            $mdp = sha1($_POST['mdp']);
            $mdp2 = sha1($_POST['remdp']);
            if (!empty($pseudo) AND !empty($mail) AND !empty($mdp) AND !empty($mdp2))
                {
                $pseudolength = strlen($pseudo);
                if ($pseudolength <= 255)
                    {
                    if (filter_var($mail, FILTER_VALIDATE_EMAIL))
                        {
                        require ("connect_BaseProduitsBozendo.php");

                        $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
                        $bdd = new PDO('mysql:host=' . $host . ';dbname=' . $bdd, $util, $password, $pdo_options);
                        $reqmail = $bdd->prepare("SELECT * FROM utilisateurs WHERE EmailUtilisateur = ?");
                        $reqmail->execute(array(
                            $mail
                        ));
                        $mailexist = $reqmail->rowCount();
                        $reqmail->closeCursor(); // ferme le curseur
                        if ($mailexist == 0)
                            {
                            if ($mdp == $mdp2)
                                {

                                // Réussi

                                $aReussi = true;
                                $erreur = "Votre compte a bien été créé ! <a href=\"connexion.php\">Me connecter</a>";
                                }
                              else
                                {
                                $erreur = "Vos mots de passes ne correspondent pas !";
                                }
                            }
                          else
                            {
                            $erreur = "Adresse mail déjà utilisée !";
                            }
                        }
                      else
                        {
                        $erreur = "L'adresse mail n'est pas valide !";
                        }
                    }
                  else
                    {
                    $erreur = "Votre pseudo ne doit pas dépasser 255 caractères !";
                    }
                }
              else
                {
                $erreur = "Tous les champs doivent être complétés !";
                }

            $leRetour = array(
                0 => $erreur,
                1 => $aReussi,
                2 => $pseudo,
                3 => $mail,
                4 => $mdp,
            );
            }

        return $leRetour;
        }

    public static function InscrireUtilisateur($lesignin, $lemail, $lemdp)
        {
        require ("connect_BaseProduitsBozendo.php");

        try
            {
            $estAdmin = 0;
            $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
            $bdd = new PDO('mysql:host=' . $host . ';dbname=' . $bdd, $util, $password, $pdo_options);
            $reponse = $bdd->prepare('INSERT INTO utilisateurs(`LoginUtilisateur`, `MdpUtilisateur`, `EmailUtilisateur`, `Admin`) VALUES (?,?,?,?);');
            $reponse->execute(array(
                $lesignin,
                $lemdp,
                $lemail,
                $estAdmin
            ));
            $reponse->closeCursor(); // ferme le curseur
            }

        catch(Exception $e)
            {
            die('Erreur : ' . $e->getMessage());
            }
        }

    public static function SeConnecter()
        {
        $erreur = '';
        if (isset($_POST['formconnexion']))
        {
            $mailconnect = htmlspecialchars($_POST['mail']);
            $mdpconnect  = sha1($_POST['mdp']);

            if(!empty($mailconnect) AND !empty($mdpconnect))
            {
               require ("connect_BaseProduitsBozendo.php");
            try
            {
               $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
               $bdd = new PDO('mysql:host=' . $host . ';dbname=' . $bdd, $util, $password, $pdo_options);
               $requser = $bdd->prepare("SELECT * FROM utilisateurs WHERE EmailUtilisateur = ? AND MdpUtilisateur = ?");
               $requser->execute(array($mailconnect, $mdpconnect));
               $userexist = $requser->rowCount();
               if($userexist == 1)
               {
                  $userinfo = $requser->fetch();
                  $_SESSION['id'] = $userinfo['IdUtilisateur'];
                  $_SESSION['pseudo'] = $userinfo['LoginUtilisateur'];
                  $_SESSION['mail'] = $userinfo['EmailUtilisateur'];
                  $_SESSION['Admin'] = $userinfo['Admin'];
                  header("Location: ../index.php");
               } else
               {
                    $erreur = "Mauvais mail ou mot de passe !";
               }
            $requser->closeCursor(); // ferme le curseur
            }

            catch(Exception $e)
            {
            die('Erreur : ' . $e->getMessage());
            }

            } else
            {
                $erreur = "Tous les champs doivent être complétés !";
            }
        }


        return $erreur;
        }

    public static function ModifUtilisateur($num, $nomUtilisateur, $mdplUtilisateur, $emailUtilisateur, $adminUtilisateur)
        {
        require("connect_BaseProduitsBozendo.php");

        try
            {
            $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
            $bdd = new PDO('mysql:host=' . $host . ';dbname=' . $bdd . ';charset=utf8', $util, $password, $pdo_options);
            $reponse = $bdd->prepare('UPDATE UTILISATEURS SET Prénom = ?, MdpUtilisateur = ?, EmailUtilisateur = ?, Admin = ? WHERE IdUtilisateur = ?;');
            $reponse->execute(array(
                $nomUtilisateur,
                $mdplUtilisateur,
                $emailUtilisateur,
                $adminUtilisateur,
                $num
            ));
            $reponse->closeCursor(); // ferme le curseur
            }

        catch(Exception $e)
            {
            die('Erreur : ' . $e->getMessage());
            }
        }

    public static function SupprimeUtilisateur($numProd)
        {
        require("connect_BaseProduitsBozendo.php");

        try
            {
            $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
            $bdd = new PDO('mysql:host=' . $host . ';dbname=' . $bdd, $util, $password, $pdo_options);
            $reponse = $bdd->prepare('DELETE FROM UTILISATEURS WHERE IdUtilisateur = ?');
            $reponse->execute(array(
                $numProd
            ));
            $reponse->closeCursor(); // ferme le curseur
            }

        catch(Exception $e)
            {
            die('Erreur : ' . $e->getMessage());
            }
        }

    public static function AjouterUtilisateur($numProd, $nomProd, $codeCateg, $prixProd)
        {
        return $unUtilisateur = new Utilisateur($numProd, $nomProd, $codeCateg, $prixProd);
        }

    public static function GetLesUtilisateurs($num)
        {
        require("connect_BaseProduitsBozendo.php");

        try
            {
            $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
            $bdd = new PDO('mysql:host=' . $host . ';dbname=' . $bdd, $util, $password, $pdo_options);
            if ($num == 0)
                { // On teste s'il s'agit de la liste complète ou d'un compte en particulier identifié par $num
                $reponse = $bdd->query("SELECT idUtilisateur, Prénom, MdpUtilisateur, EmailUtilisateur, Admin FROM UTILISATEURS ;"); //Exécute la requête
                }
              else
                {
                $reponse = $bdd->prepare("SELECT idUtilisateur, Prénom, MdpUtilisateur, EmailUtilisateur, Admin FROM UTILISATEURS WHERE idUtilisateur=?;");
                $reponse->execute(array(
                    $num
                ));
                }

            $utilisateurDonnees = array();
            while ($ligne = $reponse->fetch())
                { //parcours le curseur pour récupérer les données
                $num = $ligne['idUtilisateur'];
                $login = utf8_encode($ligne['Prénom']);
                $mdp = utf8_encode($ligne['MdpUtilisateur']);
                $email = utf8_encode($ligne['EmailUtilisateur']);
                $admin = $ligne['Admin'];

                // Construction d'un objet de type Utilisateur

                $nouveauUtilisateur = new Utilisateur($num, $login, $mdp, $email, $admin);
                $utilisateurDonnees[] = $nouveauUtilisateur; // Ajout de l'objet dans le tableau
                }

            $reponse->closeCursor(); // ferme le curseur
            return $utilisateurDonnees; // On retourne le tableau des comptes
            }

        catch(Exception $e)
            {
            die('Erreur : ' . $e->getMessage());
            }
        }
    }

