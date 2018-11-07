
<?php
include ("facture.class.php");

class GestionFacture

{
	public static function GetFactureByCommande($numCommande)
	{
		require ("connect_BaseProduitsBozendo.php");
		$pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
		$bdd = new PDO('mysql:host=' . $host . ';dbname=' . $bdd, $util, $password, $pdo_options);
		$numFacture = null;

		try
		{
			$reponse = $bdd->prepare("SELECT * FROM facturer WHERE NumCommande=?;");
			$reponse->execute(array(
				$numCommande
			));
			while ($ligne = $reponse->fetch())
			{ //parcours le curseur pour récupérer les données
				$numFacture = $ligne['NumFacture'];
			}
			$reponse->closeCursor(); // ferme le curseur
		}

		catch(Exception $e)
		{
			die('Erreur : ' . $e->getMessage());
		}

		try
		{
		$reponse2 = $bdd->prepare("SELECT * FROM factures WHERE NumFacture=?;");
		$reponse2->execute(array(
			$numFacture
		));
		$laFacture = null;
		while ($ligne = $reponse2->fetch())
		{ //parcours le curseur pour récupérer les données
			$dateFacture = $ligne['DateFacture'];
			$dateLivraison = $ligne['DateLivraison'];

			$laFacture = new Facture($numFacture,$dateFacture,$dateLivraison);
		}
		$reponse2->closeCursor(); // ferme le curseur

		return $laFacture;
		}

		catch(Exception $e)
		{
			die('Erreur : ' . $e->getMessage());
		}
	}
}