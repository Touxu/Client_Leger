<h1>Liste des produits</h1>
<table>
    <tr>
        <th>Numéro Produits</th>
        <th>Libellé Produit</th>
        <th>Prix</th>
        <th>Numéro Catégorie</th>
        <th>Modifier</th>
        <th>Supprimer</th>
    </tr>
    <?php
    for ($index = 0; $index < count($produitDonnees); $index++) {
        $nouveauProduit = $produitDonnees[$index];
        ?>
        <tr>
            <td width="12.5%"><?php echo $nouveauProduit->NumProd; ?></td>
            <td width="25%"><?php echo $nouveauProduit->NomProd; ?></td>
            <td width="12.5%"><?php echo $nouveauProduit->PrixProd; ?></td>
            <td width="12.5%"><?php echo $nouveauProduit->CodeCateg; ?></td>
            <td width="12.5%"><div align='center'><a href='index.php?page=produits_modifier&num=<?php echo $nouveauProduit->NumProd; ?>'><img style="width:15%;" src='vues/images/modifier.png'/></a></div></td>
            <td width="12.5%"><div align='center'><a href='./Controleur/actionProduit.php?num=<?php echo $nouveauProduit->NumProd; ?>&action=3'><img style="width:15%;" src='vues/images/supprimer.png'/></a></div></td>
        </tr>
    <?php } ?>
</table><br />
<p class="centrer"><a href="index.php?page=produits_ajouter"><input type="button"  class="btn" value="Ajouter un Produit"/></a></p>

