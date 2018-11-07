
<?php
include ("ligneCommande.class.php");

class GestionLigneCommande

{
	public static function GetLesLigneCommandes($idCommande)
	{
		require ("connect_BaseProduitsBozendo.php");

		try
		{
			$pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
			$bdd = new PDO('mysql:host=' . $host . ';dbname=' . $bdd, $util, $password, $pdo_options);
			if ($idCommande == 0)
			{ // On teste s'il s'agit de la liste complète ou d'un compte en particulier identifié par $num
				$reponse = $bdd->query("SELECT * FROM ligne_de_commande ;"); //Exécute la requête
				$LigneCommandeDonnees = array();
				while ($ligne = $reponse->fetch())
				{ //parcours le curseur pour récupérer les données
					$NumCommande = $ligne['NumCommande'];
					$NumProduit = $ligne['NumProd'];
					$qtt = $ligne['Quantitée'];

					// Construction d'un objet de type Commande

					$nouvelleLigneCommande = new LigneCommande($NumCommande, $NumProduit, $qtt);
					$LigneCommandeDonnees[] = $nouvelleLigneCommande; // Ajout de l'objet dans le tableau
				}
				$reponse->closeCursor(); // ferme le curseur
				return $LigneCommandeDonnees;
			}
			else
			{
				$reponse = $bdd->prepare("SELECT * FROM ligne_de_commande WHERE NumCommande=?;");
				$reponse->execute(array(
					$idCommande
				));
				$LigneCommandeDonnees = array();
				while ($ligne = $reponse->fetch())
				{ //parcours le curseur pour récupérer les données
					$NumCommande = $ligne['NumCommande'];
					$NumProduit = $ligne['NumProd'];
					$qtt = $ligne['Quantitée'];

					// Construction d'un objet de type Commande

					$nouvelleLigneCommande = new LigneCommande($NumCommande, $NumProduit, $qtt);
					$LigneCommandeDonnees[] = $nouvelleLigneCommande; // Ajout de l'objet dans le tableau
				}

				$reponse->closeCursor(); // ferme le curseur
				return $LigneCommandeDonnees;
			}
		}

		catch(Exception $e)
		{
			die('Erreur : ' . $e->getMessage());
		}
	}
}