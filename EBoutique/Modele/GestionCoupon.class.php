
<?php
include ("coupon.class.php");

class GestionCoupon

{
	public static

	function GetCoupon()
	{
		require ("connect_BaseProduitsBozendo.php");

		try
		{
			$pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
			$bdd = new PDO('mysql:host=' . $host . ';dbname=' . $bdd, $util, $password, $pdo_options);

				$reponse = $bdd->query("SELECT * FROM coupon ;"); //Exécute la requête
				$couponDonnees = array();
				while ($ligne = $reponse->fetch())
				{ //parcours le curseur pour récupérer les données
					$NumCoupon = $ligne['NumCoupon'];
					$Libelle = utf8_encode(htmlentities($ligne['Libellé'], ENT_QUOTES, "UTF-8"));
					$Code = utf8_encode(htmlentities($ligne['Code'], ENT_QUOTES, "UTF-8"));
					$Taux = $ligne['Taux'];

					// Construction d'un objet de type Produit

					$newCoupon = new Coupon($NumCoupon, $Libelle, $Code, $Taux);
					$couponDonnees[] = $newCoupon; // Ajout de l'objet dans le tableau
				}

			$reponse->closeCursor(); // ferme le curseur
			return $couponDonnees;
		}

		catch(Exception $e)
		{
			die('Erreur : ' . $e->getMessage());
		}
	}

	public static function GetLeCouponByCode($CodeCoupon)
	{
		require ("connect_BaseProduitsBozendo.php");

		try
		{
			$pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
			$bdd = new PDO('mysql:host=' . $host . ';dbname=' . $bdd, $util, $password, $pdo_options);

				$reponse = $bdd->prepare("SELECT * FROM coupon WHERE Code = ?;"); //Exécute la requête
				$reponse->execute(array(
					$CodeCoupon
				));

				$newCoupon = null;
				while ($ligne = $reponse->fetch())
				{ //parcours le curseur pour récupérer les données
					$NumCoupon = $ligne['NumCoupon'];
					$Libelle = utf8_encode(htmlentities($ligne['Libellé'], ENT_QUOTES, "UTF-8"));
					$Code = utf8_encode(htmlentities($ligne['Code'], ENT_QUOTES, "UTF-8"));
					$Taux = $ligne['Taux'];

					// Construction d'un objet de type Produit

					$newCoupon = new Coupon($NumCoupon, $Libelle, $Code, $Taux);
				}

			$reponse->closeCursor(); // ferme le curseur
			return $newCoupon;
		}

		catch(Exception $e)
		{
			die('Erreur : ' . $e->getMessage());
		}
	}

	public static function GetLeCouponByNum($NumCoupon)
	{
		require ("connect_BaseProduitsBozendo.php");

		try
		{
			$pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
			$bdd = new PDO('mysql:host=' . $host . ';dbname=' . $bdd, $util, $password, $pdo_options);

				$reponse = $bdd->prepare("SELECT * FROM coupon WHERE NumCoupon = ?;"); //Exécute la requête
				$reponse->execute(array(
					$NumCoupon
				));

				$newCoupon = null;
				while ($ligne = $reponse->fetch())
				{ //parcours le curseur pour récupérer les données
					$NumCoupon = $ligne['NumCoupon'];
					$Libelle = utf8_encode(htmlentities($ligne['Libellé'], ENT_QUOTES, "UTF-8"));
					$Code = utf8_encode(htmlentities($ligne['Code'], ENT_QUOTES, "UTF-8"));
					$Taux = $ligne['Taux'];

					// Construction d'un objet de type Produit

					$newCoupon = new Coupon($NumCoupon, $Libelle, $Code, $Taux);
				}

			$reponse->closeCursor(); // ferme le curseur
			return $newCoupon;
		}

		catch(Exception $e)
		{
			die('Erreur : ' . $e->getMessage());
		}
	}
}

