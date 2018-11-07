            <?php
            if (isset($_GET['numproduit']))
            {
                $nouveauProduit = GestionProduit::GetLesProduits($_GET['numproduit']);
                include("Vues/produit.php");
            }
            else
            {
                ?>
                    <div class="site-section">
                    <div class="container">
                <?php
                    echo "<h2>Ce produit est introuvable</h2>";
                ?>
                    </div>
                    </div>
                <?php
            }
            ?>