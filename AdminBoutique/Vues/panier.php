<table>
    <tr>
        <th></th>
        <th>Libellé Produit</th>
        <th>Prix</th>
        <th>Quantitée</th>
        <th>Total</th>
        <th>Supprimer</th>
    </tr>
    <?php
    foreach ($lePanier as $nouveauProduit)
     {

        ?>
        <tr>
            <td width="12.5%"><?php echo $nouveauProduit->NumProd; ?></td>
            <td width="25%"><?php echo $nouveauProduit->NomProd; ?></td>
            <td width="12.5%"><?php echo $nouveauProduit->PrixProd; ?></td>
            <td width="12.5%"><?php echo $nouveauProduit->CodeCateg; ?></td>
            <td width="12.5%"></td>
            <td width="12.5%"><div align='center'><a href='./Controleur/actionProduit.php?num=<?php echo $nouveauProduit->NumProd; ?>&action=3'><img style="width:15%;" src='vues/images/supprimer.png'/></a></div></td>
        </tr>
    <?php } ?>
</table><br />
<p class="centrer"><a href="index.php?page=produits_lister_image"><input type="button"  class="btn" value="Ajouter un Produit au panier"/></a></p>
<p class="centrer"><a href="controleur/reset_panier.php"><input type="button"  class="btn" value="Vider le panier!"/></a></p>

<?php var_dump($lePanier);?>

