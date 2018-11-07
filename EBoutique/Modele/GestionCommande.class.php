
<?php
include ("commande.class.php");

class GestionCommande

{
	public static function GetLesCommandesDuUser($idUtilisateur)
	{
		require ("connect_BaseProduitsBozendo.php");

		try
		{
			$pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
			$bdd = new PDO('mysql:host=' . $host . ';dbname=' . $bdd, $util, $password, $pdo_options);
			if ($idUtilisateur == 0)
			{ // On teste s'il s'agit de la liste complète ou d'un compte en particulier identifié par $num
				$reponse = $bdd->query("SELECT * FROM commandes ;"); //Exécute la requête
				$CommandeDonnees = array();
				while ($ligne = $reponse->fetch())
				{ //parcours le curseur pour récupérer les données
					$NumCommande = $ligne['NumCommande'];
					$Date = $ligne['DateCommande'];
					$IdUser = $ligne['IdUtilisateur'];
					$IdAdresse = $ligne['IdAdresse'];
					$NumCoupon = $ligne['NumCoupon'];

					// Construction d'un objet de type Commande

					$nouvelleComamnde = new Commande($NumCommande, $Date, $IdUser, $IdAdresse, $NumCoupon);
					$CommandeDonnees[] = $nouvelleComamnde; // Ajout de l'objet dans le tableau
				}

				return $CommandeDonnees;
			}
			else
			{
				$reponse = $bdd->prepare("SELECT * FROM commandes WHERE IdUtilisateur=?;");
				$reponse->execute(array(
					$idUtilisateur
				));
				$CommandeDonnees = array();
				while ($ligne = $reponse->fetch())
				{ //parcours le curseur pour récupérer les données
					$NumCommande = $ligne['NumCommande'];
					$Date = $ligne['DateCommande'];
					$IdUser = $ligne['IdUtilisateur'];
					$IdAdresse = $ligne['IdAdresse'];
					$NumCoupon = $ligne['NumCoupon'];

					// Construction d'un objet de type Commande

					$nouvelleCommande = new Commande($NumCommande, $Date, $IdUser, $IdAdresse, $NumCoupon);
					$CommandeDonnees[] = $nouvelleCommande; // Ajout de l'objet dans le tableau
				}

				return $CommandeDonnees;
			}
			$reponse->closeCursor(); // ferme le curseur
			return $CommandeDonnees; // On retourne le tableau des adresses
		}

		catch(Exception $e)
		{
			die('Erreur : ' . $e->getMessage());
		}
	}

	public static function GetLesCommandes($idCommande)
	{
		require ("connect_BaseProduitsBozendo.php");

		try
		{
			$pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
			$bdd = new PDO('mysql:host=' . $host . ';dbname=' . $bdd, $util, $password, $pdo_options);
			if ($idCommande == 0)
			{ // On teste s'il s'agit de la liste complète ou d'un compte en particulier identifié par $num
				$reponse = $bdd->query("SELECT * FROM commandes ;"); //Exécute la requête
				$CommandeDonnees = array();
				while ($ligne = $reponse->fetch())
				{ //parcours le curseur pour récupérer les données
					$NumCommande = $ligne['NumCommande'];
					$Date = $ligne['DateCommande'];
					$IdUser = $ligne['IdUtilisateur'];
					$IdAdresse = $ligne['IdAdresse'];
					$NumCoupon = $ligne['NumCoupon'];

					// Construction d'un objet de type Commande

					$nouvelleCommande = new Commande($NumCommande, $Date, $IdUser, $IdAdresse, $NumCoupon);
					$CommandeDonnees[] = $nouvelleCommande; // Ajout de l'objet dans le tableau
				}

				return $CommandeDonnees;
			}
			else
			{
				$reponse = $bdd->prepare("SELECT * FROM commandes WHERE NumCommande=?;");
				$reponse->execute(array(
					$idCommande
				));
				$nouvelleCommande = null;
				while ($ligne = $reponse->fetch())
				{ //parcours le curseur pour récupérer les données
					$NumCommande = $ligne['NumCommande'];
					$Date = $ligne['DateCommande'];
					$IdUser = $ligne['IdUtilisateur'];
					$IdAdresse = $ligne['IdAdresse'];
					$NumCoupon = $ligne['NumCoupon'];

					// Construction d'un objet de type Commande

					$nouvelleCommande = new Commande($NumCommande, $Date, $IdUser, $IdAdresse, $NumCoupon);
				}

				return $nouvelleCommande;
			}

			$reponse->closeCursor(); // ferme le curseur
			return $nouvelleCommande; // On retourne le tableau des adresses
		}

		catch(Exception $e)
		{
			die('Erreur : ' . $e->getMessage());
		}
	}

