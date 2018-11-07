<?php
if (isset($_SESSION['Admin']))
{
    if ($_SESSION['Admin'] == 1)
    {
    ?>
<div id="main">
    <div class="inner">
        <h1>Modifier le produit</h1>
            <?php
            include("Modele/GestionProduit.class.php");
            $produitDonnees = GestionProduit::GetLesProduits($_GET["num"]); //liste compléte des produits
            $nouveauProduit= $produitDonnees[0];
            include("Vues/produits_modifier.php");
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

