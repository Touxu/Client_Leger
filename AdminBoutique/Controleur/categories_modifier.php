<?php
if (isset($_SESSION['Admin']))
{
    if ($_SESSION['Admin'] == 1)
    {
    ?>
<div id="main">
    <div class="inner">
        <h1>Modifier la categorie</h1>
            <?php
            include("Modele/GestionCategorie.class.php");
            $CategorieDonnees = GestionCategorie::GetLesCategories($_GET["numC"]); //liste compléte des categories
            $nouveauCategorie= $CategorieDonnees[0];
            include("Vues/categories_modifier.php");
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





