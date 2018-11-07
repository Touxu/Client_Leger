<h1>Liste des catégories</h1>
<table>
    <tr>
        <th>Numéro Catégorie</th>
        <th>Libellé Catégorie</th>
        <th>Modifier</th>
        <th>Supprimer</th>
    </tr>
    <?php
    for ($index = 0; $index < count($categoriesDonnees); $index++) {
        $nouveauCategorie = $categoriesDonnees[$index];
        ?>
        <tr>
            <td width="12.5%"><?php echo $nouveauCategorie->NumCategorie; ?></td>
            <td width="25%"><?php echo $nouveauCategorie->NomCategorie; ?></td>
            <td width="12.5%"><div align='center'><a href='index.php?page=categories_modifier&numC=<?php echo $nouveauCategorie->NumCategorie; ?>'><img style="width:15%;" src='vues/images/modifier.png'/></a></div></td>
            <td width="12.5%"><div align='center'><a href='./Controleur/actionCategorie.php?numC=<?php echo $nouveauCategorie->NumCategorie; ?>&action=3'><img style="width:15%;" src='vues/images/supprimer.png'/></a></div></td>
        </tr>
    <?php } ?>
</table><br />
<p class="centrer"><a href="index.php?page=categories_ajouter"><input type="button"  class="btn" value="Ajouter une Categorie"/></a></p>

