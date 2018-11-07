
<?php
include ("adresse.class.php");

class GestionAdresse

{
	public static

	function GetLesAdresseDuUser($idUtilisateur)
	{
		require ("connect_BaseProduitsBozendo.php");

		try
		{
			$pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
			$bdd = new PDO('mysql:host=' . $host . ';dbname=' . $bdd, $util, $password, $pdo_options);
			if ($idUtilisateur == 0)
			{ // On teste s'il s'agit de la liste complète ou d'un compte en particulier identifié par $num
				$reponse = $bdd->query("SELECT * FROM adresse ;"); //Exécute la requête
				$adresseDonnees = array();
				while ($ligne = $reponse->fetch())
				{ //parcours le curseur pour récupérer les données
					$IdAdresse = $ligne['IdAdresse'];
					$Pays = utf8_encode(htmlentities($ligne['Pays'], ENT_QUOTES, "UTF-8"));
					$Prenom = utf8_encode(htmlentities($ligne['Prénom'], ENT_QUOTES, "UTF-8"));
					$Nom = utf8_encode(htmlentities($ligne['Nom'], ENT_QUOTES, "UTF-8"));
					$Adresse = utf8_encode(htmlentities($ligne['Adresse'], ENT_QUOTES, "UTF-8"));
					$AdresseComplement = utf8_encode(htmlentities($ligne['AdresseComplement'], ENT_QUOTES, "UTF-8"));
					$Ville = utf8_encode(htmlentities($ligne['Ville'], ENT_QUOTES, "UTF-8"));
					$CodePostal = utf8_encode(htmlentities($ligne['CodePostal'], ENT_QUOTES, "UTF-8"));
					$Region = utf8_encode(htmlentities($ligne['Région'], ENT_QUOTES, "UTF-8"));
					$Telephone = $ligne['Téléphone'];
					$Note = utf8_encode(htmlentities($ligne['Note'], ENT_QUOTES, "UTF-8"));
					$IdUtilisateur = $ligne['IdUtilisateur'];

					// Construction d'un objet de type Produit

					$nouvelleAdresse = new Adresse($IdAdresse, $Pays, $Prenom, $Nom, $Adresse, $AdresseComplement, $Ville, $CodePostal, $Region, $Telephone, $Note, $IdUtilisateur);
					$adresseDonnees[] = $nouvelleAdresse; // Ajout de l'objet dans le tableau
				}

				return $adresseDonnees;
			}
			else
			{
				$reponse = $bdd->prepare("SELECT * FROM adresse WHERE idUtilisateur=?;");
				$reponse->execute(array(
					$idUtilisateur
				));
				$adresseDonnees = array();
				while ($ligne = $reponse->fetch())
				{ //parcours le curseur pour récupérer les données
					$IdAdresse = $ligne['IdAdresse'];
					$Pays = utf8_encode(htmlentities($ligne['Pays'], ENT_QUOTES, "UTF-8"));
					$Prenom = utf8_encode(htmlentities($ligne['Prénom'], ENT_QUOTES, "UTF-8"));
					$Nom = utf8_encode(htmlentities($ligne['Nom'], ENT_QUOTES, "UTF-8"));
					$Adresse = utf8_encode(htmlentities($ligne['Adresse'], ENT_QUOTES, "UTF-8"));
					$AdresseComplement = utf8_encode(htmlentities($ligne['AdresseComplement'], ENT_QUOTES, "UTF-8"));
					$Ville = utf8_encode(htmlentities($ligne['Ville'], ENT_QUOTES, "UTF-8"));
					$CodePostal = utf8_encode(htmlentities($ligne['CodePostal'], ENT_QUOTES, "UTF-8"));
					$Region = utf8_encode(htmlentities($ligne['Région'], ENT_QUOTES, "UTF-8"));
					$Telephone = $ligne['Téléphone'];
					$Note = utf8_encode(htmlentities($ligne['Note'], ENT_QUOTES, "UTF-8"));
					$IdUtilisateur = $ligne['IdUtilisateur'];

					// Construction d'un objet de type Produit

					$nouvelleAdresse = new Adresse($IdAdresse, $Pays, $Prenom, $Nom, $Adresse, $AdresseComplement, $Ville, $CodePostal, $Region, $Telephone, $Note, $IdUtilisateur);
					$adresseDonnees[] = $nouvelleAdresse; // Ajout de l'objet dans le tableau
				}

				return $adresseDonnees;
			}

			$reponse->closeCursor(); // ferme le curseur
			return $produitDonnees; // On retourne le tableau des adresses
		}

		catch(Exception $e)
		{
			die('Erreur : ' . $e->getMessage());
		}
	}