	public static function GetLAdresse($idAdresse)
	{
		require ("connect_BaseProduitsBozendo.php");

		try
		{
			$pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
			$bdd = new PDO('mysql:host=' . $host . ';dbname=' . $bdd, $util, $password, $pdo_options);

			$reponse = $bdd->prepare("SELECT * FROM adresse WHERE IdAdresse=?;");
			$reponse->execute(array(
				$idAdresse
			));
			$adresse = null;
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

				$adresse = new Adresse($IdAdresse, $Pays, $Prenom, $Nom, $Adresse, $AdresseComplement, $Ville, $CodePostal, $Region, $Telephone, $Note, $IdUtilisateur);
			}
			$reponse->closeCursor(); // ferme le curseur
			return $adresse;

		}

		catch(Exception $e)
		{
			die('Erreur : ' . $e->getMessage());
		}
	}

	public static function CreateCommande($date, $idUser, $idAdresse, $numCoupon)
	{
		require ("connect_BaseProduitsBozendo.php");
		$pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
		$bdd = new PDO('mysql:host=' . $host . ';dbname=' . $bdd, $util, $password, $pdo_options);

		$idCommande = null;

		try
		{
			$reponse = $bdd->prepare('INSERT INTO commandes(`DateCommande`, `idUtilisateur`, `idAdresse`, `NumCoupon`) VALUES (?,?,?,?);');
			$reponse->execute(array(
				$date,
				$idUser,
				$idAdresse,
				$numCoupon
			));
			$idCommande = $bdd->lastInsertId();
			$reponse->closeCursor(); // ferme le curseur
		}
		

		catch(Exception $e)
		{
			die('Erreur : ' . $e->getMessage());
		}

		$idFacture = null;

		try
		{
			$dateLivraison = date('Y-m-d', strtotime($date. ' + 7 days'));

			$reponse2 = $bdd->prepare('INSERT INTO factures(`DateFacture`, `DateLivraison`) VALUES (?,?);');
			$reponse2->execute(array(
				$date,
				$dateLivraison
			));
			$idFacture = $bdd->lastInsertId();
			$reponse2->closeCursor(); // ferme le curseur
		}
		

		catch(Exception $e)
		{
			die('Erreur : ' . $e->getMessage());
		}

		
		try
		{
			$reponse3 = $bdd->prepare('INSERT INTO `facturer` (`NumFacture`, `NumCommande`) VALUES (?,?);');
			$reponse3->execute(array(
				$idFacture,
				$idCommande
			));

			$reponse3->closeCursor(); // ferme le curseur
		}

		catch(Exception $e)
		{
			die('Erreur : ' . $e->getMessage());
		}
		

		$lesProduits = GestionPanier::getProduits(); //on récupère les produits du panier
		for ($index = 0; $index < count($lesProduits); $index++)
		{
			$nouveauProduit = $lesProduits[$index];
			
			try
		{

			$reponse4 = $bdd->prepare('INSERT INTO ligne_de_commande(`NumCommande`, `NumProd`, `Quantitée`) VALUES (?,?,?);');
			$reponse4->execute(array(
				$idCommande,
				$nouveauProduit->NumProd,
				$nouveauProduit->QuantitéeDansPanier
			));

			$reponse4->closeCursor(); // ferme le curseur
		}

		catch(Exception $e)
		{
			die('Erreur : ' . $e->getMessage());
		}

		}
	}
}