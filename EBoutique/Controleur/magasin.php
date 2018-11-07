            <?php
            //il faut vérifié si il faut afficher toutes les produits ou les produits d'une catégorie spécifique
            if(isset($_GET["categAffi"]))
            {
                $produitDonnees = GestionProduit::GetLesProduitsCateg($_GET["categAffi"]); //liste des produits de la categorie categAffi
            }
            else
            {
                $produitDonnees = GestionProduit::GetLesProduits(0); //liste compléte des produits
        	}
            include("Vues/magasin.php");
            ?>