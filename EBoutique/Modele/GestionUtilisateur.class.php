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
		if (isset($_POST['FormInscription']))
		{

			// variable utilisateur

			$prenom = htmlspecialchars($_POST['c_fname']);
			$nom = htmlspecialchars($_POST['c_lname']);
			$mail = htmlspecialchars($_POST['c_email_address']);
			$mdp = sha1($_POST['c_mdp']);
			$mdp2 = sha1($_POST['c_mdp_confirm']);
			$tel = htmlspecialchars($_POST['c_phone']);
			if (!empty($prenom) AND !empty($nom) AND !empty($mail) AND !empty($mdp) AND !empty($mdp2) AND !empty($tel))
			{
				$prenomlength = strlen($prenom);
				$nomlength = strlen($nom);
				$maillength = strlen($mail);
				$mdplength = strlen($mdp);
				$tellength = strlen($tel);
				if ($prenomlength <= 40 AND $nomlength <= 40 AND $maillength <= 40 AND $mdplength <= 40 AND $tellength <= 10)
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

								// Réussi inscrit
								// Mtn test adresse

								if (!isset($_POST['c_add_adresse'])) //si la case n'est aps coché
								{
									$aReussi = true;
									$erreur = "Votre compte a bien été créé !";
									$leRetour = array(
										0 => $erreur,
										1 => $aReussi,
										2 => $prenom,
										3 => $mail,
										4 => $mdp,
										5 => $nom,
										6 => $tel,
									);
									return $leRetour;
								}
								else
								{
									if (isset($_POST['c_add_adresse']) AND (!empty($_POST['c_fname_adresse']) OR !empty($_POST['c_lname_adresse']) OR !empty($_POST['c_address']) OR !empty($_POST['c_ville']) OR !empty($_POST['c_postal_zip']) OR !empty($_POST['c_state_country']) OR !empty($_POST['c_phone_adresse'])))
									{
										$paysAdresse = htmlspecialchars($_POST['c_country']);
										$prenomAdresse = htmlspecialchars($_POST['c_fname_adresse']);
										$nomAdresse = htmlspecialchars($_POST['c_lname_adresse']);
										$AdresseAdresse = htmlspecialchars($_POST['c_address']);
										$complementAdresseAdresse = htmlspecialchars($_POST['c_comp_address']);
										$villeAdresse = htmlspecialchars($_POST['c_ville']);
										$cpAdresse = htmlspecialchars($_POST['c_postal_zip']);
										$regionAdresse = htmlspecialchars($_POST['c_state_country']);
										$telAdresse = htmlspecialchars($_POST['c_phone_adresse']);
										$noteAdresse = htmlspecialchars($_POST['c_order_notes']);

										// verif taille

										$prenomAdresselength = strlen($prenomAdresse);
										$nomAdresselength = strlen($nomAdresse);
										$AdresseAdresselength = strlen($AdresseAdresse);
										$complementAdresseAdresselength = strlen($complementAdresseAdresse);
										$villeAdresselength = strlen($villeAdresse);
										$cpAdresselength = strlen($cpAdresse);
										$regionAdresselength = strlen($regionAdresse);
										$telAdresselength = strlen($telAdresse);
										$noteAdresselength = strlen($noteAdresse);
										if ($prenomAdresselength <= 40 AND $nomAdresselength <= 40 AND $AdresseAdresselength <= 40 AND $complementAdresseAdresselength <= 40 AND $villeAdresselength <= 40 AND $cpAdresselength <= 10 AND $regionAdresselength <= 40 AND $telAdresselength <= 10 AND $noteAdresselength <= 255)
										{
											$aReussi = true;
											$erreur = "Votre compte a bien été créé !";
											$leRetour = array(
												0 => $erreur,
												1 => $aReussi,
												2 => $prenom,
												3 => $mail,
												4 => $mdp,
												5 => $nom,
												6 => $tel,
												7 => $paysAdresse,
												8 => $prenomAdresse,
												9 => $nomAdresse,
												10 => $AdresseAdresse,
												11 => $complementAdresseAdresse,
												12 => $villeAdresse,
												13 => $cpAdresse,
												14 => $regionAdresse,
												15 => $telAdresse,
												16 => $noteAdresse,
											);
											return $leRetour;
										}
										else
										{
											$erreur = "Vous avez dépassé la limite de caractà¨res autorisée dans les champs !";
										}
									}
									else
									{
										$erreur = "Vous devez compléter tout les champs de l'adresse si vous cochez la case ajouter une adresse !";
									}
								}
							}
							else
							{
								$erreur = "Vos mots de passes ne correspondent pas !";
							}
						}
						else
						{
							$erreur = "Adresse mail déjà  utilisée !";
						}
					}
					else
					{
						$erreur = "L'adresse mail n'est pas valide !";
					}
				}
				else
				{
					$erreur = "Vous avez dépassé la limite de caractà¨res autorisée dans les champs !";
				}
			}
			else
			{
				$erreur = "Tous les champs doivent être complétés !";
			}
		}

		if ($erreur != "Votre compte a bien été créé !")
		{
			return $leRetour;
		}
	}

	public static function InscrireUtilisateur($leprenom, $lemail, $lemdp, $lenom, $letel)
	{
		require ("connect_BaseProduitsBozendo.php");

		try
		{
			$pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
			$bdd = new PDO('mysql:host=' . $host . ';dbname=' . $bdd, $util, $password, $pdo_options);
			$reponse = $bdd->prepare('INSERT INTO utilisateurs(`Prénom`, `MdpUtilisateur`, `EmailUtilisateur`, `Nom`, `Téléphone`) VALUES (?,?,?,?,?);');
			$reponse->execute(array(
				$leprenom,
				$lemdp,
				$lemail,
				$lenom,
				$letel
			));
			$_SESSION['id'] = $bdd->lastInsertId();
			$_SESSION['pseudo'] = $leprenom;
			$_SESSION['nom'] = $lenom;
			$_SESSION['mail'] = $lemail;
			$_SESSION['tel'] = $letel;
			$reponse->closeCursor(); // ferme le curseur
		}

		catch(Exception $e)
		{
			die('Erreur : ' . $e->getMessage());
		}
	}

	public static function InscrireUtilisateurETAdresse($leprenom, $lemail, $lemdp, $lenom, $letel, $lepaysadresse, $leprenomadresse, $lenomadresse, $ladresse, $ladresseComplement, $laville, $lecp, $laregion, $leteladresse, $lanote)
	{
		require ("connect_BaseProduitsBozendo.php");

		try
		{
			$pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
			$bdd = new PDO('mysql:host=' . $host . ';dbname=' . $bdd, $util, $password, $pdo_options);
			$reponse = $bdd->prepare('INSERT INTO utilisateurs(`Prénom`, `MdpUtilisateur`, `EmailUtilisateur`, `Nom`, `Téléphone`) VALUES (?,?,?,?,?);');
			$reponse->execute(array(
				$leprenom,
				$lemdp,
				$lemail,
				$lenom,
				$letel
			));
			$_SESSION['id'] = $bdd->lastInsertId();
			$_SESSION['pseudo'] = $leprenom;
			$_SESSION['nom'] = $lenom;
			$_SESSION['mail'] = $lemail;
			$_SESSION['tel'] = $letel;
			$reponse->closeCursor(); // ferme le curseur

			// adresse

			$reponse2 = $bdd->prepare('INSERT INTO adresse(`Pays`, `Prénom`, `Nom`, `Adresse`, `AdresseComplement`, `Ville`, `CodePostal`, `Région`, `Téléphone`, `Note`, `IdUtilisateur`) VALUES (?,?,?,?,?,?,?,?,?,?,?);');
			$reponse2->execute(array(
				$lepaysadresse,
				$leprenomadresse,
				$lenomadresse,
				$ladresse,
				$ladresseComplement,
				$laville,
				$lecp,
				$laregion,
				$leteladresse,
				$lanote,
				$_SESSION['id']
			));
			$leIdAdresse = $bdd->lastInsertId();
			$reponse2->closeCursor(); // ferme le curseur

			//adresse préférée
			// adresse

			$reponse3 = $bdd->prepare('UPDATE `utilisateurs` SET `IdAdressePréférée` = ? WHERE `IdUtilisateur` = ?;');
			$reponse3->execute(array(
				$leIdAdresse,
				$_SESSION['id']
			));
			$reponse3->closeCursor(); // ferme le curseur
		}

		catch(Exception $e)
		{
			die('Erreur : ' . $e->getMessage());
		}
	}

	public static

	function SeConnecter()
	{
		$erreur = '';
		if (isset($_POST['formconnexion']))
		{
			$mailconnect = htmlspecialchars($_POST['mail']);
			$mdpconnect = sha1($_POST['mdp']);
			if (!empty($mailconnect) AND !empty($mdpconnect))
			{
				require ("connect_BaseProduitsBozendo.php");

				try
				{
					$pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
					$bdd = new PDO('mysql:host=' . $host . ';dbname=' . $bdd, $util, $password, $pdo_options);
					$requser = $bdd->prepare("SELECT * FROM utilisateurs WHERE EmailUtilisateur = ? AND MdpUtilisateur = ?");
					$requser->execute(array(
						$mailconnect,
						$mdpconnect
					));
					$userexist = $requser->rowCount();
					if ($userexist == 1)
					{
						$userinfo = $requser->fetch();
						$_SESSION['id'] = $userinfo['IdUtilisateur'];
						$_SESSION['pseudo'] = $userinfo['Prénom'];
						$_SESSION['nom'] = $userinfo['Nom'];
						$_SESSION['mail'] = $userinfo['EmailUtilisateur'];
						$_SESSION['tel'] = $userinfo['Téléphone'];
						header("Location: ../index.php");
					}
					else
					{
						$erreur = "Mauvais mail ou mot de passe !";
					}

					$requser->closeCursor(); // ferme le curseur
				}

				catch(Exception $e)
				{
					die('Erreur : ' . $e->getMessage());
				}
			}
			else
			{
				$erreur = "Tous les champs doivent être complétés !";
			}
		}

		return $erreur;
	}

	public static function ModifUtilisateur($numProd, $nomUtilisateur, $prixProd, $codeCateg)
	{
		require ("connect_BaseUtilisateursBozendo.php");

		try
		{
			$pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
			$bdd = new PDO('mysql:host=' . $host . ';dbname=' . $bdd . ';charset=utf8', $util, $password, $pdo_options);
			$reponse = $bdd->prepare('UPDATE UTILISATEURS SET NomProd = ?, PrixProd = ?, CodeCateg = ? WHERE NumProd = ?;');
			$reponse->execute(array(
				$nomUtilisateur,
				$prixProd,
				$codeCateg,
				$numProd
			));
			$reponse->closeCursor(); // ferme le curseur
		}

		catch(Exception $e)
		{
			die('Erreur : ' . $e->getMessage());
		}
	}

	public static

	function SupprimeUtilisateur($numProd)
	{
		require ("connect_BaseUtilisateursBozendo.php");

		try
		{
			$pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
			$bdd = new PDO('mysql:host=' . $host . ';dbname=' . $bdd, $util, $password, $pdo_options);
			$reponse = $bdd->prepare('DELETE FROM UTILISATEURS WHERE NumProd = ?');
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
                $reponse = $bdd->query("SELECT idUtilisateur, LoginUtilisateur, MdpUtilisateur, EmailUtilisateur, Admin FROM UTILISATEURS ;"); //Exécute la requête
                }
              else
                {
                $reponse = $bdd->prepare("SELECT idUtilisateur, LoginUtilisateur, MdpUtilisateur, EmailUtilisateur, Admin FROM UTILISATEURS WHERE idUtilisateur=?;");
                $reponse->execute(array(
                    $num
                ));
                }

            $utilisateurDonnees = array();
            while ($ligne = $reponse->fetch())
                { //parcours le curseur pour récupérer les données
                $num = $ligne['idUtilisateur'];
                $login = utf8_encode($ligne['LoginUtilisateur']);
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

	public static function GetIdAdressePrefere($num)
	{
		require("connect_BaseProduitsBozendo.php");

		try
		{
			$pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
			$bdd = new PDO('mysql:host=' . $host . ';dbname=' . $bdd, $util, $password, $pdo_options);

				$reponse = $bdd->prepare("SELECT IdAdressePréférée FROM UTILISATEURS WHERE idUtilisateur=?;");
				$reponse->execute(array(
					$num
				));
			
			$idAdressePréféré = null;
			while ($ligne = $reponse->fetch())
			{ //parcours le curseur pour récupérer les données
				$idAdressePréféré = $ligne['IdAdressePréférée'];
			}

			$reponse->closeCursor(); // ferme le curseur
			return $idAdressePréféré; // On retourne le tableau des comptes
		}

		catch(Exception $e)
		{
			die('Erreur : ' . $e->getMessage());
		}
	}


	public static function ModifAdressePréférée($idUser, $idAdressePrefere)
	{
		require ("connect_BaseProduitsBozendo.php");

		try
		{
			$pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
			$bdd = new PDO('mysql:host=' . $host . ';dbname=' . $bdd . ';charset=utf8', $util, $password, $pdo_options);
			$reponse = $bdd->prepare('UPDATE UTILISATEURS SET IdAdressePréférée = ? WHERE IdUtilisateur = ?;');
			$reponse->execute(array(
				$idAdressePrefere,
				$idUser,
			));
			$reponse->closeCursor(); // ferme le curseur
		}

		catch(Exception $e)
		{
			die('Erreur : ' . $e->getMessage());
		}
	}
}
