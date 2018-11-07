
<?php
include ("etape.class.php");

class GestionEtape

{
	public static function GetEtape()
	{
		require ("connect_BaseProduitsBozendo.php");
		$pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
		$bdd = new PDO('mysql:host=' . $host . ';dbname=' . $bdd, $util, $password, $pdo_options);

		try
		{
		$reponse = $bdd->query("SELECT * FROM etape;");
		$lesEtapes = array();
		while ($ligne = $reponse->fetch())
		{ //parcours le curseur pour récupérer les données
			$numEtape = $ligne['NumEtape'];
			$libelle = $ligne['Libellé'];

			$lEtape = new Etape($numEtape,$libelle);
			$lesEtapes[] = $lEtape;
		}
		$reponse->closeCursor(); // ferme le curseur

		return $lesEtapes;
		}

		catch(Exception $e)
		{
			die('Erreur : ' . $e->getMessage());
		}
	}
}