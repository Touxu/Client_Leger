<!DOCTYPE html>
<html>

	<head>

		<title>Annonce</title>
		<meta charset="UTF-8">
		<link rel="stylesheet" href="style/bozendo.css">

	</head>


	<body>

		<nav>
			<ul>
 				 <li ><a href="index.html">Accueil</a></li>
 				 <li><a href="sport.html">Présentation du sport</a></li>
 				 <li><a href="ligue.html">Présentation de la ligue</a></li>
 				 <li><a class="active" href="annonce.html">Petites annonces</a></li>
				 <li><a href="formulaire.html">Formulaire</a></li>
 				 <li><a href="..//index.html">Site MLO</a></li>
			</ul>
		</nav>

		<h1><br><br>Annonces:</h1>
<?php


require("connect_basebozendo.php"); // le fichier de login
try
{
	$pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
	$bdd = new PDO('mysql:host='.$host.';dbname='.$bdd, $util, $password, $pdo_options);
        $reponse = $bdd->prepare('INSERT INTO `basebozendo`.`annonce` (`idAnn`, `Civilite`, `nomPers`, `prenomPers`, `telPers`, `mailPers`, `titreAnn`, `detailAnn`, `autre`, `addTel`, `affMail`, `dateAnn`) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?);');
        $reponse->execute(array() ); //les 12 champs du formulaire ..................
        
        
        
        
        
        
        $reponse = $bdd->query('select * from annonce'); //Requête SQL, le '?' représente la variable

	while ($donnees = $reponse->fetch())  //parcours le curseur pour récupérer les données
    {
        ?><div class="annonce">
		<table>
 		<caption><?php echo $donnees["titreAnn"];?></caption>
   			<tr>
				<td>Publié par: <?php echo $donnees["prenomPers"]." ".$donnees["nomPers"];?></td>
   			</tr>
                        <tr>
                            <td><?php echo $donnees["detailAnn"]; ?></td>
   			</tr>                        
   			<tr>
				<td> <?php 
                                if($donnees["affMail"]) echo "<a href='".$donnees["mailPers"]."'>Mail</a><br>";
				if($donnees["addTel"]) echo "tel: ".$donnees['telPers']."<br>"; 
                                if($donnees["autre"] != '') echo $donnees['autre']; 
                                ?></td>
                                
   			</tr>
		</table>
	</div> <?php
    }
$reponse->closeCursor();  // ferme le curseur
}
catch (Exception $e)
{
               die('Erreur : ' . $e->getMessage());
}




?>
	</body>

</html>
