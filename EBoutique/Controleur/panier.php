            <?php
            if (GestionPanier::getVide() == false)
            {
            $lesProduits = GestionPanier::getProduits();
            include("Vues/panier.php");
        	}
        	else
        	{
                echo '<div class="site-section block-3 site-blocks-2 bg-light">
                <div class="container">';
                echo '<h1>Votre panier :</h1>';
        		echo "<h3>Le panier est vide.</h3>";
                echo '<div class="row mb-5">
              <div class="col-md-4 mb-3 mb-md-0">
                <a href="index.php?page=magasin"><button class="btn btn-primary btn-sm btn-block">Retourner dans la boutique</button></a>
              </div>
            </div>';
                echo '    </div></div>';
        	}
            ?>



