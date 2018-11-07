<?php
if (isset($_SESSION['Admin']))
{
    if ($_SESSION['Admin'] == 1)
    {
    ?>
<div id="main">
    <div class="inner">
        <h1>Modifier l'utilisateur</h1>
            <?php
            include("Modele/GestionUtilisateur.class.php");
            $produitDonnees = GestionUtilisateur::GetLesUtilisateurs($_GET["num"]); //liste compléte des users
            $nouveauUtilisateur= $produitDonnees[0];
            include("Vues/utilisateurs_modifier.php");
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



