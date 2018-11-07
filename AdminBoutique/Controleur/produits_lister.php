<?php
if (isset($_SESSION['Admin']))
{
    if ($_SESSION['Admin'] == 1)
    {
    ?>
<div id="main">
    <div class="inner">
        <div class="6u 12u$(medium)">
                                        <ul class="actions">
                                                <li><a href="index.php?page=produits_lister" class="button special">Produits</a></li>
                                                <li><a href="index.php?page=categories_lister" class="button">Catégories</a></li>
                                                <li><a href="index.php?page=utilisateurs_lister" class="button">Utilisateurs</a></li>
                                            </ul>
                                        </div>
            <?php
            include("Modele/GestionProduit.class.php");
            $produitDonnees = GestionProduit::GetLesProduits(0); //liste compléte des produits
            include("Vues/produits_lister.php");
            ?>
    </div>
</div>
<?php
    }
}
else
{
    include("Controleur/login.php");
}
?>


