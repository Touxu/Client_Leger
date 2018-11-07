
<?php
include ("etat.class.php");

class GestionEtat

{
	public static function GetEtatByFacture($numFacture)
	{
		require ("connect_BaseProduitsBozendo.php");
		$pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
		$bdd = new PDO('mysql:host=' . $host . ';dbname=' . $bdd, $util, $password, $pdo_options);

		try
		{
		$reponse = $bdd->prepare("SELECT * FROM etat_livraison WHERE NumFacture=? ORDER BY NumEtape;");
		$reponse->execute(array(
			$numFacture
		));
		$lesEtat = array();
		while ($ligne = $reponse->fetch())
		{ //parcours le curseur pour récupérer les données
			$date = $ligne['Date'];
			$numEtape = $ligne['NumEtape'];

			$lEtat = new Etat($numFacture,$date,$numEtape);
			$lesEtat[] = $lEtat;
		}
		$reponse->closeCursor(); // ferme le curseur

		return $lesEtat;
		}

		catch(Exception $e)
		{
			die('Erreur : ' . $e->getMessage());
		}
	}
}