	public static

	function GetLesAdresse($idAdresse)
	{
		require ("connect_BaseProduitsBozendo.php");

		try
		{
			$pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
			$bdd = new PDO('mysql:host=' . $host . ';dbname=' . $bdd, $util, $password, $pdo_options);
			if ($idAdresse == 0)
			{ // On teste s'il s'agit de la liste complète ou d'un compte en particulier identifié par $num
				$reponse = $bdd->query("SELECT * FROM adresse ;"); //Exécute la requête
				$adresseDonnees = array();
				while ($ligne = $reponse->fetch())
				{ //parcours le curseur pour récupérer les données
					$IdAdresse = $ligne['IdAdresse'];
					$Pays = utf8_encode(htmlentities($ligne['Pays'], ENT_QUOTES, "UTF-8"));
					$Prenom = utf8_encode(htmlentities($ligne['Prénom'], ENT_QUOTES, "UTF-8"));
					$Nom = utf8_encode(htmlentities($ligne['Nom'], ENT_QUOTES, "UTF-8"));
					$Adresse = utf8_encode(htmlentities($ligne['Adresse'], ENT_QUOTES, "UTF-8"));
					$AdresseComplement = utf8_encode(htmlentities($ligne['AdresseComplement'], ENT_QUOTES, "UTF-8"));
					$Ville = utf8_encode(htmlentities($ligne['Ville'], ENT_QUOTES, "UTF-8"));
					$CodePostal = utf8_encode(htmlentities($ligne['CodePostal'], ENT_QUOTES, "UTF-8"));
					$Region = utf8_encode(htmlentities($ligne['Région'], ENT_QUOTES, "UTF-8"));
					$Telephone = $ligne['Téléphone'];
					$Note = utf8_encode(htmlentities($ligne['Note'], ENT_QUOTES, "UTF-8"));
					$IdUtilisateur = $ligne['IdUtilisateur'];

					// Construction d'un objet de type Produit

					$nouvelleAdresse = new Adresse($IdAdresse, $Pays, $Prenom, $Nom, $Adresse, $AdresseComplement, $Ville, $CodePostal, $Region, $Telephone, $Note, $IdUtilisateur);
					$adresseDonnees[] = $nouvelleAdresse; // Ajout de l'objet dans le tableau
				}

				return $adresseDonnees;
			}
			else
			{
				$reponse = $bdd->prepare("SELECT * FROM adresse WHERE IdAdresse=?;");
				$reponse->execute(array(
					$idAdresse
				));
				$adressePrefere = null;
				while ($ligne = $reponse->fetch())
				{ //parcours le curseur pour récupérer les données
					$IdAdresse = $ligne['IdAdresse'];
					$Pays = utf8_encode(htmlentities($ligne['Pays'], ENT_QUOTES, "UTF-8"));
					$Prenom = utf8_encode(htmlentities($ligne['Prénom'], ENT_QUOTES, "UTF-8"));
					$Nom = utf8_encode(htmlentities($ligne['Nom'], ENT_QUOTES, "UTF-8"));
					$Adresse = utf8_encode(htmlentities($ligne['Adresse'], ENT_QUOTES, "UTF-8"));
					$AdresseComplement = utf8_encode(htmlentities($ligne['AdresseComplement'], ENT_QUOTES, "UTF-8"));
					$Ville = utf8_encode(htmlentities($ligne['Ville'], ENT_QUOTES, "UTF-8"));
					$CodePostal = utf8_encode(htmlentities($ligne['CodePostal'], ENT_QUOTES, "UTF-8"));
					$Region = utf8_encode(htmlentities($ligne['Région'], ENT_QUOTES, "UTF-8"));
					$Telephone = $ligne['Téléphone'];
					$Note = utf8_encode(htmlentities($ligne['Note'], ENT_QUOTES, "UTF-8"));
					$IdUtilisateur = $ligne['IdUtilisateur'];

					// Construction d'un objet de type Produit

					$adressePrefere = new Adresse($IdAdresse, $Pays, $Prenom, $Nom, $Adresse, $AdresseComplement, $Ville, $CodePostal, $Region, $Telephone, $Note, $IdUtilisateur);
				}

				return $adressePrefere;
			}

			$reponse->closeCursor(); // ferme le curseur
			return $produitDonnees; // On retourne le tableau des adresses
		}

		catch(Exception $e)
		{
			die('Erreur : ' . $e->getMessage());
		}
	}

