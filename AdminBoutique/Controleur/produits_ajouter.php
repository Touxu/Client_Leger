<?php
if (isset($_SESSION['Admin']))
{
    if ($_SESSION['Admin'] == 1)
    {
    ?>
<div id="main">
    <div class="inner">
        <h1>Ajout d'un produit</h1>
        <?php
        include("vues/produits_ajouter.php");
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