	public static

	function SupprimeAdresse($idAdresse)
	{
		require ("connect_BaseProduitsBozendo.php");

		try
		{
			$pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
			$bdd = new PDO('mysql:host=' . $host . ';dbname=' . $bdd, $util, $password, $pdo_options);
			$reponse = $bdd->prepare('DELETE FROM Adresse WHERE IdAdresse = ?');
			$reponse->execute(array(
				$idAdresse
			));
			$reponse->closeCursor(); // ferme le curseur
		}

		catch(Exception $e)
		{
			die('Erreur : ' . $e->getMessage());
		}
	}

	public static function VerifAdresse()
	{
		$erreur = 'erreur';
		$aReussi = false;
		$pseudo = 'pseudo';
		$mail = 'mail';
		$mdp = 'mdp';
		$leRetour = array(
			0 => $erreur,
			1 => $aReussi,
		);
		if (isset($_POST['FormAjouterUneAdresse']) OR isset($_POST['FormModifierUneAdresse']))
		{

			// variable adresse
			// Mtn test adresse

			if (!empty($_POST['c_fname_adresse']) AND !empty($_POST['c_lname_adresse']) AND !empty($_POST['c_address']) AND !empty($_POST['c_ville']) AND !empty($_POST['c_postal_zip']) AND !empty($_POST['c_state_country']) AND !empty($_POST['c_phone_adresse']))
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
				$ajouterEnPrefere = null;

				if(isset($_POST['c_is_prefere'])){
					$ajouterEnPrefere = $_POST['c_is_prefere']; //si la case checkbox est cochée
		   		}

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

					require ("connect_BaseProduitsBozendo.php");

						$pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
						$bdd = new PDO('mysql:host=' . $host . ';dbname=' . $bdd, $util, $password, $pdo_options);
						$reqadresse = $bdd->prepare("SELECT * FROM adresse WHERE Pays=? AND	Prénom=? AND Nom=? AND Adresse=? AND Ville=? AND CodePostal=? AND Région=? AND Téléphone=? AND IdUtilisateur=?");
						$reqadresse->execute(array(
							$paysAdresse,
							$prenomAdresse,
							$nomAdresse,
							$AdresseAdresse,
							$villeAdresse,
							$cpAdresse,
							$regionAdresse,
							$telAdresse,
							$_SESSION['id']
						));
						$adresseexist = $reqadresse->rowCount();
						$reqadresse->closeCursor(); // ferme le curseur
						if ($adresseexist == 0)
						{
						$aReussi = true;
						$erreur = "Votre adresse a bien été créé !";
						$leRetour = array(
							0 => $erreur,
							1 => $aReussi,
							2 => $paysAdresse,
							3 => $prenomAdresse,
							4 => $nomAdresse,
							5 => $AdresseAdresse,
							6 => $complementAdresseAdresse,
							7 => $villeAdresse,
							8 => $cpAdresse,
							9 => $regionAdresse,
							10 => $telAdresse,
							11 => $noteAdresse,
							12 => $ajouterEnPrefere,
						);
						return $leRetour;
						}
						else
						{
							$erreur = "Cette adresse existe déja, si vous voulez la modifier, rendez vous dans mesAdresses et cliquez sur modifier !";
						}
				}
				else
				{
					$erreur = "Vous avez dépassé la limite de caractères autorisée dans les champs !";
				}
			}
			else
			{
				$erreur = "Vous devez compléter tout les champs !";
			}
		}

		if ($erreur != "Votre compte a bien été créé !")
		{
			$leRetour = array(
				0 => $erreur,
				1 => $aReussi,
			);
			return $leRetour;
		}
	}

	public static function VerifAdresseMofifier()
	{
		$erreur = 'erreur';
		$aReussi = false;
		$leRetour = array(
			0 => $erreur,
			1 => $aReussi,
		);
		if (isset($_POST['FormModifierUneAdresse']))
		{

			// variable adresse
			// Mtn test adresse

			if (!empty($_POST['c_fname_adresse']) AND !empty($_POST['c_lname_adresse']) AND !empty($_POST['c_address']) AND !empty($_POST['c_ville']) AND !empty($_POST['c_postal_zip']) AND !empty($_POST['c_state_country']) AND !empty($_POST['c_phone_adresse']))
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
				$ajouterEnPrefere = null;

				if(isset($_POST['c_is_prefere'])){
					$ajouterEnPrefere = $_POST['c_is_prefere']; //si la case checkbox est cochée
		   		}

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

					require ("connect_BaseProduitsBozendo.php");

						$aReussi = true;
						$erreur = "Votre adresse a bien été modifiée !";
						$leRetour = array(
							0 => $erreur,
							1 => $aReussi,
							2 => $paysAdresse,
							3 => $prenomAdresse,
							4 => $nomAdresse,
							5 => $AdresseAdresse,
							6 => $complementAdresseAdresse,
							7 => $villeAdresse,
							8 => $cpAdresse,
							9 => $regionAdresse,
							10 => $telAdresse,
							11 => $noteAdresse,
							12 => $ajouterEnPrefere,
						);
						return $leRetour;
				}
				else
				{
					$erreur = "Vous avez dépassé la limite de caractères autorisée dans les champs !";
				}
			}
			else
			{
				$erreur = "Vous devez compléter tout les champs !";
			}
		}

		if ($erreur != "Votre adresse a bien été modifiée !")
		{
			$leRetour = array(
				0 => $erreur,
				1 => $aReussi,
			);
			return $leRetour;
		}
	}

	public static function AjouterAdresse($lepaysadresse, $leprenomadresse, $lenomadresse, $ladresse, $ladresseComplement, $laville, $lecp, $laregion, $leteladresse, $lanote, $isPrefere)
	{
		require ("connect_BaseProduitsBozendo.php");

		try
		{
			$pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
			$bdd = new PDO('mysql:host=' . $host . ';dbname=' . $bdd, $util, $password, $pdo_options);
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
			if($isPrefere == 1)
			{
			$reponse3 = $bdd->prepare('UPDATE `utilisateurs` SET `IdAdressePréférée` = ? WHERE `IdUtilisateur` = ?;');
			$reponse3->execute(array(
				$leIdAdresse,
				$_SESSION['id']
			));
			$reponse3->closeCursor(); // ferme le curseur
			}
		}

		catch(Exception $e)
		{
			die('Erreur : ' . $e->getMessage());
		}
	}

	public static function ModifierAdresse($lepaysadresse, $leprenomadresse, $lenomadresse, $ladresse, $ladresseComplement, $laville, $lecp, $laregion, $leteladresse, $lanote, $isPrefere, $idAdresse)
	{
		require ("connect_BaseProduitsBozendo.php");

		try
		{
			$pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
			$bdd = new PDO('mysql:host=' . $host . ';dbname=' . $bdd, $util, $password, $pdo_options);
			// adresse

			$reponse2 = $bdd->prepare('UPDATE `adresse` SET `Pays` = ?, `Prénom` = ?, `Nom` = ?, `Adresse` = ?, `AdresseComplement` = ?, `Ville` = ?, `CodePostal` = ?, `Région` = ?, `Téléphone` = ?, `Note` = ?, `IdUtilisateur` = ? WHERE `adresse`.`IdAdresse` = ?;');
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
				$_SESSION['id'],
				$idAdresse				
			));
			$reponse2->closeCursor(); // ferme le curseur

			//adresse préférée
			// adresse
			if($isPrefere == 1)
			{
			$reponse3 = $bdd->prepare('UPDATE `utilisateurs` SET `IdAdressePréférée` = ? WHERE `IdUtilisateur` = ?;');
			$reponse3->execute(array(
				$idAdresse,
				$_SESSION['id']
			));
			$reponse3->closeCursor(); // ferme le curseur
			}
		}

		catch(Exception $e)
		{
			die('Erreur : ' . $e->getMessage());
		}
	}
}

